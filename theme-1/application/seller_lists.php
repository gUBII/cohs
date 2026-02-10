<?php
    echo"<div style='padding:5px' onmouseover=\"shiftdataV1('seller_lists', 'taskset')\">";
        include("auth.php");
        $s1 = "select * from sms_user2 where actype='VENDOR' and status='ON' order by name asc";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            echo"<tr>
                <td style='max-width:40%'><b>".$rs1["sname"]."</b></td>
                <td nowrap><b>".$rs1["name"]." ".$rs1["name2"]."</b></td>
                <td>Eml: ".$rs1["email"]."<br>Ph: ".$rs1["phone"]."</td>
                <td nowrap><b>".$rs1["address"]." ".$rs1["city"]." ".$rs1["state"]."- ".$rs1["zip"].",  ".$rs1["country"]."</b></td>
                <td>".$rs1["user_id"]."</td><td>".$rs1["status"]."</td>
                <td class='text-end'>
                    <div class='dropdown'>
                        <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('orders.php?sid=".$rs1["id"]."&sheba=order_lists', 'datashiftX')\">View Orders</a>
                            <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('seller_edit.php?uid=".$rs1["id"]."&sheba=seller_lists', 'datashiftX')\">Edit</a>
                            <hr>
                            <a class='dropdown-item' style='cursor: pointer' href='".$rs1["kyc1"]."' target='_blank'>KYC 1</a>
                            <a class='dropdown-item' style='cursor: pointer' href='".$rs1["kyc2"]."' target='_blank'>KYC 2</a>
                            <a class='dropdown-item' style='cursor: pointer' href='".$rs1["kyc3"]."' target='_blank'>KYC 3</a>
                            <hr>
                            <a class='dropdown-item' style='cursor: pointer' href='user_update.php?processor=onoff&bid=".$rs1["id"]."&status=OFF' target='dataprocessor' onblur=\"shiftdataV1('seller_list', 'datashiftX')\">Suspend</a>
                            <a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=sms_user2' target='dataprocessor' onblur=\"shiftdataV1('seller_lists', 'taskset')\">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>";
        } }
    echo"</div>";
?>