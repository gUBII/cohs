<?php
// repeating_manager.php (standalone)
// Requires: include.php (mysqli $conn)
// Uses: shifting_allocation_table (templates), shifting_allocation (generated shifts), uerp_user (names)

include 'include.php';

// ------------------------------
// Helpers
// ------------------------------
function json_out($arr, int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($arr);
    exit;
}

function get_json_body(): array {
    $raw = file_get_contents('php://input');
    if (!$raw) return [];
    $j = json_decode($raw, true);
    return is_array($j) ? $j : [];
}

function norm_dt($v): ?string {
    if (!isset($v) || $v === '') return null;
    $v = str_replace('T', ' ', trim((string)$v));
    if (preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/', $v)) $v .= ':00';
    if (!preg_match('/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/', $v)) return null;
    return $v;
}

function repeat_interval(string $rep): array {
    $rep = trim($rep);

    // Normalize common “once” variants to unit=once
    $low = strtolower($rep);
    if ($low === '' || $low === 'once' || $low === 'one time' || $low === 'single') {
        return ['unit' => 'once', 'n' => 0];
    }

    $mapWeeks = [
        "Week Repeat"       => 1,
        "Fortnight Repeat"  => 2,
        "2 Weeks Repeat"    => 2,
        "3 Weeks Repeat"    => 3,
        "4 Weeks Repeat"    => 4,
        "6 Weeks Repeat"    => 6,
        "8 Weeks Repeat"    => 8,
        "12 Weeks Repeat"   => 12,
    ];
    $mapMonths = [
        "Month Repeat"      => 1,
        "2 Months Repeat"   => 2,
        "3 Months Repeat"   => 3,
        "6 Months Repeat"   => 6,
        "12 Months Repeat"  => 12,
    ];

    if (isset($mapWeeks[$rep]))  return ['unit' => 'week',  'n' => $mapWeeks[$rep]];
    if (isset($mapMonths[$rep])) return ['unit' => 'month', 'n' => $mapMonths[$rep]];

    // Unknown label: do nothing rather than generating incorrectly
    return ['unit' => 'once', 'n' => 0];
}

function fmt_dt(DateTime $dt): string {
    return $dt->format('Y-m-d H:i:s');
}

function table_columns(mysqli $conn, string $table): array {
    $cols = [];
    $res = $conn->query("SHOW COLUMNS FROM `$table`");
    if ($res) {
        while ($r = $res->fetch_assoc()) {
            $cols[strtolower($r['Field'])] = true;
        }
    }
    return $cols;
}

function has_col(array $cols, string $col): bool {
    return isset($cols[strtolower($col)]);
}

function require_cols_or_skip(array $cols, array $wanted): array {
    // Return only columns that exist in actual table
    $out = [];
    foreach ($wanted as $c) {
        if (has_col($cols, $c)) $out[] = $c;
    }
    return $out;
}

function safe_int($v): int {
    return (int)($v ?? 0);
}

function safe_str(mysqli $conn, $v): string {
    return $conn->real_escape_string((string)($v ?? ''));
}

// ------------------------------
// API Router
// ------------------------------
$isApi = isset($_GET['api']) || (isset($_SERVER['CONTENT_TYPE']) && stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== false);

if ($isApi) {
    $method = $_SERVER['REQUEST_METHOD'];
    $action = $_GET['action'] ?? '';

    if ($method === 'POST') {
        $body = get_json_body();
        $action = $body['action'] ?? $action;
    }

    // Basic ping
    if ($action === 'ping') {
        json_out(['ok' => true, 'ts' => date('Y-m-d H:i:s')]);
    }

    // Clients list
    if ($action === 'clients_list') {
        $rows = [];
        $q = $conn->query("SELECT id, username, username2 FROM uerp_user WHERE mtype='CLIENT' AND (status='1' OR status=1) ORDER BY username ASC");
        if ($q) while ($r = $q->fetch_assoc()) {
            $rows[] = ['id' => (int)$r['id'], 'name' => trim($r['username'].' '.$r['username2'])];
        }
        json_out($rows);
    }

    // Workers list (USER/EMPLOYEE)
    if ($action === 'employees_list') {
        $rows = [];
        $q = $conn->query("SELECT id, username, username2, mtype FROM uerp_user WHERE (mtype='USER' OR mtype='EMPLOYEE') AND (status='1' OR status=1) ORDER BY username ASC");
        if ($q) while ($r = $q->fetch_assoc()) {
            $rows[] = ['id' => (int)$r['id'], 'name' => trim($r['username'].' '.$r['username2'])];
        }
        json_out($rows);
    }

    // Projects list (optional table)
    if ($action === 'projects_list') {
        $rows = [];
        $res = $conn->query("SHOW TABLES LIKE 'project'");
        if ($res && $res->num_rows > 0) {
            $q = $conn->query("SELECT id, title, clientid FROM project WHERE (status='1' OR status=1) ORDER BY id DESC");
            if ($q) while ($r = $q->fetch_assoc()) {
                $rows[] = ['id' => (int)$r['id'], 'title' => (string)($r['title'] ?? ('Project #'.$r['id'])), 'clientid' => (int)($r['clientid'] ?? 0)];
            }
        }
        json_out($rows);
    }

    // Templates list
    if ($action === 'templates_list') {
        $projectid  = isset($_GET['projectid']) ? (int)$_GET['projectid'] : 0;
        $clientid   = isset($_GET['clientid']) ? (int)$_GET['clientid'] : 0;
        $employeeid = isset($_GET['employeeid']) ? (int)$_GET['employeeid'] : 0;

        $where = ["(status='1' OR status=1)"];
        if ($projectid > 0)  $where[] = "projectid=".$projectid;
        if ($clientid > 0)   $where[] = "clientid=".$clientid;
        if ($employeeid > 0) $where[] = "employeeid=".$employeeid;

        $sql = "SELECT * FROM shifting_allocation_table WHERE ".implode(" AND ", $where)." ORDER BY id DESC";
        $q = $conn->query($sql);

        // name maps
        $nameCache = [];
        $getName = function($uid) use ($conn, &$nameCache) {
            $uid = (int)$uid;
            if ($uid <= 0) return '';
            if (isset($nameCache[$uid])) return $nameCache[$uid];
            $r = $conn->query("SELECT username, username2 FROM uerp_user WHERE id='$uid' LIMIT 1");
            $name = '';
            if ($r && $r->num_rows) {
                $x = $r->fetch_assoc();
                $name = trim($x['username'].' '.$x['username2']);
            }
            $nameCache[$uid] = $name;
            return $name;
        };

        $rows = [];
        if ($q) while ($t = $q->fetch_assoc()) {
            $rows[] = [
                'id' => (int)$t['id'],
                'projectid' => (int)($t['projectid'] ?? 0),
                'clientid' => (int)($t['clientid'] ?? 0),
                'employeeid' => (int)($t['employeeid'] ?? 0),
                'client' => $getName($t['clientid'] ?? 0),
                'employee' => $getName($t['employeeid'] ?? 0),
                'stime' => $t['stime'] ?? '',
                'etime' => $t['etime'] ?? '',
                'repeating' => $t['repeating'] ?? '',
                'itemnumber' => $t['itemnumber'] ?? '',
                'category' => $t['category'] ?? '',
                'night' => $t['night'] ?? '',
                'color' => $t['color'] ?? '',
                'admin_note' => $t['admin_note'] ?? '',
                'address' => $t['address'] ?? '',
            ];
        }
        json_out($rows);
    }

    // Template get
    if ($action === 'template_get') {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id <= 0) json_out(['error' => 'Missing id'], 400);
        $q = $conn->query("SELECT * FROM shifting_allocation_table WHERE id='$id' LIMIT 1");
        if ($q && $q->num_rows) json_out($q->fetch_assoc());
        json_out(['error' => 'Not found'], 404);
    }

    // Template save/update/delete
    if ($method === 'POST' && ($action === 'template_save' || $action === 'template_update' || $action === 'template_delete')) {
        $body = get_json_body();
        $colsTpl = table_columns($conn, 'shifting_allocation_table');

        if ($action === 'template_delete') {
            $id = (int)($body['id'] ?? 0);
            if ($id <= 0) json_out(['error' => 'Missing id'], 400);
            $conn->query("DELETE FROM shifting_allocation_table WHERE id='$id' LIMIT 1");
            json_out(['ok' => true]);
        }

        $id         = (int)($body['id'] ?? 0);
        $projectid  = (int)($body['projectid'] ?? 0);
        $clientid   = (int)($body['clientid'] ?? 0);
        $employeeid = (int)($body['employeeid'] ?? 0);
        $repeating  = trim((string)($body['repeating'] ?? 'Once'));

        $stime = norm_dt($body['stime'] ?? '');
        $etime = norm_dt($body['etime'] ?? '');

        if ($projectid <= 0 || $clientid <= 0 || $employeeid <= 0 || !$stime || !$etime) {
            json_out(['error' => 'Missing required fields (projectid, clientid, employeeid, stime, etime)'], 400);
        }

        $s_ts = strtotime($stime);
        $e_ts = strtotime($etime);
        if (!$s_ts || !$e_ts || $e_ts <= $s_ts) {
            json_out(['error' => 'Invalid stime/etime'], 400);
        }

        $days   = date('d', $s_ts);
        $months = date('m', $s_ts);
        $years  = date('Y', $s_ts);

        $edays   = date('d', $e_ts);
        $emonths = date('m', $e_ts);
        $eyears  = date('Y', $e_ts);

        $payload = [
            'projectid'  => $projectid,
            'clientid'   => $clientid,
            'employeeid' => $employeeid,
            'repeating'  => $repeating,
            'stime'      => $stime,
            'etime'      => $etime,
            'sdate'      => $s_ts,
            'edate'      => $e_ts,
            'days'       => $days,
            'months'     => $months,
            'years'      => $years,
            'edays'      => $edays,
            'emonths'    => $emonths,
            'eyears'     => $eyears,
            'color'      => (string)($body['color'] ?? '#0d6efd'),
            'night'      => (string)($body['night'] ?? '0'),
            'category'   => (string)($body['category'] ?? '0'),
            'itemnumber' => (string)($body['itemnumber'] ?? ''),
            'admin_note' => (string)($body['admin_note'] ?? ''),
            'address'    => (string)($body['address'] ?? ''),
            'status'     => (string)($body['status'] ?? '1'),
            'accepted'   => (string)($body['accepted'] ?? '0'),
            // clock fields exist in many installs; include if present
            'clockin'    => (string)($body['clockin'] ?? '0'),
            'clockout'   => (string)($body['clockout'] ?? '0'),
            'clockout2'  => (string)($body['clockout2'] ?? '0'),
        ];

        // Keep only existing columns
        $keys = [];
        $vals = [];
        foreach ($payload as $k => $v) {
            if (!has_col($colsTpl, $k)) continue;
            $keys[] = "`$k`";
            if (is_int($v) || ctype_digit((string)$v)) {
                $vals[] = "'".safe_str($conn, $v)."'";
            } else {
                $vals[] = "'".safe_str($conn, $v)."'";
            }
        }

        if ($action === 'template_save') {
            $sql = "INSERT INTO shifting_allocation_table (".implode(',', $keys).") VALUES (".implode(',', $vals).")";
            if (!$conn->query($sql)) json_out(['error' => 'Insert failed', 'detail' => $conn->error], 500);
            json_out(['ok' => true, 'id' => (int)$conn->insert_id]);
        }

        // template_update
        if ($id <= 0) json_out(['error' => 'Missing id'], 400);
        $sets = [];
        foreach ($payload as $k => $v) {
            if (!has_col($colsTpl, $k)) continue;
            $sets[] = "`$k`='".safe_str($conn, $v)."'";
        }
        $sql = "UPDATE shifting_allocation_table SET ".implode(',', $sets)." WHERE id='$id' LIMIT 1";
        if (!$conn->query($sql)) json_out(['error' => 'Update failed', 'detail' => $conn->error], 500);
        json_out(['ok' => true, 'id' => $id]);
    }

    // Generate shifts from selected templates
    if ($method === 'POST' && $action === 'generate') {
        $body = get_json_body();
        $ids = $body['ids'] ?? [];
        if (is_string($ids)) $ids = array_filter(array_map('trim', explode(',', $ids)));
        if (!is_array($ids) || count($ids) === 0) json_out(['error' => 'No template ids selected'], 400);

        $from = trim((string)($body['from_date'] ?? ''));
        $to   = trim((string)($body['to_date'] ?? ''));

        $from_ts = strtotime($from);
        $to_ts   = strtotime($to);
        if ($from_ts) $from = date('Y-m-d', $from_ts);
        if ($to_ts)   $to   = date('Y-m-d', $to_ts);

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $from) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $to)) {
            json_out(['error' => 'Invalid from_date/to_date'], 400);
        }

        $fromDT = new DateTime($from.' 00:00:00');
        $toDT   = new DateTime($to.' 23:59:59');
        if ($toDT < $fromDT) json_out(['error' => 'to_date must be >= from_date'], 400);

        $colsShift = table_columns($conn, 'shifting_allocation');
        $inserted = 0;
        $skipped_once = 0;
        $skipped_dupe = 0;
        $skipped_unknown = 0;
        $errors = [];

        foreach ($ids as $tidRaw) {
            $tid = (int)$tidRaw;
            if ($tid <= 0) continue;

            $tq = $conn->query("SELECT * FROM shifting_allocation_table WHERE id='$tid' LIMIT 1");
            if (!$tq || !$tq->num_rows) { $errors[] = "Template $tid not found"; continue; }
            $tpl = $tq->fetch_assoc();

            $repRaw = trim((string)($tpl['repeating'] ?? ''));
            $repNorm = strtolower($repRaw);

            // Your requirement: do not generate if repeating = once
            if ($repNorm === '' || $repNorm === 'once' || $repNorm === 'one time' || $repNorm === 'single') {
                $skipped_once++;
                continue;
            }

            $interval = repeat_interval($repRaw);
            if (($interval['unit'] ?? 'once') === 'once' || (int)($interval['n'] ?? 0) <= 0) {
                $skipped_unknown++;
                continue;
            }

            // Parse template start/end for time-of-day and duration
            $tplStartTs = strtotime((string)($tpl['stime'] ?? ''));
            $tplEndTs   = strtotime((string)($tpl['etime'] ?? ''));
            if (!$tplStartTs || !$tplEndTs || $tplEndTs <= $tplStartTs) {
                $errors[] = "Template $tid has invalid stime/etime";
                continue;
            }

            $duration = $tplEndTs - $tplStartTs;
            $tplTime  = date('H:i:s', $tplStartTs);
            $tplWday  = (int)date('N', $tplStartTs); // 1..7
            $tplDom   = (int)date('d', $tplStartTs); // 1..31

            $occ = new DateTime($from.' '.$tplTime);

            // Align to weekday/day-of-month
            if ($interval['unit'] === 'week') {
                $curW = (int)$occ->format('N');
                $delta = ($tplWday - $curW + 7) % 7;
                if ($delta > 0) $occ->modify("+$delta day");
            } elseif ($interval['unit'] === 'month') {
                $y = (int)$occ->format('Y'); $m = (int)$occ->format('m');
                $tmp = new DateTime(sprintf('%04d-%02d-01 %s', $y, $m, $tplTime));
                $last = (int)$tmp->format('t');
                $day = min($tplDom, $last);
                $occ = new DateTime(sprintf('%04d-%02d-%02d %s', $y, $m, $day, $tplTime));
                while ($occ < $fromDT) {
                    $occ->modify('first day of next month');
                    $y = (int)$occ->format('Y'); $m = (int)$occ->format('m');
                    $tmp = new DateTime(sprintf('%04d-%02d-01 %s', $y, $m, $tplTime));
                    $last = (int)$tmp->format('t');
                    $day = min($tplDom, $last);
                    $occ = new DateTime(sprintf('%04d-%02d-%02d %s', $y, $m, $day, $tplTime));
                }
            }

            // Generate
            while ($occ <= $toDT) {
                $end = clone $occ;
                $end->modify("+$duration seconds");

                $stime = fmt_dt($occ);
                $etime = fmt_dt($end);

                $s_ts = strtotime($stime);
                $e_ts = strtotime($etime);

                $sdays   = date('d', $s_ts);
                $smonths = date('m', $s_ts);
                $syears  = date('Y', $s_ts);

                $edays   = date('d', $e_ts);
                $emonths = date('m', $e_ts);
                $eyears  = date('Y', $e_ts);

                $employeeid = (int)($tpl['employeeid'] ?? 0);
                $clientid   = (int)($tpl['clientid'] ?? 0);
                $projectid  = (int)($tpl['projectid'] ?? 0);

                // dupe check
                $stime_db = safe_str($conn, $stime);
                $etime_db = safe_str($conn, $etime);
                $dup = $conn->query("SELECT id FROM shifting_allocation
                                     WHERE employeeid='$employeeid'
                                       AND clientid='$clientid'
                                       AND projectid='$projectid'
                                       AND stime='$stime_db'
                                       AND etime='$etime_db'
                                     LIMIT 1");
                if ($dup && $dup->num_rows) {
                    $skipped_dupe++;
                } else {
                    // Build insert dynamically based on existing columns
                    $row = [
                        'employeeid' => $employeeid,
                        'clientid'   => $clientid,
                        'projectid'  => $projectid,
                        'stime'      => $stime,
                        'etime'      => $etime,
                        'sdate'      => $s_ts,
                        'edate'      => $e_ts,
                        'days'       => $sdays,
                        'months'     => $smonths,
                        'years'      => $syears,
                        'edays'      => $edays,
                        'emonths'    => $emonths,
                        'eyears'     => $eyears,
                        'accepted'   => 0,
                        'status'     => 1,
                        'color'      => (string)($tpl['color'] ?? '#0d6efd'),
                        'night'      => (string)($tpl['night'] ?? '0'),
                        'address'    => (string)($tpl['address'] ?? ''),
                        'admin_note' => (string)($tpl['admin_note'] ?? ''),
                        'category'   => (string)($tpl['category'] ?? '0'),
                        'itemnumber' => (string)($tpl['itemnumber'] ?? ''),
                        'repeating'  => (string)($tpl['repeating'] ?? ''),
                        // some installs have clock fields
                        'clockin'    => 0,
                        'clockout'   => 0,
                        'clockout2'  => 0,
                    ];

                    $keys = [];
                    $vals = [];
                    foreach ($row as $k => $v) {
                        if (!has_col($colsShift, $k)) continue;
                        $keys[] = "`$k`";
                        $vals[] = "'".safe_str($conn, $v)."'";
                    }

                    $sql = "INSERT INTO shifting_allocation (".implode(',', $keys).") VALUES (".implode(',', $vals).")";
                    if ($conn->query($sql)) {
                        $inserted++;
                    } else {
                        $errors[] = "Insert failed for template $tid: ".$conn->error;
                    }
                }

                // Advance
                if ($interval['unit'] === 'week') {
                    $occ->modify("+{$interval['n']} week");
                } elseif ($interval['unit'] === 'month') {
                    $occ->modify("first day of +{$interval['n']} month");
                    $y = (int)$occ->format('Y'); $m = (int)$occ->format('m');
                    $tmp = new DateTime(sprintf('%04d-%02d-01 %s', $y, $m, $tplTime));
                    $last = (int)$tmp->format('t');
                    $day = min($tplDom, $last);
                    $occ = new DateTime(sprintf('%04d-%02d-%02d %s', $y, $m, $day, $tplTime));
                } else {
                    break;
                }
            }
        }

        json_out([
            'ok' => true,
            'inserted' => $inserted,
            'skipped_once' => $skipped_once,
            'skipped_duplicate' => $skipped_dupe,
            'skipped_unknown' => $skipped_unknown,
            'errors' => $errors,
        ]);
    }

    json_out(['error' => 'Unsupported action'], 400);
}

