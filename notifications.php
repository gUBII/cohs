<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Auto Notifications (Stack + Select)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .notif-card{border:1px solid #e4e4e4;border-radius:.5rem;padding:.75rem;margin-bottom:.5rem;background:#fff;}
    .notif-title{font-weight:600;}
    .notif-time{font-size:.85rem;color:#6c757d;}
    .notif-actions{display:flex;align-items:center;gap:.75rem;}
  </style>
</head>
<body class="bg-light">

<!-- Floating bell is optional; modal opens automatically on new rows -->
<div class="position-fixed top-0 end-0 p-3">
  <button type="button" id="openManually" class="btn btn-outline-primary">Open Notifications</button>
</div>

<!-- Modal -->
<div class="modal fade" id="notifModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title m-0">New Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="notifCloseX"></button>
      </div>

      <div class="modal-body">
        <!-- Bulk actions toolbar -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="notif-actions">
            <div class="form-check m-0">
              <input class="form-check-input" type="checkbox" id="selectAll">
              <label class="form-check-label" for="selectAll">Select all</label>
            </div>
            <button class="btn btn-success btn-sm" id="markSelected">Mark selected as read</button>
            <button class="btn btn-outline-secondary btn-sm" id="clearSelected">Clear selection</button>
          </div>
          <button class="btn btn-danger btn-sm" id="markAllRead">Mark all as read</button>
        </div>

        <div id="notifBody"></div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="notifCloseBtn">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
// --- State ---
let lastId = 0;
let isOpen = false;
const shownIds = new Set();
const modalEl = document.getElementById('notifModal');
const modal = new bootstrap.Modal(modalEl);

// --- Utilities ---
function escapeHtml(s){
  return String(s)
    .replace(/&/g,'&amp;')
    .replace(/</g,'&lt;')
    .replace(/>/g,'&gt;')
    .replace(/"/g,'&quot;')
    .replace(/'/g,'&#39;');
}
function nl2br(s){ return String(s).replace(/\n/g,'<br>'); }

// Card renderer with checkbox
function renderItem(n){
  const id = Number(n.id);
  return `
    <div class="notif-card d-flex gap-2 align-items-start" data-id="${id}">
      <div class="form-check mt-1">
        <input class="form-check-input notif-check" type="checkbox" value="${id}">
      </div>
      <div class="flex-grow-1">
        <div class="notif-title">${escapeHtml(n.title)}</div>
        <div class="mt-1">${nl2br(escapeHtml(n.message))}</div>
        <div class="notif-time mt-1">${escapeHtml(n.created_at)}</div>
      </div>
    </div>
  `;
}

// --- Polling (auto-append new items; pop modal if closed) ---
function poll() {
  $.getJSON("notify_check.php", { last_id: lastId }, function(res){
    if(!res || !Array.isArray(res.new)) return;

    let appended = 0;
    res.new.forEach(n => {
      const nid = Number(n.id);
      if(!shownIds.has(nid)){ // avoid duplicates
        $("#notifBody").append(renderItem(n));
        shownIds.add(nid);
        appended++;
      }
      if(nid > lastId) lastId = nid;
    });

    if(appended > 0 && !isOpen){
      modal.show();
      isOpen = true;
    }
  });
}

// --- Selection helpers ---
function getSelectedIds(){
  const ids = [];
  $(".notif-check:checked").each(function(){ ids.push(parseInt(this.value,10)); });
  return ids;
}
function setAllSelection(checked){
  $(".notif-check").prop("checked", checked);
}

// --- Events ---
modalEl.addEventListener('hidden.bs.modal', () => { isOpen = false; });

$("#selectAll").on("change", function(){
  setAllSelection(this.checked);
});

$("#clearSelected").on("click", function(){
  setAllSelection(false);
  $("#selectAll").prop("checked", false);
});

$("#markSelected").on("click", function(){
  const ids = getSelectedIds();
  if(ids.length === 0) return;

  $.ajax({
    url: "notify_read_selected.php",
    type: "POST",
    data: { ids: ids },
    success: function(resp){
      // Remove only those cards from UI
      ids.forEach(id => {
        $(`.notif-card[data-id='${id}']`).remove();
        shownIds.delete(Number(id));
      });
      // If nothing left, you can optionally hide the modal
      if($("#notifBody").children().length === 0){
        modal.hide();
      }
      // Reset selection toggles
      $("#selectAll").prop("checked", false);
    }
  });
});

$("#markAllRead").on("click", function(){
  $.post("notify_read.php", function(){
    // Clear UI
    $("#notifBody").html("");
    shownIds.clear();
    $("#selectAll").prop("checked", false);
    modal.hide();
  });
});

// Optional: manual open (loads current unread list quickly)
$("#openManually").on("click", function(){
  // Force showing whatever is already stacked
  modal.show();
  isOpen = true;
});

// Start polling (adjust interval as you like)
setInterval(poll, 5000);
</script>
</body>
</html>
