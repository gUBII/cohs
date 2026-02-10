from __future__ import annotations

from collections import deque
from datetime import date, datetime, timedelta
import json
from pathlib import Path
import threading
from typing import Any, Deque, Dict, List, Optional

from ..config import Settings
from ..utils import utc_now_iso


class LogService:
    def __init__(self, settings: Settings) -> None:
        self.settings = settings
        self.logs_dir = settings.logs_dir
        self.max_bytes = settings.log_max_mb * 1024 * 1024
        self.retention_days = settings.log_retention_days
        self._lock = threading.Lock()
        self._seq = 0
        self._memory: Deque[Dict[str, Any]] = deque(maxlen=3000)
        self.logs_dir.mkdir(parents=True, exist_ok=True)

    def _today_base(self) -> str:
        return f"hwiz-{date.today().isoformat()}"

    def _pick_log_file(self) -> Path:
        base = self._today_base()
        primary = self.logs_dir / f"{base}.log"
        if not primary.exists() or primary.stat().st_size < self.max_bytes:
            return primary

        idx = 1
        while True:
            candidate = self.logs_dir / f"{base}-{idx}.log"
            if not candidate.exists() or candidate.stat().st_size < self.max_bytes:
                return candidate
            idx += 1

    def _prune_old_files(self) -> None:
        cutoff = date.today() - timedelta(days=self.retention_days)
        for file_path in self.logs_dir.glob("hwiz-*.log"):
            name = file_path.stem
            parts = name.split("-")
            if len(parts) < 4:
                continue
            date_part = "-".join(parts[1:4])
            try:
                file_date = datetime.strptime(date_part, "%Y-%m-%d").date()
            except ValueError:
                continue
            if file_date < cutoff:
                file_path.unlink(missing_ok=True)

    @staticmethod
    def _format_entry(entry: Dict[str, Any]) -> str:
        metadata = json.dumps(entry.get("metadata") or {}, separators=(",", ":"), ensure_ascii=True)
        return (
            f"{entry['timestamp']}|{entry['level']}|{entry['source']}|"
            f"{entry['operation_id']}|{entry['message']}|{metadata}"
        )

    @staticmethod
    def _parse_line(line: str) -> Optional[Dict[str, Any]]:
        raw = line.strip()
        if not raw:
            return None
        parts = raw.split("|", 5)
        if len(parts) != 6:
            return None
        timestamp, level, source, operation_id, message, metadata_raw = parts
        try:
            metadata = json.loads(metadata_raw) if metadata_raw else {}
        except json.JSONDecodeError:
            metadata = {"raw": metadata_raw}
        return {
            "timestamp": timestamp,
            "level": level,
            "source": source,
            "operation_id": operation_id,
            "message": message,
            "metadata": metadata,
        }

    def log(
        self,
        level: str,
        source: str,
        message: str,
        operation_id: str = "-",
        metadata: Optional[Dict[str, Any]] = None,
    ) -> Dict[str, Any]:
        entry = {
            "timestamp": utc_now_iso(),
            "level": level.upper(),
            "source": source,
            "operation_id": operation_id,
            "message": message,
            "metadata": metadata or {},
        }

        with self._lock:
            self._seq += 1
            entry["seq"] = self._seq
            file_path = self._pick_log_file()
            with file_path.open("a", encoding="utf-8") as handle:
                handle.write(self._format_entry(entry) + "\n")
            self._memory.append(entry)
            if self._seq % 25 == 0:
                self._prune_old_files()

        return entry

    def memory_since(self, last_seq: int) -> List[Dict[str, Any]]:
        with self._lock:
            return [entry for entry in list(self._memory) if int(entry["seq"]) > last_seq]

    def list_logs(
        self,
        page: int,
        page_size: int,
        level: Optional[str] = None,
        source: Optional[str] = None,
        date_filter: Optional[str] = None,
    ) -> Dict[str, Any]:
        files: List[Path]
        if date_filter:
            files = sorted(self.logs_dir.glob(f"hwiz-{date_filter}*.log"))
        else:
            files = sorted(self.logs_dir.glob("hwiz-*.log"))

        entries: List[Dict[str, Any]] = []
        for file_path in files:
            for line in file_path.read_text(encoding="utf-8", errors="ignore").splitlines():
                parsed = self._parse_line(line)
                if not parsed:
                    continue
                entries.append(parsed)

        if level:
            entries = [entry for entry in entries if entry["level"].lower() == level.lower()]
        if source:
            entries = [entry for entry in entries if entry["source"].lower() == source.lower()]

        entries.sort(key=lambda item: item["timestamp"], reverse=True)
        total = len(entries)
        start = (page - 1) * page_size
        end = start + page_size
        return {
            "page": page,
            "page_size": page_size,
            "total": total,
            "items": entries[start:end],
        }
