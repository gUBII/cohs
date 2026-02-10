<?php
        error_reporting(0);    
        if(!isset($_COOKIE["shiftingidtoday"])){        
            
            $sheba="shifting_allocation";
            $cid=10001;
            $title="Assign New Shift";
            $utype="ROSTERING";

            date_default_timezone_set("Australia/Sydney");
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
            ?><!-- <script language=JavaScript> document.shift_today.submit(); </script> --><?php

            $week_number = date("W", strtotime('now'));
            
            if(!isset($_POST["src_employeeid"])) $src_employeeid="ALL";
            else $src_employeeid=$_POST["src_employeeid"];
            
            echo"<div class='row'>
                <div class='col-12 col-md-5' style='padding-bottom:10px'>
                    
                    <h1 class='mb-0 pb-0 display-4' id='title'>New Shift Request</h1>
                
                    <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                        <ul class='breadcrumb pt-0'>
                            <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                            if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Scheduling</a></li>";
                            if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                        echo"</ul>
                    </nav>
                </div>
                <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
                    
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttonemail' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Email Notification' ><i data-acorn-icon='email'></i></span>
                    </button>

                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttonrequest' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Re-Schedule Requests' ><i data-acorn-icon='cursor-pointer'></i></span>
                    </button>

                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttontemplates' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Shift Templates' ><i data-acorn-icon='clock'></i></span>
                    </button>
                    
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('invoice_manager.php?cid=$cid&sheba=$sheba&ctitle=$title&utype=$utype', 'offcanvasRight')\" style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Asign New Shift' ><i data-acorn-icon='plus'></i></span>
                    </button>

                    <a href='index.php?url=time_sheet.php&id=5162' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Time Sheet' ><i data-acorn-icon='clock'></i><i data-acorn-icon='file-text'></i></span>
                    </a>

                    <div class='btn-group ms-1 check-all-container'>
                        <div class='d-inline-block'>
                            
                            <table><tr><td nowrap>
                                <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ChartModeForm'>
                                    <input type='hidden' name='chartmode' value='1'>
                                    <a onmouseover=\"document.ChartModeForm.submit()\" onmouseup=\"shiftdataV2('chart_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='chart-4'></i></a>
                                </form>
                            </td><td nowrap>
                                <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ViewModeForm'>
                                    <input type='hidden' name='viewmode' value='LIST'>
                                    <a onmouseover=\"document.ViewModeForm.viewmode.value='LIST'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='list'></i></a>
                                    <a onmouseover=\"document.ViewModeForm.viewmode.value='CARD'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='calendar'></i></a>                        
                                    <a href='print_data.php?pointer=PRINT&printid=$sheba' target='dataprocessor' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='print'></i></a>
                                </form>
                            </td><td nowrap>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe' style='margin-top:-15px;margin-left:4px'>
                                    <button class='btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                                        <i data-acorn-icon='download'></i>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                        <form method='get' action='print_data.php' target='dataprocessor' enctype='multipart/form-data' name='PrintForm'>
                                            <input type='hidden' name='pointer' value='PDF'><input type='hidden' name='printid' value='$sheba'>
                                            <a class='dropdown-item' href='#' onmouseover=\"document.PrintForm.pointer.value='PDF'\" onclick=\"document.PrintForm.submit()\">Pdf</a>                                
                                        </form>
                                        <a id='notifyButtonBottomLeft' href='#' onclick=\"CopyToClipboard('sample');return false;\">Copy</a>
                                        <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='ExcelForm'>
                                            <input type='hidden' name='pointer' value='EXCEL'><input type='hidden' name='printid' value='$sheba'>
                                            <a class='dropdown-item' href='#' onmouseover=\"document.ExcelForm.pointer.value='EXCEL'\" onclick=\"document.ExcelForm.submit()\">Excel</a>
                                        </form>
                                        <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='CsvForm'>
                                            <input type='hidden' name='pointer' value='CSV'><input type='hidden' name='printid' value='$sheba'>
                                            <a class='dropdown-item' href='#' onmouseover=\"document.CsvForm.pointer.value='CSV'\" onclick=\"document.CsvForm.submit()\">Csv</a>
                                        </form>
                                        
                                    </div>
                                </div>
                            </td></tr></table>
                        </div>
                    </div>
                </div>                  
            </div>
            <div class='data-table-rows slim' id='sample'>
                <div class='data-table-responsive-wrapper'>";
    
                    if(isset($_COOKIE["timeclockstat"])){
                        // First name   Job     Clock in    Clock out   Total hours     Regular hours   Overtime    Paid time off 
                        echo"<div class='wrapper wrapper-content animated fadeIn'>
                            <div class='row'>
                                <div class='col-lg-4'>
                                    <div class='ibox'>
                                        <div class='ibox-title'><h5>Clock-in & Clock-Out</h5></div>
                                        <div class='ibox-content' style='height:330px'>
                                            <div id='clockinout' style='width:100%'></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-lg-4'>
                                    <div class='ibox '>
                                        <div class='ibox-title'><h5>My Day Log</h5></div>
                                        <div class='ibox-content' style='min-height:330px;padding-left:5px;padding-right:5px'>
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
                                                <input type=submit class='btn-active btn' style='width:80%;height:30px;border-radius:20;background-color:$topbar_color;color:$tbtc' value='Update'></center>
                                            </form><hr>
                                            <center><a href='scheduling-unset.php?unset=timeclock' class='btn-active btn' style='width:80%;height:30px;border-radius:20;background-color:#77DE78'>Back to Schedule</a></center><br>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='col-lg-4'>
                                    <div class='ibox '>
                                        <div class='ibox-title'><h5>Client Location</h5></div>
                                        <div class='ibox-content' style='min-height:330px;padding-left:10px;padding-right:10px'>
                                            <span style='font-size:12pt'><b>$clientlocation</b></span><Br>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='ibox '>
                                    <div class='ibox-title'>
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
                                                <td><input type='date' id='datepicker' name='shiftingiduser' class='form-control' style='font-size:8pt;border-radius:20px;width:130px;' value='".$_COOKIE["shiftingid"]."'></td>
                                                <td><input type=submit  style='background-color:$topbar_color;color:$tbtc' value='Go'></td>
                                            </tr></table>
                                        </form>
                                        */
                                        echo"</td></tr></table>
                                    </div>
                                    <div class='ibox-content text-center'>
                                        <div class='table-responsive'>
                                            <table class='table table-striped table-bordered table-hover dataTables-example' >
                                                <thead><tr>
                                                    <th>Date</th><th>Status</th><th>Start</th><th>End</th><th>Total hours</th><th>Shift Hours</th><th>Overtime</th><th>Log</th>
                                                </tr></thead>
                                                <tbody><div id='$datatarget' style='padding:0px'>";
                                                    // $todayx=strtotime($_COOKIE["shiftingid"]);
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
                                                        echo"<tr class='gradeX'><td>$sdate</td><td align=left>$clientname @ $projectname<br>$stime-$etime</td>
                                                        <td>$clockin</td><td>$clockout</td><td>$total_hour_worked H</td>
                                                        <td>$shift_total H</td><td>$total_overtime H</td>
                                                        <td><a href='#' class='dropdown-item' data-toggle='modal' data-target='#activitylog$t')\">View</a>
                                                            <div class='modal inmodal' id='activitylog$t' tabindex='-1' role='dialog' aria-hidden='true'>
                                                                <div class='modal-dialog'>
                                                                    <div class='modal-content animated bounceInUp'>
                                                                        <div class='modal-header'>
                                                                            <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                                                                            <h4 class='modal-title'>Day Activity Log</h4>
                                                                        </div>
                                                                        <div class='modal-body'>".$r5c["activity_log"]."</div>
                                                                    
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

                        echo"<div class='tabs-container'>
                                <div class='row animated fadeInDown'>
                                    <div class='col-lg-12' style='text-align:center'>
                                        <div class='ibox'>
                                            <div class='ibox-title' style='padding-right:5px'padding-left:5px'>
                                                <table width=100%><tr>
                                                    <td align=left width='50'>"; ?>
                                                        <script type="text/javascript">
                                                            $( function() {
                                                                $('#datepicker').change(function(){
                                                                    $('#shift_date').submit();
                                                                });
                                                            });
                                                        </script> <?php
                                                        
                                                        $weekvar=strtotime($_COOKIE["shiftingidx"]);
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
                                                        $shift_today=$_COOKIE["shiftingid"];
                                                        echo"<table width=100%><tr>
                                                            
                                                            <td align=left width='50'>";
                                                                $shift_today=time();
                                                                $shift_today=date("Y-m-d", $shift_today);
                                                                echo"<form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                                                    <input type='hidden' name='shiftingidtoday' value='$shift_today'><input type='hidden' name='smsbd' value='schedule-board'>
                                                                    <input type=submit class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' value=\"Day View\" style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Day View'>
                                                                </form>
                                                            </td>
                                                            <td align=left width='50'>
                                                                <form method='get' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                                                    <input type='hidden' name='projectid' value='0'><input type='hidden' name='smsbd' value='schedule-board'>
                                                                    <input type=submit class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' value=\"Week View\" style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Week View'>
                                                                </form>
                                                            </td>
                                                            <td align=left width='50' nowrap>";
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
                                                                
                                                                $weekvar=strtotime($_COOKIE["shiftingid"]);
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
                                                                                
                                                                if(isset($_POST["src_employeeid"])){
                                                                    $src_employeeid=$_POST["src_employeeid"];
                                                                }else{
                                                                    $src_employeeid="";
                                                                }
                                                                echo"<table><tr>
                                                                    <td style='align:right;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                                                        <input type='hidden' name='shiftingidtoday11' value='$prevweek'><input type='hidden' name='shiftingiduserx' value='$shift_today'>                                                                        
                                                                        <button type='submit' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-left'></i></button>
                                                                    </form></td>
                                                                    <td><form method='post' name='shift_date' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                                                        <input type='hidden' name='shiftingiduserx' value='$shift_today'><input type='hidden' name='src_employeeid' value='$src_employeeid'>
                                                                        <input type='week' id='datepicker' name='shiftingid22' class='form-control form-control-sm' value='$weekvar' onchange='this.form.submit()'>
                                                                    </form></td>
                                                                    <td style='align:left;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                                                        <input type='hidden' name='shiftingidtoday11' value='$weekcopy'><input type='hidden' name='shiftingiduserx' value='$shift_today'>
                                                                        <button type='submit' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-right'></i></button>
                                                                    </form></td>
                                                                    <td align=left width=50 nowrap style='padding-right:10px'>
                                                                        <a href='index.php?url=time_sheet.php' target='_self' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-top:-15px;margin-right:5px'>
                                                                            <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Print As PDF'>View Time Sheet</span>
                                                                        </a>
                                                                    </td>                                                                    
                                                                </tr></table>
                                                            </td>
                                                        </tr></table>
                                                    </td><td align=right>
                                                        <table ><tr>
                                                            <td align=left width=50 nowrap style='padding-right:10px'>";
                                                                
                                                                
                                                            /*
                                                                <div class='dropdown'>
                                                                    <a data-toggle='dropdown' class='form-control' href='#' style='border-radius:20px'><span class='text-muted text-xs block'>Action <b class='caret'></b></span></a>
                                                                    <ul class='dropdown-menu animated fadeInDown m-t-xs'>
                                                                        <li><a href='#' class='dropdown-item' data-toggle='modal' data-target='#addunavailability' onclick=\"getDataMove1('".$r5c["id"]."', 'schedulemover2')\">Add unavailability</a></li>
                                                                    </ul>
                                                                </div>
                                                            */
                                                            echo"</td>
                                                        </tr></table>
                                                    </td>
                                                </tr></table>
                                            </div>
                                            
                                            <div class='panel-body' style='padding:0px'>
                                                <div class='ibox-content' style='padding-left:5px;padding-right:5px'><br>
                                                    
                                                    <center><h4 style='color:green'>Shift Allocation Request by Clients</h4></center><hr>";
                                                    
                                                    $todayx="".$_COOKIE["shiftingidx"]."";
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
                                                        
                                                        
                                                        // if($d1<=$lastdate) echo"<td nowrap style='background-color:$bgcolor1'><center><a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color1'>$d11<br>$d1 $m1, $y<br></span></center></th>";
                                                        // if($d2<=$lastdate) echo"<td nowrap style='background-color:$bgcolor2'><center><a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empid=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color2'>$d22<br>$d222 $m2, $y<br></span></center></th>";
                                                        // if($d3<=$lastdate) echo"<td nowrap style='background-color:$bgcolor3'><center><a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empid=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color3'>$d33<br>$d333 $m3, $y<br></span></center></th>";
                                                        // if($d4<=$lastdate) echo"<td nowrap style='background-color:$bgcolor4'><center><a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empid=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color4'>$d44<br>$d444 $m4, $y<br></span></center></th>";
                                                        
                                                        // if($d5<=$lastdate) echo"<td nowrap style='background-color:$bgcolor5'><center><a href='scheduling-set.php?dd=$d555&mm=$mm5&yy=$y&empid=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color5'>$d55<br>$d555 $m5, $y<br></span></center></th>";
                                                        // if($d6<=$lastdate) echo"<td nowrap style='background-color:$bgcolor6'><center><a href='scheduling-set.php?dd=$d666&mm=$mm6&yy=$y&empid=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color6'>$d66<br>$d666 $m6, $y<br></span></center></th>";
                                                        // if($d7<=$lastdate) echo"<td nowrap style='background-color:$bgcolor7'><center><a href='scheduling-set.php?dd=$d777&mm=$mm7&yy=$y&empid=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Unavailable</a><hr><span style='font-size:8pt;color:$color7'>$d77<br>$d777 $m7, $y<br></span></center></th>";
                                                                    
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
                                                                        <div class='ibox' style='padding:5px;background-color:#F7C6C5;font-size:10pt'>
                                                                            <div class='ibox-title' style='padding:5px;background-color:#F7C6C5;'><center>NOT AVAILABLE</center><hr><span style='font-size:8pt;color:$color4'>$d11 $d111 $m1, $y<br></span></div>
                                                                            <div class='ibox-content text-center'>
                                                                                <a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-4' style='margin-bottom:20px'>
                                                                        <div class='card mb-5'><div class='card-body'>
                                                                            <div class='ibox-title' style='text-align:center;padding:5px;border-radius:20px'>
                                                                                <span style='font-size:12pt'>Client Name: Christopher<hr><b>$d11</b> $d1 $m1, $y<br>Requested Time:<br><b>09:30am ~ 03:00pm</b><br></span></center>
                                                                                <div class='text-center'style='background-color:$sidebar_color;color:$sbtc;padding:5px;text-align:center'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'><hr>
                                                                                        <a href='#' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto'>Accept</a>
                                                                                        <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-end w-100 w-sm-auto'>Not Available</a>
                                                                                    </div>
                                                                                </div><br>
                                                                            </div>
                                                                        </div></div>
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
                                                                        <div class='ibox' style='padding:5px;background-color:#F7C6C5;font-size:10pt'>
                                                                            <div class='ibox-title' style='padding:5px;background-color:#F7C6C5;'><center>NOT AVAILABLE</center><hr><span style='font-size:8pt;color:$color4'>$d22 $d222 $m2, $y<br></span></div>
                                                                            <div class='ibox-content text-center'>
                                                                                <a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-4' style='margin-bottom:20px'>
                                                                        <div class='card mb-5'><div class='card-body'>
                                                                            <div class='ibox-title' style='text-align:center;padding:5px;border-radius:20px'>
                                                                                <span style='font-size:12pt'>Client Name: Hanna S<hr><b>$d22</b> $d2 $m2, $y<br>Requested Time:<br><b>03:30pm ~ 05:30pm</b><br></span></center>
                                                                                <div class='text-center'style='background-color:$sidebar_color;color:$sbtc;padding:5px;text-align:center'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'><hr>
                                                                                        <a href='#' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto'>Accept</a>
                                                                                        <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-end w-100 w-sm-auto'>Not Available</a>
                                                                                    </div>
                                                                                </div><br>
                                                                            </div>
                                                                        </div></div>
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
                                                                        <div class='ibox' style='padding:5px;background-color:#F7C6C5;font-size:10pt'>
                                                                            <div class='ibox-title' style='padding:5px;background-color:#F7C6C5;'><center>NOT AVAILABLE</center><hr><span style='font-size:8pt;color:$color4'>$d33 $d333 $m3, $y<br></span></div>
                                                                            <div class='ibox-content text-center'>
                                                                                <a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-4' style='margin-bottom:20px'>
                                                                        <div class='card mb-5'><div class='card-body'>
                                                                            <div class='ibox-title' style='text-align:center;padding:5px;border-radius:20px'>
                                                                                <span style='font-size:12pt'>Client Name: Roger H<hr><b>$d33</b> $d3 $m3, $y<br>Requested Time:<br><b>01:00pm ~ 05:00pm</b><br></span></center>
                                                                                <div class='text-center'style='background-color:$sidebar_color;color:$sbtc;padding:5px;text-align:center'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'><hr>
                                                                                        <a href='#' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto'>Accept</a>
                                                                                        <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-end w-100 w-sm-auto'>Not Available</a>
                                                                                    </div>
                                                                                </div><br>
                                                                            </div>
                                                                        </div></div>
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
                                                                        <div class='ibox' style='padding:5px;background-color:#F7C6C5;font-size:10pt;text-align:center'>
                                                                            <div class='ibox-title' style='padding:5px;background-color:#F7C6C5;'><center>NOT AVAILABLE</center><hr><span style='font-size:8pt;color:$color4'>$d44 $d444 $m4, $y<br></span></div>
                                                                            <div class='ibox-content text-center'>
                                                                                <a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empid4=".$_COOKIE["userid"]."' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Available</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    
                                                                    echo"<div class='col-lg-4' style='margin-bottom:20px'>
                                                                        <div class='card mb-5'><div class='card-body'>
                                                                            <div class='ibox-title' style='text-align:center;padding:5px;border-radius:20px'>
                                                                                <span style='font-size:12pt'>Client Name: Roger H<hr><b>$d44</b> $d4 $m4, $y<br>Requested Time:<br><b>01:00pm ~ 05:00pm</b><br></span></center>
                                                                                <div class='text-center'style='background-color:$sidebar_color;color:$sbtc;padding:5px;text-align:center'>
                                                                                    <div id='$datatarget' style='padding:0px;width:100%;text-align:center'><hr>
                                                                                        <a href='#' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto'>Accept</a>
                                                                                        <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-end w-100 w-sm-auto'>Not Available</a>
                                                                                    </div>
                                                                                </div><br>
                                                                            </div>
                                                                        </div></div>
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

        echo"<form method='post' name='main' action='scheduling-set.php' target='_top' enctype='multipart/form-data'>
            <input type='hidden' name='dailyclockinout' value='$shift_today'><input type='hidden' name='smsbd' value='schedule-board'>
            <input type=submit class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' value=\"Day View\" style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Day View'>
        </form>";    
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    // modal        
    echo"<div class='modal inmodal cardt' id='schedulemover1' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog'><div class='modal-content animated bounceInUp ' id='schedulemover2'></div></div>
    </div>"; ?>
    <script type="text/javascript">
        function getDataMove1(sm1,schedulemoverx){
            $.ajax({
                url: 'schedule-request.php?<?php echo"t=1&" ?>smid='+sm1, 
                success: function(html) {
                    var ajaxDisplay = document.getElementById(schedulemoverx);
                    ajaxDisplay.innerHTML = html;
                }
            });
        }
    </script>
    
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