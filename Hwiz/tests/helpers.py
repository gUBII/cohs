from __future__ import annotations

from pathlib import Path

from app.config import Settings


def make_settings(tmp_path: Path) -> Settings:
    hwiz_root = tmp_path / "Hwiz"
    cohs_root = tmp_path / "cohs"
    for path in [
        hwiz_root,
        hwiz_root / "web" / "templates",
        hwiz_root / "web" / "static",
        hwiz_root / "runtime",
        hwiz_root / "logs",
        cohs_root,
        cohs_root / "cache",
        cohs_root / "logs",
        cohs_root / "temp_uploads",
        cohs_root / "call" / "upload",
    ]:
        path.mkdir(parents=True, exist_ok=True)

    return Settings(
        hwiz_root=hwiz_root,
        cohs_root=cohs_root,
        web_root=hwiz_root / "web",
        templates_dir=hwiz_root / "web" / "templates",
        static_dir=hwiz_root / "web" / "static",
        runtime_dir=hwiz_root / "runtime",
        logs_dir=hwiz_root / "logs",
        host="127.0.0.1",
        port=8787,
        app_port=8080,
        default_profile="php_builtin",
        apache_health_url="http://127.0.0.1/cohs/index.php",
        log_retention_days=14,
        log_max_mb=10,
        health_timeout_sec=1,
        required_php_extensions=["mysqli", "curl", "openssl", "zip", "gd", "intl", "mbstring", "json"],
    )
