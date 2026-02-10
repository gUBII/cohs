from __future__ import annotations

from app.services.log_service import LogService
from app.services.process_manager import ProcessManager
from tests.helpers import make_settings


def test_process_manager_routes_actions(tmp_path, monkeypatch):
    settings = make_settings(tmp_path)
    logs = LogService(settings)
    manager = ProcessManager(settings, logs)

    calls = []

    monkeypatch.setattr(manager, "_start_php", lambda: calls.append("start") or {"ok": True, "message": "started", "error_code": None, "data": {}})
    monkeypatch.setattr(manager, "_stop_php", lambda: calls.append("stop") or {"ok": True, "message": "stopped", "error_code": None, "data": {}})

    result = manager.run_action("restart", profile="php_builtin", operation_id="op-restart")
    assert result["ok"] is True
    assert calls == ["stop", "start"]


def test_process_manager_invalid_profile(tmp_path):
    settings = make_settings(tmp_path)
    logs = LogService(settings)
    manager = ProcessManager(settings, logs)
    result = manager.run_action("start", profile="bad-profile", operation_id="op-bad")
    assert result["ok"] is False
    assert result["error_code"] == "CHECK_FAILED"
