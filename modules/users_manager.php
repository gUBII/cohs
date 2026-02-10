<?php
$cdate=time();
$cdate=date("Y-m-d", $cdate);    
$cid=$_GET["cid"];
$sheba=$_GET["sheba"];
$utype=$_GET["utype"];

error_reporting(0);

include("../authenticator.php");

echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
<link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
<link rel='stylesheet' href='font/CS-Interface/style.css' />
<link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
<link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
<link rel='stylesheet' href='css/vendor/glide.core.min.css' />
<link rel='stylesheet' href='css/vendor/introjs.min.css' />
<link rel='stylesheet' href='css/vendor/select2.min.css' />
<link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
<link rel='stylesheet' href='css/vendor/datatables.min.css' />
<link rel='stylesheet' href='css/vendor/plyr.css' />
<link rel='stylesheet' href='css/styles.css' />
<link rel='stylesheet' href='css/main.css' />        
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='js/base/loader.js'></script>";

$cid=0;
if(isset($_GET["cid"])) $cid=$_GET["cid"];

echo"<div class='offcanvas-header'>
    <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
    <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
</div>
<div class='offcanvas-body'>
    <form method='post' action='dataprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
        if(isset($_GET["mid"]) && $_GET["mid"]!=0){

            if($_GET["cid"]==7){
                echo"<input type='hidden' name='processor' value='edit_$utype'>
                <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                    $randid=rand(100,999);
                    $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                        $pdate=date("Y-m-d", $t1["date"]);
                        $jdate=date("Y-m-d", $t1["jointime"]);
                        $dob=date("Y-m-d", $t1["dob"]);
                        echo"<fieldset>
                                                <h2>Personal Detail</h2>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contract Date *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Client ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div><br></div>";

                                                    // <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login Password *</label><input name='password' type='password' value='".$t1["passbox"]."' class='form-control' required></div><br></div>
                                                    
                                                    echo"<div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div<br>></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                                        <option value='".$t1["country"]."'>".$t1["country"]."</option>";
                                                        
                                                        include('countries.php');
                                                        
                                                    echo"</select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                        <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                        <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                    </select></div><br></div>
                                                    
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Plan Manager Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Plan Manager Name</label><input name='pm_name' type='text' value='".$t1["pm_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone Number</label><input name='pm_mobile' type='text' value='".$t1["pm_mobile"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address</label><input name='pm_email' type='text' value='".$t1["pm_email"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Home Address</label><input name='pm_address' type='text' value='".$t1["pm_address"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Contact Person Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contact Person Name</label><input name='cp_name' type='text' value='".$t1["cp_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone 1</label><input name='cp_phone1' type='text' value='".$t1["cp_phone1"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone 2</label><input name='cp_mobile' type='text' value='".$t1["cp_mobile"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address</label><input name='cp_email' type='text' value='".$t1["cp_email"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>HomeAddress</label><input name='cp_address' type='text' value='".$t1["cp_address"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Financial Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>NDIS Number</label><input name='ndisnumber' type='text' value='".$t1["ndis_number"]."' class='form-control'></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                        <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='CLIENT'>CLIENT</option>
                                                    </select></div><br></div>
                                                    
                                                </div>
                                            </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                            </div>";
                } }
            }

            if($_GET["cid"]==8){
                echo"<input type='hidden' name='processor' value='edit_$utype'>
                <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                    $randid=rand(100,999);
                    $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                        $pdate=date("Y-m-d", $t1["date"]);
                        $jdate=date("Y-m-d", $t1["jointime"]);
                        $dob=date("Y-m-d", $t1["dob"]);
                        echo"<fieldset>
                                                <h2>Personal Detail</h2>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contract Date *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Vendor ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div><br></div>";
                                                    
                                                    // <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div><br></div>
                                                    
                                                    echo"<div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                                        <option value='".$t1["country"]."'>".$t1["country"]."</option>";
                                                        
                                                        include('countries.php');
                                                        
                                                    echo"</select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                        <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                        <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                    </select></div><br></div>
                                                    
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Store Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Name</label><input name='store_name' type='text' value='".$t1["store_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Address</label><input name='store_address' type='text' value='".$t1["store_address"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Phone</label><input name='store_phone' type='text' value='".$t1["store_phone"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Financial Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                        <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='VENDOR'>VENDOR</option>
                                                    </select></div><br></div>
                                                </div>
                                            </fieldset>
                                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                            </div>";
                } }
            }
            
        
            if($_GET["cid"]==9){
                echo"<input type='hidden' name='processor' value='edit_$utype'>
                <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                                        $randid=rand(100,999);
                                        $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                                        $r1 = $conn->query($s1);
                                        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                            $pdate=date("Y-m-d", $t1["date"]);
                                            $jdate=date("Y-m-d", $t1["jointime"]);
                                            $dob=date("Y-m-d", $t1["dob"]);
                                            echo"<fieldset>
                                                <h2>Personal Detail</h2>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Employee ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div><br></div>";
                                                    
                                                    // <div class='col-lg-2'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div><br></div>
                                                    
                                                    echo"<div class='col-lg-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                                        <option value='".$t1["country"]."'>".$t1["country"]."</option>";
                                                        
                                                        include('countries.php');
                                                        
                                                    echo"</select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                        <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                        <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Nationality *</label><input name='nationality' type='text' value='".$t1["nationality"]."' class='form-control'></div><br></div>
                                                    
                                                    <div class='col-lg-2'><div class='form-group'><label>Driving Licence No *</label><input name='driving_licence_no' type='text' value='".$t1["driving_licence_no"]."' class='form-control'></div><br></div>
                                                    
                                                    
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Emergency Contact Person 1</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-3'><div class='form-group'><label>1st Contact Name *</label><input name='emergency_contact_1' type='text' value='".$t1["emergency_contact_1"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-3'><div class='form-group'><label>Phone</label><input name='emergency_phone_1' type='text' value='".$t1["emergency_phone_1"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-3'><div class='form-group'><label>Email</label><input name='emergency_email_1' type='text' value='".$t1["emergency_email_1"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-3'><div class='form-group'><label>Relation</label><input name='emergency_relation_1' type='text' value='".$t1["emergency_relation_1"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Emergency Contact Person 2</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-3'><div class='form-group'><label>2nd Contact Name *</label><input name='emergency_contact_2' type='text' value='".$t1["emergency_contact_2"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-3'><div class='form-group'><label>Phone</label><input name='emergency_phone_2' type='text' value='".$t1["emergency_phone_2"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-3'><div class='form-group'><label>Email</label><input name='emergency_email_2' type='text' value='".$t1["emergency_email_2"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-3'><div class='form-group'><label>Relation</label><input name='emergency_relation_2' type='text' value='".$t1["emergency_relation_2"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Financial Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>";
                                            
                                            if($mtype=="ADMIN"){
                                                
                                                echo"<fieldset><br>
                                                    <h2>Official Detail </h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>";
                                                            $s7x = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["designation"]."</option>";
                                                            } }
                                                            $s7 = "select * from designation where status='ON' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                                            } }
                                                        echo"</select></div><br></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>";
                                                            $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                                            } }
                                                            $s7 = "select * from departments where status='ON' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                                            } }
                                                        echo"</select></div><br></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                            <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='USER'>USER (EMPLOYEE)</option><option value='ADMIN'>ADMIN</option>
                                                        </select></div><br></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Accounts Detail</h2><br>
                                                    <div class='row'> 
                                                        <div class='col-lg-2'><div class='form-group'><label>Wage Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                                            <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                                            <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                                        </select></div><br></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Regular Wage</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' required></div><br></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Saturday Wage</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' required></div><br></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Sunday Wage</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' required></div><br></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Public holiday</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' required></div><br></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Over Night Wage</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' required></div><br></div>
                                                        
                                                        <div class='col-lg-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' required></div><br></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                                            <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                                            <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                                        </select></div><br></div>
                                                        
                                                        <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                                        <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                                        <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";
    
                                                        /*
                                                        <div class='col-lg-12'>&nbsp;</div>                                                    
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF contribution</label><select class='form-control m-b' name='pf'>
                                                            <option value='".$t1["pf"]."'>".$t1["pf"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div><br></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF No.</label><input name='pf_no' type='number' value='".$t1["pf_no"]."' class='form-control'></div><br></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF rate</label><input name='pf_rate' type='number' value='".$t1["pf_rate"]."' class='form-control'></div><br></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI contribution</label><select class='form-control m-b ' name='esi'>
                                                            <option value='".$t1["esi"]."'>".$t1["esi"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div><br></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI No.</label><input name='esi_no' type='number' value='".$t1["esi_no"]."' class='form-control'></div><br></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI rate</label><input name='esi_rate' type='number' value='".$t1["esi_rate"]."' class='form-control'></div><br></div>";
                                                        */
    
                                                    echo"</div>
                                                </fieldset>";
                                                
                                            }else{
                                                
                                                echo"<input name='designation' type='hidden' value='".$t1["designation"]."'>
                                                <input name='department' type='hidden' value='".$t1["department_name"]."'>
                                                <input name='mtype' type='hidden' value='".$t1["mtype"]."'>
                                                <input name='salary_basic' type='hidden' value='".$t1["salary_basic"]."'>
                                                <input name='reg_amt' type='hidden' value='".$t1["reg_amt"]."'>
                                                <input name='sat_amt' type='hidden' value='".$t1["sat_amt"]."'>
                                                <input name='sun_amt' type='hidden' value='".$t1["sun_amt"]."'>
                                                <input name='hol_amt' type='hidden' value='".$t1["hol_amt"]."'>
                                                <input name='night_amt' type='hidden' value='".$t1["night_amt"]."'>
                                                <input name='overtime' type='hidden' value='".$t1["overtime"]."'>
                                                <input name='payment_type' type='hidden' value='".$t1["payment_type"]."'>
                                                <input name='pf' type='hidden' value='No'>
                                                <input name='pf_no' type='hidden' value='0'>
                                                <input name='pf_rate' type='hidden' value='0'>
                                                <input name='esi' type='hidden' value='No'>
                                                <input name='esi_no' type='hidden' value='0'>
                                                <input name='esi_rate' type='hidden' value='0'>";
                                                
                                            }
                                            
                                            echo"<div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                            </div>";
                                        } }
            }


            if($_GET["cid"]==10){
                echo"<input type='hidden' name='processor' value='edit_$utype'>
                <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                                        $randid=rand(100,999);
                                        $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                                        $r1 = $conn->query($s1);
                                        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                            $pdate=date("Y-m-d", $t1["date"]);
                                            $jdate=date("Y-m-d", $t1["jointime"]);
                                            $dob=date("Y-m-d", $t1["dob"]);
                                            echo"<fieldset>
                                                <h2>Personal Detail</h2>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Support ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div><br></div>";
                                                    // <div class='col-lg-2'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div><br></div>
                                                    echo"<div class='col-lg-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                                        <option value='".$t1["country"]."'>".$t1["country"]."</option>";
                                                        
                                                        include('countries.php');
                                                        
                                                    echo"</select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                        <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                        <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                    </select></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Financial Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Official Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>";
                                                        $s7x = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                                                        $r7x = $conn->query($s7x);
                                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                            echo"<option value='".$rs7x["id"]."'>".$rs7x["designation"]."</option>";
                                                        } }
                                                        $s7 = "select * from designation where status='ON' order by id asc";
                                                        $r7 = $conn->query($s7);
                                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                            echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                                        } }
                                                    echo"</select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>";
                                                        $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                                        $r7x = $conn->query($s7x);
                                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                            echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                                        } }
                                                        $s7 = "select * from departments where status='ON' order by id asc";
                                                        $r7 = $conn->query($s7);
                                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                            echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                                        } }
                                                    echo"</select></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                        <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='SUPPORT'>SUPPORT</option>
                                                    </select></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Accounts Detail</h2><br>
                                                <div class='row'> 
                                                    <div class='col-lg-2'><div class='form-group'><label>Commission Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                                        <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                                        <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Regular Commission</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Saturday Commission</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Sunday Commission</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Public holiday Comm.</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Over Night Commission</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                                        <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                                        <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                                    </select></div><br></div>
                                                    
                                                    <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                                    <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                                    <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";

                                                    /*
                                                    <div class='col-lg-12'>&nbsp;</div>                                                    
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF contribution</label><select class='form-control m-b' name='pf'>
                                                        <option value='".$t1["pf"]."'>".$t1["pf"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF No.</label><input name='pf_no' type='number' value='".$t1["pf_no"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF rate</label><input name='pf_rate' type='number' value='".$t1["pf_rate"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI contribution</label><select class='form-control m-b ' name='esi'>
                                                        <option value='".$t1["esi"]."'>".$t1["esi"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI No.</label><input name='esi_no' type='number' value='".$t1["esi_no"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI rate</label><input name='esi_rate' type='number' value='".$t1["esi_rate"]."' class='form-control'></div><br></div>";
                                                    */

                                                echo"</div>
                                            </fieldset>
                                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                            </div>";
                                        } }
            }

            if($_GET["cid"]==1000){
                echo"<input type='hidden' name='processor' value='edit_$utype'>
                <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                    $randid=rand(100,999);
                    $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                        $pdate=date("Y-m-d", $t1["date"]);
                        $jdate=date("Y-m-d", $t1["jointime"]);
                        $dob=date("Y-m-d", $t1["dob"]);
                        
                        $departmentname="";
                        $d1 = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                        $d2 = $conn->query($d1);
                        if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                        $designationname="";
                        $d4 = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                        $d5 = $conn->query($d4);
                        if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }

                        if($utype=="CLIENT"){
                            $leadername="";
                            $d1 = "select * from uerp_user where id='".$t1["team_leader"]."' order by id asc limit 1";
                            $d2 = $conn->query($d1);
                            if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $leadername="".$d3["username"]."".$d3["username2"]."" ; } }
                            $openprojects=0;
                            $p1 = "select * from project where clientid='".$t1["id"]."' and status='1' order by id asc limit 1";
                            $p2 = $conn->query($p1);
                            if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $openprojects=($openprojects+1); } }
                            $closedprojects=0;
                            $p1 = "select * from project where clientid='".$t1["id"]."' and status='5' order by id asc limit 1";
                            $p2 = $conn->query($p1);
                            if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $closedprojects=($closedprojects+1); } }
                        }
                        if($utype=="EMPLOYEE" || $utype=="SUPPORT"){
                            $openprojects=0;
                            $closedprojects=0;
                            $ta1 = "select * from project_team_allocation where employeeid='".$t1["id"]."' and status='1' order by id asc";
                            $ta2 = $conn->query($ta1);
                            if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                                $p1 = "select * from project where id='".$a3["projectid"]."' order by id asc";
                                $p2 = $conn->query($p1);
                                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                                    if($p3["status"]=="1") $openprojects=($openprojects+1);                            
                                    if($p3["status"]=="5") $closedprojects=($closedprojects+1);
                                } }
                            } }
        
                            $opentasks=0;
                            $closedtasks=0;                    
                            $ta1 = "select * from tasks where employeeid='".$t1["id"]."' order by id asc";
                            $ta2 = $conn->query($ta1);
                            if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                                if($p3["activity"]!="2") $opentasks=($opentasks+1);                            
                                else $closedtasks=($closedtasks+1);                        
                            } }
                        }
                        
                        $uid=$t1["id"];
                        $status=$t1["status"];
                        if($status==1) $status="ON";
                        else $status="OFF";
                        
                        echo"<div class='container'>
                            <div class='row'>
                                <div class='col-12 col-xl-4 col-xxl-3'>                                    
                                    <div class='card mb-5'>
                                        <div class='card-body'>
                                            <div class='d-flex align-items-center flex-column mb-4'>
                                                <div class='d-flex align-items-center flex-column'>
                                                    <div class='sw-13 position-relative mb-3'><img src='".$t1["images"]."' class='img-fluid rounded-xl' alt='thumb' /></div>
                                                    <div class='h5 mb-0'>".$t1["username"]." ".$t1["username2"]."</div>
                                                    <div class='text-muted'>$designationname</div>
                                                    <div class='text-muted'>
                                                        <i data-acorn-icon='pin' class='me-1'></i>
                                                        <span class='align-middle'>".$t1["address"].", ".$t1["city"].", ".$t1["area"]."-".$t1["zip"].", ".$t1["country"]."</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='nav flex-column' role='tablist'>
                                                <a class='nav-link active px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#overviewTab' role='tab'>
                                                    <i class='fa-solid fa-dashboard'></i>
                                                    <span class='align-middle'>Overview</span>
                                                </a>
                                                <a class='nav-link px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#projectsTab' role='tab'>
                                                    <i class='fa-solid fa-project-diagram'></i>
                                                    <span class='align-middle'>Projects</span>
                                                </a>
                                                <a class='nav-link px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#permissionsTab' role='tab'>
                                                    <i class='fa-solid fa-tasks'></i>
                                                    <span class='align-middle'>Tasks</span>
                                                </a>
                                                <a class='nav-link px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#friendsTab' role='tab'>
                                                    <i class='fa fa-book'></i>
                                                    <span class='align-middle'>Documents</span>
                                                </a>
                                                <a class='nav-link px-0' data-bs-toggle='tab' href='#aboutTab' role='tab'>
                                                    <i class='fa-solid fa-user'></i>
                                                    <span class='align-middle'>About</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='col-12 col-xl-8 col-xxl-9 mb-5 tab-content'>
                                    <br><br><div class='tab-pane fade show active' id='overviewTab' role='tabpanel'>
                                        <h2 class='small-title'>Stats</h2>
                                        <div class='mb-5'>
                                            <div class='row g-2'>
                                                <div class='col-12 col-sm-6 col-lg-3'>
                                                    <div class='card hover-border-primary'>
                                                        <div class='card-body'>
                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                            <span>Projects</span><i data-acorn-icon='office' class='text-primary'></i>
                                                        </div>
                                                        <div class='text-small text-muted mb-1'>ACTIVE</div>
                                                        <div class='cta-1 text-primary'>14</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-12 col-sm-6 col-lg-3'>
                                                <div class='card hover-border-primary'>
                                                    <div class='card-body'>
                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                            <span>Tasks</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                                        </div>
                                                        <div class='text-small text-muted mb-1'>PENDING</div>
                                                        <div class='cta-1 text-primary'>153</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-12 col-sm-6 col-lg-3'>
                                                <div class='card hover-border-primary'>
                                                    <div class='card-body'>
                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                            <span>Notes</span>
                                                            <i data-acorn-icon='file-empty' class='text-primary'></i>
                                                        </div>
                                                        <div class='text-small text-muted mb-1'>RECENT</div>
                                                        <div class='cta-1 text-primary'>24</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-12 col-sm-6 col-lg-3'>
                                                <div class='card hover-border-primary'>
                                                    <div class='card-body'>
                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                            <span>Views</span><i data-acorn-icon='screen' class='text-primary'></i>
                                                        </div>
                                                        <div class='text-small text-muted mb-1'>THIS MONTH</div>
                                                        <div class='cta-1 text-primary'>524</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h2 class='small-title'>Timeline/Activity Log</h2>
                                    <div class='card mb-5'>
                                        <div class='card-body'>
                                            <div class='row g-0'>
                                            <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                            <div class='w-100 d-flex sh-1'></div>
                                            <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                            <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                            </div>
                                            <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                        </div>
                                        <div class='col mb-4'>
                                            <div class='h-100'>
                                            <div class='d-flex flex-column justify-content-start'>
                                                <div class='d-flex flex-column'>
                                                <a href='#' class='heading stretched-link'>Developing Components</a>
                                                <div class='text-alternate'>21.12.2020</div>
                                                <div class='text-muted mt-1'>
                                                    Jujubes tootsie roll liquorice cake jelly beans pudding gummi bears chocolate cake donut. Jelly-o sugar plum fruitcake bonbon
                                                    bear claw cake cookie chocolate bar. Tiramisu soufflé apple pie.
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0'>
                                        <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                            <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                            <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                            <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                            </div>
                                            <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                        </div>
                                        <div class='col mb-4'>
                                            <div class='h-100'>
                                            <div class='d-flex flex-column justify-content-start'>
                                                <div class='d-flex flex-column'>
                                                <a href='#' class='heading stretched-link pt-0'>HTML Structure</a>
                                                <div class='text-alternate'>14.12.2020</div>
                                                <div class='text-muted mt-1'>
                                                    Pudding gummi bears chocolate chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0'>
                                        <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                            <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                            <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                            <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                            </div>
                                            <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                        </div>
                                        <div class='col mb-4'>
                                            <div class='h-100'>
                                            <div class='d-flex flex-column justify-content-start'>
                                                <div class='d-flex flex-column'>
                                                <a href='#' class='heading stretched-link'>Sass Structure</a>
                                                <div class='text-alternate'>03.11.2020</div>
                                                <div class='text-muted mt-1'>
                                                    Jelly-o wafer sesame snaps candy canes. Danish dragée toffee bonbon. Jelly-o marshmallow cake oat cake caramels jujubes.
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0'>
                                        <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                            <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                            <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                            <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                            </div>
                                            <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                        </div>
                                        <div class='col mb-4'>
                                            <div class='h-100'>
                                            <div class='d-flex flex-column justify-content-start'>
                                                <div class='d-flex flex-column'>
                                                <a href='#' class='heading stretched-link pt-0'>Final Design</a>
                                                <div class='text-alternate'>15.10.2020</div>
                                                <div class='text-muted mt-1'>Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0'>
                                        <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                            <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                            <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                            </div>
                                            <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                            <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                            </div>
                                            <div class='w-100 d-flex h-100 justify-content-center position-relative'></div>
                                        </div>
                                        <div class='col'>
                                            <div class='h-100'>
                                            <div class='d-flex flex-column justify-content-start'>
                                                <div class='d-flex flex-column'>
                                                <a href='#' class='heading stretched-link pt-0'>Wireframe Design</a>
                                                <div class='text-alternate'>08.06.2020</div>
                                                <div class='text-muted mt-1'>Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h2 class='small-title'>Logs</h2>
                            <div class='card'>
                                    <div class='card-body mb-n2'>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>New user registiration</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>3 new product added</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>
                                                Product out of stock:
                                                <a href='#' class='alternate-link underline-link'>Breadstick</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>16 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>Category page returned an error</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>14 products added</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>
                                                New sale:
                                                <a href='#' class='alternate-link underline-link'>Steirer Brot</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>
                                                New sale:
                                                <a href='#' class='alternate-link underline-link'>Soda Bread</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0 mb-2'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>Recived a support ticket</div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>14 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class='row g-0'>
                                        <div class='col-auto'>
                                            <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                            <div class='sh-3'>
                                                <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                            <div class='d-flex flex-column'>
                                                <div class='text-alternate mt-n1 lh-1-25'>
                                                New sale:
                                                <a href='#' class='alternate-link underline-link'>Cholermüs</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col-auto'>
                                            <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                            <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Dec</div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='tab-pane fade' id='projectsTab' role='tabpanel'>
                                <h2 class='small-title'>Projects</h2>
                                <div class='row mb-3 g-2'>
                                    <div class='col mb-1'>
                                        <div class='d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground'>
                                            <input class='form-control' placeholder='Search' />
                                            <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span>
                                            <span class='search-delete-icon d-none'><i data-acorn-icon='close'></i></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='row row-cols-1 row-cols-sm-2 g-2'>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Basic Introduction to Bread Making</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 4</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Active</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Completed</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>4 Facts About Old Baking Techniques</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 3</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Active</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Pending</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Apple Cake Recipe for Starters</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 8</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='lock-on' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Locked</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='sync-horizontal' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Continuing</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>A Complete Guide to Mix Dough for the Molds</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 12</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Active</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Completed</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>14 Facts About Sugar Products</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 2</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-down' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Inactive</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='archive' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Archived</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Easy and Efficient Tricks for Baking Crispy Breads</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 2</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Active</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Pending</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Apple Cake Recipe for Starters</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 6</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-down' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Inactive</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='archive' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Archived</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Simple Guide to Mix Dough</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 22</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='lock-on' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Locked</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Completed</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>10 Secrets Every Southern Baker Knows</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 3</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Active</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='sync-horizontal' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Continuing</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Recipes for Sweet and Healty Treats</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 1</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-down' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Inactive</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Pending</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Better Ways to Mix Dough for the Molds</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 20</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Active</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Pending</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card h-100'>
                                        <div class='card-body'>
                                            <h6 class='heading mb-3'>
                                            <a href='#' class='stretched-link'>
                                                <span class='clamp-line sh-5' data-line='2'>Introduction to Baking Cakes</span>
                                            </a>
                                            </h6>
                                            <div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Contributors: 13</span>
                                            </div>
                                            <div class='mb-2'>
                                                <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Active</span>
                                            </div>
                                            <div>
                                                <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                <span class='align-middle text-alternate'>Completed</span>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Projects Content End -->
                                </div>
                                <!-- Projects Tab End -->

                                <!-- Permissions Tab Start -->
                                <div class='tab-pane fade' id='permissionsTab' role='tabpanel'>
                                    <h2 class='small-title'>Permissions</h2>
                                    <div class='row row-cols-1 g-2'>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                            <input type='checkbox' class='form-check-input' checked />
                                            <span class='form-check-label'>
                                                <span class='content opacity-50'>
                                                <span class='heading mb-1 lh-1-25'>Create</span>
                                                <span class='d-block text-small text-muted'>
                                                    Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish
                                                    dragée.
                                                </span>
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                            <input type='checkbox' class='form-check-input' checked />
                                            <span class='form-check-label'>
                                                <span class='content opacity-50'>
                                                <span class='heading mb-1 lh-1-25'>Publish</span>
                                                <span class='d-block text-small text-muted'>Jelly beans wafer candy caramels fruitcake macaroon sweet roll.</span>
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                            <input type='checkbox' class='form-check-input' checked />
                                            <span class='form-check-label'>
                                                <span class='content opacity-50'>
                                                <span class='heading mb-1 lh-1-25'>Edit</span>
                                                <span class='d-block text-small text-muted'>Jelly cake jelly sesame snaps jelly beans jelly beans.</span>
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                            <input type='checkbox' class='form-check-input' />
                                            <span class='form-check-label'>
                                                <span class='content opacity-50'>
                                                <span class='heading mb-1 lh-1-25'>Delete</span>
                                                <span class='d-block text-small text-muted'>Danish oat cake pudding.</span>
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                            <input type='checkbox' class='form-check-input' checked />
                                            <span class='form-check-label'>
                                                <span class='content opacity-50'>
                                                <span class='heading mb-1 lh-1-25'>Add User</span>
                                                <span class='d-block text-small text-muted'>Soufflé chocolate cake chupa chups danish brownie pudding fruitcake.</span>
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                            <input type='checkbox' class='form-check-input' />
                                            <span class='form-check-label'>
                                                <span class='content opacity-50'>
                                                <span class='heading mb-1 lh-1-25'>Edit User</span>
                                                <span class='d-block text-small text-muted'>Biscuit powder brownie powder sesame snaps jelly-o dragée cake.</span>
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                            <input type='checkbox' class='form-check-input' />
                                            <span class='form-check-label'>
                                                <span class='content opacity-50'>
                                                <span class='heading mb-1 lh-1-25'>Delete User</span>
                                                <span class='d-block text-small text-muted'>
                                                    Liquorice jelly powder fruitcake oat cake. Gummies tiramisu cake jelly-o bonbon. Marshmallow liquorice croissant.
                                                </span>
                                                </span>
                                            </span>
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- Permissions Tab End -->

                                <!-- Friends Tab Start -->
                                <div class='tab-pane fade' id='friendsTab' role='tabpanel'>
                                    <h2 class='small-title'>Friends</h2>
                                    <div class='row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-2 mb-5'>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-1.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Blaine Cottrell</div>
                                                    <div class='text-small text-muted'>Project Manager</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-4.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Cherish Kerr</div>
                                                    <div class='text-small text-muted'>Development Lead</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-8.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Kirby Peters</div>
                                                    <div class='text-small text-muted'>Accounting</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-5.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Olli Hawkins</div>
                                                    <div class='text-small text-muted'>Client Relations Lead</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-2.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Zayn Hartley</div>
                                                    <div class='text-small text-muted'>Customer Engagement</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-3.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Esperanza Lodge</div>
                                                    <div class='text-small text-muted'>UX Designer</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-4.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Kerr Jackson</div>
                                                    <div class='text-small text-muted'>Frontend Developer</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-6.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Kathryn Mengel</div>
                                                    <div class='text-small text-muted'>Team Leader</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-6.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Joisse Kaycee</div>
                                                    <div class='text-small text-muted'>Copywriter</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class='col'>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='row g-0 sh-6'>
                                            <div class='col-auto'>
                                                <img src='img/profile/profile-7.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                <div class='d-flex flex-column'>
                                                    <div>Zayn Hartley</div>
                                                    <div class='text-small text-muted'>Visual Effect Designer</div>
                                                </div>
                                                <div class='d-flex'>
                                                    <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- Friends Tab End -->

                                <!-- About Tab Start -->
                                <div class='tab-pane fade' id='aboutTab' role='tabpanel'>
                                    <h2 class='small-title'>About</h2>
                                    <div class='card'>
                                    <div class='card-body'>
                                        <div class='mb-5'>
                                        <p class='text-small text-muted mb-2'>ME</p>
                                        <p>
                                            Jujubes brownie marshmallow apple pie donut ice cream jelly-o jelly-o gummi bears. Tootsie roll chocolate bar dragée bonbon cheesecake
                                            icing. Danish wafer donut cookie caramels gummies topping.
                                        </p>
                                        </div>
                                        <div class='mb-5'>
                                        <p class='text-small text-muted mb-2'>INTERESTS</p>
                                        <p>
                                            Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish dragée.
                                            Apple pie cotton candy tiramisu biscuit cake muffin tootsie roll bear claw cake. Cupcake cake fruitcake.
                                        </p>
                                        </div>
                                        <div>
                                        <p class='text-small text-muted mb-2'>CONTACT</p>
                                        <a href='#' class='d-block body-link mb-1'>
                                            <i data-acorn-icon='screen' class='me-2' data-acorn-size='17'></i>
                                            <span class='align-middle'>blainecottrell.com</span>
                                        </a>
                                        <a href='#' class='d-block body-link'>
                                            <i data-acorn-icon='email' class='me-2' data-acorn-size='17'></i>
                                            <span class='align-middle'>contact@blainecottrell.com</span>
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>";
                        
                        echo"<fieldset>
                                                <h2>Personal Detail</h2>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Support ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div><br></div>";
                                                    // <div class='col-lg-2'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div><br></div>
                                                    echo"<div class='col-lg-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                                        <option value='".$t1["country"]."'>".$t1["country"]."</option>";
                                                        
                                                        include('countries.php');   
                                                        
                                                    echo"</select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                        <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                        <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                    </select></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Financial Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Official Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>";
                                                        $s7x = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                                                        $r7x = $conn->query($s7x);
                                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                            echo"<option value='".$rs7x["id"]."'>".$rs7x["designation"]."</option>";
                                                        } }
                                                        $s7 = "select * from designation where status='ON' order by id asc";
                                                        $r7 = $conn->query($s7);
                                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                            echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                                        } }
                                                    echo"</select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>";
                                                        $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                                        $r7x = $conn->query($s7x);
                                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                            echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                                        } }
                                                        $s7 = "select * from departments where status='ON' order by id asc";
                                                        $r7 = $conn->query($s7);
                                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                            echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                                        } }
                                                    echo"</select></div><br></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                        <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='SUPPORT'>SUPPORT</option>
                                                    </select></div><br></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Accounts Detail</h2><br>
                                                <div class='row'> 
                                                    <div class='col-lg-2'><div class='form-group'><label>Commission Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                                        <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                                        <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Regular Commission</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Saturday Commission</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Sunday Commission</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Public holiday Comm.</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Over Night Commission</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' required></div><br></div>
                                                    
                                                    <div class='col-lg-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' required></div><br></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                                        <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                                        <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                                    </select></div><br></div>
                                                    
                                                    <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                                    <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                                    <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";

                                                    /*
                                                    <div class='col-lg-12'>&nbsp;</div>                                                    
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF contribution</label><select class='form-control m-b' name='pf'>
                                                        <option value='".$t1["pf"]."'>".$t1["pf"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF No.</label><input name='pf_no' type='number' value='".$t1["pf_no"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF rate</label><input name='pf_rate' type='number' value='".$t1["pf_rate"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI contribution</label><select class='form-control m-b ' name='esi'>
                                                        <option value='".$t1["esi"]."'>".$t1["esi"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                    </select></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI No.</label><input name='esi_no' type='number' value='".$t1["esi_no"]."' class='form-control'></div><br></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI rate</label><input name='esi_rate' type='number' value='".$t1["esi_rate"]."' class='form-control'></div><br></div>";
                                                    */

                                                echo"</div>
                                            </fieldset>
                                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                            </div>";
                                        } }
            }

        }else{

            if($cid==7){
                $randid=rand(100,999);
                $ctime=time();
                $rdate=date("Y-m-d",$ctime);                

                echo"<input type=hidden name='processor' value='new_$utype'>
                            <fieldset>
                                <h2>Personal Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$rdate' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contract Date *</label><input name='jdate' type='date' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Client ID *</label><input name='employeeid' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='$randid' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='1234567' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                        <option value=''>Select Country</option>";
                                        
                                        include('countries.php');
                                           
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                        <option value=''>Select Gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                    </select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                        <option value=''>Select Marital Status</option><option value='SINGLE'>SINGLE</option><option value='MARRIED'>MARRIED</option>
                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Financial Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>NDIS Number</label><input name='ndis_number' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='' class='form-control'></div><br></div>
                                
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                        <option value='CLIENT'>CLIENT</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                                <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                            </div>";
            }

            if($cid==8){
                $randid=rand(100,999);
                $ctime=time();
                $rdate=date("Y-m-d",$ctime);                

                echo"<input type=hidden name='processor' value='new_$utype'>
                            <fieldset>
                                <h2>Personal Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$rdate' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contract Date *</label><input name='jdate' type='date' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Vendor ID *</label><input name='employeeid' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='$randid' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='1234567' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                        <option value=''>Select Country</option>";
                                        
                                        include('countries.php');
                                          
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                        <option value=''>Select Gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                    </select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                        <option value=''>Select Marital Status</option><option value='SINGLE'>SINGLE</option><option value='MARRIED'>MARRIED</option>
                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Store Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Name</label><input name='store_name' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Address</label><input name='store_address' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Phone</label><input name='store_phone' type='text' value='' class='form-control'></div><br></div>
                                </div>
                            </fieldset>
                            <fieldset><br>
                                <h2>Financial Detail</h2><br>
                                    <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='' class='form-control'></div><br></div>
                                
                                    <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                        <option value='VENDOR'>VENDOR</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                                <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                            </div>";
            }
            
            if($cid==9){
                $randid=rand(100,999);
                $ctime=time();
                $rdate=date("Y-m-d",$ctime);                
                
                echo"<input type=hidden name='processor' value='new_$utype'>
                            
                            <fieldset>
                                <h2>Personal Detail</h2>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date *</label><input name='jdate' type='date' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Employee ID *</label><input name='employeeid' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='$randid' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='1234567' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                        <option value=''>Select Country</option>";
                                        
                                        include('countries.php');
                                        
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                        <option value=''>Select Gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                    </select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                        <option value=''>Select Marital Status</option><option value='SINGLE'>SINGLE</option><option value='MARRIED'>MARRIED</option>
                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Financial Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='' class='form-control'></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Official Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>
                                        <option value='0'>Select Designation</option>";
                                        $s7 = "select * from designation where status='ON' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                        } }
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>
                                        <option value='0'>Select Department</option>";
                                        $s7 = "select * from departments where status='ON' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                        } }
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                        <option value=''>Select Account Type</option><option value='USER'>USER (EMPLOYEE)</option><option value='ADMIN'>ADMIN</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Accounts Detail</h2><br>
                                <div class='row'>        
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Wage Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                        <option value=''>Select Wage Basic Type</option><option value='Hourly'>Hourly</option>
                                        <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                    </select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Regular Wage Amount</label><input name='reg_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Saturday Wage Amount</label><input name='sat_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Sunday Wage Amount</label><input name='sun_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Public holiday Wage Amount</label><input name='hol_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Over Night Wage Amount</label><input name='night_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                        <option value=''>Select Payment Type</option><option value='Bank Transfer'>Bank Transfer</option>
                                        <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                                <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                            </div>";
            }

            if($cid==10){
                $randid=rand(100,999);
                $ctime=time();
                $rdate=date("Y-m-d",$ctime);                
                
                echo"<input type=hidden name='processor' value='new_$utype'>
                            
                            <fieldset>
                                <h2>Personal Detail</h2>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date *</label><input name='jdate' type='date' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Support ID *</label><input name='employeeid' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='$randid' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='1234567' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                        <option value=''>Select Country</option>";
                                                        
                                        include('countries.php');
                                        
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                        <option value=''>Select Gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                    </select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                        <option value=''>Select Marital Status</option><option value='SINGLE'>SINGLE</option><option value='MARRIED'>MARRIED</option>
                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Financial Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='' class='form-control'></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='' class='form-control'></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Official Detail</h2><br>
                                <div class='row'>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>
                                        <option value='0'>Select Designation</option>";
                                        $s7 = "select * from designation where status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                        } }
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>
                                        <option value='0'>Select Department</option>";
                                        $s7 = "select * from departments where status='ON' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                        } }
                                    echo"</select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                        <option value=''>Select Account Type</option><option value='SUPPORT'>SUPPORT</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            
                            <fieldset><br>
                                <h2>Accounts Detail</h2><br>
                                <div class='row'>        
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Commission Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                        <option value=''>Select Wage Basic Type</option><option value='Hourly'>Hourly</option>
                                        <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                    </select></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Regular Commission</label><input name='reg_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Saturday Commission</label><input name='sat_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Sunday CommissIon</label><input name='sun_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Public holiday CommISSION</label><input name='hol_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Over Night Commission</label><input name='night_amt' type='number' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='0' class='form-control' required></div><br></div>
                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                        <option value=''>Select Payment Type</option><option value='Bank Transfer'>Bank Transfer</option>
                                        <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                    </select></div><br></div>
                                </div>
                            </fieldset>
                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                                <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                            </div>";
            }


        }
    echo"</form>
</div>";
?>

    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="js/vendor/Chart.bundle.min.js"></script>
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <script src="js/cs/charts.extend.js"></script>
    <script src="js/pages/profile.standard.js"></script>
    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>