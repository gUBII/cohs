<?php
    echo"<div style='padding:5px' onmouseover=\"shiftdataV1('buyer_lists', 'taskset')\">";
        include("auth.php");
        $s1 = "select * from sms_user2 where actype='BUYER' and status='ON' order by name asc";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            echo"<tr><td style='max-width:40%'><b>".$rs1["name"]."".$rs1["name2"]."</b></td>
                <td>".$rs1["email"]."</td><td>".$rs1["phone"]."</td><td>".$rs1["user_id"]."</td><td>".$rs1["status"]."</td>
                <td class='text-end'>
                    <div class='dropdown'>
                        <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('orders.php?bid=".$rs1["id"]."&sheba=order_lists', 'datashiftX')\">View Orders</a>
                            <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('buyer_edit.php?uid=".$rs1["id"]."&sheba=buyer_lists', 'datashiftX')\">Edit</a>
                            <a class='dropdown-item' style='cursor: pointer' href='user_update.php?processor=onoff&bid=".$rs1["id"]."&status=OFF' target='dataprocessor' onblur=\"shiftdataV1('buyer_list', 'datashiftX')\">Suspend</a>
                            <a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=sms_user2' target='dataprocessor' onblur=\"shiftdataV1('buyer_lists', 'taskset')\">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>";
        } }
    echo"</div>";
?>