<?php
    // error_reporting(0);
    include('../include.php');
    
    date_default_timezone_set("Asia/Dhaka");
    
    if($_GET["processor"]=="statusupdate"){
        $datex=time();
        if($_GET["statusupdate"]==2) $sql="update cart set status='".$_GET["statusupdate"]."',date2='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if($_GET["statusupdate"]==3) $sql="update cart set status='".$_GET["statusupdate"]."',date3='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if($_GET["statusupdate"]==4) $sql="update cart set status='".$_GET["statusupdate"]."',date4='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if($_GET["statusupdate"]==5) $sql="update cart set status='".$_GET["statusupdate"]."',date5='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if($_GET["statusupdate"]==6) $sql="update cart set status='".$_GET["statusupdate"]."',date6='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if($_GET["statusupdate"]==7) $sql="update cart set status='".$_GET["statusupdate"]."',date7='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if($_GET["statusupdate"]==8) $sql="update cart set status='".$_GET["statusupdate"]."',date8='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if($_GET["statusupdate"]==9) $sql="update cart set status='".$_GET["statusupdate"]."',date9='$datex' where cid='".$_GET["cid"]."' and oid='".$_GET["oid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
?>