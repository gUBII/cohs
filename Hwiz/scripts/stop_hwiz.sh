#!/usr/bin/env bash
set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PID_FILE="$ROOT_DIR/runtime/hwiz.pid"

if [[ ! -f "$PID_FILE" ]]; then
  echo "No hwiz.pid found"
  exit 0
fi

PID_VALUE="$(cat "$PID_FILE" || true)"
if [[ ! "$PID_VALUE" =~ ^[0-9]+$ ]]; then
  rm -f "$PID_FILE"
  echo "Invalid pid file removed"
  exit 0
fi

if kill -0 "$PID_VALUE" 2>/dev/null; then
  kill "$PID_VALUE" 2>/dev/null || true
  sleep 1
  if kill -0 "$PID_VALUE" 2>/dev/null; then
    kill -9 "$PID_VALUE" 2>/dev/null || true
  fi
fi

rm -f "$PID_FILE"
echo "Hwiz stopped"
