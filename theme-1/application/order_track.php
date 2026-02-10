<?php
    include("auth.php");
    echo"<section class='content-main'>
        
        <div class='content-header'>
            <div class='col-md-7 content-header'><h2 class='content-title'>Order Tracker</h2></div>
            <div class='col-md-1' style='text-align:right'>";
                if(isset($_GET["oid"])) echo"<a style='cursor: pointer' href='#top' onclick=\"shiftdataV2('order_track.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\"><i class='icon material-icons md-refresh'></i></a>";
                else echo"<a style='cursor: pointer' href='#top' onclick=\"shiftdataV1('order_track', 'datashiftX')\"><i class='icon material-icons md-refresh'></i></a>";
            echo"</div>
            <div class='col-md-1' style='text-align:right'>";
                if(isset($_GET["oid"])) echo"<a style='cursor: pointer' href='#top' onclick=\"shiftdataV2('order_detail.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\">Back to Detail</a>";
            echo"</div>
            <div class='col-md-2' style='text-align:right'>
                <div class='dropdown'>
                    <a href='#' data-bs-toggle='dropdown' class='btn btn-primary rounded btn-sm font-sm'> View Orders</a>
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
        
        <div class='card'><center>";
            if(!isset($_GET["cid"])) {
                echo"<form method='get' name=tracker action='order_tracker.php' target='ordertracker' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <div class='row' style='padding:20px'>
                        <div class='col-md-10' style='text-align:left'><label>Order ID:</label>
                            <input type=text name='oid' required class='form-control ' value='".$_GET["oid"]."'>
                        </div>
                        <div class='col-md-2' style='text-align:right'><label>&nbsp; </label><br>
                            <button type='submit' class='btn btn-primary'>Search</button>
                        </div>
                    </div>
                </form>";
                echo"<iframe name='ordertracker' src='blank.php' height='700' width='100%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>";
            }
            
            if(isset($_GET["oid"])) {
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
            		
            		$status2="";
        		    $status3="";
        		    $status4="";
        		    $status5="";
        		    $status6="";
        		    $status7="";
        		    $status8="";
        		    $status9="";
            		    
            		$status1="completed";
            		if($rs1["status"]==2){
            		    $status2="completed";
            		}
            		if($rs1["status"]==3){
            		    $status2="completed";
            		    $status3="completed";
                    }
            		if($rs1["status"]==4){
            		    $status2="completed";
            		    $status3="completed";
            		    $status4="completed";
            		}
            		if($rs1["status"]==5){
            		    $status2="completed";
            		    $status3="completed";
            		    $status4="completed";
            		    $status5="completed";
            		}
            		if($rs1["status"]==6){
            		    $status2="completed";
            		    $status3="completed";
            		    $status4="completed";
            		    $status5="completed";
            		    $status6="completed";
            		}
            		if($rs1["status"]==7){
            		    $status2="completed";
            		    $status3="completed";
            		    $status4="completed";
            		    $status5="completed";
            		    $status6="completed";
            		    $status7="completed";
            		}
            		if($rs1["status"]==8){
            		    $status2="completed";
            		    $status3="completed";
            		    $status4="completed";
            		    $status5="completed";
            		    $status6="completed";
            		    $status7="completed";
            		    $status8="completed";
            		}
                    if($rs1["status"]==9){
                        $status2="completed";
            		    $status3="completed";
            		    $status4="completed";
            		    $status5="completed";
            		    $status6="completed";
            		    $status7="completed";
            		    $status8="completed";
            		    $status9="completed";
                    }
                    
                    $date1=date("d-m-Y",$rs1["date"]);
                    $date2=date("d-m-Y",$rs1["date2"]);
                    $date3=date("d-m-Y",$rs1["date3"]);
                    $date4=date("d-m-Y",$rs1["date4"]);
                    $date5=date("d-m-Y",$rs1["date5"]);
                    $date6=date("d-m-Y",$rs1["date6"]);
                    $date7=date("d-m-Y",$rs1["date7"]);
                    $date8=date("d-m-Y",$rs1["date8"]);
                    $date9=date("d-m-Y",$rs1["date9"]);
                    
                    if(strlen($rs1["date2"])<=5) $date2="-";
                    if(strlen($rs1["date3"])<=5) $date3="-";
                    if(strlen($rs1["date4"])<=5) $date4="-";
                    if(strlen($rs1["date5"])<=5) $date5="-";
                    if(strlen($rs1["date6"])<=5) $date6="-";
                    if(strlen($rs1["date7"])<=5) $date7="-";
                    if(strlen($rs1["date8"])<=5) $date8="-";
                    if(strlen($rs1["date9"])<=5) $date9="-";
                    
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
                                    <button type='submit' class='btn btn-primary' onblur=\"shiftdataV2('order_track.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\">Update</button>
                                    
                                    <a style='cursor: pointer' class='btn btn-secondary print ms-2' href='#top' onclick=\"shiftdataV2('order_print.php?oid=".$_GET["oid"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&blist=".$_GET["blist"]."', 'datashiftX')\"><i class='icon material-icons md-print'></i></a>
                                    
                                </form>
                            </div>
                        </div>
                    </header>
                    
                    <div class='card-body'>
                        <div class='order-tracking mb-100'>
                            <div class='steps d-flex flex-wrap flex-sm-nowrap justify-content-between'>
                                
                                <div class='step $status1'>
                                    <div class='step-icon-wrap'><div class='step-icon'><i class='material-icons md-shopping_cart'></i></div></div>
                                    <h4 class='step-title'>Confirmed Order</h4><small class='text-muted text-sm'>$date1</small>
                                </div>
                                
                                <div class='step $status2'>
                                    <div class='step-icon-wrap'><div class='step-icon'><i class='material-icons md-settings'></i></div></div>
                                    <h4 class='step-title'>Processing Order</h4><small class='text-muted text-sm'>$date2</small>
                                </div>
                                
                                <div class='step $status3'>
                                    <div class='step-icon-wrap'><div class='step-icon'><i class='material-icons md-shopping_bag'></i></div></div>
                                    <h4 class='step-title'>Seller Processing</h4><small class='text-muted text-sm'>$date3</small>
                                </div>
                                
                                <div class='step $status4'>
                                    <div class='step-icon-wrap'><div class='step-icon'><i class='material-icons md-shopping_bag'></i></div></div>
                                    <h4 class='step-title'>Quality Check</h4><small class='text-muted text-sm'>$date4</small>
                                </div>
                                
                                <div class='step  $status5'>
                                    <div class='step-icon-wrap'><div class='step-icon'><i class='material-icons md-local_shipping'></i></div></div>
                                    <h4 class='step-title'>Product Dispatched</h4><small class='text-muted text-sm'>$date5</small>
                                </div>
                                
                                <div class='step $status6'>
                                    <div class='step-icon-wrap'><div class='step-icon'><i class='material-icons md-check_circle'></i></div></div>
                                    <h4 class='step-title'>Product Delivered</h4><small class='text-muted text-sm'>$date6</small>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class='row mb-50 mt-20 order-info-wrap text-center'>
                            <div class='col-md-3'>
                                <article class='icontext align-items-start'><div class='text'>
                                    <h6 class='mb-1'>Buyer Detail</h6><p class='mb-1'>$customerid <br> $customeremail <br> $customerphone</p>
                                </div></article>
                            </div>
                            <div class='col-md-3'>
                                <article class='icontext align-items-start'><div class='text'>
                                    <h6 class='mb-1'>Shipping Company</h6><p class='mb-1'><b>$shippingvendor</b> is selected as Shipping Service Provider.</p>
                                </div></article>
                            </div>
                            <div class='col-md-3'>
                                <article class='icontext align-items-start'><div class='text'>
                                    <h6 class='mb-1'>Shipping Company</h6><p class='mb-1'><b>$shippingvendor</b> is selected as Shipping Service Provider.</p>
                                </div></article>
                            </div>
                            <div class='col-md-3'>
                                <article class='icontext align-items-start'><div class='text'>
                                    <div class='text'><h6 class='mb-1'>Payment Method</h6><p class='mb-1'><b>$pmwhat</b></p></div>
                                </div></article>
                            </div>
                        </div>
                    </div>";
                    
                } }
            }
            
        echo"</div>
    </section>";
?>