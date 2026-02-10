<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    $sheba="project_sc";
    $cid=90009;
    $title="Add New Support Co-Ordinator";
    $utype="Support Co-Ordinator";
    
    if(!isset($project_signed)) $project_signed=0;
    if(!isset($transport_cost)) $transport_cost=0.00;
    if(!isset($start_date)) $start_date="";
    if(!isset($end_date)) $end_date="";
    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;
    
    if($pstat==1){
        echo"<div class='row'>
            <div class='col-12 col-md-5' style='padding-bottom:10px'>
                <h1 class='mb-0 pb-0 display-4' id='title'>$utype</h1>
                <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                    <ul class='breadcrumb pt-0'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='index.php'>Dashboard</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=".$_GET["pstat"]."'>$utype</a></li>
                    </ul>
                </nav>
            </div>
            <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onmouseover=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Campaign&ctitle=Create Campaign', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Campaign</span></button>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=global_campaigns.php&stat=1'><button class='dropdown-item' type='button'>View Campaigns</button></a>
                        <a href='index.php?url=global_campaigns.php&stat=2'><button class='dropdown-item' type='button'>Suspended Campaigns</button></a>
                        <a href='index.php?url=global_campaigns.php&stat=3'><button class='dropdown-item' type='button'>Completed Campaigns</button></a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Lead&ctitle=Add New Lead', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Lead</span></button>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=global_leads.php&stat=1'><button class='dropdown-item' type='button'>Ongoing Leads</button></a>
                        <a href='index.php?url=global_leads.php&stat=2'><button class='dropdown-item' type='button'>Suspended Leads </button></a>
                        <a href='index.php?url=global_leads.php&stat=3'><button class='dropdown-item' type='button'>Completed Leads</button></a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Deal&ctitle=Add New Deal', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Deal</span></button>
                    <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=global_deals.php&stat=1'><button class='dropdown-item' type='button'>Ongoing Deals</button></a>
                        <a href='index.php?url=global_deals.php&stat=1'><button class='dropdown-item' type='button'>Suspended Deals</button></a>
                        <a href='index.php?url=global_deals.php&stat=1'><button class='dropdown-item' type='button'>Completed Deals</button></a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Contract&ctitle=Add New Contract', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Contract</span></button>
                    <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=global_contracts.php&stat=1'><button class='dropdown-item' type='button'>Ongoing Contracts</button></a>
                        <a href='index.php?url=global_contracts.php&stat=2'><button class='dropdown-item' type='button'>Suspended Contracts</button></a>
                        <a href='index.php?url=global_contracts.php&stat=3'><button class='dropdown-item' type='button'>Completed Contracts</button></a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Task&ctitle=Add New Task', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Task</span></button>
                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=global_tasks.php&stat=1'><button class='dropdown-item' type='button'>Ongoing Tasks</button></a>
                        <a href='index.php?url=global_tasks.php&stat=2'><button class='dropdown-item' type='button'>Suspended Tasks</button></a>
                        <a href='index.php?url=global_tasks.php&stat=3'><button class='dropdown-item' type='button'>Completed Tasks</button></a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Invoice&ctitle=Add New Invocie', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Invoice</span></button>
                    <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=global_invoices.php&stat=1'><button class='dropdown-item' type='button'>Ongoing Invoices</button></a>
                        <a href='index.php?url=global_invoices.php&stat=2'><button class='dropdown-item' type='button'>Unpaid Invoices</button></a>
                        <a href='index.php?url=global_invoices.php&stat=3'><button class='dropdown-item' type='button'>Paid Invoices</button></a>
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
                    
                    if(isset($_COOKIE["projectidsc"])){

                        echo"<div class='data-table-rows slim' id='sample'>
                            <body onload=\"shiftdataV2('global_profile.php?cid=$cid&sheba=$sheba&utype=$utype&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">";
        
                            // echo"<div class='data-table-responsive-wrapper' id='chartmodeX'></div>";
                            echo"<div class='data-table-responsive-wrapper'id='datatableX'></div>";
                            
                        echo"</div>
                        
                        <div class='modal fade modal-close-out' id='PopupWindow' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Communication Book Category</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body' id='PopupWindowX'>
                                        <form method='post' action='global_processor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                            <input type='hidden' name='processor' value='category'>
                                            <div class='form-group'><label>Category Name</label><input name='category' type='text' required value='' class='form-control'></div><br>
                                            <div class='form-group'><label>Category Type</label><select name='type' class='form-control'><option value='DOCUMENT MANAGEMENT'>DOCUMENT MANAGEMENT</option></select></div><br>
                                            <div class='form-group'><label>Sort Order</label><input name='sorder' type='number' value='1' class='form-control'></div><br>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary' onblur=\"shiftdataV2('global_profile.php?cid=$cid&sheba=$sheba&utype=PROJECTS/LEADS', 'datatableX')\">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        
                    }else{
                        
                        echo"<div class='data-table-rows slim' id='sample'>
                            <body onload=\"shiftdataV2('chart_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX'); shiftdataV2('global_data.php?cid=$cid&sheba=$sheba&utype=$utype&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">";
        
                            // <div class='data-table-responsive-wrapper' id='chartmodeX'></div>
                            echo"<div class='data-table-responsive-wrapper'id='datatableX'></div>
                        </div>";
                    }
                // }
            echo"</div><br><br>
        </div>";



        echo"<div class='modal fade modal-close-out' id='PopupModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Support Workers Available For Shifting</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' id='PopupModalX'>";
                            
                    echo"</div>
                </div>
            </div>
        </div>";
        
    }else{
        echo"<form method='get' action='global-unset.php' name='main' target='_top'>
            <input type=hidden name='pstat' value='1'><input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='url' value='".$_GET["url"]."'>
            <input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>            
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
