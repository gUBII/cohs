#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
HOST="${HWIZ_HOST:-127.0.0.1}"
PORT="${HWIZ_PORT:-8787}"
PYTHON_BIN="${PYTHON_BIN:-python3}"
PID_FILE="$ROOT_DIR/runtime/hwiz.pid"
LOG_FILE="$ROOT_DIR/logs/hwiz-server.log"

mkdir -p "$ROOT_DIR/runtime" "$ROOT_DIR/logs"

if [[ -f "$PID_FILE" ]]; then
  PID_VALUE="$(cat "$PID_FILE" || true)"
  if [[ "$PID_VALUE" =~ ^[0-9]+$ ]] && kill -0 "$PID_VALUE" 2>/dev/null; then
    echo "Hwiz is already running on PID $PID_VALUE"
    exit 0
  fi
  rm -f "$PID_FILE"
fi

cd "$ROOT_DIR"
nohup "$PYTHON_BIN" -m uvicorn app.main:app --host "$HOST" --port "$PORT" --app-dir "$ROOT_DIR" >> "$LOG_FILE" 2>&1 &
SERVER_PID=$!
echo "$SERVER_PID" > "$PID_FILE"

echo "Hwiz started on http://$HOST:$PORT (pid=$SERVER_PID)"
