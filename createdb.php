<?php
include('include.php');
$randx=time();
$username="somalian_$randx";

// Create database
$sql = "CREATE DATABASE $username";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    
    $connx = new mysqli('localhost', 'rootuser', 'Bangladesh$$786', "$username");
    $query = '';
    $sqlScript = file('nexis_saas_p1.sql');
    foreach ($sqlScript as $line)	{
	    $startWith = substr(trim($line), 0 ,2);
	    $endWith = substr(trim($line), -1 ,1);
	
	    if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
		    continue;
	    }
		
	    $query = $query . $line;
	    if ($endWith == ';') {
		    mysqli_query($connx,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
		    $query= '';		
	    }
    }
    echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';

} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>