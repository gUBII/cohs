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
    
    if(isset($_GET["status"])) $status=$_GET["status"];
    else $status=1;
    
    echo"<div class='card-body' style='width:100%;'>";
    /*
        if($viewmode=="LIST"){
            echo"<h4>Staff Managed Categories</h4>";
            $s1 = "select * from modules where parent='5276' and status='$status' order by name asc limit $lim";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $categoryname=$rs1["name"];
                $parentname="";
                $d1 = "select * from modules where id='".$rs1["parent"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $parentname=$d3["name"]; } }
                
                $ta=0;
                $ts=0;
                $d1x = "select * from global_documents where categoryid='".$rs1["id"]."' order by id asc";
                $d2x = $conn->query($d1x);
                if ($d2x->num_rows > 0) { while($d3x = $d2x->fetch_assoc()) {
                    if($d3x["status"]==1) $ta=($ta+1);
                    else $ts=($ts+1);
                } }
                
                echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                    <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                        <div class='row' style='width:100%'>
                            <div class='col-6 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>".$rs1["name"]."</div>
                            </div>
                            <div class='col-6 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>$parentname</div>
                            </div>
                            <div class='col-5 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Active Documents</div><div class='text-small text-muted'>$ta</div>
                            </div>
                            <div class='col-5 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                <div>Suspended Documents</div><div class='text-small text-muted'>$ts</div>
                            </div>
                            <div class='col-2 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                    <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>";
                                    echo"<div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype', 'datatableX')\">
                                        <a class='dropdown-item' style='cursor: pointer' href='index.php?url=document_manager.php&id=62&categoryid=".$rs1["id"]."'>View Documents</a>";
                                        if($designationy==13) {
                                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('document_category.php?cid=".$rs1["id"]."&ctitle=Document Manager&empid=$empid', 'offcanvasRight')\">Edit</a>";
                                            if($rs1["status"]==1) echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=0&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Activate</a>";
                                            // echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=document_data&cidx=$cid&delidx=".$rs1["id"]."&tblx=$sheba&sourceidx=id&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'offcanvasTop')\" onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Delete</a>";
                                        }
                                    echo"</div>";
                                echo"</div>
                            </div>
                        </div>
                    </div>
                </div>";
            } }
            
            if($mtype=="ADMIN"){
                echo"<br><hr><h4>Admin Managed Categories</h4>";
                $s1 = "select * from modules where parent='5275' and status='$status' order by name asc limit $lim";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $categoryname=$rs1["name"];
                    $parentname="";
                    $d1 = "select * from modules where id='".$rs1["parent"]."' order by id asc limit 1";
                    $d2 = $conn->query($d1);
                    if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $parentname=$d3["name"]; } }
                    
                    $ta=0;
                    $ts=0;
                    $d1x = "select * from global_documents where categoryid='".$rs1["id"]."' order by id asc";
                    $d2x = $conn->query($d1x);
                    if ($d2x->num_rows > 0) { while($d3x = $d2x->fetch_assoc()) {
                        if($d3x["status"]==1) $ta=($ta+1);
                        else $ts=($ts+1);
                    } }
                    
                    echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                        <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                            <div class='row' style='width:100%'>
                                <div class='col-6 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>".$rs1["name"]."</div>
                                </div>
                                <div class='col-6 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>$parentname</div>
                                </div>
                                <div class='col-5 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Active Documents</div><div class='text-small text-muted'>$ta</div>
                                </div>
                                <div class='col-5 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                    <div>Suspended Documents</div><div class='text-small text-muted'>$ts</div>
                                </div>
                                <div class='col-2 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>";
                                        echo"<div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' href='index.php?url=document_manager.php&id=62&categoryid=".$rs1["id"]."'>View Documents</a>";
                                            if($designationy==13) {
                                                echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('document_category.php?cid=".$rs1["id"]."&ctitle=Document Manager&empid=$empid', 'offcanvasRight')\">Edit</a>";
                                                if($rs1["status"]==1) echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=0&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Suspend</a>";
                                                else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Activate</a>";
                                                // echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=document_data&cidx=$cid&delidx=".$rs1["id"]."&tblx=$sheba&sourceidx=id&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'offcanvasTop')\" onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Delete</a>";
                                            }
                                        echo"</div>";
                                    echo"</div>
                                </div>
                            </div>
                        </div>
                    </div>";
                } }
            }

        }else{
    */        
            echo"<div class='row' style='width:100%'><h4>Staff Managed Categories</h4>";
                
                if(isset($_GET["empid"])) $empid=$_GET["empid"];
                else $empid=0;
                
                $s1 = "select * from modules where parent='5276' and status='$status' order by name asc limit $lim";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $categoryname=$rs1["name"];
                    $parentname="";
                    $d1 = "select * from modules where id='".$rs1["parent"]."' order by id asc limit 1";
                    $d2 = $conn->query($d1);
                    if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $parentname=$d3["name"]; } }
                    
                    $ta=0;
                    $ts=0;
                    if($mtype=="ADMIN"){
                        if($empid!=0){
                            $d1x = "select * from global_documents where employeeid='$empid' and categoryid='".$rs1["id"]."' order by id asc";
                        }else{
                            $d1x = "select * from global_documents where categoryid='".$rs1["id"]."' order by id asc";
                        }
                    }else{
                        $d1x = "select * from global_documents where employeeid='$userid' and categoryid='".$rs1["id"]."' order by id asc";
                    }
                    $d2x = $conn->query($d1x);
                    if ($d2x->num_rows > 0) { while($d3x = $d2x->fetch_assoc()) {
                        if($d3x["status"]=="ON") $ta=($ta+1);
                        else $ts=($ts+1);
                    } }
                    echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                            <div class='card mb-3'>
                                <div class='card-body mb-n5' style='padding:10px'>
                                    <div class='d-flex align-items-left flex-column mb-5'>
                                        <div class='mb-5 d-flex align-items-left flex-column'><br>
                                            <div class='h5 mb-0' style='height:40px'>".$rs1["name"]."</div><hr>
                                            <div class='text-small text-muted'>$parentname</div><hr>
                                            <div class='text-small text-muted'>Total Documents - $ta</div>
                                        </div>
                                        <div class='d-flex flex-row justify-content-between w-100 w-sm-100 w-xl-100'><center>
                                            <a class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer;margin-right:10px' href='index.php?url=document_manager.php&id=62&categoryid=".$rs1["id"]."&empid=$empid&pinter=1'><span><i class='fa fa-eye'></i></span></a>";
                                            if($mtype=="ADMIN") {
                                                echo"<a class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer;margin-right:10px' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('document_category.php?cid=".$rs1["id"]."&ctitle=Document Manager&empid=$empid', 'offcanvasRight')\"><i class='fa fa-edit'></i></a>";
                                                if($rs1["status"]==1) echo"<a class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer;margin-right:10px' href='dataprocessor_1.php?processor=StatusSuspend&status=0&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\"><i class='fa fa-remove'></i></a>";
                                                else echo"<a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer;margin-right:10px' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\"><i class='fa fa-check'></i></a>";
                                                // echo"<a class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer;margin-right:10px' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=document_data&cidx=$cid&delidx=".$rs1["id"]."&tblx=$sheba&sourceidx=id&empid=$empid', 'offcanvasTop')\" onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Delete</a>";
                                            }
                                        echo"</center></div>
                                    </div>                             
                                </div>
                            </div>
                    </div>";
                    
                } }
            echo"</div>";
            
            if($mtype=="ADMIN" && $empid==0){
                echo"<br><hr><div class='row' style='width:100%'><h4>Admin Managed Categories</h4>";
                    $s1 = "select * from modules where parent='5275' and status='$status' order by name asc limit $lim";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                        $categoryname=$rs1["name"];
                        $parentname="";
                        $d1 = "select * from modules where id='".$rs1["parent"]."' order by id asc limit 1";
                        $d2 = $conn->query($d1);
                        if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $parentname=$d3["name"]; } }
                    
                        echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                <div class='card mb-3'>
                                    <div class='card-body mb-n5' style='padding:10px'>
                                        <div class='d-flex align-items-left flex-column mb-5'>
                                            <div class='mb-5 d-flex align-items-left flex-column'><br>
                                                <div class='h5 mb-0' style='height:40px'>".$rs1["name"]."</div><hr>
                                                <div class='text-small text-muted'>$parentname</div>
                                            </div>
                                            <div class='d-flex flex-row justify-content-between w-100 w-sm-100 w-xl-100'><center>
                                                <a class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer style='margin-right:10px'' href='index.php?url=document_manager.php&id=62&categoryid=".$rs1["id"]."'><i class='fa fa-eye'></i></a>
                                                <a class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer style='margin-right:10px'' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('document_category.php?cid=".$rs1["id"]."&ctitle=Document Manager&empid=$empid', 'offcanvasRight')\"><i class='fa fa-edit'></i></a>";
                                                if($rs1["status"]==1) echo"<a class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer style='margin-right:10px'' href='dataprocessor_1.php?processor=StatusSuspend&status=0&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\"><i class='fa fa-remove'></i></a>";
                                                else echo"<a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer style='margin-right:10px'' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=modules&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\"><i class='fa fa-check'></i></a>";
                                                // echo"<a class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer style='margin-right:10px'' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=document_data&cidx=$cid&delidx=".$rs1["id"]."&tblx=$sheba&sourceidx=id&empid=$empid', 'offcanvasTop')\" onblur=\"shiftdataV2('document_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&mtype=$mtype&empid=$empid', 'datatableX')\">Delete</a>";
                                            echo"</center></div>
                                        </div>                             
                                    </div>
                                </div>
                        </div>";
                        
                    } }
                echo"</div>";
            }
    //    }
    echo"</div>";