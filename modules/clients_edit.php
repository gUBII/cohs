<?php
$cdate=time();
$cdate=date("Y-m-d", $cdate);    
$cid=$_GET["cid"];
$sheba=$_GET["sheba"];
$utype=$_GET["utype"];

error_reporting(0);

include("../authenticator.php");

$cid=0;
if(isset($_GET["cid"])) $cid=$_GET["cid"];

echo"<div class='offcanvas-header'>
    <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
    <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
</div>

<div class='offcanvas-body'>
    <form method='post' name='dataform' action='dataprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' >";
        
        if(isset($_GET["mid"]) && $_GET["mid"]!=0){
            if($_GET["cid"]==7){
                echo"<input type='hidden' name='processor' value='edit_CLIENT'><input type='hidden' name='id' value='".$_GET["mid"]."'>";
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
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' readonly></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contract Date *</label><input name='jdate' type='date' value='$jdate' class='form-control' readonly></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Title *</label>
                                <select class='form-control m-b required ' name='title'>
                                    <option value='".$t1["title"]."'>".$t1["title"]."</option><option value='Mr'>Mr</option><option value='Mrs'>Mrs</option>
                                    <option value='Ms'>Ms</option><option value='Dr'>Dr</option><option value='Miss'>Miss</option><option value='Master'>Master</option>
                                </select>
                            </div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Preferred Name:</label><input name='nickname' type='text' value='".$t1["nickname"]."' class='form-control'></div></div>
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Client ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' readonly></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' readonly></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control' readonly></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login Password (optional) *</label><input name='password' type='text' value='' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                            </select></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                            </select></div></div>
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>City *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>State *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Post Code *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div></div>                                                    
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                <option value='".$t1["country"]."'>".$t1["country"]."</option>";
                                
                                include 'countries.php';
                            
                            echo"</select></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country of Birth #</label><select class='form-control m-b required' name='birth_country' required>
                                <option value='".$t1["birth_country"]."'>".$t1["birth_country"]."</option>";
                                
                                include 'countries.php';
                            
                            echo"</select></div></div>
                            
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Language Spoken *</label>
                                <input name='language_spoken' type='text' value='".$t1["language_spoken"]."' class='form-control'>
                                <input name='hcp_grandfathered' type='hidden' value='NO'>
                                <input name='allied_health' type='hidden' value='NO'>
                                <input name='referred_source' type='hidden' value='0'>
                                <input name='ref_number' type='hidden' value='0'>
                                <input name='medicare_import_ref' type='hidden' value='0'>
                                <input name='naps_service_id' type='hidden' value='0'>
                                <input name='payment_type' type='hidden' value='Bank Transfer'>
                                
                            </div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Geographic Region *</label><select class='form-control m-b required' name='geographic_regions' required>";
                                $s7x = "select * from geographic_regions where status='1' order by id asc";
                                $r7x = $conn->query($s7x);
                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                    if($t1["geographic_regions"]==$rs7x["id"]) echo"<option value='".$rs7x["id"]."' selected>".$rs7x["address"].", ".$rs7x["region"]."</option>";
                                    else echo"<option value='".$rs7x["id"]."'>".$rs7x["address"].", ".$rs7x["region"]."</option>";
                                } }
                            echo"</select></div></div>";
                    
                            /*
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>HCP Grandfathered *</label><select class='form-control m-b' name='hcp_grandfathered'>
                                <option value='".$t1["hcp_grandfathered"]."'>".$t1["hcp_grandfathered"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                            </select></div></div>
                    
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Allied Health *</label><select class='form-control m-b required ' name='allied_health'>
                                <option value='".$t1["allied_health"]."'>".$t1["allied_health"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                            </select></div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Referrer *</label><select class='form-control m-b required' name='referred_source' required>";
                                $s7x = "select * from uerp_user where status='1' and mtype='USER' order by id asc";
                                $r7x = $conn->query($s7x);
                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                    if($t1["referred_source"]==$rs7x["id"]) echo"<option value='".$rs7x["id"]."' selected>".$rs7x["username"]." ".$rs7x["username2"]."</option>";
                                    else echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>";
                                } }
                            echo"</select></div></div>
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Ref # / URN / MAC</label><input name='ref_number' type='text' value='".$t1["ref_number"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Medicare Import Ref</label><input name='medicare_import_ref' type='text' value='".$t1["medicare_import_ref"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>NAPS Service ID</label><input name='naps_service_id' type='text' value='".$t1["naps_service_id"]."' class='form-control'></div></div>
                            */
                            
                        echo"</div>
                        
                        <br><h2>Contact Person Detail</h2><br>
                        <div class='row'>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contact Person Name</label><input name='cp_name' type='text' value='".$t1["cp_name"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone 1</label><input name='cp_phone1' type='text' value='".$t1["cp_phone1"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone 2</label><input name='cp_mobile' type='text' value='".$t1["cp_mobile"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address</label><input name='cp_email' type='text' value='".$t1["cp_email"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>HomeAddress</label><input name='cp_address' type='text' value='".$t1["cp_address"]."' class='form-control'></div></div>
                        </div>
                        
                        <br><h2>Financial Detail</h2><br>
                        <div class='row'>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>NDIS # *</label><input name='ndis_number' type='text' value='".$t1["ndis"]."' class='form-control'></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>NDIS Price Zone</label><select class='form-control m-b required' name='ndis_price_zone' required>
                                <option value='".$t1["ndis_price_zone"]."'>".$t1["ndis_price_zone"]."</option>
                                <option value='Provider Default'>Provider Default</option>
                                <option value='National Non-Remote (MMM 1-5)'>National Non-Remote (MMM 1-5)</option>
                                <option value='National Remote (MMM 6)'>National Remote (MMM 6)</option>
                                <option value='National Very Remote (MMM 7)'>National Very Remote (MMM 7)</option>
                                <option value='NT SA TAS-WA (MMM 1-5)'>NT SA TAS-WA (MMM 1-5)</option>
                                <option value='ATC - NSW QLD - VIC (MMM 1-5)'>ATC - NSW QLD - VIC (MMM 1-5)</option>
                            </select></div></div>";
                            /*
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>
                            */
                            
                            echo"<div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Client Plan Manager Card ID (*)</label>
                                <select class='form-control m-b required ' name='application_id'>";
                                    $ra1 = "select * from ndis_card_number where status='1' order by id desc";
                                    $rb1 = $conn->query($ra1);
                                    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                        if($t1["application_id"]==$rab1["id"]) echo"<option selected value='".$rab1["id"]."'>".$rab1["referrer"]." (".$rab1["card_number"].")</option>";
                                        else echo"<option value='".$rab1["id"]."'>".$rab1["referrer"]." (".$rab1["card_number"].")</option>";
                                    } }
                                echo"</select>
                            </div></div>
                            
                            <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='CLIENT'>CLIENT</option>
                            </select></div></div>";
                            
                            /*
                            <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type'>
                                <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                <option value='Check'>Check</option><option value='Cash'>Cash</option>
                            </select></div></div>";
                            
                            <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Aging Facility</label><select class='form-control m-b required' name='aging_status' required>
                                <option value='".$t1["aging_status"]."'>".$t1["aging_status"]."</option><option value='NO'>NO</option><option value='YES'>YES</option>
                            </select></div></div>
                            <div class='col-lg-3' style='margin-bottom:25px'><div class='form-group'><label>If Yes! Aging Period (Day Wise)</label><input name='aging_days' type='number' value='".$t1["aging_days"]."' class='form-control' min='1' max='10000'></div></div>
                            */
                        echo"</div>
                        
                        <br><h2>Notes</h2><br>
                        <div class='row'>
                            <div class='col-12' style='margin-bottom:15px'><div class='form-group'>
                                <label>Notes</label>
                                <textarea id='' name='note' class='form-control' style='width:100%'>".$t1["note"]."</textarea>";
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
                                <label>Inportent Note for Support Workers</label>
                                <textarea id='' name='note_for_staff' class='form-control' style='width:100%'>".$t1["note_for_staff"]."</textarea>";
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
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='reset' >Reset</button> &nbsp;
                        <button class='btn btn-primary' type='submit'>Update</button>
                    </div>";
                } }
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