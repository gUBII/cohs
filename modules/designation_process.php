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
    <form method='post' name='dataform' action='dataprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' >";
        if(isset($_GET["mid"]) && $_GET["mid"]!=0){
            
            if($cid==7){
                echo"<div>";
                    echo"<input type='hidden' name='processor' value='edit_designation'><input type='hidden' name='id' value='".$_GET["mid"]."'>";
                    $randid=rand(100,999);
                    $ctime=time();
                    $rdate=date("Y-m-d",$ctime);                
                    $next_uid=0;
                    $s7 = "select * from designation where id='".$_GET["mid"]."' order by id asc limit 1";
                    $r7 = $conn->query($s7);
                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                        echo"<fieldset>
                            <div class='row'>
                                <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Designation Name *</label><input name='designation' type='text' value='".$rs7["designation"]."' class='form-control' required></div></div>
                                <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Designation Type *</label><input name='type' type='text' value='".$rs7["type"]."' class='form-control' required></div></div>
                                <div class='col-lg-3'>
                                    <div class='form-group'><label>Image (<a href='".$rs7["image"]."'>View Image</a> )*</label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.png,.jpg,.gif,.jpeg'></div>
                                </div>
                                <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Status *</label><select class='form-control m-b required ' name='status'>
                                    <option value='".$rs7["status"]."'>".$rs7["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select></div></div>
                                <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Designation Detail *</label><textarea name='designation_detail' class='form-control' required>".$rs7["designation_detail"]."</textarea></div></div>
                            </div>
                        </fieldset>";
                    } }
                    
                    echo"<div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('designation_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                        <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('designation_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                    </div>
                </div>";
            }

        }else{

            if($cid==7){
                echo"<div>";
                    $randid=rand(100,999);
                    $ctime=time();
                    $rdate=date("Y-m-d",$ctime);                
                    $next_uid=0;
                    $s7 = "select * from designation order by id desc limit 1";
                    $r7 = $conn->query($s7);
                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { $next_uid=($rs7["uid"]+1); } }                

                    echo"<input type=hidden name='processor' value='new_designation'>
                    <fieldset>
                        <div class='row'>
                            <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Designation Name *</label><input name='designation' type='text' value='' class='form-control' required></div></div>
                            <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Designation Type *</label><input name='type' type='text' value='' class='form-control' required></div></div>
                            <div class='col-lg-3'>
                                <div class='form-group'><label>Degination Image *</label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.png,.jpg,.gif,.jpeg'></div>
                            </div>
                            <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Status *</label><select class='form-control m-b required ' name='status'>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select></div></div>
                            <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Designation Detail *</label><textarea name='designation_detail' class='form-control' required></textarea></div></div>
                            
                        </div>
                    </fieldset>
                    
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('designation_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                        <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                        <button class='btn btn-primary' type='submit' nblur=\"shiftdataV2('designation_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                    </div>
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