<?php
$cdate=time();
$cdate=date("Y-m-d", $cdate);    
$cid=$_GET["cid"];
$sheba=$_GET["sheba"];
$utype="tasks";

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
    <form method='post' name='dataform' action='taskprocessor.php' target='dataprocessor' enctype='multipart/form-data' >";
        
        if(isset($_GET["mid"]) && $_GET["mid"]!=0){
            
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
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control' readonly></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Employee ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required readonly></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                        <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                    </select></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                        <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                        <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                    </select></div></div>
                                                    
                                                    <div class='col-lg-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                                        <option value='".$t1["country"]."'>".$t1["country"]."</option>
                                                        <option value='Afghanistan'>Afghanistan</option>
                                                            
                                                    </select></div></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Financial Detail</h2><br>
                                                <div class='row'>
                                                    <div class='col-lg-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>
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
                                                        $s7 = "select * from designation where status='1' order by id asc";
                                                        $r7 = $conn->query($s7);
                                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                            echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                                        } }
                                                    echo"</select></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>";
                                                        $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                                        $r7x = $conn->query($s7x);
                                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                            echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                                        } }
                                                        $s7 = "select * from departments where status='1' order by id asc";
                                                        $r7 = $conn->query($s7);
                                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                            echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                                        } }
                                                    echo"</select></div></div>
                                                    
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                        <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='EMPLOYEE'>EMPLOYEE</option><option value='ADMIN'>ADMIN</option>
                                                    </select></div></div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset><br>
                                                <h2>Accounts Detail</h2><br>
                                                <div class='row'> 
                                                    <div class='col-lg-2'><div class='form-group'><label>Wage Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                                        <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                                        <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                                    </select></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Regular Wage</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Saturday Wage</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Sunday Wage</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Public holiday</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Over Night Wage</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' required></div></div>
                                                    
                                                    <div class='col-lg-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' required></div></div>
                                                    <div class='col-lg-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                                        <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                                        <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                                    </select></div></div>
                                                    
                                                    <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                                    <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                                    <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";

                                                    /*
                                                    <div class='col-lg-12'>&nbsp;</div>                                                    
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF contribution</label><select class='form-control m-b' name='pf'>
                                                        <option value='".$t1["pf"]."'>".$t1["pf"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                    </select></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF No.</label><input name='pf_no' type='number' value='".$t1["pf_no"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF rate</label><input name='pf_rate' type='number' value='".$t1["pf_rate"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI contribution</label><select class='form-control m-b ' name='esi'>
                                                        <option value='".$t1["esi"]."'>".$t1["esi"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                    </select></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI No.</label><input name='esi_no' type='number' value='".$t1["esi_no"]."' class='form-control'></div></div>
                                                    <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI rate</label><input name='esi_rate' type='number' value='".$t1["esi_rate"]."' class='form-control'></div></div>";
                                                    */

                                                echo"</div>
                                            </fieldset>
                                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('task_manager_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                            </div>";
                                        } }
            }

        }else{

            if($cid==9001){
                $randid=rand(100,999);
                $ctime=time();
                $rdate=date("Y-m-d H:m:s",$ctime);                
                $next_uid=0;
                /*
                $s7 = "select * from tasks where mtype='USER' OR mtype='$utype' OR mtype='ADMIN' order by id desc limit 1";                
                $r7 = $conn->query($s7);
                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { $next_uid=($rs7["uid"]+1); } }
                */
                
                echo"<input type='hidden' name='processor' value='tasklist'><input type='hidden' name='id' value=''>
                <fieldset>
                    <div class='row'>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Task Title*</label>
        			        <input type='text' class=form-control name='title' value='' required>
                        </div></div>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Assignee Name *</label>
                            <select class='form-control m-b required' name='employeeid'>
                                <option value=''>Select Tasks Leader</option>";
                                $s7 = "select * from uerp_user where mtype='ADMIN' and status='1' order by id asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                } }
                                $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                } }
                            echo"</select>
                        </div></div>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Participants Name *</label>
                            <select class='form-control m-b required' name='clientid'>
                                <option value=''>Select Lead/Project Name</option>";
                                $s77 = "select * from project where status='1' order by name asc";
                                $r77 = $conn->query($s77);
                                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                    if($rs77["lead"]==0) $leadstatus="Closed";
                                    if($rs77["lead"]==1) $leadstatus="Lead";
                                    if($rs77["lead"]==2) $leadstatus="Project";
                                    if($rs77["lead"]==3) $leadstatus="Missed";

                                    $s7 = "select * from uerp_user where id='".$rs77["clientid"]."' order by id asc limit 1";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        $clientname="".$rs7["username"]." ".$rs7["username2"]."";
                                    } }
                                    echo"<option value='".$rs77["id"]."'>".$rs77["name"]." ($clientname) ($leadstatus).</option>";
                                } }

                            echo"</select>
                        </div></div>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Task Detail*</label>
        			        <textarea id='summernote' name='detail' class='form-control'></textarea>
                        </div></div>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Date & Time *</label>
                            <input type='datetime-local' class=form-control name='date' value='$rdate'>
                        </div></div>
                        <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Attachment (if any)</label>
        			        <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                        </div></div>
                        <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Task Mode *</label>
                            <select class='form-control m-b required' name='mode'>
                                <option value=''>Select Task Mode</option>
                                <option value='OPEN'>OPEN</option>
                                <option value='SELECTIVE'>SELECTIVE</option>
                            </select>
                        </div></div>
                        <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Priority Level *</label>
        			        <select class='form-control m-b required' name='priority'>
        			            <option value='1'>1 (Neutral)</option><option value='0'>0 (Low)</option><option value='2'>2 (Medium)</option>
        			            <option value='3'>3 (High)</option>
        			        </select>
                        </div></div>
                        
                    </div>
                </fieldset>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' >Close</button>&nbsp;
                    <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;
                    <button class='btn btn-primary' type='submit'   onmouseover='document.dataform.userid.value=document.datafrom.email.value'>Add Task</button>
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