<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>NEW PRODUCT</h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    echo"<form method='post' action='product_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' name='addproduct'>
                        <div class='row'>                        
                            <div class='col-md-6'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Product Name</label>
                                    <input class='form-control' type='text' name='pname' required='' required placeholder='Type here' value=''>
                                </div>
                            </div>
                            <div class='col-md-3'><label class='form-label'>Main Category</label>
                                <select class='form-select' name='cid' required=''><option value=''>Select Category</option>";
                                    $s1z = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
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
                            <div class='col-md-3'><label class='form-label'>Second Category</label>
                                <select class='form-select' name='cid2' required=''><option value=''>Select Category</option>";
                                    $s1z = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
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
                            <div class='col-md-3'><label class='form-label'>Brand Name</label>
                                <select class='form-select' name='bid' required=''><option value=''>Select Brand</opton>";
                                    $s1z = "select * from brand order by title asc";                                        
                                    $r1z = $conn->query($s1z);
                                    if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) { echo"<option value='".$rs1z["id"]."'>".$rs1z["title"]."</option>"; } }
                                echo"</select>
                            </div>
                            <div class='col-md-3'><label class='form-label'>Vendor</label>
                                <select class='form-select' name='vid' required=''><option value=''>Select Vendor</opton>";
                                    $s1z = "select * from sms_user2 where actype='VENDOR' order by name asc";
                                    $r1z = $conn->query($s1z);
                                    if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) { echo"<option value='".$rs1z["id"]."'>".$rs1z["name"]." ".$rs1z["name2"]."</option>";  } }
                                echo"</select>
                            </div>
                            <div class='col-md-3'>
                                <div class='mb-3'><label for='product_name' class='form-label'>SKU #</label><input class='form-control' type='text' name='sku' required='' placeholder='Type here' value=''></div>
                            </div>
                            <div class='col-md-3'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Quantity</label><input class='form-control' type='number' name='qty' required='' placeholder='Type here' value='1'></div>
                            </div>
                            
                            <div class='col-md-12'><hr></div>
                            <div class='col-md-3'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Regular Price</label><input class='form-control' type='text' name='price' required='' placeholder='Type here' value='0' onchange='this.form.ws1.value=this.value'></div>
                            </div>
                            <div class='col-md-3'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Offer Price</label><input class='form-control' type='text' name='offer' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-3'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Discount Price</label><input class='form-control' type='number' name='discount' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-3'><label class='form-label'>Discount Condition</label>
                                <select class='form-select' name='discount_type' required=''><option value=''>Select Condition</option><option value='FLAT'>FLAT</option><option value='PERCENTAGE'>PERCENTAGE</option></select>
                            </div>
                            
                            <div class='col-md-12'><hr></div>
                            <div class='col-md-3'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Vendor Commission</label><input class='form-control' type='number' name='v_comm' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-3'><label class='form-label'>Commission Condition</label>
                                <select class='form-select' name='comm_type' required=''><option value=''>Select Condition</option><option value='FLAT'>FLAT</option><option value='PERCENTAGE'>PERCENTAGE</option></select>
                            </div>
                            <div class='col-md-6'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Product Tag (Saperate with comma)</label><input class='form-control' type='text' name='tag' placeholder='Type here' value=''></div>
                            </div>
                            
                            <div class='col-md-12'><hr></div>
                            <div class='col-md-4'><label class='form-label'>Image File (Multi Select)</label>
                                <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                            </div>
                            
                            <div class='col-md-12'><hr></div>
                            <div class='col-md-12'>
                                <div class='mb-3'>
                                    <label class='form-label'>Introduction</label>
                                    <textarea id='textarea1' name='introduction' onclick=\"generate_wysiwyg('textarea1');\" style='width:100%' placeholder='Type here' class='form-control'></textarea>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='mb-3'>
                                    <label class='form-label'>Detail</label>
                                    <textarea id='textarea2' name='detail' onclick=\"generate_wysiwyg('textarea2');\" style='width:100%' placeholder='Type here' class='form-control'></textarea>                                    
                                </div>
                            </div>
                            
                            <div class='col-md-12'><hr></div>
                            <div class='col-md-12'>Attributes<hr></div>
                            <div class='col-md-2'><label class='form-label'>Color</label>
                                <select class='form-select' name='c_status' required=''><option value='OFF'>OFF</option><option value='ON'>ON</option></select>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Color 1</label><br>
                                <input type='color' name='c1x' onblur='this.form.c1.value=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                <input class='form-control' type='text' name='c1' placeholder='Type here' readonly value='NONE' onclick=\"this.value='NONE'\"></label>
                            </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Color 2</label><br>
                                    <input type='color' name='c2x' onblur='this.form.c2.value=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                    <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                    <input class='form-control' type='text' name='c2' placeholder='Type here' readonly value='NONE' onclick=\"this.value='NONE'\"></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Color 3</label><br>
                                    <input type='color' name='c3x' onblur='this.form.c3.value=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                    <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                    <input class='form-control' type='text' name='c3' placeholder='Type here' readonly value='NONE' onclick=\"this.value='NONE'\"></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Color 4</label><br>
                                    <input type='color' name='c4x' onblur='this.form.c4.value=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                    <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                    <input class='form-control' type='text' name='c4' placeholder='Type here' readonly value='NONE' onclick=\"this.value='NONE'\"></label>
                                </div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Color 5</label><br>
                                    <input type='color' name='c5x' onblur='this.form.c5.value=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                    <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                    <input class='form-control' type='text' name='c5' placeholder='Type here' readonly value='NONE' onclick=\"this.value='NONE'\"></label>
                                </div>
                            </div>
                            <div class='col-md-12'><hr></div>
                            
                            <div class='col-md-2'><label class='form-label'>Weight/Size</label>
                                <select class='form-select' name='ws' required=''><option value='WEIGHT'>WEIGHT</option><option value='SIZE'>SIZE</option></select>
                            </div>
                            <div class='col-md-2'><label class='form-label'>Weight/Size</label>
                                <select class='form-select' name='ws_status' required=''><option value='OFF'>OFF</option><option value='ON'>ON</option></select>
                            </div>
                            <div class='col-md-12'>&nbsp;</div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-1</label><input class='form-control' type='text' name='ws11' placeholder='Type here' value=''></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-2</label><input class='form-control' type='text' name='ws22' placeholder='Type here' value=''></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-3</label><input class='form-control' type='text' name='ws33' placeholder='Type here' value=''></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-4</label><input class='form-control' type='text' name='ws44' placeholder='Type here' value=''></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-5</label><input class='form-control' type='text' name='ws55' placeholder='Type here' value=''></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-6</label><input class='form-control' type='text' name='ws66' placeholder='Type here' value=''></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws1' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws2' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws3' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws4' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws5' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>price</label><input class='form-control' type='number' name='ws6' placeholder='Type here' value='0'></div>
                            </div>
                            <div class='col-md-12'><hr></div>
                            








                            <div class='col-md-2' style='margin-top:25px'>
                                <div class='d-grid'><button class='btn btn-primary'>Save</button><input type=hidden name=processor value='addproduct'></div>
                            </div>
                            
                            <div class='col-md-12' style='height:100px'>&nbsp;</div>
                        </div>
                    </form>";
                    // cid,cid2,bid,vid,sku,qty,price,offer,discount,discount_type,v_comm,comm_type,tag,introduction,detail,ws,ws_status,ws11,ws22,ws33,ws44,ws55,ws66,ws1,ws2,ws3,ws4,ws5,ws6,c_status,c1,c2,c3,c4,c5,
                }
                echo"</div>
            </div>
        </div>
    </section>";
?>