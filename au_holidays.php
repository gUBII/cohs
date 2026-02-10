<?php
// au_holidays.php
// Raw PHP + MySQL + Bootstrap 5 + jQuery + Ajax
// API:
//   /au_holidays.php?api=1&year=2025&state=ALL
//   /au_holidays.php?api=1&year=2025&state=NSW
//   /au_holidays.php?api=1&year=2025,2026&state=WA   (multi-year)
// CSV:
//   /au_holidays.php?csv=1&year=2025&state=ALL

$DB = ['host'=>'127.0.0.1','db'=>'au_calendar','user'=>'root','pass'=>'','charset'=>'utf8mb4'];
function pdo() {
    global $DB; static $pdo;
    if (!$pdo) {
        $dsn="mysql:host={$DB['host']};dbname={$DB['db']};charset={$DB['charset']}";
        $pdo=new PDO($dsn, $DB['user'], $DB['pass'], [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
        ]);
    }
    return $pdo;
}
function fetchHolidays($years, $state) {
    $pdo = pdo();
    $params=[]; $where=[];
    if ($years) {
        $in = implode(',', array_fill(0, count($years), '?'));
        $where[] = "year IN ($in)";
        $params = array_merge($params, $years);
    }
    if ($state && $state!=='ALL') { $where[] = "state=?"; $params[] = $state; }
    $sql = "SELECT year,state,name,date,observed_date,all_day,part_day_from,part_day_to,region
            FROM au_holidays ".( $where?('WHERE '.implode(' AND ',$where)):'')." ORDER BY state, date, name";
    $stmt = $pdo->prepare($sql); $stmt->execute($params);
    return $stmt->fetchAll();
}

function toCSV($rows) {
    $f=fopen('php://temp','r+');
    fputcsv($f, ['year','state','name','date','observed_date','all_day','part_day_from','part_day_to','region']);
    foreach ($rows as $r) {
        fputcsv($f, [$r['year'],$r['state'],$r['name'],$r['date'],$r['observed_date'],$r['all_day'],$r['part_day_from'],$r['part_day_to'],$r['region']]);
    }
    rewind($f); $csv=stream_get_contents($f); fclose($f); return $csv;
}

$statesList = ['ACT','NSW','NT','QLD','SA','TAS','VIC','WA'];

