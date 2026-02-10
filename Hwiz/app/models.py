from __future__ import annotations

from typing import Any, Dict, Literal, Optional
from pydantic import BaseModel, Field


ProfileName = Literal["php_builtin", "apache"]


class ApiEnvelope(BaseModel):
    ok: bool
    message: str
    data: Optional[Dict[str, Any]] = None
    error_code: Optional[str] = None
    ts: str


class ProfileSelectRequest(BaseModel):
    profile: ProfileName


class ActionRequest(BaseModel):
    profile: Optional[ProfileName] = None


class LogQuery(BaseModel):
    page: int = Field(default=1, ge=1)
    page_size: int = Field(default=100, ge=1, le=500)
    level: Optional[str] = None
    source: Optional[str] = None
    date: Optional[str] = None
