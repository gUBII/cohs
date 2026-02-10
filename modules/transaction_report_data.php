<?php
    include("../authenticator.php");
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='card-body' style='margin-top:-65px;width:100%'>";
        
        if(isset($_COOKIE["filter_date_from"])){
            $fdate = date('Y-m-d', strtotime($_COOKIE["filter_date_from"] . ' - 1 days')); 
            $fdate=strtotime($fdate);
        } else $fdate=time();
        if(isset($_COOKIE["filter_date_to"])){
            $tdate = date('Y-m-d', strtotime($_COOKIE["filter_date_to"] . ' + 1 days')); 
            $tdate=strtotime($tdate);
        } else $tdate=time();

        $sheba=$_GET["sheba"];             
        $title="Edit Payment Voucher";
        $bc=0;
        $bcolor="#000000";
        $totalpaid=0;
        $totalreceived=0;
        
        $s1 = "select * from payment_voucher where payment_date>'$fdate' and payment_date<'$tdate' and  order by id asc limit $sortset";
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
                <td class='text-alternate' align=left>
                    ".$rs1["invoice_no2"]."-".$rs1["invoice_no"]."";
                    // echo", <br>".$rs1["narration"]."";
                echo"</td>
                <td class='text-alternate' align=left>$paidtoname</td>
                <td class='text-alternate' align=left>$ledgername</td>                    
                <td class='text-alternate' align=right>$csymbol 0.00</td>
                <td class='text-alternate' align=right>$csymbol ".$rs1["dr_amt"]."</td>                    
                <td class='text-alternate' align=center>".$rs1["status"]."</td>
            </tr>";
            $totalpaid=($totalpaid+$rs1["dr_amt"]);
        } }

        $s11 = "select * from receipt_voucher where receipt_date>'$fdate' and receipt_date<'$tdate' order by id asc limit $sortset";
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
                <td class='text-alternate' align=left>".$rs11["invoice_no2"]."-".$rs11["invoice_no"]."";
                    // echo", <br>".$rs11["narration"]."";
                echo"</td>
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
        </tr>
    </div>";
?>