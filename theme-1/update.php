<?php
	include("include.php");
	if(isset($_REQUEST["cartid"])) $cartid=$_REQUEST["cartid"];
	if(isset($_REQUEST["qty"])) $qty=$_REQUEST["qty"];
	if(isset($_REQUEST["nqty"])) $nqty=$_REQUEST["nqty"];
	// echo"<script>alert('$cartid')</script>";
	if(isset($cartid)){
	    $sql="update sms_cart set qty='$nqty' where id='$cartid'";
		if ($conn->query($sql) === TRUE) $tomtom=0;
        else echo"Error updating record: ". $conn->error;
	}
?>
