<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    include('include.php');
 
    $dbnamex=$_COOKIE['dbname'];
    
    if($_POST["processor"]=="personalimage"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/users/' . $newFilename);
            $location = 'media/users/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql="update uerp_user set username='".$_POST["fname"]."',username2='".$_POST["lname"]."',images='$location' where id='".$_COOKIE["userid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Profile Picture Uploaded Successfully..')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE PICTURE','0','$sysdate','$ip','1','Changed profile picture and user name','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql="update uerp_user set username='".$_POST["fname"]."',username2='".$_POST["lname"]."' where id='".$_COOKIE["userid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Profile Data Updated Successfully..')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE DATA','0','$sysdate','$ip','1','Changed profile username','0','".$_COOKIE["userid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    }
    
    if($_POST["processor"]=="createprojecttype"){
        $name = str_replace("'", "`", $_POST["name"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $sql = "insert into project_type (name,location,type,note,status) 
        VALUES ('$name','".$_POST["location"]."','".$_POST["type"]."','$note','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Record Saved')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','".$_POST["type"]." DATA','0','$sysdate','$ip','1','Added New ".$_POST["nationality"]." as $name','0','".$_COOKIE["userid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
    }
    
    if($_POST["processor"]=="updateprojectemergency"){
        $main_emergency_contact = str_replace("'", "`", $_POST["main_emergency_contact"]);
        $enduring_power_of_attorney = str_replace("'", "`", $_POST["enduring_power_of_attorney"]);
        $gp_details = str_replace("'", "`", $_POST["gp_details"]);
        $medical_information = str_replace("'", "`", $_POST["medical_information"]);
        $access_data = str_replace("'", "`", $_POST["access_data"]);
        $advance_care_plan = str_replace("'", "`", $_POST["advance_care_plan"]);
        
        $sql="update project set main_emergency_contact='$main_emergency_contact',enduring_power_of_attorney='$enduring_power_of_attorney',gp_details='$gp_details',medical_information='$medical_information',access_data='$access_data',advance_care_plan='$advance_care_plan' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Record Updated')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','UPDATE PROJECT EMERGENCY DATA','0','$sysdate','$ip','1','Updated Project data','".$_POST["id"]."','".$_COOKIE["userid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
    }
    
    if($_POST["processor"]=="updateprojecttype"){
        $name = str_replace("'", "`", $_POST["name"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $sql="update project_type set name='$name',location='".$_POST["location"]."',type='".$_POST["type"]."',note='$note' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Record Updated')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','UPDATE ".$_POST["type"]." DATA','0','$sysdate','$ip','1','Updated ".$_POST["nationality"]." - $name','".$_POST["id"]."','".$_COOKIE["userid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
    }
    
    if($_POST["processor"]=="personalinformation"){
        $expiredate=strtotime($_POST["expiredate"]);
        
        // passport='".$_POST["passport"]."',passport_expire_date='".$_POST["expiredate"]."',child='".$_POST["child"]."',religion='".$_POST["religion"]."'
        $sql="update uerp_user set nationality='".$_POST["nationality"]."',marital_status='".$_POST["maritalstatus"]."',
        driving_licence_no='".$_POST["driving_licence_no"]."' where id='".$_COOKIE["userid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE DATA','0','$sysdate','$ip','1','Changed profile personal information','0','".$_COOKIE["userid"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="emergencyperson"){
        $sql="update uerp_user set emergency_contact_1='".$_POST["ec1"]."',emergency_relation_1='".$_POST["er1"]."',emergency_phone_1='".$_POST["ep1"]."',emergency_email_1='".$_POST["ee1"]."',emergency_contact_2='".$_POST["ec2"]."',emergency_relation_2='".$_POST["er2"]."',emergency_phone_2='".$_POST["ep2"]."',emergency_email_2='".$_POST["ee2"]."' where id='".$_COOKIE["userid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="updateprojectsupportplan"){
        
        $address2 = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['address2'])));
        $summary = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['summary'])));
        $goal_1 = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['goal_1'])));
        $goal_2 = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['goal_2'])));
        $goal_3 = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['goal_3'])));
        $service_authorized_to_commerce=strtotime($_POST["service_authorized_to_commerce"]);
        $plan_review_date=strtotime($_POST["plan_review_date"]);
        $plan_start_date=strtotime($_POST["plan_start_date"]);
        
        $sql="update project set summary='$summary',start_date1='$plan_start_date',address2='$address2',goal_1='$goal_1',goal_2='$goal_2',goal_3='$goal_3',
        package_level='".$_POST["package_level"]."',end_date1='$plan_review_date',service_authorized_to_commerce='$service_authorized_to_commerce' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE)  echo"<script>alert('Record Updated')</script>";    
        
    }
    
    if($_POST["processor"]=="aboutinformation"){
        $dob=strtotime($_POST["dob"]);
        $sql="update uerp_user set aboutme='".$_POST["about"]."',address='".$_POST["address"]."',address2='".$_POST["address2"]."',city='".$_POST["city"]."',
        area='".$_POST["state"]."',zip='".$_POST["zip"]."',country='".$_POST["country"]."',phone='".$_POST["phone"]."',email='".$_POST["email"]."',
        gender='".$_POST["gender"]."',dob='$dob',abn='".$_POST["abn"]."',bank_name='".$_POST["bank_name"]."',account_name='".$_POST["account_name"]."',
        account_number='".$_POST["account_number"]."',bsb='".$_POST["bsb"]."' where id='".$_COOKIE["userid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE DATA','0','$sysdate','$ip','1','Changed profile about information','0','".$_COOKIE["userid"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="myexperience"){
        $periodfrom=strtotime($_POST["periodfrom"]);
        $periodto=strtotime($_POST["periodto"]);
        $sql = "insert into experience_data (employeeid,company,location,job_position,period_from,period_to) VALUES ('".$_COOKIE["userid"]."','".$_POST["company"]."','".$_POST["location"]."','".$_POST["jobposition"]."','$periodfrom','$periodto')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE DATA','0','$sysdate','$ip','1','Added New Experience in his profile','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="myeducation"){
        $starting=strtotime($_POST["starting"]);
        $completed=strtotime($_POST["completed"]);
        $sql = "insert into education_data (employeeid,institution,subject,fromdate,todate,degree,grade) VALUES ('".$_COOKIE["userid"]."','".$_POST["institution"]."','".$_POST["subject"]."','$starting','$completed','".$_POST["degree"]."','".$_POST["grade"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE DATA','0','$sysdate','$ip','1','Added New Education in his profile','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="myfamily"){
        $dob=strtotime($_POST["dob"]);
        $sql = "insert into family_data (employeeid,name,relationship,dob,phone,email,address) VALUES ('".$_COOKIE["userid"]."','".$_POST["name"]."','".$_POST["relationship"]."','$dob','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["address"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('record Saved')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE DATA','0','$sysdate','$ip','1','Added New Family Data in his profile','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="updatepassword"){
        $sam=0;
        $s1 = "select * from uerp_user where id='".$_COOKIE["userid"]."' and passbox='".$_POST["cp"]."' and status<>'0' order by id asc";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $sam=$rs1["unbox"]; } }
        if($sam!="0"){
            if($_POST["np"]==$_POST["np2"]){
                $sql="update uerp_user set passbox='".$_POST["np"]."',passport_expire_date='".$_POST["expiredate"]."',nationality='".$_POST["nationality"]."',marital_status='".$_POST["maritalstatus"]."',child='".$_POST["child"]."',religion='".$_POST["religion"]."' where id='".$_COOKIE["userid"]."'";
                if ($conn->query($sql) === TRUE){
                    $tomtom=0;
                    echo"<script>alert('Password Reset Sucessfully.')</script>";
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','PASSWORD RESET','0','$sysdate','$ip','1','Changed Login Password','0','".$_COOKIE["userid"]."')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    
                    echo"<form method='POST' action='logout.php' name='main' target='_top'><input type=hidden name='cPath' value='786'></form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }else{
                echo"<script>alert('New Password and Confirm Password not Same. Must be same.')</script>";
            }
        }else{
            echo"<script>alert('Wrong! Current Password.')</script>";
        }
    }
    
    if($_POST["processor"]=="staff-intake"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        $sql = "insert into uerp_user (uid,date,jointime,status,agentid,unbox,passbox,gender,username,username2,designation,department,address,
        phone,address2,bank_name,account_name,account_number,bsb,country,city,area,email,dob,mtype,zip,abn,salary_basic,reg_amt,sat_amt,sun_amt,hol_amt,
        night_amt,payment_type,marital_status) 
        VALUES ('".$_POST["employeeid"]."','$pdate','$jdate','1','0','".$_POST["userid"]."','".$_POST["password"]."','".$_POST["gender"]."',
        '".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["designation"]."','".$_POST["department"]."','".$_POST["address"]."','".$_POST["phone"]."',
        '".$_POST["address2"]."','".$_POST["bankname"]."','".$_POST["accountname"]."','".$_POST["accountnumber"]."','".$_POST["bsb"]."',
        '".$_POST["country"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["email"]."','$dob','".$_POST["mtype"]."','".$_POST["zip"]."',
        '".$_POST["abn"]."','".$_POST["salary_basic"]."','".$_POST["reg_amt"]."','".$_POST["sat_amt"]."','".$_POST["sun_amt"]."','".$_POST["hol_amt"]."',
        '".$_POST["night_amt"]."','".$_POST["payment_type"]."','".$_POST["marital_status"]."')";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('New User Record Saved Successfully...')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','USER INTAKE','0','$sysdate','$ip','1','Added New USER','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='all-employees'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    if($_POST["processor"]=="user-update"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        // pdate,jdate,employeeid,fname,lname,userid,password,address,address2,city,state,zip,country,phone,email,dob,gender,marital_status,
        // abn,bankname,bsb,accountname,accountnumber,designation,department,mtype,salary_basic,amount,payment_type,pf,pf_no,pf_rate,esi,esi_no,esi_rate
        
        $sql="update uerp_user set uid='".$_POST["employeeid"]."',date='$pdate',jointime='$jdate',status='1',unbox='".$_POST["userid"]."',passbox='".$_POST["password"]."',
        gender='".$_POST["gender"]."',username='".$_POST["fname"]."',username2='".$_POST["lname"]."',address='".$_POST["address"]."',phone='".$_POST["phone"]."',
        address2='".$_POST["address2"]."',designation='".$_POST["designation"]."',department='".$_POST["department"]."',bank_name='".$_POST["bankname"]."',
        account_name='".$_POST["accountname"]."',account_number='".$_POST["accountnumber"]."',bsb='".$_POST["bsb"]."',country='".$_POST["country"]."',
        city='".$_POST["city"]."',area='".$_POST["state"]."',email='".$_POST["email"]."',dob='$dob',mtype='".$_POST["mtype"]."',zip='".$_POST["zip"]."',
        abn='".$_POST["abn"]."',marital_status='".$_POST["marital_status"]."',salary_basic='".$_POST["salary_basic"]."',reg_amt='".$_POST["reg_amt"]."',
        sat_amt='".$_POST["sat_amt"]."',sun_amt='".$_POST["sun_amt"]."',hol_amt='".$_POST["hol_amt"]."',overtime='".$_POST["overtime"]."',
        night_amt='".$_POST["night_amt"]."',payment_type='".$_POST["payment_type"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('User`s Record Updated')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','USER UPDATE','0','$sysdate','$ip','1','Updated USER data','0','".$_POST["employeeid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='all-employees'></form>";
            ?><script language=JavaScript> document.main.submit(); </script><?php 
        } else echo "Error updating record: " . $conn->error;
    }
    
    
    if($_POST["processor"]=="client-intake"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        
        $sql = "insert into uerp_user (uid,date,jointime,status,agentid,unbox,passbox,gender,username,username2,address,
        phone,address2,bank_name,account_name,account_number,bsb,country,city,area,email,dob,mtype,zip,abn,marital_status,ndis) 
        VALUES ('".$_POST["employeeid"]."','$pdate','$jdate','1','0','".$_POST["userid"]."','".$_POST["password"]."','".$_POST["gender"]."',
        '".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["address"]."','".$_POST["phone"]."','".$_POST["address2"]."','".$_POST["bankname"]."',
        '".$_POST["accountname"]."','".$_POST["accountnumber"]."','".$_POST["bsb"]."','".$_POST["country"]."','".$_POST["city"]."','".$_POST["state"]."',
        '".$_POST["email"]."','$dob','".$_POST["mtype"]."','".$_POST["zip"]."','".$_POST["abn"]."','".$_POST["marital_status"]."','".$_POST["ndis_number"]."')";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('New Client Record Saved Successfully...')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT INTAKE','0','$sysdate','$ip','1','Added New CLIENT','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='all-clients'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    if($_POST["processor"]=="client-update"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        
        $sql="update uerp_user set uid='".$_POST["employeeid"]."',date='$pdate',jointime='$jdate',status='1',unbox='".$_POST["userid"]."',passbox='".$_POST["password"]."',
        gender='".$_POST["gender"]."',username='".$_POST["fname"]."',username2='".$_POST["lname"]."',address='".$_POST["address"]."',phone='".$_POST["phone"]."',
        address2='".$_POST["address2"]."',bank_name='".$_POST["bankname"]."',account_name='".$_POST["accountname"]."',account_number='".$_POST["accountnumber"]."',
        bsb='".$_POST["bsb"]."',country='".$_POST["country"]."',city='".$_POST["city"]."',area='".$_POST["state"]."',email='".$_POST["email"]."',
        dob='$dob',mtype='".$_POST["mtype"]."',zip='".$_POST["zip"]."',abn='".$_POST["abn"]."',marital_status='".$_POST["marital_status"]."',
        cp_name='".$_POST["cp_name"]."',cp_phone1='".$_POST["cp_phone1"]."',cp_mobile='".$_POST["cp_mobile"]."',cp_email='".$_POST["cp_email"]."',
        cp_address='".$_POST["cp_address"]."',pm_name='".$_POST["pm_name"]."',pm_mobile='".$_POST["pm_mobile"]."',pm_email='".$_POST["pm_email"]."',
        pm_address='".$_POST["pm_address"]."',ndis='".$_POST["ndisnumber"]."' where id='".$_POST["id"]."'";
        
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('Client Record Updated')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT UPDATE','0','$sysdate','$ip','1','Updated CLIENT data','0','".$_POST["employeeid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='all-clients'></form>";
            ?><script language=JavaScript> document.main.submit(); </script><?php 
        } 
    }
    
    if($_POST["processor"]=="createproject"){
        //$sdate=strtotime($_POST["sdate"]);
        // $edate=strtotime($_POST["edate"]);
        $sdate=time();
        $edate=time();
        $pname = str_replace("'", "`", $_POST["name"]);
        $pnote = str_replace("'", "`", $_POST["note"]);
        $leaderid = str_replace("'", "`", $_POST["leaderid"]);
        if(isset($_POST["court"])){
            $sql = "insert into project (name,clientid,stime,etime,color,rate,rate_type,priority,leaderid,note,status,
            start_date,end_date,teamleaderid,court,category,stage,act,managed_by,caseid) 
            VALUES ('$pname','".$_POST["clientid"]."','".$_POST["stime"]."','".$_POST["etime"]."','".$_POST["pcolor"]."',
            '".$_POST["rate"]."','".$_POST["rate_type"]."','".$_POST["priority"]."','$leaderid','$pnote','1','$sdate','$edate',
            '".$_POST["teamleaderid"]."','".$_POST["court"]."','".$_POST["category"]."','".$_POST["stage"]."','".$_POST["act"]."',
            '".$_POST["managed_by"]."','".$_POST["caseid"]."')";
        }else{
            $sql = "insert into project (name,clientid,stime,etime,color,rate,rate_type,priority,leaderid,note,status,start_date,end_date,teamleaderid) 
            VALUES ('$pname','".$_POST["clientid"]."','".$_POST["stime"]."','".$_POST["etime"]."','".$_POST["pcolor"]."','".$_POST["rate"]."','".$_POST["rate_type"]."','".$_POST["priority"]."','$leaderid','$pnote','1','$sdate','$edate','".$_POST["teamleaderid"]."')";
        }
        if ($conn->query($sql) === TRUE){
            $s1 = "select * from project where clientid='".$_POST["clientid"]."' and name='".$_POST["name"]."' and status='1' order by id desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $projid=$rs1["id"];
                echo"<script>alert('New Project Started.')</script>";
            } }
            if(isset($projid)){
                echo"<script>alert('Project Wise New Shift Updated.')</script>";
                $sql = "insert into shifting_schedule (projectid,stime,etime,status) VALUES ('$projid','".$_POST["stime"]."','".$_POST["etime"]."','1')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $data_table=0;
            $dt1 = "select * from project order by id desc limit 1";
            $dt2 = $conn->query($dt1);
            if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT INTAKE','0','$sysdate','$ip','1','Added New PROJECT ".$_POST["name"]."','0','$data_table','project')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            // echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='projects.php'><input type=hidden name='pstat' value='1'></form>";
            ?><!---  <script language=JavaScript> document.main.submit(); </script> ---><?php
        }
    }
    
    if($_POST["processor"]=="editproject"){
        $sdate=strtotime($_POST["start_date"]);
        $edate=strtotime($_POST["end_date"]);
        $pname = str_replace("'", "`", $_POST["pname"]);
        $pnote = str_replace("'", "`", $_POST["note"]);
        
        $sql="update project set name='$pname',clientid='".$_POST["clientid"]."',color='".$_POST["pcolor"]."',
        priority='".$_POST["priority"]."',leaderid='".$_POST["leaderid"]."',note='$pnote',status='".$_POST["status"]."',
        start_date='$sdate',end_date='$edate',teamleaderid='".$_POST["teamleaderid"]."',managed_by='".$_POST["managed_by"]."',
        caseid='".$_POST["caseid"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Record Updated')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT UPDATE','0','$sysdate','$ip','1','Updated PROJECT data','0','".$_POST["id"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
    }
    
    if($_POST["processor"]=="createdeal"){
        $note = str_replace("'", "`", $_POST["note"]);
        $date = time();
        $sql = "insert into deals (leadid,deal_name,product_name,product_detail,deal_value,status,note,deal_date) 
        VALUES ('".$_POST["leadid"]."','".$_POST["deal_name"]."','".$_POST["product_name"]."','".$_POST["product_detail"]."','".$_POST["deal_value"]."','".$_POST["status"]."','$note','$date')";
        if ($conn->query($sql) === TRUE){            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $data_table=0;
            $dt1 = "select * from deals order by id desc limit 1";
            $dt2 = $conn->query($dt1);
            if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','NEW DEAL CREATED','0','$sysdate','$ip','1','Added New DEAL as $name by ".$_POST["employeeid"]."','".$_POST["employeeid"]."','$data_table','leads')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('New Deal Added and Activated.')</script>";
            
            echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='deals.php'><input type=hidden name='id' value='".$_POST["id"]."'></form>";
            ?><script language=JavaScript> document.main.submit(); </script><?php
        }else{ echo"Failed"; }
        
    }
    
    if($_POST["processor"]=="createlead"){
        
        $location=0;
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/users/' . $newFilename);
            $location = 'media/users/' . $newFilename;
        }
        
        $date = time();
        $fdate = strtotime($_POST["fdate"]);
        $tdate = strtotime($_POST["tdate"]);
        $adate = strtotime($_POST["adate"]);
        $cdob = strtotime($_POST["cdob"]);
        
        $lead_name = str_replace("'", "`", $_POST["lead_name"]);
        $fname = str_replace("'", "`", $_POST["fname"]);
        $surname = str_replace("'", "`", $_POST["surname"]);
        $caddress = str_replace("'", "`", $_POST["caddress"]);
        $cdetail = str_replace("'", "`", $_POST["cdetail"]);
        $rname = str_replace("'", "`", $_POST["rname"]);
        $rname2 = str_replace("'", "`", $_POST["rname2"]);
        
        $lx=0;
        $lx1 = "select * from leads where lead_name='$lead_name' order by id desc limit 1";
        $lx2 = $conn->query($lx1);
        if ($lx2->num_rows > 0) { while($lx3 = $lx2->fetch_assoc()) { $lx=1; } }
        
        if($lx==0){
            
            if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                /*
                $sql = "insert into leads (lead_name,campaignid,clientid,employeeid,appointment_date,cdetail,date,
                target_date,status,name,address,email,phone,followup_date,priority,surname,title,gender,ccity,
                cstate,czip,ccountry,cdob,birth_country,language,english,cpackage,funding_type,previous_provider,
                referral_number,rname,rname2,rtype,note_for_staff,onboard,image,
                billing_address,case_manager,ndis_no,client_detail,ref_note,referrer,accounting_system_reference,
                accounting_system_secondary_reference,billing_group,default_km_charge,default_travel_time,km_from_office,
                language_other,medicare_import_ref,naps_service_id,scheduler,planning_region,allied_health,property_name,
                geographic_region,default_package) 
                VALUES ('$lead_name','".$_POST["campaignid"]."','0','".$_COOKIE["userid"]."','$adate','$cdetail','$date',
                '$tdate','".$_POST["status"]."','$fname','$caddress','".$_POST["cemail"]."','".$_POST["cphone"]."','$fdate',
                '".$_POST["priority"]."','$surname','".$_POST["title"]."','".$_POST["gender"]."','".$_POST["ccity"]."',
                '".$_POST["cstate"]."','".$_POST["czip"]."','".$_POST["ccountry"]."','$cdob','".$_POST["birth_country"]."',
                '".$_POST["language"]."','".$_POST["english"]."','".$_POST["cpackage"]."','".$_POST["funding_type"]."',
                '".$_POST["previous_provider"]."','".$_POST["referral_number"]."','$rname','$rname2','".$_POST["rtype"]."',
                '".$_POST["note_for_staff"]."','0','$location','".$_POST["billing_address"]."','".$_POST["case_manager"]."',
                '".$_POST["ndis_no"]."','".$_POST["client_detail"]."','".$_POST["ref_note"]."','".$_POST["referrer"]."',
                '".$_POST["accounting_system_reference"]."','".$_POST["accounting_system_secondary_reference"]."',
                '".$_POST["billing_group"]."','".$_POST["default_km_charge"]."','".$_POST["default_travel_time"]."',
                '".$_POST["km_from_office"]."','".$_POST["language_other"]."','".$_POST["medicare_import_ref"]."',
                '".$_POST["naps_service_id"]."','".$_POST["scheduler"]."','".$_POST["planning_region"]."',
                '".$_POST["allied_health"]."','".$_POST["property_name"]."','".$_POST["geographic_region"]."',
                '".$_POST["default_package"]."')";
                */
                
                $sql = "insert into leads (lead_name,campaignid,clientid,employeeid,appointment_date,date,
                target_date,status,name,address,email,phone,followup_date,priority,surname,title,gender,ccity,
                cstate,czip,ccountry,cdob,ndis_no,onboard,image,referral_number,ref_note,referrer) 
                VALUES ('$lead_name','".$_POST["campaignid"]."','0','".$_COOKIE["userid"]."','$adate','$date',
                '$tdate','".$_POST["status"]."','$fname','$caddress','".$_POST["cemail"]."','".$_POST["cphone"]."','$fdate',
                '".$_POST["priority"]."','$surname','".$_POST["title"]."','".$_POST["gender"]."','".$_POST["ccity"]."',
                '".$_POST["cstate"]."','".$_POST["czip"]."','".$_POST["ccountry"]."','$cdob','".$_POST["ndis_no"]."','0',
                '$location','".$_POST["referral_number"]."','".$_POST["ref_note"]."','".$_POST["referrer"]."')";
                
            }else{
            
                /*
                $sql = "insert into leads (lead_name,campaignid,clientid,employeeid,appointment_date,cdetail,date,
                target_date,status,name,address,email,phone,followup_date,priority,surname,title,gender,ccity,
                cstate,czip,ccountry,cdob,birth_country,language,english,cpackage,funding_type,previous_provider,
                referral_number,rname,rname2,rtype,note_for_staff,onboard,image,
                billing_address,case_manager,ndis_no) 
                VALUES ('$lead_name','".$_POST["campaignid"]."','0','".$_COOKIE["userid"]."','$adate','$cdetail','$date',
                '$tdate','".$_POST["status"]."','$fname','$caddress','".$_POST["cemail"]."','".$_POST["cphone"]."','$fdate',
                '".$_POST["priority"]."','$surname','".$_POST["title"]."','".$_POST["gender"]."','".$_POST["ccity"]."',
                '".$_POST["cstate"]."','".$_POST["czip"]."','".$_POST["ccountry"]."','$cdob','".$_POST["birth_country"]."',
                '".$_POST["language"]."','".$_POST["english"]."','".$_POST["cpackage"]."','".$_POST["funding_type"]."',
                '".$_POST["previous_provider"]."','".$_POST["referral_number"]."','$rname','$rname2','".$_POST["rtype"]."',
                '".$_POST["note_for_staff"]."','0','$location','".$_POST["billing_address"]."','".$_POST["case_manager"]."',
                '".$_POST["ndis_no"]."')";
                */
                
                $sql = "insert into leads (lead_name,campaignid,clientid,employeeid,appointment_date,date,
                target_date,status,name,address,email,phone,followup_date,priority,surname,title,gender,ccity,
                cstate,czip,ccountry,cdob,ndis_no,onboard,image,referral_number,ref_note,referrer) 
                VALUES ('$lead_name','".$_POST["campaignid"]."','0','".$_COOKIE["userid"]."','$adate','$date',
                '$tdate','".$_POST["status"]."','$fname','$caddress','".$_POST["cemail"]."','".$_POST["cphone"]."','$fdate',
                '".$_POST["priority"]."','$surname','".$_POST["title"]."','".$_POST["gender"]."','".$_POST["ccity"]."',
                '".$_POST["cstate"]."','".$_POST["czip"]."','".$_POST["ccountry"]."','$cdob','".$_POST["ndis_no"]."','0',
                '$location','".$_POST["referral_number"]."','".$_POST["ref_note"]."','".$_POST["referrer"]."')";
                
            }
            if ($conn->query($sql) === TRUE){            
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $data_table=0;
                $dt1 = "select * from leads order by id desc limit 1";
                $dt2 = $conn->query($dt1);
                if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','NEW LEAD CREATED','0','$sysdate','$ip','1','Added New LEAD as $name by ".$_POST["employeeid"]."','".$_POST["employeeid"]."','$data_table','leads')";
                if ($conn->query($sql1) === TRUE) echo"<script>alert('New Lead Added and Activated.')</script>";
                 
            } else { echo"Failed"; }
        } else { echo"<script>alert('OOps! Lead with Same Name is Already Available.')</script>"; }
    }
    
    if($_POST["processor"]=="editlead"){
        
        $location=0;
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/users/' . $newFilename);
            $location = 'media/users/' . $newFilename;
        }
        
        $date = time();
        $fdate = strtotime($_POST["fdate"]);
        $tdate = strtotime($_POST["tdate"]);
        $adate = strtotime($_POST["adate"]);
        $cdob = strtotime($_POST["cdob"]);
        
        $lead_name = str_replace("'", "`", $_POST["lead_name"]);
        $fname = str_replace("'", "`", $_POST["fname"]);
        $surname = str_replace("'", "`", $_POST["surname"]);
        $caddress = str_replace("'", "`", $_POST["caddress"]);
        $cdetail = str_replace("'", "`", $_POST["cdetail"]);
        $rname = str_replace("'", "`", $_POST["rname"]);
        $rname2 = str_replace("'", "`", $_POST["rname2"]);
        $lx=0;
        $lx1 = "select * from leads where lead_name='$lead_name' and id<>'".$_POST["id"]."' order by id desc limit 1";
        $lx2 = $conn->query($lx1);
        if ($lx2->num_rows > 0) { while($lx3 = $lx2->fetch_assoc()) { $lx=1; } }
        if($lx==0){
            if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                
                $sql="update leads set lead_name='$lead_name',campaignid='".$_POST["campaignid"]."',clientid='0',
                employeeid='".$_COOKIE["userid"]."',appointment_date='$adate',speech_note='".$_POST[""]."',date='$date',
                target_date='$tdate',note='$cdetail',status='".$_POST["status"]."',name='$fname',address='$caddress',
                email='".$_POST["cemail"]."',phone='".$_POST["cphone"]."',followup_date='$fdate',priority='".$_POST["priority"]."',
                surname='$surname',title='".$_POST["title"]."',gender='".$_POST["gender"]."',ccity='".$_POST["ccity"]."',
                cstate='".$_POST["cstate"]."',czip='".$_POST["czip"]."',ccountry='".$_POST["ccountry"]."',cdob='$cdob',
                cdetail='$cdetail',birth_country='".$_POST["birth_country"]."',language='".$_POST["language"]."',
                english='".$_POST["english"]."',cpackage='".$_POST["cpackage"]."',funding_type='".$_POST["funding_type"]."',
                previous_provider='".$_POST["previous_provider"]."',ndis_no='".$_POST["ndis_no"]."',
                referral_number='".$_POST["referral_number"]."',rname='$rname',rname2='$rname2',rtype='".$_POST["rtype"]."',
                note_for_staff='".$_POST["note_for_staff"]."',image='$location',billing_address='".$_POST["billing_address"]."',
                case_manager='".$_POST["case_manager"]."',client_detail='".$_POST["client_detail"]."',ref_note='".$_POST["ref_note"]."',
                referrer='".$_POST["referrer"]."',accounting_system_reference='".$_POST["accounting_system_reference"]."',
                accounting_system_secondary_reference='".$_POST["accounting_system_secondary_reference"]."',
                billing_group='".$_POST["billing_group"]."',default_km_charge='".$_POST["default_km_charge"]."',
                default_travel_time='".$_POST["default_travel_time"]."',km_from_office='".$_POST["km_from_office"]."',
                language_other='".$_POST["language_other"]."',medicare_import_ref='".$_POST["medicare_import_ref"]."',
                naps_service_id='".$_POST["naps_service_id"]."',scheduler='".$_POST["scheduler"]."',
                planning_region='".$_POST["planning_region"]."',allied_health='".$_POST["allied_health"]."',
                property_name='".$_POST["property_name"]."',geographic_region='".$_POST["geographic_region"]."',
                default_package='".$_POST["default_package"]."' where id='".$_POST["id"]."'";
                
            }else{
                $sql="update leads set lead_name='$lead_name',campaignid='".$_POST["campaignid"]."',clientid='0',employeeid='".$_COOKIE["userid"]."',
                appointment_date='$adate',speech_note='".$_POST[""]."',date='$date',target_date='$tdate',note='$cdetail',
                status='".$_POST["status"]."',name='$fname',address='$caddress',email='".$_POST["cemail"]."',phone='".$_POST["cphone"]."',followup_date='$fdate',
                priority='".$_POST["priority"]."',surname='$surname',title='".$_POST["title"]."',gender='".$_POST["gender"]."',ccity='".$_POST["ccity"]."',
                cstate='".$_POST["cstate"]."',czip='".$_POST["czip"]."',ccountry='".$_POST["ccountry"]."',cdob='$cdob',cdetail='$cdetail',
                birth_country='".$_POST["birth_country"]."',language='".$_POST["language"]."',english='".$_POST["english"]."',
                cpackage='".$_POST["cpackage"]."',funding_type='".$_POST["funding_type"]."',previous_provider='".$_POST["previous_provider"]."',
                ndis_no='".$_POST["ndis_no"]."',referral_number='".$_POST["referral_number"]."',rname='$rname',rname2='$rname2',
                rtype='".$_POST["rtype"]."',note_for_staff='".$_POST["note_for_staff"]."',image='$location',
                billing_address='".$_POST["billing_address"]."',case_manager='".$_POST["case_manager"]."' where id='".$_POST["id"]."'";
            }
            if ($conn->query($sql) === TRUE){            
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','EDIT LEAD','0','$sysdate','$ip','1','EDIT LEAD as $name by ".$_POST["employeeid"]."','".$_POST["employeeid"]."','".$_POST["id"]."','leads')";
                if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated')</script>";
                 
            } else { echo"Failed"; }
        } else { echo"<script>alert('Oops! Lead with Same Name is Already Available.')</script>"; }
    }
    
    if($_POST["processor"]=="createcampaign"){
        $name = str_replace("'", "`", $_POST["name"]);
        // $country = str_replace("'", "`", $_POST["country"]);
        $plan = str_replace("'", "`", $_POST["plan"]);
        $possibility = str_replace("'", "`", $_POST["possibility"]);
        $opportunity = str_replace("'", "`", $_POST["opportunity"]);
        $date = time();
        $csx=0;
        $cs1 = "select * from campaigns where campaign_name='$name' order by id desc limit 1";
        $cs2 = $conn->query($cs1);
        if ($cs2->num_rows > 0) { while($cs3 = $cs2->fetch_assoc()) { $csx=1; } }
        if($csx==0){
            $sql = "insert into campaigns (campaign_name,clientid,employeeid,country,start_date,end_date,plan,possibility,opportunity,status,color,priority,teamleaderid) 
            VALUES ('$name','0','".$_POST["employeeid"]."','0','$date','0','$plan','$possibility','$opportunity','ON','".$_POST["pcolor"]."','".$_POST["priority"]."','1')";
            if ($conn->query($sql) === TRUE){
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $data_table=0;
                $dt1 = "select * from campaigns order by id desc limit 1";
                $dt2 = $conn->query($dt1);
                if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','NEW CAMPAIGN CREATED','0','$sysdate','$ip','1','Added New CAMPAIGN as $name by ".$_POST["employeeid"]."','".$_POST["employeeid"]."','$data_table','campaigns')";
                if ($conn->query($sql1) === TRUE) echo"<script>alert('New Campaign Added and Activated.')</script>";
            }else { echo"Failed"; }
        }else { echo"<script>alert('Campaign Already Created...')</script>"; }
        
    }
    
    if($_POST["processor"]=="editcampaign"){
        $name = str_replace("'", "`", $_POST["name"]);
        // $country = str_replace("'", "`", $_POST["country"]);
        $plan = str_replace("'", "`", $_POST["plan"]);
        $possibility = str_replace("'", "`", $_POST["possibility"]);
        $opportunity = str_replace("'", "`", $_POST["opportunity"]);
        $date = time();
        $csx=0;
        $cs1 = "select * from campaigns where id='".$_POST["id"]."' order by id desc limit 1";
        $cs2 = $conn->query($cs1);
        if ($cs2->num_rows > 0) { while($cs3 = $cs2->fetch_assoc()) { $csx=1; } }
        if($csx==1){
            $sql="update campaigns set campaign_name='".$_POST["name"]."',employeeid='".$_POST["employeeid"]."',
            plan='".$_POST["plan"]."',possibility='".$_POST["possibility"]."',opportunity='".$_POST["opportunity"]."',
            color='".$_POST["pcolor"]."',priority='".$_POST["priority"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Record Updated')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','CAMPAIGN UPDATED','0','$sysdate','$ip','1','CAMPAIGN UPDATED as $name by ".$_POST["employeeid"]."','".$_POST["employeeid"]."','".$_POST["id"]."','campaigns')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
            }else { echo"Failed"; }
        }else { echo"<script>alert('Invalid Campaign Data. Record Not Found...')</script>"; }
        
    }
    
    if($_POST["processor"]=="createproject_sc"){
        $sdate=strtotime($_POST["ndis_sd"]);
        $edate=strtotime($_POST["ndis_ed"]);
        $dob=strtotime($_POST["dob"]);
        $pname = str_replace("'", "`", $_POST["name"]);
        $pnote = str_replace("'", "`", $_POST["note"]);
        $leaderid = str_replace("'", "`", $_POST["leaderid"]);
        $sql = "insert into project_sc (name,color,rate,rate_type,priority,leaderid,note,status,start_date,end_date,ndis_no,ndis_sd,ndis_ed,occupational_name,
        occupational_no,occupational_email,occupational_org,speech_name,speech_no,speech_email,speech_org,behavior_name,behavior_no,behavior_email,behavior_org,
        provider_name,provider_no,provider_email,provider_org,core_supports,capacity_building_supports,dob,n_name,n_address,n_number,n_email,n_relation,
        p_name,p_address,p_email,p_phone) 
        VALUES ('$pname','#CCCCCC','0','Fixed','High','$leaderid','$pnote','1','$sdate','$edate','".$_POST["ndis_no"]."',
        '$sdate','$edate','".$_POST["occupational_name"]."','".$_POST["occupational_no"]."','".$_POST["occupational_email"]."','".$_POST["occupational_org"]."',
        '".$_POST["speech_name"]."','".$_POST["speech_no"]."','".$_POST["speech_email"]."','".$_POST["speech_org"]."','".$_POST["behavior_name"]."',
        '".$_POST["behavior_no"]."','".$_POST["behavior_email"]."','".$_POST["behavior_org"]."','".$_POST["provider_name"]."','".$_POST["provider_no"]."',
        '".$_POST["provider_email"]."','".$_POST["provider_org"]."','".$_POST["core_supports"]."','".$_POST["capacity_building_supports"]."',
        '$dob','".$_POST["n_name"]."','".$_POST["n_address"]."','".$_POST["n_number"]."','".$_POST["n_email"]."','".$_POST["n_relation"]."',
        '".$_POST["p_name"]."','".$_POST["p_address"]."','".$_POST["p_email"]."','".$_POST["p_number"]."')";
        if ($conn->query($sql) === TRUE){            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $data_table=0;
            $dt1 = "select * from project_sc order by id desc limit 1";
            $dt2 = $conn->query($dt1);
            if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT SUPPORT CO-ORDINATOR INTAKE','0','$sysdate','$ip','1','Added New PROJECT on SC BY Support Co-Ordinator".$_POST["name"]."','0','$data_table','project_sc')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('New Participant Added and Support Project Started.')</script>";
            
        }else{ echo"Failed"; }
    }
    
    if($_POST["processor"]=="editproject_sc"){
        $sdate=strtotime($_POST["ndis_sd"]);
        $edate=strtotime($_POST["ndis_ed"]);
        $dob=strtotime($_POST["dob"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $leaderid = str_replace("'", "`", $_POST["leaderid"]);
        $sql="update project_sc set name='".$_POST["name"]."',color='#CCCCCC',leaderid='$leaderid',note='$note',start_date='$sdate',
        end_date='$edate',ndis_no='".$_POST["ndis_no"]."',ndis_sd='$sdate',ndis_ed='$edate',occupational_name='".$_POST["occupational_name"]."',
        occupational_no='".$_POST["occupational_no"]."',occupational_email='".$_POST["occupational_email"]."',occupational_org='".$_POST["occupational_org"]."',
        speech_name='".$_POST["speech_name"]."',speech_no='".$_POST["speech_no"]."',speech_email='".$_POST["speech_email"]."',speech_org='".$_POST["speech_org"]."',
        behavior_name='".$_POST["behavior_name"]."',behavior_no='".$_POST["behavior_no"]."',behavior_email='".$_POST["behavior_email"]."',
        behavior_org='".$_POST["behavior_org"]."',provider_name='".$_POST["provider_name"]."',provider_no='".$_POST["provider_no"]."',
        provider_email='".$_POST["provider_email"]."',provider_org='".$_POST["provider_org"]."',dob='$dob',n_name='".$_POST["n_name"]."',
        n_address='".$_POST["n_address"]."',n_number='".$_POST["n_number"]."',n_email='".$_POST["n_email"]."',n_relation='".$_POST["n_relation"]."',
        support_coordination_fund='".$_POST["support_coordination_fund"]."',capacity_building_supports='".$_POST["capacity_building_supports"]."',core_supports='".$_POST["core_supports"]."',
        p_name='".$_POST["p_name"]."',p_address='".$_POST["p_address"]."',p_phone='".$_POST["p_phone"]."',p_email='".$_POST["p_email"]."'
        where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Record Updated')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT SUPPORT CO-ORDINATOR UPDATE','0','$sysdate','$ip','1','Updated PROJECT SC data by Support Co-Ordinator ','0','".$_POST["id"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
    }
    
    if($_POST["processor"]=="forcedpayslip"){
        /* 
            employeeid,projectid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,
            clockin,clockout,wage_amt,overtime_amt
            clientid
        */
        
        // projectid,employeeid,sdate,edate,clockin,clockout,wage_amt,overtime_amt
        
        $clientid=0;
        $p1 = "select * from project where id='".$_POST["projectid"]."' order by id asc limit 1";
        $pp1 = $conn->query($p1);
        if ($pp1->num_rows > 0) { while($ppp1 = $pp1->fetch_assoc()) { $clientid=$ppp1["clientid"]; } }
        
        $y1=substr($_POST["sdate"],0,4);
        $m1=substr($_POST["sdate"],5,2);
        $d1=substr($_POST["sdate"],8,2);
        $clockin=strtotime($_POST["clockin"]);
        
        $y2=substr($_POST["edate"],0,4);
        $m2=substr($_POST["edate"],5,2);
        $d2=substr($_POST["edate"],8,2);
        $clockout=strtotime($_POST["clockout"]);
        
        $currentday=date("l", $clockin);
        
        $wage_amount=0;
        $overtime_amount=0;
        $r1w = "select * from uerp_user where id='".$_POST["employeeid"]."' order by id asc limit 1";
        $r2w = $conn->query($r1w);
        if ($r2w->num_rows > 0) { while($r3w = $r2w -> fetch_assoc()) {
            $employeename="".$r3w["username"]."".$r3w["username2"]."";
            if($currentday=="Saturday") $wage_amount=$r3w["sat_amt"];
            else if($currentday=="Sunday") $wage_amount=$r3w["sun_amt"];
            else if($currentday=="Offday") $wage_amount=$r3w["hol_amt"];
            else $wage_amount=$r3w["reg_amt"];
            $overtime_amount=$r3w["overtime"];
        } }
        
        // echo"<script>alert('$clientid, ($d1 . $m1 . $y1), ($d2 . $m2 . $y2), $clockin, $clockout, ".$_POST["wage_amt"].", ".$_POST["overtime_amt"]."')</script>";
        $sql1 = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,clockin,clockout,wage_amt,overtime_amt,activity_log,total_overtime) 
        VALUES ('".$_POST["employeeid"]."','".$_POST["projectid"]."','$clientid','$d1','$m1','$y1','".$_POST["sdate"]."','$d2','$m2','$y2','".$_POST["edate"]."','1','1','#DDDDDD','$clockin','$clockout','$wage_amount','".$_POST["overtime_amt"]."','Forced','".$_POST["total_overtime"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        echo"<form method='POST' action='scheduling-set.php' name='main' target='_top'>
            <input type=hidden name='shiftingiduser2' value='".$_POST["sdate"]."'>
            <input type=hidden name='shiftingiduser3' value='".$_POST["edate"]."'>
            <input type=hidden name='src_employeeid' value='".$_POST["employeeid"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($_POST["processor"]=="generalformsedit"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "forms$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
            $location = 'media/documents/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
    	    $pdate=strtotime($_POST["date1"]);
            $sql="update general_forms set date='$pdate',clientid='".$_POST["clientid"]."',title='".$_POST["title"]."',filename='$location' where id='".$_POST["formid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Form Data Updated with document..')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL FORM','0','$sysdate','$ip','1','Updated General Form Uploaded with title: ".$_POST["title"]." and PDF file','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $pdate=strtotime($_POST["date1"]);
            $sql="update general_forms set date='$pdate',clientid='".$_POST["clientid"]."',title='".$_POST["title"]."' where id='".$_POST["formid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Form Data Updated without document..')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL FORM','0','$sysdate','$ip','1','Updated General Form Uploaded with title: ".$_POST["title"]."','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	if(!isset($_POST["redirection"])){
    	    echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='general_forms.php'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
    	}
    }

    if($_POST["processor"]=="loanapplication_edit"){
        
        $application_date=strtotime($_POST["date1"]);
        $approved_date=strtotime($_POST["approved_date"]);
        $repayment_from=strtotime($_POST["repayment_from"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "forms$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/leave_applications/' . $newFilename);
            $location = 'media/leave_applications/' . $newFilename;
        }
        
    	$extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql="update personal_loan set employeeid='".$_POST["applicantid"]."', application_date='".$_POST["application_date"]."', approvedby='".$_POST["approvedby"]."',
    	    loan_number='".$_POST["loan_number"]."',amount='".$_POST["amount"]."',interest_rate='".$_POST["installment_rate"]."',installment_period='".$_POST["installment_period"]."',
    	    installment_paid='".$_POST["installment_paid"]."',repayment_amount='".$_POST["repayment_amount"]."',approved_date='$approved_date',repayment_from='$repayment_from',
    	    reason='".$_POST["reason"]."',status='".$_POST["status"]."' where id='".$_POST["lid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    	    
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LOAN APPLICATION UPDATE','0','$sysdate','$ip','1','Updated Loan Application.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
    	}else{
    	    $sql="update personal_loan set employeeid='".$_POST["applicantid"]."', application_date='".$_POST["application_date"]."', approvedby='".$_POST["approvedby"]."',
    	    loan_number='".$_POST["loan_number"]."',amount='".$_POST["amount"]."',interest_rate='".$_POST["installment_rate"]."',installment_period='".$_POST["installment_period"]."',
    	    installment_paid='".$_POST["installment_paid"]."',repayment_amount='".$_POST["repayment_amount"]."',approved_date='$approved_date',repayment_from='$repayment_from',
    	    image='$location',reason='".$_POST["reason"]."',status='".$_POST["status"]."' where id='".$_POST["lid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    	    
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LOAN APPLICATION UPDATE','0','$sysdate','$ip','1','Updated Loan Application.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    }
    
    
    if($_POST["processor"]=="leaveapplication_edit"){
        
        $application_date=strtotime($_POST["date1"]);
        $leave_from=strtotime($_POST["dfrom"]);
        $leave_to=strtotime($_POST["dto"]);
        $approved_date=strtotime($_POST["approved_date"]);
        $approved_from=strtotime($_POST["approved_from"]);
        $approved_to=strtotime($_POST["approved_to"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "forms$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/leave_applications/' . $newFilename);
            $location = 'media/leave_applications/' . $newFilename;
        }
        
    	$extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql="update leave_applications set applicant_id='".$_POST["applicantid"]."',type_id='".$_POST["typeid"]."',application_date='$application_date',
    	    leave_from='$leave_from',leave_to='$leave_to',reason='".$_POST["reason"]."',manager_comment='".$_POST["manager_comment"]."',
    	    approved_date='$approved_date',approved_from='$approved_from',approved_to='$approved_to' where id='".$_POST["lid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    	    
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LEAVE APPLICATION UPDATE','0','$sysdate','$ip','1','Updated Leave Application.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
    	}else{
    	    $sql="update leave_applications set applicant_id='".$_POST["applicantid"]."',type_id='".$_POST["typeid"]."',application_date='$application_date',
    	    leave_from='$leave_from',leave_to='$leave_to',reason='".$_POST["reason"]."',manager_comment='".$_POST["manager_comment"]."',
    	    approved_date='$approved_date',approved_from='$approved_from',approved_to='$approved_to',file_name='$location'  where id='".$_POST["lid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    	    
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LEAVE APPLICATION UPDATE','0','$sysdate','$ip','1','Updated Leave Application.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    }

    if($_POST["processor"]=="leaveapplication"){
        $pdate=strtotime($_POST["date1"]);
        $dfrom=strtotime($_POST["dfrom"]);
        $dto=strtotime($_POST["dto"]);
        $comment=" ";
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "forms$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/leave_applications/' . $newFilename);
            $location = 'media/leave_applications/' . $newFilename;
        }
        
    	$extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into leave_applications (applicant_id,type_id,appliedfor,application_date,leave_from,leave_to,reason,approved_date,approved_from,approved_to,manager_comment,status) 
    	    VALUES ('".$_POST["applicantid"]."','".$_POST["typeid"]."','0','$pdate','$dfrom','$dto','".$_POST["reason"]."','0','0','0','$comment','ON')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Leave Application Generated and Waiting for Approval.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LEAVE APPLICATION','0','$sysdate','$ip','1','New Leave Application Form created with reason: ".$_POST["reason"]." and Hard Copy not uploaded.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
    	}else{
    	    $sql = "insert into leave_applications (applicant_id,type_id,appliedfor,application_date,leave_from,leave_to,reason,approved_date,approved_from,approved_to,file_name,manager_comment,status) 
    	    VALUES ('".$_POST["applicantid"]."','".$_POST["typeid"]."','0','$pdate','$dfrom','$dto','".$_POST["reason"]."','0','0','0','$location','$comment','ON')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Leave Application Generated and Waiting for Approval.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LEAVE APPLICATION','0','$sysdate','$ip','1','New Leave Application Form created with reason: ".$_POST["reason"]." and Hard Copy file Uploaded.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    }
    
    if($_POST["processor"]=="loanapplication"){
        
        $pdate=strtotime($_POST["date1"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "forms$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/loan_applications/' . $newFilename);
            $location = 'media/loan_applications/' . $newFilename;
        }
        $loannumber=rand(10000000,99999999);
    	$extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into personal_loan (employeeid,application_date,loan_number,amount,interest_rate,installment_period,reason,status) 
    	    VALUES ('".$_POST["applicantid"]."','$pdate','$loannumber','".$_POST["amount"]."','12','".$_POST["installment_period"]."','".$_POST["reason"]."','ON')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Loan Application Submitted.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LOAN APPLICATION','0','$sysdate','$ip','1','New Loan Application Form created with reason: ".$_POST["reason"]." and Hard Copy not uploaded.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
    	}else{
    	    $sql = "insert into personal_loan (employeeid,application_date,loan_number,amount,interest_rate,installment_period,image,reason,status) 
    	    VALUES ('".$_POST["applicantid"]."','$pdate','$loannumber','".$_POST["amount"]."','12','".$_POST["installment_period"]."','$location','".$_POST["reason"]."','ON')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Loan Application Submitted.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LOAN APPLICATION','0','$sysdate','$ip','1','New Loan Application Form created with reason: ".$_POST["reason"]." and Hard Copy file Uploaded.','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    }
    
    if($_POST["processor"]=="addschadsrate"){
        $sql = "insert into award_rates (stream,level_group,level,pay_point,employment_type,effective_from,weekday_rate,saturday_rate,sunday_rate,
        public_holiday_rate,afternoon_shift_rate,night_shift_rate,overtime_first_block_rate,overtime_after_block_rate,
        overtime_public_holiday_rate,overtime_block_definition,overnight_flat_rate,status) 
        VALUES ('SACS','".$_POST["level_group"]."','".$_POST["level"]."','".$_POST["pay_point"]."','".$_POST["employment_type"]."',
        '".$_POST["effective_from"]."','".$_POST["weekday_rate"]."','".$_POST["saturday_rate"]."','".$_POST["sunday_rate"]."',
        '".$_POST["public_holiday_rate"]."','".$_POST["afternoon_shift_rate"]."','".$_POST["night_shift_rate"]."',
        '".$_POST["overtime_first_block_rate"]."','".$_POST["overtime_after_block_rate"]."','".$_POST["overtime_public_holiday_rate"]."',
        '".$_POST["overtime_block_definition"]."','".$_POST["overnight_flat_rate"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','SCHADS RATE ADDED','0','$sysdate','$ip','1','New SCHADS Rates created','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="addgeography"){
        $address = str_replace("'", "`", $_POST["address"]);
        
        $sql = "insert into geographic_regions (address,region,provider_availability,status) VALUES ('$address','".$_POST["region"]."','".$_POST["provider_availability"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','GEOGRAPHIC REGION ADDED','0','$sysdate','$ip','1','New Geographic Region created with address: $address Region: ".$_POST["region"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="editschadsrate"){
        $sql="update award_rates set stream='0',level_group='".$_POST["level_group"]."',level='".$_POST["level"]."',pay_point='".$_POST["pay_point"]."',
        employment_type='".$_POST["employment_type"]."',effective_from='".$_POST["effective_from"]."',weekday_rate='".$_POST["weekday_rate"]."',
        saturday_rate='".$_POST["saturday_rate"]."',sunday_rate='".$_POST["sunday_rate"]."',public_holiday_rate='".$_POST["public_holiday_rate"]."',
        afternoon_shift_rate='".$_POST["afternoon_shift_rate"]."',night_shift_rate='".$_POST["night_shift_rate"]."',
        overtime_first_block_rate='".$_POST["overtime_first_block_rate"]."',overtime_after_block_rate='".$_POST["overtime_after_block_rate"]."',
        overtime_public_holiday_rate='".$_POST["overtime_public_holiday_rate"]."',overtime_block_definition='".$_POST["overtime_block_definition"]."',
        overnight_flat_rate='".$_POST["overnight_flat_rate"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','SCHADS RATE UPDATED','0','$sysdate','$ip','1','SCHADS Rates updated with id: ".$_POST["id"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="editgeography"){
        $address = str_replace("'", "`", $_POST["address"]);
        $sql="update geographic_regions set address='$address',region='".$_POST["region"]."',provider_availability='".$_POST["provider_availability"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','GEOGRAPHIC REGION UPDATED','0','$sysdate','$ip','1','Geographic Region updated with Address: $address Region: ".$_POST["region"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="addcardnumber"){
        $issue_date=strtotime($_POST["issue_date"]);
        $expire_date=strtotime($_POST["expire_date"]);
        $referrer = str_replace("'", "`", $_POST["referrer"]);
        
        $sql = "insert into ndis_card_number (card_number,referrer,status,issue_date,expire_date) VALUES ('".$_POST["card_number"]."','$referrer','".$_POST["status"]."','$issue_date','$expire_date')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT CARD NUMBER ADDED','0','$sysdate','$ip','1','New Client Card Number created with referrer name: $referrer card number: ".$_POST["card_number"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="editcardnumber"){
        $issue_date=strtotime($_POST["issue_date"]);
        $expire_date=strtotime($_POST["expire_date"]);
        $referrer = str_replace("'", "`", $_POST["referrer"]);
        
        $sql="update ndis_card_number set card_number='".$_POST["card_number"]."',referrer='$referrer',status='".$_POST["status"]."',
        issue_date='$issue_date',expire_date='$expire_date' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT CARD NUMBER UPDATED','0','$sysdate','$ip','1','Client Card Number updated with referrer name: $referrer card number: ".$_POST["card_number"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="addpackageschedules"){
        $issue_date=strtotime($_POST["issue_date"]);
        $expire_date=strtotime($_POST["expire_date"]);
        $alt_address = str_replace("'", "`", $_POST["alternative_billing_address"]);
        
        $sql = "insert into project_schedules (pid,cid,eid,package,start,end,alternative_billing_address,status) 
        VALUES ('".$_POST["pid"]."','".$_POST["cid"]."','".$_POST["eid"]."','".$_POST["package"]."','$issue_date','$expire_date','$alt_address','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT PACKAGE SCHEDULE ADDED','0','$sysdate','$ip','1','New Client Package Schedule Created','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="editpackageschedules"){
        $issue_date=strtotime($_POST["issue_date"]);
        $expire_date=strtotime($_POST["expire_date"]);
        $alt_address = str_replace("'", "`", $_POST["alternative_billing_address"]);
        
        $sql="update project_schedules set eid='".$_POST["eid"]."',package='".$_POST["package"]."',alternative_billing_address='$alt_address',
        status='".$_POST["status"]."',start='$issue_date',end='$expire_date' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT PACKAGE SCHEDULE UPDATED','0','$sysdate','$ip','1','Client Package Schedule Updated','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="leavetype"){
        $sql = "insert into leave_type (leavename,status) VALUES ('".$_POST["leavename"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Leave Type Saved.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','LEAVE TYPE','0','$sysdate','$ip','1','New Leave Type created with name: ".$_POST["leavename"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="leaveholidays"){
        $dfrom=strtotime($_POST["dfrom"]);
        $dto=strtotime($_POST["dto"]);
        $holidayname = str_replace("'", "`", $_POST["holidayname"]);
        $holidaytype = str_replace("'", "`", $_POST["holidaytype"]);
        
        $sql = "insert into leave_holidays (holidayname,startdate,enddate,status,holidaytype) VALUES ('$holidayname','$dfrom','$dto','".$_POST["status"]."','$holidaytype')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('General Holiday Saved.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL HOLIDAY','0','$sysdate','$ip','1','New General Holiday created with name: ".$_POST["holidayname"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    
    if($_POST["processor"]=="leaveweeklyholiday"){
        $dfrom=strtotime($_POST["dfrom"]);
        $dto=strtotime($_POST["dto"]);
        $sql = "insert into leave_weekend (weekday,time_from,time_to,status) VALUES ('".$_POST["weekday"]."','".$_POST["tfrom"]."','".$_POST["tto"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Weekend Holiday Saved.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','WEEKEND HOLIDAY','0','$sysdate','$ip','1','New Weekend Holiday created with name: ".$_POST["weekday"]."','0','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    // contractforms
    if($_POST["processor"]=="contractforms"){
        $pdate=strtotime($_POST["date1"]);
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "forms$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
            $location = 'media/documents/' . $newFilename;
        }
        
    	$extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into contract_forms (date,employeeid,clientid,title,filename,status) VALUES ('$pdate','".$_COOKIE["userid"]."','".$_POST["clientid"]."','".$_POST["title"]."','$location','1')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('General Form Uploaded Successfully.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL FORM','0','$sysdate','$ip','1','New General Form Uploaded with title: ".$_POST["title"]." and PDF file','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql = "insert into contract_forms (date,employeeid,clientid,title,status) VALUES ('$pdate','".$_COOKIE["userid"]."','".$_POST["clientid"]."','".$_POST["title"]."','1')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('General Form Uploaded Successfully.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','CONTRACT FORM','0','$sysdate','$ip','1','New Contract Form Uploaded with title: ".$_POST["title"]." and Without PDF file','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='contracts.php'></form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php 
    }
    
    // general forms
    if($_POST["processor"]=="generalforms"){
        $pdate=strtotime($_POST["date1"]);
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "forms$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
            $location = 'media/documents/' . $newFilename;
        }
        
    	$extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into general_forms (date,employeeid,clientid,title,filename,status) VALUES ('$pdate','".$_COOKIE["userid"]."','".$_POST["clientid"]."','".$_POST["title"]."','$location','".$_POST["status"]."')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Data Uploaded Successfully.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL FORM','0','$sysdate','$ip','1','New General Form Uploaded with title: ".$_POST["title"]." and PDF file','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql = "insert into general_forms (date,employeeid,clientid,title,status) VALUES ('$pdate','".$_COOKIE["userid"]."','".$_POST["clientid"]."','".$_POST["title"]."','".$_POST["status"]."')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('General Form Uploaded Successfully.')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL FORM','0','$sysdate','$ip','1','New General Form Uploaded with title: ".$_POST["title"]." and Without PDF file','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	
    	if(!isset($_POST["redirection"])){
        	echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='general_forms.php'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php 
    	}
    }
    
    if($_POST["processor"]=="companysettings"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/company/' . $newFilename);
            $location = 'media/company/' . $newFilename;
        }
        
    	$extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql="update companysetting set companyname='".$_POST["cname"]."',address='".$_POST["address"]."',city='".$_POST["city"]."',
    	    state='".$_POST["state"]."',postalcode='".$_POST["zip"]."',country='".$_POST["country"]."',phone='".$_POST["phone"]."',
    	    website='".$_POST["website"]."',email='".$_POST["email"]."',ndis_number='".$_POST["ndis"]."',abn_number='".$_POST["abn"]."',
            currencycode='".$_POST["currencycode"]."',currencysymbol='".$_POST["currencysymbol"]."',language='".$_POST["language"]."',
            cashbook='".$_POST["cashaccount"]."',bankbook='".$_POST["bankaccount"]."',bsb_number='".$_POST["bsb"]."',
            ac_number='".$_POST["accounts"]."',companydetail='".$_POST["about"]."',image='$location' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Company Data Updated Successfully..')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql="update companysetting set companyname='".$_POST["cname"]."',address='".$_POST["address"]."',city='".$_POST["city"]."',
    	    state='".$_POST["state"]."',postalcode='".$_POST["zip"]."',country='".$_POST["country"]."',phone='".$_POST["phone"]."',
    	    website='".$_POST["website"]."',email='".$_POST["email"]."',ndis_number='".$_POST["ndis"]."',abn_number='".$_POST["abn"]."',
            currencycode='".$_POST["currencycode"]."',currencysymbol='".$_POST["currencysymbol"]."',language='".$_POST["language"]."',
            cashbook='".$_POST["cashaccount"]."',bankbook='".$_POST["bankaccount"]."',bsb_number='".$_POST["bsb"]."',
            ac_number='".$_POST["accounts"]."',companydetail='".$_POST["about"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Company Data Updated Successfully..')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    }
?>

