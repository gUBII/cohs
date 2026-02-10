<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    
    include("../authenticator.php");

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>
        <form method='post' action='dataprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
            if(isset($_GET["mid"]) && $_GET["mid"]!=0){
                $s1x = "select * from ndis_line_numbers where id='".$_GET["mid"]."' order by id asc limit 1";
                $r1x = $conn_main->query($s1x);
                if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                    echo"<input type=hidden name='processor' value='ndis_support_catelogue'><input type=hidden name='id' value='".$_GET["mid"]."'>
                    <div class='mb-3'><label class='form-label'>Item Number</label><input class='form-control' type='text' name='item_number' placeholder='Type here' value='".$rs1x["item_number"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Item Name</label><input class='form-control' type='text' name='item_name' placeholder='Type here' min-value='1' value='".$rs1x["item_name"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Category Name</label><input class='form-control' type='text' name='unit' placeholder='Type here' min-value='1' value='".$rs1x["unit"]."' ></div>
                    <div class='mb-3'><label class='form-label'>National Amount</label><input class='form-control' type='text' name='national' placeholder='Type here' min-value='1' value='".$rs1x["national"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Remote Amount</label><input class='form-control' type='text' name='remote' placeholder='Type here' min-value='1' value='".$rs1x["remote"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Very Remote Amount</label><input class='form-control' type='text' name='very_remote' placeholder='Type here' min-value='1' value='".$rs1x["very_remote"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Status</label><select class='form-select' name='status' required='' ><option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='1'>1</option><option value='0'>0</option></select></div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                        <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ndis_line_item_number_data.php?cid=1&sheba=ledger_class', 'datatableX')\">Update</button>
                    </div>";
                } }
            }else{
                echo"<input type=hidden name='processor' value='new_ndis_support_catelogue'>
                <div class='row border-bottom mb-4 pb-4' style='border-width:0px'>
                    <div class='mb-3'><label class='form-label'>Item Number</label><input class='form-control' type='text' name='item_number' placeholder='Type here' value='' ></div>
                    <div class='mb-3'><label class='form-label'>Item Name</label><input class='form-control' type='text' name='item_name' placeholder='Type here' min-value='1' value='' ></div>
                    <div class='mb-3'><label class='form-label'>Unit</label><input class='form-control' type='text' name='unit' placeholder='Type here' min-value='1' value='' ></div>
                    <div class='mb-3'><label class='form-label'>National Amount</label><input class='form-control' type='text' name='national' placeholder='Type here' min-value='1' value='' ></div>
                    <div class='mb-3'><label class='form-label'>Remote Amount</label><input class='form-control' type='text' name='remote' placeholder='Type here' min-value='1' value='' ></div>
                    <div class='mb-3'><label class='form-label'>Very Remote Amount</label><input class='form-control' type='text' name='very_remote' placeholder='Type here' min-value='1' value='' ></div>
                    <div class='mb-3'><label class='form-label'>Status</label><select class='form-select' name='status' required='' ><option value='1'>1</option><option value='0'>0</option></select></div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ndis_line_item_number_data.php?cid=1&sheba=ledger_class', 'datatableX')\">Close</button>&nbsp;
                        <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                        <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ndis_line_item_number_data.php?cid=1&sheba=ledger_class', 'datatableX')\">Save</button>
                    </div>
                </div>";
            }
        echo"</form>
    </div>";  