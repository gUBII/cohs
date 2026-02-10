<?php
    error_reporting(0);

    $sheba="shifting_allocation";
    $cid=10001;
    $title="Assign New Shift";
    $utype="ROSTERING";

    date_default_timezone_set("Australia/Sydney");
    $timenow=time();
    $timenowx=date("h:i:s A", $timenow);
    $currentday=date("l", $timenow);
                        
    $tyear=substr($_COOKIE["shiftingidtodayview"],0,4);
    $tmonth=substr($_COOKIE["shiftingidtodayview"],5,2);
    $tday=substr($_COOKIE["shiftingidtodayview"],8,2);
            
    $dd=date("d", $timenow);
    $dm=date("m", $timenow);
    $dy=date("Y", $timenow);
            
    $shift_today=date("Y-m-d", $timenow);
    
    ?><!-- <script language=JavaScript> document.shift_today.submit(); </script> --><?php

    $week_number = date("W", strtotime('now'));
            
    if(!isset($_POST["src_employeeid"])) $src_employeeid="ALL";
    else $src_employeeid=$_POST["src_employeeid"];
    
    if(isset($_COOKIE["shiftingidtodayview"])){
        
        if($_COOKIE["shiftingidtodayview"]!="0"){
            
            echo"<div class='row'>
                <div class='col-12 col-md-5' style='padding-bottom:10px'>
                    
                    <h1 class='mb-0 pb-0 display-4' id='title'>Daily Shifts</h1>
                
                    <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                        <ul class='breadcrumb pt-0'>
                            <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                            if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Scheduling</a></li>";
                            if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                        echo"</ul>
                    </nav>
                </div>
                <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>";
                if($designationy==13){
                    echo"<a href='index.php?url=schedule.php'>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Shift Allocation</span>
                    </button></a>

                    <a href='index.php?url=time_sheet.php&id=5198'>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Time Sheet</span>
                    </button></a>";
                }    
                echo"</div>
            </div>
            <div class='data-table-rows slim' id='sample'>
                <div class='data-table-responsive-wrapper'>
                    <table width=100%><tr>";
                        if($designationy==13){
                            echo"<td align=left width='50'>";
                                $shift_today=time();
                                $shift_today=date("Y-m-d", $shift_today);
                                echo"<a class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' href='index.php?url=schedule_jobs.php' target='_self' style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Roster by Jobs'>Roster by Jobs</a>
                            </td><td align=left width='50'>
                                <a class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' href='index.php?url=schedule.php' target='_self' style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Roster by Users'>Roster by Users</a>                            
                            </td>";
                        }
                        echo"<td align=left width='50' style='padding-right:5px' nowrap>
                            <form method='get' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                <input type='hidden' name='shiftingidtodayview' value='$shift_today'>
                                <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                                <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                <input type=submit style='margin-top:0px' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' value='View Today'  style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Today'>
                            </form>
                        </td><td align=left width='230' nowrap>
                            <form method='get' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                <table><tr>
                                    <td style='padding-right:5px' >
                                        <input type='date' name='shiftingidtodayview' class='form-control' value='$tyear-$tmonth-$tday' style='width:130px'>
                                        <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                                        <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                    </td>
                                    <td><input type=submit style='margin-top:0px' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' value='View Date'  style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Date'></td>
                                </tr></table>
                            </form>
                        </td><td align=right>";
                        if($designationy==13){
                            echo"<table ><tr>
                                <td align=left width=50 nowrap style='padding-right:10px'>
                                    <a href='index.php?smsbd=schedule-board-pdf' target='_self' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-top:-15px;margin-right:5px'>
                                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Print As PDF'>Print PDF</span>
                                    </a>
                                </td>
                                <td align=left width=100 nowrap>
                                    <div class='dropdown-as-select d-inline-block datatable-length' data-datatable='#datatableRows' data-childSelector='span' style='margin-top:-15px;'>
                                        <button class='btn p-0 shadow' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-bs-offset='0,3'>
                                        <span class='btn btn-foreground-alternate dropdown-toggle' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-delay='0' title='Item Count'>10 Items</span>
                                        </button>
                                        <div class='dropdown-menu shadow dropdown-menu-end'>
                                            <a class='dropdown-item' href='#'>5 Items</a>
                                            <a class='dropdown-item active' href='#'>10 Items</a>
                                            <a class='dropdown-item' href='#'>20 Items</a>
                                        </div>
                                    </div>
                                </td>
                            </tr></table>";
                        }
                        echo"</td>
                    </tr></table>
                </div>
                
                <div class='tab-content'>";

            
            echo"<div class=row>
                <div class='col-lg-12'><br><h2>Shift Date: $tday-$tmonth-$tyear</div>
            </div>
            <div class='table-responsive' id='dailyclockinout'>";

                if(isset($_COOKIE["shiftingidtodayview"])){
                    echo"<table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead>
                            <thead><tr><th nowrap>Users</th><th>Jobs</th><th>In</th><th>Out</th><th>Clocked In</th><th>Clocked Out</th><th>Total</th></tr></thead>
                        </thead>
                        <tbody>";
                            if($designationy==13) $s7 = "select * from shifting_allocation where days='$tday' and months='$tmonth' and years='$tyear' and status='1' order by stime asc";
                            else $s7 = "select * from shifting_allocation where employeeid='$userid' and days='$tday' and months='$tmonth' and years='$tyear' and status='1' order by stime asc";
                            $r7 = $conn->query($s7);
                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                $totalworkhour=0;
                                $totalworkclock="00:00:00";
                                $currentdate=date("Y-m-d h:i:s a", $timenow);
                                $clockindate=date("Y-m-d h:i:s a", $rs7["clockin"]);
                                $date1=date_create("$clockindate");
                                $date2=date_create("$currentdate");
                                $diff=date_diff($date1,$date2);
                                $totalworkclock= $diff->format("%H:%I");
                                $totalworkhour= $diff->format("%H Hours");
                                                            
                                $clientname="";
                                $clientaddress="";
                                $s7x = "select * from uerp_user where id='".$rs7["clientid"]."' order by id desc limit 1";
                                $r7x = $conn->query($s7x);
                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                    $clientname="".$rs7x["username"]." ".$rs7x["username2"]."";
                                    $clientaddress="".$rs7x["address"].", ".$rs7x["city"].", ".$rs7x["area"]."- ".$rs7x["zip"].", ".$rs7x["country"]."";
                                } }
                                                            
                                $employeename="";
                                $employeephone="";
                                $s7y = "select * from uerp_user where id='".$rs7["employeeid"]."' order by id desc limit 1";
                                $r7y = $conn->query($s7y);
                                if ($r7y->num_rows > 0) { while($rs7y = $r7y->fetch_assoc()) {
                                    $employeename="".$rs7y["username"]." ".$rs7y["username2"]."";
                                    $employeephone=$rs7y["phone"];
                                } }
                                                            
                                if($rs7["clockin"]!=0) $clockedin=date("h:i a", $rs7["clockin"]);
                                else $clockedin=0;
                                                            
                                if($rs7["clockout"]!=0) $clockedout=date("h:i a", $rs7["clockout"]);
                                else $clockedout=0;
                                                            
                                $stime=substr($rs7["stime"],11,5);
                                $etime=substr($rs7["etime"],11,5);
                                $stime1=""; $stime2=""; $sstat="";
                                $etime1=""; $etime2=""; $estat="";
                                $stime1=substr($rs7['stime'],11,2);
                                $stime2=substr($rs7['stime'],14,2);
                                if($stime1>=13){
                                    $stime1=($stime1-12);
                                    if($stime1<="9") $stime1="0$stime1";
                                    $sstat="PM";
                                }else{
                                    $sstat="AM";
                                }
                                if($stime1==00){
                                    $stime1=12;
                                    $sstat="AM";
                                }else if($stime1==12){
                                    $sstat="PM";
                                }
                                $etime1=substr($rs7['etime'],11,2);
                                $etime2=substr($rs7['etime'],14,2);
                                if($etime1>=13){
                                    $etime1=($etime1-12);
                                    if($etime1<="9") $etime1="0$etime1";
                                    $estat="PM";
                                }else{
                                    $estat="AM";
                                }
                                if($etime1==00){
                                    $etime1=12;
                                    $estat="AM";
                                }else if($etime1==12){
                                    $estat="PM";
                                }
                                /*
                                red = not clockedin
                                orange = not clocked out
                                blue = clockedout
                                */
                                if($rs7["clockin"]==0 AND $rs7["clockout"]==0){
                                    $tdiff1=0;
                                    $tdiff1=strtotime($rs7["stime"]);
                                    if($tdiff1<=$timenow) echo"<tr class='gradeX zoom'>";
                                    else echo"<tr class='gradeX zoom'>";
                                }else if($rs7["clockin"]!=0 AND $rs7["clockout"]==0){
                                    $tdiff2=0;
                                    $tdiff2=strtotime($rs7["etime"]);
                                    if($tdiff2<=$timenow) echo"<tr class='gradeX zoom'>";
                                    else echo"<tr class='gradeX zoom'>";
                                }else if($rs7["clockin"]!=0 AND $rs7["clockout"]!=0){
                                    echo"<tr class='gradeX zoom'>";
                                }else{
                                    echo"<tr class='gradeX zoom'>"; 
                                }                                
                                echo"<td nowrap><b>$employeename</b><br>Call: <a href='tel:$employeephone'>$employeephone</a></td>
                                <td nowrap>$clientname<br>$clientaddress</td>
                                <td nowrap>$stime1:$stime2 $sstat</td><td nowrap>$etime1:$etime2 $estat</td>
                                <td nowrap>";
                                    if($rs7["clockin"]!=0) echo"$clockedin <a href='https://maps.google.com/maps?q=".$rs7["latitude_in"].",".$rs7["longitude_in"]."&hl=es;z=14' style='color:black;font-size:8pt' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i></a>"; else echo"-";
                                echo"</td><td nowrap>";
                                    if($clockedin!="0" AND $clockedout!="0") echo"$clockedout <a href='https://maps.google.com/maps?q=".$rs7["latitude_out"].",".$rs7["longitude_out"]."&hl=es;z=14' style='color:black;font-size:8pt' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i></a>"; else echo"-";
                                echo"</td>
                                <td nowrap></td>
                                </tr>";
                            } }   
                        echo"</tbody>
                    </table>";
                }
            
            echo"</div>";
        }
    }else{
        echo"<form method='get' action='scheduling-set.php' name='main' target='_top'>
            <input type='hidden' name='shiftingidtodayview' value='$shift_today'>
            <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
            <input type=hidden name='url' value='".$_GET["url"]."'>
            <input type=hidden name='id' value='".$_GET["id"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    ?>
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>

    <script type="text/javascript">
        $(function () {
            var i = -1;
            var toastCount = 0;
            var $toastlast;

            $('#showshiftingnotification').click(function (){
                toastr.success('Notification sent to user for quick response.','Shift Allocation Updated.'),
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "progressBar": true,
                  "preventDuplicates": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "200",
                  "hideDuration": "100",
                  "timeOut": "3000",
                  "extendedTimeOut": "100",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
            });
            function getLastToast(){
                return $toastlast;
            }
            $('#clearlasttoast').click(function () {
                toastr.clear(getLastToast());
            });
            $('#cleartoasts').click(function () {
                toastr.clear();
            });
        })
    </script>


