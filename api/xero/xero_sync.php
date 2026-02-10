<?php
include '../../dbcon.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Read access token & tenant ID
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);
$access_token = $tokenData['access_token'] ?? null;
$tenant_id = $tenantData[0]['tenantId'] ?? null;

if (!$access_token || !$tenant_id) {
    die("❌ Error: Access Token or Tenant ID missing.");
}

// ✅ Manually set Payroll Calendar ID
$payrollCalendarID = "2063d4cd-2418-47ad-abf8-61eb3bc8ad07";
echo "✅ Using Payroll Calendar ID: $payrollCalendarID\n";

// Fetch Earnings Rate ID
function getEarningsRateID($access_token, $tenant_id) {
    echo "💰 Fetching Earnings Rate ID...\n";
    $url = "https://api.xero.com/payroll.xro/1.0/EarningsRates";

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

    if ($httpCode === 200) {
        $data = json_decode($response, true);
        if (isset($data['EarningsRates'][0]['EarningsRateID'])) {
            return $data['EarningsRates'][0]['EarningsRateID'];
        }
    }

    echo "❌ No Earnings Rate found. Using a dummy Earnings Rate ID.\n";
    return "00000000-0000-0000-0000-000000000000"; // ✅ Dummy Earnings Rate ID (Replace this if needed)
}

// Fetch Earnings Rate ID
$earningsRateID = getEarningsRateID($access_token, $tenant_id);
echo "✅ Earnings Rate ID: $earningsRateID\n";

// Fetch employee data from MySQL
$sql = "SELECT * FROM employees";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("❌ Database query failed: " . mysqli_error($conn));
}

// Generate CSV file
$csv_file = "xero_employees.csv";
$file = fopen($csv_file, "w");
fputcsv($file, ["First Name", "Last Name", "DOB", "Email", "Start Date", "Gender", "Job Title", "Employment Basis", "Address", "City", "State", "Postcode", "Phone"]);

$employees = [];

// Process Employees
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($file, [
        $row['FirstName'], $row['LastName'], $row['DateOfBirth'], $row['Email'], 
        $row['StartDate'], $row['Gender'], $row['JobTitle'], strtoupper($row['EmploymentBasis']), 
        $row['Address'], $row['TownCity'], $row['State'], $row['Postcode'], $row['PhoneNumber']
    ]);

    $employees[] = [
        "FirstName" => $row['FirstName'],
        "LastName" => $row['LastName'],
        "DateOfBirth" => date("Y-m-d", strtotime($row['DateOfBirth'])), // ✅ Ensure correct format
        "Email" => filter_var($row['Email'], FILTER_VALIDATE_EMAIL) ? $row['Email'] : "test@example.com",
        "StartDate" => date("Y-m-d", strtotime($row['StartDate'])), // ✅ Ensure correct format
        "Gender" => ($row['Gender'] === "Male") ? "M" : "F", // ✅ Fix gender formatting
        "PayrollCalendarID" => $payrollCalendarID, // ✅ Manually set Payroll Calendar ID
        "OrdinaryEarningsRateID" => $earningsRateID,
        
        // ✅ Add Home Address (Required by Xero API)
        "HomeAddress" => [
            "AddressLine1" => !empty($row['Address']) ? $row['Address'] : "123 Default Street",
            "City" => !empty($row['TownCity']) ? $row['TownCity'] : "Default City",
            "Region" => !empty($row['State']) ? $row['State'] : "NSW",
            "PostalCode" => !empty($row['Postcode']) ? $row['Postcode'] : "0000",
            "Country" => "AU" // Assuming Australia, update as needed
        ]
    ];
}

fclose($file);
echo "✅ CSV file generated successfully: <a href='xero_employees.csv' download>Download CSV</a>\n";

// ✅ Fix: Send Employees as an Array in One Request
$url = "https://api.xero.com/payroll.xro/1.0/Employees";

$json_data = json_encode($employees, JSON_PRETTY_PRINT); // 🔥 FIX: Remove "Employees" key

// Debugging: Print JSON before sending
echo "<pre>📤 JSON Sent to Xero:\n" . $json_data . "</pre>";

// Validate JSON Before Sending
if (json_last_error() !== JSON_ERROR_NONE) {
    die("❌ JSON Encoding Error: " . json_last_error_msg());
}

// Send Employee Data to Xero
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Xero-Tenant-Id: $tenant_id",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// ✅ Debugging: Print API response
if (curl_errno($ch)) {
    echo "❌ cURL Error: " . curl_error($ch) . "\n";
} else {
    echo "📤 API Response ($httpCode): $response\n";
}

curl_close($ch);
mysqli_close($conn);
?>
