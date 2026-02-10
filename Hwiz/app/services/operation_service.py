from __future__ import annotations

from datetime import datetime, timezone
import json
from pathlib import Path
import threading
import traceback
from typing import Any, Callable, Dict, Optional
from uuid import uuid4

from .log_service import LogService


class OperationRunner:
    def __init__(self, runtime_dir: Path, logs: LogService) -> None:
        self.runtime_dir = runtime_dir
        self.logs = logs
        self.runtime_dir.mkdir(parents=True, exist_ok=True)
        self.operations_file = self.runtime_dir / "operations.json"
        self.lock_file = self.runtime_dir / "operation.lock"
        self._lock = threading.Lock()
        self._op_lock = threading.Lock()
        self._operations: Dict[str, Dict[str, Any]] = self._load()

    @staticmethod
    def _now() -> str:
        return datetime.now(timezone.utc).isoformat()

    def _load(self) -> Dict[str, Dict[str, Any]]:
        if not self.operations_file.exists():
            return {}
        try:
            content = json.loads(self.operations_file.read_text(encoding="utf-8"))
            if isinstance(content, dict):
                return content
        except json.JSONDecodeError:
            return {}
        return {}

    def _save(self) -> None:
        items = sorted(self._operations.items(), key=lambda item: item[1].get("started_at", ""), reverse=True)
        trimmed = dict(items[:250])
        self._operations = trimmed
        self.operations_file.write_text(json.dumps(trimmed, indent=2), encoding="utf-8")

    def _set(self, operation_id: str, payload: Dict[str, Any]) -> None:
        with self._op_lock:
            self._operations[operation_id] = payload
            self._save()

    def lock_info(self) -> Dict[str, Any]:
        with self._lock:
            if self.lock_file.exists():
                try:
                    return json.loads(self.lock_file.read_text(encoding="utf-8"))
                except json.JSONDecodeError:
                    return {"locked": True, "operation_id": None}
            return {"locked": False, "operation_id": None}

    def get_operation(self, operation_id: str) -> Optional[Dict[str, Any]]:
        return self._operations.get(operation_id)

    def recent(self, limit: int = 20) -> list[Dict[str, Any]]:
        entries = sorted(self._operations.values(), key=lambda item: item.get("started_at", ""), reverse=True)
        return entries[:limit]

    def submit(self, name: str, runner: Callable[[str], Dict[str, Any]]) -> Dict[str, Any]:
        if not self._lock.acquire(blocking=False):
            lock_info = self.lock_info()
            return {
                "ok": False,
                "message": "Another operation is already running",
                "error_code": "LOCK_HELD",
                "data": lock_info,
            }

        operation_id = uuid4().hex[:12]
        operation = {
            "id": operation_id,
            "name": name,
            "status": "running",
            "started_at": self._now(),
            "finished_at": None,
            "result": None,
        }
        self._set(operation_id, operation)
        self.lock_file.write_text(json.dumps({"locked": True, "operation_id": operation_id}), encoding="utf-8")

        def _target() -> None:
            try:
                self.logs.log("INFO", "api", f"Operation {name} started", operation_id=operation_id)
                result = runner(operation_id)
                operation.update(
                    {
                        "status": "success" if result.get("ok") else "failed",
                        "finished_at": self._now(),
                        "result": result,
                    }
                )
                self._set(operation_id, operation)
            except Exception as exc:  # pylint: disable=broad-except
                operation.update(
                    {
                        "status": "failed",
                        "finished_at": self._now(),
                        "result": {
                            "ok": False,
                            "message": str(exc),
                            "error_code": "CHECK_FAILED",
                            "data": {"traceback": traceback.format_exc()},
                        },
                    }
                )
                self._set(operation_id, operation)
                self.logs.log("ERROR", "api", f"Operation {name} crashed", operation_id=operation_id, metadata={"error": str(exc)})
            finally:
                self.lock_file.unlink(missing_ok=True)
                self._lock.release()

        thread = threading.Thread(target=_target, daemon=True)
        thread.start()
        return {
            "ok": True,
            "message": f"Operation {name} accepted",
            "error_code": None,
            "data": {
                "operation_id": operation_id,
                "status": "running",
            },
        }
