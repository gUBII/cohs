<?php
    // error_reporting(0);
    include('../include.php');
    if(isset($_POST["sname"])) $sname=$_POST["sname"];
    else $sname=0;
    
    date_default_timezone_set("Asia/Dhaka");
    
    if($_POST["processor"]=="adduser"){
        $sam=0;
        $s1 = "select * from sms_user2 where user_id='".$_POST["user_id"]."' order by id asc limit 1";
    	$r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $sam=$rs1["id"]; } }
        if($sam==0){
            if(!isset($_POST["department"])) $department=0; else $department=$_POST["department"];
            if(!isset($_POST["designation"])) $designation=0; else $designation=$_POST["designation"];
            $about = str_replace("'", "`", $_POST["about"]);
            $dob = strtotime($_POST["dob"]);
            $datex=time();
            
            $extension=0;
            foreach ($_FILES['images']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension = $path_parts['extension'];
                $newFilename = time() . "smsbd$rand." . $extension;
                move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/users/' . $newFilename);
                $location = '../media/users/' . $newFilename;
            }
            
            $extension1=0;
            $extension1=strlen("$extension");
        	if($extension1>=3){
                $sql = "insert into sms_user2 (sname,name,name2,image,email,phone,address,city,state,zip,country,user_id,pass,date,dob,actype,mtype,department,designation,about,status) 
                VALUES ('$sname','".$_POST["name"]."','".$_POST["name2"]."','$location','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["city"]."',
                '".$_POST["state"]."','".$_POST["zip"]."','".$_POST["country"]."','".$_POST["user_id"]."','".$_POST["pass"]."','$datex','$dob','".$_POST["actype"]."','".$_POST["actype"]."',
                '$department','$designation','$about','".$_POST["status"]."')";
            }else{
                $sql = "insert into sms_user2 (sname,name,name2,email,phone,address,city,state,zip,country,user_id,pass,date,dob,actype,department,designation,about,status) 
                VALUES ('$sname','".$_POST["name"]."','".$_POST["name2"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["city"]."',
                '".$_POST["state"]."','".$_POST["zip"]."','".$_POST["country"]."','".$_POST["user_id"]."','".$_POST["pass"]."','$datex','$dob','".$_POST["actype"]."','".$_POST["actype"]."',
                '$department','$designation','$about','".$_POST["status"]."')";
            }
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";

        } else echo"<script>alert('Login User ID Already Used. Please try another one.')</script>";
    }
    
    if($_POST["processor"]=="updateuser"){
        $about = str_replace("'", "`", $_POST["about"]);
        $dob = strtotime($_POST["dob"]);
        $datex=time();
            
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/users/' . $newFilename);
            $location = '../media/users/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql="update sms_user2 set sname='$sname',name='".$_POST["name"]."',name2='".$_POST["name2"]."',image='$location',email='".$_POST["email"]."',phone='".$_POST["phone"]."',
            address='".$_POST["address"]."',city='".$_POST["city"]."',state='".$_POST["state"]."',zip='".$_POST["zip"]."',country='".$_POST["country"]."',
            dob='$dob',actype='".$_POST["actype"]."',department='".$_POST["department"]."',designation='".$_POST["designation"]."',about='".$_POST["about"]."',
            status='".$_POST["status"]."',pass='".$_POST["pass"]."' where id='".$_POST["id"]."'";
        }else{
            $sql="update sms_user2 set sname='$sname',name='".$_POST["name"]."',name2='".$_POST["name2"]."',email='".$_POST["email"]."',phone='".$_POST["phone"]."',
            address='".$_POST["address"]."',city='".$_POST["city"]."',state='".$_POST["state"]."',zip='".$_POST["zip"]."',country='".$_POST["country"]."',
            dob='$dob',actype='".$_POST["actype"]."',department='".$_POST["department"]."',designation='".$_POST["designation"]."',about='".$_POST["about"]."',
            status='".$_POST["status"]."',pass='".$_POST["pass"]."' where id='".$_POST["id"]."'";
        }
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    // DESIGNATIONS
    if($_POST["processor"]=="adddesignation"){
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $sql = "insert into designations (title,detail,status) VALUES ('$title','$detail','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updatedesignation"){
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $sql="update designations set title='$title',detail='$detail',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    // DEPARTMENTS
    if($_POST["processor"]=="adddepartment"){
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $sql = "insert into departments (title,detail,status) VALUES ('$title','$detail','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updatedepartment"){
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $sql="update departments set title='$title',detail='$detail',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    // buyers/seller/user suspension
    if($_GET["processor"]=="onoff"){
        $sql="update sms_user2 set status='".$_GET["status"]."' where id='".$_GET["bid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Account status set to ".$_GET["status"].".')</script>";
    }
    // seller kyc approval
    if($_GET["processor"]=="kyc"){
        $sql="update sms_user2 set kyc='".$_GET["kyc"]."' where id='".$_GET["bid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('KYC Approved.')</script>";
    }
    
    // seller kyc update.
    if($_POST["processor"]=="kycupdate1"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/kyc/' . $newFilename);
            $location = '../media/kyc/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql="update sms_user2 set kyc1='$location' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Trade License File Uploaded and Stored.')</script>";
        }
    }
    if($_POST["processor"]=="kycupdate2"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/kyc/' . $newFilename);
            $location = '../media/kyc/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql="update sms_user2 set kyc2='$location' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('NID Card File Uploaded and Stored.')</script>";
        }
    }
    if($_POST["processor"]=="kycupdate3"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/kyc/' . $newFilename);
            $location = '../media/kyc/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql="update sms_user2 set kyc3='$location' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('TIN Certificate File Uploaded and Stored.')</script>";
        }
    }
?>