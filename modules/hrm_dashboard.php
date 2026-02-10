<!DOCTYPE html>
<html lang='en' data-footer='true' data-scrollspy='true'>
  <head>
    <meta charset='UTF-8' />
    <link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='font/CS-Interface/style.css' />
    <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='css/styles.css' />
    <link rel='stylesheet' href='css/main.css' />
    <script src='js/base/loader.js'></script>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
  </head>

<?php
    
    error_reporting(0);
    $cdate=time();
    $cdate=date("d-m-Y", $cdate);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;
    
    date_default_timezone_set("Australia/Sydney");
	
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;
    
    date_default_timezone_set("Australia/Sydney");
	
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    $totalreceived=0.00;
    $rv1 = "select * from receipt_voucher where status='ON' order by id asc";
    $rv2 = $conn->query($rv1);
    if ($rv2->num_rows > 0) { while($rv3 = $rv2->fetch_assoc()) { $totalreceived=($totalreceived+$rv3["cr_amt"]); } }
    $totalreceived= number_format($totalreceived,2,".",",");
    
    $todayreceived=0.00;
    $rv4 = "select * from receipt_voucher where status='ON' and receipt_date>='$timestamp' order by id asc";
    $rv5 = $conn->query($rv4);
    if ($rv5->num_rows > 0) { while($rv6 = $rv5->fetch_assoc()) { $todayreceived=($todayreceived+$rv6["cr_amt"]); } }
    $todayreceived= number_format($todayreceived,2,".",",");


    $totalpaid=0.00;
    $pv1 = "select * from payment_voucher where status='ON' order by id asc";
    $pv2 = $conn->query($pv1);
    if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalpaid=($totalpaid+$pv3["dr_amt"]); } }
    $totalpaid= number_format($totalpaid,2,".",",");

    $todaypaid=0.00;
    $pv4 = "select * from payment_voucher where status='ON' and payment_date>='$timestamp' order by id asc";
    $pv5 = $conn->query($pv4);
    if ($pv5->num_rows > 0) { while($pv6 = $pv5->fetch_assoc()) { $todaypaid=($todaypaid+$pv6["dr_amt"]); } }
    $todaypaid= number_format($todaypaid,2,".",",");

    echo"<div class='container'>
        <div>
            <div class='hide-area page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>HRM Dashboard</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=hrm_dashboard.php&id=55'>HRM</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=hrm_dashboard.php&id=55'>Dashboard</a></li>                            
                            </ul>
                        </nav>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='index.php?url=helpdesk.php&id=5138' style='margin-top:18px'>Need Help?</a>&nbsp;&nbsp;
                        <a href='index.php?url=feedback.php&id=5138' style='margin-top:8px'>
                          <button type='button' class='btn btn-outline-success btn-icon btn-icon-end w-100 w-sm-auto'>
                              <span>Give Feedback</span><i data-acorn-icon='question'></i>
                          </button>
                        </a>
                    </div>              
                </div>
            </div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <span style='font-size:12pt'>$welcomenote & Welcome to Nexis 365, $username $username2</span><br>
                        <span style='font0-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                    </div>
                    
                </div>
            </div>
            
            <div class='row'>
                <div class='mb-5'>
                    <div class='row g-2'>
                        <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=employees.php&id=62'>
                            <div class='card hover-border-primary' data-title='Active Projects' data-intro='Showing total active projects. click see detail.' data-step='1'>
                                <div class='card-body'>
                                    <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Total Employees</span><i data-acorn-icon='office' class='text-primary'></i>
                                </div>";
                                $aet=0;
                                $aaa1 = "select * from uerp_user where mtype='EMPLOYEE' or mtype='USER' order by id asc";
                                $aa1 = $conn->query($aaa1);
                                if ($aa1->num_rows > 0) { while($a1 = $aa1->fetch_assoc()) { $aet=($aet+1); } }
                                echo"<div class='cta-1 text-primary'>$aet</div>
                            </div>
                        </a></div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=clients.php&id=58'>
                        <div class='card hover-border-primary' data-title='Active Tasks' data-intro='Showing total active tasks. click see detail.' data-step='2'>
                            <div class='card-body'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Total Clients</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                </div>";
                                $aet=0;
                                $aaa1 = "select * from uerp_user where mtype='CLIENT' order by id asc";
                                $aa1 = $conn->query($aaa1);
                                if ($aa1->num_rows > 0) { while($a1 = $aa1->fetch_assoc()) { $aet=($aet+1); } }
                                echo"<div class='cta-1 text-primary'>$aet</div>
                            </div>
                        </div>
                    </a></div>
                    <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=clients.php&id=58'>
                        <div class='card hover-border-primary' data-title='Active Tasks' data-intro='Showing total active tasks. click see detail.' data-step='2'>
                            <div class='card-body'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Total Vendors</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                </div>";
                                $aet=0;
                                $aaa1 = "select * from uerp_user where mtype='CLIENT' order by id asc";
                                $aa1 = $conn->query($aaa1);
                                if ($aa1->num_rows > 0) { while($a1 = $aa1->fetch_assoc()) { $aet=($aet+1); } }
                                echo"<div class='cta-1 text-primary'>$aet</div>
                            </div>
                        </div>
                    </a></div>
                    <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=daily_schedules.php&id=5206'>
                        <div class='card hover-border-primary' data-title='Today`s Schedule' data-intro='Showing all rostered schedules for today and click on this link to see all schedules.' data-step='3'>
                            <div class='card-body'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Today's Absent</span><i data-acorn-icon='file-empty' class='text-primary'></i>
                                </div>
                                <div class='cta-1 text-primary'>6 <span style='color:secondary;font-size:8pt'>Reported with pre notice.</span></div>
                            </div>
                        </div>
                    </a></div>
                    <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=unpaid_invoices.php&id=5162'>
                        <div class='card hover-border-primary' >
                            <div class='card-body' data-title='Pending Invoices' data-intro='Total Pending Invoices, visit this link for notifying clients and get paid.' data-step='4'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Total On Leave</span><i data-acorn-icon='screen' class='text-primary'></i>
                                </div>
                                <div class='cta-1 text-primary'>5 <span style='font-size:10pt'>( Approved by Admin )</span></div>
                            </div>
                        </div>
                    </a></div>
                  </div>
                </div>
            </div>
            <div class=row>  
                <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='labels'>
                      <h2 class='small-title'>Total Leave Applications</h2><br>
                      <div class='card-body pt-0 pb-0 h-100'>
                        <div class='data-table-rows slim' id='sample'>
                          <div class='data-table-responsive-wrapper'>
                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                              <thead><tr>                                                    
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Date</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Employee Name</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Status</th>
                              </tr></thead>
                              <tbody>
                                <div class='card-body' style='margin-top:-65px;width:100%'>";
                                  $sheba=$_GET["sheba"];             
                                  $title="Edit Received Voucher";
                                  $bc=0;
                                  $bcolor="#000000";
                                  $s1 = "select * from leave_applications order by id asc limit 5";
                                  $r1 = $conn->query($s1);
                                  if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);                
                                    $ledgername="0";
                                    
                                    $receivedfromname="";
                                    $s1c = "select * from uerp_user where id='".$rs1["applicant_id"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                    
                                    $rdate=date("d-m-Y",$rs1["receipt_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                      <td class='text-alternate' align=left>$rdate</td>
                                      <td class='text-alternate' align=left>$receivedfromname</td>                    
                                      <td class='text-alternate' align=right>Pending</td>
                                    </tr>";
                                  } }
                                echo"</div>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </section>
                    <br><br>
                </div>

                <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='labels'>
                      <h2 class='small-title'>Total Pending Loan Applications</h2><br>
                      <div class='card-body pt-0 pb-0 h-100'>
                        <div class='data-table-rows slim' id='sample'>
                          <div class='data-table-responsive-wrapper'>
                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                              <thead><tr>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Date</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Applicant Name</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Loan Amount</th>                
                              </tr></thead>
                              <tbody>
                                <div class='card-body' style='margin-top:-65px;width:100%'>";
                                  $sheba=$_GET["sheba"];             
                                  $title="Edit Received Voucher";
                                  $bc=0;
                                  $bcolor="#000000";
                                  $s1 = "select * from personal_loan order by id desc";
                                  $r1 = $conn->query($s1);
                                  if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);                
                                    $ledgername="0";
                                    $receivedfromname="";
                                    $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                    
                                    $rdate=date("d-m-Y",$rs1["application_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                      <td class='text-alternate' align=left>$rdate</td>
                                      <td class='text-alternate' align=left>$receivedfromname</td>                    
                                      <td class='text-alternate' align=right>$csymbol".$rs1["amount"]."</td>
                                    </tr>";
                                  } }
                                echo"</div>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </section>
                </div> 
            </div>
            <div class=row>  
                <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='lineChartTitle'>
                      <h2 class='small-title'>Monthly Attandece Report</h2>
                      <div class='card mb-5'><div class='card-body'><div class='sh-35'data-title='Monthwise Reporded Documents' data-intro='Showing EOD, BOC, INCIDENT Submited Graph.' data-step='5'>
                      <iframe name='chart_accounts' src='./modules/users_chart.php?c=line&v=Y&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='270'>BROWSER NOT SUPPORTED</iframe>
                      </div></div></div>
                    </section>
                </div>

                <div class='col-12 col-xl-6'>

                    <div class='row gx-2'>
                        <h2 class='small-title'>DOCUMENTS REPORTED</h2>                        
                        <div class='col-4 p-10'><a href='index.php?url=eod.php&id=5200'>
                            <div class='card mb-5 sh-20 hover-border-primary' data-title='Total EOD Submitted' data-intro='Click this link for adding EOD Documents.' data-step='6'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='alarm' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Total EOD Submitted</p>";
                                    $eod=0;
                                    $eod1 = "select * from eod order by id desc";
                                    $eod2 = $conn->query($eod1);
                                    if ($eod2->num_rows > 0) { while($eod3 = $eod2->fetch_assoc()) { $eod=($eod+1); } }
                                    echo"<p class='cta-3 mb-0 text-primary'>$eod+</p>
                                </div>
                            </div>
                        </a></div><div class='col-4 p-10'><a href='index.php?url=boc.php&id=5200'>
                            <div class='card mb-5 sh-20 hover-border-primary' data-title='Total boc Submitted' data-intro='Click this link for adding boc Documents.' data-step='7'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='navigate-diagonal' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Total BOC Submitted</p>";
                                    $boc=0;
                                    $boc1 = "select * from boc order by id desc";
                                    $boc2 = $conn->query($boc1);
                                    if ($boc2->num_rows > 0) { while($boc3 = $boc2->fetch_assoc()) { $boc=($boc+1); } }
                                    echo"<p class='cta-3 mb-0 text-primary'>$boc+</p>
                                </div>
                            </a></div>
                        </a></div><div class='col-4 p-10'><a href='index.php?url=incident.php&id=5200'>
                            <div class='card mb-5 sh-20 hover-border-primary' data-title='Total Incident Submitted' data-intro='Click this link for adding Incident Documents.' data-step='8'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Incident Reported</p>";
                                    $boc=0;
                                    $boc1 = "select * from incident order by id desc";
                                    $boc2 = $conn->query($boc1);
                                    if ($boc2->num_rows > 0) { while($boc3 = $boc2->fetch_assoc()) { $boc=($boc+1); } }
                                    echo"<p class='cta-3 mb-0 text-primary'>$boc+</p>
                                </div>
                            </div>
                        </a></div><div class='col-4 p-10'><a href='index.php?url=case_notes.php&id=5200'>
                            <div class='card mb-5 sh-20 hover-border-primary' data-title='Total Case Report Submitted' data-intro='Click this link for adding Case Reports.' data-step='9'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Case Reported</p>";
                                    $boc=0;
                                    $boc1 = "select * from casenote order by id desc";
                                    $boc2 = $conn->query($boc1);
                                    if ($boc2->num_rows > 0) { while($boc3 = $boc2->fetch_assoc()) { $boc=($boc+1); } }
                                    echo"<p class='cta-3 mb-0 text-primary'>$boc (+/-)</p>
                                </div>
                            </div>
                        </a></div><div class='col-4 p-10'><a href='index.php?url=complaints.php&id=5200'>
                            <div class='card mb-5 sh-20 hover-border-primary' data-title='Total Complains Solved' data-intro='Click this link for updating Complains.' data-step='10'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Complains Solved</p>";
                                    $boc=0;
                                    $boc1 = "select * from complaintnote order by id desc";
                                    $boc2 = $conn->query($boc1);
                                    if ($boc2->num_rows > 0) { while($boc3 = $boc2->fetch_assoc()) { $boc=($boc+1); } }
                                    echo"<p class='cta-3 mb-0 text-primary'>$boc+</p>
                                </div>
                            </div>
                        </a></div><div class='col-4 p-10'><a href='index.php?url=general_forms.php&id=5200'>
                            <div class='card mb-5 sh-20 hover-border-primary' data-title='Total General Documents Submitted' data-intro='Click this link for adding General Documents.' data-step='11'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div> 
                                    <p class='mb-0 lh-1'>General Documents</p>";
                                    $boc=0;
                                    $boc1 = "select * from general_forms order by id desc";
                                    $boc2 = $conn->query($boc1);
                                    if ($boc2->num_rows > 0) { while($boc3 = $boc2->fetch_assoc()) { $boc=($boc+1); } }
                                    echo"<p class='cta-3 mb-0 text-primary'>$boc+</p>
                                </div>
                            </div>
                        </a></div>
                    </div>
                </div>
            </div>
            
            <div class=row>       
                <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='doughnutChartTitle'>
                        <h2 class='small-title'>Tasks Status Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-35' data-title='Task Status Chart' data-intro='Showing Total Tasks Status (Pending, Processing and Completed).' data-step='12'>
                                    <iframe name='chart_accounts' src='./modules/users_chart.php?c=doughnut&v=M&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='260'>BROWSER NOT SUPPORTED</iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                
                <div class='col-12 col-sm-6 col-lg-6'>
                    <section class='scroll-section' id='customHorizontalTooltipTitle'>
                        <h2 class='small-title'>Yearly Performance Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-40'>
                                    <iframe name='chart_accounts' src='hrm_chart.php?c=bar&v=Y' scrolling='no' border='0' frameborder='0' width='100%' height='330'>BROWSER NOT SUPPORTED</iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
            <div class=row>  
                
                <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='polarChartTitle'>
                      <h2 class='small-title'>Positive/Negetive Reviews Chart</h2>
                      <div class='card mb-5'>
                        <div class='card-body'>
                          <div class='sh-35'>
                            <iframe name='chart_accounts' src='modules/clients_chart.php?c=pie&v=M&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='260'>BROWSER NOT SUPPORTED</iframe>
                          </div>
                        </div>
                      </div>
                    </section>
                </div>
                  
             <div class='col-12 col-xl-6 mb-5'>
              <h2 class='small-title'>Last 5 Project/Leads</h2>
              <div class='card h-100-card'>
                <div class='card-body'>
                  <div class='scroll-out'>
                    <div class='scroll-by-count mb-n2' data-childSelector='.scroll-item' data-count='5'>";
                      $aaa1 = "select * from project where status='1' order by id asc";
                      $aa1 = $conn->query($aaa1);
                      if ($aa1->num_rows > 0) { while($a1 = $aa1->fetch_assoc()) {
                        $clientname1="";
                        $clientname2="";
                        $clientimage="";
                        $ra2 = "select * from uerp_user where id='".$a1["clientid"]."' order by id asc limit 1";
                        $rb2 = $conn->query($ra2);
                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                            $clientname1=$rab2["username"];
                            $clientname2=$rab2["username2"];
                            $clientimage=$rab2["images"];
                        } }

                        $leadername1="";
                        $leadername2="";
                        $leaderimage="";
                        $ra3 = "select * from uerp_user where id='".$a1["leaderid"]."' order by id asc limit 1";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $leadername1=$rab3["username"];
                            $leadername2=$rab3["username2"];
                            $leaderimage=$rab3["images"];
                            $ra4 = "select * from departments where id='".$rab3["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $leaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab3["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $leaderdesignation=$rab5["designation"]; } }
                            
                        } }

                        echo"<div class='mb-2 scroll-item'>
                          <div class='row g-0 sh-10 sh-sm-7'>
                            <div class='col-auto'>
                              <img src='$clientimage' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                                <div class='d-flex flex-column mb-2 mb-sm-0'>
                                  <div>".$a1["name"]." @ $clientname1 $clientname2</div>
                                  <div class='text-small text-muted'>By $leadername1 $leadername2</div>
                                </div>
                                <div class='d-flex'>
                                  <a href='client-cb-set.php?pstat=1&projectidx=".$a1["id"]."'>
                                    <button class='btn btn-outline-secondary btn-sm' type='button'>View</button>
                                    <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                      <i data-acorn-icon='more-vertical'></i>
                                    </button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>";
                      } }
                    echo"</div>
                  </div>
                </div>
              </div>
            </div>
            

                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='activityLogs'>
                      <h2 class='small-title'>Today's & Upcoming Appointments</h2>
                      <div class='card'>
                        <div class='card-body mb-n2'>";
                        $ra3 = "select * from appointments where status='1' order by id asc limit 10";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $clientname="";
                            $ra4 = "select * from uerp_user where id='".$rab3["clienid"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $clientname="".$rab4["username"]." ".$rab4["username2"].""; } }
                            $supportworker="";
                            $ra5 = "select * from uerp_user where id='".$rab3["support_worker"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $supportworker="".$rab5["username"]." ".$rab5["username2"].""; } }
                            
                            $appdate=date("d-m-y H:i:s",$rab3["date"]);

                            echo"<div class='row g-0 mb-2'>
                              <div class='col-auto'>
                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                  <div class='sh-3'><i data-acorn-icon='circle' class='text-primary align-top'></i></div>
                                </div>
                              </div>
                              <div class='col'><div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                  <div class='d-flex flex-column'>
                                    <div class='text-alternate mt-n1 lh-1-25'>".$rab3["note"]."</div>
                                    <span style='font-size:6pt'>$clientname ($supportworker)</span>
                                  </div>
                              </div></div>
                              <div class='col-auto'><div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                  <div class='text-muted ms-2 mt-n1 lh-1-25'>$appdate</div>
                              </div></div>
                            </div>";
                          } }

                        echo"</div>
                      </div>
                    </section>
                  </div>
                  
                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='activityLogs'>
                      <h2 class='small-title'>Notice Board</h2>
                      <div class='card'>
                        <div class='card-body mb-n2'>";
                        $ra3 = "select * from appointments where status='1' order by id asc limit 10";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $clientname="";
                            $ra4 = "select * from uerp_user where id='".$rab3["clienid"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $clientname="".$rab4["username"]." ".$rab4["username2"].""; } }
                            $supportworker="";
                            $ra5 = "select * from uerp_user where id='".$rab3["support_worker"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $supportworker="".$rab5["username"]." ".$rab5["username2"].""; } }
                            
                            $appdate=date("d-m-y H:i:s",$rab3["date"]);

                            echo"<div class='row g-0 mb-2'>
                              <div class='col-auto'>
                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                  <div class='sh-3'><i data-acorn-icon='circle' class='text-primary align-top'></i></div>
                                </div>
                              </div>
                              <div class='col'><div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                  <div class='d-flex flex-column'>
                                    <div class='text-alternate mt-n1 lh-1-25'>".$rab3["note"]."</div>
                                    <span style='font-size:6pt'>$clientname ($supportworker)</span>
                                  </div>
                              </div></div>
                              <div class='col-auto'><div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                  <div class='text-muted ms-2 mt-n1 lh-1-25'>$appdate</div>
                              </div></div>
                            </div>";
                          } }

                        echo"</div>
                      </div>
                    </section>
                  </div>
                  
                  
                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='tasks'>
                      <h2 class='small-title'>Tasks Status</h2>
                      <div class='card h-xl-100-card sh-40'>
                        <div class='card-body mb-n2 scroll-out h-100'>
                          <div class='scroll h-100'>";
                            $t1 = "select * from tasks where status='1' order by id desc";
                            $tt1 = $conn->query($t1);
                            if ($tt1->num_rows > 0) { while($ttt1 = $tt1->fetch_assoc()) { 
                              $t2 = "select * from uerp_user where id='".$ttt1["employeeid"]."' and status='1' order by id desc limit 1";
                              $tt2 = $conn->query($t2);
                              if ($tt2->num_rows > 0) { while($ttt2 = $tt2->fetch_assoc()) { $ename="".$ttt2["username"]." ".$ttt2["username2"].""; } }
                              $t3 = "select * from uerp_user where id='".$ttt1["clientid"]."' and status='1' order by id desc limit 1";
                              $tt3 = $conn->query($t3);
                              if ($tt3->num_rows > 0) { while($ttt3 = $tt3->fetch_assoc()) { $cname="".$ttt3["username"]." ".$ttt3["username2"].""; } }
                              
                              $tdate=date("d.m.y h:i", $rrr1['date']);
                              
                              if($rrr1['activity']==2){
                                echo"<div class='mb-2'>
                                  <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                    <input type='checkbox' class='form-check-input' checked />
                                    <span class='form-check-label d-block'>
                                      <span>".$ttt1["title"]." assigned to <b>$ename</b> for Client <b>$cname</b></span>
                                      <span class='text-muted d-block text-small mt-0'>on $tdate</span>
                                    </span>
                                  </label>
                                </div>";
                              }else{
                                echo"<div class='mb-2'>
                                  <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                    <input type='checkbox' class='form-check-input' />
                                    <span class='form-check-label d-block'>
                                      <span>".$ttt1["title"]." assigned to <b>$ename</b> for Client <b>$cname</b></span>
                                      <span class='text-muted d-block text-small mt-0'>on $tdate</span>
                                    </span>
                                  </label>
                                </div>";
                              }
                            } }
                          echo"</div>
                        </div>
                      </div>
                    </section>
                  </div>

                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='tasks'>
                      <h2 class='small-title'>User Activity Logs</h2>
                      <div class='card h-xl-100-card sh-40'>
                        <div class='card-body mb-n2 scroll-out h-100'>
                          <div class='scroll h-100'>";

                            $t=0;
                            $al1 = "select * from audit where status='1' order by id desc limit 20";
                            $al2 = $conn->query($al1);
                            if ($al2->num_rows > 0) { while($al3 = $al2->fetch_assoc()) {
                                $al1x = "select * from uerp_user where id='".$al3["sourceid"]."' order by id desc limit 1";
                                $al2x = $conn->query($al1x);
                                if ($al2x->num_rows > 0) { while($al3x = $al2x->fetch_assoc()) { $employeename="".$al3x["username"]." ".$al3x["username2"].""; } }
                                $t= rand(100000,999999);
                                $tdate=date("h:i:s a",$al3["date"]);
                                echo"<div class='timeline-item'><div class='row'>
                                    <div class='col-4 date' style='color:#$t'><i class='fa fa-coffee'></i>$tdate<br/></div>
                                    <div class='col content'>
                                        <p class='m-b-xs' style='color:#$t'><strong>$employeename</strong></p>
                                        <p>".$al3["note"]."</p>
                                    </div>
                                </div></div>";
                            } }
                            
                          echo"</div>
                        </div>
                      </div>
                    </section>
                  </div>

                  
                </div>
              </div>
            </div>

    </main>";
