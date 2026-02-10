<?php
    include('include.php');
    $sql="update shifting_allocation set clockin='".$_GET["clockin"]."',clockout='".$_GET["clockout"]."' where id='".$_GET["sid"]."'";
    if ($conn->query($sql) === TRUE){ echo"<script>alert('Record Updated')</script>"; }
?>