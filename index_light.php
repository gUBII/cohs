<?php

    if(isset($_COOKIE["userid"])){
        
        $mainurl="https://nexis365.com/saas";
        $dirurl="/saas";
        
        include 'authenticator.php';
        
        echo"<!DOCTYPE html>
            <html lang='en' data-footer='true'>";
                
            include 'head.php';
            
            echo"<body>
                <div id='root'>
                    <main>
                        <div class='container'>
                            <div style='width:100%'>";
                                if(isset($_GET["url"])){
                                    $url="modules/".$_GET["url"]."";
                                    include $url;
                                }
                            echo"</div>
                        </div>
                    </main>";
                    
                    include 'footer.php';

                echo"</div>";
                
                include 'scripts.php';
                
            echo"</body>
        </html>";
        
    }else{
        echo"<form method='POST' action='login.php' name='main' target='_top'><input type=hidden name='uid' value=''><input type=hidden name='nexis' value='0'><input type=hidden name='smsbd' value='0'></form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
?>