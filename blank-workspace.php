<?php
echo"<!DOCTYPE html>
    <html lang='en'>";
    
    include('authenticator.php');
    include('head.php');

    echo"<body style='text-align:right'>
        <span style='font-size:18pt>".$_GET["d1"]."</span>&nbsp;&nbsp;<br><span style='font-size:12pt>".$_GET["d2"]."</span>
    </body>";
    
    include("scripts-light.php");
echo"</html>";
?>
