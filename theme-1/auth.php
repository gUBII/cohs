<?php
	// error_reporting(0);
	include("include.php");
    if(isset($_SERVER["SERVER_NAME"])) $sh=$_SERVER["SERVER_NAME"]; else $sh=null;
    if(isset($_SERVER['REMOTE_ADDR'])) $ip=$_SERVER['REMOTE_ADDR']; else $ip=null;
	$fdate=time();

    if(isset($_POST["cPath"])) $cPath=$_POST["cPath"]; else $cPath = "134";
	if(isset($_POST["fphone"])) $fphone=$_POST["fphone"];
	if(isset($_POST["fpass"])) $fpass=$_POST["fpass"];

	if(isset($_POST["fphone"])){
		$uid=0;
		$sam=0;
		$s1 = "select * from sms_user2 where user_id='".$_POST["fphone"]."' and pass='".$_POST["fpass"]."' and status<>'4' order by id asc";
		$r1 = $conn->query($s1);
		if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
			$sam=$rs1["user_id"];
			$uid=$rs1["id"];
			$utype=$rs1["mtype"];
		} }
		
		if($sam=="0"){
			echo"<script>alert('Sorry! Account Not Found.')</script> ";
		}else{
			unset($userid);
			unset($track);
			setcookie("userid", "", time() -99999);
			setcookie("track", "", time() -99999);
			
			setcookie("userid", $sam, time()+9999999);
			setcookie("track", $uid, time()+9999999);
			echo"<form method='GET' action='index.php' name='main' target='_top'>";
				if(isset($_POST["lid"])){
					echo"<input type=hidden name='cPath' value='80000'>
					<input type=hidden name='lid' value='4'>";
				}else{
					echo"<input type=hidden name='cPath' value='134'>";
				}
			echo"</form>";
			?> <script language=JavaScript> document.main.submit(); </script> <?php
		}
	}
	
	if(isset($_POST["actype"])){			
		$uid=0;
		$sam=0;
		$s1 = "select * from sms_user2 where user_id='".$_POST["phone"]."' order by id asc limit 1";
		$r1 = $conn->query($s1);
		if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $sam=$rs1["user_id"]; } }
		
		if($sam==0){
			if($_POST["actype"]==1){
				$mtype="CUSTOMER";
				$actype="CUSTOMER";
			}
			if($_POST["actype"]==2){
				$mtype="VENDER";
				$actype="VENDER";
			}
			if($_POST["password"]==$_POST["repassword"]){
				$sql = "insert into sms_user2 (name,name2,email,phone,user_id,pass,date,status,mtype,actype,sname,address,sphone)  
				VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["phone"]."','".$_POST["password"]."','$fdate','1','$mtype','$actype','".$_POST["sname"]."','".$_POST["saddress"]."','".$_POST["sphone"]."')";
				if ($conn->query($sql) === TRUE) echo"<script>alert('$actype Account Registration Successfully Completed.')</script>";
				$s2 = "select * from sms_user2 where user_id='".$_POST["phone"]."' order by id desc limit 1";
				$r2 = $conn->query($s2);
				if ($r2->num_rows > 0) { while($rs2 = $r2->fetch_assoc()) {
					$sam=$rs2["user_id"];
					$uid=$rs2["id"];
				} }
				setcookie("userid", $sam, time()+9999999);
				setcookie("track", $uid, time()+9999999);
				echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='cPath' value='$cPath'></form>";
				?> <script language=JavaScript> document.main.submit(); </script> <?php
			}else{
				echo"<script>alert('Sorry! Password and Confirm Password not Matching. Please use same password in both password field.')</script> ";
			}
		}else{
			echo"<script>alert('Sorry! This Phone Number is already Used. Please use another Phone.')</script> ";
		}
	}

	if(isset($_POST["actype2"])){
		$uid=0;
		$sam=0;
		$s1 = "select * from sms_user2 where user_id='".$_POST["phone"]."' order by id asc limit 1";
		$r1 = $conn->query($s1);
		if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $sam=$rs1["user_id"]; } }
		
		if($sam==0){
			$mtype="VENDER";
			$actype="VENDER";
			if($_POST["password"]==$_POST["repassword"]){
				$sql = "insert into sms_user2 (name,name2,email,phone,user_id,pass,date,status,mtype,actype,sname,address,phone,city,state,zip,country)  
				VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["phone"]."','".$_POST["password"]."','$fdate','1','$mtype','$actype','".$_POST["sname"]."','".$_POST["saddress"]."','".$_POST["sphone"]."','".$_POST["scity"]."','".$_POST["sstate"]."','".$_POST["szip"]."','".$_POST["scountry"]."')";
				if ($conn->query($sql) === TRUE) echo"<script>alert('$actype Account Registration Successfully Completed.')</script>";
				$s2 = "select * from sms_user2 where user_id='".$_POST["phone"]."' order by id desc limit 1";
				$r2 = $conn->query($s2);
				if ($r2->num_rows > 0) { while($rs2 = $r2->fetch_assoc()) {
					$sam=$rs2["user_id"];
					$uid=$rs2["id"];
				} }
				setcookie("userid", $sam, time()+9999999);
				setcookie("track", $uid, time()+9999999);
				echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='cPath' value='$cPath'></form>";
				?> <script language=JavaScript> document.main.submit(); </script> <?php
			}else{
				echo"<script>alert('Sorry! Password and Confirm Password not Matching. Please use same password in both password field.')</script> ";
			}
		}else{
			echo"<script>alert('Sorry! This Phone Number is already Used. Please use another Phone.')</script> ";
		}
	}

	if(isset($_POST["rphone"])){		
		$uid=0;
		$sam=0;
		$s1 = "select * from sms_user2 where user_id='".$_POST["rphone"]."' and email='".$_POST["remail"]."' and status<>'4' order by id asc";
		$r1 = $conn->query($s1);
		if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
			$sam=$rs1["id"];
			$rname="".$rs1["name"]." ".$rs1["name2"]."";
		} }
		
		if($sam=="0"){
			echo"<script>alert('Sorry! Account Not Found.')</script> ";
		}else{
			setcookie("resetcode", $fdate, time()+9999999);

			echo"<form method='POST' action='email_manager.php' name='main' target='_top'>
				<input type=hidden name='remail' value='".$_POST["remail"]."'>
				<input type=hidden name='rname' value='".$_POST["rname"]."'>
				<input type=hidden name='rsubject' value='Password Reset Request from IP address: $ip'>
				<input type=hidden name='rdetail' value=\"Your Password Reset Link <a href='https://$sh/reset.php?tokenid=$sam-$fdate'>Click Here</a> . to reset you password. \">
			</form>";
			?> <script language=JavaScript> document.main.submit(); </script> <?php
		}
	}
?>