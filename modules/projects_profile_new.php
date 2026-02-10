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
                            if ($rb4->num_rows > 0) { while($rab4x = $rb4->fetch_assoc()) { $casedepartment=$rab4x["department_name"]; } }
                            
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

                                                if($rab1["managed_by"]=="SELF Managed") echo"<a href='#' data-bs-toggle='offcanvas' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=project&ctitle=$title&status=1&pstat=1&sf=2', 'offcanvasRightLarge')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>&nbsp;";
                                                
                                            }else{
                                                if($mtype=="ADMIN"){
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
                                </div>";
                                
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
                                
                                echo"<div class='col-12'>
                                    <div class='contact-box' style='padding:5px'>
                                        <div class='card d-flex mb-2' style='padding:10px;'>
                                            <div class='row'>
                                                <div class='col-12 col-md-12'><h2>About $clientname!</h2></div>
                                                <div class='col-12 col-md-12'><span><p class='small'>$aboutclient</p></span></b></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-12 col-md-8'>
                            <div class='col-md-12'><br><br>
                                
                                
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
                        </div>";
                    } }
                    
                echo"</div>
            </div>
        </div>
    </div>";  