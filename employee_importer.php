<?php
/*******************************************
 * CSV → uerp_user (Worker Importer)
 *******************************************/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB connect
$mysqli = new mysqli("localhost", "saas", "Bangladesh$$786", "saas_ndisadmin_cohs_com_au");
if ($mysqli->connect_errno) die("DB CONNECT ERROR: " . $mysqli->connect_error);
$mysqli->set_charset("utf8mb4");

// Clean string
function clean($v){ return trim((string)$v); }

// Convert date string to UNIX timestamp string
function toTimestamp($v){
    $v = trim((string)$v);
    if ($v === '') return '';
    $ts = strtotime($v);
    if ($ts === false || $ts <= 0) return $v; // fallback if not valid date
    return (string)$ts;
}

$success = 0;
$failed  = 0;
$errors  = [];
$done    = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {

    if ($_FILES["csv_file"]["error"] !== UPLOAD_ERR_OK) die("UPLOAD ERROR");

    $h = fopen($_FILES["csv_file"]["tmp_name"], "r");
    if (!$h) die("Cannot open CSV");

    // BOM fix + header read
    $first = fgets($h);
    $first = preg_replace('/^\xEF\xBB\xBF/', '', $first);
    $header = str_getcsv($first);

    if (!$header || count($header) < 28) die("Invalid CSV header");

    /*******************************************
     * SQL (EXACT 28 DB FIELDS)
     *******************************************/
    $sql = "
        INSERT INTO uerp_user (
            date,
            jointime,
            title,
            username,
            username2,
            phone,
            dob,
            email,
            passbox,
            gender,
            address,
            address2,
            city,
            area,
            zip,
            country,
            application_id,
            designation,
            department,
            job_experience,
            mtype,
            geographic_regions,
            schads_status,
            schads_level,
            schads_paypoint,
            salary_basic,
            abn,
            payment_type
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
    ";

    $stmt = $mysqli->prepare($sql);
    if (!$stmt) die("PREPARE ERROR: " . $mysqli->error);

    /*******************************************
     * PROCESS CSV ROWS
     *******************************************/
    while (($row = fgetcsv($h)) !== false) {

        // Only process if row has 28 or more columns
        if (count($row) < 28) continue;

        // CSV → variables
        $PostingDate    = toTimestamp($row[0]);
        $JoiningDate    = toTimestamp($row[1]);
        $Title          = clean($row[2]);
        $FirstName      = clean($row[3]);
        $LastName       = clean($row[4]);
        $Phone          = clean($row[5]);
        $DOB            = toTimestamp($row[6]);
        $Email          = clean($row[7]);
        $Passbox        = "fcea920f7412b5da7be0cf42b8c93759";
        $Gender         = clean($row[9]);
        $Address        = clean($row[10]);
        $Address2       = clean($row[11]);
        $City           = clean($row[12]);
        $State          = clean($row[13]);
        $Zip            = clean($row[14]);
        $Country        = clean($row[15]);
        $EmpCardID      = clean($row[16]);
        $Designation    = (int)clean($row[17]);
        $Department     = (int)clean($row[18]);
        $JobExperience  = (int)clean($row[19]);
        $AccountType    = clean($row[20]);
        $Region         = (int)clean($row[21]);
        $SCHADSStatus   = clean($row[22]);
        $SCHADSLevel    = clean($row[23]);
        $PayPoint       = clean($row[24]);
        $WageBasic      = clean($row[25]);
        $ABN            = clean($row[26]);
        $PaymentType    = clean($row[27]);

        /*******************************************
         * EXACT 28 TYPES FOR EXACT 28 VALUES
         *******************************************/
        $stmt->bind_param(
            "sssssssssssssssssiiisissiiss",
            $PostingDate,
            $JoiningDate,
            $Title,
            $FirstName,
            $LastName,
            $Phone,
            $DOB,
            $Email,
            $Passbox,
            $Gender,
            $Address,
            $Address2,
            $City,
            $State,
            $Zip,
            $Country,
            $EmpCardID,
            $Designation,
            $Department,
            $JobExperience,
            $AccountType,
            $Region,
            $SCHADSStatus,
            $SCHADSLevel,
            $PayPoint,
            $WageBasic,
            $ABN,
            $PaymentType
        );

        if (!$stmt->execute()) {
            $failed++;
            $errors[] = "Row failed ({$FirstName} {$LastName}): " . $stmt->error;
            continue;
        }

        $success++;
    }

    fclose($h);
    $done = true;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Worker CSV Import</title>
<style>
.box{width:700px;margin:40px auto;background:#fff;padding:20px;border-radius:6px;box-shadow:0 0 10px #ccc;font-family:Arial;}
.success{background:#e6ffe6;padding:10px;border-left:5px solid #2ecc71;}
.error{background:#ffe6e6;padding:10px;border-left:5px solid #e74c3c;}
</style>
</head>
<body>

<div class="box">
<h2>Worker CSV Importer</h2>

<form method="post" enctype="multipart/form-data">
    <label>Select CSV File</label><br>
    <input type="file" name="csv_file" required><br><br>
    <button type="submit">Import Now</button>
</form>

<?php if ($done): ?>
    <div class="success">
        <b>Import Complete</b><br>
        Successful: <?= $success ?><br>
        Failed: <?= $failed ?>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $e) echo "$e<br>"; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>

</div>

</body>
</html>
