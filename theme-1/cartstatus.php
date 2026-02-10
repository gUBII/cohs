<?php
	error_reporting(0);
	include('include.php');
	if(isset($_COOKIE["track"])) $userid=$_COOKIE["track"]; else $userid=$_COOKIE["guestid"];
	$t=0;
    $c1 = "select * from sms_cart where cid='$userid' and status='0' order by id asc";
    // $c1 = "select * from sms_cart where status='0' order by id asc";
    $d1 = $conn->query($c1);
	if ($d1->num_rows > 0) { while($cs1 = $d1->fetch_assoc()) { $t=($t+1); } }
	echo"$t";
?>
