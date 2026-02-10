<?php
header("Content-Type: application/json");
require_once "include.php";

// If you use session, replace with $_SESSION['user_id']

$user_id = isset($_COOKIE['userid']) ? (int)$_COOKIE['userid'] : 0;
$last_id = isset($_GET['last_id']) ? (int)$_GET['last_id'] : 0;

$stmt = $conn->prepare( "SELECT id,title,message,created_at FROM notifications WHERE user_id=? AND is_read=0 AND id>?  ORDER BY id ASC" );
$stmt->bind_param("ii", $user_id, $last_id);
$stmt->execute();
$res = $stmt->get_result();

$data = [];
while($row = $res->fetch_assoc()){
  $data[] = [
    'id' => (int)$row['id'],
    'title' => $row['title'],
    'message' => $row['message'],
    'created_at' => $row['created_at']
  ];
}
echo json_encode(['new' => $data]);
