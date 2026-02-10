<?php
    include("../authenticator.php");
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='card-body' style='margin-top:-65px;width:100%'>";
    
            $sheba=$_GET["sheba"];             
            $title="Edit Payment Voucher";
            $bc=0;
            $bcolor="#000000";
            $s1 = "select * from payment_voucher order by id asc limit $sortset";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $lastid=$rs1["id"];
                $rand=rand(100,999);                
                $ledgername="0";
                $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                $r1b = $conn->query($s1b);
                if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                if($ledgername=="0"){
                    $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                    $r1bc = $conn->query($s1bc);
                    if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                }
                $paidtoname="";
                $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                $r1c = $conn->query($s1c);
                if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $paidtoname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                
                $rdate=date("d-m-Y",$rs1["payment_date"]);
                
                echo"<tr class='zoom' style='width:100%'>
                    <td class='text-alternate' align=left>$lastid</td>
                    <td class='text-alternate' align=left>".$rs1["payment_no"]."</td>
                    <td class='text-alternate' align=left>$rdate</td>
                    <td class='text-alternate' align=left>".$rs1["invoice_no2"]."-".$rs1["invoice_no"]."";
                        // echo", <br>".$rs1["narration"]."";
                    echo"</td>
                    <td class='text-alternate' align=left>$paidtoname</td>
                    <td class='text-alternate' align=left>$ledgername</td>                    
                    <td class='text-alternate' align=right>$csymbol".$rs1["dr_amt"]."</td>
                    <td class='text-alternate' align=center>".$rs1["status"]."</td>
                    <td class='text-alternate'>
                        <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                            <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                            <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('payment_voucher_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('payment_voucher_process.php?cid=$cid&sheba=$sheba&mid=".$rs1["id"]."&ctitle=$title', 'offcanvasTop2')\">Edit</a>";
                                if($rs1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=$sheba&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('payment_voucher_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Suspend</a>";
                                else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=$sheba&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('payment_voucher_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Activate</a>";
                                echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=payment_voucher_data&cid=$cid&delid=".$rs1["id"]."&tbl=$sheba', 'offcanvasTop')\">Delete</a>";                                
                            echo"</div>
                        </div>
                    </td>
                </tr>";
            } }

    echo"</div>";
    
    