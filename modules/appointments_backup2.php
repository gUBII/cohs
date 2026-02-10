<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet'>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
<style>
    .sidebar {
        position: fixed;
        top: 0;
        right: -330px;
        width: 330px;
        height: 100%;
        background-color: #f4f4f4;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
        overflow-y: auto;
        padding: 20px;
        transition: right 0.3s ease;
        z-index: 1000;
    }
    .sidebar.open {
        right: 0;
    }
    .sidebar header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .sidebar header h2 {
        margin: 0;
        font-size: 20px;
    }
    .sidebar header .close-btn {
        background: none;
        border: none;
                font-size: 24px;
                cursor: pointer;
                color: #333;
            }
            .sidebar form {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            
            
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }
            .overlay.active {
                display: block;
            }
            
</style>
<?php
    
    $refurl="projects";
    
    if(isset($_GET["prjsrc"])){
        $projectidx=$_GET["prjsrc"];
        $r1 = "select * from project where id='".$_GET["prjsrc"]."' and status='1' order by id asc limit 1";
        $r2 = $conn->query($r1);
        if ($r2->num_rows > 0) { while($r3 = $r2->fetch_assoc()) {
            $r4 = "select * from uerp_user where id='".$r3["clientid"]."' order by id asc limit 1";
            $r5 = $conn->query($r4);
            if ($r5->num_rows > 0) { while($r6 = $r5->fetch_assoc()) {
                $pclientid = $r6["id"];
                $pclientname1 = $r6["username"];
                $pclientname2 = $r6["username2"];
            } }
            $teamleaderid=$r3["teamleaderid"];
            $caseid=$r3["caseid"];
            $leaderid=$r3["leaderid"];
        } }
    }else{
        $projectidx=0;
    }
    
    echo"<div class='container'>
        <div class='page-title-container'>
            <div id='calendar-container'>
                <div class='row'>
                    <div class='col-12 col-md-5' style='padding-bottom:10px'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Shift Manager (Calendar View)</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=1'>Calendar</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
                    
                        <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                            
                            <a href='index.php?url=projects.php&pstat=1' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'><i class='fa fa-arrow-left'></i> Project Detail</a>
                        
                            <a href='index.php?url=appointments.php&viewstatus=1' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'>
                                <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>View All</span>
                            </a>
                            
                            <button type=button onclick='printPDF()' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'><i class='fa fa-download'></i> Download</button>";
                            
                            // <button type=button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                                // <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Option' ><i data-acorn-icon='save'></i> <i data-acorn-icon='tools'></i> Repeating</span>
                            // </button>
                            
                            // <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>";
                                // echo"<a href'#' onmouseover=\"document.forms['wcopy'].repeating.value='WEEK'\" onclick=\"document.forms['wcopy'].submit();\">Week</a>";
                                // echo"<a href'#' onmouseover=\"document.forms['wcopy'].repeating.value='FORTHNIGHT'\" onclick=\"document.forms['wcopy'].submit();\">Forthnight</a>";
                                // echo"<a href'#' onmouseover=\"document.forms['wcopy'].repeating.value='MONTH'\" onclick=\"document.forms['wcopy'].submit();\">Month</a>";
                            // echo"</div>
                        echo"</form>";
                        
                        echo"<button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                             <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Option' ><i data-acorn-icon='save'></i> <i data-acorn-icon='tools'></i> Repeating</span>
                        </button>
                        <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>";
                            // echo"<a href='#' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#schedulecopyday'>Copy Day</a>";
                            echo"<a href='#' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#schedulecopyweek'>Copy/Repeat Week</a>";
                            echo"<a href='#' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#schedulecopymonth'>Copy/Repeat Month</a>";
                            // echo"<a href='#' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#scheduledeleteweek'>Wipe A Week</a>";
                        echo"</div>";
                        
                        
                        // COPY TO CERTAIN DATE
                        echo"<div class='modal fade modal-close-out' id='schedulecopyday' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Date To Date</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body' style='padding:5px'>
                                            <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                            				    <input type='hidden' name='processor' value='cloneday'><input type='hidden' name='id' value=''>
                            				    <input type='hidden' name='redirect' value='schedule-board'>
                            				    <div class='modal-body'>
                                                    <div class='row'>
                            				            <div class='col-md-12'><div class='form-group'>
                            				                <label>Project Name *</label>
                            				                <select class='form-control m-b ' name='employeeid' required>
                                                                <option value='ALL'>All Employee</option>";
                                                                /*
                                                                $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                                } }
                                                                */
                                                                $copydate=time();
                                                                $copydate=date("Y-m-d", $copydate);
                                                        echo"</select></div></div>
                                                        <div class='col-md-6'><div class='form-group'>
                            				                <label>DATE FROM *</label>
                            				                <input type='date' id='datepicker' name='datefrom' class='form-control' value='$copydate' required>
                                                        </div></div>
                                                        <div class='col-md-6'><div class='form-group'>
                            				                <label>TO DATE *</label>
                            				                <input type='date' id='datepicker' name='dateto' class='form-control' value='' required>
                                                        </div></div>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                                    <input type='submit' class='btn btn-primary recordupdated' value='Clone Day' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datatableX')\"> 
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        // COPY TO CERTAIN WEEK
                        echo"<div class='modal fade modal-close-out' id='schedulecopyweek' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy/Repeat Week</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body' style='padding:5px'>
                                            <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                            				    <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='viewstatus' value='".$_GET["viewstatus"]."'>
                            				    <input type=hidden name='prjsrc' value='".$_GET["prjsrc"]."'><input type='hidden' name='redirect' value='".$_GET["url"]."'>
                            				    <input type='hidden' name='employeeid' value='ALL'><input type='hidden' name='processor' value='repeating_process'>
                            				    <input type='hidden' name='repeating' value='WEEK'>
                            				    <div class='modal-body'>
                                                    <div class='row'>
                            				            <div class='col-md-6'><div class='form-group'><label>Week From *</label><input type='week' id='weekfrom' class='form-control' name='weekfrom'></div></div>
                                                        <div class='col-md-6'><div class='form-group'><label>Week To *</label><input type='week' id='weekto' class='form-control' name='weekto'></div></div>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                                    <input type='submit' class='btn btn-primary recordupdated' value='Repeat/Copy Week'>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        // COPY TO CERTAIN MONTH
                        echo"<div class='modal fade modal-close-out' id='schedulecopymonth' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy/Repeat Month</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body' style='padding:5px'>
                                            <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>";
                                                $currentmonth = date('Y-m', time()); 
                                                $nextmonth = date('Y-m', strtotime('+1 month'));
                            				    echo"<input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='viewstatus' value='".$_GET["viewstatus"]."'>
                            				    <input type=hidden name='prjsrc' value='".$_GET["prjsrc"]."'><input type='hidden' name='redirect' value='".$_GET["url"]."'>
                            				    <input type='hidden' name='employeeid' value='ALL'><input type='hidden' name='processor' value='repeating_process'>
                            				    <input type='hidden' name='repeating' value='MONTH'>
                            				    <div class='modal-body'>
                                                    <div class='row'>
                            				            <div class='col-md-6'><div class='form-group'><label>Month From *</label><input type='month' class='form-control' name='monthfrom' value='$currentmonth'></div></div>
                                                        <div class='col-md-6'><div class='form-group'><label>Month To *</label><input type='month' class='form-control' name='monthto' value='$nextmonth'></div></div>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                                    <input type='submit' class='btn btn-primary recordupdated' value='Repeat/Copy Month'>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        // WIPE TO CERTAIN WEEK
                        echo"<div class='modal fade modal-close-out' id='scheduledeleteweek' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Week</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body' style='padding:5px'>
                                            <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                            				    <input type='hidden' name='processor' value='wipeweek'><input type='hidden' name='id' value=''>
                            				    <input type='hidden' name='redirect' value='schedule-board'>
                            				    <div class='modal-body'>
                                                    <div class='row'>
                            				            <div class='col-md-6'><div class='form-group'>
                            				                <label>Employee/User Name *</label>
                            				                <select class='form-control m-b ' name='employeeid' required>
                                                                <option value='ALL'>All Employee</option>";
                                                                /*
                                                                $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                                } }
                                                                */
                                                        echo"</select></div></div>
                                                        <div class='col-md-6'><div class='form-group'>
                            				                <label>SELECE A WEEK TO WIPE *</label>
                            				                <input type='week' id='weekpicker' name='weekto' required class='form-control' value=''>
                                                        </div></div>
                                                    </div>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                                    <input type='submit' class='btn btn-primary' value='Wipe This Week' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
            
                        // Drag & Drop Choice Modal
                        echo"<div class='modal fade' id='dragChoiceModal' tabindex='-1' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Drop Action</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='dragChoiceClose'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='mb-2'>Do you want to <b>copy</b> this shift to the new date/time or <b>move</b> it?</div>
                                        <div class='small text-muted' id='dragChoiceDetails'></div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' id='btnDropCancel' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Cancel</button>
                                        <button type='button' id='btnDropCopy' class='btn btn-outline-success'>Copy</button>
                                        <button type='button' id='btnDropMove' class='btn btn-outline-primary'>Move</button>
                                    </div>
                                </div>
                            </div>
                        </div>";

                        /*
                        <a href='#' class='btn btn-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#budgetshift' style='margin-right:10px'><i class='fa fa-recycle'></i> Repeating</span></a>
                        
                        <div class='modal fade' id='budgetshift' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog modal-semi-full modal-dialog-centered'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Repeating Rosters</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <iframe src='datarpocessor.php?processor=cloneweek&id=1&url=appointments.php&employeeid=ALL' name='budgetmanagery' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='550'>BROWSER NOT SUPPORTED</iframe>
                                        <a style='margin-left:-70px;margin-top:-20px;position:absolute;color:purple;align:right' href='workspace_budget_shifts.php?pid=".$_GET["prjsrc"]."' class='btn' target='budgetmanagery' title='Reload Data'><i class='fa fa-refresh' style='color:purple'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        */
                    echo"</div>
                </div>
            </div>";
            
            if(isset($_GET["viewstatus"])){
                $projectname="Showing All Client Projects";
                echo"<div class='col-12 col-md-12'>
                    <form method='get' action='index.php'>
                        <input type=hidden name=url value='appointments.php'><input type=hidden name=viewstatus value='2'>
                        <table width=100% ><tr>
                            <td>"; ?>
                                <script src='https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'></script>
                                <style>
                                    .select2-container--default .select2-selection--single {
                                        background-color: white;
                                        color: black;
                                        height: 40px;
                                        
                                    }
                                    .select2-container--default .select2-selection--single .select2-selection__rendered {
                                        color: black;
                                        line-height: 30px;
                                    }
                                    .select2-container--default .select2-results > .select2-results__options {
                                        background-color: white;
                                        color: black;
                                    }
                                    .select2-container--default .select2-results__option--highlighted[aria-selected] {
                                        background-color: orange;
                                        color: black;
                                    }
                                </style><?php
                                
                                echo"<select name='prjsrc' id='projectSelect' class='form-control' placeholder='Search Project' onchange='this.form.submit();'>";
                                    if(isset($_GET["prjsrc"])){
                                        $ra = "SELECT * FROM project WHERE id='".$_GET["prjsrc"]."' AND status='1' ORDER BY name ASC limit 1";
                                        $rb = $conn->query($ra);
                                        if ($rb->num_rows > 0) { while($rab = $rb->fetch_assoc()) {
                                            $projectname=$rab["name"];
                                            $clientname = "";
                                            $ra1 = "SELECT * FROM uerp_user WHERE id='".$rab["clientid"]."' LIMIT 1";
                                            $rb1 = $conn->query($ra1);
                                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) { $clientname = $rab1["username"] . " " . $rab1["username2"]; } }
                                            echo "<option value='".$rab["id"]."' style='color:black'>".$rab["name"]." (Client: $clientname)</option>";
                                        } }
                                    }else{
                                        if($_GET["viewstatus"]==1) echo"<option value='0'>Showing All Client Projects</option>";
                                        else echo"<option value='0'>Select Project</option>";
                                    }
                                    if($mtype == "ADMIN") $ra1x = "SELECT * FROM project WHERE status='1' ORDER BY name ASC";
                                    elseif($mtype == "CLIENT") $ra1x = "SELECT * FROM project WHERE clientid='$userid' AND status='1' ORDER BY name ASC";
                                    else $ra1x = "SELECT * FROM project WHERE leaderid='$userid' AND status='1' ORDER BY name ASC";
                                    $rb1x = $conn->query($ra1x);
                                    if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                        $clientname = "";
                                        $ra1y = "SELECT * FROM uerp_user WHERE id='".$rab1x["clientid"]."' LIMIT 1";
                                        $rb1y = $conn->query($ra1y);
                                        if ($rb1y->num_rows > 0) { while($rab1y = $rb1y->fetch_assoc()) { $clientname = $rab1y["username"] . " " . $rab1y["username2"]; } }
                                        echo "<option value='".$rab1x["id"]."' style='color:black'>".$rab1x["name"]." (Client: $clientname)</option>";
                                    } }
                                echo"</select>";
                                ?><script>
                                    $(document).ready(function() {
                                        $('#projectSelect').select2({
                                            placeholder: 'Search Project',
                                            allowClear: true
                                        });
                                    });
                                </script><?php
                            echo"</td>
                            <td style='width:50px'>
                                <button class='btn btn-primary' type='button' onclick='this.form.submit();'><i data-acorn-icon='search'></i></button>
                            </td>
                        </tr></table>
                     </form><hr>
                </div>";
            }
            
            echo"<div id='calendar-container'>";
                
                echo"<h2>$projectname</h2>";
                
                echo"<div class='card'>
                    <div class='card-body' id='datatableX'>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
            
            <div class='overlay' id='overlay'></div>";
            
            if($mtype=="ADMIN" OR $teamleaderid==$userid OR $designationy=="20") {
            
                echo"<div class='sidebar' id='sidebar' style='background-color:#111111;z-index:9999'>
                    <header><h2 id='form-title'>Add Schedule</h2><button class='close-btn' id='close-sidebar'>&times;</button></header>";
                    
                    echo"<form id='add-event-form'>
                        <fieldset>
                            <div class='row'><hr>
                                <div class='modal-body' style='padding:5px'>";
                                    
                                    
                                        echo"<input type='hidden' id='event-id' name='id' value=''>
                                        <input type='hidden' id='event-url' name='url' value='".$_GET["url"]."'>
                                        <input type='hidden' id='event-projectid' name='projectid' value='".$_GET["prjsrc"]."'>
                                        <input type='hidden' id='event-stime' name='stime' value=''>
                                        <input type='hidden' id='event-etime' name='etime' value=''>
                                        <input type='hidden' id='event-category' name='category' value='0'>
                                        <div class='row'>";
                                            $currenttime=time();
                                            
                                            if(isset($_GET["prjsrc"])){
                                                
                                                
                                                $ra1 = "select * from project where id='".$_GET["prjsrc"]."' and status='1' order by id asc limit 1";
                                                $rb1 = $conn->query($ra1);
                                                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                    $sdate=date("d.m.Y",$rab1["start_date"]);
                                                    $edate=date("d.m.Y",$rab1["end_date"]);
                                                    $teamleaderid=$rab1["teamleaderid"];
                                                    $category=$rab1["category"];
                                                    $pclientid=$rab1["clientid"];
                                                } }
                                                
                                                echo"<div class='col-12' style='text-align:left'>
                                                    <label for='event-itemnumber'>Item Name & Number </label>
                                                    <select class='form-control' id='event-itemnumber' name='itemnumber' required style='width:100%;margin-bottom:10px'>
                                                        <option value=''>Select Item Number</option>";
                                                        $a4 = "select * from project_budget_allocation where projectid='".$_COOKIE["projectidx"]."' and status='1' order by id asc";
                                                        $a5 = $conn->query($a4);
                                                        if ($a5->num_rows > 0) { while($a6 = $a5->fetch_assoc()) {
                                                            $a7 = "select * from ndis_line_numbers where id='".$a6["item_number"]."' order by id asc limit 1";
                                                            $a8 = $rootdb->query($a7);
                                                            if ($a8->num_rows > 0) { while($a9 = $a8->fetch_assoc()) {
                                                                $itemid=$a9["id"];
                                                                $itemnumber=$a9["item_number"];
                                                                $itemname=$a9["item_name"];
                                                                $national=$a9["national"];
                                                            } }
                                                            echo"<option value='$itemid'>$itemnumber | $itemname</option>";
                                                        } }
                                                        echo"<option value='' disabled><hr></option>";
                                                        echo"<option value='' disabled><strong>More Item Number</option></option>";
                                                        $a7x = "select * from ndis_line_numbers order by id asc";
                                                        $a8x = $rootdb->query($a7x);
                                                        if ($a8x->num_rows > 0) { while($a9x = $a8x->fetch_assoc()) {
                                                            echo"<option value='".$a9x["id"]."'>".$a9x["item_number"]." | ".$a9x["item_name"]."</option>";
                                                        } }
                                                            
                                                        
                                                    echo"</select>
                                                </div>
                                                <div class='col-12'><div class='form-group' style='margin-bottom:10px'>
                                                    <label for='event-clientid'>Client Name</label>
                                                    <select class='form-control' id='event-clientid' name='clientid'>";
                                                        $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE id='$pclientid' and mtype = 'CLIENT' AND status = '1' ORDER BY username ASC limit 1");
                                                        if ($stmt2) { 
                                                            if ($stmt2->execute()) {
                                                                $result2 = $stmt2->get_result();
                                                                if ($result2 && $result2->num_rows > 0) {
                                                                    while ($row2 = $result2->fetch_assoc()) {
                                                                        $employeeId = htmlspecialchars($row2["id"], ENT_QUOTES, 'UTF-8');
                                                                        $username = htmlspecialchars($row2["username"], ENT_QUOTES, 'UTF-8');
                                                                        $username2 = htmlspecialchars($row2["username2"], ENT_QUOTES, 'UTF-8');
                                                                        echo "<option value=\"$employeeId\">$username $username2</option>";
                                                                    }
                                                                }
                                                                $result2->free();
                                                            } else {
                                                                // Log or handle query execution error
                                                                error_log("Execute failed: " . $stmt2->error);
                                                            }
                                                            $stmt2->close();
                                                        } else {
                                                            // Log or handle statement preparation error
                                                            error_log("Prepare failed: " . $conn->error);
                                                        }
                                                    echo"</select>
                                                </div></div>";
                                            
                                            
                                            
                                                echo"<div class='col-12'><div class='form-group'>
                                                    <label for='event-employeeid'>Employee (Designation Wise)</label>
                                                    <select class='form-control' id='event-employeeid' name='employeeid' style='margin-bottom:10px'>";
                                                        if($mtype=="ADMIN") $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE mtype = 'USER' AND status = '1' or mtype = 'ADMIN' AND status = '1' ORDER BY username ASC");
                                                        else $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE id='$userid' and mtype = 'USER' AND status = '1' ORDER BY username ASC");
                                                        if ($stmt2) { 
                                                            if ($stmt2->execute()) {
                                                                $result2 = $stmt2->get_result();
                                                                if ($result2 && $result2->num_rows > 0) {
                                                                    while ($row2 = $result2->fetch_assoc()) {
                                                                        $employeeId = htmlspecialchars($row2["id"], ENT_QUOTES, 'UTF-8');
                                                                        $username = htmlspecialchars($row2["username"], ENT_QUOTES, 'UTF-8');
                                                                        $username2 = htmlspecialchars($row2["username2"], ENT_QUOTES, 'UTF-8');
                                                                        
                                                                        $designationname=null;
                                                                        $stmt2x = $conn->prepare("SELECT * FROM designation WHERE id='".$row2["designation"]."' ORDER BY id ASC limit 1");
                                                                        if ($stmt2x) {
                                                                            if ($stmt2x->execute()) {
                                                                                $result2x = $stmt2x->get_result();
                                                                                if ($result2x && $result2x->num_rows > 0) {
                                                                                    while ($row2x = $result2x->fetch_assoc()) {
                                                                                        $designationname=$row2x["designation"];
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        echo "<option value=\"$employeeId\">$username $username2 ($designationname)</option>";
                                                                    }
                                                                }
                                                                $result2->free();
                                                            } else {
                                                                // Log or handle query execution error
                                                                error_log("Execute failed: " . $stmt2->error);
                                                            }
                                                            $stmt2->close();
                                                        } else {
                                                            // Log or handle statement preparation error
                                                            error_log("Prepare failed: " . $conn->error);
                                                        }
                                                    echo"</select>
                                                </div></div>
                                                <div class='col-12'><div class='form-group'>
                                                    <label for='event-start'>Clock-In Time</label>
                                                    <input type='datetime-local' class='form-control' id='event-start' name='start' value='' onchange=\"document.getElementById('event-stime').value=this.value\" style='margin-bottom:10px'>
                                                    
                                                </div></div>
                                                <div class='col-12'><div class='form-group'>
                                                    <label for='event-end'>Clock-Out Time</label>
                                                    <input type='datetime-local' class='form-control' id='event-end' name='end' value=''  onchange=\"document.getElementById('event-etime').value=this.value\" style='margin-bottom:10px'>
                                                </div></div>
                                                <div class='col-12 col-md-5'><div class='form-group'>
                                                    <label for='event-repeating'>Repeat</label>
                                                    <select class='form-control' id='event-repeating' name='repeating' style='margin-bottom:10px'>
                                                        <option value='Once'>Once</option>
                                                        <option value='Week Repeat'>Week Repeat</option>
                                                        <option value='Fortnight Repeat'>Fortnight Repeat</option>
                                                        <option value='Month Repeat'>Month Repeat</option>
                                                    </select>
                                                </div></div>
                                                <div class='col-12 col-md-3'><div class='form-group'>
                                                    <label for='event-night'>Sleepover?</label>
                                                    <select class='form-control' id='event-night' name='night' style='margin-bottom:10px'>
                                                        <option value='0'>OFF</option><option value='1'>ON</option>
                                                    </select>
                                                </div></div>
                                                <div class='col-12 col-md-3'><div class='form-group'>
                                                    <label for='event-pcolor'>Color</label><br>
                                                    <input type='color' id='event-pcolor' name='pcolor' value='' style='width:100%;height:35px;margin-bottom:10px'>
                                                </div></div>
                                                <div class='col-12 col-md-12'><div class='form-group'>
                                                    <label for='event-admin_note'>Notes/Instructions</label><br>
                                                    <textarea id='event-admin_note' name='admin_note' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                                </div></div>
                                                <div class='col-12'><div class='form-group'>
                                                    <label for='event-address'>Address</label><br>
                                                    <textarea id='event-address' name='address' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                                </div></div>";
                                            }else{
                                                
                                                
                                                $ra1 = "select * from project where id='".$_GET["prjsrc"]."' and status='1' order by id asc limit 1";
                                                $rb1 = $conn->query($ra1);
                                                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                    $sdate=date("d.m.Y",$rab1["start_date"]);
                                                    $edate=date("d.m.Y",$rab1["end_date"]);
                                                    $teamleaderid=$rab1["teamleaderid"];
                                                    $category=$rab1["category"];
                                                    $pclientid=$rab1["clientid"];
                                                } }
                                                
                                                echo"<div><br><br><br><br><br><br><br><br>
                                                    <center><h2>Select a Client Project to add new Shift</h2></center>
                                                <br><br><br><br><br><br><br><br></div>";
                                                
                                                echo"<input type=hidden id='event-itemnumber' name='itemnumber'>
                                                <input type=hidden id='event-clientid' name='clientid'>
                                                <input type=hidden id='event-employeeid' name='employeeid'>
                                                <input type=hidden id='event-start' name='start'>
                                                <input type=hidden id='event-end' name='end'>
                                                <input type=hidden id='event-repeating' name='repeating'>
                                                <input type=hidden id='event-night' name='night'>
                                                <input type=hidden id='event-pcolor' name='pcolor'
                                                <input type=hidden id='event-admin_note' name='admin_note'
                                                <input type=hidden id='event-address' name='address'>";
                                                
                                            }
                                        echo"</div>";
                                    
                                echo"</div>
                                <div class='modal-footer' style='text-align:left'>";
                                    if($projectname!="Showing All Client Projects"){
                                        echo"<button type='submit' class='btn btn-primary btn-sm'>Assign Schedule</button>";
                                    }
                                echo"</div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                
                <div class='modal fade' id='eventModal' tabindex='-1' role='dialog' aria-labelledby='formTitle' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        
                        <form id='edit-event-form'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='verticallyCenteredLabel'>Edit Schedule</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <input type='hidden' id='event-id1' name='id' value=''>
                                    <input type='hidden' id='event-projectid1' name='projectid1' value='".$_GET["prjsrc"]."'>
                                    <input type='hidden' id='event-category1' name='category1' value=''>
                                    <div class='row'>";
                                        
                                        if(isset($refurl)){
                                            $currenttime=time();
                                            $ra1 = "select * from project where id='".$_GET["prjsrc"]."' and status='1' order by id asc limit 1";
                                            $rb1 = $conn->query($ra1);
                                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                $sdate=date("d.m.Y",$rab1["start_date"]);
                                                $edate=date("d.m.Y",$rab1["end_date"]);
                                                $teamleaderid=$rab1["teamleaderid"];
                                                $category=$rab1["category"];
                                                
                                                $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                                                $rb2 = $conn->query($ra2);
                                                if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                    $clientid=$rab2["id"];
                                                    $clientname1=$rab2["username"];
                                                    $clientname2=$rab2["username2"];
                                                    if (!file_exists($rab2["images"]) || empty($rab2["images"])) $clientimage = "$mainurl/saas/assets/noimage.png";
                                                    else $clientimage = $rab2["images"];
                                                } }
                                                
                                            } }
                                            
                                            echo"<div class='col-12 col-md-12' style='text-align:center'>
                                                <img src='$clientimage' style='border:1px solid #ccc;border-radius:5px;height:60px' title=''>
                                                <Br>$clientname1 $clientname2<br>
                                            </div>
                                            <div class='col-12 col-md-12' style='text-align:left'>
                                                <label for='event-itemnumber1'>Item Name & Number </label>
                                                <select class='form-control' id='event-itemnumber1' name='itemnumber1' required style='width:100%;margin-bottom:10px'>
                                                    <option value=''>Select Item Number</option>";
                                                    $a4 = "select * from project_budget_allocation where projectid='".$_COOKIE["projectidx"]."' and status='1' order by id asc";
                                                    $a5 = $conn->query($a4);
                                                    if ($a5->num_rows > 0) { while($a6 = $a5->fetch_assoc()) {
                                                        $a7 = "select * from ndis_line_numbers where id='".$a6["item_number"]."' order by id asc limit 1";
                                                        $a8 = $rootdb->query($a7);
                                                        if ($a8->num_rows > 0) { while($a9 = $a8->fetch_assoc()) {
                                                            $itemid=$a9["id"];
                                                            $itemnumber=$a9["item_number"];
                                                            $itemname=$a9["item_name"];
                                                            $national=$a9["national"];
                                                        } }
                                                        echo"<option value='$itemid'>$itemnumber | $itemname</option>";
                                                    } }
                                                echo"</select>
                                                <br>
                                            </div>";
                                        }
                                        
                                        echo"<div class='col-12 col-md-6'><div class='form-group'>
                                            <label for='event-clientid1'>Client</label>
                                            <select class='form-control' id='event-clientid1' name='clientid1'>";
                                                if($url=="modules/projects.php") $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE id='$pclientid' and mtype = 'CLIENT' AND status = '1' ORDER BY username ASC");
                                                else $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE mtype = 'CLIENT' AND status = '1' ORDER BY username ASC");
                                                if ($stmt2) { 
                                                    if ($stmt2->execute()) {
                                                        $result2 = $stmt2->get_result();
                                                        if ($result2 && $result2->num_rows > 0) {
                                                            while ($row2 = $result2->fetch_assoc()) {
                                                                $employeeId = htmlspecialchars($row2["id"], ENT_QUOTES, 'UTF-8');
                                                                $username = htmlspecialchars($row2["username"], ENT_QUOTES, 'UTF-8');
                                                                $username2 = htmlspecialchars($row2["username2"], ENT_QUOTES, 'UTF-8');
                                                                echo "<option value=\"$employeeId\">$username $username2</option>";
                                                            }
                                                        }
                                                        $result2->free();
                                                    } else {
                                                        // Log or handle query execution error
                                                        error_log("Execute failed: " . $stmt2->error);
                                                    }
                                                    $stmt2->close();
                                                } else {
                                                    // Log or handle statement preparation error
                                                    error_log("Prepare failed: " . $conn->error);
                                                }
                                            echo"</select>
                                        <br></div></div><div class='col-12 col-md-6'><div class='form-group'>
                                            <label for='event-employeeid1'>Employee</label>
                                            <select class='form-control' id='event-employeeid1' name='employeeid1'>";
                                                if($mtype=="ADMIN") $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE mtype = 'USER' AND status = '1' or mtype = 'ADMIN' AND status = '1' ORDER BY username ASC");
                                                else $stmt2 = $conn->prepare("SELECT * FROM uerp_user WHERE id='$userid' and mtype = 'USER' AND status = '1' ORDER BY username ASC");
                                                if ($stmt2) { 
                                                    if ($stmt2->execute()) {
                                                        $result2 = $stmt2->get_result();
                                                        if ($result2 && $result2->num_rows > 0) {
                                                            while ($row2 = $result2->fetch_assoc()) {
                                                                $employeeId = htmlspecialchars($row2["id"], ENT_QUOTES, 'UTF-8');
                                                                $username = htmlspecialchars($row2["username"], ENT_QUOTES, 'UTF-8');
                                                                $username2 = htmlspecialchars($row2["username2"], ENT_QUOTES, 'UTF-8');
                                                                echo "<option value=\"$employeeId\">$username $username2</option>";
                                                            }
                                                        }
                                                        $result2->free();
                                                    } else {
                                                        // Log or handle query execution error
                                                        error_log("Execute failed: " . $stmt2->error);
                                                    }
                                                    $stmt2->close();
                                                } else {
                                                    // Log or handle statement preparation error
                                                    error_log("Prepare failed: " . $conn->error);
                                                }
                                            echo"</select>
                                        <br></div></div><div class='col-12 col-md-6'><div class='form-group'>
                                            <label for='event-stime1'>Clock-In Time</label>
                                            <input type='datetime-local' class='form-control' id='event-stime1' name='stime1' value='' onchange=\"document.getElementById('event-start1').value=this.value\" style='margin-bottom:10px'>
                                            <input type='hidden' class='form-control' id='event-start1' name='start1' value=''>
                                        <br></div></div><div class='col-12 col-md-6'><div class='form-group'>
                                            <label for='event-etime1'>Clock-Out Time</label>
                                            <input type='datetime-local' class='form-control' id='event-etime1' name='etime1' value='' onchange=\"document.getElementById('event-end1').value=this.value\" style='margin-bottom:10px'>
                                            <input type='hidden' class='form-control' id='event-end1' name='end1' value=''>
                                        <br></div></div><div class='col-12 col-md-4'><div class='form-group'>
                                            <label for='event-repeating1'>Repeating?</label>
                                            <select class='form-control' id='event-repeating1' name='repeating1' style='margin-bottom:10px'>
                                                <option value='Once'>Once</option>
                                                <option value='Week Repeat'>Week Repeat</option>
                                                <option value='Fortnight Repeat'>Fortnight Repeat</option>
                                                <option value='Month Repeat'>Month Repeat</option>
                                                <option value='Week Manual'>Week Manual</option>
                                                <option value='Fortnight Manual'>Fortnight Manual</option>
                                                <option value='Month Manual'>Month Manual</option>
                                            </select>
                                        <br></div></div><div class='col-12 col-md-4'><div class='form-group'>
                                            <label for='event-night1'>Sleepover?</label>
                                            <select class='form-control' id='event-night1' name='night1' style='margin-bottom:10px'>
                                                <option value='1'>ON</option><option value='0'>OFF</option>
                                            </select>
                                        <br></div></div><div class='col-12 col-md-4'><div class='form-group'>
                                            <label for='event-pcolor1'>Color</label><br>
                                            <input type='color' id='event-pcolor1' name='pcolor1' value='' style='width:100%;height:35px;margin-bottom:10px'>
                                        <br></div></div><div class='col-12 col-md-12'><div class='form-group'>
                                            <label for='event-admin_note1'>Notes/Instructions</label><br>
                                            <textarea id='event-admin_note1' name='admin_note1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                        <br></div></div><div class='col-12 col-md-12'><div class='form-group'>
                                            <label for='event-address1'>Address</label><br>
                                            <textarea id='event-address1' name='address1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                        <br></div></div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-outline-danger' id='deleteEventBtn'>Delete</button>
                                    <button type='submit' class='btn btn-outline-primary'>Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>";
                
                //  DELETE Confirmation Modal
                echo"<div class='modal fade modal-close-out' id='deleteConfirmModal' tabindex='-1' role='dialog' aria-labelledby='deleteConfirmModal' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='verticallyCenteredLabel'>Are you sure?</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <span id='deleteConfirmDetail' class='fw-bold'></span>
                                <span>will be deleted. Are you sure?</span>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-primary' data-bs-dismiss='modal'>No</button>
                                <button type='button' id='deleteConfirmButton' class='btn btn-outline-primary'>Yes</button>
                            </div>
                        </div>
                    </div>
                </div>";
                
            }
                
        echo"</div>";
        
        echo"<script src='js/vendor/moment-with-locales.min.js'></script>
        <script src='js/vendor/datepicker/bootstrap-datepicker.min.js'></script>
        <script src='js/vendor/timepicker.js'></script>
        <script src='js/base/helpers.js'></script>
        <script src='js/base/globals.js'></script>
        <script src='js/base/nav.js'></script>
        <script src='js/base/search.js'></script>
        <script src='js/base/settings.js'></script>";
        // <script src='js/apps/calendar.js'></script>
        echo"<script src='js/common.js'></script>
        <script src='js/scripts.js'></script>"; ?>
        
        <script>
            const PRJ_ID = <?php echo $projectidx; ?>;
        </script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                const editEventForm = document.getElementById('edit-event-form');
                const addEventForm = document.getElementById('add-event-form');
                const closeSidebarBtn = document.getElementById('close-sidebar');
                const addEventBtn = document.getElementById('add-event-btn');
                const deleteEventBtn = document.getElementById('deleteEventBtn');
                const formTitle = document.getElementById('form-title');
                let selectedEvent = null;
                
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    timeZone: 'local',
                    editable: true,
                    selectable: true,
                    
                    customButtons: {
                        customYear: {
                            text: 'Year',
                            click: function() {
                                calendar.changeView('dayGridYear');
                            }
                        },
                        customMonth: {
                            text: 'Month',
                            click: function() {
                                calendar.changeView('dayGridMonth');
                            }
                        },
                        customWeek: {
                            text: 'Week',
                            click: function() {
                                calendar.changeView('dayGridWeek');
                            }
                        },
                        customDay: {
                            text: 'Day',
                            click: function() {
                                calendar.changeView('dayGridDay');
                            }
                        }
                    },
                    
                    headerToolbar: {
                        left: 'prev,today,next',
                        center: 'title',
                        right: 'customYear,customMonth,customWeek,customDay'
                        // right: 'dayGridYear,dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    
                    
                    eventContent: function(arg) {
                        let employeeName = arg.event.title;
                        let clientName = arg.event.extendedProps.title2;
                        return {
                            html: `
                                <div style="font-weight:bold;">${employeeName}</div>
                                <div style="font-size:11px; color:gray;">${clientName}</div>
                            `
                        };
                    },
    
                    eventDidMount: function(info) {
                        function getContrastYIQ(hexcolor) {
                        hexcolor = String(hexcolor || '').replace('#','');
                        if (hexcolor.length === 3) hexcolor = hexcolor.split('').map(c=>c+c).join('');
                        if (hexcolor.length !== 6) return 'black';
                        const r = parseInt(hexcolor.substr(0,2),16);
                        const g = parseInt(hexcolor.substr(2,2),16);
                        const b = parseInt(hexcolor.substr(4,2),16);
                        const yiq = ((r*299)+(g*587)+(b*114))/1000;
                        return yiq >= 128 ? 'black' : 'white';
                      }
                    
                      const allocatedColor =
                        info.event.extendedProps.pcolor ||
                        info.event.backgroundColor ||
                        info.event.color ||
                        '#f0f0f0';
                    
                      const textColor = getContrastYIQ(allocatedColor);
                    
                      info.el.innerHTML = `
                        <div style=" border:1px solid ${allocatedColor}; border-radius:5px; padding:5px; font-size:12px; width:100%; background-color:${allocatedColor}; color:${textColor};">
                          <b>${info.event.extendedProps.allocatedtime || ''} (${info.event.extendedProps.repeating || ''})</b><br>
                          <small>${info.event.extendedProps.employee || ''}</small><br>
                          <small>${info.event.extendedProps.client || ''}</small>
                        </div>
                      `;
                    
                      // optional hover effect
                      info.el.addEventListener('mouseenter', () => {
                        info.el.style.filter = 'brightness(90%)';
                        info.el.style.transform = 'scale(1.03)';
                      });
                      info.el.addEventListener('mouseleave', () => {
                        info.el.style.filter = 'brightness(100%)';
                        info.el.style.transform = 'scale(1)';
                      });
                    },

                    dateClick: function (info) {
                        selectedEvent = null;
                        document.getElementById('event-start').value = info.dateStr + 'T08:00';
                        document.getElementById('event-end').value = info.dateStr + 'T17:00';
                        document.getElementById('event-stime').value = info.dateStr + 'T08:00';
                        document.getElementById('event-etime').value = info.dateStr + 'T17:00';
                        formTitle.textContent = 'Assign Schedule';
                        deleteEventBtn.style.display = 'none';
                        openSidebar();
                    },
                        
                    events: async function (fetchInfo, successCallback, failureCallback) {
                        try {
                            const response = await axios.get('calendar_backend_schedule.php', {
                                params: { prjsrc: PRJ_ID }
                            });
                            successCallback(response.data);
                        } catch (error) {
                            console.error('Error fetching events:', error);
                            failureCallback(error);
                        }
                    },

                        
                    <?php if($mtype=="ADMIN" OR $teamleaderid==$userid OR $designationy=="20") { ?>    

                        eventDrop: async function (info) {
                            try {
                                // Prefer the DB primary key if provided by your feed
                                const dbId       = info.event.extendedProps.idx || info.event.id;
                                const repeating  = info.event.extendedProps.repeating ?? info.event.repeating ?? 'Once';
                                const pcolor     = info.event.extendedProps.pcolor ?? info.event.backgroundColor ?? info.event.color ?? '';
                                const itemnumber = info.event.extendedProps.itemnumber ?? info.event.itemnumber ?? '';
                                const admin_note = info.event.extendedProps.admin_note ?? '';
                                const address    = info.event.extendedProps.address ?? '';
                                
                                // format local datetimes safely (YYYY-MM-DDTHH:mm)
                                const startLocal = FullCalendar.formatDate(info.event.start, {
                                    timeZone: 'local',
                                    hour: '2-digit', minute: '2-digit', second: '2-digit',
                                    year: 'numeric', month: '2-digit', day: '2-digit',
                                    hour12: false
                                }).replace(',', ''); // remove comma between date & time
                        
                                const endLocal = info.event.end
                                ? FullCalendar.formatDate(info.event.end, {
                                    timeZone: 'local',
                                    hour: '2-digit', minute: '2-digit', second: '2-digit',
                                    year: 'numeric', month: '2-digit', day: '2-digit',
                                    hour12: false
                                }).replace(',', '') : null;
                        
                                const payload = {
                                    id: dbId,   // use both start/end and stime/etime so backend works for either path
                                    start: startLocal,
                                    end: endLocal,
                                    stime: startLocal,
                                    etime: endLocal,
                                    repeating: repeating,
                                    pcolor: pcolor,
                                    itemnumber: itemnumber,
                                    admin_note: admin_note,
                                    address: address,
                                    projectid: PRJ_ID,
                                    action: 'move'
                                };
                                
                                const resp = await axios.post('calendar_backend_schedule.php', payload);
                        
                                if (!resp.data || resp.data.status === 'error') {
                                    throw new Error(resp.data?.message || 'Backend rejected update');
                                }
                        
                                // keep UI in sync (especially if backend snaps/normalizes)
                                await calendar.refetchEvents();
                        
                            } catch (err) {
                                console.error('Error updating event (drag):', err);
                                alert('Failed to update Schedule. Reverting.');
                                info.revert();
                            }
                        },

                        eventResize: async function (info) {
                            try {
                              const dbId = info.event.extendedProps.idx || info.event.id;
                        
                              const startLocal = FullCalendar.formatDate(info.event.start, {
                                timeZone: 'local',
                                hour: '2-digit', minute: '2-digit', second: '2-digit',
                                year: 'numeric', month: '2-digit', day: '2-digit',
                                hour12: false
                              }).replace(',', '');
                        
                              const endLocal = info.event.end
                                ? FullCalendar.formatDate(info.event.end, {
                                    timeZone: 'local',
                                    hour: '2-digit', minute: '2-digit', second: '2-digit',
                                    year: 'numeric', month: '2-digit', day: '2-digit',
                                    hour12: false
                                  }).replace(',', '')
                                : null;
                        
                              const payload = {
                                id: dbId,
                                start: startLocal,
                                end: endLocal,
                                projectid: PRJ_ID,
                                action: 'resize'
                              };
                        
                              const resp = await axios.post('calendar_backend_schedule.php', payload);
                        
                              if (!resp.data || resp.data.status === 'error') {
                                throw new Error(resp.data?.message || 'Backend rejected resize');
                              }
                        
                              await calendar.refetchEvents();
                        
                            } catch (err) {
                              console.error('Error updating event (resize):', err);
                              alert('Failed to resize Schedule. Reverting.');
                              info.revert();
                            }
                        },

                    <?php } ?>
                    
                        eventClick: function (info) {
                            selectedEvent = info.event;
                            formTitle.textContent = 'Edit Schedule';
                            document.getElementById('event-id1').value = selectedEvent.extendedProps.idx;
                            // document.getElementById('event-projectid1').value = selectedEvent.extendedProps.projectid;
                            document.getElementById('event-clientid1').value = selectedEvent.extendedProps.clientid;
                            document.getElementById('event-employeeid1').value = selectedEvent.extendedProps.employeeid;
                            document.getElementById('event-stime1').value = selectedEvent.extendedProps.stime;
                            document.getElementById('event-etime1').value = selectedEvent.extendedProps.etime;
                            document.getElementById('event-night1').value = selectedEvent.extendedProps.night;
                            document.getElementById('event-pcolor1').value = selectedEvent.extendedProps.pcolor;
                            document.getElementById('event-category1').value = selectedEvent.extendedProps.category;
                            document.getElementById('event-itemnumber1').value = selectedEvent.extendedProps.itemnumber;
                            document.getElementById('event-repeating1').value = selectedEvent.extendedProps.repeating;
                            document.getElementById('event-admin_note1').value = selectedEvent.extendedProps.admin_note;
                            document.getElementById('event-address1').value = selectedEvent.extendedProps.address;
                            
                            document.getElementById('event-start1').value = selectedEvent.start.toISOString().slice(0, 16);
                            document.getElementById('event-end1').value = selectedEvent.end ? selectedEvent.end.toISOString().slice(0, 16) : '';
                        
                            deleteEventBtn.style.display = 'block';
                        
                            // Open the modal (assuming you're using Bootstrap 4)
                            $('#eventModal').modal('show');
                        }
                    

                });
                
                calendar.render();
                
                <?php if($mtype=="ADMIN" OR $teamleaderid==$userid OR $designationy=="20") { ?>
                    
        
                    // Now setup search
                    insertSearchBox();
        
                    function insertSearchBox() {
                        // Find toolbar (right side where your custom buttons are)
                        var toolbarRight = document.querySelector('.fc-toolbar-chunk:last-child');
                    
                        if (toolbarRight) {
                            // Create a wrapper div
                            var wrapper = document.createElement('div');
                            wrapper.style.marginTop = '-32px';
                            wrapper.style.marginLeft = '-150px';
                            wrapper.style.display = 'flex'; // inline box and icon
                            wrapper.style.gap = '5px'; // space between input and icon
                            wrapper.style.alignItems = 'center';
                            wrapper.style.position = 'absolute';
                            // Create input box
                            var searchBox = document.createElement('input');
                            searchBox.type = 'text';
                            searchBox.id = 'calendar-search';
                            searchBox.placeholder = 'Search events...';
                            searchBox.style.padding = '3px';
                            searchBox.style.width = '120px';
                            searchBox.style.border = '1px solid #ccc';
                            searchBox.style.borderRadius = '4px';
                    
                            // Create search icon (FontAwesome)
                            var searchIcon = document.createElement('i');
                            searchIcon.classList.add('fa', 'fa-search');  // FontAwesome search icon
                            searchIcon.style.cursor = 'pointer';
                            searchIcon.style.fontSize = '18px';
                            searchIcon.style.color = '#007bff';
                    
                            // Add input and icon to wrapper
                            wrapper.appendChild(searchBox);
                            wrapper.appendChild(searchIcon);
                    
                            // Insert the wrapper under the toolbar
                            toolbarRight.appendChild(wrapper);
                    
                            // Now bind search event to icon click
                            searchIcon.addEventListener('click', function() {
                                var searchTerm = searchBox.value.toLowerCase();
                    
                                calendar.getEvents().forEach(function(event) {
                                    var match = event.title.toLowerCase().includes(searchTerm) ||
                                        (event.extendedProps.title2 && event.extendedProps.title2.toLowerCase().includes(searchTerm)) ||
                                        (event.extendedProps.location && event.extendedProps.location.toLowerCase().includes(searchTerm));
                    
                                    if (match) {
                                        event.setProp('display', 'auto');
                                    } else {
                                        event.setProp('display', 'none');
                                    }
                                });
                            });
                        }
                    }
                    
                    function openSidebar() {
                        sidebar.classList.add('open');
                        overlay.classList.add('active');
                    }
        
                    function closeSidebar() {
                        sidebar.classList.remove('open');
                        overlay.classList.remove('active');
                    }
        
                    overlay.addEventListener('click', closeSidebar);
                    
                    closeSidebarBtn.addEventListener('click', closeSidebar);

                    // ADD
                    addEventForm.addEventListener('submit', async function (e) {
                        e.preventDefault();
                    
                        // Confirmation alert
                        
                        /*
                        const confirmSubmit = confirm("This will Effect your Budget. Sure to submit this schedule?");
                        if (!confirmSubmit) {
                            return; // Stop if user clicks Cancel
                        }
                        */
                        
                        // Collect form values
                        const projectid   = document.getElementById('event-projectid').value.trim();
                        const clientid    = document.getElementById('event-clientid').value.trim();
                        const employeeid  = document.getElementById('event-employeeid').value.trim();
                        const stime       = document.getElementById('event-stime').value;
                        const etime       = document.getElementById('event-etime').value;
                        const night       = document.getElementById('event-night').value;
                        const start       = document.getElementById('event-start').value;
                        const end         = document.getElementById('event-end').value;
                        const pcolor      = document.getElementById('event-pcolor').value;
                        const category    = document.getElementById('event-category').value;
                        const itemnumber  = document.getElementById('event-itemnumber').value;
                        const admin_note  = document.getElementById('event-admin_note').value;
                        const address     = document.getElementById('event-address').value;
                        const repeating   = document.getElementById('event-repeating').value;
                    
                        // Object for backend
                        const newEvent = { 
                            projectid, clientid, employeeid, stime, etime, night, start, end, 
                            pcolor, category, itemnumber, admin_note, address, repeating
                        };
                    
                        try {
                            // Send request to backend
                            const response = await axios.post('calendar_backend_schedule.php', newEvent);
                            
                            if (response.data.status === "error") {
                                alert(response.data.message); // show backend message
                                return;
                            }
                            
                            if (response.data && (response.data.id || response.data.status === "ok")) {
                                // alert('Schedule allocated successfully!');
                                closeSidebar();
                                addEventForm.reset();
                            
                                // IMPORTANT: Pull everything again so repeats appear immediately
                                await calendar.refetchEvents();
                            } else {
                                throw new Error('Invalid response from server.');
                            }
                    
                        } catch (error) {
                            console.error('Error adding Schedule:', error);
                            alert('Failed to add Schedule. Please try again.');
                        }
                    });

                    // EDIT
                    editEventForm.addEventListener('submit', async function (e) {
                        e.preventDefault();
                    
                        const id = document.getElementById('event-id1').value;
                        const projectid = document.getElementById('event-projectid1').value;
                        const clientid = document.getElementById('event-clientid1').value;
                        const employeeid = document.getElementById('event-employeeid1').value;
                        const stime = document.getElementById('event-stime1').value;
                        const etime = document.getElementById('event-etime1').value;
                        const start = document.getElementById('event-start1').value;
                        const end = document.getElementById('event-end1').value;
                        const category = document.getElementById('event-category1').value;
                        const itemnumber = document.getElementById('event-itemnumber1').value;
                        const repeating = document.getElementById('event-repeating1').value;
                        const pcolor = document.getElementById('event-pcolor1').value;
                        const admin_note = document.getElementById('event-admin_note1').value;
                        const address = document.getElementById('event-address1').value;
                        const night = document.getElementById('event-night1').value;
                        
                        const editEvent = {
                            id, projectid, clientid, employeeid,
                            stime, etime, night, start, end,
                            pcolor, category, itemnumber, repeating,
                            admin_note, address
                        };
                    
                        try {
                            const response = await axios.post('calendar_backend_schedule.php', editEvent);
                    
                            // Update the existing event instead of adding a new one
                            selectedEvent.setProp('title', response.data.title);
                            selectedEvent.setStart(response.data.start);
                            selectedEvent.setEnd(response.data.end);
                            selectedEvent.setExtendedProp('employee', response.data.employee);
                            selectedEvent.setExtendedProp('client', response.data.client);
                            selectedEvent.setExtendedProp('allocatedtime', response.data.allocatedtime);
                            selectedEvent.setExtendedProp('address', response.data.address);
                            selectedEvent.setExtendedProp('admin_note', response.data.admin_note);
                            selectedEvent.setExtendedProp('category', response.data.category);
                            selectedEvent.setExtendedProp('itemnumber', response.data.itemnumber);
                            selectedEvent.setExtendedProp('repeating', response.data.repeating);
                            selectedEvent.setExtendedProp('pcolor', response.data.pcolor);
                            
                            alert('Schedule Updated successfully!');
                            $('#eventModal').modal('hide');  // close modal
                            editEventForm.reset();
                            calendar.refetchEvents();
                            
                        } catch (error) {
                            console.error('Error updating Schedule:', error);
                            alert('Failed to update Schedule.');
                        }
                    });

                    //DELETE
                    deleteEventBtn.addEventListener('click', async function () {
                        if (confirm('Are you sure you want to delete this Schedule?')) {
                            await axios.post('calendar_backend_schedule.php', { id: selectedEvent.id, delete: true });
                            selectedEvent.remove();
                            closeSidebar();
                        }
                    });
                    
                <?php } ?>
                
            });
        </script>
        
        <script>
            // Function to calculate week number
            function getWeekNumber(date) {
                const startDate = new Date(date.getFullYear(), 0, 1);
                const dayOfYear = Math.floor((date - startDate) / (24 * 60 * 60 * 1000)) + 1;
                return Math.ceil(dayOfYear / 7);
            }
        
            // Get the current week based on Australian timezone
            function getCurrentWeekInAustralia() {
                const australianDate = new Date(new Date().toLocaleString('en-US', { timeZone: 'Australia/Sydney' }));
                const weekNumber = getWeekNumber(australianDate);
                const year = australianDate.getFullYear();
                return `${year}-W${weekNumber.toString().padStart(2, '0')}`;
            }
        
            // Get the next week based on Australian timezone
            function getNextWeekInAustralia() {
                const australianDate = new Date(new Date().toLocaleString('en-US', { timeZone: 'Australia/Sydney' }));
                // Move forward 7 days
                australianDate.setDate(australianDate.getDate() + 7);
                const weekNumber = getWeekNumber(australianDate);
                const year = australianDate.getFullYear();
                return `${year}-W${weekNumber.toString().padStart(2, '0')}`;
            }
        
            // Set the current and next week values for Australian time zone
            document.getElementById('weekfrom').value = getCurrentWeekInAustralia();
            document.getElementById('weekto').value = getNextWeekInAustralia();
        </script>
        