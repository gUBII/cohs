<?php
header('Content-Type: application/json');
require_once 'include.php';

$user_id = isset($_POST['user_id']) ? (int)$_POST['user_id'] : 0;
if ($user_id <= 0) { echo json_encode(['success'=>false]); exit; }

$stmt = $conn->prepare("UPDATE notifications SET is_read=1 WHERE user_id=? AND is_read=0");
$stmt->bind_param('i', $user_id);
$ok = $stmt->execute();
$stmt->close();

echo json_encode(['success' => $ok ? true : false]);
