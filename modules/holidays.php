<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    $sheba="leaves_datas";
    $cid=90009;
    $title="Create Leave Application";
    $utype="Leave Application & Management";
    
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
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onmouseover=\"shiftdataV2('leaves_process.php?cid=$cid&sheba=$sheba&sourceid=weekly_holidays&ctitle=Add Weekly Holidays', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Weekend</span></button>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onmouseover=\"shiftdataV2('leaves_process.php?viewpoint=1&cid=$cid&sheba=$sheba&sourceid=weekly_holidays&ctitle=View/Manage Weekly Holidays', 'offcanvasLeftFilter')\">View Weekends</button>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onmouseover=\"shiftdataV2('leaves_process.php?cid=$cid&sheba=$sheba&sourceid=general_holidays&ctitle=Add general Holidays', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Holidays</span></button>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onmouseover=\"shiftdataV2('leaves_process.php?viewpoint=1&cid=$cid&sheba=$sheba&sourceid=general_holidays&ctitle=View/Manage general Holidays', 'offcanvasLeftFilter')\">View General Holidays</button>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?cid=$cid&sheba=$sheba&sourceid=leave_type&ctitle=Add Leave Type', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Leave Type</span></button>
                    <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?viewpoint=1&cid=$cid&sheba=$sheba&sourceid=leave_type&ctitle=View/Manage Leave Type', 'offcanvasRight')\">View Leave Types</button>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Create Leave Application', 'offcanvasRight')\"><i data-acorn-icon='plus' style='font-size:5pt'></i>&nbsp;<span>Leave Application</span></button>
                    <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=Leave_Application&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">View Applications</button>
                    </div>
                </div>
            </div>
        </div>    
        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>";
                // if($mtype=="ADMIN"){
                    echo"<div class='data-table-rows slim' id='sample' style='text-align:left'>
                        <body onload=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=Leave_Application&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                        <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:90%'>
                            <thead><tr><th colspan=20><h3>Leave Applications</h1></th></tr></thead>
                            <tbody id='datatableX'></tbody>
                        </table>
                    </div>";
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
