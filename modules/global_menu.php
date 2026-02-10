<?php

                echo"<div class='mb-1 btn-group'>
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
                </div>";
                
?>