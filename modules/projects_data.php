<?php

    include("../authenticator.php");
    
    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="CARD";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $prjsrc=0;
    if(isset($_GET["prjsrc"])) $prjsrc=$_GET["prjsrc"];
    
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    if(isset($_GET["status"])) $status=$_GET["status"]; 
    else $status=1;
    
    $stat=strlen($_GET["status"]);
    
    $advocatex=0;
    // $advocatey = "select * from solutions where id='10012' order by id asc limit 1";
    // $advocatez = $conn->query($advocatey);
    // if ($advocatez->num_rows > 0) { while($advocatexyz = $advocatez->fetch_assoc()) {  $advocatex=1; } }
    
    $titlexyz="Project";
    $tl="Team Leader";
    $sc="Support Co-ordinator";
    $ast="Support Team";
    
    echo"<div class='card-body' style='width:100%;padding:0px'><br><br>
        <div class='row' style='padding-left:5px;padding-right:5px'>";
            if($prjsrc!=0){
                if($mtype=="ADMIN") $ra1 = "select * from project where id='$prjsrc' and status='$status' order by name asc";
                else if($mtype=="CLIENT") $ra1 = "select * from project where id='$prjsrc' and clientid='$userid' and status='$status' order by name asc";
                // else  $ra1 = "select * from project where id='$prjsrc' and leaderid='$userid' and status='$status' order by name asc";
                else $ra1 = "select * from project where id='$prjsrc' and status='$status' order by name asc";
            }else{
                if($mtype=="ADMIN") $ra1 = "select * from project where status='$status' order by name asc";
                else if($mtype=="CLIENT") $ra1 = "select * from project where clientid='$userid' and status='$status' order by name asc";
                // else  $ra1 = "select * from project where leaderid='$userid' and status='$status' order by name asc";
                else $ra1 = "select * from project where teamleaderid='$userid' and status='$status' OR leaderid='$userid' and status='$status' OR caseid='$userid' and status='$status' order by name asc";
            }
            
            $rb1 = $conn->query($ra1);
            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                
                $goforit=0;
                if($mtype=="USER"){
                    
                    if($rab1["caseid"]==$userid) $goforit=1;
                    if($rab1["leaderid"]==$userid) $goforit=1;
                    if($rab1["teamleaderid"]==$userid) $goforit=1;
                    
                    $tx1 = "select * from project_team_allocation where employeeid='$userid' and projectid='".$rab1["id"]."' and status='1' order by id asc limit 1";
                    $ty1 = $conn->query($tx1);
                    if ($ty1->num_rows > 0) { while($txy1 = $ty1->fetch_assoc()) { $goforit=1; } }
                    
                }else $goforit=1;
                
                if($goforit==1){
                    $psdate=date("d-m-Y",$rab1["start_date"]);
                    $pedate=date("d-m-Y",$rab1["end_date"]);
                    
                    $bsdate=date("d-m-Y",$rab1["budget_date"]);
                    $bedate=date("d-m-Y",$rab1["budget_close_date"]);
                    
                    $sdate=date("d.m.Y",time());
                    $edate=date("d.m.Y",time());
                    
                    // CLIENT DETAIL
                    $clientname1="";
                    $clientname2="";
                    $clientimage="";
                    $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                        $clientname1=$rab2["username"];
                        $clientname2=$rab2["username2"];
                        $clientimage=$rab2["images"];
                    } }
                        
                    // CASE MANAGER DETAIL
                    $casename1="";
                    $casename2="";
                    $caseimage="";
                    $ra33 = "select * from uerp_user where id='".$rab1["caseid"]."' order by id asc limit 1";
                    $rb33 = $conn->query($ra33);
                    if ($rb33->num_rows > 0) { while($rab33 = $rb33->fetch_assoc()) {
                        $casename1=$rab33["username"];
                        $casename2=$rab33["username2"];
                        $caseimage=$rab33["images"];
                        $ra43 = "select * from departments where id='".$rab33["department"]."' order by id asc limit 1";
                        $rb43 = $conn->query($ra43);
                        if ($rb43->num_rows > 0) { while($rab43 = $rb43->fetch_assoc()) { $casedepartment=$rab43["department_name"]; } }
                            
                        $ra53 = "select * from designation where id='".$rab33["designation"]."' order by id asc limit 1";
                        $rb53 = $conn->query($ra53);
                        if ($rb53->num_rows > 0) { while($rab53 = $rb53->fetch_assoc()) { $casedesignation=$rab53["designation"]; } }
                    } }
                    
                    // TEAM LEADER DETAIL
                    $leadername1="";
                    $leadername2="";
                    $leaderimage="";
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
                    
                    // SUPPORT CO-ORDINATION / CARE / SELF DETAIL
                    $teamleadername1="";
                    $teamleadername2="";
                    $teamleaderimage="";
                    $ra10 = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                    $ra11 = $conn->query($ra10);
                    if ($ra11->num_rows > 0) { while($ra12 = $ra11->fetch_assoc()) {
                        $teamleadername1=$ra12["username"];
                        $teamleadername2=$ra12["username2"];
                        $teamleaderimage=$ra12["images"];
                        $ra4 = "select * from departments where id='".$ra12["department"]."' order by id asc limit 1";
                        $rb4 = $conn->query($ra4);
                        if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $teamleaderdepartment=$rab4["department_name"]; } }
                        
                        $ra5 = "select * from designation where id='".$ra12["designation"]."' order by id asc limit 1";
                        $rb5 = $conn->query($ra5);
                        if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $teamleaderdesignation=$rab5["designation"]; } }
                            
                    } }
                        
                    $frmid=$rab1["id"];
                        
                    
                    echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:3px;padding-top:4px'>
                        <div class='card mb-3'>
                            <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' name='loginForm$frmid'>";
                                if(strlen($rab1["image"]>=5)) echo"<img src='".$rab1["image"]."' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                else echo"<img src='img/no_image.png' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                echo"<input type='hidden' name='processor' value='edit_project_image'><input type='hidden' name='id' value='".$rab1["id"]."'>";
                                // <button onclick='this.form.images1[].click()' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='border-radius:10px;position:absolute;z-index:999999999;margin-top:10px;margin-left:-45px'>+</button>
                                echo"<input type='file' name='images1[]' multiple class='form__field__img form-control' onchange=\"this.form.submit(); shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" style='width:100px;margin-left:3px;margin-top:-36px'>
                            </form>
                            
                            <div class='card-body mb-n5' style='padding:10px;min-height:350px'>
                                <div class='d-flex align-items-left flex-column mb-5' style='padding:0px'>";
                                    
                                    if(strlen($rab1["managed_by"])>=3) $managedby=$rab1["managed_by"];
                                    else $managedby="NDIA Managed";
                                    
                                    $swtitle="Support Co-Ordinator";
                                    if($rab1["managed_by"]=="NDIA Managed") $swtitle="Support Co-Ordinator";
                                    if($rab1["managed_by"]=="SELF Managed") $swtitle="Client Itself";
                                    if($rab1["managed_by"]=="PLAN Managed") $swtitle="Plan Manager";
                                    
                                    if(strlen($rab1["priority"])>=3) $priority=$rab1["priority"];
                                    else $managedby="Medium";
                                    
                                    echo"<table width='100%' style='font-size:8pt'>";
                                        echo"<tr><td style='height:50px' valign='top' colspan=10><h4 class='m-b-xs'>".$rab1["name"]."</h3></td></tr>";
                                        echo"<tr><td>Project Priority</td><td>:</td><td>$priority</td></tr>";
                                        echo"<tr><td>Client Name</td><td>:</td><td>$clientname1 $clientname2</td></tr>";
                                        echo"<tr><td>Managed By</td><td>:</td><td>$managedby</td></tr>";
                                        echo"<tr><td>$swtitle</td><td>:</td><td>$teamleadername1 $teamleadername2</td></tr>";
                                        echo"<tr><td>Case Manager</td><td>:</td><td>$casename1 $casename2</td></tr>";
                                        echo"<tr><td>Team Leader</td><td>:</td><td>$leadername1 $leadername2</td></tr>";
                                        echo"<tr><td>Plan Date</td><td>:</td><td>$psdate To $pedate</td></tr>";
                                        echo"<tr><td>Budget Date</td><td>:</td><td>$bsdate To $bedate</td></tr>";
                                    echo"</table><hr>
                                    <div style='width:100%;text-align:center'>
                                        <table style='width:100%'><tr>";
                                            
                                            echo"<td valign=top align=center>
                                                <a href='global-set.php?pstat=1&projectidx=".$rab1["id"]."&url=projects.php&id=62' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Project Profile'><i class='fa-solid fa-eye'></i></a>
                                                <br><span style='font-size:8pt'>View</span>
                                            </td>";
                                            
                                            if($mtype!="USER"){
                                                echo"<td valign=top align=center>
                                                    <a href='#' data-bs-toggle='offcanvas' data-bs-placement='bottom' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=project&ctitle=$title&status=$status&pstat=1&sf=1', 'offcanvasRightLarge')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>
                                                    <br><span style='font-size:8pt'>Edit</span>
                                                <td>
                                                <td valign=top align=center>";
                                                    if($status==10) echo"<a href='suspendrecord.php?suspendid2=".$rab1["id"]."&tbl=project' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Activate Project'><i class='fa-solid fa-unlock-alt'></i></a><br><span style='font-size:8pt'>Activate</span>";
                                                    else echo"<a href='suspendrecord.php?suspendid=".$rab1["id"]."&tbl=project' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Suspend This Project'><i class='fa-solid fa-lock'></i></a><br><span style='font-size:8pt'>Suspend</span>";
                                                echo"</td>
                                                <td valign=top align=center>
                                                    <a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=project' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Set Project status to Completed'><i class='fa-solid fa-archive'></i></a>
                                                    <br><span style='font-size:8pt'>Archive</span>
                                                </td>";
                                            }else{
                                                if($rab1["teamleaderid"]==$userid){
                                                    echo"<td valign=top align=center>
                                                        <a href='#' data-bs-toggle='offcanvas' data-bs-placement='bottom' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=project&ctitle=$title&status=$status&pstat=1&sf=1', 'offcanvasRightLarge')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>
                                                        <br><span style='font-size:8pt'>Edit</span>
                                                    <td>";
                                                }
                                            }
                                            
                                        echo"</tr></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            } }
        echo"</div>
    </div>";