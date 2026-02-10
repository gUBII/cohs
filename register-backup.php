 <?php
    include("authenticator.php");
    
    include("head-light.php");
    
    // error_reporting(0);
    
    if(isset($_COOKIE["userid"])){
        echo"<form method='POST' action='logout.php' name='main' target='_top'>
            <input type=hidden name='redirect_url' value='register.php'><input type=hidden name='id' value='5138'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }

    echo"<div class='h-100' style='padding:0px;' id='datashiftX'>
        <div class='fixed-background'></div>
        
        <div class='container-fluid p-0 h-100 position-relative'>
            <div class='row g-0 h-100'>
                        
                <div class='offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100'>
                    <div class='min-h-100 d-flex align-items-center'>
                        <div class='w-100 w-lg-75 w-xxl-50'>
                            <div>
                                <div class='mb-5' style='min-width:500px'>
                                    <h1 class='display-3 text-white'><b>Start your free trial.</b></h1>
                                    <span style='color:lightyellow;font-size:14pt'>No credit card required, no software to install.</span>
                                </div>
                                <p class='h6 text-white lh-1-5 mb-5' style='min-width:500px'>
                                    <span style='color:lightyellow;font-size:10pt'><b>With your 30-day trial, you get:</b></span><br>
                                        <i data-acorn-icon='check-square'></i> Pre-loaded data or upload your own<br>
                                        <i data-acorn-icon='check-square'></i> Pre-configured processes, reports, and dashboards<br>
                                        <i data-acorn-icon='check-square'></i> Guided experiences for sales reps, leaders, and administrators<br>
                                        <i data-acorn-icon='check-square'></i> Online training and live onboarding webinars<br><br>
                                    <span style='color:lightyellow;font-size:12pt'>Questions? Talk to an expert: <b>+61 416 103 924</b>.<br>
                                </p>
                                <div class='mb-5'><a style='cursor: pointer' href='https://www.nexis365.com/features' target='_self' class='btn btn-lg btn-outline-white'>Learn More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class='col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0'>
                    <div class='sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border'>                    
                        <div class='px-5' style='width:90%'>
                            <div class='sh-11'><center>
                                <a href='index.php'><img src='img/nexis365_light.png' style='width:150px;background-color:#eeeeee;border-radius:10px;padding:10px'></a>
                            </center></div>
                            <div class='mb-5'><center>
                                <iframe name='processor' src='blank.php?d1=New Account Registration&d2=let%27s break limitations and grow like pro!' style='border-radius:10px' height='60' width='85%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                            </center></div>
                            <div>";
                                
                                if(!isset($_COOKIE["useridx"])){

                                    $uotp=rand(100000000,999999999);
                                    echo"<form method='post' action='security.php' target='processor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                        <center><hr>
                                            <p>Register with Email</p><label class='mb-3 top-label'><input class='form-control' type='email' required name='remail' /><span>Email Address</span></label>
                                            <input type=hidden value='$uotp' name='rotp'>
                                            <input type='submit' class='btn btn-lg btn-primary' value='Create Account' name=submit>
                                        </center>
                                    </form>
                                    <center>
                                        <p class='card-text text-alternate mb-4'>If you are a member, please <a style='cursor: pointer' onclick=\"slogin('0', 'datashiftX')\" target='_self' class=' t-3 e-3'>Login</a>.</p>
                                        <iframe name='processor1' src='blank.php?d1=0&d2=0' height='5' width='5' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                                    </center>";
                                                        
                                }else{

                                    echo"<section class='scroll-section' id='validation'>                                        
                                        <div class=' wizard' id='wizardValidation'>
                                    
                                            <div class='card-header border-0 pb-0'>
                                                <ul class='nav nav-tabs justify-content-center' role='tablist'>
                                                    <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationFirst' role='tab'>
                                                        <div class='mb-1 title d-none d-sm-block'>Step One</div><div class='text-small description d-none d-md-block'>Personal Info.</div>
                                                    </a></li>
                                                    <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationSecond' role='tab'>
                                                        <div class='mb-1 title d-none d-sm-block'>Step Two</div><div class='text-small description d-none d-md-block'>Business Info.</div>
                                                    </a></li>
                                                    <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationThird' role='tab'>
                                                        <div class='mb-1 title d-none d-sm-block'>Step Three</div><div class='text-small description d-none d-md-block'>Business Type</div>
                                                    </a></li>
                                                    <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationForth' role='tab'>
                                                        <div class='mb-1 title d-none d-sm-block'>Step Four</div><div class='text-small description d-none d-md-block'>Modules Selection</div>
                                                    </a></li>
                                                    <li class='nav-item d-none' role='presentation'><a class='nav-link text-center' href='#validationLast' role='tab'></a></li>
                                                </ul>
                                            </div>
                                            
                                            <div class='card-body sh-26'>
                                                <div class='tab-content'>";
                                                    // <form method='get' action='reg_security.php' target='_blank' enctype='multipart/form-data' name='reg'>
                                                    if(isset($_COOKIE["firstName"])) $firstName=$_COOKIE["firstName"];
                                                    else $firstName=null;
                                                    if(isset($_COOKIE["lastName"])) $lastName=$_COOKIE["lastName"];
                                                    else $lastName=null;
                                                    if(isset($_COOKIE["pbox"])) $pbox=$_COOKIE["pbox"];
                                                    else $pbox=null;
                                                    if(isset($_COOKIE["gender"])) $gender=$_COOKIE["gender"];
                                                    else $gender=null;
                                                    if(isset($_COOKIE["phone"])) $phone=$_COOKIE["phone"];
                                                    else $phone=null;
                                                    if(isset($_COOKIE["company_name"])) $company_name=$_COOKIE["company_name"];
                                                    else $company_name=null;
                                                    if(isset($_COOKIE["company_address"])) $company_address=$_COOKIE["company_address"];
                                                    else $company_address=null;
                                                    if(isset($_COOKIE["company_city"])) $company_city=$_COOKIE["company_city"];
                                                    else $company_city=null;
                                                    if(isset($_COOKIE["company_state"])) $company_state=$_COOKIE["company_state"];
                                                    else $company_state=null;
                                                    if(isset($_COOKIE["company_zip"])) $company_zip=$_COOKIE["company_zip"];
                                                    else $company_zip=null;
                                                    if(isset($_COOKIE["company_country"])) $company_country=$_COOKIE["company_country"];
                                                    else $company_country="Australia";

                                                    echo"<div class='tab-pane fade' id='validationFirst' role='tabpanel'>
                                                        <form method='post' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                            <div class='row'>
                                                                <div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' required type='text' name='firstName' value='$firstName' onchange='this.form.submit();'/><span>FIRST NAME</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' required type='text' name='lastName' value='$lastName' onchange='this.form.submit();'  /><span>LAST NAME</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><select class='form-select' style='padding-top:25px;width:100%' required name='gender' onchange='this.form.submit();'>
                                                                        <option value='$gender'>$gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                                    </select><span>Gender</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' required type='text' name='phone' value='$phone' onchange='this.form.submit();' /><span>PHONE NUMBER</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' required type='email' name='ubox' value=\"".$_COOKIE["useridx"]."\" onchange='this.form.submit();' /><span>E-MAIL</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' required type='password' name='pbox' value='$pbox' onchange='this.form.submit();' /><span>PASSWORD</span></label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    
                                                    <div class='tab-pane fade' id='validationSecond' role='tabpanel'>    
                                                        <form method='post' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                            <div class='row'>
                                                                <div class='col-md-12'>
                                                                    <label class='mb-3 top-label'><input class='form-control' name='company_name' required value='$company_name' onchange='this.form.submit();'/><span>Company Name</span></label>
                                                                </div><div class='col-md-12'>
                                                                    <label class='mb-3 top-label'><input class='form-control' name='company_address' required value='$company_address' onchange='this.form.submit();' /><span>Address</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' name='company_city' required value='$company_city' onchange='this.form.submit();' /><span>City</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' name='company_state' required value='$company_state' onchange='this.form.submit();' /><span>State</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><input class='form-control' name='company_zip' required value='$company_zip' onchange='this.form.submit();' /><span>Zip</span></label>
                                                                </div><div class='col-md-6'>
                                                                    <label class='mb-3 top-label'><select class='form-select' style='padding-top:25px;width:100%' required name='company_country' onchange='this.form.submit();'>";
                                                                        if(isset($company_country)) echo"<option value='$company_country'><span >$company_country</span></option>";
                                                                        else echo"<option label='&nbsp;'></option>";
                                                                        $c1 = "select * from menu where parent='3000' order by name asc";
                                                                        $c11 = $conn->query($c1);
                                                                        if ($c11->num_rows > 0) { while($c111 = $c11 -> fetch_assoc()) {
                                                                            echo"<option value='".$c111["name"]."'><span>".$c111["name"]."</span></option>";
                                                                        } }
                                                                    echo"</select><span>Select Country</span></label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                        
                                                    <div class='tab-pane fade' id='validationThird' role='tabpanel'>
                                                        <form method='post' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                            <div class='row'>
                                                                <div class='col-md-12'>
                                                                    <label class='mb-3 top-label'><select class='form-select' style='padding-top:25px;width:100%' required name='job_title' onchange='this.form.submit();'>";
                                                                        if(isset($_COOKIE["job_title"])) echo"<option value='".$_COOKIE["job_title"]."'><span>".$_COOKIE["job_title"]."</span></option>";
                                                                        else echo"<option label='&nbsp;'></option>";
                                                                        $c3 = "select * from menu where parent='3002' order by orders asc";
                                                                        $c33 = $conn->query($c3);
                                                                        if ($c33->num_rows > 0) { while($c333 = $c33 -> fetch_assoc()) { echo"<option value='".$c333["id"]."'><span>".$c333["name"]."</span></option>"; } }
                                                                        echo"</select><span>Your Job Title</span>
                                                                    </label>
                                                                </div><div class='col-md-12'>
                                                                    <label class='mb-3 top-label'><select class='form-select' style='padding-top:25px;width:100%' required name='total_employees' onchange='this.form.submit();'>";
                                                                        if(isset($_COOKIE["total_employees"])) echo"<option value='".$_COOKIE["total_employees"]."'><span>".$_COOKIE["total_employees"]."</span></option>";
                                                                        else echo"<option label='&nbsp;'></option>";
                                                                        $c2 = "select * from menu where parent='3001' order by id asc";
                                                                        $c22 = $conn->query($c2);
                                                                        if ($c22->num_rows > 0) { while($c222 = $c22 -> fetch_assoc()) { echo"<option value='".$c222["name"]."'><span>".$c222["name"]."</span></option>"; } }
                                                                        echo"</select><span>Number of Employees</span>
                                                                    </label>
                                                                </div><div class='col-md-12'>
                                                                    <label class='mb-3 top-label'><select class='form-select' style='padding-top:25px;width:100%' required name='purpose' onchange='this.form.submit();'>";
                                                                        if(isset($_COOKIE["purpose_of_use"])) echo"<option value='".$_COOKIE["purpose_of_use"]."'><span>".$_COOKIE["purpose_of_use"]."</span></option>";
                                                                        else echo"<option label='&nbsp;'></option>";
                                                                        $c5 = "select * from menu where `parent`='3004' order by `orders` asc";
                                                                        $c55 = $conn->query($c5);
                                                                        if ($c55->num_rows > 0) { while($c555 = $c55 -> fetch_assoc()) { echo"<option value='".$c555["name"]."'><span>".$c555["name"]."</span></option>"; } }
                                                                        echo"</select><span>What brings you to Nexis Solutions?</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class='tab-pane fade' id='validationForth' role='tabpanel'>
                                                        <form method='post' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                        
                                                            <p>Select an solution that match your business</p>
                                                            <label class='mb-3 top-label'><select class='form-select' style='padding-top:25px;width:100%' required name='application_name' onchange='this.form.submit();'>";
                                                                if(isset($_COOKIE["application_name"])){
                                                                    $c4d = "select * from solutions where `id`='".$_COOKIE["application_name"]."' order by `name` asc limit 1";
                                                                    $c44d = $conn->query($c4d);
                                                                    if ($c44d->num_rows > 0) { while($c444d = $c44d -> fetch_assoc()) {
                                                                        echo"<option value='".$c444d["id"]."'>".$c444d["name"]." (".$c444d["detail"].")</option>";
                                                                    } }
                                                                }else echo"<option label='&nbsp;'></option>";
                                                                $c4 = "select * from solutions where `status`='1' order by `name` asc";
                                                                $c44 = $conn->query($c4);
                                                                if ($c44->num_rows > 0) { while($c444 = $c44 -> fetch_assoc()) {
                                                                    echo"<option value='".$c444["id"]."'>".$c444["name"]." (".$c444["detail"].")</option>";
                                                                } }
                                                            echo"</select><span>Select SAAS Solution</span></label>
                                                            
                                                            <p>Select Additional Modules for Your Business Solution</p>
                                                            <label class='mb-3 top-label'>
                                                                <select multiple='multiple' data-placeholder='Select Modules' data-tags='true' data-close-on-select='false' id='selectDataApi' name='module_selection[]' style='padding-top:25px;width:100%' onchange='this.form.submit();'>";
                                                                if(isset($_COOKIE["module_selection"])){
                                                                    $c1d = "select * from selected_module order by id asc ";
                                                                    $c11d = $conn->query($c1d);
                                                                    if ($c11d->num_rows > 0) { while($c111d = $c11d -> fetch_assoc()) {
                                                                        $c1e = "select * from modules where id='".$c111d["moduleid"]."' order by id asc limit 1 ";
                                                                        $c11e = $conn->query($c1e);
                                                                        if ($c11e->num_rows > 0) { while($c111e = $c11e -> fetch_assoc()) {
                                                                            echo"".$c111e["name"].",";
                                                                        } }
                                                                    } }
                                                                }else echo"<option label='&nbsp;'></option>";
                                                                $c1 = "select * from modules where status='1' order by name asc";
                                                                $c11 = $conn->query($c1);
                                                                if ($c11->num_rows > 0) { while($c111 = $c11 -> fetch_assoc()) {
                                                                    $solname=null;
                                                                    $c1a = "select * from solutions where id='".$c111["parent"]."' order by name asc";
                                                                    $c11a = $conn->query($c1a);
                                                                    if ($c11a->num_rows > 0) { while($c111a = $c11a -> fetch_assoc()) { $solname=$c111a["name"]; }}
                                                                    echo"<option value='".$c111["id"]."'>$solname - ".$c111["name"]."</option>";
                                                                } }
                                                            echo"</select><span>Select what you'd like to focus on first</span></label>
                                                            
                                                            <p>Please let us know, How did you hear about us?</p>
                                                            <label class='mb-3 top-label'>
                                                                <select class='form-select' style='padding-top:25px;width:100%' required name='referred_source' onchange='this.form.submit();'>";
                                                                if(isset($_COOKIE["referred_source"])){
                                                                    $c7d = "select * from menu where `id`='".$_COOKIE["referred_source"]."' order by `orders` asc limit 1";
                                                                    $c77d = $conn->query($c7d);
                                                                    if ($c77d->num_rows > 0) { while($c777d = $c77d -> fetch_assoc()) { echo"<option value='".$c777d["id"]."'>".$c777d["name"]."</option>"; } }
                                                                }else echo"<option label='&nbsp;'></option>";
                                                                $c7 = "select * from menu where `parent`='3006' order by `orders` asc";
                                                                $c77 = $conn->query($c7);
                                                                if ($c77->num_rows > 0) { while($c777 = $c77 -> fetch_assoc()) { echo"<option value='".$c777["id"]."'>".$c777["name"]."</option>"; } }
                                                            echo"</select><span>One last question, how did you hear about us?</span></label>
                                                            
                                                        </form>
                                                    </div>
                                                    
                                                    <div class='tab-pane fade' id='validationLast' role='tabpanel'>
                                                        <div class='text-center mt-5'>
                                                            <form method='post' action='cookie.php' target='processor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                                                                <h5 class='card-title'>Thank You!</h5>
                                                                <p class='card-text text-alternate mb-4'>Your registration completed successfully!</p>";
                                                                echo"<input type=hidden value='1' name='uid2' />";
                                                                // echo"<input type=hidden value='".$_COOKIE["useridx"]."' name='uid2' />";
                                                                echo"<input type=hidden value='ADMIN' name='utype2' />
                                                                <input type=hidden value='".$_COOKIE["firstName"]."' name='samv2' />
                                                                <button class='btn btn-icon btn-icon-start btn-primary' type='submit' onclick='this.form.submit();'><i data-acorn-icon='login'></i><span> Let's get started</span></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class='card-footer text-center border-0 pt-1'>
                                                <button class='btn btn-icon btn-icon-start btn-outline-primary btn-prev' type='button'><i data-acorn-icon='chevron-left'></i><span>Back</span></button>
                                                <button class='btn btn-icon btn-icon-end btn-outline-primary btn-next' type='button'><span>Next</span><i data-acorn-icon='chevron-right'></i></button>
                                            </div><hr>
                                            <center>";
                                                // <p class='card-text text-alternate mb-4'>If you are a member, please <a style='cursor: pointer' onclick=\"slogin('0', 'datashiftX')\" target='_self' class=' t-3 e-3'>Login</a>.</p>
                                                echo"<p class='card-text text-alternate mb-4'>If you are a member, please <a href='login.php' target='_self' class=' t-3 e-3'>Login</a>.</p>
                                                <iframe name='processor1' src='blank.php?d1=0&d2=0' height='5' width='5' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                                            </center>
                                        </div>
                                    </section>";
                                }
                                
                                /*
                                    <input type='checkbox' class='form-check-input' required id='registerCheck' name='registerCheck' />
                                    <label class='form-check-label' for='registerCheck'>Yes, I would like to receive marketing communications regarding Nexis products, services, and events.  I can unsubscribe at any time.</label>
                                    
                                    Your free trial may be provisioned on or migrated to Hyperforce, Nexis's public cloud infrastructure.
                                    By registering, you confirm that you agree to the storing and processing of your personal data by Nexis 
                                    as described in the Privacy Statement.<br>
                                    <button type='submit' class='btn btn-lg btn-primary'>Signup</button>
                                */
                                        
                            echo"</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>";
            
    include("scripts-light.php");
