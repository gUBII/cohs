<?php
    
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=0;
    if(isset($_GET["utype"])) $utype=$_GET["utype"];
    else $utype=0;
    if(isset($_GET["sheba"])) $sheba=$_GET["sheba"];
    else $sheba=0;
    
    error_reporting(0);

    include("../authenticator.php");

    $advocatex=0;
    $advocatey = "select * from solutions where id='10012' order by id asc limit 1";
    $advocatez = $conn->query($advocatey);
    if ($advocatez->num_rows > 0) { while($advocatexyz = $advocatez->fetch_assoc()) {  $advocatex=1; } }
    
    $advocatex=0;
    
    if($advocatex==1){
        $titlexyz="Case";
        $tl="Senior Advocate/Incharge";
        $sc="Junior Advocate/Helper";
    }else{
        $titlexyz="Project";
        $tl="Team Leader";
        $sc="Support Co-ordinator";
    }

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    $randid=rand(100,999);
    $ctime=time();
    $rdate=date("Y-m-d",$ctime);                
    $next_uid=0;
    $s7x = "select * from uerp_user where mtype='CLIENT' order by id desc limit 1";
    $r7x = $conn->query($s7x);
    if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { $next_uid=($rs7x["id"]+1); } }
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body' style='padding:5px'>
    
        <form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >";
            // workspace_processor.php
            if(isset($_GET["pid"]) && $_GET["pid"]>=1){
                
                $ra1 = "select * from project where id='".$_REQUEST["pid"]."' and status='1' order by id asc limit 1";
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                    $sdate=date("Y-m-d",$rab1["start_date"]);
                    $edate=date("Y-m-d",$rab1["end_date"]);
                        
                    $clientname1="";
                    $clientname2="";
                    $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                        $clientname1=$rab2["username"];
                        $clientname2=$rab2["username2"];
                    } }
                        
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
        
                    echo"<input type='hidden' name='url' value='".$_GET["url"]."'>
                    <input type='hidden' name='processor' value='editproject'>
                    <input type='hidden' name='id' value='".$_GET["pid"]."'>
                    <input type='hidden' name='rate_type' value='FIXED'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Client/Participant Name *</label>
                                <input name='pname' type='text' value='".$rab1["name"]."' class='form-control' required>
                            </div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Client Name *</label>
                                <select class='form-control m-b ' name='clientid' required>";
                                    $s77 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                                    $r77 = $conn->query($s77);
                                    if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                        if($rab1["clientid"]==$rs77["id"]) echo"<option selected value='".$rs77["id"]."' selected>".$rs77["username"]." ".$rs77["username2"]."</option>";
                                        // else echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>";
                                    } }
                                echo"</select>
                            </div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Plan Start Date *</label>
                                <input type='date' class='form-control' name='start_date' value='$sdate'>
                            </div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Plan Close Date *</label>
                                <input type='date' class='form-control' name='end_date' value='$edate'>
                            </div></div>
                            <div class='col-12 col-md-4' style='margin-bottom:25px'><div class='form-group'>
                                <label>Priority *</label>
                                <select class='form-control m-b ' name='priority' required>
                                    <option value='".$rab1["priority"]."'>".$rab1["priority"]."</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                                </select>
                            </div></div>
                            <div class='col-12 col-md-4' style='margin-bottom:25px'><div class='form-group'>
                                <label>Color</label>
                                <input name='pcolor' type='color' value='".$rab1["color"]."' style='height:30px' class='form-control' required>
                            </div></div>
                            <div class='col-12 col-md-4' style='margin-bottom:25px'><div class='form-group'>
                                <label>Status *</label>
                                <select class='form-control m-b ' name='status' required>
                                    <option value='".$rab1["status"]."'>".$rab1["status"]."</option><option value='1'>1</option><option value='0'>0</option>
                                </select>
                            </div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Support Co-Ordinator *</label>
                                <select class='form-control m-b ' name='caseid' required>";
                                    $s7 = "select * from uerp_user where mtype='EMPLOYEE' and status='1' OR mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        if($rab1["caseid"]==$rs7["id"]) echo"<option selected value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        else echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                    } }
                                echo"</select>
                            </div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Team Leader *</label>
                                <select class='form-control m-b ' name='leaderid' required>";
                                    $s7 = "select * from uerp_user where mtype='EMPLOYEE' and status='1' OR mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        if($rab1["leaderid"]==$rs7["id"]) echo"<option selected value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        else echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                    } }
                                echo"</select>
                            </div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Managed Type *</label>";
                                if($rab1["managed_by"]=="SELF Managed"){
                                    echo"<input type='date' class='form-control' name='managed_by' value='".$rab1["managed_by"]."' readonly>";
                                }else{
                                    echo"<select class='form-control m-b ' id='optionSelect' required name='managed_by'>";
                                        echo"<option value='".$rab1["managed_by"]."'>".$rab1["managed_by"]."</option>
                                        <option value='NDIA Managed'>NDIA Managed</option>
                                        <option value='PLAN Managed'>PLAN Managed</option>
                                        <option value='CARE Managed'>CARE Managed</option>
                                        <option value='PACE NDIA Managed'>PACE NDIA Managed</option>
                                        <option value='PACE PLAN Managed'>PACE PLAN Managed</option>
                                    </select>";
                                }
                            echo"</div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Manager</label>";
                                if($rab1["managed_by"]=="SELF Managed"){
                                    echo"<select class='form-control m-b' name='teamleaderid'>";
                                        $s7x = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                                        $r7x = $conn->query($s7x);
                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>"; } }
                                    echo"</select>";
                                }else{
                                    echo"<select class='form-control m-b' name='teamleaderid'>";
                                        $s7x = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                                        $r7x = $conn->query($s7x);
                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>"; } }
                                        $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                    echo"</select>";
                                }
                            echo"</div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        if(isset($_GET["pstat"])){
                            if($_GET["pstat"]==1){
                                if($_GET["sf"]==1){
                                    echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('projects_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&status=".$_GET["status"]."', 'datatableX')\">Close</button>&nbsp;
                                    <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('projects_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&status=".$_GET["status"]."', 'datatableX')\">Update $titlexyz</button>";
                                }else{
                                    echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('projects_profile.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Close</button>&nbsp;
                                    <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('projects_profile.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Update $titlexyz</button>";
                                }
                            }
                        }else{
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Update $titlexyz</button>";
                        }
                    echo"</div>";
                } }
                
            }else{
            
                echo"<input type='hidden' name='processor' value='createproject'>
                <div class='modal-body' style='padding:10px'>
                    <div class='row'>
                        <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>$titlexyz Name *</label><input name='name' type='text' value='' class='form-control' required></div></div>
                        <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>Client Name *</label>
                            <select class='form-control m-b ' name='clientid' required>
                                <option value=''>Select Client Name</option>";
                                $s77 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                                $r77 = $conn->query($s77);
                                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) { echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>"; } }
                            echo"</select>
                        </div></div>
                        <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'>
                            <label>$tl *</label>
                            <select class='form-control m-b ' name='teamleaderid' required>
                                <option value=''>Select $tl Name</option>";
                                $s7 = "select * from uerp_user where mtype='EMPLOYEE' and status='1' OR mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                            echo"</select>
                        </div></div>";
                        
                        if($advocatex==1){ 
                            echo"<div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>$titlexyz Number *</label><input name='caseid' type='text' value='' class='form-control' required></div></div>";
                            echo"<div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Court *</label><select class='form-control m-b ' name='court' required>
                                <option value=''>Select Court</option>";
                                $s7 = "select * from project_type where TYPE='COURT' and status='ON' order by id asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<option value='".$rs7["id"]."'>".$rs7["name"]."</option>";
                                } }
                            echo"</select></div></div>";
                            echo"<div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Case Category *</label><select class='form-control m-b ' name='category' required>
                                <option value=''>Select Category</option>";
                                $s7 = "select * from project_type where TYPE='CATEGORY' and status='ON' order by id asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<option value='".$rs7["id"]."'>".$rs7["name"]."</option>";
                                } }
                            echo"</select></div></div>";
                            echo"<div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Case Stage *</label><select class='form-control m-b ' name='stage' required>
                                <option value=''>Select Stage</option>";
                                $s7 = "select * from project_type where TYPE='STAGE' and status='ON' order by id asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<option value='".$rs7["id"]."'>".$rs7["name"]."</option>";
                                } }
                            echo"</select></div></div>";
                            echo"<div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>ACT *</label><select class='form-control m-b ' name='act' required>
                                <option value=''>Select ACT</option>";
                                $s7 = "select * from project_type where TYPE='ACT' and status='ON' order by id asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<option value='".$rs7["id"]."'>".$rs7["name"]."</option>";
                                } }
                            echo"</select></div></div>";
                            echo"<div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Filling Date *</label><input name='start_date' type='date' value='$cdate' class='form-control'></div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Next Hearing Date *</label><input name='end_date' type='date' value='$cdate' class='form-control'></div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Contact Value *</label><input name='rate' type='text' value='0' class='form-control'></div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Opponent Lawyer *</label><input name='managed_by' type='text' value='' class='form-control'></div></div>
                            <input name='stime' type='hidden' value='08:00'><input name='etime' type='hidden' value='17:00'>";
                        }else{
                            
                            echo"<input name='start_date' type='hidden' value='$cdate'><input name='end_date' type='hidden' value='$cdate'>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Clock-In Time *</label><input name='stime' type='time' value='08:00' class='form-control' required></div></div>
                            <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Clock-Out Time *</label><input name='etime' type='time' value='17:00' class='form-control' required></div></div>";
                        }
                        
                        echo"<div class='col-12 col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Color</label><input name='pcolor' type='color' value='#CCCCCC' style='height:30px' class='form-control' required></div></div>
                        <div class='col-12 col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' required>
                            <option value=''>Select Priority</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                        </select></div></div>
                        <div class='col-12 col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                            <option value='1'>ON</option><option value='0'>OFF</option>
                        </select></div></div>
                        <div class='col-12 col-md-12' style='margin-bottom:25px'><div class='form-group'><label>$sc *</label>";
                            if($advocatex==1){
                                echo"<select class='form-control m-b' name='leaderid'>";
                                    $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='EMPLOYEE' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                echo"</select>";
                            }else{
                                echo"<textarea name='leaderid' class='form-control'></textarea>";
                            }
                        echo"</div></div>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Description/Note</label>
                            <textarea name='note' class='form-control'></textarea>
                        </div></div>
                    </div>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Create $titlexyz</button>
                </div>";
            }
        echo"</form>
    </div>";
?>