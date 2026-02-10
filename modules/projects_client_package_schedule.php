<?php
    
    // if(isset($_COOKIE["client_id"])){
        
        include '../authenticator.php';
        
        $clientid=0;
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
        } }
        
        if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
        else $sortset=10000000;

        $cid=0;
        if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
        echo"<div class='data-table-rows slim' id='sample'>";

            if(!isset($_GET["formid"])){
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='processor' value='addpackageschedules'>
                    <input type='hidden' name='pid' value='".$_COOKIE["projectidx"]."'>
                    <input type='hidden' name='cid' value='$clientid'>
                    <fieldset>
                        <div class='row'>
                            
                            <div class='col-12 col-md-2'>
                                <div class='form-group'>
                                    <label>Package: *</label>
                                    <select class='form-control m-b ' required name='package'>";
                                        echo"<option value=''>Select Manged Type</option>";
                                        echo"<option value='NDIA Managed'>NDIA Managed</option>";
                                        echo"<option value='PLAN Managed'>PLAN Managed</option>";
                                        echo"<option value='SELF Managed'>SELF Managed</option>";
                                        echo"<option value='PACE-NDIA Managed'>PACE-NDIA Managed</option>";
                                        echo"<option value='PACE-PLAN Managed'>PACE-PLAN Managed</option>";
                                    echo"</select>
                                </div>
                            </div>
                            
                            <div class='col-12 col-md-2'>
                                <div class='form-group'>
                                    <label>Case Manager / Coordinator: *</label>
                                    <select class='form-control m-b' name='eid' id='field1' required>
                                        <option value=''>Select Case Manager / Co-Ordinator</option>";
                                        $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                    echo"</select>
                                </div>
                            </div>
                            
                            <div class='col-6 col-md-2'>
                                <div class='form-group'><label>Start Date *</label><input name='issue_date' type='date' value='$current_date' class='form-control required'></div>
                            </div>
                            
                            <div class='col-6 col-md-2'>
                                <div class='form-group'><label>End Date *</label><input name='expire_date' type='date' value='$current_date' class='form-control required'></div>
                            </div>
                            
                            <div class='col-12 col-md-2'>
                                <div class='form-group'><label>Alternate Billing Address</label><input name='alternative_billing_address' type='text' value='' class='form-control'></div>
                            </div>
                            
                            <div class='col-6 col-md-1'>
                                <div class='form-group'><label>Status *</label><select name='status' class='form-control'><option value='1'>ON</option><option value='0'>OFF</option></select></div>
                            </div>
                            
                            <div class='col-6 col-md-1'><div class='form-group'><label>&nbsp; </label><Br>
                                <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Save' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_package_schedule.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\">
                            </div></div>
                            
                        </div>
                    </fieldset>
                </form><Br><br>";
            }else{
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='processor' value='editpackageschedules'>
                    <h1>EDIT - Card Number</h1>";
                        $ra1X = "select * from project_schedules where status='1' and id='".$_GET["formid"]."' order by id desc";
                        $rb1X = $conn->query($ra1X);
                        if ($rb1X->num_rows > 0) { while($rab1X = $rb1X->fetch_assoc()) {
                            $issue_date=date("Y-m-d", $rab1X["issue_date"]);
                            $expire_date=date("Y-m-d", $rab1X["expire_date"]);
                            echo"<input name='id' type='hidden' value='".$rab1X["id"]."'>
                            <fieldset>
                                <div class='row'>
                            
                                    <div class='col-12 col-md-2'>
                                        <div class='form-group'>
                                            <label>Package: *</label>
                                            <select class='form-control m-b ' required name='package'>";
                                                echo"<option value='".$rab1X["package"]."'>".$rab1X["package"]."</option>";
                                                echo"<option value='NDIA Managed'>NDIA Managed</option>";
                                                echo"<option value='PLAN Managed'>PLAN Managed</option>";
                                                echo"<option value='SELF Managed'>SELF Managed</option>";
                                                echo"<option value='PACE-NDIA Managed'>PACE-NDIA Managed</option>";
                                                echo"<option value='PACE-PLAN Managed'>PACE-PLAN Managed</option>";
                                            echo"</select>
                                        </div>
                                    </div>
                                
                                    <div class='col-12 col-md-2'>
                                        <div class='form-group'>
                                            <label>Case Manager / Coordinator: *</label>
                                            <select class='form-control m-b' name='eid' id='field1' required>";
                                                $s7x = "select * from uerp_user where id='".$rab1X["eid"]."' order by id asc limit 1";
                                                $r7x = $conn->query($s7x);
                                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                    echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>";
                                                } }
                                                
                                                $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                            echo"</select>
                                        </div>
                                    </div>
                                    
                                    <div class='col-6 col-md-2'>
                                        <div class='form-group'><label>Start Date *</label><input name='issue_date' type='date' value='$issue_date' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-6 col-md-2'>
                                        <div class='form-group'><label>End Date *</label><input name='expire_date' type='date' value='$expire_date' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-12 col-md-2'>
                                        <div class='form-group'><label>Alternate Billing Address</label><input name='alternative_billing_address' type='text' value='".$rab1X["alternative_billing_address"]."' class='form-control'></div>
                                    </div>
                                    
                                    <div class='col-6 col-md-1'>
                                        <div class='form-group'>
                                            <label>Status *</label>
                                            <select name='status' class='form-control'>
                                                <option value='".$rab1X["status"]."'>".$rab1X["status"]."</option>
                                                <option value='1'>ON</option><option value='0'>OFF</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='col-6 col-md-1'><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Save' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_package_schedule.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\">
                                    </div></div>
                                    
                                    <div class='col-md-1'><br><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='button' class='btn btn-icon btn-icon-start btn-outline-secondary' data-style='expand-right' value='New'  onclick=\"setTimeout(function(){ shiftdataV2('projects_client_package_schedule.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 10);\"></a>
                                    </div></div>
                                </div>
                            </fieldset><br><br>";
                        } }
                    
                echo"</form>";
            }
            
            echo"<div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover dataTables-example' >
                    <thead><tr><th nowrap>ID</th><th nowrap>Package</th><th nowrap>Manager</th><th nowrap>Start Date</th><th nowrap>End Date</th><th>Balance</th><th>Status</th><th colspan=3'></th></tr></thead>
                    <tbody>";
                        
                        $ra1 = "select * from project_schedules order by id desc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            
                            $s7xx = "select * from uerp_user where id='".$rab1["eid"]."' order by id asc limit 1";
                            $r7xx = $conn->query($s7xx);
                            if ($r7xx->num_rows > 0) { while($rs7xx = $r7xx->fetch_assoc()) {
                                $manager="".$rs7xx["username"]." ".$rs7x["username2"]."";
                            } }
                            
                            $issue_date=date("d-m-y", $rab1["issue_date"]);
                            $expire_date=date("d-m-y", $rab1["expire_date"]);
                            echo"<tr class='gradeX'>
                                <td nowrap>&nbsp;".$rab1["id"]."</td>
                                <td>".$rab1["package"]."</td><td>$manager</td>
                                <td nowrap>$issue_date</td><td nowrap>$expire_date</td>
                                <td>".$rab1["balance"]."</td>
                                <td>"; 
                                    if($rab1["status"]==1) echo"NO";
                                    else echo"OFF";
                                echo"</td>
                                <td align=center><a href='#' onclick=\"shiftdataV2('projects_client_package_schedule.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&formid=".$rab1["id"]."', 'datatableX')\" style='color:lightgreen'><i class='fa fa-edit'></i></a></td>
                                <td align=center><a href='deleterecords.php?tbl=project_schedules&delid=".$rab1["id"]."&sourceid=id' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_package_schedule.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\" style='color:lightred' target='dataprocessor'><i class='fa fa-trash'></i></a></td>
                            </tr>";
                            
                        } }    
                    echo"</tbody>
                </table>
                <div style='height:100px'>&nbsp;</div>
            </div>";
    
    // }
