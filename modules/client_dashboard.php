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
    $cdate=time();
    $cdate=date("d-m-Y", $cdate);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;

    if(isset($_GET["clientid"])) $cid=$_GET["clientid"];
    else $cid=$userid;
    
    date_default_timezone_set("Australia/Sydney");
	
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
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
            
            $totalprojects=0;
            $s9z = "select * from project where clientid='$cid' and status='1' order by id asc";
            $r9z = $conn->query($s9z);
            if ($r9z->num_rows > 0) { while($rs9z = $r9z->fetch_assoc()) {
                $totalprojects=($totalprojects+1);
                $myprojectid=$rs9z["id"];
            } }
            
            $totalpendinginvoices=0;
            $s10z = "select * from receipt_voucher where received_from='$cid' and ledger_id='800000032' and invoice_no<>'0' and paid='1' group by invoice_no";
            $r10z = $conn->query($s10z);
            if ($r10z->num_rows > 0) { while($rs10z = $r10z->fetch_assoc()) {
                $totalpendinginvoices=($totalpendinginvoices+1);
            } }
            
            $totalschedules=0;
            $todayx=time();
            $d11= date("l", $todayx);
            $todayx=time();
            $todayz=time();
            $y= date("Y", $todayz);
            $day= date("d", $todayz);
            $month= date("m", $todayz);
            $m1= date("M", $todayx); 
            $d1= date("d", $todayx); 
            $mm1= date("m", $todayx); 
            $d11= date("l", $todayx);
            
            if($m1=="Jan" || $m1=="Mar" || $m1=="May" || $m1=="July" || $m1=="Aug" || $m1=="Oct" || $m1=="Dec") $lastdate=31;
            else $lastdate=30;
            if($m1=="Feb") $lastdate=date("t", $todayx);
            
            if($d1<=$lastdate){
                $r5a = "select * from shifting_allocation where clientid='$cid' and days='$d1' and months='$mm1' and years='$y' and status='1' order by id asc";
                $r5b = $conn->query($r5a);
                if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) { $totalschedules=($totalschedules+1); } }
            } 

            $totalprofileupdated=0;
            if(strlen($a333["uid"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["date"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["ip"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["status"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["agentid"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["unbox"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["passbox"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["gender"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["username"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["username2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["job_experience"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["address"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["nationalid"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["phone"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["dob"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["religion"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["address2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["passport"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["passport_expire_date"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["nationality"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["marital_status"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["spouse_occupation"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["child"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_contact_1"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_relation_1"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_phone_1"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_email_1"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_contact_2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_relation_2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_phone_2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["emergency_email_2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["bank_name"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["account_name"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["account_number"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["bsb"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["fathername"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["fatherprofession"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["fatherphone"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["mothername"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["note"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["country"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["city"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["area"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["email"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["swfcode"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["tpass"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["cwallet"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pwallet"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["ewallet"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["plan"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["countz"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["countm"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["images"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["mtype"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["admin"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["zip"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["projects"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["motherprofession"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["motherphone"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["ledger_sid"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["permission"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["aboutme"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["latitude"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["longitude"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["onlinestatus"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["abn"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["salary_basic"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["reg_amt"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["sat_amt"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["sun_amt"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["hol_amt"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["night_amt"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["payment_type"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pf"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pf_no"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pf_rate"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["esi"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["esi_no"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["esi_rate"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["driving_licence_no"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["color"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["overtime"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["ndis"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["representative_name"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["nominee_name"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["phone2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["mobile"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["cp_name"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["cp_phone1"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["cp_phone2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["cp_mobile"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["cp_email"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["cp_address"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["ndis_number"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["signature1"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["signature2"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["signature3"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["source"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pm_name"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pm_mobile"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pm_email"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["pm_address"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            if(strlen($a333["loginstatus"])>=4) $totalprofileupdated=($totalprofileupdated+1);
            
		} }

    echo"<div class='container'>
        <div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> My Dashboard</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php'>Dashboard</a></li>                            
                            </ul>
                        </nav>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='index.php?url=helpdesk.php&id=5138' style='margin-top:18px'>Need Help?</a>&nbsp;&nbsp;
                        <a href='index.php?url=feedback.php&id=5138' style='margin-top:8px'>
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
                        <span style='font-size:12pt'>Good morning, $username $username2</span><br>
                        <span style='font0-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        
                    </div>              
                </div>
            </div>
            
            
            <div class='row'>
                <div class='mb-5'>
                    <div class='row g-2'>
                        <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=my_profile.php&id=100249'>
                            <div class='card hover-border-primary'  style='background-color:#1a9757' data-title='My Active Plans' data-intro='click to see detail.' data-step='1'>
                                </a><div class='card-body'>
                                    <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>My Profile</span><i data-acorn-icon='office' class='text-primary'></i>
                                </div><a href='index.php?url=my_profile.php&id=100249'>
                                <div class='cta-1 text-light' style='color:black'>$totalprofileupdated% <span style='font-size:12pt'>Completed</span></div>
                            </div>
                        </a></div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=projects.php&id=5229'>
                        <div class='card hover-border-primary' style='background-color:purple' data-title='Assigned Suppliers' data-intro='click to see detail.' data-step='2'>
                            </a><div class='card-body'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>My Project</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                </div><a href='index.php?url=projects.php&id=5229'>
                                <div class='cta-1 text-light' style='color:black'>$totalprojects <span style='font-size:12pt'>Active Projects</span></div>
                            </div>
                        </div>
                    </a></div>
                    <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=daily_schedules.php'>
                        <div class='card hover-border-primary' style='background-color:#1a9757' data-title='Today`s Schedule' data-intro='click to see detail.' data-step='3'>
                            </a><div class='card-body'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Today's Schedules</span><i data-acorn-icon='file-empty' class='text-primary'></i>
                                </div><a href='index.php?url=daily_schedules.php'>
                                <div class='cta-1 text-light' style='color:black'>$totalschedules <span style='font-size:12pt'>Schedules Today</span></div>
                            </div>
                        </div>
                    </a></div>
                    <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=unpaid_invoices.php&id=5162'>
                      <div class='card hover-border-primary' style='background-color:#d85151' data-title='Pending Invoices' data-intro='click to see detail.' data-step='4'>
                        <div class='card-body'></a>
                          <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                            <span>My Invoices</span><i data-acorn-icon='screen' class='text-primary'></i>
                          </div><a href='index.php?url=unpaid_invoices.php&id=5162'>
                          <div class='cta-1 text-light' style='color:black'>$totalpendinginvoices <span style='font-size:10pt'>Unpaid Invoices.</span></div>
                        </div>
                      </div>
                    </a></div>
                  </div>
                </div>

                <div class='col-12 col-md-3'>";
                    /*
                    <section class='scroll-section' id='polarChartTitle'>
                      <h2 class='small-title'>Positive/Negetive Reviews Chart</h2>
                      <div class='card mb-5'>
                        <div class='card-body'>
                          <div class='sh-35'>
                            <iframe name='chart_accounts' src='modules/feedback_chart.php?c=doughnut&v=M&uc=1&vm=$vmd' scrolling='no' border='0' frameborder='0' width='100%' height='260'>BROWSER NOT SUPPORTED</iframe>
                          </div>
                        </div>
                      </div>
                    </section>
                    */
                    echo"<section class='scroll-section' id='lineChartTitle'>";
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
                        
                        echo"<h2 class='small-title'>Weekly Schedule</h2>
                        <div class='card mb-5' style='background-color:#dc5f7f'><div class='card-body' style='min-height:410px'>";
                    
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
                                        
                                    echo"<div class='ibox '>
                                        <div class='ibox-content text-center'style='padding:5px;text-align:center'>
                                            <center>
                                                <div id='clockContainer' class='bg-info' style='border-radius:10px;'>
                                                    <div id='hour'></div><div id='minute'></div><div id='second'></div>
                                                </div>
                                            </center><br>";
                                            $tox=0;
                                            $tox1=0;
                                            // $r5x1 = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d1' and months='$mm1' and years='$y' and status='1' order by id asc";
                                            $r5x1 = "select * from shifting_allocation where clientid='".$rab7["id"]."' and months='$mm1' and years='$y' and status='1' order by id asc";
                                            $r5x2 = $conn->query($r5x1);
                                            if ($r5x2->num_rows > 0) { while($r5x3 = $r5x2 -> fetch_assoc()) { $tox=($tox+1); } }
                                            if($tox==1) $tox1="12";
                                            else if($tox==2) $tox1="6";
                                            else $tox1="4";
                                                
                                            $r5a = "select * from shifting_allocation where clientid='".$rab7["id"]."' and days='$d1' and months='$mm1' and years='$y' and status='1' order by id asc";
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
                                                                <td style='width:50%' align=center><span style='font-size:12pt'>Clock IN</span></td>
                                                                <td style='width:50%' align=center><span style='font-size:12pt'>Clock OUT</span</td>
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
                            } }    
                        echo"</div></div>
                    </section>";
                    
                    
                echo"</div>
                
                <div class='col-12 col-md-3'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Allocated Support Workers</h2>
                        <div class='card mb-5' style='background-color:purple'>
                            <div class='card-body' style='min-height:442px'>
                                <table class='table table-hover margin bottom'>
                                    <thead><tr><th>Support Workers & Location</th></tr></thead>
                                    <tbody>";
                                        $s71 = "select * from project where clientid='$cid' order by id asc";
                                        $r71 = $conn->query($s71);
                                        if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                            $s7 = "select * from project_team_allocation where projectid='".$rs71["id"]."' order by id asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {    
                                                $s72 = "select * from uerp_user where id='".$rs7["employeeid"]."' and status='1' order by id asc limit 1";
                                                $r72 = $conn->query($s72);
                                                if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                    echo"<tr>
                                                        <td align='left' style='font-size:10pt'>
                                                            ProjecT: ".$rs71["name"]."<br>
                                                            SW: ".$rs72["username"]." ".$rs72["username2"]."<br>
                                                            Location: ".$rs72["address"]."<br>Phone: <a href='tel:".$rs72["phone"]."'>".$rs72["phone"]."</a>
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
                
                <div class='col-12 col-md-6'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Financial Budget Chart</h2>
                        <div class='card mb-5'><div class='card-body' style='min-height:442px'>
                            <iframe name='chart_accounts' src='./modules/project_budget_chart.php?c=pie&v=M&uc=1&projectid=$myprojectid' scrolling='no' border='0' frameborder='0' width='100%' height='370'>BROWSER NOT SUPPORTED</iframe>
                        </div></div>
                    </section>
                </div>
                
                <div class='col-12 col-md-12'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Allocated Budget Forcast & Breakdown</h2>
                        <div class='card mb-5' style='background-color:#195219' ><div class='card-body'>
                            <table style='width:100%' class='table table-hover'>
                                <thead><tr>
                                    <th style='text-align:left' scope='col'>Item Number</th>
                                    <th style='text-align:left' scope='col'>Worker & Weekdays</th>
                                    <th style='text-align:center' scope='col'>Scheduled</th>
                                    <th style='text-align:center' scope='col'>Days</th>
                                    <th style='text-align:center' scope='col'>Daily Hours</th>
                                    <th style='text-align:right' scope='col'>Hourly Rate</th>
                                    <th style='text-align:right' scope='col'>All Total</th>
                                </tr></thead>
                                <tbody>";
                                    $wsp11 = "select * from project where id='$myprojectid' and status='1' order by id desc limit 1";
                                    $wsp22 = $conn->query($wsp11);
                                    if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                        if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
                                        if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
                            
                                        $totalamountx=0;
                                        
                                        $ln1 = "select * from project_team_allocation where projectid='".$wsp33["id"]."' order by id asc";
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
                                
                                            echo"<tr style='padding:10px'>
                                                <th scope='row' style='font-size:12pt;width:30%'><span style='font-size:10pt'><b>$supportlinenumber</b></span><br>$supportname</td>
                                                <td style='width:20%;text-align:left'>";
                                                    $sb1 = "select * from uerp_user where id='".$ln3["employeeid"]."' order by id asc limit 1";
                                                    $rb1 = $conn->query($sb1);
                                                    if ($rb1->num_rows > 0) { while($rsb1 = $rb1->fetch_assoc()) { echo"".$rsb1["username"]." ".$rsb1["username2"].""; } }
                                                    echo"<br>
                                                    <table style='width:100%'><tr>";
                                                        if($ln3["mon"]==1) $d1="checked"; else $d1="disabled";
                                                        if($ln3["tue"]==1) $d2="checked"; else $d2="disabled";
                                                        if($ln3["wed"]==1) $d3="checked"; else $d3="disabled";
                                                        if($ln3["thu"]==1) $d4="checked"; else $d4="disabled";
                                                        if($ln3["fri"]==1) $d5="checked"; else $d5="disabled";
                                                        if($ln3["sat"]==1) $d6="checked"; else $d6="disabled";
                                                        if($ln3["sun"]==1) $d7="checked"; else $d7="disabled";
                                                        if($ln3["evening"]==1) $d8="checked"; else $d8="disabled";
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
                                                            
                                                        echo"<td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Mon<br><input type='checkbox' name='mon' value='1' $d1></td>
                                                            <td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Tue<br><input type='checkbox' name='tue' value='1' $d2></td>
                                                            <td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Wed<br><input type='checkbox' name='wed' value='1' $d3></td>
                                                            <td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Thu<br><input type='checkbox' name='thu' value='1' $d4></td>
                                                            <td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Fri<br><input type='checkbox' name='fri' value='1' $d5></td>
                                                            <td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Sat<br><input type='checkbox' name='sat' value='1' $d6></td>
                                                            <td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Sun<br><input type='checkbox' name='sun' value='1' $d7></td>
                                                            <td style='padding:5px;text-align:center;font-size:12pt;width:12.5%'>Evening<br><input type='checkbox' name='evening' value='1' $d8></td>
                                                    </tr></table>
                                                </td>           
                                                <td style='width:10%;text-align:center;font-size:12pt'>";
                                                    
                                                    if($ln3["time1"]==0) $tm1="08:00";
                                                    else $tm1=$ln3["time1"];
                                                    
                                                    $tm1x="08:00";
                                                    $tm1x = strtotime($tm1);
                                                    if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                                    else $tm2=$ln3["time2"];
                                                    
                                                    echo"$tm1 ~ $tm2";
                                                echo"</td>
                                                <td style='width:10%;text-align:center;font-size:12pt' nowrap>$wd Days<br>Excluding<br>$hd1 Holidays</td>
                                                <td style='width:10%;text-align:center;font-size:12pt'>".$ln3["qty1"].":".$ln3["qty2"]." Hr.</td>
                                                <td style='width:10%;text-align:right;font-size:12pt' nowrap>$".$ln3["rate1"]."</td>
                                                <td style='width:10%;text-align:right;font-size:12pt' nowrap><b>";
                                                    $totalamount=0;
                                                    $totalamount=($ln3["qty1"]*$wd);
                                                    $totalamount=($totalamount*$ln3["rate1"]);
                                                    $totalamountz = number_format($totalamount, 2, '.', ',');
                                                echo"$ $totalamountz</b></td>
                                            </tr>";
                                            
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
                        
                                        $tval=$budgetvalue;
                                        $tuse=0;
                                        $tbal=($tval-$tuse);
                                    } }
                                    
                                echo"</tbody>
                            </table>
                        </div></div>
                    </section>
                </div>
                
                <div class='col-12 col-md-6'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Total Budget Status</h2>
                        <div class='card mb-5' style='background-color:#6BBEEE;color:black'><div class='card-body' style='min-height:320px'>
                             <div style='width:100%;align:right;text-align:right'>
                                <br><br><table align=center width=100%>
                                    <thead><tr><th style='text-align:center'>Total Days</th><th style='text-align:center'>Scheduled Hours</th></tr></thead>
                                    <tbody>
                                        <tr>
                                            <td  style='text-align:center;font-size:15pt'><b>$allocateddays Days</b></td>
                                            <td style='text-align:center;font-size:15pt'><b>$allocatedhours : $allocatedminutes Hours</b></td>
                                        </tr>
                                    </tbody>
                                </table><hr>
                                <table align=center width=100%>
                                    <thead><tr>
                                        <th style='text-align:center;font-size:15pt'><b>Budget Value</th>
                                        <th style='text-align:center;font-size:15pt'><b>Spend</th>
                                        <th style='text-align:center;font-size:15pt'><b>Remaining</th>
                                    </tr></thead>
                                    <tr>";
                                        $budgetbalance=($budgetvalue-0);
                                        echo"<td style='text-align:center;font-size:15pt'><b>$ $budgetvaluex</b></td>
                                        <td style='text-align:center;font-size:15pt'><b>$ 0.00</b></td>
                                        <td style='text-align:center;font-size:15pt'><b>$ $budgetbalance</b></td>
                                    </tr>
                                </table>
                            </div>
                        </div></div>
                    </section>
                </div>
                
                <div class='col-12 col-md-6'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Financial Budget Chart</h2>
                        <div class='card mb-5'><div class='card-body'>
                            <iframe name='chart_accounts' src='./modules/project_pie_chart.php?c=pie&v=M&uc=1&projectid=$myprojectid&tval=$tval&tuse=$tuse&tbal=$tbal' scrolling='no' border='0' frameborder='0' width='100%' height='250'>BROWSER NOT SUPPORTED</iframe>
                        </div></div>
                    </section>
                </div>";
                
                /*
                echo"<div class='col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Last 15 Pending & Active Tasks</h2>
                        <div class='card mb-5' style='background-color:#1d9cd6'>
                            <div class='card-body' style='min-height:410px'>
                                <table class='table table-hover margin bottom'>
                                    <tbody>";
                                        $rax = "select * from tasks where clientid='".$_COOKIE["userid"]."' and activity='1' and status='1' OR clientid='".$_COOKIE["userid"]."' and activity='2' and status='1' order by id desc";
                                        $rbx = $conn->query($rax);
                                        if ($rbx->num_rows > 0) { while($rs = $rbx->fetch_assoc()) { 
                                            
                                            $pdate="";    
                                            $pdate=date("d-M-Y",$rs["tdate"]);
                                                
                                            $employeename="";
                                            $r1x = "select * from uerp_user where id='".$rs["employeeid"]."' order by id asc limit 1";
                                            $r1y = $conn->query($r1x);
                                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"]." ".$r1z["username2"].""; } }
                                            
                                            echo"<tr><td align='left' style='font-size:10pt'>$pdate<br>$employeename<br><b>".$rs["title"]."</b></td></tr>";
                                        } }
                                    echo"</tbody>
                                </table>";
                                echo"<center><a href='index.php?url=task_manager.php&id=58' class='btn btn-primary btn-sm'>View Tasks</a>";
                            echo"</div>
                        </div>
                    </section>
                <br></div>
                */
                
                echo"<div class='col-12 col-md-12'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Schedules & Tasks</h2>";
                        include ("appointments.php");
                    echo"</selection>
                </div>";
                
                $todaydate=time();
                $todaydatex=date("Y-m-d", $todaydate);
                $todaydate1=date("Y-m-d", strtotime($todaydatex . '-3 day'));
                $todaydate2=date("Y-m-d", strtotime($todaydatex . '+5 day'));
                $todayx=strtotime($todaydate1);
                $todayy=strtotime($todaydate2);
                echo"<div class='col-md-4'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Time Sheet <span style='font-size:12pt'>- ($todaydate1-$todaydate2)</span></h2>
                        <div class='card mb-5'  style='background-color:#dc5f7f;padding:0px'>
                            <div class='card-body'  style='min-height:410px;padding:5px'>
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
                                            $r5a = "select * from shifting_allocation where clientid='$cid' and sdate>='$todayx' and sdate<='$todayy2' and status='1' order by sdate asc";
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
                                                
                                                    echo"<td nowrap style='font-size:12pt'>
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
                                                    
                                                    echo"<td align=left nowrap style='font-size:12pt'>
                                                        <b>$employeename</b><br>$stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX
                                                    </td>
                                                    <td nowrap align=left style='font-size:12pt'>
                                                        <b>$clockin</b> - <b>$clockout</b><br>";
                                                        // if($r5c["payroll"]=="1") echo"<span style='color:grey'>$ $payable</span><br><span style='color:blue'><b>PAID</b></span><br>";
                                                        // else echo"<b>$ $payable</b>";
                                                        echo"<b>---</b>";
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
                
                <div class='col-12 col-md-8'>";
                    
                    $eods=0;
                    $rax = "select * from eod where clientid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    $rbx = $conn->query($rax);
                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $eods=($eods+1); } }
                    
                    $bocs=0;
                    $rax = "select * from boc where clientid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    $rbx = $conn->query($rax);
                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $bocs=($bocs+1); } }
                    
                    $incidents=0;
                    $rax = "select * from incident where clientid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    $rbx = $conn->query($rax);
                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $incidents=($incidents+1); } }
                    
                    $cases=0;
                    $rax = "select * from casenote where clientid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    $rbx = $conn->query($rax);
                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $cases=($cases+1); } }
                    
                    $complains=0;
                    $rax = "select * from complaintnote where clientid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    $rbx = $conn->query($rax);
                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $complains=($complains+1); } } 
                    
                    $gforms=0;
                    $rax = "select * from general_forms where clientid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    $rbx = $conn->query($rax);
                    if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $gforms=($gforms+1); } } 
                    
                    echo"<div class='row'>
                        <h2 class='small-title'>DOCUMENTS REPORTED</h2>                        
                        <div class='col-12 col-md-4 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <a href='index.php?url=eod-reports.php&id=5200'>
                                        <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                            <i data-acorn-icon='alarm' class='text-white'></i>
                                        </div>
                                    </a>
                                    <p class='mb-0 lh-1'>EOD Submitted</p>
                                    <a href='index.php?url=eod-reports.php&id=5200'><p class='cta-3 mb-0 text-primary'>$eods+</p></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-12 col-md-4 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <a href='index.php?url=boc-reports.php&id=5200'>
                                        <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                            <i data-acorn-icon='navigate-diagonal' class='text-white'></i>
                                        </div>
                                    </a>
                                    <p class='mb-0 lh-1'>BOC Submitted</p>
                                    <a href='index.php?url=boc-reports.php&id=5200'><p class='cta-3 mb-0 text-primary'>$bocs+</p></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-12 col-md-4 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <a href='index.php?url=incident-reports.php&id=5200'>
                                        <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                            <i data-acorn-icon='check-circle' class='text-white'></i>
                                        </div>
                                    </a>
                                    <p class='mb-0 lh-1'>Incident Reported</p>
                                    <a href='index.php?url=incident-reports.php&id=5200'><p class='cta-3 mb-0 text-primary'>$incidents+</p></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-12 col-md-4 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <a href='index.php?url=case-reports.php&id=5200'>
                                        <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                            <i data-acorn-icon='check-circle' class='text-white'></i>
                                        </div>
                                    </a>
                                    <p class='mb-0 lh-1'>Case Reported</p>
                                    <a href='index.php?url=case-reports.php&id=5200'><p class='cta-3 mb-0 text-primary'>$cases (+/-)</p></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-12 col-md-4 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <a href='index.php?url=complaint-reports.php&id=5200'>
                                        <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                            <i data-acorn-icon='check-circle' class='text-white'></i>
                                        </div>
                                    </a>
                                    <p class='mb-0 lh-1'>Complains Solved</p>
                                    <a href='index.php?url=complaint-reports.php&id=5200'><p class='cta-3 mb-0 text-primary'>$complains</p></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-12 col-md-4 p-10'>
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
                
            </div>



    </main>";
?>
    <script src='js/plugins/carousels.js'></script>

    <style>
    #clockContainer {
        position: relative;
        margin: auto;
        height: 100px;
        width: 100px;
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