<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $email = $conn->real_escape_string($_POST['email'] ?? '');
    $designation = $conn->real_escape_string($_POST['designation'] ?? '');

    if (empty($name) || empty($email) || empty($designation)) {
        http_response_code(422);
        echo "All fields are required.";
        exit;
    } else {
        $conn->query("INSERT INTO employees (name, email, designation) VALUES ('$name', '$email', '$designation')");
        echo "Inserted";
    }
}
?>

