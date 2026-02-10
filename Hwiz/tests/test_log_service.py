from __future__ import annotations

from app.services.log_service import LogService
from tests.helpers import make_settings


def test_log_service_write_and_read(tmp_path):
    settings = make_settings(tmp_path)
    service = LogService(settings)

    first = service.log("INFO", "api", "hello", operation_id="op1", metadata={"a": 1})
    second = service.log("ERROR", "process", "boom", operation_id="op2", metadata={"b": 2})

    assert first["seq"] < second["seq"]

    listed = service.list_logs(page=1, page_size=50)
    assert listed["total"] == 2
    assert listed["items"][0]["message"] == "boom"

    streamed = service.memory_since(first["seq"])
    assert len(streamed) == 1
    assert streamed[0]["operation_id"] == "op2"
