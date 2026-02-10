<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>BLOG</h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                        <div class='row'>
                            <div class='col-md-3'><label class='form-label'>Blog Category</label>
                                <select class='form-select' name='bid' required=''>";
                                    $s1z = "select * from sms_link where des1='TOP BLOG CATEGORY' order by sorder asc";
                                    $r1z = $conn->query($s1z);
                                    if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                        echo"<option value='".$rs1z["id"]."'>".$rs1z["pam"]."</option>";
                                        $s1za = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                        $r1za = $conn->query($s1za);
                                        if ($r1za->num_rows > 0) { while($rs1za = $r1za->fetch_assoc()) {
                                            echo"<option value='".$rs1za["id"]."'>&nbsp;&nbsp; - ".$rs1za["pam"]."</option>";
                                            $s1zb = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                            $r1zb = $conn->query($s1zb);
                                            if ($r1zb->num_rows > 0) { while($rs1zb = $r1zb->fetch_assoc()) {
                                                echo"<option value='".$rs1zb["id"]."'>&nbsp;&nbsp;&nbsp;&nbsp; - ".$rs1zb["pam"]."</option>";
                                            } }
                                        } }
                                    } }
                                echo"</select>
                            </div>
                            <div class='col-md-9'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Blog Title</label>
                                    <input class='form-control' type='text' name='title' placeholder='Type here' value=''>
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='mb-3'><label class='form-label'>Introduction</label><textarea placeholder='Type here' class='form-control' name='introduction'></textarea></div>
                            </div>
                            <div class='col-md-12'>
                                <div class='mb-3'><label class='form-label'>Detail</label><textarea placeholder='Type here' class='form-control' name='detail'></textarea></div>
                            </div>
                            <div class='col-md-4'><label class='form-label'>Image File</label>
                                <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                            </div>
                            <div class='col-md-4'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Sort Order</label>
                                    <input class='form-control' type='number' name='sorder' placeholder='Type here' value='1'>
                                </div>
                            </div>
                            <div class='col-md-4'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Date</label>
                                    <input class='form-control' type='date' name='date' placeholder='Type here' value=''>
                                </div>
                            </div>
                            <div class='col-md-4'><label class='form-label'>Status</label>
                                <select class='form-select' name='status' required=''><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                            </div>
                            <div class='col-md-6'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Author</label>
                                    <input class='form-control' type='text' name='author' placeholder='Type here' value=''>
                                </div>
                            </div>
                            <div class='col-md-2' style='margin-top:25px'>
                                <div class='d-grid'><button class='btn btn-primary' onblur=\"shiftdataV1('pages_blog_lists', 'taskset')\">Save</button><input type=hidden name=processor value='addblog'></div>
                            </div>
                        </div>
                    </form>";
                }
                echo"</div>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Date</th><th>Title</th><th>Author</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("pages_blog_lists.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>