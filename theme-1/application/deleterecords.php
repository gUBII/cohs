<?php
    include("../include.php");
    $tablename = $_GET["tbl"];
    $delid = $_GET["delid"];
    if(isset($_GET["tbl"])){
        if(isset($_GET["delid"])){
            $sql = "DELETE FROM  $tablename WHERE id='".$_GET["delid"]."'"; 
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Record Deleted.')</script>";
            }
        }
    }
?>