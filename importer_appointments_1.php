<?php

// Database Connection (PDO)
$dsn  = "mysql:host=localhost;dbname=saas_ndisadmin_cohs_com_au;charset=utf8mb4";
$user = "saas";
$pass = "Bangladesh$$786";

// Old row-by-row code kept only for reference; stays commented.
/*
$pdo = new PDO($dsn, $user, $pass, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);

// Function: Find matching user ID from uerp_user table
function findUserId(PDO $pdo, $name, $mtype) {
    if (empty($name)) {
        return null;
    }

    $sql = "SELECT id FROM uerp_user
        WHERE mtype = :mtype
          AND (
                :name LIKE CONCAT('%', username, '%')
             OR :name LIKE CONCAT('%', username2, '%')
          )
        LIMIT 1
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':mtype' => $mtype,
        ':name'  => $name
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ? $row['id'] : null;
}

// ---------------------------------------------------------
// Load all appointment rows that need updating
// ---------------------------------------------------------
$sql = "SELECT id, client_name, care_worker_name FROM appointments_import_row";
$rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// ---------------------------------------------------------
// Update logic
// ---------------------------------------------------------
$updateClient = $pdo->prepare("
    UPDATE appointments_import_row 
    SET client_id = :cid 
    WHERE id = :id
");

$updateEmployee = $pdo->prepare("
    UPDATE appointments_import_row 
    SET employee_id = :eid 
    WHERE id = :id
");

foreach ($rows as $row) {

    $id   = $row['id'];
    $cname = trim($row['client_name']);
    $wname = trim($row['care_worker_name']);

    // ----------------------------
    // 1. MATCH CLIENT
    // ----------------------------
    if (!empty($cname)) {
        $clientId = findUserId($pdo, $cname, "CLIENT");

        if (!empty($clientId)) {
            $updateClient->execute([
                ':cid' => $clientId,
                ':id'  => $id
            ]);
        }
    }

    // ----------------------------
    // 2. MATCH EMPLOYEE (CARE WORKER)
    // ----------------------------
    if (!empty($wname)) {
        $empId = findUserId($pdo, $wname, "USER");

        if (!empty($empId)) {
            $updateEmployee->execute([
                ':eid' => $empId,
                ':id'  => $id
            ]);
        }
    }
}

echo "Update completed.";
*/

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}

try {
    // Optional, but recommended for big updates
    $pdo->beginTransaction();

    // =========================================
    // 1) UPDATE client_id (CLIENT matches)
    // =========================================
    $sqlClient = "
        UPDATE appointments_import_row AS air
        JOIN uerp_user AS uu
            ON uu.mtype = 'CLIENT'
           AND (
                air.client_name LIKE CONCAT('%', uu.username, '%')
                OR air.client_name LIKE CONCAT('%', uu.username2, '%')
           )
        SET air.client_id = uu.id
        WHERE (air.client_id IS NULL OR air.client_id = 0)
    ";

    $rowsClient = $pdo->exec($sqlClient);

    // =========================================
    // 2) UPDATE employee_id (USER matches)
    // =========================================
    $sqlEmployee = "
        UPDATE appointments_import_row AS air
        JOIN uerp_user AS uu
            ON uu.mtype = 'USER'
           AND (
                air.care_worker_name LIKE CONCAT('%', uu.username, '%')
                OR air.care_worker_name LIKE CONCAT('%', uu.username2, '%')
           )
        SET air.employee_id = uu.id
        WHERE (air.employee_id IS NULL OR air.employee_id = 0)
    ";

    $rowsEmployee = $pdo->exec($sqlEmployee);

    // Commit all changes
    $pdo->commit();

    echo "Update completed.\n";
    echo "Client IDs updated: " . (int)$rowsClient . "\n";
    echo "Employee IDs updated: " . (int)$rowsEmployee . "\n";

} catch (Exception $e) {
    // Roll back if anything fails
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "Error during update: " . $e->getMessage();
}
