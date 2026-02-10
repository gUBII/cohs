<?php

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

?>
