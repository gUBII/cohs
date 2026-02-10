<?php
// Xero App Credentials
$client_id = "F10FA16F6C2542D0A1CA72102A005F9C";
$redirect_uri = "https://stylevista.online/saas/callback.php"; // Redirect back to the same page

// Xero Scopes
$scope = "openid profile email accounting.transactions payroll.employees payroll.payruns";

// Encode Redirect URI
$redirect_uri_encoded = urlencode($redirect_uri);

// Construct Authorization URL
$auth_url = "https://login.xero.com/identity/connect/authorize?" .
    "response_type=code&" .
    "client_id=$client_id&" .
    "redirect_uri=$redirect_uri_encoded&" .
    "scope=" . urlencode($scope);

// Check if the authorization code is returned
if (isset($_GET['code'])) {
    $authorization_code = $_GET['code'];

    // Save the authorization code for later use
    file_put_contents("authorization_code.txt", $authorization_code);

    // Display the authorization code
    echo "<h2>✅ Authorization Code Retrieved Successfully:</h2>";
    echo "<pre><strong>$authorization_code</strong></pre>";

} else {
    // Redirect to Xero Login
    header("Location: $auth_url");
    exit;
}
?>
