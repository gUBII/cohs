<?php

    if(isset($_COOKIE["userid"])){
        
        $mainurl="https://www.nexis365.com/saas";
        
        $dirurl="/saas";

        include 'authenticator.php';
        
        if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
        else $sortset=10;

        echo"<!DOCTYPE html>
        <html lang='en' data-footer='true'>";
                
            include 'head.php';
    
            echo"<body>
                <div id='root'>";
                        
                    include 'nav_bars.php';
                        
                    echo"<main>
                        <div class='container'>
                            <div style='width:100%' id='datashiftX'>";
                            
                                if(isset($_GET["url"])){
                                    $url="modules/".$_GET["url"]."";
                                    include $url;
                                }else{
                                    include 'modules/ndis_dashboard.php';
                                }

                            echo"</div>
                        </div>";
                        
                        // Top Side Bar
                        echo"<div class='offcanvas offcanvas-top' tabindex='-1' id='offcanvasTop' aria-labelledby='offcanvasTopLabel'>
                            <div class='offcanvas-header'>
                                <h5 id='offcanvasTopLabel'>Loading...</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'>...</div>
                        </div>";

                        echo"<div class='offcanvas offcanvas-top' tabindex='-1' id='offcanvasTop2' aria-labelledby='offcanvasTopLabel' style='height:100%'>
                            <div class='offcanvas-header'>
                                <h5 id='offcanvasTopLabel'>Loading...</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'>...</div>
                        </div>";

                        // Right Side Bar
                        echo"<div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasRight' aria-labelledby='offcanvasRightLabel'>                            
                            <div class='offcanvas-header'>
                                <h5 id='offcanvasRightLabel'>Loading...</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'>...</div>                            
                        </div>
                        <div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasRightLarge' aria-labelledby='offcanvasRightLabel' style='width:50%'>
                            <div class='offcanvas-header'>
                                <h5 id='offcanvasRightLabel'>Loading...</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'>...</div>                            
                        </div>";

                        // Left Side Bar. FILTER
                        echo"<div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasLeftFilter' aria-labelledby='offcanvasExampleLabel'>
                            <div class='offcanvas-header'>
                                <h5 class='offcanvas-title' id='offcanvasExampleLabel'>Loading...</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'><div></div></div>
                        </div>";

                        // confirm delete modal bar
                        echo"<div class='modal fade' id='DeleteDataModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelDefault' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabelDefault'>Confirm Delete ?</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body' id='deletedataX'>...</div>
                                </div>
                            </div>
                        </div>";
                        
                        echo"<div class='open-button' onclick='openForm()'>
                            <img src='assets/lets-talk.png' style='position:absolute;margin-left:10px;margin-top:-40px;width:30px'>
                            <img src='assets/talk.png' style='position:absolute;width:50px;margin-top:-20px;margin-left:-20px'>
                        </div>
                        <div class='chat-popup' id='myForm' style='width:400px;background-color:#eeeeee'>
                            <form action='/action_page.php' class='form-container'>
                                <table style='width:100%'>
                                    <tr><td style='color:black;font-size:12pt'>&nbsp;&nbsp;&nbsp;Nexis Chat Bot (Under Training).</td><td style='width:20px'><a href='#' onclick='closeForm()'><i class='fa fa-times'></i></a></td></tr>
                                    <tr><td colspan=2><iframe name='chatbot' src='bot.php' height='470px' width='100%' scrolling='yes' border='0' frameborder='0'>&nbsp;</iframe></td></tr>
                                </table>
                            </form>
                        </div>";
                        
                    echo"</main>";
                    
                    include 'footer.php';

                echo"</div>";
                
                include 'theme_bar.php';
                
                include 'scripts.php';
                
            echo"</body>
        </html>";
        
    }else{
        echo"<form method='POST' action='login.php' name='main' target='_top'><input type=hidden name='uid' value=''><input type=hidden name='nexis' value='0'><input type=hidden name='smsbd' value='0'></form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
?>
</html>

<?php
/*

NOTES:
    
    *** USE USERS Physiology

    // session_start();
    // echo '<pre>';var_dump($_SESSION);echo '</pre>';
    // foreach ($_SESSION as $key=>$val)
    // echo $key." ".$val."<br/>";
    // echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
    // echo json_encode($_SESSION);
    

<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='uid' value='$uid'><input type=hidden name='nexis' value='0'><input type=hidden name='smsbd' value='0'></form>";
?> <script language=JavaScript> document.main.submit(); </script> <?php
echo"<script>alert('..')</script>";

echo"<a style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=462'); shiftdata3('462', 'datashiftX')\" target='_self'> </a>";    
<a href='index.php'><img src='img/nexis365_light.png' alt='Nexis365.com' style='margin-top:20px;width:100px;background-color:white;border-radius:10px;padding:10px;' /></a>

*/

?>

