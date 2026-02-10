<?php
include '../db.php';

$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['ids']) && is_array($data['ids'])) {
    $ids = implode(',', array_map('intval', $data['ids']));
    $conn->query("DELETE FROM employees WHERE id IN ($ids)");
    echo "Deleted";
} else {
    http_response_code(400);
    echo "Invalid request";
}
?>
