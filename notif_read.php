<?php
header('Content-Type: application/json');
$mysqli = new mysqli('localhost', 'saas', 'Bangladesh$$786', $_COOKIE['dbname']);
$userId = (int)($_COOKIE['userid'] ?? 0);
if(!$userId || $mysqli->connect_errno){ echo json_encode(['ok'=>false]); exit; }

$stmt = $mysqli->prepare("UPDATE notifications SET is_read=1 WHERE user_id=?");
$stmt->bind_param('i',$userId);
$stmt->execute();
$stmt->close();
echo json_encode(['ok'=>true]);
