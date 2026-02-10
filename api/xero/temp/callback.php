<?php
// Xero API credentials
$client_id = "BC3F6750E2D644C18302F52BBA9E0BC7";
$client_secret = "j_Or5_5xYMQBpDXGmjxdRkYiwthrIJqOI9tHplhrjDNMFHVC";
$redirect_uri = "https://stylevista.online/saas/callback.php";

$authorization_code_file = $_GET['code'];

// Xero token endpoint
$url = "https://identity.xero.com/connect/token";

// Request body
$data = http_build_query([
    "grant_type" => "authorization_code",
    "code" => trim($authorization_code_file), // Trim to remove any whitespace
    "redirect_uri" => $redirect_uri,
    "client_id" => $client_id,
    "client_secret" => $client_secret
]);

// cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/x-www-form-urlencoded"
]);

$response = curl_exec($ch);
curl_close($ch);

// Decode the response
$response_data = json_decode($response, true);

// Extract the access token
$access_token = isset($response_data['access_token']) ? $response_data['access_token'] : null;

// Save token for later use
file_put_contents("access_token.json", json_encode($response_data, JSON_PRETTY_PRINT));

// Echo access token
if ($access_token) echo "Access Token saved successfully!<hr>";

// Get tenant id
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$access_token = $tokenData['access_token'];
$url = "https://api.xero.com/connections";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

// Save tenant ID for later use
file_put_contents("tenant_id.json", $response);

echo "Tenant ID saved successfully.<hr>";

// GET PAYRUN : Read the saved access token and tenant ID
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);

$access_token = $tokenData['access_token'];
$tenant_id = $tenantData[0]['tenantId'];
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

echo "PayRuns Retrieved Successfully:<hr>";

echo $response;

echo"<hr><br><br>";

// API endpoint to get Payroll Calendars
$url = "https://api.xero.com/payroll.xro/1.0/PayrollCalendars"; // AU Payroll API

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

// Display the Payroll Calendar data
echo "Payroll Calendars:<hr>";
echo "<pre>" . print_r(json_decode($response, true), true) . "</pre>";

echo"<hr><br><br>";

// CREATE PAYRUN - Xero API endpoint to create a PayRun
// Dummy PayRun data
$url = "https://api.xero.com/payroll.xro/1.0/PayRuns"; // Use the correct region-based URL
$data = json_encode([
    [
        "PayrollCalendarID" => "e9f9a905-f24b-42fb-a5fc-5fde2810413e",
        "PayRunPeriodStartDate" => "2025-03-01",
        "PayRunPeriodEndDate" => "2025-03-14",
        "PayRunType" => "Scheduled",
        "PaymentDate" => "2025-03-15"
    ]
]);

// cURL request
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
curl_close($ch);

echo "Create PayRuns Successful:<hr>";
echo $response;

