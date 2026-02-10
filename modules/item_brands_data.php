<?php
    include("../authenticator.php");
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    echo"<div class='card-body' style='margin-top:-65px;width:100%'>";
    
        $s1 = "select * from product_brands order by brand_name asc limit $sortset";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            
            $lastid=$rs1["id"];
            $parent_name=$rs1["parent"];
            if($parent_name!=0){
                $c1 = "select * from product_brands where id='".$rs1["parent"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $parent_name=$c3["brand_name"]; } }
            }else{
                $parent_name="Top Brand";
            }
            
            echo"<tr class='' style='width:90%'>";
                echo"<td class='text-alternate' align=left>$lastid</td>";
                echo"<td class='text-alternate' align=left>".$rs1["brand_name"]."</td>";
                echo"<td class='text-alternate' align=left>$parent_name</td>";
                echo"<td class='text-alternate' align=left>".$rs1["note"]."</td>";
                echo"<td class='text-alternate' align=center>
                    <a href='#' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#imageviewer'  onclick=\"shiftdataV2('image_viewer.php?image_url=".$rs1["image"]."', 'datatableI')\">View</a>
                    <div class='modal fade' id='imageviewer' tabindex='-1' role='dialog' aria-labelledby='imageviewerDefault' aria-hidden='true'>
                        <div class='modal-dialog'><div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelDefault'>Image & File Viewer</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' id='datatableI'>...</div>
                        </div></div>
                    </div>
                </td>";
                echo"<td class='text-alternate' align=center>".$rs1["status"]."</td>";
                echo"<td class='text-alternate'>
                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('item_brands_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."', 'datatableX')\">
                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('item_brands_process.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&mid=".$rs1["id"]."&title=".$_GET["title"]."', 'offcanvasRight')\">Edit</a>";
                            if($rs1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=".$_GET["sheba"]."&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('item_brands_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&title=".$_GET["title"]."', 'datatableX')\">Suspend</a>";
                            else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=".$_GET["sheba"]."&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('item_brands_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&title=".$_GET["title"]."', 'datatableX')\">Activate</a>";
                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=".$_GET["sheba"]."&cid=".$_GET["cid"]."&delid=".$rs1["id"]."&tbl=".$_GET["sheba"]."&sourceid=id', 'offcanvasTop'); setTimeout(function() { shiftdataV2('item_brands_data.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&title=".$_GET["title"]."', 'datatableX'); }, 5000)\">Delete</a>";
                        echo"</div>
                    </div>
                </td>
                <td>&nbsp;</td>";
            echo"</tr>";
        } }

    echo"</div>";
    
    