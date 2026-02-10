from __future__ import annotations

import asyncio
import json
from typing import Any, Dict, Optional

from fastapi import APIRouter, Query
from fastapi.responses import StreamingResponse

from .models import ActionRequest, LogQuery, ProfileSelectRequest
from .state import get_services
from .utils import envelope


router = APIRouter(prefix="/api", tags=["api"])


def _status_payload() -> Dict[str, Any]:
    services = get_services()
    status = services.process_manager.status()
    lock_info = services.operations.lock_info()
    recent = services.operations.recent(limit=10)
    return {
        "status": status,
        "lock": lock_info,
        "recent_operations": recent,
    }


@router.get("/status")
def api_status() -> Dict[str, Any]:
    return envelope(True, "Status collected", data=_status_payload())


@router.get("/operations/{operation_id}")
def api_operation(operation_id: str) -> Dict[str, Any]:
    services = get_services()
    operation = services.operations.get_operation(operation_id)
    if not operation:
        return envelope(False, "Operation not found", data=None, error_code="CHECK_FAILED")
    return envelope(True, "Operation found", data={"operation": operation})


@router.post("/profile/select")
def api_profile_select(payload: ProfileSelectRequest) -> Dict[str, Any]:
    services = get_services()
    result = services.process_manager.set_selected_profile(payload.profile)
    return envelope(result["ok"], result["message"], data=result.get("data") or {}, error_code=result.get("error_code"))


@router.post("/server/start")
def api_server_start(payload: Optional[ActionRequest] = None) -> Dict[str, Any]:
    services = get_services()
    profile = payload.profile if payload else None
    result = services.operations.submit(
        "server.start",
        lambda operation_id: services.process_manager.run_action("start", profile=profile, operation_id=operation_id),
    )
    return envelope(result["ok"], result["message"], data=result.get("data") or {}, error_code=result.get("error_code"))


@router.post("/server/stop")
def api_server_stop(payload: Optional[ActionRequest] = None) -> Dict[str, Any]:
    services = get_services()
    profile = payload.profile if payload else None
    result = services.operations.submit(
        "server.stop",
        lambda operation_id: services.process_manager.run_action("stop", profile=profile, operation_id=operation_id),
    )
    return envelope(result["ok"], result["message"], data=result.get("data") or {}, error_code=result.get("error_code"))


@router.post("/server/restart")
def api_server_restart(payload: Optional[ActionRequest] = None) -> Dict[str, Any]:
    services = get_services()
    profile = payload.profile if payload else None
    result = services.operations.submit(
        "server.restart",
        lambda operation_id: services.process_manager.run_action("restart", profile=profile, operation_id=operation_id),
    )
    return envelope(result["ok"], result["message"], data=result.get("data") or {}, error_code=result.get("error_code"))


@router.post("/rebuild")
def api_rebuild(payload: Optional[ActionRequest] = None) -> Dict[str, Any]:
    services = get_services()
    profile = payload.profile if payload else None
    result = services.operations.submit(
        "rebuild",
        lambda operation_id: services.rebuild_service.run(profile=profile, operation_id=operation_id),
    )
    return envelope(result["ok"], result["message"], data=result.get("data") or {}, error_code=result.get("error_code"))


@router.post("/declutter")
def api_declutter() -> Dict[str, Any]:
    services = get_services()
    result = services.operations.submit(
        "declutter",
        lambda operation_id: services.cleanup_service.run(operation_id=operation_id),
    )
    return envelope(result["ok"], result["message"], data=result.get("data") or {}, error_code=result.get("error_code"))


@router.get("/health")
def api_health(profile: Optional[str] = Query(default=None)) -> Dict[str, Any]:
    services = get_services()
    selected = profile or services.process_manager.get_selected_profile()
    result = services.health_service.run(selected)
    return envelope(result["ok"], result["message"], data=result.get("data") or {}, error_code=result.get("error_code"))


@router.get("/logs")
def api_logs(
    page: int = Query(default=1, ge=1),
    page_size: int = Query(default=100, ge=1, le=500),
    level: Optional[str] = None,
    source: Optional[str] = None,
    date: Optional[str] = None,
) -> Dict[str, Any]:
    services = get_services()
    _ = LogQuery(page=page, page_size=page_size, level=level, source=source, date=date)
    data = services.logs.list_logs(page=page, page_size=page_size, level=level, source=source, date_filter=date)
    return envelope(True, "Logs collected", data=data)


@router.get("/logs/stream")
async def api_logs_stream(last_seq: int = Query(default=0, ge=0)) -> StreamingResponse:
    services = get_services()

    async def _events() -> Any:
        seq = last_seq
        while True:
            entries = services.logs.memory_since(seq)
            if entries:
                for entry in entries:
                    seq = max(seq, int(entry.get("seq", 0)))
                    payload = json.dumps(entry, ensure_ascii=True)
                    yield f"data: {payload}\n\n"
            else:
                yield ": keepalive\n\n"
            await asyncio.sleep(1)

    return StreamingResponse(_events(), media_type="text/event-stream")
