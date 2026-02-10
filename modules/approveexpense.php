<?php
	// error_reporting(0);	
	if(isset($_COOKIE["userid"])) $userid=$_COOKIE["userid"];
	if(isset($_COOKIE["track"])) $track=$_COOKIE["track"];

	if(isset($_COOKIE["userid"])){
	    echo"<!DOCTYPE html><html>";
            
            include '../authenticator.php';
            include '../head.php';
            
            echo"<body style='background-color:white'>
                <div class='card text-white bg-primary'>
                    <div class='card-body' style='height:360px'>
                            <table class='table table-striped table-bordered table-hover dataTables-example' style='width:100%;background-color:white' >
                                <tr>
                                    <th style='font-size:10pt' nowrap>ID & Date</th>
                                    <th style='font-size:10pt' nowrap>Client Name</th>
                                    <th style='text-align:center;font-size:10pt' nowrap>Note</th>
                                    <th style='text-align:center;font-size:10pt' nowrap>Slip</th>
                                    <th style='text-align:right;font-size:10pt' nowrap>Amount</th>
                                    <th style='text-align:right;font-size:10pt' nowrap>Action</th>
                                </tr>";
                                
                                $dfromv=date('Y-m-d H:i:s', strtotime($todayx=$_COOKIE["shiftingid2"]. ' -1 day'));
                                $dfromv=strtotime($dfromv);
                                $dtov=date('Y-m-d H:i:s', strtotime($_COOKIE["shiftingid3"] . ' +1 day'));
                                $dtov=strtotime($dtov);
                                
                                $dfromv1=date("d-m-Y", $dfromv);
                                $dtov1=date("d-m-Y", $dtov);
                                
                                $employeenamex="";
                                $r6 = "select * from uerp_user where id='".$_GET["src_employeeid"]."' order by id asc limit 1";
                                $r66 = $conn->query($r6);
                                if ($r66->num_rows > 0) { while($r666 = $r66 -> fetch_assoc()) {
                                    $employeenamex="".$r666["username"]." ".$r666["username2"]."";
                                } }
                                echo"<p><span style='color:black'>Showing Result of $employeenamex From $dfromv1 to $dtov1</span></p>";
                                
                                if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='0' and payroll_id='0' order by payment_date asc";
                                else $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='0' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                $r = $conn->query($s);
                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                    
                                    $date=date("d-M-Y",$rs["payment_date"]);
                                    
                                    $clientname="";
                                    $r1x = "select * from uerp_user where id='".$rs["ledger_id"]."' order by id asc limit 1";
                                    $r1y = $conn->query($r1x);
                                    if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                        $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                                    } }
                                    
                                    $employeename="";
                                    $r6 = "select * from uerp_user where id='".$rs["employeeid"]."' order by id asc limit 1";
                                    $r66 = $conn->query($r6);
                                    if ($r66->num_rows > 0) { while($r666 = $r66 -> fetch_assoc()) {
                                        $employeename="".$r666["username"]." ".$r666["username2"]."";
                                    } }
                                    
                                    $myexperienceX="myexperienceX".$rs["id"]."";
                                    $myexperienceY="myexperienceY".$rs["id"]."";
                                    $totaldr=($rs["dr_amt"]+$totaldr);
                                    
                                    echo"<tr>
                                        <td align=left style='font-size:10pt' nowrap>".$rs["payment_no"]."<BR>$date</td>
                                        <td align=left style='font-size:10pt' nowrap>$clientname</td>
                                        <td align=left style='font-size:10pt'>".$rs["narration"]."</td>";
                                        
                                        // echo"<td align=center style='font-size:10pt' nowrap><a href='#' class='btn' data-bs-toggle='modal' data-bs-target='#$myexperienceX' style='margin-top:0px;color:black'><i class='fa fa-eye'></i></a></td>";
                                        // echo"<td align=center style='font-size:10pt' nowrap><a href='#' class='btn' data-bs-toggle='modal' data-bs-target='#$myexperienceY' style='margin-top:0px;color:black'><i class='fa fa-eye'></i></a></td>";
                                        
                                        echo"<td align=center style='font-size:10pt' nowrap><a href='image_viewer.php?image_url=".$rs["image"]."' class='btn' style='margin-top:0px;color:black'><i class='fa fa-eye'></i></a></td>";
                                        
                                        
                                        echo"<td align=right style='font-size:10pt;background-color:#eeeeee;color:black' nowrap><b>$".$rs["dr_amt"]."</b></td>
                                        <td align=center style='font-size:10pt;width:200px' nowrap>
                                            Pending Approval<br>";
                                            if($mtype=="ADMIN") echo"<a href='../accountsprocessor.php?processor=expenseapprove2&aid=".$rs["id"]."&dfrom=".$_GET["dfrom"]."&dto=".$_GET["dto"]."&src_employeeid=".$_GET["src_employeeid"]."&src_clientid=".$_GET["src_clientid"]."' class='btn' target='_self' style='margin-top:0px;color:green;font-size:8pt'>APPROVE</a> | ";
                                            echo"<a href='../deleterecords.php?delid=".$rs["id"]."&tbl=payment_voucher&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&rurl=approveexpense.php' class='btn' style='margin-top:0px;color:red;font-size:8pt'>DELETE</a>
                                        </td>
                                    </tr>
                                    <div class='modal fade' id='$myexperienceX' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog modal-sm'><div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Note</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'></div>
                                    </div></div></div>
                                    
                                    <div class='modal fade' id='$myexperienceY' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog modal-sm'><div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title'>Slip</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'><img src='".$rs["image"]."' style='width:100%'></div>
                                    </div></div></div>";
                                } }
                                
                                $payable=0;
                                setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                $payable= money_format('%.2n', $totaldr);
                                
                            echo"</table>
                        </div>
                        <table width='100%'><tr><td align=right style='font-size:10pt'> <b>Total Expense: $payable</b></td></tr></table><hr>
                    </div>
                </div>";
                
                include '../scripts.php';
                
            echo"</body>
        </html>";
        
    }
    
?>