// ------------------------------
// HTML Page (UI)
// ------------------------------
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Repeating Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#f6f7fb; }
    .card { border:0; box-shadow: 0 8px 24px rgba(16,24,40,.06); }
    .table thead th { white-space: nowrap; }
    .mono { font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace; }
  </style>
</head>
<body>
<div class="container py-4">

  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h3 class="mb-0">Repeating Manager</h3>
      <div class="text-muted small">Manage repeating templates and generate shifts into <span class="mono">shifting_allocation</span>.</div>
    </div>
    <button class="btn btn-outline-secondary" id="btnReload">Reload</button>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row g-2">
        <div class="col-md-3">
          <label class="form-label">Project</label>
          <select class="form-select" id="projectid">
            <option value="0">All</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Client</label>
          <select class="form-select" id="clientid">
            <option value="0">All</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Worker</label>
          <select class="form-select" id="employeeid">
            <option value="0">All</option>
          </select>
        </div>
        <div class="col-md-3">
          <label class="form-label">Search</label>
          <input class="form-control" id="q" placeholder="name / repeat / itemnumber">
        </div>
      </div>

      <hr class="my-3">

      <div class="row g-2 align-items-end">
        <div class="col-md-3">
          <label class="form-label">From date</label>
          <input type="date" class="form-control" id="from_date">
        </div>
        <div class="col-md-3">
          <label class="form-label">To date</label>
          <input type="date" class="form-control" id="to_date">
        </div>
        <div class="col-md-6 d-flex gap-2 justify-content-end">
          <button class="btn btn-success" id="btnGenerate">Generate Selected</button>
          <button class="btn btn-primary" id="btnNewTpl">New Template</button>
        </div>
      </div>

      <div class="mt-3 alert alert-warning mb-0">
        Templates with <b>repeating = Once</b> will be <b>skipped</b> during generation.
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm table-hover align-middle" id="tplTable">
          <thead>
            <tr>
              <th style="width:36px;"><input type="checkbox" id="chkAll"></th>
              <th>ID</th>
              <th>Client</th>
              <th>Worker</th>
              <th>Start</th>
              <th>End</th>
              <th>Repeating</th>
              <th>Item</th>
              <th>Night</th>
              <th>Color</th>
              <th style="width:160px;">Actions</th>
            </tr>
          </thead>
          <tbody id="tplBody"></tbody>
        </table>
      </div>
      <div class="text-muted small" id="tplCount"></div>
    </div>
  </div>

