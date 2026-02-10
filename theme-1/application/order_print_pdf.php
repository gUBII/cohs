<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<style>
    body {
        font-family: 'Roboto', serif;
        font-size: 10px;
    }
</style>
<?php
    include("auth.php");
    echo"<!DOCTYPE HTML><html lang='en'>";
        
        if(isset($_COOKIE["uid"])){
            
            echo"<body id='top'>
                <div class='card'>";
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
                                
                        if($_GET["sheba"]==1) echo"<div id='element-to-print' style='padding:20px'>";
                        else echo"<div style='padding:30px'>";
                        
                            echo"<table style='width:100%'>
                                <tr>
                                    <td><img src='$clogo' style='max-width:300px'></td>
                                    <td align=right><p style='font-size:22pt;color:black'><strong>INVOICE</strong></p></td>
                                </tr>
                                <tr><td colspan=2><hr></td></tr>
                                <tr>
                                    <td><span style='font-size:12pt;color:black'>Order No.</span><br><strong>".$_GET["oid"]."</strong></td>
                                    <td align=right><span style='font-size:12pt;color:black'>Order Date</span><br><strong>$od</strong></td>
                                </tr>
                                <tr><td colspan=2><hr></td></tr>
                                <tr>
                                    <td>
                                        <span style='font-size:12pt;color:black'>
                                            <b>Client:</b><br>
                                            <strong>$customerid</strong><br>
                                            <p>$customeraddress<br>
                                            <a href='#'>$customeremail</a></p>
                                        </span>
                                    </td>
                                    <td align=right>
                                        <span style='font-size:12pt;color:black'>
                                            <b>Shipping Address:</b><br>
                                            <strong>$customerid</strong>
                                            <p>".$rs1["saddress"]."<br>".$rs1["scity"].">, ".$rs1["sstate"]."-".$rs1["szip"]."<br>".$rs1["scountry"]."<br>
                                            <a href='#'>$customerphone</a></p>
                                        </span>
                                    </td>
                                </tr>
                                <tr><td colspan=2><hr></td></tr>
                                <tr><td colspan=2>
                                    <table style='width:100%'>
                                        <tr><td align=lelft style='width:70%'>Description</td><td align=center>Qty</td><td align=right>Amount</td><td align=right>Total</td></tr>";
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
                                    								
                                    		echo"<tr>
                                                <td align=left>".$rs6["pname"]."<br>SKU: ".$rs6["sku"]."</td>
                                                <td align=center>".$rs6["qty"]."</td>
                                                <td align=right>$csymbol ".$rs6["price"]."</td>
                                                <td align=right>$csymbol $totval.00</td>
                                            </tr><tr><td colspan=4><hr></td></tr>";
                                        								
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
                            							
                            			echo"
                            			<tr style='height:50px'><td></td><td></td><td>Subtotal: </td><td align=right>$csymbol $subtotal.00</td></tr>
                                        <tr style='height:50px'><td></td><td></td><td nowrap>Quality Check Charge: </td><td align=right>$csymbol $qcvalue.00</td></tr>
                                        <tr style='height:50px'><td></td><td></td><td>Shipping Cost: </td><td align=right>$csymbol $deliveryvalue.00</td></tr>
                                        <tr style='height:50px'><td></td><td></td><td>Discount Value: </td><td align=right>$csymbol $vouchervalue.00</td></tr>
                                        <tr style='height:50px'><td></td><td></td><td>Total Payable: </td><td align=right>$csymbol $totalvalue.00</td></tr>
                                        <tr><td colspan=4><hr></td></tr>
                                        <tr style='height:50px'><td></td><td></td><td>Payment Method: </td><td align=right>$pmwhat</td></tr>
                                        <tr><td colspan=4><hr></td></tr>
                                    </table>
                                </td></tr>
                            </table>
                            <center><div class='footer'>$cname - $caddress, $ccity, $cstate-$czip, $ccountry. Phone: $cphone, Email: $cemail</div></center>
                        </div>";
                    } }
                echo"</div>";
                
                include("scripts.php");
            
            echo"</body>";
        }
    echo"</html>";
    if($_GET["sheba"]==2) echo"<body id='top' onload='window.print()'>";
?>