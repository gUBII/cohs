<?php
$cdate=time();
$cdate=date("Y-m-d", $cdate);    
$cid=$_GET["cid"];
$sheba=$_GET["sheba"];
$utype=$_GET["utype"];

// error_reporting(0);
include("../authenticator.php");

$todayx=time();
$today=date("Y-m-d", $todayx);
if(!isset($_GET["statusupdate"])) $statusupdate=1;
else $statusupdate=$_GET["statusupdate"];
$tomtom1="";
if($statusupdate==1) $tomtom1="active";
$tomtom2="";
if($statusupdate==2) $tomtom2="active";
$tomtom3="";
if($statusupdate==3) $tomtom2="active";
    
if(isset($_GET["dfrom"])){
	$dfromv=date('Y-m-d H:i:s', strtotime($_GET["dfrom"] . ' -1 day'));
	$dfromv=strtotime($dfromv);
	$dtov=date('Y-m-d H:i:s', strtotime($_GET["dto"] . ' +1 day'));
	$dtov=strtotime($dtov);
}else{
    $ttime=time();
    $ttime=date("Y-m-d H:i:s", $ttime);
    $dfromv=date('Y-m-d H:i:s', strtotime($ttime . ' -1 day'));
	$dfromv=strtotime($dfromv);
	$dtov=date('Y-m-d H:i:s', strtotime($ttime . ' +1 day'));
	$dtov=strtotime($dtov);
}
    
