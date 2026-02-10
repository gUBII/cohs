<?php
// Read tokens from JSON file
$json_data = file_get_contents("xero_tokens.json");
$tokens = json_decode($json_data, true);

$access_token = $tokens['access_token'];
$tenant_id = $tokens['tenant_id'];

// Xero API URL for getting employees
$url = "https://api.xero.com/api.xro/2.0/Employees";

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Xero-Tenant-Id: $tenant_id",
    "Accept: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

$employees = json_decode($response, true);

// Print the response
echo "<pre>";
print_r($employees);
echo "</pre>";
?>
