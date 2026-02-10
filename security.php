<?php
    echo"<!DOCTYPE html>
    <html lang='en'>
        <body style='padding:0px;background-color:#000000;text-align:right'>";
        
        include('include_main.php');
        
        if(isset($_POST["captcha"])) $captcha=$_POST["captcha"];
        if(isset($_POST["uemail"])) $uemail=$_POST["uemail"];    
        if(isset($_POST["upass1"])) $upass1=$_POST["upass1"];
        if(isset($_POST["upass2"])) $upass2=$_POST["upass2"];
        if(isset($_POST["uotp"])) $uotp=$_POST["uotp"];
        if(isset($_POST["emailx"])) $emailx=$_POST["emailx"];
        $currentpassword=md5($_POST["upass"]);
        
        include('head-light.php');
        
        $udate=time();	
        $uidv=0;
        $samv=0;
        $utype=0;
        $uemailv=0;
        
        
        if(isset($_POST["uid"]) && isset($_POST["upass"])){
            
            // checking user on server's main database
        	$s1 = "select * from uerp_user where unbox='".$_POST["uid"]."' and passbox='$currentpassword' and status<>'10' order by id desc limit 1";
        	$r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $samv=$rs1["unbox"];
        		$uidv=$rs1["id"];
        		$utype=$rs1["mtype"];
                $dbname=$rs1['ref_db'];
                $ref_folder=$rs1['ref_folder'];
        	} }
            
            if($dbname!="saas_ndisadmin_cohs_com_au"){
                
                echo"<form method='post' action='../saas/security.php' name='main' target='_top'>
                    <input type=hidden name='redirect_server' value='cohs'>
                    <input type=hidden name='uid' value='".$_POST["uid"]."'>
                    <input type=hidden name='upass' value='".$_POST["upass"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php

            } else {

                if($samv=="0"){
                    echo"<p id='' style='font-size:15pt;color:orange'>
                        Sorry! Account Not Found<br><span style='font-size:10pt;color:white'>Wrong Login data. Please try again..</span>
                    </p><br><br>";
                }else{
                    
                    // checking user on client's main database.
                    $samz="0";
                    $connx = new mysqli('localhost', 'saas', 'Bangladesh$$786', $dbname);
                    if ($connx->connect_error) die("Connection failed: " . $connx->connect_error);
                    $s1x = "select * from uerp_user where unbox='".$_POST["uid"]."' and passbox='$currentpassword' and status<>'10' order by id asc limit 1";
                    $r1x = $connx->query($s1x);
                    if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                        $samz=$rs1x["unbox"];
                        $uidv=$rs1x["id"];
                        $utype=$rs1x["mtype"];
                    } }
                    if($samz=="0"){
                        echo"<p id='' style='font-size:15pt;color:orange'>
                            Sorry! Account Not Found<br><span style='font-size:10pt;color:white'>Wrong Login data. Please try again..</span>
                        </p><br><br>";
                    }else{
                        echo"<p id='blink_text' style='font-size:15pt;color:white'>
                            Welcome Back!<br><span style='font-size:10pt'>Importing & Loading Data. Just a second...</span>
                        </p>
                        <form method='POST' action='cookie.php' name='main' target='_self'>
                            <input type=hidden name='uid' value='$uidv'>
                            <input type=hidden name='utype' value='$utype'>
                            <input type=hidden name='samv' value='$samv'>
                            <input type=hidden name='dbname' value='$dbname'>
                        </form>";
                        ?> <script language=JavaScript> document.main.submit(); </script> <?php
                    }
                }
            }
        }
        
        if(!isset($_POST["remail"]) && isset($_POST["uemail"])){
            
            // checking user on server's main database
        	$s1 = "select * from uerp_user where unbox='".$_POST["uemail"]."' and status<>'10' order by id desc limit 1";
        	$r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $samv=$rs1["unbox"];
        		$uidv=$rs1["id"];
        		$utype=$rs1["mtype"];
                $dbname=$rs1['ref_db'];
        	} }
                    	
            if($samv=="0"){
                echo"<p id='' style='font-size:15pt;color:orange'>
                    Sorry! Account Not Found<br><span style='font-size:10pt;color:white'>Unregistered Email Address. Please try again..</span>
                </p><br><br>";
            }else{
                
                // checking user on client's main database.
                $samz="0";
                $connx = new mysqli('localhost', 'saas', 'Bangladesh$$786', $dbname);
                if ($connx->connect_error) die("Connection failed: " . $connx->connect_error);
                $s1x = "select * from uerp_user where unbox='".$_POST["uemail"]."' status<>'10' order by id asc limit 1";
                $r1x = $connx->query($s1x);
                if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                    $samz=$rs1x["unbox"];
                    $uidv=$rs1x["id"];
                    $utype=$rs1x["mtype"];
                } }
                if($samz=="0"){
                    echo"<p id='' style='font-size:15pt;color:orange'>
                        Sorry! Account Not Found<br><span style='font-size:10pt;color:white'>Unregistered Email Address. Please try again..</span>
                    </p><br><br>";
                }else{
                    echo"<p id='blink_text' style='font-size:15pt;color:white'>
                        Email Sent.<br><span style='font-size:10pt'>Please check your email address and reset it using the link give at your email.</span>
                    </p><br><br>
                    <form method='POST' action='login.php' name='main' target='_self'><input type=hidden name='uemail' value='".$_POST["uemail"]."'></form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }
    
        }
        
        if(isset($_POST["remail"]) && isset($_POST["rotp"])){
            
            $remail=$_POST["remail"];
            $rfname=$_POST["firstName"];
            $rlname=$_POST["lastName"];
            $rotp=$_POST["rotp"];
            $sourcefrom=$_POST["sourcefrom"];
            
            $rdate=time();	
            $ridv="0";
            $samv="0";
            $rtype="0";
            $remailv="0";
            $s1 = "select * from uerp_user where unbox='$remail' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $samv=$rs1["unbox"];
                $ridv=$rs1["id"];
                $rtype=$rs1["mtype"];
            } }
            
            if($samv!="0"){
                echo"<p id='' style='font-size:15pt;color:orange'>
                    Sorry! Already Used.<br><span style='font-size:10pt;color:white'>This Email is already used.</span>
                </p><br><br>";
            }else{
                echo"<p id='' style='font-size:10pt;color:lightgreen'>Installing Data, Please wait a while...<br>
                    <div class='progress progress-xl'>
                        <div style='width:90%;padding:500px' class='progress-bar progress-bar-striped progress-bar-animated bg-danger' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' ></div>
                    </div>
                </div>";
    
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $logtime=time();
                $logip=$ip;
    
                echo"<form method='POST' action='cookie.php' name='main' target='_self'>
                    <input type=hidden name='uemail' value='".$_POST["remail"]."'>
                    <input type=hidden name='ufname' value='".$_POST["firstName"]."'>
                    <input type=hidden name='ulname' value='".$_POST["lastName"]."'>
                    <input type=hidden name='logtime' value='$logtime'>
                    <input type=hidden name='logip' value='$logip'>
                    <input type='hidden' name='sourcefrom' value='$sourcefrom'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
    
            }
    
        }
        
        // ACCOUNT RECOVERY
        if(isset($_POST["femail"]) && isset($_POST["fphone"])){
            
            // checking user on server's main database
        	$s1 = "select * from uerp_user where unbox='".$_POST["femail"]."' and phone='".$_POST["fphone"]."' and status<>'10' order by id desc limit 1";
        	$r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $samv=$rs1["unbox"];
        		$uidv=$rs1["id"];
        		$utype=$rs1["mtype"];
                $dbname=$rs1['ref_db'];
        	} }
                    	
            if($samv=="0"){
                echo"<p id='' style='font-size:15pt;color:orange'>
                    Sorry! Account Not Found<br><span style='font-size:10pt;color:white'>Wrong Recovery data. Please try again..</span>
                </p><br><br>";
            }else{
                
                // checking user on client's main database.
                $samz="0";
                $connx = new mysqli('localhost', 'saas', 'Bangladesh$$786', $dbname);
                if ($connx->connect_error) die("Connection failed: " . $connx->connect_error);
                $s1x = "select * from uerp_user where unbox='".$_POST["femail"]."' and phone='".$_POST["fphone"]."' and status<>'10' order by id asc limit 1";
                $r1x = $connx->query($s1x);
                if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                    $samz=$rs1x["unbox"];
                    $uidv=$rs1x["id"];
                    $receivername="".$rs1x["username"]." ".$rs1x["username2"]."";
                    $receiveremail=$rs1x["email"];
                } }
                
                if($samz=="0"){
                    echo"<p id='' style='font-size:15pt;color:orange'>Sorry! Account Not Found<br><span style='font-size:10pt;color:white'>Wrong Recovery data. Please try again..</span></p><br><br>";
                }else{
                    echo"<p id='blink_text' style='font-size:15pt;color:white'>Account Verified!<br><span style='font-size:10pt'>Creating Recovery Link & Sending Email.</span></p>
                    <iframe name='processor' src='email-auth.php?rx=$randid&reml=$receiveremail&rnm=$receivername&rid=$uidv&dbn=$dbname' height='10' width='10' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>";
                }
            }
        }
        
        // ACCOUNT RECOVERY CONFIRMATION
        if(isset($_POST["fotp"]) && isset($_POST["npass"]) && isset($_POST["cpass"])){
               
            $fotp=md5($_POST["fotp"]);
            
            if($fotp==$_COOKIE["vcode"]){
                if($_POST["npass"]==$_POST["cpass"]){
                    echo"<p id='blink_text' style='font-size:15pt;color:white'>
                        Reset Successful!<br><span style='font-size:10pt'>Redirecting to Login Page...</span>
                    </p>";
                    
                    //saving to client database
                    $dbname=$_COOKIE["dbn"];
                    $rpass=md5($_POST["npass"]);
                    $connx = new mysqli('localhost', 'saas', 'Bangladesh$$786', $dbname);
                    if ($connx->connect_error) die("Connection failed: " . $connx->connect_error);
                    $sqlx="update uerp_user set passbox='$rpass' where id='".$_COOKIE["rid"]."'";
                    if ($connx->query($sqlx) === TRUE) $tomtom=0;
                    
                    // saving to main database
                    $sqly="update uerp_user set passbox='$rpass' where email='".$_COOKIE["emailid"]."' and ref_db='$dbname'";
                    if ($conn->query($sqly) === TRUE) echo"<script>alert('User Data Updated...')</script>";
                        
                    echo"<form method='post' action='login.php' name='main' target='_top'><input type=hidden name='message' value='Welcome Back'></form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                	
                }else{
                    echo"<p id='' style='font-size:15pt;color:orange'>Sorry! Wrong Data<br><span style='font-size:10pt;color:white'>New & Confirm Password must be Same.</span></p>
                    <br><br>";
                }
            }else{
                echo"<p id='' style='font-size:15pt;color:orange'>";
                // Sorry! Wrong Recovery Code.<br><span style='font-size:10pt;color:white'>Check Email & Proceed with Correct CODE.</span></p>
                echo"$fotp<BR>
                ".$_COOKIE["vcode"]."
                <br><br>";
            }
        }
        // fotp,npass,cpass
         
         
         
        include('scripts-light.php');
            
    echo"</html>";
?>