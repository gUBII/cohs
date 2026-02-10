<?php
    include("authenticatorx.php");
    
    echo"<div class='modal fade custom-modal' id='quickViewModal' tabindex='-1' aria-labelledby='quickViewModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            <div class='modal-body'>
                <div class='row'>";
                $ta=0;
                $q1 = "select * from sms_product_bon where id='".$_GET["prodid"]."' and status='2' order by id desc limit 1";
                $q2 = $conn->query($q1);
                if ($q2->num_rows > 0) { while($q3 = $q2->fetch_assoc()) {
                    $ttu=0;
                    $s5 = "select * from sms_user2 where id='".$q3["vid"]."' and status='ON' order by id asc limit 1";
                    $r5 = $conn->query($s5);
                    if ($r5->num_rows > 0) { while($rs5 = $r5->fetch_assoc()) { $ttu=1; } }
                                            
                    $brandname="Custom Made";
                    $s5x = "select * from brand where id='".$q3["bid"]."' order by id asc limit 1";
                    $r5x = $conn->query($s5x);
                    if ($r5x->num_rows > 0) { while($rs5x = $r5x->fetch_assoc()) { $brandname=$rs5x["title"]; } }
                                                
                    $category1="";
                    $s5y = "select * from sms_link where id='".$q3["cid"]."' order by id asc limit 1";
                    $r5y = $conn->query($s5y);
                    if ($r5y->num_rows > 0) { while($rs5y = $r5y->fetch_assoc()) { $category1=$rs5y["pam"]; } }
                                
                    $category2="";
                    $s5y = "select * from sms_link where id='".$q3["cid2"]."' order by id asc limit 1";
                    $r5y = $conn->query($s5y);
                    if ($r5y->num_rows > 0) { while($rs5y = $r5y->fetch_assoc()) { $category2=$rs5y["pam"]; } }

                    $rprz=0;
                    $offer_sd=0;
                    if(strlen($q3["offer_sd"])>=1000) $offer_sd=$q3["offer_sd"];
                    $offer_ed=0;
                    if(strlen($q3["offer_ed"])>=1000) $offer_ed=$q3["offer_ed"];

                    $iname="";
                    $ncount=strlen($q3["pname"]);
                    $iname = substr($q3["pname"], 0, 60);
                    if($ncount>=61) $iname="$iname...";
                    
                    $introduction="";
                    $icount=strlen($q3["introduction"]);
                    $introduction = substr($q3["introduction"], 0, 200);
                    if($icount>=201) $introduction="$introduction...";
                    
                    $txz= rand(11111111,99999999);
                    $rprz1=round($rprz);
                    $ta=($ta+1);

                    if($q3["offer"]<=0){
                        if($q3["discount_type"]=="PERCENTAGE"){
                            $rprz=(($q3["price"]*$q3["discount"])/100);
                            $rprz=($q3["price"]-$rprz);
                        } else $rprz=($q3["price"]-$q3["discount"]);
                    }else{
                        if($ctime>=$offer_sd && $ctime<=$offer_ed){
                            $rprz=$q3["offer"];
                        }else{
                            if($q3["discount_type"]=="PERCENTAGE"){
                                $rprz=(($q3["price"]*$q3["discount"])/100);
                                $rprz=($q3["price"]-$rprz);
                            } else $rprz=($q3["price"]-$q3["discount"]);                            
                        }
                    }

                    echo"<div class='col-md-6 col-sm-12 col-xs-12'>
                        <div class='container' style='width:100%;padding:0px;padding-top:30px'>";
                            $s5zx = "select * from multi_image where reactor='".$q3["reactor"]."' order by sorder asc limit 1";
                            $r5zx = $conn->query($s5zx);
                            if ($r5zx->num_rows > 0) { while($rs5zx = $r5zx->fetch_assoc()) {
                                echo"<div class='mySlidex' id='mySliderx'><img src='media/".$rs5zx["image"]."' style='width:100%'></div>";
                                $defaultimage=$rs5zx["image"];
                            } }
                            $s5z = "select * from multi_image where reactor='".$q3["reactor"]."' order by sorder asc";
                            $r5z = $conn->query($s5z);
                            if ($r5z->num_rows > 0) { while($rs5z = $r5z->fetch_assoc()) {
                                echo"<div class='mySlides'><img src='media/".$rs5z["image"]."' style='width:100%'></div>";
                            } }
                            echo"<a class='prev' onclick='plusSlides(-1)'>❮</a><a class='next' onclick='plusSlides(1)'>❯</a>
                            <div class='row' style='padding:10px'>";
                                $t=0;
                                $s6z = "select * from multi_image where reactor='".$q3["reactor"]."' order by sorder asc";
                                $r6z = $conn->query($s6z);
                                if ($r6z->num_rows > 0) { while($rs6z = $r6z->fetch_assoc()) {
                                    $t=($t+1);
                                    echo"<div class='col-2' style='padding:2px'>
                                        <img class='demo cursor' src='media/".$rs6z["image"]."' style='width:100%;border-radius:5px' onclick='currentSlide($t)' alt='".$q3["pname"]."'>
                                    </div>";
                                } }
                            echo"</div>
                        </div>
                        
                        <div class='social-icons single-share'>                            
                            <strong class='mr-10'>Share this:</strong><div class='sharethis-inline-share-buttons'></div>                            
                        </div>

                    </div>
                    <div class='col-md-6 col-sm-12 col-xs-12'>
                        <div class='detail-info'>
                            <h3 class='title-detail mt-30'>$iname</h3>
                            <div class='product-detail-rating'>
                                <div class='pro-details-brand'><span> Brands: <a href=''>$brandname</a></span></div>
                                <div class='product-rate-cover text-end'>
                                    <span> SKU: <a href=''>".$q3["sku"]."</a></span>                                    
                                </div>
                            </div>
                            <div class='clearfix product-price-cover'>
                                <div class='product-price primary-color float-left'>";
                                    if($q3["offer"]>=1) echo"On Offer<br>";
                                    echo"<ins><span class='text-brand'>$csymbol <span id='pricerange'>$rprz-".$q3["ws11"]."</span></span></ins>
                                    <ins><span class='old-price font-md ml-15'>$csymbol ".$q3["price"]."</span></ins>
                                    <span class='save-price  font-md color3 ml-15'>".$q3["discount"]."% Off</span>
                                </div>
                            </div>
                            <div class='bt-1 border-color-1 mt-15 mb-15'></div>";
                            
                            // echo"<div class='short-desc mb-30'><p class='font-sm'>$introduction</p></div>";
                            
                            // COLOR
                            $cvs=$q3["c_status"];
                            $cv1=$q3["c1"];
                            $cv2=$q3["c2"];
                            $cv3=$q3["c3"];
                            $cv4=$q3["c4"];
                            $cv5=$q3["c5"];

                            // WEIGHT & SIZE
                            $wv=$q3["ws"];
                            $wvs=$q3["ws_status"];
                            $wv1=$q3["ws11"];
                            $wv2=$q3["ws22"];
                            $wv3=$q3["ws33"];
                            $wv4=$q3["ws44"];
                            $wv5=$q3["ws55"];
                            $wv6=$q3["ws66"];
                            
                            if($q3["offer"]<=0){
                                if($q3["discount_type"]=="PERCENTAGE"){
                                    $rprz=(($q3["price"]*$q3["discount"])/100);
                                    $rprz=($q3["price"]-$rprz);
                                }else $rprz=($q3["price"]-$q3["discount"]);                                
                            }else{
                                if($ctime>=$offer_sd && $ctime<=$offer_ed){
                                    $rprz=$q3["offer"];
                                }else{
                                    if($q3["discount_type"]=="PERCENTAGE"){
                                        $rprz=(($q3["price"]*$q3["discount"])/100);
                                        $rprz=($q3["price"]-$rprz);
                                    }else $rprz=($q3["price"]-$q3["discount"]);                                    
                                }
                            }

                            if($q3["offer"]<=0){
                                if($q3["discount_type"]=="PERCENTAGE"){
                                    $wa1=($q3["ws1"]-(($q3["ws1"]*$q3["discount"])/100));
                                    $wa2=($q3["ws2"]-(($q3["ws2"]*$q3["discount"])/100));
                                    $wa3=($q3["ws3"]-(($q3["ws3"]*$q3["discount"])/100));
                                    $wa4=($q3["ws4"]-(($q3["ws4"]*$q3["discount"])/100));
                                    $wa5=($q3["ws5"]-(($q3["ws5"]*$q3["discount"])/100));
                                    $wa6=($q3["ws6"]-(($q3["ws6"]*$q3["discount"])/100));
                                }else{
                                    $wa1=($q3["ws1"]-$q3["discount"]);
                                    $wa2=($q3["ws2"]-$q3["discount"]);
                                    $wa3=($q3["ws3"]-$q3["discount"]);
                                    $wa4=($q3["ws4"]-$q3["discount"]);
                                    $wa5=($q3["ws5"]-$q3["discount"]);
                                    $wa6=($q3["ws6"]-$q3["discount"]);
                                }
                            }else{
                                if($ctime>=$offer_sd && $ctime<=$offer_ed){
                                    $wa1=$q3["offer"];
                                    $wa2=$q3["offer"];
                                    $wa3=$q3["offer"];
                                    $wa4=$q3["offer"];
                                    $wa5=$q3["offer"];
                                    $wa6=$q3["offer"];
                                }else{
                                    if($q3["discount_type"]=="PERCENTAGE"){
                                        $wa1=($q3["ws1"]-(($q3["ws1"]*$q3["discount"])/100));
                                        $wa2=($q3["ws2"]-(($q3["ws2"]*$q3["discount"])/100));
                                        $wa3=($q3["ws3"]-(($q3["ws3"]*$q3["discount"])/100));
                                        $wa4=($q3["ws4"]-(($q3["ws4"]*$q3["discount"])/100));
                                        $wa5=($q3["ws5"]-(($q3["ws5"]*$q3["discount"])/100));
                                        $wa6=($q3["ws6"]-(($q3["ws6"]*$q3["discount"])/100));
                                    }else{
                                        $wa1=($q3["ws1"]-$q3["discount"]);
                                        $wa2=($q3["ws2"]-$q3["discount"]);
                                        $wa3=($q3["ws3"]-$q3["discount"]);
                                        $wa4=($q3["ws4"]-$q3["discount"]);
                                        $wa5=($q3["ws5"]-$q3["discount"]);
                                        $wa6=($q3["ws6"]-$q3["discount"]);
                                    }
                                }
                            }
                            
                            echo"<form name='main123456' id='cartform' method='post' action='addtocart.php' target='addtocart' enctype='multipart/form-data'>
                                
                                <input type=hidden name='price' value='$rprz-".$q3["ws11"]."'>
                                <input type=hidden name='colors' value='$cv1'>
                                <input type=hidden name='pid' value='".$q3["id"]."'>
                                <input type=hidden name='pname' value='".$q3["pname"]."'>
                                <input type=hidden name='catid1' value='".$q3["cid"]."'>
                                <input type=hidden name='catid2' value='".$q3["cid2"]."'>
                                <input type=hidden name='vid' value='".$q3["vid"]."'>
                                <input type=hidden name='bid' value='".$q3["bid"]."'>
                                <input type=hidden name='offer' value='".$q3["offer"]."'>
                                <input type=hidden name='discount' value='".$q3["discount"]."'>
                                <input type=hidden name='discount_type' value='".$q3["discount_type"]."'>
                                <input type='hidden' name='cimage' value='$defaultimage'>
                                <input type='hidden' name='affiliate_commission' value='".$q3["affiliate_commission"]."'>";

                                if($q3["c_status"]=="ON") {
                                    echo"<div class='attr-detail attr-color mb-15'><strong class='mr-10'>COLOR</strong>";
                                        if($q3["c1"]!="NONE") echo"<label style='padding:5px;background-color:".$q3["c1"].";border-radius:5px;margin-left:5px;height:38px'><input type='radio' name='colorbar' onclick=\"this.form.colors.value='$cv1'\" style='width:25px;height:27px;accent-color:".$q3["c1"]."'></label>";
                                        if($q3["c2"]!="NONE") echo"<label style='padding:5px;background-color:".$q3["c2"].";border-radius:5px;margin-left:5px;height:38px'><input type='radio' name='colorbar' onclick=\"this.form.colors.value='$cv2'\" style='width:25px;height:27px;accent-color:".$q3["c2"]."'></label>";
                                        if($q3["c3"]!="NONE") echo"<label style='padding:5px;background-color:".$q3["c3"].";border-radius:5px;margin-left:5px;height:38px'><input type='radio' name='colorbar' onclick=\"this.form.colors.value='$cv3'\" style='width:25px;height:27px;accent-color:".$q3["c3"]."'></label>";
                                        if($q3["c4"]!="NONE") echo"<label style='padding:5px;background-color:".$q3["c4"].";border-radius:5px;margin-left:5px;height:38px'><input type='radio' name='colorbar' onclick=\"this.form.colors.value='$cv4'\" style='width:25px;height:27px;accent-color:".$q3["c4"]."'></label>";
                                        if($q3["c5"]!="NONE") echo"<label style='padding:5px;background-color:".$q3["c5"].";border-radius:5px;margin-left:5px;height:38px'><input type='radio' name='colorbar' onclick=\"this.form.colors.value='$cv5'\" style='width:25px;height:27px;accent-color:".$q3["c5"]."'></label>";                                        
                                    echo"</div>";
                                }

                                if($q3["ws_status"]=="ON") {
                                    echo"<div class='attr-detail attr-size'><strong class='mr-10'>".$q3["ws"]."</strong>
                                        <select name='weightbox' class='form-control' onchange=\"this.form.price.value=this.value;document.getElementById('pricerange').innerHTML=this.value;\" style='max-width:200px' >
                                            <option value='$wa1-".$q3["ws11"]."'>".$q3["ws11"]." - ".$q3["ws1"]."</option>
                                            <option value='$wa2-".$q3["ws22"]."'>".$q3["ws22"]." - ".$q3["ws2"]."</option>
                                            <option value='$wa3-".$q3["ws33"]."'>".$q3["ws33"]." - ".$q3["ws3"]."</option>
                                            <option value='$wa4-".$q3["ws44"]."'>".$q3["ws44"]." - ".$q3["ws4"]."</option>
                                            <option value='$wa5-".$q3["ws55"]."'>".$q3["ws55"]." - ".$q3["ws5"]."</option>
                                            <option value='$wa6-".$q3["ws66"]."'>".$q3["ws66"]." - ".$q3["ws6"]."</option>
                                        </select>
                                    </div><br>";
                                }
                                
                                if($q3["attribute_1"]!="OFF") {
                                    $a1 = "select * from product_attribute_cat where id='".$q3["attribute_1"]."' order by id asc limit 1";
                                    $a11 = $conn->query($a1);
                                    if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                        echo"<div class='attr-detail attr-color mb-15'><strong class='mr-10'>".$a111["name"]."</strong>";
                                            $a1x = "select * from product_attribute where catid='".$a111["id"]."' order by name asc";
                                            $a11x = $conn->query($a1x);
                                            if ($a11x->num_rows > 0) { while($a111x = $a11x->fetch_assoc()) {
                                                if($a111x["status"]=="ON"){
                                                    echo"<label style='padding:5px;background-color:#EEEEEE;color:#000000;border-radius:5px;margin-left:5px;text-align:center'>
                                                        <input type='radio' name='attribute_1' style='width:15px;height:15px;accent-color:#000000' value='".$a111["name"]."-".$a111x["name"]."'>
                                                        &nbsp;<span style='font-size:8pt;color:#000000'>".$a111x["name"]."</span>
                                                    </label>";
                                                }
                                            } }
                                        echo"</div>";
                                    } }
                                }
                                if($q3["attribute_2"]!="OFF") {
                                    $a1 = "select * from product_attribute_cat where id='".$q3["attribute_2"]."' order by id asc limit 1";
                                    $a11 = $conn->query($a1);
                                    if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                        echo"<div class='attr-detail attr-color mb-15'><strong class='mr-10'>".$a111["name"]."</strong>";
                                            $a1x = "select * from product_attribute where catid='".$a111["id"]."' order by name asc";
                                            $a11x = $conn->query($a1x);
                                            if ($a11x->num_rows > 0) { while($a111x = $a11x->fetch_assoc()) {
                                                if($a111x["status"]=="ON"){
                                                    echo"<label style='padding:5px;background-color:#EEEEEE;color:#000000;border-radius:5px;margin-left:5px;text-align:center'>
                                                        <input type='radio' name='attribute_2' style='width:15px;height:15px;accent-color:#000000' value='".$a111["name"]."-".$a111x["name"]."'>
                                                        &nbsp;<span style='font-size:8pt;color:#000000'>".$a111x["name"]."</span>
                                                    </label>";
                                                }
                                            } }
                                        echo"</div>";
                                    } }
                                }
                                if($q3["attribute_3"]!="OFF") {
                                    $a1 = "select * from product_attribute_cat where id='".$q3["attribute_3"]."' order by id asc limit 1";
                                    $a11 = $conn->query($a1);
                                    if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                        echo"<div class='attr-detail attr-color mb-15'><strong class='mr-10'>".$a111["name"]."</strong>";
                                            $a1x = "select * from product_attribute where catid='".$a111["id"]."' order by name asc";
                                            $a11x = $conn->query($a1x);
                                            if ($a11x->num_rows > 0) { while($a111x = $a11x->fetch_assoc()) {
                                                if($a111x["status"]=="ON"){
                                                    echo"<label style='padding:5px;background-color:#EEEEEE;color:#000000;border-radius:5px;margin-left:5px;text-align:center'>
                                                        <input type='radio' name='attribute_3' style='width:15px;height:15px;accent-color:#000000' value='".$a111["name"]."-".$a111x["name"]."'>
                                                        &nbsp;<span style='font-size:8pt;color:#000000'>".$a111x["name"]."</span>
                                                    </label>";
                                                }
                                            } }
                                        echo"</div>";
                                    } }
                                }
                                if($q3["attribute_4"]!="OFF") {
                                    $a1 = "select * from product_attribute_cat where id='".$q3["attribute_4"]."' order by id asc limit 1";
                                    $a11 = $conn->query($a1);
                                    if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                        echo"<div class='attr-detail attr-color mb-15'><strong class='mr-10'>".$a111["name"]."</strong>";
                                            $a1x = "select * from product_attribute where catid='".$a111["id"]."' order by name asc";
                                            $a11x = $conn->query($a1x);
                                            if ($a11x->num_rows > 0) { while($a111x = $a11x->fetch_assoc()) {
                                                if($a111x["status"]=="ON"){
                                                    echo"<label style='padding:5px;background-color:#EEEEEE;color:#000000;border-radius:5px;margin-left:5px;text-align:center'>
                                                        <input type='radio' name='attribute_4' style='width:15px;height:15px;accent-color:#000000' value='".$a111["name"]."-".$a111x["name"]."'>
                                                        &nbsp;<span style='font-size:8pt;color:#000000'>".$a111x["name"]."</span>
                                                    </label>";
                                                }
                                            } }
                                        echo"</div>";
                                    } }
                                }
                                if($q3["attribute_5"]!="OFF") {
                                    $a1 = "select * from product_attribute_cat where id='".$q3["attribute_5"]."' order by id asc limit 1";
                                    $a11 = $conn->query($a1);
                                    if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                        echo"<div class='attr-detail attr-color mb-15'><strong class='mr-10'>".$a111["name"]."</strong>";
                                            $a1x = "select * from product_attribute where catid='".$a111["id"]."' order by name asc";
                                            $a11x = $conn->query($a1x);
                                            if ($a11x->num_rows > 0) { while($a111x = $a11x->fetch_assoc()) {
                                                if($a111x["status"]=="ON"){
                                                    echo"<label style='padding:5px;background-color:#EEEEEE;color:#000000;border-radius:5px;margin-left:5px;text-align:center'>
                                                        <input type='radio' name='attribute_5' style='width:15px;height:15px;accent-color:#000000' value='".$a111["name"]."-".$a111x["name"]."'>
                                                        &nbsp;<span style='font-size:8pt;color:#000000'>".$a111x["name"]."</span>
                                                    </label>";
                                                }
                                            } }
                                        echo"</div>";
                                    } }
                                }
                                if($q3["attribute_6"]!="OFF") {
                                    $a1 = "select * from product_attribute_cat where id='".$q3["attribute_6"]."' order by id asc limit 1";
                                    $a11 = $conn->query($a1);
                                    if ($a11->num_rows > 0) { while($a111 = $a11->fetch_assoc()) {
                                        echo"<div class='attr-detail attr-color mb-15'><strong class='mr-10'>".$a111["name"]."</strong>";
                                            $a1x = "select * from product_attribute where catid='".$a111["id"]."' order by name asc";
                                            $a11x = $conn->query($a1x);
                                            if ($a11x->num_rows > 0) { while($a111x = $a11x->fetch_assoc()) {
                                                if($a111x["status"]=="ON"){
                                                    echo"<label style='padding:5px;background-color:#EEEEEE;color:#000000;border-radius:5px;margin-left:5px;text-align:center'>
                                                        <input type='radio' name='attribute_6' style='width:15px;height:15px;accent-color:#000000' value='".$a111["name"]."-".$a111x["name"]."'>
                                                        &nbsp;<span style='font-size:8pt;color:#000000'>".$a111x["name"]."</span>
                                                    </label>";
                                                }
                                            } }
                                        echo"</div>";
                                    } }
                                }
                                echo"<div class='bt-1 border-color-1 mt-30 mb-30'></div>                                
                                <div class='detail-extralink'>
                                    <div class='detail-qty border radius' style='padding:0px'>
                                        <input type='number' name='qty' min='1' max='".$q3["qty"]."' value='1' style='border:0px solid;'>
                                    </div>
                                    <div class='product-extra-link2'>
                                        <button type='submit' class='button button-add-to-cart' onclick='cartToast()' style='background-color:$buttonbc;color:$buttontc'>Add to Cart</button>
                                        <a aria-label='Add To Favourite' class='action-btn hover-up' href='addtocart.php?favouriteid=".$q3["id"]."' target='addtocart' onclick='favouriteToast()'><i class='fi-rs-heart'></i></a>
                                        <a aria-label='Add To Compare' class='action-btn hover-up' href='addtocart.php?compareid=".$q3["id"]."' target='addtocart' onclick='compareToast()'><i class='fi-rs-shuffle'></i></a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>";
                } }
                echo"</div>
            </div>
        </div>
    </div>
</div>";
?>