<!DOCTYPE html>
<html lang='en' data-footer='true' data-scrollspy='true'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1' />
    <title>Nexis Charts Plugin</title>    
    <link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />
    <script src='../js/base/loader.js'></script>
  </head>

  <body><?php

        include("../include_general.php");
        
        $un="";
        $un1 = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by id asc limit 1";
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
        
        
        $r_Jan=100.00;
        $r_Feb=200.00;
        $r_Mar=600.00;
        $r_Apr=860.00;
        $r_May=340.00;
        $r_Jun=650.00;
        $r_Jul=580.00;
        $r_Aug=940.00;
        $r_Sep=730.00;
        $r_Oct=550.00;
        $r_Nov=1150.00;
        $r_Dec=10.00;

        $p_Jan=100.00;
        $p_Feb=200.00;
        $p_Mar=600.00;
        $p_Apr=860.00;
        $p_May=340.00;
        $p_Jun=650.00;
        $p_Jul=1580.00;
        $p_Aug=940.00;
        $p_Sep=730.00;
        $p_Oct=550.00;
        $p_Nov=150.00;
        $p_Dec=10.00;

        $current_year=date("Y",time());
        $cm1=date("M",time());
        $currentmonth=date("m",time());
        $currentyear=date("Y",time());
        echo"<div class='card mb-0' style='border-radius:0px'>
            <div class='sh-35'>";
            if($_GET["c"]=="doughnut"){
                
                $totalpaid=0.00;
                $pv1 = "select * from payment_voucher where status='ON' order by id asc";
                $pv2 = $conn->query($pv1);
                if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalpaid=($totalpaid+$pv3["dr_amt"]); } }
                $totalpaidx= number_format($totalpaid,2,".",",");
                $totalreceived=0.00;
                $pv1 = "select * from receipt_voucher where status='ON' order by id asc";
                $pv2 = $conn->query($pv1);
                if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalreceived=($totalreceived+$pv3["cr_amt"]); } }
                $totalreceivedx= number_format($totalreceived,2,".",",");
                $totalbalance=($totalreceived-$totalpaid);
                $totalbalancex= number_format($totalbalance,2,".",",");
                
                $totalreceived=5;
                $totalpaid=3;
                $totalbalance=2;
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
                                        labels: ['New Tasks', 'Ongoing Tasks', 'Completed'],
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
                $pv1 = "select * from payment_voucher where status='ON' order by id asc";
                $pv2 = $conn->query($pv1);
                if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalpaid=($totalpaid+$pv3["dr_amt"]); } }
                $totalpaidx= number_format($totalpaid,2,".",",");
                $totalreceived=0.00;
                $pv1 = "select * from receipt_voucher where status='ON' order by id asc";
                $pv2 = $conn->query($pv1);
                if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalreceived=($totalreceived+$pv3["cr_amt"]); } }
                $totalreceivedx= number_format($totalreceived,2,".",",");
                $totalbalance=($totalreceived-$totalpaid);
                $totalbalancex= number_format($totalbalance,2,".",",");
                
                $totalreceived=25;
                $totalpaid=50;
                $totalbalance=75;
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
                                        labels: ['New Tasks', 'Ongoing Tasks', 'Completed'],
                                        datasets: [{    
                                            label: '',
                                            borderColor: [Globals.primary, Globals.secondary, Globals.tertiary],
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
                $d1=0; $d2=0; $d3=0; $d4=0; $d5=0; $d6=0; $d7=0; $d8=0; $d9=0; $d10=0;
                $d11=0; $d12=0; $d13=0; $d14=0; $d15=0; $d16=0; $d17=0; $d18=0; $d19=0; $d20=0;
                $d21=0; $d22=0; $d23=0; $d24=0; $d25=0; $d26=0; $d27=0; $d28=0; $d29=0; $d30=0; $d31=0;

                $dd1=0; $dd2=0; $dd3=0; $dd4=0; $dd5=0; $dd6=0; $dd7=0; $dd8=0; $dd9=0; $dd10=10;
                $dd11=3420; $dd12=605; $dd13=550; $dd14=890; $dd15=230; $dd16=120; $dd17=10; $dd18=0; $dd19=0; $dd20=0;
                $dd21=0; $dd22=0; $dd23=0; $dd24=0; $dd25=0; $dd26=0; $dd27=0; $dd28=0; $dd29=0; $dd30=0; $dd31=0;
                
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
                                                ticks: {beginAtZero: true, stepSize: 400, min: 10, max: 5000, padding: 20, fontColor: Globals.alternate},
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
                                            label: 'Received $',
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
                                            label: 'Paid $',
                                            data: [
                                                <?php if($_GET["v"]=="M") echo"$dd1, $dd2, $dd3, $dd4, $dd5, $dd6, $dd7, $dd8, $dd9, $dd10, $dd11, $dd12, $dd13, $dd14, $dd15, $dd16, $dd17, $dd18, $dd19, $dd20, $dd21, $dd22, $dd23, $dd24, $dd25, $dd26, $dd27, $dd28, $dd29, $dd30, $dd31"; ?>
                                                <?php if($_GET["v"]=="Y") echo"$p_Jan, $p_Feb, $p_Mar, $p_Apr, $p_May, $p_Jun, $p_Jul, $p_Aug, $p_Sep, $p_Oct, $p_Nov, $p_Dec"; ?>
                                            ],
                                            borderColor: Globals.secondary,
                                            pointBackgroundColor: Globals.secondary,
                                            pointBorderColor: Globals.secondary,
                                            pointHoverBackgroundColor: Globals.secondary,
                                            pointHoverBorderColor: Globals.secondary,
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
                                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                            datasets: [ {
                                                label: 'EOD', icon: 'intrend-up', borderColor: Globals.primary,
                                                backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
                                                data: [ <?php echo"$r_Jan, $r_Feb, $r_Mar, $r_Apr, $r_May, $r_Jun, $r_Jul, $r_Aug, $r_Sep, $r_Oct, $r_Nov, $r_Dec"; ?> ],
                                                borderWidth: 1,
                                            },{
                                                label: 'BOC', icon: 'trend-down', borderColor: Globals.secondary,
                                                backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
                                                data: [ <?php echo"$p_Jan, $p_Feb, $p_Mar, $p_Apr, $p_May, $p_Jun, $p_Jul, $p_Aug, $p_Sep, $p_Oct, $p_Nov, $p_Dec"; ?> ],
                                                borderWidth: 1,
                                            },{
                                                label: 'INCIDENT', icon: 'trend-down', borderColor: Globals.secondary,
                                                backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
                                                data: [ <?php echo"$p_Jan, $p_Feb, $p_Mar, $p_Apr, $p_May, $p_Jun, $p_Jul, $p_Aug, $p_Sep, $p_Oct, $p_Nov, $p_Dec"; ?> ],
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
                                                    ticks: { beginAtZero: true, stepSize: 200, min: 100, max: 2000, padding: 20, },
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