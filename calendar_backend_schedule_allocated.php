<?php
// calendar_backend_schedule.php
include 'include.php';

header('Content-Type: application/json');

// Normalize "YYYY-MM-DDTHH:MM(:SS)?" -> "YYYY-MM-DD HH:MM:SS"
function norm_dt($v) {
    if (!isset($v) || $v === '') return null;
    $v = str_replace('T', ' ', trim((string)$v));
    if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/', $v)) {
        $v .= ':00';
    }
    return $v;
}

// Map repeating label -> interval type/count
function repeat_interval(string $rep): array {
    $rep = trim($rep);

    $mapWeeks = [
        'Week Repeat'      => 1,
        'Fortnight Repeat' => 2,
        '3 Weeks Repeat'   => 3,
        '4 Weeks Repeat'   => 4,
        '6 Weeks Repeat'   => 6,
        '8 Weeks Repeat'   => 8,
        '12 Weeks Repeat'  => 12,
    ];

    $mapMonths = [
        'Month Repeat'     => 1,
        '3 Months Repeat'  => 3,
        '6 Months Repeat'  => 6,
        '12 Months Repeat' => 12,
    ];

    if (isset($mapWeeks[$rep]))  return ['unit' => 'week',  'n' => $mapWeeks[$rep]];
    if (isset($mapMonths[$rep])) return ['unit' => 'month', 'n' => $mapMonths[$rep]];

    // Treat unknown values as non-repeating
    return ['unit' => 'once', 'n' => 0];
}

function fmt_dt(DateTime $dt): string {
    return $dt->format('Y-m-d H:i:s');
}

function ymd(DateTime $dt): string {
    return $dt->format('Y-m-d');
}


$prj = 0;
if (isset($_GET['prjsrc'])) {
    $prj = (int)$_GET['prjsrc'];
} elseif (isset($_POST['projectid'])) {
    $prj = (int)$_POST['projectid'];
} elseif (isset($_POST['projectid1'])) {
    $prj = (int)$_POST['projectid1'];
}

// Helper: safe get
function ig($arr, $key, $default = '') {
    return isset($arr[$key]) ? $arr[$key] : $default;
}


