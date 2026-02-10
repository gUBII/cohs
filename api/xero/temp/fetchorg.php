<?php

// Load the latest access token
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$access_token = $tokenData['access_token'];

// Load the latest tenant ID
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);
$tenant_id = $tenantData[0]['tenantId'];

// Xero API - Get Organization Details
$url = "https://api.xero.com/api.xro/2.0/Organisation";

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

echo "Xero Organization Details:<hr>";
echo "<pre>" . print_r(json_decode($response, true), true) . "</pre>";

?>
