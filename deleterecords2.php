<?php
    include("include.php");
    $tablename = $_GET["tbl"];
    $delid = $_GET["delid"];
    
    if(isset($_GET["tbl"])){
        if(isset($_GET["delid"])){            
            if(strlen($_GET["sourceid"])>=2){
                $sourceid=$_GET["sourceid"];
                $sql = "DELETE FROM $tablename WHERE $sourceid='".$_GET["delid"]."'"; 
                if ($conn->query($sql) === TRUE){
                    echo"<script>alert('Record Deleted.')</script>";
                    echo"<form method='get' action='$mainurl/modules/client-service-addons2.php' name='main'>
                        <input type='hidden' name='cid' value='".$_GET["cid"]."'>
                        <input type='hidden' name='pid' value='".$_GET["pid"]."'>
                        <input type='hidden' name='sid' value='0'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }                
            }
        }
    }
    
