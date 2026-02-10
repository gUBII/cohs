<?php
	echo"<body style='background-color:black'>";
    	if(isset($_GET["managed"])){
            $managed=$_GET["managed"];
            unset($_COOKIE["managed"]);
            setcookie("managed", "", time() -99999);            
            setcookie("managed", $managed, time()+9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'>";
                // if($managed==3) echo"<input type=hidden name='url' value='ndis_dashboard.php'>";
                // else
                echo"<input type=hidden name='url' value='".$_GET["url"]."'>";
                echo"<input type=hidden name='pstat' value='1'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_GET["managed2"])){
            $managed2=$_GET["managed2"];
            unset($_COOKIE["managed2"]);
            setcookie("managed2", "", time() -99999);            
            setcookie("managed2", $managed2, time()+9999999);
            echo"<form method='get' action='index.php' name='main' target='_self'>";
                // if($managed==3) echo"<input type=hidden name='url' value='ndis_dashboard.php'>";
                // else
                echo"<input type=hidden name='url' value='".$_GET["url"]."'>
                <input type=hidden name='pstat' value='1'>
                <input type=hidden name='pid' value='".$_GET["pid"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
	echo"</body>";
?>