<?php
// calendar_backend_schedule.php
include 'include.php';

header('Content-Type: application/json');

// Normalize "YYYY-MM-DDTHH:MM(:SS)?" -> "YYYY-MM-DD HH:MM:SS"
function norm_dt($v) {
    if (!isset($v) || $v === '') return null;
    $v = str_replace('T', ' ', trim($v));
    if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/', $v)) {
        $v .= ':00';
    }
    return $v;
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

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
    $sql = $clientid
        ? "SELECT * FROM shifting_allocation WHERE clientid = '$clientid' AND status='1'"
        : "SELECT * FROM shifting_allocation WHERE status='1'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        
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
