<?php
    
    error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    
    $sheba="shifting_allocation";
    $cid=10001;
    $title="Assign New Shift";
    $utype="Clock IN & OUT";

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
            echo"<div class='row'>
                <div class='col-8 col-md-7' style='padding-bottom:10px'>
                    <h1 class='mb-0 pb-0 display-4' id='title'>Clock IN/OUT</h1>
                    <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                        <ul class='breadcrumb pt-0'>
                            <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                            if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                        echo"</ul>
                    </nav>
                </div>
                <div class='col-4 col-md-5 d-flex align-items-start justify-content-end'>
                    <a href='index.php?url=time_sheet.php&id=5198' target='_self' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-top:0px;margin-left:10px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Time Sheet'>Time Sheet</span>
                    </a>
                </div>
                <div class='col-12 '>"; ?>
                    <script type="text/javascript">
                        $( function() {
                            $('#datepicker').change(function(){
                                $('#shift_date').submit();
                            });
                        });
                    </script> <?php
                    
                    $weekvar=strtotime($_COOKIE["shiftingidtoday"]);
                    $weekvar1=date("W", $weekvar);
                    $weekvar2=date("Y", $weekvar);
                    $weekvar="$weekvar2-W$weekvar1";
                            
                    $weekvar3=$weekvar2;
                    $prevweek=($weekvar1-1);
                    if($prevweek<=0){
                        $prevweek=52;
                        $weekvar3=($weekvar2-1);
                    }    
                            
                    if($prevweek<=9) $prevweek="0$prevweek";
                    $prevweek="$weekvar3-W$prevweek";
                            
                    $weekvar4=$weekvar2;
                    $weekcopy=($weekvar1+1);
                    if($weekcopy<=9) $weekcopy="0$weekcopy";
                    if($weekcopy>=53){
                        $weekvar4=($weekvar2+1);
                        $weekcopy="01";
                    }
                            
                    $weekcopy="$weekvar4-W$weekcopy";
                    
                    echo"<table><tr>";
                        
                        if($viewpoint=="DESKTOP"){
                            echo"<td valign=top style='width:150px'><form method='GET' name='shift_date' action='index.php' target='_self' enctype='multipart/form-data'>
                                <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                                <select class='form-control form-control-sm' name='src_employeeid' onchange='this.form.submit()' style='width:150px;margin-right:5px' >";
                                    if($mtype=="USER"){
                                        echo"<option value='$userid'><strong>$username $username2</strong></option>";
                                    }else{
                                        $s7 = "select * from uerp_user where mtype='USER' and status='1' or mtype='EMPLOYEE' and status='1' or mtype='ADMIN' and status='1' order by username asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                    }
                                echo"</select>
                            </form></td>";
                        }
                        echo"<td align=left width='50'>
                            <form method='get' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                <input type='hidden' name='projectid' value='0'><input type='hidden' name='shiftingidtoday' value='0'>
                                <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                                <input type='hidden' name='src_employeeid' value='$src_employeeid'>   
                                <input type=submit class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' value=\"Current Week\" style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Week View'>
                            </form>
                        </td>";
                        echo"<td align=left width='50' nowrap>";
                            ?><script type="text/javascript">
                                // function myDateFunction() {
                                    //   document.getElementById("shift_date").submit();
                                // }
                                $( function() {
                                    $('#datepicker').change(function(){
                                        $('#shift_date').submit();
                                    });
                                });
                            </script> <?php
                            
                            $weekvar=strtotime($_COOKIE["shiftingidtoday"]);
                            $weekvar1=date("W", $weekvar);
                            $weekvar2=date("Y", $weekvar);
                            $weekvar="$weekvar2-W$weekvar1";
                            
                            $weekvar3=$weekvar2;
                            $prevweek=($weekvar1-1);
                            if($prevweek<=0){
                                $prevweek=52;
                                $weekvar3=($weekvar2-1);
                            }    
                            
                            if($prevweek<=9) $prevweek="0$prevweek";
                            $prevweek="$weekvar3-W$prevweek";
                            
                            $weekvar4=$weekvar2;
                            $weekcopy=($weekvar1+1);
                            if($weekcopy<=9) $weekcopy="0$weekcopy";
                            if($weekcopy>=53){
                                $weekvar4=($weekvar2+1);
                                $weekcopy="01";
                            }
                            
                            $weekcopy="$weekvar4-W$weekcopy";
                            
                            echo"<table><tr>
                                <td style='align:right;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                    <input type='hidden' name='shiftingidtoday11' value='$prevweek'><input type='hidden' name='src_employeeid' value='$src_employeeid'>   
                                    <input type=hidden name='url' value='".$_GET["url"]."'>
                                    <button type='submit' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-left'></i></button>
                                </form></td>
                                <td><form method='post' name='shift_date' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                    <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                                    <input type='hidden' name='src_employeeid' value='$src_employeeid'>
                                    <input type='week' id='datepicker' style='width:110px' name='shiftingid22' class='form-control form-control-sm' value='$weekvar' onchange='this.form.submit()'>
                                </form></td>
                                <td style='align:left;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                    <input type='hidden' name='shiftingidtoday11' value='$weekcopy'><input type='hidden' name='src_employeeid' value='$src_employeeid'>
                                    <input type=hidden name='url' value='".$_GET["url"]."'>
                                    <button type='submit' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-right'></i></button>
                                </form></td>
                                <td align=left width=50 nowrap style='padding-right:10px'>
                                    
                                </td>                                                                    
                            </tr></table>
                        </td>
                    </tr></table>
                </div>                  
            </div>
            <div class='data-table-rows slim' id='sample'>
                <div class='data-table-responsive-wrapper'>";
    
                    if(isset($_COOKIE["timeclockstat"])){
                        
                        // First name   Job     Clock in    Clock out   Total hours     Regular hours   Overtime    Paid time off 
                        
                        echo"<div class='wrapper wrapper-content animated fadeIn'><br><br>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='card text-white bg-primary'>
                                        <div class='card-header'><center><span style='font-size:12pt'>Clock-in & Clock-Out</span></div>";
                                        
                                        if($_GET["gogo"]==1){ 
                                            
                                            date_default_timezone_set("Australia/Melbourne");
                                            
                                            $timenow=time();
                                            $timenowx=date("h:i:s A", $timenow);
                                            
                                            $tc1x = "select * from shifting_allocation where id='".$_COOKIE["timeclockstat"]."' order by id asc limit 1";
                                            $tc2x = $conn->query($tc1x);
                                            if ($tc2x->num_rows > 0) { while($tc3x = $tc2x -> fetch_assoc()) {
                    
                                                if($tc3x["clockin"]=="0") {   
                                                    
                                                    $wage_amount="";
                                                    $overtime_amount="";
                                                    
                                                    $r1w = "select * from uerp_user where id='".$tc3x['employeeid']."' order by id asc limit 1";
                                                    $r2w = $conn->query($r1w);
                                                    if ($r2w->num_rows > 0) { while($r3w = $r2w -> fetch_assoc()) {
                                                        $wage_amount=$r3w["reg_amt"];
                                                        $overtime_amount=$r3w["overtime"];
                                                        $night=$r3w["night_amt"];
                                                        
                                                    } }
                                                    
                                                    $clientnamex="";
                                                    $r1x = "select * from uerp_user where id='".$tc3x['clientid']."' order by id asc limit 1";
                                                    $r1y = $conn->query($r1x);
                                                    if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                                        $clientnamex=$r1z["username"];
                                                        $clientphonex=$r1z["phone"];
                                                    } }
                        
                                                    $projectnamex="";
                                                    $r2x = "select * from project where id='".$tc3x['projectid']."' order by id asc limit 1";
                                                    $r2y = $conn->query($r2x);
                                                    if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectnamex=$r2z["name"]; } }
                                                    
                                                    echo"<iframe name='clockinoutx' src='blank.php' height='2px' width=2px' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>";
                                                    echo"<form method='POST' name='shift_todayx' action='scheduling-geo-in.php' target='clockinoutx' enctype='multipart/form-data'>
                                                        <input type='hidden' name='timeclockin' value='$timenow'>
                                                        <input type='hidden' name='shiftname' value='$clientnamex @ $projectnamex'>
                                                        <input type='hidden' name='shiftclockin' value='".$tc3x['stime']."'>
                                                        <input type='hidden' name='shiftclockout' value='".$tc3x['etime']."'>
                                                        <input type='hidden' name='wage' value='$wage_amount'>
                                                        <input type='hidden' name='night' value='$night'>
                                                        <input type='hidden' name='overtime' value='$overtime_amount'>
                                                    </form>";
                                                    ?><script language=JavaScript> document.shift_todayx.submit(); </script><?php
                                                    
                                                }
                                            } }
                                        }
                                        echo"<div class='card-body' style='height:360px'>
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
                                            echo"<hr><center><span style='font-size:10pt'>What is your Feedback for Today? (Short EOD)</span></center>
                                            <form method='post' name='shift_log' action='scheduling-set.php' target='dataprocessor' enctype='multipart/form-data'>";
                                                $tc1 = "select * from shifting_allocation where id='".$_COOKIE["timeclockstat"]."' order by id asc limit 1";
                                                $tc2 = $conn->query($tc1);
                                                if ($tc2->num_rows > 0) { while($tc3 = $tc2 -> fetch_assoc()) {
                                                    echo"<textarea id='summernote' name='log_note' class='form-control'>".$tc3["activity_log"]."</textarea><br>
                                                    <table style='width:100%'><tr>
                                                        <td align=left width=20 nowrap>KM Travelled:</td>
                                                        <td><input type='text' value='".$tc3["milage"]."' required min=1 name='milage' style='width:60px' class='form-control'></td>
                                                        <td><select name='vehicle_option' class='form-control'>
                                                            <option value=''>Select Vehicle Option</option>
                                                            <option value='Personal Car'>Personal Car</option>
                                                            <option value='Company Car'>Company Car</option>
                                                        </select></td>
                                                        <td align=right><input type=submit class='btn btn-primary' value='Update'></td>
                                                    </tr></table>";
                                                } }
                                            echo"</form><hr>
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
                        <br><br>
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
                                        <div class='card-body' style='height:360px'>";
                                        
                                            if($viewpoint=="DESKTOP"){
                                                echo"<table class='table table-striped'>
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
                                                        $r5a = "select * from shifting_allocation where employeeid='".$_COOKIE["userid"]."' and days='$d' and months='$m' and years='$y' and status='1' order by id asc";
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
                                                echo"</table>";
                                            }else{
                                                echo"<table class='table table-striped'>
                                                    <thead><tr>
                                                        <th nowrap>ClockIN</th><th nowrap>ClockOUT</th><th nowrap>Total Hr.</th><th nowrap>OT</th><th nowrap>Log</th>
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
                                                            echo"<tr class='gradeX'>
                                                                <td>$clockin</td>
                                                                <td>$clockout</td>
                                                                <td>$total_hour_worked H</td>
                                                                <td>$total_overtime H</td> 
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
                                                                </td>
                                                            </tr>
                                                            <tr class='gradeX'>
                                                                <td colspan=10>
                                                                    $sdate - $clientname</span> @ <span style='font-size:8pt'>$projectname</span><br>
                                                                    In: $stime, Out:$etime ($shift_total Hr.)
                                                                </td>
                                                            </tr>
                                                            <tr class='gradeX'><td colspan=10>&nbsp;</td></tr>";
                                                            
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
                                                echo"</table>";
                                            }
                                        echo"</div>
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
                                                                                
                                                    if($m1=="Jan" || $m1=="Mar" || $m1=="May" || $m1=="Jul" || $m1=="Aug" || $m1=="Oct" || $m1=="Dec") $lastdate=31;
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
                                                                                <a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
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
                                                                                                        
                                                                                                        if($r5c["clockin"]=="0"){
                                                                                                            // echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='btn btn-primary'>Clock IN</a><br>";
                                                                                                            
                                                                                                            // if($_COOKIE["dbname"]=="saas_info_goodwillcare_net") echo"<label><input type='checkbox' name='terms' checked> I agree to the <a href='media/subcontractor_agreement.pdf' target='_blank'>Terms and Conditions</a></label><br>";
                                                                                                            // else echo"<label><input type='checkbox' name='terms' checked> I agree to the <a href='media/subcontractor_general_agreement.pdf' target='_blank'>Terms and Conditions</a></label><br>";
                                                                                                            
                                                                                                            echo"<a href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=$userid&id=1&status=100&gogo=1' class='btn btn-primary'>Clock IN</a><br>";
                                                                                                            
                                                                                                        }else{
                                                                                                            // if($_COOKIE["dbname"]=="saas_info_goodwillcare_net") echo"<label><input type='checkbox' name='terms' checked disabled> Agreed to the <a href='media/subcontractor_agreement.pdf' target='_blank'>Terms and Conditions</a></label><br>";
                                                                                                            // else echo"<label><input type='checkbox' name='terms' checked disabled> Agreed to the <a href='media/subcontractor_general_agreement.pdf' target='_blank'>Terms and Conditions</a></label><br>";
                                                                                                            
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
                                                                                                        
                                                                                                        // echo"<button class='btn btn-warning' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">Accept Schedule</button>";
                                                                                                        echo"<br><a class='btn btn-success' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&status=1&gogo=1' target='dataprocessor'>Accept</a><br>";
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
                                                    
                                                    <hr>
                                                    
                                                    <center><h4>Weekly Allocated Shifting List</h4></center><hr>";
                                                    
                                                    $todayx="".$_COOKIE["shiftingidtoday"]."";
                                                    $todayx=strtotime($todayx);
                                                    $todayz=time();
                                                    $y= date("Y", $todayz);
                                                    $day= date("d", $todayz);
                                                    $month= date("m", $todayz);
                                                                    
                                                    $m1= date("M", $todayx); $d1= date("d", $todayx); $mm1= date("m", $todayx); $d11= date("l", $todayx);
                                                    $m2= date("M", $todayx); $d2=($d1+1); $mm2= date("m", $todayx); $d22= date('l', strtotime('+1 day', $todayx));
                                                    $m3= date("M", $todayx); $d3=($d1+2); $mm3= date("m", $todayx); $d33= date('l', strtotime('+2 day', $todayx));
                                                    $m4= date("M", $todayx); $d4=($d1+3); $mm4= date("m", $todayx); $d44= date('l', strtotime('+3 day', $todayx));
                                                    $m5= date("M", $todayx); $d5=($d1+4); $mm5= date("m", $todayx); $d55= date('l', strtotime('+4 day', $todayx));
                                                    $m6= date("M", $todayx); $d6=($d1+5); $mm6= date("m", $todayx); $d66= date('l', strtotime('+5 day', $todayx));
                                                    $m7= date("M", $todayx); $d7=($d1+6); $mm7= date("m", $todayx); $d77= date('l', strtotime('+6 day', $todayx));
                                                                    
                                                    if($m1=="Jan" || $m1=="Mar" || $m1=="May" || $m1=="Jul" || $m1=="Aug" || $m1=="Oct" || $m1=="Dec") $lastdate=31;
                                                    else $lastdate=30;
                                                    if($m1=="Feb") $lastdate=date("t", $todayx); 
                                                    
                                                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                                                
                                                    if($d1==$lastdate){
                                                        $todayx=strtotime('+1 day', $todayx);
                                                        $y= date("Y", $todayx);
                                                        $m2= date("M", $todayx); $d2=date("d", $todayx); $mm2= date("m", $todayx); $d22= date("l", $todayx);
                                                        $m3= date("M", $todayx); $d3=($d2+1); $mm3= date("m", $todayx); $d33= date('l', strtotime('+1 day', $todayx));
                                                        $m4= date("M", $todayx); $d4=($d2+2); $mm4= date("m", $todayx); $d44= date('l', strtotime('+2 day', $todayx));
                                                        $m5= date("M", $todayx); $d5=($d2+3); $mm5= date("m", $todayx); $d55= date('l', strtotime('+3 day', $todayx));
                                                        $m6= date("M", $todayx); $d6=($d2+4); $mm6= date("m", $todayx); $d66= date('l', strtotime('+4 day', $todayx));
                                                        $m7= date("M", $todayx); $d7=($d2+5); $mm7= date("m", $todayx); $d77= date('l', strtotime('+5 day', $todayx));
                                                        $d2=($d2+0);
                                                    }
                                                    if($d2==$lastdate){
                                                        $todayx=strtotime('+2 day', $todayx);
                                                        $y= date("Y", $todayx);
                                                        $m3= date("M", $todayx); $d3=date("d", $todayx); $mm3= date("m", $todayx); $d33= date("l", $todayx);
                                                        $m4= date("M", $todayx); $d4=($d3+1); $mm4= date("m", $todayx); $d44= date('l', strtotime('+1 day', $todayx));
                                                        $m5= date("M", $todayx); $d5=($d3+2); $mm5= date("m", $todayx); $d55= date('l', strtotime('+2 day', $todayx));
                                                        $m6= date("M", $todayx); $d6=($d3+3); $mm6= date("m", $todayx); $d66= date('l', strtotime('+3 day', $todayx));
                                                        $m7= date("M", $todayx); $d7=($d3+4); $mm7= date("m", $todayx); $d77= date('l', strtotime('+4 day', $todayx));
                                                        $d3=($d3+0);
                                                    }
                                                    if($d3==$lastdate){
                                                        $todayx=strtotime('+3 day', $todayx);
                                                        $y= date("Y", $todayx);
                                                        $m4= date("M", $todayx); $d4=date("d", $todayx); $mm4= date("m", $todayx); $d44= date("l", $todayx);
                                                        $m5= date("M", $todayx); $d5=($d4+1); $mm5= date("m", $todayx); $d55= date('l', strtotime('+1 day', $todayx));
                                                        $m6= date("M", $todayx); $d6=($d4+2); $mm6= date("m", $todayx); $d66= date('l', strtotime('+2 day', $todayx));
                                                        $m7= date("M", $todayx); $d7=($d4+3); $mm7= date("m", $todayx); $d77= date('l', strtotime('+3 day', $todayx));
                                                        $d4=($d4+0);
                                                    }
                                                    if($d4==$lastdate){
                                                        $todayx=strtotime('+4 day', $todayx);
                                                        $y= date("Y", $todayx);
                                                        $m5= date("M", $todayx); $d5=date("d", $todayx); $mm5= date("m", $todayx); $d55= date("l", $todayx);
                                                        $m6= date("M", $todayx); $d6=($d5+1); $mm6= date("m", $todayx); $d66= date('l', strtotime('+1 day', $todayx));
                                                        $m7= date("M", $todayx); $d7=($d5+2); $mm7= date("m", $todayx); $d77= date('l', strtotime('+2 day', $todayx));
                                                        $d5=($d5+0);
                                                    }
                                                    if($d5==$lastdate){
                                                        $todayx=strtotime('+5 day', $todayx);
                                                        $y= date("Y", $todayx);
                                                        $m6= date("M", $todayx); $d6=date("d", $todayx); $mm6= date("m", $todayx); $d66= date("l", $todayx);
                                                        $m7= date("M", $todayx); $d7=($d6+1); $mm7= date("m", $todayx); $d77= date('l', strtotime('+1 day', $todayx));
                                                        $d6=($d6+0);
                                                    }
                                                    if($d6==$lastdate){
                                                        $todayx=strtotime('+6 day', $todayx);
                                                        $y= date("Y", $todayx);
                                                        $m7= date("M", $todayx); $d7=date("d", $todayx); $mm7= date("m", $todayx); $d77= date("l", $todayx);
                                                        $d7=($d7+0);
                                                    }
                                                                                
                                                    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                    
                                                    if($d2<=9) $d222="0$d2"; else $d222=$d2;
                                                    if($d3<=9) $d333="0$d3"; else $d333=$d3;
                                                    if($d4<=9) $d444="0$d4"; else $d444=$d4;
                                                    if($d5<=9) $d555="0$d5"; else $d555=$d5;
                                                    if($d6<=9) $d666="0$d6"; else $d666=$d6;
                                                    if($d7<=9) $d777="0$d7"; else $d777=$d7;
                                                    
                                                    // echo"[ $lastdate - $d222, $d333, $d444, $d555, $d666, $d777 ]";
                                                    
                                                    if($day=="$d1" AND $month=="$mm1" AND $y=="$y"){ $bgcolor1="$sidebar_color"; $color1="$sbtc"; } else{ $bgcolor1="#EEEEEE"; $color1="#000000"; }
                                                    if($day=="$d2" AND $month=="$mm2" AND $y=="$y"){ $bgcolor2="$sidebar_color"; $color2="$sbtc"; } else{ $bgcolor2="#EEEEEE"; $color2="#000000"; }
                                                    if($day=="$d3" AND $month=="$mm3" AND $y=="$y"){ $bgcolor3="$sidebar_color"; $color3="$sbtc"; } else{ $bgcolor3="#EEEEEE"; $color3="#000000"; }
                                                    if($day=="$d4" AND $month=="$mm4" AND $y=="$y"){ $bgcolor4="$sidebar_color"; $color4="$sbtc"; } else{ $bgcolor4="#EEEEEE"; $color4="#000000"; }
                                                    if($day=="$d5" AND $month=="$mm5" AND $y=="$y"){ $bgcolor5="$sidebar_color"; $color5="$sbtc"; } else{ $bgcolor5="#EEEEEE"; $color5="#000000"; }
                                                    if($day=="$d6" AND $month=="$mm6" AND $y=="$y"){ $bgcolor6="$sidebar_color"; $color6="$sbtc"; } else{ $bgcolor6="#EEEEEE"; $color6="#000000"; }
                                                    if($day=="$d7" AND $month=="$mm7" AND $y=="$y"){ $bgcolor7="$sidebar_color"; $color7="$sbtc"; } else{ $bgcolor7="#EEEEEE"; $color7="#000000"; }
                                                    
                                                    echo"<div class='row'>";
                                                        
                                                        
                                                        // if($d1<=$lastdate) echo"<td nowrap style='background-color:$bgcolor1'><center><a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color1'>$d11<br>$d1 $m1, $y<br></span></center></th>";
                                                        // if($d2<=$lastdate) echo"<td nowrap style='background-color:$bgcolor2'><center><a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color2'>$d22<br>$d222 $m2, $y<br></span></center></th>";
                                                        // if($d3<=$lastdate) echo"<td nowrap style='background-color:$bgcolor3'><center><a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color3'>$d33<br>$d333 $m3, $y<br></span></center></th>";
                                                        // if($d4<=$lastdate) echo"<td nowrap style='background-color:$bgcolor4'><center><a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a><hr><span style='font-size:8pt'>$d44<br>$d444 $m4, $y<br></span></center></th>";
                                                        
                                                        // if($d5<=$lastdate) echo"<td nowrap style='background-color:$bgcolor5'><center><a href='scheduling-set.php?dd=$d555&mm=$mm5&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color5'>$d55<br>$d555 $m5, $y<br></span></center></th>";
                                                        // if($d6<=$lastdate) echo"<td nowrap style='background-color:$bgcolor6'><center><a href='scheduling-set.php?dd=$d666&mm=$mm6&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color6'>$d66<br>$d666 $m6, $y<br></span></center></th>";
                                                        // if($d7<=$lastdate) echo"<td nowrap style='background-color:$bgcolor7'><center><a href='scheduling-set.php?dd=$d777&mm=$mm7&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color7'>$d77<br>$d777 $m7, $y<br></span></center></th>";
                                                                    
                                                        // $ra7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' and status='1' and mtype='USER' order by username asc";
                                                        
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
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d11<br>$d111 $m1, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-3' style='margin-bottom:20px'>
                                                                        <div class='ibox '>
                                                                            <div class='card text-white bg-secondary'>
                                                                                <div class='card-header'>
                                                                                    <center><a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                                                    <hr><span style='font-size:12pt'><b>$d11</b><br>$d1 $m1, $y<br></span></center>
                                                                                </div><div class='card-body' style='padding:0px'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'>";
                                                                                        $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d1' and months='$mm1' and years='$y' and status='1' order by id asc";
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
                                                                                            
                                                                                            if($r5c["accepted"]==1) $astat="success";
                                                                                            else $astat="info";
                                                                                            if($r5c["request2"]==0) echo"<a href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">";
                                                                                            else echo"<a href='#'>";
                                                                                                echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                                                                                                    <div class='btn btn-$astat' style='width:100%;text-align:left;border-radius:5px'>
                                                                                                        <span style='font-size:10pt'><i data-acorn-icon='clock'></i> $stimeA1 - $etimeA1</span><br><span style='font-size:8pt'>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br><span style='font-size:8pt'>".$r5c["address"]."</span>
                                                                                                    </div>
                                                                                                </div>";
                                                                                            echo"</a>";
                                                                                                
                                                                                            if($r5c["accepted"]==0){
                                                                                                if($r5c["request2"]==1){
                                                                                                    $stimeX=substr($r5c['stime2'],11,5);
                                                                                                    $etimeX=substr($r5c['etime2'],11,5);
                                                                                                    $stimeX1=""; $stimeX2=""; $sstatX="";
                                                                                                    $etimeX1=""; $etimeX2=""; $estatX="";
                                                                                                    $stimeX1=substr($r5c['stime2'],11,2);
                                                                                                    $stimeX2=substr($r5c['stime2'],14,2);
                                                                                                    if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                                                                    if($stimeX1>=13){
                                                                                                        $stimeX1=($stimeX1-12);
                                                                                                        if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                                                                        $sstatX="PM";
                                                                                                    }else{
                                                                                                        $sstatX="AM";
                                                                                                    }
                                                                                                    $etimeX1=substr($r5c['etime2'],11,2);
                                                                                                    $etimeX2=substr($r5c['etime2'],14,2);
                                                                                                    if($etimeX1>=13){
                                                                                                        $etimeX1=($etimeX1-12);
                                                                                                        if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                                                                        $estatX="PM";
                                                                                                    }else{
                                                                                                        $estatX="AM";
                                                                                                    }
                                                                                                    echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                                                                                                }
                                                                                            }
                                                                                        } }
                                                                                    echo"</div>"; ?>
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
                                                                                echo"</div><br>
                                                                            </div>
                                                                        </div><br><br>
                                                                    </div>";
                                                                }
                                                            }
                                                            
                                                            if($d2<=$lastdate){
                                                                $empid=$rab7["id"];
                                                                $empuid=$rab7["unbox"];
                                                                $datatarget="$empid$y-$mm2-$d222";
                                                                $datatarget22="$empuid$d222$y";
                                                                if($day=="$d222" AND $month=="$mm2" AND $y=="$y") $bgcolor="$sidebar_color";
                                                                else $bgcolor="";
                                                                            
                                                                $lts=0;
                                                                $lt1 = "select * from leave_asign where cid='".$_COOKIE["userid"]."' and day='$d222' and month='$mm2' and year='$y' and status='1' order by id asc limit 1";
                                                                $lt2 = $conn->query($lt1);
                                                                if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                                if($lts==1){
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='card text-white bg-warning'>
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d22<br>$d222 $m2, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='ibox '>
                                                                            <div class='card text-white bg-secondary'>
                                                                                <div class='card-header'>
                                                                                    <center><a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                                                    <hr><span style='font-size:12pt'><b>$d22</b><br>$d222 $m2, $y<br></span></center>
                                                                                </div><div class='card-body' style='padding:0px'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'>";
                                                                                            $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d222' and months='$mm2' and years='$y' and status='1' order by id asc";
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
                                                                                                
                                                                                                
                                                                                                if($r5c["accepted"]==1) $astat="success";
                                                                                                else $astat="info";
                                                                                                if($r5c["request2"]==0) echo"<a href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">";
                                                                                                else echo"<a href='#'>";
                                                                                                    echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                                                                                                        <div class='btn btn-$astat' style='width:100%;text-align:left;border-radius:5px'>
                                                                                                            <span style='font-size:10pt'><i data-acorn-icon='clock'></i> $stimeA1 - $etimeA1</span><br><span style='font-size:8pt'>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br><span style='font-size:8pt'>".$r5c["address"]."</span>
                                                                                                        </div>
                                                                                                    </div>";
                                                                                                echo"</a>";
                                                                                                
                                                                                                if($r5c["accepted"]==0){
                                                                                                    if($r5c["request2"]==1){
                                                                                                        $stimeX=substr($r5c['stime2'],11,5);
                                                                                                        $etimeX=substr($r5c['etime2'],11,5);
                                                                                                        $stimeX1=""; $stimeX2=""; $sstatX="";
                                                                                                        $etimeX1=""; $etimeX2=""; $estatX="";
                                                                                                        $stimeX1=substr($r5c['stime2'],11,2);
                                                                                                        $stimeX2=substr($r5c['stime2'],14,2);
                                                                                                        if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                                                                        if($stimeX1>=13){
                                                                                                            $stimeX1=($stimeX1-12);
                                                                                                            if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                                                                            $sstatX="PM";
                                                                                                        }else{
                                                                                                            $sstatX="AM";
                                                                                                        }
                                                                                                        $etimeX1=substr($r5c['etime2'],11,2);
                                                                                                        $etimeX2=substr($r5c['etime2'],14,2);
                                                                                                        if($etimeX1>=13){
                                                                                                            $etimeX1=($etimeX1-12);
                                                                                                            if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                                                                            $estatX="PM";
                                                                                                        }else{
                                                                                                            $estatX="AM";
                                                                                                        }
                                                                                                        echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                                                                                                    }
                                                                                                }
                                                                                            } }
                                                                                        echo"</div>"; ?>
                                                                                        <script type="text/javascript">
                                                                                            function  <?php echo"$getData"; ?>(employeeid2,<?php echo"$datatarget22"; ?>){
                                                                                                $.ajax({
                                                                                                    url: 'schedule-track2.php?<?php echo"days=$d222&months=$mm2&years=$y&" ?>empid='+employeeid2, 
                                                                                                    success: function(html) {
                                                                                                        var ajaxDisplay = document.getElementById(<?php echo"$datatarget22"; ?>);
                                                                                                        ajaxDisplay.innerHTML = html;
                                                                                                    }
                                                                                                });
                                                                                            }
                                                                                        </script> <?php
                                                                                echo"</div><br>
                                                                            </div>
                                                                        </div><br><br>
                                                                    </div>";
                                                                }
                                                            }
                                                                                                        
                                                            if($d3<=$lastdate){
                                                                $empid=$rab7["id"];
                                                                $empuid=$rab7["unbox"];
                                                                $datatarget="$empid$y-$mm3-$d333";
                                                                $datatarget33="$empuid$d333$y";
                                                                if($day=="$d333" AND $month=="$mm3" AND $y=="$y") $bgcolor="$sidebar_color";
                                                                else $bgcolor="";
                                                                    
                                                                $lts=0;
                                                                $lt1 = "select * from leave_asign where cid='".$_COOKIE["userid"]."' and day='$d333' and month='$mm3' and year='$y' and status='1' order by id asc limit 1";
                                                                $lt2 = $conn->query($lt1);
                                                                if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                                if($lts==1){
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='card text-white bg-warning'>
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d33<br>$d333 $m3, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='ibox '>
                                                                            <div class='card text-white bg-secondary'><div class='card-header'>
                                                                                <center><a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                                                <hr><span style='font-size:12pt'><b>$d33</b><br>$d333 $m3, $y<br></span></center>
                                                                                </div><div class='card-body' style='padding:0px'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'>";
                                                                                            $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d333' and months='$mm3' and years='$y' and status='1' order by id asc";
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
                                                                                                
                                                                                                
                                                                                                if($r5c["accepted"]==1) $astat="success";
                                                                                                else $astat="info";
                                                                                                if($r5c["request2"]==0) echo"<a href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">";
                                                                                                else echo"<a href='#'>";
                                                                                                    echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                                                                                                        <div class='btn btn-$astat' style='width:100%;text-align:left;border-radius:5px'>
                                                                                                            <span style='font-size:10pt'><i data-acorn-icon='clock'></i> $stimeA1 - $etimeA1</span><br><span style='font-size:8pt'>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br><span style='font-size:8pt'>".$r5c["address"]."</span>
                                                                                                        </div>
                                                                                                    </div>";
                                                                                                echo"</a>";
                                                                                                
                                                                                                if($r5c["accepted"]==0){
                                                                                                    if($r5c["request2"]==1){
                                                                                                        $stimeX=substr($r5c['stime2'],11,5);
                                                                                                        $etimeX=substr($r5c['etime2'],11,5);
                                                                                                        $stimeX1=""; $stimeX2=""; $sstatX="";
                                                                                                        $etimeX1=""; $etimeX2=""; $estatX="";
                                                                                                        $stimeX1=substr($r5c['stime2'],11,2);
                                                                                                        $stimeX2=substr($r5c['stime2'],14,2);
                                                                                                        if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                                                                        if($stimeX1>=13){
                                                                                                            $stimeX1=($stimeX1-12);
                                                                                                            if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                                                                            $sstatX="PM";
                                                                                                        }else{
                                                                                                            $sstatX="AM";
                                                                                                        }
                                                                                                        $etimeX1=substr($r5c['etime2'],11,2);
                                                                                                        $etimeX2=substr($r5c['etime2'],14,2);
                                                                                                        if($etimeX1>=13){
                                                                                                            $etimeX1=($etimeX1-12);
                                                                                                            if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                                                                            $estatX="PM";
                                                                                                        }else{
                                                                                                            $estatX="AM";
                                                                                                        }
                                                                                                        echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                                                                                                    }
                                                                                                }
                                                                                            } }
                                                                                        echo"</div>"; ?>
                                                                                        <script type="text/javascript">
                                                                                            function  <?php echo"$getData"; ?>(employeeid3,<?php echo"$datatarget33"; ?>){
                                                                                                $.ajax({
                                                                                                    url: 'schedule-track2.php?<?php echo"days=$d333&months=$mm3&years=$y&" ?>empid='+employeeid3, 
                                                                                                    success: function(html) {
                                                                                                        var ajaxDisplay = document.getElementById(<?php echo"$datatarget333"; ?>);
                                                                                                        ajaxDisplay.innerHTML = html;
                                                                                                    }
                                                                                                });
                                                                                            }
                                                                                        </script> <?php
                                                                                echo"</div><br>
                                                                            </div>
                                                                        </div><br><br>
                                                                    </div>";
                                                                }
                                                            }
                                                                                                        
                                                            if($d4<=$lastdate){
                                                                $empid=$rab7["id"];
                                                                $empuid=$rab7["unbox"];
                                                                $datatarget="$empid$y-$mm4-$d444";
                                                                $datatarget44="$empuid$d444$y";
                                                                if($day=="$d444" AND $month=="$mm4" AND $y=="$y") $bgcolor="$sidebar_color";
                                                                else $bgcolor="";
                                                                            
                                                                $lts=0;
                                                                $lt1 = "select * from leave_asign where cid='".$_COOKIE["userid"]."' and day='$d444' and month='$mm4' and year='$y' and status='1' order by id asc limit 1";
                                                                $lt2 = $conn->query($lt1);
                                                                if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                                if($lts==1){
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='card text-white bg-warning'>
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d44<br>$d444 $m4, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='ibox '>
                                                                            <div class='card text-white bg-secondary'><div class='card-header'>
                                                                                <center><a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                                                <hr><span style='font-size:12pt'><b>$d44</b><br>$d444 $m4, $y<br></span></center>
                                                                                </div><div class='card-body' style='padding:0px'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'>";
                                                                                            $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d444' and months='$mm4' and years='$y' and status='1' order by id asc";
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
                                                                                                
                                                                                                
                                                                                                if($r5c["accepted"]==1) $astat="success";
                                                                                                else $astat="info";
                                                                                                if($r5c["request2"]==0) echo"<a href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">";
                                                                                                else echo"<a href='#'>";
                                                                                                    echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                                                                                                        <div class='btn btn-$astat' style='width:100%;text-align:left;border-radius:5px'>
                                                                                                            <span style='font-size:10pt'><i data-acorn-icon='clock'></i> $stimeA1 - $etimeA1</span><br><span style='font-size:8pt'>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br><span style='font-size:8pt'>".$r5c["address"]."</span>
                                                                                                        </div>
                                                                                                    </div>";
                                                                                                echo"</a>";
                                                                                                
                                                                                                if($r5c["request2"]==1){
                                                                                                    $stimeX=substr($r5c['stime2'],11,5);
                                                                                                    $etimeX=substr($r5c['etime2'],11,5);
                                                                                                    $stimeX1=""; $stimeX2=""; $sstatX="";
                                                                                                    $etimeX1=""; $etimeX2=""; $estatX="";
                                                                                                    $stimeX1=substr($r5c['stime2'],11,2);
                                                                                                    $stimeX2=substr($r5c['stime2'],14,2);
                                                                                                    if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                                                                    if($stimeX1>=13){
                                                                                                        $stimeX1=($stimeX1-12);
                                                                                                        if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                                                                        $sstatX="PM";
                                                                                                    }else{
                                                                                                        $sstatX="AM";
                                                                                                    }
                                                                                                    $etimeX1=substr($r5c['etime2'],11,2);
                                                                                                    $etimeX2=substr($r5c['etime2'],14,2);
                                                                                                    if($etimeX1>=13){
                                                                                                        $etimeX1=($etimeX1-12);
                                                                                                        if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                                                                        $estatX="PM";
                                                                                                    }else{
                                                                                                        $estatX="AM";
                                                                                                    }
                                                                                                    echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                                                                                                }
                                                                                                
                                                                                            } }
                                                                                        echo"</div>"; ?>
                                                                                        <script type="text/javascript">
                                                                                            function  <?php echo"$getData"; ?>(employeeid4,<?php echo"$datatarget44"; ?>){
                                                                                                $.ajax({
                                                                                                    url: 'schedule-track2.php?<?php echo"days=$d444&months=$mm4&years=$y&" ?>empid='+employeeid4, 
                                                                                                    success: function(html) {
                                                                                                        var ajaxDisplay = document.getElementById(<?php echo"$datatarget44"; ?>);
                                                                                                        ajaxDisplay.innerHTML = html;
                                                                                                    }
                                                                                                });
                                                                                            }
                                                                                        </script> <?php
                                                                                echo"</div><br>
                                                                            </div>
                                                                        </div><br><br>
                                                                    </div>";
                                                                }
                                                            }
                                                                                                        
                                                            if($d5<=$lastdate){
                                                                $empid=$rab7["id"];
                                                                $empuid=$rab7["unbox"];
                                                                $datatarget="$empid$y-$mm5-$d555";
                                                                $datatarget55="$empuid$d555$y";
                                                                if($day=="$d555" AND $month=="$mm5" AND $y=="$y") $bgcolor="$sidebar_color";
                                                                else $bgcolor="";
                                                                    
                                                                $lts=0;
                                                                $lt1 = "select * from leave_asign where cid='".$_COOKIE["userid"]."' and day='$d555' and month='$mm5' and year='$y' and status='1' order by id asc limit 1";
                                                                $lt2 = $conn->query($lt1);
                                                                if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                                if($lts==1){
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='card text-white bg-warning'>
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d55<br>$d555 $m5, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d555&mm=$mm5&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='ibox '>
                                                                            <div class='card text-white bg-secondary'><div class='card-header'>
                                                                                <center><a href='scheduling-set.php?dd=$d555&mm=$mm5&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                                                <hr><span style='font-size:12pt'><b>$d55</b><br>$d555 $m5, $y<br></span></center>
                                                                                </div><div class='card-body' style='padding:0px'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'>";
                                                                                            $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d555' and months='$mm5' and years='$y' and status='1' order by id asc";
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
                                                                                                
                                                                                                if($r5c["accepted"]==1) $astat="success";
                                                                                                else $astat="info";
                                                                                                if($r5c["request2"]==0) echo"<a href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">";
                                                                                                else echo"<a href='#'>";
                                                                                                    echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                                                                                                        <div class='btn btn-$astat' style='width:100%;text-align:left;border-radius:5px'>
                                                                                                            <span style='font-size:10pt'><i data-acorn-icon='clock'></i> $stimeA1 - $etimeA1</span><br><span style='font-size:8pt'>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br><span style='font-size:8pt'>".$r5c["address"]."</span>
                                                                                                        </div>
                                                                                                    </div>";
                                                                                                echo"</a>";
                                                                                                
                                                                                                if($r5c["request2"]==1){
                                                                                                    $stimeX=substr($r5c['stime2'],11,5);
                                                                                                    $etimeX=substr($r5c['etime2'],11,5);
                                                                                                    $stimeX1=""; $stimeX2=""; $sstatX="";
                                                                                                    $etimeX1=""; $etimeX2=""; $estatX="";
                                                                                                    $stimeX1=substr($r5c['stime2'],11,2);
                                                                                                    $stimeX2=substr($r5c['stime2'],14,2);
                                                                                                    if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                                                                    if($stimeX1>=13){
                                                                                                        $stimeX1=($stimeX1-12);
                                                                                                        if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                                                                        $sstatX="PM";
                                                                                                    }else{
                                                                                                        $sstatX="AM";
                                                                                                    }
                                                                                                    $etimeX1=substr($r5c['etime2'],11,2);
                                                                                                    $etimeX2=substr($r5c['etime2'],14,2);
                                                                                                    if($etimeX1>=13){
                                                                                                        $etimeX1=($etimeX1-12);
                                                                                                        if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                                                                        $estatX="PM";
                                                                                                    }else{
                                                                                                        $estatX="AM";
                                                                                                    }
                                                                                                    echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                                                                                                }
                                                                                                
                                                                                            } }
                                                                                        echo"</div>"; ?>
                                                                                        <script type="text/javascript">
                                                                                            function  <?php echo"$getData"; ?>(employeeid5,<?php echo"$datatarget55"; ?>){
                                                                                                $.ajax({
                                                                                                    url: 'schedule-track2.php?<?php echo"days=$d555&months=$mm5&years=$y&" ?>empid='+employeeid5, 
                                                                                                    success: function(html) {
                                                                                                        var ajaxDisplay = document.getElementById(<?php echo"$datatarget55"; ?>);
                                                                                                        ajaxDisplay.innerHTML = html;
                                                                                                    }
                                                                                                });
                                                                                            }
                                                                                        </script> <?php
                                                                                echo"</div><br>
                                                                            </div>
                                                                        </div><br><br>
                                                                    </div>";
                                                                }
                                                            }
                                                                                                        
                                                            if($d6<=$lastdate){
                                                                $empid=$rab7["id"];
                                                                $empuid=$rab7["unbox"];
                                                                $datatarget="$empid$y-$mm6-$d666";
                                                                $datatarget66="$empuid$d666$y";
                                                                if($day=="$d666" AND $month=="$mm6" AND $y=="$y") $bgcolor="$sidebar_color";
                                                                else $bgcolor="";
                                                                
                                                                $lts=0;
                                                                $lt1 = "select * from leave_asign where cid='".$_COOKIE["userid"]."' and day='$d666' and month='$mm6' and year='$y' and status='1' order by id asc limit 1";
                                                                $lt2 = $conn->query($lt1);
                                                                if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                                if($lts==1){
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='card text-white bg-warning'>
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d66<br>$d666 $m6, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d666&mm=$mm6&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='ibox '>
                                                                            <div class='card text-white bg-secondary'><div class='card-header'>
                                                                                <center><a href='scheduling-set.php?dd=$d666&mm=$mm6&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                                                <hr><span style='font-size:12pt'><b>$d66</b><br>$d666 $m6, $y<br></span></center>
                                                                                </div><div class='card-body' style='padding:0px'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'>";
                                                                                            $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d666' and months='$mm6' and years='$y' and status='1' order by id asc";
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
                                                                                                
                                                                                                $stimeA=strtotime($r5c["stime"]);
                                                                                                $etimeA=strtotime($r5c["etime"]);
                                                                                                $stimeA1=date("h:i A", $stimeA);
                                                                                                $etimeA1=date("h:i A", $etimeA);
                                                                                                
                                                                                                if($r5c["accepted"]==1) $astat="success";
                                                                                                else $astat="info";
                                                                                                if($r5c["request2"]==0) echo"<a href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">";
                                                                                                else echo"<a href='#'>";
                                                                                                    echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                                                                                                        <div class='btn btn-$astat' style='width:100%;text-align:left;border-radius:5px'>
                                                                                                            <span style='font-size:10pt'><i data-acorn-icon='clock'></i>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt'>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br><span style='font-size:8pt'>".$r5c["address"]."</span>
                                                                                                        </div>
                                                                                                    </div>";
                                                                                                echo"</a>";
                                                                                                
                                                                                                if($r5c["request2"]==1){
                                                                                                    $stimeX=substr($r5c['stime2'],11,5);
                                                                                                    $etimeX=substr($r5c['etime2'],11,5);
                                                                                                    $stimeX1=""; $stimeX2=""; $sstatX="";
                                                                                                    $etimeX1=""; $etimeX2=""; $estatX="";
                                                                                                    $stimeX1=substr($r5c['stime2'],11,2);
                                                                                                    $stimeX2=substr($r5c['stime2'],14,2);
                                                                                                    if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                                                                    if($stimeX1>=13){
                                                                                                        $stimeX1=($stimeX1-12);
                                                                                                        if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                                                                        $sstatX="PM";
                                                                                                    }else{
                                                                                                        $sstatX="AM";
                                                                                                    }
                                                                                                    $etimeX1=substr($r5c['etime2'],11,2);
                                                                                                    $etimeX2=substr($r5c['etime2'],14,2);
                                                                                                    if($etimeX1>=13){
                                                                                                        $etimeX1=($etimeX1-12);
                                                                                                        if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                                                                        $estatX="PM";
                                                                                                    }else{
                                                                                                        $estatX="AM";
                                                                                                    }
                                                                                                    echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                                                                                                }
                                                                                                
                                                                                            } }
                                                                                        echo"</div>"; ?>
                                                                                        <script type="text/javascript">
                                                                                            function  <?php echo"$getData"; ?>(employeeid6,<?php echo"$datatarget66"; ?>){
                                                                                                $.ajax({
                                                                                                    url: 'schedule-track2.php?<?php echo"days=$d666&months=$mm6&years=$y&" ?>empid='+employeeid6, 
                                                                                                    success: function(html) {
                                                                                                        var ajaxDisplay = document.getElementById(<?php echo"$datatarget66"; ?>);
                                                                                                        ajaxDisplay.innerHTML = html;
                                                                                                    }
                                                                                                });
                                                                                            }
                                                                                        </script> <?php
                                                                                echo"</div><br>
                                                                            </div>
                                                                        </div><br><br>
                                                                    </div>";
                                                                }
                                                            }
                                                                                                        
                                                            if($d7<=$lastdate){
                                                                $empid=$rab7["id"];
                                                                $empuid=$rab7["unbox"];
                                                                $datatarget="$empid$y-$mm7-$d777";
                                                                $datatarget77="$empuid$d777$y";
                                                                if($day=="$d777" AND $month=="$mm7" AND $y=="$y") $bgcolor="$sidebar_color";
                                                                else $bgcolor="";
                                                            
                                                                $lts=0;
                                                                $lt1 = "select * from leave_asign where cid='".$_COOKIE["userid"]."' and day='$d777' and month='$mm7' and year='$y' and status='1' order by id asc limit 1";
                                                                $lt2 = $conn->query($lt1);
                                                                if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                                if($lts==1){
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='card text-white bg-warning'>
                                                                            <div class='card-header'><center><a href='#' class='btn btn-warning'>NOT AVAILABLE</a></center><hr><span style='font-size:12pt'>$d77<br>$d777 $m7, $y<br></span></div>
                                                                            <div class='card-body'>
                                                                                <a href='scheduling-set.php?dd=$d777&mm=$mm7&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn btn-primary'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-3'>
                                                                        <div class='ibox'>
                                                                            <div class='card text-white bg-secondary'><div class='card-header'>
                                                                                <center><a href='scheduling-set.php?dd=$d777&mm=$mm7&yy=$y&empid=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                                                <hr><span style='font-size:12pt'><b>$d77</b><br>$d777 $m7, $y<br></span></center>
                                                                                </div><div class='card-body' style='padding:0px'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'>";
                                                                                            $r5a = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d777' and months='$mm7' and years='$y' and status='1' order by id asc";
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
                                                                                                
                                                                                                if($r5c["accepted"]==1) $astat="success";
                                                                                                else $astat="info";
                                                                                                if($r5c["request2"]==0) echo"<a href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('schedule-request.php?t=1&smid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&sheba=schedule_allocation&ctitle=Schedule Updater', 'offcanvasTop2')\">";
                                                                                                else echo"<a href='#'>";
                                                                                                    echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                                                                                                        <div class='btn btn-$astat' style='width:100%;text-align:left;border-radius:5px'>
                                                                                                            <span style='font-size:10pt'><i data-acorn-icon='clock'></i> $stimeA1 - $etimeA1</span><br><span style='font-size:8pt'>$clientname</span><br><span style='font-size:8pt'>$projectname</span><br><span style='font-size:8pt'>".$r5c["address"]."</span>
                                                                                                        </div>
                                                                                                    </div>";
                                                                                                echo"</a>";
                                                                                                
                                                                                                if($r5c["request2"]==1){
                                                                                                    $stimeX=substr($r5c['stime2'],11,5);
                                                                                                    $etimeX=substr($r5c['etime2'],11,5);
                                                                                                    $stimeX1=""; $stimeX2=""; $sstatX="";
                                                                                                    $etimeX1=""; $etimeX2=""; $estatX="";
                                                                                                    $stimeX1=substr($r5c['stime2'],11,2);
                                                                                                    $stimeX2=substr($r5c['stime2'],14,2);
                                                                                                    if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                                                                    if($stimeX1>=13){
                                                                                                        $stimeX1=($stimeX1-12);
                                                                                                        if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                                                                        $sstatX="PM";
                                                                                                    }else{
                                                                                                        $sstatX="AM";
                                                                                                    }
                                                                                                    $etimeX1=substr($r5c['etime2'],11,2);
                                                                                                    $etimeX2=substr($r5c['etime2'],14,2);
                                                                                                    if($etimeX1>=13){
                                                                                                        $etimeX1=($etimeX1-12);
                                                                                                        if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                                                                        $estatX="PM";
                                                                                                    }else{
                                                                                                        $estatX="AM";
                                                                                                    }
                                                                                                    echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                                                                                                }
                                                                                                
                                                                                            } }
                                                                                        echo"</div>"; ?>
                                                                                        <script type="text/javascript">
                                                                                            function  <?php echo"$getData"; ?>(employeeid7,<?php echo"$datatarget77"; ?>){
                                                                                                $.ajax({
                                                                                                    url: 'schedule-track2.php?<?php echo"days=$d777&months=$mm7&years=$y&" ?>empid='+employeeid7, 
                                                                                                    success: function(html) {
                                                                                                        var ajaxDisplay = document.getElementById(<?php echo"$datatarget11"; ?>);
                                                                                                        ajaxDisplay.innerHTML = html;
                                                                                                    }
                                                                                                });
                                                                                            }
                                                                                        </script> <?php
                                                                                echo"</div><br>
                                                                            </div>
                                                                        </div><br><br>
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