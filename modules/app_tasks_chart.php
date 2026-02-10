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
        
        $cyear=date("Y", time());
        
        $activity0=0;
        $activity1=1;
        $activity2=2;
        $activity3=3;
        $activity4=4;
        
        if($mtype=="ADMIN") $t1 = "select * from tasks where status<>'10' order by id asc";
        else $t1 = "select * from tasks where employeeid='".$_COOKIE["userid"]."' and status<>'10' order by id asc";
        $t2 = $conn->query($t1);
        if ($t2->num_rows > 0) { while($t3 = $t2->fetch_assoc()) {
            if($t3["activity"]==0) $activity0=($activity0+1);
            if($t3["activity"]==1) $activity1=($activity1+1);
            if($t3["activity"]==2) $activity2=($activity2+1);
            if($t3["activity"]==3) $activity3=($activity3+1);
            if($t3["activity"]==4) $activity4=($activity4+1);
        } }
        
        $current_year=date("Y",time());
        $cm1=date("M",time());
        $currentmonth=date("m",time());
        $currentyear=date("Y",time());
        
        echo"<div class='card mb-0' style='border-radius:0px'>
            <div class='sh-35'>
                <canvas id='doughnutChart' style='padding-bottom:10px'></canvas>"; ?>
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
                                        labels: ['Pending', 'Processing', 'Completed', 'Onhold', 'Expired'],
                                        datasets: [{
                                            label: '',
                                            borderColor: [Globals.tertiary, Globals.secondary, Globals.primary],
                                            backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)'],
                                            borderWidth: 1,
                                            data: [<?php echo"$activity0, $activity1, $activity2, $activity3, $activity4"; ?>],
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
            echo"</div>
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