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
            
                // if($sourceid=="Leave_Application"){
                    
                    echo"<thead>
                        <tr><th>Sl.</th><th>Lead Name</th><th>Sender Name</th><th>Date</th><th>Email Subject</th><th>Email Messages</th><th>Client Response Note</th><th>Opportunity</th><th>status</th><th>&nbsp;</th></tr>
                    </thead>
                    <tbody>";
                        $t=0;
                        $ra1 = "select * from emails order by id asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            
                            $email_date=date("d.m.Y",$rab1["email_date"]);
                                    
                            $employeename="";
                            $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id asc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename="".$rab2["username"]." ".$rab2["username2"].""; } }
                            
                            $clientname="";
                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname="".$rab2["username"]." ".$rab2["username2"].""; } }
                            
                            $leadname="";
                            $ra3 = "select * from leads where id='".$rab1["leadid"]."' order by id asc limit 1";
                            $rb3 = $conn->query($ra3);
                            if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { $leadname=$rab3["lead_name"]; } }
                            
                            $t=($t+1);
                            echo"<tr>
                                <td>$t</td>
                                <td>$leadname</td>
                                <td>$employeename</td>
                                <td>$email_date</td>
                                <td>".$rab1["email_subject"]."</td>
                                <td>".$rab1["email_message"]."</td>
                                <td>$clientname<br>".$rab1["client_response"]."</td>
                                <td>".$rab1["opportunity"]."</td>
                                <td>".$rab1["status"]."</td>
                                <td class='text-alternate'>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('leaves_data.php.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('leaves_process.php?lid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=leave_application&ctitle=Edit/Approve Deals', 'offcanvasRight')\">Edit</a>";
                                            if($rab1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=leave_applications&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&sourceid=Leave_Application', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=leave_applications&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('leaves_data.php?cid=$cid&sheba=$sheba&sourceid=Leave_Application', 'datatableX')\">Activate</a>";
                                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=leaves_data&sourceid=Leave_Application&cid=$cid&delid=".$rab1["id"]."&tbl=leave_applications', 'offcanvasTop')\">Delete</a>";
                                        echo"</div>
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>"; 
                        } }
                    echo"</tbody>";
                // }
                
            echo"</div>
        </div>
    </div>"; 
