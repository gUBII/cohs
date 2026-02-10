from __future__ import annotations

from fastapi import APIRouter, Request
from fastapi.templating import Jinja2Templates

from .state import get_services


router = APIRouter(tags=["ui"])


def _templates() -> Jinja2Templates:
    services = get_services()
    return Jinja2Templates(directory=str(services.settings.templates_dir))


@router.get("/")
def index(request: Request):
    services = get_services()
    settings = services.settings
    return _templates().TemplateResponse(
        request,
        "index.html",
        {
            "request": request,
            "host": settings.host,
            "port": settings.port,
            "default_profile": services.process_manager.get_selected_profile(),
            "app_port": settings.app_port,
        },
    )
