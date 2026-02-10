<?php
    include("../authenticator.php");
    
    if(!isset($project_signed)) $project_signed=0;
    if(!isset($transport_cost)) $transport_cost=0.00;
    if(!isset($start_date)) $start_date="";
    if(!isset($end_date)) $end_date="";

    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";
    
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit Project Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    $advocatex=0;
    $advocatey = "select * from solutions where id='10012' and dashboard='1' order by id asc limit 1";
    $advocatez = $conn->query($advocatey);
    if ($advocatez->num_rows > 0) { while($advocatexyz = $advocatez->fetch_assoc()) {  $advocatex=1; } }
    
    
    $titlexyz="Project";
    $tl="Team Leader";
    $sc="Support Co-ordinator";
    $ast="Allocated Support Team";
    $heading="Project Support Team Members";
    
    echo"<hr><div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
        <div class='tabs-container'>
            <div class='panel-body'>
                <div class='row'>";
                    $currenttime=time();
                    $currentdate=date("Y-m-d",$currenttime);
                    $ra1 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id asc limit 1";
                    $rb1 = $conn->query($ra1);
                    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                        $sdate=date("d.m.Y",$rab1["start_date"]);
                        $edate=date("d.m.Y",$rab1["end_date"]);
                        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                        $rb2 = $conn->query($ra2);
                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                            $clientid=$rab2["id"];
                            $clientname1=$rab2["username"];
                            $clientname2=$rab2["username2"];
                            if (!file_exists($rab2["images"]) || empty($rab2["images"])) $clientimage = "$mainurl/assets/noimage.png";
                            else $clientimage = $rab2["images"];
                        } }
                        
                        $ra3 = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $leadername1=$rab3["username"];
                            $leadername2=$rab3["username2"];
                            if (!file_exists($rab3["images"]) || empty($rab3["images"])) $leaderimage = "$mainurl/assets/noimage.png";
                            else $leaderimage = $rab3["images"];
                            $ra4 = "select * from departments where id='".$rab3["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $leaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab3["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $leaderdesignation=$rab5["designation"]; } }
                            
                        } }
                        
                        $ra4 = "select * from uerp_user where id='".$rab1["caseid"]."' order by id asc limit 1";
                        $rb4 = $conn->query($ra4);
                        if ($rb3->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) {
                            $casename1=$rab4["username"];
                            $casename2=$rab4["username2"];
                            if (!file_exists($rab4["images"]) || empty($rab4["images"])) $caseimage = "$mainurl/assets/noimage.png";
                            else $caseimage = $rab4["images"];
                            $ra4 = "select * from departments where id='".$rab4["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $casedepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab4["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $casedesignation=$rab5["designation"]; } }
                            
                        } }
                        
                        if($rab1["managed_by"]=="NDIA Managed") $sc="Support Co-Ordinator";
                        if($rab1["managed_by"]=="PLAN Managed") $sc="Plan Manager";
                        if($rab1["managed_by"]=="CARE Managed") $sc="Care Manager";
                        if($rab1["managed_by"]=="SELF Managed") $sc="Self Managed";
                        
                        $ra6 = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                        $rb6 = $conn->query($ra6);
                        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                            $teamleadername1=$rab6["username"];
                            $teamleadername2=$rab6["username2"];
                            if (!file_exists($rab6["images"]) || empty($rab6["images"])) $teamleaderimage = "$mainurl/assets/noimage.png";
                            else $teamleaderimage = $rab6["images"];
                            $ra4 = "select * from departments where id='".$rab6["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $teamleaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab6["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $teamleaderdesignation=$rab5["designation"]; } }
                            
                        } }
                        
                        echo"<h2 class='small-title'>$heading</h2>";
                        
                        echo"<div class='col-12 col-md-4'>
                            <div class='contact-box' style='padding:5px'>
                                <div class='card d-flex mb-2' style='padding:10px;'>
                                    <a href='index.php?url=users_dashboard.php&id=5210&projectid=".$rab1["id"]."&clientid=".$rab1["caseid"]."'>
                                        <div class='row'>
                                            <div class='col-12 col-md-3'><img src='$caseimage' style='border:1px solid #ccc;border-radius:5px;height:60px' title=''></div>
                                            <div class='col-12 col-md-9'><span>Case Manager</span><br><b><span>$casename1 $casename2</span></b></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class='col-12 col-md-4'>
                            <div class='contact-box' style='padding:5px'>
                                <div class='card d-flex mb-2' style='padding:10px;'>
                                    <a href='index.php?url=users_dashboard.php&id=5210&projectid=".$rab1["id"]."&clientid=".$rab1["leaderid"]."'>
                                        <div class='row'>
                                            <div class='col-12 col-md-3'><img src='$leaderimage' style='border:1px solid #ccc;border-radius:5px;height:60px' title=''></div>
                                            <div class='col-12 col-md-9'><span>Team Leader</span><br><b><span>$leadername1 $leadername2</span></b></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class='col-12 col-md-4'>
                            <div class='contact-box' style='padding:5px'>
                                <div class='card d-flex mb-2' style='padding:10px;'>
                                    <a href='index.php?url=users_dashboard.php&id=5210&projectid=".$rab1["id"]."&clientid=".$rab1["teamleaderid"]."'>
                                        <div class='row'>
                                            <div class='col-12 col-md-3'><img src='$caseimage' style='border:1px solid #ccc;border-radius:5px;height:60px' title=''></div>
                                            <div class='col-12 col-md-9'><span>$sc</span><br><b><span>$teamleadername1 $teamleadername2</span></b></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                                
                                
                                <div class='col-lg-12'>
                                    <div class='card mb-5' data-itemid='10009' style='padding:5px'>
                                        <div class='ibox-title'>
                                            <div class='card-body' style='padding:5px'>
                                                <table style='width:100%'><tr>
                                                    <td align=left style='font-size:10pt;width:90%'><div class='btn btn-link list-item-heading p-0'>$ast</div></td>
                                                    <td align=right><button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects-team.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title&rurl=2', 'offcanvasRightLarge')\" title='View All $ast'><i class='fa fa-plus'></i></button></td>
                                                </tr></table>
                                                <div class='' id='category-10009'><hr>
                                                    <table style='width:100%'><tr>";
                                                        $tt=0;
                                                        $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc";
                                                        $rb6 = $conn->query($ra6);
                                                        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                            $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                            $rb7 = $conn->query($ra7);
                                                            if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                                $tt=($tt+1);
                                                                
                                                                if (!file_exists($rab7["images"]) || empty($rab7["images"])) $image_path = "$mainurl/assets/noimage.png";
                                                                else $image_path = $rab7["images"];
                                                                
                                                                echo"<td style='padding:5px;line-height:1.2;' align=center valign=middle >
                                                                    <a href='index.php?url=users_dashboard.php&id=5223&projectid=".$rab1["id"]."&clientid=".$rab7["id"]."' style='margin-right:10px'>
                                                                        <img src='$image_path' style='border:1px solid #ccc;border-radius:5px;width:50px;height:50px' title='".$rab7["username"]."'><br>
                                                                        <span style='font-size:8pt'>".$rab7["username"]."</span><br><br>
                                                                    </a>
                                                                </td>";
                                                                if($tt>=4){
                                                                    $tt=0;
                                                                    echo"</tr><tr>";
                                                                }
                                                            } }
                                                        } }
                                                echo"</tr></table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                                
                                echo"<div class='col-lg-12'>
                                    <div class='contact-box center-version' style='padding:5px'>
                                        <div class='card d-flex mb-2' style='padding:10px'>
                                            <table style='width:100%'><tr>
                                                <td align=left>Assigned Tasks</td>
                                                <td align=right>";
                                                    if($mtype=="ADMIN"){
                                                        echo"<button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&url=projects.php&id=786&projectid=".$rab1["id"]."&ctitle=Add New Task', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <span>Add Task</span>
                                                        </button>";
                                                    }
                                                    if($rab1["managed_by"]=="SELF Managed"){
                                                        echo"<button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&url=projects.php&id=786&projectid=".$rab1["id"]."&ctitle=Add New Task', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <span>Add Task</span>
                                                        </button>";
                                                    }
                                                    if($mtype=="USER"){
                                                        if($rab1["teamleaderid"]==$userid){
                                                            echo"<button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&url=projects.php&id=786&projectid=".$rab1["id"]."&ctitle=Add New Task', 'offcanvasRight')\" style='margin-right:10px'>
                                                                <span>Add Task</span>
                                                            </button>";
                                                        }
                                                    }
                                                echo"</td>
                                            </tr></table>
                                            <div><hr>";
                                                $projectid=$rab1["id"];
                                                include 'task_manager_data.php';
                                            echo"</div>
                                        </div>
                                    </div>
                                </div>";
                                
                                echo"<div class='col-lg-12'>
                                    <div class='contact-box center-version' style='padding:5px'>
                                        <div class='card d-flex mb-2' style='padding:10px'>
                                            <table style='width:100%'><tr>
                                                <td align=left>";
                                                    $projectid=$rab1["id"];
                                                    $tday="09";
                                                    $tmonth=date("m", time());
                                                    $tyear=date("Y", time());
                                                    echo"Shift Date: $tday-$tmonth-$tyear
                                                </td>
                                                <td align=right>";
                                                    if($mtype=="ADMIN"){
                                                        echo"<a href='index.php?url=schedule.php'>
                                                            <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                                                <span>View Calendar</span>
                                                            </button>
                                                        </a>";
                                                    }
                                                    if($rab1["managed_by"]=="SELF Managed"){
                                                        echo"<a href='index.php?url=schedule.php'>
                                                            <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                                                <span>View Calendar</span>
                                                            </button>
                                                        </a>";
                                                    }
                                                    if($mtype=="USER"){
                                                        if($rab1["teamleaderid"]==$userid){
                                                            echo"<a href='index.php?url=schedule.php'>
                                                                <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                                                    <span>View Calendar</span>
                                                                </button>
                                                            </a>";
                                                        }
                                                    }
                                                echo"</td>
                                            </tr></table>
                                            <hr>
                                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                                                <thead><tr><th>Jobs</th><th>In & Out</th><th>Clocked In & Out</th></tr></thead>
                                                <tbody>"; 
                                                    if($designationy==13) $s7 = "select * from shifting_allocation where projectid='$projectid' and days='$tday' and months='$tmonth' and years='$tyear' and status='1' order by stime asc";
                                                    else $s7 = "select * from shifting_allocation where projectid='$projectid' and employeeid='$userid' and days='$tday' and months='$tmonth' and years='$tyear' and status='1' order by stime asc";
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
                                                            if($tdiff1<=$timenow) echo"<tr class='gradeX zoom' style='height:50px'>";
                                                            else echo"<tr class='gradeX zoom' style='height:50px'>";
                                                        }else if($rs7["clockin"]!=0 AND $rs7["clockout"]==0){
                                                            $tdiff2=0;
                                                            $tdiff2=strtotime($rs7["etime"]);
                                                            if($tdiff2<=$timenow) echo"<tr class='gradeX zoom' style='height:50px'>";
                                                            else echo"<tr class='gradeX zoom' style='height:50px'>";
                                                        }else if($rs7["clockin"]!=0 AND $rs7["clockout"]!=0){
                                                            echo"<tr class='gradeX zoom' style='height:50px'>";
                                                        }else{
                                                            echo"<tr class='gradeX zoom' style='height:50px'>"; 
                                                        }                                
                                                        echo"<td nowrap><b>$employeename</b>
                                                        <td nowrap>IN: $stime1:$stime2 $sstat<br>OUT: $etime1:$etime2 $estat</td>
                                                        <td nowrap>IN: ";
                                                            if($rs7["clockin"]!=0) echo"$clockedin <a href='https://maps.google.com/maps?q=".$rs7["latitude_in"].",".$rs7["longitude_in"]."&hl=es;z=14' style='color:yellow;font-size:8pt' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i></a>"; else echo"-";
                                                        echo"<br>OUT: ";
                                                            if($clockedin!="0" AND $clockedout!="0") echo"$clockedout <a href='https://maps.google.com/maps?q=".$rs7["latitude_out"].",".$rs7["longitude_out"]."&hl=es;z=14' style='color:yellow;font-size:8pt' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i></a>"; else echo"-";
                                                        echo"</td>
                                                        </tr>";
                                                    } }   
                                                echo"</tbody>
                                            </table>";
                                            
                                        echo"</div>
                                    </div>
                                </div>";
                                
                            echo"</div>
                        </div>";
                    } }
                    
                echo"</div>
            </div>
        </div>
    </div>";  