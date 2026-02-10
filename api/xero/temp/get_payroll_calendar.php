<?php

$access_token = file_get_contents("access_token.json");
$access_token = json_decode($access_token, true)['access_token'];
$tenant_id = file_get_contents("tenant_id.txt");

$url = "https://api.xero.com/payroll.xro/2.0/PayrollCalendars";

// cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $access_token,
    "Accept: application/json",
    "Xero-tenant-id: " . $tenant_id
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Print response for debugging
echo "<pre>HTTP Status Code: " . $http_code . "\nResponse: " . htmlspecialchars($response) . "</pre>";

// Decode JSON response
$data = json_decode($response, true);

// Check if PayrollCalendars key exists
if (isset($data['PayrollCalendars']) && count($data['PayrollCalendars']) > 0) {
    $payroll_calendar_id = $data['PayrollCalendars'][0]['PayrollCalendarID'];
    file_put_contents("payroll_calendar_id.txt", $payroll_calendar_id);
    echo "<br>Payroll Calendar ID: " . $payroll_calendar_id;
} else {
    echo "<br>Error: No Payroll Calendar ID found!";
}

?>
