<?php
include 'dbcon.php';

// Fetch employee data
$sql = "SELECT id, username, username2, dob, email FROM employees";
$result = mysqli_query($conn, $sql);

$employees = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = [
            'userid' => $row['id'],
            'firstname' => $row['username'],
            'lastname' => $row['username2'],
            'dob' => $row['dob'],
            'email' => $row['email']
        ];
    }
}

// Close connection
mysqli_close($conn);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($employees);
?>
