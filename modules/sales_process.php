<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    
    include("../authenticator.php");
    
    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close' onclick=\"shiftdataV2('sales_data.php?cid=$cid&sheba=$sheba', 'datatableX')\"></button>
    </div>
    <div class='offcanvas-body'>
        <div>";
            if(isset($_GET["pno"]) and isset($_GET["pid"]) and isset($_GET["pfrom"]) and $_GET["pno"]!=0){
                echo"<div>";
                    $ctime=time();
                    $pdate=date("Y-m-d",$ctime);
                    $rc1 = "select * from sales_voucher where proj_id='".$_GET["pid"]."' and sold_to='".$_GET["pfrom"]."' and sales_no='".$_GET["pno"]."' order by sales_no asc limit 1";
                    $rc2 = $conn->query($rc1);
                    if ($rc2->num_rows > 0) { while($rc3 = $rc2->fetch_assoc()) {
                        $salesno=$rc3["sales_no"];
                        $pdate=date("Y-m-d",$rc3["sales_date"]);
                        $invoiceno=$rc3["invoice_no"];
                        $qty=$rc3["qty"];
                        $amt=$rc3["dr_amt"];
                        $note=$rc3["narration"];
                        $productid="";
                        $s1c = "select * from product where productid='".$rc3["product_id"]."' order by productid desc limit 1";
                        $r1c = $conn->query($s1c);
                        if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) {
                            $productid="<option value='".$rs1c["productid"]."'>".$rs1c["product_name"]." Q:".$rs1c["qty"].", P:".$rs1c["p_price"]." - (".$rs1c["size"].", ".$rs1c["weight"].", ".$rs1c["color"].", ".$rs1c["material"].",".$rs1c["capacity"].", ".$rs1c["flavor"].", ".$rs1c["style"].", ".$rs1c["bundles"].", ".$rs1c["modal"].", ".$rs1c["age"].", ".$rs1c["gender"].", ".$rs1c["genetic"].")</option>";
                        } }
                        $ledgerid="";
                        $tomtom=0;
                        $s1bd = "select * from accounts_ledger where id='".$rc3["ledger_id"]."' and status='ON' order by ledger_name asc limit 1";
                        $r1bd = $conn->query($s1bd);
                        if ($r1bd->num_rows > 0) { while($rs1bd = $r1bd->fetch_assoc()) {
                            $ledgerid="<option value='".$rs1bd["id"]."'>".$rs1bd["ledger_name"]."</option>";
                            $tomtom=1;
                        }}
                        if($tomtom==0){
                            $s1be = "select * from sub_ledger where id='".$rc3["ledger_id"]."' order by sub_ledger asc";
                            $r1be = $conn->query($s1be);
                            if ($r1be->num_rows > 0) { while($rs1be = $r1be->fetch_assoc()) {                                        
                                $ledgerid="<option value='".$rs1be["id"]."'>".$rs1be["sub_ledger"]."</option>";
                            } }
                        }
                        $vendorid="";
                        $s1c = "select * from uerp_user where id='".$rc3["sold_to"]."' order by id desc limit 1";
                        $r1c = $conn->query($s1c);
                        if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) {
                            $vendorid="<option value='".$rs1c["id"]."'>".$rs1c["store_name"]." (".$rs1c["username"]." ".$rs1c["username2"].")</option>";
                        } }
                        $projectid="";
                        $s1c = "select * from project where id='".$rc3["proj_id"]."' order by id desc limit 1";
                        $r1c = $conn->query($s1c);
                        if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) {
                            $projectid="<option value='".$rs1c["id"]."'>".$rs1c["name"]."</option>";
                        } }
                        $status="<option value='".$rc3["status"]."'>".$rc3["status"]."</option>";
                    } }
                
                    echo"<form method='post' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom'>
                        <input type=hidden name='processor' value='edit_sales_voucher'><input type=hidden name='user_id' value='$userid'>
                        <div class='row'>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Sales No.</label><input class='form-control' type='text' name='sales_no' required='' placeholder='Type here' readonly value='$salesno'></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Date</label><input class='form-control' type='date' name='sales_date' required='' placeholder='Type here' value='$pdate'></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Invoice No.</label><input class='form-control' type='text' name='invoice_no' placeholder='Type here' value='$invoiceno' required=''></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>A/c Ledger</label>
                                <select class='form-select' name='ledger_id' required='' >";
                                    $s1bd = "select * from ledger_group where id='$sales_v' and status='ON' order by id asc limit 1";
                                    $r1bd = $conn->query($s1bd);
                                    if ($r1bd->num_rows > 0) { while($rs1bd = $r1bd->fetch_assoc()) {
                                        echo"<option value='".$rs1bd["id"]."'>".$rs1bd["group_name"]."</option>";
                                    } } 
                                echo"</select>
                            </div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Vendor/Supplier Name</label>
                                <select class='form-select' name='sold_to' required=''>$vendorid";
                                    $e2 = "select * from uerp_user where mtype='VENDOR' and status='1' or mtype='SUPPLIER' and status='1' order by username asc";
                                    $f2 = $conn->query($e2);
                                    if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                        echo"<option value='".$g2["id"]."'>".$g2["store_name"]." (".$g2["username"]." ".$g2["username2"].")</option>";
                                    } }
                                echo"</select>
                            </div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Project Name</label>
                                <select class='form-select' name='proj_id' required='' >";
                                    $e2 = "select * from project where status='1' order by name asc";
                                    $f2 = $conn->query($e2);
                                    if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) { echo"<option value='".$g2["id"]."'>".$g2["name"]."</option>"; } }
                                echo"</select>
                            </div>
                            
                            <div class='col-4' style='margin-top:15px'><label class='form-label'>Product Name</label>
                                <select class='form-select' name='product_id' required='' >";
                                    $e2 = "select * from product where status='ON' order by product_name asc";
                                    $f2 = $conn->query($e2);
                                    if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                        echo"<option value='".$g2["productid"]."'>".$g2["product_name"]." Q:".$g2["qty"].", P:".$g2["p_price"]." - (".$g2["size"].", ".$g2["weight"].", ".$g2["color"].", ".$g2["material"].",".$g2["capacity"].", ".$g2["flavor"].", ".$g2["style"].", ".$g2["bundles"].", ".$g2["modal"].", ".$g2["age"].", ".$g2["gender"].", ".$g2["genetic"].")</option>";
                                    } }
                                echo"</select>
                            </div>
                            <div class='col-3' style='margin-top:15px'><label class='form-label'>Note</label><input class='form-control' type='text' name='note' placeholder='Type here' min-value='1' value='$note' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Quantity</label><input class='form-control' type='number' name='quantity' placeholder='Type here' min-value='1' value='$qty' ></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Amount</label><input class='form-control' type='number' name='amount' placeholder='Type here' min-value='1' value='$amt' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Status</label>
                                <select class='form-select' name='status' required=''>$status";
                                    echo"<option value='ON'>ON</option><option value='OFF'>OFF</option>";
                                echo"</select>
                            </div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Add to List</label><button style='width:100%' class='btn btn-primary' type='submit' onblur=\"shiftdataV2('sales_multi_edit.php?pid=$salesno&sheba=sales_voucher', 'datatableXX')\">ADD</button></div>
                        </div>
                    </form>
                    <div class='data-table-rows slim col-md-12' id='sample'>
                        <div class='data-table-responsive-wrapper'><hr>
                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                                <thead><tr>
                                    <th align=left>Date <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th align=left>Product Name <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th align=left>Note <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th align=center>Qty <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th style='text-align:right'>Amount <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th></th>                     
                                </tr></thead>
                                <tbody id='datatableXX'>";
                                    include 'sales_multi_edit.php';
                                echo"</tbody>
                            </table>
                        </div>
                    </div>
                </div>";
                
            }else{
                echo"<div>";
                    $salesno=100000;
                    $invoiceno=100000;
                    $ctime=time();
                    $pdate=date("Y-m-d",$ctime);
                    $rc1 = "select * from sales_voucher where user_id='$userid' order by sales_no desc limit 1";
                    $rc2 = $conn->query($rc1);
                    if ($rc2->num_rows > 0) { while($rc3 = $rc2->fetch_assoc()) {
                        if($rc3["order_status"]==0){
                            $salesno=$rc3["sales_no"];
                            $pdate=date("Y-m-d",$rc3["sales_date"]);
                            $invoiceno=$rc3["invoice_no"];
                            $qty=$rc3["qty"];
                            $amt=$rc3["cr_amt"];
                            $note=$rc3["narration"];
                            $productid="";
                            $s1c = "select * from product where productid='".$rc3["product_id"]."' order by productid desc limit 1";
                            $r1c = $conn->query($s1c);
                            if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) {
                                $productid="<option value='".$rs1c["productid"]."'>".$rs1c["product_name"]." Q:".$rs1c["qty"].", P:".$rs1c["p_price"]." - (".$rs1c["size"].", ".$rs1c["weight"].", ".$rs1c["color"].", ".$rs1c["material"].",".$rs1c["capacity"].", ".$rs1c["flavor"].", ".$rs1c["style"].", ".$rs1c["bundles"].", ".$rs1c["modal"].", ".$rs1c["age"].", ".$rs1c["gender"].", ".$rs1c["genetic"].")</option>";
                            } }
                            $ledgerid="";
                            $tomtom=0;
                            $s1bd = "select * from accounts_ledger where id='".$rc3["ledger_id"]."' and status='ON' order by ledger_name asc limit 1";
                            $r1bd = $conn->query($s1bd);
                            if ($r1bd->num_rows > 0) { while($rs1bd = $r1bd->fetch_assoc()) {
                                $ledgerid="<option value='".$rs1bd["id"]."'>".$rs1bd["ledger_name"]."</option>";
                                $tomtom=1;
                            }}
                            if($tomtom==0){
                                $s1be = "select * from sub_ledger where id='".$rc3["ledger_id"]."' order by sub_ledger asc";
                                $r1be = $conn->query($s1be);
                                if ($r1be->num_rows > 0) { while($rs1be = $r1be->fetch_assoc()) {                                        
                                    $ledgerid="<option value='".$rs1be["id"]."'>".$rs1be["sub_ledger"]."</option>";
                                } }
                            }
                            $vendorid="";
                            $s1c = "select * from uerp_user where id='".$rc3["sold_to"]."' order by id desc limit 1";
                            $r1c = $conn->query($s1c);
                            if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) {
                                $vendorid="<option value='".$rs1c["id"]."'>".$rs1c["store_name"]." (".$rs1c["username"]." ".$rs1c["username2"].")</option>";
                            } }
                            $projectid="";
                            $s1c = "select * from project where id='".$rc3["proj_id"]."' order by id desc limit 1";
                            $r1c = $conn->query($s1c);
                            if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) {
                                $projectid="<option value='".$rs1c["id"]."'>".$rs1c["name"]."</option>";
                            } }
                            $status="<option value='".$rc3["status"]."'>".$rc3["status"]."</option>";
                        }else{
                            $salesno=($rc3["sales_no"]+1);
                            
                            $pdate=date("Y-m-d",time());
                            $invoiceno="";
                            $qty=1;
                            $amt=0;
                            $note="";
                            $productid="<option value=''>Select Product</option>";
                            $ledgerid="<option value=''>Select Ledger</option>";
                            $vendorid="<option value=''>Select Vendor/Supplier</option>";
                            $projectid="<option value=''>Select Project</option>";
                            $status="<option value='ON'>ON</option>";
                        }
                    } }
                
                    echo"<form method='post' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom'>
                        <input type=hidden name='processor' value='new_sales_voucher'><input type=hidden name='user_id' value='$userid'>
                        <div class='row'>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Sales No.</label><input class='form-control' type='text' name='sales_no' required='' placeholder='Type here' readonly value='$salesno'></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Date</label><input class='form-control' type='date' name='sales_date' required='' placeholder='Type here' value='$pdate'></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Invoice No.</label><input class='form-control' type='text' name='invoice_no' placeholder='Type here' value='$invoiceno' required=''></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>A/c Ledger</label>
                                <select class='form-select' name='ledger_id' required='' >";
                                    $s1bd = "select * from ledger_group where id='$sales_v' and status='ON' order by id asc limit 1";
                                    $r1bd = $conn->query($s1bd);
                                    if ($r1bd->num_rows > 0) { while($rs1bd = $r1bd->fetch_assoc()) {
                                        echo"<option value='".$rs1bd["id"]."'>".$rs1bd["group_name"]."</option>";
                                    } }
                                echo"</select>
                            </div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Vendor/Supplier Name</label>
                                <select class='form-select' name='sold_to' required=''>$vendorid";
                                    $e2 = "select * from uerp_user where mtype='VENDOR' and status='1' or mtype='SUPPLIER' and status='1' order by username asc";
                                    $f2 = $conn->query($e2);
                                    if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                        echo"<option value='".$g2["id"]."'>".$g2["store_name"]." (".$g2["username"]." ".$g2["username2"].")</option>";
                                    } }
                                echo"</select>
                            </div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Project Name</label>
                                <select class='form-select' name='proj_id' required='' >$projectid";
                                    $e2 = "select * from project where status='1' order by name asc";
                                    $f2 = $conn->query($e2);
                                    if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) { echo"<option value='".$g2["id"]."'>".$g2["name"]."</option>"; } }
                                echo"</select>
                            </div>
                            
                            <div class='col-4' style='margin-top:15px'><label class='form-label'>Product Name</label>
                                <select class='form-select' name='product_id' required='' >$productid";
                                    $e2 = "select * from product where status='ON' order by product_name asc";
                                    $f2 = $conn->query($e2);
                                    if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                        echo"<option value='".$g2["productid"]."'>".$g2["product_name"]." Q:".$g2["qty"].", P:".$g2["p_price"]." - (".$g2["size"].", ".$g2["weight"].", ".$g2["color"].", ".$g2["material"].",".$g2["capacity"].", ".$g2["flavor"].", ".$g2["style"].", ".$g2["bundles"].", ".$g2["modal"].", ".$g2["age"].", ".$g2["gender"].", ".$g2["genetic"].")</option>";
                                    } }
                                echo"</select>
                            </div>
                            <div class='col-3' style='margin-top:15px'><label class='form-label'>Note</label><input class='form-control' type='text' name='note' placeholder='Type here' min-value='1' value='$note' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Quantity</label><input class='form-control' type='number' name='quantity' placeholder='Type here' min-value='1' value='$qty' ></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Amount</label><input class='form-control' type='number' name='amount' placeholder='Type here' min-value='1' value='$amt' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Status</label>
                                <select class='form-select' name='status' required=''>$status";
                                    echo"<option value='ON'>ON</option><option value='OFF'>OFF</option>";
                                echo"</select>
                            </div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Add to List</label><button style='width:100%' class='btn btn-primary' type='submit' onblur=\"shiftdataV2('sales_multi_data.php?pid=$salesno&sheba=sales_voucher', 'datatableXX')\">ADD</button></div>";
                            
                            /*
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>SKU</label><input class='form-control' type='text' name='sku' placeholder='Type here' value='' ></div>
                            <div class='col-2' style='margin-top:15px'><label class='form-label'>Brand/Manufacturer Name</label>
                                <select class='form-select' name='brand' required='' >";
                                    $e2 = "select * from brands where status='ON' order by brand_name asc";
                                    $f2 = $conn->query($e2);
                                    if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) { echo"<option value='".$g2["id"]."'>".$g2["brand_name"]."</option>"; } }
                                echo"</select>
                            </div>
                            
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Size</label><input class='form-control' type='text' name='size' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Weight</label><input class='form-control' type='text' name='weight' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Color</label><input class='form-control' type='text' name='color' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Material</label><input class='form-control' type='text' name='material' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Capacity</label><input class='form-control' type='text' name='capacity' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Flavour</label><input class='form-control' type='text' name='flavour' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Style</label><input class='form-control' type='text' name='style' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Bundle</label><input class='form-control' type='text' name='bundle' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Modal</label><input class='form-control' type='text' name='modal' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Age</label><input class='form-control' type='text' name='age' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Gender</label><input class='form-control' type='text' name='gender' placeholder='Type here' min-value='1' value='' ></div>
                            <div class='col-1' style='margin-top:15px'><label class='form-label'>Genetic</label><input class='form-control' type='text' name='genetic' placeholder='Type here' min-value='1' value='' ></div>
                            */
                        
                        
                        echo"</div>
                    </form>
                    <div class='data-table-rows slim col-md-12' id='sample'>
                        <div class='data-table-responsive-wrapper'><hr>
                            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                                <thead><tr>
                                    <th align=left>Date <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th align=left>Product Name <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th align=left>Note <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th align=center>Qty <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th style='text-align:right'>Amount <i data-acorn-icon='sort' style='height:12px'></i></th>
                                    <th></th>                     
                                </tr></thead>
                                <tbody id='datatableXX'>";
                                    include 'sales_multi_data.php';
                                echo"</tbody>
                            </table>
                        </div>
                    </div>";
                    
                    // sales_no,sales_date,invoice_no,ledger_id,sold_to,status,product_name,quantity,amount,sku,brand,category,note,size,weight,color,material,capacity,flavour,style,bundle,modal,age,gender,genetic
                    
                echo"</div>";
            }
            
        echo"</div>
    </div>";  