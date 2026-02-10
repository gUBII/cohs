<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-10 content-header'><h2 class='content-title'>Edit Brand</h2></div>
            <div class='col-md-2'><button class='btn btn-primary' onclick=\"shiftdataV1('brand_list', 'datashiftX')\">Add New</button></div>
        </div>
        
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>";
                if($uactype=="ADMIN"){
                    $s1 = "select * from brand where id='".$_GET["bid"]."' order by id asc limit 1";
                	$r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1x = $r1->fetch_assoc()) {
                        $datez=date("Y-m-d",$rs1x["date"]);
                        echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                            <div class='row'>";
                                
                                if(strlen($rs1x["image"])>="5") echo"<div class='col-md-12'><img src='".$rs1x["image"]."' style='height:200px'></div>";
                                
                                echo"<div class='col-md-4'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Brand Name</label>
                                        <input class='form-control' type='text' name='title' placeholder='Type here' value='".$rs1x["title"]."'>
                                    </div>
                                </div>
                                <div class='col-md-4'><label class='form-label'>Image File</label>
                                    <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                                </div>
                                <div class='col-md-2'>
                                    <div class='mb-3'><label for='product_name' class='form-label'>Sort Order</label>
                                        <input class='form-control' type='number' name='sorder' placeholder='Type here' value='".$rs1x["sorder"]."'>
                                    </div>
                                </div>
                                <div class='col-md-2'><label class='form-label'>Status</label>
                                    <select class='form-select' name='status' required=''>
                                        <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                                    </select>
                                </div>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label class='form-label'>Introduction</label><textarea placeholder='Type here' class='form-control' name='introduction'>".$rs1x["introduction"]."</textarea></div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='mb-3'><label class='form-label'>Detail</label><textarea placeholder='Type here' class='form-control' name='detail'>".$rs1x["detail"]."</textarea></div>
                                </div>
                                
                                <div class='col-md-2' style='margin-top:25px'>
                                    <div class='d-grid'><button class='btn btn-primary' onblur=\"shiftdataV1('brand_lists', 'taskset'); shiftdataV2('brand_edit.php?bid=".$rs1x["id"]."&sheba=brand_lists', 'datashiftX')\">Update</button>
                                    <input type=hidden name=processor value='updatebrand'><input type=hidden name=id value='".$rs1x["id"]."'>
                                </div>
                                </div>
                            </div>
                        </form>";
                    } }
                }
                echo"</div>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Brand Name</th><th>Introduction</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            include("brand_lists.php");
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>