<?php
function getXeroTokens() {
    $file = "xero_tokens.json";

    if (!file_exists($file)) {
        die("Token file not found! Run xero_auth.php first.");
    }

    $json_data = file_get_contents($file);
    $tokens = json_decode($json_data, true);

    if (!isset($tokens['access_token']) || !isset($tokens['tenant_id'])) {
        die("Invalid token data! Run xero_auth.php again.");
    }

    return $tokens;
}

// Usage Example:
$tokens = getXeroTokens();
echo "Access Token: " . $tokens['access_token'] . "\n";
echo "Tenant ID: " . $tokens['tenant_id'] . "\n";
?>
