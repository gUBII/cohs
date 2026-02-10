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
    
    if(isset($_GET["viewstatus"])) $viewpoints=$_GET["viewstatus"];
    else $viewpoints=1;
    
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
                                <li class='breadcrumb-item'><a href='   index.php'>Home</a></li>
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
echo"<button type='button' id='openTemplateBtn' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'>
        <i data-acorn-icon='save'></i>&nbsp;&nbsp;<span>Shift Template</span>
     </button>";
echo"<button type='button' id='openTemplateListBtn' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'>
        <i data-acorn-icon='list'></i>&nbsp;&nbsp;<span>View Templates</span>
     </button>";
                        
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
                            				    <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='viewstatus' value='$viewpoints'>
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
                                        <div class='mb-2'>Do you want to <b>COPY</b> this shift to the new date/time or <b>MOVE</b> it?</div>
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
            
            if(isset($viewpoints)){
                $projectname="Showing All Client Projects";
                echo"<div class='col-12 col-md-12'>
                    <form method='get' action='index.php'>
                        <input type=hidden name=url value='appointments.php'><input type=hidden name=viewstatus value='2'>
                        <table width=100% ><tr>
                            <td>
                                <select name='prjsrc' id='event-category' class='form-control select2' placeholder='Search Project' onchange='this.form.submit();'>";
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
                                        if($viewpoints==1) echo"<option value='0'>Showing All Client Projects</option>";
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
                                echo"</select>
                            </td>
                            <td style='width:50px'>
                                <button class='btn btn-primary btn-sm' type='button' onclick='this.form.submit();'><i data-acorn-icon='search'></i></button>
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
            
            <div class='overlay' id='overlay'></div>

<div class='sidebar' id='templateSidebar' style='background-color:#111111;z-index:10010'>
  <header>
    <h2 style='color:#ffffff'>Add Shift Template</h2>
    <button class='close-btn' id='close-template-sidebar' style='color:#ffffff'>&times;</button>
  </header>
  <div id='templateFormMount' style='padding-top:10px'></div>
</div>

<div class='sidebar' id='templateListSidebar' style='background-color:#111111;z-index:10000'>
  <header>
    <h2 style='color:#ffffff'>Shift Templates</h2>
    <button class='close-btn' id='close-template-list-sidebar' style='color:#ffffff'>&times;</button>
  </header>
  <div id='templateListContainer' style='color:#ffffff'></div>
</div>";
            
            if($mtype=="ADMIN" OR $teamleaderid==$userid OR $designationy=="20") {
            
                echo"<div class='sidebar' id='sidebar' style='background-color:#111111;z-index:9999'>
                    <header><h2 id='form-title'>Add Shift</h2><button class='close-btn' id='close-sidebar'>&times;</button></header>";
                    
                    echo"<form id='add-event-form'>
                        <fieldset>
                            <div class='row'><hr>
                                <div class='modal-body' style='padding:5px'>
                                    <input type='hidden' id='event-id' name='id' value=''>
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
                                                </div>";

                                                echo"<div class='col-12'><div class='form-group' style='margin-bottom:10px'>
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
                                                    <label for='event-employeeid'>Employee (Designation Wise) 123</label>
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
                                                    <label for='event-repeating'>Repeat Frequency:</label>
                                                    <select class='form-control' id='event-repeating' name='repeating' style='margin-bottom:10px'>
                                                        <option value='Once'>Once</option>
                                                        <option value='Week Repeat'>Week Repeat</option>
                                                        <option value='Fortnight Repeat'>Fortnight Repeat</option>
                                                        <option value='3 Weeks Repeat'>Every 3 Weeks</option>
                                                        <option value='4 Weeks Repeat'>Every 4 Weeks</option>
                                                        <option value='6 Weeks Repeat'>Every 6 Weeks</option>
                                                        <option value='8 Weeks Repeat'>Every 8 Weeks</option>
                                                        <option value='12 Weeks Repeat'>Every 12 Weeks</option>
                                                        <option value='Month Repeat'>Month Repeat</option>
                                                        <option value='3 Months Repeat'>Every 3 Months Repeat</option>
                                                        <option value='6 Months Repeat'>Every 6 Months Repeat</option>
                                                        <option value='12 Months Repeat'>Every 12 Months Repeat</option>
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
                                        echo"<button type='submit' class='btn btn-primary btn-sm'>Assign Shift</button>";
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
                                    <h5 class='modal-title' id='verticallyCenteredLabel'>Shift Manager</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>";
                                
                                if($mtype=="ADMIN"){
                                    echo"<div class='modal-body'>
                                        <input type='hidden' id='event-id1' name='id' value=''>
                                        <input type='hidden' id='event-projectid1' name='projectid1' value='".$_GET["prjsrc"]."'>
                                        <input type='hidden' id='event-category1' name='category1' value=''>
                                        <div class='row'>";
                                            if($mtype!="ADMIN") $boxstatus=null;
                                            else $boxstatus="readonly";
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
                                                
                                                echo"<div class='col-12 col-md-12' style='text-align:left'>
                                                    <label class='mb-3 top-label' for='event-itemnumber1'>
                                                        <span>Item Name & Number</span>
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
                                                            echo"<option value='' disabled><hr></option>";
                                                            echo"<option value='' disabled><strong>More Item Number</option></option>";
                                                            $a7x = "select * from ndis_line_numbers order by id asc";
                                                            $a8x = $rootdb->query($a7x);
                                                            if ($a8x->num_rows > 0) { while($a9x = $a8x->fetch_assoc()) {
                                                                echo"<option value='".$a9x["id"]."'>".$a9x["item_number"]." | ".$a9x["item_name"]."</option>";
                                                            } }
                                                        echo"</select>
                                                    </label>
                                                </div>";
                                            }
                                            
                                            echo"<div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-clientid1'>
                                                    <span>Client Name</span>
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
                                                </label>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-employeeid1'>
                                                    <span>Employee Name</span>
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
                                                </label>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-stime1'>
                                                    <span>Clock-In Time</span>
                                                    <input type='datetime-local' class='form-control' id='event-stime1' name='stime1' value='' onchange=\"document.getElementById('event-start1').value=this.value\" style='margin-bottom:10px'>
                                                    <input type='hidden' class='form-control' id='event-start1' name='start1' value=''>
                                                </label>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-etime1'>
                                                    <span>Clock-Out Time</span>
                                                    <input type='datetime-local' class='form-control' id='event-etime1' name='etime1' value='' onchange=\"document.getElementById('event-end1').value=this.value\" style='margin-bottom:10px'>
                                                    <input type='hidden' class='form-control' id='event-end1' name='end1' value=''>
                                                </label>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-repeating1'>
                                                    <span>Repeating?</span>
                                                    <select class='form-control' id='event-repeating1' name='repeating1' style='margin-bottom:10px'>
                                                        <option value='Once'>Once</option>
                                                        <option value='Week Repeat'>Week Repeat</option>
                                                        <option value='Fortnight Repeat'>Fortnight Repeat</option>
                                                        <option value='3 Weeks Repeat'>Every 3 Weeks</option>
                                                        <option value='4 Weeks Repeat'>Every 4 Weeks</option>
                                                        <option value='6 Weeks Repeat'>Every 6 Weeks</option>
                                                        <option value='8 Weeks Repeat'>Every 8 Weeks</option>
                                                        <option value='12 Weeks Repeat'>Every 12 Weeks</option>
                                                        <option value='Month Repeat'>Month Repeat</option>
                                                        <option value='3 Months Repeat'>Every 3 Months Repeat</option>
                                                        <option value='6 Months Repeat'>Every 6 Months Repeat</option>
                                                        <option value='12 Months Repeat'>Every 12 Months Repeat</option>
                                                    </select>
                                                </label>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-night1'>
                                                    <span>Sleepover?</span>
                                                    <select class='form-control' id='event-night1' name='night1' style='margin-bottom:10px'>
                                                        <option value='1'>ON</option><option value='0'>OFF</option>
                                                    </select>
                                                </label>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-pcolor1'>
                                                    <span>Color</span>
                                                    <input type='color' class='form-control' id='event-pcolor1' name='pcolor1' value='' style='width:100%;height:50px;margin-bottom:10px'>
                                                </lable>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-admin_note1'>
                                                    <span>Notes/Instructions</span>
                                                    <textarea id='event-admin_note1' name='admin_note1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                                </lable>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-address1'>
                                                    <span>Address</span>
                                                    <textarea id='event-address1' name='address1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                                </lable>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer' style='padding:10px;text-align:center'>
                                        <button type='button' class='btn btn-outline-danger btn-sm' id='deleteEventBtn'>Delete</button>
                                        <button type='submit' class='btn btn-outline-primary btn-sm'>Update</button>
                                    </div>";
                                
                                }else{
                                    echo"<div class='modal-body'>
                                        <input type='hidden' id='event-id1' name='id' value=''>
                                        <input type='hidden' id='event-projectid1' name='projectid1' value='".$_GET["prjsrc"]."'>
                                        <input type='hidden' id='event-category1' name='category1' value=''>
                                        <input type='hidden' id='event-itemnumber1' name='itemnumber1'>
                                        <input type='hidden' id='event-clientid1' name='clientid1'>
                                        <input type='hidden' id='event-employeeid1' name='employeeid1'>
                                        <input type='hidden' id='event-pcolor1' name='pcolor1' value=''>
                                        <div class='row'>
                                            <div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Clock-In Time
                                                <input type='datetime-local' class='form-control' id='event-stime1' name='stime1' value='' onchange=\"document.getElementById('event-start1').value=this.value\" style='margin-bottom:10px'>
                                                <input type='hidden' class='form-control' id='event-start1' name='start1' value=''>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Clock-Out Time:
                                                <input type='datetime-local' class='form-control' id='event-etime1' name='etime1' value='' onchange=\"document.getElementById('event-end1').value=this.value\" style='margin-bottom:10px'>
                                                <input type='hidden' class='form-control' id='event-end1' name='end1' value=''>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group' style='font-size:8pt'>
                                                Repeating?:<input type='text' class='form-control' id='event-repeating1' name='repeating1' style='margin-bottom:10px' readonly>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group' style='font-size:8pt'>
                                                Sleepover?:<input class='form-control' type='text' id='event-night1' name='night1' style='margin-bottom:10px' readonly>
                                            </div></div>
                                            <div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Notes/Instructions:<textarea readonly id='event-admin_note1' name='admin_note1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Address:<textarea readonly id='event-address1' name='address1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        
                                    </div>";
                                }    
                        echo"</div>
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
                
                // Cancel Hours Modal
                echo"<div class='modal fade' id='cancelHoursModal' tabindex='-1' aria-hidden='true'>
                  <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title'>Cancel Shift – Enter Total Hours</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='cancelHoursClose'></button>
                      </div>
                      <div class='modal-body'>
                        <input type='hidden' id='cancelShiftId'>
                        <div class='mb-2 small text-muted'>
                          <div><b>Clock-in (Will stay Same):</b> <span id='cancelClockInPreview'></span></div>
                          <div><b>Clock-out For Worker (ClockIN + Hours):</b> <span id='cancelClockOutPreview'></span></div>
                          <div><b>Clock-out For Invoice (ClockIN + Hours):</b> <span id='cancelClockOutPreview2'></span></div>
                        </div>
                        
                        <label for='cancelReasons' class='form-label'>NDIS Calellation Reasons</label>
                        <select class='form-control' id='cancelReasons' required>
                            <option value=''>Select Reason for Cancellation</option>
                            <option value='NSDH'>No show due to health reason (NSDH)</option>
                            <option value='NSDF'>No show due to family issues (NSDF)</option>
                            <option value='NSDT'>No show due to unavailability of transport (NSDT)</option>
                            <option value='NSDO'>Other (NSDO)</option>
                        </select><Br>
                        
                        <label for='cancelTotalHours' class='form-label'>Add Hours for Worker</label>
                        <input type='number' class='form-control' id='cancelTotalHours' step='0.25' min='0.25' placeholder='e.g. 2.5' required><br>
                        
                        <label for='cancelTotalHours2' class='form-label'>Add Hours for Invoicing</label>
                        <input type='number' class='form-control' id='cancelTotalHours2' step='0.25' min='0.25' placeholder='e.g. 2.5' required><br>
                        
                        <div class='form-text'>Minimum 0.25h. Clock-out will be calculated as <code>ClockIN + Total Hours</code>.</div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='button' id='confirmCancelBtn' class='btn btn-danger'>Confirm Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>";

                
            } else {
            
                echo"<div class='sidebar' id='sidebar' style='background-color:#111111;z-index:9999'>
                    <header><h2 id='form-title'>Add Shift</h2><button class='close-btn' id='close-sidebar'>&times;</button></header>";
                    
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
                                        echo"<button type='submit' class='btn btn-primary btn-sm'>Assign Shift</button>";
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
                                    <h5 class='modal-title' id='verticallyCenteredLabel'>Shift Manager</h5>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>";
                                
                                if($mtype=="ADMIN"){
                                    echo"<div class='modal-body'>
                                        <input type='hidden' id='event-id1' name='id' value=''>
                                        <input type='hidden' id='event-projectid1' name='projectid1' value='".$_GET["prjsrc"]."'>
                                        <input type='hidden' id='event-category1' name='category1' value=''>
                                        <div class='row'>";
                                            if($mtype!="ADMIN") $boxstatus=null;
                                            else $boxstatus="readonly";
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
                                                
                                                echo"<div class='col-12 col-md-12' style='text-align:left'>
                                                    <label class='mb-3 top-label' for='event-itemnumber1'>
                                                        <span>Item Name & Number</span>
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
                                                            echo"<option value='' disabled><hr></option>";
                                                            echo"<option value='' disabled><strong>More Item Number</option></option>";
                                                            $a7x = "select * from ndis_line_numbers order by id asc";
                                                            $a8x = $rootdb->query($a7x);
                                                            if ($a8x->num_rows > 0) { while($a9x = $a8x->fetch_assoc()) {
                                                                echo"<option value='".$a9x["id"]."'>".$a9x["item_number"]." | ".$a9x["item_name"]."</option>";
                                                            } }
                                                        echo"</select>
                                                    </label>
                                                </div>";
                                            }
                                            
                                            echo"<div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-clientid1'>
                                                    <span>Client Name</span>
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
                                                </label>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-employeeid1'>
                                                    <span>Employee Name</span>
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
                                                </label>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-stime1'>
                                                    <span>Clock-In Time</span>
                                                    <input type='datetime-local' class='form-control' id='event-stime1' name='stime1' value='' onchange=\"document.getElementById('event-start1').value=this.value\" style='margin-bottom:10px'>
                                                    <input type='hidden' class='form-control' id='event-start1' name='start1' value=''>
                                                </label>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-etime1'>
                                                    <span>Clock-Out Time</span>
                                                    <input type='datetime-local' class='form-control' id='event-etime1' name='etime1' value='' onchange=\"document.getElementById('event-end1').value=this.value\" style='margin-bottom:10px'>
                                                    <input type='hidden' class='form-control' id='event-end1' name='end1' value=''>
                                                </label>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-repeating1'>
                                                    <span>Repeating?</span>
                                                    <select class='form-control' id='event-repeating1' name='repeating1' style='margin-bottom:10px'>
                                                        <option value='Once'>Once</option>
                                                        <option value='Week Repeat'>Week Repeat</option>
                                                        <option value='Fortnight Repeat'>Fortnight Repeat</option>
                                                        <option value='3 Weeks Repeat'>Every 3 Weeks</option>
                                                        <option value='4 Weeks Repeat'>Every 4 Weeks</option>
                                                        <option value='6 Weeks Repeat'>Every 6 Weeks</option>
                                                        <option value='8 Weeks Repeat'>Every 8 Weeks</option>
                                                        <option value='12 Weeks Repeat'>Every 12 Weeks</option>
                                                        <option value='Month Repeat'>Month Repeat</option>
                                                        <option value='3 Months Repeat'>Every 3 Months Repeat</option>
                                                        <option value='6 Months Repeat'>Every 6 Months Repeat</option>
                                                        <option value='12 Months Repeat'>Every 12 Months Repeat</option>
                                                    </select>
                                                </label>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-night1'>
                                                    <span>Sleepover?</span>
                                                    <select class='form-control' id='event-night1' name='night1' style='margin-bottom:10px'>
                                                        <option value='1'>ON</option><option value='0'>OFF</option>
                                                    </select>
                                                </label>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-pcolor1'>
                                                    <span>Color</span>
                                                    <input type='color' class='form-control' id='event-pcolor1' name='pcolor1' value='' style='width:100%;height:50px;margin-bottom:10px'>
                                                </lable>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-admin_note1'>
                                                    <span>Notes/Instructions</span>
                                                    <textarea id='event-admin_note1' name='admin_note1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                                </lable>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group'>
                                                <label class='mb-3 top-label' for='event-address1'>
                                                    <span>Address</span>
                                                    <textarea id='event-address1' name='address1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                                </lable>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer' style='padding:10px;text-align:center'>
                                        <button type='button' class='btn btn-outline-danger btn-sm' id='deleteEventBtn'>Delete</button>
                                        <button type='submit' class='btn btn-outline-primary btn-sm'>Update</button>
                                    </div>";
                                
                                }else{
                                    echo"<div class='modal-body'>
                                        <input type='hidden' id='event-id1' name='id' value=''>
                                        <input type='hidden' id='event-projectid1' name='projectid1' value='".$_GET["prjsrc"]."'>
                                        <input type='hidden' id='event-category1' name='category1' value=''>
                                        <input type='hidden' id='event-itemnumber1' name='itemnumber1'>
                                        <input type='hidden' id='event-clientid1' name='clientid1'>
                                        <input type='hidden' id='event-employeeid1' name='employeeid1'>
                                        <input type='hidden' id='event-pcolor1' name='pcolor1' value=''>
                                        <div class='row'>
                                            <div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Clock-In Time
                                                <input type='datetime-local' class='form-control' id='event-stime1' name='stime1' value='' onchange=\"document.getElementById('event-start1').value=this.value\" style='margin-bottom:10px'>
                                                <input type='hidden' class='form-control' id='event-start1' name='start1' value=''>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Clock-Out Time:
                                                <input type='datetime-local' class='form-control' id='event-etime1' name='etime1' value='' onchange=\"document.getElementById('event-end1').value=this.value\" style='margin-bottom:10px'>
                                                <input type='hidden' class='form-control' id='event-end1' name='end1' value=''>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group' style='font-size:8pt'>
                                                Repeating?:<input type='text' class='form-control' id='event-repeating1' name='repeating1' style='margin-bottom:10px' readonly>
                                            </div></div><div class='col-12 col-md-4'><div class='form-group' style='font-size:8pt'>
                                                Sleepover?:<input class='form-control' type='text' id='event-night1' name='night1' style='margin-bottom:10px' readonly>
                                            </div></div>
                                            <div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Notes/Instructions:<textarea readonly id='event-admin_note1' name='admin_note1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                            </div></div><div class='col-12 col-md-6'><div class='form-group' style='font-size:8pt'>
                                                Address:<textarea readonly id='event-address1' name='address1' class='form-control' style='width:100%;height:100px;margin-bottom:10px'></textarea>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        
                                    </div>";
                                }    
                        echo"</div>
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
                
                // Cancel Hours Modal
                echo"<div class='modal fade' id='cancelHoursModal' tabindex='-1' aria-hidden='true'>
                  <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                      <div class='modal-header'>
                        <h5 class='modal-title'>Cancel Shift – Enter Total Hours</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='cancelHoursClose'></button>
                      </div>
                      <div class='modal-body'>
                        <input type='hidden' id='cancelShiftId'>
                        <div class='mb-2 small text-muted'>
                          <div><b>Clock-in (Will stay Same):</b> <span id='cancelClockInPreview'></span></div>
                          <div><b>Clock-out For Worker (ClockIN + Hours):</b> <span id='cancelClockOutPreview'></span></div>
                          <div><b>Clock-out For Invoice (ClockIN + Hours):</b> <span id='cancelClockOutPreview2'></span></div>
                        </div>
                        
                        <label for='cancelReasons' class='form-label'>NDIS Calellation Reasons</label>
                        <select class='form-control' id='cancelReasons' required>
                            <option value=''>Select Reason for Cancellation</option>
                            <option value='NSDH'>No show due to health reason (NSDH)</option>
                            <option value='NSDF'>No show due to family issues (NSDF)</option>
                            <option value='NSDT'>No show due to unavailability of transport (NSDT)</option>
                            <option value='NSDO'>Other (NSDO)</option>
                        </select><Br>
                        
                        <label for='cancelTotalHours' class='form-label'>Add Hours for Worker</label>
                        <input type='number' class='form-control' id='cancelTotalHours' step='0.25' min='0.25' placeholder='e.g. 2.5' required><br>
                        
                        <label for='cancelTotalHours2' class='form-label'>Add Hours for Invoicing</label>
                        <input type='number' class='form-control' id='cancelTotalHours2' step='0.25' min='0.25' placeholder='e.g. 2.5' required><br>
                        
                        <div class='form-text'>Minimum 0.25h. Clock-out will be calculated as <code>ClockIN + Total Hours</code>.</div>
                      </div>
                      <div class='modal-footer'>
                        <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button>
                        <button type='button' id='confirmCancelBtn' class='btn btn-danger'>Confirm Cancel</button>
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
  const deleteEventBtn = document.getElementById('deleteEventBtn');
  const formTitle = document.getElementById('form-title');
  let selectedEvent = null;


