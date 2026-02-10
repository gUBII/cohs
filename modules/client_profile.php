<?php
    error_reporting(0);
    include("../authenticator.php");
    
    if(isset($_COOKIE["client_id"])){
        if($_GET["url"]!="projects.php"){
            include '../aged_care_client_bar.php';
        }
    }
    
    echo"<div class='offcanvas-body'>";
    
        if(isset($_COOKIE["client_id"])) $clientid=$_COOKIE["client_id"];
        else $clientid=$_GET["clientid"];
                
            $s1 = "select * from uerp_user where id='$clientid' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                if(strlen($t1["date"])>=10) $pdate=date("Y-m-d", $t1["date"]);
                else $pdate=null;
                
                if(strlen($t1["jointime"])>=10) $jdate=date("Y-m-d", $t1["jointime"]);
                else $jdate=null;
                
                if(strlen($t1["dob"])>=10) $dob=date("Y-m-d", $t1["dob"]);
                else $dob=null;
                
                $departmentname="";
                $d1 = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                
                $designationname="";
                $d4 = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                $d5 = $conn->query($d4);
                if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }
            
                $leadername="";
                $d1 = "select * from uerp_user where id='".$t1["team_leader"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $leadername="".$d3["username"]."".$d3["username2"]."" ; } }
                
                $openprojects=0;
                $p1 = "select * from project where clientid='".$t1["id"]."' and status='1' order by id asc limit 1";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $openprojects=($openprojects+1); } }
                
                $closedprojects=0;
                $p1 = "select * from project where clientid='".$t1["id"]."' and status='5' order by id asc limit 1";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $closedprojects=($closedprojects+1); } }
                
                /*                    
                $p1 = "select * from project where id='".$ta3["projectid"]."' order by id asc";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                    if($p3["status"]=="1") $openprojects=($openprojects+1);                            
                    if($p3["status"]=="5") $closedprojects=($closedprojects+1);
                } }
                $opentasks=0;
                $closedtasks=0;                    
                $ta1 = "select * from tasks where employeeid='".$t1["id"]."' order by id asc";
                $ta2 = $conn->query($ta1);
                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                    if($ta3["activity"]!="2") $opentasks=($opentasks+1);                            
                    else $closedtasks=($closedtasks+1);                        
                } }
                */
                
                $uid=$t1["id"];
                $status=$t1["status"];
                if($status==1) $status="ON";
                else $status="OFF";
                
                echo"<div class='row'>
                    <div class='col-12 col-md-4'>                                    
                        <h2 class='small-title'>".$t1["username"]." ".$t1["username2"]."`s Profile</h2>
                        <div class='card mb-5'>
                            <div class='card-body'>
                                <div class='d-flex align-items-center flex-column mb-4'>
                                    <div class='d-flex align-items-center flex-column'>
                                        <div class='sw-13 position-relative mb-3'>
                                            <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                                <div style='position:absolute;z-index:999;color:red;margin-left:90px'><a href='setting_processor.php?removeimageid=".$t1["id"]."&url=".$_GET["url"]."&id=".$_GET["id"]."' target='dataprocessor' ><i class='fa fa-times'></i></a></div>";
                                                $profile_image=$t1["images"];
                                                if(strlen("$profile_image")>=3){
                                                    if (!file_exists($profile_image) || empty($profile_image)) echo"<img src='assets/noimage.png' class='img-fluid rounded-xl' alt='thumb' />";
                                                    else echo"<img src='$profile_image' class='img-fluid rounded-xl' alt='thumb' />";
                                                } else echo"<img src='assets/noimage.png' class='img-fluid rounded-xl' alt='thumb' />";
                                                
                                                echo"<input type='hidden' name='processor' value='edit_user_image'><input type='hidden' name='id' value='".$t1["id"]."'>";
                                                
                                                if($designationy==13 OR $t1["id"]=="$userid") echo"<input id='image1' type='file' name='images1[]' multiple class='form__field__img form-control' name='image' value='images' onchange='this.form.submit()' style='position:absolute;width:10px;margin-top:-50px;z-index:-999'><div style='position:absolute;z-index:999;margin-top:-23px;margin-left:5px'><label for='image1'><i class='fa fa-upload' style='cursor:pointer;color:orange'></i></label></div>";
                                                // <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                            echo"</form>
                                        </div>
                                        <div class='h5 mb-0'>".$t1["username"]." ".$t1["username2"]."</div>
                                        <div class='text-muted'>$designationname</div>
                                        <div class='text-muted'><center><hr>
                                            <i data-acorn-icon='pin' class='me-1'></i><br>
                                            <span class='align-middle'>".$t1["address"].", ".$t1["city"].", ".$t1["area"]."-".$t1["zip"].", ".$t1["country"]."</span>
                                        </div><hr>";
                                        
                                        if($designationy==13 OR $t1["id"]=="$userid") echo"<a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('users_manager.php?cid=$cidx&sheba=$sheba&mid=".$t1["id"]."&ctitle=$title&utype=$utype', 'offcanvasTop2')\">Edit Profile</a>";
                                    echo"</div>
                                </div>
                            </div>
                        </div>";
                        
                        $projectz=0;
                        if($designationy==13) $rax = "select * from project_team_allocation where status='1' order by id desc limit 1";
                        else{
                            if(isset($_GET["empid"]))  $rax = "select * from project_team_allocation where employeeid='".$_GET["empid"]."' and status='1' order by id desc";
                            else $rax = "select * from project_team_allocation where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                        }
                        $rbx = $conn->query($rax);
                        if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $projectz=($projectz+1); } } 
                        
                        $pendingtasks=0;
                        if($designationy==13) $rax = "select * from tasks where activity='1' and status='1' order by id desc limit 1";
                        else{
                            if(isset($_GET["empid"]))  $rax = "select * from tasks where employeeid='".$_GET["empid"]."' and activity='1' and status='1' order by id desc";
                            else $rax = "select * from tasks where employeeid='".$_COOKIE["userid"]."' and activity='1' and status='1' order by id desc";
                        }
                        $rbx = $conn->query($rax);
                        if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $pendingtasks=($pendingtasks+1); } } 
                        
                        $activetasks=0;
                        if($designationy==13) $rax = "select * from tasks where activity='2' and status='1' order by id desc limit 1";
                        else{
                            if(isset($_GET["empid"]))  $rax = "select * from tasks where employeeid='".$_GET["empid"]."' and activity='2' and status='1' order by id desc";
                            else $rax = "select * from tasks where employeeid='".$_COOKIE["userid"]."' and activity='2' and status='1' order by id desc";
                        } 
                        $rbx = $conn->query($rax);
                        if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $activetasks=($activetasks+1); } } 
                        
                        $notifications=0;
                        if($designationy==13) $rax = "select * from notification where status='1' order by id desc limit 1";
                        else{
                            if(isset($_GET["empid"]))  $rax = "select * from notification where employeeid='".$_GET["empid"]."' and status='1' order by id desc";
                            else $rax = "select * from notification where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                        } 
                        
                        $rbx = $conn->query($rax);
                        if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) { $notifications=($notifications+1); } } 
                        
                        echo"<div class='row g-2'>
                        
                            <div class='col-12'><a href='index.php?url='>
                                <div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                                    <table style='width:100%'><tr><span>Allocated Projects</span><br><div class='text-small text-muted mb-1'>ACTIVE</div></td><td align=right>";
                                        if($designationy==13 OR $t1["id"]=="$userid")  echo"<div class='cta-1 text-primary'>$projectz</div>";
                                        else echo"<div class='cta-1 text-primary'>0</div>";
                                    echo"</td></tr></table>
                                </div></div>
                            </a></div>
                            
                            <div class='col-12'><a href='index.php?url='>
                                <div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                                    <table style='width:100%'><tr><span>Pending Tasks</span><br><div class='text-small text-muted mb-1'>Pending</div></td><td align=right>";
                                        if($designationy==13 OR $t1["id"]=="$userid")  echo"<div class='cta-1 text-primary'>$pendingtasks</div>";
                                        else echo"<div class='cta-1 text-primary'>0</div>";
                                    echo"</td></tr></table>
                                </div></div>
                            </a></div>
                                                    
                            <div class='col-12'><a href='index.php?url='>
                                <div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                                    <table style='width:100%'><tr><span>Active Tasks</span><br><div class='text-small text-muted mb-1'>Active</div></td><td align=right>";
                                        if($designationy==13 OR $t1["id"]=="$userid") echo"<div class='cta-1 text-primary'>$activetasks</div>";
                                        else echo"<div class='cta-1 text-primary'>0</div>";
                                    echo"</td></tr></table>
                                </div></div>
                            </a></div>
                                                    
                            <div class='col-12'><a href='index.php?url='>
                                <div class='card hover-border-primary'><div class='card-body' style='padding:10px'>
                                    <table style='width:100%'><tr><span>Recent Notices</span><br><div class='text-small text-muted mb-1'>Status</div></td><td align=right>";
                                        if($designationy==13 OR $t1["id"]=="$userid") echo"<div class='cta-1 text-primary'>$notifications</div>";
                                        else echo"<div class='cta-1 text-primary'>0</div>";
                                    echo"</td></tr></table>
                                </div></div>
                            </a></div>
                            
                        </div>
                    </div>
                    
                    <div class='col-12 col-md-8'>
                        <div class='row'>
                            <div class='col-12 col-md-6'>
                                <h2 class='small-title'>Personal Information</h2>
                                <div class='card mb-5'>
                                    <div class='card-body'>
                                        <div class='row g-0'>
                                            <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                <div class='w-100 d-flex sh-1'></div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                    <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                    <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                            </div>
                                            <div class='col mb-4'>";
                                                if(isset($_GET["empid"])) $s = "select * from uerp_user where id='".$_GET["empid"]."' order by id asc limit 1";
                                                else $s = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                $r = $conn->query($s); 
                                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                    $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                    $joindate=date("d-m-Y",$rs["jointime"]); 
                                                    $department=$rs["department"];
                                                    $s8x = "select * from departments where id='$department' order by id asc limit 1";
                                                    $r8x = $conn->query($s8x);
                                                    if ($r8x->num_rows > 0) { while($rs8x = $r8x->fetch_assoc()) { $departmentname=$rs8x["department_name"]; } }
                                                    echo"<table style='width:100%;min-height:220px'>
                                                        <tr><td nowrap style='width:100px'><strong>Department</strong></td><td style='width:10px'>:</td><td>$departmentname</td></tr>
                                                        <tr><td nowrap style='width:100px'><strong>Employee ID</strong></td><td style='width:10px'>:</td><td>".$rs["id"]."</td></tr>
                                                        <tr><td nowrap style='width:100px'><strong>Join Date</strong></td><td style='width:10px'>:</td><td>$joindate</td></tr>
                                                        <tr><td nowrap style='width:100px'><strong>Nationality</strong></td><td style='width:10px'>:</td><td>".$rs["nationality"]."</td></tr>
                                                        <tr><td nowrap style='width:100px'><strong>Marrital Status</strong></td><td style='width:10px'>:</td><td>".$rs["marital_status"]."</td></tr>
                                                        <tr><td nowrap style='width:100px'><strong>driving licence no</strong></td><td style='width:10px'>:</td><td>".$rs["driving_licence_no"]."</td></tr>
                                                    </table>";
                                                    /*
                                                        <tr><td><strong>Expire Date</strong></td><td style='width:10px'>:</td><td>$passport_expire_date</td></tr>
                                                        <tr><td nowrap><strong>No. of Child</strong></td><td style='width:10px'>:</td><td>".$rs["child"]."</td></tr>
                                                        <tr><td><strong>Religion</strong></td><td style='width:10px'>:</td><td>".$rs["religion"]."</td></tr>
                                                        <tr><td><strong>Passport No.</strong></td><td style='width:10px'>:</td><td colspan=10>".$rs["passport"]."</td></tr>
                                                    */    
                                                } }
                                            echo"</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='col-12 col-md-6'>
                                <h2 class='small-title'>Emergency Contact Person</h2>
                                <div class='card mb-5'>
                                    <div class='card-body'>
                                        <div class='row g-0'>
                                            <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                <div class='w-100 d-flex sh-1'></div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                    <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                    <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                            </div>
                                            <div class='col mb-4'>";
                                                if(isset($_GET["empid"])) $s = "select * from uerp_user where id='".$_GET["empid"]."' order by id asc limit 1";
                                                else $s = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                $r = $conn->query($s);
                                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                    $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                    echo"<table style='width:100%'>
                                                        <tr><td style='width:30%' nowrap><strong>Person Name</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_contact_1"]."</td></tr>
                                                        <tr><td style='width:30%' nowrap><strong>Relation</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_relation_1"]."</td></tr>
                                                        <tr><td style='width:30%' nowrap><strong>Phone</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_phone_1"]."</td></tr>
                                                        <tr><td style='width:30%' nowrap><strong>Email</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_email_1"]."</td></tr>
                                                        <tr><td colspan=10><hr></td></tr>
                                                        <tr><td style='width:30%' nowrap><strong>Person Name</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_contact_2"]."</td></tr>
                                                        <tr><td style='width:30%' nowrap><strong>Relation</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_relation_2"]."</td></tr>
                                                        <tr><td style='width:30%' nowrap><strong>Phone</strong></td><td style='width:10px'>:</td><td>".$rs["emergency_phone_2"]."</td></tr>
                                                        <tr><td style='width:30%' nowrap><strong>Email</strong></td><td style='width:10px'>:</td><td colspan=5>".$rs["emergency_email_2"]."</td></tr>
                                                    </table>";
                                                } }
                                            echo"</div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class='col-12'>
                                <div class='mb-5'>
                                    <h2 class='small-title'>&nbsp; About Myself</h2>
                                    <div class='card mb-5'>
                                        <div class='card-body'>
                                            <div class='row g-0'>
                                                <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                    <div class='w-100 d-flex sh-1'></div>
                                                    <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                        <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                    </div>
                                                    <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                        <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                    </div>
                                                </div>
                                                <div class='col mb-4'>";
                                                    if(isset($_GET["empid"])) $s = "select * from uerp_user where id='".$_GET["empid"]."' order by id asc limit 1";
                                                    else $s = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                    $r = $conn->query($s);
                                                    if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                        $dob=date("d-m-Y",$rs["dob"]);
                                                        echo"<div class='row'>
                                                            <div class='col-md-12'><div class='ibox'><div class='ibox-content text-left'><p class='small'>".$rs["aboutme"]."</p></div></div></div>
                                                            <div class='col-md-6'><div class='ibox'><div class='ibox-content text-left'>
                                                                <h3>Address</h3>
                                                                <table style='widht:100%;min-height:150px'>
                                                                    <tr><td>Address</td><td style='width:10px'>:</td><td>".$rs["address"]."</td></tr>
                                                                    <tr><td>Address 2</td><td style='width:10px'>:</td><td>".$rs["address2"]."</td></tr>
                                                                    <tr><td>City</td><td style='width:10px'>:</td><td>".$rs["city"]."</td></tr>
                                                                    <tr><td>State</td><td style='width:10px'>:</td><td>".$rs["area"]."</td></tr>
                                                                    <tr><td>Zip</td><td style='width:10px'>:</td><td>".$rs["zip"]."</td></tr>
                                                                    <tr><td>Country</td><td style='width:10px'>:</td><td>".$rs["country"]."</td></tr>
                                                                </table><hr>
                                                            </div></div></div>
                                                            <div class='col-md-6'><div class='ibox'><div class='ibox-content text-left'>
                                                                <h3>Other Info.</h3>
                                                                <table style='widht:100%;min-height:150px'>
                                                                    <tr><td>ABN</td><td style='width:10px'>:</td><td>$abn</td></tr>
                                                                    <tr><td>Email</td><td style='width:10px'>:</td><td>".$rs["email"]."</td></tr>
                                                                    <tr><td>Gender</td><td style='width:10px'>:</td><td>".$rs["gender"]."</td></tr>
                                                                    <tr><td>DOB</td><td style='width:10px'>:</td><td>$dob</td></tr>
                                                                </table><hr>
                                                            </div></div></div>
                                                            <div class='col-md-12'><div class='ibox'><div class='ibox-content text-left'>
                                                                <h3>Bank Info.</h3>
                                                                <table style='widht:100%;min-height:150px'>
                                                                    <tr><td>Bank Name</td><td style='width:10px'>:</td><td>".$rs["bank_name"]."</td></tr><tr><td>A/c Name</td><td style='width:10px'>:</td><td>".$rs["account_name"]."</td></tr>
                                                                    <tr><td>A/c Number</td><td style='width:10px'>:</td><td>".$rs["account_number"]."</td></tr><tr><td>BSB</td><td style='width:10px'>:</td><td>".$rs["bsb"]."</td></tr>
                                                                </table>
                                                            </div></div></div>
                                                        </div>
                                                        
                                                        ";
                                                    } }
                                                echo"</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-12'>
                            <div class='mb-5'>
                                <h2 class='small-title'>&nbsp; More Data</h2>
                                <div class='card mb-5'>
                                    <div class='card-body'>
                                        <div class='row g-0'>
                                            <div class='col-md-12'><div class='ibox'><div class='ibox-content text-left'><p class='small'>".$rs["aboutme"]."</p></div></div></div>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3>Lead Manager</h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Campaign</td></td><td align=center> : </td><td align=left>$campaignname</td></tr>
                                                    <tr><td nowrap width='100px'>Manager</td><td align=center> : </td><td align=left>$employeename</td></tr>
                                                </table>
                                            </div></div></div>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3>Schedules</h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Appointment Date</td><td align=center> : </td><td align=left>$appointment_date</td></tr>
                                                    <tr><td nowrap width='100px'>Followup Date</td><td align=center> : </td><td align=left>$followup_date</td></tr>
                                                    <tr><td nowrap width='100px'>Target Date</td><td align=center> : </td><td align=left>$target_date</td></tr>
                                                </table><br>
                                            </div></div></div>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3>Client Data</h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Date of Birth</td><td align=center> : </td><td align=left>$dob</td></tr>
                                                    <tr><td nowrap width='100px'>Birth Country</td><td align=center> : </td><td align=left>".$rab1["birth_country"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Language</td><td align=center> : </td><td align=left>".$rab1["language"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Can Spoke English?</td><td align=center> : </td><td align=left>".$rab1["english"]."</td></tr>
                                                </table><br>
                                            </div></div></div>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3>Package & Funding</h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Package Level</td><td align=center> : </td><td align=left>".$rab1["cpackage"]." / 10</td></tr>
                                                    <tr><td nowrap width='100px'>Funding type</td><td align=center> : </td><td align=left>".$rab1["funding_type"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Prev. Provider</td><td align=center> : </td><td align=left>".$rab1["previous_provider"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Referral Number</td><td align=center> : </td><td align=left>".$rab1["referral_number"]."
                                                </table><br>
                                            </div></div></div>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3>Representative</h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Representative Name</td><td align=center> : </td><td align=left>".$rab1["rname"]." ".$rab1["rname2"]."</td></tr>
                                                    <tr><td nowrap width='100px'>R. Phone</td><td align=center> : </td><td align=left>".$rab1["rphone"]."</td></tr>
                                                    <tr><td nowrap width='100px'>R. Email</td><td align=center> : </td><td align=left>".$rab1["remail"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Source Type</td><td align=center> : </td><td align=left>".$rab1["rtype"]."</td></tr>
                                                </table>
                                            </div></div></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";    
            } }
        
    echo"</div>";
?>