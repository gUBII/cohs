<?php
    echo"
    <div style='width:100%;text-align:center;background-color:#222222'>
        <div class='row' style='width:98%'>
            <div class='col-md-3' style='margin-top:15px'>LOGO</div>
            <div class='col-md-' style='margin-top:15px'></div>
        </div>
    </div>
    <section class='content-main mt-80 mb-80' style='background-color:black'>
        <div class='card mx-auto card-login'>
            <div class='card-body'>
                <center><img src='assets/logo.png'></center><br>
                <iframe name='processor' src='blank.php' height='60' width='100%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                <h4 class='card-title mb-4'>Sign in</h4>
                <form method='post' action='sec.php' target='processor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <div class='mb-3'><input class='form-control' placeholder='Username or email' type='text' name='unbox'></div>
                    <div class='mb-3'><input class='form-control' placeholder='Password' type='password' name='unpass'></div>
                    <div class='mb-3'><a href='#' class='float-end font-sm text-muted'>Forgot password?</a>
                        <label class='form-check'>
                            <input type='checkbox' class='form-check-input' checked=''>
                            <span class='form-check-label'>Remember</span>
                        </label>
                    </div>
                    <div class='mb-4'><button type='submit' class='btn btn-primary w-100'> Login </button></div>
                </form>
            </div>
        </div>
    </section>";
?>
