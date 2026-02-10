<?php
    error_reporting(0);
    include('../include.php');
    
    $cid=$_GET["cid"];
    $pid=$_GET["pid"];
    echo"<table class='table stripe table-hover' style='width:100%;padding:10px'>
        <tbody>";
            $ttx=0;
            $r1 = "select * from service_agreement_addon where projectid='$pid' and clientid='$cid' and status='1' order by id desc";
            $r1x = $conn->query($r1);
            if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                echo"<tr class='gradeX'>
                    <td nowrap>".$r1y["description"]."</td>
                    <td nowrap>".$r1y["ndis_item"]."</td>
                    <td nowrap>".$r1y["unit"]."</td>
                    <td nowrap>".$r1y["price"]."</td>
                    <td nowrap>".$r1y["qty"]."</td>
                    <td nowrap>".$r1y["comments"]."</td>
                    <td style='width:20px'><div class='btn-group'>
                        <a href='#' data-bs-toggle='offcanvas' data-bs-placement='bottom' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('client-service-addons-manager.php?sid=".$r1y["id"]."&cid=$cid&pid=$pid', 'offcanvasRight')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>
                    </td>
                    <td style='width:20px'><div onmouseout=\"shiftdataV2('client-service-addons.php?cid=$cid&pid=$pid&sid=0', 'datashiftXX')\">
                        <a href='deleterecords.php?delid=".$r1y["id"]."&tbl=service_agreement_addon' target='dataprocessor' style='margin-top:0px' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-trash'></i></a>
                    </div></td>
                </tr>";
            } }
        echo"</tbody>
    </table>";
?>