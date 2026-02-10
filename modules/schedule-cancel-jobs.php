<?php
    error_reporting(0);
    include('../include.php');

    $dx=$_GET["days"];
    $mx=$_GET["months"];
    $yx=$_GET["years"];
    $ex=$_GET["empid"];
    $rdt=$_GET["rdt"];

    if (isset($_GET["smid"])) {
        $r5a = "select * from shifting_allocation where id='".$_GET["smid"]."' and status='1' order by id asc";
        $r5b = $conn->query($r5a);
        if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
            
            $clientname="";
            $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname="".$r1z["username"]." ".$r1z["username2"].""; } }
            
            $projectname="";
            $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
            $r2y = $conn->query($r2x);
            if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
            
            $employeename="";
            $r3x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
            $r3y = $conn->query($r3x);
            if ($r3y->num_rows > 0) { while($r3z = $r3y -> fetch_assoc()) {
                $employeename="".$r3z["username"]." ".$r3z["username2"]."";
                $semail=$r3z["email"];
            } }
            
            
            $stime=substr($r5c['stime'],11,5);
            $etime=substr($r5c['etime'],11,5);
            $stime1=substr($r5c['stime'],0,10);
            $stime3=substr($r5c['stime'],11,5);
            $etime1=substr($r5c['etime'],0,10);
            $etime2=substr($r5c['etime'],11,5);
            
            $stime2=substr($r5c['stime'],8,2);
            
            $stimeA1="";
            $etimeA1="";
            $stimeA=strtotime($r5c["stime"]);
            $etimeA=strtotime($r5c["etime"]);
            $stimeA1=date("h:i A", $stimeA);
            $etimeA1=date("h:i A", $etimeA);
            $stimeB1=date("H:i", $stimeA);
            $etimeB1=date("H:i", $etimeA);
            $sdateB1=date("Y-m-d", $stimeA);
            $edateB1=date("Y-m-d", $etimeA);
            
            $statuscolor="black";
            if($r5c["accepted"]=="0") $statuscolor="grey";
            if($r5c["accepted"]=="1") $statuscolor="lightgreen";
            if($r5c["accepted"]=="2") $statuscolor="orange";
            if($r5c["accepted"]=="3") $statuscolor="yellow";
            
            $empid=$r5c['employeeid'];
            $datatarget="$empid$stime1";
            $getData="getData$stime2";
            
            echo"<div class='tabs-container'> 
                <div class='panel-body'>
                    <center><h2>Edit Shift Time</h2></center>
                    <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='schedulecancel'><input type='hidden' name='id' value='".$r5c["id"]."'>
                        <input type='hidden' name='stime' value='".$r5c["stime"]."'>
                        <input type='hidden' name='etime' value='".$r5c["etime"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-12 col-md-12' style='padding-bottom:20px'><div class='form-group'>
                                    <label for='cancelReasons' class='form-label'>NDIS Calellation Reasons</label>
                                    <select class='form-control' id='cancelReasons' name='cancelreason' required>
                                        <option value=''>Select Reason for Cancellation</option>
                                        <option value='NSDH'>No show due to health reason (NSDH)</option>
                                        <option value='NSDF'>No show due to family issues (NSDF)</option>
                                        <option value='NSDT'>No show due to unavailability of transport (NSDT)</option>
                                        <option value='NSDO'>Other (NSDO)</option>
                                    </select><br>
                                </div></div>
                                <div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                    <label for='cancelTotalHours' class='form-label'>Add Hours for Worker</label>
                                    <input type='number' name='th1' class='form-control' id='cancelTotalHours' step='0.25' min='0.25' placeholder='e.g. 2.5' value='9' required>
                                </div></div>
                                <div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                                    <label for='cancelTotalHours2' class='form-label'>Add Hours for Invoicing</label>
                                    <input type='number' name='th2' class='form-control' id='cancelTotalHours2' step='0.25' min='0.25' placeholder='e.g. 2.5' value='9' required>
                                </div></div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='submit' class='btn btn-danger' onblur=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">Confirm Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>";
        } }
    }
?>