<?php
    
    $sheba="payment_voucher";
    $cid=6;
    $title="Add New Payment Voucher";
    
    echo"<div class='row'>
        <div class='col-8 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Payroll Report</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Accounts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>Pay Slips</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-4 col-md-7 d-flex align-items-start justify-content-end'>
        
            <div class='d-inline-block float-md-start me-1 mb-1 search-input-container border border-separator bg-foreground search-sm'>
                <input class='form-control form-control-sm datatable-search' onkeyup='myFunction()' placeholder='Search' data-datatable='#datatableStripe' id='myInput' style='width:100%'/>
                <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span><span class='search-delete-icon d-none'><i data-acorn-icon='close'></i></span>                
            </div>
            
        </div>                  
    </div>
    
    <div class='data-table-rows slim' id='sample'>";
        
        $s7 = "select * from theme where id='1' order by id asc limit 1";
        $r7 = $conn->query($s7);
        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
            $topbar_color=$rs7["topbar_color"];
            $tbtc=$rs7["topbar_text_color"];
        } }
        if(isset($_GET["dfrom"])){ 
            $todaydate1=$_GET["dfrom"];
        }else{
            $ttime=time();
            $todaydate1=date("Y-m-d", $ttime);
        }
        if(isset($_GET["dto"])){ 
            $todaydate2=$_GET["dto"];
        }else{
            $ttime=time();
            $todaydate2=date("Y-m-d", $ttime);
        }
        
        if(isset($_GET["estatus"])){
            $estatus=$_GET["estatus"];
            if($_GET["estatus"]==1) $evalue="Approved";
            else $evalue="Pending";
        } else{
            $estatus=0;
            $evalue="Pending";
        }
        
        $totaldr=0;
        echo"<form method=get name=ep action='index.php'><input type=hidden name=url value='".$_GET["url"]."'><input type=hidden name=pointer value='".$_GET["id"]."'>
            <div class='row m-b-lg m-t-lg'>
                <div class='col-6 col-md-3'>Date from:<br><input type=date value='$todaydate1' class='form-control' name=dfrom style='width:100%'></div>
                <div class='col-6 col-md-3'>Date To:<br><input type=date value='$todaydate2' class='form-control' name=dto></div>
                <div class='col-6 col-md-3'>Account Name:<br>
                    <select class='form-control' name='src_employeeid' required>";
                        if($designationy==13){
                            if(isset($_GET["src_employeeid"])){
                                $s77 = "select * from uerp_user where id='".$_GET["src_employeeid"]."' order by id asc";
                                $r77 = $conn->query($s77);
                                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) { echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>"; } }
                            }else{
                                echo"<option value=''>Select Employee</option>";
                            }
                            echo"<option value='0'>View All Employee</option>";
                            $s7 = "select * from uerp_user where mtype='USER' and status='1' or mtype='ADMIN' and status='1' order by username asc";
                        }else{
                            $s7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by username asc";
                        }
                        $r7 = $conn->query($s7);
                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                        } }
                    echo"</select>
                </div>
                <div class='col-6 col-md-3'>&nbsp;<br>
                    <input type=submit class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' value='Search'>
                </div>
            </div>    
        </form>
        <hr>
        <div class='data-table-responsive-wrapper'>
            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                <tr>
                    <th onclick='sortTable(1)'>Payroll Date. <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th onclick='sortTable(2)'>Payslip ID <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th onclick='sortTable(3)'>Account Name <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th onclick='sortTable(4)'>Total Paid Amount <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th style='text-align:center' colspan=10></th>
                </tr></thead>
                <tbody>";
                
                // echo"[ ".$_GET["src_employeeid"]." - ".$_GET["dfrom"]." - ".$_GET["dto"]." ]";
                
                if(strlen($_GET["dfrom"])>=5 AND strlen($_GET["dto"])>=5){
                    
                    $datefrom=date('d-m-Y', strtotime($_GET["dfrom"]));
                    $dfromv=date('Y-m-d 00:01:00', strtotime($_GET["dfrom"] . ' -1 day'));
                    $dfromv=strtotime($dfromv);
                    $dateto=date('d-m-Y', strtotime($_GET["dto"]));
                    $dtov=date('Y-m-d 00:01:00', strtotime($_GET["dto"] . ' +1 day'));
                    $dtov=strtotime($dtov);
                        
                    $globalpaid=0;
                        
                    if($designationy==13){
                        if($_GET["src_employeeid"]==0) $s = "select * from payment_voucher where payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no<>'0' group by invoice_no";
                        else  $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no<>'0' group by invoice_no";
                    }else{
                        $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no<>'0' group by invoice_no";
                    }
                    $r = $conn->query($s);
                    if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                        
                        $totpaid=0;
                        if($mtype=="ADMIN"){
                            if($_GET["src_employeeid"]=="0") $s1 = "select * from payment_voucher where payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no='".$rs["invoice_no"]."' order by invoice_no"; 
                            else $s1 = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no='".$rs["invoice_no"]."' order by invoice_no";
                        }else{
                            $s1 = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no='".$rs["invoice_no"]."' order by invoice_no";
                        }
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["dr_amt"]+$totpaid); } }
                            
                        $globalpaid=($globalpaid+$totpaid);
                            
                        $pdate="";    
                        $pdate=date("d-M-Y",$rs["payment_date"]);
                                
                        $clientname="";
                        $r1x = "select * from uerp_user where id='".$rs["paid_to"]."' order by id asc limit 1";
                        $r1y = $conn->query($r1x);
                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname="".$r1z["username"]." ".$r1z["username2"].""; } }
                            
                        $employeename="";
                        $r2x = "select * from uerp_user where id='".$rs["employeeid"]."' order by id asc limit 1";
                        $r2y = $conn->query($r2x);
                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                            $employeename="".$r2z["username"]." ".$r2z["username2"]."";
                            $employeeaddress="".$r2z["address"].", ".$r2z["city"].", ".$r2z["area"].", ".$r2z["zip"].", ".$r2z["country"]."";
                            $employeephone=$r2z["phone"];
                        } }
                            
                        $myexperienceX="myexperienceX".$rs["id"]."";
                        $myexperienceY="myexperienceY".$rs["id"]."";
                        $myexperienceYY="myexperienceYY".$rs["id"]."";
                        
                        
                        echo"<tr>
                            <td align='left' style='font-size:10pt'>$pdate</td>
                            <td align='center' style='font-size:10pt'>".$rs["invoice_no"]."</td>
                            <td align='left' style='font-size:10pt'>$employeename</td>
                            <td align='right' style='font-size:12pt'><b>";
                                $payable = sprintf("$%.2f", $totpaid);
                                $totpaidx = sprintf("$%.2f", $totpaid);
                                echo $totalpaidx;
                            echo"</td>
                            <td align='center' style='font-size:10pt'>
                                <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='modal' data-bs-target='#$myexperienceY'><i class='fa fa-eye'></i></a>
                            </td>
                            <td align='center' style='font-size:10pt'>
                                <a href='#' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' onclick=\"printDiv('$myexperienceYY')\"><i class='fa fa-print'></i></a>
                            </td>
                            <td align='center' style='font-size:10pt'>
                                <form id='form' method='get' class='wizard-big' action='excel/payslip2pdf.php' target='dataprocessor' name='outputform' enctype='multipart/form-data'> 
                                    <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                    <input type=hidden name='dfrom' value='".$_GET["dfrom"]."'>
                                    <input type=hidden name='dto' value='".$_GET["dto"]."'>
                                    <input type=submit value='PDF' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' onmouseover=\"document.outputform.pointer.value='PDF'\">
                                    <input type=hidden name='url' value='reporting-forms'><input type=hidden name='kroyee' value='payslip-reports'>
                                    <input type=hidden name='sheba' value='1708323155'><input type=hidden name='pointer' value=''>
                                </form>
                                
                                <div class='modal fade' id='$myexperienceY' tabindex='-1' role='dialog' aria-hidden='true'>
                                    <div class='modal-dialog modal-semi-full modal-dialog-scrollable modal-dialog-centered'>
                                        <div class='modal-content'>
                                            <div class='modal-header' style='padding:10px'>
                                                <h5 class='modal-title' id='overlayScrollShortLabel'>Pay Slip Report</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body' style='padding:10px'>
                                                <div class='scroll-track-visible' id='$myexperienceYY'>
                                                    <table style='width:100%;padding:10px;border-width:0px'>
                                                        <tr >
                                                            <td style='width:50%' align=left><img src='$logo_dark' style='width:100px'><br></td>
                                                            <td align=right style='font-size:8pt;width:50%'>
                                                                <b>$companynamex</b><br>ABN: $abn_number<br>
                                                                $addressx, $cityx, $statex-$postalcodex, $countryx<br>
                                                                Email: $emailx<br>Phone: $phonex
                                                            </td>
                                                        </tr><tr>
                                                            <td align=left style='font-size:8pt;width:50%'><br><b>$employeename</b><br>$employeeaddress<br>$employeephone</td>
                                                            <td style='width:50%' align=right>
                                                                <table>
                                                                    <tr><td style='font-size:8pt' align=right>Payment Date</td><td style='font-size:8pt'>:</td><td style='font-size:8pt' align=right  nowrap><b>$pdate</b></td></tr>
                                                                    <tr><td style='font-size:8pt' align=right>Gross Earning</td><td style='font-size:8pt'>:</td><td style='font-size:8pt' align=right><b>$payable</b></td></tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table><hr>
                                                        
                                                    <table style='width:100%'>
                                                        <thead><tr>
                                                            <td align=left nowrap style='font-size:8pt'><b>Shift ID</b></td>
                                                            <td align=left style='font-size:8pt'><b>Particulars</b></td>
                                                            <td align=right nowrap style='font-size:8pt'><b>Paid Amount</b></td>
                                                        </tr></thead>
                                                        <tbody>";
                                                            $s3 = "select * from payment_voucher where employeeid='".$rs["employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no='".$rs["invoice_no"]."' order by invoice_no";
                                                            $r3 = $conn->query($s3);
                                                            if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
                                                                $paidamount=($dr_amt+$paidamount);
                                                                echo"<tr>
                                                                    <td align=left nowrap valign=top style='font-size:8pt'><b>".$rs3["invoice_no"]."-".$rs3["payroll_id"]."</b></td>
                                                                    <td align=left style='font-size:8pt;max-width:200px;'>";
                                                                        $s4 = "select * from shifting_allocation where id='".$rs3["payroll_id"]."' order by id desc limit 1";
                                                                        $r4 = $conn->query($s4);
                                                                        if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) { 
                                                                            $sdate="";
                                                                            $sdate=date("l, d-m-Y", $rs4["sdate"]);
                                                                            $thw=$rs4["sdate"];
                                                                            $tow=$rs4["sdate"];
                                                                            
                                                                            echo"<span style='font-size:8pt'>$sdate</span><br>";
                                                                        } }
                                                                    echo"".$rs3["narration"]."</td>
                                                                    <td align=right nowrap valign=top style='font-size:10pt'><b>$".$rs3["dr_amt"]."</b></td>
                                                                </tr>";
                                                            } }
                                                            echo"<tr><td align=left style='font-size:8pt' colspan=5><hr></td></tr>
                                                            <tr>
                                                                <td align=left style='font-size:8pt'></td>
                                                                <td align=right style='font-size:8pt'><b>Total Paid :</b></td>
                                                                <td align=right style='font-size:10pt'><b>$payable</b></td>
                                                            </tr>
                                                            <tr><td align=left style='font-size:8pt' colspan=5><hr></td></tr>
                                                        </tbody>
                                                    </table>
                                            </div></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>";
                        echo"<div class='modal inmodal' id='$myexperienceX' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog'><div class='modal-content animated bounceInUp'>Note:<br>".$rs["narration"]."</div></div>
                        </div>";
                    } }
                    
                    echo"<tr style='background-color:black;color:white'>
                        <td align='right' style='font-size:12pt' colspan=4><b>Total Paid from $datefrom to $dateto:</td>
                        <td align='right' style='font-size:14pt;text-align:right'><b>";
                            // setlocale(LC_MONETARY, 'en_AU.UTF-8');
                            // $globalpaid1= money_format('%.2n', $globalpaid);
                            echo"$globalpaid</b>
                        </td>
                        <td>&nbsp;</td>
                    </tr>";
                }
                echo"</tbody>
            </table>
        </div>
    </div>";    
?> 