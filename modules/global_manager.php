<?php
    
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    $cid=$_GET["cid"];
    $sheba=$_GET["sheba"];
    
    error_reporting(0);
    include("../authenticator.php");

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>";
        
        if($_GET["sourceid"]=="Contract"){
            $sessionid = rand(1234567890,9876543210);
            echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                <input type='hidden' name='url' value='contracts.php'><input type='hidden' name='id' value='5205'>
                <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'><input type='hidden' name='processor' value='contractforms'>
                <fieldset>
                    <div class='row'>
                        <div class='col-lg-12'>
                            <div class='form-group'><label>Document Upload Date *</label><input name='date1' type='date' value='$current_date' class='form-control required'><br></div>
                        </div>
                        <div class='col-lg-12'>
                            <div class='form-group'>
                                <label>Client Name *</label><select class='form-control m-b required' name='clientid'>
                                    <option value='0'>Client Name</option>";
                                    $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                    } }
                                echo"</select>
                            </div>
                            <br>
                        </div>
                        <div class='col-lg-12'>
                            <div class='form-group'><label>Document Title *</label><input name='title' type='text' value='' class='form-control required'><br></div>
                        </div>
                        
                        <div class='col-lg-12'>
                            <div class='form-group'><label>Document Title *</label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,' required><br></div>
                        </div>
                        
                        <div class='col-lg-12'><div class='form-group'><label>&nbsp; </label><Br>
                            <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Upload Document'>
                        </div></div>
                    </div>
                    <hr>
                </fieldset>
                
            </form>";
        }
        
        if($_GET["sourceid"]=="Campaign"){
            
            if(isset($_GET["dataid"]) && $_GET["dataid"]!=0){
                
                $c1 = "select * from campaigns where id='".$_GET["dataid"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) {
                    echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                        <input type='hidden' name='processor' value='editcampaign'><input type='hidden' name='id' value='".$c3["id"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Campaign Name *</label><input name='name' type='text' value='".$c3["campaign_name"]."' class='form-control' required></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Manager/Co-Ordinator *</label><select class='form-control m-b ' name='employeeid' required>";
                                    $s777 = "select * from uerp_user where id='".$c3["employeeid"]."' and status='1' order by id asc limit 1";
                                    $r777 = $conn->query($s777);
                                    if ($r777->num_rows > 0) { while($rs777 = $r777->fetch_assoc()) {
                                        $dz="";
                                        $s0 = "select * from designation where id='".$rs777["designation"]."' order by id asc limit 1";
                                        $s00 = $conn->query($s0);
                                        if ($s00->num_rows > 0) { while($s000 = $s00->fetch_assoc()) { $dz=$s000["designation"]; } }
                                        echo"<option value='".$rs777["id"]."'>".$rs777["username"]." ".$rs777["username2"]." [ $dz ]</option>";
                                    } }
                                    
                                    if($mtype=="ADMIN") $s77 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                    else $s77 = "select * from uerp_user where id='$userid' and status='1' order by id asc";
                                    $r77 = $conn->query($s77);
                                    if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                        $dz="";
                                        $s0 = "select * from designation where id='".$rs77["designation"]."' order by id asc limit 1";
                                        $s00 = $conn->query($s0);
                                        if ($s00->num_rows > 0) { while($s000 = $s00->fetch_assoc()) { $dz=$s000["designation"]; } }
                                        echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]." [ $dz ]</option>";
                                    } }
                                echo"</select></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Plan</label><textarea name='plan' class='form-control'>".$c3["plan"]."</textarea></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Possibility</label><textarea name='possibility' class='form-control'>".$c3["possibility"]."</textarea></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Opportunity</label><textarea name='opportunity' class='form-control'>".$c3["opportunity"]."</textarea></div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Color</label><input name='pcolor' type='color' value='".$c3["color"]."' style='height:30px' class='form-control' required></div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' required>
                                    <option value='".$c3["priority"]."'>".$c3["priority"]."</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                                </select></div></div>
                            </div>
                        </div>
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                            // $cid - $sheba - ".$_GET["utype"]." - campaigns - ".$_GET["url"]." - ".$_GET["id"]."
                            if(isset($_GET["pointer"])){
                                echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('campaigns_data2.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Update ".$_GET["sourceid"]."</button>";
                            }else{
                                echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('campaigns_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Update ".$_GET["sourceid"]."</button>";
                            }
                        echo"</div>
                            </div>
                        </div>
                    </form>";
                } }
            }else{
                echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                    <input type='hidden' name='processor' value='createcampaign'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Campaign Name *</label><input name='name' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Manager/Co-Ordinator *</label><select class='form-control m-b ' name='employeeid' required>
                                <option value=''>Select Manager</option>";
                                if($mtype=="ADMIN") $s77 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                else $s77 = "select * from uerp_user where id='$userid' and status='1' order by id asc";
                                $r77 = $conn->query($s77);
                                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                    $dz="";
                                    $s0 = "select * from designation where id='".$rs77["designation"]."' order by id asc limit 1";
                                    $s00 = $conn->query($s0);
                                    if ($s00->num_rows > 0) { while($s000 = $s00->fetch_assoc()) { $dz=$s000["designation"]; } }
                                    echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]." [ $dz ]</option>"; } }
                            echo"</select></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Plan</label><textarea name='plan' class='form-control'></textarea></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Possibility</label><textarea name='possibility' class='form-control'></textarea></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Opportunity</label><textarea name='opportunity' class='form-control'></textarea></div></div>
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Color</label><input name='pcolor' type='color' value='#CCCCCC' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' required>
                                <option value=''>Select Priority</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                            </select></div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        // $cid - $sheba - ".$_GET["utype"]." - campaigns - ".$_GET["url"]." - ".$_GET["id"]."
                        if(isset($_GET["pointer"])){
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('campaigns_data2.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Create ".$_GET["sourceid"]."</button>";
                        }else{
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('campaigns_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Create ".$_GET["sourceid"]."</button>";    
                        }
                        
                    echo"</div>
                    </div>
                    </div>
                </form>";
            }
        }
        
        if($_GET["sourceid"]=="Lead"){
            echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >";
                if($_GET["logid"]==0){
                    echo"<input type='hidden' name='processor' value='createlead'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Lead Name (Preferred) *</label><input name='lead_name' type='text' value='' class='form-control' ></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Select Campaign *</label><select class='form-control m-b ' name='campaignid' >";
                                if($designationy=="13") $c77 = "select * from campaigns where status='ON' order by campaign_name asc";
                                else $c77 = "select * from campaigns where employeeid='$userid' and status='ON' order by campaign_name asc";
                                $d77 = $conn->query($c77);
                                if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { echo"<option value='".$cd77["id"]."'>".$cd77["campaign_name"]."</option>"; } }
                            echo"</select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>First Name</label><input name='fname' type='text' value='' style='height:30px' class='form-control' required></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Sur Name</label><input name='surname' type='text' value='' style='height:30px' class='form-control' required></div></div>";
                            // <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Preferred Name</label><input name='preferred_name' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            echo"<div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Title</label><select class='form-control m-b ' name='title' >
                                <option value=''>Select Title</option>
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
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Gender</label><select class='form-control m-b ' name='gender' required>
                                <option value=''>Select Gender</option>
                                <option value='Male'>Male</option>
                                <option value='Female'>Female</option>
                                <option value='Other'>Other</option>
                            </select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Date of Birth</label><input name='cdob' type='date' value='$cdate' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Profile Photo</label><input id='image1' type='file' name='images[]' style='height:30px' class='form__field__img form-control'></div></div>
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Address</label><input name='caddress' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>City</label><input name='ccity' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>State</label><input name='cstate' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Post Code</label><input name='czip' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Country</label><select class='form-control m-b ' name='ccountry' >
                                <option value=''>Select Country</option>";
                                include 'countries.php';
                            echo"</select></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Email Address</label><input name='cemail' type='email' value='' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Phone Number</label><input name='cphone' type='text' value='' style='height:30px' class='form-control' required></div></div>";
                            
                            /*
                            
                            echo"<div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Billing Address</label>
                                <textarea name='billing_address' class='form-control'></textarea>
                            </div></div>
                            
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Client Story/Enquiry (Note)</label>
                                <link href='https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css' rel='stylesheet'>
                                <script src='https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js'></script>
                                <textarea id='summernote' name='cdetail' class='form-control'>$cdetail</textarea>";
                                ?><script>
                                    $('#summernote').summernote({
                                        placeholder: 'Hello stand alone ui',
                                        tabsize: 2,
                                        height: 120,
                                        toolbar: [
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['color', ['color']],
                                            ['para', ['ul', 'ol', 'paragraph']],
                                            ['table', ['table']],
                                            ['insert', ['link', 'picture', 'video']],
                                            ['view', ['codeview', 'help']]
                                        ]
                                    });
                                </script><?php
                                
                            echo"</div></div> 
                            
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Important Notes for Staff</label>
                                <textarea name='note_for_staff' class='form-control'></textarea>
                            </div></div>
                            
                            <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Case Manager</label><select class='form-control m-b' name='case_manager' required>";
                                $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                echo"</select>
                            </div></div>";
                            
                            // <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Additional Phone</label><input name='rphone' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            // <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Additional Email</label><input name='remail' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            
                            */
                            
                            if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){ 
                                /*
                                echo"<div class='col-md-12' style='margin-bottom:25px;font-size:12pt'><hr></div>
                                <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Type</label><select class='form-control m-b ' name='rtype' >
                                    <option value=''>Select Type</option>
                                    <option value='HCP'>HCP</option>";
                                    // <option value='CHSP'>CHSP</option>
                                echo"</select></div></div>
                                
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Accounting System Reference</label><input name='accounting_system_reference' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-32' style='margin-bottom:25px'><div class='form-group'><label>Accounting System Secondary Reference</label><input name='accounting_system_secondary_reference' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Billing Group</label><input name='billing_group' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default KM Charge</label><input name='default_km_charge' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default Travel Time</label><input name='default_travel_time' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>KMs From Office</label><input name='km_from_office' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-12' style='margin-bottom:25px;font-size:12pt'>Additional Data<hr></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Country Of Birth</label><input name='birth_country' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Language Spoken at Home</label><input name='language' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Can Spoke English?</label><select class='form-control m-b ' name='english' >
                                    <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option><option value='AVERAGE'>AVERAGE</option>
                                </select></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Languages Spoken (Other)</label><select class='form-control m-b ' name='language_other' >
                                    <option value=''>Select</option>
                                    <option value='English'>English</option><option value='Spanish'>Spanish</option>
                                    <option value='French'>French</option><option value='German'>German</option>
                                    <option value='Chinese'>Chinese</option><option value='Jananese'>Japanese</option>
                                    <option value='Korean'>Korean</option><option value='Arabic'>Arabic</option>
                                    <option value='Russian'>Russian</option><option value='Portuguese'>Portuguese</option>
                                    <option value='Hindi'>Hindi</option><option value='Bengali'>Bengali</option>
                                    <option value='Punjabi'>Punjabi</option><option value='Javanese'>Javanese</option>
                                    <option value='Malaya'>Malay</option><option value='Swahili'>Swahili</option>
                                    <option value='Vietnames'>Vietnamese</option><option value='Italian'>Italian</option>
                                    <option value='Turkish'>Turkish</option><option value='Persian'>Persian</option>
                                </select></div></div>
                                
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Package Level</label><select class='form-control m-b ' name='cpackage' >
                                    <option value=''>Select</option>
                                    <option value='1'>1</option><option value='2'>2</option>
                                    <option value='3'>3</option><option value='4'>4</option>
                                    <option value='5'>5</option><option value='6'>6</option>
                                    <option value='7'>7</option><option value='8'>8</option>
                                    <option value='9'>9</option><option value='10'>10</option>
                                </select>
                                </div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Funding type</label><select class='form-control m-b ' name='funding_type' >
                                    <option value=''>Select</option><option value='HCP'>HCP</option><option value='CHSP'>CHSP</option><option value='Private'>Private</option>
                                </select></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Previous Provider</label><input name='previous_provider' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Medicare Import Ref.</label><input name='medicare_import_ref' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>NAPS Service ID</label><input name='naps_service_id' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Scheduler</label><input name='scheduler' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Planning Region</label><input name='planning_region' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Allied Health</label><input name='allied_health' type='text' value='' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Property Name</label><input name='property_name' type='text' value='' style='height:30px' class='form-control' ></div></div>
        
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Geographic Region *</label><select class='form-control m-b ' name='geographic_region' >
                                    <option value=''>Select</option><option value='AZZA'>AZZA</option><option value='COHS'>COHS</option>
                                    <option value='Miscare'>Mishcare</option><option value='Nazcare'>Nazcare</option><option value='Unspecified'>Unspecified</option>
                                </select></div></div>
                                
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default Package *</label><select class='form-control m-b ' name='default_package' >
                                    <option value=''>Select Priority</option><option value='Admin'>Admin</option><option value='HCP L1'>HCP L1</option>
                                    <option value='HCP L2'>HCP L2</option><option value='HCP L3'>HCP L3</option><option value='HCP L4'>HCP L4</option>
                                    <option value='NDIS - NDIA Managed'>NDIS - NDIA Managed</option>
                                    <option value='NDIS - Plan Managed'>NDIS - PLAN Managed</option>
                                    <option value='NDIS - SELF Managed'>NDIS - SELF Managed</option>
                                    <option value='PACE - NDIS Managed'>PACE - NDIA Managed</option>
                                    <option value='PACDE - PLAN Managed'>PACE - PLAN Managed</option>
                                </select></div></div>";
                                */
                            }
                             
                            echo"<div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Referral # / URN / MAC</label><input name='referral_number' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Ref. Note</label><input name='ref_note' type='text' value='' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Referrer</label><input name='referrer' type='text' value='' style='height:30px' class='form-control' ></div></div>";
                                
                            echo"<div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' >
                                <option value=''>Select Priority</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                            </select></div></div>";
                            
                            if($_COOKIE["dbname"]!="saas_admin_circleofhope_com_au"){
                                echo"<div class='col-md-3'><div class='form-group'><label>NDIS Number</label>
                                    <input name='ndis_no' type='text' value='' class='form-control'>
                                </div></div>";
                            } else echo"<input name='ndis_no' type='hidden' value='0' class='form-control'>";
                            
                            echo"<div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Follow Up Date</label><input name='fdate' type='date' value='$cdate' style='height:30px' class='form-control' ></div></div>
                            
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Appointment Date</label><input name='adate' type='date' value='$cdate' style='height:30px' class='form-control' ></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Target Date</label><input name='tdate' type='date' value='$cdate' style='height:30px' class='form-control'></div></div>
                            <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Status</label><select class='form-control m-b ' name='status'>
                                <option value='1'>ON</option><option value='0'>OFF</option> 
                            </select></div></div>
                        </div>
                        
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                        <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('lead_data.php?stage=1&status=1&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">Create ".$_GET["sourceid"]."</button>
                    </div>";
                    
                }else{
                    
                    $l1 = "select * from leads where id='".$_GET["logid"]."' order by id desc limit 1"; 
                    $l2 = $conn->query($l1);
                    if ($l2->num_rows > 0) { while($l3 = $l2->fetch_assoc()) {
                        
                        $dob=date("Y-m-d",$l3["dob"]);
                        $adate=date("Y-m-d",$l3["adate"]);
                        $tdate=date("Y-m-d",$l3["tdate"]);
                        $fdate=date("Y-m-d",$l3["fdate"]);
                        
                        echo"<input type='hidden' name='processor' value='editlead'>
                        <input type='hidden' name='id' value='".$l3["id"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Lead Name (Preferred) *</label><input name='lead_name' type='text' value='".$l3["lead_name"]."' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Select Campaign *</label><select class='form-control m-b ' name='campaignid' >";
                                    
                                    $c77 = "select * from campaigns where id='".$l3["campaignid"]."' order by id asc limit 1";
                                    $d77 = $conn->query($c77);
                                    if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { echo"<option value='".$cd77["id"]."'>".$cd77["campaign_name"]."</option>"; } }
                                    
                                    if($designationy=="13") $c77 = "select * from campaigns where status='ON' order by campaign_name asc";
                                    else $c77 = "select * from campaigns where employeeid='$userid' and status='ON' order by campaign_name asc";
                                    $d77 = $conn->query($c77);
                                    if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { echo"<option value='".$cd77["id"]."'>".$cd77["campaign_name"]."</option>"; } }
                                    
                                echo"</select></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Title</label><select class='form-control m-b ' name='title' >
                                    <option value='".$l3["title"]."'>".$l3["title"]."</option>
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
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>First Name</label><input name='fname' type='text' value='".$l3["name"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Sur Name</label><input name='surname' type='text' value='".$l3["surname"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Gender</label><select class='form-control m-b ' name='gender' >
                                    <option value='".$l3["gender"]."'>".$l3["gender"]."</option><option value='Male'>Male</option><option value='Female'>Female</option><option value='Other'>Other</option>
                                </select></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Date of Birth</label><input name='cdob' type='date' value='$dob' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Address</label><input name='caddress' type='text' value='".$l3["address"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>City</label><input name='ccity' type='text' value='".$l3["ccity"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>State</label><input name='cstate' type='text' value='".$l3["cstate"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Zip</label><input name='czip' type='text' value='".$l3["czip"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Country</label><select class='form-control m-b ' name='ccountry' >
                                    <option value='".$l3["ccountry"]."'>".$l3["ccountry"]."</option>";
                                    include 'countries.php';
                                echo"</select></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Email Address</label><input name='cemail' type='email' value='".$l3["email"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Phone Number</label><input name='cphone' type='text' value='".$l3["phone"]."' style='height:30px' class='form-control' ></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Profile Photo: <a href='".$l3["image"]."' target='_blank'>View</a></label><input id='image1' type='file' name='images[]' style='height:30px' class='form__field__img form-control'></div></div>
                                
                                <div class='col-md-9' style='margin-bottom:25px'><div class='form-group'><label>Billing Address</label>
                                    <textarea name='billing_address' class='form-control'>".$l3["billing_address"]."</textarea>
                                </div></div>
                                
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Client Story/Enquiry (Note)</label>
                                    <textarea name='cdetail' id='summernote' class='form-control'>".$l3["cdetail"]."</textarea>
                                </div></div> 
                                
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Important Notes for Staff</label>
                                    <textarea name='note_for_staff' id='summernote1' class='form-control'>".$l3["note_for_staff"]."</textarea>
                                </div></div>
                                
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Case Manager</label><select class='form-control m-b' name='case_manager' >";
                                        
                                        $s7 = "select * from uerp_user where id='".$l3["case_manager"]."' order by id asc limit 1";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                    
                                        $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                    
                                    echo"</select>
                                </div></div>
                                <div class='col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Type</label><select class='form-control m-b ' name='rtype' >
                                    <option value='".$l3["rtype"]."'>".$l3["rtype"]."</option><option value='HCP'>HCP</option>
                                </select></div></div>";
                                
                                if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){ 
                                    echo"<div class='col-md-12' style='margin-bottom:25px;font-size:12pt'><hr></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Ref. # / URN / MAC</label><input name='referral_number' type='text' value='".$l3["referral_number"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Ref. Note</label><input name='ref_note' type='text' value='".$l3["ref_note"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Referrer</label><input name='referrer' type='text' value='".$l3["referrer"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Accounting System Reference</label><input name='accounting_system_reference' type='text' value='".$l3["accounting_system_reference"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-32' style='margin-bottom:25px'><div class='form-group'><label>Accounting System Secondary Reference</label><input name='accounting_system_secondary_reference' type='text' value='".$l3["accounting_system_secondary_reference"]."' style='height:30px' class='form-control' ></div></div>
                                    
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Billing Group</label><input name='billing_group' type='text' value='".$l3["billing_group"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default KM Charge</label><input name='default_km_charge' type='text' value='".$l3["default_km_charge"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default Travel Time</label><input name='default_travel_time' type='text' value='".$l3["default_travel_time"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>KMs From Office</label><input name='km_from_office' type='text' value='".$l3["km_from_office"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-12' style='margin-bottom:25px;font-size:12pt'>Additional Data<hr></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Country Of Birth</label><input name='birth_country' type='text' value='".$l3["birth_country"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Language Spoken at Home</label><input name='language' type='text' value='".$l3["language"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Can Spoke English?</label><select class='form-control m-b ' name='english' >
                                        <option value='".$l3["english"]."'>".$l3["english"]."</option><option value='YES'>YES</option><option value='NO'>NO</option><option value='AVERAGE'>AVERAGE</option>
                                    </select></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Languages Spoken (Other)</label><select class='form-control m-b ' name='language_other' >
                                        <option value='".$l3["language_other"]."'>".$l3["language_other"]."</option>
                                        <option value='English'>English</option><option value='Spanish'>Spanish</option>
                                        <option value='French'>French</option><option value='German'>German</option>
                                        <option value='Chinese'>Chinese</option><option value='Jananese'>Japanese</option>
                                        <option value='Korean'>Korean</option><option value='Arabic'>Arabic</option>
                                        <option value='Russian'>Russian</option><option value='Portuguese'>Portuguese</option>
                                        <option value='Hindi'>Hindi</option><option value='Bengali'>Bengali</option>
                                        <option value='Punjabi'>Punjabi</option><option value='Javanese'>Javanese</option>
                                        <option value='Malaya'>Malay</option><option value='Swahili'>Swahili</option>
                                        <option value='Vietnames'>Vietnamese</option><option value='Italian'>Italian</option>
                                        <option value='Turkish'>Turkish</option><option value='Persian'>Persian</option>
                                    </select></div></div>
                                    
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Package Level</label><select class='form-control m-b ' name='cpackage' >
                                        <option value='".$l3["cpackage"]."'>".$l3["cpackage"]."</option>
                                        <option value='1'>1</option><option value='2'>2</option>
                                        <option value='3'>3</option><option value='4'>4</option>
                                        <option value='5'>5</option><option value='6'>6</option>
                                        <option value='7'>7</option><option value='8'>8</option>
                                        <option value='9'>9</option><option value='10'>10</option>
                                    </select>
                                    </div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Funding type</label><select class='form-control m-b ' name='funding_type' >
                                        <option value='".$l3["funding_type"]."'>".$l3["funding_type"]."</option><option value='HCP'>HCP</option><option value='CHSP'>CHSP</option><option value='Private'>Private</option>
                                    </select></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Previous Provider</label><input name='previous_provider' type='text' value='".$l3["previous_provider"]."' style='height:30px' class='form-control' ></div></div>
                                    
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Medicare Import Ref.</label><input name='medicare_import_ref' type='text' value='".$l3["medicare_import_ref"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>NAPS Service ID</label><input name='naps_service_id' type='text' value='".$l3["naps_service_id"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Scheduler</label><input name='scheduler' type='text' value='".$l3["scheduler"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Planning Region</label><input name='planning_region' type='text' value='".$l3["planning_region"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Allied Health</label><input name='allied_health' type='text' value='".$l3["allied_health"]."' style='height:30px' class='form-control' ></div></div>
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Property Name</label><input name='property_name' type='text' value='".$l3["property_name"]."' style='height:30px' class='form-control' ></div></div>
            
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Geographic Region *</label><select class='form-control m-b ' name='geographic_region' >
                                        <option value='".$l3["geographic_region"]."'>".$l3["geographic_region"]."</option><option value='AZZA'>AZZA</option><option value='COHS'>COHS</option>
                                        <option value='Miscare'>Mishcare</option><option value='Nazcare'>Nazcare</option><option value='Unspecified'>Unspecified</option>
                                    </select></div></div>
                                    
                                    <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Default Package *</label><select class='form-control m-b ' name='default_package' >
                                        <option value='".$l3["default_package"]."'>".$l3["default_package"]."</option><option value='Admin'>Admin</option><option value='HCP L1'>HCP L1</option>
                                        <option value='HCP L2'>HCP L2</option><option value='HCP L3'>HCP L3</option><option value='HCP L4'>HCP L4</option>
                                        <option value='NDIS - NDIA Managed'>NDIS - NDIA Managed</option>
                                        <option value='NDIS - Plan Managed'>NDIS - PLAN Managed</option>
                                        <option value='NDIS - SELF Managed'>NDIS - SELF Managed</option>
                                        <option value='PACE - NDIS Managed'>PACE - NDIA Managed</option>
                                        <option value='PACDE - PLAN Managed'>PACE - PLAN Managed</option>
                                    </select></div></div>";
                                }
                                
                                echo"<div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' >
                                    <option value='".$l3["priority"]."'>".$l3["priority"]."</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                                </select></div></div>";
                                
                                if($_COOKIE["dbname"]=="saas_info_goodwillcare_net"){
                                    echo"<div class='col-md-3'><div class='form-group'><label>NDIS Number</label>
                                        <input name='ndis_no' type='text' value='".$l3["ndis_no"]."' class='form-control'>
                                    </div></div>";
                                } else {
                                    echo"<input name='ndis_no' type='hidden' value='".$l3["ndis_no"]."' class='form-control'>";
                                }
                                
                                echo"<div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Follow Up Date</label><input name='fdate' type='date' value='$tdate' style='height:30px' class='form-control'></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Appointment Date</label><input name='adate' type='date' value='$adate' style='height:30px' class='form-control'></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Target Date</label><input name='tdate' type='date' value='$tdate' style='height:30px' class='form-control'></div></div>
                                <div class='col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Status</label><select class='form-control m-b ' name='status'>
                                    <option value='".$l3["status"]."'>";
                                        if($l3["status"]==1) echo"ON"; else echo"OFF";
                                    echo"</option><option value='1'>ON</option><option value='0'>OFF</option> 
                                </select></div></div>
                            </div>
                            
                        </div>
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                            <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('lead_data.php?stage=1&status=1&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">Update Lead</button>
                        </div>";
                        
                    } }
                }
            echo"</form>";
        
        }
        
        if($_GET["sourceid"]=="Deal"){
            echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                <input type='hidden' name='processor' value='createdeal'>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Select Lead *</label><select class='form-control m-b ' name='leadid' >
                            <option value=''>Select Lead</option>";
                            $c77 = "select * from leads where status='1' order by lead_name asc";
                            $d77 = $conn->query($c77);
                            if ($d77->num_rows > 0) { while($cd77 = $d77->fetch_assoc()) { echo"<option value='".$cd77["id"]."'>".$cd77["lead_name"]."</option>"; } }
                        echo"</select></div></div>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Deal Title *</label><input name='deal_name' type='text' value='' class='form-control' ></div></div>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Product/Service Name</label><input name='product_name' type='text' value='' style='height:30px' class='form-control' ></div></div>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Product/Service Detail</label><input name='product_detail' type='text' value='' style='height:30px' class='form-control' ></div></div>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Deal Value</label><input name='deal_value' type='text' value='' style='height:30px' class='form-control' ></div></div>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status'>
                            <option value='ON'>ON</option><option value='OFF'>OFF</option>
                        </select></div></div>
                        <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Description/Note</label>
                            <textarea name='note' class='form-control'></textarea>
                        </div></div>
                    </div>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' >Create ".$_GET["sourceid"]."</button>
                </div>
            </form>";
        
        }
        
        // legal case category
        if($_GET["sourceid"]=="CATEGORY"){
            
            if(isset($_GET["dataid"]) && $_GET["dataid"]!=0){
                
                $c1 = "select * from project_type where id='".$_GET["dataid"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) {
                    echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                        <input type='hidden' name='processor' value='updateprojecttype'><input type='hidden' name='id' value='".$c3["id"]."'>
                        <input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='".$c3["name"]."' class='form-control' required></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Parent Name *</label><select class='form-control m-b ' name='location' required>";
                                    $s77x = "select * from project_type where id='".$c3["location"]."' and status='ON' order by name asc";
                                    $r77x = $conn->query($s77x);
                                    if ($r77x->num_rows > 0) { while($rs77x = $r77x->fetch_assoc()) {
                                        echo"<option value='".$rs77x["id"]."'>".$rs77x["name"]."</option>";
                                    } }
                                    $s77 = "select * from project_type where type='CATEGORY' and status='ON' order by name asc";
                                    $r77 = $conn->query($s77);
                                    if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                        echo"<option value='".$rs77["id"]."'>".$rs77["name"]."</option>";
                                    } }
                                echo"</select></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'>".$c3["note"]."</textarea></div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                    <option value='".$c3["status"]."'>".$c3["status"]."</option>
                                    <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select></div></div>
                            </div>
                        </div>
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                            // $cid - $sheba - ".$_GET["utype"]." - campaigns - ".$_GET["url"]." - ".$_GET["id"]."
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Update ".$_GET["sourceid"]."</button>
                                </div>
                            </div>
                        </div>
                    </form>";
                } }
            }else{
                echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                    <input type='hidden' name='processor' value='createprojecttype'><input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Parent Name *</label><select class='form-control m-b ' name='location' required>
                                <option value=''>Select Parent Category</option>";
                                $s77 = "select * from project_type where type='CATEGORY' and status='ON' order by name asc";
                                $r77 = $conn->query($s77);
                                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                                    echo"<option value='".$rs77["id"]."'>".$rs77["name"]."</option>";
                                } }
                            echo"</select></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'></textarea></div></div>
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select></div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        // $cid - $sheba - ".$_GET["utype"]." - campaigns - ".$_GET["url"]." - ".$_GET["id"]."
                        echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Create ".$_GET["sourceid"]."</button>
                            </div>
                        </div>
                    </div>
                </form>";
            }
        }
        
        if($_GET["sourceid"]=="COURT"){
            
            if(isset($_GET["dataid"]) && $_GET["dataid"]!=0){
                
                $c1 = "select * from project_type where id='".$_GET["dataid"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) {
                    echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                        <input type='hidden' name='processor' value='updateprojecttype'><input type='hidden' name='id' value='".$c3["id"]."'>
                        <input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='".$c3["name"]."' class='form-control' required></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Location *</label><textarea name='location' class='form-control'>".$c3["location"]."</textarea></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'>".$c3["note"]."</textarea></div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                    <option value='".$c3["status"]."'>".$c3["status"]."</option>
                                    <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select></div></div>
                            </div>
                        </div>
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Update ".$_GET["sourceid"]."</button>
                                </div>
                            </div>
                        </div>
                    </form>";
                } }
            }else{
                echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                    <input type='hidden' name='processor' value='createprojecttype'><input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Location *</label><textarea name='location' class='form-control'></textarea></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'></textarea></div></div>
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select></div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Create ".$_GET["sourceid"]."</button>
                            </div>
                        </div>
                    </div>
                </form>";
            }
        }
        
        if($_GET["sourceid"]=="ACT"){
            
            if(isset($_GET["dataid"]) && $_GET["dataid"]!=0){
                
                $c1 = "select * from project_type where id='".$_GET["dataid"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) {
                    echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                        <input type='hidden' name='processor' value='updateprojecttype'><input type='hidden' name='id' value='".$c3["id"]."'>
                        <input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='".$c3["name"]."' class='form-control' required></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Referance *</label><textarea name='location' class='form-control'>".$c3["location"]."</textarea></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'>".$c3["note"]."</textarea></div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                    <option value='".$c3["status"]."'>".$c3["status"]."</option>
                                    <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select></div></div>
                            </div>
                        </div>
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Update ".$_GET["sourceid"]."</button>
                                </div>
                            </div>
                        </div>
                    </form>";
                } }
            }else{
                echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                    <input type='hidden' name='processor' value='createprojecttype'><input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Referance *</label><textarea name='location' class='form-control'></textarea></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'></textarea></div></div>
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select></div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Create ".$_GET["sourceid"]."</button>
                            </div>
                        </div>
                    </div>
                </form>";
            }
        }
        
        if($_GET["sourceid"]=="STAGE"){
            
            if(isset($_GET["dataid"]) && $_GET["dataid"]!=0){
                
                $c1 = "select * from project_type where id='".$_GET["dataid"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) {
                    echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                        <input type='hidden' name='processor' value='updateprojecttype'><input type='hidden' name='id' value='".$c3["id"]."'>
                        <input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                        <div class='modal-body'>
                            <div class='row'>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='".$c3["name"]."' class='form-control' required></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Referance *</label><textarea name='location' class='form-control'>".$c3["location"]."</textarea></div></div>
                                <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'>".$c3["note"]."</textarea></div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                    <option value='".$c3["status"]."'>".$c3["status"]."</option>
                                    <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select></div></div>
                            </div>
                        </div>
                        <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                            echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                            <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Update ".$_GET["sourceid"]."</button>
                                </div>
                            </div>
                        </div>
                    </form>";
                } }
            }else{
                echo"<form method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data' >
                    <input type='hidden' name='processor' value='createprojecttype'><input name='type' type='hidden' value='".$_GET["sourceid"]."'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Name *</label><input name='name' type='text' value='' class='form-control' required></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Referance *</label><textarea name='location' class='form-control'></textarea></div></div>
                            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Note</label><textarea name='note' class='form-control'></textarea></div></div>
                            <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                                <option value='ON'>ON</option><option value='OFF'>OFF</option>
                            </select></div></div>
                        </div>
                    </div>
                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>";
                        echo"<button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Create ".$_GET["sourceid"]."</button>
                            </div>
                        </div>
                    </div>
                </form>";
            }
        }
        
    echo"</div>";
?>