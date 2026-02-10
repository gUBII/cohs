<?php
    $rootdb = new mysqli('localhost', 'saas', 'Bangladesh$$786', 'saas');
    if ($rootdb->connect_error) die("Connection failed: " . $rootdb->connect_error);
    
    date_default_timezone_set("Australia/Melbourne");
    
    $originalTimestamp = strtotime("now");
    $timestampPlus30Days = strtotime("+30 days", $originalTimestamp); 
    
    $sql="update subscription set plan='1',edate='$timestampPlus30Days' where cid='".$_COOKIE["dbname"]."'";
    if ($rootdb->query($sql) === TRUE){
        echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='id' value='786'></form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
?>