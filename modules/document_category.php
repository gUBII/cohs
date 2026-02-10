<?php
    
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    $cid=$_GET["cid"];
    $sheba=$_GET["sheba"];
    
    error_reporting(0);

    include("../authenticator.php");

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>
        <form method='post' action='documentsprocessor.php' target='dataprocessor' enctype='multipart/form-data' >";
            if(isset($_GET["cid"])){
                $ss1 = "select * from modules where id='".$_GET["cid"]."' order by id asc limit 1";
                $rr1 = $conn->query($ss1);
                if ($rr1->num_rows > 0) { while($rs21 = $rr1->fetch_assoc()) {
                    echo"<input type='hidden' name='processor' value='editcategory'>
                    <input name='cid' type='hidden' value='".$rs21["id"]."'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Category Name *</label>
                                <input name='name' type='text' value='".$rs21["name"]."' class='form-control' required>
                            </div></div>
                            <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Parent Name *</label>
                                <select class='form-control m-b ' name='parent' required>";
                                    $c77 = "select * from modules where id='".$rs21["parent"]."' order by id asc limit 1";
                                    $d77 = $conn->query($c77);
                                    if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { 
                                        echo"<option value='".$cd77["id"]."'>".$cd77["name"]."</option>";
                                    } }
                                    $c77 = "select * from modules where parent='5274' order by id asc";
                                    $d77 = $conn->query($c77);
                                    if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) {
                                        echo"<option value='".$cd77["id"]."'>".$cd77["name"]."</option>";
                                    } }
                                echo"</select>
                            </div></div>
                            <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Status *</label> 
                                <select class='form-control m-b ' name='status' required>
                                    <option value='".$rs21["status"]."'>".$rs21["status"]."</option>
                                    <option value='1'>1 (ON)</option>
                                    <option value='0'>0 (OFF)</option>
                                </select>
                            </div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onclick=\"shiftdataV2('document_data.php?status=1&empid=".$_GET["empid"]."', 'datatableX')\">Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('document_data.php?status=1&empid=".$_GET["empid"]."', 'datatableX')\">Update Data</button>
                    </div>";
                } }
                
            }else{
                
                echo"<input type='hidden' name='processor' value='createcategory'>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Select Parent Category*</label>
                            <select class='form-control m-b ' name='parent' required>
                                <option value=''>Select Parent Category</option>";
                                $c77 = "select * from modules where parent='5274' order by id asc";
                                $d77 = $conn->query($c77);
                                if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { echo"<option value='".$cd77["id"]."'>".$cd77["name"]."</option>"; } }
                            echo"</select>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Category Name *</label>
                            <input name='name' type='text' value='' class='form-control' required>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Status *</label>
                            <select class='form-control m-b ' name='status' required>
                                <option value='1'>ON</option><option value='0'>OFF</option>
                            </select>
                        </div></div>
                    </div>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onclick=\"shiftdataV2('document_data.php?status=1&empid=".$_GET["empid"]."', 'datatableX')\">Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('document_data.php?status=1&empid=".$_GET["empid"]."', 'datatableX')\">Create Category</button>
                </div>";
                
            }
        echo"</form>
    </div>";
?>