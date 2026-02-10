<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    
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

                    $s1x = "select * from payment_voucher where id='".$_GET["mid"]."' order by id asc limit 1";                    
                    $r1x = $conn->query($s1x);
                    if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                        $rdate=date("Y-m-d",$rs1x["payment_date"]);
                        echo"<input type=hidden name='processor' value='".$_GET["sheba"]."'><input type=hidden name='id' value='".$_GET["mid"]."'>
                        <div class='row'>
                            <div class='col-4' style='margin-top:15px'><label class='form-label'>Receipt No.</label><input class='form-control' type='text' name='payment_no' required='' placeholder='Type here' value='".$rs1x["payment_no"]."' ></div>                            
                            <div class='col-4' style='margin-top:15px'><label class='form-label'>Date</label><input class='form-control' type='date' name='payment_date' required='' placeholder='Type here' value='$rdate' ></div>
                            <div class='col-4' style='margin-top:15px'><label class='form-label'>Invoice No.</label><input class='form-control' type='text' name='invoice_no' placeholder='Type here' value='".$rs1x["invoice_no"]."' ></div>
                            <div class='col-4' style='margin-top:15px'><label class='form-label'>Income A/c Ledger</label>
                                <select class='form-select' name='ledger_id' required='' >";
                                    $ledgername="0";
                                    $s1b = "select * from sub_ledger where id='".$rs1x["ledger_id"]."' order by id desc limit 1";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) {
                                        $ledgername=$rs1b["ledger_id"];
                                        echo"<option value='".$rs1b["id"]."'>".$rs1b["sub_ledger"]."</option>";
                                    } }
                                    if($ledgername=="0"){
                                        $s1bc = "select * from accounts_ledger where id='".$rs1x["ledger_id"]."' order by id desc limit 1";
                                        $r1bc = $conn->query($s1bc);
                                        if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) {
                                            $ledgername=$rs1b["ledger_name"];
                                            echo"<option value='".$rs1bc["id"]."'>".$rs1bc["ledger_name"]."</option>";
                                        } }
                                    }
                                    $s1bd = "select * from accounts_ledger where status='ON' order by ledger_name asc";
                                    $r1bd = $conn->query($s1bd);
                                    if ($r1bd->num_rows > 0) { while($rs1bd = $r1bd->fetch_assoc()) {
                                        echo"<option value='".$rs1bd["id"]."'>".$rs1bd["ledger_name"]."</option>";
                                        $s1be = "select * from sub_ledger where id='".$rs1bd["ledger_id"]."' order by sub_ledger asc";
                                        $r1be = $conn->query($s1be);
                                        if ($r1be->num_rows > 0) { while($rs1be = $r1be->fetch_assoc()) {                                        
                                            echo"<option value='".$rs1be["id"]."' style='margin-left:50px'>".$rs1bd["ledger_name"]." - ".$rs1be["sub_ledger"]."</option>";
                                        } }
                                    } }                                    
                                echo"</select>
                            </div>";
                            if($designationy==13){
                                echo"<div class='col-4' style='margin-top:15px'><label class='form-label'>Paid To</label>
                                    <select class='form-select' name='employeeid' required='' >";
                                        $e1 = "select * from uerp_user where id='".$rs1x["employeeid"]."' order by id asc limit 1";
                                        $f1 = $conn->query($e1);
                                        if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                            echo"<option value='".$g1["id"]."'>".$g1["username"]." ".$g1["username2"]."</option>";
                                        } }
                                        $e2 = "select * from uerp_user where status<>'4' order by username asc";
                                        $f2 = $conn->query($e2);
                                        if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                            echo"<option value='".$g2["id"]."'>".$g2["username"]." ".$g2["username2"]."</option>";
                                        } }
                                    echo"</select>
                                </div>";
                            }else{
                                echo"<div class='col-4' style='margin-top:15px'><label class='form-label'>Paid To</label>
                                    <select class='form-select' name='employeeid' required='' >";
                                        $e1 = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                        $f1 = $conn->query($e1);
                                        if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                            echo"<option value='".$g1["id"]."'>".$g1["username"]." ".$g1["username2"]."</option>";
                                        } }
                                    echo"</select>
                                </div>";
                            }
                            echo"<div class='col-4' style='margin-top:15px'><label class='form-label'>Paid Amount</label><input class='form-control' type='number' name='dr_amt' placeholder='Type here' min-value='1' value='".$rs1x["dr_amt"]."' ></div>
                            <div class='col-8' style='margin-top:15px'><label class='form-label'>Receive Note</label><input class='form-control' type='text' name='narration' placeholder='Type here' min-value='1' value='".$rs1x["narration"]."' ></div>
                            <div class='col-4' style='margin-top:15px'><label class='form-label'>Status</label>
                                <select class='form-select' name='status' required='' >
                                    <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select>
                            </div>
                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('office_expenses_data.php?cid=6&sheba=payment_voucher', 'datatableX')\">Update</button>
                            </div>
                        </div>";
                    } }

            }else{

                    $ctime=time();
                    $rdate=date("Y-m-d",$ctime);
                    $rc1 = "select * from payment_voucher order by payment_no desc limit 1";
                    $rc2 = $conn->query($rc1);
                    if ($rc2->num_rows > 0) { while($rc3 = $rc2->fetch_assoc()) { $paymentno=($rc3["payment_no"]+1); } }
    
                    echo"<input type=hidden name='processor' value='new_payment_voucher'>
                    <div class='row'>
                        <div class='col-4' style='margin-top:15px'><label class='form-label'>Payment No.</label><input class='form-control' type='text' name='payment_no' required='' placeholder='Type here' value='$paymentno'></div>
                        <div class='col-4' style='margin-top:15px'><label class='form-label'>Date</label><input class='form-control' type='date' name='payment_date' required='' placeholder='Type here' value='$rdate'></div>
                        <div class='col-4' style='margin-top:15px'><label class='form-label'>Invoice No.</label><input class='form-control' type='text' name='invoice_no' placeholder='Type here' value=''></div>
                        <div class='col-4' style='margin-top:15px'><label class='form-label'>Income A/c Ledger</label>
                            <select class='form-select' name='ledger_id' required='' >";
                                $s1bd = "select * from accounts_ledger where status='ON' order by ledger_name asc";
                                $r1bd = $conn->query($s1bd);
                                if ($r1bd->num_rows > 0) { while($rs1bd = $r1bd->fetch_assoc()) {
                                    echo"<option value='".$rs1bd["id"]."'>".$rs1bd["ledger_name"]."</option>";
                                    $s1be = "select * from sub_ledger where id='".$rs1bd["ledger_id"]."' order by sub_ledger asc";
                                    $r1be = $conn->query($s1be);
                                    if ($r1be->num_rows > 0) { while($rs1be = $r1be->fetch_assoc()) {                                        
                                        echo"<option value='".$rs1be["id"]."' style='margin-left:50px'>".$rs1bd["ledger_name"]." - ".$rs1be["sub_ledger"]."</option>";
                                    } }
                                } }                                    
                            echo"</select>
                        </div>";
                        if($designationy==13){
                                echo"<div class='col-4' style='margin-top:15px'><label class='form-label'>Paid To</label>
                                    <select class='form-select' name='employeeid' required='' >";
                                        $e1 = "select * from uerp_user where id='".$rs1x["employeeid"]."' order by id asc limit 1";
                                        $f1 = $conn->query($e1);
                                        if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                            echo"<option value='".$g1["id"]."'>".$g1["username"]." ".$g1["username2"]."</option>";
                                        } }
                                        $e2 = "select * from uerp_user where status<>'4' order by username asc";
                                        $f2 = $conn->query($e2);
                                        if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                            echo"<option value='".$g2["id"]."'>".$g2["username"]." ".$g2["username2"]."</option>";
                                        } }
                                    echo"</select>
                                </div>";
                            }else{
                                echo"<div class='col-4' style='margin-top:15px'><label class='form-label'>Paid To</label>
                                    <select class='form-select' name='employeeid' required='' >";
                                        $e1 = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                        $f1 = $conn->query($e1);
                                        if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                            echo"<option value='".$g1["id"]."'>".$g1["username"]." ".$g1["username2"]."</option>";
                                        } }
                                    echo"</select>
                                </div>";
                            }
                        
                        echo"<div class='col-4' style='margin-top:15px'><label class='form-label'>Paid Amount</label><input class='form-control' type='number' name='dr_amt' placeholder='Type here' min-value='1' value='0' ></div>
                        <div class='col-8' style='margin-top:15px'><label class='form-label'>Payment Note</label><input class='form-control' type='text' name='narration' placeholder='Type here' min-value='1' value='' ></div>
                        <div class='col-4' style='margin-top:15px'><label class='form-label'>Status</label>
                            <select class='form-select' name='status' required=''><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                        </div>
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                            <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('office_expenses_data.php?cid=6&sheba=payment_voucher', 'datatableX')\">Close</button>&nbsp;
                            <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                            <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('office_expenses_data.php?cid=6&sheba=payment_voucher', 'datatableX')\">Save</button>
                        </div>
                    </div>";
                
            }
        echo"</form>
    </div>";  