<?php
header('Content-Type: application/json');

$mysqli = new mysqli('localhost', 'saas', 'Bangladesh$$786', $_COOKIE['dbname']);

$userId = (int)($_COOKIE['userid'] ?? 0);
if(!$userId || $mysqli->connect_errno){
  echo json_encode(['unread_count'=>0]); exit;
}

$stmt = $mysqli->prepare("SELECT COUNT(*) FROM notifications WHERE user_id=? AND is_read=0");
$stmt->bind_param('i',$userId);
$stmt->execute();
$stmt->bind_result($cnt);
$stmt->fetch();
$stmt->close();

echo json_encode(['unread_count'=>(int)$cnt]);
