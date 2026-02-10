<?php
    error_reporting(0);
    
    date_default_timezone_set("Australia/Melbourne");
    
    include("../authenticator.php");

    $cdate=time();
    $vmd=date("Y-m", $cdate);
    $vyd=date("Y", $cdate);
    $cdate=date("d-m-Y", $cdate);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;
    
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    $totalreceived=0.00;
    $rv1 = "select * from receipt_voucher where status='ON' order by id asc";
    $rv2 = $conn->query($rv1);
    if ($rv2->num_rows > 0) { while($rv3 = $rv2->fetch_assoc()) { $totalreceived=($totalreceived+$rv3["cr_amt"]); } }
    $totalreceived= number_format($totalreceived,2,".",",");
    
    $todayreceived=0.00;
    $rv4 = "select * from receipt_voucher where status='ON' and receipt_date>='$timestamp' order by id asc";
    $rv5 = $conn->query($rv4);
    if ($rv5->num_rows > 0) { while($rv6 = $rv5->fetch_assoc()) { $todayreceived=($todayreceived+$rv6["cr_amt"]); } }
    $todayreceived= number_format($todayreceived,2,".",",");

    $totalpaid=0.00;
    $pv1 = "select * from payment_voucher where status='ON' order by id asc";
    $pv2 = $conn->query($pv1);
    if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalpaid=($totalpaid+$pv3["dr_amt"]); } }
    $totalpaid= number_format($totalpaid,2,".",",");

    $todaypaid=0.00;
    $pv4 = "select * from payment_voucher where status='ON' and payment_date>='$timestamp' order by id asc";
    $pv5 = $conn->query($pv4);
    if ($pv5->num_rows > 0) { while($pv6 = $pv5->fetch_assoc()) { $todaypaid=($todaypaid+$pv6["dr_amt"]); } }
    $todaypaid= number_format($todaypaid,2,".",",");
    
    
    echo"<div class='container'>
            <div class='hide-area page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>CARE MANAGED Dashboard</h1>
                        <span style='font-size:12pt'>Welcome to $companynamex, $username $username2</span><br>
                        <span style='font0-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=aged_care_dashboard.php&id=55'>AGED CARE</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=aged_care_dashboard.php&id=55'>Dashboard</a></li>                            
                            </ul>
                        </nav>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='#' class='d-flex user position-relative' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                            if(strlen("$favicon")>=3){
                                if (!file_exists($favicon) || empty($favicon)) {
                                    echo"<img class='profile' alt='profile' src='assets/noimage.png' style='height:90px' />";
                                } else echo"<img class='profile' alt='profile' src='$favicon' style='height:90px'/>";
                            } else echo"<img class='profile' alt='profile' src='assets/noimage.png' style='height:90px' />";
                        echo"</a>
                    </div>              
                </div>
            </div>
            <div class='row'>
                
                <div class='col-12 mb-5'>
                    <section class='scroll-section' id='vertical'>
                        <div class='row g-2'>";
                            
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=leads.php&id=6' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox1' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                <a href='$mainurl/index.php?url=leads.php&id=6' target='_self'><span style='color:white'>CRM Leads</span></a>
                            </center></div></div>
                                <script>document.getElementById('randomColorBox1').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=projects.php&id=5229' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox2' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=projects.php&id=5229' target='_self'><span style='color:white'>HCP Recipients</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox2').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=accounts_dashboard.php&id=5207' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox3' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=accounts_dashboard.php&id=5207' target='_self'><span style='color:white'>Accounts</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox3').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=hrm_dashboard.php&id=5258' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox4' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=hrm_dashboard.php&id=5258' target='_self'><span style='color:white'>HR</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox4').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5325' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox5' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5325' target='_self'><span style='color:white'>Quality</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox5').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=emails.php&id=5199&pstat=1&stat=&sourcefrom=' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox6' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=emails.php&id=5199&pstat=1&stat=&sourcefrom=' target='_self'><span style='color:white'>Marketing</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox6').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=clients.php&id=60' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox7' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=clients.php&id=60' target='_self'><span style='color:white'>HCP Family Portal</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox7').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5303' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox8' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5303' target='_self'><span style='color:white'>Continuous Improvement</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox8').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=case_notes.php&id=5244' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox9' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=case_notes.php&id=5244' target='_self'><span style='color:white'>Case Management</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox9').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=schedule.php&id=5238&src_employeeid=' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox10' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=schedule.php&id=5238&src_employeeid=' target='_self'><span style='color:white'>Scheduling</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox10').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=incident.php&id=5243' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox11' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=incident.php&id=5243' target='_self'><span style='color:white'>WHS Incidents</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox11').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5286&empid=0&pinter=1' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox12' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5286&empid=0&pinter=1' target='_self'><span style='color:white'>Policies & Procedures</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox12').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5327' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox13' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5327' target='_self'><span style='color:white'>Resources</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox13').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=contractor.php&id=60' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox14' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=contractor.php&id=60' target='_self'><span style='color:white'>Contractor Portal</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox14').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                             echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=meetings.php&id=5199' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox15' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=meetings.php&id=5199' target='_self'><span style='color:white'>Meetings</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox15').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=clinical.php&id=60' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox16' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=clinical.php&id=60' target='_self'><span style='color:white'>Clinical</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox16').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5304' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox17' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5304' target='_self'><span style='color:white'>Training</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox17').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5300' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox18' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=document_manager.php&id=62&categoryid=5300' target='_self'><span style='color:white'>Feedback</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox18').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=clients.php&id=60' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox19' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=clients.php&id=60' target='_self'><span style='color:white'>Recipient HUB</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox19').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            echo"<div class='col-6 col-sm-6 col-md-2'><a href='$mainurl/index.php?url=employees.php&id=41' target='_self'>
                                <div class='card hover-border-primary' id='randomColorBox20' style='height:80px;color:white;background-color:black'><div class='card-body'><center>
                                    <a href='$mainurl/index.php?url=employees.php&id=41' target='_self'><span style='color:white'>Support Worker Portal</span></a>
                                </center></div></div>
                                <script>document.getElementById('randomColorBox20').style.backgroundColor='#'+Math.floor(Math.random()*16777215).toString(16);</script>
                            </a></div>";
                            
                        echo"</div>
                    </section>
                </div>
                
                <div class='col-12 col-md-4 mb-5'>
                    <h2 class='small-title'>Last 5 Projects</h2>
                    <div class='card h-100-card'>
                        <div class='card-body'>
                            <div class='scroll-out'>
                                <div class='scroll-by-count mb-n2' data-childSelector='.scroll-item' data-count='5'>";
                                    $aaa1 = "select * from project where status='1' order by id asc";
                                    $aa1 = $conn->query($aaa1);
                                    if ($aa1->num_rows > 0) { while($a1 = $aa1->fetch_assoc()) {
                                        $clientname1="";
                                        $clientname2="";
                                        $clientimage="";
                                        $ra2 = "select * from uerp_user where id='".$a1["clientid"]."' order by id asc limit 1";
                                        $rb2 = $conn->query($ra2);
                                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                            $clientname1=$rab2["username"];
                                            $clientname2=$rab2["username2"];
                                            $clientimage=$rab2["images"];
                                        } }

                                        $leadername1="";
                                        $leadername2="";
                                        $leaderimage="";
                                        $ra3 = "select * from uerp_user where id='".$a1["leaderid"]."' order by id asc limit 1";
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

                                        echo"<div class='mb-2 scroll-item'>
                                            <div class='row g-0 sh-10 sh-sm-7'>
                                                <div class='col-auto'>
                                                    <img src='$clientimage' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                                                        <div class='d-flex flex-column mb-2 mb-sm-0'>
                                                            <div>".$a1["name"]." @ $clientname1 $clientname2</div>
                                                            <div class='text-small text-muted'>By $leadername1 $leadername2</div>
                                                        </div>
                                                        <div class='d-flex'>
                                                            <a href='client-cb-set.php?pstat=1&projectidx=".$a1["id"]."'>
                                                                <button class='btn btn-outline-secondary btn-sm' type='button'>View</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    } }
                                echo"</div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class='col-12 col-md-4 mb-5'>
                    <section class='scroll-section' id='vertical'>
                        <h2 class='small-title'>Notive & Activity Logs</h2>
                        <div class='card mb-5'>
                            <div class='card-body scroll-out'>
                                <div class='scroll sh-35'>";
                                    $t=0;
                                    $al1 = "select * from audit where status='1' order by id desc limit 20";
                                    $al2 = $conn->query($al1);
                                    if ($al2->num_rows > 0) { while($al3 = $al2->fetch_assoc()) {
                                        $al1x = "select * from uerp_user where id='".$al3["sourceid"]."' order by id desc limit 1";
                                        $al2x = $conn->query($al1x);
                                        if ($al2x->num_rows > 0) { while($al3x = $al2x->fetch_assoc()) { $employeename="".$al3x["username"]." ".$al3x["username2"].""; } }
                                        $t= rand(100000,999999);
                                        $tdate=date("h:i:s a",$al3["date"]);
                                        echo"<div class='timeline-item'><div class='row'>
                                            <div class='col content'>
                                                <p class='m-b-xs' style='color:#$t'><strong><i class='fa fa-coffee'></i> $employeename at &nbsp;$tdate</strong><br>".$al3["note"]."</p>
                                            </div>
                                        </div></div>";
                                    } }
                                echo"</div>
                            </div>
                        </div>
                    </section>
                </div>
                
                <div class='col-12 col-md-4 mb-5'>
                    <section class='scroll-section' id='vertical'>
                        <h2 class='small-title'>Notice Board</h2>
                        <div class='card mb-5'>
                            <div class='card-body scroll-out'>
                                <div class='scroll sh-35'>";
                                    if($mtype=="ADMIN") $n1 = "select * from tasks where activity='0' and status='1' order by 'id' desc";
                                    else if ($mtype=="USER") $n1 = "select * from tasks where employeeid='$userid' and activity='0' and status='1' order by 'id' desc";
                                    else $n1 = "select * from tasks where clientid='$userid' and activity='0' and status='1' order by 'id' desc";
                                    $n11 = $conn->query($n1);
                                    if ($n11->num_rows > 0) { while($n111 = $n11->fetch_assoc()) {
                                        $simage="img/default.jpg";
                                        $clientname="";
                                        $projectname="";
                                        $c = "select * from project where id='".$n111["clientid"]."' order by id asc limit 1";
                                        $d = $conn->query($c);
                                        if ($d->num_rows > 0) { while($cd = $d -> fetch_assoc()) {
                                            $projectname=$cd["name"];
                                            $cx = "select * from uerp_user where id='".$cd["clientid"]."' order by id asc limit 1";
                                            $dx = $conn->query($cx);
                                            if ($dx->num_rows > 0) { while($cdx = $dx -> fetch_assoc()) {
                                                $clientname="".$cdx["username"]." ".$cdx["username2"]."";
                                                $simage=$cdx["images"];
                                            }}
                                        } }
                                        $sdate1=strtotime($n111["start"]);
                                        $sdate1=date("d-m-y", $sdate1);
                                        $sdate2=strtotime($n111["end"]);
                                        $sdate2=date("d-m-Y", $sdate2);
                                        echo"<li class='mb-3 pb-3 border-bottom border-separator-light d-flex'>
                                            <div class='align-self-center'>
                                                <a href='index.php?url=task_manager.php&id=58'>
                                                    <i data-acorn-icon='check-circle' data-acorn-size='18'></i> $sdate1 $sdate2 - $clientname  
                                                </a><br>
                                                <span style='font-size:8pt'>".$n111["title"]."</span>
                                            </div>
                                        </li>";
                                    } }
                                echo"</div>
                            </div>
                        </div>
                    </section>
                </div>
                
                <div class='col-12 col-md-4 mb-5'>
                    <section class='scroll-section' id='vertical'>
                        <h2 class='small-title'>Tasks Status</h2>
                        <div class='card mb-5'>
                            <div class='card-body scroll-out'>
                                <div class='scroll sh-35'>";
                                    $t1 = "select * from tasks where status='1' order by id desc";
                                    $tt1 = $conn->query($t1);
                                    if ($tt1->num_rows > 0) { while($ttt1 = $tt1->fetch_assoc()) { 
                                      $t2 = "select * from uerp_user where id='".$ttt1["employeeid"]."' and status='1' order by id desc limit 1";
                                      $tt2 = $conn->query($t2);
                                      if ($tt2->num_rows > 0) { while($ttt2 = $tt2->fetch_assoc()) { $ename="".$ttt2["username"]." ".$ttt2["username2"].""; } }
                                      $t3 = "select * from uerp_user where id='".$ttt1["clientid"]."' and status='1' order by id desc limit 1";
                                      $tt3 = $conn->query($t3);
                                      if ($tt3->num_rows > 0) { while($ttt3 = $tt3->fetch_assoc()) { $cname="".$ttt3["username"]." ".$ttt3["username2"].""; } }
                                      
                                      $tdate=date("d.m.y h:i", $rrr1['date']);
                                      
                                      if($rrr1['activity']==2){
                                        echo"<div class='mb-2'>
                                          <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                            <input type='checkbox' class='form-check-input' checked />
                                            <span class='form-check-label d-block'>
                                              <span>".$ttt1["title"]." assigned to <b>$ename</b> for Client <b>$cname</b></span>
                                              <span class='text-muted d-block text-small mt-0'>on $tdate</span>
                                            </span>
                                          </label>
                                        </div>";
                                      }else{
                                        echo"<div class='mb-2'>
                                          <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                            <input type='checkbox' class='form-check-input' />
                                            <span class='form-check-label d-block'>
                                              <span>".$ttt1["title"]." assigned to <b>$ename</b> for Client <b>$cname</b></span>
                                              <span class='text-muted d-block text-small mt-0'>on $tdate</span>
                                            </span>
                                          </label>
                                        </div>";
                                      }
                                    } }
                                echo"
                              </div>
                            </div>
                         </div>
                    </section>
                </div>
                
                <div class='col-12 col-md-8'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Client & Workers Nearby Locations on MAP</h2>
                        <div class='card mb-5'><div class='card-body' style='padding:10px'>
                            <iframe name='google_map' src='./modules/location_map.php?c=bar&v=M&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='600'>BROWSER NOT SUPPORTED</iframe>
                        </div></div>
                    </section>
                </div>
                ";
                
                /*
                <div class='col-xl-12 mb-5'>
                    <section class='scroll-section' id='vertical'>
                        <div class='row g-2'>";
                            $m1 = "select * from modules where parent='10011' and status='1' and profile='0' and dashboard='1' and orders<>'1' order by orders asc";
                            $m11 = $conn->query($m1);
                            if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                                $t=0;
                                $m2x = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                $m22x = $conn->query($m2x);
                                if ($m22x->num_rows > 0) { while($m222x = $m22x->fetch_assoc()) { $t=($t+1); } }
                                
                                if($t>=1){
                                    $m2 = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' and id<>'5254' and id<>'5255' order by orders asc";
                                    $m22 = $conn->query($m2);
                                    if ($m22->num_rows > 0) { while($m222 = $m22->fetch_assoc()) {
                                        $v1=0;
                                        $v2=0;
                                        $v1=strtolower($m222["name"]);
                                        $v2=str_replace(" ","_",$v1);                            
                                        echo"<div class='col-6 col-sm-6 col-lg-2'><a href='$mainurl/index.php?url=$v2.php&id=".$m222["id"]."' data-href='$mainurl/index.php?url=$v2.php&id=".$m222["id"]."'>
                                            <div class='card hover-border-primary' style='height:100px'><div class='card-body'><center><span>".$m222["name"]."</span></center></div></div>
                                        </a></div>";
                                    } }
                                } else {
                                    $v11=0;
                                    $v22=0;
                                    $v11=strtolower($m111["name"]);
                                    $v22=str_replace(" ","_",$v11); 
                                    echo"<div class='col-6 col-sm-6 col-lg-2'><a href='$mainurl/index.php?url=$v22.php&id=".$m111["id"]."' data-href='$mainurl/index.php?url=$v22.php&id=".$m111["id"]."'>
                                        <div class='card hover-border-primary' style='height:100px'><div class='card-body'><center><span>".$m111["name"]."</span></center></div></div>
                                    </a></div>";
                                }
                            } }
                        echo"</div>
                    </section>
                </div>
                */
                
            echo"</div>
        </div>";
        
    /*
    echo"<div class='container'>
        <div class='row'>
                <div class='mb-5'>
                    <div class='row g-2'>
                        <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=leads.php&id=62'>
                            <div class='card hover-border-primary' data-title='Active Projects' data-intro='Showing total active projects. click see detail.' data-step='1'>
                                <div class='card-body'>
                                    <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                        <span>Active Leads</span><i data-acorn-icon='office' class='text-primary'></i>
                                    </div>";
                                    $aet=0;
                                    $aes=0;
                                    $dnow=time();
                                    $aaa1 = "select * from leads where status='1' order by id asc";
                                    $aa1 = $conn->query($aaa1);
                                    if ($aa1->num_rows > 0) { while($a1 = $aa1->fetch_assoc()) {
                                        $aes=($aes+1);
                                        if($a1["onboard"]==0) $aet=($aet+1);
                                    } }
                                    echo"<div class='cta-1 text-primary'>$aet of <span style='color:red'>($aes)</span></div>
                                </div>
                            </a></div>
                        </div>
                        <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=task_manager.php&id=58'>
                            <div class='card hover-border-primary' data-title='Active Tasks' data-intro='Showing total active tasks. click see detail.' data-step='2'>
                                <div class='card-body'>
                                    <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                        <span>Active Tasks</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                    </div>";
                                    $ot=0;
                                    $ot1 = "SELECT * FROM tasks where activity='0' ORDER BY id desc";
                                    $tt1 = $conn->query($ot1);
                                    if ($tt1->num_rows > 0) { while($ttt1 = $tt1->fetch_assoc()) {  $ot=($ot+1); } }
                                    $op=0;
                                    $op1 = "SELECT * FROM tasks where activity='1' ORDER BY id desc";
                                    $oo1 = $conn->query($op1);
                                    if ($oo1->num_rows > 0) { while($ooo1 = $oo1->fetch_assoc()) { $op=($op+1); } }
                                    echo"<div class='cta-1 text-primary'>$ot <span style='font-size:8pt'>(+$op On Processing)</span></div>
                                </div>
                            </div>
                        </a></div>
                        <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=clock_in-out.php&id=5206'>
                          <div class='card hover-border-primary' data-title='Today`s Schedule' data-intro='Showing all rostered schedules for today and click on this link to see all schedules.' data-step='3'>
                            <div class='card-body'>
                              <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                <span>Today's Schedules</span><i data-acorn-icon='file-empty' class='text-primary'></i>
                              </div>";
                              $tst=0;
                              $tss=0;
                              $tday=date("d", time());
                              $tmonth=date("m", time());
                              $tyear=date("Y", time());
                              $ttt1 = "select * from shifting_allocation where days='$tday' and months='$tmonth' and years='$tyear' and status='1' order by id desc";
                              $tt1 = $conn->query($ttt1);
                              if ($tt1->num_rows > 0) { while($t1 = $tt1->fetch_assoc()) { 
                                  $tst=($tst+1);
                                  if($t1["clockin"]!=0) $tss=($tss+1);  
                              } }
                              echo"<div class='cta-1 text-primary'>$tss - $tst</div>
                            </div>
                          </div>
                        </a></div>
                        <div class='col-12 col-sm-6 col-lg-3'><a href='index.php?url=unpaid_invoices.php&id=5162'>
                          <div class='card hover-border-primary' >
                            <div class='card-body' data-title='Pending Invoices' data-intro='Total Pending Invoices, visit this link for notifying clients and get paid.' data-step='4'>
                              <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                <span>Pending Invoices</span><i data-acorn-icon='screen' class='text-primary'></i>
                              </div>";
                              $pi=0;
                              $pi1 = "select * from receipt_voucher where invoice_no<>'0' and paid='1' group by invoice_no";
                              $pp1 = $conn->query($pi1);
                              if ($pp1->num_rows > 0) { while($ppi1 = $pp1->fetch_assoc()) {  $pi=($pi+1); } }
                              echo"<div class='cta-1 text-primary'>$pi <span style='font-size:10pt'>( View Invoices )</span></div>
                            </div>
                          </div>
                        </a></div>
                    
                        <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=appointments.php'><div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                            <span>Appointments</span><br>";
                            $a1=0;
                            $a2=0;
                            $a3=0;
                            $ra1 = "select * from activity_logs where log_type='APPOINTMENT' order by id desc";
                            $ra2 = $conn->query($ra1);
                            if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) {
                                if($ra3["client_response"]==1) $a1=($a1+1);
                                if($ra3["client_response"]==0) $a2=($a2+1);
                                if($ra3["client_response"]==2) $a3=($a3+1);
                            } }
                            echo"<table style='width:100%'>
                                <tr><td>Active</td><td>:</td><td>$a1</td></tr>
                                <tr><td>Positive</td><td>:</td><td>$a2</td></tr>
                                <tr><td>Rejected</td><td>:</td><td>$a3</td></tr>
                            </table>";
                        echo"</div></div></a></div>
                        <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=calls'><div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                            <span>Calls Log</span><br>";
                            $a1=0;
                            $a2=0;
                            $a3=0;
                            $ra1 = "select * from activity_logs where log_type='CALL' order by id desc";
                            $ra2 = $conn->query($ra1);
                            if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) {
                                if($ra3["client_response"]==1) $a1=($a1+1);
                                if($ra3["client_response"]==0) $a2=($a2+1);
                                if($ra3["client_response"]==2) $a3=($a3+1);
                            } }
                            echo"<table style='width:100%'>
                                <tr><td>Active</td><td>:</td><td>$a1</td></tr>
                                <tr><td>Positive</td><td>:</td><td>$a2</td></tr>
                                <tr><td>Rejected</td><td>:</td><td>$a3</td></tr>
                            </table>";
                        echo"</div></div></a></div>
                        <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=emails'><div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                            <span>Emails Log</span><br>";
                            $a1=0;
                            $a2=0;
                            $a3=0;
                            $ra1 = "select * from activity_logs where log_type='EMAIL' order by id desc";
                            $ra2 = $conn->query($ra1);
                            if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) {
                                if($ra3["client_response"]==1) $a1=($a1+1);
                                if($ra3["client_response"]==0) $a2=($a2+1);
                                if($ra3["client_response"]==2) $a3=($a3+1);
                            } }
                            echo"<table style='width:100%'>
                                <tr><td>Active</td><td>:</td><td>$a1</td></tr>
                                <tr><td>Positive</td><td>:</td><td>$a2</td></tr>
                                <tr><td>Rejected</td><td>:</td><td>$a3</td></tr>
                            </table>";
                        echo"</div></div></a></div>
                        <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=meetings.php'><div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                            <span>Meetings Log</span><br>";
                            $a1=0;
                            $a2=0;
                            $a3=0;
                            $ra1 = "select * from activity_logs where log_type='MEETING' order by id desc";
                            $ra2 = $conn->query($ra1);
                            if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) {
                                if($ra3["client_response"]==1) $a1=($a1+1);
                                if($ra3["client_response"]==0) $a2=($a2+1);
                                if($ra3["client_response"]==2) $a3=($a3+1);
                            } }
                            echo"<table style='width:100%'>
                                <tr><td>Active</td><td>:</td><td>$a1</td></tr>
                                <tr><td>Positive</td><td>:</td><td>$a2</td></tr>
                                <tr><td>Rejected</td><td>:</td><td>$a3</td></tr>
                            </table>";
                        echo"</div></div></a></div>
                        <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=quotes.php'><div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                            <span>Quotes Log</span><br>";
                            $a1=0;
                            $a2=0;
                            $a3=0;
                            $ra1 = "select * from activity_logs where log_type='QUOTE' order by id desc";
                            $ra2 = $conn->query($ra1);
                            if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) {
                                if($ra3["client_response"]==1) $a1=($a1+1);
                                if($ra3["client_response"]==0) $a2=($a2+1);
                                if($ra3["client_response"]==2) $a3=($a3+1);
                            } }
                            echo"<table style='width:100%'>
                                <tr><td>Submitted</td><td>:</td><td>$a1</td></tr>
                                <tr><td>Accepted</td><td>:</td><td>$a3</td></tr>
                                <tr><td>Rejected</td><td>:</td><td>$a2</td></tr>
                            </table>";
                        echo"</div></div></a></div>
                        <div class='col-12 col-sm-6 col-lg-2'><a href='index.php?url=agreements.php'><div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                            <span>Agreements</span><br>";
                            $a1=0;
                            $a2=0;
                            $a3=0;
                            $ra1 = "select * from activity_logs where log_type='AGREEMENT' order by id desc";
                            $ra2 = $conn->query($ra1);
                            if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) {
                                if($ra3["client_response"]==1) $a1=($a1+1);
                                if($ra3["client_response"]==0) $a2=($a2+1);
                                if($ra3["client_response"]==2) $a3=($a3+1);
                            } }
                            echo"<table style='width:100%'>
                                <tr><td>Pending</td><td>:</td><td>$a1</td></tr>
                                <tr><td>Signed</td><td>:</td><td>$a3</td></tr>
                                <tr><td>Rejected</td><td>:</td><td>$a2</td></tr>
                            </table>";
                        echo"</div></div></a></div>
                        
                    </div>
                </div>
                
                <div class='mb-5'>
                    <div class='row'>
                        <div class='col-12 col-md-4'>
                            <div class='row g-2'>
                        
                                <div class='col-12'><a href='index.php?url=leaves.php&id=45'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $cw1=0;
                                    $ra1 = "select * from uerp_user where leave_status='2' order by id desc";
                                    $ra2 = $conn->query($ra1);
                                    if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) { $cw1=($cw1+1); } }
                                    echo"<table style='width:100%'><tr><td>Pending Leave Requests</td><td>:</td><td align='right' width='10'><b>$cw1</b></td></tr></table>
                                </div></div></a></div>
                                
                                <div class='col-12'><a href='index.php?url=leaves.php&id=45'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $cw1=0;
                                    $ra1 = "select * from uerp_user where leave_status='0' order by id desc";
                                    $ra2 = $conn->query($ra1);
                                    if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) { $cw1=($cw1+1); } }
                                    echo"<table style='width:100%'><tr><td>Workers on Leave</td><td>:</td><td align='right' width='10'><b>$cw1</b></td></tr></table>
                                </div></div></a></div>
                                
                                <div class='col-12'><a href='index.php?url=leaves.php&id=45'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $cw1=0;
                                    $ra1 = "select * from uerp_user where status<>'1' order by id desc";
                                    $ra2 = $conn->query($ra1);
                                    if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) { $cw1=($cw1+1); } }
                                    echo"<table style='width:100%'><tr><td>Clients on Hold</td><td>:</td><td align='right' width='10'><b>$cw1</b></td></tr></table>
                                </div></div></a></div>
                                
                                <div class='col-12'><a href='index.php?url=clients.php&id=5199'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $cw1=0;
                                    $ra1 = "select * from tasks where status='1' order by id desc";
                                    $ra2 = $conn->query($ra1);
                                    if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) { $cw1=($cw1+1); } }
                                    echo"<table style='width:100%'><tr><td>Pending Care Workers Notes</td><td>:</td><td align='right' width='10'><b>$cw1</b></td></tr></table>
                                </div></div></a></div>
                                
                                <div class='col-12'><a href='index.php?url=quotes.php&id=5199'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $cw1=0;
                                    $ra1 = "select * from tasks where status='1' order by id desc";
                                    $ra2 = $conn->query($ra1);
                                    if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) { $cw1=($cw1+1); } }
                                    echo"<table style='width:100%'><tr><td>Qualifications Expired / Soon</td><td>:</td><td align='right' width='10'><b>?</b></td></tr></table>
                                </div></div></a></div>
                                <div class='col-12'><a href='#'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $cw1=0;
                                    $ra1 = "select * from tasks where status='1' order by id desc";
                                    $ra2 = $conn->query($ra1);
                                    if ($ra2->num_rows > 0) { while($ra3 = $ra2->fetch_assoc()) { $cw1=($cw1+1); } }
                                    echo"<table style='width:100%'><tr><td>Package Schedules</td><td>:</td><td align='right' width='10'><b>?</b></td></tr></table>
                                </div></div></a></div>
                                
                                <div class='col-12'><a href='index.php?url=complaints.php&id=5200'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $boc=0;
                                    $boc1 = "select * from complaintnote order by id desc";
                                    $boc2 = $conn->query($boc1);
                                    if ($boc2->num_rows > 0) { while($boc3 = $boc2->fetch_assoc()) { $boc=($boc+1); } }
                                    echo"<table style='width:100%'><tr><td>Complains Solved</td><td>:</td><td align='right' width='10'><b>$boc</b></td></tr></table>
                                </div></div></a></div>
                                
                                <div class='col-12'><a href='index.php?url=complaints.php&id=5200'><div class='card hover-border-warning'><div class='card-body' style='padding:10px'>";
                                    $boc=0;
                                    $boc1 = "select * from general_forms order by id desc";
                                    $boc2 = $conn->query($boc1);
                                    if ($boc2->num_rows > 0) { while($boc3 = $boc2->fetch_assoc()) { $boc=($boc+1); } }
                                    echo"<table style='width:100%'><tr><td>General Documents</td><td>:</td><td align='right' width='10'><b>$boc</b></td></tr></table>
                                </div></div></a></div>
                                
                            </div>
                        </div>
                        <div class='col-12 col-md-4'>
                            <section class='scroll-section' id='doughnutChartTitle'>
                                <h2 class='small-title'>Tasks Status Chart</h2>
                                <div class='card mb-5'>
                                    <div class='card-body'>
                                        <div class='sh-35' data-title='Task Status Chart' data-intro='Showing Total Tasks Status (Pending, Processing and Completed).' data-step='12'>
                                            <iframe name='chart_accounts' src='./modules/tasks_chart.php?c=doughnut&v=M&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='260'>BROWSER NOT SUPPORTED</iframe>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class='col-12 col-md-4'>
                            <h2 class='small-title'>Today's & Upcoming Appointments</h2>
                            <table style='width:100%'>";
                                $ra3 = "select * from appointments where status='1' order by id asc limit 10";
                                $rb3 = $conn->query($ra3);
                                if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                                    $clientname="";
                                        $ra4 = "select * from uerp_user where id='".$rab3["clienid"]."' order by id asc limit 1";
                                        $rb4 = $conn->query($ra4);
                                        if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $clientname="".$rab4["username"]." ".$rab4["username2"].""; } }
                                        $supportworker="";
                                        $ra5 = "select * from uerp_user where id='".$rab3["support_worker"]."' order by id asc limit 1";
                                        $rb5 = $conn->query($ra5);
                                        if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $supportworker="".$rab5["username"]." ".$rab5["username2"].""; } }
                                            
                                        $appdate=date("d-m-Y",$rab3["date"]);
                                        $apptime=date("H:i:s",$rab3["date"]);
                                        echo"<tr>
                                            <td><span style='font-size:8pt'>".$rab3["note"]."<br><span style='font-size:6pt'>$clientname ($supportworker)</span></td>
                                            <td valign=top align=right nowrap width=10><span style='font-size:8pt'>$appdate<br><b>$apptime</b></span></td>
                                        </tr>";
                                } }
                            echo"</table>
                        </div>
                    </div>
                </div>

                <div class='col-12 col-md-12'>
                    <section class='scroll-section' id='lineChartTitle'>
                        <h2 class='small-title'>Client & Workers Nearby Locations on MAP</h2>
                        <div class='card mb-5'><div class='card-body' style='padding:10px'>
                            <iframe name='google_map' src='./modules/location_map.php?c=bar&v=M&uc=1' scrolling='no' border='0' frameborder='0' width='100%' height='600'>BROWSER NOT SUPPORTED</iframe>
                        </div></div>
                    </section>
                </div>
                
                 <!-- Doughnut Chart End -->
                 
                    <div class='row' data-title='Accounts Income & Expenses' data-intro='showing total payment received and expnse payout.' data-step='13'> 
                        <div class='col-12 col-lg-3'>
                            <div class='card sh-13'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px'>                                        
                                        <h2 class='small-title'>Total Received</h2>
                                        <span style='font-size:15pt'>$csymbol $totalreceived ($ccode)</span>
                                        <a href='index.php?url=receipt_voucher.php&id=5155'>View Report</a>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class='col-12 col-lg-3'>
                            <div class='card sh-13'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px'>                                        
                                        <h2 class='small-title'>Total Paid</h2>
                                        <span style='font-size:15pt'>$csymbol $totalpaid ($ccode)</span>
                                        <a href='index.php?url=payment_voucher.php&id=5155'>View Report</a>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class='col-12 col-sm-6 col-lg-3'>                            
                            <div class='card sh-13'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px'>                                        
                                        <h2 class='small-title'>Today's Receivings</h2>
                                        <span style='font-size:15pt'>$csymbol $todayreceived ($ccode)</span>
                                        <a href='index.php?url=receipt_voucher.php&id=5155'>View Received Vouchers</a>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                        <div class='col-12 col-sm-6 col-lg-3'>
                            <div class='card sh-13'>
                                <div class='card-body py-0 d-flex'>
                                    <div class='row g-0 d-flex w-100 align-items-center' style='padding:5px;line-height:0.5'>                                        
                                        <h2 class='small-title'>Today's Payments</h2>
                                        <span style='font-size:15pt'>$csymbol $todaypaid ($ccode)</span>
                                        <a href='index.php?url=payment_voucher.php&id=5156'>View Payment Vouchers</a>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    
                    
            <div class=row>       
                <div class='col-12 col-sm-6 col-lg-6'><br>
                    <section class='scroll-section' id='customHorizontalTooltipTitle'>
                        <h2 class='small-title'>Yearly Received & Payment Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-40'>
                                    <iframe name='chart_accounts' src='./modules/accounts_chart.php?c=line&v=Y&vy=$vyd' scrolling='no' border='0' frameborder='0' width='100%' height='330'>BROWSER NOT SUPPORTED</iframe>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class='col-12 col-sm-6 col-lg-6'><br>
                    <section class='scroll-section' id='customHorizontalTooltipTitle'>
                        <h2 class='small-title'>Monthly Received & Payment Chart</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='sh-40'>
                                    <iframe name='chart_accounts' src='./modules/accounts_chart.php?c=line&v=M&vm=$vmd' scrolling='no' border='0' frameborder='0' width='100%' height='330'>BROWSER NOT SUPPORTED</iframe>
                                </div>
                            </div>
                        </div>
                    </section>  
                </div>

                <div class='col-12 col-md-6'>
                    <section class='scroll-section' id='labels'>
                      <h2 class='small-title'>Last 5 Payment Vouchers</h2><br>
                      <div class='card-body pt-0 pb-0 h-100'>
                        <div class='data-table-rows slim' id='sample'>
                          <div class='data-table-responsive-wrapper'>
                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                              <thead><tr>                                                    
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Date</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Ledger ID</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Amount</th>
                              </tr></thead>
                              <tbody>
                                <div class='card-body' style='margin-top:-65px;width:100%'>";
                                  
                                  $s1 = "select * from receipt_voucher order by id asc limit 5";
                                  $r1 = $conn->query($s1);
                                  if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);                
                                    $ledgername="0";
                                    $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                    if($ledgername=="0"){
                                      $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                      $r1bc = $conn->query($s1bc);
                                      if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                    }
                                    $receivedfromname="";
                                    $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                    
                                    $rdate=date("d-m-Y",$rs1["receipt_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                      <td class='text-alternate' align=left>$rdate</td>
                                      <td class='text-alternate' align=left>$ledgername</td>                    
                                      <td class='text-alternate' align=right>$csymbol".$rs1["cr_amt"]."</td>
                                    </tr>";
                                  } }
                                echo"</div>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </section>
                    <br><br>
                </div>

                <div class='col-12 col-md-6'>
                    <section class='scroll-section' id='labels'>
                      <h2 class='small-title'>Last 5 Received Vouchers</h2><br>
                      <div class='card-body pt-0 pb-0 h-100'>
                        <div class='data-table-rows slim' id='sample'>
                          <div class='data-table-responsive-wrapper'>
                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                              <thead><tr>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Date</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Ledger ID</th>
                                <th class='text-muted text-small text-uppercase' style='text-align:center'>Amount</th>                
                              </tr></thead>
                              <tbody>
                                <div class='card-body' style='margin-top:-65px;width:100%'>";
                                  
                                  $s1 = "select * from receipt_voucher order by id desc limit 5";
                                  $r1 = $conn->query($s1);
                                  if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);                
                                    $ledgername="0";
                                    $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                    if($ledgername=="0"){
                                      $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                      $r1bc = $conn->query($s1bc);
                                      if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                    }
                                    $receivedfromname="";
                                    $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                    
                                    $rdate=date("d-m-Y",$rs1["receipt_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                      <td class='text-alternate' align=left>$rdate</td>
                                      <td class='text-alternate' align=left>$ledgername</td>                    
                                      <td class='text-alternate' align=right>$csymbol".$rs1["cr_amt"]."</td>
                                    </tr>";
                                  } }
                                echo"</div>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </section>
                </div>  
                
                <div class='col-12 col-md-6'><br><br>
                    <section class='scroll-section' id='polarChartTitle'>
                      <h2 class='small-title'>Positive/Negetive Reviews Chart</h2>
                      <div class='card mb-5'>
                        <div class='card-body'>
                          <div class='sh-45'>
                            <iframe name='chart_accounts' src='modules/feedback_chart.php?c=doughnut&v=M&uc=1&vm=$vmd' scrolling='no' border='0' frameborder='0' width='100%' height='260'>BROWSER NOT SUPPORTED</iframe>
                          </div>
                        </div>
                      </div>
                    </section>
                </div>
                  
             <div class='col-12 col-md-6 mb-5'><br><br>
              <h2 class='small-title'>Last 5 Project/Leads</h2>
              <div class='card h-100-card'>
                <div class='card-body'>
                  <div class='scroll-out'>
                    <div class='scroll-by-count mb-n2' data-childSelector='.scroll-item' data-count='5'>";
                      $aaa1 = "select * from project where status='1' order by id asc";
                      $aa1 = $conn->query($aaa1);
                      if ($aa1->num_rows > 0) { while($a1 = $aa1->fetch_assoc()) {
                        $clientname1="";
                        $clientname2="";
                        $clientimage="";
                        $ra2 = "select * from uerp_user where id='".$a1["clientid"]."' order by id asc limit 1";
                        $rb2 = $conn->query($ra2);
                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                            $clientname1=$rab2["username"];
                            $clientname2=$rab2["username2"];
                            $clientimage=$rab2["images"];
                        } }

                        $leadername1="";
                        $leadername2="";
                        $leaderimage="";
                        $ra3 = "select * from uerp_user where id='".$a1["leaderid"]."' order by id asc limit 1";
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

                        echo"<div class='mb-2 scroll-item'>
                          <div class='row g-0 sh-10 sh-sm-7'>
                            <div class='col-auto'>
                              <img src='$clientimage' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                                <div class='d-flex flex-column mb-2 mb-sm-0'>
                                  <div>".$a1["name"]." @ $clientname1 $clientname2</div>
                                  <div class='text-small text-muted'>By $leadername1 $leadername2</div>
                                </div>
                                <div class='d-flex'>
                                  <a href='client-cb-set.php?pstat=1&projectidx=".$a1["id"]."'>
                                    <button class='btn btn-outline-secondary btn-sm' type='button'>View</button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>";
                      } }
                    echo"</div>
                  </div>
                </div>
              </div>
            </div>

                  <div class='col-md-6 mb-5'>
                    <section class='scroll-section' id='vertical'>
                      <h2 class='small-title'>Daily Time Logs</h2>
                      <div class='card mb-5'>
                        <div class='card-body scroll-out'>
                            <div class='scroll sh-35'>";
                              $todayx=time();
                              $r5a = "select * from shifting_allocation where sdate>='$todayx' and status='1' order by sdate asc";
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
    
                                echo"<div class='row g-0 mb-2'>
                                  <div class='col-auto'>
                                    <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                      <div class='text-muted mt-n1 lh-1-25'>$sday ($clockin - $clockout)</div>
                                    </div>
                                  </div>
                                  <div class='col-auto'><div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                      <div class='sh-3'><i data-acorn-icon='circle' class='text-primary align-top'></i></div>
                                  </div></div>
                                  <div class='col'><div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                      <div class='d-flex flex-column'><div class='text-alternate mt-n1 lh-1-25'>";
                                        if($mtype=="ADMIN") echo"<b>$employeename</b><br><a href='tel:$employeephone'>$employeephone</a><br>";
                                        echo"<b>$clientname</b><br>$projectname<br>$stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX";
                                      echo"</div></div>
                                  </div></div>
                                </div>";
                              } }
                            echo"</div>
                          </div>
                      </div>
                    </section>
                  </div>";
                  
                  echo"<div class='col-md-6 mb-5'><br><br>
                    <section class='scroll-section' id='vertical'>
                      <h2 class='small-title'>Tasks Status</h2>
                      <div class='card mb-5'>
                        <div class='card-body scroll-out'>
                            <div class='scroll sh-35'>";
                                $t1 = "select * from tasks where status='1' order by id desc";
                                $tt1 = $conn->query($t1);
                                if ($tt1->num_rows > 0) { while($ttt1 = $tt1->fetch_assoc()) { 
                                  $t2 = "select * from uerp_user where id='".$ttt1["employeeid"]."' and status='1' order by id desc limit 1";
                                  $tt2 = $conn->query($t2);
                                  if ($tt2->num_rows > 0) { while($ttt2 = $tt2->fetch_assoc()) { $ename="".$ttt2["username"]." ".$ttt2["username2"].""; } }
                                  $t3 = "select * from uerp_user where id='".$ttt1["clientid"]."' and status='1' order by id desc limit 1";
                                  $tt3 = $conn->query($t3);
                                  if ($tt3->num_rows > 0) { while($ttt3 = $tt3->fetch_assoc()) { $cname="".$ttt3["username"]." ".$ttt3["username2"].""; } }
                                  
                                  $tdate=date("d.m.y h:i", $rrr1['date']);
                                  
                                  if($rrr1['activity']==2){
                                    echo"<div class='mb-2'>
                                      <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                        <input type='checkbox' class='form-check-input' checked />
                                        <span class='form-check-label d-block'>
                                          <span>".$ttt1["title"]." assigned to <b>$ename</b> for Client <b>$cname</b></span>
                                          <span class='text-muted d-block text-small mt-0'>on $tdate</span>
                                        </span>
                                      </label>
                                    </div>";
                                  }else{
                                    echo"<div class='mb-2'>
                                      <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                        <input type='checkbox' class='form-check-input' />
                                        <span class='form-check-label d-block'>
                                          <span>".$ttt1["title"]." assigned to <b>$ename</b> for Client <b>$cname</b></span>
                                          <span class='text-muted d-block text-small mt-0'>on $tdate</span>
                                        </span>
                                      </label>
                                    </div>";
                                  }
                                } }
                            echo"
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>

                  
                  
            </div>
        </div>
    </div>";
    */
?>
                
