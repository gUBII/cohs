<?php
    $yr=date("Y");
    // FOOTER TEXTS
    if($viewpoint=="DESKTOP") {
        echo"<footer>
            <div class='footer-content'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-12 col-sm-6'><p class='mb-0 text-muted text-medium'>Nexis Solutions since 2022~$yr</p></div>
                        <div class='col-sm-6 d-none d-sm-block'>
                            <ul class='breadcrumb pt-0 pe-0 mb-0 float-end'>
                                <li class='breadcrumb-item mb-0 text-medium'><a href='https://www.nexis365.com/terms_of_service' target='_self' class='btn-link'>Terms & Conditions</a></li>
                                <li class='breadcrumb-item mb-0 text-medium'><a href='https://www.nexis365.com/privacy_policy' target='_self' class='btn-link'>Privacy Policy</a></li>
                                <li class='breadcrumb-item mb-0 text-medium'><a href='index.php?url=../subscription-plans.php#faq' target='_self' class='btn-link'>FAQ</a></li>
                                <li class='breadcrumb-item mb-0 text-medium'><a href='#' target='_blank' class='btn-link'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>"; 
    }
?>    
    