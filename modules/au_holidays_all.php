<?php
// au_holidays_all.php
// Raw PHP + Bootstrap 5 + jQuery + Ajax
// Supports JSON API and a full UI. Handles ALL states/territories in one shot.

// ---------------------- Core Date Helpers ----------------------
function dt($y, $m, $d) { return (new DateTime("$y-$m-$d")); }
function fmt(DateTime $d) { return $d->format('Y-m-d'); }

function isWeekend(DateTime $d) {
    $w = (int)$d->format('w'); // 0=Sun,6=Sat
    return $w === 0 || $w === 6;
}
function nextMonday(DateTime $d) {
    $clone = clone $d;
    $w = (int)$clone->format('w');
    if ($w === 6) { $clone->modify('+2 days'); }
    elseif ($w === 0) { $clone->modify('+1 day'); }
    return $clone;
}
// nth weekday of month: $weekday 1=Mon..7=Sun, $n>=1
function nthWeekdayOfMonth($year, $month, $weekday, $n) {
    $d = new DateTime("$year-$month-01");
    $targetDow = ($weekday % 7); // DateTime('N'): 1..7
    $firstDow = (int)$d->format('N');
    $delta = ($targetDow - $firstDow);
    if ($delta < 0) $delta += 7;
    $d->modify("+$delta days");
    $d->modify('+' . ($n-1) . ' weeks');
    return $d;
}
// last weekday of month: $weekday 1=Mon..7=Sun
function lastWeekdayOfMonth($year, $month, $weekday) {
    $d = new DateTime('last day of ' . "$year-$month-01");
    $targetDow = ($weekday % 7);
    $dow = (int)$d->format('N');
    $delta = $dow - $targetDow;
    if ($delta < 0) $delta += 7;
    if ($delta > 0) $d->modify("-$delta days");
    return $d;
}
// Easter (Anonymous Gregorian algorithm)
function easterDate($year) {
    $a = $year % 19;
    $b = intdiv($year, 100);
    $c = $year % 100;
    $d = intdiv($b, 4);
    $e = $b % 4;
    $f = intdiv($b + 8, 25);
    $g = intdiv($b - $f + 1, 3);
    $h = (19*$a + $b - $d - $g + 15) % 30;
    $i = intdiv($c, 4);
    $k = $c % 4;
    $l = (32 + 2*$e + 2*$i - $h - $k) % 7;
    $m = intdiv($a + 11*$h + 22*$l, 451);
    $month = intdiv($h + $l - 7*$m + 114, 31);
    $day = (($h + $l - 7*$m + 114) % 31) + 1;
    return dt($year, $month, $day);
}
// Simple observed rules: weekend -> following Monday.
// Christmas/Boxing special case
function addHoliday(&$list, $name, DateTime $date, $state, $notes = '') {
    $observed = null;
    $y = (int)$date->format('Y');

    if ($name === 'Christmas Day') {
        $observed = isWeekend($date) ? nextMonday($date) : null;
    } elseif ($name === 'Boxing Day') {
        $observed = isWeekend($date) ? nextMonday($date) : null;
        $xmas = dt($y, 12, 25);
        $xObs = isWeekend($xmas) ? nextMonday($xmas) : null;
        if ($observed && $xObs && fmt($observed) === fmt($xObs)) {
            $observed->modify('+1 day'); // Tuesday
        }
    } else {
        if (isWeekend($date)) $observed = nextMonday($date);
    }

    $list[] = [
        'name'     => $name,
        'date'     => fmt($date),
        'observed' => $observed ? fmt($observed) : null,
        'state'    => $state,
        'notes'    => $notes,
    ];
}

