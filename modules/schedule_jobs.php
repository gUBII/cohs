<?php    
    
    if($_COOKIE['dbname']!="saas_info_goodwillcare_net"){
        echo"<form method='get' action='index.php' name='main' target='_top'><input type=text name='url' value='schedule_jobs_updated.php'></form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if(isset($_COOKIE["projectid"])){
        if($_COOKIE["projectid"]=="0"){
       
        $sheba="shifting_allocation";
        $cid=10001;
        $title="Assign New Shift";
        $utype="ROSTERING";
            
        date_default_timezone_set("Australia/Sydney");
        $week_number = date("W", strtotime('now'));
            
        if(!isset($_GET["src_employeeid"])) $src_employeeid="ALL";
        else $src_employeeid=$_GET["src_employeeid"];
            
        echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Job Scheduling</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Scheduling</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
            <a href='index.php?url=appointment_manager.php&id=5310' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Appointments' ><i data-acorn-icon='eye'></i> View Appointments</span>
            </a>
                        
            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttonemail' style='margin-right:5px'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Email Notification' ><i data-acorn-icon='email'></i></span>
            </button>
            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttonrequest' style='margin-right:5px'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Re-Schedule Requests' ><i data-acorn-icon='cursor-pointer'></i></span>
            </button>
            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#ShiftModal' style='margin-right:5px'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Shift Templates' ><i data-acorn-icon='clock'></i></span>
            </button>";
            
            // <button class='btn dim' data-bs-toggle='modal' data-bs-target='#emailmodal'><i class='fa fa-envelope' style='color:#777777'></i>&nbsp; Send Email</button>
            // <button class='btn dim' data-bs-toggle='modal' data-bs-target='#requestmodal' onclick=\"requestdata('100000', 'datarequestX')\"><i class='fa fa-hand-paper-o' style='color:#777777'></i>&nbsp; Requests</button>
            // <button class='btn dim' data-bs-toggle='modal' data-bs-target='#shiftingmodal'><i class='fa fa-clock-o' style='color:#777777'></i>&nbsp; Shift</button>";
            // <button class='btn-active btn btn-xs' data-bs-toggle='modal' data-bs-target='#jobsmodal'><i class='fa fa-briefcase' style='color:#777777'></i>&nbsp; Jobs</button>";
            // <button class='btn-active btn btn-xs' data-bs-toggle='modal' data-bs-target='#activitymodal'><i class='fa fa-th' style='color:#777777'></i>&nbsp; Activity</button>
            // <button class='btn-active btn btn-xs' data-bs-toggle='modal' data-bs-target='#settingsmodal'><i class='fa fa-cogs' style='color:#777777'></i>&nbsp; Settings</button>
                
            echo"<button type='button' data-bs-toggle='modal' data-bs-target='#ShiftModal' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Add New Shift' ><i data-acorn-icon='plus'></i> Add New Shift</span>
            </button>
            <a href='index.php?url=time_sheet.php&id=5162' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Time Sheet' ><i data-acorn-icon='clock'></i><i data-acorn-icon='file-text'></i></span>
            </a>
            <div class='btn-group ms-1 check-all-container'>
                        <div class='d-inline-block'>
                            
                            <table><tr><td nowrap>
                               
                            </td><td nowrap>
                                
                            </td><td nowrap>
                                
                            </td></tr></table>
                        </div>
                    </div>
                </div>                  
            </div>";
            
            echo"<div class='data-table-rows slim' id='sample'>
                <div class='data-table-responsive-wrapper'>
                    <table width=100%><tr>
                            <td align=left width=50 nowrap style='padding-right:10px'>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe' style='margin-top:-15px;margin-right:5px'>
                                    <button class='btn btn-success btn-icon btn-icon-start w-md-auto btn-sm' btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Option' ><i data-acorn-icon='eye'></i> <i data-acorn-icon='users'></i></span>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end bg-success'>
                                        <a href='index.php?url=schedule.php&id=48'>View by Users</a>
                                        <a href='index.php?url=schedule_jobs.php&id=48'>View by Jobs</a>
                                    </div>
                                </div>
                            </td>
                            <td align=left width='50'>";
                                $shift_today=time();
                                $shift_today=date("Y-m-d", $shift_today);
                                echo"<a href='index.php?url=daily_schedules.php&id=5206&src_employeeid=".$_GET["src_employeeid"]."'>
                                    <input type=button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' value=\"Day View\" style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Day View'>
                                </a>
                            </td>
                            <td align=left width='50'>
                                <form method='get' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                    <input type='hidden' name='projectid' value='0'><input type=hidden name='url' value='".$_GET["url"]."'>
                                    <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
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
                                                
                                if(isset($_GET["src_employeeid"])){
                                    $src_employeeid=$_GET["src_employeeid"];
                                }else{
                                    $src_employeeid="";
                                }
                                
                                echo"<table><tr>
                                    <td style='align:right;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                        <input type='hidden' name='shiftingidtoday1' value='$prevweek'><input type=hidden name='url' value='".$_GET["url"]."'>
                                        <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                        <button type='submit' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-left'></i></button>
                                    </form></td>
                                    <td><form method='post' name='shift_date' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                        <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'><input type=hidden name='url' value='".$_GET["url"]."'>
                                        <input type=hidden name='id' value='".$_GET["id"]."'>
                                        <input type='week' id='datepicker' name='shiftingid' class='form-control form-control-sm' value='$weekvar' onchange='this.form.submit()'>
                                    </form></td>
                                    <td style='align:left;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                        <input type='hidden' name='shiftingidtoday1' value='$weekcopy'><input type=hidden name='url' value='".$_GET["url"]."'>
                                        <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                        <button type='submit' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-right'></i></button>
                                    </form></td>
                                    <td valign=top style='width:150px'><form method='GET' name='shift_date' action='index.php' target='_self' enctype='multipart/form-data'>
                                        <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                                        <select class='form-control form-control-sm' name='src_employeeid' onchange='this.form.submit()' style='width:150px'>
                                            <option value=''>Select Client</option><option value='ALL'><strong>Show All Client</strong></option>";
                                            $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by username asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        echo"</select>
                                    </form></td>
                                </tr></table>
                            </td><td align=right>";
                                if($sourcefrom!="APP"){
                                    echo"<table ><tr>
                                        <td align=left width=50 nowrap style='padding-right:10px'>
                                            <a href='index.php?url=schedule-board-pdf' target='_self' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-top:-15px;margin-right:5px'>
                                                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Print As PDF'>Print PDF</span>
                                            </a>
                                        </td>
                                        <td align=left width=50 nowrap style='padding-right:10px'>
                                            <div class='d-inline-block datatable-export' data-datatable='#datatableStripe' style='margin-right:5px'>
                                                <button style='margin-top:-15px;' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                                                    <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Option' ><i data-acorn-icon='save'></i> <i data-acorn-icon='tools'></i></span>
                                                </button>
                                                <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                                    <a href='#' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#schedulecopyday'>Copy Day</a>
                                                    <a href='#' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#schedulecopyweek'>Copy Week</a>
                                                    <a href='#' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#scheduledeleteweek'>Wipe A Week</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr></table>";
                                }
                            echo"</td>
                        </tr></table>
                </div>
                
                <div class='tab-content'><hr>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <tr>
                            <th class='text-primary text-medium text-uppercase'>Jobs View
                                <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Quick Search' class='form-control'>
                            </th>";

                            $todayx=$_COOKIE["shiftingid"];
                            // $todayx=time();
                            $todayx=strtotime($todayx);
                            $todayz=time();
                            $y= date("Y", $todayx);
                            
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
                            }
                            if($d2==$lastdate){
                                $todayx=strtotime('+2 day', $todayx);
                                $y= date("Y", $todayx);
                                $m3= date("M", $todayx); $d3=date("d", $todayx); $mm3= date("m", $todayx); $d33= date("l", $todayx);
                                $m4= date("M", $todayx); $d4=($d3+1); $mm4= date("m", $todayx); $d44= date('l', strtotime('+1 day', $todayx));
                                $m5= date("M", $todayx); $d5=($d3+2); $mm5= date("m", $todayx); $d55= date('l', strtotime('+2 day', $todayx));
                                $m6= date("M", $todayx); $d6=($d3+3); $mm6= date("m", $todayx); $d66= date('l', strtotime('+3 day', $todayx));
                                $m7= date("M", $todayx); $d7=($d3+4); $mm7= date("m", $todayx); $d77= date('l', strtotime('+4 day', $todayx));
                            }
                            if($d3==$lastdate){
                                $todayx=strtotime('+3 day', $todayx);
                                $y= date("Y", $todayx);
                                $m4= date("M", $todayx); $d4=date("d", $todayx); $mm4= date("m", $todayx); $d44= date("l", $todayx);
                                $m5= date("M", $todayx); $d5=($d4+1); $mm5= date("m", $todayx); $d55= date('l', strtotime('+1 day', $todayx));
                                $m6= date("M", $todayx); $d6=($d4+2); $mm6= date("m", $todayx); $d66= date('l', strtotime('+2 day', $todayx));
                                $m7= date("M", $todayx); $d7=($d4+3); $mm7= date("m", $todayx); $d77= date('l', strtotime('+3 day', $todayx));
                            }
                            if($d4==$lastdate){
                                $todayx=strtotime('+4 day', $todayx);
                                $y= date("Y", $todayx);
                                $m5= date("M", $todayx); $d5=date("d", $todayx); $mm5= date("m", $todayx); $d55= date("l", $todayx);
                                $m6= date("M", $todayx); $d6=($d5+1); $mm6= date("m", $todayx); $d66= date('l', strtotime('+1 day', $todayx));
                                $m7= date("M", $todayx); $d7=($d5+2); $mm7= date("m", $todayx); $d77= date('l', strtotime('+2 day', $todayx));
                            }
                            if($d5==$lastdate){
                                $todayx=strtotime('+5 day', $todayx);
                                $y= date("Y", $todayx);
                                $m6= date("M", $todayx); $d6=date("d", $todayx); $mm6= date("m", $todayx); $d66= date("l", $todayx);
                                $m7= date("M", $todayx); $d7=($d6+1); $mm7= date("m", $todayx); $d77= date('l', strtotime('+1 day', $todayx));
                            }
                            if($d6==$lastdate){
                                $todayx=strtotime('+6 day', $todayx);
                                $y= date("Y", $todayx);
                                $m7= date("M", $todayx); $d7=date("d", $todayx); $mm7= date("m", $todayx); $d77= date("l", $todayx);
                            }
                            
                            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                            
                            if($d2<=9 and $d2!="01") $d222="0$d2"; else $d222=$d2;
                            if($d3<=9 and $d3!="01") $d333="0$d3"; else $d333=$d3;
                            if($d4<=9 and $d4!="01") $d444="0$d4"; else $d444=$d4;
                            if($d5<=9 and $d5!="01") $d555="0$d5"; else $d555=$d5;
                            if($d6<=9 and $d6!="01") $d666="0$d6"; else $d666=$d6;
                            if($d7<=9 and $d7!="01") $d777="0$d7"; else $d777=$d7;
                            
                            $tdate=date("l", strtotime('now'));
                            if($tdate=="$d11") $bgcolor1=""; else $bgcolor1="";
                            if($tdate=="$d22") $bgcolor2=""; else $bgcolor2="";
                            if($tdate=="$d33") $bgcolor3=""; else $bgcolor3="";
                            if($tdate=="$d44") $bgcolor4=""; else $bgcolor4="";
                            if($tdate=="$d55") $bgcolor5=""; else $bgcolor5="";
                            if($tdate=="$d66") $bgcolor6=""; else $bgcolor6="";
                            if($tdate=="$d77") $bgcolor7=""; else $bgcolor7="";
                                
                            if($d1<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d11 $d1<br>$m1, $y</th>";
                            if($d2<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d22 $d222<br>$m2, $y</th>";
                            if($d3<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d33 $d333<br>$m3, $y</th>";
                            if($d4<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d44 $d444<br>$m4, $y</th>";
                            if($d5<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d55 $d555<br>$m5, $y</th>";
                            if($d6<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d66 $d666<br>$m6, $y</th>";
                            if($d7<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d77 $d777<br>$m7, $y</th>";
                            echo"<th style='width:10px'>&nbsp;</th>
                        </tr>
                        <tbody id='datatableX'>";
                        
                            if($src_employeeid=="ALL") $ra7 = "select * from uerp_user where status='1' and mtype='CLIENT' order by username asc";
                            else if($src_employeeid=="") $ra7 = "select * from uerp_user where status='1' and mtype='CLIENT' order by username asc";
                            else $ra7 = "select * from uerp_user where id='$src_employeeid' and status='1' and mtype='CLIENT' order by username asc";
                            $rb7 = $conn->query($ra7);
                            if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                
                                echo"<tr>
                                    <td nowrap><center>";
                                            $simage=null;
                                            $simage=$rab7["images"];
                                            if(strlen("$simage")>=3){
                                                if (!file_exists($simage) || empty($simage)) {
                                                    echo"<img alt='profile' src='assets/noimage.png' style='border:1px solid #ccc;border-radius:5px;width:50px;' title='".$rab7["username"]."'/>";
                                                } else echo"<img alt='profile' src='$simage' style='border:1px solid #ccc;border-radius:5px;width:50px;' title='".$rab7["username"]."'/>";
                                            } else echo"<img alt='profile' src='assets/noimage.png' style='border:1px solid #ccc;border-radius:5px;width:50px;' title='".$rab7["username"]."'/>";
                                            
                                        echo"<br><span style='font-size:8pt'>".$rab7["username"]." ".$rab7["username2"]."<br><a href='tel:".$rab7["phone"]."'>".$rab7["phone"]."</span></a>
                                    </td>";
                                
                                    if($d1<=$lastdate){
                                        $empid=$rab7["id"];
                                        $empuid=$rab7["unbox"];
                                        $datatarget="$empid$y-$mm1-$d1";
                                        $datatarget11="$empuid$d1$y";
                                        $getData="getData$d1";
                                    
                                        $lts=0;
                                        $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d1' and month='$mm1' and year='$y' and status='1' order by id asc limit 1";
                                        $lt2 = $conn->query($lt1);
                                        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                        if($lts==1){
                                            echo"<td valign=top class='btn-outline-warning' style='vertical-align:top;padding:5px;background-color:#F7C6C5;font-size:7pt'><br>Not Available
                                                <hr><a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid3=".$rab7["id"]."' class='btn-active btn btn-xs'>Set Available</a>
                                            </td>";
                                        }else{
                                            echo"<td valign=top style='vertical-align:top;padding:0px;background-color:$bgcolor1'>
                                                <div style='width:100%;text-align:right;padding:0px'>
                                                    <form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                        <input type=hidden name='reidx' value='".$rab7["id"]."'>
                                                        <input type=hidden name='rdx' value='$d1'>
                                                        <input type=hidden name='rmx' value='$mm1'>
                                                        <input type=hidden name='ryx' value='$y'>
                                                        <input type=hidden name='rdt' value='$datatarget'>
                                                        <input type=hidden name='rgd' value='$getData'>
                                                        <button type='submit' class='btn btn-outline-primary btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                                                            onmouseover=\"this.form.submit(); shiftdataV2('schedule-allocation-selector-jobs.php?days=$d1&months=$mm1&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                                                            shiftdataV2('schedule-track-jobs.php?days=$d1&months=$mm1&rdt=$datatarget&years=$y&empid=".$rab7["id"]."', '$datatarget')\" style='padding:3px;height:17px;width:18px'>
                                                            <i class='fa-solid fa-plus' style='font-size:8pt'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                
                                                <div id='$datatarget' style='padding:0px'>";
                                                    $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d1' and months='$mm1' and years='$y' and status='1' order by stime asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $employeename="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"].""; } }
                                                        $projectname="";
                                                        $pstatus=0;
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                                            $projectname=$r2z["name"];
                                                            $pstatus=1;
                                                        } }
                                                        
                                                        $stimeA1="";
                                                        $etimeA1="";
                                                        $stimeA=strtotime($r5c["stime"]);
                                                        $etimeA=strtotime($r5c["etime"]);
                                                        $stimeA1=date("h:i A", $stimeA);
                                                        $etimeA1=date("h:i A", $etimeA);
                                                                    
                                                        $statuscolor="black";
                                                        if($r5c["accepted"]=="0") $statuscolor="grey";
                                                        if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                                                        if($r5c["accepted"]=="2") $statuscolor="orange";
                                                        if($r5c["accepted"]=="3") $statuscolor="yellow";
                                                        if($pstatus!=0){
                                                            if($r5c["night"]==1) $nightcolor="black";
                                                            else $nightcolor="lightblue";
                                                            echo"<div style='padding:5px;width:100%'><a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$d1&months=$mm1&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover2')\" draggable='true' ondragstart='drag(event)' style='background-color:".$r5c["color"].";padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                                                                <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                                                                <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                                                                <span style='font-size:8pt;color:white'>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                                                            </a></div>";
                                                        }
                                                    } }
                                                echo"</div>
                                            </td>"; ?>
                                            <script type="text/javascript">
                                                function <?php echo"$getData"; ?>(employeeid1,<?php echo"$datatarget11"; ?>){
                                                    $.ajax({
                                                        url: 'schedule-track-jobs.php?<?php echo"days=$d1&months=$mm1&years=$y&" ?>empid='+employeeid1, 
                                                        success: function(html) {
                                                            var ajaxDisplay = document.getElementById(<?php echo"$datatarget11"; ?>);
                                                            ajaxDisplay.innerHTML = html;
                                                        }
                                                    });
                                                }
                                            </script> <?php
                                        }
                                    }
                                    
                                    if($d2<=$lastdate){
                                        $empid=$rab7["id"];
                                        $empuid=$rab7["unbox"];
                                        $datatarget="$empid$y-$mm2-$d222";
                                        $datatarget2="$empuid$d222$y";
                                        $getData="getData$d222";
                                                
                                        $lts=0;
                                        $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d222' and month='$mm2' and year='$y' and status='1' order by id asc limit 1";
                                        $lt2 = $conn->query($lt1);
                                        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                        if($lts==1){
                                            echo"<td valign=top class='btn-outline-warning' style='vertical-align:top;padding:5px;background-color:#F7C6C5;font-size:7pt'><br>Not Available
                                                <hr><a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empid3=".$rab7["id"]."' class='btn-active btn btn-xs'>Set Available</a>
                                            </td>";
                                        }else{
                                            
                                            echo"<td valign=top style='vertical-align:top;padding:0px;background-color:$bgcolor2;'>
                                                <div style='width:100%;text-align:right;padding:0px'>
                                                    <form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                        <input type=hidden name='reidx' value='".$rab7["id"]."'>
                                                        <input type=hidden name='rdx' value='$d222'>
                                                        <input type=hidden name='rmx' value='$mm2'>
                                                        <input type=hidden name='ryx' value='$y'>
                                                        <input type=hidden name='rdt' value='$datatarget'>
                                                        <input type=hidden name='rgd' value='$getData'>
                                                        <button type='submit' class='btn btn-outline-primary btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                                                            onmouseover=\"this.form.submit(); shiftdataV2('schedule-allocation-selector-jobs.php?days=$d222&months=$mm2&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                                                            shiftdataV2('schedule-track-jobs.php?days=$d222&months=$mm2&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', '$datatarget')\" style='padding:3px;height:17px;width:18px'>
                                                            <i class='fa-solid fa-plus' style='font-size:8pt'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div id='$datatarget' style='padding:0px'>";
                                                    $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d222' and months='$mm2' and years='$y' and status='1' order by sdate asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $employeename="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"].""; } }
                                                        $projectname="";
                                                        $pstatus=0;
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                                            $projectname=$r2z["name"];
                                                            $pstatus=1;
                                                        } }
                                                        
                                                        $stimeA1="";
                                                        $etimeA1="";
                                                        $stimeA=strtotime($r5c["stime"]);
                                                        $etimeA=strtotime($r5c["etime"]);
                                                        $stimeA1=date("h:i A", $stimeA);
                                                        $etimeA1=date("h:i A", $etimeA);
                                                                
                                                        $statuscolor="black";
                                                        if($r5c["accepted"]=="0") $statuscolor="grey";
                                                        if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                                                        if($r5c["accepted"]=="2") $statuscolor="orange";
                                                        if($r5c["accepted"]=="3") $statuscolor="yellow";
                                                        if($pstatus!=0){
                                                            if($r5c["night"]==1) $nightcolor="black";
                                                            else $nightcolor="lightblue";
                                                            echo"<div style='padding:5px;width:100%'><a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$d222&months=$mm2&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover2')\" draggable='true' ondragstart='drag(event)' style='background-color:".$r5c["color"].";padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                                                                <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                                                                <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                                                                <span style='font-size:8pt;color:white'>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                                                            </a></div>";
                                                        }
                                                    } }
                                                echo"</div>
                                            </td>"; ?>
                                            <script type="text/javascript">
                                                function  <?php echo"$getData"; ?>(employeeid2,<?php echo"$datatarget2"; ?>){
                                                    $.ajax({
                                                        url: 'schedule-track-jobs.php?<?php echo"days=$d222&months=$mm2&years=$y&" ?>empid='+employeeid2, 
                                                        success: function(html) {
                                                            var ajaxDisplay = document.getElementById(<?php echo"$datatarget2"; ?>);
                                                            ajaxDisplay.innerHTML = html;
                                                        }
                                                    });
                                                }
                                            </script> <?php
                                        }
                                    }
                                    
                                    if($d3<=$lastdate){
                                        $empid=$rab7["id"];
                                        $empuid=$rab7["unbox"];
                                        $datatarget="$empid$y-$mm3-$d333";
                                        $datatarget2="$empuid$d333$y";
                                        $getData="getData$d333";
                                                
                                        $lts=0;
                                        $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d333' and month='$mm3' and year='$y' and status='1' order by id asc limit 1";
                                        $lt2 = $conn->query($lt1);
                                        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                        if($lts==1){
                                            echo"<td valign=top class='btn-outline-warning' style='vertical-align:top;padding:5px;background-color:#F7C6C5;font-size:7pt'><br>Not Available 1
                                                <hr><a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empid3=".$rab7["id"]."' class='btn-active btn btn-xs'>Set Available</a>
                                            </td>";
                                        }else{
                                            echo"<td valign=top style='vertical-align:top;padding:0px;background-color:$bgcolor3;'>
                                                <div style='width:100%;text-align:right;padding:0px'>
                                                    <form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                        <input type=hidden name='reidx' value='".$rab7["id"]."'>
                                                        <input type=hidden name='rdx' value='$d333'>
                                                        <input type=hidden name='rmx' value='$mm3'>
                                                        <input type=hidden name='ryx' value='$y'>
                                                        <input type=hidden name='rdt' value='$datatarget'>
                                                        <input type=hidden name='rgd' value='$getData'>
                                                        <button type='submit' class='btn btn-outline-primary btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                                                            onmouseover=\"this.form.submit(); shiftdataV2('schedule-allocation-selector-jobs.php?days=$d333&months=$mm3&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                                                            shiftdataV2('schedule-track-jobs.php?days=$d333&months=$mm3&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', '$datatarget')\" style='padding:3px;height:17px;width:18px'>
                                                            <i class='fa-solid fa-plus' style='font-size:8pt'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div id='$datatarget' style='padding:0px'>";
                                                    $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d333' and months='$mm3' and years='$y' and status='1' order by sdate asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $employeename="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"].""; } }
                                                        $projectname="";
                                                        $pstatus=0;
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                                            $projectname=$r2z["name"];
                                                            $pstatus=1;
                                                        } }
                                                        
                                                        $stimeA1="";
                                                        $etimeA1="";
                                                        $stimeA=strtotime($r5c["stime"]);
                                                        $etimeA=strtotime($r5c["etime"]);
                                                        $stimeA1=date("h:i A", $stimeA);
                                                        $etimeA1=date("h:i A", $etimeA);
                                                        
                                                        $statuscolor="black";
                                                        if($r5c["accepted"]=="0") $statuscolor="grey";
                                                        if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                                                        if($r5c["accepted"]=="2") $statuscolor="orange";
                                                        if($r5c["accepted"]=="3") $statuscolor="yellow";
                                                        if($pstatus!=0){
                                                            if($r5c["night"]==1) $nightcolor="black";
                                                            else $nightcolor="lightblue";
                                                            echo"<div style='padding:5px;width:100%'><a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$d333&months=$mm3&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover2')\" draggable='true' ondragstart='drag(event)' style='background-color:".$r5c["color"].";padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                                                                <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                                                                <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                                                                <span style='font-size:8pt;color:white'>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                                                            </a></div>";
                                                        }
                                                    } }
                                                echo"</div>
                                            </td>"; ?>
                                            <script type="text/javascript">
                                                function  <?php echo"$getData"; ?>(employeeid3,<?php echo"$datatarget2"; ?>){
                                                    $.ajax({
                                                        url: 'schedule-track-jobs.php?<?php echo"days=$d333&months=$mm3&years=$y&" ?>empid='+employeeid3, 
                                                        success: function(html) {
                                                            var ajaxDisplay = document.getElementById(<?php echo"$datatarget2"; ?>);
                                                            ajaxDisplay.innerHTML = html;
                                                        }
                                                    });
                                                }
                                            </script> <?php
                                        }
                                    }

                                    if($d4<=$lastdate){
                                        $empid=$rab7["id"];
                                        $empuid=$rab7["unbox"];
                                        $datatarget="$empid$y-$mm4-$d444";
                                        $datatarget2="$empuid$d444$y";
                                        $getData="getData$d444";
                                        $lts=0;
                                        $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d444' and month='$mm4' and year='$y' and status='1' order by id asc limit 1";
                                        $lt2 = $conn->query($lt1);
                                        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                        if($lts==1){
                                            echo"<td valign=top class='btn-outline-warning' style='vertical-align:top;padding:5px;background-color:#F7C6C5;font-size:7pt'><br>Not Available
                                                <hr><a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empid3=".$rab7["id"]."' class='btn-active btn btn-xs'>Set Available</a>
                                            </td>";
                                        }else{
                                            echo"<td valign=top style='vertical-align:top;padding:0px;background-color:$bgcolor4;'>
                                                <div style='width:100%;text-align:right;padding:0px'>
                                                    <form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                        <input type=hidden name='reidx' value='".$rab7["id"]."'>
                                                        <input type=hidden name='rdx' value='$d444'>
                                                        <input type=hidden name='rmx' value='$mm4'>
                                                        <input type=hidden name='ryx' value='$y'>
                                                        <input type=hidden name='rdt' value='$datatarget'>
                                                        <input type=hidden name='rgd' value='$getData'>
                                                        <button type='submit' class='btn btn-outline-primary btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                                                            onmouseover=\"this.form.submit(); shiftdataV2('schedule-allocation-selector-jobs.php?days=$d444&months=$mm4&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                                                            shiftdataV2('schedule-track-jobs.php?days=$d444&months=$mm4&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', '$datatarget')\" style='padding:3px;height:17px;width:18px'>
                                                            <i class='fa-solid fa-plus' style='font-size:8pt'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div id='$datatarget' style='padding:0px'>";
                                                    $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d444' and months='$mm4' and years='$y' and status='1' order by sdate asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $employeename="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"].""; } }
                                                        $projectname="";
                                                        $pstatus=0;
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                                            $projectname=$r2z["name"];
                                                            $pstatus=1;
                                                        } }
                                                        
                                                        $stimeA1="";
                                                        $etimeA1="";
                                                        $stimeA=strtotime($r5c["stime"]);
                                                        $etimeA=strtotime($r5c["etime"]);
                                                        $stimeA1=date("h:i A", $stimeA);
                                                        $etimeA1=date("h:i A", $etimeA);
                                                                
                                                        $statuscolor="black";
                                                        if($r5c["accepted"]=="0") $statuscolor="grey";
                                                        if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                                                        if($r5c["accepted"]=="2") $statuscolor="orange";
                                                        if($r5c["accepted"]=="3") $statuscolor="yellow";
                                                        if($pstatus!=0){
                                                            if($r5c["night"]==1) $nightcolor="black";
                                                            else $nightcolor="lightblue";
                                                            echo"<div style='padding:5px;width:100%'><a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$d444&months=$mm4&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover2')\" draggable='true' ondragstart='drag(event)' style='background-color:".$r5c["color"].";padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                                                                <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                                                                <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                                                                <span style='font-size:8pt;color:white'>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                                                            </a></div>";
                                                        }
                                                    } }
                                                echo"</div>
                                            </td>"; ?>
                                            <script type="text/javascript">
                                                function  <?php echo"$getData"; ?>(employeeid4,<?php echo"$datatarget2"; ?>){
                                                    $.ajax({
                                                        url: 'schedule-track-jobs.php?<?php echo"days=$d444&months=$mm4&years=$y&" ?>empid='+employeeid4, 
                                                        success: function(html) {
                                                            var ajaxDisplay = document.getElementById(<?php echo"$datatarget2"; ?>);
                                                            ajaxDisplay.innerHTML = html;
                                                        }
                                                    });
                                                }
                                            </script> <?php
                                        }
                                    }
                                    
                                    if($d5<=$lastdate){
                                        $empid=$rab7["id"];
                                        $empuid=$rab7["unbox"];
                                        $datatarget="$empid$y-$mm5-$d555";
                                        $datatarget2="$empuid$d555$y";
                                        $getData="getData$d555";
                                                
                                        $lts=0;
                                        $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d555' and month='$mm5' and year='$y' and status='1' order by id asc limit 1";
                                        $lt2 = $conn->query($lt1);
                                        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                        if($lts==1){
                                            echo"<td valign=top class='btn-outline-warning' style='vertical-align:top;padding:5px;background-color:#F7C6C5;font-size:7pt'><br>Not Available
                                                <hr><a href='scheduling-set.php?dd=$d555&mm=$mm5&yy=$y&empid3=".$rab7["id"]."' class='btn-active btn btn-xs'>Set Available</a>
                                            </td>";
                                        }else{
                                            echo"<td valign=top style='vertical-align:top;padding:0px;background-color:$bgcolor5;'>
                                                <div style='width:100%;text-align:right;padding:0px'>
                                                    <form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                        <input type=hidden name='reidx' value='".$rab7["id"]."'>
                                                        <input type=hidden name='rdx' value='$d555'>
                                                        <input type=hidden name='rmx' value='$mm5'>
                                                        <input type=hidden name='ryx' value='$y'>
                                                        <input type=hidden name='rdt' value='$datatarget'>
                                                        <input type=hidden name='rgd' value='$getData'>
                                                        <button type='submit' class='btn btn-outline-primary btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                                                            onmouseover=\"this.form.submit(); shiftdataV2('schedule-allocation-selector-jobs.php?days=$d555&months=$mm5&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                                                            shiftdataV2('schedule-track-jobs.php?days=$d555&months=$mm5&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', '$datatarget')\" style='padding:3px;height:17px;width:18px'>
                                                            <i class='fa-solid fa-plus' style='font-size:8pt'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div id='$datatarget' style='padding:0px'>";
                                                    $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d555' and months='$mm5' and years='$y' and status='1' order by sdate asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $employeename="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"].""; } }
                                                        $projectname="";
                                                        $pstatus=0;
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                                            $projectname=$r2z["name"];
                                                            $pstatus=1;
                                                        } }
                                                                
                                                        $stimeA1="";
                                                        $etimeA1="";
                                                        $stimeA=strtotime($r5c["stime"]);
                                                        $etimeA=strtotime($r5c["etime"]);
                                                        $stimeA1=date("h:i A", $stimeA);
                                                        $etimeA1=date("h:i A", $etimeA);
        
                                                        $statuscolor="black";
                                                        if($r5c["accepted"]=="0") $statuscolor="grey";
                                                        if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                                                        if($r5c["accepted"]=="2") $statuscolor="orange";
                                                        if($r5c["accepted"]=="3") $statuscolor="yellow";
                                                        if($pstatus!=0){
                                                            if($r5c["night"]==1) $nightcolor="black";
                                                            else $nightcolor="lightblue";
                                                            echo"<div style='padding:5px;width:100%'><a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$d555&months=$mm5&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover2')\" draggable='true' ondragstart='drag(event)' style='background-color:".$r5c["color"].";padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                                                                <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                                                                <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                                                                <span style='font-size:8pt;color:white'>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                                                            </a></div>";
                                                        }
                                                    } }
                                                echo"</div>
                                            </td>"; ?>
                                            <script type="text/javascript">
                                                function  <?php echo"$getData"; ?>(employeeid5,<?php echo"$datatarget2"; ?>){
                                                    $.ajax({
                                                        url: 'schedule-track-jobs.php?<?php echo"days=$d555&months=$mm5&years=$y&" ?>empid='+employeeid5, 
                                                        success: function(html) {
                                                            var ajaxDisplay = document.getElementById(<?php echo"$datatarget2"; ?>);
                                                            ajaxDisplay.innerHTML = html;
                                                        }
                                                    });
                                                }
                                            </script> <?php
                                        }
                                    }
                                    
                                  
                                    if($d6<=$lastdate){
                                        $empid=$rab7["id"];
                                        $empuid=$rab7["unbox"];
                                        $datatarget="$empid$y-$mm6-$d666";
                                        $datatarget2="$empuid$d666$y";
                                        $getData="getData$d666";
                                                
                                        $lts=0;
                                        $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d666' and month='$mm6' and year='$y' and status='1' order by id asc limit 1";
                                        $lt2 = $conn->query($lt1);
                                        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                        if($lts==1){
                                            echo"<td valign=top class='btn-outline-warning' style='vertical-align:top;padding:5px;background-color:#F7C6C5;font-size:7pt'><br>Not Available
                                                <hr><a href='scheduling-set.php?dd=$d666&mm=$mm6&yy=$y&empid3=".$rab7["id"]."' class='btn-active btn btn-xs'>Set Available</a>
                                            </td>";
                                        }else{
                                            echo"<td valign=top style='vertical-align:top;padding:0px;background-color:$bgcolor6;'>
                                                <div style='width:100%;text-align:right;padding:0px'>
                                                    <form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                        <input type=hidden name='reidx' value='".$rab7["id"]."'>
                                                        <input type=hidden name='rdx' value='$d666'>
                                                        <input type=hidden name='rmx' value='$mm6'>
                                                        <input type=hidden name='ryx' value='$y'>
                                                        <input type=hidden name='rdt' value='$datatarget'>
                                                        <input type=hidden name='rgd' value='$getData'>
                                                        <button type='submit' class='btn btn-outline-primary btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                                                            onmouseover=\"this.form.submit(); shiftdataV2('schedule-allocation-selector-jobs.php?days=$d666&months=$mm6&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                                                            shiftdataV2('schedule-track-jobs.php?days=$d666&months=$mm6&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', '$datatarget')\" style='padding:3px;height:17px;width:18px'>
                                                            <i class='fa-solid fa-plus' style='font-size:8pt'></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div id='$datatarget' style='padding:0px'>";
                                                    $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d666' and months='$mm6' and years='$y' and status='1' order by sdate asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $employeename="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"].""; } }
                                                        $projectname="";
                                                        $pstatus=0;
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                                            $projectname=$r2z["name"];
                                                            $pstatus=1;
                                                        } }
                                                                
                                                        $stimeA1="";
                                                        $etimeA1="";
                                                        $stimeA=strtotime($r5c["stime"]);
                                                        $etimeA=strtotime($r5c["etime"]);
                                                        $stimeA1=date("h:i A", $stimeA);
                                                        $etimeA1=date("h:i A", $etimeA);
                                                                
                                                        $statuscolor="black";
                                                        if($r5c["accepted"]=="0") $statuscolor="grey";
                                                        if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                                                        if($r5c["accepted"]=="2") $statuscolor="orange";
                                                        if($r5c["accepted"]=="3") $statuscolor="yellow";
                                                        if($pstatus!=0){
                                                            if($r5c["night"]==1) $nightcolor="black";
                                                            else $nightcolor="lightblue";
                                                            echo"<div style='padding:5px;width:100%'><a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$d666&months=$mm6&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover2')\" draggable='true' ondragstart='drag(event)' style='background-color:".$r5c["color"].";padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                                                                <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                                                                <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                                                                <span style='font-size:8pt;color:white'>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                                                            </a></div>";
                                                        }
                                                    } }
                                                echo"</div>
                                            </td>"; ?>
                                            <script type="text/javascript">
                                                function  <?php echo"$getData"; ?>(employeeid6,<?php echo"$datatarget2"; ?>){
                                                    $.ajax({
                                                        url: 'schedule-track-jobs.php?<?php echo"days=$d666&months=$mm6&years=$y&" ?>empid='+employeeid6, 
                                                        success: function(html) {
                                                            var ajaxDisplay = document.getElementById(<?php echo"$datatarget2"; ?>);
                                                            ajaxDisplay.innerHTML = html;
                                                        }
                                                    });
                                                }
                                            </script> <?php
                                        }
                                    }
                                    
                                    // echo"<td style='border-left: 1px solid #333333'>7</td>";  
                                    
                                    if($d7<=$lastdate){
                                        $empid=$rab7["id"];
                                        $empuid=$rab7["unbox"];
                                        $datatarget="$empid$y-$mm7-$d777";
                                        $datatarget2="$empuid$d777$y";
                                        $getData="getData$d777";
                                                
                                        $lts=0;
                                        $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d777' and month='$mm7' and year='$y' and status='1' order by id asc limit 1";
                                        $lt2 = $conn->query($lt1);
                                        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                        if($lts==1){
                                            echo"<td valign=top class='btn-outline-warning' style='vertical-align:top;padding:5px;background-color:#F7C6C5;font-size:7pt'><br>Not Available
                                                <hr><a href='scheduling-set.php?dd=$d777&mm=$mm7&yy=$y&empid3=".$rab7["id"]."' class='btn-active btn btn-xs'>Set Available</a>
                                            </td>";
                                        }else{
                                            echo"<td valign=top style='vertical-align:top;padding:0px;background-color:$bgcolor7;'>
                                                <div style='width:100%;text-align:right;padding:0px'>
                                                    <form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                                        <input type=hidden name='reidx' value='".$rab7["id"]."'>
                                                        <input type=hidden name='rdx' value='$d777'>
                                                        <input type=hidden name='rmx' value='$mm7'>
                                                        <input type=hidden name='ryx' value='$y'>
                                                        <input type=hidden name='rdt' value='$datatarget'>
                                                        <input type=hidden name='rgd' value='$getData'>
                                                        <button type='submit' class='btn btn-outline-primary btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                                                            onmouseover=\"this.form.submit(); shiftdataV2('schedule-allocation-selector-jobs.php?days=$d777&months=$mm7&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                                                            shiftdataV2('schedule-track-jobs.php?days=$d777&months=$mm7&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', '$datatarget')\" style='padding:3px;height:17px;width:18px'>
                                                            <i class='fa-solid fa-plus' style='font-size:8pt'></i>
                                                        </button>
                                                        </form>
                                                </div><div id='$datatarget' style='padding:0px'>";
                                                    $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d777' and months='$mm7' and years='$y' and status='1' order by sdate asc";
                                                    $r5b = $conn->query($r5a);
                                                    if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                                                        $employeename="";
                                                        $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                                                        $r1y = $conn->query($r1x);
                                                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"].""; } }
                                                        $projectname="";
                                                        $pstatus=0;
                                                        $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                                                        $r2y = $conn->query($r2x);
                                                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                                            $projectname=$r2z["name"];
                                                            $pstatus=1;
                                                        } }
                                                                
                                                        $stimeA1="";
                                                        $etimeA1="";
                                                        $stimeA=strtotime($r5c["stime"]);
                                                        $etimeA=strtotime($r5c["etime"]);
                                                        $stimeA1=date("h:i A", $stimeA);
                                                        $etimeA1=date("h:i A", $etimeA);
                                                                
                                                        $statuscolor="black";
                                                        if($r5c["accepted"]=="0") $statuscolor="grey";
                                                        if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                                                        if($r5c["accepted"]=="2") $statuscolor="orange";
                                                        if($r5c["accepted"]=="3") $statuscolor="yellow";
                                                        if($pstatus!=0){
                                                            if($r5c["night"]==1) $nightcolor="black";
                                                            else $nightcolor="lightblue";
                                                            echo"<div style='padding:5px;width:100%'><a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$d777&months=$mm7&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover2')\" draggable='true' ondragstart='drag(event)' style='background-color:".$r5c["color"].";padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                                                                <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                                                                <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                                                                <span style='font-size:8pt;color:white'>$stimeA1 - $etimeA1</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                                                            </a></div>";
                                                        }
                                                    } }
                                                echo"</div>
                                            </td>"; ?>
                                            <script type="text/javascript">
                                                function  <?php echo"$getData"; ?>(employeeid7,<?php echo"$datatarget2"; ?>){
                                                    $.ajax({
                                                        url: 'schedule-track-jobs.php?<?php echo"days=$d777&months=$mm7&years=$y&" ?>empid='+employeeid7, 
                                                        success: function(html) {
                                                            var ajaxDisplay = document.getElementById(<?php echo"$datatarget2"; ?>);
                                                            ajaxDisplay.innerHTML = html;
                                                        }
                                                    });
                                                }
                                            </script> <?php
                                        }
                                    }
                                       
                                echo"</tr>";
                            } }
                        
                        echo"</tbody>
                    </table>
                </div>";
            
                echo"</div>";
        
            // REQUESTS 
            /*
            echo"<div class='modal fade modal-close-out' id='buttonrequest' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Re-Schedule Requests</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body' style='padding:5px'>
                            <div style='width:100%' id='datarequestX'>
                                <table class='table stripe table-hover' style='width:100%;padding:10px'>
                                    <thead><tr>
                                        <th nowrap style='font-size:8pt'>Client Name</th>
                                        <th nowrap style='font-size:8pt'>Employee</th>
                                        <th nowrap style='font-size:8pt'>Assigned</th>
                                        <th nowrap style='font-size:8pt' colspan=2>Req. Time</th>
                                    </tr></thead>
                                    <tbody>";
                                    $ttx==0;
                                    $r1 = "select * from shifting_allocation where request2='1' order by id desc";
                                    $r1x = $conn->query($r1);
                                    if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                        
                                        $projectname="";
                                        $pstatus=0;
                                        $r1a = "select * from project where id='".$r1y['projectid']."' and status='1' order by id asc limit 1";
                                        $r1b = $conn->query($r1a);
                                        if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                            $projectname=$r1c["name"];
                                            $pstatus=1;
                                        } }
                                        if($pstatus!=0){
                                            $clientname="";
                                            $r1ax = "select * from uerp_user where id='".$r1y['clientid']."' order by id asc limit 1";
                                            $r1bx = $conn->query($r1ax);
                                            if ($r1bx->num_rows > 0) { while($r1cx = $r1bx -> fetch_assoc()) { $clientname="".$r1cx["username"]." ".$r1cx["username2"].""; } }
                                            
                                            $employeename="";
                                            $r1ay = "select * from uerp_user where id='".$r1y['employeeid']."' order by id asc limit 1";
                                            $r1by = $conn->query($r1ay);
                                            if ($r1by->num_rows > 0) { while($r1cy = $r1by -> fetch_assoc()) {
                                                $employeename="".$r1cy["username"]." ".$r1cy["username2"]."";
                                                $employeephone=$r1cy["phone"];
                                            } }
                                            
                                            $stimeA1="";
                                            $etimeA1="";
                                            $stimeA=strtotime($r1y["stime"]);
                                            $etimeA=strtotime($r1y["etime"]);
                                            $stimeA1=date("h:i A", $stimeA);
                                            $etimeA1=date("h:i A", $etimeA);
                                            
                                            $stimeR1="";
                                            $etimeR1="";
                                            $stimeR=strtotime($r1y["stime2"]);
                                            $etimeR=strtotime($r1y["etime2"]);
                                            $stimeR1=date("h:i A", $stimeR);
                                            $etimeR1=date("h:i A", $etimeR);
                                            
                                            $ttx=($ttx+1);
                                            echo"<tr class='gradeX'>
                                                <td nowrap style='font-size:8pt'>$clientname<br>@ $projectname</td>
                                                <td nowrap style='font-size:8pt'>$employeename<br><a href='tel:$employeephone'>$employeephone</a></td>
                                                <td nowrap style='font-size:8pt'><i class='fa fa-clock-o' style='color:black'></i> $stimeA1<br><i class='fa fa-clock-o' style='color:black'></i> $etimeA1</td>
                                                <td nowrap style='font-size:8pt'><b><i class='fa fa-clock-o' style='color:black'></i> $stimeR1<br><i class='fa fa-clock-o' style='color:black'></i> $etimeR1</b></td>
                                                <td style='width:70px;font-size:8pt'>".$r1y["days"]."-".$r1y["months"]."-".$r1y["years"]."<br>
                                                    <div class='btn-group' onmouseout=\"requestdata('100000', 'datarequestX')\">
                                                        <a href='updaterecord.php?rid=".$r1y["id"]."&approval=1' target='dataprocessor' style='margin-top:0px;' title='Accept'>
                                                            <i class='fa fa-thumbs-up' style='color:blue;font-size:10pt'></i>
                                                        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a href='updaterecord.php?rid=".$r1y["id"]."&approval=0' target='dataprocessor' style='margin-top:0px;' title='Reject'>
                                                            <i class='fa fa-thumbs-down' style='color:red;font-size:10pt'></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>";
                                        }
                                    } }
                                echo"</tbody></table>
                            
                            </div>";
                            ?><script type="text/javascript">
                                function requestdata(shiftid1,shiftid2){
                                    $.ajax({
                                        url: 'request-list.php?<?php echo"days=$d1&months=$mm1&years=$y&" ?>sid='+shiftid1, 
                                        success: function(html) {
                                            var ajaxDisplay = document.getElementById(shiftid2);
                                            ajaxDisplay.innerHTML = html;
                                        }
                                    });
                                }
                            </script> <?php
                        echo"</div>
                    </div>
                </div>
            </div>";
            */
            // EMAIL
            echo"<div class='modal fade modal-close-out' id='buttonemail' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Email Notification</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <form class='m-t' role='form' method='post' action='email_sender.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='sendemail'>
                                <div class='modal-body'>
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <div class='form-group'>
                                                <label>Employee/Client *</label>
                                                <select class='form-control m-b ' name='receiverid' required>
                                                    <option value=''>Select Employee/Client</option>";
                                                    $rz111 = "select * from uerp_user where mtype='USER' and status='1' order by username asc";
                                                    $rz11 = $conn->query($rz111);
                                                    if ($rz11->num_rows > 0) { while($rz1 = $rz11->fetch_assoc()) { echo"<option value='".$rz1["id"]."'>".$rz1["username"]." ".$rz1["username2"]."</option>"; } }
                                                    echo"<option value=''><hr></option>";
                                                    $rz222 = "select * from uerp_user where mtype='CLIENT' and status='1' order by username asc";
                                                    $rz22 = $conn->query($rz222);
                                                    if ($rz22->num_rows > 0) { while($rz2 = $rz22->fetch_assoc()) { echo"<option value='".$rz2["id"]."'>".$rz2["username"]." ".$rz2["username2"]."</option>"; } }
                                                    
                                                    $timex=time();
                                                echo"</select>
                                            </div>
                                        </div>
                                        <div class='col-md-12'><div class='form-group'><br><br>
                                            <label for='start_datetime' class='control-label'>Subject</label>
                                            <input type='text' class='form-control form-control-sm rounded-0' name='subject' value='' required>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'><br><br>
                                            <label for='start_datetime' class='control-label'>Messasge</label>
                                            <textarea id='summernote' name='message' col=20 class='form-control'></textarea>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group' style='text-align:right'><br><br>
                                            <label for='end_datetime' class='control-label'>&nbsp;</label>
                                            <input type='submit' class='btn btn-primary' value='Send Email'>
                                        </div></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
            
            // SHIFT
            echo"<div class='modal fade modal-close-out' id='ShiftModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Shift Template Create/Modify</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body' id='PopupModalX'>
                            <form method='POST' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='schedulelist'><input type='hidden' name='id' value=''>
                                <div class='row'>
                                    <div class='col-md-12' style='padding-bottom:20px'><div class='form-group'><label>Participant/Job *</label><select class='form-control m-b ' name='projectid' required>
                                        <option value=''>Select Project/Participant</option>";
                                        $ra7 = "select * from project where status='1' order by id asc";
                                        $rb7 = $conn->query($ra7);
                                        if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                            $clientname="";
                                            $clientcolor="";
                                            $ra8 = "select * from uerp_user where id='".$rab7["clientid"]."' order by id asc";
                                            $rb8 = $conn->query($ra8);
                                            if ($rb8->num_rows > 0) { while($rab8 = $rb8->fetch_assoc()) {
                                                $clientname1=$rab8["username"];
                                                $clientname2=$rab8["username2"];
                                                $clientname="$clientname1 $clientname2";
                                            }}
                                            echo"<option value='".$rab7["id"]."''>$clientname @ ".$rab7["name"]."</option>";
                                        } }
                                        $timex=time();
                                        $dd=date("d",$timex);
                                        $mm=date("m",$timex);
                                        $yy=date("Y",$timex);
                                    echo"</select></div></div>
                                    <div class='col-md-4'><div class='form-group'>
                                        <label for='start_datetime' class='control-label'>Clock-In Time</label>
                                        <input type='hidden' class='form-control form-control-sm rounded-0' name='sdate' value='$yy-$mm-$dd'>
                                        <input type='time' class='form-control form-control-sm rounded-0' name='stime' value='08:00' required>
                                    </div></div>
                                    <div class='col-md-4'><div class='form-group'>
                                        <label for='end_datetime' class='control-label'>Clock-Out Time</label>
                                        <input type='hidden' class='form-control form-control-sm rounded-0' name='edate' value='$yy-$mm-$dd'>
                                        <input type='time' class='form-control form-control-sm rounded-0' name='etime' value='17:00'  required>
                                    </div></div>
                                    <div class='col-md-2'><div class='form-group'>
                                        <label for='end_datetime' class='control-label'>Over Night?</label>
                                        <input type='checkbox' class='btn btn-primary' value='1' name='over_night'>
                                    </div></div>
                                    <div class='col-md-2'><div class='form-group'>
                                        <label for='end_datetime' class='control-label'>&nbsp;</label>
                                        <input type='submit' class='btn btn-primary' value='Save' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                    </div></div>                                
                                </div>
                            </form><br><br>
                        
                            <div style='width:100%' id='datashiftXX'>";
                                // <body onload='sortTable(0)'>
                                echo"<table class='table stripe table-hover' id='mySortTable' style='width:100%;padding:5px'>
                                    <thead><tr><th nowrap style='font-size:10pt' onclick='sortTable(0)'>Project/Client Name</th>
                                        <th nowrap style='font-size:10pt'>Clock-in/out</th>
                                        <th nowrap style='font-size:10pt'>O. Night</th>
                                        <th nowrap style='font-size:10pt'>Color</th>
                                        <th></th></tr>
                                    </thead>
                                    <tbody>";
                                        $ttx=0;
                                        $r1 = "select * from shifting_schedule order by id desc";
                                        $r1x = $conn->query($r1);
                                        if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                            $pstatus=0;
                                            $projectname="";
                                            $r1a = "select * from project where id='".$r1y['projectid']."' and status='1' order by id asc limit 1";
                                            $r1b = $conn->query($r1a);
                                            if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                                $projectname=$r1c["name"];
                                                $pstatus=1;
                                                $clientname="";
                                                $r1ax = "select * from uerp_user where id='".$r1c['clientid']."' order by id asc limit 1";
                                                $r1bx = $conn->query($r1ax);
                                                if ($r1bx->num_rows > 0) { while($r1cx = $r1bx -> fetch_assoc()) {
                                                    $clientname1=$r1cx["username"]; $clientname2=$r1cx["username2"]; $clientname="$clientname1 $clientname2";
                                                } }
                                                $projcolor=$r1c["color"];
                                            } }
                                            $ttx=($ttx+1);
                                            if($pstatus!=0){
                                                echo"<tr class='gradeX'>
                                                    <td style='font-size:10pt'>$clientname<br>$projectname</td>
                                                    <td nowrap style='font-size:10pt'>
                                                        <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                                            <input type='hidden' name='processor' value='shiftinglist'><input type='hidden' name='id' value='".$r1y["id"]."'>
                                                            <input type='time' name='stime' value='".$r1y['stime']."' onchange='this.form.submit()'><br>
                                                            <input type='time' name='etime' value='".$r1y['etime']."' onchange='this.form.submit()'>
                                                        </form>
                                                    </td>
                                                    <td nowrap style='font-size:10pt'>
                                                        <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                                            <input type='hidden' name='processor' value='shiftinglist1'><input type='hidden' name='id' value='".$r1y["id"]."'>";
                                                            if($r1y['night']==1) echo"<input type='checkbox' name='over_night' value='0' checked onchange='this.form.submit()'>";
                                                            else echo"<input type='checkbox' name='over_night' value='1' onchange='this.form.submit()'>";
                                                        echo"</form>
                                                    </td>
                                                    <td nowrap style='font-size:10pt'>
                                                        <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                                            <input type='hidden' name='processor' value='shiftinglist2'><input type='hidden' name='projectid' value='".$r1y['projectid']."'>
                                                            <input type='color' class='' name='pcolor' value='$projcolor' style='padding:0px;width:50px' onblur='this.form.submit()'>
                                                        </form>
                                                    </td>
                                                    <td style='width:20px' style='font-size:10pt'><div class='btn-group' onmouseout=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                                        <a href='deleterecords.php?delid=".$r1y["id"]."&tbl=shifting_schedule' target='dataprocessor' style='margin-top:0px'>
                                                            <i class='fa fa-trash'></i>
                                                        </a>
                                                    </div></td>
                                                </tr>";
                                            }
                                        } }
                                    echo"</tbody>
                                </table>
                            </div>"; ?>
                             <?php
                        echo"</div>
                    </div>
                </div>
            </div>
        </div>";


            // JOBS
            echo"<div class='modal inmodal cardt' id='jobsmodal' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content animated bounceInUp' style='text-align:left'>";
                        $ttx=0;
                        echo"<br><div style='width:95%'>
                            <table class='table stripe table-hover dataTables-jobs' style='width:100%;padding:0px'>
                                <thead><tr><th nowrap>Project & Participant</th><th nowrap>Support Co-ordinator</th><th>Theme</th></tr></thead><tbody>";
                                $r1 = "select * from project where status='1' order by id asc";
                                $r1x = $conn->query($r1);
                                if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                    $clientname="";
                                    $r1a = "select * from uerp_user where id='".$r1y["clientid"]."' order by id asc limit 1";
                                    $r1b = $conn->query($r1a);
                                    if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                        $clientname1=$r1c["username"];
                                        $clientname2=$r1c["username2"];
                                        $clientname="$clientname1 $clientname2";
                                    } }
                                    $leadername="";
                                    $r1a = "select * from uerp_user where id='".$r1y["leaderid"]."' order by id asc limit 1";
                                    $r1b = $conn->query($r1a);
                                    if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                        $leadername1=$r1c["username"];
                                        $leadername2=$r1c["username2"];
                                        $leadername="$leadername1 $leadername2";
                                    } }
                                    echo"<tr class='gradeX'>
                                        <td nowrap style='font-size:8pt'>".$r1y["name"]."<br>$clientname</td>
                                        <td style='font-size:8pt'>$leadername</td>
                                        <td align=center nowrap>";
                                            $ttx=($ttx+1);
                                            echo"<form class='m-t' name='form_$ttx' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                            				    <input type='hidden' name='processor' value='jobslist'><input type='hidden' name='projectid' value='".$r1y["id"]."'>
                            				    <input type='color' class='' name='pcolor' value='".$r1y["color"]."' style='padding:0px;width:80px' onblur='this.form.submit()'>";
                            				    // <button type='submit' class='form-control form-control-sm rounded-0' style='border:0;padding:0px;height:20px;width:20px'><i class='fa fa-upload' style='color:#777777'></i></button>
                                            echo"</form>
                                        </tb>
                                    </tr>";
                                } }
                            echo"</tbody></table>
                        </div>
                    </div>
                </div>
            </div>";
            
            // COPY TO CERTAIN DATE
            echo"<div class='modal fade modal-close-out' id='schedulecopyday' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Date To Date</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' style='padding:5px'>
                                <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                				    <input type='hidden' name='processor' value='cloneday'><input type='hidden' name='id' value=''>
                				    <input type='hidden' name='redirect' value='schedule-board'>
                				    <div class='modal-body'>
                                        <div class='row'>
                				            <div class='col-md-12'><div class='form-group'>
                				                <label>Project Name *</label>
                				                <select class='form-control m-b ' name='employeeid' required>
                                                    <option value='ALL'>All Employee</option>";
                                                    /*
                                                    $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                    */
                                                    $copydate=time();
                                                    $copydate=date("Y-m-d", $copydate);
                                            echo"</select></div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>DATE FROM *</label>
                				                <input type='date' id='datepicker' name='datefrom' class='form-control' value='$copydate' required>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>TO DATE *</label>
                				                <input type='date' id='datepicker' name='dateto' class='form-control' value='' required>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                        <input type='submit' class='btn btn-primary recordupdated' value='Clone Day' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datatableX')\"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            
            // COPY TO CERTAIN WEEK
            echo"<div class='modal fade modal-close-out' id='schedulecopyweek' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Week</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' style='padding:5px'>
                                <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                				    <input type='hidden' name='processor' value='cloneweek'><input type='hidden' name='id' value=''>
                				    <input type='hidden' name='redirect' value='schedule-board'>
                				    <div class='modal-body'>
                                        <div class='row'>
                				            <div class='col-md-12'><div class='form-group'>
                				                <label>Employee/User Name *</label>
                				                <select class='form-control m-b ' name='employeeid' required>
                                                    <option value='ALL'>All Employee</option>";
                                                    /*
                                                    $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                    */
                                            echo"</select></div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>COPY WEEK FROM *</label>
                				                <input type='week' id='weekpicker' name='weekfrom' class='form-control' value='$weekvar'>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>COPY WEEK TO *</label>
                				                <input type='week' id='weekpicker' name='weekto' class='form-control' value='$weekcopy'>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                        <input type='submit' class='btn btn-primary recordupdated' value='Clone Week' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            
            // WIPE TO CERTAIN WEEK
            echo"<div class='modal fade modal-close-out' id='scheduledeleteweek' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Week</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' style='padding:5px'>
                                <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                				    <input type='hidden' name='processor' value='wipeweek'><input type='hidden' name='id' value=''>
                				    <input type='hidden' name='redirect' value='schedule-board'>
                				    <div class='modal-body'>
                                        <div class='row'>
                				            <div class='col-md-6'><div class='form-group'>
                				                <label>Employee/User Name *</label>
                				                <select class='form-control m-b ' name='employeeid' required>
                                                    <option value='ALL'>All Employee</option>";
                                                    /*
                                                    $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                    */
                                            echo"</select></div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>SELECE A WEEK TO WIPE *</label>
                				                <input type='week' id='weekpicker' name='weekto' required class='form-control' value=''>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                        <input type='submit' class='btn btn-primary' value='Wipe This Week' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            
            // MOVE TO CERTAIN DATE
            echo"<div class='modal fade modal-close-out' id='schedulemover1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-body' id='schedulemover2'></div>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                </div>
            </div>";    
        }
    }else{
        echo"<form method='get' action='scheduling-set.php' name='main' target='_top'>
            <input type=hidden name='projectid' value='0'>
            <input type=hidden name='smsbd' value='schedule-board
            <input type=hidden name='url' value='schedule.php'>
            <input type=hidden name='id' value='48'>
            <input type=hidden name='backlink' value='chedule-board'>
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
            <script>
                function myFunctionX() {
                    alert("Schedule Allocated.");
                }
            </script>