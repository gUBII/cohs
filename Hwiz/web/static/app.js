const state = {
  selectedProfile: window.HWIZ_BOOT.defaultProfile || "php_builtin",
  operationStatus: {},
  filterSource: "",
  filterLevel: "",
  stream: null,
};

const profileSelect = document.getElementById("profileSelect");
const applyProfileButton = document.getElementById("applyProfile");
const actionButtons = Array.from(document.querySelectorAll(".action-btn"));
const serverStatus = document.getElementById("serverStatus");
const healthStatus = document.getElementById("healthStatus");
const lockState = document.getElementById("lockState");
const operationsBody = document.getElementById("operationsBody");
const logView = document.getElementById("logView");
const filterSourceInput = document.getElementById("filterSource");
const filterLevelInput = document.getElementById("filterLevel");
const applyFiltersButton = document.getElementById("applyFilters");
const clearLogsButton = document.getElementById("clearLogs");
const toast = document.getElementById("toast");

profileSelect.value = state.selectedProfile;

function showToast(message, isError = false) {
  toast.textContent = message;
  toast.classList.remove("hidden", "error");
  if (isError) toast.classList.add("error");
  setTimeout(() => toast.classList.add("hidden"), 4000);
}

async function api(path, options = {}) {
  const response = await fetch(path, {
    headers: { "Content-Type": "application/json" },
    ...options,
  });
  const payload = await response.json();
  if (!response.ok) {
    throw new Error(payload.message || `HTTP ${response.status}`);
  }
  return payload;
}

function escapeText(value) {
  return String(value ?? "-")
    .replaceAll("&", "&amp;")
    .replaceAll("<", "&lt;")
    .replaceAll(">", "&gt;");
}

function renderKv(target, rows) {
  target.innerHTML = rows
    .map(([k, v]) => `<div class="k">${escapeText(k)}</div><div class="v">${escapeText(v)}</div>`)
    .join("");
}

function formatOperationMessage(operation) {
  if (!operation || !operation.result) {
    return "-";
  }
  const message = operation.result.message || "-";
  const data = operation.result.data || {};
  const command = data.command ? ` | cmd: ${data.command}` : "";
  return `${message}${command}`;
}

function renderOperations(items) {
  operationsBody.innerHTML = items
    .map((operation) => {
      return `<tr>
        <td>${escapeText(operation.id)}</td>
        <td>${escapeText(operation.name)}</td>
        <td>${escapeText(operation.status)}</td>
        <td>${escapeText(operation.started_at)}</td>
        <td>${escapeText(operation.finished_at || "-")}</td>
        <td>${escapeText(formatOperationMessage(operation))}</td>
      </tr>`;
    })
    .join("");

  items.forEach((operation) => {
    const previous = state.operationStatus[operation.id];
    if (previous === "running" && operation.status !== "running") {
      const failed = operation.status !== "success";
      showToast(
        `${operation.name} ${operation.status}: ${formatOperationMessage(operation)}`,
        failed,
      );
    }
    state.operationStatus[operation.id] = operation.status;
  });
}

function appendLogLine(entry) {
  if (state.filterSource && entry.source.toLowerCase() !== state.filterSource.toLowerCase()) {
    return;
  }
  if (state.filterLevel && entry.level.toLowerCase() !== state.filterLevel.toLowerCase()) {
    return;
  }
  const metadata = JSON.stringify(entry.metadata || {});
  const line = `${entry.timestamp} | ${entry.level} | ${entry.source} | ${entry.operation_id} | ${entry.message} | ${metadata}`;
  logView.textContent += (logView.textContent ? "\n" : "") + line;
  logView.scrollTop = logView.scrollHeight;
}

async function refreshLogs() {
  const params = new URLSearchParams({ page: "1", page_size: "150" });
  if (state.filterSource) params.set("source", state.filterSource);
  if (state.filterLevel) params.set("level", state.filterLevel);
  const result = await api(`/api/logs?${params.toString()}`);
  const items = result.data.items || [];
  logView.textContent = "";
  items.slice().reverse().forEach((entry) => appendLogLine(entry));
}

