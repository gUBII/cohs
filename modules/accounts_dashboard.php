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
    $vmd=date("Y-m", $cdate);
    $vyd=date("Y", $cdate);
    $cdate=date("d-m-Y", $cdate);
    
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
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> Accounts Dashboard</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=accounts_dashboard.php&id=55'>Accounts</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=accounts_dashboard.php&id=55'>Dashboard</a></li>                            
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
                        <span style='font0-size:15pt'>Quickly access your Account - Receive, Payment, Journal, Income, Expense</span>
                    </div>
                </div>
            </div>
            
            <div class='row'>
                <div class='mb-5'>
                    <div class='row g-2'>
                        
                        <div class='col-12 col-sm-6 col-lg-3'>                            
                            <div class='card sh-13' data-title='Receipt Vouchers' data-intro='Click see detail.' data-step='1'><a href='index.php?url=receipt_voucher.php&id=000&sourcefrom=$sourcefrom'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px;margin-top:18px'>                                        
                                        <h2 class='small-title'>Total Received</h2>
                                        <span style='font-size:15pt'>$csymbol $totalreceived ($ccode)</span>
                                    </div>
                                </div>
                            </a></div>
                        </div>
                    
                        <div class='col-12 col-sm-6 col-lg-3'>                            
                            <div class='card sh-13' data-title='Payment Vouchers' data-intro='Click see detail.' data-step='2'><a href='index.php?url=payment_voucher.php&id=000&sourcefrom=$sourcefrom'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px;margin-top:18px'>                                        
                                        <h2 class='small-title'>Total Paid</h2>
                                        <span style='font-size:15pt'>$csymbol $totalpaid ($ccode)</span>
                                    </div>
                                </div>
                            </a></div>
                        </div>

                        <div class='col-12 col-sm-6 col-lg-3'>                            
                            <div class='card sh-13' data-title='Today`s Receivings' data-intro='Click see detail.' data-step='3'><a href='index.php?url=receipt_voucher.php&id=000&sourcefrom=$sourcefrom'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px;margin-top:18px'>                                        
                                        <h2 class='small-title'>Today's Receivings</h2>
                                        <span style='font-size:15pt'>$csymbol $todayreceived ($ccode)</span>
                                    </div>
                                </div>
                            </a></div>
                        </div>

                        <div class='col-12 col-sm-6 col-lg-3'>
                            <div class='card sh-13' data-title='Today`s Payments' data-intro='Click see detail.' data-step='4'><a href='index.php?url=payment_voucher.php&id=000&sourcefrom=$sourcefrom'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px;margin-top:18px;line-height:0.5'>                                        
                                        <h2 class='small-title'>Today's Payments</h2>
                                        <span style='font-size:15pt'>$csymbol $todaypaid ($ccode)</span>
                                    </div>
                                </div>
                            </a></div>
                        </div>
                        
                    </div>
                </div>

                <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='customHorizontalTooltipTitle'>
                        <h2 class='small-title'>Yearly Received & Payment Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-40'>
                                    <iframe name='chart_accounts' src='./modules/accounts_chart.php?c=line&v=Y&vy=$vyd' scrolling='no' border='0' frameborder='0' width='100%' height='330'>BROWSER NOT SUPPORTED</iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='customHorizontalTooltipTitle'>
                        <h2 class='small-title'>Monthly Received & Payment Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-40'>
                                    <iframe name='chart_accounts' src='./modules/accounts_chart.php?c=line&v=M&vm=$vmd' scrolling='no' border='0' frameborder='0' width='100%' height='330'>BROWSER NOT SUPPORTED</iframe>
                                </div>
                            </div>
                        </div>
                    </section>  
                </div>




                <div class='col-12 col-xl-12>
                    <section class='scroll-section' id='labels'>
                                <h2 class='small-title'>Last 5 Payment Vouchers</h2><br>
                                <div class='card-body pt-0 pb-0 h-100'>
                                    <div class='data-table-rows slim' id='sample'>
                                        <div class='data-table-responsive-wrapper'>
                                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                                                <thead><tr>                                                    
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Receipt No.</th>
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Date</th>
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Income Note</th>                                                    
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Ledger ID</th>
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Amount</th>
                                                </tr></thead>
                                                <tbody>
                                                    <div class='card-body' style='margin-top:-65px;width:100%'>";
                                                        $sheba=$_GET["sheba"];             
                                                        $title="Edit Received Voucher";
                                                        $bc=0;
                                                        $bcolor="#000000";
                                                        $s1 = "select * from receipt_voucher order by id asc limit 5";
                                                        $r1 = $conn->query($s1);
                                                        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                                            $lastid=$rs1["id"];
                                                            $rand=rand(100,999);                
                                                            $ledgername="0";
                                                            $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                                            $r1b = $conn->query($s1b);
                                                            if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                                            if($ledgername=="0"){
                                                                $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                                                $r1bc = $conn->query($s1bc);
                                                                if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                                            }
                                                            $receivedfromname="";
                                                            $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                                            $r1c = $conn->query($s1c);
                                                            if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                                                            
                                                            $rdate=date("d-m-Y",$rs1["receipt_date"]);
                                                            
                                                            echo"<tr class='zoom' style='width:100%'>
                                                                <td class='text-alternate' align=left>".$rs1["receipt_no"]."</td>
                                                                <td class='text-alternate' align=left>$rdate</td>
                                                                <td class='text-alternate' align=left>".$rs1["invoice_no2"]."-".$rs1["invoice_no"]."</td>
                                                                <td class='text-alternate' align=left>$ledgername</td>                    
                                                                <td class='text-alternate' align=right>$csymbol".$rs1["cr_amt"]."</td>
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

                <div class='col-12 col-xl-12>
                    <section class='scroll-section' id='labels'>
                                <h2 class='small-title'>Last 5 Received Vouchers</h2><br>
                                <div class='card-body pt-0 pb-0 h-100'>
                                    <div class='data-table-rows slim' id='sample'>
                                        <div class='data-table-responsive-wrapper'>
                                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                                                <thead><tr>
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Payment No.</th>
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Date</th>
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Payment Note</th>                                                    
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Ledger ID</th>
                                                    <th class='text-muted text-small text-uppercase' style='text-align:center'>Amount</th>                
                                                </tr></thead>
                                                <tbody>
                                                    <div class='card-body' style='margin-top:-65px;width:100%'>";
                                                        $sheba=$_GET["sheba"];             
                                                        $title="Edit Received Voucher";
                                                        $bc=0;
                                                        $bcolor="#000000";
                                                        $s1 = "select * from receipt_voucher order by id desc limit 5";
                                                        $r1 = $conn->query($s1);
                                                        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                                            $lastid=$rs1["id"];
                                                            $rand=rand(100,999);                
                                                            $ledgername="0";
                                                            $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                                            $r1b = $conn->query($s1b);
                                                            if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                                            if($ledgername=="0"){
                                                                $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                                                $r1bc = $conn->query($s1bc);
                                                                if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                                            }
                                                            $receivedfromname="";
                                                            $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                                            $r1c = $conn->query($s1c);
                                                            if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                                                            
                                                            $rdate=date("d-m-Y",$rs1["receipt_date"]);
                                                            
                                                            echo"<tr class='zoom' style='width:100%'>
                                                                <td class='text-alternate' align=left>".$rs1["receipt_no"]."</td>
                                                                <td class='text-alternate' align=left>$rdate</td>
                                                                <td class='text-alternate' align=left>".$rs1["invoice_no2"]."-".$rs1["invoice_no"]."</td>
                                                                <td class='text-alternate' align=left>$ledgername</td>                    
                                                                <td class='text-alternate' align=right>$csymbol".$rs1["cr_amt"]."</td>
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