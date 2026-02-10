<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    
    include("../authenticator.php");
    
    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close' onclick=\"shiftdataV2('product_data.php?cid=$cid&sheba=$sheba', 'datatableX')\"></button>
    </div>
    <div class='offcanvas-body'>
        <div>";
            if(isset($_GET["pid"]) and $_GET["pid"]!=0){
                echo"<div>";
                    $rc1 = "select * from product where productid='".$_GET["pid"]."' order by productid asc limit 1";
                    $rc2 = $conn->query($rc1);
                    if ($rc2->num_rows > 0) { while($rc3 = $rc2->fetch_assoc()) {
                        echo"<form method='post' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom'>
                            <input type=hidden name='processor' value='edit_product'><input type=hidden name='productid' value='".$rc3["productid"]."'>
                            <div class='row'>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='product_name'>Product Name:</label><input class='form-control' type='text' id='product_name' name='product_name' value='".$rc3["product_name"]."' required>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='image'>Image URL: <a href='".$rc3["image"]."' targe='_blank'>Image Link</a></label>
                                    <input type='file' name='images[]' multiple class='form__field__img form-control' name='image' value='images'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='sku'>SKU:</label><input class='form-control' type='text' id='sku' name='sku' value='".$rc3["sku"]."' >
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='category'>Category:</label><select class='form-select' name='category1' required='' >";
                                        $p1 = "select * from product_category where parent='0' and status='ON' order by category_name asc";
                                        $p2 = $conn->query($p1);
                                        if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                                            echo"<option value='".$p3["id"]."'>".$p3["category_name"]."</option>";
                                            $p11 = "select * from product_category where parent='".$p3["id"]."' and status='ON' order by category_name asc";
                                            $p22 = $conn->query($p11);
                                            if ($p22->num_rows > 0) { while($p33 = $p22->fetch_assoc()) {
                                                echo"<option value='".$p33["id"]."'>&nbsp;&nbsp;&nbsp; ".$p33["category_name"]."</option>";
                                                $p111 = "select * from product_category where parent='".$p33["id"]."' and status='ON' order by category_name asc";
                                                $p222 = $conn->query($p111);
                                                if ($p222->num_rows > 0) { while($p333 = $p222->fetch_assoc()) {
                                                    echo"<option value='".$p333["id"]."'>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ".$p333["category_name"]."</option>";
                                                } }
                                            } }
                                        } }
                                    echo"</select>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='category2'>Category 2:</label><select class='form-select' name='category2' required='' >";
                                        $p1 = "select * from product_category where parent='0' and status='ON' order by category_name asc";
                                        $p2 = $conn->query($p1);
                                        if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                                            echo"<option value='".$p3["id"]."'>".$p3["category_name"]."</option>";
                                            $p11 = "select * from product_category where parent='".$p3["id"]."' and status='ON' order by category_name asc";
                                            $p22 = $conn->query($p11);
                                            if ($p22->num_rows > 0) { while($p33 = $p22->fetch_assoc()) {
                                                echo"<option value='".$p33["id"]."'>&nbsp;&nbsp;&nbsp; ".$p33["category_name"]."</option>";
                                                $p111 = "select * from product_category where parent='".$p33["id"]."' and status='ON' order by category_name asc";
                                                $p222 = $conn->query($p111);
                                                if ($p222->num_rows > 0) { while($p333 = $p222->fetch_assoc()) {
                                                    echo"<option value='".$p333["id"]."'>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ".$p333["category_name"]."</option>";
                                                } }
                                            } }
                                        } }
                                    echo"</select> 
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='brand'>Brand:</label><select class='form-select' name='brand' required='' >";
                                        $p1 = "select * from product_brands where status='ON' order by brand_name asc";
                                        $p2 = $conn->query($p1);
                                        if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { echo"<option value='".$p3["id"]."'>".$p3["brand_name"]."</option>"; } }
                                    echo"</select>
                                </div>
                                <div class='form-group col-6' style='margin-top:15px'>
                                    <label for='introduction'>Introduction:</label><textarea class='form-control' id='introduction' name='introduction'>".$rc3["introduction"]."</textarea>
                                </div>
                                <div class='form-group col-6' style='margin-top:15px'>
                                    <label for='description'>Description:</label><textarea class='form-control' id='description' name='description'>".$rc3["description"]."</textarea>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='size'>Size:</label><input class='form-control' type='text' id='size' name='size' value='".$rc3["size"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='weight'>Weight:</label><input class='form-control' type='text' id='weight' name='weight' value='".$rc3["weight"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='color'>Color:</label><input class='form-control' type='text' id='color' name='color' value='".$rc3["color"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='material'>Material:</label><input class='form-control' type='text' id='material' name='material' value='".$rc3["material"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='capacity'>Capacity:</label><input class='form-control' type='text' id='capacity' name='capacity' value='".$rc3["capacity"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='flavor'>Flavour:</label><input class='form-control' type='text' id='flavor' name='flavour' value='".$rc3["flavour"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='style'>Style:</label><input class='form-control' type='text' id='style' name='style' value='".$rc3["style"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='bundles'>Bundles:</label><input class='form-control' type='text' id='bundles' name='bundles' value='".$rc3["bundles"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='modal'>Modal:</label><input class='form-control' type='text' id='modal' name='modal' value='".$rc3["modal"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='age'>Age:</label><input class='form-control' type='text' id='age' name='age' value='".$rc3["age"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='gender'>Gender:</label><select class='form-select' id='gender' name='gender'><option value='".$rc3["gender"]."'>".$rc3["gender"]."</opton><option value='male'>Male</option><option value='female'>Female</option><option value='unisex'>Unisex</option></select>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='genetic'>Genetic:</label><input class='form-control' type='text' id='genetic' name='genetic' value='".$rc3["genetic"]."'>
                                </div>
                                <div class='form-group col-3' style='margin-top:15px'>
                                    <label for='shipping_policy'>Shipping Policy:</label><textarea class='form-control' id='shipping_policy' name='shipping_policy'>".$rc3["shipping_policy"]."</textarea>
                                </div>
                                <div class='form-group col-3' style='margin-top:15px'>
                                    <label for='return_policy'>Return Policy:</label><textarea class='form-control' id='return_policy' name='return_policy'>".$rc3["return_policy"]."</textarea>
                                </div>
                                <div class='form-group col-3' style='margin-top:15px'>
                                    <label for='vendor_policy'>Vendor Policy:</label><textarea class='form-control' id='vendor_policy' name='vendor_policy'>".$rc3["vendor_policy"]."</textarea>
                                </div>
                                <div class='form-group col-3' style='margin-top:15px'>
                                    <label for='payment_policy'>Payment Policy:</label><textarea class='form-control' id='payment_policy' name='payment_policy'>".$rc3["payment_policy"]."</textarea>
                                </div>
                                <div class='form-group col-8' style='margin-top:15px'>
                                    <label for='video_link'>Video Link:</label><input class='form-control' type='text' id='video_link' name='video_link' value='".$rc3["video_link"]."'>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='status'>Status:</label><select class='form-select' id='status' name='status'><option value='".$rc3["status"]."'>".$rc3["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                                </div>
                                <div class='form-group col-2' style='margin-top:15px'>
                                    <label for='status'>Save Data</label><button style='width:100%' class='btn btn-primary' type='submit' onblur=\"shiftdataV2('product_data.php?pid=$purchaseno&sheba=product', 'datatableXX')\">Update Product</button>
                                </div>
                            </div>
                        </form>";
                    } }
                echo"</div>";
            }else{
                echo"<div>";
                    $ctime=time();
                    $pdate=date("Y-m-d",$ctime);
                    echo"<form method='post' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom'>
                        <input type=hidden name='processor' value='new_product'><input type=hidden name='user_id' value='$userid'>
                        <div class='row'>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='product_name'>Product Name:</label><input class='form-control' type='text' id='product_name' name='product_name' required>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='image'>Image URL:</label>
                                <input type='file' name='images[]' multiple class='form__field__img form-control' name='image' value='images'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='sku'>SKU:</label><input class='form-control' type='text' id='sku' name='sku'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='category'>Category:</label><select class='form-select' name='category1' required='' >";
                                    $p1 = "select * from product_category where parent='0' and status='ON' order by category_name asc";
                                    $p2 = $conn->query($p1);
                                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                                        echo"<option value='".$p3["id"]."'>".$p3["category_name"]."</option>";
                                        $p11 = "select * from product_category where parent='".$p3["id"]."' and status='ON' order by category_name asc";
                                        $p22 = $conn->query($p11);
                                        if ($p22->num_rows > 0) { while($p33 = $p22->fetch_assoc()) {
                                            echo"<option value='".$p33["id"]."'>&nbsp;&nbsp;&nbsp; ".$p33["category_name"]."</option>";
                                            $p111 = "select * from product_category where parent='".$p33["id"]."' and status='ON' order by category_name asc";
                                            $p222 = $conn->query($p111);
                                            if ($p222->num_rows > 0) { while($p333 = $p222->fetch_assoc()) {
                                                echo"<option value='".$p333["id"]."'>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ".$p333["category_name"]."</option>";
                                            } }
                                        } }
                                    } }
                                echo"</select>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='category2'>Category 2:</label><select class='form-select' name='category2' required='' >";
                                    $p1 = "select * from product_category where parent='0' and status='ON' order by category_name asc";
                                    $p2 = $conn->query($p1);
                                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                                        echo"<option value='".$p3["id"]."'>".$p3["category_name"]."</option>";
                                        $p11 = "select * from product_category where parent='".$p3["id"]."' and status='ON' order by category_name asc";
                                        $p22 = $conn->query($p11);
                                        if ($p22->num_rows > 0) { while($p33 = $p22->fetch_assoc()) {
                                            echo"<option value='".$p33["id"]."'>&nbsp;&nbsp;&nbsp; ".$p33["category_name"]."</option>";
                                            $p111 = "select * from product_category where parent='".$p33["id"]."' and status='ON' order by category_name asc";
                                            $p222 = $conn->query($p111);
                                            if ($p222->num_rows > 0) { while($p333 = $p222->fetch_assoc()) {
                                                echo"<option value='".$p333["id"]."'>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; ".$p333["category_name"]."</option>";
                                            } }
                                        } }
                                    } }
                                echo"</select> 
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='brand'>Brand:</label><select class='form-select' name='brand' required='' >";
                                    $p1 = "select * from product_brands where status='ON' order by brand_name asc";
                                    $p2 = $conn->query($p1);
                                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { echo"<option value='".$p3["id"]."'>".$p3["brand_name"]."</option>"; } }
                                echo"</select>
                            </div>
                            <div class='form-group col-6' style='margin-top:15px'>
                                <label for='introduction'>Introduction:</label><textarea class='form-control' id='introduction' name='introduction'></textarea>
                            </div>
                            <div class='form-group col-6' style='margin-top:15px'>
                                <label for='description'>Description:</label><textarea class='form-control' id='description' name='description'></textarea>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='size'>Size:</label><input class='form-control' type='text' id='size' name='size'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='weight'>Weight:</label><input class='form-control' type='text' id='weight' name='weight'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='color'>Color:</label><input class='form-control' type='text' id='color' name='color'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='material'>Material:</label><input class='form-control' type='text' id='material' name='material'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='capacity'>Capacity:</label><input class='form-control' type='text' id='capacity' name='capacity'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='flavor'>Flavour:</label><input class='form-control' type='text' id='flavor' name='flavour'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='style'>Style:</label><input class='form-control' type='text' id='style' name='style'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='bundles'>Bundles:</label><input class='form-control' type='text' id='bundles' name='bundles'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='modal'>Modal:</label><input class='form-control' type='text' id='modal' name='modal'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='age'>Age:</label><input class='form-control' type='text' id='age' name='age'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='gender'>Gender:</label><select class='form-select' id='gender' name='gender'><option value='male'>Male</option><option value='female'>Female</option><option value='unisex'>Unisex</option></select>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='genetic'>Genetic:</label><input class='form-control' type='text' id='genetic' name='genetic'>
                            </div>
                            <div class='form-group col-3' style='margin-top:15px'>
                                <label for='shipping_policy'>Shipping Policy:</label><textarea class='form-control' id='shipping_policy' name='shipping_policy'></textarea>
                            </div>
                            <div class='form-group col-3' style='margin-top:15px'>
                                <label for='return_policy'>Return Policy:</label><textarea class='form-control' id='return_policy' name='return_policy'></textarea>
                            </div>
                            <div class='form-group col-3' style='margin-top:15px'>
                                <label for='vendor_policy'>Vendor Policy:</label><textarea class='form-control' id='vendor_policy' name='vendor_policy'></textarea>
                            </div>
                            <div class='form-group col-3' style='margin-top:15px'>
                                <label for='payment_policy'>Payment Policy:</label><textarea class='form-control' id='payment_policy' name='payment_policy'></textarea>
                            </div>
                            <div class='form-group col-8' style='margin-top:15px'>
                                <label for='video_link'>Video Link:</label><input class='form-control' type='text' id='video_link' name='video_link'>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='status'>Status:</label><select class='form-select' id='status' name='status'><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                            </div>
                            <div class='form-group col-2' style='margin-top:15px'>
                                <label for='status'>Save Data</label><button style='width:100%' class='btn btn-primary' type='submit' onblur=\"shiftdataV2('product_data.php?pid=$purchaseno&sheba=product', 'datatableXX')\">Add Product</button>
                            </div>
                            
                        </div>
                    </form>
                </div>";
            }
            
            // product_name,images,sku,category1,category2,brand,introduction,description,size,weight,color,material,capacity,flavour,style,bundles,modal,age,gender,genetic,shipping_policy,return_policy,vendor_policy,payment_policy,video_link,status            
            
        echo"</div>
    </div>";  