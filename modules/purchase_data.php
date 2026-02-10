<?php
    include("../authenticator.php");
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='card-body' style='margin-top:-65px;width:100%'>";
    
            $sheba=$_GET["sheba"];             
            $title="Edit Purchase Voucher";
            $bc=0;
            $bcolor="#000000";
            $s1 = "select * from purchase_voucher group by purchase_no order by id asc limit $sortset";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $lastid=$rs1["id"];
                $rand=rand(100,999);                
                
                $project_name="0";
                $s1b = "select * from project where id='".$rs1["proj_id"]."' order by id desc limit 1";
                $r1b = $conn->query($s1b);
                if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $project_name=$rs1b["name"]; } }
                
                $purchased_from_name="";
                $s1c = "select * from uerp_user where id='".$rs1["purchased_from"]."' order by id desc limit 1";
                $r1c = $conn->query($s1c);
                if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $purchased_from_name="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                
                $pdate=date("d-m-Y",$rs1["purchase_date"]);
                
                $group_amount=0;
                $total_quantity=0;
                $total_amount=0;
                $ta1 = "select * from purchase_voucher where purchase_no='".$rs1["purchase_no"]."' order by purchase_no asc";
                $ta2 = $conn->query($ta1);
                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                    $group_amount=($group_amount+$ta3["cr_amt"]);
                    $total_quantity=($total_quantity+$ta3["qty"]);
                } }
                $total_amount=($total_quantity*$group_amount);
                echo"<tr class='zoom' style='width:100%'>
                    <td class='text-alternate' align=left>$lastid</td>
                    <td class='text-alternate' align=left>".$rs1["purchase_no"]."</td>
                    <td class='text-alternate' align=left>$pdate</td>
                    <td class='text-alternate' align=left>".$rs1["invoice_no"]."</td>
                    <td class='text-alternate' align=left>$purchased_from_name</td>
                    <td class='text-alternate' align=left>$project_name</td>
                    <td class='text-alternate' align=center>$total_quantity</td>
                    <td class='text-alternate' align=right>$csymbol $group_amount</td>
                    <td class='text-alternate' align=right>$csymbol $total_amount</td>
                    <td class='text-alternate' align=right>".$rs1["status"]."</td>
                    <td class='text-alternate'>
                        <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                            <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                            <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('purchase_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('purchase_process.php?cid=$cid&sheba=$sheba&pno=".$rs1["purchase_no"]."&pid=".$rs1["proj_id"]."&pfrom=".$rs1["purchased_from"]."&ctitle=$title', 'offcanvasTop2')\">Edit</a>";
                                if($rs1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=GlobalSuspend&status=OFF&sid1=status&sid=purchase_no&tid=$sheba&pid=".$rs1["purchase_no"]."' target='dataprocessor' onblur=\"shiftdataV2('purchase_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Suspend</a>";
                                else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=GlobalSuspend&status=ON&sid1=status&sid=purchase_no&tid=$sheba&pid=".$rs1["purchase_no"]."' target='dataprocessor' onblur=\"shiftdataV2('purchase_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Activate</a>";
                                echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=purchase_data&cid=$cid&delid=".$rs1["id"]."&tbl=$sheba', 'offcanvasTop')\">Delete</a>";                                
                            echo"</div>
                        </div>
                    </td>
                </tr>";
            } }
    echo"</div>";
    
    