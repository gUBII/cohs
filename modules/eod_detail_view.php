<?php
    
    include("../authenticator.php");
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasTopLabel'>End Of Day (EOD) Report: ID-".$_GET["postid"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>";
        
        $rax = "select * from eod where id='".$_GET["postid"]."' and status='1' order by id desc limit 1";
        $rbx = $conn->query($rax);
        if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) {
    
            $eod_date=date("d-m-y H:m", time());
            // $eod_date=date("d-m-y H:m", $rabx["eod_date"]);
            // $incident_date=date("d-m-y", $rabx["incidentdate"]);
            $ra2 = "select * from uerp_user where id='".$rabx["clientid"]."' order by id desc limit 1";
            $rb2 = $conn->query($ra2);
            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                $clientname1= $rab2["username"];
                $clientname2= $rab2["username2"];
            } }
            $ra2 = "select * from uerp_user where id='".$rabx["employeeid"]."' order by id desc limit 1";
            $rb2 = $conn->query($ra2);
            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                $employeename1= $rab2["username"];
                $employeename2= $rab2["username2"];
                $employeephone= $rab2["phone"];
                $employeeemail= $rab2["email"];
            } }
            $ra2 = "select * from shift where id='".$rabx["shiftid"]."' order by id desc limit 1";
            $rb2 = $conn->query($ra2);
            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                $shiftname= $rab2["shift_name"];
            } }
        
        
            echo"<div style='padding:20px' id='printArea'>
                <div class='row'>
                    <div class='col-lg-6'>
                        <div class='form-group'><label>Date:</label>&nbsp;&nbsp;<b>$eod_date</b></div>
                        <div class='form-group'><label>Client Name:</label>&nbsp;&nbsp;<b>$clientname1 $clientname2</b></div>
                        <div class='form-group'><label>Shift Status:</label>&nbsp;&nbsp;<b>".$rabx["shiftid"]."</b></div>
                    </div>
                    <div class='col-lg-6'>
                        <div class='form-group'><label>Support Worker Name:</label>&nbsp;&nbsp;<b>$employeename1 $employeename2</b></div>
                        <div class='form-group'><label>Phone Number:</label>&nbsp;&nbsp;<b>$employeephone</b></div>
                        <div class='form-group'><label>Email Address:</label>&nbsp;&nbsp;<b>$employeeemail</b></div>
                    </div>
                    
                    <div class='col-lg-12'><hr>
                        <div class='form-group'><label>The key activities engaged in with the clients today:</label>&nbsp;&nbsp;<b>".$rabx["activityid"]."</b><br>";
                            if(strlen($rabx["activity_other"])>=3) echo"Other Activity: &nbsp;&nbsp;".$rabx["activity_other"]."";
                        echo"</div>
                    </div>
                </div>
                <hr><br>
                
                <h2>Challenges in behavior today:</h2><br>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'>
                            <label></b>Notable changes in the behavior of the clients today: </label>&nbsp;&nbsp;<b>".$rabx["eod_behavior"]."</b>";
                            if($rabx["eod_behavior"]=="YES") echo"<br><br><label></b>And challenges encounter during the shift $eod_date:</label><br>";
                            if(strlen($rabx["eod_eat"]>=3)) echo"<div class='form-group'><label>Eating:</label>&nbsp;&nbsp;".$rabx["eod_eat"]."</div>";
                            if(strlen($rabx["eod_walk"]>=3)) echo"<div class='form-group'><label>Walking:</label>&nbsp;&nbsp;".$rabx["eod_walk"]."</div>";
                            if(strlen($rabx["eod_care"]>=3)) echo"<div class='form-group'><label>Personal Care:</label>&nbsp;&nbsp;<b>".$rabx["eod_care"]."</div>";
                            if(strlen($rabx["eod_listen"]>=3)) echo"<div class='form-group'><label>Listening/Comprehending:</label>&nbsp;&nbsp;<b>".$rabx["eod_listen"]."</div>";
                            if($rabx["eod_behavior"]=="YES"){
                                echo"<br><div class='form-group'><label></b>How challenging was their activity?:</label>&nbsp;&nbsp;
                                    <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_behavior_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_behavior_scale"]."0%'>".$rabx["eod_behavior_scale"]."</div></div>
                                </div><br>";
                            }
                        echo"</div>
                    </div>
                </div>
                <hr><br>
                
                <h2>Communication</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Client communicate effectively with other people and support worker today? :</label>&nbsp;&nbsp;<b>".$rabx["eod_communication"]."</b></div>";
                        if($rabx["eod_communication"]=="YES") echo"<div class='form-group'><label>Any communication challenges faced :</label>&nbsp;&nbsp;".$rabx["eod_communication_note"]."</div>";
                        if($rabx["eod_communication"]=="YES"){
                            echo"<div class='form-group'><label></b>How effective was their communication?:</label>&nbsp;&nbsp;
                                <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_communication_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_communication_scale"]."0%'>".$rabx["eod_communication_scale"]."</div></div>
                            </div><br>";
                        }
                    echo"</div>
                </div>
                <hr><br>
                
                <h2>Well-being (Mobility)</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Any concerns about the mobility  of the participant?</b></label>&nbsp;&nbsp;<b>".$rabx["eod_mobility"]."</b></div>";
                        if($rabx["eod_mobility"]=="YES") echo"<div class='form-group'><label>Details and any actions taken:</b></label>&nbsp;&nbsp;".$rabx["eod_mobility_note"]."</div>";
                        if($rabx["eod_mobility"]=="YES"){
                            echo"<div class='form-group'><label></b>How effective was their movement?:</label>&nbsp;&nbsp;
                            <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_mobility_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_mobility_scale"]."0%'>".$rabx["eod_mobility_scale"]."</div></div>
                            </div><br>";
                        }
                    echo"</div>
                </div>
                <hr><br>
                
                <h2>Socialize</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Socializing (ability to engage and disengage in conversation respectfully):</label>&nbsp;&nbsp;".$rabx["eod_social_note"]."</div>
                        <div class='form-group'><label></b>How did the participant socialize today?:</label>&nbsp;&nbsp;
                            <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_socialize_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_socialize_scale"]."0%'>".$rabx["eod_socialize_scale"]."</div></div>
                        </div><br>
                    </div>
                </div>
                <hr><br>
                
                <h2>Learning new things</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Particular successes or positive moments:</label>&nbsp;&nbsp;<b>".$rabx["eod_learn"]."</b></div>";
                        if($rabx["eod_learn"]=="YES") echo"<div class='form-group'><label>Details:</label>&nbsp;&nbsp;".$rabx["eod_learn_note"]."</div>";
                        if($rabx["eod_learn"]=="YES"){
                            echo"<div class='form-group'><label></b>How much do they enjoy learning new activities?:</label>&nbsp;&nbsp;
                                <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_learn_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_learn_scale"]."0%'>".$rabx["eod_learn_scale"]."</div></div>
                            </div><br>";
                        }
                    echo"</div>
                </div>
                <hr><br>
                
                <h2>Staff Notification</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Did they notify before going to the Toilet, Backyard, Kitchen etc.?</label>&nbsp;&nbsp;<b>".$rabx["eod_notification"]."</b></div>";
                        if($rabx["eod_notification"]=="YES") echo"<div class='form-group'><label>Details:</label>&nbsp;&nbsp;".$rabx["eod_notification_note"]."</div>";
                        echo"<div class='form-group'><label></b>How was the notification activities?:</label>&nbsp;&nbsp;";
                        // <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_notification_Scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_notification_Scale"]."0%'>".$rabx["eod_notification_Scale"]."</div></div>
                        echo"</div><br>
                    </div>
                </div>
                <hr><br>
                
                <h2>Engagement</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>The key activities staff engaged in with the clients today? Describe in key points:</label>&nbsp;&nbsp;".$rabx["eod_engagement_note"]."</div>
                            <div class='form-group'><label></b>How did they engage?:</label>&nbsp;&nbsp;
                            <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_engagement_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_engagement_scale"]."0%'>".$rabx["eod_engagement_scale"]."</div></div>
                        </div><br>
                    </div>
                </div>
                <hr><br>
                
                <h2>Self Manage</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Was the participant capable of taking self care/management?</b></label>&nbsp;&nbsp;<b>".$rabx["eod_manage"]."</b></div>";
                        if($rabx["eod_manage"]=="NO") echo"<div class='form-group'><label>Reason: </b></label>&nbsp;&nbsp;".$rabx["eod_manage_note"]."</div>";
                        echo"<div class='form-group'><label></b>How did they self manage?:</label>&nbsp;&nbsp;
                            <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_manage_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_manage_scale"]."0%'>".$rabx["eod_manage_scale"]."</div></div>
                        </div><br>
                    </div>
                </div>
                <hr><br>
                
                <h2>Risk Event</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Were there any reportable incidents today?</label>&nbsp;&nbsp;<b>".$rabx["eod_risk"]."</b></div>";
                        if($rabx["eod_risk"]=="YES") echo"<div class='form-group'><label>Detail:</label>&nbsp;&nbsp;".$rabx["eod_risk_note"]."</div>";
                        echo"<div class='form-group'><label></b>How severe was the incident?:</label>&nbsp;&nbsp;
                            <div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='".$rabx["eod_risk_scale"]."' aria-valuemin='0' aria-valuemax='10' style='width:".$rabx["eod_risk_scale"]."0%'>".$rabx["eod_risk_scale"]."</div></div>
                        </div><br>
                    </div>
                </div>
                <hr><br>
                
                <h2>Documentation</h2>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Were support worker able to complete all required documentation for the day?</label>&nbsp;&nbsp;<b>".$rabx["eod_document"]."</b></div>";
                        if($rabx["eod_document"]=="NO") echo"<div class='form-group'><label>Challenges support worker faced in documentation:</label>&nbsp;&nbsp;".$rabx["eod_document_note"]."</div>";
                            echo"<div class='form-group'><label>How do support worker feel about his/her performance today?</b></label>&nbsp;&nbsp;".$rabx["eod_summary"]."</div>
                    </div>
                </div>
            </div>";
        } }
        
        echo"<center><button type='button' class='btn btn-primary' onclick=\"printDiv('printArea')\">Print Report</button><br><br><br><br><br><br></center>
    </div>";
?>
