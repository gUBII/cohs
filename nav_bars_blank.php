<?php
    $tutorialx=0;
    echo"<div id='nav' class='nav-container d-flex'>
        <div class='nav-content d-flex'>
            <div class='user-container d-flex' style='padding:5px'>
                <a href='#' class='d-flex user position-relative' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                if(strlen("$images")>=10) echo"<img class='profile' alt='profile' src='$images' />";
                else echo"<img class='profile' alt='profile' src='assets/noimage.png' />";
                echo"</a>
                <div class='dropdown-menu dropdown-menu-end user-menu wide' style='padding:5px'>
                    <div class='row mb-3 ms-0 me-0'>
                        <div class='col-12 ps-1 mb-2'><br>
                            <table style='width:100%;height:70px'><tr>
                                <td style='width:20%'>
                                    <img src='$favicon' alt='$favicon' style='padding:5px;width:50px;height:50px;border-radius:50%'>
                                </td><td style='padding:3px'>
                                    <span style='font-size:12pt'>$companynamex</span><br>
                                    <div class='text-extra-medium text-primary'>$username $username2</div>
                                    <div class='text-extra-small text-secondary'>Email: $email</div>
                                </td>
                            </tr></table>
                        </div>
                        <div class='col-12 ps-1 mb-2'><hr></div>
                        <div class='col-12 ps-1 pe-1'>
                            <ul class='list-unstyled'>
                                <li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='12'></i><a href='#'><span class='label'>$username $username2`s Profile</span></a></li>
                                <li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='12'></i><a href='#'><span class='label'>Help & Support Center</span></a></li>
                                <li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='12'></i><a href='#'><span class='label'>Tasks & Todo Manager</span></a></li>
                            </ul>
                        </div>
                        <div class='col-23 ps-1 pe-1'>
                            <ul class='list-unstyled'>";
                                echo"<li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='10'></i><a href='#'><span class='label'>Calendar</span></a></li>";
                                if($designationy==1 OR $designationy==2 OR $designationy==13) echo"<li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='12'></i><a href='#'><span class='label'>System Settings</span></a></li>";
                                echo"<li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='12'></i><a href='#'><span class='label'>My Contacts</span></a></li>
                                <li><i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='12'></i><a href='#'><span class='label'>Logout</span></a></li>
                            </ul>
                        </div>
                        <div class='col-12 ps-1 pe-1'><center><hr>
                            <table style='width:100%'><tr>
                                <td align=center><i data-acorn-icon='pin' data-acorn-size='18' onclick='getLocation()'></i></td>
                                <td align=center><i data-acorn-icon='camera' data-acorn-size='18' onclick='startCamera()'></i></td>
                                <td align=center><i data-acorn-icon='message' data-acorn-size='18' onclick='subscribeToNotifications()'></i></td>";
                                // <p id="location">Location will appear here...</p>
                                // <video id="video" autoplay style="display:none; width: 300px; height: auto;"></video>
                                // <canvas id="canvas" style="display:none;"></canvas>
                                // <button id="captureBtn" onclick="capturePhoto()" style="display:none;">Capture Photo</button>
                            echo"</tr></table>
                        </center><br></div>
                        <hr>
                        <div class='col-12 ps-1 pe-1'><center>";
                            if($sub_splan==1) $subscription_status="<b>30 Days Free Trial</b>";
                            $subscription_join_date=date("d-M-Y", $sub_jdate);
                            $subscription_expire_date=date("d-M-Y", $sub_edate);
                            if($sub_splan==0) echo"<span style='color:orange'>Please Activate Account for free.</span><br><br>";
                            else echo"<span>$subscription_status<br>Valid Till: $subscription_expire_date</span><br>";
                            
                            if($sub_splan<=1){ 
                                echo"<a href='#' style='margin-top:8px'>
                                  <button type='button' class='btn btn-outline-success btn-icon btn-icon-end w-100 w-sm-auto'>
                                      <span>Upgrade/Activate Plan</span><i data-acorn-icon='question'></i>
                                  </button>
                                </a>";
                            }else{
                                echo"<a href='#' style='margin-top:8px'>
                                  <button type='button' class='btn btn-outline-success btn-icon btn-icon-end w-100 w-sm-auto'>
                                      <span>Upgrade to Advanced Plan</span><i data-acorn-icon='question'></i>
                                  </button>
                                </a>";
                            }
                        echo"</center></div>
                    </div>
                </div>
            </div>
            <ul class='list-unstyled list-inline text-center menu-icons'>";
                // <li class='list-inline-item'><a href='$mainurl/index.php?'><i data-acorn-icon='home' data-acorn-size='18'></i></a></li>
                
                if($designationy==13){
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='AI Voice Search & Deploy'><a href='#' data-bs-toggle='modal' data-bs-target='#searchPagesModal'><i data-acorn-icon='search' data-acorn-size='18'></i></a></li>";
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Advanced AI Wizard to Scan & Process'><a href='#' data-bs-toggle='modal' data-bs-target='#aiPagesModal'><i data-acorn-icon='wizard' data-acorn-size='18'></i></a></li>";
                }else{
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Clock In & Out'>
                        <a href='#' aria-haspopup='true' aria-expanded='false' title='Clock IN & OUT'>
                            <div class='position-relative d-inline-flex'><i data-acorn-icon='clock' data-acorn-size='18' style='color:white'></i></div>
                        </a>
                    </li>";
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Task Manager'>
                        <a href='#' aria-haspopup='true' aria-expanded='false' title='Task Manager'>
                            <div class='position-relative d-inline-flex'><i data-acorn-icon='check-circle' data-acorn-size='18' style='color:white'></i></div>
                        </a>
                    </li>";
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Document Manager'>
                        <a href='#' aria-haspopup='true' aria-expanded='false' title='Document Manager'>
                            <div class='position-relative d-inline-flex'><i data-acorn-icon='file-text' data-acorn-size='18' style='color:white'></i></div>
                        </a>
                    </li>";
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Time Sheet'>
                        <a href='#' aria-haspopup='true' aria-expanded='false' title='Time Sheet'>
                            <div class='position-relative d-inline-flex'><i data-acorn-icon='check-circle' data-acorn-size='18' style='color:white'></i></div>
                        </a>
                    </li>";
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='My Expenses'>
                        <a href='#' aria-haspopup='true' aria-expanded='false' title='My Expenses'>
                            <div class='position-relative d-inline-flex'><i data-acorn-icon='wallet' data-acorn-size='18' style='color:white'></i></div>
                        </a>
                    </li>";
                }
                echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Take a Tour (Assistant)'><a href='#' id='dashboardTourButton'><i data-acorn-icon='flag' data-acorn-size='18'></i></a></li>";
                echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Lock/Unlock Navigation Bar'><a href='#' id='pinButton' class='pin-button'>
                    <i data-acorn-icon='lock-on' class='unpin' data-acorn-size='18'></i><i data-acorn-icon='lock-off' class='pin' data-acorn-size='18'></i>
                </a></li>";
                
                echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Dark/Light Mode'>
                    <a href='#' id='colorButton'>
                        <i data-acorn-icon='light-on' class='light' data-acorn-size='18'></i>
                        <i data-acorn-icon='light-off' class='dark' data-acorn-size='18'></i>
                    </a>
                </li>
                <li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Latest Notification' onmouseover=\"shiftdataV2('../notify.php', 'datatableXx')\">
                    <a href='#' data-bs-toggle='dropdown' data-bs-target='#notifications' aria-haspopup='true' aria-expanded='false' class='notification-button'>
                        <div class='position-relative d-inline-flex'>
                            <i data-acorn-icon='bell' data-acorn-size='18'></i>
                            <span class='position-absolute notification-dot rounded-xl'></span>
                        </div>
                    </a>
                    <div class='dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out'>
                        <div class='scroll' id='datatableXx'>";
                        
                            echo"<ul class='list-unstyled border-last-none'>";
                            
                                // task list
                                $n1 = "select * from tasks where employeeid='$userid' and activity='0' and status='1' order by 'id' desc";
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
                                            <a href='#'>
                                                <i data-acorn-icon='check-circle' data-acorn-size='18'></i> $clientname
                                            </a><br>
                                            <span style='font-size:8pt'>".$n111["title"]."<br>$sdate1 - $sdate2</span>
                                        </div>
                                    </li>";
                                } }
                                
                                // schedule list
                                $todayx=time();
                                $y= date("Y", $todayz);
                                $m1= date("M", $todayx); $d1= date("d", $todayx); $mm1= date("m", $todayx); $d11= date("l", $todayx);
                                if($m1=="Jan" || $m1=="Mar" || $m1=="May" || $m1=="July" || $m1=="Aug" || $m1=="Oct" || $m1=="Dec") $lastdate=31;
                                else $lastdate=30;
                                if($m1=="Feb") $lastdate=date("t", $todayx); 
                                
                                $ra7 = "select * from uerp_user where id='$userid' and status='1' order by username asc limit 1";
                                $rb7 = $conn->query($ra7);
                                if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {        
                                    if($d1<=$lastdate){
                                        $sa1 = "select * from shifting_allocation where employeeid='".$rab7["id"]."' and days='$d1' and months='$mm1' and years='$y' and status='1' order by id asc";
                                        $sa2 = $conn->query($sa1);
                                        if ($sa2->num_rows > 0) { while($sa3 = $sa2 -> fetch_assoc()) {
                                            $clientname="";
                                            $sa4 = "select * from uerp_user where id='".$sa3['clientid']."' order by id asc limit 1";
                                            $sa5 = $conn->query($sa4);
                                            if ($sa5->num_rows > 0) { while($sa6 = $sa5 -> fetch_assoc()) { $clientname=$sa6["username"]; } }
                                            
                                            $stimeA1="";
                                            $etimeA1="";
                                            $stimeA=strtotime($sa3["stime"]);
                                            $etimeA=strtotime($sa3["etime"]);
                                            $stimeA1=date("h:i A", $stimeA);
                                            $etimeA1=date("h:i A", $etimeA);
                                            echo"<li class='mb-3 pb-3 border-bottom border-separator-light d-flex'>
                                                <div class='align-self-center'>
                                                    <a href='#'>
                                                        <i data-acorn-icon='clock' data-acorn-size='18'></i> $clientname
                                                    </a><br>
                                                    <span style='font-size:8pt'><b>Location</b>: ".$sa3["address"]."<br>$stimeA1 - $etimeA1</span>
                                                </div>
                                            </li>";
                                        } }
                                    }
                                } }
                            echo"</ul>";
                            
                        echo"</div>
                    </div>
                </li>";
                
                if($designationy==13){
                    echo"<li class='list-inline-item' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Active/Upgrade Subscripton'>
                        <a href='#' aria-haspopup='true' aria-expanded='false' title='Subscription Plans' class='notification-button'>
                            <div class='position-relative d-inline-flex'><i data-acorn-icon='toy' data-acorn-size='18'></i></div>
                        </a>
                    </li>";
                }
                
            echo"</ul>
    
            <div class='menu-container flex-grow-1' style='margin-left:-20px;width:320px'>
                <ul id='menu' class='menu'>";
                    
                    if($designationy==13){
                        echo"<li class=''><a href='#' data-href='#'>
                            <i data-acorn-icon='category' class='icon' data-acorn-size='15'></i><span class='label'>Client Onboarding</span>
                        </a></li>";
                        
                        /*
                        echo"<li class=''><a href='#' data-href='#'>
                            <i data-acorn-icon='category' class='icon' data-acorn-size='15'></i><span class='label'>Cost Center</span>
                        </a></li>";
                        */
                    }
                    
                
                    if($designationy==22){
                        echo"<li class=''><a href='#' data-href='#'>
                            <i data-acorn-icon='category' class='icon' data-acorn-size='15'></i><span class='label'>Dashboard</span>
                        </a></li>";
                    }
                    if($designationy==11){
                        echo"<li class=''><a href='#' data-href='#'>
                            <i data-acorn-icon='category' class='icon' data-acorn-size='15'></i><span class='label'>Dashboard</span>
                        </a></li>";
                    }
                    if($designationy==17){
                        echo"<li class=''><a href='#' data-href='#'>
                            <i data-acorn-icon='category' class='icon' data-acorn-size='15'></i><span class='label'>Dashboard</span>
                        </a></li>";
                    }                    
                    
                    $tt=0;
                    $targetid=0;
                    $ttx = "select * from solutions where parent='0' and status='1' and profile='0' and dashboard='1' order by orders asc limit 2";
                    $tty = $conn->query($ttx);
                    if ($tty->num_rows > 0) { while($ttz = $tty->fetch_assoc()) {
                        $tt=($tt+1);
                        $targetid=$ttz["id"];
                    } }
                    
                    if($tt>=2){
                        
                        $mx=0;
                        $m1 = "select * from solutions where parent='0' and status='1' and profile='0' and dashboard='1' order by orders asc";
                        $m11 = $conn->query($m1);
                        if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                            $v11=0;
                            $v22=0;
                            $v11=strtolower($m111["name"]);
                            $v22=str_replace(" ","_",$v11); 
                            
                            echo"";
                            
                                if($mx==6){
                                    echo"<li class=''><a href='#nexis0786' data-href='#'><i data-acorn-icon='more-horizontal' class='icon' data-acorn-size='15'></i><span class='label'>More Apps</span></a>
                                    <ul id='nexis0786'>"; 
                                }
                                    $t=0;
                                    $m2x = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                    $m22x = $conn->query($m2x);
                                    if ($m22x->num_rows > 0) { while($m222x = $m22x->fetch_assoc()) { $t=($t+1); } }
                                    
                                    if($t>=1){
                                        $tutorialx=($tutorialx+1);
                                        $mx=($mx+1);
                                        echo"<li data-title='".$m111["name"]."'  data-intro='".$m111["detail"].". Click to see more..' data-step='$tutorialx'>
                                            <a href='#nexis".$m111["id"]."' data-href='#'>
                                                <i data-acorn-icon='".$m111["icon"]."' class='icon' data-acorn-size='15'></i><span class='label'>".$m111["name"]."</span>
                                            </a>
                                            <ul id='nexis".$m111["id"]."'>";
                                                $m2 = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                                                $m22 = $conn->query($m2);
                                                if ($m22->num_rows > 0) { while($m222 = $m22->fetch_assoc()) {
                                                    $v1=0;
                                                    $v2=0;
                                                    $v1=strtolower($m222["name"]);
                                                    $v2=str_replace(" ","_",$v1);                            
                                                    echo"<li>";
                                                        
                                                        $t=0;
                                                        $m3 = "select * from modules where parent='".$m222["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                                        $m33 = $conn->query($m3);
                                                        if ($m33->num_rows > 0) { while($m333 = $m33->fetch_assoc()) { $t=($t+1); }}
                                                        
                                                        // USER PERMISSION CHECKING.
                                                        $permissionz=0;
                                                        $p3 = "select * from designationwise_roleset where designation_id='$designationy' and module_id='".$m222["id"]."' order by id asc limit 1";
                                                        $p33 = $conn->query($p3);
                                                        if ($p33->num_rows > 0) { while($p333 = $p33->fetch_assoc()) { $permissionz=1; } }
                                                        
                                                        if($t>=1){
                                                            if($permissionz==1){
                                                                echo"<a href='#nexis".$m222["id"]."' data-href='#'><span class='label'>".$m222["name"]."</span></a>";
                                                                echo"<ul id='nexis".$m222["id"]."'>";
                                                                    $m4 = "select * from modules where parent='".$m222["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                                                                    $m44 = $conn->query($m4);
                                                                    if ($m44->num_rows > 0) { while($m444 = $m44->fetch_assoc()) {
                                                                        $v1=0;
                                                                        $v2=0;
                                                                        $v1=strtolower($m444["name"]);
                                                                        $v2=str_replace(" ","_",$v1);
                                                                        echo"<li>";
                                                                            $t=0;
                                                                            $m5 = "select * from modules where parent='".$m444["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                                                            $m55 = $conn->query($m5);
                                                                            if ($m55->num_rows > 0) { while($m555 = $m55->fetch_assoc()) { $t=($t+1); }}
                                                                            
                                                                            // USER PERMISSION CHECKING.
                                                                            $permissionz=0;
                                                                            $p4 = "select * from designationwise_roleset where designation_id='$designationy' and module_id='".$m444["id"]."' order by id asc limit 1";
                                                                            $p44 = $conn->query($p4);
                                                                            if ($p44->num_rows > 0) { while($p444 = $p44->fetch_assoc()) { $permissionz=1; } }
                                                                            
                                                                            if($t>=1){
                                                                                if($permissionz==1){
                                                                                    echo"<a href='#nexis".$m444["id"]."' data-href='#'><span class='label'>".$m444["name"]."</span></a>";
                                                                                    echo"<ul id='nexis".$m444["id"]."'>";
                                                                                        $m6 = "select * from modules where parent='".$m444["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                                                                                        $m66 = $conn->query($m6);
                                                                                        if ($m66->num_rows > 0) { while($m666 = $m66->fetch_assoc()) {
                                                                                            $v1=0;
                                                                                            $v2=0;
                                                                                            $v1=strtolower($m666["name"]);
                                                                                            $v2=str_replace(" ","_",$v1);
                                                                                            echo"<li><a href='#' data-href='#'><span class='label'>".$m666["name"]."</span></a></li>";
                                                                                        } }
                                                                                    echo"</ul>";
                                                                                }
                                                                            }else {
                                                                                if($permissionz==1){
                                                                                    echo"<a href='#' data-href='#'>
                                                                                        <span class='label'>".$m444["name"]."</span>
                                                                                    </a>";
                                                                                }
                                                                            }
                                                                        echo"</li>";
                                                                    } }
                                                                echo"</ul>";
                                                            }
                                                        } else {
                                                            if($permissionz==1){
                                                                if($m222["name"]=="Employees" AND $designationy==11) $namemask="Management Team";
                                                                else $namemask=$m222["name"];
                                                                if($m222["name"]=="Clients" AND $designationy==11) $namemask="Participants";
                                                                else $namemask=$m222["name"];
                                                                echo"<a href='#' data-href='#'>
                                                                    <span class='label'>$namemask</span>
                                                                </a>";
                                                            }
                                                        }
                                                    echo"</li>";
                                                } }
                                            echo"</ul>
                                        </li>";
                                    } else {
                                        $tutorialx=($tutorialx+1);
                                        $mx=($mx+1);
                                        echo"<li data-title='".$m111["name"]."'  data-intro='".$m111["detail"].". Click to see more..' data-step='$tutorialx'>
                                            <a href='#'><i data-acorn-icon='".$m111["icon"]."' class='icon' data-acorn-size='15'></i><span class='label'>".$m111["name"]."</span></a>
                                        </li>";
                                    }
                                    
                                // if($mx==6) echo"</li></ul>";
                                
                            echo"";
                        } }
                        
                    }else{
                        $mx=0;
                        if($userid=="100052") $targetid="5216";
                        if($userid=="100058") $targetid="5209";
                        $tomtom=0;
                        $m1 = "select * from modules where parent='$targetid' and status='1' and profile='0' and dashboard='1' order by orders asc limit 6";
                        $m11 = $conn->query($m1);
                        if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                            $tomtom=($tomtom+1);
                            $moduleid=$m111["id"];
                            $v11=0;
                            $v22=0;
                            $v11=strtolower($m111["name"]);
                            $v22=str_replace(" ","_",$v11);
                            
                            echo"";
                            if($mx==4){
                                echo"<li class=''><a href='#nexis0786' data-href='#'><i data-acorn-icon='more-horizontal' class='icon' data-acorn-size='15'></i><span class='label'>More Apps</span></a>
                                <ul id='nexis0786'>"; 
                            }
                                $t=0;
                                $m2x = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                $m22x = $conn->query($m2x);
                                if ($m22x->num_rows > 0) { while($m222x = $m22x->fetch_assoc()) { $t=($t+1); } }
                                
                                // USER PERMISSION CHECKING.
                                $permissionz=0;
                                $p3 = "select * from designationwise_roleset where designation_id='$designationy' and module_id='".$m111["id"]."' order by id asc limit 1";
                                $p33 = $conn->query($p3);
                                if ($p33->num_rows > 0) { while($p333 = $p33->fetch_assoc()) { $permissionz=1; } }
                                
                                if($t>=1){
                                    if($permissionz==1){
                                        $mx=($mx+1);
                                        echo"<li data-title='".$m111["name"]."'  data-intro='".$m111["detail"].". Click to see more..' data-step='$tutorialx'>
                                            <a href='#nexis".$m111["id"]."' data-href='#'><i data-acorn-icon='".$m111["icon"]."' class='icon' data-acorn-size='15'></i><span class='label'>".$m111["name"]."</span></a>
                                            <ul id='nexis".$m111["id"]."'>";
                                                $m2 = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                                                $m22 = $conn->query($m2);
                                                if ($m22->num_rows > 0) { while($m222 = $m22->fetch_assoc()) {
                                                    $v1=0;
                                                    $v2=0;
                                                    $v1=strtolower($m222["name"]);
                                                    $v2=str_replace(" ","_",$v1);                            
                                                    echo"<li>";
                                                        $t=0;
                                                        $m3 = "select * from modules where parent='".$m222["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                                        $m33 = $conn->query($m3);
                                                        if ($m33->num_rows > 0) { while($m333 = $m33->fetch_assoc()) { $t=($t+1); }}
                                                        
                                                        // USER PERMISSION CHECKING.
                                                        $permissionz=0;
                                                        $p4 = "select * from designationwise_roleset where designation_id='$designationy' and module_id='".$m222["id"]."' order by id asc limit 1";
                                                        $p44 = $conn->query($p4);
                                                        if ($p44->num_rows > 0) { while($p444 = $p44->fetch_assoc()) { $permissionz=1; } }
                                                        
                                                        if($t>=1){
                                                            if($permissionz==1){
                                                                echo"<a href='#nexis".$m222["id"]."' data-href='#'><span class='label'>".$m222["name"]."</span></a>";
                                                                echo"<ul id='nexis".$m222["id"]."'>";
                                                                    $m4 = "select * from modules where parent='".$m222["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                                                                    $m44 = $conn->query($m4);
                                                                    if ($m44->num_rows > 0) { while($m444 = $m44->fetch_assoc()) {
                                                                        $v1=0;
                                                                        $v2=0;
                                                                        $v1=strtolower($m444["name"]);
                                                                        $v2=str_replace(" ","_",$v1);
                                                                        echo"<li>";
                                                                            $t=0;
                                                                            $m5 = "select * from modules where parent='".$m444["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                                                            $m55 = $conn->query($m5);
                                                                            if ($m55->num_rows > 0) { while($m555 = $m55->fetch_assoc()) { $t=($t+1); }}
                                                                            
                                                                            // USER PERMISSION CHECKING.
                                                                            $permissionz=0;
                                                                            $p5 = "select * from designationwise_roleset where designation_id='$designationy' and module_id='".$m444["id"]."' order by id asc limit 1";
                                                                            $p55 = $conn->query($p5);
                                                                            if ($p55->num_rows > 0) { while($p555 = $p55->fetch_assoc()) { $permissionz=1; } }
                                                                            
                                                                            if($t>=1){
                                                                                if($permissionz==1){
                                                                                    echo"<a href='#nexis".$m444["id"]."' data-href='#'><span class='label'>".$m444["name"]."</span></a>";
                                                                                    echo"<ul id='nexis".$m444["id"]."'>";
                                                                                        $m6 = "select * from modules where parent='".$m444["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                                                                                        $m66 = $conn->query($m6);
                                                                                        if ($m66->num_rows > 0) { while($m666 = $m66->fetch_assoc()) {
                                                                                            $v1=0;
                                                                                            $v2=0;
                                                                                            $v1=strtolower($m666["name"]);
                                                                                            $v2=str_replace(" ","_",$v1);
                                                                                            echo"<li><a href='#' data-href='#'><span class='label'>".$m666["name"]."</span></a></li>";
                                                                                        } }
                                                                                    echo"</ul>";
                                                                                }
                                                                            }else {
                                                                                if($permissionz==1){
                                                                                    echo"<a href='#' data-href='#'>
                                                                                        <span class='label'>".$m444["name"]."</span>
                                                                                    </a>";
                                                                                }
                                                                            }
                                                                        echo"</li>";
                                                                    } }
                                                                echo"</ul>";
                                                            }
                                                        } else {
                                                            if($permissionz==1){
                                                                echo"<a href='#' data-href='#'>
                                                                    <span class='label'>".$m222["name"]." (a)</span>
                                                                </a>";
                                                            }
                                                        }
                                                    echo"</li>";
                                                } }
                                            echo"</ul>
                                        </li>";
                                    }
                                } else {
                                    if($permissionz==1){
                                        $mx=($mx+1);
                                        echo"<li data-title='".$m111["name"]."'  data-intro='".$m111["detail"].". Click to see more..' data-step='$tutorialx'>
                                            <a href='' data-href='#'>
                                                <i data-acorn-icon='".$m111["icon"]."' class='icon' data-acorn-size='15'></i><span class='label'>".$m111["name"]."</span>
                                            </a>
                                        </li>";
                                    }
                                }
                            echo"";
                        } }
                        
                    }
                    
                    if($designationy==1 OR $designationy==2 OR $designationy==13){
                        $tutorialx=($tutorialx+1);
                        echo"<li class='' data-title='System Settings' data-intro='For Setting up System Setting according to your needs. Click to see more..' data-step='$tutorialx'><a href='#'>
                            <i data-acorn-icon='arrow-double-right' class='me-2' data-acorn-size='10'></i><span class='label'>SETTINGS</span>
                        </a></li>";
                    }
                    
                echo"</ul>
            </div>";
    
            // MOBILE MENU BAR
            if($sourcefrom!="APP"){
                echo"<div class='mobile-buttons-container' style='padding:5px;width:100%'>
                    <table style='width:100%'><tr>
                        <td style='width:50px' align=left>
                            <div class='dropdown-menu dropdown-menu-end' id='scrollSpyDropdown'></div>
                            <a href='#' id='mobileMenuButton' class='menu-button'><i data-acorn-icon='menu' data-acorn-size='22' style='color:white'></i></a>
                        </td>
                        <td style='width:50px' align=left>
                            <img src='img/favicon.png' style='text-align:right;width:50px;padding-right:20px'>
                        </td>
                        <td align=right nowrap>";
                            // if($designationy==13) echo"<a href='#' data-bs-toggle='modal' data-bs-target='#searchPagesModal' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'><i data-acorn-icon='search' data-acorn-size='18' style='color:white'></i></a>";
                            // if($designationy==13) echo"<a href='#' data-bs-toggle='modal' data-bs-target='#aiPagesModal' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'><i data-acorn-icon='wizard' data-acorn-size='18' style='color:white'></i></a>";
                            
                            echo"<a href='#' aria-haspopup='true' aria-expanded='false' title='Clock IN & OUT' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                <div class='position-relative d-inline-flex'><i data-acorn-icon='clock' data-acorn-size='18' style='color:white'></i></div>
                            </a>";
                            
                            echo"<a href='#' aria-haspopup='true' aria-expanded='false' title='Task Manager' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                <div class='position-relative d-inline-flex'><i data-acorn-icon='check-circle' data-acorn-size='18' style='color:white'></i></div>
                            </a>";
                            
                            echo"<a href='#' aria-haspopup='true' aria-expanded='false' title='Document Manager' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                <div class='position-relative d-inline-flex'><i data-acorn-icon='file-text' data-acorn-size='18' style='color:white'></i></div>
                            </a>";
                            
                            echo"<a href='#' aria-haspopup='true' aria-expanded='false' title='Time Sheet' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                <div class='position-relative d-inline-flex'><i data-acorn-icon='check-circle' data-acorn-size='18' style='color:white'></i></div>
                            </a>";
                            
                            echo"<a href='#' aria-haspopup='true' aria-expanded='false' title='My Expenses' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                <div class='position-relative d-inline-flex'><i data-acorn-icon='wallet' data-acorn-size='18' style='color:white'></i></div>
                            </a>";
                            
                            /* <div class='dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out' id='notifications'>
                                <div class='scroll'>
                                            <ul class='list-unstyled border-last-none'>";
                                                $n1 = "select * from notification where employeeid='".$_COOKIE["userid"]."' and status='1' order by 'id' desc";
                                                $n11 = $conn->query($n1);
                                                if ($n11->num_rows > 0) { while($n111 = $n11->fetch_assoc()) {
                                                    $simage="img/default.jpg";
                                                    $n1a = "select * from uerp_user where id='".$n111["employeeid"]."' and status='1' order by 'date' asc limit 5";
                                                    $n11a = $conn->query($n1a);
                                                    if ($n11a->num_rows > 0) { while($n111a = $n11a->fetch_assoc()) {
                                                        $sname=$n111a["username"];
                                                        $simage=$n111a["image"];
                                                    } }
                                                    echo"<li class='mb-3 pb-3 border-bottom border-separator-light d-flex'>
                                                        <img src='$simage' class='me-3 sw-4 sh-4 rounded-xl align-self-center' alt='$sname' />
                                                        <div class='align-self-center'><a href='#'>$sname just sent a new message!</a> ".$n111["title"]."</div>
                                                    </li>";
                                                } }
                                            echo"</ul>
                                </div>
                            </div> */
                            
                        echo"</td>
                    </tr></table>
                </div>";
            }
            
        echo"</div>
        <div class='nav-shadow'></div>
    </div>";
    
    
    // AI Modal Start
    echo"<div class='modal fade' id='aiPagesModal' tabindex='-1' role='dialog' aria-labelledby='aiPagesModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='aiPagesModalLabel'>Nexis Advanced AI on Project Automation</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body' style='padding:10px'><br><center>
    
                    <form action='ai_wizard.php' method='post' target='aiwizard' enctype='multipart/form-data'>
                        <table style='width:100%'><tr>
                            <td><input type='file' class='form-control' name='fileUpload' id='fileUpload' accept='.pdf' required></td>
                            
                            <td align=center' style='width:30px'>
                                <input type='hidden' id='text' value='Wait a while, Extracting Data and deploying for project generation'>
                                <button class='btn btn-primary' type='submit' onclick='speak();'><i data-acorn-icon='wizard' data-acorn-size='18'></i> GBIS</button>
                            </td>
                            <td align='center' style='width:30px'><i data-acorn-icon='camera' data-acorn-size='18' onclick='startCamera()'></i></td>
                        </tr></table>
                    </form><br>
                    <iframe name='aiwizard' src='null.php' height='290px' width='100%' scrolling='no' border='0' frameborder='0'>&nbsp;</iframe>
                    
                </div>
            </div>
        </div>
    </div>";
