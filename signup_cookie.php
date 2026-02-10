<?php
    if(isset($_POST["uemail"])){
        if(isset($_POST["logtime"])){
            if(isset($_POST["logip"])){
            
                $uemail=$_POST["uemail"];
                $logip=$_POST["logip"];
                $logtime=$_POST["logtime"];
                
                setcookie("useridx", $uemail, time()+9999999);
                setcookie("logtime", $logtime, time()+9999999);
                setcookie("logip", $logip, time()+9999999);
                
                echo"<form method='POST' action='https://www.nexis365.com/saas/register.php' name='main' target='_top'>
                    <input type=hidden name='nexis' value='0'><input type=hidden name='smsbd' value='0'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
    }
?>