<?php
	error_reporting(0);
	include('include.php');
	if(isset($_COOKIE['userid'])) $userid=$_COOKIE['userid'];
	if(isset($_COOKIE['track'])) $track=$_COOKIE['track'];
	$t=0;
    // $c1 = "select * from sms_compare where cid='$track' and status='1' order by id asc";
    $c1 = "select * from sms_compare where status='1' order by id asc";
    $d1 = $conn->query($c1);
	if ($d1->num_rows > 0) { while($cs1 = $d1->fetch_assoc()) { $t=($t+1); } }
	echo"$t";
?>
