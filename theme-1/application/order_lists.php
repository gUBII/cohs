<?php
    include("auth.php");
    
    if(isset($_GET["blist"])) $orderx=$_GET["blist"];
    else $orderx=7001;
    
    $pagename="Showing All Orders";
    if($_GET["blist"]==7001) $pagename="New / Pending Orders";
    if($_GET["blist"]==7002) $pagename="Supplier Department";
    if($_GET["blist"]==7003) $pagename="QC Department";
    if($_GET["blist"]==7004) $pagename="Shipping Department";
    if($_GET["blist"]==7005) $pagename="Closed / Delivered Orders";
    if($_GET["blist"]==7006) $pagename="Returned Orders";
    if($_GET["blist"]==7007) $pagename="Cancelled Orders";
    if($_GET["blist"]==7008) $pagename="Archived Orders";
    echo"<h4>$pagename</h4>";
    
    echo"<header class='card-header'>
        <div class='row gx-3'>
            <div class='col-lg-4 col-md-6 me-auto'>
                <input type='text' placeholder='Search...' class='form-control'>
            </div>
            <div class='col-lg-2 col-6 col-md-3'>
                <select class='form-select'>
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div>
            <div class='col-lg-2 col-6 col-md-3'>
                <select class='form-select'>
                    <option>Show 20</option>
                    <option>Show 30</option>
                    <option>Show 40</option>
                </select>
            </div>
        </div>
    </header>
    
    <div class='card-body'>
        <div class='table-responsive' style='min-height:500px'>
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th scope='col'>Date</th>
                        <th scope='col'>Buyer Name</th>
                        <th scope='col'>Phone</th>
                        <th scope='col'>Payment Status</th>
                        <th scope='col'>Order Status</th>
                        <th scope='col'>Total</th>
                        <th scope='col' class='text-end'> Action </th>
                    </tr>
                </thead>
                <tbody>";
                    if($orderx==7000) $s3 = "select * from cart where oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7001) $s3 = "select * from cart where status='2' and oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7002) $s3 = "select * from cart where status='3' and oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7003) $s3 = "select * from cart where status='4' and oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7004) $s3 = "select * from cart where status='5' and oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7005) $s3 = "select * from cart where status='6' and oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7006) $s3 = "select * from cart where status='7' and oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7007) $s3 = "select * from cart where status='8' and oid<>'0' group by oid order by id desc limit 100";
                    else if($orderx==7008) $s3 = "select * from cart where status='9' and oid<>'0' group by oid order by id desc limit 100";
                    else $s3 = "select * from cart where status='2' and oid<>'0' group by oid order by id desc limit 100";
                    $r3 = $conn->query($s3);
                    if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
                		$s4 = "select * from sms_user2 where id='".$rs3["cid"]."' order by id asc limit 1";
                        $r4 = $conn->query($s4);
                        if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) {
            			    $customerid="".$rs4["name"]." ".$rs4["name2"]."";
                			$customerno=$rs4["user_id"];
                			$cphone=$rs4["phone"];
                			$cemail=$rs4["email"];
            			} }
            			$od=date("d-m-Y H:m:s", $rs3["date"]);
            			
            			if($rs3["payment"]=="CB"){
            			    $pmwhat="Cash Balance";
            			}else if($rs3["payment"]=="COD"){
            			    $pmwhat="Cash On Delivery";
            			}else if($rs3["payment"]=="BANK"){
            			    $pmwhat="Bank Transfer";
            			}else if($rs3["payment"]=="CASH"){
            			    $pmwhat="Cash Transfer/Deposit";
            			}else if($rs3["payment"]=="SSL"){
            			    $cstatus=0;
                			$paidamount=0;
                			$pstat=0;
                			$s5 = "select * from orders where email='".$rs3["oid"]."' order by id desc limit 1";
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
        			    
        			    if($rs3["status"]==2) $status="<span class='badge rounded-pill alert-primary'>Pending</span>";
        			    if($rs3["status"]==3) $status="<span class='badge rounded-pill alert-info'>Processing</span>";
        			    if($rs3["status"]==4) $status="<span class='badge rounded-pill alert-info'>QC Check</span>";
        			    if($rs3["status"]==5) $status="<span class='badge rounded-pill alert-warning'>Shipping</span>";
        			    if($rs3["status"]==6) $status="<span class='badge rounded-pill alert-success'>Closed/Delivered</span>";
        			    if($rs3["status"]==7) $status="<span class='badge rounded-pill alert-danger'>Returned</span>";
        			    if($rs3["status"]==8) $status="<span class='badge rounded-pill alert-danger'>Cancelled</span>";
        			    if($rs3["status"]==9) $status="<span class='badge rounded-pill alert-default'>Archived</span>";
                        echo"<tr>
                            <td><a id='".$rs3["oid"]."'>".$rs3["oid"]."</a></td>
                            <td>$od</td>
                            <td><b>$customerid</b></td>
                            <td>$cphone</td>
                            <td>$pmwhat</td>
                            <td>$status</td>
                            <td align=right>$csymbol ".$rs3["ctotal"]."</td>
                            <td class='text-end'>
                                <a href='#top' class='btn btn-md rounded font-sm' onclick=\"shiftdataV2('order_detail.php?oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&sheba=order_list&blist=$orderx', 'datashiftX')\">Detail</a>
                                <div class='dropdown'>
                                    <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                                    <div class='dropdown-menu'>";
                                        if($rs3["status"]==2) echo"<a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=3' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Notify Supplier</a>";
                        			    if($rs3["status"]==3) echo"<a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=4' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Send to QC</a>";
                        			    if($rs3["status"]==4) echo"<a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=5' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Send to Packing & Shipping</a>";
                        			    if($rs3["status"]==5) echo"<a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=6' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Closed/Delivered</a>";
                        			    if($rs3["status"]>=5) echo"<a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=2' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Set Back to Pending</a>";
                        			    echo"<hr><a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=7' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Return Order</a>";
                        			    echo"<a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=8' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Cancel Order</a>";
                        			    echo"<a class='dropdown-item' href='orderprocessor.php?processor=statusupdate&oid=".$rs3["oid"]."&cid=".$rs3["cid"]."&tamt=$totalvalue&statusupdate=9' target='dataprocessor' onblur=\"shiftdataV2('order_list.php?blist=$orderx', 'datashiftX')\">Archive Order</a>";
                        			    echo"<hr><a class='dropdown-item' href='#' target='dataprocessor' onclick=\"shiftdataV2('order_detatil.php?oid=".$rs3["oid"]."&sheba=order_list&blist=$orderx#".$rs3["oid"]."', 'datashiftX')\">Print Invoice</a>";
                                    echo"</div>
                                </div>
                            </td>
                        </tr>";
                        
                    } }    
                echo"</tbody>
            </table>
        </div>
    </div>";
?>