<?php
    error_reporting(0);	
    if(isset($_COOKIE["userid"])){
        include('include.php');
        $tablename = $_GET["tbl"];
        
        if(isset($_GET["suspendid"])){
            $sql = "UPDATE $tablename SET status='10' WHERE id='".$_GET["suspendid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Account Suspended.')</script> ";    
        }
        
        if(isset($_GET["suspendid2"])){
            $sql = "UPDATE $tablename SET status='1' WHERE id='".$_GET["suspendid2"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Account Activated.')</script> ";    
        }
        
        if(isset($_GET["suspendid3"])){
            $sql = "UPDATE $tablename SET status='5' WHERE id='".$_GET["suspendid3"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Project Completed.')</script> ";   
        }
        
    }
?>
