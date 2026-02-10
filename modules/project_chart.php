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

        include("../authenticator.php");
        $cyear=date("Y", time());
        
        $e_Jan=0;
        $e_Feb=0;
        $e_Mar=0;
        $e_Apr=0;
        $e_May=0;
        $e_Jun=0;
        $e_Jul=0;
        $e_Aug=0;
        $e_Sep=0;
        $e_Oct=0;
        $e_Nov=0;
        $e_Dec=0;
        if($mtype=="ADMIN") $e1 = "select * from eod where clientid='".$_GET["clientid"]."' and status='1' order by id asc";
        else $e1 = "select * from eod where employeeid='".$_COOKIE["userid"]."' and clientid='".$_GET["clientid"]."' and status='1' order by id asc";
        $e2 = $conn->query($e1);
        if ($e2->num_rows > 0) { while($e3 = $e2->fetch_assoc()) {
            $cdate1=null;
            $cyear1=null;
            $cdate1=date("m",$e3["eod_date"]);
            $cyear1=date("Y",$e3["eod_date"]);
            if($cyear1==$cyear){
                if($cdate1=="01") $e_Jan=($e_Jan+1);
                if($cdate1=="02") $e_Feb=($e_Feb+1);
                if($cdate1=="03") $e_Mar=($e_Mar+1);
                if($cdate1=="04") $e_Apr=($e_Apr+1);
                if($cdate1=="05") $e_May=($e_May+1);
                if($cdate1=="06") $e_Jun=($e_Jun+1);
                if($cdate1=="07") $e_Jul=($e_Jul+1);
                if($cdate1=="08") $e_Aug=($e_Aug+1);
                if($cdate1=="09") $e_Sep=($e_Sep+1);
                if($cdate1=="10") $e_Oct=($e_Oct+1);
                if($cdate1=="11") $e_Nov=($e_Nov+1);
                if($cdate1=="12") $e_Dec=($e_Dec+1);
            }
        } }
        
        $b_Jan=0;
        $b_Feb=0;
        $b_Mar=0;
        $b_Apr=0;
        $b_May=0;
        $b_Jun=0;
        $b_Jul=0;
        $b_Aug=0;
        $b_Sep=0;
        $b_Oct=0;
        $b_Nov=0;
        $b_Dec=0;
        if($mtype=="ADMIN") $b1 = "select * from boc where status='1' order by id asc";
        else $b1 = "select * from boc where employeeid='".$_COOKIE["userid"]."' and status='1' order by id asc";
        $b2 = $conn->query($b1);
        if ($b2->num_rows > 0) { while($b3 = $b2->fetch_assoc()) {
            $cdate2=date("m",$b3["date"]);
            $cyear2=date("Y",$b3["date"]);
            if($cyear2==$cyear){
                if($cdate2=="01") $b_Jan=($b_Jan+1);
                if($cdate2=="02") $b_Feb=($b_Feb+1);
                if($cdate2=="03") $b_Mar=($b_Mar+1);
                if($cdate2=="04") $b_Apr=($b_Apr+1);
                if($cdate2=="05") $b_May=($b_May+1);
                if($cdate2=="06") $b_Jun=($b_Jun+1);
                if($cdate2=="07") $b_Jul=($b_Jul+1);
                if($cdate2=="08") $b_Aug=($b_Aug+1);
                if($cdate2=="09") $b_Sep=($b_Sep+1);
                if($cdate2=="10") $b_Oct=($b_Oct+1);
                if($cdate2=="11") $b_Nov=($b_Nov+1);
                if($cdate2=="12") $b_Dec=($b_Dec+1);
            }
        } }

        $i_Jan=0;
        $i_Feb=0;
        $i_Mar=0;
        $i_Apr=0;
        $i_May=0;
        $i_Jun=0;
        $i_Jul=0;
        $i_Aug=0;
        $i_Sep=0;
        $i_Oct=0;
        $i_Nov=0;
        $i_Dec=0;
        if($mtype=="ADMIN") $i1 = "select * from incident where status='1' order by id asc";
        else $i1 = "select * from incident where employeeid='".$_COOKIE["userid"]."' and status='1' order by id asc";
        $i2 = $conn->query($i1);
        if ($i2->num_rows > 0) { while($i3 = $i2->fetch_assoc()) {
            $cdate3=date("m",$i3["date"]);
            $cyear3=date("Y",$i3["date"]);
            if($cyear3=="$cyear"){
                if($cdate3=="01") $i_Jan=($i_Jan+1);
                if($cdate3=="02") $i_Feb=($i_Feb+1);
                if($cdate3=="03") $i_Mar=($i_Mar+1);
                if($cdate3=="04") $i_Apr=($i_Apr+1);
                if($cdate3=="05") $i_May=($i_May+1);
                if($cdate3=="06") $i_Jun=($i_Jun+1);
                if($cdate3=="07") $i_Jul=($i_Jul+1);
                if($cdate3=="08") $i_Aug=($i_Aug+1);
                if($cdate3=="09") $i_Sep=($i_Sep+1);
                if($cdate3=="10") $i_Oct=($i_Oct+1);
                if($cdate3=="11") $i_Nov=($i_Nov+1);
                if($cdate3=="12") $i_Dec=($i_Dec+1);
            }
        } }
        
        $current_year=date("Y",time());
        $cm1=date("M",time());
        $currentmonth=date("m",time());
        $currentyear=date("Y",time());
        echo"<div class='card mb-0' style='border-radius:0px'>
            <div class='sh-35'>
                <canvas id='horizontalTooltipChartX' style='padding-bottom:10px'></canvas>
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
                                                data: [ <?php echo"$e_Jan, $e_Feb, $e_Mar, $e_Apr, $e_May, $e_Jun, $e_Jul, $e_Aug, $e_Sep, $e_Oct, $e_Nov, $e_Dec"; ?> ],
                                                borderWidth: 1,
                                            },{
                                                label: 'BOC', icon: 'trend-down', borderColor: Globals.secondary,
                                                backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
                                                data: [ <?php echo"$b_Jan, $b_Feb, $b_Mar, $b_Apr, $b_May, $b_Jun, $b_Jul, $b_Aug, $b_Sep, $b_Oct, $b_Nov, $b_Dec"; ?> ],
                                                borderWidth: 1,
                                            },{
                                                label: 'INCIDENT', icon: 'trend-down', borderColor: Globals.secondary,
                                                backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
                                                data: [ <?php echo"$i_Jan, $i_Feb, $i_Mar, $i_Apr, $i_May, $i_Jun, $i_Jul, $i_Aug, $i_Sep, $i_Oct, $i_Nov, $i_Dec"; ?> ],
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
                                                    ticks: { beginAtZero: true, stepSize: 50, min: 1, max: 300, padding: 20, },
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
                echo"</div>
            </div>
        </div>"; ?>
        
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