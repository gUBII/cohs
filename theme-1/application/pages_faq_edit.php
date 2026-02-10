<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-10 content-header'><h2 class='content-title'>Edit FAQ</h2></div>
            <div class='col-md-2'><button class='btn btn-primary' onclick=\"shiftdataV1('pages_faq', 'datashiftX')\">Add New</button></div>
        </div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    $s1 = "select * from sms_faq where id='".$_GET["fid"]."' order by id asc limit 1";
                	$r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                        echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>FAQ Title</label>
                                        <input class='form-control' type='text' name='title' placeholder='Type here' value='".$rs1["title"]."'>
                                    </div>
                                </div><div class='col-md-3'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Sort Order</label>
                                        <input class='form-control' type='number' name='sorder' placeholder='Type here' value='".$rs1["sorder"]."'>
                                    </div>
                                </div><div class='col-md-3''><label class='form-label'>Status</label>
                                    <select class='form-select' name='status' required=''><option value='".$rs1["status"]."'>".$rs1["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                                </div>
                                <div class='col-md-9'>
                                    <div class='mb-3'><label class='form-label'>FAQ Solution</label><textarea placeholder='Type here' class='form-control' name='solution'>".$rs1["solution"]."</textarea></div>
                                </div>
                                <div class='col-md-3' style='margin-top:25px'>
                                    <div class='d-grid'>
                                        <button class='btn btn-primary' onblur=\"shiftdataV1('pages_faq', 'datashiftX')\">Update</button>
                                        <input type=hidden name=processor value='updatefaq'><input type=hidden name=id value='".$rs1["id"]."'>
                                    </div>
                                </div>
                            </div>
                        </form>";
                    }}
                }
                echo"</div>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Title & Solution</th><th>Sorting</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("pages_faq_list.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>