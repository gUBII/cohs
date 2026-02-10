<?php
header('Content-Type: application/json');
require_once 'include.php';

$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
$last_seen_id = isset($_GET['last_seen_id']) ? (int)$_GET['last_seen_id'] : 0;
if ($user_id <= 0) { echo json_encode(['success'=>false]); exit; }

// total unread (for badge)
$stmt = $mysqli->prepare("SELECT COUNT(*) FROM notifications WHERE user_id=? AND is_read=0");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($total_unread);
$stmt->fetch();
$stmt->close();

// max unread id (track the top boundary)
$max_unread_id = 0;
$stmt = $mysqli->prepare("SELECT COALESCE(MAX(id),0) FROM notifications WHERE user_id=? AND is_read=0");
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($max_unread_id);
$stmt->fetch();
$stmt->close();

// new unread ids strictly greater than last_seen_id (brand new to this tab)
$new_ids = [];
if ($last_seen_id > 0) {
    $stmt = $mysqli->prepare("SELECT id FROM notifications WHERE user_id=? AND is_read=0 AND id>? ORDER BY id ASC");
    $stmt->bind_param('ii', $user_id, $last_seen_id);
} else {
    // first run returns empty new_ids to avoid immediate popup
    $stmt = $mysqli->prepare("SELECT id FROM notifications WHERE 1=0");
}
$stmt->execute();
$res = $stmt->get_result();
while ($row = $res->fetch_assoc()) { $new_ids[] = (int)$row['id']; }
$stmt->close();

echo json_encode([
  'success' => true,
  'total_unread' => (int)$total_unread,
  'max_unread_id' => (int)$max_unread_id,
  'new_ids' => $new_ids
]);
