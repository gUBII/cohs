<?php
session_start();
if (!isset($_SESSION['user_id'])) { $_SESSION['user_id'] = 1; } // demo
$USER_ID = (int)$_SESSION['user_id'];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Notifications Auto Modal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
  .notif-time { font-size:.8rem; color:#6c757d; }
  .cursor-pointer { cursor:pointer; }
</style>
</head>
<body class="bg-light">

<!-- Optional bell (shows unread badge live) -->
<div class="position-fixed top-0 end-0 p-3">
  <button id="notifBell" type="button" class="btn btn-outline-primary position-relative">
    Notifications
    <span id="notifBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none">0</span>
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="notifModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title m-0">New Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="notifCloseX"></button>
      </div>
      <div class="modal-body p-0">
        <div id="notifListContainer" class="list-group list-group-flush"></div>
      </div>
      <div class="modal-footer">
        <button id="markAllRead" type="button" class="btn btn-success">Mark all as read</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="notifCloseBtn">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
(function(){
  const USER_ID = <?php echo $USER_ID; ?>;
  let lastSeenId = 0;         // highest notification id we’ve already popped for this tab
  let initialised = false;    // prevent popping on first load

  const modal = new bootstrap.Modal(document.getElementById('notifModal'), { backdrop:'static' });

  function updateBadge(n){
    const $b = $('#notifBadge');
    if(n>0){ $b.text(n).removeClass('d-none'); } else { $b.addClass('d-none'); }
  }

  function loadListAndShow(newIds){
    $.get('notify_list.php', { user_id: USER_ID, ids: newIds.join(',') })
      .done(function(html){
        $('#notifListContainer').html(html);
        modal.show();
      });
  }

  function poll(){
    $.getJSON('notify_poll.php', { user_id: USER_ID, last_seen_id: lastSeenId })
      .done(function(res){
        if(!res || res.success!==true) return;

        updateBadge(res.total_unread);

        // Only auto-pop if there are brand-new unread items since last poll (and not the initial baseline)
        if(res.new_ids && res.new_ids.length>0 && initialised){
          loadListAndShow(res.new_ids);
          lastSeenId = Math.max(lastSeenId, res.max_unread_id || lastSeenId);
        } else {
          // keep tracking top id
          lastSeenId = Math.max(lastSeenId, res.max_unread_id || lastSeenId);
        }
        if(!initialised) initialised = true;
      });
  }

  // First sync: get baseline without popping
  $.getJSON('notify_poll.php', { user_id: USER_ID, last_seen_id: 0 })
    .done(function(res){
      if(res && res.success){
        updateBadge(res.total_unread);
        lastSeenId = res.max_unread_id || 0;
        initialised = true;
      }
    });

  // Poll every 8 seconds
  setInterval(poll, 8000);

  // Manual open
  $('#notifBell').on('click', function(){
    $.get('notify_list.php', { user_id: USER_ID, limit: 20 })
      .done(function(html){
        $('#notifListContainer').html(html);
        modal.show();
      });
  });

  // Mark all read
  $('#markAllRead').on('click', function(){
    $.post('notify_mark_read.php', { user_id: USER_ID })
      .done(function(res){
        try{ res = JSON.parse(res); }catch(e){}
        if(res && res.success){
          updateBadge(0);
          $('#notifListContainer').html('<div class="p-4 text-center text-muted">All caught up.</div>');
        }
      });
  });

})();
</script>
</body>
</html>
