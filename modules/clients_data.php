<?php

    include("../authenticator.php");

    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;
    
    if(isset($_GET["mtype"])) $mtype=$_GET["mtype"];
    else $mtype="USER";
    
    if(isset($_GET["status"])) $status=$_GET["status"];
    else $status=1;
    
    echo"<div class='card-body' style='width:100%;'>";
        if($viewmode=="LIST"){
            $s1 = "select * from uerp_user where mtype='CLIENT' and status='$status' OR mtype='CUSTOMER' and status='$status' order by username asc limit $lim";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $leadername="";
                $d1 = "select * from uerp_user where id='".$rs1["team_leader"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $leadername="".$d3["username"]."".$d3["username2"]."" ; } }
                $openprojects=0;
                $p1 = "select * from project where clientid='".$rs1["id"]."' and status='1' order by id asc limit 1";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $openprojects=($openprojects+1); } }
                $closedprojects=0;
                $p1 = "select * from project where clientid='".$rs1["id"]."' and status='5' order by id asc limit 1";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $closedprojects=($closedprojects+1); } }
                $departmentname="";
                $d1 = "select * from departments where id='".$rs1["department"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                $designationname="";
                $d4 = "select * from designation where id='".$rs1["designation"]."' order by id asc limit 1";
                $d5 = $conn->query($d4);
                if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }
                
                $opentasks=0;
                $closedtasks=0;                    
                $ta1 = "select * from tasks where clientid='".$rs1["id"]."' order by id asc";
                $ta2 = $conn->query($ta1);
                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                    if($ta3["activity"]!=2) $opentasks=($opentasks+1);                            
                    else $closedtasks=($closedtasks+1);                        
                } }
                
                $application_id=0;
                $ra1 = "select * from ndis_card_number where id='".$rs1["application_id"]."' and status='1' order by id desc limit 1";
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                        $application_id="".$rab1["referrer"]." (".$rab1["card_number"].")";
                } }
                            
                $uid=$rs1["id"];
                $statusx=$rs1["status"];
                if($statusx==1) $statusx="ON";
                else $statusx="OFF";

                echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                    <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                        <div class='row' style='width:100%'>
                            <div class='col-12 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                                <img src='".$rs1["images"]."' class='card-img rounded-xl sh-6 sw-6' alt='".$rs1["username"]."' style='margin-top:10px' />
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>".$rs1["username"]." ".$rs1["username2"]."</div>
                                <div class='text-small text-muted'>".$rs1["unbox"]." (".$rs1["mtype"].")<br><b>Card ID: $application_id</b></div>
                            </div>
                            <div class='col-4 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>".$rs1["email"]."</div>
                                <div class='text-small text-muted'>Mobile: ".$rs1["phone"]."<br>Team Leader: $leadername</div>
                            </div>
                            
                            <div class='col-4 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Active Projects</div><div class='text-small text-muted'>";
                                    $projectname="";
                                    $t=0;
                                    $p1x = "select * from project where clientid='".$rs1["id"]."' and status='1' order by id asc limit 1";
                                    $p2x = $conn->query($p1x);
                                    if ($p2x->num_rows > 0) { while($p3x = $p2x->fetch_assoc()) {
                                        $t=($t+1);
                                        $sdate=date("d-m-Y", $p3x["start_date"]);
                                        echo "$t. ".$p3x["name"]." ($sdate)<br>";
                                    } }
                                echo"</div>
                            </div>
                            
                            <div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Projects</div><div class='text-small text-muted'>$openprojects Online</div>
                                <div class='text-small text-muted'>$closedprojects Completed</div>
                            </div>
                            
                            <div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Tasks</div><div class='text-small text-muted'>$opentasks Online</div>
                                <div class='text-small text-muted'>$closedtasks Completed</div>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                    <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>";
                                    if($designationy==13) {
                                        echo"<div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('clients_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' href='index.php?url=my_profile.php&empid=$uid'>Profile</a>
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('clients_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype&status=$status&mtype=$mtype', 'offcanvasTop2')\">Edit</a>";
                                            if($statusx=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('clients_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('clients_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Activate</a>";
                                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=clients_data&cidx=$cid&delidx=$uid&tblx=$sheba&sourceidx=id', 'offcanvasTop')\" onblur=\"shiftdataV2('clients_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Delete</a>";
                                        echo"</div>";
                                    }
                                echo"</div>
                            </div>                  
                        </div>
                    </div>
                </div>";
            } }

        }else{
            
            echo"<div class='row' style='width:100%'>";
                $s1 = "select * from uerp_user where mtype='CLIENT' and status='$status' OR mtype='CUSTOMER' and status='$status' order by username asc limit $lim";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $leadername="";
                    $d1 = "select * from uerp_user where id='".$rs1["team_leader"]."' order by id asc limit 1";
                    $d2 = $conn->query($d1);
                    if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $leadername="".$d3["username"]."".$d3["username2"]."" ; } }
                    $openprojects=0;
                    $p1 = "select * from project where clientid='".$rs1["id"]."' and status='1' order by id asc limit 1";
                    $p2 = $conn->query($p1);
                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $openprojects=($openprojects+1); } }
                    $closedprojects=0;
                    $p1 = "select * from project where clientid='".$rs1["id"]."' and status='5' order by id asc limit 1";
                    $p2 = $conn->query($p1);
                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $closedprojects=($closedprojects+1); } }
                    $departmentname="";
                    $d1 = "select * from departments where id='".$rs1["department"]."' order by id asc limit 1";
                    $d2 = $conn->query($d1);
                    if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                    $designationname="";
                    $d4 = "select * from designation where id='".$rs1["designation"]."' order by id asc limit 1";
                    $d5 = $conn->query($d4);
                    if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }
                    
                    $opentasks=0;
                    $closedtasks=0;                    
                    $ta1 = "select * from tasks where clientid='".$rs1["id"]."' order by id asc";
                    $ta2 = $conn->query($ta1);
                    if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                        if($ta3["activity"]!=2) $opentasks=($opentasks+1);                            
                        else $closedtasks=($closedtasks+1);                        
                    } }
                    
                    $uid=$rs1["id"];
                    $statusx=$rs1["status"];
                    if($statusx==1) $statusx="ON";
                    else $statusx="OFF";

                    echo"<div class='col-12 col-md-4' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                        <div class='card mb-3'>
                            <div class='card-body mb-n5' style='padding:10px'>
                                <div class='d-flex align-items-center flex-column mb-5'>
                                    <div class='mb-5 d-flex align-items-center flex-column'>
                                        <div class='sw-13 position-relative mb-3'>
                                            <img src='".$rs1["images"]."' class='img-fluid rounded-xl' alt='".$rs1["images"]."' />
                                        </div>
                                        <div class='h5 mb-0'>".$rs1["username"]." ".$rs1["username2"]."</div>
                                        <div class='text-muted'>".$rs1["unbox"]." (".$rs1["mtype"].")<br><b>Card ID: ".$rs1["application_id"]."</b> </div>                                        
                                        <div class='text-muted'>
                                            <i data-acorn-icon='pin' class='me-1'></i>
                                            <span class='align-middle'>".$rs1["address"].", ".$rs1["city"].", ".$rs1["area"]."-".$rs1["zip"].", ".$rs1["country"]." </span>
                                        </div>
                                    </div>
                                    <div class='d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100'>
                                    
                                        <a class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='index.php?url=task_manager.php&id=58&empid=$uid'><span>Tasks</span></a>
                                        <a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='index.php?url=projects.php&id=62&empid=$uid'><span>Projects</span></a>";
                                        if($designationy==13) {
                                            echo"<a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('clients_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype&status=$status&mtype=$mtype', 'offcanvasTop2')\">Edit</a>";
                                            if($statusx=="ON") echo"<a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('clients_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('clients_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Activate</a>";
                                            echo"<a class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=clients_data&cidx=$cid&delidx=$uid&tblx=$sheba&sourceidx=id', 'offcanvasTop')\" onblur=\"shiftdataV2('clients_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Delete</a>";
                                        }
                                    echo"</div>
                                </div>
                                <div class='mb-5'>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-envelope'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Email:</div><div class='col-auto' style='text-align:right'>".$rs1["email"]."</div>
                                        </div></div>
                                    </div>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-phone'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Phone:</div>
                                            <div class='col-auto' style='text-align:right'>".$rs1["phone"]."</div>
                                        </div></div>
                                    </div>
                                    
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-user'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Assigned Team Leader:</div>
                                            <div class='col-auto' style='text-align:right'>$leadername</div>
                                        </div></div>
                                    </div>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-project-diagram'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Online Projects:</div>
                                            <div class='col-auto' style='text-align:right'>$openprojects</div>
                                        </div></div>
                                    </div>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-project-diagram'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Completed Projects:</div>
                                            <div class='col-auto' style='text-align:right'>$closedprojects</div>
                                        </div></div>
                                    </div>
                                    
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-tasks'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Open Tasks:</div>
                                            <div class='col-auto' style='text-align:right'>$opentasks</div>
                                        </div></div>
                                    </div>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-tasks'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Completed Tasks:</div>
                                            <div class='col-auto' style='text-align:right'>$closedtasks</div>
                                        </div></div>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>";
                } }
            echo"</div>";

        }
    echo"</div>";