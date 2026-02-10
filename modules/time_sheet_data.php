<?php
        
    error_reporting(0);
        
    date_default_timezone_set("Australia/Melbourne");
        
    echo"<div class='row'>
        <div class='col-5 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Time Sheet</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>Time Sheet</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-7 col-md-7 d-flex align-items-start justify-content-end'>";
            if($mtype=="ADMIN"){
                echo"<a href='index.php?url=schedule.php'>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                        <i data-acorn-icon='plus'></i>&nbsp;<span>Shift</span>
                    </button>
                </a>
                <a href='index.php?url=daily_schedules.php'>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                        <i data-acorn-icon='plus'></i>&nbsp;<span>Daily Shifts</span>
                    </button>
                </a>";
            }
        echo"</div>                  
    </div>
    
    <div class='data-table-rows slim' id='sample'>";
    
        $tt=0;
        $a111 = "select * from shifting_allocation where clockin<>'0' and clockout='0' order by id asc";
        $a11 = $conn->query($a111);
        if ($a11->num_rows > 0) { while($a1 = $a11 -> fetch_assoc()) {
            $endtime=strtotime($a1["etime"]);
            $clockedin=time();
            $calclo=($endtime-$clockedin);
            // echo"$endtime - $clockedin = $calclo<br>";
            if($calclo<=0){
                $tt=($tt+1);
                $sql="update shifting_allocation set clockout='$endtime' where id='".$a1["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
        } }
        
        echo"<table style='width:100%;'>
            <tr>
                <td>"; ?>
                    <script type="text/javascript">
                            $( function() {
                                $('#datepicker').change(function(){
                                    $('#shift_date').submit();
                                });
                            });
                    </script> <?php
                        
                        $todaydate=time();
                        $todaydate1=date("Y-m-d", $todaydate);
                        $todaydate2=date("Y-m-d", $todaydate);
                        if(isset($_COOKIE["shiftingid2"])) $todaydate1=$_COOKIE["shiftingid2"];
                        if(isset($_COOKIE["shiftingid3"])) $todaydate2=$_COOKIE["shiftingid3"];
                        
                        if(!isset($_GET["src_employeeid"])) $src_employee=$_COOKIE["userid"];
                        else $src_employee=$_GET["src_employeeid"];
                        
                        echo"<div class='hide-area'><form method='post' name='shift_date' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                            
                            <table><tr>
                                <td valign=top style='padding-right:25px'>&nbsp;&nbsp;&nbsp;&nbsp;Date From:<input type='date' id='datepicker' name='shiftingiduser2' class='form-control' style='width:120px' value='$todaydate1'></td>
                                <td valign=top style='padding-right:25px'>&nbsp;&nbsp;&nbsp;&nbsp;Date To:<input type='date' id='datepicker' name='shiftingiduser3' class='form-control' style='width:120px' value='$todaydate2'></td>
                                <td valign=top style='padding-right:25px'>&nbsp;&nbsp;&nbsp;&nbsp;A/c Name: <select class='form-control m-b' name='src_employeeid' required>";
                                    if($mtype=="ADMIN") $s7 = "select * from uerp_user where mtype='USER' and status='1' or mtype='EMPLOYEE' and status='1' or mtype='ADMIN' and status='1' order by username asc";
                                    else $s7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by username asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        if($_GET["src_employeeid"]==$rs7["id"]) echo"<option selected value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        else echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        
                                        // echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                    } }
                                echo"</select></td>
                                <td valign=top><input type=submit style='margin-top:25px' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' value='Search'></td>
                                <td style='' valign=top>";
                                
                                    // if($mtype=="ADMIN") echo"<a href='#' data-bs-toggle='modal' data-bs-target='#forcepayslip0' class='btn' style='margin-left:20px;padding-left:20px;padding-right:20px;border-radius:50px;background-color:red;color:$tbtc;margin-top:-3px'>Add</a>";
                                    
                                    if(isset($_GET["src_employeeid"])){
                                        echo"<input type=button value='Add Expense' data-bs-toggle='modal' data-bs-target='#myexperience' style='margin-top:25px;margin-left:20px' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm'>&nbsp;&nbsp;";
                                        echo"<input type=button value='View Expenses' data-bs-toggle='modal' data-bs-target='#approveexpense' style='margin-top:25px;margin-left:20px' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm'>";
                                    }
                                    
                                echo"</td>
                            </tr></table>
                        </form></div>
                        <div class='hide-area1'>
                            <form method='post' name='shift_date' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                <table width=100%><tr>
                                    <td valign=top width=25%>&nbsp; Date From:<input type='date' id='datepicker' name='shiftingiduser2' class='form-control' style='font-size:8pt;border-radius:5px;width:100px' value='$todaydate1'></td>
                                    <td valign=top width=25%>&nbsp; Date To:<input type='date' id='datepicker' name='shiftingiduser3' class='form-control' style='font-size:8pt;border-radius:5px;width:100px' value='$todaydate2'></td>
                                    <td valign=top width=35% >&nbsp; A/c Name: <select class='form-control m-b' name='src_employeeid' style='font-size:8pt;border-radius:5px;width:100%'>";
                                        if($mtype=="ADMIN") $s7 = "select * from uerp_user where mtype='USER' and status='1' or mtype='EMPLOYEE' and status='1' or mtype='ADMIN' and status='1' order by username asc";
                                        else $s7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by username asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            if($_GET["src_employeeid"]==$rs7["id"]) echo"<option selected value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            else echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            // echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                    echo"</select></td>
                                    <td valign=top width=5%>&nbsp;<br>
                                        <input type=submit style='padding:3px;border-radius:3px;margin-top:2px' value='&nbsp; Go &nbsp;'>&nbsp;";
                                        // if($mtype=="ADMIN") echo"<a href='#' data-bs-toggle='modal' data-bs-target='#forcepayslip0' class='btn' style='margin-left:20px;padding-left:20px;padding-right:20px;border-radius:50px;background-color:red;color:$tbtc;margin-top:-2px'>Add</a>";
                                    echo"</td>
                                </tr>
                                <tr>
                                    <td style='' colspan=10 valign=top>";
                                        // if($mtype=="ADMIN") echo"<a href='#' data-bs-toggle='modal' data-bs-target='#forcepayslip0' class='btn' style='margin-left:20px;padding-left:20px;padding-right:20px;border-radius:50px;background-color:red;color:$tbtc;margin-top:-3px'>Add</a>";
                                        if(isset($_GET["src_employeeid"])){
                                            echo"<input type=button value='Add Expense' data-bs-toggle='modal' data-bs-target='#myexperience' style='margin-top:25px;margin-left:20px' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm'>&nbsp;&nbsp;";
                                            echo"<input type=button value='View Expenses' data-bs-toggle='modal' data-bs-target='#approveexpense' style='margin-top:25px;margin-left:20px' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm'>";
                                        }
                                    echo"</td>
                                </td></table>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>";
            
            // force add palslip
            echo"<div class='modal inmodal cardt' id='forcepayslip0' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content animated bounceInUp '>
                        <form class='m-t' role='form' method='POST' name='forcepayslip' action='dataprocessor03.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                		    <input type='hidden' name='processor' value='forcedpayslip'>
                		    <div class='modal-body'>
                		        <h3>Add New Shift and Generate Pay Slip:</h3>
                		        <div class='row'>
                		            <div class='col-md-6'><div class='form-group'>
                		                <label>Client/Project Name *</label>
                		                <select class='form-control m-b ' name='projectid' required><option value=''>Select Client under Project</option>";
                                            $p1 = "select * from project where status='1' order by name asc";
                                            $pp1 = $conn->query($p1);
                                            if ($pp1->num_rows > 0) { while($ppp1 = $pp1->fetch_assoc()) {
                                                $ccc1 = "select * from uerp_user where id='".$ppp1["clientid"]."' order by username asc limit 1";
                                                $cc1 = $conn->query($ccc1);
                                                if ($cc1->num_rows > 0) { while($c1 = $cc1->fetch_assoc()) {
                                                    echo"<option value='".$ppp1["id"]."'>".$c1["username"]." ".$c1["username2"]." @ ".$ppp1["name"]."</option>";
                                                } }
                                            } }
                                        echo"</select>
                                    </div></div>
                		            <div class='col-md-6'><div class='form-group'>
                    			        <label>Employee/User Name *</label>
                    			        <select class='form-control m-b ' name='employeeid' required>
                                            <option value='ALL'>All Employee Data</option>";
                                            $s7 = "select * from uerp_user where mtype='USER' and status='1' or mtype='ADMIN' and status='1' or mtype='EMPLOYEE' and status='1' order by username asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        echo"</select>
                                    </div></div>
                                    <div class='col-md-6'><div class='form-group'>
                    			        <label>Shift Start Time *</label>
                    			        <input type='datetime-local' id='datepicker' name='sdate' required class='form-control' value='' onchange='document.forcepayslip.clockin.value=this.value'>
                                    </div></div>
                                    <div class='col-md-6'><div class='form-group'>
                    			        <label>Shift End Time *</label>
                    			        <input type='datetime-local' id='datepicker' name='edate' required class='form-control' value='' onchange='document.forcepayslip.clockout.value=this.value'>
                                    </div></div>
                                    <div class='col-md-6'><div class='form-group'>
                    			        <label>Clock IN *</label>
                    			        <input type='datetime-local' id='datepicker' name='clockin' required class='form-control' value=''>
                                    </div></div>
                                    <div class='col-md-6'><div class='form-group'>
                    			        <label>Clock Out *</label>
                    			        <input type='datetime-local' id='datepicker' name='clockout' required class='form-control' value=''>
                                    </div></div>
                                    <div class='col-md-6'><div class='form-group'>
                    			        <label>Total Overtime *</label>
                    			        <input name='total_overtime' type='text' value='0' class='form-control'>
                                    </div></div>
                                    
                                    <div class='col-md-6'><div class='form-group'>
                    			        <label>Overtime Amount *</label>
                    			        <input type='text' id='datepicker' name='overtime_amt' class='form-control' value='0'>
                                    </div></div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button>
                                <input type='submit' class='btn btn-primary' value='Add Payslip'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>";
            if(!isset($datatarget)) $datatarget="notfound";
            
            
            echo"<div class='data-table-responsive-wrapper'>
                <table class=' stripe hover' id='myTable' style='width:100%'>
                    <thead class='bg-info color-white' style='padding:10px;border-radius:10px'><tr>
                        <th style='height:40px;padding-left:20px'>Date</th><th style='text-align:left'>Status</th>
                        <th style='text-align:center'>Start</th><th style='text-align:center'>End</th>
                        <th style='text-align:right'>Worked Hours</th><th style='text-align:right'>Shift Hours</th>
                        <th style='text-align:right'>Overtime</th><th style='text-align:right'>Wage/h</th>
                        <th style='text-align:right'>OT/h</th><th style='text-align:right'>Payable</th>
                        <th style='text-align:right'>Travel</th>";
                        if($mtype=="ADMIN") echo"<th style='text-align:right'>Delete</th>";
                    echo"</tr></thead>
                    <tbody><div id='$datatarget' style='padding:0px'>";
                        
                        $todayx=strtotime($todaydate1);
                        $todayy=strtotime($todaydate2);
                                    
                        $d1= date("d", $todayx);
                        $m1= date("m", $todayx);
                        $y1= date("Y", $todayx);
                        $d2= date("d", $todayy);
                        $m2= date("m", $todayy);
                        $y2= date("Y", $todayy);
                        
                        $netpayablex=0;
                        $totalworked1=0;
                        $totalworked2=0;
                        $totalovertime1=0;
                        $totalovertime2=0;
                        $totalkmx=0;
                        
                        $todayzz=date("d-m-Y 23:50", $todayy);
                        $todayy2=strtotime($todayzz);
                        
                        // echo"$todayzz $todayyy, $todayy";
                        
                        $totaleods=0;
                        $ts=0;
                        if(isset($_GET["src_employeeid"])){
                            if($designationy==13) $eod1 = "select * from eod where employeeid='".$_GET["src_employeeid"]."' and eod_date>='$todayx' and eod_date<='$todayy2' and status='1' order by eod_date asc";
                            else $eod1 = "select * from eod where employeeid='".$_COOKIE["userid"]."' and eod_date>='$todayx' and eod_date<='$todayy2' and status='1' order by eod_date asc";
                            $eod2 = $conn->query($eod1);
                            $t=0;
                            if ($eod2->num_rows > 0) { while($eod3 = $eod2 -> fetch_assoc()) {
                                $totaleods=($totaleods+1);
                                /* if($_GET["tomtom"]==1){
                                    $t=($t+1);
                                    $eoddate=date("d-m-Y",$eod3["eod_date"]);
                                    echo"$t. ".$eod3["employeeid"]." - $eoddate - <br>";
                                } */
                            } }
                        
                            $ts=0;
                            
                            // if($mtype=="ADMIN") $shift1 = "select * from shifting_allocation where employeeid='".$_GET["src_employeeid"]."' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                            // else $shift1 = "select * from shifting_allocation where employeeid='".$_COOKIE["userid"]."' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                            
                            $shift1 = "select * from shifting_allocation where employeeid='$src_employee' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                            $shift2 = $conn->query($shift1);
                            if ($shift2->num_rows > 0) { while($shift3 = $shift2 -> fetch_assoc()) { $ts=($ts+1); } }
                        }    
                        echo"<hr><span style='font-size:9pt'>Showing report From $d1-$m1-$y1 to $d2-$m2-$y2,<br>Total Shift Allocated: $ts and EOD Submitted: $totaleods</span><br><br>";
                        
                        /*
                        if($_GET["src_employeeid"]=="ALL"){
                            if($mtype=="ADMIN") $r5a = "select * from shifting_allocation where days>='$d1' and days<='$d2' and months>='$m1' and months<='$m2' and years>='$y1' and years<='$y2' and status='1' order by days asc";
                            else $r5a = "select * from shifting_allocation where days>='$d1' and days<='$d2' and months>='$m1' and months<='$m2' and years>='$y1' and years<='$y2' and status='1' order by days asc";
                        }else{
                            if($mtype=="ADMIN") $r5a = "select * from shifting_allocation where employeeid='".$_GET["src_employeeid"]."' and days>='$d1' and days<='$d2' and months>='$m1' and months<='$m2' and years>='$y1' and years<='$y2' and status='1' order by days asc";
                            else $r5a = "select * from shifting_allocation where employeeid='".$_COOKIE["userid"]."' and days>='$d1' and days<='$d2' and months>='$m1' and months<='$m2' and years>='$y1' and years<='$y2' and status='1' order by days asc";
                        }
                        */

                        if(isset($_GET["src_employeeid"])) $src_employeeid=$_GET["src_employeeid"];
                        else $src_employeeid=$_COOKIE["userid"];

                        // echo"$src_employeeid, $todayx, $todayy2";
                        
                        $xpayable=0;
                        
                        if($designationy==13) $r5a = "select * from shifting_allocation where employeeid='$src_employeeid' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";                            
                        else if($designationy==17)  $r5a = "select * from shifting_allocation where clientid='".$_COOKIE["userid"]."' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";                            
                        else $r5a = "select * from shifting_allocation where employeeid='".$_COOKIE["userid"]."' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";                            
                        $r5b = $conn->query($r5a);
                        if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                            
                            $employeename="";
                            $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                            $r1y = $conn->query($r1x);
                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                $employeename1=$r1z["username"];
                                $employeename2=$r1z["username2"];
                                $employeename="$employeename1 $employeename2"; 
                                $employeeaddress="".$r1z["address"].", ".$r1z["city"].",<br>".$r1z["area"].", ".$r1z["zip"].", ".$r1z["country"]."";
                                $employeephone=$r1z["phone"];
                                $wageamt=$r1z["reg_amt"];
                                $employeeabn=$r1z["abn"];
                                $schads_status=$r1z["schads_status"];
                                $schads_level=$r1z["schads_level"];
                                $schads_paypoint=$r1z["schads_paypoint"];
                            } }
                            
                            $clientname="";
                            $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
                            $r1y = $conn->query($r1x);
                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname=$r1z["username"]; } }
                            
                            $projectname="";
                            $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
                            $r2y = $conn->query($r2x);
                            if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                            
                            if(strlen($r5c['stime'])>=5) $stimez=$r5c['stime'];
                            else $stimez=0;
                            
                            if(strlen($r5c['etime'])>=5) $etimez=$r5c['etime'];
                            else $etimez=0;
                            
                            $stimeX=substr($stimez,11,5);
                            $etimeX=substr($etimez,11,5);
                            $stimeX1=""; $stimeX2=""; $sstatX="";
                            $etimeX1=""; $etimeX2=""; $estatX="";
                            $stimeX1=substr($stimez,11,2);
                            $stimeX2=substr($stimez,14,2);
                            
                            // if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                            
                            if($stimeX1>=13){
                                $stimeX1=($stimeX1-12);
                                if($stimeX1<="9") $stimeX1="0$stimeX1";
                                $sstatX="PM";
                            }else{
                                $sstatX="AM";
                            }
                            
                            $etimeX1=substr($etimez,11,2);
                            $etimeX2=substr($etimez,14,2);
                            
                            if($etimeX1>=13){
                                $etimeX1=($etimeX1-12);
                                if($etimeX1<="9") $etimeX1="0$etimeX1";
                                $estatX="PM";
                            }else{
                                $estatX="AM";
                            }
                                    
                            $stime=strtotime($stimez);
                            $sday=date("l", $stime);
                            $sdate=date("d-m-Y", $stime);
                            $stime=date("h:i a", $stime);
                            
                            $etime=strtotime($etimez);
                            $etime=date("h:i a", $etime);
                            
                            if(strlen($r5c["clockin"])>=5) $clockin=date("h:i a", $r5c["clockin"]);
                            else $clockin="-"; 
                            
                            if(strlen($r5c["clockout"])>=5) $clockout=date("h:i a", $r5c["clockout"]);
                            else $clockout="-";
                            
                            $clockoutx=0; 
                            if(strlen($r5c["clockin"])>=5 AND strlen($r5c["clockout"])>=5){
                                
                                $enddate=0;
                                $cinout=0;
                                $cin1=date("H", $r5c["clockin"]);
                                $cout1=date("H", $r5c["clockout"]);
                                $cinout=($cin1-$cout1);
                                if($cinout>=1) $enddate=strtotime("24 hours", $r5c["clockout"]);
                                else $enddate=$r5c["clockout"];
                                
                                $clockin2=date("Y-m-d h:i:s a", $r5c["clockin"]);
                                $clockout2=date("Y-m-d h:i:s a", $enddate);
                                $date1=date_create("$clockout2");
                                $date2=date_create("$clockin2");
                                $diff1=date_diff($date1,$date2);
                                         
                                $total_hour_worked= $diff1->format("%H:%I");
                                if($total_hour_worked<=0) $total_hour_worked=00;
                                
                                $enddate2=0;
                                $cinout2=0;
                                $cin2=substr($stimez,11,2);
                                $cout2=substr($etimez,11,2);
                                $cinout2=($cin2-$cout2);
                                $etime2=strtotime($etimez);
                                
                                if($cinout2>=0){
                                    $enddate2=strtotime("24 hours", $etime2);
                                    $enddate2=date("Y-m-d H:i", $enddate2);
                                }else $enddate2=$etimez;
                                
                                // echo"$cin2-$cout2<br>";
                                
                                $date3=date_create($enddate2);
                                $date4=date_create($stimez);
                                $diff2=date_diff($date3,$date4);
                                $shift_total= $diff2->format("%H:%I");
                                // $total_overtime=($total_hour_worked-$shift_total);
                                $total_overtime=$r5c["total_overtime"];
                                
                                if($total_overtime<=0) $total_overtime=0;
                                
                                $totalkm=($totalkm+$r5c["milage"]);
                                
                            }else{
                                $total_hour_worked=0;
                                $shift_total=0;
                                $total_overtime=0;
                            }
                            
                            $t=($t+1);
                            if($r5c["payroll"]=="1") $bgcolor="bg-success";
                            else $bgcolor="bd-info";
                            
                            if($r5c["night"]=="1") $nightcolor="Night Shift";
                            else $nightcolor="";
                            if($r5c["clockout_request"]==0) echo"<tr class='$bgcolor' >";
                            else if($r5c["clockout_request"]>=2) echo"<tr class='bg-warning'>";
                            else echo"<tr class='$bgcolor' >";
                                
                            if($r5c["clockin"]!=0 and $r5c["clockout"]==0) echo"<tr style='background-color:yellow;color:black'>";
                            else echo"<tr class='$bgcolor'>";    
                            
                            
                            if(strlen($r5c["activity_log"])<=3) echo"<tr style='background-color:#333333;color:white'>";
                            else echo"<tr class='$bgcolor'>";
                            
                            if($r5c["milage"]<=0) echo"<tr style='background-color:#333333;color:white'>";
                            else echo"<tr class='$bgcolor'>";
                            
                            
                                echo"<td nowrap style='padding-left:20px;'>
                                    <b><a href='#".$r5c["id"]."' > $sday</a></b><br>$sdate<br>";
                                    // if($mtype=="ADMIN") {
                                       if($designationy==13) echo"<a data-bs-toggle='modal' data-bs-target='#editlog$t' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-bottom:5px'>Edit</a>";
                                       echo"<div class='modal fade modal-close-out' id='editlog$t' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Edit $employeename</h5>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body' id='PopupModalX'>
                                                        <form method='post' name='shiftediting' action='scheduling-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                            <input type='hidden' name='url' value='time_sheet.php'><input type='hidden' name='edit_shift' value='edit-shifting'>
                                                            <input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                                            <input name='idd' type='hidden' value='$userid'><input name='imageposition' type='hidden' value='2'>
                                                            <input type='hidden' name='id' value='5198'><input type='hidden' name='pointer' value='".$_GET["pointer"]."'>";
                                                            // $cdate=date("Y-m-d h:i", $r5c["clockin"]);
                                                            // $edate=date("Y-m-d h:i", $r5c["clockout"]);
                                                            if(strlen($r5c["clockin"])>=5) $cdate=date("H:i", $r5c["clockin"]);
                                                            else $cdate=substr($stimez,11,5);
                                                            if(strlen($r5c["clockout"])>=5) $edate=date("H:i", $r5c["clockout"]);
                                                            else $edate=substr($etimez,11,5);
                                                            
                                                            // $cdate=substr($stimez,11,5);
                                                            // $edate=substr($etimez,11,5);
                                                            
                                                            // $pdate=date("Y-m-d", $r5c["clockin"]);
                                                            if(strlen($r5c["clockin"])>=5) $pdate=date("Y-m-d", $r5c["clockin"]);
                                                            else{
                                                                $pdate=strtotime($stimez);
                                                                $pdate=date("Y-m-d", $pdate);
                                                            }
                                                            
                                                            if($r5c["wage_amt"]==0) $wageamt=$wageamt;
                                                            else $wageamt=$r5c["wage_amt"];
                                                            
                                                            echo"<input type='hidden' name='id' value='".$r5c["id"]."'><input type='hidden' name='pdate' value='$pdate'>
                                                            <div class='row'>
                                                                <div class='col-lg-6' style='padding-bottom:20px'><div class='form-group'><label>Clocked IN *</label><input name='clockin1' type='time' value='$cdate' class='form-control' required></div></div>
                                                                <div class='col-lg-6' style='padding-bottom:20px'><div class='form-group'><label>Clocked OUT *</label><input name='clockout1' type='time' value='$edate' class='form-control' required></div></div>
                                                                <div class='col-lg-6' style='padding-bottom:20px'><div class='form-group'><label>Wage/Hour *</label><input name='wage_amount' type='text' value='$wageamt' class='form-control' required></div></div>
                                                                <div class='col-lg-6' style='padding-bottom:20px'><div class='form-group'><label>Total Overtime *</label><input name='total_overtime' type='text' value='".$r5c["total_overtime"]."' class='form-control' required></div></div>
                                                                <div class='col-lg-6' style='padding-bottom:20px'><div class='form-group'><label>Overtime/Hour *</label><input name='overtime_amount' type='text' value='".$r5c["overtime_amt"]."' class='form-control' required></div></div>
                                                                <div class='col-lg-6' style='padding-bottom:20px'><div class='form-group'><label>Kilometers Travelled *</label><input name='milage' type='text' value='".$r5c["milage"]."' class='form-control' required></div></div>
                                                                <div class='col-lg-12' style='padding-bottom:20px'><div class='form-group'><input type=submit name='submit' value='Update' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm'  required></div></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><br>";
                                    // }                                        
                                    echo"<a data-bs-toggle='modal' data-bs-target='#adminlog$t' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm'>Admin Log</a><br><br>
                                    <div class='modal fade modal-close-out' id='adminlog$t' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabelCloseOut'>Admin`s Note/Log</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body' id='PopupModalX'>".$r5c["address"]."<hr>".$r5c["admin_note"]."</div>                                                    
                                            </div>
                                        </div>
                                    </div>
                                </td>";
                                
                                if($r5c["wage_amt"]!=0) $wageamount=$r5c["wage_amt"];
                                if($r5c["overtime_amt"]!=0) $overtimeamount=$r5c["overtime_amt"];
                                
                                $totaworked=($total_hour_worked*$r5c["wage_amt"]);
                                $totaovertime=($total_overtime*$r5c["overtime_amt"]);
                                
                                $valuex=($totaworked+$totaovertime);
                                
                                if($valuex=="00" OR $valuex=="") $valuex=0;
                                if($totalworked=="00" OR $totalworked=="") $totalworked=0;
                                if($totalovertime=="00" OR $totalovertime=="") $totalovertime=0;
                                
                                $totalworked=0;
                                $totalovertime=0;
                                
                                $netpayablex=($netpayablex+$valuex);
                                $totalkmx=($totalkmx+$totalkm);
                                
                                $total_hour_worked_H=substr($total_hour_worked,0,2);
                                $total_hour_worked_S=substr($total_hour_worked,3,2);
                                  
                                // if($r5c["payroll"]==0) $totalworked1=($totalworked1+$total_hour_worked_H);
                                $totalworked1=($totalworked1+$total_hour_worked_H);
                                if($totalworked1<=9) $totalworked1="0$totalworked1";
                                // if($r5c["payroll"]==0) $totalworked2=($totalworked2+$total_hour_worked_S);
                                
                                
                                if($total_hour_worked_S=="00" OR $total_hour_worked_S=="" ) $total_hour_worked_S=0;
                                
                                $totalworked2=($totalworked2+$total_hour_worked_S);
                                
                                if($totalworked2<=9) $totalworked2="0$totalworked2";
                                
                                $totalworked33=0;        
                                $totalworked3=($r5c["wage_amt"]/60);
                                $totalworked33=($totalworked33+$totalworked3);
                                
                                // if($r5c["payroll"]==0) $totalovertime=($totalovertime+$total_overtime);
                                $totalovertime=($totalovertime+$total_overtime);
                                    
                                if($r5c["night"]==1){
                                    $pb0=$r5c["wage_amt"];
                                    $pb3=($total_overtime*$r5c["overtime_amt"]); 
                                    $pb=($pb0+$pb3);
                                    $pb1=0;
                                }else{
                                    $pb0=($total_hour_worked_H*$r5c["wage_amt"]);
                                    $pb3=($total_overtime*$r5c["overtime_amt"]); 
                                    $pb=($pb0+$pb3);
                                    $pb1=($totalworked3*$total_hour_worked_S);
                                }
                                
                                $pb2=($pb+$pb1);
                                        
                                // $fmt= numfmt_create( 'en_US', NumberFormatter::CURRENCY );
                                // $payable= numfmt_format_currency($fmt, $pb2, "$");
                                
                                
                                $payable=sprintf('%01.2f', $pb2);
                                
                                
                                /*
                                if($r5c["payroll"]==0) $xpayable=($pb2+$xpayable);
                                else $payablex=($pb2+$payablex);
                                */
                                
                                $xpayable=($pb2+$xpayable);
                                
                                if($r5c["payroll"]==1) $payablex=($pb2+$payablex);
                                
                                echo"<td align=left style='min-width:200px;'>123";
                                    if($mtype=="ADMIN"){
                                        echo"<a style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('employees_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype&status=$status&mtype=$mtype&nofollow=1', 'offcanvasTop2')\"><b>$employeename</b></a>
                                        <br><a href='tel:$employeephone'>$employeephone</a><br>";
                                    }
                                    echo"<b>$clientname<br>$schads_status, $schads_level - Paypoint $schads_paypoint
                                    </b><br>$projectname<br>$stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX
                                </td>";
                                
                                $cin=strtotime($r5c["stime"]);
                                $cout=strtotime($r5c["etime"]);
                                
                                echo"<td nowrap valign=top align=center style='font-size:12pt;'><br><b>$clockin</b><br>";
                                    if($mtype=="ADMIN" and $clockin!="-") echo"<a href='dataupdate.php?sid=".$r5c["id"]."&clockin=$cin&clockout=$cout' target='dataprocessor' style='font-size:8pt'>update</a>";
                                    // if($mtype=="ADMIN" and $clockin!="-") echo"<a href='dataupdate.php?sid=".$r5c["id"]."&clockin=$cin&clockout=$cout' target='dataprocessor' style='font-size:8pt'>update</a>";
                                    echo"<br><a href='#' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='modal' data-bs-target='#userlog$t')\">";
                                    if(strlen($r5c["activity_log"])<=3) echo"<span id='blink_text' style='font-size:8pt'><b>EOD NOT SET</b></span>";
                                    else echo"Quick EOD";
                                echo"</a>
                                    <br><a href='https://maps.google.com/maps?q=".$r5c["latitude_in"].",".$r5c["longitude_in"]."&hl=es;z=14' style=';font-size:8pt' target='_blank'>See in Map</a>
                                    
                                    <div class='modal inmodal' id='userlog$t' tabindex='-1' role='dialog' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content animated bounceInUp'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabelCloseOut'>User`s Quick EOD</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body' style='text-align:left'><b>What is your Feedback for Today?</b> *<br>Response: ".$r5c["activity_log"]."</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td nowrap valign=top align=center style='font-size:12pt;'><br>";
                                    
                                    if($r5c["clockout_request"]==1) echo"<span style='color:orange'><b>$clockout</b></span><br>";
                                    else echo"<b>$clockout</b><br><br>";
                                    
                                    if($r5c["clockout_request"]==0){
                                        if($r5c["payroll"]!="1"){ 
                                            if(strlen($r5c["clockout"])>=5) echo"<a href='#' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='modal' data-bs-target='#requestlog$t')\">Request Edit</a>";
                                        }
                                        echo"<br><a href='https://maps.google.com/maps?q=".$r5c["latitude_out"].",".$r5c["longitude_out"]."&hl=es;z=14' style=';font-size:8pt' target='_blank'>See in Map</a>";
                                    
                                        echo"<div class='modal inmodal' id='requestlog$t' tabindex='-1' role='dialog' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content animated bounceInUp'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Edit $employeename</h4><p>$sday</b> - $sdate</h5>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <form method='post' name='shiftediting' action='scheduling-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                            <input type='hidden' name='smsbd' value='$smsbd'><input type='hidden' name='request_edit' value='request-edit'>
                                                            <input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>";
                                                            $cdate=date("H:i", $r5c["clockin"]);
                                                            $cdate1=date("h:i A", $r5c["clockin"]);
                                                            if(strlen($r5c["clockout"])>=5) $edate=date("H:i", $r5c["clockout"]); else $edate="--";
                                                            
                                                            if(strlen($r5c["clockout"])>=5) $edate1=date("h:i A", $r5c["clockout"]); else $edate1="--";
                                                            
                                                            if(strlen($r5c["clockin"])>=5) $pdate=date("Y-m-d", $r5c["clockin"]);
                                                            else{
                                                                $pdate=strtotime($stimez);
                                                                $pdate=date("Y-m-d", $pdate);
                                                            }
                                                            echo"<input type='hidden' name='id' value='".$r5c["id"]."'><input type='hidden' name='pdate' value='$pdate'>
                                                            <div class='row'>
                                                                <div class='col-lg-12'><div class='form-group'><label>Quick EOD</label><textarea name='activity_log' class='form-control'>".$r5c["activity_log"]."</textarea><br></div></div>
                                                                <div class='col-lg-6'><div class='form-group'><label>Clocked IN - <b>$cdate1</b> *</label><input name='clockin_request' type='time' value='$cdate' class='form-control' required></div></div>
                                                                <div class='col-lg-6'><div class='form-group'><label>Clocked OUT - <b>$edate1</b> *</label><input name='clockout_request' type='time' value='$edate' class='form-control' required></div></div>
                                                                <div class='col-lg-12'><div class='form-group'><hr><input type=submit name='submit' value='Submit Request' class='btn btn-primary' required></div></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    }else{
                                        if($mtype=="ADMIN") {
                                            if($r5c["clockout_request"]>=2){
                                                $newclockin="";
                                                $newclockout="";
                                                $newclockin=date("h:i A", $r5c["clockin_request"]) ;
                                                $newclockout=date("h:i A", $r5c["clockout_request"]) ;
                                                echo"<span style='color:blue'>Update Request: $newclockin - $newclockout</span><br>";
                                                echo"<div class='form-group'>
                                                    <a href='scheduling-set.php?request_approveid=".$r5c["id"]."&newclockintime=".$r5c["clockin_request"]."&newclockouttime=".$r5c["clockout_request"]."&src_employeeid=".$_GET["src_employeeid"]."' style='font-size:8pt;border-radius:50px;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;background-color:lightgreen;;margin-top:3px'>Approve</a>&nbsp;&nbsp;
                                                    <a href='scheduling-set.php?request_rejectid=".$r5c["id"]."&src_employeeid=".$_GET["src_employeeid"]."' style='font-size:8pt;border-radius:50px;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;margin-top:3px'>Reject</a>
                                                </div>";
                                            }
                                        }else{
                                            if($r5c["clockout_request"]>=2){
                                                $newclockout=date("h:i A", $r5c["clockout_request"]) ;
                                                echo"<span style='color:blue'>Pending Request<br><b>$newclockout</b></span><br>";
                                                
                                            }
                                        }
                                    }
                                echo"</td>
                                <td nowrap valign=top align=right style='font-size:10pt;'><br><b>$total_hour_worked H</b><br>";
                                
                                    // echo"<a href='#' style='font-size:8pt;border-radius:50px;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;margin-top:3px'>EOD</a>";
                                    
                                echo"</td>
                                <td nowrap valign=top align=right style='font-size:10pt'><br>$shift_total H</td>
                                <td nowrap valign=top align=right style='font-size:10pt'><br>$total_overtime H</td>
                                <td valign=top align=right nowrap style='font-size:10pt'><br>$ ".$r5c["wage_amt"]."/H</td>
                                <td valign=top align=right nowrap style='font-size:10pt'><br>$ ".$r5c["overtime_amt"]."/H</td>
                                <td valign=top align=right nowrap style=''><br>";
                                    if($r5c["payroll"]=="1") echo"<span style='color:grey'>$payable</span><br><span style='color:blue'><b>PAID</b></span>";
                                    else echo"<b>$payable</b><br>&nbsp;";
                                echo"<br><span style='font-size:8;color:orange'>$nightcolor</span></td>
                                
                                <td valign=top align=right nowrap style='font-size:10pt'><br>".$r5c["milage"]." KM";
                                if($r5c["milage"]<=0) echo"<br><span id='blink_text' style='font-size:8pt'><b>NOT SET</b></span>";
                                echo"</td>";
                                
                                if($mtype=="ADMIN") {
                                    echo"<td align=center><a href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=4' target='dataprocessor' style='margin-top:0px;'>
                                        <i class='fa fa-trash' style='color:brown'></i>
                                    </a></td>";
                                }
                                
                            echo"</tr>";
                            
                        } }
                        
                        if($netpayablex!=0){
                            if($_GET["src_employeeid"]!="ALL"){
                                
                                if($totalworked2>=61){
                                    $overhour=floor($totalworked2/60);
                                    $totalworked1=($totalworked1+$overhour);
                                    $hcount=($overhour*60);
                                    $totalworked2=($totalworked2-$hcount);
                                }
                                
                                $totalworked33=($totalworked33*$totalworked2);
                                $netpayablex=($netpayablex+$totalworked33);
                                
                                $xpayable=($xpayable+$totalkm);
                                $netpayablex=sprintf('%01.2f', $xpayable);
                                            
                                echo"<tr>
                                    <td colspan=4 align=right></td>
                                    <td align=right style='font-size:8pt'><b>Total Worked</b></td>
                                    <td align=right>&nbsp;</td>
                                    <td align=right style='font-size:8pt'><b>Total OT & KM</b></td>
                                    <td align=right>&nbsp;</td>
                                    <td align=right>&nbsp;</td>
                                    <td align=right style='font-size:8pt'><b>Net Payable </b></td>
                                    <td colspan=13></td>
                                </tr>";
                                
                                echo"<tr>
                                    <td colspan=4 align=right></td>
                                    <td align=right><b>$totalworked1:$totalworked2 Hr.</b></td>
                                    <td align=center><b>+</b></td>
                                    <td align=right><b>$totalovertime Hr. + $totalkm KM</b></td>
                                    <td align=center colspan=2><b>=</b></td>
                                    <td align=right style='font-size:12pt'><b>$netpayablex</b></td>
                                    <td colspan=13 align=center nowrap>
                                    
                                        <div class='modal inmodal' id='payslip' tabindex='-1' role='dialog' aria-hidden='true'>
                                            <div class='modal-dialog modal-lg'>
                                                <div class='modal-content animated bounceInUp' id='printArea'><center>
                                                    <div class='modal-header'><h4 class='modal-title'>Pay Slip for $employeename</h4></div>
                                                    <div class='modal-body' style='padding:10px'>
                                                        <table style='width:100%'>
                                                            <tr><td style='width:50%' align=left><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:100px'><br></td>
                                                                <td align=right style='font-size:10pt;width:50%'>
                                                                    <b>$companyname</b><br>
                                                                    ABN: 53662401372<br>
                                                                    $addressxyz, $cityx, $postalcodex<br>
                                                                    Email: $emailxyz<br>
                                                                    Phone: $phonexyz
                                                                </td>
                                                            </tr><tr>
                                                                <td align=left style='font-size:10pt;width:50%'>
                                                                    <b>$employeename</b><br><b>ABN # $employeeabn</b><br>$employeeaddress<br>$employeephone
                                                                </td>
                                                                <td style='width:50%' align=right>
                                                                    <table>
                                                                        <tr><td style='font-size:10pt'>Period Starting</td><td style='font-size:10pt'>:</td><td align=right style='font-size:10pt'><b>$d1-$m1-$y1</b></td></tr>
                                                                        <tr><td style='font-size:10pt'>Period Ending</td><td style='font-size:10pt'>:</td><td style='font-size:10pt'><b>$d2-$m2-$y2</b></td></tr>
                                                                        <tr><td style='font-size:10pt'>Payment Date</td><td style='font-size:10pt'>:</td><td style='font-size:10pt'>";
                                                                            $todayz=time();
                                                                            $todayz=date("d-m-Y", $todayz);
                                                                            echo"<b>$todayz</b></td></tr>";
                                                                        // <tr><td style='font-size:10pt'>Gross Earning</td><td style='font-size:10pt'>:</td><td style='font-size:10pt'><b>$netpayablex</b></td></tr>
                                                                    echo"</table>
                                                                </td>
                                                            </tr>
                                                        </table><hr>
                                                        
                                                        <table class='table table-striped table-bordered table-hover dataTables-example' style='width:100%'>
                                                            <thead><tr>
                                                                <td align=left style='font-size:10pt'><b>Date</b></td>
                                                                <td align=right style='font-size:10pt'><b>Worked</b></td>
                                                                <td align=right style='font-size:10pt'><b>Overtime</b></td>
                                                                <td align=right style='font-size:10pt'><b>Wage/h</b></td>
                                                                <td align=right style='font-size:10pt'><b>OT/h</b></td>
                                                                <td align=right style='font-size:10pt'><b>Payable</b></td>
                                                            </tr></thead>
                                                            <tbody>";
                                                                $todayx=strtotime($todaydate1);
                                                                $todayy=strtotime($todaydate2);
                                                                                
                                                                $d1p= date("d", $todayx);
                                                                $m1p= date("m", $todayx);
                                                                $y1p= date("Y", $todayx);
                                                                $d2p= date("d", $todayy);
                                                                $m2p= date("m", $todayy);
                                                                $y2p= date("Y", $todayy);
                                                                                
                                                                $netpayablep=0;
                                                                $totalworked1p=0;
                                                                $totalworked2p=0;
                                                                $totalovertime1p=0;
                                                                $totalovertime2p=0;
                                                                $totalkmp=0;
                                                                
                                                                $todayzz=date("d-m-Y 23:50", $todayy);
                                                                $todayy2=strtotime($todayzz);
                        
                                                                if($_GET["src_employeeid"]=="ALL"){
                                                                    // if($mtype=="ADMIN") $r5ap = "select * from shifting_allocation where sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                                                                    // else $r5ap = "select * from shifting_allocation where sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                                                                    $r5ap = "select * from shifting_allocation where sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                                                                }else{
                                                                    // if($mtype=="ADMIN") $r5ap = "select * from shifting_allocation where employeeid='".$_GET["src_employeeid"]."' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                                                                    // else $r5ap = "select * from shifting_allocation where employeeid='".$_COOKIE["userid"]."' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
                                                                    $r5ap = "select * from shifting_allocation where employeeid='".$_GET["src_employeeid"]."' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";                            
                                                                }
                                                                
                                                                $r5bp = $conn->query($r5ap);
                                                                if ($r5bp->num_rows > 0) { while($r5cp = $r5bp -> fetch_assoc()) {
                                                                    
                                                                    
                                                                    $stimeXp=substr($r5cp['stime'],11,5);
                                                                    $etimeXp=substr($r5cp['etime'],11,5);
                                                                    $stimeX1p=""; $stimeX2p=""; $sstatXp="";
                                                                    $etimeX1p=""; $etimeX2p=""; $estatXp="";
                                                                    $stimeX1p=substr($r5cp['stime'],11,2);
                                                                    $stimeX2p=substr($r5cp['stime'],14,2);
                                                                    if($stimeX1p>=13) $stimeX1p=($stimeX1p-12);    
                                                                    if($stimeX1p>=13){
                                                                        $stimeX1p=($stimeX1p-12);
                                                                        if($stimeX1p<="9") $stimeX1p="0$stimeX1p";
                                                                        $sstatXp="PM";
                                                                    }else{
                                                                        $sstatXp="AM";
                                                                    }
                                                                    
                                                                    $etimeX1p=substr($r5cp['etime'],11,2);
                                                                    $etimeX2p=substr($r5cp['etime'],14,2);
                                                                    if($etimeX1p>=13){
                                                                        $etimeX1p=($etimeX1p-12);
                                                                        if($etimeX1p<="9") $etimeX1p="0$etimeX1p";
                                                                        $estatXp="PM";
                                                                    }else{
                                                                        $estatXp="AM";
                                                                    }
                                                                                    
                                                                    $stimep=strtotime($r5cp['stime']);
                                                                    $sdayp=date("l", $stimep);
                                                                    $sdatep=date("d-m-Y", $stimep);
                                                                    $stimep=date("h:i a", $stimep);
                                                                                    
                                                                    $etimep=strtotime($r5cp['etime']);
                                                                    $etimep=date("h:i a", $etimep);
                                                                    
                                                                    if(strlen($r5cp["clockin"])>=5) $clockinp=date("h:i a", $r5cp["clockin"]); else $clockinp="-"; 
                                                                    if(strlen($r5cp["clockout"])>=5) $clockoutp=date("h:i a", $r5cp['clockout']); else $clockoutp="-";
                                                                                   
                                                                    if(strlen($r5cp["clockin"])>=5 AND strlen($r5cp["clockout"])>=5){
                                                                                        
                                                                        $enddatep=0;
                                                                        $cinoutp=0;
                                                                        $cin1p=date("H", $r5cp["clockin"]);
                                                                        $cout1p=date("H", $r5cp["clockout"]);
                                                                        $cinoutp=($cin1p-$cout1p);
                                                                        if($cinoutp>=1) $enddatep=strtotime("24 hours", $r5cp["clockout"]);
                                                                        else $enddatep=$r5cp["clockout"];
                                                                        
                                                                        $clockin2p=date("Y-m-d h:i:s a", $r5cp["clockin"]);
                                                                        $clockout2p=date("Y-m-d h:i:s a", $enddatep);
                                                                        
                                                                        // $clockin2p=date("Y-m-d h:i:s a", $r5cp["clockin"]);
                                                                        // $clockout2p=date("Y-m-d h:i:s a", $r5cp["clockout"]);
                                                                                    
                                                                        $date1p=date_create("$clockout2p");
                                                                        $date2p=date_create("$clockin2p");
                                                                        $diff1p=date_diff($date1p,$date2p);
                                                                                                
                                                                        $total_hour_workedp=0;
                                                                        $total_hour_workedp= $diff1p->format("%H:%I");
                                                                        if($total_hour_workedp<=0) $total_hour_workedp=00;
                                                                        
                                                                        $date3p=date_create($r5cp["etime"]);
                                                                        $date4p=date_create($r5cp["stime"]);
                                                                        $diff2p=date_diff($date3p,$date4p);
                                                                        $shift_totalp= $diff2p->format("%H:%I");
                                                                        // $total_overtime=($total_hour_worked-$shift_total);
                                                                        $total_overtimep=$r5cp["total_overtime"];
                                                                                            
                                                                        if($total_overtimep<=0) $total_overtimep=00;
                                                                        
                                                                    }else{
                                                                        $total_hour_workedp=0;
                                                                        $shift_totalp=0;
                                                                        $total_overtimep=0;
                                                                        
                                                                    }
                                                                    
                                                                    $tp=($tp+1);
                                                                    
                                                                    
                                                                    if($r5cp["wage_amt"]!=0) $wageamountp=$r5cp["wage_amt"];
                                                                    if($r5cp["overtime_amt"]!=0) $overtimeamountp=$r5cp["overtime_amt"];
                                                                                    
                                                                    $totaworkedp=($total_hour_workedp*$r5cp["wage_amt"]);
                                                                    $totaovertimep=($total_overtimep*$r5cp["overtime_amt"]);
                                                                    $valuep=($totaworkedp+$totaovertimep);
                                                                                    
                                                                    if($valuep=="00" OR $valuep=="" ) $valuep=0;
                                                                    if($totaworkedp=="00" OR $totaworkedp=="" ) $totaworkedp=0;
                                                                    if($totaovertimep=="00" OR $totaovertimep=="" ) $totaovertimep=0;
                                                                    
                                                                    $netpayablep=($netpayablep+$valuep);
                                                                    
                                                                    
                                                                    $total_hour_worked_Hp=substr($total_hour_workedp,0,2);
                                                                    $total_hour_worked_Sp=substr($total_hour_workedp,3,2);
                                                                                    
                                                                    // if($r5cp["payroll"]==0) $totalworked1p=($totalworked1p+$total_hour_worked_Hp);
                                                                    $totalworked1p=($totalworked1p+$total_hour_worked_Hp);
                                                                    if($totalworked1p<=9) $totalworked1p="0$totalworked1p";
                                                                    // if($r5cp["payroll"]==0) $totalworked2p=($totalworked2p+$total_hour_worked_Sp);
                                                                    
                                                                    if($total_hour_worked_Sp=="00" OR $total_hour_worked_Sp=="" ) $total_hour_worked_Sp=0;
                                                                    
                                                                    $totalworked2p=($totalworked2p+$total_hour_worked_Sp);
                                                                    if($totalworked2p<=9) $totalworked2p="0$totalworked2p";
                                                                                    
                                                                    $totalworked3p=($r5cp["wage_amt"]/60);
                                                                    $totalworked33p=($totalworked33p+$totalworked3p);
                                                                    
                                                                    $totalovertimep=($totalovertimep+$total_overtimep);
                                                                                    
                                                                    if($r5cp["night"]==1){
                                                                        $pb0p=$r5cp["wage_amt"];
                                                                        $pb3p=($total_overtimep*$r5cp["overtime_amt"]); 
                                                                        $pbp=($pb0p+$pb3p);
                                                                        $pb1p=0;
                                                                    }else{
                                                                        $pb0p=($total_hour_worked_Hp*$r5cp["wage_amt"]);
                                                                        $pb3p=($total_overtimep*$r5cp["overtime_amt"]); 
                                                                        $pbp=($pb0p+$pb3p);
                                                                        $pb1p=($totalworked3p*$total_hour_worked_Sp);
                                                                    }
                                                                    
                                                                    $pb2p=($pbp+$pb1p);
                                                                    $payablep=sprintf('%01.2f', $pb2p);
                                                                    $xpayablep=($pb2p+$xpayablep);
                                                                    if($r5cp["payroll"]==1) $payablexp=($pb2p+$payablexp);
                                                                    
                                                                    if($pb2p>=1){
                                                                        echo"<tr class='gradeX'>
                                                                            <td nowrap style='font-size:10pt'><b>$sdayp</b><br>$sdatep</td>
                                                                            <td nowrap align=right style='font-size:10pt'><b>$total_hour_workedp H</b></td>
                                                                            <td nowrap align=right style='font-size:10pt'>$total_overtimep H</td>
                                                                            <td align=right nowrap style='font-size:10pt'>$ ".$r5cp["wage_amt"]."/H</td>
                                                                            <td align=right nowrap style='font-size:10pt'>$ ".$r5cp["overtime_amt"]."/H</td>
                                                                            <td align=right nowrap style='font-size:10pt'>$payablep</td>
                                                                        </tr>";
                                                                    }
                                                                    if($r5cp["payroll"]==1) $payablexx=($pb2p+$payablexx);
                                                                    
                                                                } }
                                                                
                                                                
                                                                if($netpayablep!=0){
                                                                    
                                                                    if($totalworked2p>=61){
                                                                        $overhourp=floor($totalworked2p/60);
                                                                        $totalworked1p=($totalworked1p+$overhourp);
                                                                        $hcountp=($overhourp*60);
                                                                        $totalworked2p=($totalworked2p-$hcountp);
                                                                    }
                                                                    $totalworked33p=($totalworked33p*$totalworked2p);
                                                                    $netpayablep=($netpayablep+$totalworked33p);
                                                                    
                                                                    $totalkmp=($totalkmp+$totalkm);
                                                                                    
                                                                    $netpayablep=sprintf('%01.2f', $xpayablep);
                                                                                    
                                                                    echo"<tr><td colspan=5 align=right style='font-size:10pt'><b>Total Worked Hours</b></td><td align=right style='font-size:10pt'><b>$totalworked1p:$totalworked2p Hr.</b></td></tr>
                                                                    <tr><td colspan=5 align=right style='font-size:10pt'><b>Total Overtime</b></td><td align=right style='font-size:10pt'><b><b>$totalovertimep Hr.</b></td></tr>
                                                                    <tr><td colspan=5 align=right style='font-size:10pt'><b>Net Payable</b></td><td align=right style='font-size:10pt'><b>$netpayablep</b></td></tr>
                                                                    <tr><td colspan=15 align=left>";
                                                                    
                                                                        $totaldrX=0;
                                                                        echo"<table style='width:100%' class='footable table table-stripped' data-page-size='15' data-filter=#filter>
                                                                            <thead>
                                                                                <tr><th align=left style='font-size:12pt'>Date</th><th align='left' style='font-size:12pt'>Ledger ID</th>";
                                                                                    // if($mtype=="ADMIN") echo"<th align=left style='font-size:12pt'>Employee Name</th>";
                                                                                    echo"<th style='font-size:12pt' align='left'>Client Name</th><th style='text-align:right;font-size:12pt'>Amount</th>
                                                                                </tr>
                                                                            </thead><tbody>";
                                                                                $dfromv=date('Y-m-d H:i:s', strtotime($_COOKIE["shiftingid2"] . ' -1 day'));
                                                                                $dfromv=strtotime($dfromv);
                                                                                $dtov=date('Y-m-d H:i:s', strtotime($_COOKIE["shiftingid3"] . ' +1 day'));
                                                                                $dtov=strtotime($dtov);
                                                                                
                                                                                $dfromv1=date("d-m-Y", $dfromv);
                                                                                $dtov1=date("d-m-Y", $dtov);
                                                                                
                                                                                // echo"Showing Result From $dfromv1 to $dtov1";
                                                                                
                                                                                if($mtype=="ADMIN"){
                                                                                    if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' order by payment_date asc";
                                                                                    else $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                                                                }else{
                                                                                    if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' order by payment_date asc";
                                                                                    else $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                                                                }
                                                                                
                                                                                $r = $conn->query($s);
                                                                                if ($r->num_rows > 0) { while($rsx = $r->fetch_assoc()) {
                                                                                    $date=date("d-M-Y",$rsx["payment_date"]);
                                                                                    $clientnamex="";
                                                                                    $r1x = "select * from uerp_user where id='".$rsx["ledger_id"]."' order by id asc limit 1";
                                                                                    $r1y = $conn->query($r1x);
                                                                                    if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientnamex="".$r1z["username"]." ".$r1z["username2"].""; } }
                                                                                    $employeenamex="";
                                                                                    $r6 = "select * from uerp_user where id='".$rsx["employeeid"]."' order by id asc limit 1";
                                                                                    $r66 = $conn->query($r6);
                                                                                    if ($r66->num_rows > 0) { while($r666 = $r66 -> fetch_assoc()) { $employeenamex="".$r666["username"]." ".$r666["username2"].""; } }
                                                                                    $myexperiencexX="myexperiencexX".$rsx["id"]."";
                                                                                    $myexperiencexY="myexperiencexY".$rsx["id"]."";
                                                                                    $totaldrx=($rsx["dr_amt"]+$totaldrx);
                                                                                    echo"<tr>
                                                                                        <td align=left style='font-size:10pt'>$date</td>
                                                                                        <td align=left style='font-size:10pt'>".$rsx["payment_no"]."</td>";
                                                                                        // if($mtype=="ADMIN") echo"<td align=left style='font-size:10pt'>$employeenamex</td>";
                                                                                        echo"<td align=left style='font-size:10pt'>$clientnamex</td>
                                                                                        <td align=right style='font-size:10pt;background-color:;color:black'><b>$".$rsx["dr_amt"]."</b></td>
                                                                                    </tr>";
                                                                                } }
                                                                                
                                                                                $epayablex=0;
                                                                                $epayablex=sprintf('%01.2f', $totaldrx);
                                                                                
                                                                            echo"</tbody>
                                                                        </table>";
                                                                        
                                                                        $payablexZ = (($xpayablep-$payablexx)+$totaldrx);
                                                                        $payablexZ= sprintf('%01.2f', $payablexZ);
                                                                        $payablexx = $payablexx;
                                                                        
                                                                        echo"<table width='100%'>
                                                                            <tr><td align=right style='font-size:12pt'>Total Expense Payable :</b></td><td align=right style='width:150px;font-size:12pt'> <b>$epayablex</b></td></tr>
                                                                            <tr><td align=right style='font-size:12pt'>Total Roster Payable :</b></td><td align=right style='width:150px;font-size:12pt'> <b>$netpayablep</b></td></tr>
                                                                            <tr><td align=right style='font-size:12pt'>Total Roster Paid :</b></td><td align=right style='width:150px;font-size:12pt'> <b>- $payablexx</b></td></tr>
                                                                            <tr><td align=right style='font-size:16pt'>Gross Earning :</b></td><td align=right style='width:150px;font-size:14pt'> <b>$payablexZ</b></td></tr>
                                                                        </table><hr>
                                                                    </td></tr>";
                                                                }
                                                                
                                                            echo"</div></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>";
                                
                                
                                echo"<tr>
                                    <td colspan=20 align=left>";
                                        
                                        // if($mtype=="ADMIN"){
                                        
                                            echo"<div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                                                <div class='row m-b-lg m-t-lg'>
                                                    <div class='col-md-12'>
                                                        <div class='ibox'>
                                                            <div class='ibox-content text-left'>";
                                                                $totaldr=0;
                                                                echo"<table class='footable table table-stripped' data-page-size='15' data-filter=#filter>
                                                                    <thead>
                                                                        <tr><th style='font-size:12pt'>Ledger ID</th><th align=left style='font-size:12pt'>Date</th>";
                                                                            if($mtype=="ADMIN") echo"<th align=left style='font-size:12pt'>Employee Name</th>";
                                                                            echo"<th style='font-size:12pt'>Client Name</th>
                                                                            <th style='text-align:center;font-size:12pt'>Note</th><th style='text-align:center;font-size:12pt'>Slip</th>
                                                                            <th style='text-align:right;font-size:12pt'>Amount</th>
                                                                            <th style='width:50px'>&nbsp;</th>
                                                                        </tr>
                                                                    </thead><tbody>";
                                                                        $dfromv=date('Y-m-d H:i:s', strtotime($_COOKIE["shiftingid2"]. ' -1 day'));
                                                                    	$dfromv=strtotime($dfromv);
                                                                    	$dtov=date('Y-m-d H:i:s', strtotime($_COOKIE["shiftingid3"] . ' +1 day'));
                                                                    	$dtov=strtotime($dtov);
                                                                	    
                                                                        $dfromv1=date("d-m-Y", $dfromv);
                                                                	    $dtov1=date("d-m-Y", $dtov);
                                                                	    
                                                                	    // echo"Showing Result From $dfromv1 to $dtov1";
                                                                	        
                                                                	    if($mtype=="ADMIN"){
                                                                	        if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' order by payment_date asc";
                                                                	        else $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                                                	    }else{
                                                                	        if($_GET["src_clientid"]==0) $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' order by payment_date asc";
                                                                	        else $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and approve1='1' and payroll_id='0' and paid_to='".$_GET["src_clientid"]."' order by payment_date asc";
                                                                	    }
                                                                        
                                                                        $r = $conn->query($s);
                                                                        if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                                            $date=date("d-M-Y",$rs["payment_date"]);
                                                                            
                                                                            $clientname="";
                                                                            $r1x = "select * from uerp_user where id='".$rs["ledger_id"]."' order by id asc limit 1";
                                                                            $r1y = $conn->query($r1x);
                                                                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                                                                $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                                                                            } }
                                                                            $employeename="";
                                                                            $r6 = "select * from uerp_user where id='".$rs["employeeid"]."' order by id asc limit 1";
                                                                            $r66 = $conn->query($r6);
                                                                            if ($r66->num_rows > 0) { while($r666 = $r66 -> fetch_assoc()) {
                                                                                $employeename="".$r666["username"]." ".$r666["username2"]."";
                                                                            } }
                                                                            $myexperienceX="myexperienceX".$rs["id"]."";
                                                                            $myexperienceY="myexperienceY".$rs["id"]."";
                                                                            $totaldr=($rs["dr_amt"]+$totaldr);
                                                                            
                                                                            echo"<tr>
                                                                                <td align=left style='font-size:10pt'>".$rs["payment_no"]."</td>
                                                                                <td align=left style='font-size:10pt'>$date</td>";
                                                                                if($mtype=="ADMIN") echo"<td align=left style='font-size:10pt'>$employeename</td>";
                                                                                echo"<td align=left style='font-size:10pt'>$clientname</td>";
                                                                                echo"<td align=center style='font-size:10pt'><a href='#' class='btn ' data-bs-toggle='modal' data-bs-target='#$myexperienceX' style='margin-top:0px;'><i class='fa fa-eye'></i></a></td>
                                                                                <td align=center style='font-size:10pt'>";
                                                                                    // echo"<a href='#' class='btn ' data-bs-toggle='modal' data-bs-target='#$myexperienceY' style='margin-top:0px;'><i class='fa fa-eye'></i></a>";
                                                                                    echo"<a href='".$rs["image"]."' class='btn ' style='margin-top:0px;'><i class='fa fa-eye'></i></a>";
                                                                                    
                                                                                echo"</td>
                                                                                <td align=right style='font-size:10pt'><b>$".$rs["dr_amt"]."</b></td>
                                                                            </tr>";
                                                                             
                                                                            echo"<div class='modal inmodal' id='$myexperienceX' tabindex='-1' role='dialog' aria-hidden='true'>
                                                                                <div class='modal-dialog'><div class='modal-content animated bounceInUp' style='padding:20px'><b>Note:</b><br>".$rs["narration"]."</div></div>
                                                                            </div>
                                                                            <div class='modal inmodal' id='$myexperienceY' tabindex='-1' role='dialog' aria-hidden='true'>
                                                                                <div class='modal-dialog'><div class='modal-content animated bounceInUp'><img src='".$rs["image"]."' style='width:100%'></div></div>
                                                                            </div>";
                                                                        } }
                                                                        
                                                                    $epayable=0;
                                                                    $epayable=sprintf('%01.2f', $totaldr);
                                                                
                                                                echo"<th style='width:50px'>&nbsp;</th></tbody></table>";
                                                                
                                                                $payableZ = (($xpayable-$payablex)+$totaldr);
                                                                $payableZ= sprintf('%01.2f', $payableZ);
                                                                $payablex = $payablex;
                                                                echo"<table width='100%'>
                                                                    <tr><td align=right style='font-size:12pt'>Total Expense Payable :</b></td><td align=right style='width:150px;font-size:12pt'> <b>$epayable</b></td><th style='width:50px'>&nbsp;</th></tr>
                                                                    <tr><td align=right style='font-size:12pt'>Total Roster Payable :</b></td><td align=right style='width:150px;font-size:12pt'> <b>$netpayablex</b></td><th style='width:50px'>&nbsp;</th></tr>
                                                                    <tr><td align=right style='font-size:12pt'>Total Roster Paid :</b></td><td align=right style='width:150px;font-size:12pt'> <b>- $payablex</b></td><th style='width:50px'>&nbsp;</th></tr>
                                                                    <tr><td align=right style='font-size:16pt'>Gross Earning :</b></td><td align=right style='width:150px;font-size:14pt'> <b>$payableZ</b></td><th style='width:50px'>&nbsp;</th></tr>
                                                                </table><hr>";
                                                                
                                                            echo"</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                            
                                        // }
                                        
                                    echo"</td>
                                </tr>";
                                
                                
                                
                                if($mtype=="ADMIN"){
                                    if(!isset($_GET["src_employeeid"])) $employeeid=$_COOKIE["userid"];
                                    else $employeeid=$_GET["src_employeeid"];
                                    echo"<tr><td colspan=13>
                                        <table><tr>
                                            <td style='padding:10px'><a href='#'  class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#payslip')\">View Payslip</a></td>
                                            <td style='padding:10px'><a href='#' onclick=\"printDiv('printArea')\" class='btn btn-secondary'>Print Payslip</a></td>
                                            <td style='padding:10px'><a href='index.php?smsbd=settle-payment&src_employeeid=".$_GET["src_employeeid"]."' target='dataprocessor' class='btn btn-tertiary'>Settle Payment</a></td>
                                            <td style='padding:10px'><a href='https://login.xero.com/identity/connect/authorize?response_type=code&client_id=BC3F6750E2D644C18302F52BBA9E0BC7&redirect_uri=https://stylevista.online/saas/callback.php&scope=openid profile email accounting.transactions payroll.employees payroll.payruns' target='_blank' class='btn btn-icon btn-icon-start btn-success' ><i data-acorn-icon='login'></i><span> Generate PayRun on XERO</span></a></td>
                                            <td style='padding:10px'><a href='modules/myob_payroll_export.php?src_employeeid=$employeeid' target='dataprocessor' class='btn btn-secondary'>Generate MYOB Payroll File</span></a></td>";
                                            // <td><a href='#' data-bs-toggle='modal' data-bs-target='#payslipexpense' class='dropdown-item' onclick=\"getDataXYZ('".$_GET["src_employeeid"]."-1', 'datatargetZ')\" style='width:150px;border-radius:50px;padding:5px;padding-left:10px;padding-right:10px;'>Expense Over Payslip</a></td>
                                        echo"</tr></table>
                                        <div class='modal inmodal' id='xero' tabindex='-1' role='dialog' aria-hidden='true'>
                                            <div class='modal-dialog modal-lg'>
                                                <div class='modal-content animated bounceInUp' id='printArea'><center>
                                                    <div class='modal-header'><h4 class='modal-title'>XERO PayRun for $employeename</h4></div>
                                                    <div class='modal-body' style='padding:10px'>
                                                        <iframe name='processor' src='https://login.xero.com/identity/connect/authorize?response_type=code&client_id=BC3F6750E2D644C18302F52BBA9E0BC7&redirect_uri=https://stylevista.online/saas/callback.php&scope=openid profile email accounting.transactions payroll.employees payroll.payruns' height='400' width='100%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td></tr>";
                                }
                            }
                        }
                    
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
            </div>";
            
            // EXPENSE ENTRY UNDER PAYSLIP
            echo"<div class='modal inmodal cardt' id='payslipexpense' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog modal-lg'>
                    <div class='modal-content animated bounceInUp' style='text-align:left'>
                        <div id='datatargetZ' style='padding:0px'></div>"; ?>
                        <script type="text/javascript">
                            function getDataXYZ(employeeid,datatargetZ){
                                $.ajax({
                                    url: 'payslip_expenses.php?<?php echo"selection=".$_GET["selection"]."&" ?>eid='+employeeid, 
                                    success: function(html) {
                                        var ajaxDisplay = document.getElementById(datatargetZ);
                                        ajaxDisplay.innerHTML = html;
                                    }
                                });
                            }
                        </script> <?php
                    echo"</div>
                </div>
            </div>";
            
            $today=time();
            $today=date("Y-m-d", $today);
            
            // approve expenses
            echo"<div class='modal fade modal-close-out' id='approveexpense' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                <div class='modal-dialog modal-lg'>
                    <div class='modal-content' style='padding:5px'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Pending Expenses</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body' id='PopupModalX' style='padding:5px'>
                            <iframe name='processor' src='modules/approveexpense.php?src_employeeid=".$_GET["src_employeeid"]."' height='400' width='100%' scrolling='yes' border='0' frameborder='0'>&nbsp;</iframe>
                        </div>
                    </div>
                </div>
            </div>";
            
            // modal bars
            echo"<div class='modal fade modal-close-out' id='myexperience' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>$mtype Expense Entry</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body' id='PopupModalX'>
                            <form class='m-t' role='form' method='post' action='accountsprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                <input name='idd' type='hidden' value='$userid'><input name='imageposition' type='hidden' value='2'>
                                <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'>
                                <input type='hidden' name='processor' value='expenseimagez'><input type='hidden' name='pointer' value='".$_GET["pointer"]."'>
                                <input type='hidden' name='shiftingiduser2' value='".$_GET["shiftingiduser2"]."'>
                                <input type='hidden' name='shiftingiduser3' value='".$_GET["pointeshiftingiduser3r"]."'>
                                <input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>";
                                if($mtype=="ADMIN") echo"<input type='hidden' name='approve1' value='1'>";
                                else echo"<input type='hidden' name='approve1' value='0'>";
                                echo"<div class='modal-body'>
                                    <div class='row'>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                            <label>Select Employee Name</label><select class='form-control' name='employeeidz' required>";
                                            $s72 = "select * from uerp_user where id='".$_GET["src_employeeid"]."' and status<>'4' order by id asc limit 1";
                                            $r72 = $conn->query($s72);
                                            if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                            } } 
                                            echo"</select>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                            <label>Select Client Name</label><select class='form-control' name='cname' required>
                                            <option value=''>Select Client</option>";
                                                $s7 = "select * from project_team_allocation where employeeid='".$_GET["src_employeeid"]."' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                                    $r71 = $conn->query($s71);
                                                    if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                        $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                        $r72 = $conn->query($s72);
                                                        if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                            echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                        } }
                                                    } }
                                                } }
                                            echo"</select>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                            <label>Expense Amount</label>
                                            <input type='number' id='currency' name='amount' min='1' max='1000' step='0.01' style='margin-left: 5px;' value='0' class='form-control' required>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                            <label>Date</label><input name='date' type='date' value='$today' class='form-control' required>
                                        </div></div>
                                        <div class='col-md-12' style='padding-bottom:20px'><div class='form-group'>
                                            <label>Expense Slip</label>
                                            <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'>
                                            <label>Note</label><textarea id='summernote' name='note' class='form-control'></textarea>
                                        </div></div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <input type='reset' class='btn btn-default' value='Reset'>
                                    <input type='submit' class='btn btn-primary' value='Save'>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>";
    ?>
    
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
    <script>
        function printDiv(divID) {
             var divElem = document.getElementById(divID).innerHTML;
             var printWindow = window.open('', '', 'height=210,width=350'); 
             printWindow.document.write('<html><head><title></title></head>');
             printWindow.document.write('<body>');
             printWindow.document.write(divElem);
             printWindow.document.write('</body>');
             printWindow.document.write ('</html>');
             printWindow.document.close();
             printWindow.print();
        }
    </script>