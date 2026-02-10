<?php
    include("../authenticator.php");
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='card-body' style='margin-top:-65px;width:100%'>";
    
            $sheba=$_GET["sheba"];             
            $title="Edit Product";
            $bc=0;
            $bcolor="#000000";
            $s1 = "select * from product order by productid asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $category1="0";
                $s1b = "select * from product_category where id='".$rs1["category"]."' order by id desc limit 1";
                $r1b = $conn->query($s1b);
                if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $category1=$rs1b["category_name"]; } }
                
                $category2="0";
                $s1b = "select * from product_category where id='".$rs1["category2"]."' order by id desc limit 1";
                $r1b = $conn->query($s1b);
                if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $category2=$rs1b["category_name"]; } }
                
                $brand="0";
                $s1c = "select * from product_brands where id='".$rs1["brand"]."' order by id desc limit 1";
                $r1c = $conn->query($s1c);
                if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $brand=$rs1c["brand_name"]; } }
                
                echo"<tr class='zoom' style='width:100%'>
                    <td class='text-alternate' align=left>".$rs1["productid"]."<br>SKU: ".$rs1["sku"]."</td>
                    <td class='text-alternate' align=left>".$rs1["product_name"]."<br>Image: <a href='".$rs1["image"]."' target='_blank'>Image Line</a></td>
                    <td class='text-alternate' align=left>$category1<Br>$category2</td>
                    <td class='text-alternate' align=left>$brand<br>".$rs1["modal"]."</td>
                    <td class='text-alternate' align=left>".$rs1["size"]."<br>".$rs1["weight"]."</td>
                    <td class='text-alternate' align=left>".$rs1["color"]."<br>".$rs1["material"]."</td>
                    <td class='text-alternate' align=center>".$rs1["capacity"]."<br>".$rs1["flavour"]."</td>
                    <td class='text-alternate' align=right>".$rs1["style"]."<br>".$rs1["bundles"]."</td>
                    <td class='text-alternate' align=right>".$rs1["age"].", ".$rs1["gender"]."<Br>".$rs1["genetic"]."</td>
                    <td class='text-alternate' align=right>".$rs1["status"]."</td>
                    <td class='text-alternate'>
                        <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                            <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                            <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('product_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('product_process.php?cid=$cid&sheba=$sheba&pid=".$rs1["productid"]."&ctitle=$title', 'offcanvasTop2')\">Edit</a>";
                                if($rs1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=GlobalSuspend&status=OFF&sid1=status&sid=productid&tid=$sheba&pid=".$rs1["productid"]."' target='dataprocessor' onblur=\"shiftdataV2('product_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Suspend</a>";
                                else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=GlobalSuspend&status=ON&sid1=status&sid=productid&tid=$sheba&pid=".$rs1["productid"]."' target='dataprocessor' onblur=\"shiftdataV2('product_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Activate</a>";
                                echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=product_data&cidx=$cid&delidx=".$rs1["productid"]."&tblx=$sheba&sourceidx=productid', 'offcanvasTop')\" onblur=\"shiftdataV2('product_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Delete</a>";                                
                            echo"</div>
                        </div>
                    </td>
                </tr>";
            } }
    echo"</div>";
    
    