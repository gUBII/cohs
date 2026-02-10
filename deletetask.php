<?php
    include("include.php");
    $tablename = $_GET["tbl"];
    $delid = $_GET["delid"];
    
    if(isset($_GET["tbl"])){
        if(isset($_GET["delid"])){
            $sql = "DELETE FROM $tablename WHERE id='".$_GET["delid"]."'"; 
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Record Deleted.')</script>";
                echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='task_manager.php'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php   
            }
        }
    }
    
