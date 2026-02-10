<?php
    echo"<section class='bg-grey-9 section-padding'>
            <div class='container pt-25 pb-25'>
                <div class='tab-header'>
                    <ul class='nav nav-tabs' id='myTab' role='tablist'>
                        <li class='nav-item' role='presentation'>
                            <h3 class='section-title mb-20' style='color:black'><span style='color:$buttonbc'>Daily</span> Deals</h3>
                        </li>
                    </ul>
                    <a class='view-more d-md-flex' href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=1105'); shiftdata('1105', 'datashiftX')\" target='_self'>
                        <span style='color:black'>More Daily Deals<i class='fi-rs-angle-double-small-right'></i></span>
                    </a>
                </div>
                                    
                <div class='row'>
                    <div class='col-lg-3 d-none d-lg-flex'>
                        <div class='banner-img style-2 wow fadeIn animated' style='border-radius:10px'>
                            <img src='assets/imgs/banner/banner-9.jpg' alt='' style='height:100%'>
                            <div class='banner-text'>
                                <div class='deal-top'><h4 class='text-brand'>Deal of the day</h2><h5>Limited quantities.</h5></div>
                                <div class='deal-content'>
                                    <h6 class='product-title'><a href='#'>Save Huge from deals</a></h6>
                                </div><hr>
                                <div class='deal-bottom'>
                                    <p>Hurry Up! Offer End In:</p>                                    
                                    <div style='width:100%;height:44px;color:white;padding-top:2px'><span id='flashsale'></span></div>
                                    <a class='btn hover-up' href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=1105'); shiftdata('1105', 'datashiftX')\" target='_self'>
                                        View All <i class='fi-rs-arrow-right'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class='col-lg-9 col-md-12'>
                        <div class='tab-content wow fadeIn animated' id='myTabContent-1'><center>
                            <div class='tab-pane fade show active' id='tab-one-1' role='tabpanel' aria-labelledby='tab-one-1'>
                                <div class='carausel-4-columns-cover arrow-center position-relative'>
                                    <div class='slider-arrow slider-arrow-2 carausel-4-columns-arrow' id='carausel-4-columns-arrows' style='margin-top:-20px'></div>
                                    <div class='carausel-4-columns carausel-arrow-center' id='carausel-4-columns'>";
                                        $ta=0;
                                        $s1 = "select * from sms_product_bon where cid='1105' and status='2' OR cid2='1105' and status='2' order by id desc limit 4";
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
                                                                    if($imzcount>=5) echo"<img class='default-img' src='media/$defaultimage' alt='".$rs1["pname"]."' loading='lazy' style='height:150px;border-radius:5px'>";
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
                                                        <div class='product-content-wrap' style='padding-left:10px;padding-right:10px;padding-top:10px;text-align:left'>
                                                            <div class='product-category'><span style='color:#000000;font-size:8pt'>Brand: $brandname</span></div>
                                                            <div style='height:35px;text-align:left'>
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
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    </section>";
?>
<script type="text/javascript">
    $( "<?php echo"#demo-success$txz"; ?>" ).click(function() {
        $.notice({
            text: "<span class='blink'><?php echo"$iname"; ?> added to cart.</span>",
            type: "success"
        });
    });
    $( "<?php echo"#demo-info$txz"; ?>" ).click(function() {
        $.notice({
            text: "<?php echo"$iname"; ?> added to Favourite List.",
        type: "success"
    });
    });
</script>
