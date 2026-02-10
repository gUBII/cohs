<?php
/**
 * Bulk import data from appointments_import_row into shifting_allocation
 * with all required transformations, using INSERT ... SELECT.
 * 
 * Run from CLI: php import_shifts.php
 */

// ---------------------------------------------------------------------
// 1. Database connection (adjust host, dbname, user, pass as needed)
// ---------------------------------------------------------------------
$dsn  = "mysql:host=localhost;dbname=saas_ndisadmin_cohs_com_au;charset=utf8mb4";
$user = "saas";
$pass = "Bangladesh$$786";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage() . PHP_EOL);
}

try {
    // Optional but recommended to keep import atomic
    $pdo->beginTransaction();

    /**
     * Mapping rules (as SQL):
     * 
     * shifting_allocation.employeeid  = appointments_import_row.employee_id
     * shifting_allocation.projectid   = project.id where project.ClientID = appointments_import_row.client_id
     * shifting_allocation.clientid    = appointments_import_row.client_id
     * shifting_allocation.stime       = CONCAT(date, ' ', start_time)              (DATETIME string)
     * shifting_allocation.sdate       = UNIX_TIMESTAMP(CONCAT(date, ' ', start_time))
     * shifting_allocation.edate       = UNIX_TIMESTAMP(CONCAT(date, ' ', end_time))
     * shifting_allocation.etime       = CONCAT(date, ' ', end_time)                (DATETIME string)
     * shifting_allocation.accepted    = "1" if status != 'Pending' AND status != 'cancelled' else "0"
     * shifting_allocation.status      = "1"
     * shifting_allocation.color       = random hex color "#RRGGBB"
     * shifting_allocation.clockin     = start_time
     * shifting_allocation.clockout    = end_time
     * shifting_allocation.category    = package
     * shifting_allocation.itemnumber  = service_type
     * shifting_allocation.repeating   = 0
     * shifting_allocation.cancelled   = "1" if status = 'cancelled' else "0"
     * shifting_allocation.cancel_reason = NULL (or empty string if you prefer)
     */

    $sql = "
        INSERT INTO shifting_allocation (
            employeeid,
            projectid,
            clientid,
            stime,
            sdate,
            edate,
            etime,
            accepted,
            status,
            color,
            clockin,
            clockout,
            category,
            itemnumber,
            repeating,
            cancelled,
            cancel_reason
        )
        SELECT
            air.employee_id                                         AS employeeid,
            p.id                                                    AS projectid,
            air.client_id                                           AS clientid,
            CONCAT(air.date, ' ', air.start_time)                   AS stime,
            UNIX_TIMESTAMP(CONCAT(air.date, ' ', air.start_time))   AS sdate,
            UNIX_TIMESTAMP(CONCAT(air.date, ' ', air.end_time))     AS edate,
            CONCAT(air.date, ' ', air.end_time)                     AS etime,
            CASE 
                WHEN air.status NOT IN ('Pending', 'cancelled') THEN 1
                ELSE 0
            END                                                     AS accepted,
            1                                                       AS status,
            CONCAT(
                '#',
                LPAD(
                    CONV(FLOOR(RAND() * 16777215), 10, 16),
                    6,
                    '0'
                )
            )                                                       AS color,
            air.start_time                                          AS clockin,
            air.end_time                                            AS clockout,
            air.package                                             AS category,
            air.service_type                                        AS itemnumber,
            0                                                       AS repeating,
            CASE 
                WHEN air.status = 'cancelled' THEN 1
                ELSE 0
            END                                                     AS cancelled,
            NULL                                                    AS cancel_reason
        FROM appointments_import_row AS air
        LEFT JOIN project AS p
            ON p.ClientID = air.client_id
    ";

    // Execute bulk insert
    $rowsInserted = $pdo->exec($sql);

    $pdo->commit();

    echo "Import completed successfully." . PHP_EOL;
    echo "Rows inserted into shifting_allocation: " . (int)$rowsInserted . PHP_EOL;

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "Error during import: " . $e->getMessage() . PHP_EOL;
}
