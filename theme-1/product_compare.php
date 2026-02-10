<?php
    $ctime=time();
    if(isset($_GET["cm"])) include("authenticatorx.php");    
    
    if(isset($_COOKIE["track"])) $userid=$_COOKIE["track"]; else $userid=$_COOKIE["guestid"];
    
    $comp=0;
    $c1 = "select * from sms_compare where cid='$userid' order by id desc";
    $c11 = $conn->query($c1);
    if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $comp=($comp+1); } }

    echo"<main class='main'>
        <div class='page-header breadcrumb-wrap'>
            <div class='container'>
                <div class='breadcrumb'>
                    <a href='index.php' rel='nofollow'>Home</a>
                    <span></span> <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=ALL'); shiftdatax('pd.php?cPath=4&catid=ALL&cm=1#top', 'datashiftX')\" target='_self' title='Shop'>Shop</a>
                    <span></span> <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=1'); shiftdatax('product_compare.php?cm=1', 'datashiftX')\" target='_self' title='Shop'>Compare</a>
                </div>
            </div>
        </div>
        <section class='mt-50 mb-50'>
            <div class='container'>
                <div class='row'>
                    <div class='col-12'>
                        <div class='table-responsive'>
                            <table class='table text-center'>
                                <tbody>
                                    <tr class='pr_image'><td class='text-muted font-md fw-600'>Preview</td>";
                                    $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                    $c011 = $conn->query($c01);
                                    if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {
                                        $c01x = "select * from sms_product_bon where id='".$c0111["pid"]."' order by id desc limit 1";
                                        $c011x = $conn->query($c01x);
                                        if ($c011x->num_rows > 0) { while($c0111x = $c011x->fetch_assoc()) {
                                            $c01y = "select * from multi_image where pid='".$c0111x["id"]."' and reactor='".$c0111x["reactor"]."' order by sorder asc limit 1";
                                            $c011y = $conn->query($c01y);
                                            if ($c011y->num_rows > 0) { while($c0111y = $c011y->fetch_assoc()) {
                                                echo"<td class='row_img' style='background-color:black;padding:10px'><img src='media/".$c0111y["image"]."' alt='".$c0111x["pname"]."' style='width:100px;border-radius:5px'></td>";
                                            }}
                                        }}
                                    }}
                                    echo"</tr>
                                    <tr class='pr_title'><td class='text-muted font-md fw-600'>Name</td>";
                                        $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                        $c011 = $conn->query($c01);
                                        if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {
                                            $c01x = "select * from sms_product_bon where id='".$c0111["pid"]."' order by id desc limit 1";
                                            $c011x = $conn->query($c01x);
                                            if ($c011x->num_rows > 0) { while($c0111x = $c011x->fetch_assoc()) {
                                                echo"<td class='product_name'><h5><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&prodname=".$c0111x["pname"]."&prodid=".$c0111x["id"]."'); shiftdatax('productdetail.php?cPath=4&prodid=".$c0111x["id"]."&cm=1&prodname=".$c0111x["pname"]."', 'datashiftX')\" target='_self'>".$c0111x["pname"]."</a></h5></td>";
                                            }}
                                        }}
                                    echo"</tr>
                                    <tr class='pr_price'><td class='text-muted font-md fw-600'>Price</td>";
                                        $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                        $c011 = $conn->query($c01);
                                        if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {
                                            $c01x = "select * from sms_product_bon where id='".$c0111["pid"]."' order by id desc limit 1";
                                            $c011x = $conn->query($c01x);
                                            if ($c011x->num_rows > 0) { while($c0111x = $c011x->fetch_assoc()) {
                                                $rprz=0;
                                                $offer_sd=0;
                                                if(strlen($c0111x["offer_sd"])>=1000) $offer_sd=$c0111x["offer_sd"];
                                                $offer_ed=0;
                                                if(strlen($c0111x["offer_ed"])>=1000) $offer_ed=$c0111x["offer_ed"];
                                                $rprz1=round($rprz);  
                                                if($c0111x["offer"]<=0){
                                                    if($c0111x["discount_type"]=="PERCENTAGE"){
                                                        $rprz=(($c0111x["price"]*$c0111x["discount"])/100);
                                                        $rprz=($c0111x["price"]-$rprz);
                                                    }else $rprz=($c0111x["price"]-$c0111x["discount"]);
                                                    
                                                }else{
                                                    if($ctime>=$offer_sd && $ctime<=$offer_ed){
                                                        $rprz=$c0111x["offer"];
                                                    }else{
                                                        if($c0111x["discount_type"]=="PERCENTAGE"){
                                                            $rprz=(($c0111x["price"]*$c0111x["discount"])/100);
                                                            $rprz=($c0111x["price"]-$rprz);
                                                        }else $rprz=($c0111x["price"]-$c0111x["discount"]);                                                        
                                                    }
                                                }                                                
                                                echo"<td class='product_price'>$csymbol $rprz.00</td>";
                                            }}
                                        }}
                                    echo"</tr>
                                    <tr class='pr_rating'><td class='text-muted font-md fw-600'>Rating</td>";
                                        $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                        $c011 = $conn->query($c01);
                                        if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {
                                            $c01x = "select * from sms_product_bon where id='".$c0111["pid"]."' order by id desc limit 1";
                                            $c011x = $conn->query($c01x);
                                            if ($c011x->num_rows > 0) { while($c0111x = $c011x->fetch_assoc()) {
                                                echo"<td class='rating_wrap'><div class='rating_wrap'>
                                                    <div class='product-rate d-inline-block'><div class='product-rating' style='width:90%'></div></div>
                                                    <span class='rating_num'>(".$c0111x["review"].")</span>
                                                </div></td>";
                                            }}
                                        }}
                                    echo"</tr>
                                    <tr class='description'><td class='text-muted font-md fw-600'>SKU</td>";
                                        $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                        $c011 = $conn->query($c01);
                                        if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {
                                            $c01x = "select * from sms_product_bon where id='".$c0111["pid"]."' order by id desc limit 1";
                                            $c011x = $conn->query($c01x);
                                            if ($c011x->num_rows > 0) { while($c0111x = $c011x->fetch_assoc()) {
                                                echo"<td class='row_text font-xs'><p>".$c0111x["sku"]."</p></td>";
                                            }}
                                        }}
                                    echo"</tr>
                                    <tr class='description'><td class='text-muted font-md fw-600'>Brand</td>";
                                        $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                        $c011 = $conn->query($c01);
                                        if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {
                                            $c01x = "select * from sms_product_bon where id='".$c0111["pid"]."' order by id desc limit 1";
                                            $c011x = $conn->query($c01x);
                                            if ($c011x->num_rows > 0) { while($c0111x = $c011x->fetch_assoc()) { $bid=$c0111x["bid"]; }}
                                            $c01y = "select * from brand where id='$bid' order by id desc limit 1";
                                            $c011y = $conn->query($c01y);
                                            if ($c011y->num_rows > 0) { while($c0111y = $c011y->fetch_assoc()) {
                                                echo"<td class='row_text font-xs'><p>".$c0111y["title"]."</p></td>";
                                            }}
                                        }}
                                    echo"</tr>
                                    <tr class='pr_add_to_cart'><td class='text-muted font-md fw-600'>Add to Cart</td>";
                                        $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                        $c011 = $conn->query($c01);
                                        if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {
                                            $c01x = "select * from sms_product_bon where id='".$c0111["pid"]."' order by id desc limit 1";
                                            $c011x = $conn->query($c01x);
                                            if ($c011x->num_rows > 0) { while($c0111x = $c011x->fetch_assoc()) {
                                                echo"<td class='row_btn'>
                                                    <a aria-label='Add To Cart' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#quickViewModal' onmouseover=\"shiftdatax('quickview.php?prodid=".$c0111x["id"]."&cm=1', 'datashiftW')\">
                                                        <button class='btn btn-sm' style='background-color:$buttonbc;color:$buttontc;width:130px'><i class='fi-rs-shopping-bag mr-5'></i>Add to cart</button>
                                                    </a>
                                                </td>";                                                
                                            }}
                                        }}
                                    echo"</tr>
                                    <tr class='pr_remove text-muted'><td class='text-muted font-md fw-600'></td>";
                                        $c01 = "select * from sms_compare where cid='$userid' order by id desc limit $comp";
                                        $c011 = $conn->query($c01);
                                        if ($c011->num_rows > 0) { while($c0111 = $c011->fetch_assoc()) {                                            
                                            echo"<td class='row_remove'>
                                                <a href='delete.php?compareid=".$c0111["id"]."' target='addtocart' title='Remove this item' onmouseout=\"ChangeUrl('index.php?cPath=80000&lid=1'); shiftdatax('product_compare.php?cm=1', 'datashiftX')\">
                                                    <i class='fi-rs-trash mr-5'></i><span>Remove</span>
                                                </a>
                                            </td>";
                                        }}
                                    echo"</tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>";
?>