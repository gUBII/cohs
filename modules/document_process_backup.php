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
        <form method='post' action='documentsprocessor.php' target='dataprocessor' enctype='multipart/form-data'>";
            if(isset($_GET["did"])){
                $ss1 = "select * from global_documents where id='".$_GET["did"]."' order by id asc limit 1";
                $rr1 = $conn->query($ss1);
                if ($rr1->num_rows > 0) { while($rs21 = $rr1->fetch_assoc()) {
                    
                    $edate=date("Y-m-d",$rs21["expire_date"]);
                    
                    echo"<input type='hidden' name='processor' value='edit_uploaddocuments'>
                    <input name='cid' type='hidden' value='".$rs21["id"]."'>
                    <input name='hard_copy' type='hidden' value='".$rs21["hard_copy"]."'>
                    <div class='modal-body'> 
                        <div class='row'>
                            <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Document Name *</label>
                                <input name='document_name' type='text' value='".$rs21["document_name"]."' class='form-control' required>
                            </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Category Name *</label>
                            <select class='form-control m-b ' name='categoryid' required>";
                                $c77 = "select * from modules where id='".$rs21["categoryid"]."' order by id asc limit 1";
                                $d77 = $conn->query($c77);
                                if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { echo"<option value='".$cd77["id"]."'>".$cd77["name"]."</option>"; }}
                                
                                if($mtype=="ADMIN") $c77 = "select * from modules where parent='5275' order by id asc";
                                else $c77 = "select * from modules where parent='5276' order by id asc";
                                $d77 = $conn->query($c77);
                                if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) {
                                    echo"<option value='".$cd77["id"]."'>".$cd77["name"]."</option>";
                                } }
                            echo"</select>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Multiple Document Upload</label>
                            <table style='width:100%'><tr>";
                                $t=0;
                                $tt=0;
                                $d1z = "select * from multi_documents where randid='".$rs21["hard_copy"]."' and uid='".$rs21["employeeid"]."' order by id asc";
                                $d2z = $conn->query($d1z);
                                if ($d2z->num_rows > 0) { while($d3z = $d2z->fetch_assoc()) {
                                    $t=($t+1);
                                    $tt=($tt+1);
                                    echo"<td align=center>
                                        <a href='".$d3z["location"]."' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>$t</a><br>
                                        <a href='#' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorz=document_process&cidz=".$_GET["did"]."&sourceidz=id&delidz=".$d3z["id"]."&tblz=multi_documents&sourceidz=id&categoryid=".$_GET["categoryid"]."&ctitle=Document Manager&empid=".$_GET["empid"]."', 'offcanvasTop')\"><i class='fa fa-remove'></i></a>
                                    </td>";
                                    if($tt>=6){
                                        echo"</tr><tr>";
                                        $tt=0;
                                    }
                                } }
                            echo"</tr></table><br>";
                            echo"<input type='file' name='images[]' multiple class='form__field__img form-control'>
                        </div></div>
                        
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Card Number (Optional)</label>
                            <input name='card_number' type='text' value='".$rs21["card_number"]."' class='form-control'>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Issue/Expire Dare</label>
                            <input name='expire_date' type='date' value='$edate' class='form-control' required>
                        </div></div>
                        
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Status *</label> 
                            <select class='form-control m-b ' name='status' required>
                                <option value='".$rs21["status"]."'>".$rs21["status"]."</option>
                                <option value='1'>1 (ON)</option><option value='0'>0 (OFF)</option>
                            </select>
                        </div></div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onclick=\"shiftdataV2('document_data2.php?status=1&categoryid=".$_GET["categoryid"]."&empid=".$_GET["empid"]."', 'datatableX')\">Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('document_data2.php?status=1&categoryid=".$_GET["categoryid"]."&empid=".$_GET["empid"]."', 'datatableX')\">Update</button>
                    </div>";
                } }
            }else{
                echo"<input type='hidden' name='processor' value='uploaddocuments'>
                <input type='hidden' name='url' value='".$_GET["url"]."'>
                <input type='hidden' name='id' value='".$_GET["id"]."'>
                <input type='hidden' name='categoryid' value='".$_GET["categoryid"]."'>
                
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Document Name *</label>
                            <input name='document_name' type='text' value='' class='form-control' required>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Category Name *</label>
                            <select class='form-control m-b ' name='categoryid' required>";
                                if($_GET["categoryid"]==0){
                                    echo"<option value=''>Select Parent Category</option>";
                                    if($mtype=="ADMIN") $c77 = "select * from modules where parent='5275' order by id asc";
                                    else $c77 = "select * from modules where parent='5276' order by id asc";
                                }else{
                                    if($mtype=="ADMIN") $c77 = "select * from modules where id='".$_GET["categoryid"]."' order by id asc";
                                    else $c77 = "select * from modules where id='".$_GET["categoryid"]."' order by id asc";
                                }
                                $d77 = $conn->query($c77);
                                if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) {
                                    echo"<option value='".$cd77["id"]."'>".$cd77["name"]."</option>";
                                } }
                            echo"</select>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Multiple Document Upload</label>
                            <input type='file' name='images[]' multiple class='form__field__img form-control' required>
                        </div></div>
                        
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'>
                            <label>Card Number (Optional)</label>
                            <input name='card_number' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Issue/Expire Dare</label>
                            <input name='expire_date' type='date' value='$cdate' class='form-control' required>
                        </div></div>
                        
                        <div class='col-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Status *</label> 
                            <select class='form-control m-b ' name='status' required>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select>
                        </div></div>
                    </div>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onclick=\"shiftdataV2('document_data2.php?status=1&categoryid=".$_GET["categoryid"]."&empid=".$_GET["empid"]."', 'datatableX')\">Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' >Upload and Save</button>
                </div>
                
                <div class='modal fade modal-close-out' id='closeButtonOutExample' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Updating Documents</h5>
                            </div>
                            <div class='modal-body' style='background-color:white;color:black;height:300px'><center>
                                <br><br><br><br><br><br>Uploading Documents, Please Wait a while...<br><br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        echo"</form>
    </div>";
?>