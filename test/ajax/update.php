<?php
include '../db.php';
$id = intval($_POST['id']);
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$designation = $conn->real_escape_string($_POST['designation']);

if (empty($name) || empty($email) || empty($designation)) {
    http_response_code(422);
    echo "All fields are required.";
    exit;
}else{
    $conn->query("UPDATE employees SET name='$name', email='$email', designation='$designation' WHERE id=$id");
    echo "Updated";
}


?>
