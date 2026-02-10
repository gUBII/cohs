<?php
    if (!isset($_COOKIE["managed"]) OR $_COOKIE["managed"]==0) {
        echo"<form method='GET' action='aged_managed.php' name='main' target='_top'>
            <input type=hidden name='url' value='workspace.php'>
            <input type=hidden name=id value='786'>
            <input type=hidden name=managed value='3'>
            </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
?>
    <style>
        .hidden {
        display: none;
        }
        
        #grad1 {
            background-color: red;
            background-image: linear-gradient(128deg, #121212, red); 
        }
        .typewriter h1 {
          color: #fff;
          overflow: hidden;
          border-right: .15em solid black;
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        .typewriter h2 {
          color: #fff;
          overflow: hidden;
          /* border-right: .15em solid black; */
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        
        /* The typing effect */
        @keyframes typing {
          from { width: 0 }
          to { width: 100% }
        }
        
        /* The typewriter cursor effect */
        @keyframes blink-caret {
          from, to { border-color: transparent }
          50% { border-color: orange }
        }
    </style>
    
<?php
    
    if(isset($_GET["resetme"])){ 
        unset($_COOKIE["ws_fname"]);
        setcookie("ws_fname", "", time() - 3600, "/");
        unset($_COOKIE["ws_lname"]);
        setcookie("ws_lname", "", time() - 3600, "/");
        unset($_COOKIE["ws_email"]);
        setcookie("ws_email", "", time() - 3600, "/");
        unset($_COOKIE["ws_cid"]);
        setcookie("ws_cid", "", time() - 3600, "/");
        unset($_COOKIE["ws_invoice"]);
        setcookie("ws_invoice", "", time() - 3600, "/");
    }
    
    // include("head-light.php");
    
    $sheba="workspace";
    $cid=90001;
    $title="Add New Workspace";
    $utype="Workspace";
    
    echo"<div class='data-table-rows slim' id='sample'>
        <div class='data-table-responsive-wrapper'id='datatableX'><center>
            <div class='d-flex justify-content-center align-items-center shadow-deep py-5 ' style='border-radius:10px'>
                <div class='sw-lg-100' style='padding:5px;text-align:left;width:100%'>
                    <table style='width:95%'><tr>
                        <td align=left><h2>CLIENT ONBOARDING</h2></td>
                        <td align=right><a href='index.php?url=workspace.php&id=786&resetme=1' class='btn btn-primary sm'>Reset Board</a></td>
                    </tr></table>";
                    
                    if(!isset($_COOKIE["ws_fname"]) && !isset($_COOKIE["ws_lname"]) && !isset($_COOKIE["ws_email"])){
                        $uotp=rand(100000000,999999999);
                        echo"<hr>
                        <form method='post' name='stage1' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>";
                        
                            $randid=rand(100,999);
                            $ctime=time();
                            $rdate=date("Y-m-d",$ctime);                
                            $next_uid=0;
                            $s7x = "select * from uerp_user where mtype='CLIENT' order by id desc limit 1";
                            $r7x = $conn->query($s7x);
                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { $next_uid=($rs7x["id"]+1); } }                
                            
                            if(isset($_GET["leadid"])){
                                $l1 = "select * from leads where id='".$_GET["leadid"]."' order by id desc limit 1";
                                $l2 = $conn->query($l1);
                                if ($l2->num_rows > 0) { while($l3 = $l2->fetch_assoc()) {
                                    $lead_name=$l3["lead_name"];
                                    $employeeid=$l3["employeeid"];
                                    $first_name=$l3["name"];
                                    $caddress=$l3["address"];
                                    $cemail=$l3["email"];
                                    $cphone=$l3["phone"];
                                    $surname=$l3["surname"];
                                    $title=$l3["title"];
                                    $gender=$l3["gender"];
                                    $ccity=$l3["ccity"];
                                    $cstate=$l3["cstate"];
                                    $czip=$l3["czip"];
                                    $ccountry=$l3["ccountry"];
                                    $cdob=$l3["cdob"];
                                    $cdetail=$l3["cdetail"];
                                    $birth_country=$l3["birth_country"];
                                    $clanguage=$l3["language"];
                                    $cenglish=$l3["english"];
                                    $cpackage=$l3["cpackage"];
                                    $funding_type=$l3["funding_type"];
                                    $previous_provider=$l3["previous_provider"];
                                    $referral_number=$l3["referral_number"];
                                    $rname=$l3["rname"];
                                    $rname2=$l3["rname2"];
                                    $rphone=$l3["rphone"];
                                    $remail=$l3["remail"];
                                    $rtype=$l3["rtype"];
                                    $client_detail=$l3["client_detail"];
                                    $speech_note=$l3["speech_note"];
                                    $note=$l3["note"];
                                    $priority=$l3["priority"];
                                    $note_for_staff=$l3["note_for_staff"];
                                    $preferred_name=$l3["preferred_name"];
                                    $image=$l3["image"];
                                    $billing_address=$l3["billing_address"];
                                    $case_manager=$l3["case_manager"];
                                    $ndis_no=$l3["ndis_no"];
                                } }
                            }
                            
                            echo"<input type=hidden name='processor' value='new_workspace_CLIENT'>
                            <fieldset>
                                <h2>Participant's Personal Details</h2><br>
                                <div class='row'>
                                    
                                    
                                    <input name='pdate' type='hidden' value='$rdate'>
                                    <input name='jdate' type='hidden' value='$rdate'>
                                    <input name='employeeid' type='hidden' value='$next_uid'>
                                    <input name='mtype' type='hidden' value='CLIENT'>
                                    <input type='hidden' name='sourcefrom' value='$sourcefrom'>
                                    <input type='hidden' name='employeeid' value='$employeeid'>
                                    <input type='hidden' name='lname2' value='$preferred_name'>
                                    <input type='hidden' name='userid' value=''>
                                    <input type='hidden' name='password' value='1234567'>
                                    <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' id='firstName' type='text' value='$first_name' class='form-control' required></div></div>
                                    <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Last/Sur Name *</label><input name='lname' type='text' value='$surname' class='form-control' required></div></div>
                                    <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Email *</label><input name='email' type='text' value='$cemail' class='form-control' required onchange='document.stage1.userid.value=this.value'></div></div>
                                    <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='$cphone' class='form-control' required></div></div>
                                    
                                    <div class='col-12 col-md-6' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='$caddress' class='form-control' required></div></div>
                                    <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>City *</label><input name='city' type='text' value='$ccity' class='form-control' required></div></div>
                                    <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>State *</label><input name='state' type='text' value='$cstate' class='form-control' required></div></div>
                                    <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Post Code *</label><input name='zip' type='text' value='$czip' class='form-control' required></div></div>
                                    <div class='col-6 col-md-3' style='margin-bottom:25px'><div class='form-group'><label>Country *</label><select class='form-control m-b required' name='country' required>";
                                        if(isset($ccountry)) echo"<option value='$ccountry'>$ccountry</option";
                                        else echo"<option value=''>Select Country</option>";
                                        include 'countries.php';
                                    echo"</select></div></div>  ";
                                    
                                    echo"<div class='col-6 col-md-6' style='margin-bottom:10px'><div class='form-group'><label>Case Manager</label>
                                        <select class='form-control m-b ' name='case_manager' required >";
                                            $c11x = "select * from uerp_user where id='$case_manager' order by username asc";
                                            $c22x = $conn->query($c11x);
                                            if ($c22x->num_rows > 0) { while($c33x = $c22x->fetch_assoc()) { echo"<option value='".$c33x["id"]."'>".$c33x["username"]." ".$c33x["username2"]."</option>"; } }
                                            if(!isset($case_manager)) echo"<option value=''>Select Manager</option>";
                                            // $c11 = "select * from uerp_user where mtype='USER' and designation='4' and status='1' OR mtype='ADMIN' and status='1' order by username asc";
                                            // $c11 = "select * from uerp_user where mtype='USER' and designation='20' and status='1' order by username asc";
                                            $c11 = "select * from uerp_user where mtype='USER' and status='1' order by username asc";
                                            $c22 = $conn->query($c11);
                                            if ($c22->num_rows > 0) { while($c33 = $c22->fetch_assoc()) { echo"<option value='".$c33["id"]."'>".$c33["username"]." ".$c33["username2"]."</option>"; } }
                                        echo"</select>
                                    </div></div>";
                                    
                                    echo"<input name='ndisnumber' type='hidden' value='$ndis_no'>
                                    <input name='abn' type='hidden' value='$abn'>
                                    <input name='bsb' type='hidden' value='$bsb'>
                                    <input name='rphone' type='hidden' value='$rphone'>
                                    <input name='remail' type='hidden' value='$remail'>";
                                    
                                    if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                                        if(isset($_COOKIE["managed"]) && $_COOKIE["managed"]==2){
                                            echo"<div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Country of Birth</label><input name='12' type='text' value='$birth_country' class='form-control'></div></div>
                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Language</label><input name='12' type='text' value='$clanguage' class='form-control'></div></div>
                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Can Spoke English?</label><input name='12' type='text' value='$cenglish' class='form-control'></div></div>
                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Package Level</label><input name='12' type='text' value='$cpackage' class='form-control'></div></div>
                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Funding Type</label><input name='12' type='text' value='$funding_type' class='form-control'></div></div>
                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Previous Provider</label><input name='12' type='text' value='$previous_provider' class='form-control'></div></div>
                                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Referral Number</label><input name='12' type='text' value='$referral_number' class='form-control'></div></div>";
                                    
                                            echo"<div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Type (Optional)</label><select class='form-control m-b' name='rtype'>";
                                                if(isset($rtype)) echo"<option value='$rtype'>$rtype</option>";
                                                // else echo"<option value='HCP'>HCP</option>";
                                                echo"<option value='HCP'>HCP</option><option value='CHSP'>CHSP</option>
                                            </select></div></div>";
                                        }
                                    }
                                    
                                    echo"<div class='col-12' style='margin-bottom:15px'>&nbsp;</div>
                                    
                                    <div class='col-12 col-md-6' style='margin-bottom:15px'><div class='form-group'><label>Client Detail Story/Enquiry</label>
                                        <link href='https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css' rel='stylesheet'>
                                        <script src='https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js'></script>
                                        <textarea id='' name='cdetail' class='form-control'>$cdetail</textarea>";
                                        ?><script>
                                            $('#summernote').summernote({
                                                placeholder: 'Detail Note', tabsize: 2, height: 120,
                                                toolbar: [
                                                    ['style', ['style']], ['font', ['bold', 'underline', 'clear']],
                                                    ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']],
                                                    ['table', ['table']], ['insert', ['link']], ['view', ['codeview']]
                                                ]
                                            });
                                        </script><?php
                                    echo"</div></div>
                                    <div class='col-12 col-md-6' style='margin-bottom:15px'><div class='form-group'><label>Important Notes for Staff</label>
                                        <textarea id='' name='note_for_staff' class='form-control'>$note_for_staff</textarea>";
                                        ?><script>
                                            $('#summernote1').summernote({
                                                placeholder: 'Detail Note', tabsize: 2, height: 120,
                                                toolbar: [
                                                    ['style', ['style']], ['font', ['bold', 'underline', 'clear']],
                                                    ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']],
                                                    ['table', ['table']], ['insert', ['link']], ['view', ['codeview']]
                                                ]
                                            });
                                        </script><?php
                                    echo"</div></div>
                                    
                                    <input name='leadid' type='hidden' value='".$_GET["leadid"]."'>  
                                </div>
                            </fieldset>";
                        
                            echo"<hr><center>
                                <button class='btn btn-primary' type='submit' onmouseover='document.stage1.userid.value=document.datafrom.email.value'>Add Participant</button>
                            </center>
                        </form>";
                        ?> <script>
                            window.onload = function() {
                              document.getElementById("firstName").focus();
                            }
                        </script> <?php
                      
                    }else{
                        echo"<section class='scroll-section' id='validation'>";
                        
                            // ".$_COOKIE["ws_fname"]." | ".$_COOKIE["ws_lname"]." | ".$_COOKIE["ws_email"]." | ".$_COOKIE["ws_cid"]." | 
                            
                            echo"<div class='card wizard' id='wizardValidation'>
                                <div class='card-header border-0 pb-0'>
                                    <ul class='nav nav-tabs justify-content-center' role='tablist'>
                                        <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationFirst' role='tab'>
                                            <div class='mb-1 title d-none d-sm-block'>Create Project</div><div class='text-small description d-none d-md-block'>Client, Leader & Support</div>
                                        </a></li>
                                        <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationSecond' role='tab'>
                                            <div class='mb-1 title d-none d-sm-block'>Budget Scheduling</div><div class='text-small description d-none d-md-block'>Create Categorywise Budgeting</div>
                                        </a></li>
                                        <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationThird' role='tab'>
                                            <div class='mb-1 title d-none d-sm-block'>Schedule of Supports</div><div class='text-small description d-none d-md-block'>Budget Timeline & Item Number</div>
                                        </a></li>
                                        <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationForth' role='tab'>
                                            <div class='mb-1 title d-none d-sm-block'>Assign Service Agreement</div><div class='text-small description d-none d-md-block'>Service Agreement Information</div>
                                        </a></li>
                                        <li class='nav-item' role='presentation'><a class='nav-link text-center' href='#validationFifth' role='tab'>
                                            <div class='mb-1 title d-none d-sm-block'>Upload Documents </div><div class='text-small description d-none d-md-block'>Upload Categorized documents</div>
                                        </a></li>
                                        <li class='nav-item d-none' role='presentation'><a class='nav-link text-center' href='#validationLast' role='tab'></a></li>
                                    </ul>
                                </div><br>
                                
                                <div class='card-body sh-26'>
                                    <div class='tab-content'>";
                                        
                                        if(isset($_COOKIE["ws_fname"])) $firstName=$_COOKIE["ws_fname"];
                                        else $firstName=null;
                                        if(isset($_COOKIE["ws_lname"])) $lastName=$_COOKIE["ws_lname"];
                                        else $lastName=null;
                                        
                                        echo"<div class='tab-pane fade' id='validationFirst' role='tabpanel'>
                                            <h1>Create New Project for $firstName $lastName</h1><hr>
                                            <form method='post' name='stage1' id='dynamicForm' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                <div class='row'>";
                                                    $projectstatus=0;
                                                    $wsp1 = "select * from project where status='15' and clientid='".$_COOKIE["ws_cid"]."' order by id desc limit 1";
                                                    $wsp2 = $conn->query($wsp1);
                                                    if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) {
                                                        
                                                        $projectstatus=1;
                                                        
                                                        $sdate=date("Y-m-d",$wsp3["start_date"]);
                                                        $edate=date("Y-m-d",$wsp3["end_date"]);
                                                        
                                                        echo"<input type='hidden' name='processor' value='new_workspace_PROJECT'><input type='hidden' name='pid' value='".$wsp3["id"]."'>
                                                        <div class='col-12 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <input name='name' type='text' value='".$wsp3["name"]."' class='form-control' required onchange='this.form.submit();'>
                                                            <span>Project Name *</span>
                                                        </label></div>
                                                        <div class='col-6 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <select class='form-control m-b ' name='clientid' required >";
                                                                $s77 = "select * from uerp_user where mtype='CLIENT' and status='1' and id='".$wsp3["clientid"]."' order by id asc";
                                                                $r77 = $conn->query($s77);
                                                                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) { echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>"; } }
                                                            echo"</select>
                                                            <span>Client Name *</span>
                                                        </label></div>
                                                        <div class='col-6 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <span>Team Leader: * <a href='#' data-bs-toggle='tooltip' data-bs-html='true' title=\"You can add designation for Team Leader as - Support Co-Ordinator/Manager in <a href='index.php?url=employees.php&id=59' target='_top'><span style='color:white'>Add New Employee</span></a>\"><i data-acorn-icon='info-circle'></i></a></span>
                                                            <select class='form-control m-b ' name='leaderid' onchange='this.form.submit();'>";
                                                                if($wsp3["leaderid"]!=0) {
                                                                    $s7 = "select * from uerp_user where id='".$wsp3["leaderid"]."' and status='1' order by id asc limit 1";
                                                                    $r7 = $conn->query($s7);
                                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                                } else echo"<option value=''>Select Team Leader Name</option>";
                                                                $s7 = "select * from uerp_user where mtype='USER' and designation='20' and status='1' OR mtype='USER' and designation='10' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                            echo"</select>
                                                        </label></div>
                                                        
                                                        <div class='col-6 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <span>Priority *</span>
                                                            <select class='form-control m-b ' name='priority' onchange='this.form.submit();'>";
                                                                if(strlen($wsp3["priority"])>=2) echo"<option value='".$wsp3["priority"]."'>".$wsp3["priority"]."</option>";
                                                                echo"<option value='Medium'>Medium</option><option value='High'>High</option><option value='Low'>Low</option>
                                                            </select>
                                                        </label></div>";
                                                        
                                                        /*
                                                        <div class='col-6 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'><span>Support Co. Name *</span><input name='sc_name' type='text' value='".$wsp3["sc_name"]."' class='form-control' onchange='this.form.submit();'></label></div>
                                                        <div class='col-6 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'><span>Support Co. Phone *</span><input name='sc_phone' type='text' value='".$wsp3["sc_phone"]."' class='form-control' onchange='this.form.submit();'></label></div>";
                                                        */
                                                        
                                                        echo"<div class='col-6 col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <span>Plan Start Date *</span>
                                                            <input name='sdate' type='date' value='$sdate' required class='form-control' onchange='this.form.submit();'>
                                                        </label></div>
                                                        
                                                        <div class='col-6 col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <span>Plan Expected Closing Date *</span>
                                                            <input name='edate' type='date' value='$edate' required class='form-control' onchange='this.form.submit();'>
                                                        </label></div>";
                                                        
                                                        // <div class='col-6 col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'><span>Clock-In Time *</span><input name='stime' type='time' value='".$wsp3["stime"]."' class='form-control' onchange='this.form.submit();'></label></div>
                                                        // <div class='col-6 col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'><span>Clock-Out Time *</span><input name='etime' type='time' value='".$wsp3["etime"]."' class='form-control' onchange='this.form.submit();'></label></div>
                                                        
                                                        echo"<input name='stime' type='hidden' value='".$wsp3["stime"]."'><input name='etime' type='hidden' value='".$wsp3["etime"]."'>";
                                                        
                                                        echo"<div class='col-6 col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <span>Color</span>
                                                            <input name='pcolor' type='color' value='".$wsp3["color"]."' style='height:30px' class='form-control' onchange='this.form.submit();'>
                                                        </label></div>
                                                        
                                                        <div class='col-6 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <span for='optionSelect'>Managed Type *</span>
                                                            <select class='form-control m-b ' id='optionSelect' required name='managed_by' onchange='toggleFields();'>";
                                                                if(strlen($wsp3["managed_by"]>=4)) echo"<option value='".$wsp3["managed_by"]."'>".$wsp3["managed_by"]."</option>";
                                                                else echo"<option value=''>Select Manged Type</option>";
                                                                
                                                                // if(isset($_COOKIE["managed"]) && $_COOKIE["managed"]==3) echo"<option value='NDIA Managed'>NDIA Managed</option>";
                                                                // if(isset($_COOKIE["managed"]) && $_COOKIE["managed"]==3) echo"<option value='PLAN Managed'>PLAN Managed</option>";
                                                                // if(isset($_COOKIE["managed"]) && $_COOKIE["managed"]==2) echo"<option value='CARE Managed'>CARE Managed</option>";
                                                                
                                                                echo"<option value='NDIA Managed'>NDIA Managed</option>";
                                                                echo"<option value='PLAN Managed'>PLAN Managed</option>";
                                                                echo"<option value='SELF Managed'>SELF Managed</option>";
                                                                echo"<option value='PACE-NDIA Managed'>PACE-NDIA Managed</option>";
                                                                echo"<option value='PACE-PLAN Managed'>PACE-PLAN Managed</option>";
                                                            echo"</select>
                                                        </label></div>";
                                                        
                                                        if($wsp3["managed_by"]=="NDIA Managed") $status1=" "; 
                                                        else $status1="hidden";
                                                        if($wsp3["managed_by"]=="PLAN Managed") $status2=" "; 
                                                        else $status2="hidden";
                                                        if($wsp3["managed_by"]=="SELF Managed") $status3=" "; 
                                                        else $status3="hidden";
                                                        if($wsp3["managed_by"]=="CARE Managed") $status4=" "; 
                                                        else $status4="hidden";
                                                        if($wsp3["managed_by"]=="PACE-NDIA Managed") $status5=" "; 
                                                        else $status5="hidden";
                                                        if($wsp3["managed_by"]=="PACE-PLAN Managed") $status6=" "; 
                                                        else $status6="hidden";
                                                        
                                                        
                                                        echo"<div class='col-md-3 $status1' style='margin-bottom:25px' id='fieldsOption1'><label class='mb-3 top-label' for='field1'>
                                                            <span>Support Co-ordinator: <a href='#' data-bs-toggle='tooltip' data-bs-html='true' title=\"You can add designation (Support Co-Ordinator) in <a href='index.php?url=employees.php&id=59' target='_top'><span style='color:white'>Add New Employee</span></a>\"><i data-acorn-icon='info-circle'></i></a></span>
                                                            <select class='form-control m-b' name='teamleaderid1' id='field1' onchange='this.form.submit();'>";
                                                                if($wsp3["teamleaderid"]!=0){
                                                                    $s7x = "select * from uerp_user where id='".$wsp3["teamleaderid"]."' order by id asc limit 1";
                                                                    $r7x = $conn->query($s7x);
                                                                    if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>"; } }
                                                                } else echo"<option value=''>Select Support Co-Ordinator</option>";
                                                                $s7 = "select * from uerp_user where mtype='USER' and designation='20' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                            echo"</select>
                                                        </label></div>
                                                        
                                                        <div class='col-md-3 $status2' style='margin-bottom:25px' id='fieldsOption2'><label class='mb-3 top-label' for='field2'>
                                                            <span>Plan Manager: <a href='#' data-bs-toggle='tooltip' data-bs-html='true' title=\"You can add designation (Plan Manager) in <a href='index.php?url=employees.php&id=59' target='_top'><span style='color:white'>Add New Employee</span></a>\"><i data-acorn-icon='info-circle'></i></a></span>
                                                            <select class='form-control m-b' name='teamleaderid2' id='field2' onchange='this.form.submit();'>";
                                                                if($wsp3["teamleaderid"]!=0){
                                                                    $s7x = "select * from ndis_card_number where id='".$wsp3["teamleaderid"]."' order by id asc limit 1";
                                                                    $r7x = $conn->query($s7x);
                                                                    if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { echo"<option value='".$rs7x["id"]."'>".$rs7x["referrer"]." (".$rs7x["card_number"].")</option>"; } }
                                                                } else echo"<option value=''>Select Plan Manager</option>";
                                                                $s7 = "select * from ndis_card_number where status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rss7 = $r7->fetch_assoc()) { echo"<option value='".$rss7["id"]."'>".$rss7["referrer"]." (".$rss7["card_number"].")</option>"; } }
                                                            echo"</select>
                                                        </label></div>
                                                        
                                                        <div class='col-md-3 $status3' style='margin-bottom:25px' id='fieldsOption3'><label class='mb-3 top-label' for='field3'>
                                                            <span>Self Managed:</span>
                                                            <select class='form-control m-b' name='teamleaderid3' id='field3' onchange='this.form.submit();'>
                                                                <option value='".$_COOKIE["ws_cid"]."'>$firstName $lastName</option>
                                                            </select>
                                                        </label></div>
                                                        
                                                        <div class='col-md-3 $status4' style='margin-bottom:25px' id='fieldsOption4'><label class='mb-3 top-label' for='field4'>
                                                            <span><a href='#' data-bs-toggle='tooltip' data-bs-html='true' title=\"You can add as designation (Care Manager) in <a href=index.php?url=employees.php&id=59' target='_top'><span style='color:white'>Add New Employee</span></a>\"><i data-acorn-icon='info-circle'></i></a> Care Manager:</span>
                                                            <select class='form-control m-b' name='teamleaderid4' id='field4' onchange='this.form.submit();'>";
                                                                if($wsp3["teamleaderid"]!=0){
                                                                    $s7x = "select * from uerp_user where id='".$wsp3["teamleaderid"]."' order by id asc limit 1";
                                                                    $r7x = $conn->query($s7x);
                                                                    if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>"; } }
                                                                } else echo"<option value=''>Select Care Manager</option>";
                                                                $s7 = "select * from uerp_user where mtype='USER' and designation='18' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                            echo"</select>
                                                        </label></div>
                                                        
                                                        
                                                        <div class='col-md-3 $status5' style='margin-bottom:25px' id='fieldsOption5'><label class='mb-3 top-label' for='field5'>
                                                            <span>Support Co-ordinator: <a href='#' data-bs-toggle='tooltip' data-bs-html='true' title=\"You can add designation (Support Co-Ordinator) in <a href='index.php?url=employees.php&id=59' target='_top'><span style='color:white'>Add New Employee</span></a>\"><i data-acorn-icon='info-circle'></i></a></span>
                                                            <select class='form-control m-b' name='teamleaderid5' id='field6' onchange='this.form.submit();'>";
                                                                if($wsp3["teamleaderid"]!=0){
                                                                    $s7x = "select * from uerp_user where id='".$wsp3["teamleaderid"]."' order by id asc limit 1";
                                                                    $r7x = $conn->query($s7x);
                                                                    if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>"; } }
                                                                } else echo"<option value=''>Select Support Co-Ordinator</option>";
                                                                $s7 = "select * from uerp_user where mtype='USER' and designation='20' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                            echo"</select>
                                                        </label></div>
                                                        
                                                        <div class='col-md-3 $status6' style='margin-bottom:25px' id='fieldsOption6'><label class='mb-3 top-label' for='field6'>
                                                            <span>Plan Manager: <a href='#' data-bs-toggle='tooltip' data-bs-html='true' title=\"You can add designation (Plan Manager) in <a href='index.php?url=employees.php&id=59' target='_top'><span style='color:white'>Add New Employee</span></a>\"><i data-acorn-icon='info-circle'></i></a></span>
                                                            <select class='form-control m-b' name='teamleaderid6' id='field6' onchange='this.form.submit();'>";
                                                                if($wsp3["teamleaderid"]!=0){
                                                                    $s7x = "select * from ndis_card_number where id='".$wsp3["teamleaderid"]."' order by id asc limit 1";
                                                                    $r7x = $conn->query($s7x);
                                                                    if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) { echo"<option value='".$rs7x["id"]."'>".$rs7x["referrer"]." (".$rs7x["card_number"].")</option>"; } }
                                                                } else echo"<option value=''>Select PACE-Plan Manager</option>";
                                                                $s7 = "select * from ndis_card_number where status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rss7 = $r7->fetch_assoc()) { echo"<option value='".$rss7["id"]."'>".$rss7["referrer"]." (".$rss7["card_number"].")</option>"; } }
                                                            echo"</select>
                                                        </label></div>
                                                        
                                                        <div class='col-md-12' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                                            <span>Description/Note (Note for Support Workers)</span>
                                                            <textarea name='note' class='form-control' onchange='this.form.submit();'>".$wsp3["note"]."</textarea>
                                                        </label></div>";
                                                    } }
                                                    
                                                    ?><script>
                                                        function toggleFields() {
                                                            var selected = document.getElementById("optionSelect").value;
                                                        
                                                            document.getElementById("fieldsOption1").classList.add("hidden");
                                                            document.getElementById("fieldsOption2").classList.add("hidden");
                                                            document.getElementById("fieldsOption3").classList.add("hidden");
                                                            document.getElementById("fieldsOption4").classList.add("hidden");
                                                            document.getElementById("fieldsOption5").classList.add("hidden");
                                                            document.getElementById("fieldsOption6").classList.add("hidden");
                                                    
                                                            if (selected === "NDIA Managed") {
                                                                document.getElementById("fieldsOption1").classList.remove("hidden");
                                                            } else if (selected === "PLAN Managed") {
                                                                document.getElementById("fieldsOption2").classList.remove("hidden");
                                                            } else if (selected === "CARE Managed") {
                                                                document.getElementById("fieldsOption4").classList.remove("hidden");
                                                            } else if (selected === "SELF Managed") {
                                                                document.getElementById("fieldsOption3").classList.remove("hidden");
                                                            } else if (selected === "PACE-NDIA Managed") {
                                                                document.getElementById("fieldsOption5").classList.remove("hidden");
                                                            } else if (selected === "PACE-PLAN Managed") {
                                                                document.getElementById("fieldsOption6").classList.remove("hidden");
                                                            }
                                                        }
                                                    </script><?php
                                                echo"</div>
                                            </form>";
                                            
                                        echo"</div>";
                                        
                                        echo"<div class='tab-pane fade' id='validationSecond' role='tabpanel'>
                                                <div><h2>Budget Scheduling:</h2></div>";
                                                $wsp1 = "select * from project where status='15' and clientid='".$_COOKIE["ws_cid"]."' order by id desc limit 1";
                                                $wsp2 = $conn->query($wsp1);
                                                if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) { 
                                                    
                                                    echo"<form method='post' name='stage2a' action='workspace_processor.php' target='budgetmanagerx' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                        <iframe src='workspace_budget_schedule.php?pid=".$wsp3["id"]."' name='budgetmanagerx' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='800'>BROWSER NOT SUPPORTED</iframe>
                                                    </form>";
                                                    
                                                } }
                                            echo"</div>";
                                            
                                            echo"<div class='tab-pane fade' id='validationThird' role='tabpanel'>
                                                <div ><h2>Schedule of Supports:</h2></div>";
                                                $wsp1 = "select * from project where status='15' and clientid='".$_COOKIE["ws_cid"]."' order by id desc limit 1";
                                                $wsp2 = $conn->query($wsp1);
                                                if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) { 
                                                    
                                                    echo"<form method='post' name='stage2a' action='workspace_processor.php' target='budgetmanagerx' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                        <iframe src='workspace_budget.php?pid=".$wsp3["id"]."' name='budgetmanagerx' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='800'>BROWSER NOT SUPPORTED</iframe>
                                                    </form>";
                                                    
                                                } }
                                            echo"</div>";
                                        
                                            echo"<div class='tab-pane fade' id='validationForth' role='tabpanel'>
                                                <div><h2>Service Agreement With $firstName $lastName</h2></div><hr>";
                                                    
                                                    include 'ndia_managed_service_agreement.php';
                                                    
                                            echo"</div>";
                                            
                                            echo"<div class='tab-pane fade' id='validationFifth' role='tabpanel'>
                                                <div><h2>Upload Client Essential Documents:</h2></div>";
                                                $a01 = "select * from project where status='15' and clientid='".$_COOKIE["ws_cid"]."' order by id desc limit 1";
                                                $b01 = $conn->query($a01);
                                                if ($b01->num_rows > 0) { while($c01 = $b01->fetch_assoc()) {
                                                    echo"<form method='post' action='workspace_documents.php' id='image_upload_form' target='docmanager' enctype='multipart/form-data'>
                                                        <iframe src='workspace_documents.php?pid=".$c01["id"]."' name='docmanager' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='400'>BROWSER NOT SUPPORTED</iframe>
                                                    </form>";
                                                } }
                                        echo"</div>";
                                        
                                        
                                        echo"<div class='tab-pane fade' id='validationLast' role='tabpanel'>
                                            <div class='text-center mt-5'>";
                                                $ax = "select * from project where status='15' and clientid='".$_COOKIE["ws_cid"]."' order by id desc limit 1";
                                                $bx = $conn->query($ax);
                                                if ($bx->num_rows > 0) { while($cx = $bx->fetch_assoc()) {
                                                    $projectidz=$cx["id"];
                                                    $cid=$cx["clientid"];
                                                } }
                                                echo"<form method='post' name='stage2' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                    <input type='hidden' name='processor' value='new_workspace_PROJECT_done'>
                                                    <input type='hidden' name='pid' value='$projectidz'>
                                                    <input type='hidden' name='cid' value='$cid'>
                                                    <img src='img/weldone-character.png' style='height:250px'>
                                                    <button class='btn btn-icon btn-icon-start btn-primary' type='submit' onclick='this.form.submit();'><i data-acorn-icon='login'></i><span>Update & View $lastName`s Project</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                <div class='card-footer text-center border-0 pt-1'>
                                    <button class='btn btn-icon btn-icon-start btn-outline-primary btn-prev' type='button'><i data-acorn-icon='chevron-left'></i><span>Back</span></button>
                                    <button class='btn btn-icon btn-icon-end btn-outline-primary btn-next' type='button'><span>Next</span><i data-acorn-icon='chevron-right'></i></button>
                                </div>
                                
                            </div>
                        </section>";
                        
                        
                    }
                   
                echo"</div>
            </div>
        </div>
    </div>";
?>

