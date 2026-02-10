<?php
    
    include("authenticator_loadmore.php");
    
    if(!isset($_COOKIE["rowset"])) $rowsetz=8;
    else $rowsetz=$_COOKIE["rowset"];

    if(!isset($_COOKIE["sortset1"])) $sortset1="id";
    else $sortset1=$_COOKIE["sortset1"];
    
    $last_rowcount = $_POST["rowcount"];
    $catid = $_POST["catid"];
    $rowcount = $_POST["rowcount"] + $rowsetz;
    
    
    $setterm="asc"; 
    if($_COOKIE["sortset2"]=="H") $setterm="desc"; else $setterm="desc";
    if($_COOKIE["sortset2"]=="A") $setterm="asc"; else $setterm="desc";
    if($_COOKIE["sortset2"]=="L") $setterm="asc"; else $setterm="desc";
    if($_COOKIE["sortset2"]=="Z") $setterm="desc"; else $setterm="desc";
    
    if($catid=="ALL") $display_query = "select * from sms_product_bon where status='2' order by $sortset1 $setterm limit $rowsetz";
    else $display_query = "select * from sms_product_bon where cid='$catid' and status='2' OR cid2='$catid' and status='2' order by $sortset1 $setterm limit $rowsetz";
    $results = mysqli_query($conn, $display_query);
    $count = mysqli_num_rows($results);
    if ($count > 0) {
        $dynamic_data = "";
        while ($rs1 = mysqli_fetch_array($results, MYSQLI_ASSOC)) {

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
            // $ta=($ta+1);
            
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
            
            if($imzcount>=5) $pimage="media/$defaultimage";
            else $pimage="assets/noproduct.png";
            
            if($rs1["offer"]<=0){
                if($rs1["discount"]>=1) $pbadge="-".$rs1["discount"]."%";
                else $pbadge="Deal";
            }else{
                $pbadge="On Offer";
            }

            $dynamic_data .=
                "<div class='col-lg-3 col-md-4 col-6'>
                    <div class='product-cart-wrap mb-30' style='border-radius:5px'>
                        <form method='post' action='addtocart.php' target='addtocart' enctype='multipart/form-data' name='sms$txz'>
                            <div class='product-img-action-wrap' style='border-radius:5px;padding:5px;background-color:#FFFFFF;color:#000000'>
                                <div class='product-img product-img-zoom' style='border-radius:5px'><center>
                                    <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&prodname=".$rs1["pname"]."&prodid=".$rs1["id"]."'); shiftdatax('productdetail.php?cPath=4&prodid=".$rs1["id"]."&cm=1&prodname=".$rs1["pname"]."', 'datashiftX')\" target='_self'>
                                        <img class='default-img' src='$pimage' alt='".$rs1["pname"]."' loading='lazy' style='height:200px;border-radius:5px'>
                                    </a>
                                </center></div>
                                <div class='product-action-1' style='width:150px;text-align:center;margin-top:30px'>
                                    <a aria-label='Quick view' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#quickViewModal' onmouseover=\"shiftdatax('quickview.php?prodid=".$rs1["id"]."&cm=1', 'datashiftW')\"><i class='fi-rs-eye'></i></a>
                                    <a aria-label='Add To Favourite' class='action-btn hover-up' href='addtocart.php?favouriteid=".$rs1["id"]."' target='addtocart' onclick='favouriteToast()'><i class='fi-rs-heart'></i></a>
                                    <a aria-label='Add To Compare' class='action-btn hover-up' href='addtocart.php?compareid=".$rs1["id"]."' target='addtocart' onclick='compareToast()'><i class='fi-rs-shuffle'></i></a>
                                </div>
                                <div class='product-badges product-badges-position product-badges-mrg' style='margin-top:-10px;margin-left:-10px'><span class='hot'>$pbadge</span></div>
                            </div>
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
                                <input type='hidden' name='cimage' value='$defaultimage'>
                            </div>
                        </form>
                    </div>
                </div>";
        }
        $data = [
            "status" => true,
            "rowcount" => $rowcount,
            "catid" => $catid,
            "msg" => "Successfully!",
            "data" => $dynamic_data,
        ];
    } else {
        /*
        $data = [
            "status" => false,
            "msg" => "No More Item Found in this Category.",
        ];
        */
    }

    echo json_encode($data);
    
?>