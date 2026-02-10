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
                    
                    if($_GET["v"]=="M") $vx="Month";
                    else $vx="Year";
                    echo"<select name='v' class='form-control'>
                        <option value='".$_GET["v"]."'>$vx</option>    
                        <option value='Y'>Year</option>                        
                        <option value='M'>Month</option>
                    </select>";
                    
                    if(!isset($_GET["c"])) $c="bar";
                    else $c=$_GET["c"];
                    echo"<select name='c' class='form-control'>
                        <option value='$c'>$c Chart</option>    
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
                    
                    $liked=0;
                    $disliked=0;
                    $neutral=1;
                    
                    if($mtype=="ADMIN") $ldn1 = "select * from client_feedback where status='ON' order by id asc";
                    else $ldn1 = "select * from client_feedback where employeeid='".$_COOKIE["userid"]."' and status='ON' order by id asc";
                    $ldn2 = $conn->query($ldn1);
                    if ($ldn2->num_rows > 0) { while($ldn3 = $ldn2->fetch_assoc()) {
                        if($_GET["v"]=="M"){
                            $pmonth=date("Y-m", $ldn3["date"]);
                            if($_GET["vm"]==$pmonth){
                                if($ldn3["reaction"]==1) $liked=($liked+1);
                                if($ldn3["reaction"]==2) $disliked=($disliked+1);
                                if($ldn3["reaction"]==0) $neutral=($neutral+1);
                            }
                        }else{
                            $pyear=date("Y", $ldn3["date"]);
                            if($_GET["vy"]==$pyear){
                                if($ldn3["reaction"]==1) $liked=($liked+1);
                                if($ldn3["reaction"]==2) $disliked=($disliked+1);
                                if($ldn3["reaction"]==0) $neutral=($neutral+1);
                            }
                        }
                    } }
                    
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
                                            labels: ['Liked', 'Disliked', 'Neutral'],
                                            datasets: [{
                                                label: '',
                                                borderColor: [Globals.success, Globals.danger, Globals.info],
                                                backgroundColor: ['rgba(' + Globals.tertiaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.primaryrgb + ',0.1)'],
                                                borderWidth: 1,
                                                data: [<?php echo"$liked, $disliked, $neutral"; ?>],
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
                    
                    
                    $liked=0;
                    $disliked=0;
                    $neutral=1;
                    
                    if($mtype=="ADMIN") $ldn1 = "select * from client_feedback where status='ON' order by id asc";
                    else $ldn1 = "select * from client_feedback where employeeid='".$_COOKIE["userid"]."' and status='ON' order by id asc";
                    $ldn2 = $conn->query($ldn1);
                    if ($ldn2->num_rows > 0) { while($ldn3 = $ldn2->fetch_assoc()) {
                        if($_GET["v"]=="M"){
                            $pmonth=date("Y-m", $ldn3["date"]);
                            if($_GET["vm"]==$pmonth){
                                if($ldn3["reaction"]==1) $liked=($liked+1);
                                if($ldn3["reaction"]==2) $disliked=($disliked+1);
                                if($ldn3["reaction"]==0) $neutral=($neutral+1);
                            }
                        }else{
                            $pyear=date("Y", $ldn3["date"]);
                            if($_GET["vy"]==$pyear){
                                if($ldn3["reaction"]==1) $liked=($liked+1);
                                if($ldn3["reaction"]==2) $disliked=($disliked+1);
                                if($ldn3["reaction"]==0) $neutral=($neutral+1);
                            }
                        }
                    } }
                    
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
                                            labels: ['Liked', 'Disliked', 'Neutral'],
                                            datasets: [{    
                                                label: '',
                                                borderColor: [Globals.primary, Globals.success, Globals.warning],
                                                backgroundColor: ['rgba(' + Globals.primaryrgb + ',0.1)', 'rgba(' + Globals.secondaryrgb + ',0.1)', 'rgba(' + Globals.tertiaryrgb + ',0.1)'],
                                                borderWidth: 1,
                                                data: [<?php echo"$liked, $disliked, $neutral"; ?>],
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