// ---------- Template Sidebars (Create / View) ----------
const templateSidebar = document.getElementById('templateSidebar');
const templateListSidebar = document.getElementById('templateListSidebar');
const templateFormMount = document.getElementById('templateFormMount');
const templateListContainer = document.getElementById('templateListContainer');

const openTemplateBtn = document.getElementById('openTemplateBtn');
const openTemplateListBtn = document.getElementById('openTemplateListBtn');
const closeTemplateBtn = document.getElementById('close-template-sidebar');
const closeTemplateListBtn = document.getElementById('close-template-list-sidebar');

function openAnySidebar(el) {
  if (!el) return;
  overlay.classList.add('active');
  el.classList.add('open');
}
function closeAnySidebar(el) {
  if (!el) return;
  el.classList.remove('open');

  const anyOpen =
    (sidebar && sidebar.classList.contains('open')) ||
    (templateSidebar && templateSidebar.classList.contains('open')) ||
    (templateListSidebar && templateListSidebar.classList.contains('open'));

  if (!anyOpen) overlay.classList.remove('active');
}

// Reuse your existing Add Shift form UI by cloning into the template sidebar
function mountTemplateForm() {
  if (!templateFormMount) return null;
  templateFormMount.innerHTML = '';

  if (!addEventForm) {
    templateFormMount.innerHTML = "<div style='padding:10px;color:#fff'>Add Shift form not found.</div>";
    return null;
  }

  const clone = addEventForm.cloneNode(true);
  clone.id = 'add-event-form-template';

  // Add hidden template_id
  let tplId = clone.querySelector("input[name='template_id']");
  if (!tplId) {
    tplId = document.createElement('input');
    tplId.type = 'hidden';
    tplId.name = 'template_id';
    tplId.id = 'template-id';
    tplId.value = '';
    clone.appendChild(tplId);
  }

  // Change submit button text
  const submitBtn = clone.querySelector("button[type='submit'], input[type='submit']");
  if (submitBtn) {
    if (submitBtn.tagName === 'INPUT') submitBtn.value = 'Save Template';
    else submitBtn.textContent = 'Save Template';
  }

  templateFormMount.appendChild(clone);

  // Bind submit
  clone.addEventListener('submit', async (e) => {
    e.preventDefault();
    const fd = new FormData(clone);
    const payload = {};
    fd.forEach((v, k) => (payload[k] = v));

    // Normalize
    if (!payload.stime && payload.start) payload.stime = payload.start;
    if (!payload.etime && payload.end) payload.etime = payload.end;

    const template_id = payload.template_id || '';
    payload.action = template_id ? 'template_update' : 'template_save';

    try {
      const resp = await axios.post('calendar_backend_schedule.php', payload);
      if (!resp?.data || resp.data.status !== 'ok') throw new Error(resp?.data?.message || 'Save failed');
      alert(template_id ? 'Template updated.' : 'Template saved.');
      closeAnySidebar(templateSidebar);
    } catch (err) {
      console.error(err);
      alert('Failed to save template.');
    }
  });

  return clone;
}

