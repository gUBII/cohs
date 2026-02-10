<?php
require_once "include.php";

if(isset($_COOKIE['userid'])){
    $user_id = $_COOKIE['userid'];
    $stmt = $conn->prepare("UPDATE notifications SET is_read=1 WHERE user_id=? AND is_read=0");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    echo "ok";
}