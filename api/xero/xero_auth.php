<?php
// Xero API credentials (replace with your actual credentials)
$client_id = "5993E4516A9C4E57B872D21048E00023";
$client_secret = "vBPkRZNKqO61DdpUg0TkEDp4ro2nsoIeFBsjTMLsMQvNdj4H";
$redirect_uri = "https://nexis365.com/xero/xero_auth.php"; // Must match the redirect URI in Xero Developer Portal

// Step 1: Redirect user to Xero for authentication
if (!isset($_GET['code'])) {
    $auth_url = "https://login.xero.com/identity/connect/authorize?"
        . "response_type=code"
        . "&client_id=$client_id"
        . "&redirect_uri=" . urlencode($redirect_uri)
        . "&scope=openid profile email accounting.transactions accounting.contacts payroll.employees offline_access payroll.employees read payroll.employees write"
        . "&state=12345"; // State is optional for security

    header("Location: $auth_url");
    exit();
}

// Step 2: Handle the callback and exchange authorization code for access token
$code = $_GET['code'];

$url = "https://identity.xero.com/connect/token";
$data = [
    "grant_type" => "authorization_code",
    "code" => $code,
    "redirect_uri" => $redirect_uri,
    "client_id" => $client_id,
    "client_secret" => $client_secret
];

// Make request to get access token
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
    die("Failed to get access token: " . $response);
}

// Extract tokens
$access_token = $response_data['access_token'];
$refresh_token = $response_data['refresh_token'];

// Step 3: Fetch Tenant ID
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.xero.com/connections");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Content-Type: application/json",
    "Accept: application/json"
]);

$tenant_response = curl_exec($ch);
curl_close($ch);
$tenant_data = json_decode($tenant_response, true);

if (empty($tenant_data)) {
    die("Failed to fetch tenant ID: " . $tenant_response);
}

$tenant_id = $tenant_data[0]['tenantId'];

// Save tokens in a JSON file
$token_data = [
    "access_token" => $access_token,
    "refresh_token" => $refresh_token,
    "tenant_id" => $tenant_id
];

file_put_contents("xero_tokens.json", json_encode($token_data, JSON_PRETTY_PRINT));

echo "Tokens saved successfully!";
?>