/* API / CSV */
if (isset($_GET['api']) && $_GET['api']=='1') {
    $years = [];
    if (isset($_GET['year'])) foreach (explode(',', $_GET['year']) as $y) if (preg_match('/^\d{4}$/',$y)) $years[]=(int)$y;
    if (!$years) $years = [ (int)date('Y') ];
    $state = isset($_GET['state']) ? strtoupper($_GET['state']) : 'ALL';
    if ($state!=='ALL' && !in_array($state,$statesList,true)) {
        http_response_code(400); header('Content-Type: application/json');
        echo json_encode(['error'=>'Invalid state']); exit;
    }
    $rows = fetchHolidays($years, $state==='ALL'?null:$state);
    if ($state==='ALL') {
        $grouped = [];
        foreach ($rows as $r) $grouped[$r['state']][] = $r;
        ksort($grouped);
        header('Content-Type: application/json');
        echo json_encode(['years'=>$years,'state'=>'ALL','count'=>count($rows),'items'=>$grouped]); exit;
    } else {
        header('Content-Type: application/json');
        echo json_encode(['years'=>$years,'state'=>$state,'count'=>count($rows),'items'=>$rows]); exit;
    }
}
if (isset($_GET['csv']) && $_GET['csv']=='1') {
    $years = [];
    if (isset($_GET['year'])) foreach (explode(',', $_GET['year']) as $y) if (preg_match('/^\d{4}$/',$y)) $years[]=(int)$y;
    if (!$years) $years = [ (int)date('Y') ];
    $state = isset($_GET['state']) ? strtoupper($_GET['state']) : 'ALL';
    $rows = fetchHolidays($years, $state==='ALL'?null:$state);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="au_holidays_'.$state.'_'.implode('-',$years).'.csv"');
    echo toCSV($rows); exit;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Australian Public Holidays — Official (DB-backed)</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.badge-state{font-size:.85rem}.small-note{font-size:.9rem;color:#6c757d}
</style>
</head>
<body class="bg-light">
<div class="container py-4">
  <h1 class="mb-2">Australian Public Holidays — Official Sources</h1>
  <p class="small-note">
    Data is synced from official government pages/ICS into MySQL. Use the controls to filter and export.
  </p>

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <form id="q" class="row g-3 align-items-end">
        <div class="col-md-4">
          <label class="form-label">State/Territory</label>
          <select id="state" class="form-select">
            <option value="ALL" selected>All States & Territories</option>
            <?php foreach ($statesList as $s) echo "<option value=\"$s\">$s</option>"; ?>
          </select>
        </div>
        <div class="col-md-4">
          <label class="form-label">Years (comma-separated)</label>
          <input type="text" id="years" class="form-control" value="<?php echo date('Y'); ?>">
        </div>
        <div class="col-md-4 d-grid gap-2">
          <button class="btn btn-primary" type="submit">Load</button>
          <a id="csvBtn" href="#" class="btn btn-outline-secondary">Download CSV</a>
        </div>
      </form>
    </div>
  </div>

  <div id="out" class="card shadow-sm d-none">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0"><span id="titleState"></span> — <span id="titleYears"></span></h5>
        <a id="jsonBtn" href="#" class="btn btn-outline-secondary btn-sm">Download JSON</a>
      </div>
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead>
            <tr><th>#</th><th>Holiday</th><th>Date</th><th>Observed</th><th>All-day</th><th>Part-day</th><th>State</th><th>Region</th></tr>
          </thead>
          <tbody id="tbody"></tbody>
        </table>
      </div>
    </div>
  </div>

  <div id="empty" class="alert alert-info d-none">No data. Run <code>sync_holidays.php</code> first.</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
function load(){
  const state = $('#state').val();
  const years = $('#years').val().replace(/\s+/g,'');
  $.getJSON('au_holidays.php', {api:1, state, year: years}, function(res){
    $('#titleState').text(res.state);
    $('#titleYears').text((res.years||[]).join(', '));
    const $tb = $('#tbody').empty();
    let items = [];
    if (res.state === 'ALL') {
      for (const st of ['ACT','NSW','NT','QLD','SA','TAS','VIC','WA']) {
        (res.items[st]||[]).forEach(x=>items.push(x));
      }
    } else {
      items = res.items || [];
    }
    if (!items.length) { $('#out').addClass('d-none'); $('#empty').removeClass('d-none'); return; }
    $('#empty').addClass('d-none'); $('#out').removeClass('d-none');
    items.forEach((h,i)=>{
      const pd = (h.part_day_from && h.part_day_to) ? (h.part_day_from+'–'+h.part_day_to) : '';
      $tb.append(`<tr>
        <td>${i+1}</td>
        <td>${h.name}</td>
        <td><span class="badge bg-primary-subtle text-primary-emphasis">${h.date}</span></td>
        <td>${h.observed_date ? '<span class="badge bg-warning-subtle text-warning-emphasis">'+h.observed_date+'</span>' : '—'}</td>
        <td>${h.all_day ? 'Yes' : 'No'}</td>
        <td>${pd || '—'}</td>
        <td><span class="badge bg-secondary-subtle text-secondary-emphasis">${h.state}</span></td>
        <td>${h.region || ''}</td>
      </tr>`);
    });

    // JSON/CSV download links
    $('#jsonBtn').off('click').on('click', function(e){
      e.preventDefault();
      const blob = new Blob([JSON.stringify(res,null,2)], {type:'application/json'});
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a'); a.href=url; a.download=`au_holidays_${res.state}_${(res.years||[]).join('-')}.json`;
      document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
    });
    $('#csvBtn').attr('href', `au_holidays.php?csv=1&state=${encodeURIComponent(state)}&year=${encodeURIComponent(years)}`);
  }).fail(()=>{ alert('API failed. Did you run sync?'); });
}
$('#q').on('submit', function(e){ e.preventDefault(); load(); });
$(load);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
