<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body style='background-color:white'>
<?php
    error_reporting(0); 
    date_default_timezone_set("Australia/Melbourne");
    include("authenticator.php");
    if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
    if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
    // if(isset($userid)){
        echo"".$_GET["printid"]."";
    
        $s7 = "select * from theme where id='1' order by id asc limit 1";
        $r7 = $conn->query($s7);
        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
            $topbar_color=$rs7["topbar_color"];
            $tbtc=$rs7["topbar_text_color"];
        } }
        
        $s = "select * from receipt_voucher where ledger_id='".$_GET["lid"]."' and invoice_no='".$_GET["iid"]."' and randomid='".$_GET["token"]."' order by id asc limit 1";
        $r = $conn->query($s);
        if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
            $totpaid=0;
            $s1 = "select * from receipt_voucher where invoice_no='".$rs["invoice_no"]."' order by invoice_no";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["cr_amt"]+$totpaid); } }
            
            $date=date("d-M-Y",$rs["receipt_date"]);
            
            $clientname="";
            $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                $clientphone=$r1z["phone"];
                $clientemail=$r1z["email"];
                $cp_name=$r1z["cp_name"];
                $cp_phone=$r1z["cp_phone1"];
                $cp_email=$r1z["cp_email"];
                $ndis_number=$r1z["uid"];
            } }
            
            echo"<div id='element-to-print'>
                <table style='width:100%;border-color:#FFFFFF;padding:10px'>
                    <tr style='background-color:#FFFFFF'>
                        <td valign=middle align=left><span style='font-size:20pt;color:black'>INVOICE</span></td>
                        <td style='width:25%' align=right><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:100px'><br></td>
                    </tr><tr style='background-color:#FFFFFF'>
                        <td align=left valign=top style='font-size:8pt;width:50%'>
                            <span style='font-size:10pt;color:black'>
                                <b>$companyname</b><br>
                                <b>ABN</b> $abn_number<br>
                                <b>Address:</b> $addressxyz, $cityx, $statex-$postalcodex, $countryx.<br>
                                <b>Phone:</b> $phonexyz<br>
                                <b>Email:</b> $emailxyz<br><br>
                                                        
                                <b>To:</b> $cp_name<br>
                                <b>Ph:</b> $cp_phone<br>
                                <b>Email:</b> $cp_email<br>
                            </span>
                        </td>
                        <td align=right valign=top style='font-size:8pt;width:50%'>
                            <span style='font-size:10pt;color:black'>
                                <b>Invoice Number:</b> ".$rs["invoice_no2"]."<br>
                                <b>Invoice Date:</b> $date<br>
                                <b>Due Date:</b> 7 days of invoice.<br>
                                <b>NDIS Participant:</b> $clientname<br>
                                <b>NDIS Number:</b> $ndis_number<br>
                            </span>
                        </td>
                    </tr>
                    <tr><td colspan=10>
                        <table class='table stripe table-hover' style='width:100%;padding:10px;background-color:white'>
                            <thead><tr style='background-color:#cccccc'><th nowrap>Dt.From</th><th nowrap>Dt.To</th><th nowrap>Description</th><th nowrap>NDIS S.L.Item</th><th nowrap>Frequency</th><th nowrap>Rate</th><th nowrap>Amount</th></tr></thead>
                            <tbody>";
                                $ttx1==0;
                                $r1 = "select * from receipt_voucher where invoice_no='".$rs["invoice_no"]."' and ledger_id='".$rs["ledger_id"]."' and paid='1' order by ledger_id desc";
                                $r1x = $conn->query($r1);
                                if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                    echo"<tr class='gradeX'>";
                                        $dfrom=date("d-m-Y",$r1y["date_from"]);
                                        $dto=date("d-m-Y",$r1y["date_to"]);
                                        echo"<td nowrap align=left style='font-size:10pt;color:black'>$dfrom </td>
                                        <td align=left nowrap style='font-size:10pt;color:black'>$dto</td>
                                        <td align=left style='font-size:10pt;color:black'>".$r1y["narration"]."</td>
                                        <td nowrap align=left style='font-size:10pt;color:black'>".$r1y["ndis_item"]."</td>
                                        <td nowrap align=center style='font-size:10pt;color:black'>".$r1y["hours"]."</td>
                                        <td nowrap align=right style='font-size:10pt;color:black'>";
                                            $ratez=0;
                                            setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                            $ratez= money_format('%.2n', $r1y["rate"]);
                                            echo"$ratez
                                        </td><td nowrap align=right style='font-size:10pt;color:black'><b>";
                                            setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                            $amountz=0;
                                            $amountz= money_format('%.2n', $r1y["cr_amt"]);
                                            echo"$amountz</b>
                                        </td>
                                    </tr>";
                                    $ttx1=($r1y["cr_amt"]+$ttx1);
                                } }
                                echo"<tr class='gradeX' style='background-color:#eeeeee'>
                                    <td nowrap align=right style='font-size:10pt;color:black' colspan=6>Invoice Total</td>
                                    <td nowrap align=right style='font-size:12pt;color:black'><b>";
                                        $invoice_total=0;
                                        setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                        $invoice_total= money_format('%.2n', $ttx1);
                                        echo"$invoice_total</b>";
                                        $ttx1=0;
                                    echo"</td>
                                </tr>";
                            echo"</tbody>
                        </table>
                    </td></tr>
                    <tr><td colspan=10><br><br>
                        <span style='font-size:10pt;color:black'>
                            PLEASE MAKE PAYMENT TO:<br>
                            <b>ACCOUNT NAME:</b> $companyname<br>
                            <b>BSB:</b> $bsb_number<br>
                            <b>ACCOUNT:</b> $ac_number<hr>
                            A full list of codes and description of these line items can be found in the Price Guide of the NDIS, available at
                            <b>https://www.ndis.gov.au/providers/pricing-and-payment.html</b>
                        </span>
                    </td></tr>
                </table><hr>
            </div>";
        } }
    // }
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
        filename: 'ndis_invoice.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    });
</script>