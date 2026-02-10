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
    
    echo"<div class='card-body' style='width:100%;'>";
        if($viewmode=="LIST"){
            if($utype=="EMPLOYEE"){
                if($designationy==13) $s1 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='$utype' and status='1' OR mtype='ADMIN' and status='1' order by username asc limit $lim";
                else $s1 = "select * from uerp_user where mtype='ADMIN' and status='1' order by username asc limit $lim";
            }else{
                if($designationy==13) $s1 = "select * from uerp_user where mtype='$utype' and status='1' order by username asc limit $lim";
                else $s1 = "select * from uerp_user where mtype='ADMIN' and status='1' order by username asc limit $lim";
            }
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $lastid=$rs1["id"];
                $rand=rand(100,999);
                if($utype=="CLIENT"){
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
                }
                if($utype=="EMPLOYEE" || $utype=="SUPPORT"){
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
                }
                
                $uid=$rs1["id"];
                $status=$rs1["status"];
                if($status==1) $status="ON";
                else $status="OFF";

                echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                    <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                        <div class='row' style='width:100%'>
                            <div class='col-12 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                                <img src='".$rs1["images"]."' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>".$rs1["username"]." ".$rs1["username2"]."</div><div class='text-small text-muted'>".$rs1["unbox"]."";
                                    if($utype=="EMPLOYEE" || $utype=="SUPPORT") echo"<br>Role: ".$rs1["mtype"]."";
                                echo"</div>                                
                            </div>";
                            if($utype=="EMPLOYEE" || $utype=="SUPPORT"){
                                echo"<div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>".$rs1["email"]."</div><div class='text-small text-muted'>Mobile: ".$rs1["phone"]."</div>
                                </div>";
                                echo"<div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Department</div><div class='text-small text-muted'>$departmentname</div>
                                </div>";
                                echo"<div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Designation</div><div class='text-small text-muted'>$designationname</div>
                                </div>";
                                echo"<div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Projects</div><div class='text-small text-muted'>5 Online</div>
                                    <div class='text-small text-muted'>5 Completed</div>
                                </div>";
                                echo"<div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Tasks</div><div class='text-small text-muted'>$opentasks Online</div>
                                    <div class='text-small text-muted'>$closedtasks Completed</div>
                                </div>";                                                                
                            }
                            if($utype=="CLIENT"){
                                echo"<div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>".$rs1["email"]."</div><div class='text-small text-muted'>Mobile: ".$rs1["phone"].", ".$rs1["phone2"]."</div>
                                </div>";
                                echo"<div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Current Plan</div><div class='text-small text-muted'>".$rs1["plan"]."</div>
                                </div>";
                                echo"<div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Team/Support Co-ordinator</div><div class='text-small text-muted'>$leadername</div>
                                </div>"; 
                                echo"<div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Projects</div><div class='text-small text-muted'>$openprojects Online</div>
                                    <div class='text-small text-muted'>$closedprojects Completed</div>
                                </div>";                                
                            }

                            if($utype=="VENDOR"){
                                echo"<div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Store Name</div><div class='text-small text-muted'>".$rs1["store_name"]."</div>
                                </div>";
                                echo"<div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>".$rs1["store_address"]."</div><div class='text-small text-muted'>Phone: ".$rs1["store_phone"]."</div>
                                </div>";                                
                            }

                            echo"<div class='col-12 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Status</div><div class='text-small text-muted'>$status</div>
                            </div>";
                            if($utype=="VENDOR"){
                                echo"<div class='col-4   col-md-2' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('chart_of_accounts_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasTop2')\">
                                        <i class='fa-solid fa-shopping-cart'></i>&nbsp;&nbsp;<span>Purchase History</span>
                                    </button>
                                </div>";                                
                            }
                            echo"<div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                <a class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'style='cursor: pointer' href='index.php?url=my_profile.php&id=5173&empid=$uid'><i class='fa-solid fa-user'></i>&nbsp;&nbsp;<span>Profile</span></a>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>";
                                if($designationy==13){ 
                                    echo"<div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('users_manager.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype', 'offcanvasTop2')\">Edit</a>";
                                            if($status=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('delete_records.php?processor=users_table&cid=$cid&delid=$uid&tbl=$sheba&utype=$utype', 'offcanvasTop')\">Delete</a>";                                
                                        echo"</div>
                                    </div>";
                                }
                            echo"</div>                        
                        </div>
                    </div>
                </div>";
            } }

        }else{
            
            echo"<div class='row' style='width:100%'>";
                // if($utype=="EMPLOYEE") $s1 = "select * from uerp_user where mtype='USER' OR mtype='$utype' OR mtype='ADMIN' order by username asc limit $lim";
                // else $s1 = "select * from uerp_user where mtype='$utype' order by username asc limit $lim";
                if($utype=="EMPLOYEE"){
                    if($designationy==13) $s1 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='$utype' and status='1' OR mtype='ADMIN' and status='1' order by username asc limit $lim";
                    else $s1 = "select * from uerp_user where mtype='ADMIN' and status='1' order by username asc limit $lim";
                }else{
                    if($designationy==13) $s1 = "select * from uerp_user where mtype='$utype' and status='1' order by username asc limit $lim";
                    else $s1 = "select * from uerp_user where mtype='ADMIN' and status='1' order by username asc limit $lim";
                }
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $lastid=$rs1["id"];
                    $rand=rand(100,999);
                    if($utype=="CLIENT"){
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
                    }
                    if($utype=="EMPLOYEE" || $utype=="SUPPORT"){
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
                    }
                    
                    $uid=$rs1["id"];
                    $status=$rs1["status"];
                    if($status==1) $status="ON";
                    else $status="OFF";

                    echo"<div class='col-12 col-md-4' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                        <div class='card mb-3'>
                            <div class='card-body mb-n5' style='padding:10px'>
                                <div class='d-flex align-items-center flex-column mb-5'>
                                    <div class='mb-5 d-flex align-items-center flex-column'>
                                        <div class='sw-13 position-relative mb-3'>
                                            <img src='".$rs1["images"]."' class='img-fluid rounded-xl' alt='".$rs1["images"]."' />
                                        </div>
                                        <div class='h5 mb-0'>".$rs1["username"]." ".$rs1["username2"]."</div>
                                        <div class='text-muted'>".$rs1["unbox"]."";
                                            if($utype=="EMPLOYEE" || $utype=="SUPPORT") echo"<br>Role: ".$rs1["mtype"]."";
                                        echo"</div>
                                        
                                        <div class='text-muted'>
                                            <i data-acorn-icon='pin' class='me-1'></i>
                                            <span class='align-middle'>".$rs1["address"].", ".$rs1["city"].", ".$rs1["area"]."-".$rs1["zip"].", ".$rs1["country"]." </span>
                                        </div>
                                    </div>
                                    <div class='d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100'>";
                                        if($utype=="VENDOR"){
                                            echo"<button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('chart_of_accounts_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasTop2')\" style='margin-right:10px'>
                                                <i class='fa-solid fa-shopping-cart'></i>&nbsp;&nbsp;<span>Transactions</span>
                                            </button>";                                
                                        }
                                        if($utype=="CLIENT"){
                                            echo"<a href='index.php?url=projects.php&id=62' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                                <i class='fa-solid fa-project-diagram'></i>&nbsp;&nbsp;<span>Projects</span>
                                            </button>";                                
                                        }
                                        if($utype=="EMPLOYEE" || $utype=="SUPPORT"){
                                            echo"<button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('chart_of_accounts_manager.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasTop2')\" style='margin-right:10px'>
                                                <span>Tasks</span>
                                            </button>";
                                            echo"<a href='index.php?url=projects.php&id=62' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                                <span>Projects</span>
                                            </button>";                                            
                                        }
                                        echo"
                                        <a class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'style='cursor: pointer' href='index.php?url=my_profile.php&id=5173&empid=$uid'><i class='fa-solid fa-user'></i>&nbsp;&nbsp;<span>Profile</span></a>";
                                        if($designationy==13){ 
                                            echo"<div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                                <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                                <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">
                                                    <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('users_manager.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype', 'offcanvasTop2')\">Edit</a>";
                                                    if($status=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                                    else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                                    echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('delete_records.php?processor=users_table&cid=$cid&delid=$uid&tbl=$sheba&utype=$utype', 'offcanvasTop')\">Delete</a>";                                
                                                echo"</div>
                                            </div>";
                                        }
                                    echo"</div>
                                </div>
                                <div class='mb-5'>";

                                    if($utype=="EMPLOYEE" || $utype=="SUPPORT"){
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-envelope'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Email:</div><div class='col-auto' style='text-align:right'>".$rs1["email"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-phone'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Phone:</div>
                                                <div class='col-auto' style='text-align:right'>".$rs1["phone"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-users'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Department:</div>
                                                <div class='col-auto' style='text-align:right'>$departmentname</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-user'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Designation:</div>
                                                <div class='col-auto' style='text-align:right'>$designationname</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-project-diagram'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Online Projects:</div>
                                                <div class='col-auto' style='text-align:right'>$openprojects</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-project-diagram'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Completed Projects:</div>
                                                <div class='col-auto' style='text-align:right'>$closedprojects</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-tasks'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Open Tasks:</div>
                                                <div class='col-auto' style='text-align:right'>$opentasks</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-tasks'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Completed Tasks:</div>
                                                <div class='col-auto' style='text-align:right'>$closedtasks</div>
                                            </div></div>
                                        </div>";                                                     
                                    }

                                    if($utype=="CLIENT"){

                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-envelope'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Email:</div><div class='col-auto' style='text-align:right'>".$rs1["email"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-phone'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Phone:</div>
                                                <div class='col-auto' style='text-align:right'>".$rs1["phone"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-box'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Current Plan:</div>
                                                <div class='col-auto' style='text-align:right'>".$rs1["plan"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-user'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Team/Support Co-ordinator:</div>
                                                <div class='col-auto' style='text-align:right'>$leadername</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-project-diagram'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Online Projects:</div>
                                                <div class='col-auto' style='text-align:right'>$openprojects</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-project-diagram'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Completed Projects:</div>
                                                <div class='col-auto' style='text-align:right'>$closedprojects</div>
                                            </div></div>
                                        </div>";
                                        
                                        
                                    }

                                    if($utype=="VENDOR"){

                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-shop'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Store Name:</div>
                                                <div class='col-auto' style='text-align:right'>".$rs1["store_name"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-home'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Address:</div>
                                                <div class='col-auto' style='text-align:right'>".$rs1["store_address"]."</div>
                                            </div></div>
                                        </div>";
                                        
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-envelope'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Email:</div><div class='col-auto' style='text-align:right'>".$rs1["email"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-phone'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Phone:</div>
                                                <div class='col-auto' style='text-align:right'>".$rs1["phone"]."</div>
                                            </div></div>
                                        </div>";
                                        echo"<div class='row g-0 align-items-center mb-2'>
                                            <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-phone'></i></div></div>
                                            <div class='col ps-3'><div class='row g-0'>
                                                <div class='col' style='text-align:left'>Store #:</div>
                                                <div class='col-auto' style='text-align:right'>".$rs1["store_phone"]."</div>
                                            </div></div>
                                        </div>";  
                                    }
                                    echo"<div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-phone'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Status:</div>
                                            <div class='col-auto' style='text-align:right'>$status</div>
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