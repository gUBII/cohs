<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-10 content-header'><h2 class='content-title'>Edit Designation</h2></div>
            <div class='col-md-2'><button class='btn btn-primary' onclick=\"shiftdataV1('user_designation_list', 'datashiftX')\">Add New</button></div>
        </div>
        
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    $s1 = "select * from designations where id='".$_GET["bid"]."' order by id asc limit 1";
                	$r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1x = $r1->fetch_assoc()) {
                        $datez=date("Y-m-d",$rs1x["date"]);
                        echo"<form method='post' action='user_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                            <div class='row'>";
                                
                                echo"<div class='col-md-4'><div class='mb-3'><label for='product_name' class='form-label'>Designation</label>
                                    <input class='form-control' type='text' name='title' placeholder='Type here' value='".$rs1x["title"]."'>
                                </div></div>
                                <div class='col-md-2'><div class='mb-3'><label class='form-label'>Detail</label>
                                    <select class='form-select' name='status' required=''><option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                                </div></div>
                                <div class='col-md-6'><div class='mb-3'><label class='form-label'>Detail</label>
                                    <textarea placeholder='Type here' class='form-control' name='detail'>".$rs1x["detail"]."</textarea>
                                </div></div>
                                <div class='col-md-2' style='margin-top:25px'><div class='d-grid'>
                                    <div class='d-grid'><button class='btn btn-primary' onblur=\"shiftdataV1('user_designation_list', 'taskset'); shiftdataV2('user_designation.php?bid=".$rs1x["id"]."&sheba=user_designation_list', 'datashiftX')\">Update</button>
                                    <input type=hidden name=processor value='updatedesignation'><input type=hidden name=id value='".$rs1x["id"]."'>
                                </div></div>
                            </div>
                        </form>";
                    } }
                }
                echo"</div>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Designation</th><th>Detail</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("user_designation_list.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>