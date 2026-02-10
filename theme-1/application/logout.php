<?php
	if(isset($_COOKIE["uid"])){
	    include("../include.php");
    	$sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into activity_log (date,uid,activity,detail,status,ip,tablename,recordid) VALUES ('$sysdate','".$_COOKIE["uid"]."','LOGOUT','Logout From Account. IP: <b>$ip</b>','1','$ip','sms_user2','".$_COOKIE["uid"]."')";
        if ($conn->query($sql1) === TRUE){
            $tomtom=0;
	        $userid=$_COOKIE["uid"];
    	    unset($userid);
    	    setcookie("uid", "", time() -3600);
        }
	}
	
            
?>
<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='0'><input type=hidden name='kroyee' value='0'></form>
<script language=JavaScript> document.main.submit(); </script>
                