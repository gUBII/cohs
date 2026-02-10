<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>FAQ</h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                        <div class='row'>
                            <div class='col-md-6'>
                                <div class='mb-3'><label for='product_name' class='form-label'>FAQ Title</label>
                                    <input class='form-control' type='text' name='title' placeholder='Type here' value=''>
                                </div>
                            </div><div class='col-md-3'>
                                <div class='mb-3'><label for='product_name' class='form-label'>Sort Order</label>
                                    <input class='form-control' type='number' name='sorder' placeholder='Type here' value='1'>
                                </div>
                            </div><div class='col-md-3''><label class='form-label'>Status</label>
                                <select class='form-select' name='status' required=''><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                            </div>
                            <div class='col-md-9'>
                                <div class='mb-3'><label class='form-label'>FAQ Solution</label><textarea placeholder='Type here' class='form-control' name='solution'></textarea></div>
                            </div>
                            <div class='col-md-3' style='margin-top:25px'>
                                <div class='d-grid'>
                                    <button class='btn btn-primary' onblur=\"shiftdataV1('pages_faq', 'datashiftX')\">Save</button>
                                    <input type=hidden name=processor value='addfaq'></div>
                            </div>
                        </div>
                    </form>";
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