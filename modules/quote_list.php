<?php
    include '../authenticator.php';
    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    echo"<div class='data-table-rows slim' id='sample'>";
            
            
            
            if(!isset($_GET["formid"])){
                
            }else{
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='formid' value='".$_GET["formid"]."'><input type='hidden' name='clientid' value='$clientid'>
                    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'>
                    <input type='hidden' name='processor' value='generalformsedit'>
                    <input type='hidden' name='redirection' value='off'>
                    <h1>EDIT - General Form</h1>";
                        $ra1X = "select * from quotes where status='1' and id='".$_GET["formid"]."' order by id desc";
                        $rb1X = $conn->query($ra1X);
                        if ($rb1X->num_rows > 0) { while($rab1X = $rb1X->fetch_assoc()) {
                            $current_date=date("Y-m-d", $rab1X["date"]);
                            echo"<fieldset>
                                <div class='row'>
                                    <div class='col-lg-2'><br>
                                        <div class='form-group'><label>Document Upload Date *</label>
                                            <input name='date1' type='date' value='$current_date' class='form-control required'>
                                        </div>
                                    </div>
                                    <div class='col-lg-2'><br>
                                        <div class='form-group'>
                                            <label>Note Category *</label><select class='form-control m-b required' name='clientid'>";
                                                $s7x = "select * from uerp_user where id='".$rab1X["clientid"]."' and mtype='CLIENT' and status='1' order by id asc";
                                                $r7x = $conn->query($s7x);
                                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                    echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>";
                                                } }
                                            echo"</select>
                                        </div>
                                    </div>
                                    <div class='col-lg-3'><br>
                                        <div class='form-group'><label>Document Title *</label><input name='title' type='text' value='".$rab1X["title"]."' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-lg-3'><br>
                                        <div class='form-group'><label>Document Title * <a href='".$rab1X["filename"]."'>View Document</a>
                                        </label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,'></div>
                                    </div>
                                    
                                    <div class='col-lg-1'><br><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Update'  onclick=\"setTimeout(function(){ shiftdataV2('quote_list.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 5000);\">
                                    </div></div>
                                    <div class='col-lg-1'><br><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='button' class='btn btn-icon btn-icon-start btn-outline-secondary' data-style='expand-right' value='New'  onclick=\"setTimeout(function(){ shiftdataV2('quote_list.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 10);\"></a>
                                    </div></div>
                                </div>
                            </fieldset><br><br>";
                        } }
                    
                echo"</form>";
            }
            
        echo"<div class='table-responsive'>
            <table class='table table-striped table-bordered table-hover dataTables-example' >
                <thead><tr><th nowrap>Form ID</th><th>Client Name</th><th>NDIS #</th><th>Email</th><th>Phone</th><th>Address</th><th>Status</th><th colspan=3'></th></tr></thead>
                <tbody>";
                    if($mtype!="ADMIN") $ra1 = "select * from quotes where employeeid='$userid' and status='1' order by id desc";
                    else $ra1 = "select * from quotes where status='1' order by id desc";
                    $rb1 = $conn->query($ra1);
                    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                        echo"<tr class='gradeX'>
                            <td nowrap>&nbsp;".$rab1["id"]."</td>
                            <td nowrap>".$rab1["name"]."</td><td>".$rab1["ndis"]."</td>
                            <td>".$rab1["email"]."</td>
                            <td>".$rab1["phone"]."</td>
                            <td>".$rab1["address"].", ".$rab1["city"].", ".$rab1["state"]."-".$rab1["zip"].", ".$rab1["country"]."</td>
                            <td>";
                                if($rab1["status"]==1) echo"ON";
                                else echo"OFF";
                            echo"</td>
                            <td style='width:100px'>
                                <button type='button' class='btn btn-outline-info' data-bs-toggle='modal' data-bs-target='#staticBackdrop1'>View/Edit</button>
                                <div class='modal fade' id='staticBackdrop1' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                    <div class='modal-dialog modal-fullscreen'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='staticBackdropLabel'>Quotatoin with Schedule of Supports</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <form method='post' name='stage1' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                    <input type=hidden name='processor' value='quotation_update'><input type=hidden name='id' value='".$rab1["id"]."'>
                                                    <fieldset>
                                                        <div class='row'>
                                                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='name' id='firstName' type='text' value='".$rab1["name"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>NDIS # *</label><input name='ndis' type='text' value='".$rab1["ndis"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Email *</label><input name='email' type='text' value='".$rab1["email"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$rab1["phone"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-12 col-md-4' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$rab1["address"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>City *</label><input name='city' type='text' value='".$rab1["city"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>State *</label><input name='state' type='text' value='".$rab1["state"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Post Code *</label><input name='zip' type='text' value='".$rab1["zip"]."' class='form-control' required onchange='this.form.submit()'></div></div>
                                                            <div class='col-6 col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Country *</label><select class='form-control m-b required' name='country' required onchange='this.form.submit()'><option value='".$rab1["country"]."'>".$rab1["country"]."</option>";
                                                                include 'countries.php';
                                                            echo"</select></div></div>
                                                        </div>
                                                        <h2>Schedule of Supports:</h2>
                                                        <div class='row'><div class='col-12' style='margin-bottom:15px'><div class='form-group'>
                                                            <iframe src='workspace_budget_quotation.php?pid=".$rab1["id"]."' name='budgetmanagerx' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='1500'>BROWSER NOT SUPPORTED</iframe
                                                        </div></div></div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            <div class='modal-footer'>
                                                <a href='print_quotation_pdf.php?pid=".$rab1["id"]."' target='dataprocessor'><button type='button' class='btn btn-success'>Download Quotation PDF</button></a>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style='width:100px'><a href='print_quotation_pdf.php?pid=".$rab1["id"]."' target='dataprocessor'><button type='button' class='btn btn-success'>Download</button></a></td>
                            <td align=center valign=middle><a href='#' style='color:lightred' target='dataprocessor'><i class='fa fa-trash'></i></a></td>
                        </tr>";
                    } }    
                    echo"</tbody>
                </table>
                <div style='height:100px'>&nbsp;</div>
            </div>";
    
    // }
?>