<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    
    include("../authenticator.php");

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["title"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>
        <form method='post' action='dataprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
            if(isset($_GET["mid"]) && $_GET["mid"]!=0){
 
                    $s1x = "select * from product_category where id='".$_GET["mid"]."' order by id asc limit 1";
                    $r1x = $conn->query($s1x);
                    if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                        
                        echo"<input type=hidden name='processor' value='edit_product_category'>
                        <input type=hidden name='id' value='".$_GET["mid"]."'>
                        <div class='row border-bottom mb-4 pb-4' style='border-width:0px'>
                            <div class='col-md-12' style='margin-top:15px'>
                                <label class='form-label'>Parent Category</label>
                                <select class='form-select' name='parent' required='' >";
                                    if($rs1x["parent"]!=0){
                                        $s1z = "select * from product_category where id='".$rs1x["parent"]."' order by id asc limit 1";
                                        $r1z = $conn->query($s1z);
                                        if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                            echo"<option value='".$rs1z["id"]."'>".$rs1z["category_name"]."</option>";
                                        } }
                                    } else echo"<option value='0'>Top Category</option>";
                                    
                                    echo"<option value='0'>Top Category</option>";
                                    $s1y = "select * from product_category where status='ON' order by category_name asc";
                                    $r1y = $conn->query($s1y);
                                    if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                        echo"<option value='".$rs1y["id"]."'>".$rs1y["category_name"]."</option>";
                                    } }
                                echo"</select>
                            </div>
                            <div class='mb-3'><label class='form-label'>Category Name</label><input class='form-control' type='text' name='category_name' placeholder='Type here' value='".$rs1x["category_name"]."' ></div>
                            <div class='mb-3'><label class='form-label'>Category Note</label><textarea class='form-control' name='note' placeholder='Type here' >".$rs1x["note"]."</textarea></div>
                            <div class='mb-3'><label class='form-label'>Image</label><input type='file' name='images[]' class='form__field__img form-control'></div>
                            <div class='mb-3'><label class='form-label'>Status</label>
                                <select class='form-select' name='status' required='' >
                                    <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option>
                                    <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                            <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'  onclick=\"shiftdataV2('item_categories_data.php?cid=3&sheba=accounts_ledger', 'datatableX')\">Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('item_categories_data.php?cid=3&sheba=accounts_ledger', 'datatableX')\">Update</button>
                        </div>";
                    } }
                
            }else{
                $cdate=time();
                $cdate=date("Y-m-d",$cdate);
                echo"<input type=hidden name='processor' value='new_product_category'>
                <div class='row border-bottom mb-4 pb-4' style='border-width:0px'>
                    <div class='col-md-12' style='margin-top:15px'>
                        <label class='form-label'>Parent Category</label>
                        <select class='form-select' name='parent' required='' >
                            <option value='0'>Top Category</option>";
                            $s1y = "select * from product_category where status='ON' order by category_name asc";
                            $r1y = $conn->query($s1y);
                            if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                echo"<option value='".$rs1y["id"]."'>".$rs1y["category_name"]."</option>";
                            } }
                        echo"</select>
                    </div>
                    <div class='mb-3'><label class='form-label'>Category Name</label><input class='form-control' type='text' name='category_name' placeholder='Type here' value='' ></div>
                    <div class='mb-3'><label class='form-label'>Category Note</label><textarea class='form-control' name='note' placeholder='Type here' ></textarea></div>
                    <div class='mb-3'><label class='form-label'>Image</label><input type='file' name='images[]' class='form__field__img form-control'></div>
                    <div class='mb-3'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required='' ><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                    </div>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('item_categories_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&title=".$_GET["title"]."', 'datatableX')\">Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('item_categories_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&title=".$_GET["title"]."', 'datatableX')\">Save</button>
                </div>";
            }
        echo"</form>
    </div>";  