<?php
    include("auth.php");
    echo"<!DOCTYPE HTML><html lang='en'>";
        include("head.php");
        
        echo"<body id='top'>
            <section class='content-main'>
                <div class='card'>";
                    
                    if(isset($_GET["oid"])){
                        $s1 = "select * from cart where oid='".$_GET["oid"]."' group by oid order by id desc limit 1";
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($rs1= $r1->fetch_assoc()) {
                        	$s4 = "select * from sms_user2 where id='".$rs1["cid"]."' order by id asc limit 1";
                            $r4 = $conn->query($s4);
                            if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) {
                    		    $customerid=$rs4["name"];
                        		$customerno=$rs4["user_id"];
                        		$customeremail=$rs4["email"];
                        		$customeraddress="".$rs4["address"]."<br>".$rs4["city"].", ".$rs4["state"]."-".$rs4["zip"]."<br>".$rs4["country"].".";
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
                               
                                $pmwhat="Online Payment ($pstat)";
                                
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
                                        <a class='btn btn-primary' target='dataprocessor' href='order_print_pdf.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=1'> <i class='icon material-icons md-cloud_download mr-5'></i>Save PDF</a>
                                        <a class='btn btn-secondary print ms-2' target='dataprocessor' href='order_print_pdf.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=2'><i class='icon material-icons md-print mr-5'></i>Print</a>
                                    </div>
                                </div>
                            </header>
                            
                            <div class='card-body'>
                                <div class='receipt-content'>
                                    <div class='container bootstrap snippets bootdey'>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='invoice-wrapper'>
                                                    <div class='payment-info'>
                                                        <div class='row'>
                                                            <div class='col-sm-9'>
                                                                <img src='$clogo' style='max-width:300px'>
                                                            </div>
                                                            <div class='col-sm-3' align='right'><p style='font-size:22pt'><strong>INVOICE</strong></p></div>
                                                            <div class='col-sm-12'><hr></div>
                                                            <div class='col-sm-6'><span>Order No.</span><strong>".$_GET["oid"]."</strong></div>
                                                            <div class='col-sm-6 text-end'><span>Order Date</span><strong>$od</strong></div>
                                                        </div>
                                                    </div>
                                
                                                    <div class='payment-details'>
                                                        <div class='row'>
                                                            <div class='col-sm-6'>
                                                                <span>Client:</span>
                                                                <strong>$customerid</strong>
                                                                <p>$customeraddress<br><a href='#'>$customeremail</a></p>
                                                            </div>
                                                            <div class='col-sm-6 text-end'>
                                                                <span>Shipping Address</span>
                                                                <strong>$customerid</strong>
                                                                <p>".$rs1["saddress"]."<br>".$rs1["scity"].">, ".$rs1["sstate"]."-".$rs1["szip"]."<br>".$rs1["scountry"]."<br>
                                                                <a href='#'>$customerphone</a></p>
                                                            </div>
                                                        </div>
                                
                                                        <div class='line-items'>
                                                            <div class='headers clearfix'>
                                                                <div class='row'>
                                                                    <div class='col-md-7'>Description</div>
                                                                    <div class='col-md-1'>Qty</div>
                                                                    <div class='col-md-2'>Amount</div>
                                                                    <div class='col-md-2 text-end'>Total</div>
                                                                </div>
                                                            </div>
                                                            <div class='items'>";
                                                                $totid=0;
                                        						$t=0;
                                        						$ct=0;
                                        						$tc=0;
                                    							$s6 = "select * from sms_cart where oid='".$_GET["oid"]."' order by oid asc";
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
                                    								
                                    								echo"<div class='row item'>
                                                                        <div class='col-md-7 desc'>".$rs6["pname"]."<br>SKU: ".$rs6["sku"]."</div>
                                                                        <div class='col-md-1 qty'>".$rs6["qty"]."</div>
                                                                        <div class='col-md-2 price'>$csymbol ".$rs6["price"]."</div>
                                                                        <div class='col-md-2 amount text-end'>$csymbol $totval.00</div>
                                                                    </div>";
                                    								
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
                        							
                        							            echo"<div class='total text-end'>
                                                                    <p class='extra-notes'><strong>Client's Note</strong>".$rs1["note"]."</p>
                                                                    <div class='field'>Subtotal <span>$csymbol $subtotal.00</span></div>
                                                                    <div class='field'>Quality Check Charge <span>$csymbol $qcvalue.00</span></div>
                                                                    <div class='field'>Shipping Cost <span>$csymbol $deliveryvalue.00</span></div>
                                                                    <div class='field'>Discount Value<span>$csymbol $vouchervalue.00</span></div>
                                                                    <div class='field grand-total'>Total <span>$csymbol $totalvalue</span></div>
                                                                    <div class='field grand-total'><hr>$pmwhat</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                
                                                        <div class='footer'>$cname - $caddress, $ccity, $cstate-$czip, $ccountry. Phone: $cphone, Email: $cemail</div>
                                                    </div>
                                                </div>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        } }
                    }
                echo"</div>
            </section>";
             
            include("scripts.php");
            
        echo"</body>
    </html>";
?>