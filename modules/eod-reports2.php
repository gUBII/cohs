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
    // $mtype="ADMIN";
    
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>EOD Reports</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
            <form method='GET' class='form-inline mb-3'>
                <input type='hidden' name='url' value='".$_GET["url"]."'><input type='hidden' name='id' value='".$_GET["id"]."'>
                <div class='d-inline-block float-md-start me-1 mb-1 search-input-container border border-separator bg-foreground search-sm'>
                    <input class='form-control form-control-sm datatable-search' placeholder='Search' value='$searchx' type='text' name='search' id='myInput' style='width:150px'/>
                    <button type='submit' class='btn btn-icon btn-icon-start w-md-auto btn-sm' style='position:absolute;z-index:999;margin-top:-30px;margin-left:112px'><i data-acorn-icon='search'></i></button>
                </div>
                <div class='btn-group ms-1 check-all-container'>
                    <div class='d-inline-block'>
                        <table><tr>
                            <td><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'><i data-acorn-icon='refresh-horizontal'></i></a></td>
                            <td><a href='index.php?url=eod.php'>
                                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                    <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Add New EOD</span>
                                </button>
                            </a></td>
                            <td><button type='button' id='delete_selected_btn' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'><i data-acorn-icon='bin'></i></button></td>
                            <td><button type='button' id='edit_selected_btn' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'><i data-acorn-icon='edit'></i></button></td>
                        </tr></table>
                    </div>
                </div>
            </form>
        </div>                  
    </div>    
    <div class='data-table-rows slim' id='sample'>";
    
    if($mtype=="ADMIN") {
        
        echo"<form id='form' method='get' class='wizard-big' action='excel/export_excel.php' target='dataprocessor' name='outputform' enctype='multipart/form-data'> 
            <table style='width:100%'><tr>
                <td align=left>";
                    if(isset($_GET["editid"])) echo"<a href='https://app.goodwillcare.net/index.php?smsbd=reporting-forms&kroyee=eod-reports&sheba=1708323155'>Back to Report</a>";
                echo"</td>
                <td stylle='width:500px'>
                    <table align=right>
                        <tr>
                            <td>
                                <select class='form-control m-b required' name='employeedata' required style='margin-top:-15px;width:150px'>
                                <option value=''>Support Worker</option><option value='ALL'>All Support Worker</option>";
                                $s7 = "select * from uerp_user where mtype='USER' and status<>'4' OR mtype='EMPLOYEE' and status<>'4' OR mtype='ADMIN' and status<>'4' order by username asc";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                } }
                                echo"</select>
                            </td><td>
                                <select class='form-control m-b required' name='clientdata' required style='margin-top:-15px;height:35px;width:150px'>
                                <option value=''>Client</option><option value='ALL'>All Clients</option>";
                                $s71 = "select * from uerp_user where mtype='CLIENT' and status<>'4' order by username asc";
                                $r71 = $conn->query($s71);
                                if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                    echo"<option value='".$rs71["id"]."'>".$rs71["username"]." ".$rs71["username2"]."</option>";
                                } }
                                echo"</select>
                            </td><td>
                                <input type=date name='date_from' class='form-control' style='margin-top:-14px;width:200px'>
                            </td><td>
                                <input type=date name='date_to' class='form-control' style='margin-top:-14px;width:200px'>
                            </td><td>
                                <input type=submit value='EXCEL' class='btn btn-icon btn-icon-only btn-outline-primary btn-sm' style='margin-top:-14px;width:100px' onmouseover=\"document.outputform.pointer.value='EXCEL'\">
                            </td>
                            <td>
                                <input type=submit value='PDF' class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' style='margin-top:-14px;width:100px' onmouseover=\"document.outputform.pointer.value='PDF'\">
                            </td>
                            <td>
                                <input type=submit value='PRINT' class='btn btn-icon btn-icon-only btn-outline-tertiary btn-sm' style='margin-top:-14px;width:100px' onmouseover=\"document.outputform.pointer.value='PRINT'\">
                            </td>
                        </tr>
                    </table>
                </td>
                
            </tr></table>
            <input type=hidden name='smsbd' value='reporting-forms'><input type=hidden name='kroyee' value='eod-csv-reports'>
            <input type=hidden name='sheba' value='1708323155'><input type=hidden name='pointer' value=''>
        </form><br><br>";
    }
    
    if(isset($_GET["editid"])){
        echo"<table style='width:100%'><tr><td><hr>";   
            include("eod_edit.php");
        echo"</td></tr></table>";
    }
    if(isset($_GET["postid"])){
        if($designation=="6"){
            $rax = "select * from eod where id='".$_GET["postid"]."' and status='1' order by id desc limit 1";
        }else{
            if($mtype=="ADMIN") $rax = "select * from eod where id='".$_GET["postid"]."' and status='1' order by id desc limit 1";
            else $rax = "select * from eod where id='".$_GET["postid"]."' and employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
        }
        $rbx = $conn->query($rax);
        if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) {
            $eod_date=date("d-m-y H:m", $rabx["eod_date"]);
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
                    <div class='col-lg-12'><h2>End Of Day (EOD) Report: ID-".$_GET["postid"]." </h2><br></div>
                </div>
                <br>
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
            </div>
            <center>
                <a href='#' class='btn' onclick=\"printDiv('printArea')\" style='width:95px;border-radius:50px;padding:5px;padding-left:10px;padding-right:10px;' class='dropdown-item'>Print Report</a><br><br><br><br><br><br>
            </center>";
            ?>
            <script>
                function printDiv(divID) {
                    var divElem = document.getElementById(divID).innerHTML;
                    var printWindow = window.open('', '', 'height=210,width=350'); 
                    printWindow.document.write('<html><head><title></title></head>');
                    printWindow.document.write('<body>');
                    printWindow.document.write(divElem);
                    printWindow.document.write('</body>');
                    printWindow.document.write ('</html>');
                    printWindow.document.close();
                    printWindow.print();
                }
            </script><?php
            
            echo"<hr>";
            
            // ".$rabx[""]."  eod_behavior_scale, eod_communication_scale, eod_mobility_scale, eod_socialize_scale, eod_learn_scale, eod_notification_scale, eod_engagement_scale, eod_manage_scale, eod_risk_scale                    
            // eod_suggest_note, eod_suggest_overall_note
                
        } }
    }

    if(!isset($_GET["editid"])){
        echo"<div class='data-table-responsive-wrapper'>
            <div style='text-align:right'>
                
            </div>";
            
            $db_table="eod";
            $table_field="id";
            
            $records_per_page = 10;

            // Handle delete request
            if (isset($_POST['delete_selected']) && isset($_POST['data_ids'])) {
                $ids_to_delete = implode(",", array_map('intval', $_POST['data_ids']));
                mysqli_query($conn, "DELETE FROM $db_table WHERE $table_field IN ($ids_to_delete)");
            }
        
            // Handle edit request
            if (isset($_POST['edit_selected']) && isset($_POST['data_ids']) && isset($_POST['edit_field']) && isset($_POST['edit_value'])) {
                $ids_to_edit = implode(",", array_map('intval', $_POST['data_ids']));
                $edit_field = mysqli_real_escape_string($conn, $_POST['edit_field']);
                $edit_value = mysqli_real_escape_string($conn, $_POST['edit_value']);
                mysqli_query($conn, "UPDATE $db_table SET $edit_field = '$edit_value' WHERE $table_field IN ($ids_to_edit)");
            }
            
            // Get search term from URL (if any)
            $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : "";
        
            // Get current page from URL, default to 1 if not set
            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $records_per_page;
            
            $t=0;
            $search_condition = "";
            if (!empty($search)) {
                $search_condition = "AND eod_date LIKE '%$search%'";
            }
            $searchx=htmlspecialchars($search);
            $searchu=urlencode($search);
            
            
            // Get total number of records after search filter
            if($designationy==17) $total_records_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM $db_table WHERE clientid='".$_GET["clientid"]."' AND status='1' $search_condition");
            else if($designationy==13) $total_records_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM $db_table WHERE status='1' $search_condition");
            else  $total_records_query = mysqli_query($conn, "SELECT COUNT(*) AS total FROM $db_table WHERE employeeid='".$_COOKIE["userid"]."' AND status='1' $search_condition");
            $total_records_row = mysqli_fetch_assoc($total_records_query);
            $total_records = $total_records_row['total'];
            $total_pages = ceil($total_records / $records_per_page);

            // Showing Results.
            if($designationy==17) $query = "SELECT * FROM $db_table WHERE clientid='".$_GET["clientid"]."' AND status='1' $search_condition ORDER BY $table_field ASC LIMIT $offset, $records_per_page";
            else if($designationy==13) $query = "SELECT * FROM $db_table WHERE status='1' $search_condition ORDER BY $table_field ASC LIMIT $offset, $records_per_page";
            else $query = "SELECT * FROM $db_table WHERE employeeid='".$_COOKIE["userid"]."' AND status='1' $search_condition ORDER BY $table_field ASC LIMIT $offset, $records_per_page";
            $result = mysqli_query($conn, $query);
            
            echo"<form method='POST' id='dataForm'>
                <table class='table table-bordered table-striped'>
                    <thead class='thead-dark'>
                        <tr>
                            <th><input type='checkbox' id='select_all'></th>
                            <th class='text-muted text-small text-uppercase'>Date</th>
                            <th class='text-muted text-small text-uppercase'>Support W. & Participant</th>
                            <th class='text-muted text-small text-uppercase'>Shift & Activity</th>
                            <th class='text-muted text-small text-uppercase'>behavior & Positive</th>
                            <th class='text-muted text-small text-uppercase'>Comm. & Team</th>
                            <th class='text-muted text-small text-uppercase'>Mobility & Learn</th>
                            <th class='text-muted text-small text-uppercase'>Notificaion & Manage</th>
                            <th class='text-muted text-small text-uppercase'>Risk & Doc</th>
                            <th class='empty'></th>
                        </tr>
                    </thead>
                    <tbody>";
                        while($rab1 = mysqli_fetch_assoc($result)){
                            $t=($t+1);
                            
                            $eod_date=date("d-m-y H:m", $rab1["eod_date"]);
                            // $incident_date=date("d-m-y", $rab1["incidentdate"]);
                            $incident_date="";
                            $clientname="";
                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            $employeename="";
                            $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            $shiftname="";
                            $ra2 = "select * from shift where id='".$rab1["shiftid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $shiftname= $rab2["shift_name"]; } }
                            
                            // $namex=htmlspecialchars($row["name"]);
                            echo"<tr>
                                <td><input type='checkbox' name='data_ids[]' value=".$rab1["id"]."></td>
                                <td nowrap>ID: ".$rab1["eod_date"]."-".$rab1["id"]."<br>$eod_date<br>";
                                    if(!isset($_GET["clientid"])) echo"<a href='index.php?url=eod-reports.php&id=0&sheba=$sheba&postid=".$rab1["id"]."'>";
                                    else echo"<a href='index.php?url=eod-reports.php&id=0&sheba=$sheba&postid=".$rab1["id"]."&clientid=".$_GET["clientid"]."'>";
                                        echo"<i class='fa fa-eye'></i>&nbsp;View";
                                    echo"</a>&nbsp;&nbsp;";
                                
                                    if(!isset($_GET["clientid"])) echo"<a href='index.php?url=eod-reports.php&id=0&sheba=$sheba&editid=".$rab1["id"]."'><i class='fa fa-edit'></i>&nbsp;Edit</a>&nbsp;&nbsp;";
                                    else echo"<a href='#'><i class='fa fa-edit'></i>&nbsp;Edit</a>&nbsp;&nbsp;";
                                
                                    if(!isset($_GET["clientid"])) echo"<a href='#'><i class='fa fa-delete'></i>&nbsp;Delete</a>";
                                    else echo"<a href='#'><i class='fa fa-delete'></i>&nbsp;Delete</a>";
                                echo"</td>
                                <td>SW: $employeename<br>P: $clientname</td>
                                <td>".$rab1["shiftid"]."<br>".$rab1["activityid"]."</td>
                                <td>".$rab1["eod_behavior"]."<br>".$rab1["eod_behavior_positive"]."</td>
                                <td>".$rab1["eod_communication"]."<br>".$rab1["eod_communication_team"]."</td>
                                <td>".$rab1["eod_mobility"]."<br>".$rab1["eod_learn"]."</td>
                                <td>".$rab1["eod_notification"]."<br>".$rab1["eod_manage"]."</td>
                                <td>".$rab1["eod_risk"]."<br>".$rab1["eod_document"]."</td>
                                <td></td>
                            </tr>";
                        }
                    echo"</tbody>
                </table>
            </form>";
            
            echo"<div style='text-align:right;width:100%'>
                <nav aria-label='Page navigation example'><center>
                    <ul class='pagination'>
                        <li class='page-item'>";
                        
                        // First Page
                        if ($page <= 1) $ed="disabled";
                        else $ed="";
                        echo"<li class='page-item $ed'>
                            <a class='page-link' href='index.php?url=".$_GET["url"]."&page=1&search=$searchu' aria-label='First'>
                                <i data-acorn-icon='arrow-end-left'></i>
                            </a>
                        </li>";
                        
                        // Previous Page
                        echo"<li class='page-item $ed'>";
                            ?><a class='page-link' aria-label='Previous' href="?url=<?php echo $_GET["url"]; ?>&page=<?php echo ($page > 1) ? ($page - 1) : 1; ?>&search=<?php echo urlencode($search); ?>"><?php
                                echo"<i data-acorn-icon='arrow-left'></i>
                            </a>
                        </li>";
                        
                        // Page Numbers
                        $visible_pages = 5;
                        $start = max(1, $page - floor($visible_pages / 2));
                        $end = min($total_pages, $start + $visible_pages - 1);
        
                        if ($end - $start < $visible_pages - 1) {
                            $start = max(1, $end - $visible_pages + 1);
                        }
        
                        for ($i = $start; $i <= $end; $i++){
                            if ($i == $page) $pga="active";
                            else $pga="";
                            echo"<li class='page-item $pga'>";
                                ?><a class="page-link" href="?url=<?php echo $_GET["url"]; ?>&page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"><?php echo $i; ?></a><?php
                            echo"</li>";
                        }
                        
                        // Next Page
                        if ($page >= $total_pages) $pgn="disabled";
                        else $pgn="";
                        echo"<li class='page-item $pgn'>";
                            ?><a class="page-link" aria-label='Next' href="index.php?url=<?php echo $_GET["url"]; ?>&page=<?php echo ($page < $total_pages) ? ($page + 1) : $total_pages; ?>&search=<?php echo urlencode($search); ?>"><?php
                                echo"<i data-acorn-icon='arrow-right'></i>
                            </a>
                        </li>";
                        
                        // Last Page
                        echo"<li class='page-item'>
                            <a class='page-link' href='index.php?url=".$_GET["url"]."&page=$total_pages&search=$searchu' aria-label='Last'>
                                <i data-acorn-icon='arrow-end-right'></i> 
                            </a>
                        </li>
                    </ul>
                </nav> 
            </div>
        </div>
        
        <div id='editModal' class='modal' style='display:none;'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h4 class='modal-title'>Edit Selected Records</h4>
                        <button type='button' class='close' onclick=\"$('#editModal').hide();\">&times;</button>
                    </div>
                    <div class='modal-body'>
                        <label for='edit_field'>Field:</label>
                        <select id='edit_field' class='form-control'>
                            <option value='name'>Name</option>
                            <option value='class'>Class</option>
                            <option value='section'>Section</option>
                            <option value='roll'>Roll</option>
                            <option value='gender'>Gender</option>
                        </select>
                        <label for='edit_value'>New Value:</label>
                        <input type='text' id='edit_value' class='form-control'>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-primary' id='confirm_edit'>Save Changes</button>
                        <button type='button' class='btn btn-secondary' onclick=\"$('#editModal').hide();\">Cancel</button>
                    </div>
                </div>
            </div>
        </div>";
    }
    
?>
<script>
        $(document).ready(function() {
            $('#select_all').click(function() {
                $('input[name="data_ids[]"]').prop('checked', this.checked);
            });

            $('#delete_selected_btn').click(function() {
                if (confirm('Are you sure you want to delete the selected records?')) {
                    $('#deleteForm').append('<input type="hidden" name="delete_selected" value="1">');
                    $('#deleteForm').submit();
                }
            });
            
            $('#edit_selected_btn').click(function() {
                $('#editModal').show();
            });
            
            $('#confirm_edit').click(function() {
                let field = $('#edit_field').val();
                let value = $('#edit_value').val();
                $('<input>').attr({ type: 'hidden', name: 'edit_selected', value: '1' }).appendTo('#dataForm');
                $('<input>').attr({ type: 'hidden', name: 'edit_field', value: field }).appendTo('#dataForm');
                $('<input>').attr({ type: 'hidden', name: 'edit_value', value: value }).appendTo('#dataForm');
                $('#dataForm').submit();
            });
        });
    </script>
    