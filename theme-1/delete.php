<?php
    
	error_reporting(0);
	include('include.php');
	
	if(isset($_GET["cartid"])){
	    $sql="delete from sms_cart where id='".$_GET["cartid"]."'";
    	if ($conn->query($sql) === TRUE) $tomtom=0;
        else echo"Error updating record: ". $conn->error;
	}
	
	if(isset($_GET["cartid2"])){
	    $sql="delete from sms_wishlist where id='".$_GET["cartid2"]."'";
    	if ($conn->query($sql) === TRUE){
    	    echo"<script>alert('Record successfully removed from your list.')</script>";
    	    echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name=cPath value='1300'></form></body>";
		    ?><script language=JavaScript> document.main.submit(); </script><?php
    	} else echo"Error updating record: ". $conn->error;
	}
	
	if(isset($_GET["compareid"])){
	    $sql="delete from sms_compare where id='".$_GET["compareid"]."'";
    	if ($conn->query($sql) === TRUE) $tomtom=0;
        else echo"Error updating record: ". $conn->error;
	}
	
	if(isset($_GET["favouriteid"])){
	    $sql="delete from sms_favourite where id='".$_GET["favouriteid"]."'";
    	if ($conn->query($sql) === TRUE) $tomtom=0;
        else echo"Error updating record: ". $conn->error;
	}
?>