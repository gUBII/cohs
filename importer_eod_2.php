<?php
/**
 * Bulk import data from eod_import_raw into eod_document
 * with the required field mappings.
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
    // Optional but recommended: keep import atomic
    $pdo->beginTransaction();

    /**
     * Mapping rules (as SQL):
     *
     * eod_document.eod_date      = timestamp of (date_str + time_str)
     * eod_document.employeeid    = eod_import_raw.employeeid
     * eod_document.clientid      = eod_import_raw.clientid
     * eod_document.eod_summary   = eod_import_raw.note_details
     * eod_document.casemanagerid = eod_import_raw.mamagerid
     * eod_document.note_type     = eod_import_raw.note_type
     * eod_document.alert         = eod_import_raw.alert
     * eod_document.service_type  = eod_import_raw.service_type
     * eod_document.package       = eod_import_raw.package
     * eod_document.date          = eod_import_raw.date_str
     * eod_document.time          = eod_import_raw.time_str
     * eod_document.admin_time    = 0
     * eod_document.travel_time   = 0
     * eod_document.deleted       = eod_import_raw.deleted
     * eod_document.status        = eod_import_raw.status
     */

    $sql = "
        INSERT INTO eod_document (
            eod_date,
            employeeid,
            clientid,
            eod_summary,
            casemanagerid,
            note_type,
            alert,
            service_type,
            package,
            date,
            time,
            admin_time,
            travel_time,
            deleted,
            status
        )
        SELECT
            UNIX_TIMESTAMP(
                STR_TO_DATE(
                    CONCAT(TRIM(eir.date_str), ' ', TRIM(eir.time_str)),
                    '%d/%b/%Y %H:%i'
                )
            ) AS eod_date,

            eir.employeeid                                         AS employeeid,
            eir.clientid                                           AS clientid,
            eir.note_details                                       AS eod_summary,
            eir.mamagerid                                          AS casemanagerid,
            eir.note_type                                          AS note_type,
            eir.alert                                              AS alert,
            eir.service_type                                       AS service_type,
            eir.package                                            AS package,
            eir.date_str                                           AS date,
            eir.time_str                                           AS time,
            0                                                      AS admin_time,
            0                                                      AS travel_time,
            eir.deleted                                            AS deleted,
            eir.status                                             AS status
        FROM eod_import_raw AS eir
    ";

    // Execute bulk insert
    $rowsInserted = $pdo->exec($sql);

    $pdo->commit();

    echo "Import completed successfully." . PHP_EOL;
    echo "Rows inserted into eod_document: " . (int)$rowsInserted . PHP_EOL;

} catch (Exception $e) {
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "Error during import: " . $e->getMessage() . PHP_EOL;
}
