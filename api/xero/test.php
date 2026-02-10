<?php
include '../../dbcon.php';

// Read tokens from JSON files
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);

$access_token = $tokenData['access_token'];
$tenant_id = $tenantData[0]['tenantId'];

// Function to get Payroll Calendar ID
function getPayrollCalendarID($access_token, $tenant_id) {
    $url = "https://api.xero.com/payroll.xro/1.0/PayrollCalendars";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $access_token",
        "Xero-Tenant-Id: $tenant_id",
        "Content-Type: application/json",
        "Accept: application/json"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    echo "<pre>Payroll Calendar Response:\n" . json_encode(json_decode($response), JSON_PRETTY_PRINT) . "</pre>";
}

getPayrollCalendarID($access_token, $tenant_id);
?>
