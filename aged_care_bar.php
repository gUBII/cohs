<?php
        echo"<div class='row'>
            <div class='col-3 col-md-2' style='text-align:center;padding:5px'>
                <div class='mb-1 btn-group'>
                    <button class='btn btn-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Lead&ctitle=Add New Lead', 'offcanvasTop2')\"><span>Lead</span></button>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0&status=1', 'datatableX')\">View Leads</button>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=calls.php&id=5199'>Calls</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=emails.php&id=5199'>Emails</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=meetings.php&id=5199'>Meetings</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=general_notes.php&id=5199'>General Notes</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=case_reports.php&id=5199'>Case Reports</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=quotes.php&id=5199'>Quotes</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=deals.php&id=5199'>Deals</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=contracts.php&id=5199'>Contracts</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=appointments.php&id=5199'>Appointments</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=weekly_planner.php&id=5199'>Weekly Planner</a>
                    </div>
                </div>
            </div>
            <div class='col-3 col-md-2' style='text-align:center;padding:5px'>
                <div class='mb-1 btn-group'>
                    <button class='btn btn-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Lead&ctitle=Add New Lead', 'offcanvasTop2')\"><span>Users</span></button>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=clients.php&id=5199'>Clients</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=employees.php&id=5199'>Care Worker</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=users_role.php&id=5199'>User Role</a>
                        <a class='dropdown-item' type='button' href='$mainurl/index.php?url=task_manager.php&id=14'>Tasks/Notes</a>
                        <a class='dropdown-item' type='button' href='index.php?url=clock_in-out.php&id=5237'>Weekly Schedules</a>
                    </div>
                </div>
            </div>
            <div class='col-3 col-md-2' style='text-align:center;padding:5px'>    
                <div class='mb-1 btn-group'>
                    <a class='btn btn-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' href='index.php?url=create_invoice.php&id=5247'><span>Invoices</span></a>
                    <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' type='button' href='index.php?url=create_invoice.php&id=5247'>Create Invoice</a>
                        <a class='dropdown-item' type='button' href='index.php?url=unpaid_invoices.php&id=5162&selection=INCOME&statusupdate=2&poinz=2&cid=1002&sheba=ndis_invoices&utype=UNPAID+INVOICES&lid_date_from=2025-01-01&lid_date_to=&lid=800000032&cname=&refby='>UnPaid Invoices</a>
                        <a class='dropdown-item' type='button' href='index.php?url=paid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=2025-02-01&lid_date_to=&lid=800000032&cname=&refby='>Paid Invoices</a>
                    </div>
                </div>
            </div>
            <div class='col-3 col-md-2' style='text-align:center;padding:5px'>    
                <div class='mb-1 btn-group'>
                    <a class='btn btn-quaternary btn-icon btn-icon-start w-md-auto btn-sm' type='button' href='index.php?url=time_sheet.php&id=5240'><span>Payroll</span></a>
                    <button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' type='button' href='index.php?url=pay_roll.php&id=50'>Payroll Entries</a>
                        <a class='dropdown-item' type='button' href='index.php?url=pay_slip.php&id=51'>Payslips</a>
                        <a class='dropdown-item' type='button' href='index.php?url=schedule.php&id=5238'>Schedule Status</a>
                        <a class='dropdown-item' type='button' href='index.php?url=time_sheet.php&id=5240'>Generate Payroll</a>
                    </div>
                </div>
            </div>
            <div class='col-3 col-md-2' style='text-align:center;padding:5px'>    
                <div class='mb-1 btn-group'>
                    <button class='btn btn-info btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Create Leave Application', 'offcanvasRight')\"><span>Leave</span></button>
                    <button class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' type='button' href='index.php?url=leaves.php&id=45'>Vew Requests & Status</a>
                    </div>
                </div>
            </div>
            <div class='col-3 col-md-2' style='text-align:center;padding:5px'>    
                <div class='mb-1 btn-group'>
                    <a class='btn btn-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' href='index.php?url=document_manager.php&id=786'><span>Documents</span></a>
                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' type='button' href='index.php?url=document_manager.php&id=786'>View Documents</a>
                        <a class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">New Document</a>
                        <a class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Folder Admin</a>
                    </div>
                </div>
            </div>";
            /*
            <div class='col-3 col-md-2' style='text-align:center;padding:5px'>    
                <div class='mb-1 btn-group'>
                    <button class='btn btn-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onclick=\"shiftdataV2('task_manager_process.php?cid=9001&sheba=task_manager&sourceid=Task&ctitle=Add New Task', 'offcanvasRight')\"><span>Others</span></button>
                    <button class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false'style=' margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Stock Levels</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Care Worker Usage</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Medications</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Tech Support</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Task Types</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Packages</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Service Types</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Billing / Pay Rules</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Referrers</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Events Admin</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">System Activity</button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('', 'datatableX')\">Location Map</button>
                    </div>
                </div>
            </div>
            */
        echo"</div>";
?>