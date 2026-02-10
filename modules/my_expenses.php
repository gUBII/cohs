<?php
    
    $sheba="payment_voucher";
    $cid=6;
    $title="Add New Expense";
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>My Expenses</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Accounts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>My Expenses</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
        
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
                            else if($_GET["estatus"]==3) $evalue="View All";
                            else $evalue="Pending";
                        } else{
                            $estatus=0;
                            $evalue="Pending";
                        }
                         
                        $totaldr=0;
                        
                        echo"<form method=get name=ep action='index.php'><input type=hidden name=url value='".$_GET["url"]."'><input type=hidden name=pointer value='".$_GET["id"]."'><input type=hidden name=pointer value='23'>
                            <div class='row m-b-lg m-t-lg'>
                                <div class='col-6 col-md-2'>
                                    Date from:<br><input type=date value='$todaydate1' class='form-control' name=dfrom style='width:100%'>
                                </div><div class='col-6 col-md-2'>
                                    Date To:<br><input type=date value='$todaydate2' class='form-control' name=dto>
                                </div><div class='col-md-2'>
                                    Expense Status:<br>
                                    <select class='form-control' name='estatus' style='font-size:12pt;' required>
                                        <option value='$estatus'>$evalue</option>
                                        <option value='3'>View All</option>
                                        <option value='1'>APPROVED</option>
                                        <option value='0'>PENDING</option>
                                    </select>
                                </div><div class='col-6 col-md-3'>
                                    Account Name:<br>
                                    <select class='form-control' name='src_employeeid' style='font-size:12pt;' required>";
                                        if($designationy==13){
                                            if(isset($_GET["src_employeeid"])){
                                                $s77 = "select * from uerp_user where id='".$_GET["src_employeeid"]."' order by id asc";
                                                $r77 = $conn->query($s77);
                                                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) { echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>"; } }
                                            }else{
                                                echo"<option value=''>Select Employee</option>";
                                            }
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
                                <div class='col-6 col-md-1'>&nbsp;<br>
                                    <input name='src_clientid' value='0' type='hidden'>
                                    <input type=submit class= btn btn-warning' value='Search' style='background-color:orange'>
                                </div>
                                <div class='col-6 col-md-1'>&nbsp;<br>
                                    <input type=button class=' btn btn-success' value='Add Expense' data-bs-toggle='modal' data-bs-target='#myexperience' style='background-color:#1AB394;margin-top:0px;color:white'>
                                </div>
                            </div>    
                        </form><hr>
                        
                        <div class='data-table-responsive-wrapper'>
                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:90%'>
                                <thead>
                                    <tr>
                                        <th onclick='sortTable(1)'>Date <i data-acorn-icon='sort' style='height:12px'></i></th>";
                                        if($designationy==13) echo"<th onclick='sortTable(2)'>Employee Name <i data-acorn-icon='sort' style='height:12px'></i></th>";
                                        echo"<th onclick='sortTable(3)'>Client Name <i data-acorn-icon='sort' style='height:12px'></i></th>
                                        <th onclick='sortTable(4)'>Note & Slip <i data-acorn-icon='sort' style='height:12px'></i></th>
                                        <th onclick='sortTable(6)'>Amount <i data-acorn-icon='sort' style='height:12px'></i></th>
                                        <th >Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            
                                    if(strlen($_GET["dfrom"])>=5 AND strlen($_GET["dto"])>=5){
                                        $dfromv=date('Y-m-d 00:01:00', strtotime($_GET["dfrom"] . ' -1 day'));
                                        $dfromv=strtotime($dfromv);
                                        $dtov=date('Y-m-d 00:01:00', strtotime($_GET["dto"] . ' +1 day'));
                                        $dtov=strtotime($dtov);
                                    }
                                        
                                    $dfromv1=date("d-m-Y", $dfromv);
                                    $dtov1=date("d-m-Y", $dtov);
                                    echo"Showing Result From $dfromv1 to $dtov1";
                                    
                                    if($designationy==13){
                                        if($_GET["estatus"]==3){
                                            if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and payroll_id='0' order by payment_date asc";
                                        	else $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                        }else{
                                            if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='$estatus' and payroll_id='0' order by payment_date asc";
                                        	else $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='$estatus' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                        }
                                    }else{
                                        if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='$estatus' and payroll_id='0' order by payment_date asc";
                                        else $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='$estatus' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                    }
                                    
                                    $r = $conn->query($s);
                                    if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                        $date=date("d-M-Y",$rs["payment_date"]);
                                        
                                        $clientname="";
                                        $r1x = "select * from uerp_user where id='".$rs["ledger_id"]."' order by id asc limit 1";
                                        $r1y = $conn->query($r1x);
                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname="".$r1z["username"]." ".$r1z["username2"].""; } }
                                        
                                        $employeename="";
                                        $r6 = "select * from uerp_user where id='".$rs["employeeid"]."' order by id asc limit 1";
                                        $r66 = $conn->query($r6);
                                        if ($r66->num_rows > 0) { while($r666 = $r66 -> fetch_assoc()) { $employeename="".$r666["username"]." ".$r666["username2"].""; } }
                                        
                                        $myexperienceX="myexperienceX".$rs["id"]."";
                                        $myexperienceY="myexperienceY".$rs["id"]."";
                                        $totaldr=($rs["dr_amt"]+$totaldr);
                                        
                                        echo"<tr>";
                                            // <td align=left style='font-size:10pt' nowrap>".$rs["payment_no"]."</td>
                                            echo"<td align=left style='font-size:10pt' nowrap>$date</td>";
                                            if($designationy==13) echo"<td align=left style='font-size:10pt' nowrap>$employeename</td>";
                                            echo"<td align=left style='font-size:10pt' nowrap>$clientname</td>
                                            <td align=center style='font-size:10pt' nowrap>
                                                <a href='#' class='btn ' data-bs-toggle='modal' data-bs-target='#$myexperienceX' style='margin-top:0px;color:$topbar_color'><i class='fa fa-eye'></i></a> | 
                                                <a href='#' class='btn ' data-bs-toggle='modal' data-bs-target='#$myexperienceY' style='margin-top:0px;color:$topbar_color'><i class='fa fa-eye'></i></a>
                                            </td>
                                            <td align=right style='font-size:10pt;' nowrap><b>$".$rs["dr_amt"]."</b></td>
                                            <td align=center style='font-size:10pt;width:200px' nowrap>";
                                                if($rs["approve1"]==0){
                                                    echo"Pending Approval<br>";
                                                    if($mtype=="ADMIN") echo"<a href='accountsprocessor.php?processor=expenseapprove&aid=".$rs["id"]."&dfrom=".$_GET["dfrom"]."&dto=".$_GET["dto"]."&src_employeeid=".$_GET["src_employeeid"]."&src_clientid=".$_GET["src_clientid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."&estatus=".$_GET["estatus"]."' class='btn' target='dataprocessor' style='margin-top:0px;color:green;font-size:12pt'><i class='fa fa-thumbs-up' style='color:yellow' title='Approve'></i></a> | ";
                                                    echo"<a href='deleterecords.php?delid=".$rs["id"]."&tbl=payment_voucher&dfrom=".$_GET["dfrom"]."&dto=".$_GET["dto"]."&src_employeeid=".$_GET["src_employeeid"]."&src_clientid=".$_GET["src_clientid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."&estatus=".$_GET["estatus"]."' class='btn' target='dataprocessor' style='margin-top:0px;;font-size:12pt' title='Delete'><i class='fa fa-remove' style='color:red'></i></a>";
                                                }else{
                                                    echo"Approved<br>";
                                                    if($mtype="ADMIN"){
                                                        echo"<a href='deleterecords.php?delid=".$rs["id"]."&tbl=payment_voucher&dfrom=".$_GET["dfrom"]."&dto=".$_GET["dto"]."&src_employeeid=".$_GET["src_employeeid"]."&src_clientid=".$_GET["src_clientid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."&estatus=".$_GET["estatus"]."' class='btn' target='dataprocessor' style='margin-top:0px;color:red;font-size:12pt' title='Delete'><i class='fa fa-remove' style='color:red'></i></a> 
                                                        | <a href='accountsprocessor.php?processor=expenseunapprove&aid=".$rs["id"]."&dfrom=".$_GET["dfrom"]."&dto=".$_GET["dto"]."&src_employeeid=".$_GET["src_employeeid"]."&src_clientid=".$_GET["src_clientid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."&estatus=".$_GET["estatus"]."' class='btn' target='dataprocessor' style='margin-top:0px;color:green;font-size:12pt' title='Unapprove'><i class='fa fa-thumbs-down' style='color:yellow'></i></a>";
                                                    }
                                                }
                                            echo"</td>
                                        </tr>
                                        
                                        <div class='modal inmodal' id='$myexperienceX' tabindex='-1' role='dialog' aria-hidden='true'>
                                            <div class='modal-dialog'><div class='modal-content animated bounceInUp' style='padding:20px'><b>Note:</b><br>".$rs["narration"]."</div></div>
                                        </div>
                                        <div class='modal inmodal' id='$myexperienceY' tabindex='-1' role='dialog' aria-hidden='true'>
                                            <div class='modal-dialog'><div class='modal-content animated bounceInUp'><img src='".$rs["image"]."' style='width:100%'></div></div>
                                        </div>";
                                        
                                    } }
                                    
                                    $payable=0;
                                    // setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                    // $payable= money_format('%.2n', $totaldr);
                                    $payable=$totaldr;
                                echo"</tbody>
                            </table>
                        </div>
                        <table width='100%'><tr><td align=center style='font-size:12pt'> <b>Total Expense: $payable</b></td></tr></table><hr>
    </div>";
    
    $today=time();
    $today=date("Y-m-d", $today); 
    // modal bars
    echo"<div class='modal fade' id='myexperience' tabindex='-1' role='dialog' aria-labelledby='CenterPageModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='verticallyCenteredScrollableLabel'>Daily Expense Entry</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form class='m-t' role='form' method='post' action='accountsprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
    				    <input name='idd' type='hidden' value='$userid'><input name='imageposition' type='hidden' value='2'>
    				    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'>
                        <input type='hidden' name='processor' value='expenseimage'><input type='hidden' name='pointer' value='".$_GET["pointer"]."'>
                        <input type='hidden' name='url' value='".$_GET["url"]."'><input type='hidden' name='id' value='".$_GET["id"]."'>
                        
                        <input type='hidden' name='dfrom' value='".$_GET["dfrom"]."'><input type='hidden' name='dto' value='".$_GET["dto"]."'>
                        <input type='hidden' name='estatus' value='".$_GET["estatus"]."'><input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                        <input type='hidden' name='src_clientid' value='".$_GET["src_clientid"]."'>
                        
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-6'><div class='form-group'>
                                    <label>Select Client Name</label><select class='form-control' name='cname' required>
                                    <option value=''>Select Client</option>";
                                        if($mtype=="ADMIN"){
                                            $r1x = "select * from uerp_user where mtype='CLIENT' order by username asc";
                                            $r1y = $conn->query($r1x);
                                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                                echo"<option value='".$r1z["id"]."'>".$r1z["username"]." ".$r1z["username2"]."</option>";
                                            } }
                                        }else{
                                            $s7 = "select * from project_team_allocation where employeeid='$userid' order by id asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                                $r71 = $conn->query($s71);
                                                if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                    $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                    $r72 = $conn->query($s72);
                                                    if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                        echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                    } }
                                                } }
                                            } }
                                        }
                                    echo"</select>
                                </div></div>
                                <div class='col-md-6'><div class='form-group'>
                                    <label>Expense Amount</label><input name='amount' type='text' value='' class='form-control' required>
                                </div></div>
                                <div class='col-md-6'><div class='form-group'>
                                    <label>Date</label><input name='date' type='date' value='$today' class='form-control' required>
                                </div></div>
                                <div class='col-md-6'><div class='form-group'>
                                    <label>Expense Slip</label>
                                    <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                                </div></div>
                                <div class='col-md-12'><div class='form-group'>
                                    <label>Note</label><textarea id='summernote' name='note' class='form-control'></textarea>
                                </div></div>
                                
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <input type='reset' class='btn btn-tertiary' value='Reset'>
                            <input type='submit' class='btn btn-primary' value='Save'>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>";
    
    // if($_GET["pointer"]!="23") echo"<a href='index.php?smsbd=daily-expenses&pointer=23'>View All Expenses</a>";
?> 