<?php

// Load the latest access token
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$access_token = $tokenData['access_token'];

// Load the latest tenant ID
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);
$tenant_id = $tenantData[0]['tenantId']; // Get the first Tenant ID

// Xero Payroll API endpoint for Payroll Calendars
$url = "https://api.xero.com/payroll.xro/1.0/PayrollCalendars"; // Use payroll.uk for UK

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Xero-Tenant-Id: $tenant_id",
    "Accept: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

// Decode the response
$payrollCalendars = json_decode($response, true);

// Display the Payroll Calendar data
if (isset($payrollCalendars['PayrollCalendars'])) {
    echo "✅ Payroll Calendars Retrieved Successfully!<hr>";
    foreach ($payrollCalendars['PayrollCalendars'] as $calendar) {
        echo "PayrollCalendarID: " . $calendar['PayrollCalendarID'] . "<br>";
        echo "Name: " . $calendar['Name'] . "<br>";
        echo "Start Date: " . $calendar['StartDate'] . "<br>";
        echo "Payment Date: " . $calendar['PaymentDate'] . "<br><hr>";
    }
} else {
    echo "❌ Error fetching Payroll Calendars: ";
    print_r($payrollCalendars);
}

?>
