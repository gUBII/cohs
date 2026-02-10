<?php
    error_reporting(0);
    if(isset($_COOKIE["client_id"])){
        
        include '../authenticator.php';    
        include '../aged_care_client_bar.php';
        
        if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
        else $sortset=10000000;

        $cid=0;
        if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
        echo"<div class='data-table-rows slim' id='sample'>
            <div class='data-table-responsive-wrapper'>
                <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                    <tr>";
                        echo"<th onclick='sortTable(0)' style='padding:10px'>Package <i data-acorn-icon='sort' style='height:12px'></i></th>";
                        echo"<th onclick='sortTable(1)' style='padding:10px'>Start Date <i data-acorn-icon='sort' style='height:12px'></i></th>";
                        echo"<th onclick='sortTable(2)' style='padding:10px'>End Date <i data-acorn-icon='sort' style='height:12px'></i></th>";
                        echo"<th onclick='sortTable(4)' style='padding:10px'>Locked Date <i data-acorn-icon='sort' style='height:12px'></i></th>";
                        echo"<th onclick='sortTable(5)' style='padding:10px'>Case Manager <i data-acorn-icon='sort' style='height:12px'></i></th>";
                        echo"<th onclick='sortTable(3)' style='padding:10px'>Balance <i data-acorn-icon='sort' style='height:12px'></i></th>";
                        echo"<th style='padding:10px'></th>";
                    echo"</tr>
                    <tbody>";
                    
                        $s1 = "select * from leads where clientid='".$_COOKIE["client_id"]."' order by id asc";
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                        
                            $manager_name=""; 
                            $c1 = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id asc limit 1";
                            $c2 = $conn->query($c1);
                            if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $manager_name="".$c3["username"]." ".$c3["username1"].""; } }
                                
                            $package=$rs1["cpackage"];
                            $startdate=date("d-m-Y",$rs1["start_date"]);
                            $enddate=date("d-m-Y",$rs1["end_date"]);
                            $lockeddate=date("d-m-Y",$rs1["locked_date"]);
                            $budget_balance=$rs1["balanced"];
                            
                            echo"<tr class='' style='width:100%'>";
                                echo"<td class='text-alternate' align=left style='padding:10px'><a href='#'><u>HCP L-$package</u></a></td>";
                                echo"<td class='text-alternate' align=left style='padding:10px'>$startdate</td>";
                                echo"<td class='text-alternate' align=left style='padding:10px'>$enddate</td>";
                                echo"<td class='text-alternate' align=left style='padding:10px'>$lockeddate</td>";
                                echo"<td class='text-alternate' align=left style='padding:10px'>$manager_name</td>";
                                echo"<td class='text-alternate' align=left style='padding:10px'>$csymbol $budget_balance</td>";
                                echo"<td class='text-alternate' style='padding:10px'>&nbsp;</td>";
                            echo"</tr>";
                        } }
                        
                    echo"</tbody>
                </table>
            </div>
        </div>";
    
    }
?>