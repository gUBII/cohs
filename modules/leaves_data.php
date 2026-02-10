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

    echo"<div class='card-body' style='width:100%;padding:0px'>
        <div class='row' style='padding-left:5px;padding-right:5px'>
            <div class='col-12'>";
            
                if($sourceid=="Leave_Application"){
                    
                    echo"<thead>
                        <tr>
                            <th>Sl.</th><th>Applicant Name</th><th>Leave Type</th><th>Applicaton Date</th><th>Leave From</th><th>Leave Till</th>
                            <th>Reason</th><th>Approved Date</th><th>Approved From</th><th>Approved To</th><th>Document</th><th>Comment</th>
                            <th>Status</th><th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>";
                        $t=0;
                                if($designationy==13) $ra1 = "select * from leave_applications order by application_date desc";
                                else $ra1 = "select * from leave_applications where applicant_id='$userid' order by application_date desc";
                                $rb1 = $conn->query($ra1);
                                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                    $application_date=date("d.m.Y",$rab1["application_date"]);
                                    $leave_from=date("d.m.Y",$rab1["leave_from"]);
                                    $leave_to=date("d.m.Y",$rab1["leave_to"]);
                                    
                                    if($rab1["leave_from"]==0) $approved_date="Pending";
                                    else $approved_date=date("d.m.Y",$rab1["approved_date"]);
                                    
                                    if($rab1["approved_from"]==0) $approved_from="Pending";
                                    else $approved_from=date("d.m.Y",$rab1["approved_from"]);
                                    
                                    if($rab1["approved_to"]==0) $approved_to="Pending";
                                    else $approved_to=date("d.m.Y",$rab1["approved_to"]);
                                    
                                    $applicantname="";
                                    $ra2 = "select * from uerp_user where id='".$rab1["applicant_id"]."' order by id asc limit 1";
                                    $rb2 = $conn->query($ra2);
                                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                                        $applicantname="".$rab2["username"]." ".$rab2["username2"]."";
                                    } }
                                    
                                    $leavetypename="";
                                    $ra2x = "select * from leave_type where id='".$rab1["type_id"]."' order by id asc limit 1";
                                    $rb2x = $conn->query($ra2x);
                                    if ($rb2x->num_rows > 0) { while($rab2x = $rb2x->fetch_assoc()) { $leavetypename=$rab2x["leavename"]; } }
                                    
                                    $t=($t+1);
                                    echo"<tr><td>$t</td><td>$applicantname</td><td>$leavetypename</td><td>$application_date</td><td>$leave_from</td><td>$leave_to</td>
                                    <td>".$rab1["reason"]."</td><td>$approved_date</td><td>$approved_from</td><td>$approved_to</td>
                                    <td><a href='".$rab1["file_name"]."'>View</a></td><td>".$rab1["manager_comment"]."</td><td>".$rab1["status"]."</td>
                                    <td class='text-alternate'>";
                                        if($designationy==13){
                                            echo"<div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                                <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                                <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('leaves_data.php.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                                    <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leave Application', 'offcanvasRight')\">Edit</a>";
                                                    if($rab1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=leave_applications&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&sourceid=Leave_Application', 'datatableX')\">Suspend</a>";
                                                    else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=leave_applications&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&sourceid=Leave_Application', 'datatableX')\">Activate</a>";
                                                    echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=leaves_data&sourceid=Leave_Application&cid=$cid&delid=".$rab1["id"]."&tbl=leave_applications', 'offcanvasTop')\">Delete</a>";
                                                echo"</div>
                                            </div>";
                                        }
                                    echo"</td><td>&nbsp;</td></tr>"; 
                                } }
                            echo"</tbody>
                       
                    </div>";
                }
                
            echo"</div>
        </div>
    </div>"; 
