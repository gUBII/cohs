<?php
$conn = new mysqli("localhost", "saas", "Bangladesh$$786", "tester");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
