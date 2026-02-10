<?php
include("auth.php");
echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Active Product List</h2></div>
        <div class='card'>
            <div class=''>        
                <table style='width:100%;background-color:#CFE6E4;padding:5px'><tr>
                    <td style='width:80%'>
                        <form method='get' action='assets/excel/export_excel.php' target='dataprocessor' enctype='multipart/form-data'> 
                            <table style='width:100%;background-color:#CFE6E4;padding:5px'>
                                <tr>
                                    <td style='padding:5px'>
                                        <select name='vendorid' required class='form-control' onchange='document.pdfform.vid.value=this.value'>
                                            <option value='ALL'>All Vendor</option>";
                                            $s7 = "select * from sms_user2 where mtype='VENDOR' order by name asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["name"]." ".$rs7["name2"]."</option>";
                                            } }
                                        echo"</select>
                                    </td><td style='padding:5px'>
                                        <select name='categoryid' required='' class='form-control' onchange='document.pdfform.cid.value=this.value'>
                                            <option value='ALL'> All Categories</option>";
                                            $s8 = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
                                            $r8 = $conn->query($s8);
                                            if ($r8->num_rows > 0) { while($rs8 = $r8->fetch_assoc()) {
                                                echo"<option value='".$rs8["id"]."' style='color:blue'>".$rs8["pam"]."</option>";
                                                $s8a = "select * from sms_link where des1='".$rs8["id"]."' order by sorder asc";
                                                $r8a = $conn->query($s8a);
                                                if ($r8a->num_rows > 0) { while($rs8a = $r8a->fetch_assoc()) {
                                                    echo"<option value='".$rs8a["id"]."' style='color:green'>".$rs8a["pam"]."</option>";
                                                    $s8b = "select * from sms_link where des1='".$rs8a["id"]."' order by sorder asc";
                                                    $r8b = $conn->query($s8b);
                                                    if ($r8b->num_rows > 0) { while($rs8b = $r8b->fetch_assoc()) {
                                                        echo"<option value='".$rs8b["id"]."' style='color:grey'>".$rs8b["pam"]."</option>";
                                                    } }
                                                } }
                                            } }
                                        echo"</select>
                                    </td><td style='padding:5px'>
                                        <input type=date name='date_from' class='form-control' onchange='document.pdfform.datex.value=this.value'>
                                    </td><td style='padding:5px'>
                                        <input type=submit value='EXCEL' class='btn btn-primary'>
                                        <input type=hidden name='kroyee' value='ActiveProducts'>
                                        <input type=hidden name='status' value='2'>                                    
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </td><td>
                        <form method='post' name='pdfform' action='pdf_converter.php' target='dataprocessor' enctype='multipart/form-data'> 
                            <input type=hidden name='pointer' value='products'><input type=hidden name='vid' value='ALL'> 
                            <input type=hidden name='cid' value='ALL'><input type=hidden name='datex' value='0'> 
                            <input type=hidden name='status' value='2'>
                            <input type=submit style='color:white' value='PDF' class='btn btn-info'>
                        </form>
                    </td>
                </tr></table>
            </div>

            <div class='card-body'>    
                <div class='table-responsive' style='min-height:500px'>
                    <table id='example' class='table table-striped display' style='width:100%' onmouseover=\"$('#example').DataTable();\">
                        <thead><tr><th>Name</th><th>Category</th><th>Vendor</th><th>Brand</th><th>Price</th><th>Qty</th><th>Image</th><th class='text-end'>Action</th></tr></thead>
                        <tbody id='taskset'>";
                            
                            $s1 = "select * from sms_product_bon where status='2' order by date desc";
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                
                                $cat1="";
                                $s1a = "select * from sms_link where id='".$rs1["cid"]."' order by id desc limit 1";
                                $r1a = $conn->query($s1a);
                                if ($r1a->num_rows > 0) { while($rs1a = $r1a->fetch_assoc()) { $cat1=$rs1a["pam"]; } }
                                
                                $cat2="";
                                $s1b = "select * from sms_link where id='".$rs1["cid2"]."' order by id desc limit 1";
                                $r1b = $conn->query($s1b);
                                if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $cat2=$rs1b["pam"]; } }
                                
                                $vendorname="";
                                $s1c = "select * from sms_user2 where id='".$rs1["vid"]."' order by id desc limit 1";
                                $r1c = $conn->query($s1c);
                                if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $vendorname=$rs1c["sname"]; } }
                                
                                $brandname="";
                                $s1d = "select * from brand where id='".$rs1["bid"]."' order by id desc limit 1";
                                $r1d = $conn->query($s1d);
                                if ($r1d->num_rows > 0) { while($rs1d = $r1d->fetch_assoc()) { $brandname=$rs1d["title"]; } }
                                
                                echo"<tr>
                                    <td>".$rs1["pname"]."<br>Sku: ".$rs1["sku"]."</td>
                                    <td nowrap>1. $cat1<br>2. $cat2</td>
                                    <td>$vendorname</td><td>$brandname</td>
                                    <td nowrap align=right>RP: ".$rs1["price"]."<br>OP: ".$rs1["offer"]."<br>DP:".$rs1["discount"]."</td>
                                    <td>".$rs1["qty"]."</td>
                                    <td>";
                                        $t1=0;
                                        $s1c = "select * from multi_image where pid='".$rs1["id"]."' and reactor='".$rs1["reactor"]."' order by id asc";
                                        $r1c = $conn->query($s1c);
                                        if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { 
                                            $t1=($t1+1);
                                            echo"<a href='".$rs1c["image"]."' target='_blank'>$t1</a> | ";
                                        } }
                                    echo"</td>
                                    <td class='text-end'>
                                        <div class='dropdown'>
                                            <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                                            <div class='dropdown-menu' onmouseup=\"shiftdataV1('task_pending', 'taskset')\">
                                                <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('product_edit.php?pid=".$rs1["id"]."&sheba=product_active', 'datashiftX')\">Edit</a>
                                                <a class='dropdown-item' href='product_update.php?processor=pendingproduct&status=1&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV1('product_active', 'datashiftX')\">Un-Approve</a>
                                                <a class='dropdown-item' href='product_update.php?processor=suspendproduct&status=0&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV1('product_active', 'datashiftX')\">Suspend</a>
                                                <a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=sms_product_bon' target='dataprocessor' onblur=\"shiftdataV1('product_active', 'datashiftX')\">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>";
                            } }
                        echo"
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>