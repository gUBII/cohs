<?php

// Xero API credentials
$client_id = "BC3F6750E2D644C18302F52BBA9E0BC7";
$client_secret = "j_Or5_5xYMQBpDXGmjxdRkYiwthrIJqOI9tHplhrjDNMFHVC";
$redirect_uri = "https://stylevista.online/saas/callback.php";

// Read the authorization code from the file
$authorization_code_file = "authorization_code.txt";

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

?>
