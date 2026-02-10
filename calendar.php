<?php

    if(isset($_COOKIE["userid"])){
        
        $mainurl="https://nexis365.com/saas";
        $dirurl="/saas";
        include 'authenticator.php';
        
        if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
        else $sortset=10;
        
        if(!isset($_COOKIE["sourcefrom"])){
            $sourcefrom="DESKTOP";
            setcookie("sourcefrom", $sourcefrom, time()+9999999);
        }else{
            $sourcefrom=$_COOKIE["sourcefrom"];
        }
            
        echo"<!DOCTYPE html>
            <html lang='en' data-footer='true'>";
                
            include 'head.php';
            
            if(!isset($_GET["viewset"])) $viewset=0;
            
            echo"<body>
                <div id='root'>
                    <main>
                        <div class='container'>
                            <div style='width:100%'>";
                                    
                                    include 'modules/appointments.php';

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
                        </div>
                    </main>
                </div>";
                
                include 'scripts.php';
                
            echo"</body>
        </html>";
        
    }else{
        echo"<form method='POST' action='login.php' name='main' target='_top'><input type=hidden name='uid' value=''><input type=hidden name='nexis' value='0'><input type=hidden name='smsbd' value='0'></form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
?>
</html>