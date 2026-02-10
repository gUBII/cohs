<link href='css/plugins/c3/c3.min.css' rel='stylesheet'>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript" src="assets/js/jquery.signature.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/jquery.signature.css">
<style>
    .kbw-signature1 {
        width: 400px;
        height: 200px;
    }
    #sig1 canvas {
        width: 100% !important;
        height: auto;
    }
    .kbw-signature2 {
        width: 400px;
        height: 200px;
    }
    #sig2 canvas {
        width: 100% !important;
        height: auto;
    }
    .kbw-signature3 {
        width: 400px;
        height: 200px;
    }
    #sig3 canvas {
        width: 100% !important;
        height: auto;
    }
</style>

<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    $sheba="projects";
    $cid=90009;
    $title="Add New Project";
    $utype="PROJECTS/LEADS";
    if(!isset($project_signed)) $project_signed=0;
    if(!isset($transport_cost)) $transport_cost=0.00;
    if(!isset($start_date)) $start_date="";
    if(!isset($end_date)) $end_date="";
    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;

    echo"<div>
        <div class='row'>
            <div class='col-12 col-md-5' style='padding-bottom:10px'>
                <h1 class='mb-0 pb-0 display-4' id='title'>Client Service Agreement</h1>
                <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                    <ul class='breadcrumb pt-0'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=1'>Project & Communication Book</a></li>
                    </ul>
                </nav>
            </div>
            <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>            
                <a href='index.php?url=projects.php&pstat=1' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'><i class='fa fa-arrow-left'></i> Project Detail</a>
            
                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                    <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>New Project</span>
                </button>
                <a href='index.php?url=schedule.php' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'>
                    <i data-acorn-icon='clock'></i>&nbsp;&nbsp;<span>Schedules</span>
                </a>
                <a href='index.php?url=daily_shift_status.php' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'>
                    <i data-acorn-icon='clock'></i>&nbsp;&nbsp;<span>Daily Shifts</span>
                </a>                
            </div>
        </div>    

        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                <div>";

                    $pstatus=0;
                    $project_signed=0;
                    $a0 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id asc limit 1";
                    $b0 = $conn->query($a0);
                    if ($b0->num_rows > 0) { while($c0 = $b0->fetch_assoc()) {
                        $pstatus=1;
                        $projectidz=$c0["id"];
                        $projectname=$c0["name"];
                        $leaderid=$c0["leaderid"];
                        $clientid=$c0["clientid"];
                        
                        $start_date=date("Y-m-d",$c0["start_date"]);
                        $end_date=date("Y-m-d",$c0["end_date"]);
                        $project_signed=date("Y-m-d",$c0["project_signed"]);
                        $transport_cost=$c0["transport_cost"];
                        
                        $image1=$c0["image1"];
                        $image2=$c0["image2"];
                        $image3=$c0["image3"];
                        
                        $signature1=$c0["signature1"];
                        $signature11=strlen($signature1);
                        $signature2=$c0["signature2"];
                        $signature22=strlen($signature2);
                        $signature3=$c0["signature3"];
                        $signature33=strlen($signature3);
                        
                    } }
                
                    if($pstatus!=0){
                        $a1 = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                        $b1 = $conn->query($a1);
                        if ($b1->num_rows > 0) { while($c1 = $b1->fetch_assoc()) {
                            $cid=$c1["id"];
                            $cstatus=$c1["status"];
                            $cuid=$c1["unbox"];
                            $cgender=$c1["gender"]; 
                            $cname2=$c1["username"];
                            $cname="".$c1["username"]." ".$c1["username2"]."";
                            $cphone=$c1["phone"];
                            $cphone2=$c1["phone2"];
                            $cmobile=$c1["mobile"];
                            $cemail=$c1["email"];
                            $caddress=$c1["address"];
                            $ccity=$c1["city"];
                            $cstate=$c1["area"];
                            $czip=$c1["zip"];
                            $ccountry=$c1["country"];
                            $cdob=date("Y-m-d",$c1["dob"]);
                            $cnote=$c1["note"];
                            $clatitudex=$c1["latitude"];
                            $clongitudex=$c1["longitude"];
                            $aboutclient=$c1["aboutme"];
                            $mtype=$c1["mtype"];
                            $nomineename=$c1["nominee_name"];
                            $cndis=$c1["ndis"];
                            $representative_name=$c1["representative_name"];
                            
                            $cpname=$c1["cp_name"];
                            $cpphone1=$c1["cp_phone1"];
                            $cpphone2=$c1["cp_phone2"];
                            $cpmobile=$c1["cp_mobile"];
                            $cpemail=$c1["cp_email"];
                            $cpaddress=$c1["cp_address"];
                            
                            if($c1["images"]!=0) $cimage=$c1["images"];
                            else $cimage="img/noimage.jpg";
                            
                            $cemergency_contact_1=$c1["emergency_contact_1"];
                            $cemergency_relation_1=$c1["emergency_relation_1"];
                            $cemergency_phone_1=$c1["emergency_phone_1"];
                            $cemergency_email_1=$c1["emergency_email_1"];
                            $cemergency_contact_2=$c1["emergency_contact_2"];
                            $cemergency_relation_2=$c1["emergency_relation_2"];
                            $cemergency_phone_2=$c1["emergency_phone_2"];
                            $cemergency_email_2=$c1["emergency_email_2"];
                        } }
                    
                        $a2 = "select * from uerp_user where id='$leaderid' and status='1' order by id asc limit 1";
                        $b2 = $conn->query($a2);
                        if ($b2->num_rows > 0) { while($c2 = $b2->fetch_assoc()) { $leadername="".$c2["username"]." ".$c2["username"].""; } }
                    
                        echo"<div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                            <div class='tabs-container'>
                                <div class='panel-body'>
                                    <div class='row'>";
                                        $currenttime=time();
                                        $currentdate=date("Y-m-d",$currenttime);
                                        $ra1 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id asc";
                                        $rb1 = $conn->query($ra1);
                                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                            $sdate=date("d.m.Y",$rab1["start_date"]);
                                            $edate=date("d.m.Y",$rab1["end_date"]);
                                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                                            $rb2 = $conn->query($ra2);
                                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                $clientname1=$rab2["username"];
                                                $clientname2=$rab2["username2"];
                                                $clientimage=$rab2["images"];
                                            } }
                                            $ra3 = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                                            $rb3 = $conn->query($ra3);
                                            if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                                                $leadername1=$rab3["username"];
                                                $leadername2=$rab3["username2"];
                                                $leaderimage=$rab3["images"];
                                                $ra4 = "select * from departments where id='".$rab3["department"]."' order by id asc limit 1";
                                                $rb4 = $conn->query($ra4);
                                                if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $leaderdepartment=$rab4["department_name"]; } }
                                                
                                                $ra5 = "select * from designation where id='".$rab3["designation"]."' order by id asc limit 1";
                                                $rb5 = $conn->query($ra5);
                                                if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $leaderdesignation=$rab5["designation"]; } }
                                                
                                            } }
                                            /*
                                            echo"<div class='col-lg-4'>
                                                <div class='contact-box center-version' style='padding:5px;background-color:#fff;min-height:400px'>
                                                    <center>
                                                        <h2 class='m-b-xs'>".$rab1["name"]."</h2>
                                                        <span style='font-size:8pt'>Service Agreement Form</span><hr>
                                                        <table width='100%'><tr>
                                                            <td style='padding:3px;width:50%' align=center valign=top>
                                                                <img src='$clientimage' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>
                                                                <span style='font-size:10pt;color:black'>$clientname1 $clientname2</span><br>
                                                                <span style='font-size:8pt;color:black'>Participant</span><br>
                                                                <a href='index.php?smsbd=profile-view&profileid=".$rab1["clientid"]."' class='btn btn-xs' >View Profile</a>
                                                            </td>
                                                            <td style='padding:3px;width:50%' align=center valign=top>
                                                                <img src='$leaderimage' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>
                                                                <span style='font-size:10pt;color:black'>$leadername1 $leadername2</span><br>
                                                                <span style='font-size:8pt;color:black'>Support Co-ordinator</span><br>
                                                                <a href='index.php?smsbd=profile-view&profileid=".$rab1["leaderid"]."' class='btn btn-xs' >View Profile</a>
                                                            </td>
                                                        </tr></table><hr>
                                                        <span style='font-size:10pt;color:black;padding-bottom:10px'>Allocated Support Workers</span>
                                                        <table><tr>";
                                                            $tt=0;
                                                            $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' order by id asc";
                                                            $rb6 = $conn->query($ra6);
                                                            if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                                $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                                $rb7 = $conn->query($ra7);
                                                                if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                                    $tt=($tt+1);
                                                                    echo"<td style='padding:5px;line-height:1.2;' align=center valign=middle >
                                                                        <a href='index.php?smsbd=profile-view&profileid=".$rab7["id"]."'>
                                                                            <img src='".$rab7["images"]."' style='border:1px solid #ccc;border-radius:50%;width:40px;height:40px' title='".$rab7["username"]."'><br>
                                                                            <span style='font-size:8pt;color:black'>".$rab7["username"]."</span>
                                                                        </a>
                                                                    </td>";
                                                                    if($tt>=5){
                                                                        echo"</tr><tr>";
                                                                        $tt=0;
                                                                    }
                                                                } }
                                                            } }
                                                        echo"</tr></table>
                                                    </center>
                                                </div>
                                            </div>"; */
                                        } }
                                        
                                        echo"<div class='col-md-6'>
                                            <div class=' '>
                                                <h2>Service Agreement</h5>
                                                <form class='m-t' role='form' method='post' action='projectprocessor.php' name='form1' target='dataprocessor' enctype='multipart/form-data'>
                                                    <input type='hidden' name='processor' value='agreementdata1'><input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td>NDIS Number</td><td>:</td><td><input type='text' class=form-control name='client_nids' value='$cndis' onchange='this.form.submit()'></td></tr>
                                                        <tr><td>Date of Birth</td><td>:</td><td><input type='date' class=form-control name='client_dob' value='$cdob' onchange='this.form.submit()'></td></tr>
                                                        <tr><td>Participant / Participant’s representative</td><td>:</td><td><input type='text' class=form-control name='representative_name' value='$representative_name' onchange='this.form.submit()'></td></tr></td></tr>
                                                        <tr><td>Agreement Signed Date</td><td>:</td><td><input type='date' class=form-control name='project_signed' value='$project_signed' onchange='this.form.submit()'></td></td></tr>
                                                        <tr><td>Period From</td><td>:</td><td><input type='date' class=form-control name='project_start' value='$start_date' onchange='this.form.submit()'></td></tr>
                                                        <tr><td>Period To</td><td>:</td><td><input type='date' class=form-control name='project_end' value='$end_date' onchange='this.form.submit()'></td></td></tr>
                                                        
                                                        <tr><td>I Agree the travel costs could be claimed</td><td>:</td><td nowrap><table style='width:100%'><tr>
                                                            <td nowrap align=center><select name='transport_cost' required class='form-control' onchange='this.form.submit()'>
                                                                <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                                            </select></td>
                                                        </tr></table></td></td></tr>
                                                    </tbody></table>
                                                </form>
                                            </div>
                                        </div>

                                        <div class='col-md-6'>
                                            <div class=' ' style='background-color:#eeeee'>
                                                <h2>Participant information</h5>
                                                <form class='m-t' role='form' method='post' action='projectprocessor.php' name='form2' target='dataprocessor' enctype='multipart/form-data'>
                                                    <input type='hidden' name='processor' value='agreementdata2'><input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td>Nominee Name</td><td>:</td><td><input type='text' class=form-control name='nominee_name' value='$nomineename' onchange='this.form.submit()'></td></tr>
                                                        <tr><td>Participant Name</td><td>:</td><td><input type='text' class=form-control name='participant_name' value='$cname' readonly></td></tr></td></tr>
                                                        <tr><td>Phone # Day Time</td><td>:</td><td><input type='text' class=form-control name='phone_day' value='$cphone' onchange='this.form.submit()'></td></td></tr>
                                                        <tr><td>Phone # Night Time</td><td>:</td><td><input type='text' class=form-control name='phone_night' value='$cphone2' onchange='this.form.submit()'></td></tr>
                                                        <tr><td>Mobile #</td><td>:</td><td><input type='text' class=form-control name='mobile' value='$cmobile' onchange='this.form.submit()'></td></td></tr>
                                                        <tr><td>Email Address</td><td>:</td><td><input type='email' class=form-control name='email' value='$cemail' onchange='this.form.submit()'></td></td></tr>
                                                        <tr><td>Present Address</td><td>:</td><td><input type='text' class=form-control name='address' value='$caddress' onchange='this.form.submit()'></td></td></tr>
                                                    </tbody></table>
                                                </form>
                                            </div>
                                        </div>

                                        <div class='col-md-6'>
                                            <div class=' ' style='background-color:#eeeee'>
                                                <h2>Contact Person Detail</h5>
                                                <form class='m-t' role='form' method='post' action='projectprocessor.php' name='form2' target='dataprocessor' enctype='multipart/form-data'>
                                                    <input type='hidden' name='processor' value='agreementdata3'><input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td>Contact Name</td><td>:</td><td><input type='text' class=form-control name='cpname' value='$cpname' onchange='this.form.submit()'></td></tr></td></tr>
                                                        <tr><td>Contact Day Phone</td><td>:</td><td><input type='text' class=form-control name='cpphone1' value='$cpphone1' onchange='this.form.submit()'></td></td></tr>
                                                        <tr><td>Contact Night Phone</td><td>:</td><td><input type='text' class=form-control name='cpphone2' value='$cpphone2' onchange='this.form.submit()'></td></tr>
                                                        <tr><td>Contact Mobile</td><td>:</td><td><input type='text' class=form-control name='cpmobile' value='$cpmobile' onchange='this.form.submit()'></td></td></tr>
                                                        <tr><td>Contact Email</td><td>:</td><td><input type='email' class=form-control name='cpemail' value='$cpemail' onchange='this.form.submit()'></td></td></tr>
                                                        <tr><td>Contact Address</td><td>:</td><td><input type='text' class=form-control name='cpaddress' value='$cpaddress' onchange='this.form.submit()'></td></td></tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                            
                                        <div class='col-md-12'>
                                            <div style='background-color:#eeeee'>
                                                <h2>Service and support fee</h5>
                                                <p>Service fees are based on the price limit set out in the NDIS Price guide. The Provider agrees to provide the following support items:</p>
                                                <form class='m-t' role='form' method='post' action='projectprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                                    <input type='hidden' name='processor' value='agreementlist'><input type='hidden' name='id' value=''>
                                                    <table style='width:100%'>
                                                        <thead><tr ><th>Description</th><th>NDIS item #</th><th>Unit</th><th>Price</th><th>Qty & Frequency</th><th>Comments</th><th></th></tr></thead>
                                                        <tbody><tr>
                                                            <td><input type='text' class=form-control name='description' value='' required></td>
                                                            <td><input type='text' class=form-control name='ndis_item' value='' required></td>
                                                            <td><input type='text' class=form-control name='unit' value=''></td>
                                                            <td><input type='text' class=form-control name='price' value=''></td>
                                                            <td><input type='text' class=form-control name='qty' value=''></td>
                                                            <td><input type='text' class=form-control name='comments' value=''></td>
                                                            <td>
                                                                <input type='hidden' name='cid' value='$cid'><input type='hidden' name='pid' value='$projectidz'>
                                                                <input type='submit' class='btn btn-primary' value='Add' onblur=\"shiftdataV2('client-service-addons.php?cid=$cid&pid=$projectidz&sid=0', 'datashiftXX')\">
                                                            </td>
                                                        </tr></tbody>
                                                    </table>
                                                </form>
                                                <div style='width:100%' id='datashiftXX'>
                                                    <table class='table stripe table-hover' style='width:100%;padding:10px'>
                                                        <tbody>";
                                                            $ttx==0;
                                                            $r1 = "select * from service_agreement_addon where projectid='$projectidz' and clientid='$cid' and status='1' order by id desc";
                                                            $r1x = $conn->query($r1);
                                                            if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                                                echo"<tr class='gradeX'>
                                                                    <td nowrap>".$r1y["description"]."</td>
                                                                    <td nowrap>".$r1y["ndis_item"]."</td>
                                                                    <td nowrap>".$r1y["unit"]."</td>
                                                                    <td nowrap>".$r1y["price"]."</td>
                                                                    <td nowrap>".$r1y["qty"]."</td>
                                                                    <td nowrap>".$r1y["comments"]."</td>
                                                                    <td style='width:20px'><div class='btn-group'>
                                                                        <a href='#' data-bs-toggle='offcanvas' data-bs-placement='bottom' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('client-service-addons-manager.php?sid=".$r1y["id"]."&cid=$cid&pid=$projectidz', 'offcanvasRight')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>
                                                                    </td>
                                                                    <td style='width:20px'><div onmouseout=\"shiftdataV2('client-service-addons.php?cid=$cid&pid=$projectidz&sid=0', 'datashiftXX')\">
                                                                        <a href='deleterecords.php?delid=".$r1y["id"]."&tbl=service_agreement_addon' target='dataprocessor' style='margin-top:0px' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-trash'></i></a>
                                                                    </div></td>
                                                                </tr>";
                                                            } }
                                                        echo"</tbody>
                                                    </table>
                                                </div>"; ?>
                                                <script type="text/javascript">
                                                    function shiftdata(shiftid1,shiftid2){
                                                        $.ajax({
                                                            url: 'client-service-addons.php?<?php echo"cid=$cid&pid=$projectidz&" ?>sid='+shiftid1, 
                                                            success: function(html) {
                                                                var ajaxDisplay = document.getElementById(shiftid2);
                                                                ajaxDisplay.innerHTML = html;
                                                            }
                                                        });
                                                    }
                                                </script> <?php
                                            echo"</div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class=' ' style='background-color:#eeeee'><br>
                                                Participant`s e-Signature : <br>
                                                <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop1'>Add/View Digital Signature</button>
                                                <div class='modal fade' id='staticBackdrop1' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-xl'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='staticBackdropLabel'>Participant's Digital Signature</h5>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <iframe src='signatureimage.php?pid=$projectidz&signatureimage=1' name='esignature1' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='420'>BROWSER NOT SUPPORTED</iframe>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <a href='signatureimage.php?pid=$projectidz&signatureimage=1' target='esignature1'><button type='button' class='btn btn-success'>View Signature</button></a>
                                                                <a href='esignature.php?pid=$projectidz&clientid=$clientid&signature=1' target='esignature1'><button type='button' class='btn btn-primary'>Load Signature Pad</button></a>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <form class='m-t' role='form' method='post' action='projectprocessor.php' name='form2' target='dataprocessor' enctype='multipart/form-data'>
                                                    <input type='hidden' name='processor' value='agreementdata4'><input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                                                    OR Upload Signature Image: <a href='#' data-bs-toggle='modal' data-bs-target='#staticBackdrop4'>View Image</a><br>
                                                    <div class='modal fade' id='staticBackdrop4' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                        <div class='modal-dialog modal-xl'><div class='modal-content'>
                                                            <div class='modal-body'><iframe src='signatureimage.php?pid=$projectidz&signatureimage=4' name='esignature4' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='420'>BROWSER NOT SUPPORTED</iframe></div>
                                                            <div class='modal-footer'>
                                                                <a href='signatureimage.php?pid=$projectidz&signatureimage=4' target='esignature4'><button type='button' class='btn btn-success'>Reload Image</button></a>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                            </div>
                                                        </div></div>
                                                    </div>
                                                    <input type='file' name='image1[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'><br>
                                                    <table><tr>
                                                        <td><a id='clearBtn1' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' onclick='clearCanvas1();'>Clear</a></td>
                                                        <td><input type='submit' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' name='submit' value='Update Signature' onmouserover='saveSignature1();'></td>
                                                    </tr></table><br>
                                                </form>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class=' ' style='background-color:#eeeee'><br>
                                                Nominee's e-Signature :  <br>
                                                <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop2'>Add/View Digital Signature</button>
                                                <div class='modal fade' id='staticBackdrop2' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-xl'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='staticBackdropLabel'>Participant's Digital Signature</h5>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <iframe src='signatureimage.php?pid=$projectidz&signatureimage=2' name='esignature2' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='420'>BROWSER NOT SUPPORTED</iframe>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <a href='signatureimage.php?pid=$projectidz&signatureimage=2' target='esignature2'><button type='button' class='btn btn-success'>View Signature</button></a>
                                                                <a href='esignature.php?pid=$projectidz&clientid=$clientid&signature=2' target='esignature2'><button type='button' class='btn btn-primary'>Load Signature Pad</button></a>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <form class='m-t' role='form' method='post' action='projectprocessor.php' name='form2' target='dataprocessor' enctype='multipart/form-data'>
                                                    <input type='hidden' name='processor' value='agreementdata4'><input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                                                    OR Upload Signature Image: <a href='#' data-bs-toggle='modal' data-bs-target='#staticBackdrop5'>View Image</a><br>
                                                    <div class='modal fade' id='staticBackdrop5' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                        <div class='modal-dialog modal-xl'><div class='modal-content'>
                                                            <div class='modal-body'><iframe src='signatureimage.php?pid=$projectidz&signatureimage=5' name='esignature5' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='420'>BROWSER NOT SUPPORTED</iframe></div>
                                                            <div class='modal-footer'>
                                                                <a href='signatureimage.php?pid=$projectidz&signatureimage=5' target='esignature5'><button type='button' class='btn btn-success'>Reload Image</button></a>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                            </div>
                                                        </div></div>
                                                    </div>
                                                    <input type='file' name='image2[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'><br>
                                                    <table><tr>
                                                        <td><a id='clearBtn2' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' onclick='clearCanvas2();'>Clear</a></td>
                                                        <td><input type='submit' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' name='submit' value='Update Signature' onmouserover='saveSignature2();'></td>
                                                    </tr></table><br>
                                                </form>
                                            </div>
                                        </div>    
                                        <div class='col-md-4'>
                                            <div class=' ' style='background-color:#eeeee'><br>
                                                Provider's e-Signature :  <br>
                                                <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop3'>Add/View Digital Signature</button>
                                                <div class='modal fade' id='staticBackdrop3' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-xl'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='staticBackdropLabel'>Participant's Digital Signature</h5>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <iframe src='signatureimage.php?pid=$projectidz&signatureimage=3' name='esignature3' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='420'>BROWSER NOT SUPPORTED</iframe>
                                                            </div>
                                                            <div class='modal-footer'>
                                                                <a href='signatureimage.php?pid=$projectidz&signatureimage=3' target='esignature3'><button type='button' class='btn btn-success'>View Signature</button></a>
                                                                <a href='esignature.php?pid=$projectidz&clientid=$clientid&signature=1' target='esignature3'><button type='button' class='btn btn-primary'>Load Signature Pad</button></a>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <form class='m-t' role='form' method='post' action='projectprocessor.php' name='form2' target='dataprocessor' enctype='multipart/form-data'>
                                                    <input type='hidden' name='processor' value='agreementdata4'><input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                                                    OR Upload Signature Image: <a href='#' data-bs-toggle='modal' data-bs-target='#staticBackdrop6'>View Image</a><br>
                                                    <div class='modal fade' id='staticBackdrop6' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                        <div class='modal-dialog modal-xl'><div class='modal-content'>
                                                            <div class='modal-body'><iframe src='signatureimage.php?pid=$projectidz&signatureimage=6' name='esignature6' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='420'>BROWSER NOT SUPPORTED</iframe></div>
                                                            <div class='modal-footer'>
                                                                <a href='signatureimage.php?pid=$projectidz&signatureimage=6' target='esignature6'><button type='button' class='btn btn-success'>Reload Image</button></a>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                            </div>
                                                        </div></div>
                                                    </div>
                                                    <input type='file' name='image3[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'><br>
                                                    <table><tr>
                                                        <td><a id='clearBtn3' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' onclick='clearCanvas3();'>Clear</a></td>
                                                        <td><input type='submit' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' name='submit' value='Update Signature' onmouserover='saveSignature3();'></td>
                                                    </tr></table><br>
                                                </form>
                                            </div>
                                        </div>
                                        <div class='col-md-12'>
                                            <div style='background-color:#eeeee'><center><br><br><br><br>
                                                <a href='index.php?url=client-service-agreement-print.php&projectid=".$_GET["projectid"]."' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-lg' ><i data-acorn-icon='print'></i>&nbsp;&nbsp;<span>Print Service Agreement</span></a>
                                            </div>
                                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
?>

<script src="js/jquery.min.js"></script>
<script src="js/jq-signature.min.js"></script>

<script>

    // signature 1
    
	$(document).on('ready', function() {
		if ($('.js-signature1').length) {
			$('.js-signature1').jqSignature();
		}
	});

	function clearCanvas1() {
		$('.js-signature1').eq(1).jqSignature('clearCanvas');
		$("#signature64a").val('');
	}

	function saveSignature1() {
		$('#signature1').empty();
		var dataUrl = $('.js-signature1').eq(1).jqSignature('getDataURL');
		var img = $('<img>').attr('src', dataUrl);
		$('#signature1').append($('<p>').text("Here's your signature:"));
		$('#signature1').append(img);
		$("#signature64a").val(dataUrl);
	}
	
	$('.js-signature1').eq(1).on('jq.signature1.changed', function() {
		$('#saveBtn1').attr('disabled', false);
	});
	
	// signature 2
	
	$(document).on('ready', function() {
		if ($('.js-signature2').length) {
			$('.js-signature2').jqSignature();
		}
	});

	function clearCanvas2() {
		$('.js-signature2').eq(1).jqSignature('clearCanvas');
		$("#signature64b").val('');
	}

	function saveSignature2() {
		$('#signature2').empty();
		var dataUrl = $('.js-signature2').eq(1).jqSignature('getDataURL');
		var img = $('<img>').attr('src', dataUrl);
		$('#signature2').append($('<p>').text("Here's your signature:"));
		$('#signature2').append(img);
		$("#signature64b").val(dataUrl);
	}

	$('.js-signature2').eq(1).on('jq.signature2.changed', function() {
		$('#saveBtn2').attr('disabled', false);
	});
	
	// signature 3
	
	$(document).on('ready', function() {
		if ($('.js-signature3').length) {
			$('.js-signature3').jqSignature();
		}
	});

	function clearCanvas3() {
		$('.js-signature3').eq(1).jqSignature('clearCanvas');
		$("#signature64c").val('');
	}

	function saveSignature3() {
		$('#signature3').empty();
		var dataUrl = $('.js-signature3').eq(1).jqSignature('getDataURL');
		var img = $('<img>').attr('src', dataUrl);
		$('#signature3').append($('<p>').text("Here's your signature:"));
		$('#signature3').append(img);
		$("#signature64c").val(dataUrl);
	}

	$('.js-signature3').eq(1).on('jq.signature3.changed', function() {
		$('#saveBtn3').attr('disabled', false);
	});
	
</script>


<script type="text/javascript">
    var sig1 = $('#sig1').signature1({
        syncField: '#signature64a',
        syncFormat: 'PNG'
    });
    $('#clear1').click(function(e) {
        e.preventDefault();
        sig1.signature1('clear');
        $("#signature64a").val('');
    });
    
    var sig2 = $('#sig2').signature2({
        syncField: '#signature64b',
        syncFormat: 'PNG'
    });
    $('#clear2').click(function(e) {
        e.preventDefault();
        sig2.signature2('clear');
        $("#signature64b").val('');
    });
    
    var sig3 = $('#sig3').signature3({
        syncField: '#signature64c',
        syncFormat: 'PNG'
    });
    $('#clear3').click(function(e) {
        e.preventDefault();
        sig3.signature3('clear');
        $("#signature64c").val('');
    });
</script>