function openStream() {
  if (state.stream) {
    state.stream.close();
  }
  state.stream = new EventSource("/api/logs/stream?last_seq=0");
  state.stream.onmessage = (event) => {
    try {
      const entry = JSON.parse(event.data);
      appendLogLine(entry);
    } catch (_error) {
      // ignore malformed stream events
    }
  };
}

async function refreshStatus() {
  const result = await api("/api/status");
  const payload = result.data || {};
  const status = payload.status || {};
  const active = status.active || {};
  const lock = payload.lock || { locked: false };
  const ops = payload.recent_operations || [];

  state.selectedProfile = status.selected_profile || state.selectedProfile;
  profileSelect.value = state.selectedProfile;

  renderKv(serverStatus, [
    ["Selected profile", status.selected_profile],
    ["Running", String(active.running)],
    ["Available", String(active.available)],
    ["PID", active.pid || "-"],
    ["Uptime", active.uptime || "-"],
    ["Health URL", active.health_url || "-"],
  ]);

  lockState.textContent = lock.locked
    ? `Operation lock active: ${lock.operation_id || "unknown"}`
    : "Operation lock is free";

  const disabled = Boolean(lock.locked);
  actionButtons.forEach((button) => {
    button.disabled = disabled;
  });

  renderOperations(ops);
  await refreshHealth();
}

async function refreshHealth() {
  const result = await api(`/api/health?profile=${encodeURIComponent(state.selectedProfile)}`);
  const payload = result.data || {};
  const php = payload.php || {};
  const probe = payload.probe || {};
  const missingExt = (php.missing_extensions || []).join(", ") || "none";
  renderKv(healthStatus, [
    ["PHP available", String(php.available)],
    ["PHP version", php.version || "-"],
    ["Missing extensions", missingExt],
    ["URL probe", String(probe.ok)],
    ["Probe URL", probe.url || "-"],
  ]);
}

async function performAction(action) {
  if (action === "rebuild") {
    const confirmed = window.confirm(document.getElementById("dryPreview").textContent.trim());
    if (!confirmed) return;
  }
  if (action === "declutter") {
    const confirmed = window.confirm(document.getElementById("declutterPreview").textContent.trim());
    if (!confirmed) return;
  }

  const endpointMap = {
    start: "/api/server/start",
    stop: "/api/server/stop",
    restart: "/api/server/restart",
    rebuild: "/api/rebuild",
    declutter: "/api/declutter",
  };

  const endpoint = endpointMap[action];
  const body = action === "declutter" ? {} : { profile: state.selectedProfile };
  const result = await api(endpoint, { method: "POST", body: JSON.stringify(body) });
  if (!result.ok) {
    showToast(result.message, true);
    return;
  }
  const opId = result.data.operation_id;
  showToast(opId ? `${action} accepted (${opId})` : `${action} accepted`);
}

applyProfileButton.addEventListener("click", async () => {
  const profile = profileSelect.value;
  const result = await api("/api/profile/select", {
    method: "POST",
    body: JSON.stringify({ profile }),
  });
  if (!result.ok) {
    showToast(result.message, true);
    return;
  }
  state.selectedProfile = profile;
  showToast(`Profile set to ${profile}`);
  await refreshStatus();
});

actionButtons.forEach((button) => {
  button.addEventListener("click", async () => {
    try {
      await performAction(button.dataset.action);
      await refreshStatus();
    } catch (error) {
      showToast(error.message || "Action failed", true);
    }
  });
});

applyFiltersButton.addEventListener("click", async () => {
  state.filterSource = filterSourceInput.value.trim();
  state.filterLevel = filterLevelInput.value.trim();
  await refreshLogs();
});

clearLogsButton.addEventListener("click", () => {
  logView.textContent = "";
});

async function boot() {
  try {
    await refreshStatus();
    await refreshLogs();
    openStream();
    setInterval(async () => {
      try {
        await refreshStatus();
      } catch (error) {
        showToast(error.message || "Status refresh failed", true);
      }
    }, 3000);
  } catch (error) {
    showToast(error.message || "Startup failed", true);
  }
}

boot();
