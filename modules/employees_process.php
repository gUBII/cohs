<?php
$cdate=time();
$cdate=date("Y-m-d", $cdate);    
$cid=$_GET["cid"];
$sheba=$_GET["sheba"];
$utype=$_GET["utype"];

$profile=$_GET["profile"];

error_reporting(0);

include("../authenticator.php");

$cid=0;
if(isset($_GET["cid"])) $cid=$_GET["cid"];

// echo"$cdate, $cid, $sheba, $utype, ".$_GET["mid"]." ";

echo"<div class='offcanvas-header'>
    <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
    <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
</div>
<div class='offcanvas-body'>
    <form method='post' name='dataform' action='dataprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' >";
        
        if(isset($_GET["mid"]) && $_GET["mid"]!=0){
            if($_GET["cid"]==7){
                echo"<input type='hidden' name='processor' value='edit_$utype'><input type='hidden' name='id' value='".$_GET["mid"]."'>";
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
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Title *</label>
                                <select class='form-control m-b required ' name='title'>
                                    <option value='".$t1["title"]."'>".$t1["title"]."</option><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option>
                                    <option value='Ms'>Ms</option><option value='Dr'>Dr</option><option value='Miss'>Miss</option><option value='Master'>Master</option>
                                </select>
                            </div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Preferred Name: *</label><input name='nickname' type='text' value='".$t1["nickname"]."' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control' readonly></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Employee ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required readonly></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Password (Optional)</label><input name='password' type='text' value='' class='form-control'></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                            </select></div></div>
                            <div class='col-md-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' ></div></div>
                            <div class='col-md-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                            <div class='col-md-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control'></div></div>
                            <div class='col-md-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control'></div></div>
                            <div class='col-md-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control'></div></div>
                            <div class='col-md-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country'>
                                <option value='".$t1["country"]."'>".$t1["country"]."</option>";
                                
                                include 'countries.php';
                                
                            echo"</select></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country of Birth</label><select class='form-control m-b required' name='birth_country'>
                                <option value='".$t1["birth_country"]."'>".$t1["birth_country"]."</option>";
                                
                                include 'countries.php';
                            
                            echo"</select></div></div>
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Language Spoken *</label><input name='language_spoken' type='text' value='".$t1["language_spoken"]."' class='form-control'></div></div>
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Emergency Contact Name</label><input name='emergency_contact_1' type='text' value='".$t1["emergency_contact_1"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Emergency Contact Phone</label><input name='emergency_phone_1' type='text' value='".$t1["emergency_phone_1"]."' class='form-control'></div></div>
                            
                        </div>
                        <br><hr>
                        <h2>Official Detail</h2><br>
                        <div class='row'>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Employee Card ID (*)</label><input name='application_id' type='text' value='".$t1["application_id"]."' class='form-control' required ></div></div>
                        
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Designation*</label><select class='form-control m-b required' name='designation' required=''>";
                                $s7x = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                                $r7x = $conn->query($s7x);
                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                    echo"<option value='".$rs7x["id"]."'>".$rs7x["designation"]."</option>";
                                } }
                                if($mtype!="CLIENT"){
                                    $s7 = "select * from designation where status='ON' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                    } }
                                }
                            echo"</select></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>User Level *</label><select class='form-control m-b required' name='department' required>";
                                $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                $r7x = $conn->query($s7x);
                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                    echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                } }
                                if($mtype!="CLIENT"){
                                    $s7 = "select * from departments where status='ON' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                    } }
                                }
                            echo"</select></div></div>";
                            
                            if($mtype!="CLIENT"){
                                echo"<div class='col-md-2'><div class='form-group'><label>Job Experience</label><input name='job_experience' type='number' value='".$t1["job_experience"]."' min='0' max='50' class='form-control'></div></div>";
                            }else{
                                echo"<input name='job_experience' type='hidden' value='".$t1["job_experience"]."' min='0' max='50' class='form-control'>";
                            }
                            
                            echo"<div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Account Types</label><select class='form-control m-b required' name='mtype' required>
                                <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option>";
                                if($mtype=="ADMIN"){
                                    echo"<option value='ADMIN'>ADMIN</option>";
                                }
                            echo"</select></div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Team</label><select class='form-control m-b required' name='team'>
                                <option value='".$t1["team"]."'>".$t1["team"]."</option>
                                <option value='General'>General</option>
                                <option value='Case Managers'>Case Managers</option>
                                <option value='Domestic Workers'>Domestic Workers</option>
                                <option value='External/Brokerage'>External/Brokerage</option>
                                <option value='Payroll/Finance'>Payroll/Finance</option>
                                <option value='Personal Care Workers'>Personal Care Workers</option>
                                <option value='Registered Nurse'>Registered Nurse</option>
                                <option value='Scheduling Staff'>Scheduling Staff</option>
                                <option value='Volunteers'>Volunteers</option>
                            </select></div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Geographic Region *</label><select class='form-control m-b required' name='geographic_regions' required>";
                                $s7x = "select * from geographic_regions where status='1' order by id asc";
                                $r7x = $conn->query($s7x);
                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                    if($t1["geographic_regions"]==$rs7x["id"]) echo"<option value='".$rs7x["id"]."' selected>".$rs7x["address"].", ".$rs7x["region"]."</option>";
                                    else echo"<option value='".$rs7x["id"]."'>".$rs7x["address"].", ".$rs7x["region"]."</option>";
                                } }
                            echo"</select></div></div>
                            
                        </div><br>";
                        
                        if($mtype!="CLIENT"){
                            
                            echo"<h2>HR Accounts Detail (Optional)</h2><br>
                            <div class='row'> 
                                <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Pay Group *</label><select class='form-control m-b required ' name='schads_status'>
                                    <option value='".$t1["schads_status"]."'>".$t1["schads_status"]."</option>
                                    <option value='None'>None</option>
                                    <option value='SCHADS Casual'>SCHADS Casual</option>
                                    <option value='SCHADS Perm'>SCHADS Perm</option>
                                    <option value='Clerical Casual'>Clerical Casual</option>
                                    <option value='Nurses Award'>Nurses Award</option>
                                    <option value='Full-time/Part-time'>Full-time/Part-time</option><option value='Casual'>Casual</option>
                                </select></div></div>
                                
                                <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>SCHADS Level</label><select class='form-control m-b required' name='schads_level'>
                                    <option value='".$t1["schads_level"]."'>".$t1["schads_level"]."</option><option value='Level 1'>Level 1</option><option value='Level 2'>Level 2</option>
                                    <option value='Level 3'>Level 3</option><option value='Level 4'>Level 4</option><option value='Level 5'>Level 5</option>
                                    <option value='Level 6'>Level 6</option><option value='Level 7'>Level 7</option><option value='Level 8'>Level 8</option>
                                </select></div></div>
                                <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>SCHADS Pay Point</label><select class='form-control m-b required' name='schads_paypoint'>
                                   <option value='".$t1["schads_paypoint"]."'>".$t1["schads_paypoint"]."</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>
                                </select></div></div>
                        
                                <div class='col-md-2'><div class='form-group'><label>Wage Basic</label><select class='form-control m-b required' name='salary_basic'>
                                    <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                    <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                </select></div></div>
                                
                                <input name='reg_amt' type='hidden' value='".$t1["reg_amt"]."'>
                                <input name='sat_amt' type='hidden' value='".$t1["sat_amt"]."'>
                                <input name='sun_amt' type='hidden' value='".$t1["sun_amt"]."'>
                                <input name='hol_amt' type='hidden' value='".$t1["hol_amt"]."'>
                                <input name='night_amt' type='hidden' value='".$t1["night_amt"]."'>
                                <input name='overtime' type='hidden' value='".$t1["overtime"]."'>";
                                
                                /*
                                <div class='col-md-2'><div class='form-group'><label>Regular Wage</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' ></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Saturday Wage</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' ></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Sunday Wage</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' ></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Public holiday</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' ></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Over Night Wage</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' ></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' ></div></div>
                                */
                                
                                echo"<div class='col-md-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div></div>
                                <div class='col-md-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' >
                                    <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                    <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                </select></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                                <div class='col-md-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>                   
                                
                                <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>
                            </div>";
                        }else{
                            
                            echo"<input type=hidden name='salary_basic' value='".$t1["salary_basic"]."'>
                            <input name='reg_amt' type='hidden' value='".$t1["reg_amt"]."'>
                            <input name='sat_amt' type='hidden' value='".$t1["sat_amt"]."'>
                            <input name='sun_amt' type='hidden' value='".$t1["sun_amt"]."'>
                            <input name='hol_amt' type='hidden' value='".$t1["hol_amt"]."'>
                            <input name='night_amt' type='hidden' value='".$t1["night_amt"]."'>
                            <input name='overtime' type='hidden' value='".$t1["overtime"]."'>
                            <input type=hidden name='payment_type' value='".$t1["payment_type"]."'>
                            <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                            <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                            <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";
                        }
                        
                        echo"<br><h2>Notes</h2><br>
                        <div class='row'>
                            <div class='col-12' style='margin-bottom:15px'><div class='form-group'>
                                <label>Notes</label>
                                <textarea name='note' class='form-control' style='width:100%'>".$t1["note"]."</textarea>";
                                ?><script>
                                    $('#summernote1').summernote({
                                        placeholder: 'Detail Note', tabsize: 2, height: 120,
                                        toolbar: [
                                            ['style', ['style']], ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']], ['insert', ['link']], ['view', ['codeview']]
                                        ]
                                    });
                                </script><?php
                            echo"</div></div>
                            <div class='col-12' style='margin-bottom:15px'><div class='form-group'>
                                <label>Rostering Notes:</label>
                                <textarea name='note_for_staff' class='form-control' style='width:100%'>".$t1["note_for_staff"]."</textarea>";
                                ?><script>
                                    $('#summernote1').summernote({
                                        placeholder: 'Detail Note', tabsize: 2, height: 120,
                                        toolbar: [
                                            ['style', ['style']], ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']], ['insert', ['link']], ['view', ['codeview']]
                                        ]
                                    });
                                </script><?php
                            echo"</div></div>
                        </div>
                    
                    </fieldset>
                    
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        if($profile==1){
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' >Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit'>Update</button>";
                        }else{
                            if(isset($_GET["nofollow"]) && $_GET["nofollow"]==1){
                                echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."&mtype=".$_GET["mtype"]."', 'datatableX')\">Close</button>&nbsp;
                                <button class='btn btn-primary' type='reset' >Reset</button> &nbsp;
                                <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."&mtype=".$_GET["mtype"]."', 'datatableX')\">Update</button>";
                            }else{
                                echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."&mtype=".$_GET["mtype"]."', 'datatableX')\">Close</button>&nbsp;
                            <button class='btn btn-primary' type='reset' >Reset</button> &nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."&mtype=".$_GET["mtype"]."', 'datatableX')\">Update</button>";
                            }
                        }
                    echo"</div>";
                } }
            }

        }else{
            $randid=rand(100,999);
                $ctime=time();
                $rdate=date("Y-m-d",$ctime);                
                $next_uid=0;
                $s7 = "select * from uerp_user where mtype='USER' OR mtype='EMPLOYEE' OR mtype='ADMIN' order by id desc limit 1";                
                $r7 = $conn->query($s7);
                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { $next_uid=($rs7["id"]+1); } }
 
                echo"<input type=hidden name='processor' value='new_$utype'>
                    <fieldset>
                        <h2>Personal Detail</h2>
                        <input name='ndis_number' type='hidden' value='0' class='form-control'>
                        <div class='row'>
                            <input name='ndis_number' type='hidden' value='0'>
                            <input name='marital_status' type='hidden' value=''>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$rdate' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date *</label><input name='jdate' type='date' value='$rdate' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Title *</label>
                                <select class='form-control m-b required ' name='title'>
                                    <option value=''>Select Title</option><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option>
                                    <option value='Ms'>Ms</option><option value='Dr'>Dr</option><option value='Miss'>Miss</option><option value='Master'>Master</option>
                                </select>
                            </div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='' class='form-control' required></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Preferred Name: *</label><input name='nickname' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$rdate' class='form-control'></div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Employee ID *</label><input name='employeeid' type='number' value='$next_uid' class='form-control' readonly></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='' placeholder='Auto Generated' class='form-control' required readonly></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Email Address (For Login) *</label><input name='email' type='text' value='' class='form-control' required onchange='document.dataform.userid.value=this.value'></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Login Password *</label><input name='password' type='password' value='1234567' class='form-control' required ></div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                <option value=''>Select Gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                            </select></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='' class='form-control'></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                            <option value=''>Select Country</option>";
                                
                                include 'countries.php';
                                
                        echo"</select></div></div>
                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country of Birth</label><select class='form-control m-b required' name='birth_country'>
                            <option value=''>Select Birth Country</option>";
                            
                            include 'countries.php';
                        
                        echo"</select></div></div>
                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Language Spoken *</label><input name='language_spoken' type='text' value='' class='form-control'></div></div>
                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Emergency Contact Name</label><input name='emergency_contact_1' type='text' value='' class='form-control'></div></div>
                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Emergency Contact Phone</label><input name='emergency_phone_1' type='text' value='' class='form-control'></div></div>
                    </div>
                </fieldset>
                <fieldset><br>
                    <h2>Official Detail</h2><br>
                    <div class='row'>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Employee Card ID (*)</label><input name='application_id' type='text' value='' class='form-control' required ></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>";
                            echo"<option value=''>Select Role</option>";
                            // echo"<option value='11'>Support Worker</option>";
                            $s7 = "select * from designation where status='ON' order by id asc";
                            $r7 = $conn->query($s7);
                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                            } }
                        echo"</select></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>User Level *</label><select class='form-control m-b required' name='department' required>
                            <option value='0'>Select Department</option>";
                            $s7 = "select * from departments where status='ON' order by id asc";
                            $r7 = $conn->query($s7);
                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                            } }
                        echo"</select></div></div>
                        <div class='col-md-2'><div class='form-group'><label>Job Experience</label><input name='job_experience' type='number' value='0' min='0' max='50' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                            <option value='USER'>USER</option><option value='ADMIN'>ADMIN</option>
                        </select></div></div>
                        
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Team</label><select class='form-control m-b required' name='team'>
                            <option value='General'>General</option>
                            <option value='Case Managers'>Case Managers</option>
                            <option value='Domestic Workers'>Domestic Workers</option>
                            <option value='External/Brokerage'>External/Brokerage</option>
                            <option value='Payroll/Finance'>Payroll/Finance</option>
                            <option value='Personal Care Workers'>Personal Care Workers</option>
                            <option value='Registered Nurse'>Registered Nurse</option>
                            <option value='Scheduling Staff'>Scheduling Staff</option>
                            <option value='Volunteers'>Volunteers</option>
                        </select></div></div>
                            
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Geographic Region *</label><select class='form-control m-b required' name='geographic_regions' required>";
                            echo"<option value=''>Select Geographic Region</option>";
                            $s7x = "select * from geographic_regions where status='1' order by id asc";
                            $r7x = $conn->query($s7x);
                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                echo"<option value='".$rs7x["id"]."'>".$rs7x["address"].", ".$rs7x["region"]."</option>";
                            } }
                        echo"</select></div></div>
                    </div>
                </fieldset>
                            
                <fieldset><br>
                    <h2>HR Accounts Detail (Optional)</h2><br>
                    <div class='row'>        
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Pay Group *</label><select class='form-control m-b required ' name='schads_status'>
                            <option value='None'>None</option>
                            <option value='SCHADS Casual'>SCHADS Casual</option>
                            <option value='SCHADS Perm'>SCHADS Perm</option>
                            <option value='Clerical Casual'>Clerical Casual</option>
                            <option value='Nurses Award'>Nurses Award</option>
                            <option value='Full-time/Part-time'>Full-time/Part-time</option><option value='Casual'>Casual</option>
                        </select></div></div>
                        
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>SCHADS Level</label><select class='form-control m-b required' name='schads_level'>
                            <option value=''>Select Level</option><option value='Level 1'>Level 1</option><option value='Level 2'>Level 2</option>
                            <option value='Level 3'>Level 3</option><option value='Level 4'>Level 4</option><option value='Level 5'>Level 5</option>
                            <option value='Level 6'>Level 6</option><option value='Level 7'>Level 7</option><option value='Level 8'>Level 8</option>
                        </select></div></div>
                        
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>SCHADS Pay Point</label><select class='form-control m-b required' name='schads_paypoint'>
                            <option value=''>Select Pay Point</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option>
                        </select></div></div>
                        
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Wage Basic</label><select class='form-control m-b required' name='salary_basic'>
                            <option value=''>Select Wage Basic Type</option><option value='Hourly'>Hourly</option>
                            <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                        </select></div></div>
                        
                        <input name='reg_amt' type='hidden' value='35'>
                        <input name='sat_amt' type='hidden' value='0'>
                        <input name='sun_amt' type='hidden' value='0'>
                        <input name='hol_amt' type='hidden' value='0'>
                        <input name='night_amt' type='hidden' value='0'>
                        <input name='overtime' type='hidden' value='0'>";
                        
                        /*
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Regular Wage Amount</label><input name='reg_amt' type='number' value='35' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Saturday Wage Amount</label><input name='sat_amt' type='number' value='0' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Sunday Wage Amount</label><input name='sun_amt' type='number' value='0' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Public holiday Wage Amount</label><input name='hol_amt' type='number' value='0' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Over Night Wage Amount</label><input name='night_amt' type='number' value='0' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='0' class='form-control'></div></div>
                        */
                        echo"<div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type'>
                            <option value=''>Select Payment Type</option><option value='Bank Transfer'>Bank Transfer</option>
                            <option value='Check'>Check</option><option value='Cash'>Cash</option>
                        </select></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='' class='form-control'></div></div>
                        <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='' class='form-control'></div></div>
                    </div>
                    
                    <br><h2>Notes</h2><br>
                        <div class='row'>
                            <div class='col-12' style='margin-bottom:15px'><div class='form-group'>
                                <label>Notes</label>
                                <textarea name='note' class='form-control' style='width:100%'>".$t1["note"]."</textarea>";
                                ?><script>
                                    $('#summernote1').summernote({
                                        placeholder: 'Detail Note', tabsize: 2, height: 120,
                                        toolbar: [
                                            ['style', ['style']], ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']], ['insert', ['link']], ['view', ['codeview']]
                                        ]
                                    });
                                </script><?php
                            echo"</div></div>
                            <div class='col-12' style='margin-bottom:15px'><div class='form-group'>
                                <label>Rostering Notes:</label>
                                <textarea name='note_for_staff' class='form-control' style='width:100%'>".$t1["note_for_staff"]."</textarea>";
                                ?><script>
                                    $('#summernote1').summernote({
                                        placeholder: 'Detail Note', tabsize: 2, height: 120,
                                        toolbar: [
                                            ['style', ['style']], ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']], ['insert', ['link']], ['view', ['codeview']]
                                        ]
                                    });
                                </script><?php
                            echo"</div></div>
                        </div>
                </fieldset>";
                
            echo"<div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."&mtype=".$_GET["mtype"]."', 'datatableX')\">Close</button>&nbsp;
                <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."&mtype=".$_GET["mtype"]."', 'datatableX')\"  onmouseover='document.dataform.userid.value=document.datafrom.email.value'>Save</button>
            </div>";
            
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
    
    

<?php

/*            
            if($_GET["cid"]==9){
                
            }

        }else{

            if($cid==9){
                
            }
        }
    echo"</form>
</div>";

*/