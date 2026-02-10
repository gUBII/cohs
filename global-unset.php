<?php
    error_reporting(0);
    if(isset($_COOKIE["userid"])){
        
        if($_GET["url"]=="projects.php"){
            unset($projectidx);
            setcookie("projectidx", "", time() -9999999);
        }
        
        if($_GET["url"]=="support_co-ordinators.php"){
            unset($projectidsc);
            setcookie("projectidsc", "", time() -9999999);
        }
        
        if(isset($_COOKIE["globalid"])){
            unset($_COOKIE["globalid"]);
            setcookie("globalid", "", time() -9999999);
        }
        
        echo"<form method='get' action='index.php' name='main' target='_top'>
            <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='pstat' value='1'>
            <input type=hidden name='stat' value='".$_GET["stat"]."'><input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>";
            
            if(isset($_GET["pointer"])) echo"<input type=hidden name='pointer' value='".$_GET["pointer"]."'>";
            
        echo"</form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
?>