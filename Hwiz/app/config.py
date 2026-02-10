from __future__ import annotations

from dataclasses import dataclass
from pathlib import Path
import os
from typing import Dict, List


def _load_env_file(env_path: Path) -> Dict[str, str]:
    values: Dict[str, str] = {}
    if not env_path.exists():
        return values
    for raw_line in env_path.read_text(encoding="utf-8").splitlines():
        line = raw_line.strip()
        if not line or line.startswith("#") or "=" not in line:
            continue
        key, value = line.split("=", 1)
        values[key.strip()] = value.strip().strip('"').strip("'")
    return values


@dataclass(frozen=True)
class Settings:
    hwiz_root: Path
    cohs_root: Path
    web_root: Path
    templates_dir: Path
    static_dir: Path
    runtime_dir: Path
    logs_dir: Path
    host: str
    port: int
    app_port: int
    default_profile: str
    apache_health_url: str
    log_retention_days: int
    log_max_mb: int
    health_timeout_sec: int
    required_php_extensions: List[str]


def _pick(key: str, env_values: Dict[str, str], fallback: str) -> str:
    return os.getenv(key) or env_values.get(key, fallback)


_SETTINGS: Settings | None = None


def get_settings() -> Settings:
    global _SETTINGS
    if _SETTINGS is not None:
        return _SETTINGS

    hwiz_root = Path(__file__).resolve().parents[1]
    env_values = _load_env_file(hwiz_root / ".env")

    cohs_root_default = str(hwiz_root.parent)
    cohs_root = Path(_pick("COHS_ROOT", env_values, cohs_root_default)).expanduser().resolve()
    if not cohs_root.exists():
        raise RuntimeError(f"COHS_ROOT does not exist: {cohs_root}")

    settings = Settings(
        hwiz_root=hwiz_root,
        cohs_root=cohs_root,
        web_root=hwiz_root / "web",
        templates_dir=hwiz_root / "web" / "templates",
        static_dir=hwiz_root / "web" / "static",
        runtime_dir=hwiz_root / "runtime",
        logs_dir=hwiz_root / "logs",
        host=_pick("HWIZ_HOST", env_values, "127.0.0.1"),
        port=int(_pick("HWIZ_PORT", env_values, "8787")),
        app_port=int(_pick("APP_PORT", env_values, "8080")),
        default_profile=_pick("DEFAULT_PROFILE", env_values, "php_builtin"),
        apache_health_url=_pick("APACHE_HEALTH_URL", env_values, "http://127.0.0.1/cohs/index.php"),
        log_retention_days=int(_pick("LOG_RETENTION_DAYS", env_values, "14")),
        log_max_mb=int(_pick("LOG_MAX_MB", env_values, "10")),
        health_timeout_sec=int(_pick("HEALTH_TIMEOUT_SEC", env_values, "5")),
        required_php_extensions=[
            "curl",
            "gd",
            "intl",
            "json",
            "mbstring",
            "mysqli",
            "openssl",
            "zip",
        ],
    )

    for path in [settings.runtime_dir, settings.logs_dir, settings.templates_dir, settings.static_dir]:
        path.mkdir(parents=True, exist_ok=True)

    _SETTINGS = settings
    return settings
