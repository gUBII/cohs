from __future__ import annotations

from app.services.cleanup_service import CleanupService
from app.services.health_service import HealthService
from app.services.log_service import LogService
from app.services.process_manager import ProcessManager
from app.services.rebuild_service import RebuildService
from tests.helpers import make_settings


def test_rebuild_service_happy_path(tmp_path, monkeypatch):
    settings = make_settings(tmp_path)
    logs = LogService(settings)
    process = ProcessManager(settings, logs)
    cleanup = CleanupService(settings, logs)
    health = HealthService(settings, logs)
    rebuild = RebuildService(settings, logs, process, cleanup, health)

    monkeypatch.setattr(rebuild, "_validate_prerequisites", lambda: {"ok": True, "message": "ok", "error_code": None, "data": {}})
    monkeypatch.setattr(cleanup, "run", lambda operation_id="-": {"ok": True, "message": "clean", "error_code": None, "data": {}})
    monkeypatch.setattr(process, "run_action", lambda action, profile=None, operation_id="-": {"ok": True, "message": "restarted", "error_code": None, "data": {"action": action}})
    monkeypatch.setattr(health, "run", lambda profile, operation_id="-": {"ok": True, "message": "healthy", "error_code": None, "data": {}})

    result = rebuild.run(profile="php_builtin", operation_id="op-rebuild")
    assert result["ok"] is True
    assert result["data"]["restart"]["data"]["action"] == "restart"
