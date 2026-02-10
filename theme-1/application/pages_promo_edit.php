<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-9 content-header'><h2 class='content-title'>Edit Promo, Coupon & Voucher</h2></div>
            <div class='col-md-3' style='text-align:right'><button class='btn btn-primary' onclick=\"shiftdataV1('pages_promo_list', 'datashiftX')\">Add New</button></div>
        </div>
        
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    $s1 = "select * from promo where id='".$_GET["pid"]."' order by id asc limit 1";
                	$r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1x = $r1->fetch_assoc()) {
                        $datez=date("Y-m-d",$rs1x["date"]);
                        echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                            <div class='row'>";
                                
                                if(strlen($rs1x["image"])>="5") echo"<div class='col-md-12'><img src='".$rs1x["image"]."' style='height:200px'></div>";
                                
                                echo"<div class='col-md-3'><label class='form-label'>Category</label>
                                    <select class='form-select' name='pid' required=''>";
                                        $s1x = "select * from sms_link where id='".$rs1x["pid"]."' order by sorder asc";
                                        $r1x = $conn->query($s1x);
                                        if ($r1x->num_rows > 0) { while($rs1xx = $r1x->fetch_assoc()) { echo"<option value='".$rs1xx["id"]."'>".$rs1xx["pam"]."</option>"; } }
                                        
                                        $s1z = "select * from sms_link where des1='TOP PROMO CATEGORY' order by sorder asc";
                                        $r1z = $conn->query($s1z);
                                        if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                            echo"<option value='".$rs1z["id"]."'>".$rs1z["pam"]."</option>";
                                            $s1za = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                            $r1za = $conn->query($s1za);
                                            if ($r1za->num_rows > 0) { while($rs1za = $r1za->fetch_assoc()) {
                                                echo"<option value='".$rs1za["id"]."'>&nbsp;&nbsp; - ".$rs1za["pam"]."</option>";
                                                $s1zb = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                                $r1zb = $conn->query($s1zb);
                                                if ($r1zb->num_rows > 0) { while($rs1zb = $r1zb->fetch_assoc()) {
                                                    echo"<option value='".$rs1zb["id"]."'>&nbsp;&nbsp;&nbsp;&nbsp; - ".$rs1zb["pam"]."</option>";
                                                } }
                                            } }
                                        } }
                                    echo"</select>
                                </div>
                                <div class='col-md-9'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Title</label>
                                        <input class='form-control' type='text' name='title' placeholder='Type here' value='".$rs1x["title"]."'>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label class='form-label'>Value</label>
                                        <input class='form-control' type='text' name='amount' placeholder='Type here' value='".$rs1x["amount"]."'>
                                    </div>
                                </div>
                                <div class='col-md-3'><label class='form-label'>TYPE</label>
                                    <select class='form-select' name='type' required=''>
                                        <option value='".$rs1x["type"]."'>".$rs1x["type"]."</option><option value='FLAT'>FLAT</option><option value='PERCENTAGE'>PERCENTAGE</option>
                                    </select>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Image File</label>
                                    <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Valid Till</label>
                                        <input class='form-control' type='date' name='date' placeholder='Type here' value='$datez'>
                                    </div>
                                </div>
                                    
                                <div class='col-md-12'>
                                    <div class='mb-3'><label class='form-label'>Detail</label><textarea placeholder='Type here' class='form-control' name='detail'>".$rs1x["detail"]."</textarea></div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Sort Order</label>
                                        <input class='form-control' type='number' name='sorder' placeholder='Type here' value='".$rs1x["sorder"]."'>
                                    </div>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Status</label>
                                    <select class='form-select' name='status' required=''>
                                        <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                                    </select>
                                </div>
                                <div class='col-md-2' style='margin-top:25px'>
                                    <div class='d-grid'><button class='btn btn-primary' onblur=\"shiftdataV1('pages_promo_list', 'datashiftX')\">Update</button>
                                    <input type=hidden name=processor value='updatepromo'><input type=hidden name=id value='".$rs1x["id"]."'>
                                </div>
                                </div>
                            </div>
                        </form>";
                    } }
                }
                echo"</div>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Valid Until</th><th>Title</th><th>Value & Type</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("pages_promo_lists.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>
