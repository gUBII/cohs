<?php
	// error_reporting(0);	
    include('authenticatorx.php');
	if(isset($_COOKIE["track"])) $userid=$_COOKIE["track"]; else $userid=$_COOKIE["guestid"];

    date_default_timezone_set("Asia/Dhaka");
	
    echo"<table style='width:100%;border:0px'>";
        $tt=0;
        $ctot=0;
        $c2 = "select * from sms_cart where cid='$userid' and status='0' order by id asc";
        $d2 = $conn->query($c2);
        if ($d2->num_rows > 0) { while($cd2 = $d2->fetch_assoc()) {
            $dytot=($cd2["price"]*$cd2["qty"]);
            $dytot=round($dytot);
            $tt=($tt+1);
            $lq=($cd2["qty"]-1);
            $hq=($cd2["qty"]+1);
            $imzcount=0;
            $imzcount=strlen($cd2["pimz"]);
            
            $ncount=strlen($cd2["pname"]);
            $iname = substr($cd2["pname"], 0, 30);
            if($ncount>=31) $iname="$iname...";
            
            echo"<tr><td style='width:100%;padding:5px' colspan=10>
                <span style='font-size:10pt;color:$bodytc'>$iname</span>
            </td></tr>
            <tr>
                <td style='padding:0px;text-align:center;font-size:10pt;color:$bodytc;width:100px'>";
                    if($lq>=1) echo"<a href='update.php?cartid=".$cd2["id"]."&nqty=$lq' target='addtocart' title='-'><img src='assets/minus.png' style='width:13px'></a>";
                    else echo"<a href='#' target='addtocart' title='-'><img src='assets/minus.png' style='width:13px'></a>";
                    echo"&nbsp;&nbsp; ".$cd2["qty"]." &nbsp;&nbsp;";
                    echo"<a href='update.php?cartid=".$cd2["id"]."&nqty=$hq' target='addtocart' title='+'><img src='assets/plus.png' style='width:13px'></a>";
                echo"</td>
                <td style='padding:0px;text-align:right;font-size:10pt;color:$bodytc;padding-left:5px;padding-right:5px'>x</td>
                <td style='padding:0px;text-align:right;font-size:10pt;color:$bodytc'>$csymbol".$cd2["price"]."</td>
                <td style='padding:0px;text-align:right;font-size:10pt;color:$bodytc;padding-left:5px;padding-right:5px'>=</td>
                <td style='padding:0px;text-align:right;font-size:10pt;color:$bodytc' nowrap>$csymbol $dytot.00</td>
                <td style='padding:0px;text-align:right;font-size:10pt;color:$bodytc;padding-left:5px;padding-right:5px'>
                    <a href='delete.php?cartid=".$cd2["id"]."' target='addtocart' title='Remove this item'><img src='assets/d.png' style='width:13px'></a>
                </td>
            </td></tr>";
            $ctot=($dytot+$ctot);
        } }
    echo"</table>

    <div class='shopping-cart-footer'>";
        if($ctot>=1){
            echo"<div class='shopping-cart-total' style='text-align:right;color:$bodytc;font-size:12pt'>Total: $csymbol $ctot.00</div>";
        }
        echo"<div class='shopping-cart-button'>
            <a href='#top' onclick=\"ChangeUrl('index.php?cPath=80000&lid=3'); shiftdatax('product_cart.php?cm=1', 'datashiftX')\" target='_self' title='Shopping Cart' style='cursor: pointerborder-width:2px $buttonbc;background-color:$buttonbc;color:$buttontc'>View cart</a>
            <a href='#top' onclick=\"ChangeUrl('index.php?cPath=80000&lid=4'); shiftdatax('product_checkout.php?cm=1', 'datashiftX')\" target='_self' title='Shopping Cart' style='cursor: pointerborder-width:2px $buttonbc;background-color:$buttonbc;color:$buttontc'>Checkout</a>
        </div>
    </div>";
    
?>
