<!DOCTYPE html>
<html lang='en' data-footer='true' data-scrollspy='true'>
  <head>
    <meta charset='UTF-8' />
    <link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='font/CS-Interface/style.css' />
    <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='css/styles.css' />
    <link rel='stylesheet' href='css/main.css' />
    <script src='js/base/loader.js'></script>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
  </head>

<?php

    error_reporting(0);
    
    date_default_timezone_set("Australia/Melbourne");
    
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    $sheba="uerp_user";
    $cidx=9;
    $title="Update Profile Data";
    $utype="EMPLOYEE";

    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;

    if(isset($_GET["clientid"])) $cid=$_GET["clientid"];
    else $cid=$userid;
    
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d h:i:s a", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    $a3 = "select * from uerp_user where id='$cid' order by id asc limit 1";
    $a33 = $conn->query($a3);
    if ($a33->num_rows > 0) { while($a333 = $a33->fetch_assoc()) {
            
            $uid=$a333["uid"];
            $date=$a333["date"];
            $ipx=$a333["ip"];
            $status=$a333["status"];
            $agentid=$a333["agentid"];
            $unbox=$a333["unbox"];
            $passbox=$a333["passbox"];
            $gendery=$a333["gender"];
            $username=$a333["username"];
            $username2=$a333["username2"];
            $job_experiencey=$a333["job_experience"];
            $addressy=$a333["address"];
            $nationalidy=$a333["nationalid"];
            $phoney=$a333["phone"];
            $doby=$a333["dob"];
            $religiony=$a333["religion"];
            $address2y=$a333["address2"];
            $passporty=$a333["passport"];
            $passport_expire_datey=$a333["passport_expire_date"];
            $nationalityy=$a333["nationality"];
            $marital_statusy=$a333["marital_status"];
            $spouse_occupationy=$a333["spouse_occupation"];
            $childy=$a333["child"];
            $emergency_contact_1y=$a333["emergency_contact_1"];
            $emergency_relation_1y=$a333["emergency_relation_1"];
            $emergency_phone_1=$a333["emergency_phone_1"];
            $emergency_email_1=$a333["emergency_email_1"];
            $emergency_contact_2=$a333["emergency_contact_2"];
            $emergency_relation_2=$a333["emergency_relation_2"];
            $emergency_phone_2=$a333["emergency_phone_2"];
            $emergency_email_2=$a333["emergency_email_2"];
            $bank_name=$a333["bank_name"];
            $account_name=$a333["account_name"];
            $account_number=$a333["account_number"];
            $bsb=$a333["bsb"];
            $fathername=$a333["fathername"];
            $fatherprofession=$a333["fatherprofession"];
            $fatherphone=$a333["fatherphone"];
            $mothername=$a333["mothername"];
            $note=$a333["note"];
            $country=$a333["country"];
            $city=$a333["city"];
            $area=$a333["area"];
            $email=$a333["email"];
            $swfcode=$a333["swfcode"];
            $tpass=$a333["tpass"];
            $cwallet=$a333["cwallet"];
            $pwallet=$a333["pwallet"];
            $ewallet=$a333["ewallet"];
            $plan=$a333["plan"];
            $countz=$a333["countz"];
            $countm=$a333["countm"];
            
            if($a333["images"]!="0") $images=$a333["images"];
            else $images="img/noimage.jpg";
            
            $mtype=$a333["mtype"];
            $admin=$a333["admin"];
            $zip=$a333["zip"];
            $projects=$a333["projects"];
            // $day=$a333[""];
            $motherprofession=$a333["motherprofession"];
            $motherphone=$a333["motherphone"];
            $ledger_sid=$a333["ledger_sid"];
            $permission=$a333["permission"];
            $aboutme=$a333["aboutme"];
            $latitude=$a333["latitude"];
            $longitude=$a333["longitude"];
            $onlinestatus=$a333["onlinestatus"];
            $abn=$a333["abn"];
            $salary_basic=$a333["salary_basic"];
            $reg_amt=$a333["reg_amt"];
            $sat_amt=$a333["sat_amt"];
            $sun_amt=$a333["sun_amt"];
            $hol_amt=$a333["hol_amt"];
            $night_amt=$a333["night_amt"];
            $payment_type=$a333["payment_type"];
            $pf=$a333["pf"];
            $pf_no=$a333["pf_no"];
            $pf_rate=$a333["pf_rate"];
            $esi=$a333["esi"];
            $esi_no=$a333["esi_no"];
            $esi_rate=$a333["esi_rate"];
            $driving_licence_no=$a333["driving_licence_no"];
            $colorx=$a333["color"];
            $overtime=$a333["overtime"];
            $ndis=$a333["ndis"];
            $representative_name=$a333["representative_name"];
            $nominee_name=$a333["nominee_name"];
            $phone2=$a333["phone2"];
            $mobile=$a333["mobile"];
            $cp_name=$a333["cp_name"];
            $cp_phone1=$a333["cp_phone1"];
            $cp_phone2=$a333["cp_phone2"];
            $cp_mobile=$a333["cp_mobile"];
            $cp_email=$a333["cp_email"];
            $cp_address=$a333["cp_address"];
            $ndis_number=$a333["ndis_number"];
            $signature1=$a333["signature1"];
            $signature2=$a333["signature2"];
            $signature3=$a333["signature3"];
            $source=$a333["source"];
            $pm_name=$a333["pm_name"];
            $pm_mobile=$a333["pm_mobile"];
            $pm_email=$a333["pm_email"];
            $pm_address=$a333["pm_address"];
            $loginstatus=$a333["loginstatus"];            
            
            $departmenty=$a333["department"];
            $s8x = "select * from departments where id='$departmenty' order by id asc limit 1";
            $r8x = $conn->query($s8x);
            if ($r8x->num_rows > 0) { while($rs8x = $r8x->fetch_assoc()) { $departmentname=$rs8x["department_name"]; } }
            
            $designationy=$a333["designation"];
            $s8y = "select * from designation where id='$designationy' order by id asc limit 1";
            $r8y = $conn->query($s8y);
            if ($r8y->num_rows > 0) { while($rs8y = $r8y->fetch_assoc()) { $designationname=$rs8y["designation"]; } }
            
            $reportstoid=$a333["team_leader"];
            $team_leadery=$a333["team_leader"];
            $s8z = "select * from uerp_user where id='$team_leadery' order by id asc limit 1";
            $r8z = $conn->query($s8z);
            if ($r8z->num_rows > 0) { while($rs8z = $r8z->fetch_assoc()) {
                if($rs8z["images"]!=0) $reporterimage=$rs8z["images"];
                else $reporterimage="img/noimage.jpg";
                $reportstoname=$rs8z["username"];
            } }
		} }

    echo"<div class='container'>
        <div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-8 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> $username's Dashboard</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=ndis_dashboard.php&id=55'>NDIS</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=ndis_dashboard.php&id=55'>Dashboard</a></li>                            
                            </ul>
                        </nav>
                    </div>
                    <div class='col-4 col-sm-6 d-flex align-items-start justify-content-end'>";
                        if($viewpoint=="DESKTOP") echo"<a href='index.php?url=helpdesk.php&id=5138' style='margin-top:18px'>Need Help?</a>&nbsp;&nbsp;";
                        echo"<a href='index.php?url=feedback.php&id=5138' style='margin-top:8px'>
                          <button type='button' class='btn btn-outline-success btn-icon btn-icon-end w-100 w-sm-auto'>
                              <span>Give Feedback</span><i data-acorn-icon='question'></i>
                          </button>
                        </a>
                    </div>              
                </div>
            </div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <span style='font-size:12pt'>Good morning, $username $username2!</span><br>
                        <span style='font0-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        
                    </div>              
                </div>
            </div>
            
            <div>";
                $eods=0;
                if($designationy==13) $rax = "select * from eod where status='1' order by id desc limit 1";
                else $rax = "select * from eod where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                $rbx = $conn->query($rax);
                if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $eods=($eods+1); } }
                
                $bocs=0;
                if($designationy==13) $rax = "select * from boc where status='1' order by id desc limit 1";
                else $rax = "select * from boc where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                $rbx = $conn->query($rax);
                if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $bocs=($bocs+1); } }
                
                $incidents=0;
                if($designationy==13) $rax = "select * from incident where status='1' order by id desc limit 1";
                else $rax = "select * from incident where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                $rbx = $conn->query($rax);
                if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $incidents=($incidents+1); } }
                
                $cases=0;
                if($designationy==13) $rax = "select * from casenote where status='1' order by id desc limit 1";
                else $rax = "select * from casenote where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                $rbx = $conn->query($rax);
                if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $cases=($cases+1); } }
                
                $complains=0;
                if($designationy==13) $rax = "select * from complaintnote where status='1' order by id desc limit 1";
                else $rax = "select * from complaintnote where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                $rbx = $conn->query($rax);
                if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $complains=($complains+1); } } 
                
                $gforms=0;
                if($designationy==13) $rax = "select * from general_forms where status='1' order by id desc limit 1";
                else $rax = "select * from general_forms where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                $rbx = $conn->query($rax);
                if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $gforms=($gforms+1); } } 
                
                echo"<div class='row gx-2'>
                    <h2 class='small-title'>DOCUMENTS REPORTED</h2>                        
                    <div class='col-4 col-md-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <a href='index.php?url=eod.php&id=5200'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='alarm' class='text-white'></i>
                                    </div>
                                </a>
                                <p class='mb-0 lh-1'>EOD Submitted</p>
                                <a href='index.php?url=eod.php&id=5200'><p class='cta-3 mb-0 text-primary'>$eods+</p></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-4 col-md-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <a href='index.php?url=boc.php&id=5200'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='navigate-diagonal' class='text-white'></i>
                                    </div>
                                </a>
                                <p class='mb-0 lh-1'>BOC Submitted</p>
                                <a href='index.php?url=boc.php&id=5200'><p class='cta-3 mb-0 text-primary'>$bocs+</p></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-4 col-md-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <a href='index.php?url=incident.php&id=5200'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                </a>
                                <p class='mb-0 lh-1'>Incident Reported</p>
                                <a href='index.php?url=incident.php&id=5200'><p class='cta-3 mb-0 text-primary'>$incidents+</p></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-4 col-md-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <a href='index.php?url=case_notes.php&id=5200'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                </a>
                                <p class='mb-0 lh-1'>Case Reported</p>
                                <a href='index.php?url=case_notes.php&id=5200'><p class='cta-3 mb-0 text-primary'>$cases (+/-)</p></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-4 col-md-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <a href='index.php?url=complaints.php&id=5200'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                </a>
                                <p class='mb-0 lh-1'>Complains Solved</p>
                                <a href='index.php?url=complaints.php&id=5200'><p class='cta-3 mb-0 text-primary'>$complains</p></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-4 col-md-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <a href='index.php?url=general_forms.php&id=5200'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                </a>
                                <p class='mb-0 lh-1'>Files Uploaded</p>
                                <a href='index.php?url=general_forms.php&id=5200'><p class='cta-3 mb-0 text-primary'>$gforms+</p></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>            
                        
                        
        <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
            <div class='row'>
                
                <div class='col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>";
                        $todayx=time();
                        $d11= date("l", $todayx);
                        
                        $todayx=time();
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
                        
                        echo"<h2 class='small-title'>$d11's Schedule</h2>
                        <div class='card mb-5'><div class='card-body'>";
                    
                            $ra7 = "select * from uerp_user where id='$cid' and status='1' order by username asc limit 1";
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
                                    $lt1 = "select * from leave_asign where cid='$cid' and day='$d1' and month='$mm1' and year='$y' and status='1' order by id asc limit 1";
                                    $lt2 = $conn->query($lt1);
                                    if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                    if($lts==1){
                                        echo"<div class='col-lg-12'>
                                            <div class='ibox' style='padding:5px;background-color:#FFFFFF;font-size:10pt'>
                                                <div class='ibox-title' style='padding:5px;background-color:#F7C6C5;'><center>NOT AVAILABLE</center><hr><span style='font-size:8pt;color:$color4'>$d11 $d111 $m1, $y<br></span></div>
                                                <div class='ibox-content text-center'><hr>
                                                    <a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid4=$cid' class='btn-active btn btn-xs' style='background-color:orange;border-radius:10px'>Set Available</a>
                                                    <Br><br>
                                                </div>
                                            </div>
                                        </div>";
                                    }else{
                                        echo"<div class='ibox '>
                                            <div class='ibox-content text-center'style='padding:5px;text-align:center'><center><br>
                                                <center>
                                                    <div id='clockContainer' class='bg-info' style='border-radius:10px;'>
                                                        <div id='hour'></div><div id='minute'></div><div id='second'></div>
                                                    </div>
                                                </center><br>";
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
                                                                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname=$r1z["username"]; } }
                                                                $projectname="";
                                                                $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
                                                                $r2y = $conn->query($r2x);
                                                                if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                                                                                
                                                                if($r5c["accepted"]=="0"){
                                                                    $statuscolor="#CCCCCC";
                                                                    $statuscolor2="#000000";
                                                                }else{
                                                                    $statuscolor=$r5c["color"];
                                                                    $statuscolor2="#FFFFFF";
                                                                }
                                                                
                                                                $shift_today3=time();
                                                                $shift_today3=date("Y-m-d", $shift_today3);
                                                                
                                                                $stimeA1="";
                                                                $etimeA1="";
                                                                $stimeA=strtotime($r5c["stime"]);
                                                                $etimeA=strtotime($r5c["etime"]);
                                                                $stimeA1=date("h:i A", $stimeA);
                                                                $etimeA1=date("h:i A", $etimeA);
                                                                echo"<div style='width:100%;padding:3px'>";
                                                                    /*
                                                                    if($r5c["accepted"]==1){
                                                                        echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."&url=clock_in-out.php&id=5199&src_employeeid=$userid'>
                                                                        <div class='bg-success' style='width:100%;text-align:left;border-radius:10px;padding:5px'>";
                                                                    }else{
                                                                    
                                                                    }
                                                                    */ 
                                                                    echo"<div class='bg-tertiary' style='width:100%;text-align:center;border-radius:10px;padding:5px'>
                                                                            <table style='width:100%'>
                                                                                <tr>
                                                                                    <td style='width:50%' align=center><span style='font-size:8pt'>Clock IN</span></td>
                                                                                    <td style='width:50%' align=center><span style='font-size:8pt'>Clock OUT</span</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style='width:50%' align=center><span style='font-size:10pt'><b>$stimeA1</b></span></td>
                                                                                    <td style='width:50%' align=center><span style='font-size:10pt'><b>$etimeA1</b></span</td>
                                                                                </tr>
                                                                                <tr><td colspan=2 align=center><hr><span style='font-size:10pt'><b>Client</b>: $clientname</span></td></tr>
                                                                                <tr><td colspan=2 align=center><span style='font-size:10pt'><b>Location</b>: ".$r5c["address"]."</span></td></tr>
                                                                                <tr><td colspan=2 align=center><hr>";
                                                                                
                                                                                    $cin=date("h:i a", $r5c["clockin"]);
                                                                                    if($r5c["clockin"]!=0) echo"$cin<br>";
                                                                                    if($r5c["clockin"]==0) echo"<a href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=$userid&id=1&status=100&gogo=1' target='dataprocessor' class='btn btn-warning btn-sm'>Clock IN</a>";
                                                                                    else echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."&url=clock_in-out.php&src_employeeid=&id=' target='_top' class='btn btn-danger btn-sm'>Clock Out</a>";
                                                                                echo"</td></tr>
                                                                            </table>
                                                                        </div>
                                                                </div>";
                                                            } }
                                            echo"</div><br><br>
                                        </div>";
                                    }
                                }
                            } }    
                        echo"</div></div>
                    </section>
                <br></div>
                
                <div class='col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Last 15 Pending & Active Tasks</h2>
                        <div class='card mb-5'>
                            <div class='card-body' style='min-height:410px'>
                                <table class='table table-hover margin bottom'>
                                    <tbody>";
                                        if($designationy==13) $rax = "select * from tasks where activity='1' and status='1' OR activity='2' and status='1' order by id desc limit 1";
                                        else $rax = "select * from tasks where employeeid='".$_COOKIE["userid"]."' and activity='1' and status='1' OR employeeid='".$_COOKIE["userid"]."' and activity='2' and status='1' order by id desc";
                                        $rbx = $conn->query($rax);
                                        if ($rbx->num_rows > 0) { while($rs = $rbx->fetch_assoc()) { 
                                            
                                            $pdate="";    
                                            $pdate=date("d-M-Y",$rs["tdate"]);
                                                
                                            $clientname="";
                                            $r1x = "select * from uerp_user where id='".$rs["clientid"]."' order by id asc limit 1";
                                            $r1y = $conn->query($r1x);
                                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname="".$r1z["username"]." ".$r1z["username2"].""; } }
                                            
                                            echo"<tr><td align='left' style='font-size:10pt'>$pdate<br>".$rs["clientname"]."<br><b>".$rs["title"]."</b></td></tr>";
                                        } }
                                    echo"</tbody>
                                </table>";
                                echo"<center><a href='index.php?url=task_manager.php&id=58' class='btn btn-primary btn-sm'>View Tasks</a>";
                            echo"</div>
                        </div>
                    </section>
                <br></div>
                
                <div class='col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Last 5 Submitted EODs</h2>
                        <div class='card mb-5'>
                            <div class='card-body' style='min-height:410px'>
                                <table class='table table-hover margin bottom'>
                                    <tbody>";
                                        $t=0;
                                        $ra1 = "select * from eod where employeeid='$cid' and status='1' order by id desc limit 5";
                                        $rb1 = $conn->query($ra1);
                                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                            $t=($t+1);
                                            $eod_date=date("d-m-y H:m", $rab1["eod_date"]);
                                            $incident_date=date("d-m-y", $rab1["incidentdate"]);
                                            $clientname="";
                                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                                            $rb2 = $conn->query($ra2);
                                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                                            $employeename="";
                                            $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                                            $rb2 = $conn->query($ra2);
                                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                                            $shiftname="";
                                            $ra2 = "select * from shift where id='".$rab1["shiftid"]."' order by id desc limit 1";
                                            $rb2 = $conn->query($ra2);
                                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $shiftname= $rab2["shift_name"]; } }
                                            
                                            echo"<tr class='gradeX'>
                                                <td nowrap>
                                                    <a data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('eod_detail_view.php?postid=".$rab1["id"]."', 'offcanvasTop2')\" href='#'>
                                                        <i class='fa fa-eye'></i>&nbsp;$eod_date
                                                    </a><br>
                                                    $clientname<br><b>Shift: ".$rab1["shiftid"]."</b>
                                                </td><td>";
                                                    if($rab1["activityid"]!="Array"){
                                                        echo"".$rab1["activityid"]."";
                                                    }else echo"-";
                                                echo"</td>
                                            </tr>";
                                            
                                        } }
                                    echo"</tbody>
                                </table>
                                <center><a href='index.php?url=eod.php&id=5200' class='btn btn-primary btn-sm'>View All EOD Reports</a>";
                            echo"</div>
                        </div>
                    </section>
                <br></div>";
                
                echo"<div class='col-12 col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Allocated Clients</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <table class='table table-hover margin bottom'>
                                    <thead><tr><th>Client & Location</th></tr></thead>
                                    <tbody>";
                                        $s7 = "select * from project_team_allocation where employeeid='$cid' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                            $r71 = $conn->query($s71);
                                            if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                $r72 = $conn->query($s72);
                                                if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                    echo"<tr>
                                                        <td align='left' style='font-size:10pt'>
                                                            ".$rs72["username"]." ".$rs72["username2"]."<br>
                                                            ".$rs72["address"]."<br>Phone: <a href='tel:".$rs72["phone"]."'>".$rs72["phone"]."</a>
                                                        </td>
                                                    </tr>";
                                                } }
                                            } }
                                        } }
                                    echo"</tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                
                <div class='col-12 col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Task Status Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-30'>
                                    <iframe name='chart_accounts' src='./modules/tasks_chart.php?c=doughnut&v=M&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='260'>BROWSER NOT SUPPORTED</iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                <br></div>
                
                <div class='col-12 col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Yearly Document Submittion Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-35'data-title='Monthwise Reporded Documents' data-intro='Showing EOD, BOC, INCIDENT Submited Graph.' data-step='5'>
                                  <iframe name='chart_accounts' src='./modules/documents_chart.php?c=bar&v=M&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='270'>BROWSER NOT SUPPORTED</iframe>
                                  </div>
                            </div>
                        </div>
                    </section>
                <br></div>
                
                <div class='col-md-6'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Assigned Projects as Team Leader</h2>
                        <div class='card mb-5'>
                            <div class='card-body' style='padding:5px'>
                                <div id='projectdata' style='padding:0px'>
                                    <table class='table table-striped table-bordered table-hover dataTables-jobs1' >
                                        <thead><tr><th>Project</th><th>Team </th></tr></thead>
                                        <tbody>";
                                        
                                            $ra1 = "select * from project where teamleaderid='$userid' and status='1' order by id asc";
                                            $rb1 = $conn->query($ra1);
                                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                $sdate=date("d.m.Y",$rab1["start_date"]);
                                                $edate=date("d.m.Y",$rab1["end_date"]);
                                                $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                                                $rb2 = $conn->query($ra2);
                                                if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                    $clientname1=$rab2["username"];
                                                    $clientname2=$rab2["username2"];
                                                } }
                                                $ra3 = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                                                $rb3 = $conn->query($ra3);
                                                if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                                                    $leadername1=$rab3["username"];
                                                    $leadername2=$rab3["username2"];
                                                    $leaderimage=$rab3["images"];
                                                    $ra4 = "select * from departments where id='".$rab3["department"]."' order by id asc limit 1";
                                                    $rb4 = $conn->query($ra4);
                                                    if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $leaderdepartment=$rab4["department_name"]; } }
                                                    
                                                    $ra5 = "select * from designation where id='".$rab3["designation"]."' order by id asc limit 1";
                                                    $rb5 = $conn->query($ra5);
                                                    if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $leaderdesignation=$rab5["designation"]; } }
                                                    
                                                } }
                                                
                                                echo"<tr class='gradeX'>
                                                    <td nowrap style='font-size:8pt'>".$rab1["name"]."<br>$clientname1 $clientname1</td>
                                                    <td style='font-size:8pt'><b>$leadername1 $leadername2</b><hr>";
                                                        $tt=0;
                                                        $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' order by id asc";
                                                        $rb6 = $conn->query($ra6);
                                                        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                            $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                            $rb7 = $conn->query($ra7);
                                                            if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                                $tt=($tt+1);
                                                                echo"<span style='font-size:8pt'>$tt. ".$rab7["username"]."</span><br>";
                                                            } }
                                                        } }
                                                    echo"</td>
                                                </tr>";
                                            } }
                                        
                                        echo"</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                <br></div>";
                
                
                $todaydate=time();
                $todaydatex=date("Y-m-d", $todaydate);
                $todaydate1=date("Y-m-d", strtotime($todaydatex . '-3 day'));
                $todaydate2=date("Y-m-d", strtotime($todaydatex . '+5 day'));
                $todayx=strtotime($todaydate1);
                $todayy=strtotime($todaydate2);
                echo"<div class='col-md-6'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Time Sheet <span style='font-size:8pt'>- ($todaydate1-$todaydate2)</span></h2>
                        <div class='card mb-5' style='padding:0px'>
                            <div class='card-body' style='padding:5px'>
                                <div class='data-table-responsive-wrapper'> 
                                    <table class='table table-hover margin bottom'>
                                        <thead><tr><th >Date</th><th >Status</th><th >In-Out & Receivable</th></tr></thead>
                                        <tbody>";       
                                            $d1= date("d", $todayx);
                                            $m1= date("m", $todayx);
                                            $y1= date("Y", $todayx);
                                            $d2= date("d", $todayy);
                                            $m2= date("m", $todayy);
                                            $y2= date("Y", $todayy);
                                                        
                                            $todayzz=date("d-m-Y 23:50", $todayy);
                                            $todayy2=strtotime($todayzz);
                                            $r5a = "select * from shifting_allocation where employeeid='$cid' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
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
                                                } }
                                                $clientname="";
                                                $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
                                                $r1y = $conn->query($r1x);
                                                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname=$r1z["username"]; } }
                                                $projectname="";
                                                $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
                                                $r2y = $conn->query($r2x);
                                                if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                                                                                
                                                $stimeX=substr($r5c['stime'],11,5);
                                                $etimeX=substr($r5c['etime'],11,5);
                                                $stimeX1=""; $stimeX2=""; $sstatX="";
                                                $etimeX1=""; $etimeX2=""; $estatX="";
                                                $stimeX1=substr($r5c['stime'],11,2);
                                                $stimeX2=substr($r5c['stime'],14,2);
                                                
                                                // if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                                                
                                                if($stimeX1>=13){
                                                    $stimeX1=($stimeX1-12);
                                                    if($stimeX1<="9") $stimeX1="0$stimeX1";
                                                    $sstatX="PM";
                                                }else{
                                                    $sstatX="AM";
                                                }
                                                $etimeX1=substr($r5c['etime'],11,2);
                                                $etimeX2=substr($r5c['etime'],14,2);
                                                if($etimeX1>=13){
                                                    $etimeX1=($etimeX1-12);
                                                    if($etimeX1<="9") $etimeX1="0$etimeX1";
                                                    $estatX="PM";
                                                }else{
                                                    $estatX="AM";
                                                }
                                                        
                                                $stime=strtotime($r5c['stime']);
                                                $sday=date("l", $stime);
                                                $sdate=date("d-m-Y", $stime);
                                                $stime=date("h:i a", $stime);
                                                
                                                $etime=strtotime($r5c['etime']);
                                                $etime=date("h:i a", $etime);
                                                
                                                if($r5c['clockin']!=0) $clockin=date("h:i a", $r5c["clockin"]); else $clockin="-"; 
                                                if($r5c['clockout']!=0) $clockout=date("h:i a", $r5c['clockout']); else $clockout="-";
                                                
                                                $clockoutx=0; 
                                                if($r5c['clockin']!=0 and $r5c['clockout']!=0){
                                                    
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
                                                    $cin2=substr($r5c['stime'],11,2);
                                                    $cout2=substr($r5c['etime'],11,2);
                                                    $cinout2=($cin2-$cout2);
                                                    $etime2=strtotime($r5c["etime"]);
                                                    
                                                    if($cinout2>=0){
                                                        $enddate2=strtotime("24 hours", $etime2);
                                                        $enddate2=date("Y-m-d H:i", $enddate2);
                                                    }else $enddate2=$r5c["etime"];
                                                    
                                                    // echo"$cin2-$cout2<br>";
                                                    
                                                    $date3=date_create($enddate2);
                                                    $date4=date_create($r5c["stime"]);
                                                    $diff2=date_diff($date3,$date4);
                                                    $shift_total= $diff2->format("%H:%I");
                                                    // $total_overtime=($total_hour_worked-$shift_total);
                                                    $total_overtime=$r5c["total_overtime"];
                                                    
                                                    if($total_overtime<=0) $total_overtime=00;
                                                    
                                                }else{
                                                    $total_hour_worked=0;
                                                    $shift_total=0;
                                                    $total_overtime=0;
                                                }
                                                
                                                $t=($t+1);
                                                if($r5c["payroll"]=="1") $bgcolor="grey";
                                                else $bgcolor="";
                                                
                                                if($r5c["night"]=="1") $nightcolor="Night Shift";
                                                else $nightcolor="";
                                                if($r5c["clockout_request"]==0) echo"<tr class='gradeX'>";
                                                else if($r5c["clockout_request"]>=2) echo"<tr class='gradeX'>";
                                                else echo"<tr class='gradeX'>";
                                                
                                                    echo"<td nowrap style='font-size:8pt'>
                                                        <b><a href='#".$r5c["id"]."'> $sday</a></b><br>$sdate
                                                    </td>";
                                                        
                                                    if($r5c["wage_amt"]!=0) $wageamount=$r5c["wage_amt"];
                                                    if($r5c["overtime_amt"]!=0) $overtimeamount=$r5c["overtime_amt"];
                                                            
                                                    $totaworked=($total_hour_worked*$r5c["wage_amt"]);
                                                    $totaovertime=($total_overtime*$r5c["overtime_amt"]);
                                                    $value=($totaworked+$totaovertime);
                                                            
                                                    $netpayable=($netpayable+$value);
                                                    
                                                    // $total_hour_worked_H=substr($total_hour_worked,0,2);
                                                    // $total_hour_worked_S=substr($total_hour_worked,3,2);
                                                            
                                                    // if($r5c["payroll"]==0) $totalworked1=($totalworked1+$total_hour_worked_H);
                                                    $totalworked1=($totalworked1+$total_hour_worked_H);
                                                    if($totalworked1<=9) $totalworked1="0$totalworked1";
                                                    // if($r5c["payroll"]==0) $totalworked2=($totalworked2+$total_hour_worked_S);
                                                    $totalworked2=($totalworked2+$total_hour_worked_S);
                                                    if($totalworked2<=9) $totalworked2="0$totalworked2";
                                                            
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
                                                    $xpayable=($pb2+$xpayable);
                                                    if($r5c["payroll"]==1) $payablex=($pb2+$payablex);
                                                    
                                                    echo"<td align=left nowrap style='font-size:8pt'>
                                                        <b>$clientname</b><br>$stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX
                                                    </td>
                                                    <td nowrap align=left style='font-size:8pt'>
                                                        <b>$clockin</b> - <b>$clockout</b><br>";
                                                        if($r5c["payroll"]=="1") echo"<span style='color:grey'>$ $payable</span><br><span style='color:blue'><b>PAID</b></span><br>";
                                                        else echo"<b>$ $payable</b>";
                                                    echo"</td>
                                                </tr>";
                                            } }
                                        echo"</tbody>
                                    </table>
                                </div>
                                <center><a href='index.php?url=time_sheet.php&id=5198' class='btn btn-primary btn-sm'>View Full Timesheet</a>
                            </div>
                        </div>
                    </section>
                <br></div>
                
                <div class='offcanvas-body'>";
                    if(isset($userid)){
                        $randid=rand(100,999);
                        $s1 = "select * from uerp_user where id='$userid' order by id asc limit 1";
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                            
                            $pdate=date("Y-m-d", $t1["date"]);
                            $jdate=date("Y-m-d", $t1["jointime"]);
                            $dob=date("Y-m-d", $t1["dob"]);
                                    
                            $departmentname="";
                            $d1 = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                            $d2 = $conn->query($d1);
                            if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                            $designationname="";
                            $d4 = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                            $d5 = $conn->query($d4);
                            if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }
            
                            if($utype=="CLIENT"){
                                $leadername="";
                                $d1 = "select * from uerp_user where id='".$t1["team_leader"]."' order by id asc limit 1";
                                $d2 = $conn->query($d1);
                                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $leadername="".$d3["username"]."".$d3["username2"]."" ; } }
                                $openprojects=0;
                                $p1 = "select * from project where clientid='".$t1["id"]."' and status='1' order by id asc limit 1";
                                $p2 = $conn->query($p1);
                                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $openprojects=($openprojects+1); } }
                                $closedprojects=0;
                                $p1 = "select * from project where clientid='".$t1["id"]."' and status='5' order by id asc limit 1";
                                $p2 = $conn->query($p1);
                                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $closedprojects=($closedprojects+1); } }
                            }
                            
                            if($utype=="EMPLOYEE" OR $utype=="SUPPORT" OR $utype=="USER"){
                                $openprojects=0;
                                $closedprojects=0;
                                $ta1 = "select * from project_team_allocation where employeeid='".$t1["id"]."' and status='1' order by id asc";
                                $ta2 = $conn->query($ta1);
                                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                                    $p1 = "select * from project where id='".$ta3["projectid"]."' order by id asc";
                                    $p2 = $conn->query($p1);
                                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                                        if($p3["status"]=="1") $openprojects=($openprojects+1);                            
                                        if($p3["status"]=="5") $closedprojects=($closedprojects+1);
                                    } }
                                } }
                                
                                $opentasks=0;
                                $closedtasks=0;                    
                                $ta1 = "select * from tasks where employeeid='".$t1["id"]."' order by id asc";
                                $ta2 = $conn->query($ta1);
                                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                                    if($ta3["activity"]!="2") $opentasks=($opentasks+1);                            
                                    else $closedtasks=($closedtasks+1);                        
                                } }
                            }
                            
                            $uid=$t1["id"];
                            $status=$t1["status"];
                            if($status==1) $status="ON";
                            else $status="OFF";
                            
                            echo"<div class='container'>
                                <div class='row'>
                                    <div class='col-12 col-md-3'>
                                        <div class='card mb-5'>
                                            <div class='card-body'>
                                                <div class='d-flex align-items-center flex-column mb-4'>
                                                    <div class='d-flex align-items-center flex-column'>
                                                        <div class='sw-13 position-relative mb-3'>
                                                            <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                                                <img src='".$t1["images"]."' class='img-fluid rounded-xl' alt='thumb' />
                                                                <input type='hidden' name='processor' value='edit_user_image'><input type='hidden' name='id' value='".$t1["id"]."'>
                                                                <input type='file' name='images1[]' multiple class='form__field__img form-control' name='image' value='images' onchange='this.form.submit()' style='width:100px;margin-top:-20px'>";
                                                                // <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                            echo"</form>
                                                        </div>
                                                        <div class='h5 mb-0'>".$t1["username"]." ".$t1["username2"]."</div>
                                                        <div class='text-muted'>$designationname</div>
                                                        <div class='text-muted'><center><hr>
                                                            <i data-acorn-icon='pin' class='me-1'></i><br>
                                                            <span class='align-middle'>".$t1["address"].", ".$t1["city"].", ".$t1["area"]."-".$t1["zip"].", ".$t1["country"]."</span>
                                                        </div><hr>
                                                        <a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('users_manager.php?cid=$cidx&sheba=$sheba&mid=".$t1["id"]."&ctitle=$title&utype=$utype', 'offcanvasTop2')\">Edit Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                    
                                    $projectz=0;
                                    if($designationy==13) $rax = "select * from project_team_allocation where status='1' order by id desc limit 1";
                                    else $rax = "select * from project_team_allocation where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                                    $rbx = $conn->query($rax);
                                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $projectz=($projectz+1); } } 
                                    
                                    $pendingtasks=0;
                                    if($designationy==13) $rax = "select * from tasks where activity='1' and status='1' order by id desc limit 1";
                                    else $rax = "select * from tasks where employeeid='".$_COOKIE["userid"]."' and activity='1' and status='1' order by id desc";
                                    $rbx = $conn->query($rax);
                                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $pendingtasks=($pendingtasks+1); } } 
                                    
                                    $activetasks=0;
                                    if($designationy==13) $rax = "select * from tasks where activity='2' and status='1' order by id desc limit 1";
                                    else $rax = "select * from tasks where employeeid='".$_COOKIE["userid"]."' and activity='2' and status='1' order by id desc";
                                    $rbx = $conn->query($rax);
                                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $activetasks=($activetasks+1); } } 
                                    
                                    $notifications=0;
                                    if($designationy==13) $rax = "select * from notification where status='1' order by id desc limit 1";
                                    else $rax = "select * from notification where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                                    $rbx = $conn->query($rax);
                                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $notifications=($notifications+1); } } 
                                    
                                    echo"<div class='col-12 col-md-9 mb-5 tab-content'>
                                        <div class='tab-pane fade show active' id='overviewTab' role='tabpanel'>
                                            <div class='row'>
                                                <div class='col-12'>
                                                    <div class='mb-5'>
                                                        <div class='row g-2'>
                                                            <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=task_manager.php&id=58'>
                                                                <div class='card hover-border-primary'>
                                                                    <div class='card-body'>
                                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                            <span>Projects</span><i data-acorn-icon='office' class='text-primary'></i>
                                                                        </div>
                                                                        <div class='text-small text-muted mb-1'>ACTIVE</div>
                                                                        <div class='cta-1 text-primary'>$projectz</div>
                                                                    </div>
                                                                </div>
                                                            </a></div>
                                                            <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=task_manager.php&id=58'>
                                                                <div class='card hover-border-primary'>
                                                                    <div class='card-body'>
                                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                            <span>Pending Tasks</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                                                        </div>
                                                                        <div class='text-small text-muted mb-1'>PENDING</div>
                                                                        <div class='cta-1 text-primary'>$pendingtasks</div>
                                                                    </div>
                                                                </div>
                                                            </a></div>
                                                            
                                                            <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=task_manager.php&id=58'>
                                                                <div class='card hover-border-primary'>
                                                                    <div class='card-body'>
                                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                            <span>Active Tasks</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                                                        </div>
                                                                        <div class='text-small text-muted mb-1'>PENDING</div>
                                                                        <div class='cta-1 text-primary'>$activetasks</div>
                                                                    </div>
                                                                </div>
                                                            </a></div>
                                                            <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=task_manager.php&id=58'>
                                                                <div class='card hover-border-primary'>
                                                                    <div class='card-body'>
                                                                        <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                            <span>Notifications</span>
                                                                            <i data-acorn-icon='file-empty' class='text-primary'></i>
                                                                        </div>
                                                                        <div class='text-small text-muted mb-1'>RECENT</div>
                                                                        <div class='cta-1 text-primary'>$notifications</div>
                                                                    </div>
                                                                </div>
                                                            </a></div>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class='col-12 col-md-6'>
                                            
                                                    <h2 class='small-title'>Personal Information</h2>
                                                    <div class='card mb-5'>
                                                        <div class='card-body'>
                                                            <div class='row g-0'>
                                                                <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                                    <div class='w-100 d-flex sh-1'></div>
                                                                    <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                                        <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                                    </div>
                                                                    <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                                        <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                                    </div>
                                                                </div>
                                                                <div class='col mb-4'>";
                                                                    $s = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                                    $r = $conn->query($s); 
                                                                    if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                                        $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                                        $joindate=date("d-m-Y",$rs["jointime"]); 
                                                                        $department=$rs["department"];
                                                                        $s8x = "select * from departments where id='$department' order by id asc limit 1";
                                                                        $r8x = $conn->query($s8x);
                                                                        if ($r8x->num_rows > 0) { while($rs8x = $r8x->fetch_assoc()) { $departmentname=$rs8x["department_name"]; } }
                                                                        echo"<table style='width:100%;min-height:220px'>
                                                                            <tr><td nowrap style='width:100px'><strong>Department</strong></td><td style='width:10px'>:</td><td>$departmentname</td></tr>
                                                                            <tr><td nowrap style='width:100px'><strong>Employee ID</strong></td><td style='width:10px'>:</td><td>".$rs["id"]."</td></tr>
                                                                            <tr><td nowrap style='width:100px'><strong>Join Date</strong></td><td style='width:10px'>:</td><td>$joindate</td></tr>
                                                                            <tr><td nowrap style='width:100px'><strong>Nationality</strong></td><td style='width:10px'>:</td><td>".$rs["nationality"]."</td></tr>
                                                                            <tr><td nowrap style='width:100px'><strong>Marrital Status</strong></td><td style='width:10px'>:</td><td>".$rs["marital_status"]."</td></tr>
                                                                            <tr><td nowrap style='width:100px'><strong>driving licence no</strong></td><td style='width:10px'>:</td><td>".$rs["driving_licence_no"]."</td></tr>
                                                                        </table>";
                                                                        /*
                                                                        <tr><td><strong>Expire Date</strong></td><td style='width:10px'>:</td><td>$passport_expire_date</td></tr>
                                                                        <tr><td nowrap><strong>No. of Child</strong></td><td style='width:10px'>:</td><td>".$rs["child"]."</td></tr>
                                                                        <tr><td><strong>Religion</strong></td><td style='width:10px'>:</td><td>".$rs["religion"]."</td></tr>
                                                                        <tr><td><strong>Passport No.</strong></td><td style='width:10px'>:</td><td colspan=10>".$rs["passport"]."</td></tr>
                                                                        */    
                                                                    } }
                                                                echo"</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class='col-12 col-md-6'>
                                                    <h2 class='small-title'>Emergency Contact Person</h2>
                                                    <div class='card mb-5'>
                                                        <div class='card-body'>
                                                            <div class='row g-0'>
                                                                <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                                    <div class='w-100 d-flex sh-1'></div>
                                                                    <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                                        <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                                    </div>
                                                                    <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                                        <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                                    </div>
                                                                </div>
                                                                <div class='col mb-4'>";
                                                                    $s = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                                    $r = $conn->query($s);
                                                                    if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                                        $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                                        echo"<table style='width:100%'>
                                                                            <tr><td style='width:30%' nowrap><strong>Person Name</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_contact_1"]."</td></tr>
                                                                            <tr><td style='width:30%' nowrap><strong>Relation</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_relation_1"]."</td></tr>
                                                                            <tr><td style='width:30%' nowrap><strong>Phone</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_phone_1"]."</td></tr>
                                                                            <tr><td style='width:30%' nowrap><strong>Email</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_email_1"]."</td></tr>
                                                                            <tr><td colspan=10><hr></td></tr>
                                                                            <tr><td style='width:30%' nowrap><strong>Person Name</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_contact_2"]."</td></tr>
                                                                            <tr><td style='width:30%' nowrap><strong>Relation</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_relation_2"]."</td></tr>
                                                                            <tr><td style='width:30%' nowrap><strong>Phone</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_phone_2"]."</td></tr>
                                                                            <tr><td style='width:30%' nowrap><strong>Email</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_email_2"]."</td></tr>
                                                                        </table>";
                                                                    } }
                                                                echo"</div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    
                                    <div class='col-12 col-md-12'>
                                        <div class='mb-5'>
                                            <h2 class='small-title'>&nbsp; About Myself</h2>
                                            <div class='card mb-5'>
                                                <div class='card-body'>
                                                    <div class='row g-0'>
                                                        <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                            <div class='w-100 d-flex sh-1'></div>
                                                            <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                                <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                            </div>
                                                            <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                            </div>
                                                        </div>
                                                        <div class='col mb-4'>";
                                                            $s = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                            $r = $conn->query($s);
                                                            if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                                $dob=date("d-m-Y",$rs["dob"]);
                                                                echo"<div class='row'>
                                                                    <div class='col-md-12'><div class='ibox'><div class='ibox-content text-left'><p class='small'>".$rs["aboutme"]."</p></div></div></div>
                                                                    
                                                                    <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                                        <h3>Address</h3>
                                                                        <table style='widht:100%;min-height:150px'>
                                                                            <tr><td>Address</td><td style='width:10px'>:</td><td>".$rs["address"]."</td>
                                                                            </tr><tr><td>Address 2</td><td style='width:10px'>:</td><td>".$rs["address2"]."</td></tr>
                                                                            </tr><tr><td>City</td><td style='width:10px'>:</td><td>".$rs["city"]."</td></tr>
                                                                            </tr><tr><td>State</td><td style='width:10px'>:</td><td>".$rs["area"]."</td></tr>
                                                                            </tr><tr><td>Zip</td><td style='width:10px'>:</td><td>".$rs["zip"]."</td></tr>
                                                                            </tr><tr><td>Country</td><td style='width:10px'>:</td><td>".$rs["country"]."</td></tr>
                                                                        </table>
                                                                    </div></div></div>
                                                                    <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                                        <h3>Other Info.</h3>
                                                                        <table style='widht:100%;min-height:150px'>
                                                                            <tr><td>ABN</td><td style='width:10px'>:</td><td>$abn</td></tr>
                                                                            <tr><td>Email</td><td style='width:10px'>:</td><td>".$rs["email"]."</td></tr>
                                                                            <tr><td>Gender</td><td style='width:10px'>:</td><td>".$rs["gender"]."</td></tr>
                                                                            <tr><td>DOB</td><td style='width:10px'>:</td><td>$dob</td></tr>
                                                                        </table>
                                                                    </div></div></div>
                                                                    <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                                        <h3>Bank Info.</h3>
                                                                        <table style='widht:100%;min-height:150px'>
                                                                            <tr><td>Bank Name</td><td style='width:10px'>:</td><td>".$rs["bank_name"]."</td></tr><tr><td>A/c Name</td><td style='width:10px'>:</td><td>".$rs["account_name"]."</td></tr>
                                                                            <tr><td>A/c Number</td><td style='width:10px'>:</td><td>".$rs["account_number"]."</td></tr><tr><td>BSB</td><td style='width:10px'>:</td><td>".$rs["bsb"]."</td></tr>
                                                                        </table>
                                                                    </div></div></div>
                                                                </div>";
                                                            } }
                                                        echo"</div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-12 col-md-12'>
                                        <body onload=\"shiftdataV2('document_data.php?status=1', 'datatableX')\">
                                        <div class='data-table-responsive-wrapper' id='datatableX'></div>";
                                        /*
                                        <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                            <div class='w-100 d-flex sh-1'></div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                    <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                    <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                            </div>
                                            <div class='col mb-4'>";
                                                $s = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                $r = $conn->query($s);
                                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                    $dob=date("d-m-Y",$rs["dob"]);
                                                    echo"<div class='row'>
                                                        <div class='col-md-12'><div class='ibox'><div class='ibox-content text-left'><p class='small'>".$rs["aboutme"]."</p></div></div></div>
                                                        <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                            <h3><a href='#' data-bs-toggle='modal' data-bs-target='#ExperiencePagesModal'><i data-acorn-icon='edit' data-acorn-size='18'></i></a> My Experience</h3>
                                                            <div id='myexperience1'></div>
                                                        </div></div></div>
                                                        <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                            <h3><a href='#' data-bs-toggle='modal' data-bs-target='#EducationPagesModal'><i data-acorn-icon='plus' data-acorn-size='18'></i></a> My Eduction</h3>
                                                            <div id='myeducation1'></div>
                                                        </div></div></div>
                                                        <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                            <h3><a href='#' data-bs-toggle='modal' data-bs-target='#FamilyPagesModal'><i data-acorn-icon='plus' data-acorn-size='18'></i></a> Family Information</h3>
                                                            <div id='myfamily1'></div>
                                                        </div></div></div>
                                                    </div>";
                                                } }
                                            echo"</div>
                                        </div>
                                        */
                                    echo"</div> 
                                </div>
                            </div>";
                        } }
                    }
               echo"</div>";
               
                // Experience
                echo"<div class='modal fade' id='ExperiencePagesModal' tabindex='-1' role='dialog' aria-labelledby='ExperiencePagesModalLabel' aria-hidden='true'>
                    <div class='modal-dialog '>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='ExperiencePagesModalLabel'>Add Experience</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data'>
                                <div class='modal-body' style='padding:10px'>
                                    <input type='hidden' name='processor' value='myexperience'>
                                    <div class='row'>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Company Name *</label><input name='company' type='text' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Location *</label><input name='location' type='text' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Job Position *</label><input name='jobposition' type='text' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Period From *</label><input name='periodfrom' type='date' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Period To</label><input name='periodto' type='date' value='' class='form-control'><br>
                                        </div></div>
                                    </div>
                                
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <input type='reset' class='btn btn-secondary' value='Reset'>
                                    <input type='submit' class='btn btn-primary' name='submit' value='Save'>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";
                
                // Experiance
                echo"<div class='modal fade' id='FamilyPagesModal' tabindex='-1' role='dialog' aria-labelledby='FamilyPagesModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-scrollable'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='FamilyPagesModalLabel'>Add Family Information</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <form class='m-t' role='form' method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data'>
                                <div class='modal-body' style='padding:10px'>
                                    <input type='hidden' name='processor' value='myfamily'>
                                    <div class='row'>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Name *</label><input name='name' type='text' value='' class='form-control'><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Relationship *</label><input name='relationship' type='text' value='' class='form-control'><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Date of Birth *</label><input name='dob' type='date' value='' class='form-control'><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Phone</label><input name='phone' type='text' value='' class='form-control'><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Email *</label><input name='email' type='email' value='' class='form-control'><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Address</label><input name='address' type='text' value='' class='form-control'><br>
                                        </div></div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <input type='reset' class='btn btn-secondary' value='Reset'>
                                    <input type='submit' class='btn btn-primary' name='submit' value='Save'>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>";
                
                // Experiance
                echo"<div class='modal fade' id='EducationPagesModal' tabindex='-1' role='dialog' aria-labelledby='EducationPagesModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='EducationPagesModalLabel'>Add Educational Information</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <form class='m-t' role='form' method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data'>
                                <div class='modal-body' style='padding:10px'>
                                    <input type='hidden' name='processor' value='myeducation'>
                                    <div class='row'>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Institution *</label><input name='institution' type='text' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Subject *</label><input name='subject' type='text' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Starting Date *</label><input name='starting' type='date' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Completed Date</label><input name='completed' type='date' value='' class='form-control'><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Degree *</label><input name='degree' type='text' value='' class='form-control' required><br>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                                            <label>Grade</label><input name='grade' type='text' value='' class='form-control'><br>
                                        </div></div>
                                    </div>
                                </div>
                            
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    <input type='reset' class='btn btn-secondary' value='Reset'>
                                    <input type='submit' class='btn btn-primary' name='submit' value='Save'>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


    </main>";
