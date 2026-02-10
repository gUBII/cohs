from __future__ import annotations

import json
import os
from pathlib import Path
import shutil
import signal
import socket
import subprocess
import time
from typing import Any, Dict, Optional

from ..config import Settings
from .log_service import LogService


class ProcessManager:
    def __init__(self, settings: Settings, logs: LogService) -> None:
        self.settings = settings
        self.logs = logs
        self.runtime_dir = settings.runtime_dir
        self.state_file = self.runtime_dir / "state.json"
        self.php_pid_file = self.runtime_dir / "php_builtin.pid"
        self.php_process_log = self.runtime_dir / "php_builtin.process.log"
        self.runtime_dir.mkdir(parents=True, exist_ok=True)

    def _read_state(self) -> Dict[str, Any]:
        if not self.state_file.exists():
            return {
                "selected_profile": self.settings.default_profile,
                "last_action": None,
                "last_operation_id": None,
                "updated_at": None,
            }
        try:
            return json.loads(self.state_file.read_text(encoding="utf-8"))
        except json.JSONDecodeError:
            return {
                "selected_profile": self.settings.default_profile,
                "last_action": None,
                "last_operation_id": None,
                "updated_at": None,
            }

    def _write_state(self, state: Dict[str, Any]) -> None:
        self.state_file.write_text(json.dumps(state, indent=2), encoding="utf-8")

    def get_selected_profile(self) -> str:
        return str(self._read_state().get("selected_profile", self.settings.default_profile))

    def set_selected_profile(self, profile: str, operation_id: str = "-") -> Dict[str, Any]:
        if profile not in {"php_builtin", "apache"}:
            return {"ok": False, "message": "Invalid profile", "error_code": "CHECK_FAILED"}
        state = self._read_state()
        state["selected_profile"] = profile
        state["last_action"] = f"profile.select.{profile}"
        state["last_operation_id"] = operation_id
        state["updated_at"] = time.time()
        self._write_state(state)
        self.logs.log("INFO", "process", f"Selected profile: {profile}", operation_id=operation_id)
        return {"ok": True, "message": "Profile updated", "error_code": None}

    @staticmethod
    def _pid_alive(pid: int) -> bool:
        if pid <= 0:
            return False
        try:
            os.kill(pid, 0)
            return True
        except OSError:
            return False

    @staticmethod
    def _uptime(pid: int) -> Optional[str]:
        cmd = ["ps", "-o", "etime=", "-p", str(pid)]
        proc = subprocess.run(cmd, capture_output=True, text=True)
        if proc.returncode != 0:
            return None
        return proc.stdout.strip() or None

    def _read_php_pid(self) -> Optional[int]:
        if not self.php_pid_file.exists():
            return None
        raw = self.php_pid_file.read_text(encoding="utf-8").strip()
        if not raw.isdigit():
            return None
        return int(raw)

    @staticmethod
    def _port_available(host: str, port: int) -> bool:
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as sock:
            sock.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR, 1)
            try:
                sock.bind((host, port))
                return True
            except OSError:
                return False

    def _php_status(self) -> Dict[str, Any]:
        pid = self._read_php_pid()
        running = bool(pid and self._pid_alive(pid))
        if pid and not running:
            self.php_pid_file.unlink(missing_ok=True)
            pid = None

        return {
            "profile": "php_builtin",
            "available": shutil.which("php") is not None,
            "running": running,
            "pid": pid,
            "uptime": self._uptime(pid) if pid else None,
            "health_url": f"http://127.0.0.1:{self.settings.app_port}/index.php",
        }

    def _apache_status(self) -> Dict[str, Any]:
        apachectl = shutil.which("apachectl")
        if not apachectl:
            return {
                "profile": "apache",
                "available": False,
                "running": False,
                "pid": None,
                "uptime": None,
                "health_url": self.settings.apache_health_url,
                "config_ok": False,
            }

        config_check = subprocess.run([apachectl, "-t"], capture_output=True, text=True)
        running_check = subprocess.run(["pgrep", "-x", "httpd"], capture_output=True, text=True)
        running = running_check.returncode == 0
        pid = None
        if running and running_check.stdout.strip().splitlines():
            first = running_check.stdout.strip().splitlines()[0]
            if first.isdigit():
                pid = int(first)

        return {
            "profile": "apache",
            "available": True,
            "running": running,
            "pid": pid,
            "uptime": self._uptime(pid) if pid else None,
            "health_url": self.settings.apache_health_url,
            "config_ok": config_check.returncode == 0,
            "config_message": (config_check.stdout + config_check.stderr).strip(),
        }

    def status(self) -> Dict[str, Any]:
        selected = self.get_selected_profile()
        php_status = self._php_status()
        apache_status = self._apache_status()
        active = php_status if selected == "php_builtin" else apache_status
        return {
            "selected_profile": selected,
            "active": active,
            "profiles": {
                "php_builtin": php_status,
                "apache": apache_status,
            },
            "state": self._read_state(),
        }

    def _run_apache(self, action: str) -> Dict[str, Any]:
        apachectl = shutil.which("apachectl")
        if not apachectl:
            return {
                "ok": False,
                "message": "apachectl is unavailable",
                "error_code": "PROFILE_NOT_AVAILABLE",
                "data": {},
            }

        proc = subprocess.run([apachectl, "-k", action], capture_output=True, text=True)
        output = (proc.stdout + proc.stderr).strip()
        if proc.returncode != 0:
            low = output.lower()
            error_code = "PERMISSION_DENIED" if "permission" in low or "not permitted" in low else "CHECK_FAILED"
            return {
                "ok": False,
                "message": output or f"apachectl -k {action} failed",
                "error_code": error_code,
                "data": {"command": f"apachectl -k {action}"},
            }

        return {
            "ok": True,
            "message": output or f"Apache {action} succeeded",
            "error_code": None,
            "data": {"command": f"apachectl -k {action}"},
        }

    def _start_php(self) -> Dict[str, Any]:
        status = self._php_status()
        if not status["available"]:
            return {
                "ok": False,
                "message": "php is unavailable",
                "error_code": "PROFILE_NOT_AVAILABLE",
                "data": {},
            }
        if status["running"]:
            return {"ok": True, "message": "PHP server is already running", "error_code": None, "data": status}
        if not self._port_available("127.0.0.1", self.settings.app_port):
            return {
                "ok": False,
                "message": f"Port {self.settings.app_port} is already in use",
                "error_code": "PORT_IN_USE",
                "data": {},
            }

        command = [
            "php",
            "-S",
            f"127.0.0.1:{self.settings.app_port}",
            "-t",
            str(self.settings.cohs_root),
        ]
        with self.php_process_log.open("a", encoding="utf-8") as handle:
            proc = subprocess.Popen(
                command,
                cwd=str(self.settings.cohs_root),
                stdout=handle,
                stderr=subprocess.STDOUT,
                start_new_session=True,
            )
        self.php_pid_file.write_text(str(proc.pid), encoding="utf-8")
        time.sleep(0.8)

        if not self._pid_alive(proc.pid):
            return {
                "ok": False,
                "message": "PHP server failed to start",
                "error_code": "CHECK_FAILED",
                "data": {"command": " ".join(command)},
            }

        return {
            "ok": True,
            "message": "PHP server started",
            "error_code": None,
            "data": {"pid": proc.pid, "command": " ".join(command)},
        }

    def _stop_php(self) -> Dict[str, Any]:
        pid = self._read_php_pid()
        if not pid:
            return {"ok": True, "message": "PHP server is already stopped", "error_code": None, "data": {}}
        if not self._pid_alive(pid):
            self.php_pid_file.unlink(missing_ok=True)
            return {"ok": True, "message": "Removed stale PHP pid file", "error_code": None, "data": {"pid": pid}}

        try:
            os.killpg(pid, signal.SIGTERM)
        except ProcessLookupError:
            self.php_pid_file.unlink(missing_ok=True)
            return {"ok": True, "message": "PHP server already exited", "error_code": None, "data": {"pid": pid}}
        except PermissionError:
            return {
                "ok": False,
                "message": f"Permission denied while stopping pid {pid}",
                "error_code": "PERMISSION_DENIED",
                "data": {"pid": pid},
            }

        timeout = time.time() + 4
        while time.time() < timeout:
            if not self._pid_alive(pid):
                self.php_pid_file.unlink(missing_ok=True)
                return {"ok": True, "message": "PHP server stopped", "error_code": None, "data": {"pid": pid}}
            time.sleep(0.2)

        try:
            os.killpg(pid, signal.SIGKILL)
        except OSError:
            pass
        self.php_pid_file.unlink(missing_ok=True)
        return {"ok": True, "message": "PHP server killed", "error_code": None, "data": {"pid": pid}}

    def run_action(self, action: str, profile: Optional[str] = None, operation_id: str = "-") -> Dict[str, Any]:
        chosen = profile or self.get_selected_profile()
        if chosen not in {"php_builtin", "apache"}:
            return {"ok": False, "message": "Invalid profile", "error_code": "CHECK_FAILED", "data": {}}

        if chosen == "php_builtin":
            if action == "start":
                result = self._start_php()
            elif action == "stop":
                result = self._stop_php()
            elif action == "restart":
                stop_result = self._stop_php()
                if not stop_result["ok"]:
                    result = stop_result
                else:
                    result = self._start_php()
            else:
                result = {"ok": False, "message": "Unsupported action", "error_code": "CHECK_FAILED", "data": {}}
        else:
            if action not in {"start", "stop", "restart"}:
                result = {"ok": False, "message": "Unsupported action", "error_code": "CHECK_FAILED", "data": {}}
            else:
                result = self._run_apache(action)

        state = self._read_state()
        state["selected_profile"] = chosen
        state["last_action"] = f"{chosen}.{action}"
        state["last_operation_id"] = operation_id
        state["updated_at"] = time.time()
        self._write_state(state)

        level = "INFO" if result["ok"] else "ERROR"
        self.logs.log(level, "process", result["message"], operation_id=operation_id, metadata={
            "profile": chosen,
            "action": action,
            "error_code": result.get("error_code"),
        })
        return result
