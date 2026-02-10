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
    $heading="Project Profile";
    
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
                            if (!file_exists($rab2["images"]) || empty($rab2["images"])) $clientimage = "$mainurl/saas/assets/noimage.png";
                            else $clientimage = $rab2["images"];
                        } }
                        
                        $ra3 = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $leadername1=$rab3["username"];
                            $leadername2=$rab3["username2"];
                            if (!file_exists($rab3["images"]) || empty($rab3["images"])) $leaderimage = "$mainurl/saas/assets/noimage.png";
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
                            if (!file_exists($rab4["images"]) || empty($rab4["images"])) $caseimage = "$mainurl/saas/assets/noimage.png";
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
                            if (!file_exists($rab6["images"]) || empty($rab6["images"])) $teamleaderimage = "$mainurl/saas/assets/noimage.png";
                            else $teamleaderimage = $rab6["images"];
                            $ra4 = "select * from departments where id='".$rab6["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $teamleaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab6["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $teamleaderdesignation=$rab5["designation"]; } }
                            
                        } }
                        
                        echo"<div class='col-12 col-md-4'>
                            <h2 class='small-title'>$heading</h2>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='contact-box center-version' style='padding:5px;'>
                                        <div class='card d-flex mb-2' style='padding:10px;min-height:260px'><center>";
                                            
                                            echo"<h2 class='m-b-xs'>".$rab1["name"]."</h2>
                                            <span style='font-size:8pt'>From: $sdate, To: $edate</span><br><hr>";
                                            
                                            if($mtype=="USER"){
                                                if($rab1["teamleaderid"]==$userid){
                                                    echo"<a href='index.php?url=my_profile.php&id=3&projectid=".$rab1["id"]."' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title='View Service Agreement'>
                                                        <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Client Profile</span>
                                                    </a>";
                                                    echo"<a href='index.php?url=client-service-agreement-print.php&projectid=".$rab1["id"]."&clientid=".$rab1["clientid"]."' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title='View Service Agreement'>
                                                        <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>View Service Agreement</span>
                                                    </a>";
                                                    echo"<a href='#' data-bs-toggle='offcanvas' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=project&ctitle=$title&status=1&pstat=1&sf=2', 'offcanvasRightLarge')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>&nbsp;";
                                                }else{
                                                    echo"<a href='index.php?url=my_profile.php&id=3&projectid=".$rab1["id"]."' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title='View Service Agreement'>
                                                        <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Client Profile</span>
                                                    </a>";
                                                }
                                            }else if($mtype=="CLIENT"){
                                                echo"<a href='index.php?url=my_profile.php&id=3&projectid=".$rab1["id"]."' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title='View Service Agreement'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>My Profile</span>
                                                </a>";
                                                echo"<a href='index.php?url=client-service-agreement-print.php&projectid=".$rab1["id"]."&clientid=".$rab1["clientid"]."' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title='View Service Agreement'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>View Service Agreement</span>
                                                </a>";
                                                
                                                if($rab1["managed_by"]=="SELF Managed") echo"<a href='#' data-bs-toggle='offcanvas' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=project&ctitle=$title&status=1&pstat=1&sf=2', 'offcanvasRightLarge')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>&nbsp;";
                                                
                                            }else{
                                                if($mtype=="ADMIN"){
                                                    echo"<a href='index.php?url=client-service-agreement.php&projectid=".$rab1["id"]."&clientid=".$rab1["clientid"]."' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title='View Service Agreement'>
                                                        <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Service Agreement</span>
                                                    </a>";
                                                    echo"<a href='#' data-bs-toggle='offcanvas' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=project&ctitle=$title&status=1&pstat=1&sf=2', 'offcanvasRightLarge')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>&nbsp;";
                                                }
                                            }    
                                            
                                            if($viewpoint!="MOBILE") {
                                                if($mtype!="CLIENT" && $mtype!="USER"){
                                                    if($status==10) echo"<a href='suspendrecord.php?suspendid2=".$rab1["id"]."&tbl=project' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Activate Project'><i class='fa-solid fa-unlock-alt'></i></a>";
                                                    else echo"<a href='suspendrecord.php?suspendid=".$rab1["id"]."&tbl=project' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Suspend This Project'><i class='fa-solid fa-lock'></i></a>";
                                                    echo" <a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=project' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Set Project status to Completed'><i class='fa-solid fa-close'></i></a>";
                                                }
                                            }
                                            
                                            if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                                                if($mtype=="ADMIN"){
                                                    if (isset($_COOKIE["managed"])){
                                                        if($_COOKIE["managed"]==2) {
                                                            echo"<hr>";
                                                            echo"<a href='index.php?url=cohs_environmental-assessment-date_view.php' target='_blank' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title=''>Environmental</span></a>";
                                                            echo"<a href='index.php?url=cohs_initial-assessment-template.php' target='_blank' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title=''>Consumer</span></a>";
                                                            echo"<a href='index.php?url=cohs_charter_of_aged_care_rights_signing_template_view.php' target='_blank' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title=''>Charter Rights</span></a>";
                                                            echo"<hr>";
                                                            echo"<a href='index.php?url=cohs_care_plan_sdm.php' target='_blank' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title=''>Home Care Plan</span></a>";
                                                            echo"<a href='index.php?url=cohs_home_care_agreement.php' target='_blank' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' title=''>Home Care Service Agreement</span></a>";
                                                            echo"<hr>";
                                                        }else{
                                                            
                                                        }
                                                    }
                                                }
                                            }
                                            
                                        echo"</center></div>
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='contact-box' style='padding:5px'>
                                        <div class='card d-flex mb-2' style='padding:10px;'>
                                            <a href='index.php?url=client_dashboard.php&id=5210&projectid=".$rab1["id"]."&clientid=".$rab1["clientid"]."'>
                                                <div class='row'>
                                                    <div class='col-12 col-md-3'>
                                                        <img src='$clientimage' style='border:1px solid #ccc;border-radius:5px;height:60px' title=''>
                                                    </div>
                                                    <div class='col-12 col-md-9'><span>Client/Participant:</span><br><b><span >$clientname1 $clientname2</span></b></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12'>
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
                                
                                <div class='col-12'>
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
                                
                                <div class='col-12'>
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
                                                    <td align=left style='font-size:10pt;width:90%'>
                                                        <a data-bs-toggle='' href='#category-10009' aria-expanded='false' aria-controls='collapseExample'>
                                                            <div class='btn btn-link list-item-heading p-0'>$ast</div>
                                                        </a>
                                                    </td><td align=right>
                                                        <a data-bs-toggle='' href='#category-10009' aria-expanded='false' aria-controls='collapseExample'>
                                                            <i class='fa fa-angle-down'></i>
                                                        </a>
                                                    </td>
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
                                                                
                                                                if (!file_exists($rab7["images"]) || empty($rab7["images"])) $image_path = "$mainurl/saas/assets/noimage.png";
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
                                
                            echo"</div>";
                            
                            $a1 = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                            $b1 = $conn->query($a1);
                            if ($b1->num_rows > 0) { while($c1 = $b1->fetch_assoc()) {
                                $cid=$c1["id"];
                                $cstatus=$c1["status"];
                                $cuid=$c1["unbox"];
                                $cgender=$c1["gender"]; 
                                $cname2=$c1["username"];
                                $cname="".$c1["username"]." ".$c1["username2"]."";
                                $cphone=$c1["phone"];
                                $cphone2=$c1["phone2"];
                                $cmobile=$c1["mobile"];
                                $cemail=$c1["email"];
                                $caddress=$c1["address"];
                                $ccity=$c1["city"];
                                $cstate=$c1["area"];
                                $czip=$c1["zip"];
                                $ccountry=$c1["country"];
                                $cdob=date("Y-m-d",$c1["dob"]);
                                $cnote=$c1["note"];
                                $clatitudex=$c1["latitude"];
                                $clongitudex=$c1["longitude"];
                                $aboutclient=$c1["aboutme"];
                                $cmtype=$c1["mtype"];
                                $nomineename=$c1["nominee_name"];
                                $cndis=$c1["ndis"];
                                $representative_name=$c1["representative_name"];
                                
                                $cpname=$c1["cp_name"];
                                $cpphone1=$c1["cp_phone1"];
                                $cpphone2=$c1["cp_phone2"];
                                $cpmobile=$c1["cp_mobile"];
                                $cpemail=$c1["cp_email"];
                                $cpaddress=$c1["cp_address"];
                                
                                if($c1["images"]!=0) $cimage=$c1["images"];
                                else $cimage="img/noimage.jpg";
                                
                                $cemergency_contact_1=$c1["emergency_contact_1"];
                                $cemergency_relation_1=$c1["emergency_relation_1"];
                                $cemergency_phone_1=$c1["emergency_phone_1"];
                                $cemergency_email_1=$c1["emergency_email_1"];
                                $cemergency_contact_2=$c1["emergency_contact_2"];
                                $cemergency_relation_2=$c1["emergency_relation_2"];
                                $cemergency_phone_2=$c1["emergency_phone_2"];
                                $cemergency_email_2=$c1["emergency_email_2"];
                                
                                $clientname="".$c1["username"]." ".$c1["username2"]."";
                                $aboutclient=$c1["aboutme"];
                                
                            } }
                            
                            echo"<div class='col-md-12'>
                                <div class='card d-flex mb-2' style='padding:20px'>
                                    <span>About $clientname!</span><hr>
                                    <p class='small'>$aboutclient</p>
                                </div>
                                
                                <div class='card mb-5' data-itemid='10001' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10001' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Personal Information</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10001' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10001'>";
                                                $s = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                                                $r = $conn->query($s);
                                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                    $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                    $joindate=date("d-m-Y",$rs["jointime"]);
                                                    $department=$rs["department"];
                                                    $departmentname="General";
                                                    $s8xx = "select * from departments where id='$department' order by id asc limit 1";
                                                    $r8xx = $conn->query($s8xx);
                                                    if ($r8xx->num_rows > 0) { while($rs8xx = $r8xx->fetch_assoc()) { $departmentname=$rs8xx["department_name"]; } }
                                                    echo"<hr><table class='table table-hover no-margins'><tbody>
                                                        <tr><td>Name</td><td>:</td><td>".$rs["username"]." ".$rs["username2"]."</td></tr>
                                                        <tr><td>Department</td><td>:</td><td>$departmentname</td></tr>
                                                        <tr><td>User ID</td><td>:</td><td>".$rs["id"]."</td></tr>
                                                        <tr><td>Join Date</td><td>:</td><td>$joindate</td></tr>
                                                        <tr><td>Day Phone</td><td>:</td><td>".$rs["phone"]."</td></tr>
                                                        <tr><td>Night Phone</td><td>:</td><td>".$rs["phone2"]."</td></tr>
                                                        <tr><td>Email</td><td>:</td><td>".$rs["email"]."</td></tr>
                                                    </table>";
                                                } }
                                            echo"</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='card mb-5' data-itemid='10002' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10002' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Service Agreement Info</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10002' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10002'>
                                                <hr><table class='table table-hover no-margins'><tbody>";
                                                    if($advocatex==1) echo"<tr><td>NID Number</td><td>:</td><td>$cndis</td></tr>";
                                                    else echo"<tr><td>NDIS Number</td><td>:</td><td>$cndis</td></tr>";
                                                    echo"<tr><td>Date of Birth</td><td>:</td><td>$cdob</td></tr>
                                                    <tr><td>Participant`s representative</td><td>:</td><td>$representative_name</td></tr></td></tr>
                                                    <tr><td>Agreement Signed Date</td><td>:</td><td>$project_signed</td></td></tr>
                                                    <tr><td>Period From</td><td>:</td><td>$start_date</td></tr>
                                                    <tr><td>Period To</td><td>:</td><td>$end_date</td></td></tr>
                                                    <tr><td>Claim Travel costs</td><td>:</td><td nowrap>";
                                                        if($transport_cost=="1") echo"YES (Agreed)";
                                                    echo"</td>
                                                </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='card mb-5' data-itemid='10003' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10003' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Participant information</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10003' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10003'>
                                                <hr><table class='table table-hover no-margins'><tbody>
                                                    <tr><td nowrap>Nominee Name</td><td>:</td><td>$nomineename</td></tr>
                                                    <tr><td nowrap>Participant Name</td><td>:</td><td>$cname</td></tr></td></tr>
                                                    <tr><td nowrap>Phone # Day Time</td><td>:</td><td>$cphone</td></td></tr>
                                                    <tr><td nowrap>Phone # Night Time</td><td>:</td><td>$cphone2</td></tr>
                                                    <tr><td nowrap>Mobile #</td><td>:</td><td>$cmobile</td></td></tr>
                                                    <tr><td nowrap>Email Address</td><td>:</td><td>$cemail</td></td></tr>
                                                    <tr><td nowrap>Present Address</td><td>:</td><td>$caddress</td></td></tr>
                                                </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='card mb-5' data-itemid='10004' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10004' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Contact Person Detail</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10004' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10004'>
                                                <hr><table class='table table-hover no-margins'><tbody>
                                                    <tr><td nowrap>Contact Name</td><td>:</td><td>$cpname</td></tr></td></tr>
                                                    <tr><td nowrap>Contact Day Phone</td><td>:</td><td>$cpphone1</td></td></tr>
                                                    <tr><td nowrap>Contact Night Phone</td><td>:</td><td>$cpphone2</td></tr>
                                                    <tr><td nowrap>Contact Mobile</td><td>:</td><td>$cpmobile</td></td></tr>
                                                    <tr><td nowrap>Contact Email</td><td>:</td><td>$cpemail</td></td></tr>
                                                    <tr><td nowrap>Contact Address</td><td>:</td><td>$cpaddress</td></td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='card mb-5' data-itemid='10005' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10005' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Emergency Contact Person</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10005' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10005'>";
                                                $s = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                                                $r = $conn->query($s);
                                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                    $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                    
                                                    echo"<hr><table class='table table-hover no-margins'><tbody>
                                                        <tr><td nowrap>Person Name</td><td>:</td><td colspan=5>".$rs["emergency_contact_1"]."</td></tr>
                                                        <tr><td>Relation</td><td>:</td><td>".$rs["emergency_relation_1"]."</td></tr>
                                                        <tr><td>Phone</td><td>:</td><td>".$rs["emergency_phone_1"]."</td></tr>
                                                        <tr><td>Email</td><td>:</td><td colspan=5>".$rs["emergency_email_1"]."</td></tr>
                                                        <tr><td colspan=10><hr></td></tr>
                                                        <tr><td nowrap>Person Name</td><td>:</td><td colspan=5>".$rs["emergency_contact_2"]."</td></tr>
                                                        <tr><td>Relation</td><td>:</td><td>".$rs["emergency_relation_2"]."</td></tr>
                                                        <tr><td>Phone</td><td>:</td><td>".$rs["emergency_phone_2"]."</td></tr>
                                                        <tr><td>Email</td><td>:</td><td colspan=5>".$rs["emergency_email_2"]."</td></tr>
                                                    </table>";
                                                } }
                                            echo"</div>
                                        </div>
                                    </div>
                                </div>";
                            
                            
                                $s = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                                $r = $conn->query($s);
                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                    $dob=date("d-m-Y",$rs["dob"]);
                                    
                                    echo"<div class='card mb-5' data-itemid='10006' style='padding:5px'>
                                        <div class='ibox-title'>
                                            <div class='card-body' style='padding:5px'>
                                                <table style='width:100%'><tr>
                                                    <td align=left style='font-size:10pt;width:90%'>
                                                        <a data-bs-toggle='collapse' href='#category-10006' aria-expanded='false' aria-controls='collapseExample'>
                                                            <div class='btn btn-link list-item-heading p-0'>Address</div>
                                                        </a>
                                                    </td><td align=right>
                                                        <a data-bs-toggle='collapse' href='#category-10006' aria-expanded='false' aria-controls='collapseExample'>
                                                            <i class='fa fa-angle-down'></i>
                                                        </a>
                                                    </td>
                                                </tr></table>
                                                <div class='collapse' id='category-10006'><hr>
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td valign=top>Address</td><td valign=top>:</td><td valign=top>".$rs["address"]."</td></tr>
                                                        <tr><td valign=top>Address 2</td><td valign=top>:</td><td valign=top>".$rs["address2"]."</td></tr>
                                                        <tr><td valign=top>City</td><td valign=top>:</td><td valign=top>".$rs["city"]."</td></tr>
                                                        <tr><td valign=top>State</td><td valign=top>:</td><td valign=top>".$rs["area"]."</td></tr>
                                                        <tr><td valign=top>Zip</td><td valign=top>:</td><td valign=top>".$rs["zip"]."</td></tr>
                                                        <tr><td valign=top>Country</td><td valign=top>:</td><td valign=top>".$rs["country"]."</td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                    
                                    if($mtype!="USER"){
                                        echo"<div class='card mb-5' data-itemid='10007' style='padding:5px'>
                                            <div class='ibox-title'>
                                                <div class='card-body' style='padding:5px'>
                                                    <table style='width:100%'><tr>
                                                        <td align=left style='font-size:10pt;width:90%'>
                                                            <a data-bs-toggle='collapse' href='#category-10007' aria-expanded='false' aria-controls='collapseExample'>
                                                                <div class='btn btn-link list-item-heading p-0'>Other Info.</div>
                                                            </a>
                                                        </td><td align=right>
                                                            <a data-bs-toggle='collapse' href='#category-10007' aria-expanded='false' aria-controls='collapseExample'>
                                                                <i class='fa fa-angle-down'></i>
                                                            </a>
                                                        </td>
                                                    </tr></table>
                                                    <div class='collapse' id='category-10007'><hr>
                                                        <table class='table table-hover no-margins'><tbody>";
                                                            if($advocatex!=1) echo"<tr><td>ABN</td><td>:</td><td>$abn</td></tr>";
                                                            echo"<tr><td>Nationality</td><td>:</td><td>".$rs["nationality"]."</td></tr>
                                                            <tr><td>Marital Status</td><td>:</td><td>".$rs["marital_status"]."</td></tr>
                                                            <tr><td>driving licence no</td><td>:</td><td>".$rs["driving_licence_no"]."</td></tr>
                                                            <tr><td>Gender</td><td>:</td><td>".$rs["gender"]."</td></tr>
                                                            <tr><td>DOB</td><td>:</td><td>$dob</td></tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class='card mb-5' data-itemid='10008' style='padding:5px'>
                                            <div class='ibox-title'>
                                                <div class='card-body' style='padding:5px'>
                                                    <table style='width:100%'><tr>
                                                        <td align=left style='font-size:10pt;width:90%'>
                                                            <a data-bs-toggle='collapse' href='#category-10008' aria-expanded='false' aria-controls='collapseExample'>
                                                                <div class='btn btn-link list-item-heading p-0'>Bank Info.</div>
                                                            </a>
                                                        </td><td align=right>
                                                            <a data-bs-toggle='collapse' href='#category-10008' aria-expanded='false' aria-controls='collapseExample'>
                                                                <i class='fa fa-angle-down'></i>
                                                            </a>
                                                        </td>
                                                    </tr></table>
                                                    <div class='collapse' id='category-10008'><hr>
                                                        <table class='table table-hover no-margins'><tbody>
                                                            <tr><td>Bank Name</td><td>:</td><td>".$rs["bank_name"]."</td></tr><tr><td>A/c Name</td><td>:</td><td>".$rs["account_name"]."</td></tr>
                                                            <tr><td>A/c Number</td><td>:</td><td>".$rs["account_number"]."</td></tr>";
                                                            if($advocatex!=1) echo"<tr><td>BSB</td><td>:</td><td>".$rs["bsb"]."</td></tr>";
                                                        echo"</table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    }
                                } }
                            echo"</div>
                        </div>
                        
                        <div class='col-12 col-md-8'>
                            <div class='row'>";
                                if($mtype=="ADMIN" OR $rab1["teamleaderid"]==$userid){
                                    
                                    $lv=0;
                                    $budgetvaluex=0;
                                    $budgetvalue=0;
                                    $allocateddays=0;
                                    $allocatedhours=0;
                                    $allocatedminutes=0;
                                    
                                    $wsp11 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id desc limit 1";
                                    $wsp22 = $conn->query($wsp11);
                                    if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                        
                                        $budgetunset=0;
                                        if($wsp33["budget_date"]!=0) $budgetunset=1;
                                        
                                        if($budgetunset==1){
                                            
                                            if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
                                            if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
                                                        
                                            $startdate = date("d-M-Y", $wsp33["budget_date"]);
                                            $enddate = date("d-M-Y", $wsp33["budget_close_date"]); 
                                                        
                                            $totalamountx=0;
                                            $goforit=0;
                                            $ln1 = "select * from project_team_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
                                            $ln2 = $conn->query($ln1);
                                            if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                                
                                                $goforit=1;
                                                $supportlinenumber=0;
                                                
                                                if($ln3["item_number"]>=1){
                                                    $lv=($lv+$wsp33["cat1x"]); // value;
                                                    $sc1 = "select * from ndis_line_numbers where id='".$ln3["item_number"]."' order by id desc limit 1";
                                                    $sc2 = $conn_main->query($sc1);
                                                    if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                                        $supportname=$sc3["item_name"];
                                                        $supportlinenumber=$sc3["item_number"];
                                                        $supportprice=$sc3["national"];
                                                    } }
                                                }
                                                
                                                if($supportlinenumber!=0){    
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
                                                            
                                                    $wd=0;
                                                    if($ln3["mon"]==1) $wd=($wd+4);
                                                    if($ln3["tue"]==1) $wd=($wd+4);
                                                    if($ln3["wed"]==1) $wd=($wd+4);
                                                    if($ln3["thu"]==1) $wd=($wd+4);
                                                    if($ln3["fri"]==1) $wd=($wd+4);
                                                    if($ln3["sat"]==1) $wd=($wd+4);
                                                    if($ln3["sun"]==1) $wd=($wd+4);
                                                    // if($ln3["evening"]==1) $wd=($wd+4);
                                                    // if($ln3["night"]==1) $wd=($wd+4);
                                                    
                                                    if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                                                        
                                                    $startTimestamp = $wsp33["budget_date"];
                                                    $endTimestamp = $wsp33["budget_close_date"];
                                                    $diffInSeconds = $endTimestamp - $startTimestamp;
                                                    $diffInDays = $diffInSeconds / (60 * 60 * 24);
                                                    $months = $diffInDays / 30.44;
                                                    $months = round($months, 2);
                                                                
                                                    $wd=($wd*$months);
                                                    $wd=($wd-$hd1);
                                                    $wd=round($wd);
                                                    if($wd<=0) $wd=0;
                                                    
                                                    if($ln3["time1"]==0) $tm1="08:00";
                                                    else $tm1=$ln3["time1"];
                                                        
                                                    $tm1x="08:00";
                                                    $tm1x = strtotime($tm1);
                                                    if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                                    else $tm2=$ln3["time2"];
                                                            
                                                    $totalamount=0;
                                                    $totalamount=($ln3["qty1"]*$wd);
                                                    $totalamount=($totalamount*$ln3["rate1"]);
                                                    $totalamountz = number_format($totalamount, 2, '.', ',');
                                                                
                                                    $totalamountx=($totalamountx+$totalamount);
                                                    $totalamounty = number_format($totalamountx, 2, '.', ',');
                                                            
                                                    $allocateddays=($allocateddays+$wd);
                                                    $allocatedhours=($allocatedhours+$ln3["qty1"]);
                                                    $allocatedminutes=($allocatedminutes+$ln3["qty2"]);
                                                }
                                                                                                    
                                            } }
                                            if($goforit==1){
                                                if($allocatedminutes>=61){
                                                    $amx = floor($allocatedminutes / 60);
                                                    $allocatedhours=round($allocatedhours+$amx);
                                                    $allocatedminutes = $allocatedminutes % 60;
                                                }
                                                            
                                                $bbalance=($wsp33["budget_value"]-$totalamountx);
                                                $budgetvalue=$wsp33["budget_value"];
                                                        
                                                if($bbalance<=0) $tcol=null;
                                                else $tcol=null;
                                                    
                                                $tval=$budgetvalue;
                                                $tuse=0;
                                                $tbal=($tval-$tuse);
                                            }
                                        }
                                                
                                    } }
                                    
                                    echo"<div class='col-12 col-md-6'>
                                        <section class='scroll-section' id='lineChartTitle'>
                                            <h2 class='small-title'>Project Progress Chart</h2>
                                            <div class='card mb-5'><div class='card-body'><div class='sh-35'>
                                            <iframe name='chart_accounts' src='./modules/project_chart.php?c=line&v=M&uc=1&clientid=".$rab1["clientid"]."' scrolling='no' border='0' frameborder='0' width='100%' height='270'>BROWSER NOT SUPPORTED</iframe>
                                            </div></div></div>
                                        </section>
                                    </div>
                                    
                                    <div class='col-12 col-md-6'>
                                        <section class='scroll-section' id='lineChartTitle'>
                                            <h2 class='small-title'>Financial Budget Chart</h2>
                                            <div class='card mb-5'><div class='card-body'>";
                                                // <iframe name='chart_accounts' src='./modules/project_budget_chart.php?c=pie&v=M&uc=1&projectid=".$_COOKIE["projectidx"]."' scrolling='no' border='0' frameborder='0' width='100%' height='270'>BROWSER NOT SUPPORTED</iframe>";
                                                echo"<iframe name='chart_accounts' src='./modules/project_pie_chart.php?c=pie&v=M&uc=1&projectid=".$_COOKIE["projectidx"]."&tval=$tval&tuse=$tuse&tbal=$tbal' scrolling='no' border='0' frameborder='0' width='100%' height='270'>BROWSER NOT SUPPORTED</iframe>
                                            </div></div>
                                        </selection>
                                    </div>
                                    
                                    <div class='col-12 col-md-12'>
                                        <section class='scroll-section' id='lineChartTitlex'>
                                            <div class='card mb-5' ><div class='card-body'>
                                                <div class='row'>
                                                    <div class='col-5'><h2 class='small-title'>Allocated Budget Forcast & Breakdown</h2></div>
                                                    <div class='col-7' style='text-align:right'>";
                                                    
                                                        
                                                            
                                                            echo"<a href='#' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#budgeteditor' style='padding-right:20px'>Edit</a>&nbsp;&nbsp;";
                                                            echo"<button type=button onclick='printPDF()' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='padding-right:20px'>Download</button>&nbsp;&nbsp;";
                                                            echo"<a href='#' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#budgetshift'><i class='fa fa-plus'></i> Weekly Shift</span></a>";
                                                            
                                                            echo"<div class='modal fade' id='budgeteditor' tabindex='-1' role='dialog' aria-hidden='true'>
                                                                <div class='modal-dialog modal-semi-full modal-dialog-centered'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title'>Budget Reallocation</h5>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <iframe src='workspace_budget_editor.php?pid=".$_COOKIE["projectidx"]."' name='budgetmanagerx' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='550'>BROWSER NOT SUPPORTED</iframe>
                                                                            <a style='margin-left:-70px;margin-top:0px;position:absolute;color:purple;align:right' href='workspace_budget_editor.php?pid=".$_COOKIE["projectidx"]."' class='btn' target='budgetmanagerx' title='Reload Data'><i class='fa fa-refresh' style='color:purple'></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                            echo"<div class='modal fade' id='budgetshift' tabindex='-1' role='dialog' aria-hidden='true'>
                                                                <div class='modal-dialog modal-semi-full modal-dialog-centered'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title'>Budgetwise Shifts</h5>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <iframe src='workspace_budget_shifts.php?pid=".$_COOKIE["projectidx"]."' name='budgetmanagery' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='550'>BROWSER NOT SUPPORTED</iframe>
                                                                            <a style='margin-left:-70px;margin-top:0px;position:absolute;color:purple;align:right' href='workspace_budget_shifts.php?pid=".$_COOKIE["projectidx"]."' class='btn' target='budgetmanagery' title='Reload Data'><i class='fa fa-refresh' style='color:purple'></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                        
                                                        
                                                    echo"</div>
                                                </div>
                                                
                                                <div style='width:100%'>";
                                                
                                                    if($budgetunset==1){
                                                        if($goforit==1){    
                                                            echo"<h2 class='small-title'>Total Budget Summary</h2>
                                                            <div class='card mb-5' style='background-color:#6BBEEE;color:black'>
                                                                <div class='card-body' style='min-height:120px'>
                                                                    <div style='width:100%;align:center;text-align:left'>";
                                                                        echo"<span style='font-size:10pt'><u>Budget Date Range From: $startdate - $enddate</u></span>
                                                                        <br><br><table align=center width=100%>
                                                                            <thead><tr>
                                                                                <th></th>
                                                                                <th style='text-align:right'>Budget</th>
                                                                                <th style='text-align:right'>Spend to Date</th>
                                                                                <th style='text-align:right'>Left to Spend</th>
                                                                                <th style='text-align:right'>% Spend</th>
                                                                            </tr></thead>";
                                                                            
                                                                            if($budgetunset==1){
                                                                                // getting total budget spent
                                                                                $budgetspent=0;
                                                                                $rv1 = "select * from receipt_voucher where proj_id='".$_COOKIE["projectidx"]."' and paid='10' order by id desc";
                                                                                $rv2 = $conn->query($rv1);
                                                                                if ($rv2->num_rows > 0) { while($rv12 = $rv2->fetch_assoc()) { $budgetspent=($budgetspent+$rv12["cr_amt"]); } }
                                                                                
                                                                                if($budgetvalue!=0){
                                                                                    $budgetbalance=($totalamountx-$budgetspent);
                                                                                    $percentageused = round(($budgetspent / $budgetvalue) * 100);
                                                                                    $budgetbalancey = number_format($budgetbalance, 2, '.', ',');
                                                                                    $budgetspenty = number_format($budgetspent, 2, '.', ',');
                                                                                }else{
                                                                                    $budgetbalance=0;
                                                                                    $percentageused = 0;
                                                                                    $budgetbalancey = 0;
                                                                                    $budgetspenty = 0;
                                                                                }
                                                                                // $allocateddays Days
                                                                                // $allocatedhours : $allocatedminutes Hours
                                                                                
                                                                                echo"<tbody>
                                                                                    <tr>
                                                                                        <td  valign=bottom style='text-align:left;font-size:10pt'>Total Budget</td>
                                                                                        <td  valign=bottom style='text-align:right;font-size:10pt'>$ $totalamounty</td>
                                                                                        <td  valign=bottom style='text-align:right;font-size:10pt'>$ $budgetspenty</td>
                                                                                        <td  valign=bottom style='text-align:right;font-size:10pt'>$ $budgetbalancey</td>
                                                                                        <td  style='text-align:right;font-size:10pt'>$percentageused %</td>
                                                                                    </tr>
                                                                                </tbody>";
                                                                            }else{
                                                                                echo"<tbody><tr><td  style='text-align:center;font-size:10pt' colspan=10><br><br>BUDGET NOT ALLOCATED YET...</td></tr></tbody>";
                                                                            }
                                                                            
                                                                        echo"</table>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                        
                                                        
                                                            echo"<h2 class='small-title'>Core Supports</h2>";
                                                            echo"<table style='width:100%' class='table table-hover'>
                                                                <thead><tr>
                                                                    <th style='text-align:left' scope='col' nowrap>No.</th>
                                                                    <th style='text-align:left' scope='col' nowrap>Support Category</th>
                                                                    <th style='text-align:left' scope='col' nowrap>Periods</th>
                                                                    <th style='text-align:right' scope='col' nowrap>Budget</th>
                                                                    <th style='text-align:right' scope='col' nowrap>Spent</th>
                                                                    <th style='text-align:right' scope='col' nowrap>Left</th>
                                                                    <th style='text-align:right' scope='col' nowrap>% Spent</th>
                                                                </tr></thead>
                                                                <tbody>";
                                                                    $tts=0;
                                                                    $budgetvaluex=0;
                                                                    $budgetvalue=0;
                                                                    $allocateddays=0;
                                                                    $allocatedhours=0;
                                                                    $wsp11 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id desc limit 1";
                                                                    $wsp22 = $conn->query($wsp11);
                                                                    if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                                                        if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
                                                                        if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
                                                                        
                                                                        $startdate = date("d-M-Y", $wsp33["budget_date"]);
                                                                        $enddate = date("d-M-Y", $wsp33["budget_close_date"]); 
                                                                        
                                                                        $totalamountx=0;
                                                                        
                                                                        $ln1x = "select * from project_team_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
                                                                        $ln2x = $conn->query($ln1x);
                                                                        if ($ln2x->num_rows > 0) { while($ln3 = $ln2x -> fetch_assoc()) {
                                                                        
                                                                            $lv=($lv+$wsp33["cat1x"]); // value;
                                                                            $sc1 = "select * from ndis_line_numbers where id='".$ln3["item_number"]."' order by id desc limit 1";
                                                                            $sc2 = $conn_main->query($sc1);
                                                                            if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                                                                $supportname=$sc3["item_name"];
                                                                                $supportlinenumber=$sc3["item_number"];
                                                                                $supportprice=$sc3["national"];
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
                                                                            $tts=($tts+1);
                                                                            echo"<tr style='padding:10px'>
                                                                                <td scope='row' style='font-size:8pt;width:5%'><span style='font-size:8pt'>$tts.</span></td>
                                                                                <td scope='row' style='font-size:8pt;width:35%'>
                                                                                    <span style='font-size:8pt'>$supportname ($supportlinenumber)<br>";
                                                                                    $sb1 = "select * from uerp_user where id='".$ln3["employeeid"]."' order by id asc limit 1";
                                                                                    $rb1 = $conn->query($sb1);
                                                                                    if ($rb1->num_rows > 0) { while($rsb1 = $rb1->fetch_assoc()) {
                                                                                        echo"<span style='font-size:8pt'><b>Support Worker: ".$rsb1["username"]." ".$rsb1["username2"]."</a>";
                                                                                    } }
                                                                                    echo"<br>
                                                                                    <table style='width:100%'><tr>";
                                                                                        if($ln3["mon"]==1) $d1="fa-check-square"; else $d1="fa-square-o";
                                                                                        if($ln3["tue"]==1) $d2="fa-check-square"; else $d2="fa-square-o";
                                                                                        if($ln3["wed"]==1) $d3="fa-check-square"; else $d3="fa-square-o";
                                                                                        if($ln3["thu"]==1) $d4="fa-check-square"; else $d4="fa-square-o";
                                                                                        if($ln3["fri"]==1) $d5="fa-check-square"; else $d5="fa-square-o";
                                                                                        if($ln3["sat"]==1) $d6="fa-check-square"; else $d6="fa-square-o";
                                                                                        if($ln3["sun"]==1) $d7="fa-check-square"; else $d7="fa-square-o";
                                                                                        // if($ln3["evening"]==1) $d8="fa-check-square"; else $d8="fa-square-o";
                                                                                        if($ln3["night"]==1) $d9="fa-check-square"; else $d9="fa-square-o";
                                                                                                
                                                                                        $wd=0;
                                                                                        if($ln3["mon"]==1) $wd=($wd+4);
                                                                                        if($ln3["tue"]==1) $wd=($wd+4);
                                                                                        if($ln3["wed"]==1) $wd=($wd+4);
                                                                                        if($ln3["thu"]==1) $wd=($wd+4);
                                                                                        if($ln3["fri"]==1) $wd=($wd+4);
                                                                                        if($ln3["sat"]==1) $wd=($wd+4);
                                                                                        if($ln3["sun"]==1) $wd=($wd+4);
                                                                                        // if($ln3["evening"]==1) $wd=($wd+4);
                                                                                        // if($ln3["night"]==1) $wd=($wd+4);
                                                                                                
                                                                                        if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                                                                                        
                                                                                        $startTimestamp = $wsp33["budget_date"];
                                                                                        $endTimestamp = $wsp33["budget_close_date"];
                                                                                        $diffInSeconds = $endTimestamp - $startTimestamp;
                                                                                        $diffInDays = $diffInSeconds / (60 * 60 * 24);
                                                                                        $months = $diffInDays / 30.44;
                                                                                        $months = round($months, 2);
                                                                                                
                                                                                        $wd=($wd*$months);
                                                                                        $wd=($wd-$hd1);
                                                                                        $wd=round($wd);
                                                                                        if($wd<=0) $wd=0;
                                                                                                
                                                                                        echo"<td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Mon<br><i class='fa $d1'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Tue<br><i class='fa $d2'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Wed<br><i class='fa $d3'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Thu<br><i class='fa $d4'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Fri<br><i class='fa $d5'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Sat<br><i class='fa $d6'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Sun<br><i class='fa $d7'></i></td>";
                                                                                        // echo"<td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Ev.<br><i class='fa $d8'></i></td>";
                                                                                        echo"<td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Night<br><i class='fa $d9'></i></td>
                                                                                    </tr></table>
                                                                                </td>
                                                                                <td style='width:20%;text-align:left' nowrap>";
                                                                                
                                                                                    if($ln3["time1"]==0) $tm1="08:00";
                                                                                    else $tm1=$ln3["time1"];
                                                                                    
                                                                                    $tm1x="08:00";
                                                                                    $tm1x = strtotime($tm1);
                                                                                    if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                                                                    else $tm2=$ln3["time2"];
                                                                                    
                                                                                    $totalamount=0;
                                                                                    $totalamount=($ln3["qty1"]*$wd);
                                                                                    $totalamount=($totalamount*$ln3["rate1"]);
                                                                                    $totalamountz = number_format($totalamount, 2, '.', ',');
                                                                                    
                                                                                    $totalspendy=0;
                                                                                    $rv1x = "select * from receipt_voucher where proj_id='".$_COOKIE["projectidx"]."' and ndis_item='$supportlinenumber' and paid='10' order by id desc";
                                                                                    $rv2x = $conn->query($rv1x);
                                                                                    if ($rv2x->num_rows > 0) { while($rvx = $rv2x->fetch_assoc()) { $totalspendy=($totalspendy+$rvx["cr_amt"]); } }
                                                                                    $totalsepndz = number_format($totalspendy, 2, '.', ',');
                                                                                    
                                                                                    $totalbalance=($totalamount-$totalspendy);
                                                                                    $totalbalancez = number_format($totalbalance, 2, '.', ',');
                                                                                    
                                                                                    if($totalamount==0) $totalpercent=0;
                                                                                    else $totalpercent=round(($totalspendy/$totalamount) * 100);
                                                                                    
                                                                                    echo"<table style='width:100%'>
                                                                                        <tr><td><span style='font-size:8pt'>Date</span><td><span style='font-size:8pt'>:</span></td><td><span style='font-size:8pt'>$tm1 To $tm2</span></td></tr>
                                                                                        <tr><td><span style='font-size:8pt'>Hours</span><td><span style='font-size:8pt'>:</span></td><td><span style='font-size:8pt'>".$ln3["qty1"].":".$ln3["qty2"]."</span></td></tr>
                                                                                        <tr><td><span style='font-size:8pt'>Working Days</span><td><span style='font-size:8pt'>:</span></td><td><span style='font-size:8pt'>$wd Days</span></td></tr>
                                                                                        <tr><td><span style='font-size:8pt'>Rate Per Hour</span><td><span style='font-size:8pt'>:</span></td><td><span style='font-size:8pt'><b>$ ".$ln3["rate1"]."</b></span></td></tr>
                                                                                    </table>
                                                                                </td>
                                                                                <td style='width:30%;text-align:right' nowrap><span style='font-size:8pt'>$ $totalamountz</spant><br><span style='font-size:8pt'>".$ln3["repeating"]."</b></span></td>
                                                                                <td style='width:30%;text-align:right' nowrap><span style='font-size:8pt'>$ $totalsepndz</spant></td>
                                                                                <td style='width:30%;text-align:right' nowrap><span style='font-size:8pt'>$ $totalbalancez</spant></td>
                                                                                <td style='width:30%;text-align:right' nowrap><span style='font-size:8pt'>$totalpercent %</spant></td>
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
                                                                
                                                                        // getting total spent
                                                                        $totalspent=0;
                                                                        $rv11 = "select * from receipt_voucher where proj_id='".$_COOKIE["projectidx"]."' and paid='10' order by id desc";
                                                                        $rv22 = $conn->query($rv11);
                                                                        if ($rv22->num_rows > 0) { while($rv122 = $rv22->fetch_assoc()) { $totalspent=($totalspent+$rv122["cr_amt"]); } }
                                                                        $totalspenty= number_format($totalspent, 2, '.', ',');
                                                                        
                                                                        $totalbalancex=($totalamountx-$totalspent);
                                                                        $totalbalancey= number_format($totalbalancex, 2, '.', ',');
                                                                    
                                                                        
                                                                    } }   
                                                                    
                                                                    echo"<tr class='btn-primary'>
                                                                        <td nowrap align=right style='font-size:8pt'></td>
                                                                        <td nowrap align=right style='font-size:8pt'></td>
                                                                        <td nowrap align=right style='font-size:10pt'><b>Total:</b></td>
                                                                        <td nowrap align=right style='font-size:10pt'><b>$ $totalamounty</b></td>
                                                                        <td nowrap align=right style='font-size:10pt'><b>$ $totalspenty</b></td>
                                                                        <td nowrap align=right style='font-size:10pt'><b>$ $totalbalancey</b></td>
                                                                        <td nowrap align=right style='font-size:10pt'><b>0%</b></td>
                                                                    </tr>";
                                                                    
                                                                echo"</tbody>
                                                            </table>";
                                                        }
                                                    }
                                                echo"</div>
                                            </div>
                                        </section>
                                    </div>
                                    
                                    <div class='col-12 col-sm-6'>
                                        <span>Appointment & Invoice</span><hr>
                                        <table style='width:100%'><tr>";
                                            if($mtype=="ADMIN"){
                                                echo"<td align=center>
                                                    <a href='index.php?url=create_invoice.php&id=5161&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                        <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Create</span>
                                                    </a>
                                                </td>";
                                            }
                                            
                                            echo"<td align=center>
                                                <a href='index.php?url=appointment_manager.php&id=5310' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Appointments</span>
                                                </a>
                                            </td>";
                                            
                                            echo"<td align=center>
                                                <a href='index.php?url=create_invoice.php&id=5161' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>INV Templates</span>
                                                </a>
                                            </td><td align=center>
                                                <a href='index.php?url=unpaid_invoices.php&id=5162&selection=INCOME&statusupdate=2&poinz=2&cid=1002&sheba=ndis_invoices&utype=UNPAID+INVOICES&lid_date_from=2020-01-01&lid_date_to=$currentdate&lid=800000032&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Unpaid</span>
                                                </a>
                                            </td>
                                            <td align=center>
                                                <a href='index.php?url=paid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=2020-02-01&lid_date_to=$currentdate&lid=800000032&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Paid</span>
                                                </a>
                                            </td>
                                        </tr></table><br><br>
                                    </div>";
                                
                                    echo"<div class='col-12 col-md-6'>
                                        <span>Category & Documents</span><hr>";
                                            if($advocatex!=1){
                                                echo"<table style='width:100%'><tr>
                                                    <td align=center>
                                                        <button type='button' data-bs-toggle='modal' data-bs-target='#PopupWindow' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                                            <i data-acorn-icon='box'></i>&nbsp;&nbsp;<span>Category</span>
                                                        </button>
                                                    </td>
                                                    <td align=center>";
                                                        echo"<a href='index.php?url=eod_document.php&id=5241' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>EOD</span></a>";
                                                        // echo"<a href='index.php?url=eod.php&id=5200&src_cid=".$rab1["clientid"]."' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>EOD</span></a>";
                                                    echo"</td>
                                                    <td align=center>
                                                        <a href='index.php?url=boc.php&id=5201&src_cid=".$rab1["clientid"]."' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>BOC</span></a>
                                                    </td>
                                                    <td align=center>
                                                        <a href='index.php?url=incident.php&id=5202&src_cid=".$rab1["clientid"]."' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Incident</span></a>
                                                    </td>
                                                </tr></table><br><br>";
                                            }else{
                                                echo"<table style='width:100%'><tr>
                                                    <td align=center>
                                                        <button type='button' data-bs-toggle='modal' data-bs-target='#PopupWindow' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                                            <i data-acorn-icon='box'></i>&nbsp;&nbsp;<span>Category</span>
                                                        </button>
                                                    </td>
                                                    <td align=center>
                                                        <a href='https://nexis365.com/saas/index.php?url=case_category_manager.php&id=5394' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><span>Documents</span></a>
                                                    </td>
                                                    <td align=center>
                                                        <a href='index.php?url=articles.php&id=5201&src_cid=".$rab1["clientid"]."' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><span>Articles</span></a>
                                                    </td>
                                                    <td align=center>
                                                        <a href='index.php?url=references.php&id=5201&src_cid=".$rab1["clientid"]."' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><span>References</span></a>
                                                    </td>
                                                </tr></table><br><br>";
                                            }
                                        
                                    echo"</div>";
                                }
                                
                                echo"<div class='col-12 col-md-12'>
                                    <section class='scroll-section' id='accordionCards'>
                                        <div class='card d-flex mb-2' style='padding:10px'>";
                                            if($mtype!="USER"){
                                                echo"<table style='width:100%'><tr>
                                                    <td style='font-size:10pt;width:90%' align=left>
                                                        <a data-bs-toggle='collapse' href='#document-expand' aria-expanded='false' aria-controls='collapseExample'><span>Documents Manager (click to expand)</span></a>
                                                    </td><td style='text-align:right' align=right>
                                                        <div class='btn-group' style='margin-right:10px'>
                                                            <a data-bs-toggle='collapse' href='#document-expand' aria-expanded='false' aria-controls='collapseExample'><i class='fa fa-angle-down'></i></a>
                                                        </div>
                                                    </td>
                                                </tr></table><hr>
                                                <div class='collapse' id='document-expand'>";
                                            }else{
                                                echo"<table style='width:100%'><tr>
                                                    <td style='font-size:10pt;width:90%' align=left><a ><span>Documents Manager (click to expand)</span></a></td>
                                                </tr></table><hr>
                                                <div>";
                                            } 
                                                echo"<div class='mb-n2' id='accordionCardsExample'>";
                                                    $cat1 = "select * from project_category where status='1' order by sorder asc";
                                                    $cat2 = $conn->query($cat1);
                                                    if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) {
                                                        $datatargetX="category".$cat3["id"]."X";
                                                        $datatargetXX="category".$cat3["id"]."XX";
                                                        $datatargetY="category".$cat3["id"]."Y";
                                                        $datatargetZ="category".$cat3["id"]."Z";
                                                        $categoryX="cat".$cat3["id"]."Z";
                                                        $categoryY="cat".$cat3["id"]."Y";
                                                        $t=$cat3["id"];
                                                        if($cat3["status"]==1){ 
                                                            $tabvar="collapse".$cat3["id"]."Cards";
                                                            
                                                            echo"<div class='card mb-5' data-itemid=".$cat3['id']."' style='padding:5px'>
                                                                <div class='ibox-title'>
                                                                    <div class='card-body' style='padding:5px'>
                                                                        <table style='width:100%'><tr>
                                                                            <td style='font-size:10pt;width:90%' align=left>
                                                                                <div class='btn btn-link list-item-heading p-0'><i class='fa fa-book'></i>&nbsp;&nbsp;
                                                                                    <a data-bs-toggle='collapse' href='#category-".$cat3["id"]."' onmouseover=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\" aria-expanded='false' aria-controls='collapseExample'>".$cat3["category"]."</a>
                                                                                </div>
                                                                            </td><td style='text-align:right' align=right>
                                                                                <div class='btn-group' style='margin-right:10px'>";
                                                                                    if($mtype!="USER"){
                                                                                        echo"<button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                                                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                                                                            <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#$datatargetX' aria-controls='offcanvasRightLarge' ><i class='fa fa-plus'></i> &nbsp;Add Note/Document</a>
                                                                                            <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#$datatargetXX' aria-controls='offcanvasRightLarge' ><i class='fa fa-edit'></i> &nbsp;Edit Category Name</a>
                                                                                            <a class='dropdown-item' href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=0' target='dataprocessor' data-bs-toggle='modal' data-bs-target='#$datatargetXX' aria-controls='offcanvasRightLarge' ><i class='fa fa-times'></i> &nbsp;Suspend Record</a>
                                                                                        </div>
                                                                                        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' onclick=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\"><i class='fa fa-refresh'></i></button>";
                                                                                    }
                                                                                    echo"<a data-bs-toggle='collapse' href='#category-".$cat3["id"]."' onmouseover=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\" aria-expanded='false' aria-controls='collapseExample' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm'>
                                                                                        <i class='fa fa-angle-down'></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr></table>
                                    
                                                                        <div class='collapse' id='category-".$cat3["id"]."'>
                                                                            <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                                                <div id='$datatargetY' style='padding:0px'>
                                                                                    <table class='table table-striped table-bordered table-hover dataTables-example1' >
                                                                                        <thead><tr><th>Date</th><th>Concern</th><th>Contact</th><th>Documents</th><th>Note</th></tr></thead>
                                                                                        <tbody>";
                                                                                            $ra1 = "select * from project_forms where projectid='".$_COOKIE["projectidx"]."' and categoryid='".$cat3["id"]."' and status='1' order by id desc";
                                                                                            $rb1 = $conn->query($ra1);
                                                                                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                                                                $cdate=date("d-m-Y", $rab1["date"]);
                                                                                                $datatargetZZ="category".$rab1["categoryid"]."Z";
                                                                                                $datatargetYY="category".$rab1["categoryid"]."Y";
                                                                                                
                                                                                                echo"<tr class='gradeX'>
                                                                                                    <td nowrap><i class='fa fa-clock'></i>&nbsp; $cdate</td>
                                                                                                    <td nowrap>".$rab1["cname"]."</td>
                                                                                                    <td>".$rab1["contact"]."</td>
                                                                                                    <td>";
                                                                                                        $t=0;
                                                                                                        $ra1x = "select * from project_multi_image where postid='".$rab1["id"]."' and randid='".$rab1["randid"]."' and status='1' order by id desc";
                                                                                                        $rb1x = $conn->query($ra1x);
                                                                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                                                                            $loclength=0;
                                                                                                            $loclength=strlen($rab1x["location"]);
                                                                                                            if($loclength>=32){
                                                                                                                $t=($t+1);
                                                                                                                $locname="";
                                                                                                                $locname=substr($rab1x["location"],35);
                                                                                                                echo"<a href='".$rab1x["location"]."' target='cm'>$t. $locname</a><br>";
                                                                                                            }
                                                                                                        } }
                                                                                                    echo"</td>
                                                                                                    <td >
                                                                                                        <button data-bs-toggle='modal' data-bs-target='#formdata".$rab1["id"]."' class='btn btn-outline-primary'>View Note</button>
                                                                                                        <div class='modal fade modal-close-out' id='formdata".$rab1["id"]."' tabindex='-1' role='dialog' aria-labelledby='formdata".$rab1["id"]."CloseOut' aria-hidden='true' >
                                                                                                            <div class='modal-dialog'><div class='modal-content'>
                                                                                                                <div class='modal-header'>
                                                                                                                    <h5 class='modal-title' id='formdata".$rab1["id"]."CloseOut'>View Note</h5>
                                                                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                                                                </div>
                                                                                                                <div class='modal-body'><span style=''>".$rab1["note"]."</span></div>
                                                                                                            </div></div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td style='width:20px'><div class='btn-group' onmouseout=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">";
                                                                                                        if($mtype!="USER"){
                                                                                                            echo"<a href='deleterecords.php?delid=".$rab1["id"]."&tbl=project_forms&sourceid=id' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                                                                                                <i class='fa fa-trash'></i>
                                                                                                            </a>";
                                                                                                        }
                                                                                                    echo"</div></td>
                                                                                                </tr>";
                                                                                            } }
                                                                                        echo"</tbody>
                                                                                    </table>
                                                                                </div>"; ?>
                                                                                <script type="text/javascript">
                                                                                    function <?php echo"$datatargetZ"; ?>(<?php echo"$categoryX"; ?>,<?php echo"$categoryY"; ?>){
                                                                                        $.ajax({
                                                                                            url: 'project-category-list.php?cid='+<?php echo"$categoryX"; ?>,
                                                                                            success: function(html) {
                                                                                                var ajaxDisplay = document.getElementById(<?php echo"$categoryY"; ?>);
                                                                                                ajaxDisplay.innerHTML = html;
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                </script> <?php
                                                                            echo"</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                            
                                                        }
                                                        /*
                                                        else{
                                                            $tabvar="collapseCards".$cat3["id"]."";
                                                            echo"<div class='card d-flex mb-2'>
                                                                <div class='d-flex flex-grow-1' role='button' data-bs-toggle='collapse' data-bs-target='#$tabvar' aria-expanded='true' aria-controls='$tabvar'>
                                                                    <div class='card-body py-4'>
                                                                        <div class='row'> 
                                                                            <div class='col-md-10'>
                                                                                <a data-toggle='collapse' href='#'>
                                                                                    <div class='btn btn-link list-item-heading p-0'><i class='fa fa-book'></i>&nbsp;&nbsp;".$cat3["category"]."</div>
                                                                                </a>
                                                                            </div><div class='col-md-2' style='text-align:center'>
                                                                                <a href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=1' target='dataprocessor' class='btn btn-outline-default btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-play'></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id='collapseOneCards' class='collapse show' data-bs-parent='#accordionCardsExample'>
                                                                    <div class='card-body accordion-content pt-0'></div>
                                                                </div>
                                                            </div>";
                                                        }
                                                        */
                                                        
                                                        echo"<div class='modal fade modal-close-out' id='$datatargetXX' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>".$cat3["category"]."</h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <form method='post' action='updaterecord.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                                                            <input type='hidden' name='processor' value='category'><input type='hidden' name='id' value='".$cat3["id"]."'>
                                                                            <div class='form-group'><label>Category Name</label><input name='category' type='text' required value='".$cat3["category"]."' class='form-control'></div><br>
                                                                            <div class='form-group'><label>Sort Order</label><input name='sorder' type='number' value='".$cat3["sorder"]."' class='form-control'></div><br>
        
                                                                            <div class='modal-footer'>
                                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                                                <button type='submit' class='btn btn-primary' onclick=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\">Update Category</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";
        
                                                        echo"<div class='modal fade modal-close-out' id='$datatargetX' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>".$cat3["category"]."</h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <form method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                                                            <input type='hidden' name='processor' value='categorydata'><input type='hidden' name='processor1' value='".$cat3["type"]."'>
                                                                            <input type='hidden' name='id' value='".$cat3["id"]."'><input type='hidden' name='projectid' value='".$_COOKIE["projectidx"]."'>
                                                                            <div class='form-group'><label>Date *</label><input name='cdate' type='date' class='form-control' value='$currentdate'></div><br>
                                                                            <div class='form-group'><label>Concern/Title Name *</label><input name='cname' type='text' value='' class='form-control' required></div><br>
                                                                            <div class='form-group'><label>Contact/Introduction</label><input name='contact' type='text' value='' class='form-control'></div><br>
                                                                            <div class='form-group'><label>Select Single/Multiple Document to Upload<br>File Extention: *.doc, *.docx, *.pdf, *.jpg, *.png, *.gif, *.jpeg).</label>
                                                                                <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                                                                                <input type='hidden' name='sessionid' value='".$cat3["id"]."'>
                                                                            </div><br>
                                                                            <div class='form-group'><label>Detail Note (if any)</label><textarea id='summernote' name='note' class='form-control'></textarea></div>
        
                                                                            <div class='modal-footer'>
                                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                                                <button type='submit' class='btn btn-primary' onclick=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\">Upload & Save Data</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";
                                                    } }
                                                    
                                                    /*
                                                    $cat1 = "select * from project_category where status='0' order by sorder asc";
                                                    $cat2 = $conn->query($cat1);
                                                    if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) {
                                                        $datatargetX="category".$cat3["id"]."X";
                                                        $datatargetXX="category".$cat3["id"]."XX";
                                                        $datatargetY="category".$cat3["id"]."Y";
                                                        $datatargetZ="category".$cat3["id"]."Z";
                                                        $categoryX="cat".$cat3["id"]."Z";
                                                        $categoryY="cat".$cat3["id"]."Y";
                                                        $t=$cat3["id"];
                                                        echo"<div class='card d-flex mb-2'>
                                                                <div class='d-flex flex-grow-1' role='button' data-bs-toggle='collapse' data-bs-target='#collapseOneCards' aria-expanded='true' aria-controls='collapseOneCards'>
                                                                    <div class='card-body py-4'>
                                                                        <div class='row'> 
                                                                            <div class='col-md-10'>
                                                                                <a data-toggle='collapse' href='#'>
                                                                                    <div class='btn btn-link list-item-heading p-0'><i class='fa fa-book'></i>&nbsp;&nbsp;".$cat3["category"]."</div>
                                                                                </a>
                                                                            </div><div class='col-md-2' style='text-align:center'>
                                                                                <a href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=1' target='dataprocessor' class='btn btn-outline-default btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-play'></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id='collapseOneCards' class='collapse show' data-bs-parent='#accordionCardsExample'>
                                                                    <div class='card-body accordion-content pt-0'></div>
                                                                </div>
                                                            </div>";
                                                    } }
                                                    */
                                                echo"</div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>";
                    } }
                    
                echo"</div>
            </div>
        </div>
    </div>";  