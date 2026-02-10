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

                    $s1x = "select * from ledger_group where id='".$_GET["mid"]."' order by id asc limit 1";
                    $r1x = $conn->query($s1x);
                    if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                        echo"<input type=hidden name='processor' value='".$_GET["sheba"]."'><input type=hidden name='id' value='".$_GET["mid"]."'>
                        <div class='col-md-12' style='margin-top:15px'>
                            <label class='form-label'>Ledger Class</label>
                            <select class='form-select' name='group_class' required='' >";
                                $s1z = "select * from ledger_class where id='".$rs1x["group_class"]."' order by class_name asc limit 1";
                                $r1z = $conn->query($s1z);
                                if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                    echo"<option value='".$rs1z["id"]."'>".$rs1z["class_name"]."</option>";
                                } }
                                $s1y = "select * from ledger_class where status='ON' order by class_name asc";
                                $r1y = $conn->query($s1y);
                                if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                    echo"<option value='".$rs1y["id"]."'>".$rs1y["class_name"]."</option>";
                                } }
                            echo"</select>
                        </div>
                        <div class='mb-3'><label class='form-label'>Ledger Class Name</label><input class='form-control' type='text' name='group_name' placeholder='Type here' value='".$rs1x["group_name"]."' ></div>
                        <div class='mb-3'><label class='form-label'>Debit</label><input class='form-control' type='number' name='debit' placeholder='Type here' min-value='1' value='".$rs1x["debit"]."' ></div>
                        <div class='mb-3'><label class='form-label'>Credit</label><input class='form-control' type='number' name='credit' placeholder='Type here' min-value='1' value='".$rs1x["credit"]."' ></div>
                        <div class='mb-3'><label class='form-label'>Status</label>
                            <select class='form-select' name='status' required='' >
                                <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select>
                        </div>
                        
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                            <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ledger_groups_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ledger_groups_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Update</button>
                        </div>";
                    } }
                
                
            }else{
                
                    echo"<input type=hidden name='processor' value='new_ledger_group'>
                    <div class='row border-bottom mb-4 pb-4' style='border-width:0px'>
                        <div class='mb-3'><label class='form-label'>Ledger Class</label>
                            <select class='form-select' name='group_class' required='' >";
                                $tomtom=0;
                                $s1y = "select * from ledger_class where status='ON' order by class_name asc";
                                $r1y = $conn->query($s1y);
                                if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                    $tomtom=1;
                                    echo"<option value='".$rs1y["id"]."'>".$rs1y["class_name"]."</option>";
                                } }
                            echo"</select>
                        </div>
                        <div class='mb-3'><label class='form-label'>Group Name</label><input class='form-control' type='text' name='group_name' placeholder='Type here' value='' ></div>
                        <div class='mb-3'><label class='form-label'>Debit</label><input class='form-control' type='number' name='debit' placeholder='Type here' min-value='1' value='' ></div>
                        <div class='mb-3'><label class='form-label'>Credit</label><input class='form-control' type='number' name='credit' placeholder='Type here' min-value='1' value='' ></div>
                        <div class='mb-3'><label class='form-label'>Status</label>
                            <select class='form-select' name='status' required='' >
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select>
                        </div>
                        
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                            <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ledger_groups_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Close</button>&nbsp;      
                            <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('ledger_groups_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Save</button>
                        </div>
                    </div>";
                
            }
        echo"</form>        
    </div>";  