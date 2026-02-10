<?php
    error_reporting(0);
    
    if(isset($_COOKIE["userid"])){
        
        if(isset($_GET["projectidx"])){
            unset($projectidx);
            setcookie("projectidx", "", time() -9999999);
            setcookie("projectidx", $_GET["projectidx"], time() +9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='projects.php'><input type=hidden name='pstat' value='1'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        if(isset($_GET["projectidy"])){
            unset($projectidy);
            setcookie("projectidy", "", time() -9999999);
            setcookie("projectidy", $_GET["projectidy"], time() +9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='plan_manager.php'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
    }
?>