// Fill template form for edit
async function openTemplateEditor(templateId) {
  // Close list sidebar so it doesn't cover editor
  closeAnySidebar(templateListSidebar);

  const form = mountTemplateForm();
  if (!form) return;

  try {
    const resp = await axios.get('calendar_backend_schedule.php', {
      params: { action: 'template_get', id: templateId, prjsrc: PRJ_ID, t: Date.now() }
    });
    const t = resp.data;
    if (!t || !t.id) throw new Error('Template not found');

    form.querySelector("input[name='template_id']").value = t.id;

    const setVal = (sel, val) => {
      const el = form.querySelector(sel);
      if (el && val !== undefined && val !== null) el.value = val;
    };

    setVal("#event-itemnumber", t.itemnumber);
    setVal("#event-clientid", t.clientid);
    setVal("#event-employeeid", t.employeeid);
    setVal("#event-start", (t.stime || '').replace(' ', 'T').slice(0,16));
    setVal("#event-end", (t.etime || '').replace(' ', 'T').slice(0,16));
    setVal("#event-stime", (t.stime || '').replace(' ', 'T').slice(0,16));
    setVal("#event-etime", (t.etime || '').replace(' ', 'T').slice(0,16));
    setVal("#event-repeating", t.repeating || 'Once');
    setVal("#event-night", t.night || '0');
    setVal("#event-pcolor", t.color || '#CCCCCC');
    setVal("#event-admin_note", t.admin_note || '');
    setVal("#event-address", t.address || '');

    // Update submit button text
    const submitBtn = form.querySelector("button[type='submit'], input[type='submit']");
    if (submitBtn) {
      if (submitBtn.tagName === 'INPUT') submitBtn.value = 'Update Template';
      else submitBtn.textContent = 'Update Template';
    }

    openAnySidebar(templateSidebar);
  } catch (e) {
    console.error(e);
    alert('Failed to load template for edit.');
  }
}

