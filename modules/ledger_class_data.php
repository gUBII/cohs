<?php
    include("../authenticator.php");
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='card-body' style='margin-top:-65px;width:100%'>";
        $sheba=$_GET["sheba"];
        $title="Edit Ledger Class";
        $bc=0;
        $bcolor="#000000";
        $s1 = "select * from ledger_class order by class_name asc limit $sortset";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            $lastid=$rs1["id"];
            $rand=rand(100,999);
            echo"<tr class='' style='width:100%'>
                <td class='text-alternate'>$lastid</td>
                <td class='text-alternate'>".$rs1["class_name"]."</td>
                <td class='text-alternate'>$csymbol".$rs1["debit"]."</td>
                <td class='text-alternate'>$csymbol".$rs1["credit"]."</td>
                <td class='text-alternate'>".$rs1["status"]."</td>
                <td class='text-alternate'>
                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">
                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('ledger_class_process.php?cid=$cid&sheba=$sheba&mid=".$rs1["id"]."&ctitle=$title', 'offcanvasRight')\">Edit</a>";
                            if($rs1["status"]=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=$sheba&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Suspend</a>";
                            else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=$sheba&pid=".$rs1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">Activate</a>";
                            echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=ledger_class_data&cid=$cid&delid=".$rs1["id"]."&tbl=$sheba&sourceid=id', 'offcanvasTop'); setTimeout(function() { shiftdataV2('ledger_accounts_data.php?cid=$cid&sheba=$sheba', 'datatableX'); }, 5000)\">Delete</a>";
                        echo"</div>
                    </div>
                </td>
            </tr>";
        } }        
    echo"</div>";
    
    