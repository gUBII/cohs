from __future__ import annotations

from datetime import datetime, timezone
from typing import Any, Dict, Optional


def utc_now_iso() -> str:
    return datetime.now(tz=timezone.utc).isoformat()


def envelope(
    ok: bool,
    message: str,
    data: Optional[Dict[str, Any]] = None,
    error_code: Optional[str] = None,
) -> Dict[str, Any]:
    return {
        "ok": ok,
        "message": message,
        "data": data,
        "error_code": error_code,
        "ts": utc_now_iso(),
    }
