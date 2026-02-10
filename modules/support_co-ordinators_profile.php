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
    $title="Edit Project SC Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    echo"<hr><div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
        <div class='tabs-container'>
            <div class='panel-body'>
                <div class='row'>";
                    $currenttime=time();
                    $currentdate=date("Y-m-d",$currenttime);
                    $ra1 = "select * from project_sc where id='".$_COOKIE["projectidsc"]."' and status='1' order by id asc limit 1";
                    $rb1 = $conn->query($ra1);
                    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                        if(strlen($rab1["start_Date"])>=5) $sdate=date("d-m-Y",$rab1["start_date"]);
                        else $sdate="-";
                        if(strlen($rab1["end_date"])>=5) $edate=date("d-m-Y",$rab1["end_date"]);
                        else $edate="-";
                        if(strlen($rab1["dob"])>=5) $dob=date("d-m-Y",$rab1["dob"]);
                        else $dob="-";
                        
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
                        
                        echo"<div class='col-12 col-md-4'>
                            <h2 class='small-title'>Project SC Profile</h2>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='contact-box center-version' style='padding:5px;'>
                                        <div class='card d-flex mb-2' style='padding:10px;min-height:260px'>
                                            <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' name='loginForm$frmid'>";
                                                if(strlen($rab1["image"]>=5)) echo"<img src='".$rab1["image"]."' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                                else echo"<img src='img/no_image.png' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                                echo"<input type='hidden' name='processor' value='edit_project_sc_image'><input type='hidden' name='id' value='".$rab1["id"]."'>
                                                <input type='file' name='images1[]' multiple class='form__field__img form-control' onchange=\"this.form.submit(); shiftdataV2('support_co-ordinators_profile.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" style='width:100px;margin-left:3px;margin-top:-36px'>
                                            </form>
                                            <h2 class='m-b-xs'>".$rab1["name"]."</h2><hr>
                                            <span style='font-size:8pt'>
                                                DOB: $dob<hr>
                                                NDIS # ".$rab1["ndis_no"]."<hr>
                                                NDIS Start Date: $sdate<hr>
                                                NDIS End Date: $edate<hr>
                                                Core Supports: $ ".$rab1["core_supports"]."<hr>
                                                Capacity Building Supports: $ ".$rab1["capacity_building_supports"]."<hr>
                                                Support Coordination Fund: $ ".$rab1["support_coordination_fund"]."<hr>
                                                <table style='width:100%'><tr>
                                                    <td valign=top align=center><a href='#' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('support_co-ordinators_manager.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title&status=$status', 'offcanvasTop2')\" style='margin-top:0px;' title='Edit SC Project Data'><i class='fa-solid fa-edit'></i></a><br><span style='font-size:8pt'>Edit</span></td>
                                                    <td valign=top align=center>";
                                                        if($status==10) echo"<a href='suspendrecord.php?suspendid2=".$rab1["id"]."&tbl=project_sc' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Activate Project'><i class='fa-solid fa-unlock-alt'></i></a><br><span style='font-size:8pt'>Activate</span>";
                                                        else echo"<a href='suspendrecord.php?suspendid=".$rab1["id"]."&tbl=project_sc' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Suspend This Project'><i class='fa-solid fa-lock'></i></a><br><span style='font-size:8pt'>Suspend</span>";
                                                    echo"</td>
                                                    <td valign=top align=center><a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=project_sc' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Set SC Project status to Completed'><i class='fa-solid fa-close'></i></a><br><span style='font-size:8pt'>Close</span></td>
                                                </tr></table>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='col-lg-12'>
                                    <div class='card mb-5' data-itemid='10009' style='padding:5px'>
                                        <div class='ibox-title'>
                                            <div class='card-body' style='padding:5px'>
                                                <table style='width:100%'><tr>
                                                    <td align=left style='font-size:10pt;width:90%'>
                                                        <a data-bs-toggle='collapse' href='#category-10009' aria-expanded='false' aria-controls='collapseExample'>
                                                            <div class='btn btn-link list-item-heading p-0'>Assigned Team Members</div>
                                                        </a>
                                                    </td><td align=right>
                                                        <a data-bs-toggle='collapse' href='#category-10009' aria-expanded='false' aria-controls='collapseExample'>
                                                            <i class='fa fa-angle-down'></i>
                                                        </a>
                                                    </td>
                                                </tr></table>
                                                <div class='collapse' id='category-10009'><hr>
                                                    <table><tr>";
                                                        $title="Support Workers Allocation For ".$rab1["name"].".";
                                                        $tt=0;
                                                        $ttt=0;
                                                        
                                                        $ra6 = "select * from project_sc_team_allocation where projectid='".$rab1["id"]."' order by id asc";
                                                        $rb6 = $conn->query($ra6);
                                                        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                            $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                            $rb7 = $conn->query($ra7);
                                                            if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) { $tt=($tt+1); } }
                                                        } }
                                                        
                                                        $ra66 = "select * from project_sc_team_allocation where projectid='".$rab1["id"]."' order by id asc limit 3";
                                                        $rb66 = $conn->query($ra66);
                                                        if ($rb66->num_rows > 0) { while($rab66 = $rb66->fetch_assoc()) {
                                                            $ra77 = "select * from uerp_user where id='".$rab66["employeeid"]."' order by id asc limit 1";
                                                            $rb77 = $conn->query($ra77);
                                                            if ($rb77->num_rows > 0) { while($rab77 = $rb77->fetch_assoc()) {
                                                                $ttt=($ttt+1);
                                                                echo"<td style='width:25%;padding:5px;line-height:1.2;' align=center valign=top nowrap>";
                                                                    if(strlen($rab77["images"])>=100) echo"<img src='".$rab77["images"]."' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                                    else echo"<img src='./assets/noimage.png' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                                echo"<br><span style='font-size:8pt'>".$rab77["username"]."</span></td>";
                                                                if($ttt>=4){
                                                                    $ttt=0;
                                                                    echo"</tr><tr>";
                                                                }
                                                            } }
                                                        } }
                                                        echo"<td style='width:25%;padding:5px;line-height:1.2;' align=center valign=middle nowrap>
                                                            <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('support_co-ordinators_team.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title&refurl=support_co-ordinators_profile.php', 'offcanvasRightLarge')\" title='View All Support Workers'>$tt+</button>
                                                        </td>
                                                    </tr></table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                                
                                echo"<div class='col-lg-12'>
                                    <div class='contact-box center-version' style='padding:5px'>
                                        <div class='card d-flex mb-2' style='padding:10px'>
                                            <table style='width:100%'><tr>
                                                <td align=left>Self Assigned Tasks</td>
                                                <td align=right>";
                                                    if($designationy==13){
                                                        echo"<button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&url=support_co-ordinators.php&pstat=1&id=786&projectid=".$rab1["id"]."&ctitle=Add New Task&refurl=support_co-ordinators_profile.php', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <span>Add Task</span>
                                                        </button>";
                                                    }
                                                echo"</td>
                                            </tr></table>
                                            <div><hr>";
                                                $projectid=$rab1["id"];
                                                include 'task_manager_data.php';
                                            echo"</div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            
                            echo"<div class='col-md-12'>
                                
                                <div class='card mb-5' data-itemid='10001' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10001' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Occupational Theparist</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10001' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10001'><hr>
                                                <table style='width:100%'>
                                                    <tr><td style='width:50%' nowrap>Name: </td><td style='width:50%'>".$rab1["occupational_name"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Contact #: </td><td style='width:50%'>".$rab1["occupational_no"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Email Address: </td><td style='width:50%'>".$rab1["occupational_email"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Organization: </td><td style='width:50%'>".$rab1["occupational_org"]."</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='card mb-5' data-itemid='10002' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10002' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Speech Theparist</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10002' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10002'>
                                                <hr><table style='width:100%'>
                                                    <tr><td style='width:50%' nowrap>Name: </td><td style='width:50%'>".$rab1["speech_name"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Contact #: </td><td style='width:50%'>".$rab1["speech_no"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Email Address: </td><td style='width:50%'>".$rab1["speech_email"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Organization: </td><td style='width:50%'>".$rab1["speech_org"]."</td></tr>
                                                </table>
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
                                                        <div class='btn btn-link list-item-heading p-0'>Behavior Practitioner</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10003' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10003'>
                                                <hr><table style='width:100%'>
                                                    <tr><td style='width:50%' nowrap>Name: </td><td style='width:50%'>".$rab1["behavior_name"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Contact #: </td><td style='width:50%'>".$rab1["behavior_no"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Email Address: </td><td style='width:50%'>".$rab1["behavior_email"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Organization: </td><td style='width:50%'>".$rab1["behavior_org"]."</td></tr>
                                                </table>
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
                                                        <div class='btn btn-link list-item-heading p-0'>Provider</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10004' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10004'>
                                                <hr><table style='width:100%'>
                                                    <tr><td style='width:50%' nowrap>Name: </td><td style='width:50%'>".$rab1["provider_name"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Contact #: </td><td style='width:50%'>".$rab1["provider_no"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Email Address: </td><td style='width:50%'>".$rab1["provider_email"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Organization: </td><td style='width:50%'>".$rab1["provider_org"]."</td></tr>
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
                                                        <div class='btn btn-link list-item-heading p-0'>Nominee Data</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10005' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10005'><hr>
                                                <table style='width:100%'>
                                                    <tr><td style='width:50%' nowrap>Nominee Name: </td><td style='width:50%'>".$rab1["n_name"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Address: </td><td style='width:50%'>".$rab1["n_address"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Contact #: </td><td style='width:50%'>".$rab1["n_number"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Email Address: </td><td style='width:50%'>".$rab1["n_email"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Relation: </td><td style='width:50%'>".$rab1["n_relation"]."</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='card mb-5' data-itemid='10006' style='padding:5px'>
                                    <div class='ibox-title'>
                                        <div class='card-body' style='padding:5px'>
                                            <table style='width:100%'><tr>
                                                <td align=left style='font-size:10pt;width:90%'>
                                                    <a data-bs-toggle='collapse' href='#category-10006' aria-expanded='false' aria-controls='collapseExample'>
                                                        <div class='btn btn-link list-item-heading p-0'>Plan Manager Data</div>
                                                    </a>
                                                </td><td align=right>
                                                    <a data-bs-toggle='collapse' href='#category-10006' aria-expanded='false' aria-controls='collapseExample'>
                                                        <i class='fa fa-angle-down'></i>
                                                    </a>
                                                </td>
                                            </tr></table>
                                            <div class='collapse' id='category-10006'><hr>
                                                <table style='width:100%'> 
                                                    <tr><td style='width:50%' nowrap>Manager Name: </td><td style='width:50%'>".$rab1["p_name"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Address: </td><td style='width:50%'>".$rab1["p_address"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Contact #: </td><td style='width:50%'>".$rab1["p_phone"]."</td></tr>
                                                    <tr><td style='width:50%' nowrap>Email Address: </td><td style='width:50%'>".$rab1["p_email"]."</td></tr>
                                                </table> 
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                            
                            
                                $s = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                                $r = $conn->query($s);
                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                    $dobx=date("d-m-Y",$rs["dob"]);
                                    
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
                                                        <tr><td valign=top><strong>Address</strong></td><td valign=top>:</td><td valign=top>".$rs["address"]."</td></tr>
                                                        <tr><td valign=top><strong>Address 2</strong></td><td valign=top>:</td><td valign=top>".$rs["address2"]."</td></tr>
                                                        <tr><td valign=top><strong>City</strong></td><td valign=top>:</td><td valign=top>".$rs["city"]."</td></tr>
                                                        <tr><td valign=top><strong>State</strong></td><td valign=top>:</td><td valign=top>".$rs["area"]."</td></tr>
                                                        <tr><td valign=top><strong>Zip</strong></td><td valign=top>:</td><td valign=top>".$rs["zip"]."</td></tr>
                                                        <tr><td valign=top><strong>Country</strong></td><td valign=top>:</td><td valign=top>".$rs["country"]."</td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='card mb-5' data-itemid='10007' style='padding:5px'>
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
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td><strong>ABN</strong></td><td>:</td><td>$abn</td></tr>
                                                        <tr><td><strong>Nationality</strong></td><td>:</td><td>".$rs["nationality"]."</td></tr>
                                                        <tr><td><strong>Marital Status</strong></td><td>:</td><td>".$rs["marital_status"]."</td></tr>
                                                        <tr><td><strong>driving licence no</strong></td><td>:</td><td>".$rs["driving_licence_no"]."</td></tr>
                                                        <tr><td><strong>Gender</strong></td><td>:</td><td>".$rs["gender"]."</td></tr>
                                                        <tr><td><strong>DOB</strong></td><td>:</td><td>$dobx</td></tr>
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
                                                        <tr><td>A/c Number</td><td>:</td><td>".$rs["account_number"]."</td></tr><tr><td>BSB</td><td>:</td><td>".$rs["bsb"]."</td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                } }
                            echo"</div>
                        </div>
                        
                        <div class='col-12 col-md-8'>
                            <h2 class='small-title'>Project SC Progress Chart</h2><br> 
                            <div class='row'>
                                <div class='col-12 col-md-12'>
                                    <section class='scroll-section' id='lineChartTitle'>
                                        <div class='card mb-5'><div class='card-body'><div class='sh-35'>
                                        <iframe name='chart_accounts' src='./modules/project_chart.php?c=bar&v=M&uc=1&clientid=".$rab1["clientid"]."' scrolling='no' border='0' frameborder='0' width='100%' height='270'>BROWSER NOT SUPPORTED</iframe>
                                        </div></div></div>
                                    </section>
                                </div>
                                <div class='col-12 col-md-6'>
                                    <span>Support Co-Ordinator's Invoice</span><hr>
                                    <table style='width:100%'><tr>
                                        <td align=center><a href='#' data-bs-toggle='modal' data-bs-target='#Invoice' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>Invoice</a></td>
                                        <td align=center><a href='index.php?url=create_sc_invoice.php&id=5161&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'>Create</a></td>
                                        <td align=center><a href='index.php?url=unpaid_sc_invoices.php&id=5162&selection=INCOME&statusupdate=2&poinz=2&cid=1002&sheba=ndis_invoices&utype=UNPAID+INVOICES&lid_date_from=2020-01-01&lid_date_to=$currentdate&lid=800000032&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button'>Unpaid</a></td>
                                        <td align=center><a href='index.php?url=paid_sc_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=2020-02-01&lid_date_to=$currentdate&lid=800000032&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'>Paid</a></td>
                                    </tr></table><br><br>
                                </div>
                                <div class='col-12 col-md-6'>
                                    <span>Category & Documents</span><hr>
                                    
                                    <table width='100%'><tr>
                                        <td align=center>
                                            <button type='button' data-bs-toggle='modal' data-bs-target='#PopupWindow' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>Category</button>
                                        </td>
                                        <td align=center>
                                            <a href='#' data-bs-toggle='modal' data-bs-target='#HoursNote' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>Hours Note</a>
                                        </td>
                                        <td align=center>
                                            <a href='#todo' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>TO-DO</a>
                                        </td>
                                        <td align=center>
                                            <a href='#' data-bs-toggle='modal' data-bs-target='#CaseNote' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>Case</a>
                                        </td>
                                    </tr></table><br><br>
                                </div>
                                
                                <div class='col-12 col-md-12'>
                                    <section class='scroll-section' id='accordionCards'>
                                        <div class='card d-flex mb-2' style='padding:10px'>
                                            <span>Documents Manager</span><hr>
                                            <div class='mb-n2' id='accordionCardsExample'>";
                                                $cat1 = "select * from project_sc_category where status='1' order by sorder asc";
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
                                                                            <div class='btn-group' style='margin-right:10px'>
                                                                                <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                                                                <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('project-sc-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                                                                    <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#$datatargetX' aria-controls='offcanvasRightLarge' ><i class='fa fa-plus'></i> &nbsp;Add Note/Document</a>
                                                                                    <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#$datatargetXX' aria-controls='offcanvasRightLarge' ><i class='fa fa-edit'></i> &nbsp;Edit Category Name</a>
                                                                                    <a class='dropdown-item' href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=0' target='dataprocessor' data-bs-toggle='modal' data-bs-target='#$datatargetXX' aria-controls='offcanvasRightLarge' ><i class='fa fa-times'></i> &nbsp;Suspend Record</a>                                                                                </div>
                                                                                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' onclick=\"shiftdataV2('project-sc-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\"><i class='fa fa-refresh'></i></button>
                                                                                <a data-bs-toggle='collapse' href='#category-".$cat3["id"]."' onmouseover=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\" aria-expanded='false' aria-controls='collapseExample' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm'>
                                                                                    <i class='fa fa-angle-down'></i>
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                    </tr></table>
                                
                                                                    <div class='collapse' id='category-".$cat3["id"]."'>
                                                                        <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                                            <div id='$datatargetY' style='padding:5px'>
                                                                                <table class='table table-striped table-bordered table-hover dataTables-example1' >
                                                                                    <thead><tr><th>Date & Concern</th><th>Contact</th><th>Documents</th><th>Note</th><th> - </th></tr></thead>
                                                                                    <tbody>";
                                                                                        $ra1 = "select * from project_sc_forms where projectid='".$_COOKIE["projectidsc"]."' and categoryid='".$cat3["id"]."' and status='1' order by id desc";
                                                                                        $rb1 = $conn->query($ra1);
                                                                                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                                                            $cdate=date("d-m-Y", $rab1["date"]);
                                                                                            $datatargetZZ="category".$rab1["categoryid"]."Z";
                                                                                            $datatargetYY="category".$rab1["categoryid"]."Y";
                                                                                            
                                                                                            echo"<tr class='gradeX'>
                                                                                                <td >$cdate<br>".$rab1["cname"]."</td>
                                                                                                <td>".$rab1["contact"]."</td>
                                                                                                <td>";
                                                                                                    $t=0;
                                                                                                    $ra1x = "select * from project_sc_multi_image where postid='".$rab1["id"]."' and randid='".$rab1["randid"]."' and status='1' order by id desc";
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
                                                                                                <td style='width:20px'><div class='btn-group' onmouseout=\"shiftdataV2('project-sc-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                                                                                    <a href='deleterecords.php?delid=".$rab1["id"]."&tbl=project_sc_forms&sourceid=id' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('project-sc-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                                                                                        <i class='fa fa-trash'></i>
                                                                                                    </a>
                                                                                                </div></td>
                                                                                            </tr>";
                                                                                        } }
                                                                                    echo"</tbody>
                                                                                </table>
                                                                            </div>"; ?>
                                                                            <script type="text/javascript">
                                                                                function <?php echo"$datatargetZ"; ?>(<?php echo"$categoryX"; ?>,<?php echo"$categoryY"; ?>){
                                                                                    $.ajax({
                                                                                        url: 'project-sc-category-list.php?cid='+<?php echo"$categoryX"; ?>,
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
                                                    
                                                    echo"<div class='modal fade modal-close-out' id='$datatargetXX' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                                        <div class='modal-dialog'>
                                                            <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                    <h5 class='modal-title' id='exampleModalLabelCloseOut'>".$cat3["category"]."</h5>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                </div>
                                                                <div class='modal-body'>
                                                                    <form method='post' action='updaterecord.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                                                        <input type='hidden' name='processor' value='categorysc'><input type='hidden' name='id' value='".$cat3["id"]."'>
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
                                                                        <input type='hidden' name='processor' value='categorydatasc'><input type='hidden' name='processor1' value='".$cat3["type"]."'>
                                                                        <input type='hidden' name='id' value='".$cat3["id"]."'><input type='hidden' name='projectid' value='".$_COOKIE["projectidsc"]."'>
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
                                                                            <button type='submit' class='btn btn-primary' onblur=\"shiftdataV2('project-sc-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">Upload & Save Data</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>";
                                                } }
                                                
                                            echo"</div>
                                        </div>
                                    </section>
                                </div>
                                
                                <div class='col-md-12' id='hours-note'>
                                    <div style='padding:10px'>
                                        <div class='row' style='padding:10px;border-radius:10px'>
                                            <div class='col-md-12'><span style='font-size:13pt;'>HOURS SPENT NOTE</span></div>
                                            <div class='col-md-12' id='hourseditor'></div>
                                            <div class='col-md-12'>
                                                <div class='table-responsive'>
                                                    <table class='table table-bordered table-hover dataTables-example' >
                                                        <thead><tr><th valign=middle align=center>Hours Note</th><th>Date</th><th>Hours Worked</th><th>Type</th><th></th></tr></thead>
                                                        <tbody>";
                                                            $ttx=0;
                                                            $h1 = "select * from project_sc_hour_note where projectid='".$_COOKIE["projectidsc"]."' order by id asc";
                                                            $h2 = $conn->query($h1);
                                                            if ($h2->num_rows > 0) { while($h3 = $h2->fetch_assoc()) {
                                                                $dateH=date("Y-m-d",$h3["datex"]);
                                                                $timeHX=date("d-m-Y h:i:s a",$h3["timex"]);
                                                                $timeHY=date("d-m-Y h:i:s a",$h3["timey"]);
                                                                
                                                                /*
                                                                $dfrom=date("Y-m-d h:i:s a", $h3["timex"]);
                                                                $dto=date("Y-m-d h:i:s a", $h3["timey"]);
                                                                $date1=date_create("$dfrom");
                                                                $date2=date_create("$dto");
                                                                $diff1=date_diff($date1,$date2);
                                                                $total_days_worked= $diff1->format("%a");
                                                                $total_hours_worked= $diff1->format("%H");
                                                                $total_minutes_worked= $diff1->format("%I");
                                                                $totalhours=(($total_days_worked*24)+$total_hours_worked);
                                                                $totalhours="$totalhours:$total_minutes_worked Hr.";
                                                                // if($total_hour_worked<=0) $total_hour_worked=00;
                                                                */
                                                                $ttx=($ttx+1);
                                                                echo"<tr>
                                                                    <td><form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                				                        <input type='hidden' name='processor' value='hourlist'><input type='hidden' name='id' value='".$h3["id"]."'><input type='hidden' name='idz' value='1'>
                                				                        <textarea name='hours' onchange='this.form.submit()' class='form-control'>".$h3['hours']."</textarea>
                                				                    </form></td>
                                				                    <td><form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                				                        <input type='hidden' name='processor' value='hourlist'><input type='hidden' name='id' value='".$h3["id"]."'><input type='hidden' name='idz' value='2'>
                                				                        <input type='date' name='datex' value='$dateH' onchange='this.form.submit()' class='form-control'>
                                				                    </form></td>
                                				                    <td><form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                				                        <input type='hidden' name='processor' value='hourlist'><input type='hidden' name='id' value='".$h3["id"]."'><input type='hidden' name='idz' value='3'>
                                				                        <select name='timex' class='form-control' onchange='this.form.submit()'><option value='".$h3["timex"]."'>".$h3["timex"]." Hr.</option>
                                                                            <option value='00'>00</option><option value='01'>01</option><option value='02'>02</option><option value='03'>03</option>
                                                                            <option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option>
                                                                            <option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option>
                                                                            <option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option>
                                                                            <option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option>
                                                                            <option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option>
                                                                            <option value='24'>24</option>
                                                                        </select><br>
                                                                        <select name='timey' class='form-control' onchange='this.form.submit()'><option value='".$h3["timey"]."'>".$h3["timey"]." Min.</option>
                                                                            <option value='00'>00</option><option value='01'>01</option><option value='02'>02</option><option value='03'>03</option>
                                                                            <option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option>
                                                                            <option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option>
                                                                            <option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option>
                                                                            <option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option>
                                                                            <option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option>
                                                                            <option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option>
                                                                            <option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>
                                                                            <option value='32'>32</option><option value='33'>33</option><option value='34'>34</option><option value='35'>35</option>
                                                                            <option value='36'>36</option><option value='37'>37</option><option value='38'>38</option><option value='39'>39</option>
                                                                            <option value='40'>40</option><option value='41'>41</option><option value='42'>42</option><option value='43'>43</option>
                                                                            <option value='44'>44</option><option value='45'>45</option><option value='46'>46</option><option value='47'>47</option>
                                                                            <option value='48'>48</option><option value='49'>49</option><option value='50'>50</option><option value='51'>51</option>
                                                                            <option value='52'>52</option><option value='53'>53</option><option value='54'>54</option><option value='55'>55</option>
                                                                            <option value='56'>56</option><option value='57'>57</option><option value='58'>58</option><option value='59'>59</option>
                                                                        </select>
                                				                    </form></td>
                                				                    <td><form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                				                        <input type='hidden' name='processor' value='hourlist'><input type='hidden' name='id' value='".$h3["id"]."'><input type='hidden' name='idz' value='4'>
                                				                        <select name='task' class='form-control' onchange='this.form.submit()'>
                                                                            <option value='".$h3["task"]."'>".$h3["task"]."</option>
                                                                            <option value='Phone Call'>Phone Call</option>
                                                                            <option value='Face to Face'>Face to Face</option>
                                                                            <option value='Messaging'>Messaging</option>
                                                                            <option value='Referral'>Referral</option>
                                                                            <option value='Reportings'>Reportings</option>
                                                                            <option value='Other'>Other</option>
                                                                        </select><br>
                                				                        <input type='text' class='form-control' name='other' value='".$h3["other"]."' onchange='this.form.submit()'>
                                				                    </form></td>
                                                                    <td><a href='deleterecord.php?delidsc=".$h3["id"]."&tbl=project_sc_hour_note' target='dataprocessor'>
                                                                        <i class='fa fa-trash' style='color:red'></i>
                                                                    </a></td>
                                                                </tr>";
                                                            } }
                                                        echo"</tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>";
                    } }
                    
                    
                    // 2. HOUR NOTE
                    echo"<div class='modal inmodal' id='HoursNote' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog'><div class='modal-content animated bounceInUp'>
                        <div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                            <span style='font-size:12pt;color:black'>Daily/Weekly Hours Spent Note</span>
                        </div>
                        <form class='m-t' role='form' method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                		    <input type='hidden' name='processor' value='HoursNote'><input type='hidden' name='projectid' value='".$_COOKIE["projectidsc"]."'>
                            <div class='modal-body'><div class='row'>
                                <div class='col-md-12'><div class='form-group'><label>Hours Note</label><input name='hourx' type='text' required value='' class='form-control'></div></div>
                                
                                <div class='col-md-4'><div class='form-group'><label>Post Date</label><input name='datex' type='date' required value='$ddate' class='form-control'></div></div>
                                <div class='col-md-4'><div class='form-group'><label>Total Hours</label>
                                    <select name='timex' class='form-control'>
                                        <option value='00'>00</option><option value='01'>01</option><option value='02'>02</option><option value='03'>03</option>
                                        <option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option>
                                        <option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option>
                                        <option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option>
                                        <option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option>
                                        <option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option>
                                        <option value='24'>24</option>
                                    </select>
                                </div></div>
                                <div class='col-md-4'><div class='form-group'><label>Total Minutes</label>
                                    <select name='timey' class='form-control'>
                                        <option value='00'>00</option><option value='01'>01</option><option value='02'>02</option><option value='03'>03</option>
                                        <option value='04'>04</option><option value='05'>05</option><option value='06'>06</option><option value='07'>07</option>
                                        <option value='08'>08</option><option value='09'>09</option><option value='10'>10</option><option value='11'>11</option>
                                        <option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option>
                                        <option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option>
                                        <option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option>
                                        <option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option>
                                        <option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>
                                        <option value='32'>32</option><option value='33'>33</option><option value='34'>34</option><option value='35'>35</option>
                                        <option value='36'>36</option><option value='37'>37</option><option value='38'>38</option><option value='39'>39</option>
                                        <option value='40'>40</option><option value='41'>41</option><option value='42'>42</option><option value='43'>43</option>
                                        <option value='44'>44</option><option value='45'>45</option><option value='46'>46</option><option value='47'>47</option>
                                        <option value='48'>48</option><option value='49'>49</option><option value='50'>50</option><option value='51'>51</option>
                                        <option value='52'>52</option><option value='53'>53</option><option value='54'>54</option><option value='55'>55</option>
                                        <option value='56'>56</option><option value='57'>57</option><option value='58'>58</option><option value='59'>59</option>
                                    </select>
                                </div></div>
                                
                                <div class='col-md-6'><div class='form-group'><label>Task Performed</label>
                                    <select name='task' class='form-control'>
                                        <option value='Phone Call'>Phone Call</option>
                                        <option value='Face to Face'>Face to Face</option>
                                        <option value='Messaging'>Messaging</option>
                                        <option value='Referral'>Referral</option>
                                        <option value='Reportings'>Reportings</option>
                                        <option value='Other'>Other</option>
                                    </select>
                                </div></div>
                                <div class='col-md-6'><div class='form-group'><label>If any other Tasked Performed</label><input name='other' type='text' value='' class='form-control'></div></div>
                            </div></div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button><input type='reset' class='btn btn-default' value='Reset'>
                                <input type='submit' class='btn btn-primary' value='Save'>
                            </div>
                        </form>
                    </div></div></div>";
                    
                    
                    // 3. CASE NOTE
                    $sessionid = rand(1234567890,9876543210);
                    echo"<div class='modal inmodal' id='CaseNote' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog'><div class='modal-content animated bounceInUp'>
                        <div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                            <span style='font-size:12pt;color:black'>Case Note</span>
                        </div>
                         <form class='m-t' role='form' method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                		    <input type='hidden' name='processor' value='CaseNote'><input type='hidden' name='projectid' value='".$_COOKIE["projectidsc"]."'>
                		    <input name='reporter' type='hidden' value='$userid' class='form-control'>
                            <div class='modal-body'><div class='row'>
                                <div class='col-md-12'><div class='form-group'>
                                    <label>Case Type *</label><select class='form-control m-b required' name='casetype' required>
                                        <option value=''>Select Case Type</option>
                                        <option value='Phone Call'>Phone Call</option>
                                        <option value='Physical Interaction'>Physical Interaction</option>
                                        <option value='Escalations'>Escalations</option>
                                    </select>
                                </div></div>
                                <div class='col-md-6'><div class='form-group'><label>Date From *</label><input name='date1' type='date' value='$current_date' class='form-control required'></div></div>
                                <div class='col-md-6'><div class='form-group'><label>Date To *</label><input name='date2' type='date' value='$current_date' class='form-control required'></div></div>
                                <div class='col-md-12'><div class='form-group'><label>Multi Document Upload</label>
                                    <input type='file' name='images[]' multiple class='form__field__img form-control'><input type='hidden' name='sessionid1' value='$sessionid'>
                                </div></div>
                                <div class='col-md-12'><div class='form-group'><label>Detail Note *</label><textarea name='note' class='form-control'></textarea></div></div>
                            </div></div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button><input type='reset' class='btn btn-default' value='Reset'>
                                <input type='submit' class='btn btn-primary' value='Save'>
                            </div>
                        </form>
                    </div></div></div>";
                    
                    // 4. INVOICE GENERATOR
                    $sessionid = rand(1234567890,9876543210);
                    echo"<div class='modal inmodal' id='Invoice' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog modal-lg'><div class='modal-content animated bounceInUp'>
                        <div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                            <span style='font-size:12pt;color:black'>Generate Invoice</span>
                        </div>
                         <form class='m-t' role='form' method='post' action='projectprocessor.php' id='image_upload_form' target='invoicedatax' enctype='multipart/form-data'>
                		    <input type='hidden' name='processor' value='GenerateInvoice'>
                		    <input type='hidden' name='projectid' value='".$_COOKIE["projectidsc"]."'>
                		    <input name='reporter' type='hidden' value='$userid' class='form-control'>
                            <div class='modal-body'><div class='row'>
                                <div class='col-md-3'><div class='form-group'><label>Invoice ID</label><input name='nid' type='text' value='' class='form-control required'></div></div>
                                <div class='col-md-3'><div class='form-group'><label>Invoice Date</label><input name='date' type='date' value='$current_date' class='form-control'></div></div>
                                <div class='col-md-3'><div class='form-group'><label>Date From</label><input name='date1' type='date' value='$current_date' class='form-control'></div></div>
                                <div class='col-md-3'><div class='form-group'><label>Date To</label><input name='date2' type='date' value='$current_date' class='form-control'></div></div>
                                <div class='col-md-4'><div class='form-group'><label>NDIS Line Item</label><input name='line_item_number' type='text' value='' class='form-control'></div></div>
                                <div class='col-md-4'><div class='form-group'><label>Frequency</label><input name='frequency' type='text' value='' class='form-control'></div></div>
                                <div class='col-md-4'><div class='form-group'><label>Rate</label><input name='rate' type='text' value='' class='form-control required'></div></div>
                                <div class='col-md-12'><div class='form-group'><label>Invoice Note *</label><textarea name='note' class='form-control'></textarea></div></div>
                            </div></div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button><input type='reset' class='btn btn-default' value='Reset'>
                                <input type='submit' class='btn btn-primary' value='Create'>
                            </div>
                            <iframe name='invoicedatax' src='support_coordinator_invoice.php?projectid=".$_COOKIE["projectidsc"]."' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='440'>BROWSER NOT SUPPORTED</iframe>
                        </form>
                    </div></div></div>";
                    
                echo"</div>
            </div>
        </div>
    </div>";  