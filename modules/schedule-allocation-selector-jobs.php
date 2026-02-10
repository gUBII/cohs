<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    error_reporting(0);
    include("../authenticator.php");
    
    $dx=$_GET["days"];
    $mx=$_GET["months"];
    $yx=$_GET["years"];
    $ex=$_GET["empid"];
    $rdt=$_GET["rdt"];
    
    $empidx=$_GET["empid"];

    $strpos =strrpos("$empidx","-");
    $strpos=($strpos+1);
    $year= substr("$empidx",$strpos);
                    
    $strpos1=($strpos-1);
    $empidx=substr("$empidx",0, $strpos1);
    $strpos =strrpos("$empidx","-");
    $strpos=($strpos+1);
    $month= substr("$empidx",$strpos);
                    
    $strpos1=($strpos-1);
    $empidx=substr("$empidx",0, $strpos1);
    $strpos =strrpos("$empidx","-");
    $strpos=($strpos+1);
    $day= substr("$empidx",$strpos);
                    
    $strpos1=($strpos-1);
    $empidx=substr("$empidx",0, $strpos1);
    $strpos =strrpos("$empidx","-");
    $empid= substr("$empidx",$strpos);

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    $getdata=$_COOKIE["getdatay"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>Add New Appointment</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close' 
            onmouseover=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"></button>
    </div>
    <div class='offcanvas-body' onmouseout=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
        <div class='tabs-container'>";
            $r1x = "select * from uerp_user where id='".$_GET["empid"]."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $empname="".$r1z["username"]." ".$r1z["username2"].""; } }
            
            $r99 = "select * from project where clientid='".$_GET["empid"]."' and status='1' order by id asc limit 1";
            $r9 = $conn->query($r99);
            if ($r9->num_rows > 0) { while($r9x = $r9 -> fetch_assoc()) {
                $projectid=$r9x["id"]; 
                $projectname=$r9x["name"]; 
                $categoryid=$rab1["category"];
            } }
                            
            echo"<div 'padding:10px;'>Client Name : $empname @ $projectname</center></div>";
            
            echo"<div role='tabpanel' id='tab-11' class='tab-pane active'>
                <div class='panel-body'>";
                    
                    $stime="$yx-$mx-$dx 08:00:00";
                    $etime="$yx-$mx-$dx 17:00:00";
                    
                    echo"<form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='scheduleadd'>
                        <input type='hidden' name='projectid' value='$projectid'>
                        <input type='hidden' name='category' value='$categoryid'>
                        
                        <div class='row'>
                            <div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                <label>Clock In *</label>
                                <input type='datetime-local' class='form-control' id='event-start' name='start' value='$stime' onchange=\"document.getElementById('event-stime').value=this.value\">
                                <input type='hidden' id='event-stime' name='stime' class='form-control' value='$stime'>
                            </div></div>
                            <div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                <label>Clock Out *</label>
                                <input type='datetime-local' class='form-control' id='event-end' name='end' value='$etime'  onchange=\"document.getElementById('event-etime').value=this.value\">
                                <input type='hidden' id='event-etime' name='etime' class='form-control' value='$etime'>
                            </div></div>
                            <div class='col-12' style='padding-bottom:20px'><div class='form-group'>
                                <label>Item Name & Number </label>
                                <select class='form-control' name='itemnumber' required><option value=''>Select Item Number</option>";
                                    $a7x = "select * from ndis_line_numbers order by id asc";
                                    $a8x = $conn->query($a7x);
                                    if ($a8x->num_rows > 0) { while($a9x = $a8x->fetch_assoc()) {
                                        echo"<option value='".$a9x["id"]."'>".$a9x["item_number"]." | ".$a9x["item_name"]."</option>";
                                    } }     
                                echo"</select>
                            </div></div>
                                
                            <div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                <label>Client Name</label>
                                <select class='form-control' name='clientid'>";
                                    $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE id='".$_GET["empid"]."' and mtype = 'CLIENT' AND status = '1' ORDER BY username ASC limit 1");
                                    if ($stmt2) { if ($stmt2->execute()) {
                                        $result2 = $stmt2->get_result();
                                        if ($result2 && $result2->num_rows > 0) { while ($row2 = $result2->fetch_assoc()) {
                                            echo"<option value='".$row2["id"]."'>".$row2["username"]." ".$row2["username2"]."</option>";
                                        } }
                                    } }
                                    
                                    echo"<option value='' disabled><hr></option>";
                                    
                                    $stmt2x = $conn->prepare("SELECT * FROM uerp_user WHERE mtype = 'CLIENT' AND status = '1' ORDER BY username ASC");
                                    if ($stmt2x) { if ($stmt2x->execute()) {
                                        $result2x = $stmt2x->get_result();
                                        if ($result2x && $result2x->num_rows > 0) { while ($row2x = $result2x->fetch_assoc()) {
                                            echo"<option value='".$row2x["id"]."'>".$row2x["username"]." ".$row2x["username2"]."</option>";
                                        } }
                                    } }
                                    
                                echo"</select>
                            </div></div>
                            
                            <div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                <label>Employee</label>
                                <select class='form-control' id='event-employeeid' required name='employeeid' style='margin-bottom:10px'>
                                    <option value=''>Select Employee</option>";
                                    $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE mtype = 'USER' AND status = '1' ORDER BY username ASC");
                                    if ($stmt2) { if ($stmt2->execute()) {
                                        $result2 = $stmt2->get_result();
                                            if ($result2 && $result2->num_rows > 0) { while ($row2 = $result2->fetch_assoc()) {
                                                $designationname=null;
                                                $stmt2x = $conn->prepare("SELECT * FROM designation WHERE id='".$row2["designation"]."' ORDER BY id ASC limit 1");
                                                if ($stmt2x) { if ($stmt2x->execute()) {
                                                    $result2x = $stmt2x->get_result();
                                                    if ($result2x && $result2x->num_rows > 0) { while ($row2x = $result2x->fetch_assoc()) {
                                                        $designationname=$row2x["designation"];
                                                    } }
                                                } }
                                                echo"<option value='".$row2["id"]."'>".$row2["username"]." ".$row2["username2"]." ($designationname)</option>";
                                            } }
                                        } }
                                    echo"</select>
                                </div></div>
                                
                                <div class='col-4 col-md-4' style='padding-bottom:20px'><div class='form-group'>
                                    <label for='event-repeating'>Repeat:</label>
                                    <select class='form-control' required id='event-repeating' name='repeating' style='margin-bottom:10px'>
                                        <option value=''>Select Repeating</option>
                                        <option value='Once'>Once</option>
                                        <option value='Week Repeat'>Week Repeat</option>
                                        <option value='Fortnight Repeat'>Fortnight Repeat</option>
                                        <option value='3 Weeks Repeat'>Every 3 Weeks</option>
                                        <option value='4 Weeks Repeat'>Every 4 Weeks</option>
                                        <option value='6 Weeks Repeat'>Every 6 Weeks</option>
                                        <option value='8 Weeks Repeat'>Every 8 Weeks</option>
                                        <option value='12 Weeks Repeat'>Every 12 Weeks</option>
                                        <option value='Month Repeat'>Month Repeat</option>
                                        <option value='3 Months Repeat'>Every 3 Months Repeat</option>
                                        <option value='6 Months Repeat'>Every 6 Months Repeat</option>
                                        <option value='12 Months Repeat'>Every 12 Months Repeat</option>
                                    </select>
                                </div></div>
                                                
                                <div class='col-4 col-md-4' style='padding-bottom:20px'><div class='form-group'>
                                    <label for='event-night'>Sleepover?</label>
                                    <select class='form-control' id='event-night' name='night' style='margin-bottom:10px'>
                                        <option value='".$r5c['night']."'>";
                                            if($r5c['night']==1) echo"ON";
                                            else echo"OFF";
                                        echo"</option>
                                        <option value='0'>OFF</option><option value='1'>ON</option>
                                    </select>
                                </div></div>
                                                
                                <div class='col-4 col-md-4' style='padding-bottom:20px'><div class='form-group'>
                                    <label>Template Color *</label><input type='color' name='color' class='form-control' style='height:35px' value='#AA830F'>
                                </div></div>
                                                
                                <div class='col-6 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                    <label>ClockIN Address *</label><input type='text' name='address' class='form-control' style='height:35px' value=''>
                                </div></div>
                                        
                                <div class='col-6 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                    <label>Admin Note *</label><input type='text' name='admin_note' class='form-control' style='height:35px' value=''>
                                </div></div>
                                        
                                <div class='col-12 col-md-12'><div class='form-group'><center>
                                    <input type='submit' class='btn btn-primary btn-sm recordupdated' value='Assign Appointment' onblur=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
                                </center></div></div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>            
        </div>
    </div>";
    ?>
    <script>
        function myFunctionX() {
            alert("Schedule Allocated.");
        }
    </script>