?>

<script src='js/plugins/carousels.js'></script>

<style>
    #clockContainer {
        position: relative;
        margin: auto;
        height: 200px;
        width: 200px;
        background-image: url("assets/clock.png");
        background-size: 100%;
    }
    
    #hour,
    #minute,
    #second {
        position: absolute;
        background: #EF5550;
        border-radius: 10px;
        transform-origin: bottom;
    }
    
    #hour {
        width: 1.8%;
        height: 25%;
        top: 25%;
        left: 48.85%;
        opacity: 0.8;
        background: #000000;
    }
    
    #minute {
        width: 1.6%;
        height: 30%;
        top: 19%;
        left: 48.9%;
        opacity: 0.8;
        background: #000000;
    }
    
    #second {
        width: 1%;
        height: 40%;
        top: 9%;
        left: 49.25%;
        opacity: 0.8;
        color: red;
    }
</style>

<script>
    setInterval(() => {
    d = new Date(); //object of date()
    hr = d.getHours();
    min = d.getMinutes();
    sec = d.getSeconds();
    hr_rotation = 30 * hr + min / 2; //converting current time
    min_rotation = 6 * min;
    sec_rotation = 6 * sec;
    
    hour.style.transform = `rotate(${hr_rotation}deg)`;
    minute.style.transform = `rotate(${min_rotation}deg)`;
    second.style.transform = `rotate(${sec_rotation}deg)`;
    }, 1000);
</script>