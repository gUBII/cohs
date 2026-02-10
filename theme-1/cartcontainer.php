<?php
    // error_reporting(0);	
    include('authenticatorx.php');
	if(isset($_COOKIE["track"])) $userid=$_COOKIE["track"]; else $userid=$_COOKIE["guestid"];

    date_default_timezone_set("Asia/Dhaka");
    $subtotal=0;
    $c1 = "select * from sms_cart where cid='$userid' order by id desc";
    $c11 = $conn->query($c1);
    if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) {
        echo"<tr>
            <td class='image product-thumbnail'>
                <img src='media/".$c111["pimz"]."' alt='".$c111["pname"]."' style='width:100px;border-radius:5px'>
            </td>
            <td class='product-des product-name' style='text-align:left'>
                <h5 class='product-name'><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&prodname=".$c111["pname"]."&prodid=".$c111["id"]."'); shiftdatax('productdetail.php?cPath=4&prodid=".$c111["id"]."&cm=1&prodname=".$c111["pname"]."', 'datashiftX')\" target='_self'>".$c111["pname"]."</a></h5>                                                
            </td>
            <td class='price' data-title='Price'><span>$csymbol ".$c111["price"]."</span></td>
            <td class='text-center' data-title='Stock'>
                <div class='detail-qty border radius  m-auto'>";
                    $lq=($c111["qty"]-1);
                    $hq=($c111["qty"]+1);
                    if($lq>=1) echo"<a href='update.php?cartid=".$c111["id"]."&nqty=$lq' target='addtocart' title='-'  style='margin-top:15px'><i class='fi-rs-angle-small-down'></i></a>";
                    else echo"<a href='#' target='addtocart' title='-' ><i class='fi-rs-angle-small-down'></i></a>";                                                    
                    echo"<span class='qty-val'>".$c111["qty"]."&nbsp;&nbsp;</span>
                    <a href='update.php?cartid=".$c111["id"]."&nqty=$hq' target='addtocart' title='+' style='margin-top:-5px'><i class='fi-rs-angle-small-up'></i></a>
                </div>
            </td>";
            $total=($c111["price"]*$c111["qty"]);
            echo"<td class='price' data-title='Price'><span>$csymbol $total.00</span></td>
            <td class='action' data-title='Remove'>
                <a href='delete.php?cartid=".$c111["id"]."' target='addtocart' title='Remove this item' >
                    <i class='fi-rs-trash'></i>
                </a>
            </td>
        </tr>";
        $subtotal=($total+$subtotal);                                        
    } }
    echo"<tr><td colspan=10'><div class='table-responsive'>
        <table class='table'>
            <tbody>
                <tr><td class='cart_total_label' style='text-align:right'>Cart Subtotal</td><td class='cart_total_amount' style='width:200px;text-align:right'><span class='font-lg fw-900 text-brand'>$csymbol $subtotal.00</span></td></tr>
                <tr><td class='cart_total_label' style='text-align:right'>Total</td><td class='cart_total_amount' style='width:200px;text-align:right'><strong><span class='font-xl fw-900 text-brand'>$csymbol $subtotal.00</span></strong></td></tr>
            </tbody>
        </table>
    </div>
    <a href='#top' class='btn ' onclick=\"ChangeUrl('index.php?cPath=80000&lid=4'); shiftdatax('product_checkout.php?cm=1', 'datashiftX')\" target='_self' title='Shopping Cart' style='cursor: pointerborder-width:2px $buttonbc;background-color:$buttonbc;color:$buttontc'> <i class='fi-rs-box-alt mr-10'></i> Proceed To CheckOut</a>
    </td></tr>";
?>