</div>

<!-- Template Modal -->
<div class="modal fade" id="tplModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tplModalTitle">Template</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="tpl_id" value="0">
        <div class="row g-2">
          <div class="col-md-4">
            <label class="form-label">Project ID</label>
            <input class="form-control" id="tpl_projectid" type="number" min="0">
          </div>
          <div class="col-md-4">
            <label class="form-label">Client ID</label>
            <input class="form-control" id="tpl_clientid" type="number" min="0">
          </div>
          <div class="col-md-4">
            <label class="form-label">Worker ID</label>
            <input class="form-control" id="tpl_employeeid" type="number" min="0">
          </div>

          <div class="col-md-6">
            <label class="form-label">Start (YYYY-MM-DD HH:MM:SS)</label>
            <input class="form-control" id="tpl_stime" placeholder="2025-01-01 09:00:00">
          </div>
          <div class="col-md-6">
            <label class="form-label">End (YYYY-MM-DD HH:MM:SS)</label>
            <input class="form-control" id="tpl_etime" placeholder="2025-01-01 17:00:00">
          </div>

          <div class="col-md-6">
            <label class="form-label">Repeating</label>
            <select class="form-select" id="tpl_repeating">
              <option>Once</option>
              <option>Week Repeat</option>
              <option>Fortnight Repeat</option>
              <option>3 Weeks Repeat</option>
              <option>4 Weeks Repeat</option>
              <option>Month Repeat</option>
              <option>3 Months Repeat</option>
              <option>6 Months Repeat</option>
              <option>12 Months Repeat</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Item Number</label>
            <input class="form-control" id="tpl_itemnumber">
          </div>

          <div class="col-md-4">
            <label class="form-label">Night</label>
            <select class="form-select" id="tpl_night">
              <option value="0">0</option>
              <option value="1">1</option>
            </select>
          </div>

          <div class="col-md-4">
            <label class="form-label">Category</label>
            <input class="form-control" id="tpl_category" placeholder="0">
          </div>

          <div class="col-md-4">
            <label class="form-label">Color</label>
            <input class="form-control" id="tpl_color" placeholder="#0d6efd">
          </div>

          <div class="col-md-12">
            <label class="form-label">Address</label>
            <input class="form-control" id="tpl_address">
          </div>

          <div class="col-md-12">
            <label class="form-label">Admin Note</label>
            <textarea class="form-control" id="tpl_admin_note" rows="3"></textarea>
          </div>
        </div>

        <div class="alert alert-info mt-3 mb-0">
          This modal writes to <span class="mono">shifting_allocation_table</span>. Generation writes to <span class="mono">shifting_allocation</span>.
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-danger me-auto" id="btnDeleteTpl" style="display:none;">Delete</button>
        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" id="btnSaveTpl">Save</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const API = 'repeating_manager.php?api=1';

