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

    echo"<div class='card-body' style='width:100%;padding:0px'>";
            
                // if($sourceid=="Leave_Application"){
                    
                    echo"<thead>
                        <tr><th>Campaign Lead</th><th>Dates</th><th>Client Detail</th><th>Representative</th>
                        <th>Additional Data 1</th><th>Additional Data 2</th><th>&nbsp;</th></tr>
                    </thead>
                    <tbody>";
                        $t=0;
                        $ra1 = "select * from leads order by id asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            
                            $target_date=date("d.m.Y",$rab1["target_date"]);
                            $followup_date=date("d.m.Y",$rab1["followup_date"]);
                            $appointment_date=date("d.m.Y",$rab1["appointment_date"]);
                                    
                            $employeename="";
                            $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id asc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename="".$rab2["username"]." ".$rab2["username2"].""; } }
                            
                            $campaignname="";
                            $ra3 = "select * from campaigns where id='".$rab1["campaignid"]."' order by id asc limit 1";
                            $rb3 = $conn->query($ra3);
                            if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { $campaignname=$rab3["campaign_name"]; } }
                                    
                            $t=($t+1);
                            echo"<tr>
                                <td align=left>
                                    Campaign : $campaignname<br>
                                    Lead : ".$rab1["lead_name"]."<br>
                                    Manager : $employeename
                                </td>
                                <td align=left>
                                    Appointment Date : $appointment_date<br>
                                    Followup Date : $followup_date<br>
                                    Target Date : $target_date
                                </td>
                                <td align=left>
                                    ".$rab1["title"]." ".$rab1["name"]." ".$rab1["surname"]." (".$rab1["gender"].")<br>
                                    ".$rab1["address"]."<br>
                                    ".$rab1["ccity"].", ".$rab1["cstate"]."-".$rab1["czip"].", ".$rab1["ccountry"]."<br>
                                    ".$rab1["email"].", ".$rab1["phone"]."
                                </td>
                                <td align=left>
                                    Name : ".$rab1["rname"]." ".$rab1["rname2"]."<br>
                                    Phone : ".$rab1["rphone"]."<br>
                                    Email : ".$rab1["remail"]."<br>
                                    Type : ".$rab1["rtype"]."<br>
                                </td>
                                <td align=left>";
                                    $dob=date("d-m-Y", $rab1["dob"]);
                                    echo"DOB : $dob<br>
                                    B.Country : ".$rab1["birth_country"]."<br>
                                    Language : ".$rab1["language"]."<br>
                                    Spoke English? : ".$rab1["english"]."<br>
                                </td>
                                <td align=left>
                                    Package Level : ".$rab1["cpackage"]."<br>
                                    Funding type : ".$rab1["funding_type"]."<br>
                                    Prev. Provider : ".$rab1["previous_provider"]."<br>
                                    Referral Number : ".$rab1["referral_number"]."
                                </td>
                                <td class='text-alternate'>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('leaves_data.php.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Call Log</a>
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Email Log</a>
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Meeting Log</a>
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View General Notes Log</a>
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Quote Log</a>
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Onboard Client (Deal)</a>
                                            <hr>
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Edit</a>";
                                            if($rab1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=leave_applications&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&sourceid=Leave_Application', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=leave_applications&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&sourceid=Leave_Application', 'datatableX')\">Activate</a>";
                                        echo"</div>
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr><td colspan=20>
                                <table><tr>
                                    <td align=center><a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Call Log</a></td>
                                    <td align=center><a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Email Log</a></td>
                                    <td align=center><a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Meeting Log</a></td>
                                    <td align=center><a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View General Notes Log</a></td>
                                    <td align=center><a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Add/View Quote Log</a></td>
                                    <td align=center><a class='btn btn-primary' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Leads', 'offcanvasRight')\">Onboard Client (Deal)</a></td>
                                </tr></table>
                            </td></tr>
                            <tr><td colspan=20><hr></td></tr>"; 
                        } }
                    echo"</tbody>";
                // }
                
            echo"</div>
        </div>
    </div>"; 
