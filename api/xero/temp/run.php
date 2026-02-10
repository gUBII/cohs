<?php

// Xero API credentials
$client_id = "BC3F6750E2D644C18302F52BBA9E0BC7";
$client_secret = "j_Or5_5xYMQBpDXGmjxdRkYiwthrIJqOI9tHplhrjDNMFHVC";
$redirect_uri = "https://stylevista.online/saas/run.php";

// Check if authorization code is received
/*
if (!isset($_GET['code'])) {
    // Redirect user to Xero authentication page
    $xeroAuthUrl = "https://login.xero.com/identity/connect/authorize?" . http_build_query([
        "response_type" => "code",
        "client_id" => $client_id,
        "redirect_uri" => $redirect_uri,
        "scope" => "openid profile email accounting.transactions payroll.employees payroll.payruns"
    ]);

    // Redirect to Xero login
    header("Location: " . $xeroAuthUrl);
    exit;
}*/


// Get the authorization code from URL
$authorization_code = $_GET['code'];

// Xero API credentials
//$client_id = "BC3F6750E2D644C18302F52BBA9E0BC7";
//$client_secret = "j_Or5_5xYMQBpDXGmjxdRkYiwthrIJqOI9tHplhrjDNMFHVC";
//$redirect_uri = "https://stylevista.online/saas/callback.php";

// Read the authorization code from the file
$authorization_code_file = $authorization_code;

if (!file_exists($authorization_code_file) || !($authorization_code = file_get_contents($authorization_code_file))) {
    die("❌ Error: Authorization code not found. Please run run.php first.");
}

// Xero token endpoint
$url = "https://identity.xero.com/connect/token";

// Request body
$data = http_build_query([
    "grant_type" => "authorization_code",
    "code" => trim($authorization_code), // Trim to remove any whitespace
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

// Echo the full response for debugging
echo "Full Response:\n";
echo "<pre>" . print_r($response_data, true) . "</pre>";

// Extract the access token
$access_token = isset($response_data['access_token']) ? $response_data['access_token'] : null;

// Save token for later use
file_put_contents("access_token.json", json_encode($response_data, JSON_PRETTY_PRINT));

// Echo access token
if ($access_token) {
    echo "✅ Access token saved successfully!\n";
    echo "Access token: " . $access_token . "\n";
} else {
    echo "❌ Error: Access token not found.\n";
}

// Get tenant id

// Read the saved access token
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$access_token = $tokenData['access_token'];

// Xero API endpoint to get Tenant ID
$url = "https://api.xero.com/connections";

// cURL request
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

echo "Tenant ID saved successfully.\n";


// Read the saved access token and tenant ID
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);

$access_token = $tokenData['access_token'];
$tenant_id = $tenantData[0]['tenantId']; // Extract Tenant ID

// Xero API endpoint for PayRuns
$url = "https://api.xero.com/payroll.xro/2.0/PayRuns";

// cURL request
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
echo "PayRuns Retrieved Successfully:\n";
echo $response;



