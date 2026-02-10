<?php

    include("../authenticator.php");
    
    $dbname="project_sc";
    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    $sourceid=0;
    if(isset($_GET["sourceid"])) $sourceid=$_GET["sourceid"];
    
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;
    echo"<div class='col-12 d-flex align-items-start'>";
        if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
            echo"<div class='mb-1 btn-group'>
                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Campaign&ctitle=Create Campaign', 'offcanvasLeftFilter')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Campaign</span></button>
                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
                <div class='dropdown-menu'>
                    <button class='dropdown-item' type='button' onclick=\"shiftdataV2('campaigns_data2.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">View Campaigns</button>
                </div>
            </div>";
        }
    
        echo"<div class='mb-1 btn-group'>
            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'  data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Lead&ctitle=Add New Lead', 'offcanvasTop2')\"><i data-acorn-icon='plus'></i>&nbsp;<span>Create Lead</span></button>
            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
            <div class='dropdown-menu'>
                <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?status=1&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                    <i data-acorn-icon='cursor-pointer'></i>&nbsp;&nbsp;<span>Ongoing</span>
                </button>
                <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?status=2&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                    <i data-acorn-icon='like'></i>&nbsp;&nbsp;<span>Completed</span>
                </button>
                <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?status=0&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                    <i data-acorn-icon='unlike'></i>&nbsp;&nbsp;<span>Suspended</span>
                </button>
            </div>
        </div>
    </div><br>";
    
    echo"<table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:90%'>
        <thead><tr><th colspan=20><h3>Campaign List</h1></th></tr></thead>
        <tbody>
            <div class='card-body' style='width:100%;padding:0px'>
                <div class='row' style='padding-left:5px;padding-right:5px'>
                    <div class='col-12'>
                        <table style='width:100%'>
                            <thead>
                                <tr><th>Campaign Name</th><th>Manager/Co-Ordinator</th><th>Start Date</th>
                                <th>Plan</th><th>Possibility</th><th>Opportunity</th><th>Priority</th><th>status</th><th>&nbsp;</th></tr>
                            </thead> 
                            <tbody>";
                                
                                if($designationy=="13") $ra1 = "select * from campaigns order by id asc";
                                else $ra1 = "select * from campaigns where employeeid='$userid' order by id asc";
                                $rb1 = $conn->query($ra1);
                                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                    $start_date=date("d.m.Y",$rab1["start_date"]);
                                    $employeename="";
                                    $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id asc limit 1";
                                    $rb2 = $conn->query($ra2);
                                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename="".$rab2["username"]." ".$rab2["username2"].""; } }
                                    echo"<tr style='height:50px'>
                                        <td>".$rab1["campaign_name"]."</td><td>$employeename</td>
                                        <td>$start_date</td><td>".$rab1["plan"]."</td>
                                        <td>".$rab1["possibility"]."</td><td>".$rab1["opportunity"]."</td>
                                        <td>".$rab1["priority"]."</td><td>".$rab1["status"]."</td>
                                        <td class='text-alternate'>
                                            <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                                <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                                <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('leaves_data.php.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                                    <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('global_manager.php?dataid=".$rab1["id"]."&pointer=2&cid=$cid&sheba=$sheba&sourceid=Campaign&ctitle=Edit/Approve Campaings', 'offcanvasRight')\">Edit</a>";
                                                    if($rab1["status"]=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=campaigns&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('campaigns_data2.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Suspend</a>";
                                                    else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=campaigns&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('campaigns_data2.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Activate</a>";
                                                    // echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onblur=\"shiftdataV2('campaigns_data2.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Delete</a>";
                                                echo"</div>
                                            </div>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>"; 
                                } }
                            echo"</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </tbody>
    </table>"; 
