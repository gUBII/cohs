<?php
    
    include '../authenticator.php';
    
    echo"<div class='data-table-rows slim' id='sample'>";
        $ra1 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id asc limit 1";
        $rb1 = $conn->query($ra1);
        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
            
            $ra1x = "select * from uerp_user where id='".$rab1["clientid"]."' and status='1' order by id asc limit 1";
            $rb1x = $conn->query($ra1x);
            if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                    
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='processor' value='updateprojectsupportplan'><input type='hidden' name='id' value='".$rab1["id"]."'>
                    <fieldset>
                        <div class='row'>
                            <div class='col-12'><h2 class='small-title'>Client Support Plan</h2></div>
                            <div class='col-12 col-md-4'><br><div class='form-group'>
                                <label>Client First Name</label><input type='text' name='username' class='form-control' value='".$rab1x["username"]."' readonly>
                            </div></div>
                            <div class='col-12 col-md-4'><br><div class='form-group'>
                                <label>Client Last Name</label><input type='text' name='username2' class='form-control' value='".$rab1x["username2"]."' readonly>
                            </div></div>
                            <div class='col-12 col-md-4'><br><div class='form-group'>
                                <label>Package Level</label><select class='form-control m-b' name='package_level'>
                                    <option '".$rab1["package_level"]."'>".$rab1["package_level"]."</option>
                                    <option '1'>Level 1</option><option '2'>Level 2</option>
                                    <option '3'>Level 3</option><option '4'>Level 4</option>
                                    <option '5'>Level 5</option><option '6'>Level 6</option>
                                    <option '7'>Level 7</option><option '8'>Level 8</option>
                                </select>
                            </div></div>
                            
                            <div class='col-12 col-md-6'><br><div class='form-group'>
                                <label>Client Home Address</label><input type='text' name='address' class='form-control' value='".$rab1x["address"]."' readonly>
                            </div></div>
                            <div class='col-12 col-md-6'><br><div class='form-group'>
                                <label>Venue</label><input type='text' name='address2' class='form-control' value='".$rab1["address2"]."'>
                            </div></div>
                            
                            <div class='col-12 col-md-4'><br><div class='form-group'>";
                                if($rab1["start_date"]>=100000) $start_date=date("Y-m-d",$rab1["start_date1"]);
                                else $start_date=0;
                                echo"<label>Date Plan Developed</label><input type='date' name='plan_start_date' class='form-control' value='$start_date'>
                            </div></div>
                            
                            <div class='col-12 col-md-4'><br><div class='form-group'>";
                                if($rab1["service_authorized_to_commerce"]>=100000) $service_authorized_to_commerce=date("Y-m-d",$rab1["service_authorized_to_commerce"]);
                                else $service_authorized_to_commerce=0;
                                echo"<label>Services Authorised to Commerce</label><input type='date' name='service_authorized_to_commerce' class='form-control' value='$service_authorized_to_commerce'>
                            </div></div>
                            <div class='col-12 col-md-4'><br><div class='form-group'>";
                                if($rab1["end_date"]>=100000) $plan_review_date=date("Y-m-d",$rab1["end_date1"]);
                                else $plan_review_date=0;
                                echo"<label>Support Plan Review Date</label><input type='date' name='plan_review_date' class='form-control' value='$plan_review_date'>
                            </div></div>
                            
                            <div class='col-12 col-md-12'><br><div class='form-group'>
                                <label>Summay/ Current Situation</label><textarea name='summary' class='form-control'>".$rab1["summary"]."</textarea>
                            </div></div>
                            <div class='col-12 col-md-12'><br><div class='form-group'>
                                <label>Goal 1</label><textarea name='goal_1' class='form-control'>".$rab1["goal_1"]."</textarea>
                            </div></div>
                            <div class='col-12 col-md-12'><br><div class='form-group'>
                                <label>Goal 2</label><textarea name='goal_2' class='form-control'>".$rab1["goal_2"]."</textarea>
                            </div></div>
                            <div class='col-12 col-md-12'><br><div class='form-group'>
                                <label>Goal 3</label><textarea name='goal_3' class='form-control'>".$rab1["goal_3"]."</textarea>
                            </div></div>
                        </div>
                    </fieldset>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button class='btn btn-primary' type='reset' >Reset</button> &nbsp;
                        <button class='btn btn-primary' type='submit'>Update</button>
                    </div>
                </form><br><br>";
            } }
        } }
    echo"</div>";


