<?php

$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);

$access_token = $tokenData['access_token'];
$tenant_id = $tenantData[0]['tenantId'];
$payroll_calendar_id = "e9f9a905-f24b-42fb-a5fc-5fde2810413e";
$url = "https://api.xero.com/payroll.xro/1.0/PayRuns";

$data = [
    "PayRun" => [
        "PayrollCalendarID" => $payroll_calendar_id,
        "PayRunPeriodEndDate" => date("Y-m-d"), // Today's date
        "PayRunStatus" => "DRAFT"
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer " . $access_token,
    "Accept: application/json",
    "Content-Type: application/json",
    "Xero-tenant-id: " . $tenant_id
]);

$response = curl_exec($ch);
curl_close($ch);

// Check if there was an error in the response
$response_data = json_decode($response, true);

if (isset($response_data['ErrorCode'])) {
    // If error exists, output the error details
    echo "<pre>Error: " . htmlspecialchars($response) . "</pre>";
} else {
    // If no error, output success message
    echo "Payment processed successfully!\n";
    // Optionally echo more info from the response
    // echo "PayRun ID: " . $response_data['PayRun']['PayRunID'];
}

?>
