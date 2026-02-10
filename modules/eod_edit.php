<?php
    if($mtype=="ADMIN") {
        if(isset($_GET["editid"])){
            $rax = "select * from eod where id='".$_GET["editid"]."' and status='1' order by id desc limit 1";
            $rbx = $conn->query($rax);
            if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) {
                $eod_date=date("Y-m-d", $rabx["eod_date"]);
                // $incident_date=date("d-m-y", $rabx["incidentdate"]);
                echo"<form id='form' method='post' class='wizard-big' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='sheba' value='".$_GET["sheba"]."'><input type='hidden' name='url' value='eod_update'>
                    <input type='hidden' name='eodid' value='".$_GET["editid"]."'>
                    <input type='hidden' name='development' value='1'>
                    <input type='hidden' name='employeedata' value='".$_GET["employeedata"]."'>
                    <input type='hidden' name='clientdata' value='".$_GET["clientdata"]."'>
                    <input type='hidden' name='srcfdate' value='".$_GET["srcfdate"]."'>
                    <input type='hidden' name='srctdate' value='".$_GET["srctdate"]."'>
                    <h1>Edit EOD Id: ".$rabx["eod_date"]."".$_GET["editid"].".</h1>
                    <fieldset>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Date *</label><input name='eod_date' type='date' value='$eod_date' class='form-control required'>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Employee Name *</label><select class='form-control m-b required' name='eod_employee_name' required>";
                                        $s7 = "select * from uerp_user where id='".$rabx["employeeid"]."' order by id asc limit 1";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                        /*
                                        if($mtype=="ADMIN"){
                                            echo"<option value=''>Select Employee</option>";
                                            $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='EMPLOYEE' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        }
                                        */
                                    echo"</select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Phone # *</label><input name='eod_employee_phone' type='text' value='$phone' class='form-control required' readonly>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Email Address *</label><input name='eod_employee_email' type='text' value='$unbox' class='form-control required' readonly>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Client Name * </label><select class='form-control m-b required' name='clientid' required>";
                                        $s72 = "select * from uerp_user where id='".$rabx["clientid"]."' and status='1' order by id asc limit 1";
                                        $r72 = $conn->query($s72);
                                        if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                            echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                        } }
                                        if($rabx["employeeid"]!=0){
                                            echo"<option value=''>Select Client</option>";
                                            $s7 = "select * from project_team_allocation where employeeid='".$rabx["employeeid"]."' order by id asc";
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
                                        }
                                        
                                    echo"</select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Shift Status *</label><select class='form-control m-b required' name='shiftid'>";
                                    echo"<option value='".$rabx["shiftid"]."'>".$rabx["shiftid"]."</option>";
                                    $s7x = "select * from shift order by id asc limit 100";
                                    $r7x = $conn->query($s7x);
                                    if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                        echo"<option value='".$rs7x["shift_name"]."'>".$rs7x["shift_name"]."</option>";
                                    } }
                                    echo"</select>
                                </div>
                            </div><div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>Activity: Select the key activities you engaged in with the clients today:</label>
                                    <input type='text' name='activityid' value='".$rs7["activityid"]."' class='form-control'>
                                </div>
                            </div><div class='col-lg-6'>
                                <div class='form-group'>
                                    <label>If Other, Please Specify:</label>
                                    <input name='activity_other' type='text' value='".$rs7["activity_other"]."' class='form-control'>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Behave..</h1>
                            </div><div class='col-lg-12'>
                                <h2>Challenges in behavior today.</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Is there any notable changes in the behavior of the clients today?</label>
                                    <select class='form-control m-b required' name='eod_behavior' id='selectchallenge'>
                                        <option value='".$rabx["eod_behavior"]."'>".$rabx["eod_behavior"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'>
                                <div class='form-group'><label>Eating, Walking, Personal Care, Listening/Comprehending (If Required)</label>
                                <textarea name='eod_eat' class='form-control'>".$rabx["eod_eat"]."</textarea>
                                <input type=hidden name='eod_walk' value='".$rabx["eod_walk"]."'>
                                <input type=hidden name='eod_care' value='".$rabx["eod_care"]."'>
                                <input type=hidden name='eod_listen' value='".$rabx["eod_listen"]."'>
                                </div>
                            </div>";
                            
                            /*
                            <div class='col-lg-4'>
                                <div class='form-group'><label>Walking (If Required)</label><textarea name='eod_walk' class='form-control'>".$rabx["eod_walk"]."</textarea></div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Personal Care (If Required)</label><textarea name='eod_care' class='form-control'>".$rabx["eod_care"]."</textarea></div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Listening/Comprehending (If Required)</label><textarea name='eod_listen' class='form-control'>".$rabx["eod_listen"]."</textarea></div>
                            </div>
                            */
                            
                            echo"<div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>How challenging was their activity? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_behavior_scale'>
                                            <option value='".$rabx["eod_behavior_scale"]."'>".$rabx["eod_behavior_scale"]."</option>
                                            <option value='1'>1 - Less Challenges</option>
                                            <option value='2'>2 - </option>
                                            <option value='3'>3 - </option>
                                            <option value='4'>4 - </option>
                                            <option value='5'>5 - Average Challenges</option>
                                            <option value='6'>6 - </option>
                                            <option value='7'>7 - </option>
                                            <option value='8'>8 - </option>
                                            <option value='9'>9 - </option>
                                            <option value='10'>10 - Most Challenges</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Commu..</h1>
                            </div><div class='col-lg-12'>
                                <h2>Communication</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Did the client communicate effectively with other people and yourself today?</label>
                                    <select class='form-control m-b required' name='eod_communication'>
                                        <option value='".$rabx["eod_communication"]."'>".$rabx["eod_communication"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Please specify any communication challenges you faced: (if any)</label>
                                    <textarea name='eod_communication_note' class='form-control'>".$rabx["eod_communication_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>How effective was their communication? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_communication_scale'>
                                        <option value='".$rabx["eod_communication_scale"]."'>".$rabx["eod_communication_scale"]."</option>
                                        <option value='1'>1 - Less Effective</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Effective</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Effective</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Mobility</h1>
                            </div><div class='col-lg-12'>
                                <h2>Well-being (Mobility)</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Do you have any concerns about the mobility  of the participant?</label>
                                    <select class='form-control m-b required' name='eod_mobility'>
                                        <option value='".$rabx["eod_mobility"]."'>".$rabx["eod_mobility"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>If yes, please provide details and any actions taken:</label>
                                    <textarea name='eod_mobility_note' class='form-control'>".$rabx["eod_mobility_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>how effective was their movement? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_mobility_scale'>
                                        <option value='".$rabx["eod_mobility_scale"]."'>".$rabx["eod_mobility_scale"]."</option>
                                        <option value='1'>1 - Less Effective</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Effective</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Effective</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Social</h1>
                            </div><div class='col-lg-12'>
                                <h2>Socialize</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Please keep in mind that socializing also refers to the participants ability to engage and disengage in conversation respectfully. Are they able to maintain a conversation? are they able to direct and redirect their attention or are they easily distracted? do they follow common courtesy and use pleasantries like `excuse me` or `sorry to cut you off` etc.:</label>
                                    <textarea name='eod_social_note' class='form-control'>".$rabx["eod_social_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>How did the participant socialize today? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_socialize_scale'>
                                        <option value='".$rabx["eod_socialize_scale"]."'>".$rabx["eod_socialize_scale"]."</option>
                                        <option value='1'>1 - Less Socialize</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Socialize</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Socialize</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Learn</h1>
                            </div><div class='col-lg-12'>
                                <h2>Learning new things</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Were there any particular successes or positive moments? What did they enjoy participating in today? </label>
                                    <select class='form-control m-b required' name='eod_learn' id='selectchallenge'>
                                        <option value='".$rabx["eod_learn"]."'>".$rabx["eod_learn"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>If yes, please provide details:</label>
                                    <textarea name='eod_learn_note' class='form-control'>".$rabx["eod_learn_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>how much do they enjoy learning new activities? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_learn_scale'>
                                        <option value='".$rabx["eod_learn_scale"]."'>".$rabx["eod_learn_scale"]."</option>
                                        <option value='1'>1 - Less Enjoyed</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Enjoyed</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Enjoyed</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>notify</h1>
                            </div><div class='col-lg-12'>
                                <h2>Staff Notification</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Did they notify you before going to the Toilet, Backyard, Kitchen etc.?</label>
                                    <select class='form-control m-b required' name='eod_notification'>
                                        <option value='".$rabx["eod_notification"]."'>".$rabx["eod_notification"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>If yes, please provide details: (if required)</label>
                                    <textarea name='eod_notification_note' class='form-control'>".$rabx["eod_notification_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>how was the notification activities? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_notification_scale'>
                                        <option value='".$rabx["eod_notification_scale"]."'>".$rabx["eod_notification_scale"]."</option>
                                        <option value='1'>1 - Less Notification</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Notification</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Notification</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Engage</h1>
                            </div><div class='col-lg-12'>
                                <h2>Engagement</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>What are the key activities you engaged in with the clients today? Describe in key points </label>
                                    <textarea name='eod_engagement_note' class='form-control'>".$rabx["eod_engagement_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>how did they engage? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_engagement_scale'>
                                        <option value='".$rabx["eod_engagement_scale"]."'>".$rabx["eod_engagement_scale"]."</option>
                                        <option value='1'>1 - Less Engaged</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Engaged</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Engaged</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Manage</h1>
                            </div><div class='col-lg-12'>
                                <h2>Self Manage</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Was the participant capable of taking self care/management?</label>
                                    <select class='form-control m-b required' name='eod_manage'>
                                        <option value='".$rabx["eod_manage"]."'>".$rabx["eod_manage"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>If NO, please describe in key notes why?</label>
                                    <textarea name='eod_manage_note' class='form-control'>".$rabx["eod_manage_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>how did they self manage? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_manage_scale'>
                                        <option value='".$rabx["eod_manage_scale"]."'>".$rabx["eod_manage_scale"]."</option>
                                        <option value='1'>1 - Less Managed</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Managed</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Managed</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Risk</h1>
                            </div><div class='col-lg-12'>
                                <h2>Risk Event</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Were there any reportable incidents today?</label>
                                    <select class='form-control m-b required' name='eod_risk'>
                                        <option value='".$rabx["eod_risk"]."'>".$rabx["eod_risk"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>If YES, please briefly explain:</label>
                                    <textarea name='eod_risk_note' class='form-control'>".$rabx["eod_risk_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>how severe was the incident? (On a rating of 1 to 10).</label>
                                    <select class='form-control m-b required' name='eod_risk_scale'>
                                        <option value='".$rabx["eod_risk_scale"]."'>".$rabx["eod_risk_scale"]."</option>
                                        <option value='1'>1 - Less Severe</option>
                                        <option value='2'>2 - </option>
                                        <option value='3'>3 - </option>
                                        <option value='4'>4 - </option>
                                        <option value='5'>5 - Average Severe</option>
                                        <option value='6'>6 - </option>
                                        <option value='7'>7 - </option>
                                        <option value='8'>8 - </option>
                                        <option value='9'>9 - </option>
                                        <option value='10'>10 - Most Severe</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h1>Doc</h1>
                            </div><div class='col-lg-12'>
                                <h2>Documentation</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Were you able to complete all required documentation for the day?</label>
                                    <select class='form-control m-b required' name='eod_document'>
                                        <option value='".$rabx["eod_document"]."'>".$rabx["eod_document"]."</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                    </select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>If NO, please specify any challenges you faced in documentation:</label>
                                    <textarea name='eod_document_note' class='form-control'>".$rabx["eod_document_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Suggestions for improvement:</label>
                                    <label>Do you have any suggestions for improving the support provided or any process within the team?</label>
                                    <textarea name='eod_suggest_note' class='form-control'>".$rabx["eod_suggest_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-12'><hr>
                                <h2>Self-Reflection (Summary)</h2>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>How do you feel about your performance today?</label>
                                    <textarea name='eod_summary' class='form-control'>".$rabx["eod_summary"]."</textarea>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'><label>Suggestions for improvement:</label>
                                    <textarea name='eod_suggest_overall_note' class='form-control'>".$rabx["eod_suggest_overall_note"]."</textarea>
                                </div>
                            </div><div class='col-lg-12'><br><br>
                                <div class='form-group'>
                                    <a href='#' onclick='history.back()'>Back to EOD Report</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' data-style='expand-right'>Update</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>";
            } }
        }
    }
?>