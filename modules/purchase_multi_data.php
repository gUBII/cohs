<?php

    include("../include.php");
    
    $sheba=$_GET["sheba"];
    
    $pno=0;
    $s1x = "select * from purchase_voucher where order_status='0' and user_id='".$_COOKIE["userid"]."' order by id desc limit 1";
    $r1x = $conn->query($s1x);
    if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
        $pno=$rs1x["purchase_no"];
        $proj_id=$rs1x["proj_id"];
        $ledger_id=$rs1x["ledger_id"];
        $user_id=$_COOKIE["userid"];
    }}
    
    echo"<div class='' style='width:100%'>";
        if($pno!=0){
            $s1 = "select * from purchase_voucher where order_status='0' and purchase_no='$pno' and user_id='".$_COOKIE["userid"]."' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                
                $pdate=date("d-m-Y",$rs1["purchase_date"]);
                    
                echo"<tr class='' style='width:100%;height:80px'>
                    <td class='text-alternate' align=left style='width:10%;'>$pdate</td>
                    <td class='text-alternate' align=left style='width:30%'>
                        <form method='post' name='form$pdate' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='pid' value='".$rs1["id"]."'><input type='hidden' name='tbl' value='purchase_voucher'>
                            <input type='hidden' name='field_name' value='product_id'>
                            <select class='form-select' name='pvalue' required='' onchange='this.form.submit();'>";
                                $e2 = "select * from product where productid='".$rs1["product_id"]."' and status='ON' order by product_name asc limit 1";
                                $f2 = $conn->query($e2);
                                if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                    echo"<option value='".$g2["productid"]."'>".$g2["product_name"]." (".$g2["size"].", ".$g2["weight"].", ".$g2["color"].", ".$g2["material"].",".$g2["capacity"].", ".$g2["flavor"].", ".$g2["style"].", ".$g2["bundles"].", ".$g2["modal"].", ".$g2["age"].", ".$g2["gender"].", ".$g2["genetic"].")</option>";
                                } }
                                
                                $e2x = "select * from product where status='ON' order by product_name asc";
                                $f2x = $conn->query($e2x);
                                if ($f2x->num_rows > 0) { while($g2x = $f2x->fetch_assoc()) {
                                    echo"<option value='".$g2x["productid"]."'>".$g2x["product_name"]." (".$g2x["size"].", ".$g2x["weight"].", ".$g2x["color"].", ".$g2x["material"].",".$g2x["capacity"].", ".$g2x["flavor"].", ".$g2x["style"].", ".$g2x["bundles"].", ".$g2x["modal"].", ".$g2x["age"].", ".$g2x["gender"].", ".$g2x["genetic"].")</option>";
                                } }
                            echo"</select>
                        </form>
                    </td>
                    <td class='text-alternate' align=left style='width:30%'>
                        <form method='post' name='form$pdate' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='pid' value='".$rs1["id"]."'><input type='hidden' name='tbl' value='purchase_voucher'>
                            <input type='hidden' name='field_name' value='narration'>
                            <input type='text' value='".$rs1["narration"]."' name='pvalue' class='form-control' onchange='this.form.submit();'>
                        </form>
                    </td>
                    <td class='text-alternate' align=left style='width:10%'>
                        <form method='post' name='form$pdate' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='pid' value='".$rs1["id"]."'><input type='hidden' name='tbl' value='purchase_voucher'>
                            <input type='hidden' name='field_name' value='qty'>
                            <input type='number' value='".$rs1["qty"]."' name='pvalue' class='form-control' onchange='this.form.submit();'>
                        </form>
                    </td>                    
                    <td class='text-alternate' align=right style='width:10%' nowrap>
                        <form method='post' name='form$pdate' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='pid' value='".$rs1["id"]."'><input type='hidden' name='tbl' value='purchase_voucher'>
                            <input type='hidden' name='field_name' value='cr_amt'>
                            <input type='text' value='".$rs1["cr_amt"]."' name='pvalue' class='form-control' onchange='this.form.submit();'>
                        </form>
                    </td>
                    <td class='text-alternate' align=right style='width:10%'>
                        <form method='post' name='form$pdate' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='delid' value='".$rs1["id"]."'><input type='hidden' name='tbl' value='purchase_voucher'>
                            <input type='submit' class='btn btn-danger' onblur=\"shiftdataV2('purchase_multi_data.php?cid=5&sheba=purchase_voucher', 'datatableXX')\" value='x'><i class='fa fa-delete'></i>
                        </form>
                    </td>
                </tr>";
            } }
        }
        
        echo"<tr><td style='text-align:right' colspan=20><hr>
            <form method='post' name='formprocess' action='retailprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                <input type='hidden' name='processor' value='process_purchase'>
                <input type='hidden' name='purchase_no' value='$pno'>
                <input type='hidden' name='proj_id' value='$proj_id'>
                <input type='hidden' name='ledger_id' value='$ledger_id'>
                <input type='hidden' name='user_id' value='$user_id'>
                <button class='btn btn-secondary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('purchase_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Process Purchase Voucher</button>
            </form>
        </td></tr>
    </div>";