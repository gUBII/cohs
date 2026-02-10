<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$year = $_POST['year'];
		$section = $_POST['section'];
		
		mysqli_query($conn, "INSERT INTO `student` VALUES('', '$firstname', '$lastname', '$year', '$section')") or die(mysqli_error());
		
		header("location: index.php");
	}
?>