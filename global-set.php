<?php
    error_reporting(0);
    
    if(isset($_COOKIE["userid"])){
        
        if($_GET["url"]=="projects.php"){
            if(isset($_GET["projectidx"])){
                unset($projectidx);
                setcookie("projectidx", "", time() -9999999);
                setcookie("projectidx", $_GET["projectidx"], time() +9999999);
                echo"<form method='get' action='index.php' name='main' target='_top'>
                    <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='pstat' value='1'>
                    <input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_GET["url"]=="support_co-ordinators.php"){
            if(isset($_GET["projectidx"])){
                unset($projectidsc);
                setcookie("projectidsc", "", time() -9999999);
                setcookie("projectidsc", $_GET["projectidx"], time() +9999999);
                echo"<form method='get' action='index.php' name='main' target='_top'>
                    <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='pstat' value='1'>
                    <input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_GET["projectidy"])){
            unset($projectidy);
            setcookie("projectidy", "", time() -9999999);
            setcookie("projectidy", $_GET["projectidy"], time() +9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='plan_manager.php'>
            <input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
    }
?>