let templates = [];
const tplBody = document.getElementById('tplBody');
const tplCount = document.getElementById('tplCount');

function qs(id){ return document.getElementById(id); }
function esc(s){ return String(s ?? '').replaceAll('&','&amp;').replaceAll('<','&lt;').replaceAll('>','&gt;'); }

async function apiGet(action, params = {}) {
  const url = new URL(API, window.location.origin);
  url.searchParams.set('action', action);
  Object.entries(params).forEach(([k,v]) => url.searchParams.set(k, v));
  const res = await fetch(url.toString(), { credentials:'same-origin' });
  if (!res.ok) throw new Error('HTTP '+res.status);
  return await res.json();
}

async function apiPost(action, data = {}) {
  const res = await fetch(API, {
    method: 'POST',
    headers: {'Content-Type':'application/json'},
    credentials:'same-origin',
    body: JSON.stringify({ action, ...data })
  });
  const out = await res.json().catch(() => ({}));
  if (!res.ok) {
    const msg = out.error || out.message || ('HTTP '+res.status);
    throw new Error(msg);
  }
  return out;
}

function renderTemplates() {
  const q = qs('q').value.trim().toLowerCase();
  const projectid = parseInt(qs('projectid').value || '0', 10);
  const clientid  = parseInt(qs('clientid').value || '0', 10);
  const employeeid= parseInt(qs('employeeid').value || '0', 10);

  const rows = templates.filter(t => {
    if (projectid > 0 && parseInt(t.projectid,10) !== projectid) return false;
    if (clientid > 0 && parseInt(t.clientid,10) !== clientid) return false;
    if (employeeid > 0 && parseInt(t.employeeid,10) !== employeeid) return false;
    if (!q) return true;
    const blob = [
      t.id, t.client, t.employee, t.repeating, t.itemnumber, t.stime, t.etime
    ].join(' ').toLowerCase();
    return blob.includes(q);
  });

  tplBody.innerHTML = rows.map(t => `
    <tr>
      <td><input type="checkbox" class="rowchk" value="${esc(t.id)}"></td>
      <td class="mono">${esc(t.id)}</td>
      <td>${esc(t.client)}</td>
      <td>${esc(t.employee)}</td>
      <td class="mono">${esc(t.stime)}</td>
      <td class="mono">${esc(t.etime)}</td>
      <td>${esc(t.repeating)}</td>
      <td>${esc(t.itemnumber)}</td>
      <td>${esc(t.night)}</td>
      <td><span class="badge" style="background:${esc(t.color||'#999')}">${esc(t.color||'')}</span></td>
      <td class="d-flex gap-2">
        <button class="btn btn-sm btn-outline-primary" onclick="openEdit(${esc(t.id)})">Edit</button>
      </td>
    </tr>
  `).join('');

  tplCount.textContent = `Showing ${rows.length} template(s).`;
}

