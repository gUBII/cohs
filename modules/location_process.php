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
                $s1x = "select * from warehouse where id='".$_GET["mid"]."' order by id asc limit 1";
                $r1x = $conn->query($s1x);
                if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                    echo"<input type=hidden name='processor' value='".$_GET["sheba"]."'><input type=hidden name='id' value='".$_GET["mid"]."'>
                    <div class='mb-3'><label class='form-label'>Store/Warehouse Name</label><input class='form-control' type='text' name='warehouse_name' placeholder='Type here' value='".$rs1x["warehouse_name"]."' ></div>
                    <div class='mb-3'>
                        <label class='form-label'>Store/Warehouse Type</label>
                        <select class='form-control' name='warehouse_type' required='' >";
                                $s1yx = "select * from warehouse_type where id='".$rs1x["warehouse_type"]."' order by wtype_name asc limit 1";
                                $r1yx = $conn->query($s1yx);
                                if ($r1yx->num_rows > 0) { while($rs1yx = $r1yx->fetch_assoc()) {
                                    echo"<option value='".$rs1yx["id"]."'>".$rs1yx["wtype_name"]."</option>";
                                } }
                                
                                $s1y = "select * from warehouse_type order by wtype_name asc";
                                $r1y = $conn->query($s1y);
                                if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                    echo"<option value='".$rs1y["id"]."'>".$rs1y["wtype_name"]."</option>";
                                } }
                        echo"</select>
                    </div>
                    <div class='mb-3'>
                        <label class='form-label'>Owner Type</label>
                        <select name='owner' class='form-control'>
                            <option value='".$rs1x["ownership"]."'>".$rs1x["ownership"]."</option>
                            <option value='SELF'>SELF</option><option value='RENT'>RENT</option>
                        </select>
                    </div>
                    <div class='mb-3'><label class='form-label'>Rent Amount</label><input class='form-control' type='number' name='rent' placeholder='Type here' value='".$rs1x["rent"]."' ></div>
                    <div class='mb-3'>
                        <label class='form-label'>Rent Type</label>
                        <select name='rent_type' class='form-control'>
                            <option value='".$rs1x["rent_type"]."'>".$rs1x["rent_type"]."</option>
                            <option value='MONTHLY'>MONTHLY</option><option value='YEARLY'>YEARLY</option>
                        </select>
                    </div>
                    <div class='mb-3'><label class='form-label'>Location Owner Name</label><input class='form-control' type='text' name='warehouse_company' placeholder='Type here' value='".$rs1x["warehouse_company"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Address</label><input class='form-control' type='text' name='address' placeholder='Type here' value='".$rs1x["address"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Contact #</label><input class='form-control' type='text' name='contact_no' placeholder='Type here' value='".$rs1x["contact_no"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Contact Duration</label><input class='form-control' type='date' name='contract_duration' placeholder='Type here' value='".$rs1x["contract_duration"]."' ></div>
                    <div class='mb-3'><label class='form-label'>Status</label>
                        <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option>
                        <select class='form-select' name='status' required='' ><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'  onclick=\"shiftdataV2('location_data.php?cid=3&sheba=warehouse', 'datatableX')\">Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('location_data.php?cid=3&sheba=warehouse', 'datatableX')\">Update</button>
                    </div>";
                } }
                
            }else{
                $cdate=time();
                $cdate=date("Y-m-d",$cdate);
                echo"<input type=hidden name='processor' value='new_warehouse'>
                <div class='mb-3'><label class='form-label'>Store/Warehouse Name</label><input class='form-control' type='text' name='warehouse_name' placeholder='Type here' value='' ></div>
                <div class='mb-3'>
                    <label class='form-label'>Store/Warehouse Type</label>
                    <select class='form-select' name='warehouse_type' required='' >";
                            $s1y = "select * from warehouse_type order by wtype_name asc";
                            $r1y = $conn->query($s1y);
                            if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                echo"<option value='".$rs1y["id"]."'>".$rs1y["wtype_name"]."</option>";
                            } }
                    echo"</select>
                </div>
                <div class='mb-3'>
                    <label class='form-label'>Owner Type</label>
                    <select name='owner' class='form-control'>
                        <option value='SELF'>SELF</option><option value='RENT'>RENT</option>
                    </select>
                </div>
                <div class='mb-3'><label class='form-label'>Rent Amount</label><input class='form-control' type='number' name='rent' placeholder='Type here' value='' ></div>
                <div class='mb-3'>
                    <label class='form-label'>Rent Type</label>
                    <select name='rent_type' class='form-control'>
                        <option value='MONTHLY'>MONTHLY</option><option value='YEARLY'>YEARLY</option>
                    </select>
                </div>
                <div class='mb-3'><label class='form-label'>Location Owner Name</label><input class='form-control' type='text' name='warehouse_company' placeholder='Type here' value='' ></div>
                <div class='mb-3'><label class='form-label'>Address</label><input class='form-control' type='text' name='address' placeholder='Type here' value='' ></div>
                <div class='mb-3'><label class='form-label'>Contact #</label><input class='form-control' type='text' name='contact_no' placeholder='Type here' value='' ></div>
                <div class='mb-3'><label class='form-label'>Contact Duration</label><input class='form-control' type='date' name='contract_duration' placeholder='Type here' value='' ></div>
                <div class='mb-3'><label class='form-label'>Status</label>
                    <select class='form-select' name='status' required='' ><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('location_data.php?cid=3&sheba=warehouse', 'datatableX')\">Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('location_data.php?cid=3&sheba=warehouse', 'datatableX')\">Save</button>
                </div>";
            }
        echo"</form>
    </div>";  