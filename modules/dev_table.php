<?php
    include("../system/authenticator.php");

    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    
    
        // echo"$sheba, $utype, $title, $cid";
        
        if($cid=="1001"){
            $tty=0;            
            $s = "select * from departments order by department_name asc";
            $r = $conn->query($s);
            if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                $tty=($tty+1);                
                echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                    <div class='card-body mb-n2 border-last-none' style='width:100%;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px'>
                        <form name='form_$tty' method='post' action='./system/dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='processor' value='updatedepartment'><input type='hidden' name='id' value='".$rs["id"]."'>
                            <div class='row' style='width:100%'>
                                <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'><label>ID: </label><br>".$rs["id"]."</div>
                                <div class='col-12 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                    <label>Department Name: </label><br>
                                    <input type='text' name='department_name' value='".$rs["department_name"]."' class='form-control' style='padding:5px;width:100%' onchange='document.form_$tty.submit()'>
                                </div>

                                <div class='col-12 col-md-4' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                    <label>Department Detail: </label><br>
                                    <input type='text' name='department_detail' value='".$rs["department_detail"]."' class='form-control' style='padding:5px;width:100%' onchange='document.form_$tty.submit()'>
                                </div>
                                <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                    <label>Status: </label><br>".$rs["status"]."
                                </div>
                                <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:4px;margin-top:25px'>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('dev_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">";
                                            if($status=="ON") echo"<a class='dropdown-item' href='./system/dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('dev_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='./system/dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('dev_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../system/delete_records.php?processor=invoice_table&cid=$cid&delid=$uid&tbl=$sheba&utype=$utype', 'offcanvasTop')\">Delete</a>";                                
                                        echo"</div>
                                    </div>                            
                                </div>
                            </div>
                        </form>
                    </div>
                </div>";
            } }
        }
        if($cid=="1002"){
            $tty=0;            
            $s = "select * from designation order by designation asc";
            $r = $conn->query($s);
            if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                $tty=($tty+1);                
                echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                    <div class='card-body mb-n2 border-last-none' style='width:100%;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px'>
                        <form name='form_$tty' method='post' action='./system/dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='processor' value='updatedesignation'><input type='hidden' name='id' value='".$rs["id"]."'>
                            <div class='row' style='width:100%'>
                                <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'><label>ID: </label><br>".$rs["id"]."</div>
                                <div class='col-12 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                    <label>Designation/Role Name: </label><br>
                                    <input type='text' name='designation' value='".$rs["designation"]."' class='form-control' style='padding:5px;width:100%' onchange='document.form_$tty.submit()'>
                                </div>

                                <div class='col-12 col-md-4' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                    <label>Designation Detail: </label><br>
                                    <input type='text' name='designation_detail' value='".$rs["designation_detail"]."' class='form-control' style='padding:5px;width:100%' onchange='document.form_$tty.submit()'>
                                </div>
                                <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                    <label>Status: </label><br>".$rs["status"]."
                                </div>
                                <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:4px;margin-top:25px'>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('dev_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">";
                                            if($status=="ON") echo"<a class='dropdown-item' href='./system/dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('dev_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='./system/dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('dev_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../system/delete_records.php?processor=invoice_table&cid=$cid&delid=$uid&tbl=$sheba&utype=$utype', 'offcanvasTop')\">Delete</a>";                                
                                        echo"</div>
                                    </div>                            
                                </div>
                            </div>
                        </form>
                    </div>
                </div>";
            } }
        }

    echo"</div>";