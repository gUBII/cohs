<?php
    echo"<div class='mb-1 btn-group'>
        <a href='index.php?url=manage_cases.php&id=5393' target='_self'>
            <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style=' margin-right:10px'><i data-acorn-icon='eye'></i>&nbsp;<span>CASE</span></button>
        </a>
    </div>
    
    <div class='mb-1 btn-group'>
        <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=COURT&logid=0&ctitle=Add New COURT', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>COURT</span></button>
        <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style=' margin-right:10px'></button>
        <div class='dropdown-menu'>
            <a href='index.php?url=courts_manager.php' target='_self'><button class='dropdown-item' type='button' >View Courts</button></a>
        </div>
    </div>
    
    <div class='mb-1 btn-group'>
        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=CATEGORY&ctitle=Create Case Category/Type', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>CATEGORY</span></button>
        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
        <div class='dropdown-menu'>
            <a href='index.php?url=case_category_manager.php' target='_self'><button class='dropdown-item' type='button' >View Categories</button></a>
        </div>
    </div>
    
    <div class='mb-1 btn-group'>
        <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=ACT&ctitle=Add New ACT', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>ACT</span></button>
        <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style=' margin-right:10px'></button>
        <div class='dropdown-menu'>
            <a href='index.php?url=act_manager.php' target='_self'><button class='dropdown-item' type='button'>View ACTs</button></a>
        </div>
    </div>
    
    <div class='mb-1 btn-group'>
        <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=STAGE&ctitle=Add New Contract', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>STAGE</span></button>
        <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style=' margin-right:10px'></button>
        <div class='dropdown-menu'>
            <a href='index.php?url=case_stage_manager.php' target='_self'><button class='dropdown-item' type='button' >View Stages</button></a>
        </div>
    </div>";
?>