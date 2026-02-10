<?php
    include("authenticatorx.php");

    echo"<div class='page-header breadcrumb-wrap'>
        <div class='container'>
            <div class='breadcrumb'>
                <a href='index.php' rel='nofollow'>Home</a>
                <span></span> Authentication
                <span></span> ";
                if($_GET["vt"]==3) echo"Login";
                if($_GET["vt"]==4) echo"Create New Account";
                if($_GET["vt"]==5) echo"Seller Registration";
                if($_GET["vt"]==6) echo"Reset Password";
                echo"</div>
            </div>
        </div>
        <section class='pt-50 pb-50' style='background-color:$bodybc;color:$bodytc'>
            <div class='container'><div class='row'><center>";

                if($_GET["vt"]==3){
                    if(isset($_REQUEST["msgx"])) $msgx=$_REQUEST["msgx"]; else $msgx=null;
					if(isset($_REQUEST["fphone"])) $fphone=$_REQUEST["fphone"]; else $fphone=null;

                    echo"<div class='col-lg-4'>
                        <div class='login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5' style='background-color:white;color:black'>
                            <div class='padding_eight_all bg-white'>
                                <div class='heading_s1'><h3 class='mb-30'>Login</h3></div>
                                
                                <form name='formuserslogin' action='auth.php' method='post' target='addtocart' style='text-align:left'>

                                    <div class='form-group'><label>Mobile Number</label>
                                        <input type='text' required='' required placeholder='Your Registered Phone Number' value='$fphone' name='fphone'>
                                    </div>

                                    <div class='form-group' style='text-align:left'><label>Password</label>
                                        <input required='' type='password' placeholder='Password' minlength='5' required name='fpass'>
                                    </div>

                                    <div class='login_footer form-group'>

                                        <div class='chek-form'>
                                            <div class='custome-checkbox'>
                                                <input class='form-check-input' type='checkbox' name='checkbox' id='exampleCheckbox1' value=''>
                                                <label class='form-check-label' for='exampleCheckbox1'><span>Remember me</span></label>
                                            </div>
                                        </div>

                                        <a href='#top' class='text-muted' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=6'); shiftdatax('security.php?cPath=90000&vt=6&cm=1', 'datashiftX')\" target='_self' title='Forgot Password'>Forgot password?</a>

                                    </div>

                                    <div class='form-group'>
                                        <button type='submit' class='btn btn-fill-out btn-block hover-up' name='login'>Log in</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>";
                }

                if($_GET["vt"]==4){
                    echo"<div class='col-lg-6'>
                        <div class='login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5' style='background-color:white;color:black'>
                            <div class='padding_eight_all bg-white'>
                                <div class='heading_s1'><h3 class='mb-30'>Create An Account</h3></div>
                                <p class='mb-50 font-sm'>
                                    Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy
                                </p>
                                <form name='formusersregistration' action='auth.php' method='post' target='addtocart' style='text-align:left'>
                                    <div class='row'>
                                        <div class='col-lg-6'>
                                            <div class='form-group'><label>First Name</label>
                                                <input type='text' required='' name='firstname' placeholder='First Name'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Last name</label>
                                                <input type='text' required='' name='lastname' placeholder='Last Name'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Email Address</label>
                                                <input type='email' required='' name='email' placeholder='Email Address'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Phone Number</label>
                                                <input type='number' required='' name='phone' placeholder='Phone Number'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Login Password</label>
                                                <input required='' type='password' name='password' placeholder='Password'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Confirm Password</label>
                                                <input required='' type='password' name='repassword' placeholder='Confirm password'>
                                            </div>
                                        </div><div class='col-lg-12'>
                                            <div class='form-group'><label>Account Type</label><br>
                                                <div class='row'>
                                                    <div class='col-lg-4'>
                                                        <label><input required='' type='radio' name='actype' style='height:15px;width:40px' value='1' checked onclick='seller_hidden()' ><span class='form-check-label'>I am a Customer</span></label>
                                                    </div>
                                                    <div class='col-lg-4'>
                                                        <label><input required='' type='radio' name='actype' style='height:15px;width:40px' value='2' onclick='seller_visible()'><span class='form-check-label'>I am a Seller.<span></label>
                                                    </div>
                                                <div id='storedetail' style='display:none'>
                                                    <div id='sname'><label>Store Name</label>
                                                        <input type='text' name='sname' placeholder='Store/Shop Name'>
                                                    </div>
                                                    <div id='saddress'><label>Store Address</label>
                                                        <input type='text' name='saddress'  placeholder='Store/Shop Address'>
                                                    </div>
                                                    <div id='sphone'><label>Store Phone</label>
                                                        <input type='text' name='sphone' placeholder='Store/Shop Phone'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><div class='col-lg-12'>
                                            <div class='login_footer form-group'>
                                                <div class='chek-form'>
                                                    <div class='custome-checkbox'>
                                                        <input class='form-check-input' type='checkbox' name='checkbox' required='' id='exampleCheckbox12' value=''>
                                                        <label class='form-check-label' for='exampleCheckbox12'><span>I agree to 
                                                            <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=488'); shiftdatax('pages.php?cPath=80010&pageid=488&cm=1', 'datashiftX')\" target='_self' title='Terms & Conditions'>Terms</a> &amp; 
                                                            <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=487'); shiftdatax('pages.php?cPath=80010&pageid=487&cm=1', 'datashiftX')\" target='_self' title='Privacy & Policy'>Privacy Policy</a>.</span></label>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div><div class='col-lg-12'>
                                            <div class='form-group'>
                                                <button type='submit' class='btn btn-fill-out btn-block hover-up' name='login'>Submit &amp; Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>";

                                /*
                                    <div class='divider-text-center mt-15 mb-15'><span> or</span></div>
                                    <ul class='btn-login list_none text-center mb-15'>
                                        <li><a href='#' class='btn btn-facebook hover-up mb-lg-0 mb-sm-4'>Login With Facebook</a></li>
                                        <li><a href='#' class='btn btn-google hover-up'>Login With Google</a></li>
                                    </ul>
                                */

                                echo"<div class='text-muted text-center'>Already have an account? <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=3'); shiftdatax('security.php?vt=3&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Login'>Login</a></div>
                            </div>
                        </div>
                    </div>";
                }
                if($_GET["vt"]==5){
                    echo"<div class='col-lg-6'>
                        <div class='login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5' style='background-color:white;color:black'>
                            <div class='padding_eight_all bg-white'>
                                <div class='heading_s1'><h3 class='mb-30'>Create An Account</h3></div>
                                <p class='mb-50 font-sm'>
                                    Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy
                                </p>
                                <form name='formusersregistration' action='auth.php' method='post' target='addtocart' style='text-align:left'>
                                    <input type='hidden' name='actype2' value='2'>
                                    <div class='row'>
                                        <div class='col-lg-12'>
                                            <div class='form-group'><label>Store Name</label>
                                                <input type='text' name='sname' placeholder='Store/Shop Name'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>First Name</label>
                                                <input type='text' required='' name='firstname' placeholder='First Name'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Last name</label>
                                                <input type='text' required='' name='lastname' placeholder='Last Name'>
                                            </div>
                                        </div><div class='col-lg-12'>
                                            <div class='form-group'><label>Store Address</label>
                                                <input type='number' name='saddress'  placeholder='Store/Shop Address'>
                                            </div>
                                        </div><div class='col-lg-4'>
                                            <div class='form-group'><label>City</label><input type='text' name='scity' placeholder='City'></div>
                                        </div><div class='col-lg-4'>
                                            <div class='form-group'><label>State</label><input type='text' name='sstate' placeholder='State'></div>
                                        </div><div class='col-lg-4'>
                                            <div class='form-group'><label>Zip</label><input type='text' name='sstate' placeholder='Zip'></div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Country</label><input type='text' name='scountry' placeholder='Country'></div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Store Contact Number</label><input type='text' name='sphone' placeholder='Store/Shop Phone' onchange='this.form.phone.value=this.value'></div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Email Address</label>
                                                <input type='email' required='' name='email' placeholder='Email Address'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Phone (For Login)</label>
                                                <input type='number' required='' name='phone' placeholder='Phone Number'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Login Password</label>
                                                <input required='' type='password' name='password' placeholder='Password'>
                                            </div>
                                        </div><div class='col-lg-6'>
                                            <div class='form-group'><label>Confirm Password</label>
                                                <input required='' type='password' name='repassword' placeholder='Confirm password'>
                                            </div>
                                        </div><div class='col-lg-12'>
                                            <div class='login_footer form-group'>
                                                <div class='chek-form'>
                                                    <div class='custome-checkbox'>
                                                        <input class='form-check-input' type='checkbox' name='checkbox' required='' id='exampleCheckbox12' value=''>
                                                        <label class='form-check-label' for='exampleCheckbox12'><span>I agree to 
                                                            <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=488'); shiftdatax('pages.php?cPath=80010&pageid=488&cm=1', 'datashiftX')\" target='_self' title='Terms & Conditions'>Terms</a> &amp; 
                                                            <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80010&pageid=487'); shiftdatax('pages.php?cPath=80010&pageid=487&cm=1', 'datashiftX')\" target='_self' title='Privacy & Policy'>Privacy Policy</a>.</span></label>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div><div class='col-lg-12'>
                                            <div class='form-group'>
                                                <button type='submit' class='btn btn-fill-out btn-block hover-up' name='login'>Submit &amp; Register</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>";

                                /*
                                    <div class='divider-text-center mt-15 mb-15'><span> or</span></div>
                                    <ul class='btn-login list_none text-center mb-15'>
                                        <li><a href='#' class='btn btn-facebook hover-up mb-lg-0 mb-sm-4'>Login With Facebook</a></li>
                                        <li><a href='#' class='btn btn-google hover-up'>Login With Google</a></li>
                                    </ul>
                                */

                                echo"<div class='text-muted text-center'>Already have an account? <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=3'); shiftdatax('security.php?vt=3&cPath=90000&cm=1', 'datashiftX')\" target='_self' title='Login'>Login</a></div>
                            </div>
                        </div>
                    </div>";
                }

                if($_GET["vt"]==6){
                    if(isset($_REQUEST["msgx"])) $msgx=$_REQUEST["msgx"]; else $msgx=null;
					if(isset($_REQUEST["rphone"])) $rphone=$_REQUEST["rphone"]; else $rphone=null;
                    if(isset($_REQUEST["remail"])) $remail=$_REQUEST["remail"]; else $remail=null;

                    echo"<div class='col-lg-4'>
                        <div class='login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5' style='background-color:white;color:black'>
                            <div class='padding_eight_all bg-white'>
                                <div class='heading_s1'><h3 class='mb-30'>Forgot Password? Reset It!</h3></div>
                                
                                <form name='formuserslogin' action='auth.php' method='post' target='addtocart' style='text-align:left'>

                                    <div class='form-group'><label>Mobile Number</label>
                                        <input type='number' required='' required placeholder='Your Registered Phone Number' value='$rphone' name='rphone'>
                                    </div>
                                    <div class='form-group'><label>Email Address</label>
                                        <input type='email' required='' required placeholder='Your Registered Phone Number' value='$remail' name='remail'>
                                    </div>

                                    <div class='form-group'>
                                        <button type='submit' class='btn btn-fill-out btn-block hover-up' name='login'>Reset Password Link to Email</button>
                                    </div>
                                    <div><center>
                                        <a href='#top' class='text-muted' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=90000&vt=3'); shiftdatax('security.php?cPath=90000&vt=3&cm=1', 'datashiftX')\" target='_self' title='Login Page'>Back to LOGIN</a>
                                    </div>                                   

                                </form>
                            </div>
                        </div>
                    </div>";
                }
            echo"</div>
        </section>
    </div>";
?>