async function loadSelectors() {
  try {
    const [clients, employees, projects] = await Promise.all([
      apiGet('clients_list'),
      apiGet('employees_list'),
      apiGet('projects_list').catch(() => [])
    ]);

    const cSel = qs('clientid');
    const eSel = qs('employeeid');
    const pSel = qs('projectid');

    clients.forEach(c => {
      const o = document.createElement('option');
      o.value = c.id; o.textContent = c.name;
      cSel.appendChild(o);
    });
    employees.forEach(e => {
      const o = document.createElement('option');
      o.value = e.id; o.textContent = e.name;
      eSel.appendChild(o);
    });
    projects.forEach(p => {
      const o = document.createElement('option');
      o.value = p.id; o.textContent = `${p.title} (ID ${p.id})`;
      pSel.appendChild(o);
    });

  } catch (e) {
    console.error(e);
  }
}

async function loadTemplates() {
  templates = await apiGet('templates_list', {});
  renderTemplates();
}

async function reloadAll() {
  await loadTemplates();
}

document.getElementById('btnReload').addEventListener('click', reloadAll);
['projectid','clientid','employeeid','q'].forEach(id => qs(id).addEventListener('input', renderTemplates));

document.getElementById('chkAll').addEventListener('change', (e) => {
  document.querySelectorAll('.rowchk').forEach(chk => chk.checked = e.target.checked);
});

