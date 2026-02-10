<?php
	$ctime=time();
    if(isset($_GET["cm"])) include("authenticatorx.php");
    
    if(!isset($_COOKIE["rowset"])) $rowsetz=8;
    else $rowsetz=$_COOKIE["rowset"];

    if(!isset($_COOKIE["sortset1"])) $sortset1="id";
    else $sortset1=$_COOKIE["sortset1"];
    
    $catid=$_GET["catid"];
    $catname="";
    $c1 = "select * from sms_link where id='$catid' order by id desc limit 1";
    $c11 = $conn->query($c1);
    if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $catname=$c111["pam"]; } }
    
    if(strlen($catid)>=1){
        echo"<div class='page-header breadcrumb-wrap'>
            <div class='container'><div class='breadcrumb'><a href='index.php' rel='nofollow'>Home</a><span></span>
                <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=$catid'); shiftdatax('pd.php?cPath=4&catid=$catid&cm=1', 'datashiftX')\" target='_self'>$catname</a>
            </div></div>
        </div>
        <section class='mt-50 mb-50'>
            <div class='container'>
                <div class='row'>
                    
                    <div class='col-lg-12'>
                        <div class='shop-product-fillter'>";
                            
                            $trec=0;
                            $tr1 = "select * from sms_product_bon where cid='$catid' and status='2' OR cid2='$catid' and status='2' order by id asc";
                            $tr11 = $conn->query($tr1);
                            if ($tr11->num_rows > 0) { while($tr111 = $tr11->fetch_assoc()) { $trec=($trec+1); } }
                            
                            echo"<div class='totall-product'><p style='color:$bodytc'> We found <strong class='text-brand' style='color:$buttonbc'>$trec</strong> items for you!</p></div>
                            <div class='sort-by-product-area'>
                                <div class='sort-by-cover mr-10'>
                                    <form method='post' action='addtocookie.php' target='addtocart' enctype='multipart/form-data' name='rowcounter'>
                                        <div class='sort-by-product-wrap'>
                                            <div class='sort-by'><span><i class='fi-rs-apps'></i>Show:</span></div>
                                            <select name='rowset1' onchange=\"this.form.submit(); ChangeUrl('index.php?cPath=4&catid=$catid'); shiftdatax('pd.php?cPath=4&catid=$catid&cm=1', 'datashiftX')\">";
                                                if(isset($_COOKIE["sortset1"])){
                                                    echo"<option value='".$_COOKIE["rowset"]."'>".$_COOKIE["rowset"]."</option>";
                                                }
                                                echo"<option value='8'>8</option>
                                                <option value='16'>16</option>    
                                                <option value='32'>32</option>
                                                <option value='64'>64</option>
                                                <option value='128'>128</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class='sort-by-cover'>
                                    <form method='post' action='addtocookie.php' target='addtocart' enctype='multipart/form-data' name='sortingset'>
                                        <div class='sort-by-product-wrap'>
                                            <div class='sort-by' style='width:70px'><span><i class='fi-rs-apps-sort'></i>Sort by:</span></div>
                                            <select name='sortset' onchange=\"this.form.submit(); ChangeUrl('index.php?cPath=4&catid=$catid'); shiftdatax('pd.php?cPath=4&catid=$catid&cm=1', 'datashiftX')\" style='width:80px'>";
                                                if(isset($_COOKIE["sortset1"])){
                                                    if($_COOKIE["sortset2"]=="H") echo"<option value='".$_COOKIE["rowset1"]."".$_COOKIE["rowset2"]."'>".$_COOKIE["sortset1"]." High-Low</option>";
                                                    if($_COOKIE["sortset2"]=="A") echo"<option value='".$_COOKIE["rowset1"]."".$_COOKIE["rowset2"]."'>".$_COOKIE["sortset1"]." A-Z</option>";
                                                    if($_COOKIE["sortset2"]=="Z") echo"<option value='".$_COOKIE["rowset1"]."".$_COOKIE["rowset2"]."'>".$_COOKIE["sortset1"]." Z-A</option>";
                                                    if($_COOKIE["sortset2"]=="L") echo"<option value='".$_COOKIE["rowset1"]."".$_COOKIE["rowset2"]."'>".$_COOKIE["sortset1"]." Low-High</option>";
                                                }
                                                echo"<option value='idZ'>Latest A-Z</option>
                                                <option value='idZ'>Latest Z-A</option>
                                                <option value='pnameA'>Name A-Z</option>
                                                <option value='pnameZ'>Name Z-A</option>
                                                <option value='priceH'>Price High-Low</option>
                                                <option value='priceL'>Price Low-High</option>
                                                <option value='reviewH'>Review High-Low</option>
                                                <option value='discountH'>Discount High-Low</option>
                                                <option value='offerL'>Offer Low-High</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class='row product-grid-3'>";
                            
                            $setterm="asc"; 
                            if($_COOKIE["sortset2"]=="H") $setterm="desc"; else $setterm="desc";
                            if($_COOKIE["sortset2"]=="A") $setterm="asc"; else $setterm="desc";
                            if($_COOKIE["sortset2"]=="L") $setterm="asc"; else $setterm="desc";
                            if($_COOKIE["sortset2"]=="Z") $setterm="desc"; else $setterm="desc";
                            $ta=0;
                            $s1 = "select * from sms_product_bon where cid='$catid' and status='2' OR cid2='$catid' and status='2' order by $sortset1 $setterm limit $rowsetz";
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
                                                        else echo"<img class='default-img' src='assets/noproduct.png' alt='".$rs1["pname"]."' loading='lazy' style='height:200px;border-radius:5px'>";
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
                                                    <span style='font-size:8pt;color:#000000'>SKU: ".$rs1["sku"]."</span><br>
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
                        
                        <div class='row' id='dynamic_data'></div>
                        <center><button type='button' class='btn btn-success' onclick='display_data()'>Load more</button></center>
                        <input type='hidden' id='rowcount' name='rowcount' value='$rowsetz'><input type='hidden' id='catid' name='catid' value='$catid'>";
                        // echo"<div class='loader-div'><img class='loader-img' src='assets/ajax-loader.gif' style='height: 120px;width: auto;' /></div>";
                    echo"</div>
                </div>
            </div>
        </section>";
    }
?>
<script type="text/javascript">
    document.title = "<?= $catname ?>";
</script>
