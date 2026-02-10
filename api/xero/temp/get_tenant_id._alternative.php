<?php

$access_token = file_get_contents("access_token.json");
$access_token = json_decode($access_token, true)['access_token'];

$url = "https://api.xero.com/connections";

// cURL request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $access_token,
    "Accept: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

// Get the Tenant ID for Demo Company
$tenant_id = $data[0]['tenantId'];
file_put_contents("tenant_id.txt", $tenant_id);

echo "Tenant ID: " . $tenant_id;

?>
