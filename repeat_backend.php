<?php
/**
 * repeat_backend.php
 *
 * GET  ?action=list&repeating=Week%20Repeat
 * POST JSON { action:"copy", ids:["123","124"], weekfrom:"2025-W03", repeating:"Week Repeat" }
 */

header('Content-Type: application/json');

// ---------------------- DB CONFIG ----------------------
include 'include.php';


// ---------------------- HELPERS ----------------------
function jsonOut(array $arr): void {
  echo json_encode($arr);
  exit;
}

function getJsonBody(): array {
  $raw = file_get_contents("php://input");
  if (!$raw) return [];
  $j = json_decode($raw, true);
  return is_array($j) ? $j : [];
}

function intervalFromRepeating(string $rep): array {
  $mapWeeks = [
    "Week Repeat" => 1,
    "Fortnight Repeat" => 2,
    "3 Weeks Repeat" => 3,
    "4 Weeks Repeat" => 4,
    "6 Weeks Repeat" => 6,
    "8 Weeks Repeat" => 8,
    "12 Weeks Repeat" => 12,
  ];
  $mapMonths = [
    "Month Repeat" => 1,
    "3 Months Repeat" => 3,
    "6 Months Repeat" => 6,
    "12 Months Repeat" => 12,
  ];

  if (isset($mapWeeks[$rep]))  return ["type" => "weeks",  "n" => $mapWeeks[$rep]];
  if (isset($mapMonths[$rep])) return ["type" => "months", "n" => $mapMonths[$rep]];
  return ["type" => "once", "n" => 0];
}

function dtToSql(DateTime $dt): string { return $dt->format('Y-m-d H:i:s'); }

function setIsoWeekKeepingTime(DateTime $src, int $isoYear, int $isoWeek): DateTime {
  $srcWeekday = (int)$src->format('N');
  $h = (int)$src->format('H');
  $m = (int)$src->format('i');
  $s = (int)$src->format('s');

  $dt = new DateTime();
  $dt->setISODate($isoYear, $isoWeek, 1);
  $dt->setTime($h, $m, $s);

  if ($srcWeekday > 1) $dt->modify('+' . ($srcWeekday - 1) . ' days');
  return $dt;
}

function bindAllStrings(mysqli_stmt $stmt, array $values): void {
  $types = str_repeat("s", count($values));
  $refs = [];
  $refs[] = $types;
  foreach ($values as $k => $v) {
    $refs[] = $values[$k];
  }
  $tmp = [];
  foreach ($refs as $i => $val) $tmp[$i] = &$refs[$i];
  call_user_func_array([$stmt, 'bind_param'], $tmp);
}

// ---------------------- ROUTER ----------------------
$action = $_GET['action'] ?? '';
if ($action === '') {
  $body = getJsonBody();
  $action = $body['action'] ?? '';
}

// ---------------------- ACTION: LIST ----------------------
if ($action === 'list') {
  $repeating = $_GET['repeating'] ?? 'Once';

  $sql = "
    SELECT
      s.id,
      s.stime,
      s.etime,
      s.repeating,
      s.status,
      COALESCE(c.username2, c.username, '') AS client,
      COALESCE(e.username2, e.username, '') AS employee
    FROM shifting_allocation s
    LEFT JOIN uerp_user c ON c.id = s.clientid
    LEFT JOIN uerp_user e ON e.id = s.employeeid
    WHERE
      s.repeating = ?
      AND s.status = 1
      AND s.cancelled = 0
      AND s.accepted = 1
      AND s.employeeid != 0
      AND s.projectid != 0
      AND s.clientid != 0
    ORDER BY s.id DESC
    LIMIT 5000
  ";

  $stmt = $conn->prepare($sql);
  if (!$stmt) jsonOut(["status"=>"error","message"=>"Prepare failed (list)"]);

  $stmt->bind_param("s", $repeating);
  $stmt->execute();
  $res = $stmt->get_result();

  $rows = [];
  while ($r = $res->fetch_assoc()) $rows[] = $r;

  jsonOut(["data" => $rows]);
}

