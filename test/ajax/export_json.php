<?php
include '../db.php';
$res = $conn->query("SELECT * FROM employees");
$data = [];

while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="employees.json"');
echo json_encode($data, JSON_PRETTY_PRINT);
exit;
