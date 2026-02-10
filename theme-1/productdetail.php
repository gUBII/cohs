<?php

	if(isset($_GET["cm"])) include("authenticatorx.php");
    
    echo"<div onmouseover=\"document.title='".$_GET["prodname"]."'\">";
    
        $prodid=$_GET["prodid"];
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
            
            echo"<form name='main123456' id='cartform' method='post' action='addtocart.php' target='addtocart' enctype='multipart/form-data'>
                <div class='page-header breadcrumb-wrap'>
                    <div class='container'>
                        <div class='breadcrumb'>                            
                            <a href='index.php' target='_self' style='custor:pointer;color:#34bb78'>Home</a> <span></span>
                            <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=".$q3["cid"]."'); shiftdatax('pd.php?cPath=4&catid=".$q3["cid"]."&cm=1', 'datashiftX')\" target='_self'>$category1</a> <span></span>";
                            if(strlen($category2)>=4) echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=".$q3["cid2"]."'); shiftdatax('pd.php?cPath=4&catid=".$q3["cid2"]."&cm=1', 'datashiftX')\" target='_self'>$category2</a> <span></span> ";
                            echo"<a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&prodname=".$q3["pname"]."&prodid=".$q3["id"]."'); shiftdatax('productdetail.php?cPath=4&prodid=".$q3["id"]."&cm=1&prodname=".$q3["pname"]."', 'datashiftX')\" target='_self'>".$q3["pname"]."</a>
                        </div>
                    </div>
                </div>
                <section class='mt-50 mb-50'>
                    <div class='container' style='background-color:white;padding:20px;border-radius:5px'>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='product-detail accordion-detail'>
                                    <div class='row mb-50'>
                                        
                                        <div class='col-md-4 col-sm-12 col-xs-12'>
                                            <div class='container' style='width:100%;padding:0px'>";
                                                $s5zx = "select * from multi_image where reactor='".$q3["reactor"]."' order by sorder asc limit 1";
                                                $r5zx = $conn->query($s5zx);
                                                if ($r5zx->num_rows > 0) { while($rs5zx = $r5zx->fetch_assoc()) {
                                                    echo"<div class='mySlidex' id='mySliderx'>
                                                        <a aria-label='Quick view' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#GalleryModal111'>
                                                            <img src='media/".$rs5zx["image"]."' style='width:100%'>
                                                        </a>
                                                        <div class='modal fade custom-modal' id='GalleryModal111' tabindex='-1' aria-labelledby='GalleryModalLabel' aria-hidden='true'>
                                                            <div class='modal-dialog'><div class='modal-content'>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                <div class='modal-body'><img id='myImz' src='media/".$rs5zx["image"]."' style='width:100%'></div>
                                                            </div></div>
                                                        </div>
                                                    </div>";
                                                    $defaultimage=$rs5zx["image"];
                                                } }

                                                $tx=0;
                                                $s5z = "select * from multi_image where reactor='".$q3["reactor"]."' order by sorder asc";
                                                $r5z = $conn->query($s5z);
                                                if ($r5z->num_rows > 0) { while($rs5z = $r5z->fetch_assoc()) {
                                                    $tx=($tx+1);
                                                    echo"<div class='mySlides'>
                                                        <a aria-label='Quick view' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#GalleryModal$tx'>
                                                            <img src='media/".$rs5z["image"]."' style='width:100%'>
                                                        </a>
                                                        <div class='modal fade custom-modal' id='GalleryModal$tx' tabindex='-1' aria-labelledby='GalleryModalLabel' aria-hidden='true'>
                                                            <div class='modal-dialog'><div class='modal-content'>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                <div class='modal-body'><img id='myImz' src='media/".$rs5z["image"]."' style='width:100%'></div>
                                                            </div></div>
                                                        </div>
                                                    </div>";
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
                                        </div>

                                        <div class='col-md-5 col-sm-12 col-xs-12'>
                                            <div class='detail-info'>
                                                <h2 class='title-detail' style='color:$bodytc'>".$q3["pname"]."</h2>
                                                <div class='product-detail-rating'>
                                                    <div class='pro-details-brand'><span> Brands: <a href=''>$brandname</a></span></div>
                                                    <div class='product-rate-cover text-end'><span> SKU: <a href=''>".$q3["sku"]."</a></span></div>
                                                </div>
                                                <div class='clearfix product-price-cover'><div class='product-price primary-color float-left'>";
                                                    if($q3["offer"]>=1) echo"On Offer<br>";
                                                    echo"<ins><span class='text-brand'>$csymbol <span id='pricerange'>$rprz-".$q3["ws11"]."</span></span></ins>
                                                    <ins><span class='old-price font-md ml-15'>$csymbol ".$q3["price"]."</span></ins>
                                                    <span class='save-price  font-md color3 ml-15'>".$q3["discount"]."% Off</span>
                                                </div></div>
                                                <div class='bt-1 border-color-1 mt-15 mb-15'></div>";
                                                
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
                                                
                                                echo"<input type=hidden name='price' value='$rprz-".$q3["ws11"]."'>
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
                                                    <div class='detail-qty border radius' style='padding:0px'><input type='number' name='qty' min='1' max='".$q3["qty"]."' value='1' style='border:0px solid;'></div>
                                                    <div class='product-extra-link2'>
                                                        <button type='submit' class='button button-add-to-cart' onclick='cartToast()' style='background-color:$buttonbc;color:$buttontc'>Add to Cart</button>
                                                        <a aria-label='Add To Favourite' class='action-btn hover-up' href='addtocart.php?favouriteid=".$q3["id"]."' target='addtocart' onclick='favouriteToast()'><i class='fi-rs-heart'></i></a>
                                                        <a aria-label='Add To Compare' class='action-btn hover-up' href='addtocart.php?compareid=".$q3["id"]."' target='addtocart' onclick='compareToast()'><i class='fi-rs-shuffle'></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class='col-lg-3 primary-sidebar sticky-sidebar' style='background-color:#eeeeee;padding:5px'>
                                            <div>
                                                <ul class='product-meta font-xs color-grey mt-20'>
                                                    <h4>Terms:</h4><hr>
                                                    <table style='width:100%'>
                                                        <tr><td style='width:50px;padding:0px' align=center><i class='fa fa-globe' style='font-size:20pt;color:grey'></i></td><td> ".$q3["shipping_policy"]."</td></tr>
                                                        <tr><td style='width:50px;padding:0px' align=center><i class='fa fa-truck' style='font-size:20pt;color:grey'></i></td><td> ".$q3["returnpolicy"]."</td></tr>
                                                        <tr><td style='width:50px;padding:0px' align=center><i class='fa fa-shopping-bag' style='font-size:20pt;color:grey'></i></td><td> ".$q3["vendor_terms"]."</td></tr>
                                                        <tr><td style='width:50px;padding:0px' align=center><i class='fa fa-money' style='font-size:20pt;color:grey'></i></td><td> ".$q3["payment_terms"]."</td></tr>
                                                    </table>";
                                                    if(strlen($q3["tag"])>=5){
                                                        echo"<li class='mb-5'><h4>Product Tags:</h4><hr>";
                                                            $tagstring = $q3["tag"];
                                                            foreach(explode(',', $tagstring) as $li) {
                                                                echo "<a href='#' rel='tag'>$li</a>, ";
                                                            }                                
                                                        echo"</li>";
                                                    }
                                                echo"</ul>
                                            </div>
                                        </div>

                                        <div class='col-md-12 col-sm-12 col-xs-12'><br>
                                            <div class='tab-style3'>
                                                <ul class='nav nav-tabs text-uppercase'>
                                                    <li class='nav-item'>
                                                        <a class='nav-link active' id='Description-tab' data-bs-toggle='tab' href='#Description'>Description</a>
                                                    </li>
                                                    <li class='nav-item'>
                                                        <a class='nav-link' id='Reviews-tab' data-bs-toggle='tab' href='#Reviews'>Reviews (3)</a>
                                                    </li>
                                                    <li class='nav-item'>
                                                        <a class='nav-link' id='Additional-info-tab' data-bs-toggle='tab' href='#Additional-info'>Vendor</a>
                                                    </li>
                                                    
                                                </ul>
                                                <div class='tab-content shop_info_tab entry-main-content'>
                                                <div class='tab-pane fade show active' id='Description'>
                                                    <div class=''>
                                                        <h3 class='section-title style-1 mb-30'>Detail & Spec.</h3>
                                                        <div class='description mb-50'><p>".$q3["introduction"]."</p></div><br>                                                        
                                                        <div class='description mb-50'><p>".$q3["detail"]."</p></div>
                                                    </div>
                                                </div>
                                                
                                                <div class='tab-pane fade' id='Reviews'>
                                                    <!--Comments-->
                                                    <div class='comments-area'>
                                                        <div class='row'>
                                                            <div class='col-lg-8'>
                                                                <h4 class='mb-30'>Customer questions & answers</h4>
                                                                <div class='comment-list'>
                                                                    <div class='single-comment justify-content-between d-flex'>
                                                                        <div class='user justify-content-between d-flex'>
                                                                            <div class='thumb text-center'>
                                                                                <img src='assets/imgs/page/avatar-6.jpg' alt=''>
                                                                                <h6><a href='#'>Jacky Chan</a></h6>
                                                                                <p class='font-xxs'>Since 2012</p>
                                                                            </div>
                                                                            <div class='desc'>
                                                                                <div class='product-rate d-inline-block'>
                                                                                    <div class='product-rating' style='width:90%'>
                                                                                    </div>
                                                                                </div>
                                                                                <p>Thank you very fast shipping from Poland only 3days.</p>
                                                                                <div class='d-flex justify-content-between'>
                                                                                    <div class='d-flex align-items-center'>
                                                                                        <p class='font-xs mr-30'>December 4, 2020 at 3:12 pm </p>
                                                                                        <a href='#' class='text-brand btn-reply'>Reply <i class='fi-rs-arrow-right'></i> </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--single-comment -->
                                                                    <div class='single-comment justify-content-between d-flex'>
                                                                        <div class='user justify-content-between d-flex'>
                                                                            <div class='thumb text-center'>
                                                                                <img src='assets/imgs/page/avatar-7.jpg' alt=''>
                                                                                <h6><a href='#'>Ana Rosie</a></h6>
                                                                                <p class='font-xxs'>Since 2008</p>
                                                                            </div>
                                                                            <div class='desc'>
                                                                                <div class='product-rate d-inline-block'>
                                                                                    <div class='product-rating' style='width:90%'>
                                                                                    </div>
                                                                                </div>
                                                                                <p>Great low price and works well.</p>
                                                                                <div class='d-flex justify-content-between'>
                                                                                    <div class='d-flex align-items-center'>
                                                                                        <p class='font-xs mr-30'>December 4, 2020 at 3:12 pm </p>
                                                                                        <a href='#' class='text-brand btn-reply'>Reply <i class='fi-rs-arrow-right'></i> </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--single-comment -->
                                                                    <div class='single-comment justify-content-between d-flex'>
                                                                        <div class='user justify-content-between d-flex'>
                                                                            <div class='thumb text-center'>
                                                                                <img src='assets/imgs/page/avatar-8.jpg' alt=''>
                                                                                <h6><a href='#'>Steven Keny</a></h6>
                                                                                <p class='font-xxs'>Since 2010</p>
                                                                            </div>
                                                                            <div class='desc'>
                                                                                <div class='product-rate d-inline-block'>
                                                                                    <div class='product-rating' style='width:90%'>
                                                                                    </div>
                                                                                </div>
                                                                                <p>Authentic and Beautiful, Love these way more than ever expected They are Great earphones</p>
                                                                                <div class='d-flex justify-content-between'>
                                                                                    <div class='d-flex align-items-center'>
                                                                                        <p class='font-xs mr-30'>December 4, 2020 at 3:12 pm </p>
                                                                                        <a href='#' class='text-brand btn-reply'>Reply <i class='fi-rs-arrow-right'></i> </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--single-comment -->
                                                                </div>
                                                            </div>
                                                            <div class='col-lg-4'>
                                                                <h4 class='mb-30'>Customer reviews</h4>
                                                                <div class='d-flex mb-30'>
                                                                    <div class='product-rate d-inline-block mr-15'>
                                                                        <div class='product-rating' style='width:90%'>
                                                                        </div>
                                                                    </div>
                                                                    <h6>4.8 out of 5</h6>
                                                                </div>
                                                                <div class='progress'>
                                                                    <span>5 star</span>
                                                                    <div class='progress-bar' role='progressbar' style='width: 50%;' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100'>50%</div>
                                                                </div>
                                                                <div class='progress'>
                                                                    <span>4 star</span>
                                                                    <div class='progress-bar' role='progressbar' style='width: 25%;' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>25%</div>
                                                                </div>
                                                                <div class='progress'>
                                                                    <span>3 star</span>
                                                                    <div class='progress-bar' role='progressbar' style='width: 45%;' aria-valuenow='45' aria-valuemin='0' aria-valuemax='100'>45%</div>
                                                                </div>
                                                                <div class='progress'>
                                                                    <span>2 star</span>
                                                                    <div class='progress-bar' role='progressbar' style='width: 65%;' aria-valuenow='65' aria-valuemin='0' aria-valuemax='100'>65%</div>
                                                                </div>
                                                                <div class='progress mb-30'>
                                                                    <span>1 star</span>
                                                                    <div class='progress-bar' role='progressbar' style='width: 85%;' aria-valuenow='85' aria-valuemin='0' aria-valuemax='100'>85%</div>
                                                                </div>
                                                                <a href='#' class='font-xs text-muted'>How are ratings calculated?</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--comment form-->
                                                    <div class='comment-form'>
                                                        <h4 class='mb-15'>Add a review</h4>
                                                        <div class='product-rate d-inline-block mb-30'>
                                                        </div>
                                                        <div class='row'>
                                                            <div class='col-lg-8 col-md-12'>
                                                                <form class='form-contact comment_form' action='#' id='commentForm'>
                                                                    <div class='row'>
                                                                        <div class='col-12'>
                                                                            <div class='form-group'>
                                                                                <textarea class='form-control w-100' name='comment' id='comment' cols='30' rows='9' placeholder='Write Comment'></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <div class='form-group'>
                                                                                <input class='form-control' name='name' id='name' type='text' placeholder='Name'>
                                                                            </div>
                                                                        </div>
                                                                        <div class='col-sm-6'>
                                                                            <div class='form-group'>
                                                                                <input class='form-control' name='email' id='email' type='email' placeholder='Email'>
                                                                            </div>
                                                                        </div>
                                                                        <div class='col-12'>
                                                                            <div class='form-group'>
                                                                                <input class='form-control' name='website' id='website' type='text' placeholder='Website'>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class='form-group'>
                                                                        <button type='submit' class='button button-contactForm'>Submit
                                                                            Review</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='tab-pane fade' id='Additional-info'>

                                                </div>
                                            </div>
                                            <div class='social-icons single-share'>
                                                <ul class='text-grey-5 d-inline-block'>
                                                    <li><strong class='mr-10'>Share this:</strong></li>
                                                    <li class='social-facebook'><a href='#'><img src='assets/imgs/theme/icons/icon-facebook.svg' alt=''></a></li>
                                                    <li class='social-twitter'> <a href='#'><img src='assets/imgs/theme/icons/icon-twitter.svg' alt=''></a></li>
                                                    <li class='social-instagram'><a href='#'><img src='assets/imgs/theme/icons/icon-instagram.svg' alt=''></a></li>
                                                    <li class='social-linkedin'><a href='#'><img src='assets/imgs/theme/icons/icon-pinterest.svg' alt=''></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                            

                                        
                                        <div class='row mt-60'><br>
                                            <div class='col-12'>
                                                <h3 class='section-title style-1 mb-30'>Related products</h3>
                                            </div>
                                            <div class='col-12'>
                                                <div class='row related-products'>";
                                                    $ta=0;
                                                    $s1 = "select * from sms_product_bon where cid='".$q3["cid"]."' and status='2' order by id desc limit 8";
                                                    $r1 = $conn->query($s1);
                                                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                                        $ttu=0;                                
                                                        $s5 = "select * from sms_user2 where id='".$rs1["vid"]."' and status='ON' order by id asc limit 1";
                                                        $r5 = $conn->query($s5);
                                                        if ($r5->num_rows > 0) { while($rs5 = $r5->fetch_assoc()) { $ttu=1; } }
                                                                    
                                                        $brandname="Custom Made";
                                                        $s5x = "select * from brand where id='".$rs1["bid"]."' order by id asc limit 1";
                                                        $r5x = $conn->query($s5x);
                                                        if ($r5x->num_rows > 0) { while($rs5x = $r5x->fetch_assoc()) { $brandname=$rs5x["title"]; } }
                                                                        
                                                        $category1="";
                                                        $s5y = "select * from sms_link where id='".$rs1["cid"]."' order by id asc limit 1";
                                                        $r5y = $conn->query($s5y);
                                                        if ($r5y->num_rows > 0) { while($rs5y = $r5y->fetch_assoc()) { $category1=$rs5y["pam"]; } }
                                                        
                                                        $category2="";
                                                        $s5y = "select * from sms_link where id='".$rs1["cid2"]."' order by id asc limit 1";
                                                        $r5y = $conn->query($s5y);
                                                        if ($r5y->num_rows > 0) { while($rs5y = $r5y->fetch_assoc()) { $category2=$rs5y["pam"]; } }

                                                        $imzcount=0;
                                                        $defaultimage=0;
                                                        $s5z = "select * from multi_image where reactor='".$rs1["reactor"]."' order by sorder asc limit 1";
                                                        $r5z = $conn->query($s5z);
                                                        if ($r5z->num_rows > 0) { while($rs5z = $r5z->fetch_assoc()) { $defaultimage=$rs5z["image"]; } }                                
                                                        $imzcount=strlen($defaultimage);

                                                        $rprz=0;
                                                        $offer_sd=0;
                                                        if(strlen($rs1["offer_sd"])>=1000) $offer_sd=$rs1["offer_sd"];
                                                        $offer_ed=0;
                                                        if(strlen($rs1["offer_ed"])>=1000) $offer_ed=$rs1["offer_ed"];
                                                        
                                                        $iname="";
                                                        $ncount=strlen($rs1["pname"]);
                                                        $iname = substr($rs1["pname"], 0, 30);
                                                        if($ncount>=31) $iname="$iname...";

                                                        $sku="";
                                                        $scount=strlen($rs1["sku"]);
                                                        $sku = substr($rs1["sku"], 0, 20);
                                                        if($scount>=21) $sku="$sku...";

                                                        $txz= rand(11111111,99999999);
                                                        $rprz1=round($rprz);                                    
                                                        $ta=($ta+1);
                                                        
                                                        echo"<div class='col-lg-3 col-md-4 col-6'>
                                                            <div class='product-cart-wrap mb-30' style='border-radius:5px'>
                                                                <form method='post' action='addtocart.php' target='addtocart' enctype='multipart/form-data' name='sms$txz'>
                                                                    <div class='product-img-action-wrap' style='border-radius:5px;padding:5px;background-color:#FFFFFF;color:#000000'>
                                                                        <div class='product-img product-img-zoom' style='border-radius:5px'><center>
                                                                            <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&prodname=".$rs1["pname"]."&prodid=".$rs1["id"]."'); shiftdatax('productdetail.php?cPath=4&prodid=".$rs1["id"]."&cm=1&prodname=".$rs1["pname"]."', 'datashiftX')\" target='_self'>";
                                                                                if($imzcount>=5) echo"<img class='default-img' src='media/$defaultimage' alt='".$rs1["pname"]."' loading='lazy' style='height:200px;border-radius:5px'>";
                                                                                else echo"<img class='default-img' src='assets/noproduct.png' alt='".$rs1["pname"]."' loading='lazy' style='height:150px;border-radius:5px'>";
                                                                            echo"</a>
                                                                        </center></div>
                                                                        <div class='product-action-1' style='width:150px;text-align:center;margin-top:30px'>
                                                                            <a aria-label='Quick view' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#quickViewModal' onmouseover=\"shiftdatax('quickview.php?prodid=".$rs1["id"]."&cm=1', 'datashiftW')\"><i class='fi-rs-eye'></i></a>
                                                                            <a aria-label='Add To Favourite' class='action-btn hover-up' href='addtocart.php?favouriteid=".$rs1["id"]."' target='addtocart' onclick='favouriteToast()'><i class='fi-rs-heart'></i></a>
                                                                            <a aria-label='Add To Compare' class='action-btn hover-up' href='addtocart.php?compareid=".$rs1["id"]."' target='addtocart' onclick='compareToast()'><i class='fi-rs-shuffle'></i></a>
                                                                        </div>";
                                                                        
                                                                        if($rs1["offer"]<=0){
                                                                            if($rs1["discount_type"]=="PERCENTAGE"){
                                                                                $rprz=(($rs1["price"]*$rs1["discount"])/100);
                                                                                $rprz=($rs1["price"]-$rprz);
                                                                            }else $rprz=($rs1["price"]-$rs1["discount"]);
                                                                            
                                                                        }else{
                                                                            if($ctime>=$offer_sd && $ctime<=$offer_ed){
                                                                                $rprz=$rs1["offer"];
                                                                            }else{
                                                                                if($rs1["discount_type"]=="PERCENTAGE"){
                                                                                    $rprz=(($rs1["price"]*$rs1["discount"])/100);
                                                                                    $rprz=($rs1["price"]-$rprz);
                                                                                }else $rprz=($rs1["price"]-$rs1["discount"]);                                                        
                                                                            }
                                                                        }
                                                                        
                                                                        if($rs1["offer"]<=0){
                                                                            if($rs1["discount"]>=1) echo"<div class='product-badges product-badges-position product-badges-mrg' style='margin-top:-10px;margin-left:-10px'><span class='hot'>-".$rs1["discount"]."%</span></div>";
                                                                            else echo"<div class='product-badges product-badges-position product-badges-mrg'><span class='hot'>Deal</span></div>";
                                                                        }else{
                                                                            echo"<div class='product-badges product-badges-position product-badges-mrg'><span class='hot'>On Offer</span></div>";
                                                                        }
                                                                        
                                                                    echo"</div>
                                                                    <div class='product-content-wrap' style='padding-left:10px;padding-right:10px;padding-top:10px'>
                                                                        <div class='product-category'><span style='color:#000000;font-size:8pt'>Brand: $brandname</span></div>
                                                                        <div style='height:35px;'>
                                                                            <h2><a aria-label='View Detail' href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&prodname=".$rs1["pname"]."&prodid=".$rs1["id"]."'); shiftdatax('productdetail.php?cPath=4&prodname=".$rs1["pname"]."&prodid=".$rs1["id"]."&cm=1', 'datashiftX')\" target='_self'  title='".$rs1["pname"]."'><span  style='color:#000000'>$iname</span></a></h2>
                                                                        </div>
                                                                            
                                                                        <div class='rating-result' title='90%'><span><span>90%</span></span></div>
                                                                            
                                                                        <div class='product-price'>
                                                                            <span style='font-size:8pt;color:#000000'>SKU: $sku</span><br>
                                                                            <span style='font-size:10pt;color:#000000'>$csymbol $rprz.00 </span>
                                                                            <span class='old-price' style='font-size:8pt;color:$buttonbc'>$csymbol ".$rs1["price"]."</span>
                                                                        </div>
                                                                        
                                                                        <div class='product-action-1 show' style='margin-top:15px;margin-right:-5px'>
                                                                            <a aria-label='Add To Cart' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#quickViewModal' onmouseover=\"shiftdatax('quickview.php?prodid=".$rs1["id"]."&cm=1', 'datashiftW')\">    
                                                                            <i class='fi-rs-shopping-bag-add'></i></a>
                                                                        </div>
                                                                        
                                                                        <input type=hidden name='catid1' value='".$rs1["cid"]."'><input type=hidden name='catid2' value='".$rs1["cid2"]."'>
                                                                        <input type='hidden' name='cqty' value='1'><input type='hidden' name='cpid' value='".$rs1["id"]."'>
                                                                        <input type='hidden' name='cprice' value='$rprz'><input type='hidden' name='cname' value='".$rs1["pname"]."'>
                                                                        <input type='hidden' name='cimage' value='$defaultimage'><input type='hidden' name='cPath' value='$cPath'>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>";
                                                    } }
                                                echo"</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            ";
        } }
    echo"</div>";
?>
