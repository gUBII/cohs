<?php
    error_reporting(0);
    if(isset($_COOKIE["userid"])){
        
        if($_GET["unset2"]=="timeclock"){
            unset($timeclockstat);
            setcookie("timeclockstat", "", time() -9999999);
            unset($shiftingid2);
            setcookie("shiftingid2", "", time() -9999999);
            unset($shiftingid3);
            setcookie("shiftingid3", "", time() -9999999);
            
            $todaydate2=time();
            $todaydate2=date("Y-m-d", $todaydate2);
            
            // setcookie("shiftingid2", $todaydate2, time() +9999999);
            // setcookie("shiftingid3", $todaydate2, time() +9999999); 
            
            echo"<form method='get' action='scheduling-set.php' name='main' target='_top'><input type=hidden name='shiftingiduserx' value='$todaydate2'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
?>