<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body onload='printDiv()'>
<?php
    error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    include("authenticator.php");
    if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
	if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;
    
    if(isset($userid)){
        
        include("head.php");

        // echo"".$_GET["printid"]."";
        
        // GLOBAL PRINTER (PDF, COPY, EXCEL, CSC)
        if($_GET["printid"]=="global_printer"){
            
            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                $tbl=$_GET["tbl"];
                $orderby=$_GET["id"];
                $cols = array();
    
                $gp1 = "SHOW COLUMNS FROM ".$_GET["tbl"]."";
                $gp2 = $conn->query($gp1);
                while ($c = $gp2->fetch_object()) {
                    $cols[] = $c->Field;
                }
                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>";
                            foreach ($cols as $c) {
                                echo "<th class='text-muted text-small text-uppercase' align=left style='text-align:left'>" . htmlspecialchars($c) . "</th>";
                            }
                        echo"</tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                            
                                $gp1x = "SELECT * FROM $tbl";
                                $gp2x = $conn->query($gp1x);
                                while ($record = $gp2x->fetch_object()) {
                                    echo"<tr>";
                                        foreach ($cols as $c) {  echo "<td class='text-alternate' align='left'>" . htmlspecialchars($record->$c) . "</td>"; }
                                    echo "</tr>";
                                }
                                
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }
        
        
        if($_GET["printid"]=="ledger_class"){

            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>ID</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Class Name</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Debit</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Credit</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Status</th>
                        </tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                                $bc=0;
                                $bcolor="#000000";
                                $s1 = "select * from ledger_class order by class_name asc limit $sortset";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    echo"<tr>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>".$rs1["class_name"]."</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["debit"]."</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["credit"]."</td>
                                        <td class='text-alternate' align=center>".$rs1["status"]."</td>                                        
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }
        if($_GET["printid"]=="ledger_group"){

            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>ID</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Class Name</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Group Name</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Debit</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Credit</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Status</th>
                        </tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                                $bc=0;
                                $bcolor="#000000";
                                $s1 = "select * from ledger_group order by group_name asc limit $sortset";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    $class_name="";
                                    $c1 = "select * from ledger_class where id='".$rs1["group_class"]."' order by id asc limit 1";
                                    $c2 = $conn->query($c1);
                                    if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $class_name=$c3["class_name"]; } }
                                    echo"<tr>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>$class_name</td>
                                        <td class='text-alternate' align=left>".$rs1["group_name"]."</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["debit"]."</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["credit"]."</td>
                                        <td class='text-alternate' align=center>".$rs1["status"]."</td>                                        
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }
        if($_GET["printid"]=="accounts_ledger"){

            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>ID</th>                            
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Group Name</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Accounts Name</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Opening Balance</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Balance Type</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Balance Date</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Debit</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Credit</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Status</th>
                        </tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                                $bc=0;
                                $bcolor="#000000";
                                $s1 = "select * from accounts_ledger order by ledger_name asc limit $sortset";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    $group_name="";
                                    $c1 = "select * from ledger_group where id='".$rs1["ledger_group_id"]."' order by id asc limit 1";
                                    $c2 = $conn->query($c1);
                                    if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $group_name=$c3["group_name"]; } }
                                    $odate=date("Y-m-d",$rs1["opening_balance_on"]);
                                    echo"<tr>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>$group_name</td>
                                        <td class='text-alternate' align=left>".$rs1["ledger_name"]."</td>
                                        <td class='text-alternate' align=left>".$rs1["opening_balance"]."</td>
                                        <td class='text-alternate' align=left>".$rs1["balance_type"]."</td>
                                        <td class='text-alternate' align=left>$odate</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["debit"]."</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["credit"]."</td>
                                        <td class='text-alternate' align=center>".$rs1["status"]."</td>                                        
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }

        if($_GET["printid"]=="sub_ledger"){

            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>ID</th>                            
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Account Name</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Sub A/c Name</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Opening Balance</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Debit</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Credit</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Status</th>
                        </tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                                $bc=0;
                                $bcolor="#000000";
                                $s1 = "select * from sub_ledger order by sub_ledger asc limit $sortset";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    $accounts_name="";
                                    $c1 = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id asc limit 1";
                                    $c2 = $conn->query($c1);
                                    if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $accounts_name=$c3["ledger_name"]; } }
                                    echo"<tr>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>$accounts_name</td>
                                        <td class='text-alternate' align=left>".$rs1["sub_ledger"]."</td>
                                        <td class='text-alternate' align=left>".$rs1["opening_balance"]."</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["debit"]."</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs1["credit"]."</td>
                                        <td class='text-alternate' align=center>".$rs1["status"]."</td>                                        
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }

        if($_GET["printid"]=="receipt_voucher"){

            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Id</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Receipt No.</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Date</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Income Note</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Received From</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Ledger ID</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Amount</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Status</th>
                        </tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                                $bc=0;
                                $bcolor="#000000";
                                $s1 = "select * from receipt_voucher order by id asc limit $sortset";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    $ledgername="0";
                                    $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                    if($ledgername=="0"){
                                        $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                        $r1bc = $conn->query($s1bc);
                                        if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                    }
                                    $receivedfromname="";
                                    $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                                    
                                    $rdate=date("d-m-Y",$rs1["receipt_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>".$rs1["receipt_no"]."</td>
                                        <td class='text-alternate' align=left>$rdate</td>
                                        <td class='text-alternate' align=left>".$rs1["invoice_no2"]."-".$rs1["invoice_no"].", <br>".$rs1["narration"]."</td>
                                        <td class='text-alternate' align=left>$receivedfromname</td>
                                        <td class='text-alternate' align=left>$ledgername</td>                    
                                        <td class='text-alternate' align=right>$csymbol".$rs1["cr_amt"]."</td>
                                        <td class='text-alternate' align=center>".$rs1["status"]."</td>                                        
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }

        if($_GET["printid"]=="payment_voucher"){

            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Id</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Payment No.</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Date</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Payment Note</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Paid To</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Ledger ID</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Amount</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Status</th>
                        </tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                                $bc=0;
                                $bcolor="#000000";
                                $s1 = "select * from payment_voucher order by id asc limit $sortset";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    $ledgername="0";
                                    $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                    if($ledgername=="0"){
                                        $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                        $r1bc = $conn->query($s1bc);
                                        if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                    }
                                    $paidtoname="";
                                    $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $paidtoname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                                    
                                    $rdate=date("d-m-Y",$rs1["payment_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>".$rs1["payment_no"]."</td>
                                        <td class='text-alternate' align=left>$rdate</td>
                                        <td class='text-alternate' align=left>".$rs1["invoice_no2"]."-".$rs1["invoice_no"].", <br>".$rs1["narration"]."</td>
                                        <td class='text-alternate' align=left>$paidtoname</td>
                                        <td class='text-alternate' align=left>$ledgername</td>                    
                                        <td class='text-alternate' align=right>$csymbol".$rs1["dr_amt"]."</td>
                                        <td class='text-alternate' align=center>".$rs1["status"]."</td>                                        
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }



        if($_GET["printid"]=="receipt_payment"){

            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else if($_GET["pointer"]=="PDF") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="COPY") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="EXCEL") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else if($_GET["pointer"]=="CSV") echo"<div class='data-table-rows slim' id='element-to-print'>";
            else echo"<div class='data-table-rows slim' id='printthisarea'>";

                echo"<div class='data-table-responsive-wrapper'>
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead><tr>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Id</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Receipt/Payment No.</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Date</th>
                            <th class='text-muted text-small text-uppercase' align=left style='text-align:left'>Note</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>From/To Account</th>
                            <th class='text-muted text-small text-uppercase' align=right style='text-align:right'>Ledger ID</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Received</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Paid</th>
                            <th class='text-muted text-small text-uppercase' align=center style='text-align:center'>Status</th>
                        </tr></thead>
                        <tbody>
                            <div class='card-body' style='width:100%'>";
                                $bc=0;
                                $bcolor="#000000";
                                $totalpaid=0;
                                $totalreceived=0;
                                $s1 = "select * from payment_voucher order by id asc limit $sortset";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    $ledgername="0";
                                    $s1b = "select * from sub_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                    if($ledgername=="0"){
                                        $s1bc = "select * from accounts_ledger where id='".$rs1["ledger_id"]."' order by id desc limit 1";
                                        $r1bc = $conn->query($s1bc);
                                        if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                    }
                                    $paidtoname="";
                                    $s1c = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $paidtoname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                                    
                                    $rdate=date("d-m-Y",$rs1["payment_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>".$rs1["payment_no"]."</td>
                                        <td class='text-alternate' align=left>$rdate</td>
                                        <td class='text-alternate' align=left>".$rs1["invoice_no2"]."-".$rs1["invoice_no"].", <br>".$rs1["narration"]."</td>
                                        <td class='text-alternate' align=left>$paidtoname</td>
                                        <td class='text-alternate' align=left>$ledgername</td>
                                        <td class='text-alternate' align=right>$csymbol 0.00</td>                    
                                        <td class='text-alternate' align=right>$csymbol".$rs1["dr_amt"]."</td>
                                        <td class='text-alternate' align=center>".$rs1["status"]."</td>                                        
                                    </tr>";
                                    $totalpaid=($totalpaid+$rs1["dr_amt"]);
                                } }

                                $s11 = "select * from receipt_voucher order by id asc limit $sortset";
                                $r11 = $conn->query($s11);
                                if ($r11->num_rows > 0) { while($rs11 = $r11->fetch_assoc()) {
                                    $lastid=$rs11["id"];
                                    $rand=rand(100,999);
                                    $ledgername="0";
                                    $s1b = "select * from sub_ledger where id='".$rs11["ledger_id"]."' order by id desc limit 1";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
                                    if($ledgername=="0"){
                                        $s1bc = "select * from accounts_ledger where id='".$rs11["ledger_id"]."' order by id desc limit 1";
                                        $r1bc = $conn->query($s1bc);
                                        if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
                                    }
                                    $receivedfromname="";
                                    $s1c = "select * from uerp_user where id='".$rs11["employeeid"]."' order by id desc limit 1";
                                    $r1c = $conn->query($s1c);
                                    if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
                                                    
                                    $rdate=date("d-m-Y",$rs11["receipt_date"]);
                                    echo"<tr class='zoom' style='width:100%'>
                                        <td class='text-alternate' align=left>$lastid</td>
                                        <td class='text-alternate' align=left>".$rs11["receipt_no"]."</td>
                                        <td class='text-alternate' align=left>$rdate</td>
                                        <td class='text-alternate' align=left>".$rs11["invoice_no2"]."-".$rs11["invoice_no"].", <br>".$rs11["narration"]."</td>
                                        <td class='text-alternate' align=left>$receivedfromname</td>
                                        <td class='text-alternate' align=left>$ledgername</td>
                                        <td class='text-alternate' align=right>$csymbol".$rs11["cr_amt"]."</td>
                                        <td class='text-alternate' align=right>$csymbol 0.00</td>
                                        <td class='text-alternate' align=center>".$rs11["status"]."</td>                                        
                                    </tr>";
                                    $totalreceived=($totalreceived+$rs11["cr_amt"]);
                                } }
                                $totalbalance=($totalreceived-$totalpaid);
                                echo"<tr class='zoom' style='width:100%'>
                                    <td class='text-alternate' align=right colspan=6><b>Total Amount</b> &nbsp;&nbsp;</td>                    
                                    <td class='text-alternate' align=right><b>$csymbol $totalreceived</b></td>
                                    <td class='text-alternate' align=right><b>$csymbol $totalpaid</b></td>
                                    <td class='text-alternate' align=right><b>= $csymbol $totalbalance</b></td>
                                    <td class='text-alternate'></td>
                                </tr>";
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>";
        }






        include("scripts.php");
    }   
    
?>
</body>

<script> 
    function printDiv() { 
        var divContents = document.getElementById("printthisarea").innerHTML; 
        var a = window.open('', '', 'height=500, width=100%'); 
        a.document.write('<html>'); 
        a.document.write('<body >'); 
        a.document.write(divContents); 
        a.document.write('</body></html>'); 
        a.document.close(); 
        a.print(); 
    } 
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>

<script>
    var element = document.getElementById('element-to-print');
    html2pdf(element, {
        margin: 10,
        filename: '<?php echo"".$_GET["printid"].".pdf"; ?>',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    });
</script>