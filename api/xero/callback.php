<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Xero API credentials
$client_id = "320C5FD0D7954C6B8F68DCBE38B809A8";
$client_secret = "SzjQeKtQaXgHFn11wRcNkWZujZ309D2qLQRvHAvhze7N0jS4";
$redirect_uri = "https://nexis365.com/saas/api/xero/callback.php";

// Check if authorization code is received
if (!isset($_GET['code'])) {
    die("Error: Authorization code not received from Xero.");
}

$authorization_code = trim($_GET['code']);

// Xero token endpoint
$url = "https://identity.xero.com/connect/token";

// Request body
$data = http_build_query([
    "grant_type" => "authorization_code",
    "code" => $authorization_code,
    "redirect_uri" => $redirect_uri,
    "client_id" => $client_id,
    "client_secret" => $client_secret
]);

// cURL request for Access Token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/x-www-form-urlencoded"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Decode response
$response_data = json_decode($response, true);

// Check if Access Token is received
if ($httpCode !== 200 || !isset($response_data['access_token'])) {
    die("Error fetching Access Token. HTTP Code: $httpCode. Response: " . json_encode($response_data, JSON_PRETTY_PRINT));
}

$access_token = $response_data['access_token'];

// Save token for later use
file_put_contents("access_token.json", json_encode($response_data, JSON_PRETTY_PRINT));
echo "Access Token saved successfully!<hr>";

// Step 2: Retrieve Tenant ID
$url = "https://api.xero.com/connections";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Decode response
$tenantData = json_decode($response, true);

// Check if Tenant ID is received
if ($httpCode !== 200 || empty($tenantData[0]['tenantId'])) {
    die("Error fetching Tenant ID. HTTP Code: $httpCode. Response: " . json_encode($tenantData, JSON_PRETTY_PRINT));
}

$tenant_id = $tenantData[0]['tenantId'];

// Save tenant ID for later use
file_put_contents("tenant_id.json", json_encode($tenantData, JSON_PRETTY_PRINT));
echo "Tenant ID saved successfully.<hr>";

// Step 3: Retrieve Payroll Calendar ID
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

// Check if Payroll Calendar exists
if ($httpCode !== 200 || empty($payrollCalendarData['PayrollCalendars'][0]['PayrollCalendarID'])) {
    die("Error fetching PayrollCalendarID. HTTP Code: $httpCode. Response: " . json_encode($payrollCalendarData, JSON_PRETTY_PRINT));
}

$payrollCalendarID = $payrollCalendarData['PayrollCalendars'][0]['PayrollCalendarID'];

echo "Payroll Calendar ID: <strong>$payrollCalendarID</strong><hr>";

// Step 4: Retrieve PayRuns
$url = "https://api.xero.com/payroll.xro/1.0/PayRuns";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Xero-Tenant-Id: $tenant_id",
    "Accept: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

// Display PayRuns
echo "PayRuns Retrieved Successfully:<hr>";
echo "<pre>" . json_encode(json_decode($response), JSON_PRETTY_PRINT) . "</pre>";

// Step 5: Create PayRun
$url = "https://api.xero.com/payroll.xro/1.0/PayRuns";

// Use the correct PayrollCalendarID retrieved from API
$payrun_data = [
    "PayrollCalendarID" => $payrollCalendarID,  // Using the correct ID dynamically
    "PayRunPeriodStartDate" => "2025-03-01",
    "PayRunPeriodEndDate" => "2025-03-14",
    "PayRunType" => "Scheduled",
    "PaymentDate" => "2025-03-16"
];

// Encode JSON payload
$data = json_encode($payrun_data, JSON_PRETTY_PRINT);

// Debugging: Print JSON Payload
echo "<pre>JSON Payload Sent to Xero:\n" . $data . "</pre>";

// Validate JSON Before Sending
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON Encoding Error: " . json_last_error_msg());
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Xero-Tenant-Id: $tenant_id",
    "Accept: application/json",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error = curl_error($ch);
curl_close($ch);

// Debugging: Print API Response
echo "<pre>HTTP Status Code: $httpCode</pre>";

if ($error) {
    echo "<pre>cURL Error: $error</pre>";
}

// Decode and display API response
$responseData = json_decode($response, true);
if ($responseData) {
    echo "<pre>API Response:\n" . json_encode($responseData, JSON_PRETTY_PRINT) . "</pre>";
} else {
    echo "<pre>Error: No response body returned. Possible JSON format issue or missing required fields.</pre>";
}
?>
