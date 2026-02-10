<style>
    #hidden_div {
         display: none;
    }
    #hidden_div2 {
         display: none;
    }
</style>
<?php 
    $sheba="eod";
    $cid=7;
    $title="Add New Client/Participant";
    $utype="EOD";
    $designation=6;

    echo"<div class='row'>
        <div class='col-8 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>EOD Reporting</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-4 col-md-7 d-flex align-items-start justify-content-end'>
            <a href='index.php?url=eod_document.php' style='margin-right:10px'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Quick EOD</span></button></a>
            <a href='index.php?url=eod.php' style='margin-right:10px'><button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Detailed EOD</span></button></a>
            <a href='index.php?url=eod-reports.php' style='margin-right:10px'><button class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>View Reports</span></button></a>";
            if($mtype=="ADMIN"){
                if(isset($_COOKIE["projectidx"])){
                    echo"<a href='index.php?url=projects.php&pstat=1'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Project Profile</span></button></a>";
                }
            }
        echo"</div>                  
    </div>    
    <div>";
    if($mtype!="CLIENT"){

        echo"<section class='scroll-section' id='basic'>
            <h2 class='small-title'>New EOD Form</h2>
            <div class='card mb-5 wizard' id='wizardBasic'>
                <div class='card-header border-0 pb-0'>
                    <ul class='nav nav-tabs justify-content-center' role='tablist'>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicOneA' role='tab'><div class='mb-1 title d-none d-sm-block'>Begin</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicOneB' role='tab'><div class='mb-1 title d-none d-sm-block'>Participant</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicTwo' role='tab'><div class='mb-1 title d-none d-sm-block'>Behave</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicThree' role='tab'><div class='mb-1 title d-none d-sm-block'>Communication</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicFour' role='tab'><div class='mb-1 title d-none d-sm-block'>Mobility</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicFive' role='tab'><div class='mb-1 title d-none d-sm-block'>Social</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicSix' role='tab'><div class='mb-1 title d-none d-sm-block'>Learn</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicSeven' role='tab'><div class='mb-1 title d-none d-sm-block'>Notify</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicEight' role='tab'><div class='mb-1 title d-none d-sm-block'>Engage</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicNine' role='tab'><div class='mb-1 title d-none d-sm-block'>Manage</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicTen' role='tab'><div class='mb-1 title d-none d-sm-block'>Risk</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicEleven' role='tab'><div class='mb-1 title d-none d-sm-block'>Doc</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicTwelve' role='tab'><div class='mb-1 title d-none d-sm-block'>Submit</div></a>
                        </li>

                        <li class='nav-item d-none' role='presentation'><a class='nav-link text-center' href='#basicLast' role='tab'></a></li>
                    </ul>
                </div>
                <form id='form' method='post' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='url' value='eod.php'><input type='hidden' name='id' value='5200'>
                    <div class='card-body'>
                        <div class='tab-content'>";

                            // 1. Begin 
                            echo"<div class='tab-pane fade' id='basicOneA' role='tabpanel'>
                                <h5 class='card-title'>Primary Informaton</h5>
                                <p class='card-text text-alternate mb-4'>Please fill the eod form with participant`s detail.</p>
                                <div class='row'>
                                    <div class='col-lg-6' style='margin-bottom:25px'>
                                        <label class='mb-3 top-label'><input name='eod_date' type='date' value='$current_date' class='form-control required'><span>Date *</span></label>";
                                        $designation=2;
                                        if($designation=="6"){
                                            echo"<label class='mb-3 top-label'>
                                                <select class='form-control m-b required' name='eod_employee_name'>
                                                    <option value=''>Select Allocated Employee</option>";
                                                    $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                echo"</select>
                                                <span>Employee Name *</span>
                                            </label>";
                                        }else{
                                            echo"<label class='mb-3 top-label'>
                                                <select class='form-control m-b required' name='eod_employee_name'>
                                                    <option value='".$_COOKIE["userid"]."'>$username</option>
                                                </select><span>Employee Name *</span>
                                            </label>";
                                        }
                                    echo"</div>
                                    <div class='col-lg-6' style='margin-bottom:25px'>
                                        <label class='mb-3 top-label'><input name='eod_employee_phone' type='text' value='$phonex' class='form-control required' readonly><span>Phone *</span></label>
                                        <label class='mb-3 top-label'><input name='eod_employee_email' type='text' value='$unbox' class='form-control required' readonly><span>Email Address *</span></label>
                                    </div>                                    
                                </div>
                            </div>";

                            // 1. EOD
                            echo"<div class='tab-pane fade' id='basicOneB' role='tabpanel'>
                                <h5 class='card-title'>Primary Informaton</h5>
                                <p class='card-text text-alternate mb-4'>Please fill the eod form with participant`s detail.</p>
                                <div class='row'>
                                    <div class='col-lg-6' style='margin-bottom:25px'>
                                        <label class='mb-3 top-label'>
                                            <select class='form-control m-b required' name='clientid'>
                                                <option value=''>Select Allocated Client</option>";
                                                $s7 = "select * from project_team_allocation where employeeid='$userid' order by id asc";
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
                                            echo"</select>
                                            <span>Client Name *</span>
                                        </label>                                    
                                        <label class='mb-3 top-label'>
                                            <select class='form-control m-b required' name='shiftid'>
                                                <option value=''>Select Shift</option>";
                                                $s7 = "select * from shift order by id asc limit 100";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["shift_name"]."'>".$rs7["shift_name"]."</option>";
                                                } }
                                            echo"</select>
                                            <span>Shift Status *</span>
                                        </label>
                                    </div>
                                    <div class='col-lg-6' style='margin-bottom:25px'>
                                        <span>Activity: Select the key activities you engaged in with the clients today:</span><br><br>";
                                        $s7 = "select * from activity order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<label class='mb-3 top-label'>
                                                <input type='checkbox' name='activityid[]' value='".$rs7["activity_name"]."' style=''>
                                                <i></i>&nbsp;&nbsp;&nbsp;".$rs7["activity_name"]."
                                            </label>";
                                        } }
                                        echo"<label class='mb-3 top-label' onclick='myFunction()'>
                                            <input type='checkbox' name='Other' id='activity_checked' value='Other' onclick='myFunction()'> <i></i>&nbsp;&nbsp;&nbsp;Other
                                        </label>
                                        <label class='mb-3 top-label'><input name='activity_other' type='text' value='' class='form-control'>
                                            <span>If Other, Please Specify:</span>
                                        </label>
                                    </div>
                                </div>
                            </div>";

                            // 2. Behave
                            echo"<div class='tab-pane fade' id='basicTwo' role='tabpanel'>
                                <h5 class='card-title'>Behavior</h5>
                                <p class='card-text text-alternate mb-4'>Challenges in behavior today.</p>
                                <div class='row'>
                                    <div class='col-lg-12' style='margin-bottom:25px'>
                                        <span>Is there any notable changes in the behavior of the clients today?</span>
                                        <select class='form-control m-b required' name='eod_behavior' id='selectchallenge' onchange=\"showDiv('hidden_div', this)\">
                                            <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                        </select>
                                        <label>And what challenges did you encounter during your shift today?</label>
                                    </div>
                                    <div class='col-lg-12' style='margin-bottom:25px'>
                                        <span>Eating, Walking, Personal Care, Listening/Comprehending (If Required)</span>
                                        <textarea name='eod_eat' class='form-control' style='height:100px;'></textarea>
                                        <input type=hidden name='eod_walk' value='&nbsp;'>
                                        <input type=hidden name='eod_care' value='&nbsp;'>
                                        <input type=hidden name='eod_listen' value='&nbsp;'>
                                    </div>
                                    <div class='col-lg-12' style='margin-bottom:25px'>
                                        <label>
                                            <select class='form-control m-b required' name='eod_behavior_scale'>
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
                                            <span>How challenging was their activity? (On a rating of 1 to 10).</span>
                                        </label>
                                    </div>
                                </div>
                            </div>";

                            // 3. Communication
                            echo"<div class='tab-pane fade' id='basicThree' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Communication</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>Did the client communicate effectively with other people and yourself today?</label>
                                                    <select class='form-control m-b required' name='eod_communication'>
                                                        <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                    </select>
                                                    <label>Communication is how they communicate, do they use verbal, sign, or body language. Is their speech clear and understandable? If they communicate through text, is it legible? Was their speech slurred or hard to understand?</label>
                                                </div>
                                                <div class='form-group' style='margin-bottom:25px'>
                                                    <label>Please specify any communication challenges you faced: (if any)</label>
                                                    <textarea name='eod_communication_note' class='form-control'></textarea>
                                                </div>
                                                <div class='form-group' style='margin-bottom:25px'><label>How effective was their communication? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_communication_scale'>
                                                        <option value=''>Select Rating</option>
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
                                                    <input type=hidden name='eod_communication_team_note' value='0'>
                                                </div>
                                            </div>
                                        </div>
                            </div>";

                            // 4. Mobility
                            echo"<div class='tab-pane fade' id='basicFour' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Well-being (Mobility)</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>Do you have any concerns about the mobility  of the participant?</label>
                                                    <select class='form-control m-b required' name='eod_mobility'>
                                                        <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                    </select>
                                                    <label>A mobility impairment is a disability that affects movement ranging from gross motor skills, such as walking, to fine motor movement, involving manipulation of objects by hand.</label>
                                                </div>
                                                <div class='form-group' style='margin-bottom:25px'>
                                                    <label>If yes, please provide details and any actions taken:</label>
                                                    <textarea name='eod_mobility_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>how effective was their movement? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_mobility_scale'>
                                                        <option value=''>Select Rating</option>
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
                                            </div>
                                        </div>
                            </div>";

                            // 5. Social
                            echo"<div class='tab-pane fade' id='basicFive' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Socialize</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'>
                                                    <label>Please keep in mind that socializing also refers to the participants ability to engage and disengage in conversation respectfully. Are they able to maintain a conversation? are they able to direct and redirect their attention or are they easily distracted? do they follow common courtesy and use pleasantries like `excuse me` or `sorry to cut you off` etc.:</label>
                                                    <textarea name='eod_social_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>How did the participant socialize today? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_socialize_scale'>
                                                        <option value=''>Select Rating</option>
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
                                            </div>
                                        </div>
                            </div>";

                            // 6. Learn
                            echo"<div class='tab-pane fade' id='basicSix' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Learning new things</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>Were there any particular successes or positive moments? What did they enjoy participating in today? </label>
                                                    <select class='form-control m-b required' name='eod_learn' id='selectchallenge' onchange=\"showDiv2('hidden_div2', this)\">
                                                        <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                    </select>
                                                </div>
                                                <div class='form-group' style='margin-bottom:25px'>
                                                    <label>If yes, please provide details:</label>
                                                    <textarea name='eod_learn_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px' id='hidden_div2'><label>how much do they enjoy learning new activities? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_learn_scale'>
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
                                            </div>
                                        </div>
                            </div>";

                            // 7. Notify
                            echo"<div class='tab-pane fade' id='basicSeven' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Staff Notification</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>Did they notify you before going to the Toilet, Backyard, Kitchen etc.?</label>
                                                    <select class='form-control m-b required' name='eod_notification'>
                                                        <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                    </select>
                                                </div>
                                                <div class='form-group' style='margin-bottom:25px'>
                                                    <label>If yes, please provide details: (if required)</label>
                                                    <textarea name='eod_notification_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>how was the notification activities? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_notification_scale'>
                                                        <option value=''>Select Rating</option>
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
                                            </div>
                                        </div>
                            </div>";

                            // 8. Engage
                            echo"<div class='tab-pane fade' id='basicEight' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Engagement</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>What are the key activities you engaged in with the clients today? Describe in key points </label>
                                                    <textarea name='eod_engagement_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>how did they engage? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_engagement_scale'>
                                                        <option value=''>Select Rating</option>
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
                                            </div>
                                        </div>
                            </div>";

                            // 9. Manage
                            echo"<div class='tab-pane fade' id='basicNine' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Self Manage</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>Was the participant capable of taking self care/management?</label>
                                                    <select class='form-control m-b required' name='eod_manage'>
                                                        <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>If NO, please describe in key notes why?</label>
                                                    <textarea name='eod_manage_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>how did they self manage? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_manage_scale'>
                                                        <option value=''>Select Rating</option>
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
                                            </div>
                                        </div>
                            </div>";

                            // 10. Risks
                            echo"<div class='tab-pane fade' id='basicTen' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Risk Event</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>Were there any reportable incidents today?</label>
                                                    <select class='form-control m-b required' name='eod_risk'>
                                                        <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>If YES, please briefly explain:</label>
                                                    <textarea name='eod_risk_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>how severe was the incident? (On a rating of 1 to 10).</label>
                                                    <select class='form-control m-b required' name='eod_risk_scale'>
                                                        <option value=''>Select Rating</option>
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
                                            </div>
                                        </div>
                            </div>";

                            // 11. Document
                            echo"<div class='tab-pane fade' id='basicEleven' role='tabpanel'>
                                <h5 class='card-title'></h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Documentation</h2>
                                        <div class='row'>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>Were you able to complete all required documentation for the day?</label>
                                                    <select class='form-control m-b required' name='eod_document'>
                                                        <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'><label>If NO, please specify any challenges you faced in documentation:</label>
                                                    <textarea name='eod_document_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                            <div class='col-lg-12' style='margin-bottom:25px'>
                                                <div class='form-group' style='margin-bottom:25px'>
                                                    <label>Suggestions for improvement:</label>
                                                    <label>Do you have any suggestions for improving the support provided or any process within the team?</label>
                                                    <textarea name='eod_suggest_note' class='form-control'></textarea>
                                                </div>
                                            </div>
                                        </div>
                            </div>";

                            // 12. Submit
                            echo"<div class='tab-pane fade' id='basicTwelve' role='tabpanel'>
                                <h5 class='card-title'>Final Step</h5><p class='card-text text-alternate mb-4'></p>
                                <h2>Self-Reflection (Summary)</h2>
                                <div class='row'>
                                    <div class='col-lg-12' style='margin-bottom:25px'>
                                        <div class='form-group' style='margin-bottom:25px'><label>How do you feel about your performance today?</label>
                                            <textarea name='eod_summary' class='form-control'></textarea>
                                        </div>
                                    </div>
                                    <div class='col-lg-12' style='margin-bottom:25px'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Suggestions for improvement:</label>
                                            <textarea name='eod_suggest_overall_note' class='form-control'></textarea>
                                        </div>
                                    </div>
                                    <div class='col-lg-12' style='margin-bottom:25px'><div class='form-group' style='margin-bottom:25px'>
                                        <button class='ladda-button btn btn-primary recordadded' data-style='expand-right'>Submit</button>
                                    </div></div>
                                </div>
                            </div>";
                            
                            // Last
                            /*
                            echo"<div class='tab-pane fade' id='basicLast' role='tabpanel'>
                                <div class='text-center mt-5'>
                                    <h5 class='card-title'>Thank You!</h5>
                                    <p class='card-text text-alternate mb-4'>Your registration completed successfully!</p>
                                    <button class='btn btn-icon btn-icon-start btn-primary btn-reset' type='button'>
                                        <i data-acorn-icon='rotate-left'></i><span>Reset</span>
                                    </button>
                                </div>
                            </div>";
                            */

                        echo"</div>
                    </div>
                    <div class='card-footer text-center border-0 pt-1' style='margin-top:200px' >
                        <button class='btn btn-icon btn-icon-start btn-outline-primary btn-prev' type='button'><i data-acorn-icon='chevron-left'></i><span>Back</span></button>
                        <button class='btn btn-icon btn-icon-end btn-outline-primary btn-next' type='button'><span>Next</span><i data-acorn-icon='chevron-right'></i></button>
                    </div>
                </form>    
            </div>
        </section>";
    }
    echo"</div>"; ?>
    
    
    <script>
        function myFunction() {
            var checkBox = document.getElementById("activity_checked");
            var text = document.getElementById("activity_others");
            if (checkBox.checked == true) text.style.display = "block";
            else text.style.display = "none";
        }
        
        function showDiv(divId, element) {
            document.getElementById(divId).style.display = element.value == 'YES' ? 'block' : 'none';
        }
        
        function showDiv2(divId, element) {
            document.getElementById(divId).style.display = element.value == 'YES' ? 'block' : 'none';
        }
        
    </script>
    
    