?>


<?php
/*
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
    $heading="Project Schedule";
    
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
                        
                        echo"<div class='col-12 col-md-12'>
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
                                        
                                        $totalscheduled=0;
                                        $totalscheduled=($wsp33["capital"]+$wsp33["core"]+$wsp33["capacity"]);
                                        $totalscheduledz = number_format($totalscheduled, 2, '.', ',');
                                        
                                        if($budgetunset==1){
                                            
                                            if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
                                            if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
                                                        
                                            $startdate = date("d-M-Y", $wsp33["budget_date"]);
                                            $enddate = date("d-M-Y", $wsp33["budget_close_date"]); 
                                                        
                                            $totalamountx=0;
                                            $goforit=0;
                                            $ln1 = "select * from project_budget_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
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
                                    
                                    echo"<div class='col-12 col-md-12'>
                                        <section class='scroll-section' id='lineChartTitlex'>
                                            <div class='card mb-5' ><div class='card-body'>
                                                <div class='row'>
                                                    <div class='col-12'>
                                                        <h2 class='m-b-xs'>".$rab1["name"]."</h2>
                                                        <span style='font-size:12pt'>Package/Plan Start Date: $sdate, End Date: $edate</span><br><hr>
                                                    </div>
                                                    <div class='col-7' style='text-align:right'>";
                                                    
                                                        
                                                            
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
                                                            echo"<div class='card mb-5' style='background-color:#6BBEEE;color:black'>
                                                                <div class='card-body' style='min-height:120px'>
                                                                    <div style='width:100%;align:center;text-align:left'>";
                                                                        echo"<table align=center width=100%>
                                                                            <thead><tr>
                                                                                <th></th>
                                                                                <th style='text-align:right'>Scheduled</th>
                                                                                <th style='text-align:right'>Allocated</th>
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
                                                                                        <td  valign=bottom style='text-align:right;font-size:10pt'>$ $totalscheduledz</td>
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
                                                        
                                                        
                                                            
                                                        }
                                                    }
                                                echo"</div>
                                            </div>
                                        </section>
                                    </div>";
                                    
                                    
                                }
                                
                                
                            echo"</div>
                        </div>";
                    } }
                    
                echo"</div>
            </div>
        </div>
    </div>";  
*/