// ---------------------- ACTION: COPY ----------------------
if ($action === 'copy') {
  $body = getJsonBody();

  $ids = $body['ids'] ?? [];
  $weekfrom = trim($body['weekfrom'] ?? '');
  $repeating = (string)($body['repeating'] ?? 'Once');

  if (!is_array($ids) || count($ids) === 0) jsonOut(["status"=>"error","message"=>"No ids selected"]);
  if (!preg_match('/^\d{4}-W\d{2}$/', $weekfrom)) jsonOut(["status"=>"error","message"=>"Invalid week format"]);

  [$isoYear, $isoWeek] = explode('-W', $weekfrom);
  $isoYear = (int)$isoYear;
  $isoWeek = (int)$isoWeek;

  if ($isoWeek < 1 || $isoWeek > 53) jsonOut(["status"=>"error","message"=>"Invalid ISO week (01..53)"]);
  if ($isoYear < 2000 || $isoYear > 2100) jsonOut(["status"=>"error","message"=>"Invalid ISO year"]);

  $ids = array_values(array_filter($ids, fn($x) => ctype_digit((string)$x)));
  if (!count($ids)) jsonOut(["status"=>"error","message"=>"Invalid ids"]);

  $interval = intervalFromRepeating($repeating);

  $in = implode(',', array_fill(0, count($ids), '?'));
  $types = str_repeat('i', count($ids));
  $sqlSel = "SELECT * FROM shifting_allocation WHERE id IN ($in)";
  $stmtSel = $conn->prepare($sqlSel);
  if (!$stmtSel) jsonOut(["status"=>"error","message"=>"Prepare failed (select copy)"]);

  $bindVals = array_map('intval', $ids);
  $refs = [];
  $refs[] = $types;
  foreach ($bindVals as $k => $v) $refs[] = &$bindVals[$k];
  call_user_func_array([$stmtSel, 'bind_param'], $refs);

  $stmtSel->execute();
  $res = $stmtSel->get_result();

  $cols = [
    "employeeid","projectid","clientid",
    "days","months","years",
    "stime","sdate","edate","edays","emonths","eyears","etime",
    "accepted","status","color","clockin","clockout","clockout2",
    "clockin_request","clockout_request",
    "total_hour","total_hour2","total_overtime",
    "milage","latitude_in","longitude_in","latitude_out","longitude_out",
    "activity_log",
    "stime2","etime2","request2",
    "wage_amt","overtime_amt","night","address","admin_note","payroll",
    "invoice_id","invoice_date","next_date","real_clockin",
    "image_in","image_out",
    "category","itemnumber","repeating",
    "shifting_allocation","vehicle_option","cancelled","ignored","cancel_reason"
  ];

  $placeholders = implode(',', array_fill(0, count($cols), '?'));
  $colList = implode(',', $cols);
  $sqlIns = "INSERT INTO shifting_allocation ($colList) VALUES ($placeholders)";
  $stmtIns = $conn->prepare($sqlIns);
  if (!$stmtIns) jsonOut(["status"=>"error","message"=>"Prepare failed (insert copy)"]);

  $inserted = 0;

  while ($row = $res->fetch_assoc()) {
    if (empty($row['stime']) || empty($row['etime'])) continue;

    $srcStart = new DateTime($row['stime']);
    $srcEnd   = new DateTime($row['etime']);

    $durSeconds = $srcEnd->getTimestamp() - $srcStart->getTimestamp();
    if ($durSeconds <= 0) $durSeconds = 3600;

    $newStart = setIsoWeekKeepingTime($srcStart, $isoYear, $isoWeek);

    $newEnd = new DateTime('@' . ($newStart->getTimestamp() + $durSeconds));
    $newEnd->setTimezone($newStart->getTimezone());

    if ($interval['type'] === 'weeks' && $interval['n'] > 0) {
      $daysAdd = 7 * $interval['n'];
      $newStart->modify("+{$daysAdd} days");
      $newEnd->modify("+{$daysAdd} days");
    } elseif ($interval['type'] === 'months' && $interval['n'] > 0) {
      $newStart->modify("+" . $interval['n'] . " months");
      $newEnd->modify("+" . $interval['n'] . " months");
    }

    // DATETIME strings
    $stime = dtToSql($newStart);
    $etime = dtToSql($newEnd);

    // UNIX timestamps for sdate/edate
    $sdate_ts = $newStart->getTimestamp();
    $edate_ts = $newEnd->getTimestamp();

    // Slice stime into day/month/year
    $days   = (int)$newStart->format('d');
    $months = (int)$newStart->format('m');
    $years  = (int)$newStart->format('Y');

    // Slice etime into eday/emonth/eyear
    $edays   = (int)$newEnd->format('d');
    $emonths = (int)$newEnd->format('m');
    $eyears  = (int)$newEnd->format('Y');

    $vals = [];
    foreach ($cols as $c) $vals[$c] = isset($row[$c]) ? $row[$c] : "";

    // override date/time fields
    $vals['stime'] = $stime;
    $vals['etime'] = $etime;

    // timestamps
    $vals['sdate'] = $sdate_ts;
    $vals['edate'] = $edate_ts;

    // sliced parts
    $vals['days']   = $days;
    $vals['months'] = $months;
    $vals['years']  = $years;

    $vals['edays']   = $edays;
    $vals['emonths'] = $emonths;
    $vals['eyears']  = $eyears;

    $vals['repeating'] = $repeating;

    $vals['accepted'] = 0;
    $vals['status']   = 1;
    $vals['cancelled'] = 0;
    $vals['ignored']   = 0;
    $vals['cancel_reason'] = "";

    $vals['clockin'] = 0;
    $vals['clockout'] = 0;
    $vals['clockout2'] = 0;
    $vals['real_clockin'] = 0;

    $vals['total_hour'] = 0;
    $vals['total_hour2'] = 0;
    $vals['total_overtime'] = 0;

    $vals['milage'] = 0;
    $vals['latitude_in'] = "";
    $vals['longitude_in'] = "";
    $vals['latitude_out'] = "";
    $vals['longitude_out'] = "";

    $vals['image_in'] = "";
    $vals['image_out'] = "";

    $vals['invoice_id'] = 0;
    $vals['invoice_date'] = "";
    $vals['next_date'] = $vals['sdate']; // if next_date is timestamp; otherwise change as needed

    $vals['clockin_request'] = "";
    $vals['clockout_request'] = "";
    $vals['request2'] = 0;

    $vals['activity_log'] = "Repeat copy from ID {$row['id']} at " . date('Y-m-d H:i:s');

    $ordered = [];
    foreach ($cols as $c) $ordered[] = (string)$vals[$c];

    bindAllStrings($stmtIns, $ordered);

    if ($stmtIns->execute()) $inserted++;
  }

  jsonOut(["status" => "ok", "inserted" => $inserted]);
}

jsonOut(["status" => "error", "message" => "Unknown action"]);
