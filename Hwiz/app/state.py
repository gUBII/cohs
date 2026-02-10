from __future__ import annotations

from dataclasses import dataclass

from .config import Settings, get_settings
from .services.cleanup_service import CleanupService
from .services.health_service import HealthService
from .services.log_service import LogService
from .services.operation_service import OperationRunner
from .services.process_manager import ProcessManager
from .services.rebuild_service import RebuildService


@dataclass
class Services:
    settings: Settings
    logs: LogService
    process_manager: ProcessManager
    cleanup_service: CleanupService
    health_service: HealthService
    rebuild_service: RebuildService
    operations: OperationRunner


_SERVICES: Services | None = None


def get_services() -> Services:
    global _SERVICES
    if _SERVICES is not None:
        return _SERVICES

    settings = get_settings()
    logs = LogService(settings)
    process_manager = ProcessManager(settings, logs)
    cleanup_service = CleanupService(settings, logs)
    health_service = HealthService(settings, logs)
    rebuild_service = RebuildService(settings, logs, process_manager, cleanup_service, health_service)
    operations = OperationRunner(settings.runtime_dir, logs)

    _SERVICES = Services(
        settings=settings,
        logs=logs,
        process_manager=process_manager,
        cleanup_service=cleanup_service,
        health_service=health_service,
        rebuild_service=rebuild_service,
        operations=operations,
    )
    return _SERVICES
