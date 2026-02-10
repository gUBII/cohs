<?php
    error_reporting(0);
    include('include.php');
    
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
            $etime1=substr($r5c['etime'],0,10);
            
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
            
            $empid=$r5c['clientid'];
            $datatarget="$empid$stime1";
            $getData="getData$stime2";
            
            echo"<br><table style='width:100%'><tr>
                <td style='padding:0px;text-align:center;font-size:8pt;' colspan=10>
                    <div class='btn' style='color:white;background-color:".$r5c["color"].";width:100%;text-align:left'>
                    <i class='fa fa-clock-o' style='font-size:14pt'></i> <span style='font-size:12pt'>$stimeA1 - $etimeA1</span> | <span style='font-size:12pt'>$clientname</span>
                    </div><br><br>
                </td></tr>
                <tr>
                    <td style='padding:0px;text-align:center'>
                        <form name='rosterform' method='post' action='email_roster.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type=hidden name='processor' value='shiftallocation'><input type=hidden name='semail' value='$semail'>
                            <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                            <input type='hidden' name='stime1' value='$sdateB1'><input type='hidden' name='etime1' value='$edateB1'>
                            <input type='hidden' name='stime2' value='$stimeB1'><input type='hidden' name='etime2' value='$etimeB1'>
                            <input type='submit' class='btn btn-warning emailsent' value='Send Email'>
                        </form>
                    </td>
                    <td style='padding:0px;text-align:center'>
                        <a class='btn btn-success' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Accept</a>
                    </td>
                    <td style='padding:0px;text-align:center'>
                        <a class='btn btn-info' href='dataprocessor.php?processor=shiftclocked&shiftid=".$r5c["id"]."&stime=".$r5c["stime"]."&etime=".$r5c["etime"]."&status=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Force Clocked</a>
                    </td>
                    <td style='padding:0px;text-align:center'>
                        <a class='btn btn-danger' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=4' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Suspend</a>
                    </td>
                    <td style='padding:0px;text-align:center'>
                        <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button>
                    </td>
                </tr>
            </table><hr>
            
            <div class='tabs-container'>
                <ul class='nav nav-tabs' role='tablist'>
                    <li><a class='nav-link active' data-toggle='tab' href='#tab-100'>Edit Shift</a></li>
                    <li><a class='nav-link' data-toggle='tab' href='#tab-200'>Move Shift</a></li>
                </ul>
                <div class='tab-content'>
                    <div role='tabpanel' id='tab-100' class='tab-pane active'>
                        <div class='panel-body'>
                            <strong>Edit Shift Time</strong>
                            <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='scheduleedit'><input type='hidden' name='id' value='".$r5c["id"]."'>
                                <input type='hidden' name='stime1' value='$sdateB1'><input type='hidden' name='etime1' value='$edateB1'>
                                <div class='modal-body'>
                                    <div class='row'>
                            		    <div class='col-md-6'><div class='form-group'>
                            			    <label>Support Worker *</label>
                            				<select class='form-control m-b ' name='employeeid' required>
                                                <option value='".$r5c['employeeid']."'>$employeename</option>
                                            </select>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Participant *</label>
                            				<select class='form-control m-b ' name='employeeid' required>
                                                <option value='".$r5c['clientid']."'>$clientname</option>
                                            </select>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Clock In *</label><input type='time' id='datepicker' name='stime' class='form-control' value='$stimeB1'>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Clock Out *</label><input type='time' name='etime' class='form-control' value='$etimeB1'>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Template Color *</label><input type='color' name='color' class='form-control' style='height:35px' value='".$r5c["color"]."'>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'>
                            			    <label>ClockIN Address *</label><input type='text' name='address' class='form-control' style='height:35px' value='".$r5c["address"]."'>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'>
                            			    <label>Admin Note *</label>
                            			    <textarea id='summernote' name='admin_note' class='form-control'>".$r5c["admin_note"]."</textarea>
                                        </div></div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <input type='submit' class='btn btn-primary recordupdated' value='Update' onmouseout=\"$getData('$empid', '$datatarget')\">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div role='tabpanel' id='tab-200' class='tab-pane'>
                        <div class='panel-body' onmouseout='".$_COOKIE["getData2"]."(".$_COOKIE["empid2"].",".$_COOKIE["datatarget2"].")'>
                            <strong>Move shift to other Location</strong>
                            <form class='m-t' name='datamover' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='schedulemover'><input type='hidden' name='id' value='".$r5c["id"]."'>
                                <input type='hidden' name='stime' value='".$r5c["stime"]."'><input type='hidden' name='etime' value='".$r5c["etime"]."'>
                                <input type='hidden' name='projectid' value='".$r5c["projectid"]."'><input type='hidden' name='clientid' value='".$r5c["clientid"]."'>
                                <input type='hidden' name='color' value='".$r5c["color"]."'>
                                <div class='modal-body'>
                                    <div class='row'>
                            		    <div class='col-md-12'><div class='form-group'>
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
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>DATE FROM *</label>
                            				<input type='date' id='datepicker' name='sdate' class='form-control' value='$stime1' readonly>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>TO DATE *</label>
                            				<input type='date' id='datepicker' name='dateto' class='form-control' value='' required onchange='document.datamover2.datatarget2.value=document.datamover2.empid2.value+document.datamover.dateto.value'>
                                        </div></div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-white' data-dismiss='modal' onmouseover='".$_COOKIE["getData22"]."(".$_COOKIE["empid22"].",".$_COOKIE["datatarget22"].")'>Close</button>
                                    <input type='submit' class='btn btn-primary' value='Move' onmouseout=\"$getData('$empid', '$datatarget')\" 
                                        onmouseover='document.datamover2.getdata3.value=document.datamover2.getdata2.value+document.datamover2.empid2.value; document.datamover2.submit()'>
                                </div>
                            </form>
                            <form name='datamover2' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='schedulemover2'>
                                <input type='hidden' name='empid2' value='$empid'><input type='hidden' name='datatarget2'>
                                <input type='hidden' name='getdata3' value='getData'><input type='hidden' name='getdata2' value='getData01'>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>";
        } }
    }
?>