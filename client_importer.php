<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// DB connection
$mysqli = new mysqli("localhost", "saas", "Bangladesh$$786", "saas_ndisadmin_cohs_com_au");
if ($mysqli->connect_errno) die("DB ERROR: " . $mysqli->connect_error);
$mysqli->set_charset("utf8mb4");

$rootdb = new mysqli('localhost', 'saas', 'Bangladesh$$786', 'saas');
if ($rootdb->connect_error) die("Connection failed: " . $rootdb->connect_error);
$rootdb->set_charset("utf8mb4");

function clean($v){ return trim((string)$v); }

$success = 0;
$failed  = 0;
$errors  = [];
$import_done = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {

    if ($_FILES["csv_file"]["error"] !== UPLOAD_ERR_OK) die("Upload Error");

    $h = fopen($_FILES["csv_file"]["tmp_name"], "r");
    if (!$h) die("Cannot open CSV");

    // Fix UTF-8 BOM
    $first = fgets($h);
    $first = preg_replace('/^\xEF\xBB\xBF/', '', $first);
    $header = str_getcsv($first);

    if (!$header || count($header) < 5) die("Invalid CSV header");

    /*********************************************
     * INSERT INTO uerp_user — ONLY THESE 26 FIELDS
     *********************************************/
    $sql_user = "
        INSERT INTO uerp_user (
            uid,
            dob,
            referred_source,
            hcp_grandfathered,
            case_manager_involved,
            people_involved,
            application_id,
            ndis,
            ndis_number,
            country_of_birth,
            language_spoken,
            package_level,
            address,
            phone,
            email,
            address2,
            note,
            note_for_staff,
            title,
            username,
            username2,
            mtype,
            unbox,
            passbox,
            designation,
            department,
            ref_db,
            status
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'saas_ndisadmin_cohs_com_au',?)
    ";

    $stmt_user = $mysqli->prepare($sql_user);
    if (!$stmt_user) die("uerp_user PREPARE ERROR: " . $mysqli->error);

    /* INSERT INTO project */
    $sql_project = "INSERT INTO project (name,clientid,start_date,end_date,project_signed,address2,package_level) VALUES (?,?,?,?,?,?,?)";
    $stmt_project = $mysqli->prepare($sql_project);
    if (!$stmt_project) die("project PREPARE ERROR: " . $mysqli->error);

    /* INSERT INTO Main SAAS */
    $sql_main_saas = "INSERT INTO uerp_user (uid,date,unbox,passbox,username,username2,phone,email,mtype,ref_db) VALUES (?,?,?,?,?,?,?,?,?,'saas_ndisadmin_cohs_com_au')";
    $stmt_main_saas = $rootdb->prepare($sql_main_saas);
    if (!$stmt_main_saas) die("main saas PREPARE ERROR: " . $rootdb->error);

    /* PROCESS CSV ROWS */
    while (($row = fgetcsv($h)) !== false) {

        if (count($row) < 23) continue;

        // Map columns
        $clientName = clean($row[0]);
        $title        = clean($row[1]);
        $username        = clean($row[2]);
        $username2        = clean($row[3]);
        $uid        = clean($row[4]);
        $dob        = clean($row[5]);
        $referrer   = clean($row[6]);
        $hcp        = clean($row[7]);
        $caseMgr    = clean($row[8]);
        $scheduler  = clean($row[9]);
        $acctRef    = clean($row[10]);
        $medicRef   = clean($row[11]);
        $ndis       = clean($row[12]);
        $refno      = clean($row[13]);
        $birthCountry = clean($row[14]);
        $language     = clean($row[15]);
        $otherlanguage= clean($row[16]);
        $package      = (int) clean($row[17]); // int
        $photo        = clean($row[18]);
        $address      = clean($row[19]);
        $phone        = clean($row[20]);
        $email        = clean($row[21]);
        $billing      = clean($row[22]);
        $status       = clean($row[23]);
        $pedit        = clean($row[24]);
        $note         = clean($row[25]);
        $noteStaff    = clean($row[26]);

        
        /* CONSTANT FIELDS YOU REQUESTED */
        $mtype       = "CLIENT";
        $tpass       = "fcea920f7412b5da7be0cf42b8c93759"; // Correct field
        $designation = 17;
        $department  = 0;
        $status      = 1;

        /* INSERT → uerp_user */
        $stmt_user->bind_param(
            "ssssssssssssssssssssssssssi",
            $uid,
            $dob,
            $referrer,
            $hcp,
            $caseMgr,
            $scheduler,
            $acctRef,
            $ndis,
            $ndis,
            $birthCountry,
            $language,
            $package,
            $address,
            $phone,
            $email,
            $billing,
            $note,
            $noteStaff,
            $title,
            $username,
            $username2,
            $mtype,
            $email,
            $tpass,
            $designation,
            $department,
            $status
        );

        if (!$stmt_user->execute()) {
            $errors[] = "User insert failed ($clientName): " . $stmt_user->error;
            $failed++;
            continue;
        }

        $newID = $mysqli->insert_id;

        /*********************************************
         * INSERT → project
         *********************************************/
        $projectName = trim("$username $username2");
        if ($projectName == "") $projectName = $clientName;

        $start  = "0";
        $end    = "0";
        $signed = "0";

        $stmt_project->bind_param("sisssss",$projectName,$newID,$start,$end,$signed,$address,$package);
        if (!$stmt_project->execute()) {
            $errors[] = "Project insert failed (UID $newID): " . $stmt_project->error;
            $failed++;
            continue;
        }
        
        $stmt_main_saas->bind_param("sssssssss",$uid,$start,$email,$tpass,$username,$username2,$phone,$email,$mtype);
        if (!$stmt_main_saas->execute()) {
            $errors[] = "Main SAAS insert failed (UID $newID): " . $stmt_main_saas->error;
            $failed++;
            continue;
        }

        $success++;
    }

    fclose($h);
    $import_done = true;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Client Import</title>
<style>
.box { width:700px; margin:40px auto; padding:20px; background:#fff; border-radius:6px; box-shadow:0 0 10px #ccc; font-family:Arial; }
.success { background:#e6ffe6; padding:10px; border-left:5px solid #2ecc71; }
.error { background:#ffe6e6; padding:10px; border-left:5px solid #e74c3c; }
</style>
</head>
<body>

<div class="box">
<h2>Client CSV Import</h2>

<form method="post" enctype="multipart/form-data">
    <label>Select CSV File</label><br>
    <input type="file" name="csv_file" required><br><br>
    <button type="submit">Import Now</button>
</form>

<?php if ($import_done): ?>
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