function initTemplateDragSource() {
  if (!templateListContainer) return;
  if (!window.FullCalendar || !window.FullCalendar.Draggable) {
    console.error('FullCalendar.Draggable not available. Ensure FullCalendar global bundle is loaded.');
    return;
  }
  // Re-init each time list reloads (safe)
  new FullCalendar.Draggable(templateListContainer, {
    itemSelector: '.tplRowExternal',
    eventData: function(el) {
      return {
        title: el.querySelector('.tplTitle')?.innerText || 'Template',
        extendedProps: {
          template_id: el.getAttribute('data-template-id')
        }
      };
    }
  });
}

async function loadTemplates() {
  if (!templateListContainer) return;
  templateListContainer.innerHTML = "<div style='padding:10px'>Loading...</div>";

  try {
    const resp = await axios.get('calendar_backend_schedule.php', {
      params: { action: 'template_list', prjsrc: PRJ_ID, t: Date.now() }
    });

    const rows = Array.isArray(resp.data) ? resp.data : [];
    if (!rows.length) {
      templateListContainer.innerHTML = "<div style='padding:10px'>No templates found for this project.</div>";
      return;
    }

    templateListContainer.innerHTML = rows.map((t) => {
      const st = (t.stime || '').substring(0,16);
      const en = (t.etime || '').substring(0,16);
      return `
        <div class="tplRowExternal" data-template-id="${t.id}"
             style="border:1px solid #333;border-radius:6px;padding:10px;margin:10px;cursor:grab;background:#1a1a1a">
          <div class="tplTitle" style="font-weight:600">${t.employee || 'Template'}</div>
          <div style="font-size:12px;color:#ccc">${st} - ${en}</div>
          <div style="margin-top:8px;display:flex;gap:8px;flex-wrap:wrap">
            <button type="button" class="btn btn-sm btn-warning tplEditBtn" data-id="${t.id}">Edit</button>
            <button type="button" class="btn btn-sm btn-danger tplDelBtn" data-id="${t.id}">Delete</button>
          </div>
        </div>
      `;
    }).join('');

    templateListContainer.querySelectorAll('.tplEditBtn').forEach(btn => {
      btn.addEventListener('click', async (e) => {
        e.stopPropagation();
        const id = btn.getAttribute('data-id');
        if (id) openTemplateEditor(id);
      });
    });

    templateListContainer.querySelectorAll('.tplDelBtn').forEach(btn => {
      btn.addEventListener('click', async (e) => {
        e.stopPropagation();
        const id = btn.getAttribute('data-id');
        if (!id) return;
        if (!confirm('Delete this template?')) return;
        try {
          const r = await axios.post('calendar_backend_schedule.php', { action: 'template_delete', template_id: id });
          if (!r?.data || r.data.status !== 'ok') throw new Error(r?.data?.message || 'Delete failed');
          await loadTemplates();
        } catch (err) {
          console.error(err);
          alert('Failed to delete template.');
        }
      });
    });

    // Enable drag source
    initTemplateDragSource();
  } catch (e) {
    console.error(e);
    templateListContainer.innerHTML = "<div style='padding:10px'>Failed to load templates.</div>";
  }
}

