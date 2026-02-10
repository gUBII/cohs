from __future__ import annotations

import time

from app.services.log_service import LogService
from app.services.operation_service import OperationRunner
from tests.helpers import make_settings


def test_operation_runner_lock_and_completion(tmp_path):
    settings = make_settings(tmp_path)
    logs = LogService(settings)
    runner = OperationRunner(settings.runtime_dir, logs)

    def job(operation_id):
        time.sleep(0.2)
        return {"ok": True, "message": "done", "error_code": None, "data": {"id": operation_id}}

    first = runner.submit("job1", job)
    second = runner.submit("job2", job)

    assert first["ok"] is True
    assert second["ok"] is False
    assert second["error_code"] == "LOCK_HELD"

    time.sleep(0.4)
    op = runner.get_operation(first["data"]["operation_id"])
    assert op is not None
    assert op["status"] == "success"