document.getElementById('btnGenerate').addEventListener('click', async () => {
  const from = qs('from_date').value;
  const to = qs('to_date').value;
  if (!from || !to) return alert('Please select from_date and to_date.');

  const ids = Array.from(document.querySelectorAll('.rowchk'))
    .filter(x => x.checked)
    .map(x => parseInt(x.value, 10));

  if (!ids.length) return alert('Please select at least one template.');

  try {
    const out = await apiPost('generate', { ids, from_date: from, to_date: to });
    const msg = [
      `Inserted: ${out.inserted}`,
      `Skipped (once): ${out.skipped_once}`,
      `Skipped (duplicate): ${out.skipped_duplicate}`,
      `Skipped (unknown repeat): ${out.skipped_unknown}`,
      out.errors && out.errors.length ? ('Errors:\n- ' + out.errors.join('\n- ')) : ''
    ].filter(Boolean).join('\n');
    alert(msg);
  } catch (e) {
    alert('Generate failed: ' + e.message);
  }
});

const tplModal = new bootstrap.Modal(document.getElementById('tplModal'));

function modalSet(title, showDelete) {
  qs('tplModalTitle').textContent = title;
  qs('btnDeleteTpl').style.display = showDelete ? '' : 'none';
}

function fillModal(t) {
  qs('tpl_id').value = t?.id || 0;
  qs('tpl_projectid').value = t?.projectid || 0;
  qs('tpl_clientid').value = t?.clientid || 0;
  qs('tpl_employeeid').value = t?.employeeid || 0;
  qs('tpl_stime').value = t?.stime || '';
  qs('tpl_etime').value = t?.etime || '';
  qs('tpl_repeating').value = t?.repeating || 'Once';
  qs('tpl_itemnumber').value = t?.itemnumber || '';
  qs('tpl_night').value = t?.night || '0';
  qs('tpl_category').value = t?.category || '0';
  qs('tpl_color').value = t?.color || '#0d6efd';
  qs('tpl_address').value = t?.address || '';
  qs('tpl_admin_note').value = t?.admin_note || '';
}

