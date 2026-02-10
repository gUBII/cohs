<?php
    
    include("../include.php");
    if(isset($_POST["unbox"]) AND isset($_POST["unpass"])){
        
        $sam=0;
        $s1 = "select * from sms_user2 where user_id='".$_POST["unbox"]."' and pass='".$_POST["unpass"]."' and status='1' order by id asc limit 1";
    	$r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            $sam=$rs1["unbox"];
    		$sah=$rs1["id"];
    		$utype=$rs1["mtype"];
    	} }
                	
        if($sam=="0"){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into activity_log (date,uid,activity,detail,status,ip,tablename,recordid) VALUES ('$sysdate','0','LOGIN','Failed Login try from IP: $ip with username as <b>".$_POST["unbox"]."</b> and password as <b>".$_POST["unpass"]."</b>  and Status is <b>REJECTED</b>','1','$ip','sms_user2','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<body style='background-color:orange;padding:5px'><div class='container-fluid p-0 h-100 position-relative bg-foreground'>
                <span style='font-size:12pt'><strong>SORRY!</strong></span><br><span style='font-size:10pt'>Wrong Login data. Please try again..</span><br><br>
            </div></body>";
        }else{
            if(isset($_COOKIE["uid"])){
                unset($uid);
                setcookie("uid", "", time() -99999);
            }
            setcookie("uid", $sah, time()+9999999);
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into activity_log (date,uid,activity,detail,status,ip,tablename,recordid) VALUES ('$sysdate','$sah','LOGIN','Successful Login from IP: $ip Status: <b>APPROVED</b>','1','$ip','sms_user2','$sah')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<body style='background-color:lightgreen;padding:5px'><div class='container-fluid p-0 h-100 position-relative bg-foreground'>
                <span style='font-size:12pt'><strong>Welcome Back!</strong></span><br><span style='font-size:10pt'>Loading Your Dashboard.</span><br><br>
            </div></body>
            <form method='POST' action='index.php' name='main' target='_top'>
                <input type=hidden name='smsbd' value='0'><input type=hidden name='kroyee' value='0'><input type=hidden name='sam' value='0'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
            
        }
    }
?>