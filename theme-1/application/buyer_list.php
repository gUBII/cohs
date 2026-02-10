<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-10 content-header'><h2 class='content-title'>BUYERS</h2></div>
            <div class='col-md-2'><button class='btn btn-primary' onclick=\"shiftdataV2('buyer_list.php?blist=1', 'datashiftX')\">Add New</button></div>
        </div>
        <div class='card'>
            <div class='card-body'>";
                if($_GET["blist"]==1){
                    echo"<div class='row gx-5'>";
                    if($uactype=="ADMIN"){
                        
                        echo"<form method='post' action='user_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                            <div class='row'>
                                <div class='col-md-4'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>First Name</label>
                                        <input class='form-control' type='text' name='name' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-4'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Last Name</label>
                                        <input class='form-control' type='text' name='name2' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-4'><label class='form-label'>Image File</label>
                                    <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Email Address</label>
                                        <input class='form-control' type='text' name='email' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Phone</label>
                                        <input class='form-control' type='text' name='phone' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Date of Birth</label>
                                        <input class='form-control' type='date' name='dob' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-3'><label class='form-label'>Status</label>
                                    <select class='form-select' name='status' required=''><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-4'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Address</label>
                                        <input class='form-control' type='text' name='address' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>City</label>
                                        <input class='form-control' type='text' name='city' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>State</label>
                                        <input class='form-control' type='text' name='state' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Zip/Postal Code</label>
                                        <input class='form-control' type='text' name='zip' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Country</label>
                                        <input class='form-control' type='text' name='country' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Login Userid</label>
                                        <input class='form-control' type='text' name='user_id' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Password</label>
                                        <input class='form-control' type='password' name='pass' placeholder='Type here' value=''>
                                    </div>
                                </div>
                                <input class='form-control' type='hidden' name='departments' value='0'>
                                <input class='form-control' type='hidden' name='designation' value='0'>
                                <input class='form-control' type='hidden' name='actype' value='BUYER'>
                                
                                <div class='col-md-12'><hr></div>
                                <div class='col-md-12'>
                                    <div class='mb-3'><label class='form-label'>About</label><textarea placeholder='Type here' class='form-control' name='about'></textarea></div>
                                </div>
                                <div class='col-md-2' style='margin-top:25px'>
                                    <div class='d-grid'><button type=submit class='btn btn-primary' onblur=\"shiftdataV1('buyer_lists', 'taskset')\">Save</button>
                                    <input type=hidden name=processor value='adduser'></div>
                                </div>
                                <div class='col-md-2' style='margin-top:25px'>
                                    <div class='d-grid'><button type=button class='btn btn-success' onclick=\"shiftdataV1('buyer_list', 'datashiftX')\">Close</button>
                                </div>
                                <div class='col-md-12'><hr></div>
                            </div>
                        </form>";
                    }
                    echo"</div>";
                }
                echo"<div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>User ID</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("buyer_lists.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>