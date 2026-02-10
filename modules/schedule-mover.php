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
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                $clientimage=$r1z["image"];
                $clientname="".$r1z["username"]." ".$r1z["username2"]."";
            } }
            
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
            
            // $dx-$mx-$yx-$ex-$rdt
            echo"<table style='width:90%' onmouseout=\"shiftdataV2('schedule-track.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"><tr>
                <td style='padding:0px;text-align:center;font-size:8pt;' colspan=10>
                    <div class='btn' style='color:white;background-color:".$r5c["color"].";width:100%;text-align:left'>
                    <i class='fa fa-clock-o' style='font-size:14pt'></i> <span style='font-size:12pt'>$stimeA1 - $etimeA1</span> | <span style='font-size:12pt'>$clientname</span>
                    </div><br><br>
                </td></tr>
                <tr>
                    <td style='padding:0px;text-align:center'>
                        <form name='rosterform' method='post' action='../email_roster.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type=hidden name='processor' value='shiftallocation'><input type=hidden name='semail' value='$semail'>
                            <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                            <input type='hidden' name='stime1' value='$sdateB1'><input type='hidden' name='etime1' value='$edateB1'>
                            <input type='hidden' name='stime2' value='$stimeB1'><input type='hidden' name='etime2' value='$etimeB1'>
                            <input type='submit' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm emailsent' value='Send Email'>
                        </form>
                    </td>
                    <td style='padding:0px;text-align:center'>
                        <a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Accept</a>
                    </td>
                    <td style='padding:0px;text-align:center'>
                        <a class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' href='dataprocessor.php?processor=shiftclocked&shiftid=".$r5c["id"]."&stime=".$r5c["stime"]."&etime=".$r5c["etime"]."&status=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Force Clocked</a>
                    </td>
                    <td style='padding:0px;text-align:center'>
                        <a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=4' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\">Suspend</a>
                    </td>
                </tr>
            </table><hr>
            
            <div class='tabs-container'>
                
                    
                        <div class='panel-body'>
                            <center><h2>Edit Shift Time</h2></center>
                            <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='scheduleedit'><input type='hidden' name='id' value='".$r5c["id"]."'>
                                <input type='hidden' name='stime1' value='$sdateB1'><input type='hidden' name='etime1' value='$edateB1'>
                                <div class='modal-body'>
                                    <div class='row'>
                            			<div class='col-md-12' style='padding-bottom:20px'><center>
                                		    <img src='img/no_image.png' style='border:1px solid #ccc;border-radius:5px;height:60px' title=''>
                                            <Br>$clientname<br>
                                            Dated on 
                                            <br>
                                            Select Category:<br>
                                            <select class='form-control' name='category1' required style='width:100%;margin-bottom:10px'>
                                                    <option value='".$r5c['category']."'>".$r5c['category']."</option>
                                                    <option value='Suppoert Worker'>Support Worker</option>
                                                    <option value='Subcontractor'>Subcontractor</option>
                                                    <option value='Support Coordinator'>Support Coordinator</option>
                                                    <option value='Plan Management'>Plan Management</option>
                                                    <option value='Allied Health'>Allied Health</option>
                                                    <option value='Admin'>Admin</option>
                                            </select>
                                            Select Item Number:<br>
                                            <select class='form-control' name='itemnumber1' required style='width:100%;margin-bottom:10px'>
                                                    <option value=''>".$r5c['itemnumber']."</option>";
                                                    $sb2x = "select * from ndis_line_numbers where national>'0' and status='1' order by item_number asc";
                                                    $rb2x = $conn_main->query($sb2x);
                                                    if ($rb2x->num_rows > 0) { while($rsb2x = $rb2x->fetch_assoc()) {
                                                        if($r5c["itemnumber"]==$rsb2x["id"]) echo"<option selected value='".$rsb2x["id"]."'>".$rsb2x["item_number"]." | ".$rsb2x["item_name"]." (National: $".$rsb2x["national"].")</option>";
                                                        else echo"<option value='".$rsb2x["id"]."'>".$rsb2x["item_number"]." | ".$rsb2x["item_name"]." (National: $".$rsb2x["national"].")</option>";
                                                    } }
                                            echo"</select>
                            		    </div>
                            			
                            			
                            			<input type='hidden' name='employeeid' value='".$r5c['employeeid']."'>
                                        <input type='hidden' name='clientid' value='".$r5c['clientid']."'>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>Clock In *</label><input type='time' id='datepicker' name='stime' class='form-control' value='$stimeB1'>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>Clock Out *</label><input type='time' name='etime' class='form-control' value='$etimeB1'>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>Template Color *</label><input type='color' name='color' class='form-control' style='height:35px' value='".$r5c["color"]."'>
                                        </div></div>
                                        <div class='col-md-6' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>Repeating? *</label>
                            			    <select class='form-control' name='repeating1' style='marign-bottom:10px'>
                                                <option value='Weekly'>Weekly</option>
                                                <option value='Fortnightly'>Fortnightly</option>
                                                <option value='Monthly'>Monthly</option>
                                            </select>
                                        </div></div>
                                        <div class='col-md-12' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>ClockIN Address *</label><input type='text' name='address' class='form-control' style='height:35px' value='".$r5c["address"]."'>
                                        </div></div>
                                        <div class='col-md-12' style='padding-bottom:20px'><div class='form-group'>
                            			    <label>Admin Note *</label><input type='text' name='admin_note' class='form-control' style='height:35px' value='".$r5c["admin_note"]."'>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'><center>
                                            <input type='submit' class='btn btn-primary recordupdated' value='Update' onblur=\"shiftdataV2('schedule-track.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
                                        </center></div></div>
                                    </div>
                                </div>
                            </form><hr>";

                            // <div class='panel-body' onmouseout='".$_COOKIE["getData2"]."(".$_COOKIE["empid2"].",".$_COOKIE["datatarget2"].")'>
                            
                            echo"<center><h2>Move shift to other Location</h2></center>
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
                                            <input type='submit' class='btn btn-primary' value='Move' onblur=\"shiftdataV2('schedule-track.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"
                                            onmouseover='document.datamover2.getdata3.value=document.datamover2.getdata2.value+document.datamover2.empid2.value; document.datamover2.submit()'>
                                        </center></div></div>
                                    </div>
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