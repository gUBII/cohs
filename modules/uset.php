<?php
    echo $_COOKIE["userid"];
    
    echo"<hr>";
    
    foreach ($_COOKIE as $key=>$val) {
        echo $key.' is '.$val."<br>\n";
    }
    /*
    foreach ($_COOKIE as $key=>$val) {
        setcookie($key, "", time() - 9999999);
    }
    */
    
    if(isset($_COOKIE["userid"])){
        echo"<form method='GET' action='index.php' name='main' target='_top'>
            <input type=hidden name='id' value='".$_COOKIE["userid"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
?>