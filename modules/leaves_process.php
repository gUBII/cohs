<?php
    
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    $cid=$_GET["cid"];
    $sheba=$_GET["sheba"];
    
    error_reporting(0);

    include("../authenticator.php");

    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='../css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='../css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='../css/vendor/plyr.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='../js/base/loader.js'></script>";

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>";
        
        if($_GET["sourceid"]=="leave_application"){ 
            
            $sessionid = rand(1234567890,9876543210);
            
            if(isset($_GET["lid"])){
                $s1 = "select * from leave_applications where id='".$_GET["lid"]."' order by id asc limit 1";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rab1 = $r1->fetch_assoc()) {
                    $application_date=date("Y-m-d",$rab1["application_date"]);
                    $leave_from=date("Y-m-d",$rab1["leave_from"]);
                    $leave_to=date("Y-m-d",$rab1["leave_to"]);
                    if($rab1["leave_from"]==0) $approved_date="$current_date";
                    else $approved_date=date("Y-m-d",$rab1["approved_date"]);
                    if($rab1["approved_from"]==0) $approved_from="$current_date";
                    else $approved_from=date("Y-m-d",$rab1["approved_from"]);
                    if($rab1["approved_to"]==0) $approved_to="$current_date";
                    else $approved_to=date("Y-m-d",$rab1["approved_to"]);
                    
                    echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                        <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'>
                        <input type='hidden' name='processor' value='leaveapplication_edit'><input type='hidden' name='lid' value='".$rab1["id"]."'>
                        <fieldset>
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='form-group'><label>Application Date *</label><input name='date1' type='date' value='$application_date' class='form-control required'><br></div>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='form-group'>
                                        <label>Applicant Name *</label><select class='form-control m-b required' name='applicantid'>
                                            <option value='0'>Select Applicant Name</option>";
                                            $ra2 = "select * from uerp_user where id='".$rab1["applicant_id"]."' order by id asc limit 1";
                                            $rb2 = $conn->query($ra2);
                                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                echo"<option value='".$rab2["id"]."'>".$rab2["username"]." ".$rab2["username2"]."</option>";
                                            } }
                                            if($mtype=="ADMIN"){
                                                $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' OR mtype='EMPLOYEE' and status='1' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                            }else{
                                                $s7 = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                            }
                                        echo"</select>
                                    </div><br>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='form-group'>
                                        <label>Leave Type *</label><select class='form-control m-b required' name='typeid'>";
                                            $ra2x = "select * from leave_type where id='".$rab1["type_id"]."' order by id asc limit 1";
                                            $rb2x = $conn->query($ra2x);
                                            if ($rb2x->num_rows > 0) { while($rab2x = $rb2x->fetch_assoc()) {
                                                echo"<option value='".$rab2x["id"]."'>".$rab2x["leavename"]."</option>";
                                            } }
                                            $s7 = "select * from leave_type where status='ON' order by id asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["leavename"]."</option>";
                                            } }
                                        echo"</select>
                                    </div><br>
                                </div>
                                <div class='col-lg-6'>
                                    <div class='form-group'><label>Date From *</label><input name='dfrom' type='date' value='$leave_from' class='form-control required'><br></div>
                                </div>
                                <div class='col-lg-6'>
                                    <div class='form-group'><label>Date To *</label><input name='dto' type='date' value='$leave_to' class='form-control required'><br></div>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='form-group'><label>Application Hard Copy *</label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,'><br></div>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='form-group'><label>Reason *</label><input name='reason' type='text' value='".$rab1["reason"]."' class='form-control'><br></div>
                                </div>
                                
                                <div class='col-lg-6'>
                                    <div class='form-group'><label>Approve Date *</label><input name='approved_date' type='date' value='$approved_date' class='form-control'><br></div>
                                </div>
                                <div class='col-lg-6'>
                                    <div class='form-group'><label>Approve Date From *</label><input name='approved_from' type='date' value='$approved_from' class='form-control'><br></div>
                                </div>
                                <div class='col-lg-6'>
                                    <div class='form-group'><label>Approve Date To *</label><input name='approved_to' type='date' value='$approved_to' class='form-control'><br></div>
                                </div>
                                <div class='col-lg-12'>
                                    <div class='form-group'><label>Comment *</label><input name='manager_comment' type='text' value='".$rab1["manager_comment"]."' class='form-control'><br></div>
                                </div>
                                <div class='col-lg-12'><div class='form-group'><label>&nbsp; </label><Br>
                                    <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Update Application' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=Leave_Application&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                                </div></div>
                            </div><hr>
                        </fieldset>
                    </form>";
                } }
            }else{
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'><input type='hidden' name='processor' value='leaveapplication'>
                    
                    <fieldset>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'><label>Application Date *</label><input name='date1' type='date' value='$current_date' class='form-control required'><br></div>
                            </div>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Applicant Name *</label><select class='form-control m-b required' name='applicantid'>
                                        <option value='0'>Select Applicant Name</option>";
                                        if($mtype=="ADMIN"){
                                            $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' OR mtype='EMPLOYEE' and status='1' order by id asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        }else{
                                            $s7 = "select * from uerp_user where id='$userid' order by id asc limit 1";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        }
                                    echo"</select>
                                </div>
                                <br>
                            </div>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Leave Type *</label><select class='form-control m-b required' name='typeid'>
                                        <option value='0'>Select Leave Type</option>";
                                        $s7 = "select * from leave_type where status='ON' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["leavename"]."</option>";
                                        } }
                                    echo"</select>
                                </div>
                                <br>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'><label>Date From *</label><input name='dfrom' type='date' value='$current_date' class='form-control required'><br></div>
                            </div>
                            
                            <div class='col-lg-6'>
                                <div class='form-group'><label>Date To *</label><input name='dto' type='date' value='$current_date' class='form-control required'><br></div>
                            </div>
                            
                            <div class='col-lg-12'>
                                <div class='form-group'><label>Application Hard Copy *</label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,' required><br></div>
                            </div>
                            
                            <div class='col-lg-12'>
                                <div class='form-group'><label>Reason *</label><input name='reason' type='text' value='' class='form-control required'><br></div>
                            </div>
                            
                            <div class='col-lg-12'><div class='form-group'><label>&nbsp; </label><Br>
                                <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Create Application' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=Leave_Application&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                            </div></div>
                        </div>
                        <hr>
                    </fieldset>
                    
                </form>";
            }
        }
        
        
        if($_GET["sourceid"]=="leave_type"){ 
            $sessionid = rand(1234567890,9876543210);
            if(isset($_GET["viewpoint"])){
                echo"<table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                    <thead><th>Leave Type Name</th><th>Status</th></thead>
                    <tbody>";
                        $t=0;
                        $ra1 = "select * from leave_type order by id asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            $t=($t+1);
                            echo"<tr style='height:40px'><td>".$rab1["leavename"]."</td><td>".$rab1["status"]."</td></tr>"; 
                        } }
                    echo"</tbody>
                </table>";
            }else{
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'><input type='hidden' name='processor' value='leavetype'>
                    <fieldset>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'><label>Leave Type *</label><input name='leavename' type='text' value='' class='form-control required'><br></div>
                            </div>
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Status *</label><select class='form-control m-b required' name='status'>
                                        <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                            
                            <div class='col-lg-12'><div class='form-group'><label>&nbsp; </label><Br>
                                <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Add Leave Type'>
                            </div></div>
                        </div>
                        <hr>
                    </fieldset>
                    
                </form>";
            }
        }
        
        
        if($_GET["sourceid"]=="general_holidays"){ 
            $sessionid = rand(1234567890,9876543210);
            if(isset($_GET["viewpoint"])){
                echo"<table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                    <thead><th>State</th><th>Holiday Name</th><th>Date</th></thead>
                    <tbody>";
                        $t=0;
                        $ra1 = "select * from australian_holidays order by state,date_ts asc";
                        $rb1 = $conn_main->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            $t=($t+1);
                            $hdate=null;
                            $hdate=date("d-m-Y",$rab1["date_ts"]);
                            $observed=null;
                            $observed=date("d-m-Y",$rab1["observed_ts"]);
                            echo"<tr style='height:40px'>
                                <td style='font-size:8pt'>".$rab1["state"]."</td>
                                <td style='font-size:8pt'>".$rab1["name"]."<br>".$rab1["note"]."</td>
                                <td style='font-size:8pt'>$hdate</td></tr>"; 
                        } }
                    echo"</tbody>
                </table>";
            }else{
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'><input type='hidden' name='processor' value='leaveholidays'>
                    <fieldset>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'><label>Holiday Name *</label><input name='holidayname' type='text' value='' required class='form-control'><br></div>
                            </div>
                            <div class='col-lg-12'>
                                <div class='form-group'><label>Holiday Location *</label><input name='holidaytype' type='text' value='' class='form-control'><br></div>
                            </div>
                            
                            <div class='col-lg-6'>
                                <div class='form-group'><label>Date From *</label><input name='dfrom' type='date' value='$current_date' required class='form-control'><br></div>
                            </div>
                            
                            <div class='col-lg-6'>
                                <div class='form-group'><label>Date To *</label><input name='dto' type='date' value='$current_date' required class='form-control'><br></div>
                            </div>
                            
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Status *</label><select class='form-control m-b required' name='status'>
                                        <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                            
                            <div class='col-lg-12'><div class='form-group'><label>&nbsp; </label><Br>
                                <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Add Holiday'>
                            </div></div>
                        </div>
                        <hr>
                    </fieldset>
                    
                </form>";
            }
        }
        
        if($_GET["sourceid"]=="weekly_holidays"){ 
            $sessionid = rand(1234567890,9876543210);
            if(isset($_GET["viewpoint"])){
                echo"<table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                    <thead><th>Weekday</th><th>Time From</th><th>Time To</th><th>Status</th></thead>
                    <tbody>";
                        $t=0;
                        $ra1 = "select * from leave_weekend order by id asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            $t=($t+1);
                            echo"<tr><td>".$rab1["weekday"]."</td><td>".$rab1["time_from"]."</td><td>".$rab1["time_to"]."</td><td>".$rab1["status"]."</td></tr>"; 
                        } }
                    echo"</tbody>
                </table>";
            }else{
                
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'><input type='hidden' name='processor' value='leaveweeklyholiday'>
                    <fieldset>
                        <div class='row'>
                            <div class='col-lg-12'>
                                <div class='form-group'><label>Week Day Name *</label>
                                    <select class='form-control m-b required' name='weekday'>
                                        <option value='SUNDAY'>SUNDAY</option>
                                        <option value='MONDAY'>MONDAY</option>
                                        <option value='TUESDAY'>TUESDAY</option>
                                        <option value='WEDNESDAY'>WEDNESDAY</option>
                                        <option value='THURSDAY'>THURSDAY</option>
                                        <option value='FRIDAY'>FRIDAY</option>
                                        <option value='SATURDAY'>SATURDAY</option>
                                    </select>
                                </div><br>
                            </div>
                            <div class='col-lg-6'>
                                <div class='form-group'><label>time From *</label><input name='tfrom' type='time' value='$current_date' class='form-control required'><br></div>
                            </div>
                            
                            <div class='col-lg-6'>
                                <div class='form-group'><label>Date To *</label><input name='tto' type='time' value='$current_date' class='form-control required'><br></div>
                            </div>
                            
                            <div class='col-lg-12'>
                                <div class='form-group'>
                                    <label>Status *</label><select class='form-control m-b required' name='status'>
                                        <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                    </select>
                                </div>
                                <br>
                            </div>
                            
                            <div class='col-lg-12'><div class='form-group'><label>&nbsp; </label><Br>
                                <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Add Weekend'>
                            </div></div>
                        </div>
                        <hr>
                    </fieldset>
                    
                </form>";
            }
        }
        
    echo"</div>";
?>