if (openTemplateBtn) {
  openTemplateBtn.addEventListener('click', () => {
    mountTemplateForm();
    // reset create mode
    const tId = document.getElementById('template-id');
    if (tId) tId.value = '';
    openAnySidebar(templateSidebar);
  });
}
if (openTemplateListBtn) {
  openTemplateListBtn.addEventListener('click', async () => {
    openAnySidebar(templateListSidebar);
    await loadTemplates();
  });
}
if (closeTemplateBtn) closeTemplateBtn.addEventListener('click', () => closeAnySidebar(templateSidebar));
if (closeTemplateListBtn) closeTemplateListBtn.addEventListener('click', () => closeAnySidebar(templateListSidebar));

  // ---------- Helpers ----------
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
  function isTrue(v) { return v === 1 || v === '1' || v === true || v === 'true'; }
  function isZero(v) { return v === 0 || v === '0'; }

  // FullCalendar -> "YYYY-MM-DD HH:mm:ss"
  function fcLocal(dt) {
    return FullCalendar.formatDate(dt, {
      timeZone: 'local',
      year: 'numeric', month: '2-digit', day: '2-digit',
      hour: '2-digit', minute: '2-digit', second: '2-digit',
      hour12: false
    }).replace(',', '');
  }

  // <input type="datetime-local"> -> "YYYY-MM-DDTHH:mm"
  function toInputLocal(dt) {
    if (!dt) return '';
    const pad = n=> String(n).padStart(2,'0');
    const d = new Date(dt);
    return `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())}T${pad(d.getHours())}:${pad(d.getMinutes())}`;
  }

  function addHoursToIsoLocal(isoLocal, hours){
    if(!isoLocal) return '';
    const d = new Date(isoLocal);
    const ms = Math.round(hours * 60 * 60 * 1000);
    const out = new Date(d.getTime()+ms);
    const pad=n=>String(n).padStart(2,'0');
    return `${out.getFullYear()}-${pad(out.getMonth()+1)}-${pad(out.getDate())}T${pad(out.getHours())}:${pad(out.getMinutes())}`;
  }

    // ---------- Ensure Cancel Hours Modal exists ----------
    function ensureCancelHoursModal(){
        if(document.getElementById('cancelHoursModal')) return;
        const html = `
            <div class="modal fade" id="cancelHoursModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cancel Shift – Enter Total Hours</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancelHoursClose"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="cancelShiftId">
                            <div class="mb-2 small text-muted">
                                <div><b>Clock-in (Stay Same):</b> <span id="cancelClockInPreview"></span></div>
                                <div><b>Clock-out For Worker (ClockIN + hours):</b> <span id="cancelClockOutPreview">—</span></div>
                                <div><b>Clock-out For Invoice (ClockIN + hours):</b> <span id="cancelClockOutPreview2">—</span></div>
                                <div><b>NDIS Cancellation Reason:</b> <span id="cancelReasonsPreview">—</span></div>
                            </div>
                            <input type="number" class="form-control" id="cancelTotalHours" step="0.25" min="0.25" placeholder="e.g. 2.5">
                            <label for="cancelTotalHours2" class="form-label">Add Hours for Invoicing</label>
                            <input type="number" class="form-control" id="cancelTotalHours2" step="0.25" min="0.25" placeholder="e.g. 2.5">
                            <div class="form-text">Clock-out will be calculated as <code>ClockIN + Total Hours</code>.</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="confirmCancelBtn" class="btn btn-danger">Confirm Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        const div = document.createElement('div');
        div.innerHTML = html;
        document.body.appendChild(div.firstElementChild);
    }
    ensureCancelHoursModal();

    // ---------- Cancel Hours Modal controller ----------
    function openCancelHoursModal() {
        const id = selectedEvent?.extendedProps?.idx || selectedEvent?.id;
        if (!id) { alert('Missing shift id.'); return; }
        const stIso = (document.getElementById('event-stime1')?.value || document.getElementById('event-start1')?.value || toInputLocal(selectedEvent.start) || '');

        document.getElementById('cancelShiftId').value = id;
        document.getElementById('cancelClockInPreview').textContent = stIso ? stIso.replace('T',' ') : '(not set)';
    
        document.getElementById('cancelTotalHours').value = '';
        document.getElementById('cancelTotalHours2').value = '';
        document.getElementById('cancelReasons').value = '';
    
        document.getElementById('cancelClockOutPreview').textContent = '—';
        document.getElementById('cancelClockOutPreview2').textContent = '—';
    
        const hoursInput = document.getElementById('cancelTotalHours');
        const hoursInput2 = document.getElementById('cancelTotalHours2');
        const cancelInput = document.getElementById('cancelReasons');
    
        hoursInput.oninput = function(){
            const h = parseFloat(hoursInput.value || '0');
            if(!isFinite(h) || h<=0){ document.getElementById('cancelClockOutPreview').textContent='—'; return; }
            const outIso = addHoursToIsoLocal(stIso, h);
            document.getElementById('cancelClockOutPreview').textContent = outIso ? outIso.replace('T',' ') : '—';
        };
    
        hoursInput2.oninput = function(){
            const h2 = parseFloat(hoursInput2.value || '0');
            if(!isFinite(h2) || h2<=0){ document.getElementById('cancelClockOutPreview2').textContent='—'; return; }
            const outIso = addHoursToIsoLocal(stIso, h2);
            document.getElementById('cancelClockOutPreview2').textContent = outIso ? outIso.replace('T',' ') : '—';
        };

        new bootstrap.Modal(document.getElementById('cancelHoursModal'), {backdrop:'static', keyboard:false}).show();
    
    }

    // Add modal action buttons if missing (Accept / Request New Time / Cancel → Hours modal)
    function ensureModalActionButtons() {
        const footer = document.querySelector('#eventModal .modal-footer');
        if (!footer) return;

        function ensureBtn(id, text, classes) {
            let b = document.getElementById(id);
            if (!b) {
                b = document.createElement('button');
                b.type = 'button';
                b.id = id;
                b.className = classes;
                b.textContent = text;
                footer.prepend(b);
            }
            return b;
        }

        const acceptBtn  = ensureBtn('acceptShiftBtn',  'Accept',     'btn btn-outline-success btn-sm');
        const requestBtn = ensureBtn('requestTimeBtn',  'Request Change', 'btn btn-outline-warning btn-sm');
        const cancelBtn  = ensureBtn('cancelShiftBtn',  'Cancel',     'btn btn-outline-danger btn-sm');

        if (!acceptBtn.dataset.bound) {
            acceptBtn.dataset.bound = '1';
            acceptBtn.addEventListener('click', async () => {
                if (!selectedEvent) return;
                const id = selectedEvent.extendedProps.idx || selectedEvent.id;
                try {
                const resp = await axios.post('calendar_backend_schedule.php', { action: 'accept', id });
                    if (!resp?.data || resp.data.status !== 'ok') throw new Error('Backend rejected accept');
                    alert('Shift accepted.');
                    selectedEvent.setExtendedProp('accepted', 1);
                    $('#eventModal').modal('hide');
                    await calendar.refetchEvents();
                } catch (e) { console.error(e); alert('Failed to accept shift.'); }
            });
        }

        if (!requestBtn.dataset.bound) {
            requestBtn.dataset.bound = '1';
            requestBtn.addEventListener('click', async () => {
            if (!selectedEvent) return;
            const id = selectedEvent.extendedProps.idx || selectedEvent.id;
            const stEl = document.getElementById('event-stime1');
            const etEl = document.getElementById('event-etime1');
            let ci = stEl?.value || document.getElementById('event-start1')?.value || toInputLocal(selectedEvent.start);
            let co = etEl?.value || document.getElementById('event-end1')?.value   || (selectedEvent.end ? toInputLocal(selectedEvent.end) : '');
            if (!ci || !co) { alert('Please provide both requested times.'); return; }
            try {
              const resp = await axios.post('calendar_backend_schedule.php', { action: 'request_time', id, clockin_request: ci, clockout_request: co });
              if (!resp?.data || resp.data.status !== 'ok') throw new Error('Backend rejected request');
              alert('New time requested.');
              selectedEvent.setExtendedProp('clockin_request', ci);
              selectedEvent.setExtendedProp('clockout_request', co);
              $('#eventModal').modal('hide');
            } catch (e) { console.error(e); alert('Failed to request new time.'); }
          });
        }

        <?php if($mtype=="ADMIN"){ ?>
            // UPDATED: Cancel now opens the "hours" modal instead of direct cancel
            if (!cancelBtn.dataset.bound) {
              cancelBtn.dataset.bound = '1';
              cancelBtn.addEventListener('click', () => {
                if (!selectedEvent) return;
                $('#eventModal').modal('hide');
                setTimeout(openCancelHoursModal, 250);
              });
            }
        <?php } ?>
        
        // Bind Confirm Cancel in the hours modal
        const confirmBtn = document.getElementById('confirmCancelBtn');
        if (confirmBtn && !confirmBtn.dataset.bound) {
          confirmBtn.dataset.bound = '1';
          confirmBtn.addEventListener('click', async () => {
            if (!selectedEvent) return;
            const id = document.getElementById('cancelShiftId').value;
            
            let total_hour = parseFloat(document.getElementById('cancelTotalHours').value || '0');
            let total_hour2 = parseFloat(document.getElementById('cancelTotalHours2').value || '0');
            let cancel_reasons = document.getElementById('cancelReasons').value || '';
            
            if (!isFinite(total_hour) || total_hour <= 0) { alert('Enter a valid number of hours (> 0).'); return; }
            if (!isFinite(total_hour2) || total_hour2 <= 0) { alert('Enter a valid number of hours (> 0).'); return; }
            if (cancel_reasons.trim().length < 3) { alert('Select Cancellation Reason.'); return; }
            
            try {
              const resp = await axios.post('calendar_backend_schedule.php', {
                action: 'cancel',
                id: id,
                total_hour: total_hour,
                total_hour2: total_hour2,
                cancel_reasons: cancel_reasons
                // Backend should set: cancelled=1, total_hour=<given>, clockin=stime, clockout=stime+total_hour
              });
              if (!resp?.data || resp.data.status !== 'ok') throw new Error(resp?.data?.message || 'Cancel failed');
    
              alert('Shift cancelled and hours saved.');
              selectedEvent.setExtendedProp('cancelled', 1);
              await calendar.refetchEvents();
    
              const modalEl = document.getElementById('cancelHoursModal');
              bootstrap.Modal.getInstance(modalEl)?.hide();
            } catch (e) {
              console.error(e);
              alert('Failed to cancel shift.');
            }
          });
        }
    }

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridWeek',
        timeZone: 'local',
        editable: true,
        selectable: true,
        droppable: true,

        customButtons: {
          customYear: { text: 'Year',  click: () => calendar.changeView('dayGridYear') },
          customMonth:{ text: 'Month', click: () => calendar.changeView('dayGridMonth') },
          customWeek: { text: 'Week',  click: () => calendar.changeView('dayGridWeek') },
          customDay:  { text: 'Day',   click: () => calendar.changeView('dayGridDay') }
        },

        headerToolbar: {
          left: 'prev,today,next',
          center: 'title',
          right: 'customYear,customMonth,customWeek,customDay'
        },

        eventContent: function(arg) {
          let employeeName = arg.event.title;
          let clientName = arg.event.extendedProps.title2;
          let designationName = arg.event.extendedProps.designationname;
          return {
            html: `
              <div style="font-weight:bold;">${employeeName}</div>
              <div style="font-size:11px; color:gray;">${clientName||''}</div>
              <div style="font-size:11px; color:gray;">${designationName||''}</div>
            `
          };
        },

        eventDidMount: function(info) {
          const cancelled   = isTrue(info.event.extendedProps.cancelled);
          const acceptedVal = info.event.extendedProps.accepted; // expect 0/1 or '0'/'1'
          const unaccepted  = isZero(acceptedVal); // accepted = 0 => yellow
    
          const baseColor =
            info.event.extendedProps.pcolor ||
            info.event.backgroundColor ||
            info.event.color ||
            '#f0f0f0';
    
          let allocatedColor, textColor, textCancelColor;
    
          if (cancelled) {
            allocatedColor = '#d9d9d9'; // grey
            textColor = '#333333';
            textCancelColor = '#D6473F';
          } else if (unaccepted) {
            allocatedColor = '#fff3cd'; // soft yellow
            textColor = '#333333';
          } else {
            allocatedColor = baseColor;
            textColor = getContrastYIQ(allocatedColor);
          }
    
            let buttonsHtml = '';
            if (info.event.extendedProps.cancelled_status === "Cancellation Reason") {
                buttonsHtml += `<button style="width:100%;font-size:8pt;margin-bottom:5px" class="btn btn-danger btn-sm">
                    ${info.event.extendedProps.cancelled_status || ''}: ${info.event.extendedProps.cancelled_reason || ''}
                </button><br>`;
            } else if (info.event.extendedProps.accepted == 1 && info.event.extendedProps.cancelled_reason !== "Cancellation Reason") {
                buttonsHtml += `<a href='dataprocessor.php?processor=shiftapprove&shiftid=${info.event.extendedProps.idx || ''}&url=clock_in-out.php&src_employeeid=${info.event.extendedProps.employeeid || ''}&id=1&status=100&gogo=1'><button style="width:100%;font-size:8pt;background-color:#016F46;color:#FFFFFF;margin-bottom:5px" class="btn btn-sm">Clock IN/Out</button><br>`;
            } else if (info.event.extendedProps.accepted == 0 && info.event.extendedProps.cancelled_reason !== "Cancellation Reason") {
                
                if (info.event.extendedProps.request2 == 1) {
                    <?php if($mtype=="ADMIN"){ ?>
                        buttonsHtml += `<a href="updaterecord.php?rid=${info.event.extendedProps.idx || ''}&approval=1" target="dataprocessor" onclick="calendar.refetchEvents();"><button style="width:100%;font-size:8pt;background-color:#016F46;color:#000000;margin-bottom:5px" class="btn btn-sm">Approve Request</button></a><br>
                        <span style='font-size:8pt'>ClockIN : ${info.event.extendedProps.clockin_request1 || ''} <br>ClockOUT: ${info.event.extendedProps.clockout_request1 || ''}</span><br>
                        <a href="updaterecord.php?rid=${info.event.extendedProps.idx || ''}&approval=0" target="dataprocessor"><button style="width:100%;font-size:8pt;background-color:#E20808;color:#000000;margin-bottom:5px" class="btn btn-sm" onclick="calendar.refetchEvents();">Cancel Request</button></a>`;
                    <?php }else{ ?>
                        buttonsHtml += `<button style="width:100%;font-size:8pt;background-color:#F7671F;color:#000000;margin-bottom:5px" class="btn btn-sm" onclick="calendar.refetchEvents();">Pending Request</button><br>
                        <span style='font-size:8pt'>ClockIN : ${info.event.extendedProps.clockin_request1 || ''} <br>ClockOUT: ${info.event.extendedProps.clockout_request1 || ''}</span>`;
                    <?php } ?>
                    
                } else if (info.event.extendedProps.request2 == 2) {
                    buttonsHtml += `<button style="width:100%;font-size:8pt;background-color:#38D2AE;color:#000000;margin-bottom:5px" class="btn btn-sm">Request Approved</button><br>`;
                    buttonsHtml += `<button style="width:100%;font-size:8pt;background-color:#0000F7;color:#FFFFFF;margin-bottom:5px" class="btn btn-sm">Accept This Shift</button><br>`;
                } else if (info.event.extendedProps.request2 == 3) {
                    buttonsHtml += `<button style="width:100%;font-size:8pt;background-color:#E20808;color:#FFFFFF;margin-bottom:5px" class="btn btn-sm">Request Not Approved</button><br>`;
                }else{
                    buttonsHtml += `<button style="width:100%;font-size:8pt;background-color:#0000F7;color:#FFFFFF;margin-bottom:5px" class="btn btn-sm">Accept This Shift</button><br>`;
                    buttonsHtml += `<button style="width:100%;font-size:8pt;background-color:#F7950A;color:#000000;margin-bottom:5px" class="btn btn-sm">Request Change</button><br>`;
                }
            }
            
            info.el.innerHTML = `
                <div style="
                  border:1px solid ${allocatedColor};
                  border-radius:5px;
                  padding:5px;
                  font-size:12px;
                  width:100%;
                  background-color:${allocatedColor};
                  color:${textColor};
                  ${cancelled ? 'filter:grayscale(1);' : ''}
                ">
                    <b>${info.event.extendedProps.allocatedtime || ''} (${info.event.extendedProps.repeating || ''})</b><br>
                    <small>
                        ${info.event.extendedProps.client || ''}<br>
                        ${info.event.extendedProps.employee || ''}<br>
                        ${info.event.extendedProps.designationname || ''}
                    </small><br>
            
                    ${buttonsHtml}
                </div>
            `;

    
            info.el.addEventListener('mouseenter', () => {
                if (cancelled) {
                    info.el.style.filter = 'grayscale(1) brightness(95%)';
                } else {
                    info.el.style.filter = 'brightness(90%)';
                }
                info.el.style.transform = 'scale(1.03)';
            });
            info.el.addEventListener('mouseleave', () => {
                info.el.style.filter = cancelled ? 'grayscale(1)' : 'brightness(100%)';
                info.el.style.transform = 'scale(1)';
            });
        },
    
        dateClick: function (info) {
            selectedEvent = null;
            document.getElementById('event-start').value = info.dateStr + 'T08:00';
            document.getElementById('event-end').value   = info.dateStr + 'T17:00';
            document.getElementById('event-stime').value = info.dateStr + 'T08:00';
            document.getElementById('event-etime').value = info.dateStr + 'T17:00';
            formTitle.textContent = 'Assign Shift';
            if (deleteEventBtn) deleteEventBtn.style.display = 'none';
            openSidebar();
        },

// External template dropped onto calendar -> create shift
eventReceive: async function(info) {
    try {
        const tplId = info.event.extendedProps?.template_id;
        if (!tplId) throw new Error('Missing template_id');
        const dropStart = info.event.start ? info.event.start.toISOString() : null;
        if (!dropStart) throw new Error('Missing drop start');

        const resp = await axios.post('calendar_backend_schedule.php', {
            action: 'template_apply_at',
            template_id: tplId,
            drop_start: dropStart,
            projectid: PRJ_ID
        });
        if (!resp?.data || resp.data.status !== 'ok') throw new Error(resp?.data?.message || 'Drop save failed');

        info.event.setProp('id', resp.data.id);
        info.event.setStart(resp.data.start);
        if (resp.data.end) info.event.setEnd(resp.data.end);
        if (resp.data.color) info.event.setProp('color', resp.data.color);

        await calendar.refetchEvents();
    } catch (e) {
        console.error(e);
        alert('Failed to drop template. Reverting.');
        info.event.remove();
    }
},
    
        events: async function (fetchInfo, successCallback, failureCallback) {
            try {
                const response = await axios.get('calendar_backend_schedule.php', { 
                    params: { prjsrc: PRJ_ID, t: Date.now() }
                });
                successCallback(response.data);
            } catch (error) {
                console.error('Error fetching events:', error);
                failureCallback(error);
            }
        },

    <?php if($mtype=="ADMIN" OR $teamleaderid==$userid OR $designationy=="20") { ?>
    eventResize: async function (info) {
      try {
        const dbId = info.event.extendedProps.idx || info.event.id;
        const startLocal = fcLocal(info.event.start);
        const endLocal = info.event.end ? fcLocal(info.event.end) : null;
        const payload = { id: dbId, start: startLocal, end: endLocal, projectid: PRJ_ID, action: 'resize' };
        const resp = await axios.post('calendar_backend_schedule.php', payload);
        if (!resp.data || resp.data.status === 'error') throw new Error(resp.data?.message || 'Backend rejected resize');
        await calendar.refetchEvents();
      } catch (err) {
        console.error('Error updating event (resize):', err);
        alert('Failed to resize Shift. Reverting.');
        info.revert();
      }
    },
    <?php } ?>

    eventClick: function (info) {
      selectedEvent = info.event;
      formTitle.textContent = 'Edit Shift';

      document.getElementById('event-id1').value         = selectedEvent.extendedProps.idx;
      document.getElementById('event-clientid1').value   = selectedEvent.extendedProps.clientid;
      document.getElementById('event-employeeid1').value = selectedEvent.extendedProps.employeeid;

      const startIsoLocal = toInputLocal(selectedEvent.start);
      const endIsoLocal   = selectedEvent.end ? toInputLocal(selectedEvent.end) : '';

      const st1 = document.getElementById('event-stime1');
      const et1 = document.getElementById('event-etime1');
      if (st1) st1.value = startIsoLocal;
      if (et1) et1.value = endIsoLocal;

      document.getElementById('event-start1').value      = startIsoLocal;
      document.getElementById('event-end1').value        = endIsoLocal;

      document.getElementById('event-night1').value      = selectedEvent.extendedProps.night;
      document.getElementById('event-pcolor1').value     = selectedEvent.extendedProps.pcolor;
      document.getElementById('event-category1').value   = selectedEvent.extendedProps.category;
      const ino = document.getElementById('event-itemnumber1'); if (ino) ino.value = selectedEvent.extendedProps.itemnumber || '';
      document.getElementById('event-repeating1').value  = selectedEvent.extendedProps.repeating;
      document.getElementById('event-admin_note1').value = selectedEvent.extendedProps.admin_note || '';
      document.getElementById('event-address1').value    = selectedEvent.extendedProps.address || '';

      if (deleteEventBtn) deleteEventBtn.style.display = 'block';

      ensureModalActionButtons();
      $('#eventModal').modal('show');
    }
  });

    calendar.render();
    
    // Auto refresh events every 60 seconds
    setInterval(function () {
        calendar.refetchEvents();
    }, 10000); // 60000 ms = 60 seconds


    // Refresh interval (in ms)
    const REFRESH_INTERVAL = 60000; // 60 seconds
    
    // Auto refresh function
    function autoRefreshCalendar() {
        if (!document.hidden) { 
            // only refresh when tab is active
            calendar.refetchEvents();
        }
    }
    
    // Start interval after calendar is rendered
    setInterval(autoRefreshCalendar, REFRESH_INTERVAL);
    
    // Also refresh immediately when tab becomes active again
    document.addEventListener('visibilitychange', function () {
        if (!document.hidden) {
            calendar.refetchEvents();
        }
    });

    

  <?php if($mtype=="ADMIN" OR $teamleaderid==$userid OR $designationy=="20") { ?>

      // --- Toolbar search ---
      insertSearchBox();
      function insertSearchBox() {
        var toolbarRight = document.querySelector('.fc-toolbar-chunk:last-child');
        if (toolbarRight) {
          var wrapper = document.createElement('div');
          wrapper.style.marginTop = '-32px';
          wrapper.style.marginLeft = '-150px';
          wrapper.style.display = 'flex';
          wrapper.style.gap = '5px';
          wrapper.style.alignItems = 'center';
          wrapper.style.position = 'absolute';
          var searchBox = document.createElement('input');
          searchBox.type = 'text';
          searchBox.id = 'calendar-search';
          searchBox.placeholder = 'Search events...';
          searchBox.style.padding = '3px';
          searchBox.style.width = '120px';
          searchBox.style.border = '1px solid #ccc';
          searchBox.style.borderRadius = '4px';
          var searchIcon = document.createElement('i');
          searchIcon.classList.add('fa', 'fa-search');
          searchIcon.style.cursor = 'pointer';
          searchIcon.style.fontSize = '18px';
          searchIcon.style.color = '#007bff';
          wrapper.appendChild(searchBox);
          wrapper.appendChild(searchIcon);
          toolbarRight.appendChild(wrapper);
          searchIcon.addEventListener('click', function() {
            var searchTerm = searchBox.value.toLowerCase();
            calendar.getEvents().forEach(function(event) {
              var match = event.title.toLowerCase().includes(searchTerm) ||
                (event.extendedProps.designationname && event.extendedProps.designationname.toLowerCase().includes(searchTerm)) ||
                (event.extendedProps.title2 && event.extendedProps.title2.toLowerCase().includes(searchTerm)) ||
                (event.extendedProps.location && event.extendedProps.location.toLowerCase().includes(searchTerm));
              event.setProp('display', match ? 'auto' : 'none');
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
      
      if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
    
      // --- Add shift ---
      if (addEventForm) addEventForm.addEventListener('submit', async function (e) {
        e.preventDefault();
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
    
        const newEvent = { projectid, clientid, employeeid, stime, etime, night, start, end, pcolor, category, itemnumber, admin_note, address, repeating };
    
        try {
          const response = await axios.post('calendar_backend_schedule.php', newEvent);
          if (response.data.status === "error") { alert(response.data.message); return; }
          closeSidebar();
          addEventForm.reset();
          await calendar.refetchEvents();
        } catch (error) {
          console.error('Error adding Shift:', error);
          alert('Failed to add Shift. Please try again.');
        }
      });
    
      // --- Edit shift ---
      if (editEventForm) editEventForm.addEventListener('submit', async function (e) {
        e.preventDefault();
        const id        = document.getElementById('event-id1').value;
        const projectid = document.getElementById('event-projectid1').value;
        const clientid  = document.getElementById('event-clientid1').value;
        const employeeid= document.getElementById('event-employeeid1').value;
        const stime     = document.getElementById('event-stime1').value || document.getElementById('event-start1').value;
        const etime     = document.getElementById('event-etime1').value || document.getElementById('event-end1').value;
        const start     = document.getElementById('event-start1').value;
        const end       = document.getElementById('event-end1').value;
        const category  = document.getElementById('event-category1').value;
        const itemnumber= document.getElementById('event-itemnumber1') ? document.getElementById('event-itemnumber1').value : '';
        const repeating = document.getElementById('event-repeating1').value;
        const pcolor    = document.getElementById('event-pcolor1').value;
        const admin_note= document.getElementById('event-admin_note1').value;
        const address   = document.getElementById('event-address1').value;
        const night     = document.getElementById('event-night1').value;
    
        const editEvent = { id, projectid, clientid, employeeid, stime, etime, night, start, end, pcolor, category, itemnumber, repeating, admin_note, address };
    
        try {
          const response = await axios.post('calendar_backend_schedule.php', editEvent);
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
          alert('Shift Updated successfully!');
          $('#eventModal').modal('hide');
          editEventForm.reset();
          calendar.refetchEvents();
        } catch (error) {
          console.error('Error updating Shift:', error);
          alert('Failed to update Shift.');
        }
      });
    
      // --- Delete shift ---
      if (deleteEventBtn) deleteEventBtn.addEventListener('click', async function () {
        if (confirm('Are you sure you want to delete this Shift?')) {
          await axios.post('calendar_backend_schedule.php', { id: selectedEvent.id, delete: true });
          selectedEvent.remove();
          closeSidebar();
        }
      });
    
      // ===== Drag & Drop: Copy / Move =====
      window.pendingDrop = null;
    
      function bindDropModalButtons() {
        const btnCopy  = document.getElementById('btnDropCopy');
        const btnMove  = document.getElementById('btnDropMove');
        const btnCancel= document.getElementById('btnDropCancel');
        const closeBtn = document.getElementById('dragChoiceClose');
    
        // COPY
        if (btnCopy && !btnCopy.dataset.bound) {
          btnCopy.dataset.bound = '1';
          btnCopy.addEventListener('click', async function () {
            if (!window.pendingDrop) return;
            const { info, startLocal, endLocal, safeClientId, safeEmployeeId, safeProjectId } = window.pendingDrop;
            try {
              const src = info.event;
              const x = src.extendedProps || {};
    
              const projectid  = safeProjectId || x.projectid || PRJ_ID || '';
              const clientid   = safeClientId  || x.clientid  || '';
              const employeeid = safeEmployeeId|| x.employeeid|| '';
              const sourceId   = x.idx || src.id;
    
              if (!projectid || !clientid || !employeeid || !sourceId) {
                alert('Copy failed: missing project/client/employee/source id on this event.');
                info.revert();
                window.pendingDrop = null;
                bootstrap.Modal.getInstance(document.getElementById('dragChoiceModal'))?.hide();
                return;
              }
    
              info.revert();
    
              const resp = await axios.post('calendar_backend_schedule.php', {
                action: 'copy',
                source_id: sourceId,
                projectid,
                clientid,
                employeeid,
                start: startLocal,
                end: endLocal,
                night: (x.night ?? 0),
                pcolor: x.pcolor || src.backgroundColor || src.color || '',
                admin_note: x.admin_note || '',
                address: x.address || '',
                itemnumber: x.itemnumber || '',
                repeating: x.repeating || 'Once'
              });
    
              if (!resp?.data || resp.data.status === 'error') {
                throw new Error(resp?.data?.message || 'Backend rejected copy');
              }
    
              await calendar.refetchEvents();
            } catch (err) {
              console.error('Copy error:', err);
              alert('Failed to copy shift.');
            } finally {
              window.pendingDrop = null;
              const modalEl = document.getElementById('dragChoiceModal');
              if (modalEl) bootstrap.Modal.getInstance(modalEl)?.hide();
            }
          });
        }
    
        // MOVE
        if (btnMove && !btnMove.dataset.bound) {
          btnMove.dataset.bound = '1';
          btnMove.addEventListener('click', async function () {
            if (!window.pendingDrop) return;
            const { info, dbId, startLocal, endLocal } = window.pendingDrop;
            try {
              const x = info.event.extendedProps || {};
              const payload = {
                id: dbId,
                start: startLocal, end: endLocal,
                stime: startLocal, etime: endLocal,
                repeating: x.repeating || 'Once',
                pcolor: x.pcolor || info.event.backgroundColor || info.event.color || '',
                itemnumber: x.itemnumber || '',
                admin_note: x.admin_note || '',
                address: x.address || '',
                projectid: PRJ_ID,
                action: 'move'
              };
              const resp = await axios.post('calendar_backend_schedule.php', payload);
              if (!resp?.data || resp.data.status === 'error') throw new Error(resp?.data?.message || 'Move failed');
              await info.event.setStart(startLocal);
              if (endLocal) await info.event.setEnd(endLocal);
              await calendar.refetchEvents();
            } catch (err) {
              console.error('Move error:', err);
              alert('Failed to move shift. Reverting.');
              window.pendingDrop?.info?.revert();
            } finally {
              window.pendingDrop = null;
              const modalEl = document.getElementById('dragChoiceModal');
              if (modalEl) bootstrap.Modal.getInstance(modalEl)?.hide();
            }
          });
        }
    
        function cancelDrop() {
          if (window.pendingDrop) {
            window.pendingDrop.info.revert();
            window.pendingDrop = null;
          }
        }
        if (btnCancel && !btnCancel.dataset.bound) { btnCancel.dataset.bound = '1'; btnCancel.addEventListener('click', cancelDrop); }
        if (closeBtn && !closeBtn.dataset.bound)  { closeBtn.dataset.bound  = '1'; closeBtn.addEventListener('click',  cancelDrop); }
      }
    
      bindDropModalButtons();
    
      calendar.setOption('eventDrop', function (info) {
        try {
          const dbId = info.event.extendedProps.idx || info.event.id;
    
          const newStart = new Date(info.event.start);
          let newEnd = null;
    
          if (info.event.end) {
            newEnd = new Date(info.event.end);
          } else {
            let origStart = null, origEnd = null;
            const x = info.event.extendedProps || {};
            if (x.stime) origStart = new Date(x.stime);
            if (x.etime) origEnd   = new Date(x.etime);
            if ((!origStart || !origEnd) && info.oldEvent) {
              if (!origStart) origStart = new Date(info.oldEvent.start);
              if (!origEnd && info.oldEvent.end) origEnd = new Date(info.oldEvent.end);
            }
            let durMs = 60 * 60 * 1000;
            if (origStart && origEnd) {
              const diff = origEnd.getTime() - origStart.getTime();
              if (diff > 0) durMs = diff;
            }
            newEnd = new Date(newStart.getTime() + durMs);
          }
    
          const startLocal = fcLocal(newStart);
          const endLocal   = fcLocal(newEnd);
    
          const x = info.event.extendedProps || {};
          const safeProjectId  = (typeof PRJ_ID !== 'undefined' && PRJ_ID) ? PRJ_ID : (x.projectid || '');
          const safeClientId   = x.clientid || '';
          const safeEmployeeId = x.employeeid || '';
    
          window.pendingDrop = { info, dbId, startLocal, endLocal, safeProjectId, safeClientId, safeEmployeeId };
    
          const details = document.getElementById('dragChoiceDetails');
          if (details) details.innerHTML = `<div><b>New:</b> ${startLocal}${endLocal ? (' → ' + endLocal) : ''}</div>`;
    
          const modalEl = document.getElementById('dragChoiceModal');
          new bootstrap.Modal(modalEl, { backdrop: 'static', keyboard: false }).show();
    
        } catch (e) {
          console.error('eventDrop preparation error:', e);
          alert('Could not process drop. Reverting.');
          info.revert();
          window.pendingDrop = null;
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
        
        


<!-- jQuery (only once) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.6.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
  // Initialize ALL select2 elements
  $('.select2').select2({
    theme: 'bootstrap4',
    placeholder: 'Select or search...',
    allowClear: true,
    width: '100%'
  });
});
</script>
