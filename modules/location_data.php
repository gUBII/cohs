<?php
    include("../authenticator.php");
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='card-body' style='margin-top:-65px;width:80%'>";
         
            $sheba=$_GET["sheba"];             
            $title="Edit Store Location/Warehouse";
            $bc=0;
            $bcolor="#000000";
            $s1 = "select * from warehouse order by warehouse_name asc limit $sortset";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $lastid=$rs1["id"];
                $contract_duration=strtotime($rs1["contract_duration"]);
                $contract_duration=date("d-m-Y", $contract_duration);
                $rand=rand(100,999);
                $warehouse_type="";
                $c1 = "select * from warehouse_type where id='".$rs1["warehouse_type"]."' order by id asc limit 1";
                $c2 = $conn->query($c1);
                if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $warehouse_type=$c3["wtype_name"]; } }
                echo"<tr class='' >";
                    echo"<td class='text-alternate' align=left>$lastid</td>";
                    echo"<td class='text-alternate' align=left><a href='index.php?url=status.php&id=5341&lid=$lastid'>".$rs1["warehouse_name"]."</a></td>";
                    echo"<td class='text-alternate' align=left>".$rs1["warehouse_company"]."<br>".$rs1["address"]."</td>";
                    echo"<td class='text-alternate' align=left>".$rs1["contact_no"]."</td>";
                    echo"<td class='text-alternate' align=left>$warehouse_type</td>";
                    echo"<td class='text-alternate' align=right>".$rs1["rent_type"].": $currencysymbol ".$rs1["rent"]." $currencycode</td>";
                    echo"<td class='text-alternate' align=center>$contract_duration</td>";
                    echo"<td class='text-alternate' align=center>".$rs1["status"]."</td>";
                    echo"<td class='text-alternate'>
                        <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                            <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                            <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('location_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                                <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('location_process.php?cid=$cid&sheba=$sheba&mid=".$rs1["id"]."&ctitle=$title', 'offcanvasRight')\">Edit</a>";
                                if($rs1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=$sheba&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('location_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Suspend</a>";
                                else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=$sheba&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('location_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Activate</a>";
                                echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=warehouse&cid=$cid&delid=".$rs1["id"]."&tbl=$sheba&sourceid=id', 'offcanvasTop'); setTimeout(function() { shiftdataV2('location_data.php?cid=$cid&sheba=$sheba', 'datatableX'); }, 5000)\">Delete</a>";
                            echo"</div>
                        </div>
                    </td>
                    <td>&nbsp;</td>";
                echo"</tr>";
            } }

    echo"</div>";
    
    