// ---------------------- State Sets ----------------------
function nationalHolidays($year, $stateCode) {
    $h = [];
    addHoliday($h, "New Year's Day", dt($year, 1, 1), $stateCode);
    addHoliday($h, "Australia Day", dt($year, 1, 26), $stateCode);
    $easter = easterDate($year);
    addHoliday($h, "Good Friday", (clone $easter)->modify('-2 days'), $stateCode);
    addHoliday($h, "Easter Monday", (clone $easter)->modify('+1 day'), $stateCode);
    addHoliday($h, "ANZAC Day", dt($year, 4, 25), $stateCode);
    addHoliday($h, "Christmas Day", dt($year, 12, 25), $stateCode);
    addHoliday($h, "Boxing Day", dt($year, 12, 26), $stateCode);
    return $h;
}
function stateHolidays($year, $state) {
    $s = strtoupper($state);
    $h = [];
    switch ($s) {
        case 'ACT':
            addHoliday($h, 'Canberra Day', nthWeekdayOfMonth($year, 3, 1, 2), 'ACT');
            $recBase = dt($year, 5, 27); $recMon = clone $recBase; while ((int)$recMon->format('N') !== 1) { $recMon->modify('+1 day'); }
            addHoliday($h, 'Reconciliation Day', $recMon, 'ACT');
            addHoliday($h, "King's Birthday", nthWeekdayOfMonth($year, 6, 1, 2), 'ACT');
            addHoliday($h, 'Labour Day', nthWeekdayOfMonth($year, 10, 1, 1), 'ACT');
            break;
        case 'NSW':
            addHoliday($h, "King's Birthday", nthWeekdayOfMonth($year, 6, 1, 2), 'NSW');
            addHoliday($h, 'Labour Day', nthWeekdayOfMonth($year, 10, 1, 1), 'NSW');
            break;
        case 'VIC':
            addHoliday($h, 'Labour Day', nthWeekdayOfMonth($year, 3, 1, 2), 'VIC');
            addHoliday($h, "King's Birthday", nthWeekdayOfMonth($year, 6, 1, 2), 'VIC');
            addHoliday($h, 'Melbourne Cup Day', nthWeekdayOfMonth($year, 11, 2, 1), 'VIC', 'Some regions observe alternatives');
            break;
        case 'QLD':
            addHoliday($h, 'Labour Day', nthWeekdayOfMonth($year, 5, 1, 1), 'QLD');
            addHoliday($h, "King's Birthday", nthWeekdayOfMonth($year, 10, 1, 1), 'QLD');
            break;
        case 'WA':
            addHoliday($h, 'Labour Day', nthWeekdayOfMonth($year, 3, 1, 1), 'WA');
            addHoliday($h, 'Western Australia Day', nthWeekdayOfMonth($year, 6, 1, 1), 'WA');
            addHoliday($h, "King's Birthday", lastWeekdayOfMonth($year, 9, 1), 'WA', 'Regional variations may apply');
            break;
        case 'SA':
            addHoliday($h, 'Adelaide Cup Day', nthWeekdayOfMonth($year, 3, 1, 2), 'SA');
            addHoliday($h, "King's Birthday", nthWeekdayOfMonth($year, 6, 1, 2), 'SA');
            addHoliday($h, 'Labour Day', nthWeekdayOfMonth($year, 10, 1, 1), 'SA');
            break;
        case 'TAS':
            addHoliday($h, 'Eight Hours Day', nthWeekdayOfMonth($year, 3, 1, 2), 'TAS');
            addHoliday($h, "King's Birthday", nthWeekdayOfMonth($year, 6, 1, 2), 'TAS');
            addHoliday($h, 'Recreation Day', nthWeekdayOfMonth($year, 11, 1, 1), 'TAS', 'Northern Tasmania');
            break;
        case 'NT':
            addHoliday($h, 'May Day', nthWeekdayOfMonth($year, 5, 1, 1), 'NT');
            addHoliday($h, 'Picnic Day', nthWeekdayOfMonth($year, 8, 1, 1), 'NT');
            addHoliday($h, "King's Birthday", nthWeekdayOfMonth($year, 6, 1, 2), 'NT');
            break;
    }
    return $h;
}

