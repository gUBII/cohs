<?php
    include("auth.php");
    echo"<section class='content-main'>
        
        <div class='content-header'>
            <div class='col-md-7 content-header'><h2 class='content-title'>Order Detail</h2></div>
            <div class='col-md-1' style='text-align:right'>
                <a style='cursor: pointer' href='#top' onclick=\"shiftdataV2('order_detail.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\"><i class='icon material-icons md-refresh'></i></a>
            </div>
            <div class='col-md-2' style='text-align:right'>
                <a style='cursor: pointer' href='#top' onclick=\"shiftdataV2('order_list.php?blist=".$_GET["blist"]."', 'datashiftX')\">Back to List</a>
            </div>
            <div class='col-md-2' style='text-align:right'>
                <div class='dropdown'>
                    <a href='#' data-bs-toggle='dropdown' class='btn btn-primary rounded btn-sm font-sm'> Select Option</a>
                    <div class='dropdown-menu'>
                        <a href='#".$_GET["oid"]."' class='dropdown-item ' onclick=\"shiftdataV2('order_list.php?blist=7000', 'datashiftX')\">Order Lists</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7001', 'datashiftX')\">New/Pending Orders</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7002', 'datashiftX')\">Supplier Department</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7003', 'datashiftX')\">QC Department</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7004', 'datashiftX')\">Shipping Department</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7005', 'datashiftX')\">Closed/Delivered</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7006', 'datashiftX')\">Returned</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7007', 'datashiftX')\">Cancelled</a>
                        <a href='#".$_GET["oid"]."' class='dropdown-item' onclick=\"shiftdataV2('order_list.php?blist=7008', 'datashiftX')\">Archived</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class='card'>";
        
            $s1 = "select * from cart where oid='".$_GET["oid"]."' and cid='".$_GET["cid"]."' group by oid order by id desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1= $r1->fetch_assoc()) {
            	$s4 = "select * from sms_user2 where id='".$rs1["cid"]."' order by id asc limit 1";
                $r4 = $conn->query($s4);
                if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) {
        		    $customerid=$rs4["name"];
            		$customerno=$rs4["user_id"];
            		$customeremail=$rs4["email"];
        		} }
        		
        		$a6 = "select * from sms_link where id='".$rs1["shippingvendor"]."' and status='ON' order by id asc limit 1";
        		$b6 = $conn->query($a6);
        		if ($b6->num_rows > 0) { while($ab6 = $b6->fetch_assoc()) { $shippingvendor=$ab6["pam"]; } }
        		
        		$od=date("l d-m-Y H:m A", $rs1["date"]);
        			
        		if($rs1["payment"]=="CB"){
        		    $pmwhat="Cash Balance";
        		}else if($rs1["payment"]=="COD"){
        		    $pmwhat="Cash On Delivery";
        		}else if($rs1["payment"]=="BANK"){
        		    $pmwhat="Bank Transfer";
        		}else if($rs1["payment"]=="CASH"){
        		    $pmwhat="Cash Transfer/Deposit";
        		}else if($rs1["payment"]=="SSL"){
        		    
        		    $cstatus=0;
            		$paidamount=0;
            		$pstat=0;
            		$s5 = "select * from orders where email='".$rs1["oid"]."' order by id desc limit 1";
                    $r5 = $conn->query($s5);
                    if ($r5->num_rows > 0) { while($rs5 = $r5->fetch_assoc()) {
                        $cstatus=$rs5["status"];
                        $paidamount=$rs5["amount"];
                   } }
                   if($cstatus=="Pending") $pstat="Un-Paid";
                   else $pstat="<span style='color:red'>Paid Tk. $paidamount</span>";
                   
                    $pmwhat="Online Payment<br>$pstat";
                    
                }else{
        			
        			$pmwhat="Other Method";
        			
        		}
        		
        		if($rs1["status"]==2) $status="<span class='badge rounded-pill alert-primary'>Pending</span>";
        		if($rs1["status"]==3) $status="<span class='badge rounded-pill alert-info'>Processing</span>";
        		if($rs1["status"]==4) $status="<span class='badge rounded-pill alert-info'>QC Check</span>";
        		if($rs1["status"]==5) $status="<span class='badge rounded-pill alert-warning'>Shipping</span>";
        		if($rs1["status"]==6) $status="<span class='badge rounded-pill alert-success'>Closed/Delivered</span>";
        		if($rs1["status"]==7) $status="<span class='badge rounded-pill alert-danger'>Returned</span>";
        		if($rs1["status"]==8) $status="<span class='badge rounded-pill alert-danger'>Cancelled</span>";
                if($rs1["status"]==9) $status="<span class='badge rounded-pill alert-default'>Archived</span>";
                
        		echo"<header class='card-header'>
        		    <div class='row align-items-center'>
                        <div class='col-lg-6 col-md-6 mb-lg-0 mb-15'>
                            <span><i class='material-icons md-calendar_today'></i> <b>$od</b></span> <br><br>
                            <p style='font-size:14pt;font:blue'>Order ID:  ".$_GET["oid"]."</span>
                        </div>
                        <div class='col-lg-6 col-md-6 ms-auto text-md-end'>
                            <form method='get' action='orderprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                                <select name='statusupdate' required class='form-select d-inline-block mb-lg-0 mb-15 mw-200'>
                                    <option value=''>Change status</option>
                                    <option value='2'>Set to Pending</option>
                                    <option value='3'>Notify Supplier</option>
                                    <option value='4'>QC Department</option>
                                    <option value='5'>Packing & Shipping</option>
                                    <option value='6'>Closed/Delivered</option>
                                    <option value='7'>Returned</option>
                                    <option value='8'>Cancelled</option>
                                    <option value='9'>Archived</option>
                                </select>
                                <input type=hidden name='processor' value='statusupdate'>
                                <input type=hidden name='oid' value='".$_GET["oid"]."'>
                                <input type=hidden name='cid' value='".$_GET["cid"]."'>
                                <input type=hidden name='tamt' value='".$rs1["ctotal"]."'>
                                <button type='submit' class='btn btn-primary' onblur=\"shiftdataV2('order_detail.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\">Update</button>
                                
                                <a style='cursor: pointer' class='btn btn-secondary print ms-2' href='#top' onclick=\"shiftdataV2('order_print.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\"><i class='icon material-icons md-print'></i></a>
                                
                            </form>
                        </div>
                    </div>
                </header>
                
                <div class='card-body'>
                    <div class='row mb-50 mt-20 order-info-wrap'>
                        
                        <div class='col-md-3'>
                            <article class='icontext align-items-start'>
                                <span class='icon icon-sm rounded-circle bg-primary-light'><i class='text-primary material-icons md-person'></i></span>
                                <div class='text'>
                                    <h6 class='mb-1'>Buyer Detail</h6><p class='mb-1'>$customerid <br> $customeremail <br> $customerphone</p>
                                </div>
                            </article>
                        </div>
                        
                        <div class='col-md-3'>
                            <article class='icontext align-items-start'>
                                <span class='icon icon-sm rounded-circle bg-primary-light'>
                                    <i class='text-primary material-icons md-local_shipping'></i>
                                </span>
                                <div class='text'>
                                    <h6 class='mb-1'>Shipping Company</h6><p class='mb-1'><b>$shippingvendor</b> is selected as Shipping Service Provider.</p>
                                </div>
                            </article>
                        </div>
                        
                        <div class='col-md-3'>
                            <article class='icontext align-items-start'>
                                <span class='icon icon-sm rounded-circle bg-primary-light'>
                                    <i class='text-primary material-icons md-place'></i>
                                </span>
                                <div class='text'>
                                    <h6 class='mb-1'>Shipping Location</h6>
                                    <p class='mb-1'>City: ".$rs1["scity"].",<br>".$rs1["saddress"]." <br> ".$rs1["sstate"]."-".$rs1["szip"].".</p>
                                </div>
                            </article>
                        </div>
                        
                        <div class='col-md-3'>
                            <article class='icontext align-items-start'>
                                <span class='icon icon-sm rounded-circle bg-primary-light'>
                                    <i class='text-primary material-icons md-money'></i>
                                </span>
                                <div class='text'><h6 class='mb-1'>Payment Method</h6><p class='mb-1'><b>$pmwhat</b></p></div>
                            </article>
                        </div>
                        
                    </div>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='table-responsive'>
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th width='50%'>Product</th><th width='20%'>Sku</th><th width='10%'>Qty</th>
                                            <th width='10%' align=right>Price</th><th width='10%' class='text-end'>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                        $totid=0;
                						$t=0;
                						$ct=0;
                						$tc=0;
            							$s6 = "select * from sms_cart where oid='".$_GET["oid"]."' and cid='".$_GET["cid"]."' order by oid asc";
                                        $r6 = $conn->query($s6);
                                        if ($r6->num_rows > 0) { while($rs6 = $r6->fetch_assoc()) {
            								$tc=($tc+1);
                						    $ct=($rs6["confirm"]+$ct);
                						    $totid=0;
            								$totid=($rs6["price"]*$rs6["qty"]);
            								$totval=(($totid*$rs6["discount"])/100);
            								$totval=($totid-$totval);
            								
            								$s7 = "select * from sms_mega_downloads where id='".$rs6["pid"]."' order by id asc limit 1";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
            								    $s8 = "select * from sms_user where id='".$rs7["mid"]."' order by id asc limit 1";
                                                $r8 = $conn->query($s8);
                                                if ($r8->num_rows > 0) { while($rs8 = $r8->fetch_assoc()) {
                                                    $oid=$rs8["id"];
            										$ownerid=$rs8["name"];
            										$phone=$rs8["user_id"];
            										$email=$rs8["email"];
            										$address=$rs8["address"];
            										$sname=$rs8["sname"];
            									} }
            									$s9 = "select * from sms_link where id='".$rs7["cname"]."' order by id asc limit 1";
                                                $r9 = $conn->query($s9);
                                                if ($r9->num_rows > 0) { while($rs9 = $r9->fetch_assoc()) { $catid=$rs9["pam"]; } }
                                                
            									$s10 = "select * from sms_link where id='".$rs7["address"]."' order by id asc limit 1";
                                                $r10 = $conn->query($s10);
                                                if ($r10->num_rows > 0) { while($rs10 = $r10->fetch_assoc()) { $locid=$rs10["pam"]; } }
            									
            									$price1=$rs7["price1"];
            									$price2=$rs7["price2"];
            									$price3=$rs7["price3"];
            								} }
            								
            								echo"<tr>
                                                <td><a class='itemside' href='#'>
                                                    <div class='left'><img src='".$rs6["pimz"]."' width='40' height='40' class='img-xs' alt='Item'></div>
                                                    <div class='info'> ".$rs6["pname"]."</div>
                                                </a></td>
                                                <td> ".$rs6["sku"]." </td>
                                                <td> ".$rs6["qty"]." </td>
                                                <td> ".$rs6["price"]."</td>
                                                <td class='text-end'> $totval.00 </td>
                                            </tr>";
            								
            								$subtotal=($totval+$subtotal);
            								
            								$s11 = "select * from sms_link where id='".$rs6["location"]."' order by id asc limit 1";
                                            $r11 = $conn->query($s11);
                                            if ($r11->num_rows > 0) { while($rs11 = $r11->fetch_assoc()) { $locid=$rs11["pam"]; } } 
            								
            								$s12 = "select * from sms_link where id='".$rs6["dtype"]."' order by id asc limit 1";
                                            $r12 = $conn->query($s12);
                                            if ($r12->num_rows > 0) { while($rs12 = $r12->fetch_assoc()) { $deliverypoint=$rs12["pam"]; } }
            								
            								$deliveryvalue=$rs6["dvalue"];
            								$vouchervalue=$rs6["vvalue"];
            								$totalvalue=$rs6["ctotal"];
            								$qcvalue=0;
            							} }
            							
            							echo"<tr>
                                            <td colspan='6'>
                                                <article class='float-end'>
                                                    <dl class='dlist'><dt>Subtotal:</dt><dd>$subtotal.00</dd></dl>
                                                    <dl class='dlist'><dt>QC Charge:</dt><dd>$qcvalue.00</dd></dl>
                                                    <dl class='dlist'><dt>Shipping cost:</dt><dd>$deliveryvalue.00</dd></dl>
                                                    <dl class='dlist'><dt>Voucher Value:</dt><dd>$vouchervalue.00</dd></dl>
                                                    <dl class='dlist'><dt>Grand total:</dt><dd> <b class='h5'>$totalvalue</b> </dd></dl>
                                                    <dl class='dlist'>
                                                        <dt class='text-muted'>Status:</dt>
                                                        <dd style='font-size:16pt'>$status</dd>
                                                    </dl>
                                                </article>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class='col-lg-12'><hr></div>
                        <div class='col-lg-12'>
                            <div class='h-25 pt-4'>
                                <div class='mb-3'><label>Notes</label><br>".$rs1["note"]."</div>
                                <center>
                                    <a class='btn btn-primary' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('order_track.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\">View Order Tracking</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>";
                
            } }
            
        echo"</div>
    </section>";
?>