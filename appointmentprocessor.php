<?php
    // error_reporting(0);
    include('include.php');
    $dbnamex=$_COOKIE['dbname'];
    
    date_default_timezone_set("Asia/Dhaka");

    if(isset($_GET["processor"])){
        if($_GET["processor"]=="StatusSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set status='".$_GET["status"]."' where id='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Status Record Updated.')</script>";
        }
    }

    if($_POST["processor"]=="editappointment"){
        $datex=strtotime($_POST["date1"]);
        $datey=strtotime($_POST["date2"]);
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $randid=time();
        $sql="update appointments_manager set employeeid='".$_POST["employeeid"]."',clientid='".$_POST["clientid"]."',title='$title',
        detail='$detail',priority='".$_POST["priority"]."',tdate='$datex',mode='".$_POST["mode"]."',
        start='".$_POST["date1"]."',end='".$_POST["date2"]."',projectid='".$_POST["projectid"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Appointment Updated')</script>";
            $recid=0;
            $sql = "SELECT * FROM appointments_manager where id='".$_POST["id"]."' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {
                $recid=$row["id"];
                $randid=$row["randid"];
            } }
            if($recid!="0"){
                $extension=0;
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
                    
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/appointments/' . $newFilename);
            		$location = 'media/appointments/' . $newFilename;
            		$extension1=strlen("$extension");
            		if($extension1>=3){
                		$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','APPOINTMENT MANAGER')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
            		}
            	}
            }
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','APPOINTMENT UPDATED','".$_POST["priority"]."','$sysdate','$ip','1','APPOINTMENT Updated on $title','".$_POST["employeeid"]."','".$_POST["clientid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
        echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
            <input type=hidden name='url' value='".$_POST["url"]."'><input type=hidden name='id' value='".$_POST["id"]."'>
            <input type=hidden name='pstat' value='1'>
        </form>";
        ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
    }
    
    if($_POST["processor"]=="appointmentlist"){
        $datex=strtotime($_POST["date1"]);
        $datey=strtotime($_POST["date2"]);
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $randid=time();
        $sql = "insert into appointments_manager (employeeid,clientid,date,title,detail,priority,image,tdate,mode,start,end,projectid) 
        VALUES ('".$_POST["employeeid"]."','".$_POST["clientid"]."','$randid','$title','$detail','".$_POST["priority"]."','$randid','$randid','".$_POST["mode"]."','".$_POST["date1"]."','".$_POST["date2"]."','".$_POST["projectid"]."')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Appointment Assigned')</script>";
            $recid=0;
            $sql = "SELECT * FROM appointments_manager where image='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                $extension=0;
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
                    
            		$newFilename = time() . "$dbnamex_$rand." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/appointments/' . $newFilename);
            		$location = 'media/appointments/' . $newFilename;
            		$extension1=strlen("$extension");
            		if($extension1>=3){
                		$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','APPOINTMENT MANAGER')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
            		}
            	}
            }
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','APPOINTMENT','".$_POST["priority"]."','$sysdate','$ip','1','New APPOINTMENT Assigned on $title','".$_POST["employeeid"]."','".$_POST["clientid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            // echo"<script>alert('Notification Sent to User')</script>";
            $sx1 = "select * from uerp_user where id='".$_POST["employeeid"]."' order by id asc limit 1";
            $rx1 = $conn->query($sx1);
            if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
                $employeename="";
                $employeename="".$ry1["username"]." ".$ry1["username2"]."";
                $semail="";
                $semail=$ry1["email"];
            } }

            $sx2 = "select * from uerp_user where id='".$_POST["clientid"]."' order by id asc limit 1";
            $rx2 = $conn->query($sx2);
            if ($rx2->num_rows > 0) { while($ry2 = $rx2->fetch_assoc()) {
                $clientname="";
                $clientname="".$ry2["username"]." ".$ry2["username2"]."";
            } }
        }
        echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
            <input type=hidden name='url' value='".$_POST["url"]."'><input type=hidden name='id' value='".$_POST["id"]."'>
            <input type=hidden name='pstat' value='1'>
        </form>";
        ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
    }