window.openEdit = async (id) => {
  try {
    const t = await apiGet('template_get', { id });
    modalSet('Edit Template #'+id, true);
    fillModal(t);
    tplModal.show();
  } catch (e) {
    alert('Load failed: ' + e.message);
  }
};

document.getElementById('btnNewTpl').addEventListener('click', () => {
  modalSet('New Template', false);
  fillModal(null);
  tplModal.show();
});

document.getElementById('btnSaveTpl').addEventListener('click', async () => {
  const id = parseInt(qs('tpl_id').value || '0', 10);
  const payload = {
    id,
    projectid: parseInt(qs('tpl_projectid').value || '0', 10),
    clientid: parseInt(qs('tpl_clientid').value || '0', 10),
    employeeid: parseInt(qs('tpl_employeeid').value || '0', 10),
    stime: qs('tpl_stime').value.trim(),
    etime: qs('tpl_etime').value.trim(),
    repeating: qs('tpl_repeating').value,
    itemnumber: qs('tpl_itemnumber').value,
    night: qs('tpl_night').value,
    category: qs('tpl_category').value,
    color: qs('tpl_color').value,
    address: qs('tpl_address').value,
    admin_note: qs('tpl_admin_note').value
  };

  try {
    if (!payload.projectid || !payload.clientid || !payload.employeeid) {
      return alert('Project ID, Client ID, Worker ID are required.');
    }
    if (!payload.stime || !payload.etime) return alert('Start/End are required.');
    const action = id > 0 ? 'template_update' : 'template_save';
    await apiPost(action, payload);
    tplModal.hide();
    await loadTemplates();
  } catch (e) {
    alert('Save failed: ' + e.message);
  }
});

document.getElementById('btnDeleteTpl').addEventListener('click', async () => {
  const id = parseInt(qs('tpl_id').value || '0', 10);
  if (!id) return;
  if (!confirm('Delete this template?')) return;
  try {
    await apiPost('template_delete', { id });
    tplModal.hide();
    await loadTemplates();
  } catch (e) {
    alert('Delete failed: ' + e.message);
  }
});

// defaults
(function initDates(){
  const today = new Date();
  const y = today.getFullYear();
  const m = String(today.getMonth()+1).padStart(2,'0');
  const d = String(today.getDate()).padStart(2,'0');
  qs('from_date').value = `${y}-${m}-${d}`;
  const to = new Date(today.getTime() + 14*24*3600*1000);
  const y2 = to.getFullYear();
  const m2 = String(to.getMonth()+1).padStart(2,'0');
  const d2 = String(to.getDate()).padStart(2,'0');
  qs('to_date').value = `${y2}-${m2}-${d2}`;
})();

(async function boot(){
  await loadSelectors();
  await loadTemplates();
})();
</script>
</body>
</html>
