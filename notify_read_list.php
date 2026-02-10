<?php
header('Content-Type: application/json');
require 'include.php';

$user_id = isset($_COOKIE['userid']) ? (int) $_COOKIE['userid'] : 0;

$sql = "SELECT id, title, message, created_at FROM notifications WHERE user_id=? AND is_read=1 ORDER BY id DESC LIMIT 50";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$read = [];
while($row = $result->fetch_assoc()){
    $read[] = $row;
}

echo json_encode(['read' => $read]);
