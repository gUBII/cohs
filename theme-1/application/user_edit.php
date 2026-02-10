<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-10 content-header'><h2 class='content-title'>Edit User</h2></div>
            <div class='col-md-2'><button class='btn btn-primary' onclick=\"shiftdataV2('user_list.php?blist=1', 'datashiftX')\">Add New</button></div>
        </div>
        
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    $s1 = "select * from sms_user2 where id='".$_GET["uid"]."' order by id asc limit 1";
                	$r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1x = $r1->fetch_assoc()) {
                        $datez=date("Y-m-d",$rs1x["date"]);
                        echo"<form method='post' action='user_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                            <div class='row'>";
                                
                                if(strlen($rs1x["image"])>="5") echo"<div class='col-md-12'><img src='".$rs1x["image"]."' style='height:200px'></div>";
                                
                                echo"<div class='col-md-4'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>First Name</label>
                                        <input class='form-control' type='text' name='name' placeholder='Type here' value='".$rs1x["name"]."'>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Last Name</label>
                                        <input class='form-control' type='text' name='name2' placeholder='Type here' value='".$rs1x["name2"]."'>
                                    </div>
                                </div>
                                <div class='col-md-4'><label class='form-label'>Image File</label>
                                    <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Email Address</label>
                                        <input class='form-control' type='text' name='email' placeholder='Type here' value='".$rs1x["email"]."'>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Phone</label>
                                        <input class='form-control' type='text' name='phone' placeholder='Type here' value='".$rs1x["phone"]."'>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Date of Birth</label>
                                        <input class='form-control' type='date' name='dob' placeholder='Type here' value='$dobx'>
                                    </div>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Status</label>
                                    <select class='form-select' name='status' required=''>
                                    <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-4'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Address</label>
                                        <input class='form-control' type='text' name='address' placeholder='Type here' value='".$rs1x["address"]."'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>City</label>
                                        <input class='form-control' type='text' name='city' placeholder='Type here' value='".$rs1x["city"]."'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>State</label>
                                        <input class='form-control' type='text' name='state' placeholder='Type here' value='".$rs1x["state"]."'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Zip/Postal Code</label>
                                        <input class='form-control' type='text' name='zip' placeholder='Type here' value='".$rs1x["zip"]."'>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Country</label>
                                        <input class='form-control' type='text' name='country' placeholder='Type here' value='".$rs1x["country"]."'>
                                    </div>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Login Userid</label>
                                        <input class='form-control' type='text' name='user_id' placeholder='Type here' value='".$rs1x["user_id"]."' readonly>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Password</label>
                                        <input class='form-control' type='password' name='pass' placeholder='Type here' value='".$rs1x["pass"]."'>
                                    </div>
                                </div>
                                
                                <div class='col-md-2'><label class='form-label'>Department</label>
                                    <select class='form-select' name='department' required=''>";
                                        $s2z = "select * from departments where id='".$rs1x["department"]."' order by title asc limit 1";
                                        $r2z = $conn->query($s2z);
                                        if ($r2z->num_rows > 0) { while($rs2z = $r2z->fetch_assoc()) { echo"<option value='".$rs2z["id"]."'>".$rs2z["title"]."</option>"; } }
                                        $s1z = "select * from departments where status='ON' order by title asc";
                                        $r1z = $conn->query($s1z);
                                        if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) { echo"<option value='".$rs1z["id"]."'>".$rs1z["title"]."</option>"; } }
                                    echo"</select>
                                </div>
                                <div class='col-md-2'><label class='form-label'>Designation</label>
                                    <select class='form-select' name='designation' required=''>";
                                        
                                        $s2y = "select * from designations where id='".$rs1x["designation"]."' order by title asc limit 1";
                                        $r2y = $conn->query($s2y);
                                        if ($r2y->num_rows > 0) { while($rs2y = $r2y->fetch_assoc()) { echo"<option value='".$rs2y["id"]."'>".$rs2y["title"]."</option>"; } }
                                        
                                        $s1y = "select * from designations where status='ON' order by title asc";
                                        $r1y = $conn->query($s1y);
                                        if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) { echo"<option value='".$rs1y["id"]."'>".$rs1y["title"]."</option>"; } }
                                    echo"</select>
                                </div>
                                <div class='col-md-2'><label class='form-label'>Account Type</label>
                                    <select class='form-select' name='actype' required=''>
                                        <option value='".$rs1x["actype"]."'>".$rs1x["actype"]."</option><option value='USER'>USER</option><option value='ADMIN'>ADMIN</option>
                                    </select>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-12'>
                                    <div class='mb-3'><label class='form-label'>About</label><textarea placeholder='Type here' class='form-control' name='about'></textarea></div>
                                </div>
                                <div class='col-md-2' style='margin-top:25px'>
                                    <div class='d-grid'><button class='btn btn-primary' onblur=\"shiftdataV1('user_lists', 'taskset'); shiftdataV1('user_list', 'datashiftX')\">Update</button>
                                    <input type=hidden name=processor value='updateuser'><input type=hidden name=id value='".$rs1x["id"]."'>
                                </div>
                            </div>
                        </form>";
                    } }
                }
                echo"</div>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>User ID</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("user_lists.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>