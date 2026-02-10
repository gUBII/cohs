<?php
    error_reporting(0);
    include("../authenticator.php");
    
    if(isset($_COOKIE["client_id"])){
        
        include '../aged_care_client_bar.php';
        
    }
    
    if(isset($_COOKIE["client_id"])){
        echo"<iframe name='schedule_calendar' src='modules/schedule_calendar.php' scrolling='yes' border='0' frameborder='0' width='100%' height='700'>BROWSER NOT SUPPORTED</iframe>";
    }
    
?>