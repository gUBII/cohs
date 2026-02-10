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
                        <input type='hidden' name='processor' value='scheduleedit'><input type='hidden' name='id' value='".$r5c["id"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                    			<div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                    			    <label>Clock In *</label>
                    			    <input type='datetime-local' class='form-control' id='event-start' name='start' value='".$r5c['stime']."' onchange=\"document.getElementById('event-stime').value=this.value\">
                    			    <input type='hidden' id='event-stime' name='stime' class='form-control' value='".$r5c['stime']."'>
                                </div></div>
                                <div class='col-12 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                    			    <label>Clock Out *</label>
                    			    <input type='datetime-local' class='form-control' id='event-end' name='end' value='".$r5c['etime']."'  onchange=\"document.getElementById('event-etime').value=this.value\">
                    			    <input type='hidden' id='event-etime' name='etime' class='form-control' value='".$r5c['etime']."'>
                                </div></div>
                                <div class='col-12' style='padding-bottom:20px'><div class='form-group'>
                    			    <label>Item Name & Number </label>
                    			    <select class='form-control' name='itemnumber' required>";
                                        $a4 = "select * from project_budget_allocation where id='".$r5c['projectid']."' and status='1' order by id asc";
                                        $a5 = $conn->query($a4);
                                        if ($a5->num_rows > 0) { while($a6 = $a5->fetch_assoc()) {
                                            $a7 = "select * from ndis_line_numbers where id='".$a6["itemnumber"]."' order by id asc limit 1";
                                            $a8 = $conn->query($a7);
                                            if ($a8->num_rows > 0) { while($a9 = $a8->fetch_assoc()) {
                                                $itemid=$a9["id"];
                                                $itemnumber=$a9["item_number"];
                                                $itemname=$a9["item_name"];
                                                $national=$a9["national"];
                                            } }
                                            echo"<option value='$itemid'>$itemnumber | $itemname</option>";
                                        } }
                                        echo"<option value='' disabled><hr></option>";
                                        echo"<option value='' disabled><strong>More Item Number</strong></option>";
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
                                        $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE id='".$r5c['clientid']."' and mtype = 'CLIENT' AND status = '1' ORDER BY username ASC limit 1");
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
                                    <select class='form-control' id='event-employeeid' name='employeeid' style='margin-bottom:10px'>";
                                        $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE id='".$r5c['employeeid']."' and mtype = 'USER' AND status = '1' ORDER BY username ASC");
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
                                        
                                        echo"<option value='' disabled><hr></option>";
                                        
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
                                    <select class='form-control' id='event-repeating' name='repeating' style='margin-bottom:10px'>
                                        <option value='".$r5c['repeating']."'>".$r5c['repeating']."</option>
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
                        		    <label>Template Color *</label><input type='color' name='color' class='form-control' style='height:35px' value='".$r5c["color"]."'>
                                </div></div>
                                        
                                <div class='col-6 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                        		    <label>ClockIN Address *</label><input type='text' name='address' class='form-control' style='height:35px' value='".$r5c["address"]."'>
                                </div></div>
                                
                                <div class='col-6 col-md-6' style='padding-bottom:20px'><div class='form-group'>
                            	    <label>Admin Note *</label><input type='text' name='admin_note' class='form-control' style='height:35px' value='".$r5c["admin_note"]."'>
                                </div></div>
                                
                                <div class='col-12 col-md-12'><div class='form-group'><center>
                                    <table style='width:100%' onmouseout=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"><tr>
                                        <td style='padding:5px;text-align:center'>
                                            <a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Accept</a>
                                        </td>
                                        <td style='padding:5px;text-align:center'>
                                            <a class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' href='dataprocessor.php?processor=shiftclocked&shiftid=".$r5c["id"]."&stime=".$r5c["stime"]."&etime=".$r5c["etime"]."&status=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Force Clocked</a>
                                        </td>
                                        <td style='padding:5px;text-align:center'>
                                            <a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=4' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Suspend</a>
                                        </td>
                                        <td style='padding:5px;text-align:center'>
                                            <input type='submit' class='btn btn-primary btn-sm recordupdated' value='Update' onblur=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
                                        </td>
                                    </tr></table>
                                </center></div></div>
                                
                            </div>
                        </div>
                    </form><hr>";
                    
                    // $dx-$mx-$yx-$ex-$rdt
                    echo"<table style='width:100%' onmouseout=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"><tr>
                        <tr>
                            <td style='padding:0px;text-align:left'>
                                <form name='rosterform' method='post' action='../email_roster.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type=hidden name='processor' value='shiftallocation'><input type=hidden name='semail' value='$semail'>
                                    <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                                    <input type='hidden' name='stime1' value='$sdateB1'><input type='hidden' name='etime1' value='$edateB1'>
                                    <input type='hidden' name='stime2' value='$stimeB1'><input type='hidden' name='etime2' value='$etimeB1'>
                                    <input type='submit' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm emailsent' value='Send Email'>
                                </form>
                            </td>
                            <td style='padding:5px;text-align:right'>
                                <a href='#' data-bs-toggle='modal' data-bs-target='#schedulecancel1' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-dismiss='modal' 
                                    onclick=\"shiftdataV2('schedule-cancel-jobs.php?t=1&smid=".$r5c["id"]."&days=$d1&months=$mm1&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'schedulemover22')\" draggable='true' ondragstart='drag(event)'>
                                    Cancel
                                </a>
                            </td>
                        </tr>
                    </table>";
                    
                    // <div class='panel-body' onmouseout='".$_COOKIE["getData2"]."(".$_COOKIE["empid2"].",".$_COOKIE["datatarget2"].")'>
                            
                    /* echo"<center><h2>Move shift to other Location</h2></center>
                    <form class='m-t' name='datamover' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='schedulemover'><input type='hidden' name='id' value='".$r5c["id"]."'>
                                <input type='hidden' name='stime' value='".$r5c["stime"]."'><input type='hidden' name='etime' value='".$r5c["etime"]."'>
                                <input type='hidden' name='projectid' value='".$r5c["projectid"]."'><input type='hidden' name='clientid' value='".$r5c["clientid"]."'>
                                <input type='hidden' name='color' value='".$r5c["color"]."'>
                                <div class='modal-body'>
                                    <div class='row'>
                            		    <div class='col-md-12' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>Allocating User Name *</label>
                            				<select class='form-control m-b ' name='employeeid' required onchange='document.datamover2.empid2.value=this.value'>
                                                <option value='".$r5c['employeeid']."'>$employeename</option>";
                                                $s7 = "select * from uerp_user where mtype='USER' order by username asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                            echo"</select>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>DATE FROM *</label>
                            				<input type='date' id='datepicker' name='sdate' class='form-control' value='$stime1' readonly>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>TO DATE *</label>
                            				<input type='date' id='datepicker' name='dateto' class='form-control' value='' required onchange='document.datamover2.datatarget2.value=document.datamover2.empid2.value+document.datamover.dateto.value'>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'><center>
                                            <input type='submit' class='btn btn-primary' value='Move' onblur=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"
                                            onmouseover='document.datamover2.getdata3.value=document.datamover2.getdata2.value+document.datamover2.empid2.value; document.datamover2.submit()'>
                                        </center></div></div>
                                    </div>
                                </div>
                    </form> */
                    echo"<form name='datamover2' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='schedulemover2'>
                        <input type='hidden' name='empid2' value='$empid'><input type='hidden' name='datatarget2'>
                        <input type='hidden' name='getdata3' value='getData'><input type='hidden' name='getdata2' value='getData01'>
                    </form>
                </div>
            </div>";
        } }
    }
?>