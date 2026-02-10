from __future__ import annotations

import re
import shutil
import subprocess
import urllib.request
from pathlib import Path
from typing import Any, Dict, List, Optional

from ..config import Settings
from .log_service import LogService


class HealthService:
    def __init__(self, settings: Settings, logs: LogService) -> None:
        self.settings = settings
        self.logs = logs

    @staticmethod
    def _version_tuple(version: str) -> Optional[tuple[int, int, int]]:
        match = re.search(r"(\d+)\.(\d+)\.(\d+)", version)
        if not match:
            return None
        return int(match.group(1)), int(match.group(2)), int(match.group(3))

    def _php_check(self) -> Dict[str, Any]:
        php = shutil.which("php")
        if not php:
            return {
                "available": False,
                "version": None,
                "version_ok": False,
                "missing_extensions": self.settings.required_php_extensions,
                "command": None,
            }

        version_proc = subprocess.run([php, "-v"], capture_output=True, text=True)
        version_line = version_proc.stdout.splitlines()[0] if version_proc.stdout else ""
        version_tuple = self._version_tuple(version_line)
        version_ok = bool(version_tuple and version_tuple >= (8, 1, 0))

        module_proc = subprocess.run([php, "-m"], capture_output=True, text=True)
        modules = {line.strip().lower() for line in module_proc.stdout.splitlines() if line.strip()}
        missing = [ext for ext in self.settings.required_php_extensions if ext.lower() not in modules]

        return {
            "available": True,
            "command": php,
            "version": version_line,
            "version_ok": version_ok,
            "missing_extensions": missing,
        }

    def _apache_check(self) -> Dict[str, Any]:
        apachectl = shutil.which("apachectl")
        if not apachectl:
            return {
                "available": False,
                "config_ok": False,
                "message": "apachectl not found",
            }
        proc = subprocess.run([apachectl, "-t"], capture_output=True, text=True)
        return {
            "available": True,
            "config_ok": proc.returncode == 0,
            "message": (proc.stdout + proc.stderr).strip(),
            "command": apachectl,
        }

    @staticmethod
    def _writable(path: Path) -> Dict[str, Any]:
        if not path.exists():
            return {"path": str(path), "exists": False, "writable": False}
        return {"path": str(path), "exists": True, "writable": path.is_dir() and os_access_write(path)}

    def _path_checks(self) -> List[Dict[str, Any]]:
        paths = [
            self.settings.cohs_root / "cache",
            self.settings.cohs_root / "logs",
            self.settings.cohs_root / "temp_uploads",
            self.settings.cohs_root / "call" / "upload",
        ]
        return [self._writable(path) for path in paths]

    def _url_probe(self, url: str) -> Dict[str, Any]:
        try:
            with urllib.request.urlopen(url, timeout=self.settings.health_timeout_sec) as response:
                return {
                    "ok": True,
                    "status_code": response.status,
                    "url": url,
                }
        except Exception as exc:  # pylint: disable=broad-except
            return {
                "ok": False,
                "status_code": None,
                "url": url,
                "error": str(exc),
            }

    def run(self, active_profile: str, operation_id: str = "-") -> Dict[str, Any]:
        php = self._php_check()
        apache = self._apache_check()
        paths = self._path_checks()

        if active_profile == "apache":
            probe_url = self.settings.apache_health_url
        else:
            probe_url = f"http://127.0.0.1:{self.settings.app_port}/index.php"
        probe = self._url_probe(probe_url)

        overall_ok = (
            php["available"]
            and php["version_ok"]
            and not php["missing_extensions"]
            and all(item["exists"] and item["writable"] for item in paths)
        )

        result = {
            "ok": overall_ok,
            "message": "Health checks complete",
            "error_code": None if overall_ok else "CHECK_FAILED",
            "data": {
                "php": php,
                "apache": apache,
                "paths": paths,
                "probe": probe,
                "active_profile": active_profile,
            },
        }

        level = "INFO" if overall_ok else "ERROR"
        self.logs.log(level, "health", result["message"], operation_id=operation_id, metadata=result["data"])
        return result


def os_access_write(path: Path) -> bool:
    try:
        probe = path / ".hwiz_write_probe.tmp"
        probe.write_text("probe", encoding="utf-8")
        probe.unlink(missing_ok=True)
        return True
    except OSError:
        return False
