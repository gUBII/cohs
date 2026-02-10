<?php
require_once 'include.php';
$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 1;
$title = 'New Task Assigned';
$message = 'Please review the updated roster item and confirm availability.';
$stmt = $conn->prepare("INSERT INTO notifications (user_id,title,message) VALUES (?,?,?)");
$stmt->bind_param('iss', $user_id, $title, $message);
$stmt->execute();
echo 'Inserted ID: '.$stmt->insert_id;
$stmt->close();
