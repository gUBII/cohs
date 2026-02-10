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
    // 1) UPDATE clientid (CLIENT matches)
    // =========================================
    $sqlClient = "
        UPDATE eod_import_raw AS eir
        JOIN uerp_user AS uu
            ON uu.mtype = 'CLIENT'
           AND (
                eir.client LIKE CONCAT('%', uu.username, '%')
                OR eir.client LIKE CONCAT('%', uu.username2, '%')
           )
        SET eir.clientid = uu.id
        WHERE (eir.clientid IS NULL OR eir.clientid = 0)
    ";

    $rowsClient = $pdo->exec($sqlClient);

    // =========================================
    // 2) UPDATE employeeid (care_worker → USER)
    // =========================================
    $sqlEmployee = "
        UPDATE eod_import_raw AS eir
        JOIN uerp_user AS uu
            ON uu.mtype = 'USER'
           AND (
                eir.care_worker LIKE CONCAT('%', uu.username, '%')
                OR eir.care_worker LIKE CONCAT('%', uu.username2, '%')
           )
        SET eir.employeeid = uu.id
        WHERE (eir.employeeid IS NULL OR eir.employeeid = 0)
    ";

    $rowsEmployee = $pdo->exec($sqlEmployee);

    // =========================================
    // 3) UPDATE mamagerid (case_manager → USER)
    // =========================================
    $sqlManager = "
        UPDATE eod_import_raw AS eir
        JOIN uerp_user AS uu
            ON uu.mtype = 'USER'
           AND (
                eir.case_manager LIKE CONCAT('%', uu.username, '%')
                OR eir.case_manager LIKE CONCAT('%', uu.username2, '%')
           )
        SET eir.mamagerid = uu.id
        WHERE (eir.mamagerid IS NULL OR eir.mamagerid = 0)
    ";

    $rowsManager = $pdo->exec($sqlManager);

    // Commit all changes
    $pdo->commit();

    echo "Update completed.\n";
    echo "Client IDs updated:      " . (int)$rowsClient   . "\n";
    echo "Employee IDs updated:    " . (int)$rowsEmployee . "\n";
    echo "Manager IDs updated:     " . (int)$rowsManager  . "\n";

} catch (Exception $e) {
    // Roll back if anything fails
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "Error during update: " . $e->getMessage();
}
