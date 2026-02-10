<?php
                echo"<div class='mb-1 btn-group'>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Campaign&ctitle=Create Campaign', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Campaign</span></button>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=campaign.php' target='_self'>
                            <button class='dropdown-item' type='button' >View Campaigns</button>
                        </a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Lead&logid=0&ctitle=Add New Lead', 'offcanvasTop2')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Lead</span></button>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=leads.php' target='_self'>
                            <button class='dropdown-item' type='button' >View Leads</button>
                        </a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Deal&ctitle=Add New Deal', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Deal</span></button>
                    <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=deals.php' target='_self'>
                            <button class='dropdown-item' type='button'>View Deals</button>
                        </a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Contract&ctitle=Add New Contract', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Contract</span></button>
                    <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=contracts.php' target='_self'>
                            <button class='dropdown-item' type='button' >View Contracts</button>
                        </a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onclick=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&sourceid=Task&ctitle=Add New Task', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Task</span></button>
                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a href='index.php?url=task_manager.php&id=58&sourcefrom=$sourcefrom'>
                            <button class='dropdown-item' type='button'>View Tasks</button>
                        </a>
                    </div>
                </div>
                
                <div class='mb-1 btn-group'>
                    <a href='index.php?url=create_invoice.php&id=5161&sourcefrom=$sourcefrom'' target='_self'>
                        <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&sourceid=Invoice&ctitle=Add New Invocie', 'offcanvasRight')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Invoice</span></button>
                    </a>
                </div>";
?>