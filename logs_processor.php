<?php
    // error_reporting(0);
    include('include.php');
    
    $dbnamex=$_COOKIE['dbname'];
    
    date_default_timezone_set("Australia/Melbourne");
    
    if(isset($_POST["processor"])){
        
        if($_POST["processor"]=="stagemanager"){
            $sql="update leads set stage='".$_POST["stageupdater"]."' where id='".$_POST["stageid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Stage Updated.')</script>";
        }
        if($_POST["processor"]=="appointmentmanager"){
            $fdate=strtotime($_POST["datemanager"]);
            $sql="update leads set followup_date='$fdate' where id='".$_POST["stageid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Next Follow Up Date Updated.')</script>";
        }
        
        if($_POST["processor"]=="leadsmanager"){
            unset($_COOKIE["b_lead"]);
            setcookie("b_lead", "", time() -9999999);
            setcookie("b_lead", $_POST["b_lead"], time()+9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type='hidden' name='url' value='".$_POST["url"]."'>
                <input type='hidden' name='id' value='".$_POST["id"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if($_POST["processor"]=="clientmanager"){
            unset($_COOKIE["client_id"]);
            setcookie("client_id", "", time() -9999999);
            setcookie("client_id", $_POST["cid"], time()+9999999);
        }
        
        if($_POST["processor"]=="leadmanager"){
            unset($_COOKIE["lead_id"]);
            setcookie("lead_id", "", time() -9999999);
            setcookie("lead_id", $_POST["leadsearch"], time()+9999999);
        }
        
        if($_POST["processor"]=="activitymanager"){
            unset($_COOKIE["activity_id"]);
            setcookie("activity_id", "", time() -9999999);
            setcookie("activity_id", $_POST["activity_id"], time()+9999999);
        }
        
    }