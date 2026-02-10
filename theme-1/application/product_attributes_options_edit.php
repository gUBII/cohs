<?php

    include("auth.php");

    echo"<div class='row'>
            <div class='col-md-8'><h4 class='content-title card-title'>Optons Editor</h2></div>
            <div class='col-md-4'><button class='btn btn-primary' onclick=\"shiftdataV1('product_attributes_options', 'datashiftX')\">Add New</button></div>
    </div><hr>

    <form method='post' name='categorysection' autocomplete='off' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
        if(isset($_GET["mid"])) $mid=$_GET["mid"];
        else $mid=0;
        if($_GET["mid"]!=0){
            $s1x = "select * from product_attribute where id='$mid' order by id asc limit 1";
            $r1x = $conn->query($s1x);
            if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                echo"<input type=hidden name='processor' value='updateattributeoption'><input type=hidden name='id' value='".$rs1x["id"]."'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Attribute Name</label>
                        <select class='form-select' name='catid' required=''>";
                            $s1z = "select * from product_attribute_cat where id='".$rs1x["catid"]."' and status='ON' order by name asc limit 1";
                            $r1z = $conn->query($s1z);
                            if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                echo"<option value='".$rs1z["id"]."'>".$rs1z["name"]."</option>";
                            } }
                            $s1y = "select * from product_attribute_cat where status='ON' order by name asc";
                            $r1y = $conn->query($s1y);
                            if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                echo"<option value='".$rs1y["id"]."'>".$rs1y["name"]."</option>";
                            } }
                        echo"</select>
                    </div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Option Name</label><input class='form-control' type='text' name='name' placeholder='Type here' value='".$rs1x["name"]."'></div>";
                    // <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Option Price</label><input class='form-control' type='text' name='price' placeholder='Type here' value='".$rs1x["price"]."'></div>
                    echo"<div class='col-md-6' style='margin-top:15px'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required=''>
                            <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                        </select>
                    </div>
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-12' style='margin-top:15px'>
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV1('product_attributes_options', 'datashiftX')\">Update</button> &nbsp;  
                        <button class='btn btn-light rounded font-md' type='reset'>Reset</button> &nbsp; 
                        <a href='dataprocessor.php?processor=deletetask&delid=".$rs1x["id"]."&tbl=product_attribute' target='dataprocessor'>
                            <button class='btn btn-danger rounded font-md' type='button' onblur=\"shiftdataV1('product_attributes_optons', 'datashiftX')\">Delete</button>
                        </a>
                    </div>
                </div>";
            } }
        }else{
            echo"<input type=hidden name='processor' value='addattributeoption'>
            <div style='padding:0px'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Attribute Name</label>
                        <select class='form-select' name='catid' required=''><option value=''>Select Attribute</opton>";
                            $tomtom=0;
                            $s1y = "select * from product_attribute_cat where status='ON' order by name asc";
                            $r1y = $conn->query($s1y);
                            if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) {
                                echo"<option value='".$rs1y["id"]."'>".$rs1y["name"]."</option>";
                            } }
                        echo"</select>
                    </div>    
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Option Name</label><input class='form-control' type='text' name='name' placeholder='Type here' value=''></div>";
                    // <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Option Price</label><input class='form-control' type='text' name='price' placeholder='Type here' value='0'></div>
                    echo"<div class='col-md-6' style='margin-top:15px'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required=''>
                            <option value='ON'>ON</option><option value='OFF'>OFF</option>
                        </select>
                    </div>
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-12' style='margin-top:15px'>
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV1('product_attributes_options', 'datashiftX')\">Save</button> &nbsp;  
                        <button class='btn btn-light rounded font-md' type='reset'>Reset</button>
                    </div>
                </div>
            </div>";
        }
    echo"</form>";
    
?>