<?php
    echo"<!DOCTYPE html>
    <html lang='en'>";
        
        include("head-light.php");
        
        echo"<body style='background-color:#000000;text-align:right'>
            <span style='font-size:14pt;color:#00C3F9'>".$_GET["d1"]."</span><br>
            <span style='font-size:9pt;color:white'>".$_GET["d2"]."</span><br>
        </body>";
        
        include("scripts-light.php");
    
    echo"</html>";
?>
