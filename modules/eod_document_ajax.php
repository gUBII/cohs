<?php
// eod_document_ajax.php

// IMPORTANT: no notices or warnings in JSON
error_reporting(E_ALL);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');

// ------------------------------------------------------------------
// DB connection (adjust if you have a config include)
// ------------------------------------------------------------------
$host = 'localhost';
$user = 'saas';
$pass = 'Bangladesh$$786';
$db   = 'saas_ndisadmin_cohs_com_au';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_errno) {
    echo json_encode(['error' => 'DB connection failed']);
    exit;
}
$conn->set_charset('utf8mb4');

// ------------------------------------------------------------------
// DataTables parameters
// ------------------------------------------------------------------
$draw   = isset($_GET['draw'])   ? (int)$_GET['draw']   : 0;
$start  = isset($_GET['start'])  ? (int)$_GET['start']  : 0;
$length = isset($_GET['length']) ? (int)$_GET['length'] : 25;

// Search value (we will ignore for now, can add later)
$searchValue = isset($_GET['search']['value']) ? trim($_GET['search']['value']) : '';

// ------------------------------------------------------------------
// Custom filters from eod-document-reports.php
// ------------------------------------------------------------------
$employeedata = isset($_GET['employeedata']) ? $_GET['employeedata'] : 'ALL';
$clientdata   = isset($_GET['clientdata'])   ? $_GET['clientdata']   : 'ALL';
$srcfdateRaw  = isset($_GET['srcfdate'])     ? $_GET['srcfdate']     : '';
$srctdateRaw  = isset($_GET['srctdate'])     ? $_GET['srctdate']     : '';

// Compute timestamps exactly like your PHP page
$eodcdate = date('Y-m-d');

// From-date
if ($srcfdateRaw !== '') {
    $tmp = date('Y-m-d H:i:s', strtotime($srcfdateRaw . ' -1 day'));
    $srcfdate = strtotime($tmp);
} else {
    $tmp = date('Y-m-d H:i:s', strtotime($eodcdate . ' -10 day'));
    $srcfdate = strtotime($tmp);
}

// To-date
if ($srctdateRaw !== '') {
    $tmp = date('Y-m-d H:i:s', strtotime($srctdateRaw . ' +1 day'));
    $srctdate = strtotime($tmp);
} else {
    $tmp = date('Y-m-d H:i:s', strtotime($eodcdate . ' +1 day'));
    $srctdate = strtotime($tmp);
}

// ------------------------------------------------------------------
// Build WHERE clause
// ------------------------------------------------------------------
$where = " WHERE ed.status = 1 
           AND ed.eod_date >= {$srcfdate} 
           AND ed.eod_date <= {$srctdate} ";

if ($employeedata !== 'ALL') {
    $employeedata = (int)$employeedata;
    $where .= " AND ed.employeeid = {$employeedata} ";
}

if ($clientdata !== 'ALL') {
    $clientdata = (int)$clientdata;
    $where .= " AND ed.clientid = {$clientdata} ";
}

// (Optional) global search on employee/client name
if ($searchValue !== '') {
    $searchEsc = $conn->real_escape_string('%' . $searchValue . '%');
    $where .= " AND (
        CONCAT(ew.username, ' ', ew.username2) LIKE '{$searchEsc}'
        OR CONCAT(ec.username, ' ', ec.username2) LIKE '{$searchEsc}'
    ) ";
}

// ------------------------------------------------------------------
// recordsTotal (no filters)
// ------------------------------------------------------------------
$resTotal = $conn->query("SELECT COUNT(*) AS cnt FROM eod_document WHERE status = 1");
$rowTotal = $resTotal ? $resTotal->fetch_assoc() : ['cnt' => 0];
$recordsTotal = (int)$rowTotal['cnt'];

// ------------------------------------------------------------------
// recordsFiltered (with filters)
// ------------------------------------------------------------------
$sqlFiltered = "
    SELECT COUNT(*) AS cnt
    FROM eod_document AS ed
    LEFT JOIN uerp_user AS ew ON ed.employeeid = ew.id
    LEFT JOIN uerp_user AS ec ON ed.clientid = ec.id
    {$where}
