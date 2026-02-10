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
                $s1x = "select * from ledger_class where id='".$_GET["mid"]."' order by id asc limit 1";
                $r1x = $conn->query($s1x);
                if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                    echo"<input type=hidden name='processor' value='".$_GET["sheba"]."'><input type=hidden name='id' value='".$_GET["mid"]."'>
                    <div class='mb-3'><label class='form-label'>Ledger Class Name</label><input class='form-control' type='text' name='class_name' placeholder='Type here' value='".$rs1x["class_name"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Debit</label><input class='form-control' type='number' name='debit' placeholder='Type here' min-value='1' value='".$rs1x["debit"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Credit</label><input class='form-control' type='number' name='credit' placeholder='Type here' min-value='1' value='".$rs1x["credit"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required='' >
                            <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                        </select>
                    </div>
                        
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                        <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ledger_class_data.php?cid=1&sheba=ledger_class', 'datatableX')\">Update</button>
                    </div>";
                } }
            }else{
                echo"<input type=hidden name='processor' value='new_ledger_class'>
                <div class='row border-bottom mb-4 pb-4' style='border-width:0px'>
                    <div class='mb-3'><label class='form-label'>Ledger Class Name</label><input class='form-control' type='text' name='class_name' placeholder='Type here' value='' ></div>
                    <div class='mb-3'><label class='form-label'>Debit</label><input class='form-control' type='number' name='debit' placeholder='Type here' min-value='1' value='0' ></div>
                    <div class='mb-3'><label class='form-label'>Credit</label><input class='form-control' type='number' name='credit' placeholder='Type here' min-value='1' value='0' ></div>
                    <div class='mb-3'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required='' >
                            <option value='ON'>ON</option><option value='OFF'>OFF</option>
                        </select>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ledger_class_data.php?cid=1&sheba=ledger_class', 'datatableX')\">Close</button>&nbsp;
                        <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                        <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ledger_class_data.php?cid=1&sheba=ledger_class', 'datatableX')\">Save</button>
                    </div>
                </div>";
            }
        echo"</form>
    </div>";  