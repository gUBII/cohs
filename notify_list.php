<?php
require_once 'include.php';

$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
$ids_csv  = isset($_GET['ids']) ? trim($_GET['ids']) : '';
$limit    = isset($_GET['limit']) ? (int)$_GET['limit'] : 0;
if ($user_id <= 0) { http_response_code(400); exit; }

if ($ids_csv !== '') {
    // Render only the brand-new ids in ASC order
    $ids = array_filter(array_map('intval', explode(',', $ids_csv)));
    if (empty($ids)) { echo ''; exit; }
    $in  = implode(',', array_fill(0, count($ids), '?'));
    $types = str_repeat('i', count($ids)+1);
    $sql = "SELECT id,title,message,created_at FROM notifications WHERE user_id=? AND id IN ($in) ORDER BY id ASC";
    $stmt = $conn->prepare($sql);
    $params = array_merge([$types, $user_id], $ids);
    $refs = [];
    foreach($params as $k => $v){ $refs[$k] = &$params[$k]; }
    call_user_func_array([$stmt,'bind_param'], $refs);
    $stmt->execute();
    $res = $stmt->get_result();
} else {
    // Default: latest unread list
    $sql = "SELECT id,title,message,created_at FROM notifications WHERE user_id=? AND is_read=0 ORDER BY id DESC";
    if ($limit > 0) { $sql .= " LIMIT ".$limit; }
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $res = $stmt->get_result();
}

if ($res->num_rows === 0) {
    echo '<div class="p-4 text-center text-muted">No new notifications.</div>';
    exit;
}

while ($row = $res->fetch_assoc()):
?>
  <div class="list-group-item">
    <div class="d-flex w-100 justify-content-between">
      <h6 class="mb-1"><?php echo htmlspecialchars($row['title']); ?></h6>
      <small class="notif-time"><?php echo htmlspecialchars($row['created_at']); ?></small>
    </div>
    <p class="mb-1"><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
  </div>
<?php endwhile; ?>
