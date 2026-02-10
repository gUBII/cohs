<?php

    if(isset($_COOKIE["chartmode"])){

        // if($_COOKIE["chartmode"]=="ON") echo"ON";
        // else echo"OFF";
        // echo" ".$_GET["cid"].", ".$_GET["sheba"].", ".$_GET["utype"]."";
        
        if($_COOKIE["chartmode"]=="ON"){
            echo $_GET["sheba"];
            
            echo"<iframe name='events' src='./modules/user_chart.php' scrolling='no' style='border: 0px solid #eeeeee' border='0' frameborder='0' width='100%' height='400'>BROWSER NOT SUPPORTED</iframe>";
        }

    }