";
$resFiltered = $conn->query($sqlFiltered);
$rowFiltered = $resFiltered ? $resFiltered->fetch_assoc() : ['cnt' => 0];
$recordsFiltered = (int)$rowFiltered['cnt'];

// ------------------------------------------------------------------
// Data query with pagination
// ------------------------------------------------------------------
// Ordering: use same base as your page (by date)
$orderBy = " ORDER BY ed.eod_date ASC ";

// Safety for length
if ($length <= 0) {
    $length = 25;
}

$sqlData = "
    SELECT
        ed.id,
        ed.eod_date,
        ed.employeeid,
        ed.clientid,
        ew.username  AS ew_first,
        ew.username2 AS ew_last,
        ec.username  AS ec_first,
        ec.username2 AS ec_last
    FROM eod_document AS ed
    LEFT JOIN uerp_user AS ew ON ed.employeeid = ew.id
    LEFT JOIN uerp_user AS ec ON ed.clientid = ec.id
    {$where}
    {$orderBy}
    LIMIT {$start}, {$length}
";

$resData = $conn->query($sqlData);
$data = [];

if ($resData) {
    while ($row = $resData->fetch_assoc()) {
        $id        = (int)$row['id'];
        $eod_date  = (int)$row['eod_date'];
        $dateDisplay = date('d-m-y H:i', $eod_date);
        $dateft      = date('Y-m-d', $eod_date);

        $employeeName = trim($row['ew_first'] . ' ' . $row['ew_last']);
        $clientName   = trim($row['ec_first'] . ' ' . $row['ec_last']);

        // Build action buttons HTML (adapted from your original)
        $actionsHtml  = '<div class="d-inline-block datatable-export" data-datatable="#datatableRows">';
        $actionsHtml .= '<button class="btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3" style="margin-right:10px"><i class="fa-solid fa-bars"></i></button>';
        $actionsHtml .= '<div class="dropdown-menu shadow dropdown-menu-end" style="padding:10px">';

        // View
        $actionsHtml .= '<a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop2" aria-controls="offcanvasTop2" ';
        $actionsHtml .= 'onmouseover="shiftdataV2(\'eod_document_detail_view.php?postid='.$id.'\', \'offcanvasTop2\')" ';
        $actionsHtml .= 'href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View">';
        $actionsHtml .= '<i class="fa fa-eye"></i> View</a>';

        // Edit (you can restrict by mtype using cookies/session if needed)
        $actionsHtml .= '<hr><a style="padding:27px" href="index.php?url=eod-document-reports.php&id=0&sheba=eod&editid='.$id.'">';
        $actionsHtml .= '<i class="fa fa-edit"></i> Edit</a>';

        // Download
        $actionsHtml .= '<hr><a style="padding:27px" href="excel/export_excel.php?employeedata='.$row['employeeid'].'&clientdata='.$row['clientid'].'&date_from='.$dateft.'&date_to='.$dateft.'&kroyee=eod-docsument-csv-reports&pointer=PDF" ';
        $actionsHtml .= 'target="dataprocessor" data-bs-placement="bottom" title="Download">';
        $actionsHtml .= '<i class="fa fa-download"></i> Download</a>';

        $actionsHtml .= '</div></div>';

        $data[] = [
            'date_cell'     => 'ID: '.$eod_date.'-'.$id.'<br>'.$dateDisplay,
            'employee_name' => $employeeName,
            'client_name'   => $clientName,
            'actions'       => $actionsHtml
        ];
    }
}

// ------------------------------------------------------------------
// Output JSON response
// ------------------------------------------------------------------
$response = [
    'draw'            => $draw,
    'recordsTotal'    => $recordsTotal,
    'recordsFiltered' => $recordsFiltered,
    'data'            => $data
];

echo json_encode($response);
