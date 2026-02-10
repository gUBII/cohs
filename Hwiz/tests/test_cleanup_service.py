from __future__ import annotations

from app.services.cleanup_service import CleanupService
from app.services.log_service import LogService
from tests.helpers import make_settings


def test_cleanup_service_preserves_business_data(tmp_path):
    settings = make_settings(tmp_path)
    logs = LogService(settings)
    service = CleanupService(settings, logs)

    safe_file = settings.cohs_root / "cache" / "old.tmp"
    safe_file.write_text("x", encoding="utf-8")

    media_dir = settings.cohs_root / "media"
    media_dir.mkdir(parents=True, exist_ok=True)
    media_file = media_dir / "keep.bin"
    media_file.write_text("keep", encoding="utf-8")

    pid_file = settings.runtime_dir / "stale.pid"
    pid_file.write_text("999999", encoding="utf-8")

    result = service.run(operation_id="op-clean")
    assert result["ok"] is True
    assert not safe_file.exists()
    assert media_file.exists()
    assert not pid_file.exists()
