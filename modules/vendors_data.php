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
            $s1 = "select * from uerp_user where mtype='VENDOR' and status='".$_GET["status"]."' OR mtype='$utype' and status='".$_GET["status"]."' order by username asc limit $lim";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $lastid=$rs1["id"];
                $rand=rand(100,999);
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
                                <div>".$rs1["username"]." ".$rs1["username2"]."</div><div class='text-small text-muted'>".$rs1["unbox"]."<br>Role: ".$rs1["mtype"]."</div>
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>".$rs1["email"]."</div><div class='text-small text-muted'>Mobile: ".$rs1["phone"].", ".$rs1["phone2"]."<br>Store Phone: , ".$rs1["store_phone"]."</div>
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Shop Name & Location</div><div class='text-small text-muted'>".$rs1["store_name"]."<br>".$rs1["store_address"]."</div>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>A/c Status</div><div class='text-small text-muted'>Payable: $payable<br>Receivable: $receivable</div>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Item Status</div><div class='text-small text-muted'>Quantity Sold: $total_quantity_sold<br>Qty On Hand: $qoh</div>
                            </div>
                            <div class='col-12 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Status</div><div class='text-small text-muted'>$status</div>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                <a class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('vendors_process.php?cid=1000&sheba=$sheba&mid=$uid&ctitle=Items Purchased From ".$rs1["store_name"]."&utype=$utype&status=".$_GET["status"]."', 'offcanvasTop2')\"><i class='fa-solid fa-archive'></i>&nbsp;&nbsp;<span>View Items</span></a>
                            </div>
                            <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                    <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>";
                                    if($designationy==13) {
                                        echo"<div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('vendors_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('vendors_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype&status=".$_GET["status"]."', 'offcanvasTop2')\">Edit</a>";
                                            if($status=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('vendors_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('vendors_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Activate</a>";
                                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=vendors_data&cidx=$cid&delidx=$uid&tblx=$sheba&sourceidx=id', 'offcanvasTop')\" onblur=\"shiftdataV2('vendors_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Delete</a>";
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
                $s1 = "select * from uerp_user where mtype='VENDOR' and status='".$_GET["status"]."' OR mtype='$utype' and status='".$_GET["status"]."' order by username asc limit $lim";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $lastid=$rs1["id"];
                    $rand=rand(100,999);
                    
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
                                        <div class='text-muted'>".$rs1["unbox"]."<br>Role: ".$rs1["mtype"]."</div>                                        
                                        <div class='text-muted'>
                                            <i data-acorn-icon='pin' class='me-1'></i>
                                            <span class='align-middle'>".$rs1["address"].", ".$rs1["city"].", ".$rs1["area"]."-".$rs1["zip"].", ".$rs1["country"]." </span>
                                        </div>
                                    </div>
                                    <div class='d-flex flex-row justify-content-between w-100 w-sm-50 w-xl-100'>
                                        <a class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('vendors_process.php?cid=1000&sheba=$sheba&mid=$uid&ctitle=Items Purchased From ".$rs1["store_name"]."&utype=$utype&status=".$_GET["status"]."', 'offcanvasTop2')\"><i class='fa-solid fa-archive'></i>&nbsp;&nbsp;<span>View Items</span></a>";
                                        if($designationy==13) {                                        
                                            echo"<a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('vendors_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype&status=".$_GET["status"]."', 'offcanvasTop2')\">Edit</a>";
                                            if($status=="ON") echo"<a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('vendors_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('vendors_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Activate</a>";
                                            if($designationy==13) echo"<a class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=vendors_data&cidx=$cid&delidx=$uid&tblx=$sheba&sourceidx=id', 'offcanvasTop')\" onblur=\"shiftdataV2('vendors_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=".$_GET["status"]."', 'datatableX')\">Delete</a>";
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
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-box'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Shop Name & Location:</div>
                                            <div class='col-auto' style='text-align:right'>".$rs1["store_name"]."<br>".$rs1["store_address"]."</div>
                                        </div></div>
                                    </div>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-user'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>A/c Status:</div>
                                            <div class='col-auto' style='text-align:right'>Payable: $payable<br>Receivable: $receivable</div>
                                        </div></div>
                                    </div>
                                    <div class='row g-0 align-items-center mb-2'>
                                        <div class='col-auto'><div class='border border-primary sw-4 sh-4 rounded-xl d-flex justify-content-center align-items-center'><i class='fa-solid fa-project-diagram'></i></div></div>
                                        <div class='col ps-3'><div class='row g-0'>
                                            <div class='col' style='text-align:left'>Item Stock Status:</div>
                                            <div class='col-auto' style='text-align:right'>Quantity Sold: $total_quantity_sold<br>Qty On Hand: $qoh</div>
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