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
    
    if(isset($_GET["mtypex"])) $mtypex=$_GET["mtypex"];
    else $mtypex="USER";
    
    if(isset($_GET["status"])) $status=$_GET["status"];
    else $status=1;
    // if($status=="ON") $status=1;
    // if($status=="OFF") $status=10;
    
    echo"<div class='card-body' style='width:100%;'><div class='col-12'>Showing $mtypex Accounts</div>";
        
        if($viewmode=="LIST"){
            
            if($mtype=="ADMIN") $s1 = "select * from uerp_user where mtype='$mtypex' and status='$status' order by username asc limit $lim";
            else $s1 = "select * from uerp_user where mtype='ADMIN' and status='$status' order by username asc limit $lim";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $lastid=$rs1["id"];
                $rand=rand(100,999);
                
                $departmentname="";
                $d1 = "select * from departments where id='".$rs1["department"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                $designationname="";
                $d4 = "select * from designation where id='".$rs1["designation"]."' order by id asc limit 1";
                $d5 = $conn->query($d4);
                if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }

                $openprojects=0;
                $closedprojects=0;
                $ta1 = "select * from project_team_allocation where employeeid='".$rs1["id"]."' and status='1' order by id asc";
                $ta2 = $conn->query($ta1);
                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                    $p1 = "select * from project where id='".$ta3["projectid"]."' order by id asc";
                    $p2 = $conn->query($p1);
                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                        if($p3["status"]=="1") $openprojects=($openprojects+1);                            
                        if($p3["status"]=="5") $closedprojects=($closedprojects+1);
                    } }
                } }

                $opentasks=0;
                $closedtasks=0;                    
                $ta1 = "select * from tasks where employeeid='".$rs1["id"]."' order by id asc";
                $ta2 = $conn->query($ta1);
                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                    if($ta3["activity"]!=2) $opentasks=($opentasks+1);                            
                    else $closedtasks=($closedtasks+1);                        
                } }
                
                $geographic_regions=0;
                $gr1 = "select * from geographic_regions where id='".$rs1["geographic_regions"]."' order by id asc limit 1";
                $gr2 = $conn->query($gr1);
                if ($gr2->num_rows > 0) { while($gr3 = $gr2->fetch_assoc()) { $geographic_regions=$gr3["region"]; } }
                
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
                                <div class='text-small text-muted'>".$rs1["unbox"]." (".$rs1["mtype"].")<br><b>Card ID: ".$rs1["application_id"]."</b></div>
                                <div style='font-size:8pt'><b>Geo Region: $geographic_regions</b></div>
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>".$rs1["email"]."</div>
                                <div class='text-small text-muted'>Mobile: ".$rs1["phone"]."<br>Job Experience: ".$rs1["job_experience"]." Years</div>
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Department & Designation</div><div class='text-small text-muted'>$departmentname<br>$designationname</div>
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>SCHADS Status</div><div class='text-small text-muted'>Status: ".$rs1["schads_status"]."<br>Level: ".$rs1["schads_level"]."<br>Paypoint: ".$rs1["schads_paypoint"]."</div>
                            </div>
                            
                            <div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Projects</div><div class='text-small text-muted'>5 Online</div>
                                <div class='text-small text-muted'>5 Completed</div>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Tasks</div><div class='text-small text-muted'>$opentasks Online</div>
                                <div class='text-small text-muted'>$closedtasks Completed</div>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                    <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>";
                                    
                                        echo"<div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' href='index.php?url=my_profile.php&empid=$uid'>Profile</a>";
                                            if($mtype=="ADMIN") {
                                                echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('employees_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype&status=$status&mtype=$mtype', 'offcanvasTop2')\">Edit</a>";
                                                if($statusx=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Suspend</a>";
                                                else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Activate</a>";
                                                // echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=employees_data&cidx=$cid&delidx=$uid&tblx=$sheba&sourceidx=id&utype=$utype&status=$status&mtype=$mtype', 'offcanvasTop')\" onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Delete</a>";
                                            }
                                        echo"</div>";
                                    
                                echo"</div>
                            </div>                  
                        </div>
                    </div>
                </div>";
            } }

        }else{
            
            echo"<div class='row' style='width:100%'>";
            
                if($mtype=="ADMIN") $s1 = "select * from uerp_user where mtype='$mtypex' and status='$status' order by username asc limit $lim";
                else $s1 = "select * from uerp_user where mtype='ADMIN' and status='$status' order by username asc limit $lim";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $lastid=$rs1["id"];
                    $rand=rand(100,999);
                    
                    $departmentname="";
                    $d1 = "select * from departments where id='".$rs1["department"]."' order by id asc limit 1";
                    $d2 = $conn->query($d1);
                    if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                    $designationname="";
                    $d4 = "select * from designation where id='".$rs1["designation"]."' order by id asc limit 1";
                    $d5 = $conn->query($d4);
                    if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }
    
                    $openprojects=0;
                    $closedprojects=0;
                    $ta1 = "select * from project_team_allocation where employeeid='".$rs1["id"]."' and status='1' order by id asc";
                    $ta2 = $conn->query($ta1);
                    if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                        $p1 = "select * from project where id='".$ta3["projectid"]."' order by id asc";
                        $p2 = $conn->query($p1);
                        if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                            if($p3["status"]=="1") $openprojects=($openprojects+1);                            
                            if($p3["status"]=="5") $closedprojects=($closedprojects+1);
                        } }
                    } }
    
                    $opentasks=0;
                    $closedtasks=0;                    
                    $ta1 = "select * from tasks where employeeid='".$rs1["id"]."' order by id asc";
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
                                        <div class='sw-13 position-relative mb-3'>";
                                            $uimage=null;
                                            $uimage=$rs1["images"];
                                            if(strlen("$uimage")>=3){
                                                if (!file_exists($uimage) || empty($uimage)) echo"<img class='img-fluid rounded-xl' alt='profile' src='assets/noimage.png' />";
                                                else echo"<img class='img-fluid rounded-xl' alt='profile' src='$uimage' />";
                                            } else echo"<img class='img-fluid rounded-xl' alt='profile' src='assets/noimage.png' />";
                                        echo"</div>
                                        <div class='h5 mb-0'>".$rs1["username"]." ".$rs1["username2"]."</div>
                                        <div class='text-muted'>".$rs1["unbox"]." (".$rs1["mtype"]." (".$rs1["mtype"].")<br><b>Card ID: ".$rs1["application_id"]."</b></div>                                        
                                        <div class='text-muted'>
                                            <i data-acorn-icon='pin' class='me-1'></i>
                                            <span class='align-middle'>".$rs1["address"].", ".$rs1["city"].", ".$rs1["area"]."-".$rs1["zip"].", ".$rs1["country"]." </span>
                                        </div>
                                    </div>
                                    <div class='d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100'>
                                    
                                        <a class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='index.php?url=task_manager.php&id=58&empid=$uid'><span>Tasks</span></a>
                                        <a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='index.php?url=projects.php&id=62&empid=$uid'><span>Projects</span></a>";
                                        
                                        if($designationy==13) {
                                            echo"<a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('employees_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype&status=$status&mtype=$mtype', 'offcanvasTop2')\">Edit</a>";
                                            if($statusx=="ON") echo"<a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Activate</a>";
                                            // echo"<a class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=employees_data&cidx=$cid&delidx=$uid&tblx=$sheba&sourceidx=id', 'offcanvasTop')\" onblur=\"shiftdataV2('employees_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">Delete</a>";
                                        }else{
                                            echo"<a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='index.php?url=my_profile.php&empid=$uid'><span>Profile</span></a>";
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
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-users'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Department:</div>
                                            <div class='col-auto' style='text-align:right'>$departmentname</div>
                                        </div></div>
                                    </div>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-user'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Designation:</div>
                                            <div class='col-auto' style='text-align:right'>$designationname</div>
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