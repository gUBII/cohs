<?php
include '../db.php';
$email = $conn->real_escape_string($_GET['email'] ?? '');
if ($email) {
    $result = $conn->query("SELECT id FROM employees WHERE email = '$email'");
    echo ($result->num_rows > 0) ? "exists" : "ok";
}
?>
