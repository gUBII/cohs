<?php if($_GET["sourcefrom"]!="APP"){ ?>

    <style>
        .bg {
            background-image: url("../assets/accounts14.jpg");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    
<?php } ?>

    <style>
        #grad1 {
            background-color: red;
            background-image: linear-gradient(128deg, #121212, red);
        }
        .typewriter h3 {
          color: #fff;
          overflow: hidden;
          border-right: .15em solid black;
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        .typewriter h4 {
          color: #fff;
          overflow: hidden;
          /* border-right: .15em solid black; */
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        
        /* The typing effect */
        @keyframes typing {
          from { width: 0 }
          to { width: 100% }
        }
        
        /* The typewriter cursor effect */
        @keyframes blink-caret {
          from, to { border-color: transparent }
          50% { border-color: orange }
        }
    </style>

<?php

    echo"<body style='background-color:#121212;'>";

    if(isset($_COOKIE["userid"])){
        echo"<form method='POST' action='logout.php' name='main' target='_top'>
            <input type=hidden name='redirect_url' value='register.php'><input type=hidden name='id' value='5138'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
        
    }else{
        include("authenticator.php");
    
        include("head-light.php");
        
        // error_reporting(0);
        
        if(!isset($_COOKIE["sourcefrom"])){
            $sourcefrom=$_GET["sourcefrom"];
            if($sourcefrom!="APP") $sourcefrom="BROWSER";
        }else{
            $sourcefrom=$_COOKIE["sourcefrom"];
            if($sourcefrom!="APP") $sourcefrom="BROWSER";
        }
        
        echo"<div class='h-100 bg' id='datashiftX' style='padding:0px;background-color:#121212'><center><br><br><br>";
            if(!isset($_COOKIE["useridx"])) echo"<br><br>";
            
            if($sourcefrom!="APP"){ 
                echo"<div class='sw-lg-70 d-flex justify-content-center align-items-center shadow-deep' style='background-color:#000000;
                    border-image: linear-gradient(to bottom, #222222 10%, #3acfd5 100%) 1;border-width: 1px;border-style: solid'>";
            }else{
                echo"<div class='sw-lg-70 d-flex justify-content-center align-items-center shadow-deep' style='border-radius:10px;background-color:#000000'>";
            }
                echo"<div class='sw-lg-100' style='padding:0px'>
                    <table style='width:95%'><tr>
                        <td><a href='index.php'>";
                            // <img src='img/nexis365_dark.png' style='width:150px;border-radius:10px;padding:10px'>
                            echo"<img src='assets/nexis-animated-logo.gif' style='width:150px;border-radius:10px;padding:10px'>";
    
                        echo"</a></td>
                        <td><iframe name='processor' src='blank-login.php?d1=New Registration&d2=let%27s break limits and grow like pro!' height='60' width='100%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe></td>
                    </tr></table>
                    <div style='padding-left:15px;padding-right:15px;padding-bottom-15px'>";
                    
                        if(!isset($_COOKIE["useridx"])){
                            $uotp=rand(100000000,999999999);
                            echo"
                            <form method='post' name='stage1' action='security.php' target='processor' enctype='multipart/form-data'class='tooltip-end-bottom'>";
                                // <img src='https://nexis365.com/assets/c1.png' style='position:absolute;height:150px;margin-top:95px;margin-left:-270px'>
                                echo"<div class='row'>
                                    <div class='col-md-6'>
                                        <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' required type='text' id='firstName' name='firstName' value='$firstName' onchange='this.form.submit();'/><span style='background-color:#cccccc;color:black' >FIRST NAME</span></label>
                                    </div><div class='col-md-6'>
                                        <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' required type='text' name='lastName' value='$lastName' onchange='this.form.submit();'  /><span style='background-color:#cccccc;color:black' >LAST NAME</span></label>
                                    </div><div class='col-md-12' style='text-align:left'>
                                        <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' type='email' required name='remail' /><span style='background-color:#cccccc;color:black' >Email Address</span></label>
                                    </div><div class='col-md-12' style='text-align:left'><br>
                                        <input type=hidden value='$uotp' name='rotp'>
                                        <table style='width:100%'><tr>
                                            <td width='100px'><input type='submit' class='btn btn-lg btn-primary' value='Create Account' name=submit></td>
                                            <td align='right'><span style='font-size:12pt;color:white'>";
                                                if($sourcefrom!="APP"){
                                                    echo"Already have Account?<br>
                                                    <a href='login.php' class='btn btn-outline-warning btn-sm' style='cursor: pointer' target='_self'>Let's Login.</a></span>";
                                                }
                                            echo"</td>
                                        </tr></table>
                                    </div>
                                </div>
                                <input type='hidden' name='sourcefrom' value='$sourcefrom'>
                            </form>
                            <br><br>
                            <iframe name='processor1' src='blank-login.php?d1=0&d2=0' height='5' width='5' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>";
                            ?> <script>
                                window.onload = function() {
                                  document.getElementById("firstName").focus();
                                }
                            </script> <?php
                        }else{
                            echo"<section class='scroll-section' id='validation'>
                                <div class=' wizard' id='wizardValidation'>
                                    <div class='card-header border-0 pb-0'>
                                        <ul class='nav nav-tabs justify-content-center' role='tablist'>
                                            <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationFirst' role='tab'>
                                                <div class='text-small description d-none d-md-block'>Personal Info.</div>
                                            </a></li>
                                            <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationSecond' role='tab'>
                                                <div class='text-small description d-none d-md-block'>Business Info.</div>
                                            </a></li>
                                            <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationThird' role='tab'>
                                                <div class='text-small description d-none d-md-block'>Business Type</div>
                                            </a></li>
                                            <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationForth' role='tab'>
                                                <div class='text-small description d-none d-md-block'>Modules Selection</div>
                                            </a></li>
                                            <li class='nav-item d-none' role='presentation'><a class='nav-link text-center' href='#validationLast' role='tab'></a></li>
                                        </ul>
                                    </div><br>
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
                                                
                                                <div class='typewriter'><h3>Hi $lastName, Tell us about yourself</h1></div><hr>
                                                <form method='post' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                    <div class='row'>
                                                        <div class='col-md-6'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' required type='text' name='firstName' value='$firstName' onchange='this.form.submit();'/><span style='background-color:#cccccc;color:black' >FIRST NAME</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' required type='text' name='lastName' value='$lastName' onchange='this.form.submit();'  /><span style='background-color:#cccccc;color:black' >LAST NAME</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><select style='background-color:#cccccc;color:black;padding-top:25px;width:100%;font-size:12pt' class='form-select' required name='gender' onchange='this.form.submit();'>
                                                                <option value='$gender'>$gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                            </select><span style='background-color:#cccccc;color:black' >Gender</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' required type='text' name='phone' value='$phone' onchange='this.form.submit();' /><span style='background-color:#cccccc;color:black' >PHONE NUMBER</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' required type='email' name='ubox' readonly value=\"".$_COOKIE["useridx"]."\" onchange='this.form.submit();' /><span style='background-color:#cccccc;color:black' >Alternane E-mail</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'>
                                                                <input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' required type='password' name='pbox' value='$pbox' onchange='this.form.submit();' />
                                                                <span style='background-color:#cccccc;color:black' >PASSWORD</span>
                                                            </label>
                                                            <span style='position:absolute;z-index:9999' class='password-toggle-icon'><i class='fas fa-eye'></i></span>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='tab-pane fade' id='validationSecond' role='tabpanel'>
                                                <div class='typewriter'><h4>Nice $lastName,<br>let's have your Company Data.</h4></div><hr>
                                                <form method='post' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' name='company_name' required value='$company_name' onchange='this.form.submit();'/><span style='background-color:#cccccc;color:black'>Company Name</span></label>
                                                        </div><div class='col-md-12'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' name='company_address' required value='$company_address' onchange='this.form.submit();' /><span style='background-color:#cccccc;color:black'>Address</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' name='company_city' required value='$company_city' onchange='this.form.submit();' /><span style='background-color:#cccccc;color:black'>City</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' name='company_state' required value='$company_state' onchange='this.form.submit();' /><span style='background-color:#cccccc;color:black'>State</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><input style='background-color:#cccccc;color:black;font-size:13pt' class='form-control' name='company_zip' required value='$company_zip' onchange='this.form.submit();' /><span style='background-color:#cccccc;color:black'>Zip</span></label>
                                                        </div><div class='col-md-6'>
                                                            <label class='mb-3 top-label'><select class='form-select' style='background-color:#cccccc;color:black;padding-top:25px;width:100%;font-size:12pt' required name='company_country' onchange='this.form.submit();'>";
                                                                if(isset($company_country)) echo"<option value='$company_country'><span >$company_country</span></option>";
                                                                else echo"<option label='&nbsp;'></option>";
                                                                $c1 = "select * from menu where parent='3000' order by name asc";
                                                                $c11 = $conn->query($c1);
                                                                if ($c11->num_rows > 0) { while($c111 = $c11 -> fetch_assoc()) {
                                                                    echo"<option value='".$c111["name"]."'><span>".$c111["name"]."</span></option>";
                                                                } }
                                                            echo"</select><span style='background-color:#cccccc;color:black'>Select Country</span></label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='tab-pane fade' id='validationThird' role='tabpanel'>
                                                <div class='typewriter'><h4> Great $lastName,<br>A bit more about You & Company.</h4></div><hr>
                                                <form method='POST' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                    <div class='row'>
                                                        <div class='col-md-12'>
                                                            <label class='mb-3 top-label'><select class='form-select' style='background-color:#cccccc;color:black;padding-top:25px;width:100%;font-size:12pt' required name='job_title' onchange='this.form.submit();'>";
                                                                if(isset($_COOKIE["job_title"])) echo"<option value='".$_COOKIE["job_title"]."'><span>".$_COOKIE["job_title"]."</span></option>";
                                                                else echo"<option label='&nbsp;'></option>";
                                                                $c3 = "select * from menu where parent='3002' order by orders asc";
                                                                $c33 = $conn->query($c3);
                                                                if ($c33->num_rows > 0) { while($c333 = $c33 -> fetch_assoc()) { echo"<option value='".$c333["name"]."'><span>".$c333["name"]."</span></option>"; } }
                                                                echo"</select><span style='background-color:#cccccc;color:black'>Your Job Title</span>
                                                            </label>
                                                        </div><div class='col-md-12'>
                                                            <label class='mb-3 top-label'><select class='form-select' style='background-color:#cccccc;color:black;padding-top:25px;width:100%;font-size:12pt' required name='total_employees' onchange='this.form.submit();'>";
                                                                if(isset($_COOKIE["total_employees"])) echo"<option value='".$_COOKIE["total_employees"]."'><span>".$_COOKIE["total_employees"]."</span></option>";
                                                                else echo"<option label='&nbsp;'></option>";
                                                                $c2 = "select * from menu where parent='3001' order by id asc";
                                                                $c22 = $conn->query($c2);
                                                                if ($c22->num_rows > 0) { while($c222 = $c22 -> fetch_assoc()) { echo"<option value='".$c222["name"]."'><span>".$c222["name"]."</span></option>"; } }
                                                                echo"</select><span style='background-color:#cccccc;color:black'>Number of Employees</span>
                                                            </label>
                                                        </div><div class='col-md-12'>
                                                            <label class='mb-3 top-label'><select class='form-select' style='background-color:#cccccc;color:black;padding-top:25px;width:100%;font-size:12pt' required name='purpose' onchange='this.form.submit();'>";
                                                                if(isset($_COOKIE["purpose_of_use"])) echo"<option value='".$_COOKIE["purpose_of_use"]."'><span>".$_COOKIE["purpose_of_use"]."</span></option>";
                                                                else echo"<option label='&nbsp;'></option>";
                                                                $c5 = "select * from menu where `parent`='3004' order by `orders` asc";
                                                                $c55 = $conn->query($c5);
                                                                if ($c55->num_rows > 0) { while($c555 = $c55 -> fetch_assoc()) { echo"<option value='".$c555["name"]."'><span>".$c555["name"]."</span></option>"; } }
                                                                echo"</select><span style='background-color:#cccccc;color:black'>What brings you to Nexis Solutions?</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div style='text-align:left'>
                                                        <label class='mb-3 top-label'>
                                                            <select class='form-select' style='background-color:#cccccc;color:black;padding-top:25px;width:100%;font-size:12pt' required name='referred_source' onchange='this.form.submit();'>";
                                                                if(isset($_COOKIE["referred_source"])) echo"<option value='".$_COOKIE["referred_source"]."'>".$_COOKIE["referred_source"]."</option>";
                                                                else echo"<option label='&nbsp;'></option>";
                                                                $c7 = "select * from menu where `parent`='3006' order by `orders` asc";
                                                                $c77 = $conn->query($c7);
                                                                if ($c77->num_rows > 0) { while($c777 = $c77 -> fetch_assoc()) { echo"<option value='".$c777["name"]."'>".$c777["name"]."</option>"; } }
                                                            echo"</select><span style='background-color:#cccccc;color:black'>One last question, how did you hear about us?</span>
                                                        </label>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='tab-pane fade' id='validationForth' role='tabpanel'>
                                                <div class='typewriter'><h4> Excelent $lastName,<br>Last Query! Select Solutions</h4></div><hr>
                                                <div class='row list' style='text-align:left'><br>";
                                                    
                                                    $connx = new mysqli('localhost', 'saas', 'Bangladesh$$786', $_COOKIE["dbnamex"]);
                                                    if ($connx->connect_error) die("Connection failed: " . $conn->connect_error);
                                                    
                                                    $ms1 = "select * from solutions where parent='0' and profile='0' and status='1' order by orders asc";
                                                    $ms11 = $connx->query($ms1);
                                                    if ($ms11->num_rows > 0) { while($ms111 = $ms11 -> fetch_assoc()) {
                                                        $rand=rand(100000,999999);
                                                        echo"<div class='col-6' style='padding:10px'><label style='width:100%'>
                                                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='background-color:#111111;height:80px;padding:20px'>
                                                                <center><table style='width:95%'><tr>
                                                                    <td style='width:90%'>
                                                                        <div class='name' style='font-size:13pt;color:#0ABCDE'>".$ms111["name"]."</div>
                                                                        <div class=' position' style='font-size:10pt;color:#CCCCCC'>".$ms111["detail"]."</div>
                                                                    </td><td valign='top' style='width:10px'>
                                                                        <form name='saas$rand' method='post' action='cookie.php' target='processor1' enctype='multipart/form-data' name='reg' class='tooltip-end-bottom'>
                                                                            <input type='hidden' name='processor' value='solutionswitch'><input type='hidden' name='id' value='".$ms111["id"]."'><input type='hidden' name='switchx' value=''>";
                                                                            if($ms111["dashboard"]==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                            else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                        echo"</form>
                                                                    </td>
                                                                </tr></table>
                                                            </div>
                                                        </label></div>";
                                                    } }
                                                echo"</div>";
                                                
                                                /*
                                                    <label class='mb-3 top-label'><select class='form-select' style='background-color:#cccccc;color:black;padding-top:25px;width:100%;font-size:12pt' required name='application_name' onchange='this.form.submit();'>";
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
                                                    echo"</select><span style='background-color:#cccccc;color:black'>Select SAAS Solution</span></label>";
                                                */
                                                
                                                /*
                                                    echo"<p style='color:white'>Select Additional Modules for Your Business Solution</p>
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
                                                        echo"</select><span>Select what you'd like to focus on first</span></label>";
                                                */
                                            echo"</div>
                                            <div class='tab-pane fade' id='validationLast' role='tabpanel'>
                                                <div class='text-center mt-5'>
                                                    <form method='post' action='cookie.php' target='processor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                                                        <img src='https://nexis365.com/assets/thankyou.png' style='height:250px'>";
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
                                        if($sourcefrom!="APP") echo"<p class='card-text text-alternate mb-4'>Already a member? Please <a href='login.php' target='_self' class=' t-3 e-3'>Login</a>.</p>";
                                        echo"<iframe name='processor1' src='blank-login.php?d1=0&d2=0' height='5' width='5' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
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
            </div>";
            
            if($sourcefrom!="APP"){
                echo"<div class='sw-lg-70 d-flex justify-content-center align-items-center py-5 ' style='padding-left:10px;padding-right:10px'>
                    <table style='width:100%'><tr>
                        <td align=left width='50%' style='font-size:8pt'>
                            <a href='https://www.nexis365.com/terms_of_service'>Terms of Service</a> | 
                            <a href='https://www.nexis365.com/privacy_policy'>Privacy Policy</a></td>
                        <td align=right width='50%' style='font-size:8pt'>Copyright © 2025 NEXIS 365 LLC.</td>
                    </tr></table>
                </div>";
            }
                
        include("scripts-light.php");
    }
