<?php

    include("../authenticator.php");
    
    if($mtype=="ADMIN") {
        if(isset($_GET["incidentid"])){
            $rax = "select * from incident where id='".$_GET["incidentid"]."' order by id desc limit 1";
            $rbx = $conn->query($rax);
            if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) {
                
                $post_date=date("d-m-y H:m", $rab1["date"]);
                $incident_date=date("d-m-y", $rab1["incidentdate"]);
                
                echo"<div class='offcanvas-header'>
                    <h5 id='offcanvasTopLabel'>Incident Report (IR): ID-".$_GET["incidentid"]."</h5>
                    <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                </div>
                <div class='offcanvas-body'>
                    <div style='padding:20px' id='printArea'>
                        <form id='form' method='post' class='wizard-big' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <fieldset>
                                <input type='hidden' name='smsbd' value='$smsbd'>
                                <input type='hidden' name='kroyee' value='incident_update'>
                                <input type='hidden' name='incidentid' value='".$_GET["incidentid"]."'>
                            
                                <div class='row'>
                                    <div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Posting Date *</label><input name='date' type='date' value='$post_date' class='form-control required'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Employee Name *</label><select class='form-control m-b' name='employeeid' required>";
                                            $s7 = "select * from uerp_user where mtype='USER' and status='1' order by username asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                if($rab1["employeeid"]==$rs7["id"]) echo"<option value='".$rs7["id"]."' selected>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                else echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        echo"</select></div>
                                    </div><div class='col-12 col-md-6'>
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
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Status of Invoiled Person *</label><select class='form-control m-b required ' name='involved'>
                                                <option value='".$rab1["involved"]."'>".$rab1["involved"]."</option>
                                                <option value='Staff'>Staff</option><option value='Participant'>Participant</option>
                                                <option value='Visitor'>Visitor</option><option value='Volunteer'>Volunteer</option>
                                                <option value='Contractor'>Contractor</option>
                                            </select>
                                        </div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Incident Location:</label><input name='location' type='text' value='".$rab1["location"]."' class='form-control required '></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Latitude:</label><input name='latitudek' type='text' value='".$rab1["latitudek"]."' class='form-control ' readonly></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Longitude:</label><input name='longitudek' type='text' value='".$rab1["longitudek"]."' class='form-control ' readonly></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Details of Witness 1 (If any)</label><input name='witness1' type='text' value='".$rab1["witness1"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>D.O.B</label><input name='dob1' type='text' value='' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Address</label><input name='address1' type='text' value='".$rab1["address1"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Phone</label><input name='phone1' type='text' value='".$rab1["phone1"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Detail of Witness 2 (If any)</label><input name='witness2' type='text' value='".$rab1["witness2"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>D.O.B</label><input name='dob2' type='text' value='".$rab1["dob2"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Address</label><input name='address2' type='text' value='".$rab1["address2"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Phone</label><input name='phone2' type='text' value='".$rab1["phone2"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Date of Incident *</label><input name='incidentdate' type='date' value='$incident_date' class='form-control required '></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Approximate time of incident *</label><input name='hourminute' type='time' value='".$rab1["hourminute"]."' placeholder='HH:MM' class='form-control required '></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>What Happened? *</label><textarea name='what_happened' class='form-control required'>".$rab1["what_happened"]."</textarea></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>What task was being performed at the time of the incident? *</label><textarea name='what_performed' class='form-control required'>".$rab1["what_performed"]."</textarea></div>
                                    </div><div class='col-12 col-md-6'>";
                                        
                                        $s7 = "select * from injury order by id asc limit 1000";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<div class='form-group' style='margin-bottom:25px'>
                                                <div class='i-checks'><label> <table><tr>
                                                    <td valign=middle style='padding-right:10px'><input type='checkbox' name='injury[]' value='".$rs7["injury"]."' style='height:20px;width:20px'></td>
                                                    <td valign=middle> <i></i>".$rs7["injury"]."</td>
                                                </tr></table></label></div>
                                            </div>";
                                        } }
                                    echo"</div><div class='col-12 col-md-12'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Other (If Any)</label><input name='injury_other' type='text' value='' placeholder='Please - type another option here' class='form-control'>
                                        </div>
                                    </div><div class='col-12 col-md-6'>";
                                        
                                        $s7 = "select * from injury_area order by id asc limit 1000";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<div class='form-group' style='margin-bottom:25px'>
                                                <div class='i-checks'><label> <table><tr>
                                                    <td valign=middle style='padding-right:10px'><input type='checkbox' name='injury_area[]' value='".$rs7["injury_area"]."' style='height:20px;width:20px'></td>
                                                    <td valign=middle> <i></i>".$rs7["injury_area"]."</td>
                                                </tr></table></label></div>
                                            </div>";
                                        } }
                                    echo"</div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Other (If Any)</label><input name='injury_area_other' type='text' value='' placeholder='Please - type another option here' class='form-control'>
                                        </div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='No' id='optionsRadios2' name='treatment'  style='height:20px;width:20px'></td><td>&nbsp;&nbsp;NO</td></tr></table></label></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='No' id='optionsRadios2' name='treatment' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;YES</td></tr></table></label></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='No' id='optionsRadios2' name='treatment' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;Not Applicable</td></tr></table></label></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Other (If Any)</label><input name='treatment_other' type='text' value='' placeholder='Please - type another option here' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='NO' id='optionsRadios2' name='referral' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;NO</td></tr></table></label></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='YES' id='optionsRadios2' name='referral' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;YES</td></tr></table></label></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>If YES, Please specify Referred to:</label><input name='referred' type='text' value='".$rab1["referred"]."' class='form-control'></div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>First Aid Attendant:</label><input name='firstaid' type='text' value='".$rab1["firstaid"]."' class='form-control required'></div>
                                    </div><div class='col-12 col-md-6'>";
                                        
                                        $sessionid=rand(1000000000,9999999999);
                                        echo"<div class='form-group' style='margin-bottom:25px'><label>File Upload</label>
                                            <input type='file' name='images[]' multiple class='form__field__img form-control'><input type='hidden' name='sessionid' value='$sessionid'>
                                        </div>
                                    </div><div class='col-12 col-md-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Suggestions for improvement:</label><textarea name='suggestion' class='form-control'>".$rab1["suggestion"]."</textarea></div>
                                    </div><div class='col-12 col-md-6'>
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
    