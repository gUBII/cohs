<?php
include '../db.php';
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="employees.csv"');
$output = fopen("php://output", "w");
fputcsv($output, ['ID', 'Name', 'Email', 'Designation']);
$res = $conn->query("SELECT * FROM employees");
while ($row = $res->fetch_assoc()) fputcsv($output, $row);
fclose($output);
exit;
?>
