<?php

    if(isset($_COOKIE["userid"])){
        
        $mainurl="https://nexis365.com/cohs";
        
        $dirurl="/cohs";
        
        include 'authenticator.php';
        
        if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
        else $sortset=10;
        
        if(!isset($_COOKIE["sourcefrom"])){
            if(isset($_GET["sourcefrom"])) $sourcefrom=$_GET["sourcefrom"];
            else $sourcefrom="DESKTOP";
            if($_GET["url"]=="app_eod.php") $sourcefrom="APP";
            if($_GET["url"]=="app_boc.php") $sourcefrom="APP";
            if($_GET["url"]=="app_incident.php") $sourcefrom="APP";
            
            setcookie("sourcefrom", $sourcefrom, time()+9999999);
        }else{
            if($_GET["url"]=="app_eod.php") $sourcefrom="APP";
            else if($_GET["url"]=="app_boc.php") $sourcefrom="APP";
            else if($_GET["url"]=="app_incident.php") $sourcefrom="APP";
            else $sourcefrom=$_COOKIE["sourcefrom"];
        }
            
        echo"<!DOCTYPE html>";
        
        if($_GET["url"]=="schedule.php"){
            ?><html data-override='{"attributes": {"placement": "horizontal", "behaviour": "unpinned" }}'> <?php
        }else{
            echo"<html lang='en' data-footer='true'>";
        }
                
            include 'head.php';
            
            if(!isset($_GET["viewset"])) $viewset=0;
            
            if($sourcefrom!="APP"){
                
                if($viewpoint!="DESKTOP"){
                    ?><style>
                        .footerx {
                            position: fixed;
                            left: 0;
                            bottom: 0;
                            width: 100%;
                            background-color: ;
                            color: white;
                            text-align: center;
                        }
                    </style><?php
                    echo"<div class='footerx bg-primary' style='height:60px;z-index:9999'>
                        <table style='width:100%;height:40px;margin-top:-2px'><tr>
                            <td align=center width='17%' valign=middle><a href='index.php?url=my_profile.php&id=".$_COOKIE["userid"]."' class=''><div style='border-radius:50%;width:50px;padding:10px'><i data-acorn-icon='user' class='icon' data-acorn-size='22' style='color:white'></i></div></a></td>
                            <td align=center width='17%' valign=middle><a href='index.php?url=pay_slip.php&id=51' class=''><div style='border-radius:50%;width:50px;padding:10px'><i data-acorn-icon='wallet' class='icon' data-acorn-size='22' style='color:white'></i></div></a></td>
                            <td align=center width='17%' valign=middle><a href='index.php' class=''><div style='border-radius:50%;width:50px;padding:10px'><i data-acorn-icon='home' class='icon' data-acorn-size='22' style='color:white'></i></div></a></td>
                            <td align=center width='17%' valign=middle><a href='index.php?url=document_manager.php&id=786' class=''><div style='border-radius:50%;width:50px;padding:10px'><i data-acorn-icon='file-text' class='icon' data-acorn-size='22' style='color:white'></i></div></a></td>
                            <td align=center width='17%' valign=middle><a href='index.php?url=settings.php' class=''><div style='border-radius:50%;width:50px;padding:10px'><i data-acorn-icon='settings-1' class='icon' data-acorn-size='22' style='color:white'></i></div></a></td>
                            <td align=center width='30px' valign=middle>&nbsp;</a></td>
                        </tr></table>
                    </div>";
                }
                
            }
            
            echo"<body>
                <div id='root'>";
                    
                    if($sourcefrom!="APP") include 'nav_bars.php';
                    
                    echo"<main>
                        <div class='container'>
                            <div style='width:100%' id='datashiftX'>";
                            
                                // WALKTHROUGH MODAL
                                if($assistant==0){
                                    if($designationy==13) {
                                        if($sourcefrom!="APP"){
                                            if($walkthrough<=89){
                                                echo"<div class='modal fade' id='semiFullExample' tabindex='-1' role='dialog' aria-hidden='true'>
                                                    <div class='modal-dialog modal-semi-full modal-dialog-scrollable modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header' style='padding:10px'>
                                                                <h5 class='modal-title' id='overlayScrollShortLabel'>Your Walkthrough Assistant</h5>
                                                                
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                &nbsp;&nbsp;|&nbsp;&nbsp;
                                                                <a href='addrecord.php?suspend_assistant=1&url=".$_GET["url"]."&id=".$_GET["id"]."' style='text-align:right'> Suspend</a>
                                                            </div>
                                                            <div class='modal-body' style='padding:10px'><div class='scroll-track-visible' id='walkthroughX'>";
                                                                include 'modules/walkthrough.php';
                                                            echo"</div></div>
                                                        </div>
                                                    </div>
                                                </div>";
                          
                                                /* <div class='modal fade' id='semiFullExample' tabindex='-1' role='dialog' aria-hidden='true'>
                                                    <div class='modal-dialog modal-lg modal-dialog-scrollable short modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='overlayScrollShortLabel'>Your Walkthrough Assistant</h5>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'><div class='scroll-track-visible' id='walkthroughX'>";
                                                                include 'modules/walkthrough.php';
                                                            echo"</div></div>
                                                        </div>
                                                    </div>
                                                </div>";
                                                */ ?>
                                                <script type="text/javascript">
                                                    $(window).on('load', function() {
                                                        $('#semiFullExample').modal('show');
                                                    });
                                                </script> <?php
                                            }
                                        }
                                    }
                                }
                                
                                if(isset($_GET["url"])){
                                    
                                    $url="modules/".$_GET["url"]."";
                                    
                                    if($_GET["url"]=="clients_dashboard.php") $url="modules/projects.php";
                                    if($_GET["url"]=="client_onboarding.php") $url="modules/workspace.php";
                                    
                                    include $url;
                                    
                                }else{
                                    // echo"".$_COOKIE["dbname"]."";
                                    
                                    if($mtype=="USER") include 'modules/users_dashboard.php';
                                    if($mtype=="CARE") include 'modules/users_dashboard.php';
                                    if($mtype=="VENDOR") include 'modules/vendor_dashboard.php';
                                    if($mtype=="ADMIN"){
                                        
                                        if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                                            echo"<form method='get' action='global-unset.php' name='main' target='_top'>
                                            <input type=hidden name='pstat' value='1'><input type=hidden name='id' value='786'>";
                                            echo"<input type=hidden name='url' value='aged_care_dashboard.php'>"; 
                                            // echo"<input type=hidden name='url' value='all_in_one_pack.php'>
                                            echo"<input type=hidden name='sourcefrom' value=''>";
                                            ?> <script language=JavaScript> document.main.submit(); </script> <?php
                                        } else {
                                            include 'modules/dashboards.php';
                                        }
                                        
                                    }
                                    if($mtype=="CLIENT"){
                                        
                                        include 'modules/client_dashboard.php';
                                        
                                        /*
                                        echo"<form method='get' action='global-unset.php' name='main' target='_top'>
                                            <input type=hidden name='projectidx' value='1'><input type=hidden name='pstat' value='1'><input type=hidden name='id' value='62'><input type=hidden name='url' value='projects.php'>
                                        </form>";
                                        */
                                        ?><!--- <script language=JavaScript> document.main.submit(); </script> ---><?php
                                    }
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
                        
                        ?><script>
                            function printDiv(divID) {
                                 var divElem = document.getElementById(divID).innerHTML;
                                 var printWindow = window.open('', '', 'height=210,width=350'); 
                                 printWindow.document.write('<html><head><title></title></head>');
                                 printWindow.document.write('<body>');
                                 printWindow.document.write(divElem);
                                 printWindow.document.write('</body>');
                                 printWindow.document.write ('</html>');
                                 printWindow.document.close();
                                 printWindow.print();
                            }
                        </script>
                    	
                    	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
                        
                        <script>
                            var element = document.getElementById('element-to-print');
                            html2pdf(element, {
                                margin: 10,
                                filename: 'casefile.pdf',
                                image: { type: 'jpeg', quality: 0.98 },
                                html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
                                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                            });
                        </script>
                        
                        <?php
                        
                        echo"<div class='offcanvas offcanvas-top' tabindex='-1' id='offcanvasTop2' aria-labelledby='offcanvasTopLabel' style='height:100%'>
                            <div class='offcanvas-header'>
                                <h5 id='offcanvasTopLabel'>Loading...</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'>...</div>
                        </div>";
                        
                        // Right Side Bar
                        echo"<div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasRight' aria-labelledby='offcanvasRightLabel' style='z-index:9999'>                            
                            <div class='offcanvas-header'>
                                <h5 id='offcanvasRightLabel'>Loading...</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'>...</div>                            
                        </div>";
                        
                        echo"<div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasRightLarge' aria-labelledby='offcanvasRightLabel' style='width:50%'>
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
                        
                        // Left Side Bar. FILTER
                        echo"<div class='offcanvas offcanvas-start' tabindex='-1' style='z-index:9999999' id='offcanvasLeftFilter2' aria-labelledby='offcanvasExampleLabel'>
                            <div class='offcanvas-header'>
                                <h5 class='offcanvas-title' id='offcanvasExampleLabel'>Ask Nexis AI for Suggestion</h5>
                                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                            </div>
                            <div class='offcanvas-body'><div>
                                <div class='mb-3'>
                                    <label for='userQuestion' class='form-label'>Your Question</label>
                                    <textarea class='form-control' id='userQuestion' rows='3'>Suggest me professional email message to conveance my prospective client</textarea>
                                </div>
                                <div class='d-flex gap-2'>
                                    <button class='btn btn-success' onclick='askGPT()'>Ask</button>
                                    <button class='btn btn-secondary' onclick='clearChat()'>Clear</button>
                                </div>
                                <hr>
                                <h6>Response:</h6>
                                <div id='gptResponse' class='border rounded p-2' style='min-height: 100px;'></div>
                            </div></div>
                        </div>"; ?>
                        
                        <script>
                            async function askGPT() {
                                const question = document.getElementById("userQuestion").value;
                                const responseDiv = document.getElementById("gptResponse");
                        
                                responseDiv.innerHTML = "<em>Thinking...</em>";
                        
                                try {
                                    const res = await fetch("https://api.openai.com/v1/chat/completions", {
                                        method: "POST",
                                        headers: {
                                            "Content-Type": "application/json",
                                            "Authorization": "Bearer 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"
                                        },
                                        body: JSON.stringify({
                                            model: "gpt-3.5-turbo",
                                            messages: [{ role: "user", content: question }]
                                        })
                                    });
                        
                                    const data = await res.json();
                                    responseDiv.innerHTML = data.choices?.[0]?.message?.content || "No response received.";
                                } catch (err) {
                                    responseDiv.innerHTML = "Error: " + err.message;
                                }
                            }
                            
                            function clearChat() {
                                document.getElementById("userQuestion").value = "";
                                document.getElementById("gptResponse").innerHTML = "";
                            }
                        </script> <?php

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
                        
                        if($sourcefrom!="APP"){
                            echo"<div class='open-button' onclick='openForm()' style='z-index:99999999999'>
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
                        }
                        
                        // Search Modal Start 
                        echo"<div class='modal fade modal-under-nav modal-search modal-close-out' id='searchPagesModal' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'><center>
                                    <img src='assets/search-banner.png' style='width:98%;margin-top:15px'></center>
                                    <div class='modal-header border-0 p-0'><button type='button' class='btn-close btn btn-icon btn-icon-only btn-foreground' data-bs-dismiss='modal' aria-label='Close'></button></div>
                                    <div class='modal-body ps-5 pe-5 pb-0 border-0' style='margin-top:-120px'>
                                        <form id='outputform' name='voicebar' action='index.php' method='get'><input type=hidden name='url' value='searchquery'>
                                            <div class='' style='width:100%;background-color:black;color:lightblue;border-radius:10px;padding:5px;border: 1px solid lightblue;'>
                                                <table style='width:100%'><tr> 
                                                    <td>
                                                        <div id='output' style='background-color:black;color:lightblue;padding:10px;font-size:15pt;border-radius:20px;width:100%;height:50px;'></div>
                                                    </td>
                                                    <td style='width:50px'><center>
                                                        <div class='btn btn-primary btn-icon btn-icon-start w-md-auto' id='startButton'><center>
                                                            <i data-acorn-icon='mic'></i></center>
                                                        </div>
                                                    </center></td>
                                                    </td><td style='width:50px'><center>
                                                        <input type='hidden' id='text2' value='Initializing'>
                                                        <div class='btn btn-secondary btn-icon btn-icon-start w-md-auto' onclick=\"speak2(); voicedataV2('voice_data.php?cid=1&sheba=2', 'voicesearchX')\"><center>
                                                            <i class='fa fa-search' id='clearButton' ></i>
                                                        </div>
                                                        <div id='convert_text'></div>
                                                    </td><td style='width:50px'><center>
                                                        <div class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto' ><center>
                                                            <i class='fa fa-copy' id='copyButton'></i>
                                                        </div>
                                                    </td>
                                                    <td style='width:10px'>&nbsp;</td>
                                                </tr></table>
                                            </div>
                                            <br><br>
                                            <div id='voicesearchX'></div>
                                            <div style='text-align:right'>
                                                <img src='assets/lets-talk.png' style='position:absolute;margin-left:10px;margin-top:-40px;width:30px'>
                                                <img src='assets/talk.png' style='position:absolute;width:50px;margin-top:-20px;margin-left:-20px'>
                                            </div>
                                            <input id='outputx' name='searchbar' class='form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete' type='hidden' autocomplete='off' />
                                            <script src='assets/voice-script4.js'></script>
                                        </form
                                    </div>
                                    <div class='modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0'>
                                        <span class='text-alternate d-inline-block m-0 me-3'>
                                            <i data-acorn-icon='arrow-bottom' data-acorn-size='15' class='text-alternate align-middle me-1'></i><span class='align-middle text-medium'>Navigate</span>
                                        </span>
                                        <span class='text-alternate d-inline-block m-0 me-3'>
                                            <i data-acorn-icon='cursor-default' data-acorn-size='15' class='text-alternate align-middle me-1'></i><span class='align-middle text-medium'>Click</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        // AI Modal Start
                        echo"<div class='modal fade' id='aiPagesModal' tabindex='-1' role='dialog' aria-labelledby='aiPagesModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-scrollable'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='aiPagesModalLabel'>Nexis AI Project Automation</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body' style='padding:10px'><br><center>
                                        <form action='ai_wizard.php' method='post' target='aiwizard' enctype='multipart/form-data'>
                                            <table style='width:100%'><tr>
                                                <td><input type='file' class='form-control' name='image' id='image' required></td>
                                                <td style='width:30px'><button class='btn btn-primary' type='submit'>Build</button></td>
                                            </tr></table>
                                        </form>
                                        <iframe name='aiwizard' src='null.php' height='300px' width='100%' scrolling='yes' border='0' frameborder='0'>&nbsp;</iframe>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        <button type='button' class='btn btn-primary'>Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        // Center Modal Start 1
                        echo"<div class='modal fade modal-close-out' id='CenterPageModal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content' style='padding:5px'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Task Editor</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body' id='PopupModalX' style='padding:5px'>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        // Center Modal Start 2
                        echo"<div class='modal fade' id='CenterPageModal' tabindex='-1' role='dialog' aria-labelledby='CenterPageModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='verticallyCenteredScrollableLabel'>Loading...</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'></div>
                                    <div class='modal-footer'><button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button></div>
                                </div>
                            </div>
                        </div>";
                        
                        
                        
                    echo"</main>";
                    
                    if($sourcefrom!="APP") include 'footer.php';

                echo"</div>";
                
                
                if($sourcefrom!="APP" && $viewpoint=="DESKTOP") include 'theme_bar.php';
                
                if($_GET["url"]=="workspace.php" OR $_GET["url"]=="eod.php") include("scripts-light.php");
                else include 'scripts.php';
                
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

