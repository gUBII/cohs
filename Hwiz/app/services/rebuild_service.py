from __future__ import annotations

import shutil
import subprocess
from typing import Any, Dict, Optional

from ..config import Settings
from .cleanup_service import CleanupService
from .health_service import HealthService
from .log_service import LogService
from .process_manager import ProcessManager


class RebuildService:
    def __init__(
        self,
        settings: Settings,
        logs: LogService,
        process_manager: ProcessManager,
        cleanup_service: CleanupService,
        health_service: HealthService,
    ) -> None:
        self.settings = settings
        self.logs = logs
        self.process_manager = process_manager
        self.cleanup_service = cleanup_service
        self.health_service = health_service

    def _validate_prerequisites(self) -> Dict[str, Any]:
        php = shutil.which("php")
        if not php:
            return {
                "ok": False,
                "message": "php is unavailable",
                "error_code": "CHECK_FAILED",
                "data": {},
            }

        version_proc = subprocess.run([php, "-v"], capture_output=True, text=True)
        first_line = version_proc.stdout.splitlines()[0] if version_proc.stdout else ""
        if "PHP" not in first_line:
            return {
                "ok": False,
                "message": "Unable to detect PHP version",
                "error_code": "CHECK_FAILED",
                "data": {"output": first_line},
            }

        mod_proc = subprocess.run([php, "-m"], capture_output=True, text=True)
        modules = {line.strip().lower() for line in mod_proc.stdout.splitlines() if line.strip()}
        missing = [ext for ext in self.settings.required_php_extensions if ext.lower() not in modules]
        if missing:
            return {
                "ok": False,
                "message": "Missing required PHP extensions",
                "error_code": "CHECK_FAILED",
                "data": {"missing_extensions": missing},
            }

        required_dirs = [
            self.settings.cohs_root / "cache",
            self.settings.cohs_root / "logs",
            self.settings.cohs_root / "temp_uploads",
            self.settings.cohs_root / "call" / "upload",
        ]
        failed = []
        for path in required_dirs:
            if not path.exists() or not path.is_dir():
                failed.append({"path": str(path), "reason": "missing"})
                continue
            try:
                probe = path / ".hwiz_rebuild_probe.tmp"
                probe.write_text("ok", encoding="utf-8")
                probe.unlink(missing_ok=True)
            except OSError as exc:
                failed.append({"path": str(path), "reason": str(exc)})

        if failed:
            return {
                "ok": False,
                "message": "Required directories are not writable",
                "error_code": "CHECK_FAILED",
                "data": {"directory_failures": failed},
            }

        return {
            "ok": True,
            "message": "Prerequisites validated",
            "error_code": None,
            "data": {"php_version": first_line},
        }

    def run(self, profile: Optional[str] = None, operation_id: str = "-") -> Dict[str, Any]:
        selected = profile or self.process_manager.get_selected_profile()
        self.logs.log("INFO", "rebuild", "Rebuild started", operation_id=operation_id, metadata={"profile": selected})

        prereq = self._validate_prerequisites()
        if not prereq["ok"]:
            self.logs.log("ERROR", "rebuild", prereq["message"], operation_id=operation_id, metadata=prereq["data"])
            return prereq

        cleanup = self.cleanup_service.run(operation_id=operation_id)
        if not cleanup["ok"]:
            self.logs.log("ERROR", "rebuild", cleanup["message"], operation_id=operation_id)
            return cleanup

        marker = self.settings.runtime_dir / "last_rebuild.tmp"
        marker.write_text("ok", encoding="utf-8")

        restart = self.process_manager.run_action("restart", profile=selected, operation_id=operation_id)
        if not restart["ok"]:
            self.logs.log("ERROR", "rebuild", restart["message"], operation_id=operation_id, metadata=restart.get("data"))
            return restart

        health = self.health_service.run(selected, operation_id=operation_id)
        success = bool(health["ok"])
        self.logs.log(
            "INFO" if success else "ERROR",
            "rebuild",
            "Rebuild finished",
            operation_id=operation_id,
            metadata={
                "prerequisites": prereq["data"],
                "cleanup": cleanup["data"],
                "restart": restart["data"],
                "health_ok": health["ok"],
            },
        )

        return {
            "ok": success,
            "message": "Rebuild completed" if success else "Rebuild completed with failures",
            "error_code": None if success else "CHECK_FAILED",
            "data": {
                "prerequisites": prereq,
                "cleanup": cleanup,
                "restart": restart,
                "health": health,
            },
        }
