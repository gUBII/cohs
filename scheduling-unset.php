<?php
    error_reporting(0);
    if(isset($_COOKIE["userid"])){
        
        if($_GET["unset"]=="timeclock"){
            unset($_COOKIE["timeclockstat"]);
            setcookie("timeclockstat", "", time() -9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='clock_in-out.php'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }else{
            unset($_COOKIE["projectid"]);
            setcookie("projectid", "", time() -9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='clock_in-out.php'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
?>