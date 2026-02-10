<?php
    error_reporting(0);                                 // Turn off error reporting
    date_default_timezone_set("Australia/Melbourne");
    $sheba="projects";
    $cid=90009;
    $title="Add New Project";
    $utype="PROJECTS/LEADS";

    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;

    if($pstat==1){
        echo"<div class='row'>
            <div class='col-12 col-md-5' style='padding-bottom:10px'>
                
                <h1 class='mb-0 pb-0 display-4' id='title'>Self Plan Manager</h1>
            
                <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                    <ul class='breadcrumb pt-0'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>Plan & Communication Book</a></li>
                    </ul>
                </nav>
            </div>
            <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
            
                <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                    <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>New Project</span>
                </button>
                <a href='index.php?url=schedule.php' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'>
                    <i data-acorn-icon='clock'></i>&nbsp;&nbsp;<span>Schedules</span>
                </a>

                <a href='index.php?url=daily_shift_status.php' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'>
                    <i data-acorn-icon='clock'></i>&nbsp;&nbsp;<span>Daily Shifts</span>
                </a>
    
                <div class='btn-group ms-1 check-all-container'>
                    <div class='d-inline-block'>
                        
                        <table><tr><td nowrap>
                            <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ChartModeForm'>
                                <input type='hidden' name='chartmode' value='1'>
                                <a onmouseover=\"document.ChartModeForm.submit()\" onmouseup=\"shiftdataV2('chart_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='chart-4'></i></a>
                            </form>
                        </td><td nowrap>
                            <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ViewModeForm'>
                                <input type='hidden' name='viewmode' value='LIST'>
                                <a onmouseover=\"document.ViewModeForm.viewmode.value='LIST'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='list'></i></a>
                                <a onmouseover=\"document.ViewModeForm.viewmode.value='CARD'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='grid-3'></i></a>                        
                                <a href='print_data.php?pointer=PRINT&printid=$sheba' target='dataprocessor' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='print'></i></a>
                            </form>
                        </td><td nowrap>
                            <div class='d-inline-block datatable-export' data-datatable='#datatableStripe' style='margin-top:-15px;margin-left:4px'>                        
                                <button class='btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                                    <i data-acorn-icon='download'></i>
                                </button>
                                <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                    <form method='get' action='print_data.php' target='dataprocessor' enctype='multipart/form-data' name='PrintForm'>
                                        <input type='hidden' name='pointer' value='PDF'><input type='hidden' name='printid' value='$sheba'>
                                        <a class='dropdown-item' href='#' onmouseover=\"document.PrintForm.pointer.value='PDF'\" onclick=\"document.PrintForm.submit()\">Pdf</a>                                
                                    </form>
                                    <a id='notifyButtonBottomLeft' href='#' onclick=\"CopyToClipboard('sample');return false;\">Copy</a>
                                    <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='ExcelForm'>
                                        <input type='hidden' name='pointer' value='EXCEL'><input type='hidden' name='printid' value='$sheba'>
                                        <a class='dropdown-item' href='#' onmouseover=\"document.ExcelForm.pointer.value='EXCEL'\" onclick=\"document.ExcelForm.submit()\">Excel</a>
                                    </form>
                                    <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='CsvForm'>
                                        <input type='hidden' name='pointer' value='CSV'><input type='hidden' name='printid' value='$sheba'>
                                        <a class='dropdown-item' href='#' onmouseover=\"document.CsvForm.pointer.value='CSV'\" onclick=\"document.CsvForm.submit()\">Csv</a>
                                    </form>
                                    
                                </div>
                            </div>
                        </td></tr></table>
                    </div>
                </div>
            </div>                  
        </div>    
        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>";
                // if($mtype=="ADMIN"){
                    if(isset($_REQUEST["pid"])){
                        echo"<div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                            <div class='row'>
                                <div class='col-lg-12' style='padding-left:5px;padding-right:5px'>
                                    <div class='ibox'>
                                        <div class='ibox-title'><h5>Project Data Update</h5><div class='ibox-tools'><a class='collapse-link'><i class='fa fa-chevron-up'></i></a></div></div>
                                        <div class='ibox-content'>
                                            <form method='post' name='staffingx' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data'>";
                                                $randid=rand(100,999);
                                                $ra1 = "select * from project where id='".$_REQUEST["pid"]."' and status='1' order by id asc limit 1";
                                                $rb1 = $conn->query($ra1);
                                                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                    $sdate=date("Y-m-d",$rab1["start_date"]);
                                                    $edate=date("Y-m-d",$rab1["end_date"]);
                                                    
                                                    $clientname1="";
                                                    $clientname2="";
                                                    $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                                                    $rb2 = $conn->query($ra2);
                                                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                        $clientname1=$rab2["username"];
                                                        $clientname2=$rab2["username2"];
                                                    } }
                                                    
                                                    $leadername1="";
                                                    $leadername2="";
                                                    $leaderimage="";
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
                                                    
                                                    $teamleadername1="";
                                                    $teamleadername2="";
                                                    $teamleaderimage="";
                                                    $ra3t = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                                                    $rb3t = $conn->query($ra3t);
                                                    if ($rb3t->num_rows > 0) { while($rab3t = $rb3t->fetch_assoc()) {
                                                        $teamleadername1=$rab3["username"];
                                                        $teamleadername2=$rab3["username2"];
                                                        $teamleaderimage=$rab3["images"];
                                                        $ra4t = "select * from departments where id='".$rab3t["department"]."' order by id asc limit 1";
                                                        $rb4t = $conn->query($ra4t);
                                                        if ($rb4t->num_rows > 0) { while($rab4t = $rb4t->fetch_assoc()) { $leaderdepartment=$rab4t["department_name"]; } }
                                                        
                                                        $ra5t = "select * from designation where id='".$rab3t["designation"]."' order by id asc limit 1";
                                                        $rb5t = $conn->query($ra5t);
                                                        if ($rb5t->num_rows > 0) { while($rab5t = $rb5t->fetch_assoc()) { $leaderdesignation=$rab5t["designation"]; } }
                                                        
                                                    } }
                                                    echo"<input type='hidden' name='smsbd' value='$smsbd'><input type='hidden' name='processor' value='projectupdate'>
                                                    <input type='hidden' name='id' value='".$_REQUEST["pid"]."'>
                                                    <div class='modal-body'>
                                                        <div class='row'>
                                                            <div class='col-md-6' style='margin-bottom:20px'><div class='form-group'><label>Project Name *</label><input name='name' type='text' value='".$rab1["name"]."' class='form-control' required></div></div>
                                                            <div class='col-md-6' style='margin-bottom:20px'><div class='form-group'><label>Client Name *</label><select class='form-control m-b ' name='clientid' required>
                                                                <option value='".$rab1["clientid"]."'>$clientname1 $clientname2</option>";
                                                                $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                            echo"</select></div></div>";
                                                            /*
                                                            <div class='col-md-6' style='margin-bottom:20px'><div class='form-group'><label>Start Date *</label><input name='sdate' type='date' value='$sdate' class='form-control' required></div></div>
                                                            <div class='col-md-6' style='margin-bottom:20px'><div class='form-group'><label>End Date *</label><input name='edate' type='date' value='$edate' class='form-control' required></div></div>
                                                            */
                                                            echo"<div class='col-md-2' style='margin-bottom:20px'><div class='form-group'><label>Start Time *</label><input name='stime' type='time' value='".$rab1["stime"]."' class='form-control' required></div></div>
                                                            <div class='col-md-2' style='margin-bottom:20px'><div class='form-group'><label>End Time *</label><input name='etime' type='time' value='".$rab1["etime"]."' class='form-control' required></div></div>
                                                            <div class='col-md-2' style='margin-bottom:20px'><div class='form-group'><label>Color</label><input name='pcolor' type='color' value='".$rab1["name"]."' class='form-control' style='height:38px' required></div></div>
                                                            
                                                            <div class='col-md-2' style='margin-bottom:20px'><div class='form-group'><label>Contact Value *</label><input name='rate' type='text' value='".$rab1["rate"]."' class='form-control' required></div></div>
                                                            <div class='col-md-2' style='margin-bottom:20px'><div class='form-group'><label>Contract Type *</label><select class='form-control m-b ' name='type' required>
                                                                <option value='".$rab1["rate_type"]."'>".$rab1["rate_type"]."</option><option value='Hourly'>Hourly</option><option value='Fixed'>Fixed</option>
                                                            </select></div></div>
                                                            <div class='col-md-2' style='margin-bottom:20px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' required>
                                                                <option value='".$rab1["priority"]."'>".$rab1["priority"]."</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
                                                            </select></div></div>
                                                            <div class='col-md-6' style='margin-bottom:20px'><div class='form-group'><label>Team Leader *</label><select class='form-control m-b' name='teamleaderid' required>
                                                                <option value='".$rab1["teamleaderid"]."'>$teamleadername1 $teamleadername2</option>";
                                                                $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                            echo"</select></div></div>
                                                            <div class='col-md-6' style='margin-bottom:20px'><div class='form-group'><label>Support Co-ordinator *</label><select class='form-control m-b' name='leaderid' required>
                                                                <option value='".$rab1["leaderid"]."'>$leadername1 $leadername2</option>";
                                                                $s7 = "select * from uerp_user where mtype='ADMIN' and status='1' order by id asc";
                                                                $r7 = $conn->query($s7);
                                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
                                                            echo"</select></div></div>
                                                            <div class='col-md-12' style='margin-bottom:20px'><div class='form-group'><label>Description/Note</label>
                                                                <textarea id='summernote' name='note' class='form-control'>".$rab1["note"]."</textarea>
                                                            </div></div>
                                                        </div>
                                                    </div>
                                                    <fieldset>
                                                        <div class='row'>
                                                            <div class='col-lg-12'><center><input name='submit' type='submit' value='UPDATE' class='btn btn-outline-warning'><br><br><br></center></div>
                                                        </div>
                                                    </fieldset>";
                                                } }
                                            echo"</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                    
                    if(isset($_COOKIE["projectidx"])){
                        echo"<div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                            <div class='tabs-container'>
                                <div class='panel-body'>
                                    <div class='row'>";
                                        $currenttime=time();
                                        $currentdate=date("Y-m-d",$currenttime);
                                        $ra1 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id asc";
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
                                            echo"<div class='col-md-12' style='margin-top:30px'>
                                                <table width='100%'><tr>
                                                    <td align=center><div class='form-group'>
                                                        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='box'></i>&nbsp;&nbsp;<span>Category</span>
                                                        </button>
                                                    </div></td>
                                                    <td align=center><div class='form-group'>
                                                        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Notes</span>
                                                        </button>
                                                    </div></td>
                                                    <td align=center><div class='form-group'>
                                                        <button class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Like</span>
                                                        </button>
                                                        <button class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Dislike</span>
                                                        </button>
                                                    </div></td><td align=center><div class='form-group'>
                                                    
                                                        <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Short Goal</span>
                                                        </button>
                                                        <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Long Goal</span>
                                                        </button>
                                                    </div></td><td align=center><div class='form-group'>
                                                        <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='add'></i>&nbsp;&nbsp;<span>EOD</span>
                                                        </button>
                                                        <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>EOD</span>
                                                        </button>
                                                    </div></td><td align=center nowrap><div class='form-group'>
                                                        <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='add'></i>&nbsp;&nbsp;<span>BOC</span>
                                                        </button>
                                                        <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>BOC</span>
                                                        </button>
                                                    </div></td><td align=center><div class='form-group'>
                                                        <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='add'></i>&nbsp;&nbsp;<span>Incident</span>
                                                        </button>
                                                        <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Incident</span>
                                                        </button>";
                                                    
                                                        /*
                                                        <a href='#' class='btn ' data-toggle='modal' data-target='#category' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'>Category</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category19X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'>NOTES</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category7X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'>LIKE</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category8X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'>DISLIKE</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category9X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'>Short Goal</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category10X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'>Long Goal</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category12X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'><i class='fa fa-plus'></i>&nbsp;&nbsp;EOD</a>
                                                        <a href='index.php?smsbd=reporting-forms&kroyee=eod-reports&sheba=1704786331&clientid=".$rab1["clientid"]."' class='btn' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'><i class='fa fa-book'></i>&nbsp;&nbsp;EOD</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category13X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'><i class='fa fa-plus'></i>&nbsp;&nbsp;BOC</a>
                                                        <a href='index.php?smsbd=reporting-forms&kroyee=boc-reports&sheba=1704803451&clientid=".$rab1["clientid"]."' class='btn' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'><i class='fa fa-book'></i>&nbsp;&nbsp;BOC</a>
                                                        <a href='#' class='btn' data-toggle='modal' data-target='#category14X' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'><i class='fa fa-plus'></i>&nbsp;&nbsp;Incident</a>
                                                        <a href='index.php?smsbd=reporting-forms&kroyee=incident-reports&sheba=1704786331&clientid=".$rab1["clientid"]."' class='btn' style='margin-top:-5px;background-color:$topbar_color;color:$tbtc'><i class='fa fa-book'></i>&nbsp;&nbsp;Incident</a>
                                                        */
                                                        
                                                    echo"</div></td>
                                                </tr></table><br><br>
                                            </div>";
                                            
                                            echo"<div class='col-lg-4'>
                                                <div class='contact-box center-version' style='padding:5px;min-height:400px'>
                                                    <center>
                                                        <h2 class='m-b-xs'>".$rab1["name"]."</h2><span style='font-size:8pt'>From: $sdate, To: $edate</span><hr>
                                                        <table width='100%'><tr>
                                                            <td style='padding:3px;width:50%' align=center valign=top>
                                                                <img src='$clientimage' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>
                                                                <span>Client/Participant</span><br>
                                                                <span >$clientname1 $clientname2</span>
                                                            </td>
                                                            <td style='padding:3px;width:50%' align=center valign=top>
                                                                <img src='$leaderimage' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>
                                                                <span>Support Co-ordinator</span><br>
                                                                <span >$leadername1 $leadername2</span>
                                                            </td>
                                                        </tr></table><hr>
                                                        <span>Allocated Support Workers</span>
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
                                                                        <img src='".$rab7["images"]."' style='border:1px solid #ccc;border-radius:50%;width:40px;height:40px' title='".$rab7["username"]."'><br>
                                                                        <span>".$rab7["username"]."</span>
                                                                    </td>";
                                                                    if($tt>=4){
                                                                        $tt=0;
                                                                        echo"</tr><tr>";
                                                                    }
                                                                } }
                                                            } }
                                                        echo"</tr></table>
                                                    </center>
                                                </div>
                                                <center>
                                                    <a href='index.php?smsbd=client-dashboard&projectid=".$rab1["id"]."&clientid=".$rab1["clientid"]."'>
                                                        <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Client Dashboard</span>
                                                        </button>
                                                    </a>
                                                    <a href='index.php?smsbd=client-service-agreement&projectid=".$rab1["id"]."&clientid=".$rab1["clientid"]."'>
                                                        <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                                                            <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Service Agreement</span>
                                                        </button>
                                                    </a>
                                                </center>
                                                
                                            </div>";
                                            
                                            $clientid=$rab1["clientid"];
                                            
                                        } }
                                        
                                        echo"<div class='col-md-8'>
                                            <div class='row'>
                                                <div class='col-md-12'><span style='font-size:13pt;'>Document & Services Management System</span></div>
                                            
                                                <div class='col-md-12'>
                                                    <section class='scroll-section' id='accordionCards'>
                                                        <div class='mb-n2' id='accordionCardsExample'>";
                                                            $cat1 = "select * from project_category where status='1' order by sorder asc";
                                                            $cat2 = $conn->query($cat1);
                                                            if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) {
                                                                $datatargetX="category".$cat3["id"]."X";
                                                                $datatargetXX="category".$cat3["id"]."XX";
                                                                $datatargetY="category".$cat3["id"]."Y";
                                                                $datatargetZ="category".$cat3["id"]."Z";
                                                                $categoryX="cat".$cat3["id"]."Z";
                                                                $categoryY="cat".$cat3["id"]."Y";
                                                                $t=$cat3["id"];
                                                                if($cat3["status"]==1){ 
                                                                    
                                                                    echo"<div class='card d-flex mb-2'>
                                                                        <div class='d-flex flex-grow-1' role='button' data-bs-toggle='collapse' data-bs-target='#collapseOneCards' aria-expanded='true' aria-controls='collapseOneCards'>
                                                                            <div class='card-body py-4'>
                                                                                <div class='row'>
                                                                                    <div class='col-md-7'>
                                                                                        <a data-toggle='collapse' href='#".$cat3["id"]."' onmouseover=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\">
                                                                                            <div class='btn btn-link list-item-heading p-0'><i class='fa fa-book'></i>&nbsp;&nbsp;".$cat3["category"]."</div>
                                                                                        </a>
                                                                                    </div><div class='col-md-1' style='text-align:center'>
                                                                                        <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-toggle='modal' data-target='#$datatargetX'><i class='fa fa-plus'></i></a>
                                                                                    </div><div class='col-md-1' style='text-align:center'>
                                                                                        <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-toggle='modal' data-target='#$datatargetXX'><i class='fa fa-edit'></i></a>
                                                                                    </div><div class='col-md-1' style='text-align:center'>
                                                                                        <a href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=0' target='dataprocessor' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-times'></i></a>
                                                                                    </div><div class='col-md-1' style='text-align:center'>
                                                                                        <a href='#' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' onclick=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\"><i class='fa fa-refresh'></i></a>
                                                                                    </div><div class='col-md-1 style='text-align:center'>
                                                                                        <a data-toggle='collapse' href='#".$cat3["id"]."' class='btn btn-outline-default btn-icon btn-icon-start w-md-auto btn-sm' onmouseover=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\"><i class='fa fa-angle-down'></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id='collapseOneCards' class='collapse show' data-bs-parent='#accordionCardsExample'>
                                                                            <div class='card-body accordion-content pt-0'>
                                                                                <div id='$datatargetY' style='padding:0px;background-color:white'></div>"; ?>
                                                                                <script type="text/javascript">
                                                                                    function <?php echo"$datatargetZ"; ?>(<?php echo"$categoryX"; ?>,<?php echo"$categoryY"; ?>){
                                                                                        $.ajax({
                                                                                            url: 'project-category-list.php?cid='+<?php echo"$categoryX"; ?>,
                                                                                            success: function(html) {
                                                                                                var ajaxDisplay = document.getElementById(<?php echo"$categoryY"; ?>);
                                                                                                ajaxDisplay.innerHTML = html;
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                </script> <?php
                                                                            echo"</div>
                                                                        </div>
                                                                    </div>";
                                                                }else{
                                                                    echo"<div class='card d-flex mb-2'>
                                                                        <div class='d-flex flex-grow-1' role='button' data-bs-toggle='collapse' data-bs-target='#collapseOneCards' aria-expanded='true' aria-controls='collapseOneCards'>
                                                                            <div class='card-body py-4'>
                                                                                <div class='row'> 
                                                                                    <div class='col-md-10'>
                                                                                        <a data-toggle='collapse' href='#'>
                                                                                            <div class='btn btn-link list-item-heading p-0'><i class='fa fa-book'></i>&nbsp;&nbsp;".$cat3["category"]."</div>
                                                                                        </a>
                                                                                    </div><div class='col-md-2' style='text-align:center'>
                                                                                         <a href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=1' target='dataprocessor' class='btn btn-outline-default btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-play'></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id='collapseOneCards' class='collapse show' data-bs-parent='#accordionCardsExample'>
                                                                            <div class='card-body accordion-content pt-0'></div>
                                                                        </div>
                                                                    </div>";
                                                                }
                                                        
                                                                echo"<div class='modal inmodal' id='$datatargetXX' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog'><div class='modal-content animated bounceInUp'>
                                                                    <div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                                                                        <span style='font-size:12pt;color:black'>".$cat3["category"]."</span> 
                                                                    </div>
                                                                    <form class='m-t' role='form' method='post' action='updaterecord.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                                                        <input type='hidden' name='processor' value='category'><input type='hidden' name='id' value='".$cat3["id"]."'>
                                                                        <div class='modal-body'><div class='row'>
                                                                            <div class='col-md-12'><div class='form-group'><label>Category Name</label><input name='category' type='text' required value='".$cat3["category"]."' class='form-control'></div></div>
                                                                            <div class='col-md-12'><div class='form-group'><label>Sort Order</label><input name='sorder' type='number' value='".$cat3["sorder"]."' class='form-control'></div></div>
                                                                            
                                                                        </div></div>
                                                                        <div class='modal-footer'>
                                                                            <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button><input type='reset' class='btn btn-default' value='Reset'>
                                                                            <input type='submit' class='btn btn-primary' value='Update Category'>
                                                                        </div>
                                                                    </form>
                                                                </div></div></div>";
                                                        
                                                                echo"<div class='modal inmodal' id='$datatargetX' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog'><div class='modal-content animated bounceInUp'>
                                                                    <div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                                                                        <span style='font-size:12pt;color:black'>".$cat3["category"]."</span> 
                                                                    </div>
                                                                    <form class='m-t' role='form' method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                                                        <input type='hidden' name='processor' value='categorydata'><input type='hidden' name='processor1' value='".$cat3["type"]."'>
                                                                        <input type='hidden' name='id' value='".$cat3["id"]."'><input type='hidden' name='projectid' value='".$_COOKIE["projectidx"]."'>
                                                                        <div class='modal-body'><div class='row'>
                                                                            <div class='col-md-12'><div class='form-group'><label>Date *</label><input name='cdate' type='date' class='form-control' value='$currentdate'></div></div>
                                                                            <div class='col-md-12'><div class='form-group'><label>Concern/Title Name *</label><input name='cname' type='text' value='' class='form-control' required></div></div>
                                                                            <div class='col-md-12'><div class='form-group'><label>Contact/Introduction</label><input name='contact' type='text' value='' class='form-control'></div></div>
                                                                            <div class='col-md-12'><div class='form-group'><label>Select Single/Multiple Document to Upload<br>File Extention: *.doc, *.docx, *.pdf, *.jpg, *.png, *.gif, *.jpeg).</label>
                                                                                <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                                                                                <input type='hidden' name='sessionid' value='".$cat3["id"]."'>
                                                                            </div></div>
                                                                            <div class='col-md-12'><div class='form-group'><label>Detail Note (if any)</label><textarea id='summernote' name='note' class='form-control'></textarea></div></div>
                                                                        </div></div>
                                                                        <div class='modal-footer'>
                                                                            <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button><input type='reset' class='btn btn-default' value='Reset'>
                                                                            <input type='submit' class='btn btn-primary recordadded' value='Upload & Save Data'>
                                                                        </div>
                                                                    </form>
                                                                </div></div></div>";
                                                        
                                                            } }
                                                    
                                                            $cat1 = "select * from project_category where status='0' order by sorder asc";
                                                            $cat2 = $conn->query($cat1);
                                                            if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) {
                                                                $datatargetX="category".$cat3["id"]."X";
                                                                $datatargetXX="category".$cat3["id"]."XX";
                                                                $datatargetY="category".$cat3["id"]."Y";
                                                                $datatargetZ="category".$cat3["id"]."Z";
                                                                $categoryX="cat".$cat3["id"]."Z";
                                                                $categoryY="cat".$cat3["id"]."Y";
                                                                $t=$cat3["id"];
                                                                echo"<div class='card d-flex mb-2'>
                                                                        <div class='d-flex flex-grow-1' role='button' data-bs-toggle='collapse' data-bs-target='#collapseOneCards' aria-expanded='true' aria-controls='collapseOneCards'>
                                                                            <div class='card-body py-4'>
                                                                                <div class='row'> 
                                                                                    <div class='col-md-10'>
                                                                                        <a data-toggle='collapse' href='#'>
                                                                                            <div class='btn btn-link list-item-heading p-0'><i class='fa fa-book'></i>&nbsp;&nbsp;".$cat3["category"]."</div>
                                                                                        </a>
                                                                                    </div><div class='col-md-2' style='text-align:center'>
                                                                                         <a href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=1' target='dataprocessor' class='btn btn-outline-default btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-play'></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div id='collapseOneCards' class='collapse show' data-bs-parent='#accordionCardsExample'>
                                                                            <div class='card-body accordion-content pt-0'></div>
                                                                        </div>
                                                                    </div>";
                                                            } }
                                                    
                                                        echo"</div>
                                                    </section>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class='col-md-12'><br><br></div>";
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
                                                
                                                $clientname="".$c1["username"]." ".$c1["username2"]."";
                                                $aboutclient=$c1["aboutme"];
                                                
                                            } }
                                        echo"<div class='col-md-12'><h2>About $clientname!</h2><p class='small'>$aboutclient</p></div>
                                        <div class='col-md-4'>
                                            <div class='card d-flex mb-2' style='padding:20px'>
                                                <h2>Personal Information</h2>";
                                                $s = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                                                $r = $conn->query($s);
                                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                    $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                    $joindate=date("d-m-Y",$rs["jointime"]);
                                                    $department=$rs["department"];
                                                    $s8xx = "select * from departments where id='$department' order by id asc limit 1";
                                                    $r8xx = $conn->query($s8xx);
                                                    if ($r8xx->num_rows > 0) { while($rs8xx = $r8xx->fetch_assoc()) { $departmentname=$rs8xx["department_name"]; } }
                                                    echo"<table class='table table-hover no-margins'><tbody>
                                                        <tr><td><strong>Name</strong></td><td>:</td><td>".$rs["username"]." ".$rs["username2"]."</td></tr>
                                                        <tr><td><strong>Department</strong></td><td>:</td><td>$departmentname</td></tr>
                                                        <tr><td><strong>User ID</strong></td><td>:</td><td>".$rs["id"]."</td></tr>
                                                        <tr><td><strong>Join Date</strong></td><td>:</td><td>$joindate</td></tr>
                                                        <tr><td><strong>Day Phone</strong></td><td>:</td><td>".$rs["phone"]."</td></tr>
                                                        <tr><td><strong>Night Phone</strong></td><td>:</td><td>".$rs["phone2"]."</td></tr>
                                                        <tr><td><strong>Email</strong></td><td>:</td><td>".$rs["email"]."</td></tr>
                                                    </table>";
                                                } }
                                        echo"</div></div>
                                        <div class='col-md-4'>
                                            <div class='card d-flex mb-2' style='padding:20px'>
                                                <h2>Service Agreement Info</h5>
                                                <table class='table table-hover no-margins'><tbody>
                                                    <tr><td>NDIS Number</td><td>:</td><td>$cndis</td></tr>
                                                    <tr><td>Date of Birth</td><td>:</td><td>$cdob</td></tr>
                                                    <tr><td>Participant / Participant’s representative</td><td>:</td><td>$representative_name</td></tr></td></tr>
                                                    <tr><td>Agreement Signed Date</td><td>:</td><td>$project_signed</td></td></tr>
                                                    <tr><td>Period From</td><td>:</td><td>$start_date</td></tr>
                                                    <tr><td>Period To</td><td>:</td><td>$end_date</td></td></tr>
                                                    <tr><td>Agreed the travel costs to be claimed</td><td>:</td><td nowrap>";
                                                        if($transport_cost=="1") echo"YES";
                                                    echo"</td>
                                                </tbody></table>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='card d-flex mb-2' style='padding:20px'>
                                                <h2>Participant information</h5>
                                                <table class='table table-hover no-margins'><tbody>
                                                    <tr><td>Nominee Name</td><td>:</td><td>$nomineename</td></tr>
                                                    <tr><td>Participant Name</td><td>:</td><td>$cname</td></tr></td></tr>
                                                    <tr><td>Phone # Day Time</td><td>:</td><td>$cphone</td></td></tr>
                                                    <tr><td>Phone # Night Time</td><td>:</td><td>$cphone2</td></tr>
                                                    <tr><td>Mobile #</td><td>:</td><td>$cmobile</td></td></tr>
                                                    <tr><td>Email Address</td><td>:</td><td>$cemail</td></td></tr>
                                                    <tr><td>Present Address</td><td>:</td><td>$caddress</td></td></tr>
                                                </tbody></table>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='card d-flex mb-2' style='padding:20px'>
                                                <h2>Contact Person Detail</h5>
                                                <table class='table table-hover no-margins'><tbody>
                                                    <tr><td>Contact Name</td><td>:</td><td>$cpname</td></tr></td></tr>
                                                    <tr><td>Contact Day Phone</td><td>:</td><td>$cpphone1</td></td></tr>
                                                    <tr><td>Contact Night Phone</td><td>:</td><td>$cpphone2</td></tr>
                                                    <tr><td>Contact Mobile</td><td>:</td><td>$cpmobile</td></td></tr>
                                                    <tr><td>Contact Email</td><td>:</td><td>$cpemail</td></td></tr>
                                                    <tr><td>Contact Address</td><td>:</td><td>$cpaddress</td></td></tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class='card d-flex mb-2' style='padding:20px'>
                                                <h2>Emergency Contact Person</h2>";
                                                $s = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                                                $r = $conn->query($s);
                                                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                                    $passport_expire_date=date("d-m-Y",$rs["passport_expire_date"]);
                                                    echo"<table class='table table-hover no-margins'><tbody>
                                                        <tr><td nowrap><strong>Person Name</strong></td><td>:</td><td colspan=5>".$rs["emergency_contact_1"]."</td></tr>
                                                        <tr><td><strong>Relation</strong></td><td>:</td><td>".$rs["emergency_relation_1"]."</td></tr>
                                                        <tr><td><strong>Phone</strong></td><td>:</td><td>".$rs["emergency_phone_1"]."</td></tr>
                                                        <tr><td><strong>Email</strong></td><td>:</td><td colspan=5>".$rs["emergency_email_1"]."</td></tr>
                                                        <tr><td colspan=10><hr></td></tr>
                                                        <tr><td nowrap><strong>Person Name</strong></td><td>:</td><td colspan=5>".$rs["emergency_contact_2"]."</td></tr>
                                                        <tr><td><strong>Relation</strong></td><td>:</td><td>".$rs["emergency_relation_2"]."</td></tr>
                                                        <tr><td><strong>Phone</strong></td><td>:</td><td>".$rs["emergency_phone_2"]."</td></tr>
                                                        <tr><td><strong>Email</strong></td><td>:</td><td colspan=5>".$rs["emergency_email_2"]."</td></tr>
                                                    </table>";
                                                } }
                                            echo"</div>
                                        </div>";
                                        
                                        $s = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                                        $r = $conn->query($s);
                                        if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                                            $dob=date("d-m-Y",$rs["dob"]);
                                            echo"<div class='col-md-4'>
                                                <div class='card d-flex mb-2' style='padding:20px'>
                                                    <h2>Address</h2>
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td valign=top><strong>Address</strong></td><td valign=top>:</td><td valign=top>".$rs["address"]."</td></tr>
                                                        <tr><td valign=top><strong>Address 2</strong></td><td valign=top>:</td><td valign=top>".$rs["address2"]."</td></tr>
                                                        <tr><td valign=top><strong>City</strong></td><td valign=top>:</td><td valign=top>".$rs["city"]."</td></tr>
                                                        <tr><td valign=top><strong>State</strong></td><td valign=top>:</td><td valign=top>".$rs["area"]."</td></tr>
                                                        <tr><td valign=top><strong>Zip</strong></td><td valign=top>:</td><td valign=top>".$rs["zip"]."</td></tr>
                                                        <tr><td valign=top><strong>Country</strong></td><td valign=top>:</td><td valign=top>".$rs["country"]."</td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class='col-md-4'>
                                                <div class='card d-flex mb-2' style='padding:20px'>
                                                    <h2>Other Info.</h2>
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td><strong>ABN</strong></td><td>:</td><td>$abn</td></tr>
                                                        <tr><td><strong>Nationality</strong></td><td>:</td><td>".$rs["nationality"]."</td></tr>
                                                        <tr><td><strong>Marital Status</strong></td><td>:</td><td>".$rs["marital_status"]."</td></tr>
                                                        <tr><td><strong>driving licence no</strong></td><td>:</td><td>".$rs["driving_licence_no"]."</td></tr>
                                                        <tr><td><strong>Gender</strong></td><td>:</td><td>".$rs["gender"]."</td></tr>
                                                        <tr><td><strong>DOB</strong></td><td>:</td><td>$dob</td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class='col-md-4'>
                                                <div class='card d-flex mb-2' style='padding:20px'>
                                                    <h2>Bank Info.</h2>
                                                    <table class='table table-hover no-margins'><tbody>
                                                        <tr><td>Bank Name</td><td>:</td><td>".$rs["bank_name"]."</td></tr><tr><td>A/c Name</td><td>:</td><td>".$rs["account_name"]."</td></tr>
                                                        <tr><td>A/c Number</td><td>:</td><td>".$rs["account_number"]."</td></tr><tr><td>BSB</td><td>:</td><td>".$rs["bsb"]."</td></tr>
                                                    </table>
                                                </div>
                                            </div>";
                                        } }
                                    echo"</div>
                                </div>
                            </div>
                        </div>";
                        
                        // 1. CATEGORY
                        echo"<div class='modal inmodal' id='category' tabindex='-1' role='dialog' aria-hidden='true'><div class='modal-dialog'><div class='modal-content animated bounceInUp'>
                            <div class='modal-header'><button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                                <span style='font-size:12pt;color:black'>Communication Book Category</span>
                            </div>
                            <form class='m-t' role='form' method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='category'>
                                <div class='modal-body'><div class='row'>
                                    <div class='col-md-12'><div class='form-group'><label>Category Name</label><input name='category' type='text' required value='' class='form-control'></div></div>
                                    <div class='col-md-12'><div class='form-group'><label>Category Type</label>
                                        <select name='type' class='form-control'><option value='DOCUMENT MANAGEMENT'>DOCUMENT MANAGEMENT</option></select>
                                    </div></div>
                                    <div class='col-md-12'><div class='form-group'><label>Sort Order</label><input name='sorder' type='number' value='1' class='form-control'></div></div>
                                    
                                </div></div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button><input type='reset' class='btn btn-default' value='Reset'>
                                    <input type='submit' class='btn btn-primary' value='Save Category'>
                                </div>
                            </form>
                        </div></div></div>";
                        
                    }else{
                        
                        echo"<div class='conntainer'>
                            <div class='row' style='padding-left:5px;padding-right:5px'>";
                                        $ra1 = "select * from project where status='1' order by name asc limit 1";
                                        $rb1 = $conn->query($ra1);
                                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                            $sdate=date("d.m.Y",$rab1["start_date"]);
                                            $edate=date("d.m.Y",$rab1["end_date"]);
                                            
                                            $clientname1="";
                                            $clientname2="";
                                            $clientimage="";
                                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                                            $rb2 = $conn->query($ra2);
                                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                                $clientname1=$rab2["username"];
                                                $clientname2=$rab2["username2"];
                                                $clientimage=$rab2["images"];
                                            } }
                                            
                                            $leadername1="";
                                            $leadername2="";
                                            $leaderimage="";
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
                                            
                                            $teamleadername1="";
                                            $teamleadername2="";
                                            $teamleaderimage="";
                                            $ra10 = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                                            $ra11 = $conn->query($ra10);
                                            if ($ra11->num_rows > 0) { while($ra12 = $ra11->fetch_assoc()) {
                                                $teamleadername1=$ra12["username"];
                                                $teamleadername2=$ra12["username2"];
                                                $teamleaderimage=$ra12["images"];
                                                $ra4 = "select * from departments where id='".$ra12["department"]."' order by id asc limit 1";
                                                $rb4 = $conn->query($ra4);
                                                if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $teamleaderdepartment=$rab4["department_name"]; } }
                                                
                                                $ra5 = "select * from designation where id='".$ra12["designation"]."' order by id asc limit 1";
                                                $rb5 = $conn->query($ra5);
                                                if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $teamleaderdesignation=$rab5["designation"]; } }
                                                
                                            } }
                                            
                                        
                                            echo"<div class='col-lg-4' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                                                <div class='card mb-3'>
                                                    <div class='card-body mb-n5' style='padding:10px;min-height:600px'>
                                                        <center>
                                                            <h2 class='m-b-xs'>".$rab1["name"]."</h2><span style='font-size:8pt'>From: $sdate, To: $edate</span><hr>
                                                            <table width='100%'><tr>
                                                                <td style='padding:3px;width:50%' align=center valign=top>
                                                                    <img src='$clientimage' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>
                                                                    <span>Client/Participant</span><br><span>$clientname1 $clientname2</span>
                                                                </td>
                                                            </tr></table><hr>
                                                            <table width='100%'><tr>
                                                                <td style='padding:3px;width:50%' align=center valign=top>";
                                                                    if(strlen($teamleaderimage)>=100) echo"<img src='$teamleaderimage' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>";
                                                                    else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>";
                                                                    echo"<span>Team Leader</span><br><span>$teamleadername1 $teamleadername2</span>
                                                                </td>
                                                                <td style='padding:3px;width:50%' align=center valign=top>";
                                                                    if(strlen($leaderimage)>=100) echo"<img src='$leaderimage' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>";
                                                                    else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:65px;height:65px' title=''><br>";
                                                                    echo"<span>Support Co-ordinator</span><br><span>$leadername1 $leadername2</span>
                                                                </td>
                                                            </tr></table><hr>
                                                            <span style='font-size:10pt;padding-bottom:10px'>Allocated Support Workers</span>
                                                            <table><tr>";
                                                                $tt=0;
                                                                $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' order by id asc";
                                                                $rb6 = $conn->query($ra6);
                                                                if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                                    $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                                    $rb7 = $conn->query($ra7);
                                                                    if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                                        $tt=($tt+1);
                                                                        echo"<td style='padding:5px;line-height:1.2;' align=center valign=middle >";
                                                                            if(strlen($rab7["images"])>=100) echo"<img src='".$rab7["images"]."' style='border:1px solid #ccc;border-radius:50%;width:40px;height:40px' title='".$rab7["username"]."'><br>";
                                                                            else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:40px;height:40px' title='".$rab7["username"]."'><br>";
                                                                            echo"<span>".$rab7["username"]."</span>
                                                                        </td>";
                                                                        if($tt>=4){
                                                                            echo"</tr><tr>";
                                                                            $tt=0;
                                                                        }
                                                                    } }
                                                                } }
                                                                echo"<td>
                                                                    <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#closeButtonOutExample' style='' onclick=\"getTeamData('".$rab1["id"]."', 'TeamManager')\">+</button>
                                                                </td>
                                                            </tr></table>
                                                            <hr>
                                                            <div class='btn-group'>
                                                                <a href='client-cb-set.php?projectidx=".$rab1["id"]."' class='btn-white btn btn-xs' target='dataprocessor' style='margin-top:0px;color:$topbar_color'>Client Profile</a>
                                                                <a href='index.php?url=projects.php&pstat=1&pid=".$rab1["id"]."' class='btn-white btn btn-xs' target='_top' style='margin-top:0px;color:$topbar_color'>Edit</a>
                                                                <a href='suspendrecord.php?suspendid=".$rab1["id"]."&tbl=project' class='btn-white btn btn-xs' target='dataprocessor' style='margin-top:0px;color:red'>Suspend</a>
                                                                <a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=project' class='btn-white btn btn-xs' target='dataprocessor' style='margin-top:0px;color:red'>Close</a>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>";
                                        } }
                                        echo"<div class='modal fade modal-close-out' id='closeButtonOutExample' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Support Workers Available For Shifting</h5>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>";
                                                        $s1 = "select * from uerp_user where mtype='USER' OR mtype='EMPLOYEE' order by username asc";
                                                        $r1 = $conn->query($s1);
                                                        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                                            $lastid=$rs1["id"];
                                                            $rand=rand(100,999);
                                                            $uid=$rs1["id"];
                                                            $status=$rs1["status"];
                                                            if($status==1) $status="ON";
                                                            else $status="OFF";
                                            
                                                            echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                                                                <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                                                                    <div class='row' style='width:100%'>
                                                                        <div class='col-12 col-md-2' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                                                                            <img src='./assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                                        </div>
                                                                        <div class='col-4 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                                                            <div>".$rs1["username"]." ".$rs1["username2"]."</div><div class='text-small text-muted'>".$rs1["unbox"]."</div>                                
                                                                        </div>
                                                                        <div class='col-4 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                                                            <div>".$rs1["email"]."</div><div class='text-small text-muted'>Mobile: ".$rs1["phone"]."</div>
                                                                        </div>
                                                                        <div class='col-4 col-md-2' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                                                            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' ><i class='fa-solid fa-user'></i>&nbsp;&nbsp;<span>Send Shift Request</span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                        } }                                     
                                                    echo"</div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                        <button type='button' class='btn btn-primary'>Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                    echo"</div>
                                </div>
                                
                            </div>
                        </div>";
                    }
                // }
            echo"</div><br><br>";



        echo"</div>";


    }else{
        echo"<form method='get' action='client-cb-unset.php' name='main' target='_top'>
            <input type=hidden name='pstat' value='1'>
            <input type=hidden name='url' value='plan_manager.php'>
            <input type=hidden name='id' value='62'>    
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
