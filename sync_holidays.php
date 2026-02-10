<?php
// sync_holidays.php
// Raw PHP (no frameworks). Fetches official AU public holidays per state into MySQL.
// Supports ICS feeds (ACT, NSW, VIC) + HTML parsers (QLD, WA, SA, NT, TAS).

/** ====== CONFIG ====== */
$DB = [
    'host' => 'localhost',
    'db'   => 'saas',
    'user' => 'saas',
    'pass' => 'Bangladesh$$786',
    'charset' => 'utf8mb4'
];

$DEFAULT_YEARS = [date('Y'), date('Y')+1]; // sync this year + next by default

// Official sources (ics preferred, otherwise html page to parse)
$SOURCES = [
    'ACT' => [
        ['type'=>'ics', 'url'=>'https://www.act.gov.au/living-in-the-act/public-holidays-school-terms-and-daylight-savings/public-holiday-ical-feed']
    ],
    'NSW' => [
        // NSW ships per-year ICS files; pattern holds for published years (e.g., 2025–2027).
        ['type'=>'ics-template', 'template'=>'https://staticontent.premiersdepartment.nsw.gov.au/ir/calendar/NSW-Public-Holidays-dates-{{Y}}.ics', 'years'=>range((int)date('Y')-1, (int)date('Y')+2)]
    ],
    'VIC' => [
        // Government bundle ICS (2019–2027). Still works for currently listed range.
        ['type'=>'ics', 'url'=>'https://www.vic.gov.au/sites/default/files/2025-09/Victorian-public-holiday-dates.ics']
    ],
    'QLD' => [
        // Official page with table listing multiple years.
        ['type'=>'html', 'url'=>'https://www.qld.gov.au/recreation/travel/holidays/public']
    ],
    'WA' => [
        ['type'=>'html', 'url'=>'https://www.wa.gov.au/service/employment/workplace-arrangements/public-holidays-western-australia']
    ],
    'SA' => [
        ['type'=>'html', 'url'=>'https://www.safework.sa.gov.au/resources/public-holidays']
    ],
    'NT' => [
        ['type'=>'html', 'url'=>'https://nt.gov.au/nt-public-holidays']
    ],
    'TAS' => [
        // Statewide dates are available on Transport Tassie page (gov site).
        ['type'=>'html', 'url'=>'https://www.transport.tas.gov.au/public_transport/bus_timetables/public_holiday_timetables/accordion/state-wide_public_holidays']
    ],
];

/** ====== DB ====== */
function pdo() {
    global $DB; static $pdo;
    if (!$pdo) {
        $dsn = "mysql:host={$DB['host']};dbname={$DB['db']};charset={$DB['charset']}";
        $pdo = new PDO($dsn, $DB['user'], $DB['pass'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $pdo;
}
function upsertHoliday($row) {
    $pdo = pdo();
    $hash = sha1(implode('|', [
        $row['state'], $row['name'], $row['date'],
        $row['observed_date'] ?? '', $row['region'] ?? '', $row['year']
    ]));
    $sql = "INSERT INTO au_holidays
      (year,state,name,date,observed_date,all_day,part_day_from,part_day_to,region,source_url,source_type,hash)
      VALUES (:year,:state,:name,:date,:observed_date,:all_day,:part_day_from,:part_day_to,:region,:source_url,:source_type,:hash)
      ON DUPLICATE KEY UPDATE
        name=VALUES(name),
        observed_date=VALUES(observed_date),
        all_day=VALUES(all_day),
        part_day_from=VALUES(part_day_from),
        part_day_to=VALUES(part_day_to),
        region=VALUES(region),
        source_url=VALUES(source_url),
        source_type=VALUES(source_type)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':year' => $row['year'],
        ':state'=> $row['state'],
        ':name' => $row['name'],
        ':date' => $row['date'],
        ':observed_date'=> $row['observed_date'] ?? null,
        ':all_day' => $row['all_day'] ?? 1,
        ':part_day_from'=> $row['part_day_from'] ?? null,
        ':part_day_to'  => $row['part_day_to'] ?? null,
        ':region'=> $row['region'] ?? null,
        ':source_url'=> $row['source_url'],
        ':source_type'=> $row['source_type'],
        ':hash' => $hash
    ]);
}

/** ====== HTTP ====== */
function http_get($url) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_USERAGENT => 'AUHolidaySync/1.0 (+https://example.local)',
    ]);
    $body = curl_exec($ch);
    $err = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($body === false || $code >= 400) {
        throw new RuntimeException("Fetch failed [$code] $err for $url");
    }
    return $body;
}

