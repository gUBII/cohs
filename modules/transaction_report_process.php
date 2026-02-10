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
        
        <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
        if($cid==1000){
            echo"<div class='row'>
                <div class='col-6' style='margin-top:25px'><label class='form-label'>Date From</label><input class='form-control' type='date' name='filter_date_from' placeholder='Type here' value='$cdate'></div>
                <div class='col-6' style='margin-top:25px'><label class='form-label'>Date To</label><input class='form-control' type='date' name='filter_date_to' placeholder='Type here' value='$cdate'></div>
                <div class='col-6' style='margin-top:25px'><label class='form-label'>Receipt No.</label><input class='form-control' type='text' name='filter_receipt_no' placeholder='Type here' value='0' ></div>
                <div class='col-6' style='margin-top:25px'><label class='form-label'>Invoice ID</label><input class='form-control' type='text' name='filter_invoice_id' placeholder='Type here' value='0' ></div>
                <div class='col-6' style='margin-top:25px'><label class='form-label'>Ledger ID</label>
                    <select class='form-select' name='filter_ledger_id' required='' ><option value='0'>View All</option>";
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
                </div>
                <div class='col-6' style='margin-top:25px'><label class='form-label'>Person Name</label>
                    <select class='form-select' name='filter_employeeid' required='' ><option value='0'>View All</option>";
                        $e2 = "select * from uerp_user where status<>'4' order by username asc";
                        $f2 = $conn->query($e2);
                        if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                            echo"<option value='".$g2["id"]."'>".$g2["username"]." ".$g2["username2"]."</option>";
                        } }
                    echo"</select>
                </div>
                <div class='col-6' style='margin-top:25px'><label class='form-label'>Transaction Type</label>
                    <select class='form-select' name='filter_t_type' required=''>
                        <option value='ALL'>ALL</option><option value='RECEIVE'>RECEIVE</option><option value='PAYMENT'>PAYMENT</option>
                    </select>
                </div>
                <div class='col-12' style='margin-top:5px'>&nbsp;</div>
                <div class='col-12' style='margin-top:25px;text-align:right'><label class='form-label'>&nbsp;</label>
                    <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button>
                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('transaction_report_data.php?cid=1&sheba=ledger_class', 'datatableX')\">Search</button>
                </div>
            </div>";
        }
    echo"</div>";  