<?php

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

?>
