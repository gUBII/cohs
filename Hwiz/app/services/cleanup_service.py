from __future__ import annotations

import os
from pathlib import Path
import shutil
from typing import Any, Dict, List

from ..config import Settings
from .log_service import LogService


class CleanupService:
    def __init__(self, settings: Settings, logs: LogService) -> None:
        self.settings = settings
        self.logs = logs

    @staticmethod
    def _remove_directory_contents(target: Path) -> int:
        removed = 0
        if not target.exists():
            return removed
        for entry in target.iterdir():
            if entry.name in {".gitkeep", ".keep"}:
                continue
            if entry.is_dir():
                shutil.rmtree(entry, ignore_errors=True)
                removed += 1
            else:
                entry.unlink(missing_ok=True)
                removed += 1
        return removed

    def _remove_stale_pid_files(self) -> List[str]:
        stale: List[str] = []
        for pid_file in self.settings.runtime_dir.glob("*.pid"):
            raw = pid_file.read_text(encoding="utf-8", errors="ignore").strip()
            if not raw.isdigit():
                pid_file.unlink(missing_ok=True)
                stale.append(str(pid_file))
                continue
            pid = int(raw)
            alive = True
            try:
                os.kill(pid, 0)
            except OSError:
                alive = False
            if not alive:
                pid_file.unlink(missing_ok=True)
                stale.append(str(pid_file))
        return stale

    def run(self, operation_id: str = "-") -> Dict[str, Any]:
        targets = [
            self.settings.cohs_root / "cache",
            self.settings.cohs_root / "logs",
            self.settings.cohs_root / "temp_uploads",
        ]

        removed_map: Dict[str, int] = {}
        for target in targets:
            removed_map[str(target)] = self._remove_directory_contents(target)

        tmp_removed = 0
        for tmp_file in self.settings.runtime_dir.glob("*.tmp"):
            tmp_file.unlink(missing_ok=True)
            tmp_removed += 1
        removed_map[str(self.settings.runtime_dir / "*.tmp")] = tmp_removed

        stale = self._remove_stale_pid_files()
        removed_map["stale_pid_files"] = len(stale)

        self.logs.log(
            "INFO",
            "cleanup",
            "Safe declutter completed",
            operation_id=operation_id,
            metadata={"removed": removed_map, "stale_pids": stale},
        )
        return {
            "ok": True,
            "message": "Declutter completed",
            "error_code": None,
            "data": {"removed": removed_map, "stale_pid_files": stale},
        }