// Cache table columns to build safe INSERTs on different schemas
function table_columns(mysqli $conn, string $table): array {
    static $cache = [];
    if (isset($cache[$table])) return $cache[$table];
    $cols = [];
    $res = $conn->query("SHOW COLUMNS FROM `$table`");
    if ($res) {
        while ($r = $res->fetch_assoc()) $cols[] = $r['Field'];
    }
    $cache[$table] = $cols;
    return $cols;
}
function has_col(mysqli $conn, string $table, string $col): bool {
    return in_array($col, table_columns($conn, $table), true);
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

// -----------------------
// CLIENTS / EMPLOYEES LIST
// -----------------------
if (isset($_GET['action']) && $_GET['action'] === 'clients_list') {
    $rows = [];
    $q = $conn->query("SELECT id, username, username2 FROM uerp_user WHERE mtype='CLIENT' AND status='1' ORDER BY username ASC");
    if ($q) {
        while ($r = $q->fetch_assoc()) {
            $rows[] = ['id'=>(int)$r['id'], 'name'=>trim($r['username'].' '.$r['username2'])];
        }
    }
    echo json_encode($rows);
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'employees_list') {
    $rows = [];
    $q = $conn->query("SELECT id, username, username2, mtype FROM uerp_user WHERE (mtype='USER' OR mtype='EMPLOYEE') AND status='1' ORDER BY username ASC");
    if ($q) {
        while ($r = $q->fetch_assoc()) {
            $rows[] = ['id'=>(int)$r['id'], 'name'=>trim($r['username'].' '.$r['username2'])];
        }
    }
    echo json_encode($rows);
    exit;
}

// -----------------------
// REPEAT SOURCE LIST
// -----------------------
if (isset($_GET['action']) && $_GET['action'] === 'repeat_source_list') {
    $pid = (int)$prj;
    $clientid = isset($_GET['clientid']) ? (int)$_GET['clientid'] : 0;
    $employeeid = isset($_GET['employeeid']) ? (int)$_GET['employeeid'] : 0;

    $rows = [];
    if ($pid > 0) {
        $where = "projectid='$pid' AND status='1'";
        if ($clientid > 0) $where .= " AND clientid='$clientid'";
        if ($employeeid > 0) $where .= " AND employeeid='$employeeid'";
        $q = $conn->query("SELECT * FROM shifting_allocation_table WHERE $where AND accepted='1' ORDER BY id DESC");
        if ($q) {
            while ($r = $q->fetch_assoc()) {
                // resolve labels
                $clientLabel = '';
                $cq = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='".(int)$r['clientid']."' LIMIT 1");
                if ($cq && $cq->num_rows) {
                    $c = $cq->fetch_assoc();
                    $clientLabel = trim($c['username'].' '.$c['username2']);
                }
                $empLabel = '';
                $eq = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='".(int)$r['employeeid']."' LIMIT 1");
                if ($eq && $eq->num_rows) {
                    $e = $eq->fetch_assoc();
                    $empLabel = trim($e['username'].' '.$e['username2']);
                }
                $rows[] = [
                    'id' => (int)$r['id'],
                    'client' => $clientLabel,
                    'employee' => $empLabel,
                    'stime' => $r['stime'],
                    'etime' => $r['etime'],
                    'repeating' => $r['repeating'],
                    'itemnumber' => $r['itemnumber'],
                    'night' => $r['night'],
                ];
            }
        }
    }
    echo json_encode($rows);
    exit;
}


// -----------------------
// TEMPLATE LIST / GET ONE
// -----------------------
if (isset($_GET['action']) && $_GET['action'] === 'template_list') {
    $pid = (int)$prj;
    $rows = [];
    if ($pid > 0) {
        $q = $conn->query("SELECT * FROM shifting_allocation_table WHERE projectid='$pid' AND status='1' AND accepted='1' ORDER BY id DESC");
        if ($q) {
            while ($r = $q->fetch_assoc()) {
                $empLabel = '';
                $eid = $conn->real_escape_string($r['employeeid']);
                $e2 = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='$eid' LIMIT 1");
                if ($e2 && $e2->num_rows > 0) {
                    $e3 = $e2->fetch_assoc();
                    $empLabel = "Worker: {$e3['username']} {$e3['username2']}";
                }
                $rows[] = [
                    'id'        => $r['id'],
                    'projectid'  => $r['projectid'],
                    'clientid'   => $r['clientid'],
                    'employeeid' => $r['employeeid'],
                    'employee'   => $empLabel,
                    'stime'      => $r['stime'],
                    'etime'      => $r['etime'],
                    'repeating'  => $r['repeating'],
                    'color'      => $r['color'],
                    'night'      => $r['night'],
                    'itemnumber' => $r['itemnumber'],
                    'admin_note' => $r['admin_note'],
                    'address'    => $r['address'],
                    'category'   => $r['category'],
                ];
            }
        }
    }
    echo json_encode($rows);
    exit;
}

if (isset($_GET['action']) && $_GET['action'] === 'template_get') {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if ($id <= 0) { echo json_encode([]); exit; }
    $q = $conn->query("SELECT * FROM shifting_allocation_table WHERE id='$id' AND accepted='1' LIMIT 1");
    if ($q && $q->num_rows > 0) {
        echo json_encode($q->fetch_assoc());
    } else {
        echo json_encode([]);
    }
    exit;
}

    // Resolve client for the active project (from cookie/param)
    $clientid = 0;
    $pid = $conn->real_escape_string($prj);
    if (!empty($pid)) {
        $r2 = $conn->query("SELECT clientid FROM project WHERE id='$pid' AND status='1' ORDER BY id ASC LIMIT 1");
        if ($r2 && $r2->num_rows > 0) {
            $r3 = $r2->fetch_assoc();
            $clientid = $r3['clientid'];
        }
    }

    if (!empty($_COOKIE["userid"])){
        $r22 = $conn->query("SELECT mtype FROM uerp_user WHERE id='".$_COOKIE["userid"]."' ORDER BY id ASC LIMIT 1");
        if ($r22 && $r22->num_rows > 0) {
            $r33 = $r22->fetch_assoc();
            $employeetypex = $r33["mtype"];
        }
    }else{
        $employeetypex="USER";
    }
    

    $events = [];

    // Logged-in user
    $userid = !empty($_COOKIE["userid"]) ? (int)$_COOKIE["userid"] : 0;
    
    // Build WHERE safely
    $where = [];
    $where[] = "status='1'";
    
    // If project has a client bound, keep your existing behavior
    if ($clientid) {
        $where[] = "clientid='".(int)$clientid."'";
    }
    
    // If USER, restrict visibility to end of next week and only their own shifts
    if ($employeetypex === "USER" && $userid > 0) {
    
        // End of next week (Mon-Sun), Dhaka timezone
        $tz = new DateTimeZone('Asia/Dhaka');
        $now = new DateTime('now', $tz);
    
        // Monday of this week 00:00:00
        $startOfWeek = clone $now;
        $startOfWeek->modify('monday this week');
        $startOfWeek->setTime(0, 0, 0);
    
        // Sunday of next week 23:59:59 (monday this week + 13 days)
        $endOfNextWeek = clone $startOfWeek;
        $endOfNextWeek->modify('+13 days');
        $endOfNextWeek->setTime(23, 59, 59);
    
        $limitEnd = $conn->real_escape_string($endOfNextWeek->format('Y-m-d H:i:s'));
    
        $where[] = "employeeid='".$userid."'";
        $where[] = "stime <= '".$limitEnd."'";
    }
    
    // Final query
    $sql = "SELECT * FROM shifting_allocation WHERE " . implode(" AND ", $where);
    $result = $conn->query($sql);
    
    while ($result && $row = $result->fetch_assoc()) {

        
        // Employee
        $employeename = '';
        $employeedesignation = '';
        $eid = $conn->real_escape_string($row['employeeid']);
        $e2 = $conn->query("SELECT username, username2, designation FROM uerp_user WHERE id='$eid' LIMIT 1");
        if ($e2 && $e2->num_rows > 0) {
            $e3 = $e2->fetch_assoc();
            $employeename = "Worker: {$e3['username']} {$e3['username2']}";
            $employeedesignation = "{$e3['designation']}";
            $employeetype = "{$e3['mtype']}";
        }

        // Designation
        $designationname= '';
        $did = $conn->real_escape_string($employeedesignation);
        $d2 = $conn->query("SELECT designation FROM designation WHERE id='$did' LIMIT 1");
        if ($d2 && $d2->num_rows > 0) {
            $d3 = $d2->fetch_assoc();
            $designationname = "Designation: {$d3['designation']}";
        }
        
        // Client
        $clientname = '';
        $cid = $conn->real_escape_string($row['clientid']);
        $c2 = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='$cid' LIMIT 1");
        if ($c2 && $c2->num_rows > 0) {
            $c3 = $c2->fetch_assoc();
            $clientname = "Client: {$c3['username']} {$c3['username2']}";
        }

        $stimeHM = substr($row['stime'], 11, 5);
        $etimeHM = substr($row['etime'], 11, 5);
        $allocatedtime = "{$stimeHM}-{$etimeHM}";
        if($row['cancelled']==1) $cancelled_status="Cancellation Reason";
        else $cancelled_status=0;
        
        if($row['request2']==1){
            $clockin_request1 = date("d-m-y H:i", $row['clockin_request']);
            $clockout_request1 = date("d-m-y H:i", $row['clockout_request']);
        }else{
            $clockin_request1=0;
            $clockout_request1=0;
        }
        
        if($employeetypex=="ADMIN"){
            $events[] = [
                'id'                => $row['id'],
                'idx'               => $row['id'],
                'title'             => $employeename,
                'employee'          => $employeename,
                'client'            => $clientname,
                'designationname'   => $designationname,
                'clientid'          => $row['clientid'],
                'employeeid'        => $row['employeeid'],
                'projectid'         => $row['projectid'],
                'start'             => $row['stime'],
                'end'               => $row['etime'],
                'stime'             => $row['stime'],
                'etime'             => $row['etime'],
                'color'             => $row['color'],
                'pcolor'            => $row['color'],
                'night'             => $row['night'],
                'category'          => $row['category'],
                'itemnumber'        => $row['itemnumber'],
                'admin_note'        => $row['admin_note'],
                'address'           => $row['address'],
                'repeating'         => $row['repeating'],
                'request2'          => $row['request2'],
                'clockin_request1'  => $clockin_request1,
                'clockout_request1' => $clockout_request1,
                'allocatedtime'     => $allocatedtime,
                'cancelled_status'  => $cancelled_status,
                'cancelled_reason'  => $row['cancel_reason'],
    
                // new fields (if present in your table)
                'accepted'          => isset($row['accepted']) ? $row['accepted'] : null,
                'cancelled'         => isset($row['cancelled']) ? $row['cancelled'] : null,
                'clockin_request'   => isset($row['clockin_request']) ? $row['clockin_request'] : 0,
                'clockout_request'  => isset($row['clockout_request']) ? $row['clockout_request'] : 0,
            ];
        
        }else{
            
            if($eid==$_COOKIE["userid"]){
                $events[] = [
                    'id'                => $row['id'],
                    'idx'               => $row['id'],
                    'title'             => $employeename,
                    'employee'          => $employeename,
                    'client'            => $clientname,
                    'designationname'   => $designationname,
                    'clientid'          => $row['clientid'],
                    'employeeid'        => $row['employeeid'],
                    'projectid'         => $row['projectid'],
                    'start'             => $row['stime'],
                    'end'               => $row['etime'],
                    'stime'             => $row['stime'],
                    'etime'             => $row['etime'],
                    'color'             => $row['color'],
                    'pcolor'            => $row['color'],
                    'night'             => $row['night'],
                    'category'          => $row['category'],
                    'itemnumber'        => $row['itemnumber'],
                    'admin_note'        => $row['admin_note'],
                    'address'           => $row['address'],
                    'repeating'         => $row['repeating'],
                    'request2'          => $row['request2'],
                    'clockin_request1'  => $clockin_request1,
                    'clockout_request1' => $clockout_request1,
                    'allocatedtime'     => $allocatedtime,
                    'cancelled_status'  => $cancelled_status,
                    'cancelled_reason'  => $row['cancel_reason'],
        
                    // new fields (if present in your table)
                    'accepted'          => isset($row['accepted']) ? $row['accepted'] : null,
                    'cancelled'         => isset($row['cancelled']) ? $row['cancelled'] : null,
                    'clockin_request'   => isset($row['clockin_request']) ? $row['clockin_request'] : 0,
                    'clockout_request'  => isset($row['clockout_request']) ? $row['clockout_request'] : 0,
                ];
            }
        }
        
    }

    echo json_encode($events);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!is_array($data)) $data = [];

    
    // DELETE
    if (!empty($data['delete']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $conn->query("DELETE FROM shifting_allocation WHERE id='$id' LIMIT 1");
        echo json_encode(['ok' => true]);
        exit;
    }

    $action     = ig($data, 'action', '');
    
    // -----------------------
    // REPEAT / GENERATE ROSTER (MUST be inside POST handler)
    // -----------------------
    if ($action === 'repeat_generate') {
        $ids = $data['ids'] ?? [];
        if (is_string($ids)) {
            $ids = array_filter(array_map('trim', explode(',', $ids)));
        }
        if (!is_array($ids) || count($ids) === 0) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'No ids selected']);
            exit;
        }
        $from = trim((string)ig($data, 'from_date', ''));
        $to   = trim((string)ig($data, 'to_date', ''));
    
        // Normalize from/to dates: accept YYYY-MM-DD or MM/DD/YYYY or ISO
        $from_ts = strtotime($from);
        $to_ts   = strtotime($to);
        if ($from_ts) $from = date('Y-m-d', $from_ts);
        if ($to_ts)   $to   = date('Y-m-d', $to_ts);
    
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $from) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $to)) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Invalid from_date/to_date']);
            exit;
        }
    
        $fromDT = new DateTime($from . ' 00:00:00');
        $toDT   = new DateTime($to . ' 23:59:59');
        if ($toDT < $fromDT) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'to_date must be >= from_date']);
            exit;
        }
    
        // Next id
        $nextId = 1;
        $mx = $conn->query("SELECT id FROM shifting_allocation ORDER BY id DESC LIMIT 1");
        if ($mx && $mx->num_rows > 0) {
            $my = $mx->fetch_assoc();
            $nextId = ((int)$my['id']) + 1;
        }
    
        $inserted = 0;
        $errors = [];
    
        foreach ($ids as $tid) {
            $tid = (int)$tid;
            if ($tid <= 0) continue;
    
            $tq = $conn->query("SELECT * FROM shifting_allocation_table WHERE id='$tid' AND accepted='1' LIMIT 1");
            if (!$tq || $tq->num_rows === 0) {
                $errors[] = "Template $tid not found";
                continue;
            }
            $tpl = $tq->fetch_assoc();
    
            $rep = (string)($tpl['repeating'] ?? 'Once');
            $interval = repeat_interval($rep);
            
            $repRaw = trim((string)($tpl['repeating'] ?? ''));
            $repNorm = strtolower($repRaw);
            
            // Skip "once" templates entirely (do not generate any shifts)
            if ($repNorm === '' || $repNorm === 'once' || $repNorm === 'one time' || $repNorm === 'single') {
                continue;
            }

            
            // Template time-of-day and weekday/day-of-month
            $tplStartTs = strtotime((string)$tpl['stime']);
            $tplEndTs   = strtotime((string)$tpl['etime']);
            if (!$tplStartTs || !$tplEndTs || $tplEndTs <= $tplStartTs) {
                $errors[] = "Template $tid invalid time";
                continue;
            }
            $duration = $tplEndTs - $tplStartTs;
            $tplTime = date('H:i:s', $tplStartTs);
            $tplWday = (int)date('N', $tplStartTs);  // 1..7
            $tplDom  = (int)date('d', $tplStartTs);  // 01..31
    
            // Determine first occurrence datetime
            $occ = new DateTime($from . ' ' . $tplTime);
    
            if ($interval['unit'] === 'week') {
                // align to template weekday on/after from_date
                $curWday = (int)$occ->format('N');
                $delta = ($tplWday - $curWday + 7) % 7;
                if ($delta > 0) $occ->modify("+$delta day");
            } elseif ($interval['unit'] === 'month') {
                // align to template day-of-month
                $occ = new DateTime($from . ' ' . $tplTime);
                $y = (int)$occ->format('Y');
                $m = (int)$occ->format('m');
    
                $tmp = new DateTime(sprintf('%04d-%02d-01 %s', $y, $m, $tplTime));
                $last = (int)$tmp->format('t');
                $day = min($tplDom, $last);
                $occ = new DateTime(sprintf('%04d-%02d-%02d %s', $y, $m, $day, $tplTime));
    
                while ($occ < $fromDT) {
                    $occ->modify('first day of next month');
                    $y = (int)$occ->format('Y');
                    $m = (int)$occ->format('m');
                    $tmp = new DateTime(sprintf('%04d-%02d-01 %s', $y, $m, $tplTime));
                    $last = (int)$tmp->format('t');
                    $day = min($tplDom, $last);
                    $occ = new DateTime(sprintf('%04d-%02d-%02d %s', $y, $m, $day, $tplTime));
                }
            }
    
            // Generate occurrences up to toDT
            while ($occ <= $toDT) {
                $end = clone $occ;
                $end->modify("+$duration seconds");
    
                // build fields
                $stime = fmt_dt($occ);
                $etime = fmt_dt($end);
    
                $sdate_ts = strtotime($stime);
                $edate_ts = strtotime($etime);
    
                $syears = date('Y', $sdate_ts);
                $smonths = date('m', $sdate_ts);
                $sdays = date('d', $sdate_ts);
                $eyears = date('Y', $edate_ts);
                $emonths = date('m', $edate_ts);
                $edays = date('d', $edate_ts);
    
                $allocatedtime = substr($stime, 11, 5) . '-' . substr($etime, 11, 5);
    
                $id = $nextId++;
    
                // copy template fields
                $employeeid = (int)($tpl['employeeid'] ?? 0);
                $clientid   = (int)($tpl['clientid'] ?? 0);
                $projectid  = (int)($tpl['projectid'] ?? 0);
                $referrer   = (int)($tpl['referrer'] ?? 0);
                $package    = (string)($tpl['package'] ?? '');
                $servicetype= (string)($tpl['servicetype'] ?? '');
                $category   = (string)($tpl['category'] ?? '');
                $itemnumber = (string)($tpl['itemnumber'] ?? '');
                $itemname   = (string)($tpl['itemname'] ?? '');
                $admin_note = (string)($tpl['admin_note'] ?? '');
                $address    = (string)($tpl['address'] ?? '');
                $repeating  = (string)($tpl['repeating'] ?? '');
    
                // Build INSERT based on actual table columns (prevents SQL errors / 500)
                $tbl = 'shifting_allocation';

                // Base columns that must exist
                $cols = ['id','employeeid','projectid','clientid','days','months','years','stime','sdate','edate','edays','emonths','eyears','etime','accepted','status'];

                // Optional columns (only if they exist in your DB)
                if (has_col($conn, $tbl, 'color'))        $cols[] = 'color';
                if (has_col($conn, $tbl, 'night'))        $cols[] = 'night';
                if (has_col($conn, $tbl, 'address'))      $cols[] = 'address';
                if (has_col($conn, $tbl, 'admin_note'))   $cols[] = 'admin_note';
                if (has_col($conn, $tbl, 'category'))     $cols[] = 'category';
                if (has_col($conn, $tbl, 'itemnumber'))   $cols[] = 'itemnumber';
                if (has_col($conn, $tbl, 'itemname'))     $cols[] = 'itemname';
                if (has_col($conn, $tbl, 'repeating'))    $cols[] = 'repeating';
                if (has_col($conn, $tbl, 'allocatedtime'))$cols[] = 'allocatedtime';
                if (has_col($conn, $tbl, 'referrer'))     $cols[] = 'referrer';
                if (has_col($conn, $tbl, 'package'))      $cols[] = 'package';
                if (has_col($conn, $tbl, 'servicetype'))  $cols[] = 'servicetype';

                // Values mapped to the columns above
                $vals = [];
                foreach ($cols as $c) {
                    switch ($c) {
                        case 'id':           $vals[] = "'$id'"; break;
                        case 'employeeid':   $vals[] = "'$employeeid'"; break;
                        case 'projectid':    $vals[] = "'$projectid'"; break;
                        case 'clientid':     $vals[] = "'$clientid'"; break;
                        case 'days':         $vals[] = "'$sdays'"; break;
                        case 'months':       $vals[] = "'$smonths'"; break;
                        case 'years':        $vals[] = "'$syears'"; break;
                        case 'stime':        $vals[] = "'".$conn->real_escape_string($stime)."'"; break;
                        case 'sdate':        $vals[] = "'$sdate_ts'"; break;
                        case 'edate':        $vals[] = "'$edate_ts'"; break;
                        case 'edays':        $vals[] = "'$edays'"; break;
                        case 'emonths':      $vals[] = "'$emonths'"; break;
                        case 'eyears':       $vals[] = "'$eyears'"; break;
                        case 'etime':        $vals[] = "'".$conn->real_escape_string($etime)."'"; break;
                        case 'accepted':     $vals[] = "'0'"; break;
                        case 'status':       $vals[] = "'1'"; break;

                        case 'color':        $vals[] = "'".$conn->real_escape_string((string)($tpl['color'] ?? '#CCCCCC'))."'"; break;
                        case 'night':        $vals[] = "'".$conn->real_escape_string((string)($tpl['night'] ?? '0'))."'"; break;
                        case 'address':      $vals[] = "'".$conn->real_escape_string((string)($tpl['address'] ?? ''))."'"; break;
                        case 'admin_note':   $vals[] = "'".$conn->real_escape_string((string)($tpl['admin_note'] ?? ''))."'"; break;
                        case 'category':     $vals[] = "'".$conn->real_escape_string((string)($tpl['category'] ?? ''))."'"; break;
                        case 'itemnumber':   $vals[] = "'".$conn->real_escape_string((string)($tpl['itemnumber'] ?? ''))."'"; break;
                        case 'itemname':     $vals[] = "'".$conn->real_escape_string((string)($tpl['itemname'] ?? ''))."'"; break;
                        case 'repeating':    $vals[] = "'".$conn->real_escape_string((string)($tpl['repeating'] ?? ''))."'"; break;
                        case 'allocatedtime':$vals[] = "'".$conn->real_escape_string($allocatedtime)."'"; break;
                        case 'referrer':     $vals[] = "'".$conn->real_escape_string((string)($tpl['referrer'] ?? '0'))."'"; break;
                        case 'package':      $vals[] = "'".$conn->real_escape_string((string)($tpl['package'] ?? ''))."'"; break;
                        case 'servicetype':  $vals[] = "'".$conn->real_escape_string((string)($tpl['servicetype'] ?? ''))."'"; break;
                        default:             $vals[] = "''"; break;
                    }
                }

                $sql = "INSERT INTO `$tbl` (`".implode("`,`",$cols)."`) VALUES (".implode(",",$vals).")";
    
                if ($conn->query($sql)) {
                    $inserted++;
                } else {
                    $errors[] = "Insert failed for template $tid: " . $conn->error;
                }
    
                if ($interval['unit'] === 'week') {
                    $occ->modify("+{$interval['n']} week");
                } elseif ($interval['unit'] === 'month') {
                    $occ->modify("first day of +{$interval['n']} month");
                    $y = (int)$occ->format('Y');
                    $m = (int)$occ->format('m');
                    $tmp = new DateTime(sprintf('%04d-%02d-01 %s', $y, $m, $tplTime));
                    $last = (int)$tmp->format('t');
                    $day = min($tplDom, $last);
                    $occ = new DateTime(sprintf('%04d-%02d-%02d %s', $y, $m, $day, $tplTime));
                } else {
                    break;
                }
            }
        }
    
        echo json_encode([
            'status'   => 'ok',
            'inserted' => $inserted,
            'errors'   => $errors
        ]);
        exit;
    }
    
    
    // -----------------------
    // TEMPLATE SAVE / UPDATE / DELETE / APPLY / APPLY_AT
    // -----------------------
    if ($action === 'template_save' || $action === 'template_update') {
        $template_id = (int)ig($data, 'template_id', 0);
    
        $projectid  = $conn->real_escape_string(ig($data, 'projectid', $prj));
        $clientid   = $conn->real_escape_string(ig($data, 'clientid'));
        $employeeid = $conn->real_escape_string(ig($data, 'employeeid'));
        $itemnumber = $conn->real_escape_string(ig($data, 'itemnumber'));
        $repeating  = $conn->real_escape_string(ig($data, 'repeating', 'Once'));
        $night      = $conn->real_escape_string(ig($data, 'night', '0'));
        $pcolor     = $conn->real_escape_string(ig($data, 'pcolor', '#CCCCCC'));
        $admin_note = $conn->real_escape_string(ig($data, 'admin_note', ''));
        $address    = $conn->real_escape_string(ig($data, 'address', ''));
        $category   = $conn->real_escape_string(ig($data, 'category', '0'));
    
        $stime = norm_dt(ig($data, 'stime', ig($data, 'start')));
        $etime = norm_dt(ig($data, 'etime', ig($data, 'end')));
    
        if ($projectid === '' || $clientid === '' || $employeeid === '' || !$stime || !$etime) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Missing required fields (projectid/clientid/employeeid/stime/etime).']);
            exit;
        }
    
        $s_ts = strtotime($stime);
        $e_ts = strtotime($etime);
        if (!$s_ts || !$e_ts || $e_ts <= $s_ts) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Invalid start/end time.']);
            exit;
        }
    
        $syears  = date('Y', $s_ts);
        $smonths = date('m', $s_ts);
        $sdays   = date('d', $s_ts);
    
        $eyears  = date('Y', $e_ts);
        $emonths = date('m', $e_ts);
        $edays   = date('d', $e_ts);
    
        if ($action === 'template_save') {
            $idx = 1;
            $rMax = $conn->query("SELECT id FROM shifting_allocation_table WHERE accepted='1' ORDER BY id DESC LIMIT 1");
            if ($rMax && $rMax->num_rows > 0) {
                $mx = $rMax->fetch_assoc();
                $idx = (int)$mx['id'] + 1;
            }
    
            $q = "
                INSERT INTO shifting_allocation_table
                (id, employeeid, projectid, clientid, days, months, years, stime, sdate, edate, edays, emonths, eyears, etime,
                 accepted, status, color, clockin, clockout, clockout2, night, address, admin_note, category, itemnumber, repeating)
                VALUES
                ('$idx', '$employeeid', '$projectid', '$clientid', '$sdays', '$smonths', '$syears', '$stime', '$s_ts', '$e_ts',
                 '$edays', '$emonths', '$eyears', '$etime',
                 '0', '1', '$pcolor', '0', '0', '0', '$night', '$address', '$admin_note', '$category', '$itemnumber', '$repeating')
            ";
    
            if (!$conn->query($q)) {
                http_response_code(500);
                echo json_encode(['status'=>'error','message'=>'Template insert failed.']);
                exit;
            }
            echo json_encode(['status'=>'ok','id'=>$idx]);
            exit;
        }
    
        // template_update
        if ($template_id <= 0) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Missing template_id']);
            exit;
        }
    
        $q = "
            UPDATE shifting_allocation_table SET
                employeeid='$employeeid',
                projectid='$projectid',
                clientid='$clientid',
                days='$sdays', months='$smonths', years='$syears',
                stime='$stime', sdate='$s_ts',
                edate='$e_ts', edays='$edays', emonths='$emonths', eyears='$eyears',
                etime='$etime',
                color='$pcolor',
                night='$night',
                address='$address',
                admin_note='$admin_note',
                category='$category',
                itemnumber='$itemnumber',
                repeating='$repeating'
            WHERE id='$template_id' LIMIT 1
        ";
    
        if (!$conn->query($q)) {
            http_response_code(500);
            echo json_encode(['status'=>'error','message'=>'Template update failed.']);
            exit;
        }
        echo json_encode(['status'=>'ok','id'=>$template_id]);
        exit;
    }
    
    if ($action === 'template_delete') {
        $tplId = (int)ig($data, 'template_id', 0);
        if ($tplId <= 0) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Missing template_id']);
            exit;
        }
        $conn->query("DELETE FROM shifting_allocation_table WHERE id='$tplId' LIMIT 1");
        echo json_encode(['status'=>'ok']);
        exit;
    }
    
    if ($action === 'template_apply') {
        $tplId = (int)ig($data, 'template_id', 0);
        if ($tplId <= 0) { http_response_code(400); echo json_encode(['status'=>'error','message'=>'Missing template_id']); exit; }
        $tplQ = $conn->query("SELECT * FROM shifting_allocation_table WHERE id='$tplId' LIMIT 1");
        if (!$tplQ || $tplQ->num_rows === 0) { http_response_code(404); echo json_encode(['status'=>'error','message'=>'Template not found']); exit; }
        $tpl = $tplQ->fetch_assoc();
    
        $idx = 1;
        $rMax = $conn->query("SELECT id FROM shifting_allocation ORDER BY id DESC LIMIT 1");
        if ($rMax && $rMax->num_rows > 0) { $mx = $rMax->fetch_assoc(); $idx = (int)$mx['id'] + 1; }
    
        $q = "
            INSERT INTO shifting_allocation
            (id, employeeid, projectid, clientid, days, months, years, stime, sdate, edate, edays, emonths, eyears, etime,
             accepted, status, color, night, address, admin_note, category, itemnumber, repeating)
            VALUES
            ('$idx',
             '".$conn->real_escape_string($tpl['employeeid'])."',
             '".$conn->real_escape_string($tpl['projectid'])."',
             '".$conn->real_escape_string($tpl['clientid'])."',
             '".$conn->real_escape_string($tpl['days'])."',
             '".$conn->real_escape_string($tpl['months'])."',
             '".$conn->real_escape_string($tpl['years'])."',
             '".$conn->real_escape_string($tpl['stime'])."',
             '".$conn->real_escape_string($tpl['sdate'])."',
             '".$conn->real_escape_string($tpl['edate'])."',
             '".$conn->real_escape_string($tpl['edays'])."',
             '".$conn->real_escape_string($tpl['emonths'])."',
             '".$conn->real_escape_string($tpl['eyears'])."',
             '".$conn->real_escape_string($tpl['etime'])."',
             '0','1',
             '".$conn->real_escape_string($tpl['color'])."',
             '".$conn->real_escape_string($tpl['night'])."',
             '".$conn->real_escape_string($tpl['address'])."',
             '".$conn->real_escape_string($tpl['admin_note'])."',
             '".$conn->real_escape_string($tpl['category'])."',
             '".$conn->real_escape_string($tpl['itemnumber'])."',
             '".$conn->real_escape_string($tpl['repeating'])."'
            )
        ";
        if (!$conn->query($q)) { http_response_code(500); echo json_encode(['status'=>'error','message'=>'Failed to apply template']); exit; }
        echo json_encode(['status'=>'ok','id'=>$idx]);
        exit;
    }
    
    if ($action === 'template_apply_at') {
        $tplId = (int)ig($data, 'template_id', 0);
    
        // Prefer drop_date (YYYY-MM-DD) to avoid timezone shifting issues.
        $dropDate = ig($data, 'drop_date', '');
    
        // Backward compatibility: if drop_date not provided, try drop_start ISO.
        if ($dropDate === '') {
            $dropStartIso = ig($data, 'drop_start', '');
            if ($dropStartIso !== '') {
                $dropTs = strtotime($dropStartIso);
                if ($dropTs) $dropDate = date('Y-m-d', $dropTs);
            }
        }
    
        // Normalize drop_date: accept YYYY-MM-DD, ISO, or MM/DD/YYYY, DD/MM/YYYY
        if ($dropDate !== '' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dropDate)) {
            // ISO-like -> strtotime
            $ts = strtotime($dropDate);
            if ($ts) $dropDate = date('Y-m-d', $ts);
    
            // If still contains '/', try M/D/Y or D/M/Y
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dropDate) && strpos($dropDate, '/') !== false) {
                $parts = explode('/', $dropDate);
                if (count($parts) === 3) {
                    $p1 = (int)$parts[0]; $p2 = (int)$parts[1]; $p3 = (int)$parts[2];
                    if ($p3 > 31) {
                        if ($p1 > 12) { $day=$p1; $mon=$p2; }
                        else if ($p2 > 12) { $mon=$p1; $day=$p2; }
                        else { $mon=$p1; $day=$p2; }
                        $dropDate = sprintf('%04d-%02d-%02d', $p3, $mon, $day);
                    }
                }
            }
        }
    
    
        if ($tplId <= 0 || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dropDate)) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Missing template_id or valid drop_date']);
            exit;
        }
    
        $tplQ = $conn->query("SELECT * FROM shifting_allocation_table WHERE id='$tplId' LIMIT 1");
        if (!$tplQ || $tplQ->num_rows === 0) {
            http_response_code(404);
            echo json_encode(['status'=>'error','message'=>'Template not found']);
            exit;
        }
        $tpl = $tplQ->fetch_assoc();
    
        // Keep template time-of-day, replace date with dropped date.
        $tplTime = '00:00:00';
        if (!empty($tpl['stime'])) {
            $t = strtotime($tpl['stime']);
            if ($t) $tplTime = date('H:i:s', $t);
        }
    
        $newStart = $dropDate . ' ' . $tplTime;
        $newStartTs = strtotime($newStart);
        if (!$newStartTs) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Invalid computed start datetime']);
            exit;
        }
    
        // Duration from template sdate/edate (preferred) or stime/etime.
        $dur = 0;
        $tplStartTs = (int)$tpl['sdate'];
        $tplEndTs   = (int)$tpl['edate'];
        if ($tplStartTs > 0 && $tplEndTs > 0 && $tplEndTs > $tplStartTs) {
            $dur = $tplEndTs - $tplStartTs;
        } else {
            $a = strtotime($tpl['stime']);
            $b = strtotime($tpl['etime']);
            if ($a && $b && $b > $a) $dur = $b - $a;
        }
        if ($dur <= 0) $dur = 3600;
    
        $newEndTs = $newStartTs + $dur;
        $newEnd = date('Y-m-d H:i:s', $newEndTs);
    
        $sDays = date('d', $newStartTs);
        $sMonths = date('m', $newStartTs);
        $sYears = date('Y', $newStartTs);
    
        $eDays = date('d', $newEndTs);
        $eMonths = date('m', $newEndTs);
        $eYears = date('Y', $newEndTs);
    
        $idx = 1;
        $rMax = $conn->query("SELECT id FROM shifting_allocation ORDER BY id DESC LIMIT 1");
        if ($rMax && $rMax->num_rows > 0) {
            $mx = $rMax->fetch_assoc();
            $idx = (int)$mx['id'] + 1;
        }
    
        $q = "
            INSERT INTO shifting_allocation
            (id, employeeid, projectid, clientid,
             days, months, years, stime, sdate,
             edate, edays, emonths, eyears, etime,
             accepted, status, color,
             night, address, admin_note, category, itemnumber, repeating)
            VALUES
            ('$idx',
             '".$conn->real_escape_string($tpl['employeeid'])."',
             '".$conn->real_escape_string($tpl['projectid'])."',
             '".$conn->real_escape_string($tpl['clientid'])."',
             '".$conn->real_escape_string($sDays)."',
             '".$conn->real_escape_string($sMonths)."',
             '".$conn->real_escape_string($sYears)."',
             '".$conn->real_escape_string($newStart)."',
             '$newStartTs',
             '$newEndTs',
             '".$conn->real_escape_string($eDays)."',
             '".$conn->real_escape_string($eMonths)."',
             '".$conn->real_escape_string($eYears)."',
             '".$conn->real_escape_string($newEnd)."',
             '0','1',
             '".$conn->real_escape_string($tpl['color'])."',
             '".$conn->real_escape_string($tpl['night'])."',
             '".$conn->real_escape_string($tpl['address'])."',
             '".$conn->real_escape_string($tpl['admin_note'])."',
             '".$conn->real_escape_string($tpl['category'])."',
             '".$conn->real_escape_string($tpl['itemnumber'])."',
             '".$conn->real_escape_string($tpl['repeating'])."'
            )
        ";
        if (!$conn->query($q)) {
            http_response_code(500);
            echo json_encode(['status'=>'error','message'=>'DB insert failed']);
            exit;
        }
    
        echo json_encode(['status'=>'ok','id'=>$idx,'start'=>$newStart,'end'=>$newEnd,'color'=>$tpl['color']]);
        exit;
    }

    $id         = isset($data['id']) ? intval($data['id']) : null;

    // Quick action handlers (accept / request_time / cancel)
    if ($action === 'accept') {
        if (!$id) { http_response_code(400); echo json_encode(['status'=>'error','message'=>'Missing id']); exit; }
        $conn->query("UPDATE shifting_allocation SET accepted='1' WHERE id='$id' LIMIT 1");
        echo json_encode(['status'=>'ok']);
        exit;
    }
    if ($action === 'request_time') {
        if (!$id) { http_response_code(400); echo json_encode(['status'=>'error','message'=>'Missing id']); exit; }
        $clockin_request  = norm_dt(ig($data, 'clockin_request'));
        $clockout_request = norm_dt(ig($data, 'clockout_request'));
        if (!$clockin_request || !$clockout_request) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Both clockin_request and clockout_request are required']);
            exit;
        }
        
        $ci = $conn->real_escape_string($clockin_request);
        $co = $conn->real_escape_string($clockout_request);
        $ci = strtotime($ci);
        $co = strtotime($co);
        $conn->query("UPDATE shifting_allocation SET clockin_request='$ci', clockout_request='$co', request2='1' WHERE id='$id' LIMIT 1");
        echo json_encode(['status'=>'ok']);
        exit;
    }
    
    if ($action === 'cancel') {
        if (!$id) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Missing id']);
            exit;
        }
    
        $total_hour_raw = ig($data, 'total_hour', null);
        $total_hour_raw2 = ig($data, 'total_hour2', null);
        $cancel_reasons = ig($data, 'cancel_reasons', null);
        
        if ($total_hour_raw === null || $total_hour_raw === '') {
            // Legacy fallback: only cancel flag
            $conn->query("UPDATE shifting_allocation SET cancelled='1' WHERE id='$id' LIMIT 1");
            echo json_encode(['status'=>'ok','note'=>'Cancelled without total_hour (legacy)']);
            exit;
        }
    
        $total_hour = floatval($total_hour_raw);
        if (!is_finite($total_hour) || $total_hour <= 0) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Invalid total_hour']);
            exit;
        }
        
        $total_hour2 = floatval($total_hour_raw2);
        if (!is_finite($total_hour2) || $total_hour2 <= 0) {
            http_response_code(400);
            echo json_encode(['status'=>'error','message'=>'Invalid total_hour2']);
            exit;
        }
        
        // Fetch stime from DB
        $q = $conn->query("SELECT stime FROM shifting_allocation WHERE id='$id' LIMIT 1");
        if (!$q || $q->num_rows === 0) {
            http_response_code(404);
            echo json_encode(['status'=>'error','message'=>'Shift not found']);
            exit;
        }
        
        $row = $q->fetch_assoc();
        $stime_str = $row['stime'];
    
        $clockin_ts = strtotime($stime_str);
        if (!$clockin_ts) {
            http_response_code(500);
            echo json_encode(['status'=>'error','message'=>'Invalid stime on record']);
            exit;
        }
    
        $seconds_to_add = (int)round($total_hour * 3600);
        $clockout_ts    = $clockin_ts + $seconds_to_add;
        
        $seconds_to_add2 = (int)round($total_hour2 * 3600);
        $clockout_ts2    = $clockin_ts + $seconds_to_add2;
    
        // Update DB (clockin/clockout stored as UNIX timestamps)
        $total_hour_sql = $conn->real_escape_string((string)$total_hour);
        $total_hour_sql2 = $conn->real_escape_string((string)$total_hour2);
        
        $clockin_sql    = (int)$clockin_ts;
        $clockout_sql   = (int)$clockout_ts;
        $clockout_sql2   = (int)$clockout_ts2;
    
        $upd = "UPDATE shifting_allocation SET cancelled='1', total_hour='$total_hour_sql', total_hour2='$total_hour_sql2', milage='1', clockin='$clockin_sql', clockout='$clockout_sql', clockout2='$clockout_sql2', cancel_reason='$cancel_reasons' WHERE id='$id' LIMIT 1";
        if (!$conn->query($upd)) {
            http_response_code(500);
            echo json_encode(['status'=>'error','message'=>'Database update failed']);
            exit;
        }
    
        echo json_encode([
            'status'     => 'ok',
            'id'         => $id,
            'cancelled'  => 1,
            'total_hour' => $total_hour,
            'total_hour2' => $total_hour2,
            'cancel_reason' => $cancel_reason,
            'clockin'    => $clockin_ts,
            'clockout'   => $clockout_ts,
            'clockout2'   => $clockout_ts2
        ]);
        exit;
    }



    // Common fields for insert/update/copy/move/resize
    $projectid  = $conn->real_escape_string(ig($data, 'projectid'));
    $stime      = norm_dt(ig($data, 'stime'));
    $etime      = norm_dt(ig($data, 'etime'));
    $itemnumber = $conn->real_escape_string(ig($data, 'itemnumber'));
    $clientid   = $conn->real_escape_string(ig($data, 'clientid'));
    $employeeid = $conn->real_escape_string(ig($data, 'employeeid'));
    $start      = norm_dt(ig($data, 'start'));
    $end        = norm_dt(ig($data, 'end'));
    $repeating  = $conn->real_escape_string(ig($data, 'repeating'));
    $night      = $conn->real_escape_string(ig($data, 'night'));
    $pcolor     = $conn->real_escape_string(ig($data, 'pcolor'));
    $admin_note = $conn->real_escape_string(ig($data, 'admin_note'));
    $address    = $conn->real_escape_string(ig($data, 'address'));
    $category   = 0;

    // Names / designation helpers
    $employeename = '';
    if ($employeeid !== '') {
        $rx1 = $conn->query("SELECT username, username2, designation FROM uerp_user WHERE id='$employeeid' LIMIT 1");
        if ($rx1 && $rx1->num_rows > 0) {
            $ry1 = $rx1->fetch_assoc();
            $employeename = "Worker: {$ry1['username']} {$ry1['username2']}";
            $category = "{$ry1['designation']}";
        }
    }

    $itemname = '';
    if ($itemnumber !== '') {
        // adjust to YOUR root db handle if different
        $rx11 = $conn_main->query("SELECT item_number, item_name FROM ndis_line_numbers WHERE id='$itemnumber' LIMIT 1");
        if ($rx11 && $rx11->num_rows > 0) {
            $ry11 = $rx11->fetch_assoc();
            $itemname = "{$ry11['item_number']}";
        }
    }

    $clientname = '';
    $clientaddress = '';
    if ($clientid !== '') {
        $r8 = $conn->query("SELECT username, username2, address FROM uerp_user WHERE id='$clientid' LIMIT 1");
        if ($r8 && $r8->num_rows > 0) {
            $ry2 = $r8->fetch_assoc();
            $clientname = "Client: {$ry2['username']} {$ry2['username2']}";
            $clientaddress = $ry2['address'];
        }
    }
    if ($address === '') $address = $conn->real_escape_string($clientaddress);

    // -----------------------
    // COPY: action == 'copy'
    // -----------------------
    if ($action === 'copy') {
        $sourceId = intval(ig($data, 'source_id', $id));
        if ($sourceId <= 0) {
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Missing source shift id for copy.']);
            exit;
        }

        $srcQ = $conn->query("SELECT * FROM shifting_allocation WHERE id='$sourceId' LIMIT 1");
        if (!$srcQ || $srcQ->num_rows === 0) {
            http_response_code(404);
            echo json_encode(['status' => 'error', 'message' => 'Source shift not found.']);
            exit;
        }
        $src = $srcQ->fetch_assoc();

        // Prefer posted fields; fallback to source record
        $new_projectid  = ($projectid !== '')  ? $projectid  : $src['projectid'];
        $new_clientid   = ($clientid  !== '')  ? $clientid   : $src['clientid'];
        $new_employeeid = ($employeeid!== '')  ? $employeeid : $src['employeeid'];
        $new_night      = ($night     !== '')  ? $night      : $src['night'];
        $new_color      = ($pcolor    !== '')  ? $pcolor     : $src['color'];
        $new_admin_note = ($admin_note!== '')  ? $admin_note : $src['admin_note'];
        $new_category   = ($category  !== 0)   ? $category   : $src['category'];
        $new_itemnumber = ($itemnumber!== '')  ? $itemnumber : $src['itemnumber'];
        $new_address    = ($address   !== '')  ? $address    : $src['address'];
        $new_repeating  = ($repeating !== '')  ? $repeating  : ($src['repeating'] ?: 'Once');

        // Compute duration from source
        $src_s_ts = strtotime($src['stime']);
        $src_e_ts = strtotime($src['etime']);
        $duration = ($src_s_ts && $src_e_ts && $src_e_ts > $src_s_ts) ? ($src_e_ts - $src_s_ts) : 3600;

        // New time window
        $new_stime_in = norm_dt(ig($data, 'start'));
        if (!$new_stime_in) $new_stime_in = norm_dt($src['stime']); // fallback
        $s_ts = strtotime($new_stime_in);

        $new_etime_in = norm_dt(ig($data, 'end'));
        $e_ts = $new_etime_in ? strtotime($new_etime_in) : ($s_ts + $duration);

        // Final normalized strings (Y-m-d H:i:s)
        $new_stime = date('Y-m-d H:i:s', $s_ts);
        $new_etime = date('Y-m-d H:i:s', $e_ts);

        // Derive calendar parts
        $sdate_ts = $s_ts;
        $edate_ts = $e_ts;
        $syears = date('Y', $sdate_ts);
        $smonths = date('m', $sdate_ts);
        $sdays = date('d', $sdate_ts);
        $eyears = date('Y', $edate_ts);
        $emonths = date('m', $edate_ts);
        $edays = date('d', $edate_ts);

        // manual id
        $idx = 1;
        $rMax = $conn->query("SELECT id FROM shifting_allocation ORDER BY id DESC LIMIT 1");
        if ($rMax && $rMax->num_rows > 0) {
            $mx = $rMax->fetch_assoc();
            $idx = (int)$mx['id'] + 1;
        }

        $allocatedtime = substr($new_stime, 11, 5) . '-' . substr($new_etime, 11, 5);

        // Notification
        $projectname = '';
        $c2y = $conn->query("SELECT name FROM project WHERE id='". $conn->real_escape_string($new_projectid) ."' LIMIT 1");
        if ($c2y && $c2y->num_rows > 0) {
            $c3y = $c2y->fetch_assoc();
            $projectname = "{$c3y['name']}";
        }
        $clientname_plain = '';
        $c2x = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='". $conn->real_escape_string($new_clientid) ."' LIMIT 1");
        if ($c2x && $c2x->num_rows > 0) {
            $c3x = $c2x->fetch_assoc();
            $clientname_plain = "{$c3x['username']} {$c3x['username2']}";
        }
        $title = "Shift Allocated for Client [ $clientname_plain ].";
        $message = "$projectname, Date: $new_stime - $new_etime, Repeating: $new_repeating, Admin Note: $new_admin_note - <a href='index.php?url=clock_in-out.php&id=5199' target='_top'>View Shifts</a>.";
        $stmt = $conn->prepare("INSERT INTO notifications (user_id,title,message) VALUES (?,?,?)");
        $stmt->bind_param('iss', $new_employeeid, $title, $message);
        $stmt->execute();

        // Insert copy
        $q = "
            INSERT INTO shifting_allocation
            (id, employeeid, projectid, clientid, days, months, years, stime, edays, emonths, eyears, etime, accepted, status, color, address, sdate, edate, night, admin_note, category, itemnumber, repeating)
            VALUES
            ('$idx', '$new_employeeid', '$new_projectid', '$new_clientid', '$sdays', '$smonths', '$syears', '$new_stime', '$edays', '$emonths', '$eyears', '$new_etime', '0', '1', '$new_color', '$new_address', '$sdate_ts', '$edate_ts', '$new_night', '$new_admin_note', '$new_category', '$new_itemnumber', '$new_repeating')
        ";
        $conn->query($q);

        // Build names for response (based on new employee/client)
        $resp_emp = $employeename;
        if ($new_employeeid !== '' && $new_employeeid !== $employeeid) {
            $re = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='". $conn->real_escape_string($new_employeeid) ."' LIMIT 1");
            if ($re && $re->num_rows > 0) { $er = $re->fetch_assoc(); $resp_emp = "Worker: {$er['username']} {$er['username2']}"; }
        }
        $resp_client = $clientname;
        if ($new_clientid !== '' && $new_clientid !== $clientid) {
            $rc = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='". $conn->real_escape_string($new_clientid) ."' LIMIT 1");
            if ($rc && $rc->num_rows > 0) { $cr = $rc->fetch_assoc(); $resp_client = "Client: {$cr['username']} {$cr['username2']}"; }
        }

        echo json_encode([
            'status'        => 'ok',
            'id'            => $idx,
            'title'         => htmlspecialchars($resp_emp),
            'start'         => htmlspecialchars($new_stime),
            'end'           => htmlspecialchars($new_etime),
            'stime'         => htmlspecialchars($new_stime),
            'etime'         => htmlspecialchars($new_etime),
            'color'         => htmlspecialchars($new_color),
            'employee'      => htmlspecialchars($resp_emp),
            'client'        => htmlspecialchars($resp_client),
            'category'      => htmlspecialchars($new_category),
            'itemnumber'    => htmlspecialchars($new_itemnumber),
            'itemname'      => htmlspecialchars($itemname),
            'admin_note'    => htmlspecialchars($new_admin_note),
            'address'       => htmlspecialchars($new_address),
            'repeating'     => htmlspecialchars($new_repeating),
            'allocatedtime' => htmlspecialchars($allocatedtime)
        ]);
        exit;
    }

    // -----------------------
    // UPDATE (move/resize/general edit)
    // -----------------------
    if ($id) {
        $sdate_ts = strtotime($stime ?: $start);
        $edate_ts = strtotime($etime ?: $end);

        // Fallback to existing times if not provided
        if (!$sdate_ts || !$edate_ts) {
            $existing = $conn->query("SELECT stime, etime FROM shifting_allocation WHERE id='$id' LIMIT 1");
            if ($existing && $existing->num_rows > 0) {
                $ex = $existing->fetch_assoc();
                if (!$sdate_ts) $sdate_ts = strtotime($ex['stime']);
                if (!$edate_ts) $edate_ts = strtotime($ex['etime']);
            }
        }

        $syears = date('Y', $sdate_ts);
        $smonths = date('m', $sdate_ts);
        $sdays = date('d', $sdate_ts);
        $eyears = date('Y', $edate_ts);
        $emonths = date('m', $edate_ts);
        $edays = date('d', $edate_ts);

        $stime_fmt = date("Y-m-d H:i:s", $sdate_ts);
        $etime_fmt = date("Y-m-d H:i:s", $edate_ts);

        $query = "
            UPDATE shifting_allocation SET
                days='$sdays',
                months='$smonths',
                years='$syears',
                stime='$stime_fmt',
                edays='$edays',
                emonths='$emonths',
                eyears='$eyears',
                etime='$etime_fmt',
                sdate='$sdate_ts',
                edate='$edate_ts',
                address='$address',
                night='$night',
                color='$pcolor',
                admin_note='$admin_note',
                category='$category',
                itemnumber='$itemnumber',
                repeating='$repeating'
            WHERE id='$id' LIMIT 1
        ";
        $conn->query($query);

        $stimeHM = substr($stime_fmt, 11, 5);
        $etimeHM = substr($etime_fmt, 11, 5);
        $allocatedtime = "{$stimeHM}-{$etimeHM}";

        echo json_encode([
            'id'            => $id,
            'title'         => htmlspecialchars($employeename),
            'start'         => htmlspecialchars($stime_fmt),
            'end'           => htmlspecialchars($etime_fmt),
            'stime'         => htmlspecialchars($stime_fmt),
            'etime'         => htmlspecialchars($etime_fmt),
            'color'         => htmlspecialchars($pcolor),
            'employee'      => htmlspecialchars($employeename),
            'client'        => htmlspecialchars($clientname),
            'category'      => htmlspecialchars($category),
            'itemnumber'    => htmlspecialchars($itemnumber),
            'itemname'      => htmlspecialchars($itemname),
            'admin_note'    => htmlspecialchars($admin_note),
            'address'       => htmlspecialchars($address),
            'repeating'     => htmlspecialchars($repeating),
            'allocatedtime' => htmlspecialchars($allocatedtime)
        ]);
        exit;
    }

    // -----------------------
    // INSERT (add new)
    // -----------------------
    if (!$stime || !$etime) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing start/end time.']);
        exit;
    }

    $sdate_ts = strtotime($stime);
    $edate_ts = strtotime($etime);

    $syears = date('Y', $sdate_ts);
    $smonths = date('m', $sdate_ts);
    $sdays = date('d', $sdate_ts);
    $eyears = date('Y', $edate_ts);
    $emonths = date('m', $edate_ts);
    $edays = date('d', $edate_ts);

    $allocatedtime = substr($stime, 11, 5) . '-' . substr($etime, 11, 5);

    // manual id
    $idx = 1;
    $r8x = $conn->query("SELECT id FROM shifting_allocation ORDER BY id DESC LIMIT 1");
    if ($r8x && $r8x->num_rows > 0) {
        $ry2x = $r8x->fetch_assoc();
        $idx = (int)$ry2x['id'] + 1;
    }

    // Notification
    $clientname_plain = '';
    $c2x = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='". $conn->real_escape_string($clientid) ."' LIMIT 1");
    if ($c2x && $c2x->num_rows > 0) {
        $c3x = $c2x->fetch_assoc();
        $clientname_plain = "{$c3x['username']} {$c3x['username2']}";
    }
    $projectname = '';
    $c2y = $conn->query("SELECT name FROM project WHERE id='". $conn->real_escape_string($projectid) ."' LIMIT 1");
    if ($c2y && $c2y->num_rows > 0) {
        $c3y = $c2y->fetch_assoc();
        $projectname = "{$c3y['name']}";
    }
    $title = "Shift Allocated for Client [ $clientname_plain ].";
    $message = "$projectname, Date: $stime - $etime, Repeating: $repeating, Admin Note: $admin_note - <a href='index.php?url=clock_in-out.php&id=5199' target='_top'>View Shifts</a>.";
    $stmt = $conn->prepare("INSERT INTO notifications (user_id,title,message) VALUES (?,?,?)");
    $stmt->bind_param('iss', $employeeid, $title, $message);
    $stmt->execute();

    $query = "
        INSERT INTO shifting_allocation
        (id, employeeid, projectid, clientid, days, months, years, stime, edays, emonths, eyears, etime, accepted, status, color, address, sdate, edate, night, admin_note, category, itemnumber, repeating)
        VALUES
        ('$idx', '$employeeid', '$projectid', '$clientid', '$sdays', '$smonths', '$syears', '$stime', '$edays', '$emonths', '$eyears', '$etime', '0', '1', '$pcolor', '$address', '$sdate_ts', '$edate_ts', '$night', '$admin_note', '$category', '$itemnumber', '$repeating')
    ";
    $conn->query($query);

    echo json_encode([
        'id'            => $idx,
        'title'         => htmlspecialchars($employeename),
        'start'         => htmlspecialchars($stime),
        'end'           => htmlspecialchars($etime),
        'stime'         => htmlspecialchars($stime),
        'etime'         => htmlspecialchars($etime),
        'color'         => htmlspecialchars($pcolor),
        'employee'      => htmlspecialchars($employeename),
        'client'        => htmlspecialchars($clientname),
        'category'      => htmlspecialchars($category),
        'itemnumber'    => htmlspecialchars($itemnumber),
        'itemname'      => htmlspecialchars($itemname),
        'admin_note'    => htmlspecialchars($admin_note),
        'address'       => htmlspecialchars($address),
        'repeating'     => htmlspecialchars($repeating),
        'allocatedtime' => htmlspecialchars($allocatedtime)
    ]);
    exit;
}

echo json_encode(['error' => 'Unsupported method']);
exit;



