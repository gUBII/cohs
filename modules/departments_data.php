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
            $s1 = "select * from departments order by department_name asc limit $lim";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $lastid=$rs1["id"];
                $rand=rand(100,999);
                $leadername="";
                
                $uid=$rs1["id"];
                $status=$rs1["status"];
                if(strlen($rs1["image"])>=3) $image=$rs1["image"];
                else $image="assets/noimage.png";
                
                echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                    <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                        <div class='row' style='width:100%'>
                            <div class='col-12 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                                <img src='$image' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Department</div><div class='text-small text-muted'>".$rs1["department_name"]."</div>
                            </div>
                            <div class='col-4 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Detail</div><div class='text-small text-muted'>".$rs1["department_detail"]."</div>
                            </div>
                            <div class='col-4 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Type</div><div class='text-small text-muted'>".$rs1["type"]."</div>
                            </div>
                            <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Status</div><div class='text-small text-muted'>$status</div>
                            </div>
                            <div class='col-4 col-md-2' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                    <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                    <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('departments_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">
                                        <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('departments_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype', 'offcanvasTop2')\">Edit</a>";
                                        if($status=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('departments_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                        else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('departments_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                        echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=departments_data&cid=$cid&delid=$uid&tbl=$sheba&utype=$utype', 'offcanvasTop')\">Delete</a>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>";
            } }

        }else{
            
            echo"<div class='row' style='width:100%'>";
                $s1 = "select * from departments order by department_name asc limit $lim";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $lastid=$rs1["id"];
                    $rand=rand(100,999);
                    
                    $uid=$rs1["id"];
                    $status=$rs1["status"];
                    // if($status==1) $status="ON";
                    // else $status="OFF";
                    if(strlen($rs1["image"])>=3) $image=$rs1["image"];
                    else $image="assets/noimage.png";

                    echo"<div class='col-12 col-md-4' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                        <div class='card mb-3'>
                            <div class='card-body mb-n5' style='padding:10px'>
                                <div class='d-flex align-items-center flex-column mb-5'>
                                    <div class='mb-5 d-flex align-items-center flex-column'>
                                        <div class='sw-13 position-relative mb-3'>
                                            <img src='$image' class='img-fluid rounded-xl' alt='$image' />
                                            <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px;margin-top:-50px'>
                                                <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                                    <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('departments_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">
                                                        <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('departments_process.php?cid=$cid&sheba=$sheba&mid=$uid&ctitle=$title&utype=$utype', 'offcanvasTop2')\">Edit</a>";
                                                        if($status=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('departments_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                                        else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('departments_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                                        echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=departments_data&cid=$cid&delid=$uid&tbl=$sheba&utype=$utype', 'offcanvasTop')\">Delete</a>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class='h5 mb-0'>".$rs1["department_name"]."</div>
                                        <div class='text-muted'>".$rs1["department_detail"]."<br>".$rs1["type"]."</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
                } }
            echo"</div>";

        }
    echo"</div>";