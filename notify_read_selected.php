<?php
header("Content-Type: application/json");
require_once "include.php"; // make sure this sets up $conn (mysqli)

// Replace clean_input with an explicit cast for safety
$user_id = isset($_COOKIE['userid']) ? (int) $_COOKIE['userid'] : 0;
if ($user_id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid user']);
    exit;
}

if (!isset($_POST['ids'])) {
    echo json_encode(['success' => false, 'message' => 'No IDs received']);
    exit;
}

// Ensure ids are an array (jQuery will submit as ids[]).
$rawIds = (array) $_POST['ids'];

// sanitize to ints, remove zero/negatives and duplicates
$ids = array_values(array_unique(array_filter(array_map('intval', $rawIds), function($v){ return $v > 0; })));
if (empty($ids)) {
    echo json_encode(['success' => false, 'message' => 'No valid IDs']);
    exit;
}

// Build placeholders
$placeholders = implode(',', array_fill(0, count($ids), '?'));

// SQL
$sql = "UPDATE notifications SET is_read = 1 WHERE user_id = ? AND id IN ($placeholders)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    // Prepare failed
    error_log("notify_read_selected prepare error: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Prepare failed']);
    exit;
}

// Build types string: one 'i' for user_id + one 'i' per id
$types = str_repeat('i', count($ids) + 1);

// Build array of references for bind_param: first types, then variables by reference
$bindParams = [];
$bindParams[] = $types;
$bindParams[] = $user_id;
foreach ($ids as $i) {
    $bindParams[] = $i;
}

// Convert to references (required for call_user_func_array)
$refs = [];
foreach ($bindParams as $k => $v) {
    $refs[$k] = &$bindParams[$k];
}

// Bind and execute
call_user_func_array([$stmt, 'bind_param'], $refs);

$ok = $stmt->execute();
if (!$ok) {
    error_log("notify_read_selected execute error: " . $stmt->error);
}

$affected = $stmt->affected_rows;
$stmt->close();

echo json_encode(['success' => $ok ? true : false, 'affected' => $affected]);
