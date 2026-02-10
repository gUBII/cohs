<?php

    include("../authenticator.php");
    
    if($mtype=="ADMIN") {
        if(isset($_GET["incidentid"])){
            $rax = "select * from incident where id='".$_GET["incidentid"]."' order by id desc limit 1";
            $rbx = $conn->query($rax);
            if ($rbx->num_rows > 0) { while($rab1 = $rbx->fetch_assoc()) {
                
                if(strlen($rab1["date"])>=5) $post_date=date("Y-m-d", $rab1["date"]);
                else $post_date=date("Y-m-d",time());
                if(strlen($rab1["incidentidate"])>=5) $incident_date=date("Y-m-d", $rab1["incidentdate"]);
                else $incident_date=date("Y-m-d",time());
                if(strlen($rab1["dob1"])>=5) $dob1=date("Y-m-d", $rab1["dob1"]);
                else $dob1=date("Y-m-d",time());
                if(strlen($rab1["dob2"])>=5) $dob2=date("Y-m-d", $rab1["dob2"]);
                else $dob2=date("Y-m-d",time());
                
                echo"<div class='offcanvas-header'>
                    <h5 id='offcanvasTopLabel'>Incident Report (IR): ID-".$_GET["incidentid"]."</h5>
                    <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                </div>
                <div class='offcanvas-body'>
                    <div style='padding:20px' id='printArea'>
                        <form id='form' method='post' class='wizard-big' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <fieldset>
                                <input type='hidden' name='url' value='incident_update'>
                                <input type='hidden' name='incidentid' value='".$_GET["incidentid"]."'>
                                <input type=hidden name='employeedata' value='".$_GET["employeedata"]."'>
                                <input type=hidden name='clientdata' value='".$_GET["clientdata"]."'>
                                <input type=hidden name='srcfdate' value='".$_GET["srcfdate"]."'>
                                <input type=hidden name='srctdate' value='".$_GET["srctdate"]."'>
                                <div class='row'>
                                    <div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Posting Date *</label><input name='postdate' type='date' value='$post_date' class='form-control required'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Employee Name *</label><select class='form-control m-b' name='employeeid' required>";
                                            $s7 = "select * from uerp_user where mtype='USER' and status='1' order by username asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                if($rab1["employeeid"]==$rs7["id"]) echo"<option value='".$rs7["id"]."' selected>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                else echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        echo"</select></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Perticipent Name *</label><select class='form-control m-b required' name='clientid'>";
                                                $s72 = "select * from uerp_user where mtype='CLIENT' and status='1' order by username asc";
                                                $r72 = $conn->query($s72);
                                                if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                    if($rab1["clientid"]==$rs72["id"]) echo"<option value='".$rs72["id"]."' selected>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                    else echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                } }
                                            echo"</select>
                                        </div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Status of Invoiled Person *</label><select class='form-control m-b required ' name='involved'>
                                                <option value='".$rab1["involved"]."'>".$rab1["involved"]."</option>
                                                <option value='Staff'>Staff</option><option value='Participant'>Participant</option>
                                                <option value='Visitor'>Visitor</option><option value='Volunteer'>Volunteer</option>
                                                <option value='Contractor'>Contractor</option>
                                            </select>
                                        </div>
                                    </div><div class='col-12'>&nbsp;
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Incident Location:</label><input name='location' type='text' value='".$rab1["location"]."' class='form-control required '></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Latitude:</label><input name='latitudek' type='text' value='".$rab1["latitudek"]."' class='form-control ' readonly></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Longitude:</label><input name='longitudek' type='text' value='".$rab1["longitudek"]."' class='form-control ' readonly></div>
                                    </div><div class='col-12'>&nbsp;
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Details of Witness 1 (If any)</label><input name='witness1' type='text' value='".$rab1["witness1"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Date of Birth</label><input name='dob1' type='date' value='$dob1' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Address</label><input name='address1' type='text' value='".$rab1["address1"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Phone</label><input name='phone1' type='text' value='".$rab1["phone1"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Detail of Witness 2 (If any)</label><input name='witness2' type='text' value='".$rab1["witness2"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Date of Birth</label><input name='dob2' type='date' value='$dob2' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Address</label><input name='address2' type='text' value='".$rab1["address2"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Phone</label><input name='phone2' type='text' value='".$rab1["phone2"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Date of Incident *</label><input name='incidentdate' type='date' value='$incident_date' class='form-control required '></div>
                                    </div><div class='col-12 col-md-3'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Approximate time of incident *</label><input name='hourminute' type='time' value='".$rab1["hourminute"]."' placeholder='HH:MM' class='form-control required '></div>
                                    </div><div class='col-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>What Happened? *</label><textarea name='what_happened' class='form-control required'>".$rab1["what_happened"]."</textarea></div>
                                    </div><div class='col-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>What task was being performed at the time of the incident? *</label><textarea name='what_performed' class='form-control required'>".$rab1["what_performed"]."</textarea></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Nature of Incident/cause of injury *</label><textarea name='injury' class='form-control required'>".$rab1["injury"]."</textarea></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Specify the Area of Injury *</label><textarea name='area' class='form-control required'>".$rab1["area"]."</textarea></div>
                                    </div><div class='col-12 col-md-4'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Treatment and Referral</LABEL>
                                            <select class='form-control m-b required ' name='treatment'>
                                                <option value='".$rab1["treatment"]."'>".$rab1["treatment"]."</option>
                                                <option value='YES'>YES</option><option value='NO'>NO</option><option value='Not Applicable'>Not Applicable</option>
                                            </select>
                                        </div>
                                    </div><div class='col-12 col-md-4'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Other (If Any)</label><input name='treatment_other' type='text' value='' placeholder='Please - type another option here' class='form-control'></div>
                                    </div><div class='col-12 col-md-4'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Treatment and Referral</LABEL>
                                            <select class='form-control m-b required ' name='referral'>
                                                <option value='".$rab1["referral"]."'>".$rab1["referral"]."</option>
                                                <option value='YES'>YES</option><option value='NO'>NO</option>
                                            </select>
                                        </div>
                                    </div><div class='col-12 col-md-4'>
                                        <div class='form-group' style='margin-bottom:25px'><label>If YES, Please specify Referred to:</label><input name='referred' type='text' value='".$rab1["referred"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-4'>
                                        <div class='form-group' style='margin-bottom:25px'><label>First Aid Attendant:</label><input name='firstaid' type='text' value='".$rab1["firstaid"]."' class='form-control required'></div>
                                    </div><div class='col-12 col-md-4'>";
                                        $sessionid=rand(1000000000,9999999999);
                                        echo"<div class='form-group' style='margin-bottom:25px'><label>File Upload</label>
                                            <input type='file' name='images[]' class='form__field__img form-control'><input type='hidden' name='sessionid' value='$sessionid'>
                                        </div>
                                    </div><div class='col-12 col-md-4'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Status</LABEL>
                                            <select class='form-control m-b required ' name='status'>
                                                <option value='".$rab1["status"]."'>".$rab1["status"]."</option>
                                                <option value='1'>ON</option><option value='0'>OFF</option>
                                            </select>
                                        </div>
                                    </div><div class='col-12 col-md-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Suggestions for improvement:</label><textarea name='suggestion' class='form-control'>".$rab1["suggestion"]."</textarea></div>
                                    </div><div class='col-12 col-md-4'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <button class='ladda-button btn btn-primary recordadded'  data-style='expand-right'>Update</button>
                                        </div></div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>";
            } }
        }
    }
    