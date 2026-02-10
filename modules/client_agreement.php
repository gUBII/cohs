<?php
    error_reporting(0);
    include("../authenticator.php");
    
    if(isset($_COOKIE["client_id"])){
        
        include '../aged_care_client_bar.php';
        
    }
    
    if(isset($_COOKIE["client_id"])){
        echo"<div class='row'>
            <div class='col-12'><h2 class='small-title'>Service Agreement</h2></div>
        </div>";
    }
  
?>