/** ====== Helpers ====== */
function normDate($s) { return (new DateTime($s))->format('Y-m-d'); }
function yearFromDate($d) { return (int)substr($d,0,4); }
function detectYear($dateYmd, $fallbackYear) { return $dateYmd ? (int)substr($dateYmd,0,4) : (int)$fallbackYear; }

/** ====== ICS parsing ====== */
function parseICS($ics, $state, $sourceUrl) {
    $lines = preg_split("/\r\n|\n|\r/", $ics);
    $events = []; $cur = [];
    foreach ($lines as $line) {
        if (strpos($line, 'BEGIN:VEVENT') === 0) { $cur = []; continue; }
        if (strpos($line, 'END:VEVENT') === 0) {
            if (!empty($cur['SUMMARY']) && !empty($cur['DTSTART'])) $events[] = $cur;
            $cur = []; continue;
        }
        if (preg_match('/^([A-Z]+)(?:;[^:]+)?:\s*(.+)$/', $line, $m)) {
            $key = $m[1]; $val = trim($m[2]);
            // Handle folded lines (next lines start with space)
            if (!isset($cur[$key])) $cur[$key] = $val; else $cur[$key] .= $val;
        }
    }
    $rows = [];
    foreach ($events as $e) {
        $start = $e['DTSTART'] ?? null;
        // DTSTART;VALUE=DATE:YYYYMMDD or DTSTART:YYYYMMDD
        if ($start && preg_match('/(\d{4})(\d{2})(\d{2})/', $start, $m)) {
            $ymd = $m[1] . '-' . $m[2] . '-' . $m[3];
            $name = trim($e['SUMMARY'] ?? 'Holiday');
            // Basic observed hints sometimes appear in SUMMARY or DESCRIPTION; store raw date only (observed may be listed separately in some ICS).
            $rows[] = [
                'year' => yearFromDate($ymd),
                'state'=> $state,
                'name' => $name,
                'date' => $ymd,
                'observed_date' => null,
                'all_day' => 1,
                'part_day_from'=> null,
                'part_day_to'=> null,
                'region'=> null,
                'source_url'=> $sourceUrl,
                'source_type'=> 'ics'
            ];
        }
    }
    return $rows;
}

