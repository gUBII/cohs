from __future__ import annotations

from fastapi.testclient import TestClient

from app.main import app


def test_api_status_envelope_shape():
    client = TestClient(app)
    response = client.get("/api/status")
    assert response.status_code == 200
    payload = response.json()

    assert set(["ok", "message", "data", "error_code", "ts"]).issubset(payload.keys())
    assert payload["ok"] is True
    assert "status" in payload["data"]


def test_api_logs_envelope_shape():
    client = TestClient(app)
    response = client.get("/api/logs?page=1&page_size=10")
    assert response.status_code == 200
    payload = response.json()
    assert payload["ok"] is True
    assert "items" in payload["data"]
