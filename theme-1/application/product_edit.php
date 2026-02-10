<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'>
            <h2 class='content-title'>Edit Product</h2> 
            <a style='cursor: pointer' href='#top' onclick=\"shiftdataV2('product_edit.php?pid=".$_GET["pid"]."&sheba=".$_GET["sheba"]."', 'datashiftX')\"><i class='icon material-icons md-refresh'></i></a>
        </div>
        <div class='card'>
            <div class='card-body'> 
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    $s2 = "select * from sms_product_bon where id='".$_GET["pid"]."' order by id asc limit 1";
                    $r2 = $conn->query($s2);
                    if ($r2->num_rows > 0) { while($rs2 = $r2->fetch_assoc()) {
                        
                        $offer_sd=date("Y-m-d", $rs2["offer_sd"]);
                        $offer_ed=date("Y-m-d", $rs2["offer_ed"]);

                        echo"<form method='post' action='product_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Product Name</label>
                                        <input class='form-control' type='text' name='pname' placeholder='Type here' value='".$rs2["pname"]."'>
                                    </div>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Main Category</label>";
                                    $s2a = "select * from sms_link where id='".$rs2["cid"]."' order by id asc limit 1";
                                    $r2a = $conn->query($s2a);
                                    if ($r2a->num_rows > 0) { while($rs2a = $r2a->fetch_assoc()) { $cat1="".$rs2a["pam"]." --".$rs2a["id"].""; } }
                                    echo"<input type='text' class='form-control' name='cid' placeholder='Main Category' list='list-timezone' id='input-datalist' required='' value='$cat1'>
                                    <datalist id='list-timezone'>";
                                        $s1z = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
                                        $r1z = $conn->query($s1z);
                                        if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                            echo"<option value='".$rs1z["pam"]."--".$rs1z["id"]."'>".$rs1z["pam"]."--".$rs1z["id"]."</option>";
                                            $s1za = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                            $r1za = $conn->query($s1za);
                                            if ($r1za->num_rows > 0) { while($rs1za = $r1za->fetch_assoc()) {
                                                echo"<option value='".$rs1z["pam"]." > ".$rs1za["pam"]."--".$rs1za["id"]."'>".$rs1z["pam"]." > ".$rs1za["pam"]."--".$rs1za["id"]."</option>";
                                                $s1zb = "select * from sms_link where des1='".$rs1za["id"]."' order by sorder asc";
                                                $r1zb = $conn->query($s1zb);
                                                if ($r1zb->num_rows > 0) { while($rs1zb = $r1zb->fetch_assoc()) {
                                                    echo"<option value='".$rs1z["pam"]." > ".$rs1za["pam"]." > ".$rs1zb["pam"]."--".$rs1zb["id"]."'>".$rs1z["pam"]." > ".$rs1za["pam"]." > ".$rs1zb["pam"]."--".$rs1zb["id"]."</option>";
                                                } }
                                            } }
                                        } }
                                    echo"</datalist>                                    
                                </div>
                                <div class='col-md-3'><label class='form-label'>Second Category</label>";
                                    $s2b = "select * from sms_link where id='".$rs2["cid2"]."' order by id asc limit 1";
                                    $r2b = $conn->query($s2b);
                                    if ($r2b->num_rows > 0) { while($rs2b = $r2b->fetch_assoc()) { $cat1="".$rs2b["pam"]." --".$rs2b["id"].""; } }
                                    echo"<input type='text' class='form-control' name='cid2' placeholder='Main Category' list='list-timezone2' id='input-datalist' required='' value='$cat2'>
                                    <datalist id='list-timezone2'>";
                                        $s1z = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
                                        $r1z = $conn->query($s1z);
                                        if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                            echo"<option value='".$rs1z["pam"]."--".$rs1z["id"]."'>".$rs1z["pam"]."--".$rs1z["id"]."</option>";
                                            $s1za = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                            $r1za = $conn->query($s1za);
                                            if ($r1za->num_rows > 0) { while($rs1za = $r1za->fetch_assoc()) {
                                                echo"<option value='".$rs1z["pam"]." > ".$rs1za["pam"]."--".$rs1za["id"]."'>".$rs1z["pam"]." > ".$rs1za["pam"]."--".$rs1za["id"]."</option>";
                                                $s1zb = "select * from sms_link where des1='".$rs1za["id"]."' order by sorder asc";
                                                $r1zb = $conn->query($s1zb);
                                                if ($r1zb->num_rows > 0) { while($rs1zb = $r1zb->fetch_assoc()) {
                                                    echo"<option value='".$rs1z["pam"]." > ".$rs1za["pam"]." > ".$rs1zb["pam"]."--".$rs1zb["id"]."'>".$rs1z["pam"]." > ".$rs1za["pam"]." > ".$rs1zb["pam"]."--".$rs1zb["id"]."</option>";
                                                } }
                                            } }
                                        } }
                                    echo"</datalist>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Brand Name</label>
                                    <select class='form-select' name='bid' required=''>";
                                        $s2c = "select * from brand where id='".$rs2["bid"]."' order by title asc limit 1";
                                        $r2c = $conn->query($s2c);
                                        if ($r2c->num_rows > 0) { while($rs2c = $r2c->fetch_assoc()) { echo"<option value='".$rs2c["id"]."'>".$rs2c["title"]."</option>"; } }
                                        
                                        $s1z = "select * from brand order by title asc";
                                        $r1z = $conn->query($s1z);
                                        if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) { echo"<option value='".$rs1z["id"]."'>".$rs1z["title"]."</option>"; } }
                                    echo"</select>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Vendor</label>
                                    <select class='form-select' name='vid' required=''>";
                                        $s2d = "select * from sms_user2 where id='".$rs2["vid"]."' order by name asc limit 1";    
                                        $r2d = $conn->query($s2d);
                                        if ($r2d->num_rows > 0) { while($rs2d = $r2d->fetch_assoc()) { echo"<option value='".$rs2d["id"]."'>".$rs2d["name"]." ".$rs2d["name2"]."</option>"; } }
                                        
                                        $s1z = "select * from sms_user2 where actype='VENDOR' order by name asc";
                                        $r1z = $conn->query($s1z);
                                        if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) { echo"<option value='".$rs1z["id"]."'>".$rs1z["name"]." ".$rs1z["name2"]."</option>";  } }
                                    echo"</select>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>SKU #</label><input class='form-control' type='text' name='sku' placeholder='Type here' value='".$rs2["sku"]."'></div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Quantity</label><input class='form-control' type='text' name='qty' placeholder='Type here' value='".$rs2["qty"]."'></div>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Regular Price</label><input class='form-control' type='text' name='price' placeholder='Type here' value='".$rs2["price"]."' onchange='this.form.ws1.value=this.value'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Discount Price</label><input class='form-control' type='number' name='discount' placeholder='Type here' value='".$rs2["discount"]."'></div>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Discount Condition</label>
                                    <select class='form-select' name='discount_type' required=''>
                                        <option value='".$rs2["discount_type"]."'>".$rs2["discount_type"]."</option>
                                        <option value='FLAT'>FLAT</option><option value='PERCENTAGE'>PERCENTAGE</option>
                                    </select>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Vendor Commission</label><input class='form-control' type='number' name='v_comm' placeholder='Type here' value='".$rs2["v_comm"]."'></div>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Commission Condition</label>
                                    <select class='form-select' name='comm_type' required=''>
                                        <option value='".$rs2["comm_type"]."'>".$rs2["comm_type"]."</option>
                                        <option value='FLAT'>FLAT</option><option value='PERCENTAGE'>PERCENTAGE</option>
                                    </select>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Offer Price</label><input class='form-control' type='text' name='offer' placeholder='Type here' value='".$rs2["offer"]."'></div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Offer Start Date</label><input class='form-control' type='date' name='offer_sd' placeholder='Type here' value='$offer_sd'></div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Offer End Date</label><input class='form-control' type='date' name='offer_ed' placeholder='Type here' value='$offer_ed'></div>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-12' id='multiimage'></div>
                                <div class='col-md-5'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Product Tag</label><input class='form-control' type='text' name='tag' placeholder='Type here' value='".$rs2["tag"]."'></div>
                                </div>                                
                                <div class='col-md-5'><label class='form-label'>Image File (Multi Select)</label>
                                    <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                                </div>
                                <div class='col-md-2' style='margin-top:25px'>
                                    <button type='button' class='btn btn-default' onclick=\"shiftdataV2('product_images.php?pid=".$_GET["pid"]."', 'multiimage')\">View Images</button>
                                </div>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Shipping Policy</label><input class='form-control' type='text' name='sp' placeholder='Type here' value='".$_GET["shipping_policy"]."'></div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Return Policy</label><input class='form-control' type='text' name='rp' placeholder='Type here' value='".$_GET["returnpolicy"]."'></div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Vendor Policy</label><input class='form-control' type='text' name='vp' placeholder='Type here' value='".$_GET["payment_terms"]."'></div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Payment Policy</label><input class='form-control' type='text' name='pp' placeholder='Type here' value='".$_GET["vendor_terms"]."'></div>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-12'>
                                    <div class='mb-3'><label class='form-label'>Introduction</label>
                                        <textarea id='textarea1' name='introduction' onclick=\"generate_wysiwyg('textarea1');\" style='width:100%' placeholder='Type here' class='form-control'>".$rs2["introduction"]."</textarea>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='mb-3'><label class='form-label'>Detail</label>
                                        <textarea id='textarea2' name='detail' onclick=\"generate_wysiwyg('textarea2');\" style='width:100%' placeholder='Type here' class='form-control'>".$rs2["detail"]."</textarea>
                                    </div>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-12'>Attributes<hr></div>
                                <div class='col-md-2'><label class='form-label'>Weight/Size</label>
                                    <select class='form-select' name='ws' required=''>
                                        <option value='".$rs2["ws"]."'>".$rs2["ws"]."</option><option value='WEIGHT'>WEIGHT</option><option value='SIZE'>SIZE</option>
                                    </select>
                                </div>
                                <div class='col-md-2'><label class='form-label'>Weight/Size</label>
                                    <select class='form-select' name='ws_status' required=''>
                                        <option value='".$rs2["ws_status"]."'>".$rs2["ws_status"]."</option><option value='OFF'>OFF</option><option value='ON'>ON</option>
                                    </select>
                                </div>
                                <div class='col-md-12'>&nbsp;</div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-1</label><input class='form-control' type='text' name='ws11' placeholder='Type here' value='".$rs2["ws11"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-2</label><input class='form-control' type='text' name='ws22' placeholder='Type here' value='".$rs2["ws22"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-3</label><input class='form-control' type='text' name='ws33' placeholder='Type here' value='".$rs2["ws33"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-4</label><input class='form-control' type='text' name='ws44' placeholder='Type here' value='".$rs2["ws44"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-5</label><input class='form-control' type='text' name='ws55' placeholder='Type here' value='".$rs2["ws55"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Size/Weight-6</label><input class='form-control' type='text' name='ws66' placeholder='Type here' value='".$rs2["ws66"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws1' placeholder='Type here' value='".$rs2["ws1"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws2' placeholder='Type here' value='".$rs2["ws2"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws3' placeholder='Type here' value='".$rs2["ws3"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws4' placeholder='Type here' value='".$rs2["ws4"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Price</label><input class='form-control' type='number' name='ws5' placeholder='Type here' value='".$rs2["ws5"]."'></div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>price</label><input class='form-control' type='number' name='ws6' placeholder='Type here' value='".$rs2["ws6"]."'></div>
                                </div>
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-2'><label class='form-label'>Color</label>
                                    <select class='form-select' name='c_status' required=''><option value='".$rs2["c_status"]."'>".$rs2["c_status"]."</option><option value='OFF'>OFF</option><option value='ON'>ON</option></select>
                                </div>
                                <div class='col-md-2'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Color 1</label><br>
                                    <input type='color' name='c1x' onblur='this.form.c1.value=this.value;this.form.c1.style.backgroundColor=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                    <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                    <input class='form-control' type='text' name='c1' placeholder='Type here' readonly value='".$rs2["c1"]."' onclick=\"this.value='NONE'\" style='background-color:".$rs2["c1"]."'></label>
                                </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Color 2</label><br>
                                        <input type='color' name='c2x' onblur='this.form.c2.value=this.value;this.form.c2.style.backgroundColor=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                        <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                        <input class='form-control' type='text' name='c2' placeholder='Type here' readonly value='".$rs2["c2"]."' onclick=\"this.value='NONE'\" style='background-color:".$rs2["c2"]."'></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Color 3</label><br>
                                        <input type='color' name='c3x' onblur='this.form.c3.value=this.value;this.form.c3.style.backgroundColor=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                        <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                        <input class='form-control' type='text' name='c3' placeholder='Type here' readonly value='".$rs2["c3"]."' onclick=\"this.value='NONE'\" style='background-color:".$rs2["c3"]."'></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Color 4</label><br>
                                        <input type='color' name='c4x' onblur='this.form.c4.value=this.value;this.form.c4.style.backgroundColor=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                        <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                        <input class='form-control' type='text' name='c4' placeholder='Type here' readonly value='".$rs2["c4"]."' onclick=\"this.value='NONE'\" style='background-color:".$rs2["c4"]."'></label>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Color 5</label><br>
                                        <input type='color' name='c5x' onblur='this.form.c5.value=this.value;this.form.c5.style.backgroundColor=this.value' style='position:absolute;z-index:9;border-radius:50%;width:16px;height:16px;padding:0px;margin-top:-22px;margin-left:50px'>
                                        <label><img src='assets/no.png' style='position:absolute;z-index:9;width:16px;margin-top:-22px;margin-left:70px'>
                                        <input class='form-control' type='text' name='c5' placeholder='Type here' readonly value='".$rs2["c5"]."' onclick=\"this.value='NONE'\" style='background-color:".$rs2["c5"]."'></label>
                                    </div>
                                </div>
                                <div class='col-md-12'><hr></div>
                                
                                <div class='col-md-12'>Global Attributes<hr></div>

                                <div class='col-md-2'>
                                    <select class='form-select' name='attribute_1' required=''>
                                        <option value='OFF'>OFF</option>";
                                        $a1 = "select * from  product_attribute_cat where status='ON' order by name asc";
                                        $a11 = $conn->query($a1);
                                        if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                            if($rs2["attribute_1"]==$a111["id"]) echo"<option value='".$a111["id"]."' selected>".$a111["name"]."</option>";
                                            else echo"<option value='".$a111["id"]."'>".$a111["name"]."</option>";
                                        } }
                                    echo"</select>
                                </div>

                                <div class='col-md-2'>
                                    <select class='form-select' name='attribute_2' required=''>
                                        <option value='OFF'>OFF</option>";
                                        $a1 = "select * from  product_attribute_cat where status='ON' order by name asc";
                                        $a11 = $conn->query($a1);
                                        if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                            if($rs2["attribute_2"]==$a111["id"]) echo"<option value='".$a111["id"]."' selected>".$a111["name"]."</option>";
                                            else echo"<option value='".$a111["id"]."'>".$a111["name"]."</option>";
                                        } }
                                    echo"</select>
                                </div>

                                <div class='col-md-2'>
                                    <select class='form-select' name='attribute_3' required=''>
                                        <option value='OFF'>OFF</option>";
                                        $a1 = "select * from  product_attribute_cat where status='ON' order by name asc";
                                        $a11 = $conn->query($a1);
                                        if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                            if($rs2["attribute_3"]==$a111["id"]) echo"<option value='".$a111["id"]."' selected>".$a111["name"]."</option>";
                                            else echo"<option value='".$a111["id"]."'>".$a111["name"]."</option>";
                                        } }
                                    echo"</select>
                                </div>

                                <div class='col-md-2'>
                                    <select class='form-select' name='attribute_4' required=''>
                                        <option value='OFF'>OFF</option>";
                                        $a1 = "select * from  product_attribute_cat where status='ON' order by name asc";
                                        $a11 = $conn->query($a1);
                                        if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                            if($rs2["attribute_4"]==$a111["id"]) echo"<option value='".$a111["id"]."' selected>".$a111["name"]."</option>";
                                            else echo"<option value='".$a111["id"]."'>".$a111["name"]."</option>";
                                        } }
                                    echo"</select>
                                </div>

                                <div class='col-md-2'>
                                    <select class='form-select' name='attribute_5' required=''>
                                        <option value='OFF'>OFF</option>";
                                        $a1 = "select * from  product_attribute_cat where status='ON' order by name asc";
                                        $a11 = $conn->query($a1);
                                        if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                            if($rs2["attribute_5"]==$a111["id"]) echo"<option value='".$a111["id"]."' selected>".$a111["name"]."</option>";
                                            else echo"<option value='".$a111["id"]."'>".$a111["name"]."</option>";
                                        } }
                                    echo"</select>
                                </div>

                                <div class='col-md-2'>
                                    <select class='form-select' name='attribute_6' required=''>
                                        <option value='OFF'>OFF</option>";
                                        $a1 = "select * from  product_attribute_cat where status='ON' order by name asc";
                                        $a11 = $conn->query($a1);
                                        if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                            if($rs2["attribute_6"]==$a111["id"]) echo"<option value='".$a111["id"]."' selected>".$a111["name"]."</option>";
                                            else echo"<option value='".$a111["id"]."'>".$a111["name"]."</option>";
                                        } }
                                    echo"</select>
                                </div>
                                
                                <div class='col-md-12' style='height:50px'>&nbsp;</div>
                                <div class='col-md-4' style='margin-top:25px'><div class='d-grid'>
                                    <button type='button' class='btn btn-info' onclick=\"shiftdataV1('".$_GET["sheba"]."', 'datashiftX')\" style='font-size:10pt'>Back to Product List</button>
                                </div></div>
                                <div class='col-md-2' style='margin-top:25px'><div class='d-grid'>
                                    <button type='submit' class='btn btn-primary'>Update</button>&nbsp;&nbsp;&nbsp;
                                    <input type=hidden name=processor value='editproduct'>
                                    <input type=hidden name=id value='".$rs2["id"]."'>
                                    <input type=hidden name=reactor value='".$rs2["reactor"]."'>
                                </div></div>
                                
                                
                                <div class='col-md-12' style='height:100px'>&nbsp;</div>
                            </div>
                        </form>";
                    } }                    
                }
                echo"</div>
            </div>
        </div>
    </section>";
?>