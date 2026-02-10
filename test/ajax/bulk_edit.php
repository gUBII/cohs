<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ids'])) {
    $ids = explode(',', $_POST['ids']);
    $ids = array_map('intval', $ids);
    $id_list = implode(',', $ids);

    $name = trim($conn->real_escape_string($_POST['name'] ?? ''));
    $email = trim($conn->real_escape_string($_POST['email'] ?? ''));
    $designation = trim($conn->real_escape_string($_POST['designation'] ?? ''));

    $updates = [];
    if (!empty($name))        $updates[] = "name = '$name'";
    if (!empty($email))       $updates[] = "email = '$email'";
    if (!empty($designation)) $updates[] = "designation = '$designation'";

    if (!empty($updates)) {
        $setClause = implode(', ', $updates);
        $sql = "UPDATE employees SET $setClause WHERE id IN ($id_list)";
        $conn->query($sql);
        echo "Updated";
    } else {
        echo "No fields filled — nothing to update.";
    }
}
?>
