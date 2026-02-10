<!DOCTYPE html>
<html lang='en' data-footer='true' data-scrollspy='true'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <title>Nexis Charts Plugin</title>    
    <link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='`../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />
    <script src='../js/base/loader.js'></script>
  </head>

  <body><?php

        include("../include_general.php");
        
        $un="";
        $un1 = "select * from uerp_user where status='ON' order by id asc";
        $un2 = $conn->query($un1);
        if ($un2->num_rows > 0) { while($un3 = $un2->fetch_assoc()) {
            $un="".$un3["username"]." ".$un3["username2"]."";
        } }
                
        echo"[ ";
        echo $_COOKIE["dbname"];
        echo" ] - [ ";
        echo $_COOKIE["userid"];
        echo" ] - [ ";
        echo $_GET["mode"];
        echo" ] - [ ";
        echo $un;
        echo" ]<hr>";
        
        
        $r_Jan=0; $r_Feb=0; $r_Mar=0; $r_Apr=0; $r_May=0; $r_Jun=0; $r_Jul=0; $r_Aug=0; $r_Sep=0; $r_Oct=0; $r_Nov=0; $r_Dec=0;
        $p_Jan=0; $p_Feb=0; $p_Mar=0; $p_Apr=0; $p_May=0; $p_Jun=0; $p_Jul=0; $p_Aug=0; $p_Sep=0; $p_Oct=0; $p_Nov=0; $p_Dec=0;
        
        $d1=0; $d2=0; $d3=0; $d4=0; $d5=0; $d6=0; $d7=0; $d8=0; $d9=0; $d10=0;$d11=0; $d12=0; $d13=0; $d14=0; $d15=0; $d16=0;
        $d17=0; $d18=0; $d19=0; $d20=0;$d21=0; $d22=0; $d23=0; $d24=0; $d25=0; $d26=0; $d27=0;$d28=0; $d29=0; $d30=0; $d31=0;
    
        $dd1=0; $dd2=0; $dd3=0; $dd4=0; $dd5=0; $dd6=0; $dd7=0; $dd8=0; $dd9=0; $dd10=0; $dd11=0; $dd12=0; $dd13=0; $dd14=0; $dd15=0; $dd16=0;
        $dd17=0; $dd18=0; $dd19=0; $dd20=0; $dd21=0; $dd22=0; $dd23=0; $dd24=0; $dd25=0; $dd26=0; $dd27=0; $dd28=0; $dd29=0; $dd30=0; $dd31=0;
        
        // echo" ".$_GET["vm"]." - ".$_GET["vy"]." - ".$_GET["v"]." $mtype";
        
        // receipt voucers
        if($mtype=="ADMIN") $r1 = "select * from receipt_voucher where status='1' order by id asc";
        else $r1 = "select * from receipt_voucher where employeeid='".$_COOKIE["userid"]."' and status='1' order by id asc";
        $r2 = $conn->query($r1);
        if ($r2->num_rows > 0) { while($r3 = $r2->fetch_assoc()) {
            if($_GET["v"]=="M"){
                $rdate=date("d", $r3["receipt_date"]);
                $rmonth=date("Y-m", $r3["receipt_date"]);
                
                if($_GET["vm"]==$rmonth){
                    if($rdate=="01") $d1=($d1+$r3["cr_amt"]);
                    if($rdate=="02") $d2=($d2+$r3["cr_amt"]);
                    if($rdate=="03") $d3=($d3+$r3["cr_amt"]);
                    if($rdate=="04") $d4=($d4+$r3["cr_amt"]);
                    if($rdate=="05") $d5=($d5+$r3["cr_amt"]);
                    if($rdate=="06") $d6=($d6+$r3["cr_amt"]);
                    if($rdate=="07") $d7=($d7+$r3["cr_amt"]);
                    if($rdate=="08") $d8=($d8+$r3["cr_amt"]);
                    if($rdate=="09") $d9=($d9+$r3["cr_amt"]);
                    if($rdate=="10") $d10=($d10+$r3["cr_amt"]);
                    if($rdate=="11") $d11=($d11+$r3["cr_amt"]);
                    if($rdate=="12") $d12=($d12+$r3["cr_amt"]);
                    if($rdate=="13") $d13=($d13+$r3["cr_amt"]);
                    if($rdate=="14") $d14=($d14+$r3["cr_amt"]);
                    if($rdate=="15") $d15=($d15+$r3["cr_amt"]);
                    if($rdate=="16") $d16=($d16+$r3["cr_amt"]);
                    if($rdate=="17") $d17=($d17+$r3["cr_amt"]);
                    if($rdate=="18") $d18=($d18+$r3["cr_amt"]);
                    if($rdate=="19") $d19=($d19+$r3["cr_amt"]);
                    if($rdate=="20") $d20=($d20+$r3["cr_amt"]);
                    if($rdate=="21") $d21=($d21+$r3["cr_amt"]);
                    if($rdate=="22") $d22=($d22+$r3["cr_amt"]);
                    if($rdate=="23") $d23=($d23+$r3["cr_amt"]);
                    if($rdate=="24") $d24=($d24+$r3["cr_amt"]);
                    if($rdate=="25") $d25=($d25+$r3["cr_amt"]);
                    if($rdate=="26") $d26=($d26+$r3["cr_amt"]);
                    if($rdate=="27") $d27=($d27+$r3["cr_amt"]);
                    if($rdate=="28") $d28=($d28+$r3["cr_amt"]);
                    if($rdate=="29") $d29=($d29+$r3["cr_amt"]);
                    if($rdate=="30") $d30=($d30+$r3["cr_amt"]);
                    if($rdate=="31") $d31=($d31+$r3["cr_amt"]);
                }
            }else{
                
                $rdate=date("m", $r3["receipt_date"]);
                $ryear=date("Y", $r3["receipt_date"]);
                
                if($_GET["vy"]==$ryear){
                    if($rdate=="01") $r_Jan=($r_Jan+$r3["cr_amt"]);
                    if($rdate=="02") $r_Feb=($r_Feb+$r3["cr_amt"]);
                    if($rdate=="03") $r_Mar=($r_Mar+$r3["cr_amt"]);
                    if($rdate=="04") $r_Apr=($r_Apr+$r3["cr_amt"]);
                    if($rdate=="05") $r_May=($r_May+$r3["cr_amt"]);
                    if($rdate=="06") $r_Jun=($r_Jun+$r3["cr_amt"]);
                    if($rdate=="07") $r_Jul=($r_Jul+$r3["cr_amt"]);
                    if($rdate=="08") $r_Aug=($r_Aug+$r3["cr_amt"]);
                    if($rdate=="09") $r_Sep=($r_Sep+$r3["cr_amt"]);
                    if($rdate=="10") $r_Oct=($r_Oct+$r3["cr_amt"]);
                    if($rdate=="11") $r_Nov=($r_Nov+$r3["cr_amt"]);
                    if($rdate=="12") $r_Dec=($r_Dec+$r3["cr_amt"]);
                }
                
            }
        } }
        
        // payment voucers
        if($mtype=="ADMIN") $p1 = "select * from payment_voucher where status='1' OR status='ON' order by id asc";
        else $p1 = "select * from payment_voucher where employeeid='".$_COOKIE["userid"]."' and status='1' AND employeeid='".$_COOKIE["userid"]."' and status='ON' order by id asc";
        $p2 = $conn->query($p1);
        if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
            
            if($_GET["v"]=="M"){
                $pdate=date("d", $p3["payment_date"]);
                $pmonth=date("Y-m", $p3["payment_date"]);
                if($_GET["vm"]==$pmonth){
                    if($pdate=="01") $dd1=($dd1+$p3["dr_amt"]);
                    if($pdate=="02") $dd2=($dd2+$p3["dr_amt"]);
                    if($pdate=="03") $dd3=($dd3+$p3["dr_amt"]);
                    if($pdate=="04") $dd4=($dd4+$p3["dr_amt"]);
                    if($pdate=="05") $dd5=($dd5+$p3["dr_amt"]);
                    if($pdate=="06") $dd6=($dd6+$p3["dr_amt"]);
                    if($pdate=="07") $dd7=($dd7+$p3["dr_amt"]);
                    if($pdate=="08") $dd8=($dd8+$p3["dr_amt"]);
                    if($pdate=="09") $dd9=($dd9+$p3["dr_amt"]);
                    if($pdate=="10") $dd10=($dd10+$p3["dr_amt"]);
                    if($pdate=="11") $dd11=($dd11+$p3["dr_amt"]);
                    if($pdate=="12") $dd12=($dd12+$p3["dr_amt"]);
                    if($pdate=="13") $dd13=($dd13+$p3["dr_amt"]);
                    if($pdate=="14") $dd14=($dd14+$p3["dr_amt"]);
                    if($pdate=="15") $dd15=($dd15+$p3["dr_amt"]);
                    if($pdate=="16") $dd16=($dd16+$p3["dr_amt"]);
                    if($pdate=="17") $dd17=($dd17+$p3["dr_amt"]);
                    if($pdate=="18") $dd18=($dd18+$p3["dr_amt"]);
                    if($pdate=="19") $dd19=($dd19+$p3["dr_amt"]);
                    if($pdate=="20") $dd20=($dd20+$p3["dr_amt"]);
                    if($pdate=="21") $dd21=($dd21+$p3["dr_amt"]);
                    if($pdate=="22") $dd22=($dd22+$p3["dr_amt"]);
                    if($pdate=="23") $dd23=($dd23+$p3["dr_amt"]);
                    if($pdate=="24") $dd24=($dd24+$p3["dr_amt"]);
                    if($pdate=="25") $dd25=($dd25+$p3["dr_amt"]);
                    if($pdate=="26") $dd26=($dd26+$p3["dr_amt"]);
                    if($pdate=="27") $dd27=($dd27+$p3["dr_amt"]);
                    if($pdate=="28") $dd28=($dd28+$p3["dr_amt"]);
                    if($pdate=="29") $dd29=($dd29+$p3["dr_amt"]);
                    if($pdate=="30") $dd30=($dd30+$p3["dr_amt"]);
                    if($pdate=="31") $dd31=($dd31+$p3["dr_amt"]);
                }
                
            }else{
                
                $pdate=date("m", $p3["payment_date"]);
                $pyear=date("Y", $p3["payment_date"]);
                if($_GET["vy"]==$pyear){
                    if($pdate=="01") $p_Jan=($p_Jan+$p3["dr_amt"]);
                    if($pdate=="02") $p_Feb=($p_Feb+$p3["dr_amt"]);
                    if($pdate=="03") $p_Mar=($p_Mar+$p3["dr_amt"]);
                    if($pdate=="04") $p_Apr=($p_Apr+$p3["dr_amt"]);
                    if($pdate=="05") $p_May=($p_May+$p3["dr_amt"]);
                    if($pdate=="06") $p_Jun=($p_Jun+$p3["dr_amt"]);
                    if($pdate=="07") $p_Jul=($p_Jul+$p3["dr_amt"]);
                    if($pdate=="08") $p_Aug=($p_Aug+$p3["dr_amt"]);
                    if($pdate=="09") $p_Sep=($p_Sep+$p3["dr_amt"]);
                    if($pdate=="10") $p_Oct=($p_Oct+$p3["dr_amt"]);
                    if($pdate=="11") $p_Nov=($p_Nov+$p3["dr_amt"]);
                    if($pdate=="12") $p_Dec=($p_Dec+$p3["dr_amt"]);
                }
                
            }
        } }
        
        if($_GET["v"]=="M"){
            $stepsize="5000";
            $min=0;
            $max=100000;
            $cm=$vm;
        }else{
            $stepsize="50000";
            $min=0;
            $max=300000;
            $cm="$vy";
        }
                    
        if(isset($_GET["vm"])) $vmy=$_GET["vm"];
        else $vmy=$_GET["vy"];
        $current_year=date("Y",time());
        $cm1=date("M",time());
        $currentmonth=date("m",time());
        $currentyear=date("Y",time());
        
        echo"<div class='card mb-0' style='border-radius:0px'>
            <form method='GET'>
                <div class='input-group mb-3'>
                    <input type=hidden name=v value='".$_GET["v"]."'>";
                    if(!isset($_GET["vy"])) $vy=$currentyear;
                    else $vy=$_GET["vy"];
                    if(!isset($_GET["vm"])) $vm="$vy-$currentmonth";
                    else $vm=$_GET["vm"];
                    if($_GET["v"]=="Y"){                        
                        echo"<input type='number' min='2000' max='$currentyear' name='vy' placeholder='Year View' class='form-control' value='$vy'>";
                    }
                    if($_GET["v"]=="M"){                        
                        echo"<input type='month' max='$currentyear-$currentmonth' name='vm' placeholder='Year View' class='form-control' value='$vm'>";
                    }
                    if(!isset($_GET["c"])) $c="bar";
                    else $c=$_GET["c"];
                    echo"<select name='c' class='form-control'>
                        <option value='$c'>$c Chart</option>    
                        <option value='bar'>Bar Chart</option>
                        <option value='line'>Line Chart</option>
                        <option value='pie'>Pie Chart</option>                        
                        <option value='doughnut'>Doughnut Chart</option>
                    </select>
                    <button class='btn btn-outline-secondary' type='submit''>Update Chart</button>
                </div>
            </form>
        </div>
        <div class='card mb-0' style='border-radius:0px'>
            <div class='sh-35'>";
            
                if($_GET["c"]=="doughnut"){
                    
                    $totalpaid=0.00;
                    if($mtype=="ADMIN") $pv1 = "select * from payment_voucher where status='1' OR status='ON' order by id asc";
                    else $pv1 = "select * from payment_voucher where employeeid='".$_COOKIE["userid"]."' and status='1' AND employeeid='".$_COOKIE["userid"]."' and status='ON' order by id asc";
                    $pv2 = $conn->query($pv1);
                    if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) {
                        if($_GET["v"]=="M"){
                            $pmonth=date("Y-m", $pv3["payment_date"]);
                            if($_GET["vm"]==$pmonth) $totalpaid=($totalpaid+$pv3["dr_amt"]);
                        }else{
                            $pyear=date("Y", $pv3["payment_date"]);
                            if($_GET["vy"]==$pyear)  $totalpaid=($totalpaid+$pv3["dr_amt"]);
                        }
                    } }
                    $totalpaidx= number_format($totalpaid,2,".",",");
                    
                    $totalreceived=0.00;
                    if($mtype=="ADMIN") $rv1 = "select * from receipt_voucher where status='1' OR status='ON' order by id asc";
                    else $rv1 = "select * from receipt_voucher where employeeid='".$_COOKIE["userid"]."' and status='1' AND employeeid='".$_COOKIE["userid"]."' and status='ON' order by id asc";
                    $rv2 = $conn->query($rv1);
                    if ($rv2->num_rows > 0) { while($rv3 = $rv2->fetch_assoc()) {
                        if($_GET["v"]=="M"){
                            $pmonth=date("Y-m", $rv3["receipt_date"]);
                            if($_GET["vm"]==$pmonth) $totalreceived=($totalreceived+$rv3["cr_amt"]);
                        }else{
                            $pyear=date("Y", $rv3["receipt_date"]);
                            if($_GET["vy"]==$pyear)  $totalreceived=($totalreceived+$rv3["cr_amt"]);
                        }
                    } }
                    
                    $totalreceivedx= number_format($totalreceived,2,".",",");
                    $totalbalance=($totalreceived-$totalpaid);
                    $totalbalancex= number_format($totalbalance,2,".",",");
                    
                    echo"<canvas id='doughnutChart' style='padding-bottom:10px'></canvas>"; ?>
                    <script type="text/javascript">
                        class Charts {
                            constructor() {
                                // Initialization of the page plugins
                                if (typeof Chart === 'undefined') {
                                    console.log('Chart is undefined!');
                                    return;
                                }
                                this._doughnutChart = null;
                                this._initDoughnutChart();
                            }
                            _initEvents() {
                                document.documentElement.addEventListener(Globals.colorAttributeChange, (event) => {
                                    this._doughnutChart && this._doughnutChart.destroy();
                                    this._initDoughnutChart();
                                })
                            }
                            _initDoughnutChart() {
                                if (document.getElementById('doughnutChart')) {
                                    const doughnutChart = document.getElementById('doughnutChart');
                                    this._doughnutChart = new Chart(doughnutChart, {
                                        plugins: [ChartsExtend.CenterTextPlugin()],
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Received Amount', 'Paid Amount', 'Balance'],
                                            datasets: [{
                                                label: '',
                                                borderColor: [Globals.tertiary, Globals.secondary, Globals.primary],
                                                backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)'],
                                                borderWidth: 1,
                                                data: [<?php echo"$totalreceived, $totalreceived, $totalbalance"; ?>],
                                            },],
                                        },
                                        draw: function () {},
                                        options: {
                                            plugins: { datalabels: {display: false}, },
                                            responsive: true, maintainAspectRatio: false, cutoutPercentage: 80,
                                            title: { display: false, },
                                            layout: { padding: { bottom: 20, }, },
                                            legend: { position: 'bottom', labels: ChartsExtend.LegendLabels(), },
                                            tooltips: ChartsExtend.ChartTooltip(),
                                        },
                                    });
                                }
                            }
                        }
                    </script><?php
                }
            
                if($_GET["c"]=="pie"){
                    
                    $totalpaid=0.00;
                    if($mtype=="ADMIN") $pv1 = "select * from payment_voucher where status='1' OR status='ON' order by id asc";
                    else $pv1 = "select * from payment_voucher where employeeid='".$_COOKIE["userid"]."' and status='1' AND employeeid='".$_COOKIE["userid"]."' and status='ON' order by id asc";
                    $pv2 = $conn->query($pv1);
                    if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) {
                        if($_GET["v"]=="M"){
                            $pmonth=date("Y-m", $pv3["payment_date"]);
                            if($_GET["vm"]==$pmonth) $totalpaid=($totalpaid+$pv3["dr_amt"]);
                        }else{
                            $pyear=date("Y", $pv3["payment_date"]);
                            if($_GET["vy"]==$pyear)  $totalpaid=($totalpaid+$pv3["dr_amt"]);
                        }
                    } }
                    $totalpaidx= number_format($totalpaid,2,".",",");
                    
                    $totalreceived=0.00;
                    if($mtype=="ADMIN") $rv1 = "select * from receipt_voucher where status='1' OR status='ON' order by id asc";
                    else $rv1 = "select * from receipt_voucher where employeeid='".$_COOKIE["userid"]."' and status='1' AND employeeid='".$_COOKIE["userid"]."' and status='ON' order by id asc";
                    $rv2 = $conn->query($rv1);
                    if ($rv2->num_rows > 0) { while($rv3 = $rv2->fetch_assoc()) {
                        if($_GET["v"]=="M"){
                            $pmonth=date("Y-m", $rv3["receipt_date"]);
                            if($_GET["vm"]==$pmonth) $totalreceived=($totalreceived+$rv3["cr_amt"]);
                        }else{
                            $pyear=date("Y", $rv3["receipt_date"]);
                            if($_GET["vy"]==$pyear)  $totalreceived=($totalreceived+$rv3["cr_amt"]);
                        }
                    } }
                    
                    $totalreceivedx= number_format($totalreceived,2,".",",");
                    $totalbalance=($totalreceived-$totalpaid);
                    $totalbalancex= number_format($totalbalance,2,".",",");
                    
                    echo"<canvas id='pieChart' style='padding-bottom:10px'></canvas>"; ?>
                    <script type="text/javascript">
                        class Charts {
                            constructor() {
                                // Initialization of the page plugins
                                if (typeof Chart === 'undefined') {
                                    console.log('Chart is undefined!');
                                    return;
                                }
                                this._pieChart = null;
                                this._initPieChart();                            
                            }
                            _initEvents() {
                                document.documentElement.addEventListener(Globals.colorAttributeChange, (event) => {
                                    this._pieChart && this._pieChart.destroy();
                                    this._initPieChart();
                                })
                            }
                            _initPieChart() {
                                if (document.getElementById('pieChart')) {
                                    const pieChart = document.getElementById('pieChart');
                                    this._pieChart = new Chart(pieChart, {
                                        type: 'pie',
                                        data: {
                                            labels: ['Received Amount', 'Paid Amount', 'Balance'],
                                            datasets: [{    
                                                label: '',
                                                borderColor: [Globals.primary, Globals.success, Globals.warning],
                                                backgroundColor: ['rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.tertiaryrgb + ',0.1)'],
                                                borderWidth: 1,
                                                data: [<?php echo"$totalreceived, $totalreceived, $totalbalance"; ?>],
                                            },],
                                        },
                                        draw: function () {},
                                        options: {
                                            plugins: {
                                                datalabels: {display: true},
                                            },
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            title: {
                                                display: true,
                                            },
                                            layout: {
                                                padding: {
                                                    bottom: 20,
                                                },
                                            },
                                            legend: {
                                                position: 'bottom',
                                                labels: ChartsExtend.LegendLabels(),
                                            },
                                            tooltips: ChartsExtend.ChartTooltip(),
                                        },
                                    });
                                }
                            }
                        }
                    </script><?php
                }

                if($_GET["c"]=="line"){
                    
                    $cy=strtotime(date('$vy-01-01'));
                    $ny=strtotime(date('$vy-12-31 11:59:59 pm'));
                
                    echo"<canvas id='lineChart' style='padding-bottom:10px'></canvas>"; ?>
                    <script type="text/javascript">
                        class Charts {
                            constructor() {
                                // Initialization of the page plugins
                                if (typeof Chart === 'undefined') {
                                    console.log('Chart is undefined!');
                                    return;
                                }
                                this._lineChart = null;
                                this._initLineChart();
                            }
                            _initEvents() {
                                document.documentElement.addEventListener(Globals.colorAttributeChange, (event) => {
                                    this._lineChart && this._lineChart.destroy();
                                    this._initLineChart();
                                });
                            }
                            _initLineChart() {
                                if (document.getElementById('lineChart')) {
                                    const lineChart = document.getElementById('lineChart').getContext('2d');
                                    this._lineChart = new Chart(lineChart, {
                                        type: 'line',
                                        options: {
                                            plugins: {
                                                crosshair: ChartsExtend.Crosshair(),
                                                datalabels: {display: false},
                                            },
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                yAxes: [{  
                                                    gridLines: {display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false},
                                                    ticks: {beginAtZero: true, stepSize: <?php echo $stepsize; ?>, min: <?php echo $min; ?>, max: <?php echo $max; ?>, padding: 20, fontColor: Globals.alternate},
                                                },],
                                                xAxes: [{gridLines: {display: false}, ticks: {fontColor: Globals.alternate}}],
                                            },
                                            legend: {display: true},
                                            tooltips: ChartsExtend.ChartTooltipForCrosshair(),
                                        },
                                        
                                        data: {
                                            labels: [
                                                <?php if($_GET["v"]=="M") echo"'01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'"; ?>
                                                <?php if($_GET["v"]=="Y") echo"'JAN', 'FEB', 'MUR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'"; ?>
                                            ],
                                            datasets: [{
                                                label: 'Income <?php echo $cm ?>',
                                                data: [
                                                    <?php if($_GET["v"]=="M") echo"$d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10, $d11, $d12, $d13, $d14, $d15, $d16, $d17, $d18, $d19, $d20, $d21, $d22, $d23, $d24, $d25, $d26, $d27, $d28, $d29, $d30, $d31"; ?>
                                                    <?php if($_GET["v"]=="Y") echo"$r_Jan, $r_Feb, $r_Mar, $r_Apr, $r_May, $r_Jun, $r_Jul, $r_Aug, $r_Sep, $r_Oct, $r_Nov, $r_Dec"; ?>
                                                ],
                                                borderColor: Globals.primary,
                                                pointBackgroundColor: Globals.primary,
                                                pointBorderColor: Globals.primary,
                                                pointHoverBackgroundColor: Globals.primary,
                                                pointHoverBorderColor: Globals.primary,
                                                borderWidth: 2,
                                                pointRadius: 3,
                                                pointBorderWidth: 3,
                                                pointHoverRadius: 4,
                                                fill: false,
                                            },{
                                                label: 'Expense <?php echo $cm ?>',
                                                data: [
                                                    <?php if($_GET["v"]=="M") echo"$dd1, $dd2, $dd3, $dd4, $dd5, $dd6, $dd7, $dd8, $dd9, $dd10, $dd11, $dd12, $dd13, $dd14, $dd15, $dd16, $dd17, $dd18, $dd19, $dd20, $dd21, $dd22, $dd23, $dd24, $dd25, $dd26, $dd27, $dd28, $dd29, $dd30, $dd31"; ?>
                                                    <?php if($_GET["v"]=="Y") echo"$p_Jan, $p_Feb, $p_Mar, $p_Apr, $p_May, $p_Jun, $p_Jul, $p_Aug, $p_Sep, $p_Oct, $p_Nov, $p_Dec"; ?>
                                                ],
                                                borderColor: Globals.warning,
                                                pointBackgroundColor: Globals.warning,
                                                pointBorderColor: Globals.warning,
                                                pointHoverBackgroundColor: Globals.warning,
                                                pointHoverBorderColor: Globals.warning,
                                                borderWidth: 1,
                                                pointRadius: 2,
                                                pointBorderWidth: 2,
                                                pointHoverRadius: 3,
                                                fill: false,
                                            }],
                                        },
                                    });
                                }
                            }
                        }
                    </script><?php                
                }

                if($_GET["c"]=="bar"){
                    echo"<canvas id='horizontalTooltipChartX' style='padding-bottom:10px'></canvas>
                    <div class='custom-tooltip position-absolute bg-foreground border border-separator pe-none p-3 d-flex z-index-1 align-items-center opacity-0 basic-transform-transition'>
                        <div class='icon-container border d-flex align-middle align-items-center justify-content-center align-self-center rounded-xl sh-5 sw-5 rounded-xl me-3'><span class='icon'></span></div>
                        <span class='text d-flex align-middle text-alternate align-items-center text-small'>Accounts</span>
                        <span class='value d-flex align-middle text-body align-items-center cta-4'>200</span>"; ?>
                        <script type="text/javascript">
                            class Charts {
                                constructor() {
                                    // Initialization of the page plugins
                                    if (typeof Chart === 'undefined') {
                                        console.log('Chart is undefined!');
                                        return;
                                    }
                                    this._customTooltipBarX = null;
                                    this._initCustomTooltipBarX();
                                    this._initEvents();
                                }
                                _initEvents() {
                                    document.documentElement.addEventListener(Globals.colorAttributeChange, (event) => {
                                        this._customTooltipBarX && this._customTooltipBarX.destroy();
                                        this._initCustomTooltipBarX();
                                    });
                                }
                                _initCustomTooltipBarX() {
                                    if (document.getElementById('horizontalTooltipChartX')) {
                                        var ctx = document.getElementById('horizontalTooltipChartX').getContext('2d');
                                        this._customTooltipBarX = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: [
                                                    <?php if($_GET["v"]=="M") echo"'01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'"; ?>
                                                    <?php if($_GET["v"]=="Y") echo"'JAN', 'FEB', 'MUR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'"; ?>
                                                ],
                                                datasets: [ {
                                                    label: 'Total Received in <?php echo $cm; ?>', icon: 'intrend-up', borderColor: Globals.primary,
                                                    backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
                                                    data: [
                                                        <?php if($_GET["v"]=="M") echo"$d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9, $d10, $d11, $d12, $d13, $d14, $d15, $d16, $d17, $d18, $d19, $d20, $d21, $d22, $d23, $d24, $d25, $d26, $d27, $d28, $d29, $d30, $d31"; ?>
                                                        <?php if($_GET["v"]=="Y") echo"$r_Jan, $r_Feb, $r_Mar, $r_Apr, $r_May, $r_Jun, $r_Jul, $r_Aug, $r_Sep, $r_Oct, $r_Nov, $r_Dec"; ?>
                                                    ],
                                                    borderWidth: 1,
                                                },{
                                                    label: 'Total Paid in <?php echo $cm; ?>', icon: 'trend-down', borderColor: Globals.warning,
                                                    backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
                                                    data: [
                                                        <?php if($_GET["v"]=="M") echo"$dd1, $dd2, $dd3, $dd4, $dd5, $dd6, $dd7, $dd8, $dd9, $dd10, $dd11, $dd12, $dd13, $dd14, $dd15, $dd16, $dd17, $dd18, $dd19, $dd20, $dd21, $dd22, $dd23, $dd24, $dd25, $dd26, $dd27, $dd28, $dd29, $dd30, $dd31"; ?>
                                                        <?php if($_GET["v"]=="Y") echo"$p_Jan, $p_Feb, $p_Mar, $p_Apr, $p_May, $p_Jun, $p_Jul, $p_Aug, $p_Sep, $p_Oct, $p_Nov, $p_Dec"; ?>
                                                    ],
                                                    borderWidth: 1,
                                                }, ],
                                            },
                                            options: {
                                                cornerRadius: parseInt(Globals.borderRadiusMd),
                                                plugins: { crosshair: false, datalabels: {display: false}, },
                                                responsive: true,
                                                maintainAspectRatio: false,
                                                legend: { position: 'bottom', labels: ChartsExtend.LegendLabels(), },
                                                scales: {
                                                    yAxes: [ {
                                                        gridLines: { display: true, lineWidth: 1, color: Globals.separatorLight, drawBorder: false, },
                                                        ticks: { beginAtZero: true, stepSize: <?php echo $stepsize; ?>, min: <?php echo $min; ?>, max: <?php echo $max; ?>, padding: 20, },
                                                    }, ],
                                                    xAxes: [ { gridLines: {display: false}, }, ],
                                                },
                                                tooltips: {
                                                    enabled: false,
                                                    custom: function (tooltip) {
                                                        var tooltipEl = this._chart.canvas.parentElement.querySelector('.custom-tooltip');
                                                        if (tooltip.opacity === 0) {
                                                            tooltipEl.style.opacity = 0;
                                                            return;
                                                        }
                                                        tooltipEl.classList.remove('above', 'below', 'no-transform');
                                                        if (tooltip.yAlign) {
                                                            tooltipEl.classList.add(tooltip.yAlign);
                                                        } else {
                                                            tooltipEl.classList.add('no-transform');
                                                        }
                                                        if (tooltip.body) {
                                                            var chart = this;
                                                            var index = tooltip.dataPoints[0].index;
                                                            var datasetIndex = tooltip.dataPoints[0].datasetIndex;
                                                            var icon = tooltipEl.querySelector('.icon');
                                                            var iconContainer = tooltipEl.querySelector('.icon-container');
                                                            iconContainer.style = 'border-color: ' + tooltip.labelColors[0].borderColor + '!important';
                                                            icon.style = 'color: ' + tooltip.labelColors[0].borderColor + ';';
                                                            icon.setAttribute('data-acorn-icon', chart._data.datasets[datasetIndex].icon);
                                                            new AcornIcons().replace();
                                                            tooltipEl.querySelector('.text').innerHTML = chart._data.datasets[datasetIndex].label.toLocaleUpperCase();
                                                            tooltipEl.querySelector('.value').innerHTML = chart._data.datasets[datasetIndex].data[index];
                                                        }
                                                        var positionY = this._chart.canvas.offsetTop;
                                                        var positionX = this._chart.canvas.offsetLeft;
                                                        tooltipEl.style.opacity = 1;
                                                        tooltipEl.style.left = positionX + tooltip.dataPoints[0].x - 75 + 'px';
                                                        tooltipEl.style.top = positionY + tooltip.caretY + 'px';
                                                    },
                                                },
                                            },
                                        });
                                    }
                                }
                            }
                        </script><?php
                    echo"</div>";
                }

        echo"</div>"; ?>
        
        <script src='../js/vendor/jquery-3.5.1.min.js'></script>
        <script src='../js/vendor/bootstrap.bundle.min.js'></script>
        <script src='../js/vendor/OverlayScrollbars.min.js'></script>
        <script src='../js/vendor/autoComplete.min.js'></script>
        <script src='../js/vendor/clamp.min.js'></script>
        <script src='../icon/acorn-icons.js'></script>
        <script src='../icon/acorn-icons-interface.js'></script>
        <script src='../js/cs/scrollspy.js'></script>
        <script src='../js/vendor/moment-with-locales.min.js'></script>
        <script src='../js/vendor/Chart.bundle.min.js'></script>
        <script src='../js/vendor/chartjs-plugin-rounded-bar.min.js'></script>
        <script src='../js/vendor/chartjs-plugin-crosshair.js'></script>
        <script src='../js/vendor/chartjs-plugin-datalabels.js'></script>
        <script src='../js/vendor/chartjs-plugin-streaming.min.js'></script>
        <script src='../js/base/helpers.js'></script>
        <script src='../js/base/globals.js'></script>
        <script src='../js/base/nav.js'></script>
        <script src='../js/base/search.js'></script>
        <script src='../js/base/settings.js'></script>
        <script src='../js/cs/charts.extend.js'></script>
        <script src='../js/plugins/charts.js'></script>
        <script src='../js/common.js'></script>
        <script src='../js/scripts.js'></script>    
    </body>
</html>  