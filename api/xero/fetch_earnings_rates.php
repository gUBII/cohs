<?php
// Read access token & tenant ID
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);
$access_token = $tokenData['access_token'] ?? null;
$tenant_id = $tenantData[0]['tenantId'] ?? null;

if (!$access_token || !$tenant_id) {
    die("❌ Error: Access Token or Tenant ID missing.");
}

// API URL to fetch Earnings Rates
$url = "https://api.xero.com/payroll.xro/1.0/EarningsRates";

// cURL request
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Xero-Tenant-Id: $tenant_id",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Check response
if ($httpCode === 200) {
    echo "✅ Earnings Rates Retrieved Successfully:\n";
    echo "<pre>" . json_encode(json_decode($response), JSON_PRETTY_PRINT) . "</pre>";
} else {
    die("❌ Error fetching Earnings Rates. HTTP Code: $httpCode. Response: $response");
}
?>
