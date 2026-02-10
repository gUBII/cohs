<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load access token and tenant ID
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);

$access_token = $tokenData['access_token'] ?? null;
$tenant_id = $tenantData[0]['tenantId'] ?? null;

// Check if Access Token and Tenant ID exist
if (!$access_token || !$tenant_id) {
    die("Error: Missing Access Token or Tenant ID.");
}

// API endpoint to fetch Payroll Calendars
$url = "https://api.xero.com/payroll.xro/1.0/PayrollCalendars";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Xero-Tenant-Id: $tenant_id",
    "Accept: application/json"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Decode response
$payrollCalendarData = json_decode($response, true);

// Debugging: Print the raw API response
echo "<pre>HTTP Status Code: $httpCode</pre>";
echo "<pre>Raw API Response:\n" . json_encode($payrollCalendarData, JSON_PRETTY_PRINT) . "</pre>";

// Validate Payroll Calendar
if ($httpCode !== 200 || empty($payrollCalendarData['PayrollCalendars'])) {
    die("<pre>Error: No valid Payroll Calendar found. Please check Xero settings.</pre>");
}

// Function to convert Xero's /Date(timestamp)/ format to Y-m-d
function convertXeroDate($xeroDate) {
    if (preg_match('/\/Date\((\d+)(?:\+0000)?\)\//', $xeroDate, $matches)) {
        return date("Y-m-d", $matches[1] / 1000); // Convert to seconds
    }
    return "Invalid Date";
}

// Display the valid PayrollCalendarIDs
echo "<h3>Valid Payroll Calendars:</h3>";
foreach ($payrollCalendarData['PayrollCalendars'] as $calendar) {
    echo "<pre>";
    echo "PayrollCalendarID: " . $calendar['PayrollCalendarID'] . "\n";
    echo "Name: " . $calendar['Name'] . "\n";
    echo "Type: " . $calendar['CalendarType'] . "\n";
    echo "Start Date: " . convertXeroDate($calendar['StartDate']) . "\n";
    echo "Payment Date: " . convertXeroDate($calendar['PaymentDate']) . "\n";
    echo "-----------------------------------\n";
    echo "</pre>";
}

?>
