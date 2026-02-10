<?php
    require_once '../authenticator.php';
    echo"<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
    <body onload='printDiv()'>
        <div class='data-table-rows slim' id='element-to-print'>
            <div class='data-table-responsive-wrapper'>";
            
                if(isset($_GET["dfrom"])){ 
                    $datefrom=date('d-m-Y', strtotime($_GET["dfrom"]));
                    $dfromv=date('Y-m-d H:i:s', strtotime($_GET["dfrom"] . ' -1 day'));
                    $dfromv=strtotime($dfromv);
                    $dateto=date('d-m-Y', strtotime($_GET["dto"]));
                    $dtov=date('Y-m-d H:i:s', strtotime($_GET["dto"] . ' +1 day'));
                    $dtov=strtotime($dtov);
                }else{
                    $ttime=time();
                    $ttime=date("Y-m-d H:i:s", $ttime);
                    $dfromv=date('Y-m-d H:i:s', strtotime($ttime . ' -1 day'));
                    $dfromv=strtotime($dfromv);
                    $dtov=date('Y-m-d H:i:s', strtotime($ttime . ' +1 day'));
                    $dtov=strtotime($dtov);
                }
                
                $globalpaid=0;
                $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no<>'0' group by invoice_no";
                $r = $conn->query($s);
                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                    $totpaid=0;
                    $s1 = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no='".$rs["invoice_no"]."' order by invoice_no";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["dr_amt"]+$totpaid); } }
                    
                    $globalpaid=($globalpaid+$totpaid);
                    
                    $pdate="";    
                    $pdate=date("d-M-Y",$rs["payment_date"]);
                    
                    $clientname="";
                    $r1x = "select * from uerp_user where id='".$rs["paid_to"]."' order by id asc limit 1";
                    $r1y = $conn->query($r1x);
                    if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname="".$r1z["username"]." ".$r1z["username2"].""; } }
                    
                    $employeename="";
                    $r2x = "select * from uerp_user where id='".$rs["employeeid"]."' order by id asc limit 1";
                    $r2y = $conn->query($r2x);
                    if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                        $employeename="".$r2z["username"]." ".$r2z["username2"]."";
                        $employeeaddress="".$r2z["address"].", ".$r2z["city"].", ".$r2z["area"].", ".$r2z["zip"].", ".$r2z["country"]."";
                        $employeephone=$r2z["phone"];
                    } }
                    
                    $myexperienceX="myexperienceX".$rs["id"]."";
                    $myexperienceY="myexperienceY".$rs["id"]."";
                    
                    $payable = sprintf("$%.2f", $totpaid);
                    $totpaidx = sprintf("$%.2f", $totpaid);
                    
                    echo"<table style='width:100%;border-color:#FFFFFF;padding:10px'>
                        <tr style='background-color:#FFFFFF'>
                            <td style='width:50%' align=left><img src='../$logo_dark' style='width:100px'><br></td>
                            <td align=right style='font-size:8pt;width:50%'>
                                <b>$companynamex</b><br>ABN: $abn_number<br>
                                $addressx, $cityx, $statex-$postalcodex, $countryx<br>
                                Email: $emailx<br>Phone: $phonex
                            </td>
                        </tr><tr>
                            <td align=left style='font-size:8pt;width:50%'><br><b>$employeename</b><br>$employeeaddress<br>$employeephone</td>
                            <td style='width:50%' align=right>
                                <table>
                                    <tr><td style='font-size:8pt' align=right>Payment Date</td><td style='font-size:8pt'>:</td><td style='font-size:8pt' align=right  nowrap><b>$pdate</b></td></tr>
                                    <tr><td style='font-size:8pt' align=right>Gross Earning</td><td style='font-size:8pt'>:</td><td style='font-size:8pt' align=right><b>$payable</b></td></tr>
                                </table>
                            </td>
                        </tr>
                    </table><hr>
                    <table style='width:100%'>
                        <thead><tr>
                            <td align=left nowrap style='font-size:8pt'><b>Shift ID</b></td>
                            <td align=left style='font-size:8pt'><b>Particulars</b></td>
                            <td align=right nowrap style='font-size:8pt'><b>Paid Amount</b></td>
                        </tr></thead>
                        <tbody>";
                            $s3 = "select * from payment_voucher where employeeid='".$rs["employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_no='".$rs["invoice_no"]."' order by invoice_no";
                            $r3 = $conn->query($s3);
                            if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
                                $paidamount=($dr_amt+$paidamount);
                                echo"<tr>
                                    <td align=left nowrap valign=top style='font-size:8pt'><b>".$rs3["invoice_no"]."-".$rs3["payroll_id"]."</b></td>
                                    <td align=left style='font-size:8pt'>";
                                        $s4 = "select * from shifting_allocation where id='".$rs3["payroll_id"]."' order by id desc limit 1";
                                        $r4 = $conn->query($s4);
                                        if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) { 
                                            $sdate="";
                                            $sdate=date("l, d-m-Y", $rs4["sdate"]);
                                            $thw=$rs4["sdate"];
                                            $tow=$rs4["sdate"];
                                            echo"<span style='font-size:8pt'>$sdate</span><br>";
                                        } }
                                        echo"".$rs3["narration"]."
                                    </td> 
                                    <td align=right nowrap valign=top style='font-size:10pt'><b>$".$rs3["dr_amt"]."</b></td>
                                </tr>";
                            } }
                            
                            echo"<tr><td align=left style='font-size:8pt' colspan=5><hr></td></tr>
                            <tr>
                                <td align=left style='font-size:8pt'></td>
                                <td align=right style='font-size:8pt'><b>Total Paid :</b></td>
                                <td align=right style='font-size:10pt'><b>$payable</b></td>
                            </tr>
                            <tr><td align=left style='font-size:8pt' colspan=5><hr></td></tr>
                        </tbody>
                    </table>";
                } }
            echo"</div>
        </div>
    </body>"; ?>
    
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
            filename: '<?php echo"$employeename-".$_GET["dfrom"]."-".$_GET["dto"].".pdf"; ?>',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    </script>