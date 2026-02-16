# Hwiz

Local run-orchestrator dashboard for the COHS PHP SaaS repository.

## What it does
- Controls server profiles: `php_builtin` and `apache`.
- Supports actions: `start`, `stop`, `restart`, `rebuild`, `declutter`.
- Provides health checks for PHP/ext/path writability and URL probe.
- Streams structured logs and stores operation history.

## Folder layout
- `app/`: FastAPI app, routes, services, config.
- `web/templates/`: Dashboard HTML template.
- `web/static/`: CSS and browser JS.
- `runtime/`: pid/lock/state/operation files.
- `logs/`: Hwiz logs (daily, capped, retained).
- `scripts/`: shell helpers to run/stop Hwiz.
- `tests/`: unit and API tests.

## Quick start
```bash
cd /Users/moofasa/cohs/Hwiz
python3 -m venv .venv
source .venv/bin/activate
pip install -r requirements.txt
cp .env.example .env
./scripts/run_hwiz.sh
```

Open `http://127.0.0.1:8787`.

## Stop
```bash
cd /Users/moofasa/cohs/Hwiz
./scripts/stop_hwiz.sh
```

## API endpoints
- `GET /api/status`
- `POST /api/profile/select`
- `POST /api/server/start`
- `POST /api/server/stop`
- `POST /api/server/restart`
- `POST /api/rebuild`
- `POST /api/declutter`
- `GET /api/health`
- `GET /api/logs`
- `GET /api/logs/stream`
- `GET /api/operations/{id}`

## Notes
- `Declutter` only targets safe cache/log/temp paths and stale pid/tmp files.
- `Rebuild` validates PHP + required extensions, validates writable dirs, runs declutter, restarts selected profile, then runs health checks.
- Apache commands can fail with `PERMISSION_DENIED` depending on local privileges.
- If local PHP is missing a module by design (for example Homebrew PHP compiled with `--disable-intl`), set `REQUIRED_PHP_EXTENSIONS` in `/Users/moofasa/cohs/Hwiz/.env` to the exact extension list you require.
- If the COHS app loops between login/logout, it usually means the app is not being served under `/cohs` (the PHP app checks `$_SERVER['PHP_SELF']` against `/cohs/*`). Set `APP_BASE_PATH=/cohs` (default) and ensure the server docroot is the parent folder of `COHS_ROOT` so URLs like `/cohs/login.php` resolve.