/** ====== HTML parsing (very targeted per source) ====== */
function parseQLD($html, $sourceUrl) {
    // Page shows a multi-year table with “Holiday | 2025 | 2026 | 2027 | 2028 …”.
    // Extract rows and map the second column to years.
    $rows = [];
    libxml_use_internal_errors(true);
    $dom = new DOMDocument(); $dom->loadHTML($html);
    $xp = new DOMXPath($dom);
    $tables = $xp->query("//table"); // first data table
    if ($tables->length) {
        $ths = $tables->item(0)->getElementsByTagName('th');
        $yearCols = []; // col index => year
        for ($i=0; $i<$ths->length; $i++) {
            $t = preg_replace('/\D/','', $ths->item($i)->textContent);
            if (strlen($t)===4) $yearCols[$i] = (int)$t;
        }
        $trs = $tables->item(0)->getElementsByTagName('tr');
        foreach ($trs as $tr) {
            $tds = $tr->getElementsByTagName('td');
            if ($tds->length < 2) continue;
            $name = trim($tds->item(0)->textContent);
            foreach ($yearCols as $idx=>$yr) {
                if ($idx < $tds->length) {
                    $dateTxt = trim($tds->item($idx)->textContent);
                    if (!$dateTxt) continue;
                    // Dates may be "Monday 27 January" → append year.
                    $dateTxt = preg_replace('/\s+/',' ', $dateTxt);
                    if (preg_match('/\b(\d{1,2})\s+([A-Za-z]+)\b/', $dateTxt, $m)) {
                        $d = $m[1]; $mon = $m[2];
                        $ymd = date('Y-m-d', strtotime("$d $mon $yr"));
                        $rows[] = [
                            'year'=>$yr,'state'=>'QLD','name'=>$name,'date'=>$ymd,
                            'observed_date'=>null,'all_day'=>1,'part_day_from'=>null,'part_day_to'=>null,
                            'region'=> (stripos($name,'Show')!==false && stripos($name,'Brisbane')!==false) ? 'Brisbane area only' : null,
                            'source_url'=>$sourceUrl,'source_type'=>'html'
                        ];
                    }
                }
            }
        }
    }
    return $rows;
}
function parseWA($html, $sourceUrl) {
    // Page lists "2025 2026 2027" then rows with holiday names and date strings.
    $rows = [];
    $text = strip_tags($html);
    // Capture lines like: "New Year's Day Wednesday 1 January" near "2025"
    // We'll parse per year in [2025..2027].
    foreach ([2025,2026,2027] as $yr) {
        if (preg_match_all("/(New Year's Day|Australia Day|Labour Day|Good Friday|Easter Sunday|Easter Monday|Anzac Day|Western Australia Day|King's Birthday|Christmas Day|Boxing Day)[^\\d]*(\\w+\\s+\\d{1,2}\\s+\\w+)/i", $text, $m, PREG_SET_ORDER)) {
            foreach ($m as $mm) {
                $name = trim($mm[1]);
                $dstr = trim($mm[2]) . " $yr";
                $ymd = date('Y-m-d', strtotime($dstr));
                if ($ymd) {
                    $rows[] = ['year'=>$yr,'state'=>'WA','name'=>$name,'date'=>$ymd,
                        'observed_date'=>null,'all_day'=>1,'part_day_from'=>null,'part_day_to'=>null,
                        'region'=>null,'source_url'=>$sourceUrl,'source_type'=>'html'];
                }
            }
        }
    }
    return dedupe($rows);
}
function parseSA($html, $sourceUrl) {
    // SafeWork SA page has bullet/line list: "Monday 9 June: King’s Birthday".
    $rows = [];
    if (preg_match_all('/(?:(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)\s+)?(\d{1,2}\s+[A-Za-z]+):\s+(.+?)\s*(?:\n|$)/u', strip_tags($html), $m, PREG_SET_ORDER)) {
        foreach ($m as $mm) {
            $datePart = $mm[2]; $name = trim($mm[3]);
            // Find a nearby year block (we’ll assume current year if not present; page groups by 2025/2026/2024)
            // Safer: try to detect a year mentioned earlier in the markup; fallback to inferring from month progression.
            $y = (int)date('Y');
            // Attempt parse with current year; if it falls in past too far, try +/-1
            $candidates = [$y, $y+1, $y-1];
            $ymd = null;
            foreach ($candidates as $cy) {
                $t = strtotime($datePart.' '.$cy);
                if ($t !== false) { $ymd = date('Y-m-d', $t); if ((int)date('Y',$t) == $cy) break; }
            }
            if ($ymd) {
                // Part-day cases: “Christmas Eve: 7pm to midnight”
                $pdFrom = null; $pdTo = null;
                if (preg_match('/(\d{1,2})(?::\d{2})?\s*(am|pm).*(\d{1,2})(?::\d{2})?\s*(am|pm)/i', $mm[0], $pm)) {
                    $pdFrom = date('H:i:s', strtotime($pm[1].' '.$pm[2]));
                    $pdTo   = date('H:i:s', strtotime($pm[3].' '.$pm[4]));
                }
                $rows[] = ['year'=> (int)substr($ymd,0,4), 'state'=>'SA', 'name'=>$name, 'date'=>$ymd,
                    'observed_date'=>null,'all_day'=> $pdFrom?0:1,'part_day_from'=>$pdFrom,'part_day_to'=>$pdTo,
                    'region'=>null,'source_url'=>$sourceUrl,'source_type'=>'html'];
            }
        }
    }
    return dedupe($rows);
}
function parseNT($html, $sourceUrl) {
    // Explicit table lines like “May Day Monday 5 May 2025”
    $rows = [];
    if (preg_match_all('/\b(New Year\'s Day|Australia Day|Good Friday|Easter Saturday|Easter Sunday|Easter Monday|Anzac Day|May Day|King\'s Birthday|Alice Springs Show Day|Tennant Creek Show Day|Katherine Show Day|Darwin Show Day|Picnic Day|Borroloola Show Day|Christmas Eve - part day holiday|Christmas Day|Boxing Day|New Year\'s Eve - part day holiday)\b[^0-9]*(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)\s+(\d{1,2}\s+[A-Za-z]+\s+\d{4})/i', strip_tags($html), $m, PREG_SET_ORDER)) {
        foreach ($m as $mm) {
            $name = trim($mm[1]);
            $ymd = date('Y-m-d', strtotime($mm[3]));
            $region = null;
            if (stripos($name, 'Show Day') !== false) {
                // Region is embedded in the name, keep it in region and normalize the name
                if (preg_match('/^(.*) Show Day$/', $name, $rm)) {
                    $region = $rm[1];
                    $name = 'Show Day';
                }
            }
            $part = null;
            $pdFrom = $pdTo = null;
            if (stripos($name, 'part day') !== false) {
                $name = str_ireplace(' - part day holiday','',$name);
                // NT part days are 7pm–midnight
                $pdFrom = '19:00:00'; $pdTo = '23:59:59';
            }
            $rows[] = ['year'=> (int)substr($ymd,0,4), 'state'=>'NT', 'name'=>$name, 'date'=>$ymd,
                'observed_date'=>null,'all_day'=> $pdFrom?0:1,'part_day_from'=>$pdFrom,'part_day_to'=>$pdTo,
                'region'=>$region, 'source_url'=>$sourceUrl, 'source_type'=>'html'];
        }
    }
    return dedupe($rows);
}
function parseTAS($html, $sourceUrl) {
    // Transport Tasmania page lists statewide holidays for 2024/2025 with explicit dates.
    $rows = [];
    if (preg_match_all('/\b(Christmas Day|Boxing Day|New Year’s? Day|Australia Day|Eight Hours Day|Good Friday|Easter Saturday|Easter Sunday|Easter Monday|Easter Tuesday|ANZAC Day|King’s Birthday)\b[^\d]*(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)\s+(\d{1,2}\s+[A-Za-z]+\s+\d{4})/u', strip_tags($html), $m, PREG_SET_ORDER)) {
        foreach ($m as $mm) {
            $name = str_replace('’', "'", $mm[1]);
            $ymd = date('Y-m-d', strtotime($mm[3]));
            $rows[] = ['year'=> (int)substr($ymd,0,4), 'state'=>'TAS', 'name'=>$name, 'date'=>$ymd,
                'observed_date'=>null,'all_day'=>1,'part_day_from'=>null,'part_day_to'=>null,
                'region'=>null, 'source_url'=>$sourceUrl, 'source_type'=>'html'];
        }
    }
    return dedupe($rows);
}

