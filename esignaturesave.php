<?php
// esignaturesave.php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success'=>false,'message'=>'Invalid request']); exit;
}

require_once 'include.php'; // must provide $conn (mysqli)

if (!isset($conn) || !$conn) {
    echo json_encode(['success'=>false,'message'=>'Database connection not available']); exit;
}

/* ------- Read & validate inputs ------- */
$pid        = isset($_POST['pid']) ? $_POST['pid'] : '';
$clientid   = isset($_POST['clientid']) ? $_POST['clientid'] : '';
$sigTypeRaw = isset($_POST['signature']) ? $_POST['signature'] : '';
$sigData    = isset($_POST['signature_data']) ? $_POST['signature_data'] : '';

$pid      = ctype_digit((string)$pid) ? (int)$pid : 0;
$clientid = ctype_digit((string)$clientid) ? (int)$clientid : 0;

$sigType = trim($sigTypeRaw);
if ($sigType === '') { $sigType = '1'; }
if (!preg_match('/^[\w\-\s]{1,50}$/u', $sigType)) { $sigType = '1'; }

if ($pid <= 0 || $clientid <= 0) {
    echo json_encode(['success'=>false,'message'=>'Missing or invalid pid/clientid']); exit;
}

if (strpos($sigData, 'data:image/png;base64,') !== 0) {
    echo json_encode(['success'=>false,'message'=>'Invalid signature data']); exit;
}

/* ------- Decode image ------- */
$imgBase64 = substr($sigData, strpos($sigData, ',') + 1);
$imgData   = base64_decode($imgBase64, true);
if ($imgData === false) {
    echo json_encode(['success'=>false,'message'=>'Failed to decode signature']); exit;
}
if (strlen($imgData) > 5 * 1024 * 1024) { // 5MB limit
    echo json_encode(['success'=>false,'message'=>'Signature image too large']); exit;
}

/* ------- Write file ------- */
$dir = __DIR__ . '/signatures';
if (!is_dir($dir)) {
    if (!mkdir($dir, 0755, true)) {
        echo json_encode(['success'=>false,'message'=>'Cannot create storage']); exit;
    }
}

$filename = 'sig_' . $pid . '_' . $clientid . '_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.png';
$fullpath = $dir . '/' . $filename;

if (file_put_contents($fullpath, $imgData) === false) {
    echo json_encode(['success'=>false,'message'=>'Failed to write file']); exit;
}

$relPath = 'signatures/' . $filename;

/* ------- Insert & Update in one transaction ------- */
$now = date('Y-m-d H:i:s');
$ip  = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
$ua  = isset($_SERVER['HTTP_USER_AGENT']) ? substr($_SERVER['HTTP_USER_AGENT'], 0, 255) : null;

mysqli_begin_transaction($conn);

try {
    // 1) Insert into signatures
    $sql1 = "INSERT INTO signatures (pid, clientid, signature_type, signature_path, signed_at, ip_addr, user_agent) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($conn, $sql1);
    if (!$stmt1) { throw new Exception('DB error (prepare insert)'); }
    mysqli_stmt_bind_param($stmt1, "iisssss", $pid, $clientid, $sigType, $relPath, $now, $ip, $ua);
    if (!mysqli_stmt_execute($stmt1)) { throw new Exception('DB error (execute insert)'); }
    $insert_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt1);

    // 2) Update project.signature1 with saved path If your table is named `projects` or PK is different, adjust the query accordingly.
    if($sigType==3) $sql2 = "UPDATE project SET signature3 = ? WHERE id = ? LIMIT 1";
    else if($sigType==2) $sql2 = "UPDATE project SET signature2 = ? WHERE id = ? LIMIT 1";
    else $sql2 = "UPDATE project SET signature1 = ? WHERE id = ? LIMIT 1";
    $stmt2 = mysqli_prepare($conn, $sql2);
    if (!$stmt2) { throw new Exception('DB error (prepare update)'); }
    mysqli_stmt_bind_param($stmt2, "si", $relPath, $pid);
    if (!mysqli_stmt_execute($stmt2)) { throw new Exception('DB error (execute update)'); }
    mysqli_stmt_close($stmt2);

    mysqli_commit($conn);

    echo json_encode(['success'=>true,'id'=>$insert_id,'path'=>$relPath]); exit;

} catch (Exception $e) {
    mysqli_rollback($conn);
    @unlink($fullpath);
    echo json_encode(['success'=>false,'message'=>$e->getMessage()]); exit;
}
