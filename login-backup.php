<?php
    include("include.php");
    
    include("head-light.php");
    
    echo"<div class='h-100' style='padding:0px;' id='datashiftX'>";
        
        echo"<div class='fixed-background'></div>
        <div class='container-fluid p-0 h-100 position-relative'>
            <div class='row g-0 h-100'>
                <div class='offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100'>
                    <div class='min-h-100 d-flex align-items-center'>
                        <div class='w-100 w-lg-75 w-xxl-50'>
                            <div>
                                <div class='mb-5'>
                                    <h1 class='display-3 text-white'>Nexis 365 Solutions</h1>
                                    <h1 class='display-3 text-white'>Ready for Your Project/Business</h1>
                                </div>
                                <p class='h6 text-white lh-1-5 mb-5'>
                                    Super Flexible, Powerful, Clean & Modern SAAS Based Cloud Application Solution designed for you and all type of businesses with 
                                    infinite possibilities and unlimited opportunities. <b>Actually, we know exactly how to make business shine</b>.
                                </p>
                                <div class='mb-5'><a style='cursor: pointer' href='https://www.nexis365.com/features' target='_self' class='btn btn-lg btn-outline-white'>Learn More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0'>
                    <div class='sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border'>
                        <div class='sw-lg-100 px-5'>
                            
                            <div class='sh-11'><center><a href='index.php'><img src='img/nexis365_light.png' style='width:150px;background-color:#eeeeee;border-radius:10px;padding:10px'></a></center></div>
                            <div class='mb-5'>
                                <iframe name='processor' src='blank.php?url=login&d1=Welcome&d2=let%27s get started!' height='60' width='100%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                                <center><p class='h6'>Please use your credentials to login.</p></center>
                            </div>
                            <div>
                                <form method='post' action='security.php' target='processor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                    <div class='mb-3 filled form-group tooltip-end-top'>
                                        <i data-acorn-icon='at-sign'></i>
                                        <input class='form-control' type='text' placeholder='Email' required value='info6@smsbd.com' name='uid' />
                                    </div>
                                    <div class='mb-3 filled form-group tooltip-end-top' style='color:orange'>
                                        <i data-acorn-icon='lock-off'></i>
                                        <input class='form-control pe-7' name='upass' type='password' value='1234567' placeholder='Password' required='' />";
                                        // <a style='cursor: pointer' onclick=\"sforget('0', 'datashiftX')\" target='_self' class='text-small position-absolute t-3 e-3'>Forgot?</a>
                                        echo"<a href='forgot.php' target='_self' class='text-small position-absolute t-3 e-3'>Forgot?</a>
                                    </div>
                                    <div class='mb-3 filled form-group tooltip-end-top'>
                                        <center><button type='submit' class='btn btn-lg btn-primary'>Login </button><br><br><p>OR</p>
                                        <center><p class='h6'>If you are not a member, you can account in a minute for free. <br><br><a href='register.php' style='cursor: pointer' target='_self' class='btn btn-lg btn-info t-3 e-3'>Register</a></p>
                                    </div>";
                                    // <center><a href='google-oauth.php' type='button' class='btn btn-danger' style='padding:0px'><img src='img/google-login.png' style='width:150px'></a>
                                echo"</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
        
    echo"</div>";
            
    include("scripts-light.php");