function dedupe(array $rows): array {
    $seen = []; $out = [];
    foreach ($rows as $r) {
        $k = $r['state'].'|'.$r['name'].'|'.$r['date'].'|'.($r['region']??'');
        if (!isset($seen[$k])) { $seen[$k]=1; $out[]=$r; }
    }
    return $out;
}

/** ====== Driver ====== */
function syncState($code, $defs, $yearsFilter=null) {
    $total = 0;
    foreach ($defs as $def) {
        if ($def['type']==='ics') {
            $ics = http_get($def['url']);
            $rows = parseICS($ics, $code, $def['url']);
            foreach ($rows as $r) {
                if ($yearsFilter && !in_array((int)$r['year'], $yearsFilter, true)) continue;
                upsertHoliday($r); $total++;
            }
        } elseif ($def['type']==='ics-template') {
            $years = $def['years'] ?? $yearsFilter ?? [];
            foreach ($years as $y) {
                $url = str_replace('{{Y}}', (string)$y, $def['template']);
                try {
                    $ics = http_get($url);
                } catch(Throwable $e) { continue; }
                $rows = parseICS($ics, $code, $url);
                foreach ($rows as $r) {
                    if ($yearsFilter && !in_array((int)$r['year'], $yearsFilter, true)) continue;
                    upsertHoliday($r); $total++;
                }
            }
        } elseif ($def['type']==='html') {
            $html = http_get($def['url']);
            $rows = [];
            switch ($code) {
                case 'QLD': $rows = parseQLD($html, $def['url']); break;
                case 'WA' : $rows = parseWA($html, $def['url']); break;
                case 'SA' : $rows = parseSA($html, $def['url']); break;
                case 'NT' : $rows = parseNT($html, $def['url']); break;
                case 'TAS': $rows = parseTAS($html, $def['url']); break;
            }
            foreach ($rows as $r) {
                if ($yearsFilter && !in_array((int)$r['year'], $yearsFilter, true)) continue;
                upsertHoliday($r); $total++;
            }
        }
    }
    return $total;
}

$years = [];
if (PHP_SAPI === 'cli') {
    // Usage: php sync_holidays.php 2025 2026
    global $argv;
    for ($i=1; $i<count($argv); $i++) if (preg_match('/^\d{4}$/',$argv[$i])) $years[] = (int)$argv[$i];
} else {
    if (isset($_GET['year'])) {
        foreach (explode(',', $_GET['year']) as $y) if (preg_match('/^\d{4}$/',trim($y))) $years[] = (int)$y;
    }
}

if (!$years) $years = array_map('intval', $DEFAULT_YEARS);

$states = ['ACT','NSW','VIC','QLD','WA','SA','NT','TAS'];
if (isset($_GET['state']) && in_array(strtoupper($_GET['state']), $states, true)) {
    $states = [strtoupper($_GET['state'])];
}

$tot=0; foreach ($states as $s) { $tot += syncState($s, $SOURCES[$s], $years); }
header('Content-Type: text/plain; charset=utf-8');
echo "Synced $tot rows for states [" . implode(',', $states) . "] years [" . implode(',', $years) . "]\n";
