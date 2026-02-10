<?php
    error_reporting(0);
    include '../authenticator.php';
    include '../head.php';
    
    $cid=$_GET["cid"];
    $pid=$_GET["pid"];
    
    echo"<div class='card' style='background-color:#cccccc'><br>
        <table class='table stripe table-hover' style='width:100%;padding:10px'>
        <thead style='background-color:#cccccc'><tr><th>Description</th><th>NDIS Item #</th><th>Unit</th><th>Price</th><th>Qty & Frequency</th><th>Total</th><th>Comments</th><th></th></tr></thead>
        <tbody>";
            $ttx=0;
            $r1 = "select * from service_agreement_addon where projectid='$pid' and clientid='$cid' and status='1' order by id desc";
            $r1x = $conn->query($r1);
            if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                $totalamt=($r1y["price"]*$r1y["qty"]);
                echo"<tr style='background-color:#dddddd'>
                    <td nowrap>".$r1y["description"]."</td>
                    <td nowrap>".$r1y["ndis_item"]."</td>
                    <td nowrap>".$r1y["unit"]."</td>
                    <td nowrap>".$r1y["price"]."</td>
                    <td nowrap>".$r1y["qty"]."</td>
                    <td nowrap>$totalamt</td>
                    <td nowrap>".$r1y["comments"]."</td>
                    <td style='width:20px'><div class='btn-group'>
                        <a href='../deleterecords2.php?delid=".$r1y["id"]."&sourceid=id&tbl=service_agreement_addon&cid=$cid&pid=$pid&sid=0' target='dataprocessor' style='margin-top:0px;color:$topbar_color'>
                            <i class='fa fa-trash'></i>
                        </a>
                    </div></td>
                </tr>";
            } }
        echo"</tbody>
    </table>
    </div>";
    
    include '../scripts.php';
?>