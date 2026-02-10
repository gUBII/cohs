<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-10 content-header'><h2 class='content-title'>Suspended Seller</h2></div>
            <div class='col-md-2'><button class='btn btn-primary' onclick=\"shiftdataV2('seller_list.php?blist=1', 'datashiftX')\">Add New</button></div>
        </div>
        <div class='card'>
            <div class='card-body'>
                <div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Shop Name</th><th>Name</th><th>Email & Phone</th><th>Address</th><th>User ID</th><th>Status</th><th class='text-end'>Action</th></tr></thead>
                        <tbody>
                            <div style='padding:5px' onmouseover=\"shiftdataV1('seller_suspended', 'datashiftX')\">";
                                $s1 = "select * from sms_user2 where actype='VENDOR' and status='OFF' order by name asc";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    echo"<tr>
                                        <td><b>".$rs1["sname"]."</b></td>
                                        <td nowrap><b>".$rs1["name"]." ".$rs1["name2"]."</b></td>
                                        <td>Eml: ".$rs1["email"]."<br>Ph: ".$rs1["phone"]."</td>
                                        <td>".$rs1["address"].", ".$rs1["city"].", ".$rs1["state"]."-".$rs1["zip"].", ".$rs1["country"].",</td>
                                        <td>".$rs1["user_id"]."</td><td>".$rs1["status"]."</td>
                                        <td class='text-end'>
                                            <div class='dropdown'>
                                                <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('orders.php?sid=".$rs1["id"]."&sheba=order_lists', 'datashiftX')\">View Orders</a>
                                                    <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('seller_edit.php?uid=".$rs1["id"]."&sheba=seller_lists', 'datashiftX')\">Edit</a>
                                                    <a class='dropdown-item' style='cursor: pointer' href='user_update.php?processor=onoff&bid=".$rs1["id"]."&status=ON' target='dataprocessor' onblur=\"shiftdataV1('seller_suspended', 'datashiftX')\">Un-Suspend</a>
                                                    <a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=sms_user2' target='dataprocessor' onblur=\"shiftdataV1('seller_suspended', 'datashiftX')\">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>