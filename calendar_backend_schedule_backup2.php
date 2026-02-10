<?php
    // calendar_backend_schedule.php
    include 'include.php';
    
    header('Content-Type: application/json');
    // Helper: normalize "YYYY-MM-DDTHH:MM" -> "YYYY-MM-DD HH:MM:SS"
    function norm_dt($v) {
        if (!isset($v) || $v === '') return null;
        $v = str_replace('T', ' ', trim($v));
        // If only minutes provided, add seconds
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
        // Resolve client for the active project (from cookie)
        $clientid = 0;
        $pid = $conn->real_escape_string($prj);
        $r2 = $conn->query("SELECT clientid FROM project WHERE id='$pid' AND status='1' ORDER BY id ASC LIMIT 1");
        if ($r2 && $r2->num_rows > 0) {
            $r3 = $r2->fetch_assoc();
            $clientid = $r3['clientid'];
        }
        
        $events = [];
        if ($clientid) {
            $result = $conn->query("SELECT * FROM shifting_allocation WHERE clientid = '$clientid' and status='1'");
            while ($row = $result->fetch_assoc()) {
                // Employee
                $employeename = '';
                $eid = $conn->real_escape_string($row['employeeid']);
                $e2 = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='$eid' LIMIT 1");
                if ($e2 && $e2->num_rows > 0) {
                    $e3 = $e2->fetch_assoc();
                    $employeename = "Worker: {$e3['username']} {$e3['username2']}";
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

                $events[] = [
                    'id'            => $row['id'],
                    'idx'           => $row['id'],
                    'title'         => $employeename,
                    'employee'      => $employeename,
                    'client'        => $clientname,
                    'clientid'      => $row['clientid'],
                    'employeeid'    => $row['employeeid'],
                    'projectid'     => $row['projectid'],
                    'start'         => $row['stime'],
                    'end'           => $row['etime'],
                    'stime'         => $row['stime'],
                    'etime'         => $row['etime'],
                    'color'         => $row['color'],
                    'pcolor'        => $row['color'],
                    'night'         => $row['night'],
                    'category'      => $row['category'],
                    'itemnumber'    => $row['itemnumber'],
                    'admin_note'    => $row['admin_note'],
                    'address'       => $row['address'],
                    'repeating'     => $row['repeating'],
                    'allocatedtime' => $allocatedtime
                ];
            }
        }else{
            $result = $conn->query("SELECT * FROM shifting_allocation WHERE status='1'");
            while ($row = $result->fetch_assoc()) {
                // Employee
                $employeename = '';
                $eid = $conn->real_escape_string($row['employeeid']);
                $e2 = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='$eid' LIMIT 1");
                if ($e2 && $e2->num_rows > 0) {
                    $e3 = $e2->fetch_assoc();
                    $employeename = "Worker: {$e3['username']} {$e3['username2']}";
                    $designation = "{$e3['designation']}";
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

                $events[] = [
                    'id'            => $row['id'],
                    'idx'           => $row['id'],
                    'title'         => $employeename,
                    'employee'      => $employeename,
                    'client'        => $clientname,
                    'clientid'      => $row['clientid'],
                    'employeeid'    => $row['employeeid'],
                    'projectid'     => $row['projectid'],
                    'start'         => $row['stime'],
                    'end'           => $row['etime'],
                    'stime'         => $row['stime'],
                    'etime'         => $row['etime'],
                    'color'         => $row['color'],
                    'pcolor'        => $row['color'],
                    'night'         => $row['night'],
                    'category'      => $row['category'],
                    'itemnumber'    => $row['itemnumber'],
                    'admin_note'    => $row['admin_note'],
                    'address'       => $row['address'],
                    'repeating'     => $row['repeating'],
                    'allocatedtime' => $allocatedtime
                ];
            }
        }
        

        echo json_encode($events);
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!is_array($data)) $data = [];

        // DELETE handler (JS sends { id, delete: true })
        if (!empty($data['delete']) && !empty($data['id'])) {
            $id = intval($data['id']);
            $conn->query("DELETE FROM shifting_allocation WHERE id='$id' LIMIT 1");
            echo json_encode(['ok' => true]);
            exit;
        }

        // Common fields
        // id,url,projectid,stime,etime,category,itemnumber,clientid,employeeid,start,end,repeating,night,pcolor,admin_note,address,
        
        $id         = isset($data['id']) ? intval($data['id']) : null;
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
        
        // Fetch names for response
        $employeename = '';
        if ($employeeid !== '') {
            $rx1 = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='$employeeid' LIMIT 1");
            if ($rx1 && $rx1->num_rows > 0) {
                $ry1 = $rx1->fetch_assoc();
                $employeename = "Worker: {$ry1['username']} {$ry1['username2']}";
                $category = "{$ry1['designation']}";
            }
        }
        
        $itemname= '';
        if ($itemnumber !== '') {   
            $rx11 = $conn_main->query("SELECT item_number, item_name FROM ndis_line_numbers WHERE id='$itemnumber' LIMIT 1");
            if ($rx11 && $rx11->num_rows > 0) {
                $ry11 = $rx11->fetch_assoc();
                $itemname = "{$ry11['item_number']}";
            }
        }
        
        $clientname   = '';
        $clientaddress = '';
        if ($clientid !== '') {
            $r8 = $conn->query("SELECT username, username2, address FROM uerp_user WHERE id='$clientid' LIMIT 1");
            if ($r8 && $r8->num_rows > 0) {
                $ry2 = $r8->fetch_assoc();
                $clientname   = "Client: {$ry2['username']} {$ry2['username2']}";
                $clientaddress = $ry2['address'];
            }
        }

        // If address not provided in request, default to client's address
        if ($address === '') $address = $conn->real_escape_string($clientaddress);

        // If still missing datetimes, try to keep existing (update path will refetch)
        if ($id) {
            
            // For update, if still missing stime/etime, read existing values
            /*
            $existing = $conn->query("SELECT stime, etime FROM shifting_allocation WHERE id='$id' LIMIT 1");
            if ($existing && $existing->num_rows > 0) {
                $ex = $existing->fetch_assoc();
                $stime = $ex['stime'];
                $etime = $ex['etime'];
            }
            */

            // Compute derived fields
            $sdate_ts = strtotime($stime);
            $edate_ts = strtotime($etime);

            $syears = date('Y', $sdate_ts);
            $smonths = date('m', $sdate_ts);
            $sdays = date('d', $sdate_ts);
            
            $eyears = date('Y', $edate_ts);
            $emonths = date('m', $edate_ts);
            $edays = date('d', $edate_ts);
            
            $stime= date("Y-m-d H:m:s",$sdate_ts);
            $etime= date("Y-m-d H:m:s",$edate_ts);
            
            $query = "
                UPDATE shifting_allocation SET
                    days='$sdays',
                    months='$smonths',
                    years='$syears',
                    stime='$stime',
                    edays='$edays',
                    emonths='$emonths',
                    eyears='$eyears',
                    etime='$etime',
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
            
            // Build response
            $stimeHM = substr($stime, 11, 5);
            $etimeHM = substr($etime, 11, 5);
            $allocatedtime = "{$stimeHM}-{$etimeHM}";
            
            echo json_encode([
                'id'            => $id,
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
            
        } else {
            
            $weekday = strtolower(date("D", strtotime($stime)));
            
            // INSERT
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

            // Manually assign id (to match your original approach)
            $idx = null;
            $r8x = $conn->query("SELECT id FROM shifting_allocation ORDER BY id DESC LIMIT 1");
            if ($r8x && $r8x->num_rows > 0) {
                $ry2x = $r8x->fetch_assoc();
                $idx = (int)$ry2x['id'] + 1;
            } else {
                $idx = 1;
            }
            
            // Client
            $clientname = '';
            $cidx = $conn->real_escape_string($clientid);
            $c2x = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='$cidx' LIMIT 1");
            if ($c2x && $c2x->num_rows > 0) {
                $c3x = $c2x->fetch_assoc();
                $clientname = "{$c3x['username']} {$c3x['username2']}";
            }
            
            // Project
            $projectname = '';
            $cidy = $conn->real_escape_string($projectid);
            $c2y = $conn->query("SELECT name FROM project WHERE id='$cidy' LIMIT 1");
            if ($c2y && $c2y->num_rows > 0) {
                $c3y = $c2y->fetch_assoc();
                $projectname = "{$c3y['name']}";
            }
            
            $user_id="";
            $title="Shift Allocated for Client [ $clientname. ]";
            $message="$projectname, Date: $stime - $etime, Repeating: $repeating, Admin Note: $admin_note - <a href='#'>Accept Shift</a>.";
            $stmt = $conn->prepare("INSERT INTO notifications (user_id,title,message) VALUES (?,?,?)");
            $stmt->bind_param('iss', $employeeid, $title, $message);
            $stmt->execute();    
            
            // Insert with all relevant fields
            $query = "
                INSERT INTO shifting_allocation (id, employeeid, projectid, clientid, days, months, years, stime, edays, emonths, eyears, etime, accepted, status, color, address, sdate, edate, night, admin_note, category, itemnumber, repeating)
                VALUES ('$idx', '$employeeid', '$projectid', '$clientid', '$sdays', '$smonths', '$syears', '$stime', '$edays', '$emonths', '$eyears', '$etime', '0', '1', '$pcolor', '$address', '$sdate_ts', '$edate_ts', '$night', '$admin_note', '$category', '$itemnumber', '$repeating')
            ";
            $conn->query($query);

            echo json_encode([
                'id'            => $idx, // return manual id
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
    }

    // Fallback
    echo json_encode(['error' => 'Unsupported method']);
    exit;
