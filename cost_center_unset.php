<?php
    error_reporting(0);
    if(isset($_COOKIE["userid"])){
        unset($costcenteridx);
        setcookie("costcenteridx", "", time() -9999999);            
        echo"<form method='get' action='index.php' name='main' target='_top'>
            <input type=hidden name='url' value='cost_center.php'>
            <input type=hidden name='pstat' value='1'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
?>