<?php
// Database connection settings
$host = "localhost";
$user = "saas";
$pass = "Bangladesh$$786";
$dbname = "saas_zahid_cse13_gmail_com";

// Connect to MySQL
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