// ---------------------- Builders ----------------------
function getHolidaysForStateYear($year, $state) {
    $state = strtoupper($state);
    $all = array_merge(nationalHolidays($year, $state), stateHolidays($year, $state));
    usort($all, fn($a,$b)=>strcmp($a['date'],$b['date']));
    return $all;
}
function getAllStates($year) {
    $states = ['ACT','NSW','NT','QLD','SA','TAS','VIC','WA'];
    $out = [];
    foreach ($states as $s) {
        $out[$s] = getHolidaysForStateYear($year, $s);
    }
    return $out;
}

// ---------------------- CSV helpers ----------------------
function toCSV(array $rows) {
    $f = fopen('php://temp', 'r+');
    fputcsv($f, ['name','date','observed','state','notes']);
    foreach ($rows as $r) fputcsv($f, [$r['name'],$r['date'],$r['observed'],$r['state'],$r['notes']]);
    rewind($f);
    $csv = stream_get_contents($f);
    fclose($f);
    return $csv;
}
function flattenGrouped(array $grouped) {
    $flat = [];
    foreach ($grouped as $state => $items) {
        foreach ($items as $r) $flat[] = $r;
    }
    return $flat;
}

// ---------------------- API Endpoint ----------------------
if (isset($_GET['api']) && $_GET['api'] == '1') {
    $year  = isset($_GET['year']) ? (int)$_GET['year'] : (int)date('Y');
    $state = isset($_GET['state']) ? strtoupper(trim($_GET['state'])) : 'NSW';
    $valid = ['ACT','NSW','NT','QLD','SA','TAS','VIC','WA','ALL'];

    if (!in_array($state, $valid, true)) {
        http_response_code(400);
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Invalid state. Use ACT, NSW, NT, QLD, SA, TAS, VIC, WA, or ALL']);
        exit;
    }

    if ($state === 'ALL') {
        $data = getAllStates($year);
        header('Content-Type: application/json');
        echo json_encode([
            'year'  => $year,
            'state' => 'ALL',
            'count' => array_sum(array_map('count', $data)),
            'items' => $data
        ]);
        exit;
    } else {
        $data = getHolidaysForStateYear($year, $state);
        header('Content-Type: application/json');
        echo json_encode([
            'year'  => $year,
            'state' => $state,
            'count' => count($data),
            'items' => $data
        ]);
        exit;
    }
}