// ignore this section 
/*
    error_reporting(0);
    include("../authenticator.php");
    
    // if(isset($_COOKIE["client_id"])){
        echo"<div class='row'>
            <div class='col-12'><h2 class='small-title'>Client Support Plan</h2></div>";
            
            $s1 = "select * from leads where clientid='".$_COOKIE["client_id"]."' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            
                $manager_name=""; 
                $c1 = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $manager_name="".$c3["username"]." ".$c3["username1"].""; } }
                    
                $campaign_name=""; 
                $c11 = "select * from campaigns where id='".$rs1["campaignid"]."' order by id asc limit 1";
                $c22 = $conn->query($c11);
                if ($c22->num_rows > 0) { while($c33 = $c22->fetch_assoc()) { $campaign_name=$c33["campaign_name"]; } }
                        
                $package=$rs1["cpackage"];
                $startdate=date("d-m-Y",$rs1["start_date"]);
                $enddate=date("d-m-Y",$rs1["end_date"]);
                $lockeddate=date("d-m-Y",$rs1["locked_date"]);
                $budget_balance=$rs1["balanced"];
                $dob=date("d-m-Y",$rs1["cdob"]);
                echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                    <input type='hidden' name='processor' value='createlead'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Lead Name (Preferred) *</label><input name='lead_name' type='text' value='".$rs1["lead_name"]."' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Select Campaign *</label><select class='form-control m-b ' name='campaignid' required>
                                <option ".$rs1["campaignid"].">$campaign_name</option>";
                                if($designationy=="13") $c77 = "select * from campaigns where status='ON' order by campaign_name asc";
                                else $c77 = "select * from campaigns where employeeid='$userid' and status='ON' order by campaign_name asc";
                                $d77 = $conn->query($c77);
                                if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { echo"<option value='".$cd77["id"]."'>".$cd77["campaign_name"]."</option>"; } }
                            echo"</select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Title</label><select class='form-control m-b ' name='title' required>
                                <option ".$rs1["title"].">".$rs1["title"]."</option>
                                <option value='Mr.'>Mr.</option>
                                <option value='Mrs.'>Mrs.</option>
                                <option value='Miss'>Miss</option>
                                <option value='Mx'>Mx</option>
                                <option value='Madam'>Madam</option>
                                <option value='Sir'>Sir</option>
                                <option value='Lady'>Lady</option>
                                <option value='Doctor (Dr.)'>Dr.</option>
                                <option value='Professor (Prof.)'>Prof.</option>
                                <option value='Reverend (Rev.)'>Rev.</option>
                                <option value='Master'>Master</option>
                            </select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>First Name</label><input name='fname' type='text' value='".$rs1["name"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Sur Name</label><input name='surname' type='text' value='".$rs1["surname"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Preferred Name</label><input name='preferred_name' type='text' value='".$rs1["preferred_name"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Gender</label><select class='form-control m-b ' name='gender' required>
                                <option value='".$rs1["gender"]."'>".$rs1["gender"]."</option>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                                <option value='Other'>Other</option>
                            </select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Date of Birth</label><input name='cdob' type='date' value='$dob' style='height:30px' class='form-control' required></div></div>
                            
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Address</label><input name='caddress' type='text' value='".$rs1["address"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>City</label><input name='ccity' type='text' value='".$rs1["ccity"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>State</label><input name='cstate' type='text' value='".$rs1["cstate"]."' style='height:30px' class='form-control' required></div></div>
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Zip</label><input name='czip' type='text' value='".$rs1["czip"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Country</label><input name='ccountry' type='text' value='".$rs1["ccountry"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Email Address</label><input name='cemail' type='email' value='".$rs1["email"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Phone Number</label><input name='cphone' type='text' value='".$rs1["phone"]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Profile Photo</label><input id='image1' type='file' name='images[]' style='height:30px' class='form__field__img form-control'></div></div>
                            
                            <div class='col-md-9' style='margin-bottom:25px'><div class='form-group'><label>Billing Address</label>
                                <textarea name='billing_address' class='form-control'></textarea>
                            </div></div>
                            
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Client Story/Enquiry (Note)</label>
                                <textarea name='cdetail' class='form-control'></textarea>
                            </div></div> 
                            
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Important Notes for Staff</label>
                                <textarea name='note_for_staff' class='form-control'></textarea>
                            </div></div>
                            
                            <div class='col-md-4' style='margin-bottom:25px;font-size:12pt'>Representative Name<hr></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>First Name</label><input name='rname' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Sur Name</label><input name='rname2' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Phone</label><input name='rphone' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Email</label><input name='remail' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Type</label><select class='form-control m-b ' name='rtype' required>
                                <option value='".$rs1[""]."'>Select Type</option>
                                <option value='HCP'>HCP</option>
                                <option value='CHSP'>CHSP</option>
                            </select></div></div>
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Ref. # / URN / MAC</label><input name='referral_number' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Ref. Note</label><input name='ref_note' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Referrer</label><input name='referrer' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Accounting System Reference</label><input name='accounting_system_reference' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-32' style='margin-bottom:25px'><div class='form-group'><label>Accounting System Secondary Reference</label><input name='accounting_system_secondary_reference' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Billing Group</label><input name='billing_group' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default KM Charge</label><input name='default_km_charge' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default Travel Time</label><input name='default_travel_time' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>KMs From Office</label><input name='km_from_office' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            
                            <div class='col-md-4' style='margin-bottom:25px;font-size:12pt'>Additional Data<hr></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Country Of Birth</label><input name='birth_country' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Language Spoken at Home</label><input name='language' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Can Spoke English?</label><select class='form-control m-b ' name='english' required>
                                <option value='".$rs1[""]."'>Select</option>
                                <option value='YES'>YES</option>
                                <option value='NO'>NO</option>
                                <option value='AVERAGE'>AVERAGE</option>
                            </select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Languages Spoken (Other)</label><select class='form-control m-b ' name='language_other' required>
                                <option value='".$rs1[""]."'>Select</option>
                                <option value='English'>English</option>
                                <option value='Spanish'>Spanish</option>
                                <option value='French'>French</option>
                                <option value='German'>German</option>
                                <option value='Chinese'>Chinese</option>
                                <option value='Jananese'>Japanese</option>
                                <option value='Korean'>Korean</option>
                                <option value='Arabic'>Arabic</option>
                                <option value='Russian'>Russian</option>
                                <option value='Portuguese'>Portuguese</option>
                                <option value='Hindi'>Hindi</option>
                                <option value='Bengali'>Bengali</option>
                                <option value='Punjabi'>Punjabi</option>
                                <option value='Javanese'>Javanese</option>
                                <option value='Malaya'>Malay</option>
                                <option value='Swahili'>Swahili</option>
                                <option value='Vietnames'>Vietnamese</option>
                                <option value='Italian'>Italian</option>
                                <option value='Turkish'>Turkish</option>
                                <option value='Persian'>Persian</option>
                            </select></div></div>
                            
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Package Level</label><select class='form-control m-b ' name='cpackage' required>
                                <option value='".$rs1[""]."'>Select</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                                <option value='9'>9</option>
                                <option value='10'>10</option>
                            </select>
                            </div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Funding type</label><select class='form-control m-b ' name='funding_type' required>
                                <option value='".$rs1[""]."'>Select</option>
                                <option value='HCP'>HCP</option>
                                <option value='CHSP'>CHSP</option>
                                <option value='Private'>Private</option>
                            </select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Previous Provider</label><input name='previous_provider' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Medicare Import Ref.</label><input name='medicare_import_ref' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>NAPS Service ID</label><input name='naps_service_id' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>NDIS Number</label><input name='ndis_number' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>NDIS Price Zone</label><input name='ndis_price_zone' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Case Manager</label><input name='case_manager' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Scheduler</label><input name='scheduler' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Planning Region</label><input name='planning_region' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Allied Health</label><input name='allied_health' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Property Name</label><input name='property_name' type='text' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
    
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Geographic Region *</label><select class='form-control m-b ' name='geographic_region' required>
                                <option value='".$rs1[""]."'>Select</option>
                                <option value='AZZA'>AZZA</option>
                                <option value='COHS'>COHS</option>
                                <option value='Miscare'>Mishcare</option>
                                <option value='Nazcare'>Nazcare</option>
                                <option value='Unspecified'>Unspecified</option>
                            </select></div></div>
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default Package *</label><select class='form-control m-b ' name='default_package' required>
                                <option value='".$rs1[""]."'>Select Priority</option>
                                <option value='Admin'>Admin</option>
                                <option value='HCP L1'>HCP L1</option>
                                <option value='HCP L2'>HCP L2</option>
                                <option value='HCP L3'>HCP L3</option>
                                <option value='HCP L4'>HCP L4</option>
                                <option value='NDIS - NDIA Managed'>NDIS - NDIA Managed</option>
                                <option value='NDIS - Plan Managed'>NDIS - PLAN Managed</option>
                                <option value='NDIS - SELF Managed'>NDIS - SELF Managed</option>
                                <option value='PACE - NDIS Managed'>PACE - NDIA Managed</option>
                                <option value='PACDE - PLAN Managed'>PACE - PLAN Managed</option>
                            </select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' required>
                                <option value='".$rs1[""]."'>Select Priority</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                            </select></div></div>
                            
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Follow Up Date</label><input name='fdate' type='date' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Appointment Date</label><input name='adate' type='date' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Target Date</label><input name='tdate' type='date' value='".$rs1[""]."' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Status</label><select class='form-control m-b ' name='status' required>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option> 
                            </select></div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-4' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit'>Update</button>
                    </div>
                </form>";
            } }
        echo"</div>";
    // }
 */ 
?>