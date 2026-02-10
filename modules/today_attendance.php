<?php
    
    error_reporting(0);
    date_default_timezone_set("Australia/Sydney");
    
    $sheba="shifting_allocation";
    $cid=10001;
    $title="Assign New Shift";
    $utype="Clock IN & OUT (Attendance)";

    $timenow=time();
    $timenowx=date("h:i:s A", $timenow);
    $currentday=date("l", $timenow);
                        
    $tyear=substr($_COOKIE["shiftingidtoday"],0,4);
    $tmonth=substr($_COOKIE["shiftingidtoday"],5,2);
    $tday=substr($_COOKIE["shiftingidtoday"],8,2);
            
    $dd=date("d", $timenow);
    $dm=date("m", $timenow);
    $dy=date("Y", $timenow);
            
    $shift_today=date("Y-m-d", $timenow);
    $week_number = date("W", strtotime('now'));
    
    if(isset($_POST["src_employeeid"]) AND strlen($_POST["src_employeeid"])>=2) $src_employeeid=$_POST["src_employeeid"];
    else $src_employeeid=$userid;
    
    if(isset($_GET["src_employeeid"]) AND strlen($_GET["src_employeeid"])>=2) $src_employeeid=$_GET["src_employeeid"];
    else $src_employeeid=$userid;
    
    ?><!-- <script language=JavaScript> document.shift_today.submit(); </script> --><?php
    
    if(isset($_COOKIE["projectid"])){

        if(isset($_COOKIE["shiftingidtoday"])){
            echo"<div class='data-table-rows slim' id='sample'>
                <div class='data-table-responsive-wrapper'>";
    
                    if(isset($_COOKIE["timeclockstat"])){
                        
                        // First name   Job     Clock in    Clock out   Total hours     Regular hours   Overtime    Paid time off 
                        
                        echo"<div class='wrapper wrapper-content animated fadeIn'><br><br>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='card text-white bg-primary'>
                                        <div class='card-header'><center><span style='font-size:12pt'>Clock-in & Clock-Out</span></div>
                                        <div class='card-body' style='height:360px'>
                                            <div id='clockinout' style='width:100%'></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-4'>
                                    <div class='card'>
                                        <div class='card-header'><center><span style='font-size:12pt'>My Day Log</span></div>
                                        <div class='card-body' style='height:360px'>
                                            <center><span style='font-size:10pt'>Admin's Note</span></center><br>";
                                                $clientlocation="";
                                                $tc4 = "select * from shifting_allocation where id='".$_COOKIE["timeclockstat"]."' order by id asc limit 1";
                                                $tc5 = $conn->query($tc4);
                                                if ($tc5->num_rows > 0) { while($tc6 = $tc5 -> fetch_assoc()) {
                                                    echo"<span style='font-size:10pt'>".$tc6["admin_note"]."</span>";
                                                    $clientlocation=$tc6["address"];
                                                } }
                                            echo"<hr><center><span style='font-size:10pt'>User's Note</span></center><br>
                                            <form method='post' name='shift_log' action='scheduling-set.php' target='dataprocessor' enctype='multipart/form-data'>";
                                                $tc1 = "select * from shifting_allocation where id='".$_COOKIE["timeclockstat"]."' order by id asc limit 1";
                                                $tc2 = $conn->query($tc1);
                                                if ($tc2->num_rows > 0) { while($tc3 = $tc2 -> fetch_assoc()) {
                                                    echo"<textarea id='summernote' name='log_note' class='form-control'>".$tc3["activity_log"]."</textarea>";
                                                } }
                                                echo"<br><center>
                                                <input type=submit class='btn btn-primary' value='Update'></center>
                                            </form><hr>
                                            <center><a href='scheduling-unset.php?unset=timeclock' class='btn btn-warning'>Back to Schedule</a></center><br>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='col-lg-4'>
                                    <div class='card'>
                                        <div class='card-header'><center><span style='font-size:12pt'>Client Location & Assigned Tasks</span></div>
                                        <div class='card-body' style='height:360px'>
                                            <span style='font-size:12pt'><b>$clientlocation</b></span><Br>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <table><tr><td><h5>Timesheet</h5></td><td>"; ?>
                                        <script type="text/javascript">
                                            $( function() {
                                                $('#datepicker').change(function(){
                                                    $('#shift_date').submit();
                                                });
                                            });
                                        </script> <?php
                                        /*
                                        echo"<form method='post' name='shift_date' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                            <table><tr>
                                                <td><input type='date' id='datepicker' name='shiftingiduser' class='form-control' style='font-size:8pt;border-radius:20px;width:130px;' value='".$_COOKIE["shiftingidtoday"]."'></td>
                                                <td><input type=submit  style='background-color:$topbar_color;color:$tbtc' value='Go'></td>
                                            </tr></table>
                                        </form>
                                        */
                                        echo"</td></tr></table>
                                    </div>
                                        <div class='card-body' style='height:360px'>
                                            <table class='table table-striped'>
                                                <thead><tr>
                                                    <th>Date</th><th>Status</th><th>Start</th><th>End</th><th>Total hours</th><th>Shift Hours</th><th>Overtime</th><th>Log</th>
                                                </tr></thead>
                                                <tbody><div id='$datatarget' style='padding:0px'>";
                                                    // $todayx=strtotime($_COOKIE["shiftingidtoday"]);
                                                    $todayx=time();
                                                    $d= date("d", $todayx);
                                                    $m= date("m", $todayx);
                                                    $y= date("Y", $todayx);
                                                    
                                                    // $r5a = "select * from shifting_allocation where employeeid='".$_COOKIE["userid"]."' days='$d' and months='$m' and years='$y' and status='1' order by id asc";
                                                    $r5a = "select * from shifting_allocation where employeeid='".$_COOKIE["userid"]."' and days='$d' and months='$m' and status='1' order by id asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $clientname="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname=$r1z["username"]; } }
                                                        $projectname="";
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                                                                                        
                                                        $stime=strtotime($r5c['stime']);
                                                        $sdate=date("d-m-Y", $stime);
                                                        $stime=date("h:i a", $stime);
                                                        
                                                        $etime=strtotime($r5c['etime']);
                                                        $etime=date("h:i a", $etime);
                                                        
                                                        if($r5c['clockin']!=0) $clockin=date("h:i a", $r5c['clockin']); else $clockin="-";
                                                        if($r5c['clockout']!=0) $clockout=date("h:i a", $r5c['clockout']); else $clockout="-";
                                                        
                                                        if($r5c['clockin']!=0 and $r5c['clockout']!=0){
                                                            $clockout2=date("Y-m-d h:i:s a", $r5c['clockout']);
                                                            $clockin2=date("Y-m-d h:i:s a", $r5c['clockin']);
                                                            $date1=date_create("$clockout2");
                                                            $date2=date_create("$clockin2");
                                                            $diff1=date_diff($date1,$date2);
                                                            $total_hour_worked= $diff1->format("%H:%S");
                                                            if($total_hour_worked<=0) $total_hour_worked=00;
                                                            $date3=date_create($r5c['etime']);
                                                            $date4=date_create($r5c['stime']);
                                                            $diff2=date_diff($date3,$date4);
                                                            $shift_total= $diff2->format("%H:%S");
                                                            $total_overtime=($total_hour_worked-$shift_total);
                                                            if($total_overtime<=0) $total_overtime=00;
                                                        }else{
                                                            $total_hour_worked=0;
                                                            $shift_total=0;
                                                            $total_overtime=0;
                                                        }
                                                        $t=($t+1);
                                                        echo"<tr class='gradeX'><td>$sdate</td><td align=left>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br>$stime-$etime</td>
                                                        <td>$clockin</td><td>$clockout</td><td>$total_hour_worked H</td>
                                                        <td>$shift_total H</td><td>$total_overtime H</td>
                                                        <td>
                                                            <a href='#' class='btn btn-warking' data-bs-toggle='modal' data-bs-target='#activitylog$t')\">View</a>
                                                            <div class='modal fade' id='activitylog$t' tabindex='-1' role='dialog' aria-labelledby='CenterPageModalLabel' aria-hidden='true'>
                                                                <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title' id='verticallyCenteredScrollableLabel'>Day Activity Log</h5>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                        </div>
                                                                        <div class='modal-body'>".$r5c["activity_log"]."</div>
                                                                        <div class='modal-footer'><button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td></tr>";
                                                        
                                                    } }
                                                echo"</div></tbody>"; ?>
                                                <script type="text/javascript">
                                                    function getShiftData(shiftid,shittable){
                                                        $.ajax({
                                                            url: 'schedule-inout-report.php?<?php echo"stime=$stimec&" ?>shiftid='+shiftid, 
                                                            success: function(html) {
                                                                var ajaxDisplay = document.getElementById(shittable);
                                                                ajaxDisplay.innerHTML = html;
                                                            }
                                                        });
                                                    }
                                                </script> <?php
                                            echo"</table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";    
                        
                    }else{
                        
                        $s7x = "select * from uerp_user where id='$src_employeeid' order by username asc limit 1";
                        $r7x = $conn->query($s7x);
                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { $empname="".$rs7x["username"]." ".$rs7x["username2"].""; } }

                        echo"<div class='tabs-container'>
                                <div class='row animated fadeInDown'>
                                    <div class='col-lg-12' style='text-align:center'>
                                        <div class='ibox'>
                                            <div class='panel-body' style='padding:0px'>
                                                <div class='ibox-content' style='padding-left:5px;padding-right:5px'><br>
                                                    <center><h3>$empname's Attendance</h3><p>Only today's shift can be Clocked-In $shift_today</p></center><hr>";
                                                    
                                                    $todayx=$shift_today;
                                                    $todayx=strtotime($todayx);
                                                    $todayz=time();
                                                    $y= date("Y", $todayz);
                                                    $day= date("d", $todayz);
                                                    $month= date("m", $todayz);
                                                                    
                                                    $m1= date("M", $todayx); $d1= date("d", $todayx); $mm1= date("m", $todayx); $d11= date("l", $todayx);
                                                                
                                                    if($d2<=9) $d222="0$d2"; else $d222=$d2;
                                                    if($d3<=9) $d333="0$d3"; else $d333=$d3;
                                                    if($d4<=9) $d444="0$d4"; else $d444=$d4;
                                                    if($d5<=9) $d555="0$d5"; else $d555=$d5;
                                                    if($d6<=9) $d666="0$d6"; else $d666=$d6;
                                                    if($d7<=9) $d777="0$d7"; else $d777=$d7;
                                                                                
                                                    if($m1=="Jan" || $m1=="Mar" || $m1=="May" || $m1=="July" || $m1=="Aug" || $m1=="Oct" || $m1=="Dec") $lastdate=31;
                                                    else $lastdate=30;
                                                    if($m1=="Feb") $lastdate=date("t", $todayx); 
                                                                    
                                                    if($day=="$d1" AND $month=="$mm1" AND $y=="$y"){ $bgcolor1="$sidebar_color"; $color1="$sbtc"; } else{ $bgcolor1="#EEEEEE"; $color1="#000000"; }
                                                    
                                                    echo"<div class='row'>";
                                                    
                                                        $ra7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' and status='1' order by username asc";
                                                        $rb7 = $conn->query($ra7);
                                                        if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {        
                                                            
                                                            if($d1<=$lastdate){
                                                                $empid=$rab7["id"];
                                                                $empuid=$rab7["unbox"];
                                                                $datatarget="$empid$y-$mm1-$d1";
                                                                $datatarget11="$empuid$d1$y";
                                                                $getData="getData$d1";
                                                                if($day=="$d1" AND $month=="$mm1" AND $y=="$y") $bgcolor="$sidebar_color";
                                                                else $bgcolor="";
                                                                            
                                                                $lts=0;
                                                                $lt1 = "select * from leave_asign where cid='".$_COOKIE["userid"]."' and day='$d1' and month='$mm1' and year='$y' and status='1' order by id asc limit 1";
                                                                $lt2 = $conn->query($lt1);
                                                                if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                                if($lts==1){
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='card text-white bg-warning'>
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d11<br>$d111 $m1, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-12'>
                                                                        <div class='card'>
                                                                            <div class='card-header'>
                                                                                <a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-warning'>Set Unavailable</a>
                                                                                <br><span style='font-size:12pt'>$d11 $d1 $m1, $y<br></span>
                                                                            </div>
                                                                            <div class='card-body' style='padding:5px'><center>
                                                                                <div id='$datatarget' style='padding:0px;width:98%;text-align:center'>
                                                                                    <div class='row'>";
                                                                                        /*
                                                                                        if(isset($_COOKIE["timeclockin"])){
                                                                                            echo"<div class='ibox-content' style='height:330px'>
                                                                                                <div id='clockinout2' style='width:100%'></div>
                                                                                            </div>";    
                                                                                        }else{
                                                                                        */
                                                                                            $tox=0;
                                                                                            $tox1=0;
                                                                                            $r5x1 = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d1' and months='$mm1' and years='$y' and status='1' order by id asc";
                                                                                            $r5x2 = $conn->query($r5x1);
                                                                                            if ($r5x2->num_rows > 0) { while($r5x3 = $r5x2 -> fetch_assoc()) { $tox=($tox+1); } }
                                                                                            if($tox==1) $tox1="12";
                                                                                            else if($tox==2) $tox1="6";
                                                                                            else $tox1="4";
                                                                                            
                                                                                            $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d1' and months='$mm1' and years='$y' and status='1' order by id asc";
                                                                                            $r5b = $conn->query($r5a);
                                                                                            if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                                                                $clientname="";
                                                                                                $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
                                                                                                $r1y = $conn->query($r1x);
                                                                                                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                                                                                    $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                                                                                                    $clientphone=$r1z["phone"];
                                                                                                } }
                                                                                                $projectname="";
                                                                                                $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
                                                                                                $r2y = $conn->query($r2x);
                                                                                                if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                                                                                                
                                                                                                $stime=substr($r5c['stime'],11,5);
                                                                                                $etime=substr($r5c['etime'],11,5);
                                                                                                $stime1=""; $stime2=""; $sstat="";
                                                                                                $etime1=""; $etime2=""; $estat="";
                                                                                                $stime1=substr($r5c['stime'],11,2);
                                                                                                $stime2=substr($r5c['stime'],14,2);
                                                                                                if($stime1>=13) $stime1=($stime1-12);    
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
                                                                                                $etime1=substr($r5c['etime'],11,2);
                                                                                                $etime2=substr($r5c['etime'],14,2);
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
                                                                                                if($r5c["accepted"]=="0"){
                                                                                                    $statuscolor="#CCCCCC";
                                                                                                    $statuscolor2="#000000";
                                                                                                }else{
                                                                                                    $statuscolor=$r5c["color"];
                                                                                                    $statuscolor2="#FFFFFF";
                                                                                                }
                                                                                                
                                                                                                $stimeA1="";
                                                                                                $etimeA1="";
                                                                                                $stimeA=strtotime($r5c["stime"]);
                                                                                                $etimeA=strtotime($r5c["etime"]);
                                                                                                $stimeA1=date("h:i A", $stimeA);
                                                                                                $etimeA1=date("h:i A", $etimeA);
                                                                                                
                                                                                                echo"<div class='col-md-$tox1' style='min-height:200px'>
                                                                                                    <div style='width:100%;padding:2px;' id='".$r5c["id"]."'>";
                                                                                                        if($r5c["accepted"]==1 and $day=="$d1" AND $month=="$mm1" AND $y=="$y"){
                                                                                                            // if($r5c["clockin"]!=0){
                                                                                                            //    echo"<div class='ibox-content' style='height:330px'><div id='clockinout2' style='width:100%'></div></div>";
                                                                                                            // }else{
                                                                                                                echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."' class='dropdown-item' style='border-radius:20px'>";
                                                                                                            // }
                                                                                                        } else echo"<a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' onclick=\"getDataMove1('".$r5c["id"]."', 'schedulemover2')\">";
                                                                                                        
                                                                                                            echo"<div class='btn btn-success' style='width:250px;text-align:center;border-radius:10px'>
                                                                                                                <i data-acorn-icon='clock'></i><hr>
                                                                                                                <span style='font-size:12pt'><b>$stimeA1 - $etimeA1</b></span><br>
                                                                                                                <span style='font-size:8pt'>$clientname</span><br>
                                                                                                                <span style='font-size:8pt'>$projectname</span><br>
                                                                                                                <span style='font-size:8pt'>";
                                                                                                                    if($r5c["night"]==1) echo"Over Night Shift";
                                                                                                                    else echo"Regular Shift";
                                                                                                                echo"</span><hr>
                                                                                                                <span style='font-size:8pt'>Location:<b><br>".$r5c["address"]."</b></span><hr>
                                                                                                                <span style='font-size:8pt'>Admin Note: <b><br>".$r5c["admin_note"]."</b></span>
                                                                                                            </div>
                                                                                                            
                                                                                                        </a>
                                                                                                    </div>";
                                                                                                    
                                                                                                    if($r5c["accepted"]==1 and $day=="$d1" AND $month=="$mm1" AND $y=="$y"){
                                                                                                        
                                                                                                        if($r5c["clockin"]=="0") echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='btn btn-primary'>Clock IN</a><br>";
                                                                                                        else{
                                                                                                            if($r5c["clockout"]=="0") echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='btn btn-warning'>Clocked IN Status</a><br>";
                                                                                                            else echo"<a href='#' class='btn btn-danger'>Clocked Out</a><br>";
                                                                                                        }
                                                                                                    }
                                                                                                    if($r5c["accepted"]==0){
                                                                                                        if($r5c["request2"]==1){
                                                                                                            $stimeA1="";
                                                                                                            $etimeA1="";
                                                                                                            $stimeA=strtotime($r5c["stime2"]);
                                                                                                            $etimeA=strtotime($r5c["etime2"]);
                                                                                                            $stimeA1=date("h:i A", $stimeA);
                                                                                                            $etimeA1=date("h:i A", $etimeA);
                                                                                                            echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeA1 - $etimeA1</a>";
                                                                                                        }
                                                                                                        if($r5c["request2"]==3){
                                                                                                            echo"<a href='#' class='dropdown-item btn btn-info'>Re-Schedule Rejected/Not Approved.</a>";
                                                                                                        }
                                                                                                        if($r5c["request2"]==2){
                                                                                                            echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='dropdown-item btn btn-success'>Re-Schedule Accepted.</a>";
                                                                                                        }
                                                                                                        
                                                                                                        echo"<button class='btn btn-warning' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">Accept Schedule</button>";
                                                                                                        
                                                                                                    }
                                                                                                echo"</div>";
                                                                                            } }
                                                                                        /* } */
                                                                                    echo"</div>
                                                                                </div>"; ?>
                                                                                
                                                                                <script type="text/javascript">
                                                                                    function  <?php echo"$getData"; ?>(employeeid1,<?php echo"$datatarget11"; ?>){
                                                                                        $.ajax({
                                                                                            url: 'schedule-track2.php?<?php echo"days=$d1&months=$mm1&years=$y&" ?>empid='+employeeid1, 
                                                                                            success: function(html) {
                                                                                                var ajaxDisplay = document.getElementById(<?php echo"$datatarget11"; ?>);
                                                                                                ajaxDisplay.innerHTML = html;
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                </script> <?php
                                                                                
                                                                            echo"<br><br></div>
                                                                        </div>
                                                                    </div>";
                                                                }
                                                            }
                                                        } }    
                                                    
                                                    echo"</div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";

                    }
                echo"</div>
            </div>";
            
        }else{
            echo"<form method='get' action='scheduling-set.php' name='main' target='_top'>
                <input type=hidden name='projectid' value='0'><input type='hidden' name='shiftingidtoday' value='$shift_today'>
                <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }else{
        echo"<form method='get' action='scheduling-set.php' name='main' target='_top'>
            <input type=hidden name='projectid' value='0'><input type='hidden' name='shiftingidtoday' value='$shift_today'>
            <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }

?>
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    
    <?php if(isset($_COOKIE["timeclockstat"])) echo"<script src='js/inspinia.js'></script>"; ?>
    
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });

    </script>
    
    
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