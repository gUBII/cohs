<?php

// Database credentials
$host = "localhost"; // Change if necessary
$dbname = "cloudderaone_xero"; // Change to your database name
$username = "cloudderaone_xero"; // Change to your database username
$password = "Dhaka$321Dhaka$321"; // Change to your database password

// Xero API credentials
$tokenData = json_decode(file_get_contents("access_token.json"), true);
$tenantData = json_decode(file_get_contents("tenant_id.json"), true);

$access_token = $tokenData['access_token'];
$tenant_id = $tenantData[0]['tenantId']; // Extract Tenant ID

// Xero API endpoint for Employees
$xero_url = "https://api.xero.com/payroll.xro/2.0/Employees";

// Connect to MySQL using raw PHP
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch employees from the database
$sql = "SELECT first_name, last_name, email, date_of_birth, gender, start_date FROM employees";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Prepare employee data for Xero
        $employee_data = [
            "FirstName" => $row["first_name"],
            "LastName" => $row["last_name"],
            "Email" => $row["email"],
            "DateOfBirth" => $row["date_of_birth"],
            "Gender" => ucfirst($row["gender"]), // Convert to "Male"/"Female"
            "StartDate" => $row["start_date"]
        ];

        // Convert data to JSON
        $json_data = json_encode(["Employees" => [$employee_data]]);

        // Send employee data to Xero
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $xero_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $access_token",
            "Xero-Tenant-Id: $tenant_id",
            "Content-Type: application/json",
            "Accept: application/json"
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Debugging response
        echo "<pre>HTTP Status Code: " . $http_code . "\nResponse: " . htmlspecialchars($response) . "</pre>";
    }
} else {
    echo "No employees found in the database.";
}

// Close MySQL connection
mysqli_close($conn);

?>
