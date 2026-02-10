<?php
/*
// cPanel API credentials
$cpanelHost = 'https://sg2plmcpnl487069.prod.sin2.secureserver.net:2083'; // cPanel URL, replace with your domain
$cpanelUser = 'o6gtjuthn6ia'; // Replace with your cPanel username
$apiToken = 'HR4QGC62J43LYMYAJXLQMSVM1ZLCXKKI'; // Replace with your cPanel API token

// Database details
$databaseName = 'saas_saasnew'; // Desired database name (will be prefixed with your cPanel username)
$dbUsername = 'saas'; // Desired database username (will be prefixed with your cPanel username)
$dbPassword = 'Bangladesh$$786'; // Desired database password

// cPanel API URL
$databaseApiUrl = $cpanelHost . "/execute/Mysql/create_database?name={$databaseName}";
$dbUserApiUrl = $cpanelHost . "/execute/Mysql/create_user?name={$dbUsername}&password={$dbPassword}";
$grantPrivilegesUrl = $cpanelHost . "/execute/Mysql/set_privileges_on_database?user={$dbUsername}&database={$databaseName}&privileges=ALL";

// Function to send API requests
function callCpanelApi($url, $cpanelUser, $apiToken) {
    $headers = [
        "Authorization: cpanel $cpanelUser:$apiToken",
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Create the database
$responseDatabase = callCpanelApi($databaseApiUrl, $cpanelUser, $apiToken);
if ($responseDatabase['status'] === 1) {
    echo "Database '{$databaseName}' created successfully.<br>";
} else {
    echo "Error creating database: " . $responseDatabase['errors'][0] . "<br>";
    exit;
}

// Create the database user
/*
$responseDbUser = callCpanelApi($dbUserApiUrl, $cpanelUser, $apiToken);
if ($responseDbUser['status'] === 1) {
    echo "Database user '{$dbUsername}' created successfully.<br>";
} else {
    echo "Error creating database user: " . $responseDbUser['errors'][0] . "<br>";
    exit;
}
*/

/*
// Grant privileges
$responseGrant = callCpanelApi($grantPrivilegesUrl, $cpanelUser, $apiToken);
if ($responseGrant['status'] === 1) {
    echo "Privileges granted to user '{$dbUsername}' on database '{$databaseName}'.<br>";
} else {
    echo "Error granting privileges: " . $responseGrant['errors'][0] . "<br>";
}
*/
?>
