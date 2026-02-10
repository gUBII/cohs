<?php
echo"<!DOCTYPE html>
    <html lang='en'>";
    // nexix database connection.    
    // include("authenticator.php");
    include("head-light.php");
        echo"<div class=' bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border'>
            <div class=' px-5'>
                <center>
                    <span style='font-size:16pt'>".$_GET["d1"]."</span><br>
                    <span style='font-size:12pt'>".$_GET["d2"]."</span></center><br><br>
                </center>
            </div>
        </div>";
    include("scripts-light.php");
    echo"</html>";
?>
