<?php
    error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    include('include.php');
 
    $dbnamex=$_COOKIE['dbname'];
    
    if(isset($_COOKIE["userid"])){
        
        if(isset($_GET["suspend_assistant"])){
            $sql="update companysetting set assistant='".$_GET["suspend_assistant"]."' where id='1'";
            if ($conn->query($sql) === TRUE){
                echo"<form method='get' action='index.php' name='main'>
                    <input type='hidden' name='url' value='".$_GET["url"]."'><input type='hidden' name='id' value='".$_GET["id"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_GET["projectid"])){
            $cdate=time();
            $sql = "insert into project_team_allocation (projectid,position,date,status) VALUES ('".$_GET["projectid"]."','1','$cdate','1')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Team Member Allocation Box Opened.')</script> ";    
        }
        
        if(isset($_GET["projectscid"])){
            $cdate=time();
            $sql = "insert into project_sc_team_allocation (projectid,position,date,status) VALUES ('".$_GET["projectscid"]."','1','$cdate','1')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Team Member Allocation Box Opened.')</script> ";    
        }
        
        if(isset($_GET["log_type"])){
            $cdate=time();
            $sql = "insert into activity_logs (date,log_type,logid,title,detail,status) VALUES ('$cdate','".$_GET["log_type"]."','".$_GET["logid"]."','".$_GET["title"]."','".$_GET["detail"]."','1')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('".$_GET["log_type"]." Log Data Updated.')</script> ";
        }
        
        if(isset($_POST["log1"])){
            $title = str_replace("'", "`", $_POST["title"]);
            $detail = str_replace("'", "`", $_POST["detail"]);
            $content = preg_replace('/[^\x20-\x7E\r\n\t]/u', '', $detail);
            
            $sql="update activity_logs set title='$title',detail='$detail' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Data Title & Detail Updated.')</script>";
            else echo"<script>alert('Failed to Update')</script>";
        }
        
        if(isset($_POST["log2"])){
            $datex=strtotime($_POST["date"]);
            $sql="update activity_logs set date='$datex' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Date Updated.')</script>";
        }
        
        if(isset($_POST["log3"])){
            $extension=0;
            foreach ($_FILES['images']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension = $path_parts['extension'];
                $newFilename = time() . "$dbnamex." . $extension;
                move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/leads/' . $newFilename);
                $location = 'media/leads/' . $newFilename;
            }
            $extension1=strlen("$extension");
            if($extension1>=3)  $sql="update activity_logs set documents='$location',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
            else $sql="update activity_logs set status='".$_POST["status"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Data Status Updated.')</script>";
        }
        
        // WAREHOUSE / LOCATION SECTION
        if(isset($_GET["locationid"])){
            $sql = "insert into warehouse_type (wtype_name) VALUES ('')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('New Location Box Opened.')</script> ";    
        }
        if(isset($_POST["warehouseid"])){
            if($_POST["pointer"]==1) $sql="update warehouse_type set wtype_name='".$_POST["wtype_name"]."' where id='".$_POST["warehouseid"]."'";
            if($_POST["pointer"]==2) $sql="update warehouse_type set owner='".$_POST["owner"]."' where id='".$_POST["warehouseid"]."'";
            if($_POST["pointer"]==3) $sql="update warehouse_type set rent='".$_POST["rent"]."' where id='".$_POST["warehouseid"]."'";
            if($_POST["pointer"]==4) $sql="update warehouse_type set rent_type='".$_POST["rent_type"]."' where id='".$_POST["warehouseid"]."'";
            if($_POST["pointer"]==5) $sql="update warehouse_type set duration='".$_POST["duration"]."' where id='".$_POST["warehouseid"]."'";
            if($_POST["pointer"]==6) $sql="update warehouse_type set status='".$_POST["status"]."' where id='".$_POST["warehouseid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Warehouse Type Data Updated.')</script>";
        }
        
    }