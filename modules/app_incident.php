<link rel='preconnect' href='https://fonts.gstatic.com' />
<link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
<link rel='stylesheet' href='font/CS-Interface/style.css' />
<link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
<link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
<link rel='stylesheet' href='css/styles.css' />
<link rel='stylesheet' href='css/main.css' />
<script src='js/base/loader.js'></script>
<style>
    #hidden_div {
         display: none;
    }
    #hidden_div2 {
         display: none;
    }
</style>
<?php 
    $sheba="incident";
    $cid=7;
    $title="Add New Incident Report";
    $utype="INCIDENT";
    $designation=6;

    echo"<div class='row'>
        <div class='col-8 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>INCIDENT Reporting</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-4 col-md-7 d-flex align-items-start justify-content-end'>
        
            <a href='index.php?url=incident-reports.php'>
            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                <i data-acorn-icon='note'></i>&nbsp;&nbsp;<span>View Reports</span>
            </button></a>
            
        </div>                  
    </div>    
    <div>

        <section class='scroll-section' id='basic'>
            <h2 class='small-title'>New INCIDENT Form</h2>
            <div class='card mb-5 wizard' id='wizardBasic'>
                <div class='card-header border-0 pb-0'>
                    <ul class='nav nav-tabs justify-content-center' role='tablist'>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicOne' role='tab'><div class='mb-1 title d-none d-sm-block'>Reporter</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicTwo' role='tab'><div class='mb-1 title d-none d-sm-block'>Perticipent</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicThree' role='tab'><div class='mb-1 title d-none d-sm-block'>Witness</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicFour' role='tab'><div class='mb-1 title d-none d-sm-block'>Incident</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicFive' role='tab'><div class='mb-1 title d-none d-sm-block'>Nature</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicSix' role='tab'><div class='mb-1 title d-none d-sm-block'>Area</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicSeven' role='tab'><div class='mb-1 title d-none d-sm-block'>Treatment</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicEight' role='tab'><div class='mb-1 title d-none d-sm-block'>Referral</div></a>
                        </li>
                        <li class='nav-item' role='presentation'>
                            <a class='nav-link text-center' href='#basicNine' role='tab'><div class='mb-1 title d-none d-sm-block'>Documents</div></a>  
                        </li>
                        
                        <li class='nav-item d-none' role='presentation'><a class='nav-link text-center' href='#basicLast' role='tab'></a></li>
                    </ul>
                </div>
                <form id='form' method='post' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='url' value='incident.php'><input type='hidden' name='id' value='5200'>
                    <div class='card-body sh-26'>
                        <div class='tab-content'>";

                            // 1.  
                            echo"<div class='tab-pane fade' id='basicOne' role='tabpanel'>
                                <h2>Reporting Person's Data</h2>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Posting Date *</label><input name='date' type='date' value='$current_date' class='form-control required'></div>";
                                        if($designation=="6"){
                                            echo"<div class='form-group' style='margin-bottom:25px'><label>Employee Name *</label>
                                                <select class='form-control m-b required' name='employeeid'>
                                                    <option value=''>Select Allocated Employee</option>";
                                                    $s7 = "select * from uerp_user where mtype='EMPLOYEE' and status='1' order by id asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                echo"</select>
                                            </div>";
                                        }else{
                                            echo"<div class='form-group' style='margin-bottom:25px'><label>Employee Name *</label><select class='form-control m-b required' name='employeeid'>
                                                <option value='".$_COOKIE["userid"]."'>$username</option></select>
                                            </div>";
                                        }
                                        echo"<div class='form-group' style='margin-bottom:25px'><label>Phone # *</label><input name='phone' type='text' value='$phonex' class='form-control ' readonly></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Email Address *</label><input name='email' type='text' value='$unbox' class='form-control ' readonly></div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>DOB *</label><input name='dob' type='text' value='' class='form-control ' readonly></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Gender *</label><input name='gender' type='text' value='' class='form-control ' readonly></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Address *</label><input name='address' type='text' value='$addressx' class='form-control ' readonly></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Experience in job: *</label><input name='experiance' type='text' value='' class='form-control ' readonly></div>
                                    </div>
                                </div>
                                
                            </div>";

                            // 2. 
                            echo"<div class='tab-pane fade' id='basicTwo' role='tabpanel'>
                                <h2>Generate Incident Report (IR)</h2>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Perticipent Name *</label><select class='form-control m-b required' name='clientid'>
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
                                                /*
                                                $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                                */
                                            echo"</select>
                                        </div>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Status of Invoiled Person *</label><select class='form-control m-b required ' name='involved'>
                                                <option value=''>Please Select</option>
                                                <option value='Staff'>Staff</option>
                                                <option value='Participant'>Participant</option>
                                                <option value='Visitor'>Visitor</option>
                                                <option value='Volunteer'>Volunteer</option>
                                                <option value='Contractor'>Contractor</option>
                                            </select>
                                        </div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Incident Location:</label><input name='location' type='text' value='' class='form-control required '></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Current GEO Location:</label>
                                            <div class='row'>
                                                <div class='col-lg-6'><input name='latitudek' type='text' value='$latitudex' class='form-control ' readonly></div>
                                                <div class='col-lg-6'><input name='longitudek' type='text' value='$longitudex' class='form-control ' readonly></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <div id='map'></div>
                                            <iframe src='https://www.google.com/maps?q=$latitudex,$longitudex&hl=es;z=14&output=embed' style='height:300px;width:100%'
                                            onchange='document.incidentform.location.value=this.value'></iframe>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>";

                            // 3. 
                            echo"<div class='tab-pane fade' id='basicThree' role='tabpanel'>
                                <h2>Witness Detail</h2>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Details of Witness 1 (If any)</label><input name='witness1' type='text' value='' class='form-control'></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>D.O.B</label><input name='dob1' type='text' value='' class='form-control'></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Address</label><input name='address1' type='text' value='' class='form-control'></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Phone</label><input name='phone1' type='text' value='' class='form-control'></div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Detail of Witness 2 (If any)</label><input name='witness2' type='text' value='' class='form-control'></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>D.O.B</label><input name='dob2' type='text' value='' class='form-control'></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Address</label><input name='address2' type='text' value='' class='form-control'></div>
                                        <div class='form-group' style='margin-bottom:25px'><label>Phone</label><input name='phone2' type='text' value='' class='form-control'></div>
                                    </div>
                                </div>
                            </div>";

                            // 4.
                            echo"<div class='tab-pane fade' id='basicFour' role='tabpanel'>
                                
                                <h2>Incident Detail</h2>
                                <div class='row'>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Date of Incident *</label><input name='incidentdate' type='date' value='$current_date' class='form-control required '></div>
                                    </div>
                                    <div class='col-lg-6'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Approximate time of incident *</label>
                                            <input name='hourminute' type='time' value='' placeholder='HH:MM' class='form-control required '>
                                        </div>
                                    </div>
                                    <div class='col-lg-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>What Happened? *</label><textarea name='what_happened' class='form-control required'></textarea></div>
                                    </div>
                                    <div class='col-lg-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>What task was being performed at the time of the incident? *</label><textarea name='what_performed' class='form-control required'></textarea></div>
                                    </div>
                                </div>
                            </div>";

                            // 5.
                            echo"<div class='tab-pane fade' id='basicFive' role='tabpanel'>
                                
                                <h2>Nature of Incident/cause of injury</h2><br>
                                <div class='row'>";
                                    $s7 = "select * from injury order by id asc limit 1000";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<div class='col-lg-3 col-sm-6 col-xs-6'><div class='form-group' style='margin-bottom:25px'>
                                            <div class='i-checks'><label> <table><tr>
                                                <td valign=middle style='padding-right:10px'><input type='checkbox' name='injury[]' value='".$rs7["injury"]."' style='height:20px;width:20px'></td>
                                                <td valign=middle> <i></i>".$rs7["injury"]."</td>
                                            </tr></table></label></div>
                                        </div></div>";
                                        
                                    } }
                                    echo"<div class='col-lg-12 col-sm-12'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Other (If Any)</label><input name='injury_other' type='text' value='' placeholder='Please - type another option here' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>"; 
                            
                            // 6.
                            echo"<div class='tab-pane fade' id='basicSix' role='tabpanel'>
                                
                                <h2>Specify the Area of Injury</h2><br>
                                <div class='row'>";
                                    $s7 = "select * from injury_area order by id asc limit 1000";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<div class='col-lg-2 col-sm-6 col-xs-6'><div class='form-group' style='margin-bottom:25px'>
                                            <div class='i-checks'><label> <table><tr>
                                                <td valign=middle style='padding-right:10px'><input type='checkbox' name='injury_area[]' value='".$rs7["injury_area"]."' style='height:20px;width:20px'></td>
                                                <td valign=middle> <i></i>".$rs7["injury_area"]."</td>
                                            </tr></table></label></div>
                                        </div></div>";
                                        
                                    } }
                                    echo"<div class='col-lg-12 col-sm-12'>
                                        <div class='form-group' style='margin-bottom:25px'>
                                            <label>Other (If Any)</label><input name='injury_area_other' type='text' value='' placeholder='Please - type another option here' class='form-control'>
                                        </div>
                                    </div>
                                </div>
                            </div>";

                            // 7.
                            echo"<div class='tab-pane fade' id='basicSeven' role='tabpanel'>
                                
                                <h2>Treatment and Referral</h2>
                                <div class='row'>
                                    <div class='col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='No' id='optionsRadios2' name='treatment'  style='height:20px;width:20px'></td><td>&nbsp;&nbsp;NO</td></tr></table></label></div>
                                    </div>
                                    <div class='col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='No' id='optionsRadios2' name='treatment' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;YES</td></tr></table></label></div>
                                    </div>
                                    <div class='col-xs-6 col-sm-6 col-md-2 col-lg-4 col-xl-4'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='No' id='optionsRadios2' name='treatment' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;Not Applicable</td></tr></table></label></div>
                                    </div>
                                    <div class='col-lg-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Other (If Any)</label><input name='treatment_other' type='text' value='' placeholder='Please - type another option here' class='form-control'></div>
                                    </div>
                                </div>
                            </div>";

                            // 8.
                            echo"<div class='tab-pane fade' id='basicEight' role='tabpanel'>
                                
                                <h2>Referral Required:</h2>
                                <div class='row'>
                                    <div class='col-xs-6 col-lg-2'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='NO' id='optionsRadios2' name='referral' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;NO</td></tr></table></label></div>
                                    </div>
                                    <div class='col-xs-6 col-lg-2'>
                                        <div class='form-group' style='margin-bottom:25px'><label><table><tr><td nowrap> <input type='radio' value='YES' id='optionsRadios2' name='referral' style='height:20px;width:20px'></td><td>&nbsp;&nbsp;YES</td></tr></table></label></div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>If YES, Please specify Referred to:</label><input name='referred' type='text' value='' class='form-control'></div>
                                    </div>
                                    <div class='col-lg-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>First Aid Attendant:</label><input name='firstaid' type='text' value='' class='form-control required'></div>
                                    </div>
                                </div>
                            </div>";

                            // 9.
                            $sessionid=rand(1000000000,9999999999);
                            echo"<div class='tab-pane fade' id='basicNine' role='tabpanel'>
                                
                                <h2>Upload Documents (If any)</h2>
                                <div class='row'>
                                    <div class='col-lg-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>File Upload</label>
                                            <input type='file' name='images[]' multiple class='form__field__img form-control'><input type='hidden' name='sessionid' value='$sessionid'>
                                        </div>
                                    </div>
                                    <div class='col-lg-12'>
                                        <div class='form-group' style='margin-bottom:25px'><label>Suggestions for improvement:</label><textarea name='suggestion' class='form-control'></textarea></div>
                                    </div>
                                    <div class='col-lg-12'><div class='form-group' style='margin-bottom:25px'>
                                        <button class='ladda-button btn btn-primary recordadded'  data-style='expand-right'>Submit</button>
                                    </div></div>
                                </div>
                            </div>";

                        echo"</div>
                    </div>
                    <div class='card-footer text-center border-0 pt-1' style='margin-top:200px' >
                        <button class='btn btn-icon btn-icon-start btn-outline-primary btn-prev' type='button'><i data-acorn-icon='chevron-left'></i><span>Back</span></button>
                        <button class='btn btn-icon btn-icon-end btn-outline-primary btn-next' type='button'><span>Next</span><i data-acorn-icon='chevron-right'></i></button>
                    </div>
                </form>    
            </div>
        </section>
    </div>"; ?>
    
    <script src='js/vendor/jquery-3.5.1.min.js'></script>
    
    <script src='js/vendor/OverlayScrollbars.min.js'></script>
    <script src='js/vendor/autoComplete.min.js'></script>
    <script src='js/vendor/clamp.min.js'></script>
    <script src='icon/acorn-icons.js'></script>
    <script src='icon/acorn-icons-interface.js'></script>
    <script src='js/cs/scrollspy.js'></script>
    <script src='js/cs/wizard.js'></script>
    <script src='js/vendor/jquery.validate/jquery.validate.min.js'></script>
    <script src='js/vendor/jquery.validate/additional-methods.min.js'></script>
    <script src='js/base/helpers.js'></script>
    <script src='js/base/globals.js'></script>
    <script src='js/base/nav.js'></script>
    <script src='js/base/search.js'></script>
    <script src='js/base/settings.js'></script>
    <script src='js/forms/wizards.js'></script>
    <script src='js/common.js'></script>
    <script src='js/scripts.js'></script>

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