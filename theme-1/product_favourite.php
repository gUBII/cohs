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
                        <span></span> <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=80000&lid=2'); shiftdatax('product_favourite.php?cm=1', 'datashiftX')\" target='_self' title='Favourite'>Favourite</a>
                    </div>
                </div>
            </div>
            <section class='mt-50 mb-50'>
                <div class='container'>
                    <div class='row'>
                        <div class='col-12'>
                            <div class='table-responsive'>
                                <table class='table shopping-summery text-center'>
                                    <thead>
                                        <tr class='main-heading'>
                                            <th scope='col' colspan='2'>Product</th>
                                            <th scope='col'>Price</th>
                                            <th scope='col'>Stock Status</th>
                                            <th scope='col'>Action</th>
                                            <th scope='col'>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                        $c1 = "select * from sms_favourite where cid='$userid' order by id desc";
                                        $c11 = $conn->query($c1);
                                        if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) {
                                            $c1x = "select * from sms_product_bon where id='".$c111["pid"]."' order by id desc limit 1";
                                            $c11x = $conn->query($c1x);
                                            if ($c11x->num_rows > 0) { while($c111x = $c11x->fetch_assoc()) {
                                                echo"<tr>
                                                    <td class='image product-thumbnail'>";
                                                        $c01y = "select * from multi_image where pid='".$c111x["id"]."' and reactor='".$c111x["reactor"]."' order by sorder asc limit 1";
                                                        $c011y = $conn->query($c01y);
                                                        if ($c011y->num_rows > 0) { while($c0111y = $c011y->fetch_assoc()) {
                                                            echo"<img src='media/".$c0111y["image"]."' alt='".$c111x["pname"]."' style='width:100px;border-radius:5px'>";
                                                        }}
                                                    echo"</td>
                                                    <td class='product-des product-name'>
                                                        <h5 class='product-name'><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&prodname=".$c111x["pname"]."&prodid=".$c111x["id"]."'); shiftdatax('productdetail.php?cPath=4&prodid=".$c111x["id"]."&cm=1&prodname=".$c111x["pname"]."', 'datashiftX')\" target='_self'>".$c111x["pname"]."</a></h5>
                                                        <p class='font-xs'>".$c111x["sku"]."</p>
                                                    </td>
                                                    <td class='price' data-title='Price'><span>";
                                                    $rprz=0;
                                                    $offer_sd=0;
                                                    if(strlen($c111x["offer_sd"])>=1000) $offer_sd=$c111x["offer_sd"];
                                                    $offer_ed=0;
                                                    if(strlen($c111x["offer_ed"])>=1000) $offer_ed=$c111x["offer_ed"];
                                                    $rprz1=round($rprz);  
                                                    if($c111x["offer"]<=0){
                                                        if($c111x["discount_type"]=="PERCENTAGE"){
                                                            $rprz=(($c111x["price"]*$c111x["discount"])/100);
                                                            $rprz=($c111x["price"]-$rprz);
                                                        }else $rprz=($c111x["price"]-$c111x["discount"]);
                                                        
                                                    }else{
                                                        if($ctime>=$offer_sd && $ctime<=$offer_ed){
                                                            $rprz=$c111x["offer"];
                                                        }else{
                                                            if($c111x["discount_type"]=="PERCENTAGE"){
                                                                $rprz=(($c111x["price"]*$c111x["discount"])/100);
                                                                $rprz=($c111x["price"]-$rprz);
                                                            }else $rprz=($c111x["price"]-$c111x["discount"]);                                                        
                                                        }
                                                    }  
                                                    echo"$csymbol $rprz.00</span></td>
                                                    <td class='text-center' data-title='Stock'>
                                                        <span class='color3 font-weight-bold'>".$c111x["qty"]." In Stock</span>
                                                    </td>
                                                    <td class='text-right' data-title='Cart'>
                                                        <a aria-label='Add To Cart' class='action-btn hover-up' data-bs-toggle='modal' data-bs-target='#quickViewModal' onmouseover=\"shiftdatax('quickview.php?prodid=".$c111x["id"]."&cm=1', 'datashiftW')\">    
                                                            <button class='btn btn-sm' style='background-color:$buttonbc;color:$buttontc;width:130px'><i class='fi-rs-shopping-bag mr-5'></i>Add to cart</button>
                                                        </a>
                                                    </td>
                                                    <td class='action' data-title='Remove'>
                                                        <a href='delete.php?favouriteid=".$c111["id"]."' target='addtocart' title='Remove this item' onmouseout=\"ChangeUrl('index.php?cPath=80000&lid=2'); shiftdatax('product_favourite.php?cm=1', 'datashiftX')\">
                                                            <i class='fi-rs-trash'></i>
                                                        </a>
                                                    </td>
                                                </tr>";
                                            }}
                                        }}
                                    echo"</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>";
?>
    