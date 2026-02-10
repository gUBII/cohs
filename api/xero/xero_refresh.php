<?php
// Xero API credentials (Replace with your actual Client ID and Secret)
$client_id = "5993E4516A9C4E57B872D21048E00023";
$client_secret = "vBPkRZNKqO61DdpUg0TkEDp4ro2nsoIeFBsjTMLsMQvNdj4H";

// Read tokens from xero_tokens.json
$json_data = file_get_contents("xero_tokens.json");
$tokens = json_decode($json_data, true);

if (!isset($tokens['refresh_token'])) {
    die("Error: Refresh token not found. Run xero_auth.php first.");
}

$refresh_token = $tokens['refresh_token'];

// Xero API token refresh URL
$url = "https://identity.xero.com/connect/token";
$data = [
    "grant_type" => "refresh_token",
    "refresh_token" => $refresh_token,
    "client_id" => $client_id,
    "client_secret" => $client_secret
];

// Send request to get new tokens
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/x-www-form-urlencoded"
]);

$response = curl_exec($ch);
curl_close($ch);

$response_data = json_decode($response, true);

if (!isset($response_data['access_token'])) {
    die("Error refreshing token: " . $response);
}

// Update tokens in xero_tokens.json
$tokens['access_token'] = $response_data['access_token'];
$tokens['refresh_token'] = $response_data['refresh_token']; // Always update refresh_token

file_put_contents("xero_tokens.json", json_encode($tokens, JSON_PRETTY_PRINT));

echo "Xero access token refreshed successfully!";
?>