// ---------------------- UI (HTML) ----------------------
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Australian Public Holidays — All States</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.badge-state { font-size: 0.85rem; }
.table thead th { white-space: nowrap; }
.small-note { font-size: .85rem; color:#6c757d; }
.nav-tabs .nav-link { font-weight: 600; }
</style>
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-2">Australian Public Holidays</h1>
    
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form id="queryForm" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label for="state" class="form-label">State/Territory</label>
                    <select id="state" class="form-select">
                        <option value="ALL" selected>All States & Territories</option>
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" id="year" class="form-control" value="<?php echo (int)date('Y'); ?>" min="2000" max="2100" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary w-100">Get Holidays</button>
                </div>
                <div class="col-md-3 d-grid gap-2">
                    <button type="button" id="downloadJsonAll" class="btn btn-outline-secondary">Download JSON</button>
                    <button type="button" id="downloadCsvAll" class="btn btn-outline-secondary">Download CSV</button>
                </div>
            </form>
        </div>
    </div>

    <div id="resultsAll" class="card shadow-sm d-none">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">
                    <span id="titleState"></span> — <span id="titleYear"></span>
                </h5>
            </div>

            <ul class="nav nav-tabs" id="stateTabs" role="tablist"><!-- tabs injected --></ul>
            <div class="tab-content border border-top-0 p-3 bg-white" id="stateTabContent"><!-- panes injected --></div>
        </div>
    </div>

    <div id="resultsSingle" class="card shadow-sm d-none">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">
                    <span id="titleStateSingle"></span> — <span id="titleYearSingle"></span>
                </h5>
                <div class="d-flex gap-2">
                    <button id="downloadJsonSingle" class="btn btn-outline-secondary btn-sm">Download JSON</button>
                    <button id="downloadCsvSingle" class="btn btn-outline-secondary btn-sm">Download CSV</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped align-middle" id="holidaysTableSingle">
                    <thead>
                        <tr>
                            <th>#</th><th>Holiday</th><th>Date</th><th>Observed</th><th>State</th><th>Notes</th>
                        </tr>
                    </thead>
                    <tbody><!-- filled by JS --></tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="emptyState" class="alert alert-info d-none mt-3">
        No holidays found for the selected inputs.
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(function(){
    const STATES = ['ACT','NSW','NT','QLD','SA','TAS','VIC','WA'];

    // Convert 'YYYY-MM-DD' to UNIX timestamp (UTC midnight)
    function toUnixTs(d) {
        if (!d) return '';
        const parts = d.split('-').map(Number);
        if (parts.length !== 3 || parts.some(isNaN)) return '';
        const [y, m, day] = parts;
        return Math.floor(Date.UTC(y, m - 1, day) / 1000);
    }

    function fetchHolidays(state, year) {
        return $.ajax({
            url: 'au_holidays_all.php',
            method: 'GET',
            dataType: 'json',
            data: { api: 1, state, year }
        });
    }

    function buildTableHtml(items) {
        let rows = '';
        items.forEach((h, i) => {
            rows += `
                <tr>
                    <td>${i+1}</td>
                    <td>${h.name}</td>
                    <td><span class="badge bg-primary-subtle text-primary-emphasis">${h.date}</span></td>
                    <td>${h.observed ? '<span class="badge bg-warning-subtle text-warning-emphasis">'+h.observed+'</span>' : '—'}</td>
                    <td><span class="badge bg-secondary-subtle text-secondary-emphasis badge-state">${h.state}</span></td>
                    <td>${h.notes || ''}</td>
                </tr>`;
        });
        return rows || `<tr><td colspan="6" class="text-center text-muted">No items</td></tr>`;
    }

    function renderAll(payload) {
        const $resultsAll = $('#resultsAll');
        const $resultsSingle = $('#resultsSingle');
        const $empty = $('#emptyState');
        const $tabs = $('#stateTabs');
        const $content = $('#stateTabContent');

        $('#titleState').text('All States & Territories');
        $('#titleYear').text(payload.year);

        $resultsSingle.addClass('d-none');
        $tabs.empty(); $content.empty();

        if (!payload.items || Object.keys(payload.items).length === 0) {
            $resultsAll.addClass('d-none'); $empty.removeClass('d-none'); return;
        }
        $empty.addClass('d-none'); $resultsAll.removeClass('d-none');

        // Build tabs and panes
        let first = true;
        STATES.forEach(function(s){
            const active = first ? 'active' : '';
            const selected = first ? 'true' : 'false';
            $tabs.append(`
                <li class="nav-item" role="presentation">
                    <button class="nav-link ${active}" id="tab-${s}" data-bs-toggle="tab" data-bs-target="#pane-${s}" type="button" role="tab" aria-controls="pane-${s}" aria-selected="${selected}">${s}</button>
                </li>
            `);
            const items = (payload.items && payload.items[s]) ? payload.items[s] : [];
            $content.append(`
                <div class="tab-pane fade ${active ? 'show active' : ''}" id="pane-${s}" role="tabpanel" aria-labelledby="tab-${s}" tabindex="0">
                    <div class="d-flex justify-content-end mb-2 gap-2">
                        <button class="btn btn-outline-secondary btn-sm" data-dl="json" data-state="${s}">Download ${s} JSON</button>
                        <button class="btn btn-outline-secondary btn-sm" data-dl="csv" data-state="${s}">Download ${s} CSV</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead><tr><th>#</th><th>Holiday</th><th>Date</th><th>Observed</th><th>State</th><th>Notes</th></tr></thead>
                            <tbody>${buildTableHtml(items)}</tbody>
                        </table>
                    </div>
                </div>
            `);
            first = false;
        });

        // Per-tab download buttons
        $('[data-dl]').off('click').on('click', function(){
            const kind = $(this).data('dl'); // json | csv
            const st = $(this).data('state');
            const items = payload.items[st] || [];
            if (kind === 'json') {
                const blob = new Blob([JSON.stringify({year: payload.year, state: st, count: items.length, items}, null, 2)], {type: 'application/json'});
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url; a.download = `au_holidays_${st}_${payload.year}.json`;
                document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
            } else {
                // CSV with timestamps
                const header = 'name,date_ts,observed_ts,state,notes\n';
                const csvBody = items.map(r => {
                    const esc = v => `"${String(v ?? '').replaceAll('"','""')}"`;
                    return [
                        esc(r.name),
                        toUnixTs(r.date),
                        r.observed ? toUnixTs(r.observed) : '',
                        esc(r.state),
                        esc(r.notes || '')
                    ].join(',');
                }).join('\n');
                const blob = new Blob([header + csvBody], {type: 'text/csv'});
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url; a.download = `au_holidays_${st}_${payload.year}.csv`;
                document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
            }
        });

        // Top-level downloads (all)
        $('#downloadJsonAll').off('click').on('click', function(){
            const blob = new Blob([JSON.stringify(payload, null, 2)], {type:'application/json'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = `au_holidays_ALL_${payload.year}.json`;
            document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
        });
        $('#downloadCsvAll').off('click').on('click', function(){
            // flatten
            let flat = [];
            for (const st of STATES) { if (payload.items[st]) flat = flat.concat(payload.items[st]); }
            // CSV with timestamps
            const header = 'name,date_ts,observed_ts,state,notes\n';
            const csvBody = flat.map(r=>{
                const esc = v => `"${String(v ?? '').replaceAll('"','""')}"`;
                return [
                    esc(r.name),
                    toUnixTs(r.date),
                    r.observed ? toUnixTs(r.observed) : '',
                    esc(r.state),
                    esc(r.notes || '')
                ].join(',');
            }).join('\n');
            const blob = new Blob([header + csvBody], {type:'text/csv'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = `au_holidays_ALL_${payload.year}.csv`;
            document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
        });
    }

    function renderSingle(payload) {
        const $resultsAll = $('#resultsAll');
        const $resultsSingle = $('#resultsSingle');
        const $empty = $('#emptyState');
        const $tbody = $('#holidaysTableSingle tbody');

        $('#titleStateSingle').text(payload.state);
        $('#titleYearSingle').text(payload.year);

        $resultsAll.addClass('d-none');

        if (!payload.items || payload.items.length === 0) {
            $resultsSingle.addClass('d-none'); $empty.removeClass('d-none'); return;
        }
        $empty.addClass('d-none'); $resultsSingle.removeClass('d-none');

        $tbody.empty().append(buildTableHtml(payload.items));

        // Download buttons
        $('#downloadJsonSingle').off('click').on('click', function(){
            const blob = new Blob([JSON.stringify(payload, null, 2)], {type:'application/json'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = `au_holidays_${payload.state}_${payload.year}.json`;
            document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
        });
        $('#downloadCsvSingle').off('click').on('click', function(){
            // CSV with timestamps
            const header = 'name,date_ts,observed_ts,state,notes\n';
            const csvBody = payload.items.map(r=>{
                const esc = v => `"${String(v ?? '').replaceAll('"','""')}"`;
                return [
                    esc(r.name),
                    toUnixTs(r.date),
                    r.observed ? toUnixTs(r.observed) : '',
                    esc(r.state),
                    esc(r.notes || '')
                ].join(',');
            }).join('\n');
            const blob = new Blob([header + csvBody], {type:'text/csv'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url; a.download = `au_holidays_${payload.state}_${payload.year}.csv`;
            document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url);
        });
    }

    function onSubmit() {
        const state = $('#state').val();
        const year = parseInt($('#year').val(), 10);
        fetchHolidays(state, year).done(function(payload){
            if (state === 'ALL') {
                renderAll(payload);
                $('#resultsAll').removeClass('d-none');
            } else {
                renderSingle(payload);
                $('#resultsSingle').removeClass('d-none');
            }
        }).fail(function(xhr){
            alert(xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'Failed to load holidays.');
        });
    }

    // initial load
    onSubmit();

    // form submit
    $('#queryForm').on('submit', function(e){ e.preventDefault(); onSubmit(); });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
