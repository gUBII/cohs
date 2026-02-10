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
        $currenttime=time();
        $currentdate=date("Y-m-d",$currenttime);
        
        $c1=null;
        $c2=null;
        $c3=null;
        $c4=null;
        $c5=null;
        $c6=null;
        $c7=null;
        $c8=null;
        $c9=null;
        $c10=null;
        $c11=null;
        $c12=null;
        $c13=null;
        $c14=null;
        $c15=null;
        
        $wsp11 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id desc limit 1";
        $wsp22 = $conn->query($wsp11);
        if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
            if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
            if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
            
            $totalamountx=0;
            
            $ln1 = "select * from project_team_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
            $ln2 = $conn->query($ln1);
            if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
            
                $lv=($lv+$wsp33["cat1x"]); // value;
                $sc1 = "select * from ndis_support_catelogue2 where id='".$ln3["item_number"]."' order by id desc limit 1";
                $sc2 = $conn->query($sc1);
                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                    $supportname=$sc3["support_item_name"];
                    $supportlinenumber=$sc3["support_item_number"];
                    $supportprice=$sc3["nsw"];
                } }
                
                $hd1=0;
                $holidaytext="Holidays on";
                $sc11 = "select * from leave_holidays where status='ON' order by id asc";
                $sc22 = $conn->query($sc11);
                if ($sc22->num_rows > 0) { while($sc33 = $sc22 -> fetch_assoc()) {
                    if($sc33["startdate"]>=$wsp33["budget_date"] && $sc33["startdate"]<=$wsp33["budget_close_date"]){
                        if($sc33["enddate"]>=$wsp33["budget_date"] && $sc33["enddate"]<=$wsp33["budget_close_date"]){
                            $diffInSecondsz = abs($sc33["startdate"] - $sc33["enddate"]);
                            $tdaysz = floor($diffInSecondsz / (60 * 60 * 24));
                            if($tdaysz<=0) $tdaysz=1;
                            $hd1=($hd1+$tdaysz);
                            $holidaytext="$holidaytext, ".$sc33["holidayname"]."";
                        }
                    }
                } }
                
                
                $wd=0;
                if($ln3["mon"]==1) $wd=($wd+4);
                if($ln3["tue"]==1) $wd=($wd+4);
                if($ln3["wed"]==1) $wd=($wd+4);
                if($ln3["thu"]==1) $wd=($wd+4);
                if($ln3["fri"]==1) $wd=($wd+4);
                if($ln3["sat"]==1) $wd=($wd+4);
                if($ln3["sun"]==1) $wd=($wd+4);
                if($ln3["evening"]==1) $wd=($wd+4);
                if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                $wd=($wd*12);
                $wd=($wd-$hd1);
                if($wd<=0) $wd=0;
                
                if($ln3["time1"]==0) $tm1="08:00";
                else $tm1=$ln3["time1"];
                
                $tm1x="08:00";
                $tm1x = strtotime($tm1);
                if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                else $tm2=$ln3["time2"];
                
                $totalamount=0;
                $totalamount=($ln3["qty1"]*$wd);
                $totalamount=($totalamount*$ln3["rate1"]);
                $totalamountz = number_format($totalamount, 2, '.', ',');
                
                $totalamountx=($totalamountx+$totalamount);
                $totalamounty = number_format($totalamountx, 2, '.', ',');
                
                $allocateddays=($allocateddays+$wd);
                $allocatedhours=($allocatedhours+$ln3["qty1"]);
                $allocatedminutes=($allocatedminutes+$ln3["qty2"]);
            } }
            if($allocatedminutes>=61){
                $amx = floor($allocatedminutes / 60);
                $allocatedhours=round($allocatedhours+$amx);
                $allocatedminutes = $allocatedminutes % 60;
            }
            
            $bbalance=($wsp33["budget_value"]-$totalamountx);
            $bbalancex = number_format($bbalance, 2, '.', ',');
            
            $budgetvalue=$wsp33["budget_value"];
            $budgetvaluex = number_format($budgetvalue, 2, '.', ',');
            
            if($bbalance<=0) $tcol=null;
            else $tcol=null;
            
            $tval=$budgetvaluex;
            $tuse=0;
            $tbal=
            
            $cat1b=($budgetvalue-0);
            $cat1b=sprintf('%01.2f', $cat1b);
            $c1="Total Budget Status";
            $b1=$budgetvalue;
            $u1=0;
            $r1=$cat1b;
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
                                            labels: [
                                                <?php
                                                    if(isset($c1)) echo"'$c1', ";
                                                    if(isset($c2)) echo"'$c2', ";
                                                    if(isset($c3)) echo"'$c3', ";
                                                    if(isset($c4)) echo"'$c4', ";
                                                    if(isset($c5)) echo"'$c5', ";
                                                    if(isset($c6)) echo"'$c6', ";
                                                    if(isset($c7)) echo"'$c7', ";
                                                    if(isset($c8)) echo"'$c8', ";
                                                    if(isset($c9)) echo"'$c9', ";
                                                    if(isset($c10)) echo"'$c10', ";
                                                    if(isset($c11)) echo"'$c11', ";
                                                    if(isset($c12)) echo"'$c12', ";
                                                    if(isset($c13)) echo"'$c13', ";
                                                    if(isset($c14)) echo"'$c14', ";
                                                    if(isset($c15)) echo"'$c15', ";
                                                ?>
                                            '-'],
                                            datasets: [ {
                                                label: 'BUDGET', icon: 'intrend-up', borderColor: Globals.warning,
                                                backgroundColor: 'rgba(' + Globals.primaryrgb + ',0.1)',
                                                data: [ 
                                                    <?php
                                                        if(isset($c1)) echo"'$b1', ";
                                                        if(isset($c2)) echo"'$b2', ";
                                                        if(isset($c3)) echo"'$b3', ";
                                                        if(isset($c4)) echo"'$b4', ";
                                                        if(isset($c5)) echo"'$b5', ";
                                                        if(isset($c6)) echo"'$b6', ";
                                                        if(isset($c7)) echo"'$b7', ";
                                                        if(isset($c8)) echo"'$b8', ";
                                                        if(isset($c9)) echo"'$b9', ";
                                                        if(isset($c10)) echo"'$b10', ";
                                                        if(isset($c11)) echo"'$b11', ";
                                                        if(isset($c12)) echo"'$b12', ";
                                                        if(isset($c13)) echo"'$b13', ";
                                                        if(isset($c14)) echo"'$b14', ";
                                                        if(isset($c15)) echo"'$b15', ";
                                                    ?> 
                                                '0'],
                                                borderWidth: 1,
                                            },{
                                                label: 'USED', icon: 'trend-down', borderColor: Globals.danger,
                                                backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
                                                data: [ 
                                                    <?php 
                                                        if(isset($c1)) echo"'$u1', ";
                                                        if(isset($c2)) echo"'$u2', ";
                                                        if(isset($c3)) echo"'$u3', ";
                                                        if(isset($c4)) echo"'$u4', ";
                                                        if(isset($c5)) echo"'$u5', ";
                                                        if(isset($c6)) echo"'$u6', ";
                                                        if(isset($c7)) echo"'$u7', ";
                                                        if(isset($c8)) echo"'$u8', ";
                                                        if(isset($c9)) echo"'$u9', ";
                                                        if(isset($c10)) echo"'$u10', ";
                                                        if(isset($c11)) echo"'$u11', ";
                                                        if(isset($c12)) echo"'$u12', ";
                                                        if(isset($c13)) echo"'$u13', ";
                                                        if(isset($c14)) echo"'$u14', ";
                                                        if(isset($c15)) echo"'$u15', ";
                                                    ?>
                                                '-' ],
                                                borderWidth: 1,
                                            },{
                                                label: 'BALANCE', icon: 'trend-down', borderColor: Globals.success,
                                                backgroundColor: 'rgba(' + Globals.secondaryrgb + ',0.1)',
                                                data: [ 
                                                    <?php 
                                                        if(isset($c1)) echo"'$r1', ";
                                                        if(isset($c2)) echo"'$r2', ";
                                                        if(isset($c3)) echo"'$r3', ";
                                                        if(isset($c4)) echo"'$r4', ";
                                                        if(isset($c5)) echo"'$r5', ";
                                                        if(isset($c6)) echo"'$r6', ";
                                                        if(isset($c7)) echo"'$r7', ";
                                                        if(isset($c8)) echo"'$r8', ";
                                                        if(isset($c9)) echo"'$r9', ";
                                                        if(isset($c10)) echo"'$r10', ";
                                                        if(isset($c11)) echo"'$r11', ";
                                                        if(isset($c12)) echo"'$r12', ";
                                                        if(isset($c13)) echo"'$r13', ";
                                                        if(isset($c14)) echo"'$r14', ";
                                                        if(isset($c15)) echo"'$r15', ";
                                                    ?>
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
                                                    ticks: { beginAtZero: true, stepSize: 15000, min: 0, max: 300000, padding: 20, },
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