$dfromv1=date("d-m-Y", $dfromv);
$dtov1=date("d-m-Y", $dtov);

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
    <form name='xcarbon' role='form2' method='post' action='invoiceprocessor.php' target='invoicedataxxxx' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
        
        if(isset($_GET["mid"]) && $_GET["mid"]!=0){

            if($_GET["cid"]==1001){

            }
        }else{
            
            if(isset($_GET["pid"])){
                
                $idtotal=strlen($_GET["pid"]);
                $idstatus=0;
                $idtotal1=($idtotal-1);
                $idstatus=substr($_GET["pid"],$idtotal1,1);
                    
                $pid=0;
                $idtotal2=($idtotal-2);
                $pid=substr($_GET["pid"],0,$idtotal2);
                 
                $s = "select * from ndis_invoices where id='$pid' order by id limit 1";
                $r = $conn->query($s);
                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                    $datatargetX="category".$rs["id"]."X";
                    $datatargetXX="category".$rs["id"]."XX";
                    $datatargetY="category".$rs["id"]."Y";
                    $datatargetZ="category".$rs["id"]."Z";
                    $categoryX="cat".$rs["id"]."Z";
                    $categoryY="cat".$rs["id"]."Y";
                    $t=$rs["id"];
                        
                    $totpaid=0;
                    $s1 = "select * from ndis_invoices where invoice_no='".$rs["invoice_no"]."' order by invoice_no";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["cr_amt"]+$totpaid); } }
                        
                    $date=date("d-M-Y",$rs["receipt_date"]);
                        
                    $clientname="";
                    $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
                    $r1y = $conn->query($r1x);
                    if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                        $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                        $clientphone=$r1z["phone"];
                        $clientemail=$r1z["email"];
                        $cp_name=$r1z["cp_name"];
                        $cp_phone=$r1z["cp_phone1"];
                        $cp_email=$r1z["cp_email"];
                        // $client_ndis_number=$r1z["ndis_number"];
                        $client_ndis_number=$r1z["uid"];
                        if($client_ndis_number==0) $client_ndis_number="";
                    } }
                        
                    $invoiceprint="printinv".$rs["id"]."";
                    $randomid=rand(100000000000,999999999999);
                    echo"<div class='row' style='margin-left:0px;width:100%;padding:5px;'>";
                        $tdate=time();
                        $invdate=date("Y-m-d", $tdate);
                        $invdate1=date("Y-m-d", $tdate);
                        $invdate2=date("Y-m-d", $tdate);
                        $invno=0;
                        $rates=0;
                        $rr = "select * from ndis_invoices where id='$pid' order by id desc limit 1";
                        $rr1 = $conn->query($rr);
                        if ($rr1->num_rows > 0) { while($rr11 = $rr1 -> fetch_assoc()) {
                            $invoiceid=$rr11["id"];
                            $invno=$rr11["invoice_no2"];
                            $invdate=date("Y-m-d", $rr11["receipt_date"]);
                            $invdate1=date("Y-m-d", $rr11["date_from"]);
                            $invdate2=date("Y-m-d", $rr11["date_to"]);
                            $ndis_item=$rr11["ndis_item"];
                            $rates=$rr11["rate"];
                            $notes=$rr11["narration"];
                            $participantid=$rr11["received_from"];
                            $identifier=$rr11["identifier"];
                            $randomidz=$rr11["randomid"];
                            $lid=$rr11["ledger_id"];
                            $rx = "select * from accounts_ledger where id='$lid' order by id desc limit 1";
                            $rx1 = $conn->query($rx);
                            if ($rx1->num_rows > 0) { while($rx11 = $rx1 -> fetch_assoc()) { $lidname=$rx11["ledger_name"]; } }
                        } }
                        
                        echo"<div class='col-lg-12'><h4>Add Item for INV# $invno<br></h5></center><hr></div>
                        
                            <div class='row' style='margin-left:0px;width:100%;padding:5px;'>
                                <div class='col-lg-2'>Date From<br><input type='date' class='form-control' name='date_from' value='$invdate1'></div>
                                <div class='col-lg-2'>Date To<br><input type='date' class='form-control' name='date_to' value='$invdate2'></div>
                                <div class='col-lg-2'>NDIS Support Line Item<br><input type='text' class='form-control' name='ndis_item' value='$ndis_item'></div>
                                <div class='col-lg-2'>Rate Per Frequency<br><input type='text' class='form-control' name='rates' value='$rates' onchange='document.xcarbon.cr_amt.value=(document.xcarbon.rates.value*document.xcarbon.hours.value)'></div>
                                <div class='col-md-3'>Description<br><input type='text' class='form-control' name='note' value='$notes'></div>
                                <div class='col-lg-1' style='margin-top:25px'>
                                    <input type='submit' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' value='Add' onmouseover='document.xcarbon.cr_amt.value=(document.xcarbon.rates.value*document.xcarbon.hours.value)'>
                                    <input type='hidden' name='processor' value='editinvoice'>
                                    <input type='hidden' name='pointer' value='1'>
                                    <input type='hidden' name='employeeid' value='".$_COOKIE["userid"]."'>
                                    <input type='hidden' name='selection' value='$identifier'>
                                    <input type='hidden' name='randomidz' value='$randomidz'>
                                    <input type='hidden' name='ledger_id' value='$lid'>
                                    <input type='hidden' class='form-control' name='invoice_no2' value='$invno'>
                                    <input type='hidden' class='form-control' name='participant' value='$participantid'>
                                    <input type='hidden' class='form-control' name='invoiceid' value='$invoiceid'> 
                                </div>
                            </div>
                        
                    </div>
                    <div style='width:100%;padding:0px'>
                        <iframe name='invoicedataxxxx' src='./modules/invoices_addon.php?rid=$participantid&lid=$lid&sid=$invno&pid=$invoiceid' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='450'>BROWSER NOT SUPPORTED</iframe>
                        <center><button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button></center>
                    </div>";
                } }

            }else{ 

                if($_GET["cid"]==1001){
                    echo"<input type='hidden' name='processor' value='createtemplate'><input type='hidden' name='pointer' value='1'>
                    <input type='hidden' name='employeeid' value='".$_COOKIE["userid"]."'><input type='hidden' name='selection' value='INCOME'>
                    <input type='hidden' name='ledger_id' value='800000032'>
                    <div class='row'>
                        <div class='col-lg-12' style='padding:10px'><div style='width:100%;text-align:left'>
                            <label>Select Client/Participant</label><br>
                            <select class='form-control' name='cname' required style='width:100%'>
                                <option value=''>Select Client</option>";
                                $r1x = "select * from uerp_user where mtype='CLIENT' and status='1' order by username asc";
                                $r1y = $conn->query($r1x);
                                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                    echo"<option value='".$r1z["id"]."'>".$r1z["username"]." ".$r1z["username2"]."</option>";
                                } }
                            echo"</select>
                        </div></div>
                        <div class='col-lg-12' style='padding:10px'><div style='width:100%;text-align:left'>
                            <label>Manual Invoice Number</label><br><input type='text' class='form-control' name='invoice_no2' value='' required style='width:100%'>
                        </div></div>
                        <div class='col-lg-12' style='padding:10px'><div style='width:100%;text-align:left'>
                            <label>Invoice Date</label><br><input type='date' class='form-control' name='invoice_date' value='$today' required style='width:100%'>
                        </div></div>

                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                            <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                            <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                                                                                      onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\"  onmouseover='document.dataform.userid.value=document.datafrom.email.value'
                            <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Create Template</button>
                        </div>
                    </div>";

                }
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