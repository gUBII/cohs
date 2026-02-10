<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    $cid=$_GET["cid"];
    $sheba=$_GET["sheba"];
    $utype="appointments_manager";
    
    $sdate=date("Y-m-d", time());
    $tdate=date("Y-m-d", time());
    
    error_reporting(0);
    
    include("../authenticator.php");
    
    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    if(isset($_GET["tid"]) && $_GET["tid"]!=0){
        
        echo"<div class='modal-dialog modal-lg'>
            <div class='modal-content' style='padding:5px'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabelCloseOut'>".$_GET["ctitle"]."</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body' id='PopupModalX' style='padding:5px'>
                    <form method='post' name='dataform' action='appointmentprocessor.php' target='dataprocessor' enctype='multipart/form-data' >
                        <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["tid"]."'>
                        <input type=hidden name='pstat' value='1'><input type=hidden name='processor' value='editappointment'>";
                        $randid=rand(100,999);
                        $s1 = "select * from appointments_manager where id='".$_GET["tid"]."' order by id asc limit 1";
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                            $pdate=date("Y-m-d", $t1["date"]);
                            $jdate=date("Y-m-d", $t1["jointime"]);
                            $dob=date("Y-m-d", $t1["dob"]);
                            
                            $rdate=date("Y-m-d H:m:s",$ctime);                
                            
                            echo"<fieldset>
                                <div class='row'>
                                    <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Appointment Title*</label>
                    			        <input type='text' class=form-control name='title' value='".$t1["title"]."' required>
                                    </div></div>
                                    <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Assignee Name * </label>
                                        <select class='form-control m-b' required name='employeeid'>";
                                            $ra7 = "select * from uerp_user where id='".$t1["employeeid"]."' order by id asc limit 1";
                                            $rb7 = $conn->query($ra7);
                                            if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                echo"<option value='".$rab7["id"]."'>".$rab7["username"]." ".$rab7["username2"]."</option>";
                                            } }
                                            
                                            if(isset($_GET["projectid"])){
                                                $ra1 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id asc limit 1";
                                                $rb1 = $conn->query($ra1);
                                                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                    $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' order by id asc";
                                                    $rb6 = $conn->query($ra6);
                                                    if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                        $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                        $rb7 = $conn->query($ra7);
                                                        if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                            echo"<option value='".$rab7["id"]."'>".$rab7["username"]." ".$rab7["username2"]."</option>";
                                                        } }
                                                    } }
                                                } }
                                            } else {
                                                $s7 = "select * from uerp_user where mtype='ADMIN' and status='1' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                                $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                            }
                                        echo"</select>
                                    </div></div>
                                    <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Participants Name *</label>
                                        <select class='form-control m-b required' name='clientid' required>";
                                            $s72 = "select * from uerp_user where id='".$t1["clientid"]."' and status='1' order by id asc limit 1";
                                            $r72 = $conn->query($s72);
                                            if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                            } }
                                            
                                            if($mtype!="ADMIN"){
                                                $s7 = "select * from project_team_allocation where employeeid='".$_COOKIE["userid"]."' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                                        $r71 = $conn->query($s71);
                                                        if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                            $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                            $r72 = $conn->query($s72);
                                                            if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                                echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                            } }
                                                        } }
                                                    } } 
                                            }else{
                                                if(isset($_GET["projectid"])){
                                                    $ra1 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id asc limit 1";
                                                    $rb1 = $conn->query($ra1);
                                                    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                                                        $rb2 = $conn->query($ra2);
                                                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                            echo"<option value='".$rab2["id"]."'>".$rab2["username"]." ".$rab2["username2"]."</option>";
                                                        } }
                                                    } }
                                                } else {
                                                    $s77 = "select * from project where status='1' order by name asc";
                                                    $r77 = $conn->query($s77);
                                                    if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                                        $s7 = "select * from uerp_user where id='".$rs77["clientid"]."' order by id asc limit 1";
                                                        $r7 = $conn->query($s7);
                                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                            $clientname="".$rs7["username"]." ".$rs7["username2"]."";
                                                        } }
                                                        echo"<option value='".$rs77["clientid"]."'>".$rs77["name"]." ($clientname).</option>";
                                                    } }
                                                }
                                            }
                                            echo"<option value='0'>Self Managed</option>";
                                        echo"</select>
                                    </div></div>
                                    <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Appointment Detail*</label>
                    			        <textarea id='summernote' name='detail' class='form-control'>".$t1["detail"]."</textarea>
                                    </div></div>
                                    <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Start Date & Time *</label>
                                        <input type='datetime-local' class='form-control' name='date1' value='".$t1["start"]."' required>
                                    </div></div>
                                    <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                        <label>End Date & Time *</label>
                                        <input type='datetime-local' class='form-control' name='date2' value='".$t1["end"]."' required>
                                    </div></div>
                                    <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Attachment (if any)</label>
                    			        <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                                    </div></div>
                                    <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Appointment Mode *</label>
                                        <select class='form-control m-b required' name='mode'>
                                            <option value='".$t1["mode"]."'>".$t1["mode"]."</option>
                                            <option value='OPEN'>OPEN</option>
                                            <option value='SELECTIVE'>SELECTIVE</option>
                                        </select>
                                    </div></div>
                                    <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                        <label>Priority Level *</label>
                    			        <select class='form-control m-b required' name='priority'>
                    			            <option value='".$t1["priority"]."'>".$t1["priority"]."</option>
                    			            <option value='1'>1 (Neutral)</option><option value='0'>0 (Low)</option>
                    			            <option value='2'>2 (Medium)</option><option value='3'>3 (High)</option>
                    			        </select>
                                    </div></div>
                                
                                </div>
                            </fieldset>
                            <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                                if(isset($_GET["projectid"])) $projectid=$_GET["projectid"];
                                else $projectid=0;
                                echo"<input type='hidden' name='projectid' value='$projectid'>
                                <button class='btn btn-primary' type='submit'>Update Appointment</button>
                            </div>";
                        } }
                    echo"</form>
                </div>
            </div>
        </div>";
        
    }else{
        
        echo"<div class='offcanvas-header'>
            <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
            <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
        </div>
        <div class='offcanvas-body'>
            <form method='post' name='dataform' action='appointmentprocessor.php' target='dataprocessor' enctype='multipart/form-data' >
                <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                <input type=hidden name='pstat' value='1'>";
                $randid=rand(100,999);
                $ctime=time();
                $rdate=date("Y-m-d H:m:s",$ctime);                
                $next_uid=0;
                /*
                    $s7 = "select * from appointments_manager where mtype='USER' OR mtype='$utype' OR mtype='ADMIN' order by id desc limit 1";                
                    $r7 = $conn->query($s7);
                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { $next_uid=($rs7["uid"]+1); } }
                */
                echo"<input type='hidden' name='processor' value='appointmentlist'><input type='hidden' name='id' value=''>
                <fieldset>
                        <div class='row'>
                            <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Appointment Title*</label>
            			        <input type='text' class=form-control name='title' value='' required>
                            </div></div>
                            <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Assignee Name * </label>
                                <select class='form-control m-b' required name='employeeid'>";
                                    echo"<option value=''>Select Assignee</option>";
                                    if(isset($_GET["projectid"])){
                                        $ra1 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id asc limit 1";
                                        $rb1 = $conn->query($ra1);
                                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                            $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' order by id asc";
                                            $rb6 = $conn->query($ra6);
                                            if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                $rb7 = $conn->query($ra7);
                                                if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                    echo"<option value='".$rab7["id"]."'>".$rab7["username"]." ".$rab7["username2"]."</option>";
                                                } }
                                            } }
                                        } }
                                    } else {
                                        $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            if($_COOKIE["userid"]==$rs7["id"]) echo"<option value='".$rs7["id"]."' selected>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            else echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                    }
                                echo"</select>
                            </div></div>
                            <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Participants Name *</label>
                                <select class='form-control m-b required' name='clientid' required>
                                    <option value=''>Select Client/Project Name</option>
                                    <option value='0'>Self Managed</option>";
                                    if($mtype!="ADMIN"){
                                        $s7 = "select * from project_team_allocation where employeeid='".$_COOKIE["userid"]."' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                            $r71 = $conn->query($s71);
                                            if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                $r72 = $conn->query($s72);
                                                if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                    echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                } }
                                            } }
                                        } }
                                    }else{
                                        if(isset($_GET["projectid"])){
                                            $ra1 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id asc limit 1";
                                            $rb1 = $conn->query($ra1);
                                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                                                $rb2 = $conn->query($ra2);
                                                if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                    echo"<option value='".$rab2["id"]."'>".$rab2["username"]." ".$rab2["username2"]."</option>";
                                                } }
                                            } }
                                        } else {
                                            $s77 = "select * from project where status='1' order by name asc";
                                            $r77 = $conn->query($s77);
                                            if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                                if($rs77["lead"]==0) $leadstatus="Closed";
                                                if($rs77["lead"]==1) $leadstatus="Lead";
                                                if($rs77["lead"]==2) $leadstatus="Project";
                                                if($rs77["lead"]==3) $leadstatus="Missed";
            
                                                $s7 = "select * from uerp_user where id='".$rs77["clientid"]."' order by id asc limit 1";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    $clientname="".$rs7["username"]." ".$rs7["username2"]."";
                                                } }
                                                echo"<option value='".$rs77["id"]."'>".$rs77["name"]." ($clientname) ($leadstatus).</option>";
                                            } }
                                        }
                                    }
                                echo"</select>
                            </div></div>
                            <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Appointment Detail*</label>
            			        <textarea id='summernote' name='detail' class='form-control'></textarea>
                            </div></div>
                            <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Start Date & Time *</label>
                                <input type='date' class='form-control' name='date1' value='$sdate' required>
                            </div></div>
                            <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>End Date & Time *</label>
                                <input type='date' class='form-control' name='date2' value='$tdate' required>
                            </div></div>
                            <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group'>
                                <label>Attachment (if any)</label>
            			        <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                            </div></div>
                            <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Appointment Mode *</label>
                                <select class='form-control m-b required' name='mode'>
                                    <option value=''>Select Appointment Mode</option>
                                    <option value='OPEN'>OPEN</option>
                                    <option value='SELECTIVE'>SELECTIVE</option>
                                </select>
                            </div></div>
                            <div class='col-lg-6' style='margin-bottom:25px'><div class='form-group'>
                                <label>Priority Level *</label>
            			        <select class='form-control m-b required' name='priority'>
            			            <option value='1'>1 (Neutral)</option><option value='0'>0 (Low)</option><option value='2'>2 (Medium)</option>
            			            <option value='3'>3 (High)</option>
            			        </select>
                            </div></div>
                            
                    </div>
                </fieldset>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                    if(isset($_GET["projectid"])) $projectid=$_GET["projectid"];
                    else $projectid=0;
                    echo"<input type='hidden' name='projectid' value='$projectid'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' >Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' onmouseover='document.dataform.userid.value=document.datafrom.email.value'>Add Appointment</button>
                </div>
            </form>
        </div>";
        
    }
    
?>

    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="js/vendor/Chart.bundle.min.js"></script>
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <script src="js/cs/charts.extend.js"></script>
    <script src="js/pages/profile.standard.js"></script>
    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>