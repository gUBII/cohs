<?php
// Twilio credentials
$accountSid = 'ACace0beee09a9d621dc6b80baa3c679cf';
$authToken  = '8bfe75fa6496e4c5ea7eaa495d1ffc67';
$twilioNumber = '+61340597623'; // Your Twilio Number

// Get number from POST
$toNumber = $_POST['toNumber'] ?? '';

if (empty($toNumber)) {
    echo "❌ Error: No destination number provided.";
    exit;
}

$twimlUrl = 'https://fufoon.com/tools/call/twiml.xml';

$url = "https://api.twilio.com/2010-04-01/Accounts/{$accountSid}/Calls.json";

$data = http_build_query([
    'From' => $twilioNumber,
    'To' => $toNumber,
    'Url' => $twimlUrl
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_USERPWD, "$accountSid:$authToken");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded'
]);

$response = curl_exec($ch);

if ($response === false) {
    echo "❌ cURL Error: " . curl_error($ch);
} else {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "✅ HTTP Status Code: $httpCode\n";
    echo "📨 Twilio Response:\n$response\n";
}

curl_close($ch);
?>
