from __future__ import annotations

from contextlib import asynccontextmanager

from fastapi import FastAPI
from fastapi.staticfiles import StaticFiles

from .routes_api import router as api_router
from .routes_ui import router as ui_router
from .state import get_services


services = get_services()


@asynccontextmanager
async def lifespan(_app: FastAPI):
    services.logs.log(
        "INFO",
        "api",
        "Hwiz started",
        metadata={
            "host": services.settings.host,
            "port": services.settings.port,
            "cohs_root": str(services.settings.cohs_root),
        },
    )
    yield


app = FastAPI(title="Hwiz", version="1.0.0", lifespan=lifespan)

app.mount("/static", StaticFiles(directory=str(services.settings.static_dir)), name="static")
app.include_router(ui_router)
app.include_router(api_router)


@app.get("/ping")
def ping() -> dict[str, str]:
    return {"status": "ok"}
