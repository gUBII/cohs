<?php
    
    
    
    foreach ($_COOKIE as $key=>$val) {
        // setcookie($key, "", time() - 999999, "/");
        echo $key.' is '.$val."<br>\n";
    }
    
    foreach ($_COOKIE as $key=>$val) {
        setcookie($key, "", time() - 3600);
    }
?>                	