?>
    <script src='js/plugins/carousels.js'></script>

    <style>
    #clockContainer {
        position: relative;
        margin: auto;
        height: 200px;
        width: 200px;
        background-image: url("assets/clock.png");
        background-size: 100%;
    }
    
    #hour,
    #minute,
    #second {
        position: absolute;
        background: #EF5550;
        border-radius: 10px;
        transform-origin: bottom;
    }
    
    #hour {
        width: 1.8%;
        height: 25%;
        top: 25%;
        left: 48.85%;
        opacity: 0.8;
        background: #000000;
    }
    
    #minute {
        width: 1.6%;
        height: 30%;
        top: 19%;
        left: 48.9%;
        opacity: 0.8;
        background: #000000;
    }
    
    #second {
        width: 1%;
        height: 40%;
        top: 9%;
        left: 49.25%;
        opacity: 0.8;
        color: red;
    }
</style>
<script>
    setInterval(() => {
    d = new Date(); //object of date()
    hr = d.getHours();
    min = d.getMinutes();
    sec = d.getSeconds();
    hr_rotation = 30 * hr + min / 2; //converting current time
    min_rotation = 6 * min;
    sec_rotation = 6 * sec;
    
    hour.style.transform = `rotate(${hr_rotation}deg)`;
    minute.style.transform = `rotate(${min_rotation}deg)`;
    second.style.transform = `rotate(${sec_rotation}deg)`;
    }, 1000);
</script>