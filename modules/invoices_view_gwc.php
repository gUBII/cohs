<link rel='preconnect' href='https://fonts.gstatic.com' />
<link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
<link rel='stylesheet' href='../font/CS-Interface/style.css' />
<link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
<link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
<link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
<link rel='stylesheet' href='../css/vendor/introjs.min.css' />
<link rel='stylesheet' href='../css/vendor/select2.min.css' />
<link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
<link rel='stylesheet' href='../css/vendor/datatables.min.css' />
<link rel='stylesheet' href='../css/vendor/plyr.css' />
<link rel='stylesheet' href='../css/styles.css' />
<link rel='stylesheet' href='../css/main.css' />        
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='../js/base/loader.js'></script>
<div class='offcanvas-header'>
    <h5 id='offcanvasRightLabel'>Invoice Viewer</h5>
    <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
</div>
<div class='offcanvas-body'>
<?php
    error_reporting(0);
    
    include('../authenticator.php');
    
    if(isset($_COOKIE["userid"])){
        $s7 = "select * from theme where id='1' order by id asc limit 1";
        $r7 = $conn->query($s7);
        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
            $topbar_color=$rs7["topbar_color"];
            $tbtc=$rs7["topbar_text_color"];
        } }
        $idtotal=strlen($_GET["pid"]);
        $idstatus=0;
        $idtotal1=($idtotal-1);
        $idstatus=substr($_GET["pid"],$idtotal1,1);
        
        $pid=0;
        $idtotal2=($idtotal-2);
        $pid=substr($_GET["pid"],0,$idtotal2);
        // echo"$pid and $idstatus";
        
        $s = "select * from ndis_invoices where id='$pid' order by id limit 1";
        $r = $conn->query($s);
        if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
            
            $datatargetX="category".$rs["id"]."X";
            $datatargetXX="category".$rs["id"]."XX";
            $datatargetY="category".$rs["id"]."Y";
            $datatargetZ="category".$rs["id"]."Z";
            $categoryX="cat".$rs["id"]."Z";
            $categoryY="cat".$rs["id"]."Y";
            $t=$rs["id"];
            
            $totpaid=0;
            $s1 = "select * from ndis_invoices where invoice_no='".$rs["invoice_no"]."' order by invoice_no";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["cr_amt"]+$totpaid); } }
            
            $date=date("d-M-Y",$rs["receipt_date"]);

            $clientname="";
            $cp_phone="";
            $client_ndis_number="";
            $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                $clientphone=$r1z["phone"];
                $clientemail=$r1z["email"];
                
                $cp_name=$r1z["pm_name"];
                $cp_phone=$r1z["pm_mobile"];
                $cp_email=$r1z["pm_email"];
                
                // $cp_name=$r1z["cp_name"];
                // $cp_phone=$r1z["cp_phone1"];
                // $cp_email=$r1z["cp_email"];
                
                // $client_ndis_number=$r1z["ndis_number"];
                $client_ndis_number=$r1z["ndis"];
                if($client_ndis_number==0) $client_ndis_number="";
            } }
            
            $invoiceprint="printinv".$rs["id"]."";
            
            $randomid=rand(100000000000,999999999999);
        
            if($idstatus==1){
                echo"<div class='panel-body' style='background-color:white;padding:20px;'>
                    <table style='width:100%;border-color:#FFFFFF;padding:10px'>
                        <tr style='background-color:#FFFFFF'>
                            <td valign=middle align=left><span style='font-size:20pt;color:black'>INVOICE</span></td>
                            <td style='width:25%' align=right><img src='$logo_dark' style='width:200px'><br></td>
                        </tr><tr style='background-color:#FFFFFF'>
                            <td align=left valign=top style='font-size:8pt;width:50%'>
                                <span style='font-size:10pt;color:black'>
                                    <b>$companynamex</b><br>
                                    <b>ABN</b> $abn_number<br>
                                    <b>Address:</b> $addressx, $cityx, $statex-$postalcodex, $countryx.<br>
                                    <b>Phone:</b> $phonex<br>
                                    <b>Email:</b> $emailx<br><br>
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
                                    <b>NDIS Number:</b> $client_ndis_number<br>
                                </span>
                            </td>
                        </tr>
                        <tr><td colspan=10>
                            <table class='table stripe table-hover' style='width:100%;padding:10px;background-color:white'>
                                <thead><tr style='background-color:#cccccc;color:black'>
                                    <th nowrap style='color:black'>Dt.From</th><th nowrap style='color:black'>Dt.To</th>
                                    <th nowrap style='color:black'>Description</th><th nowrap style='color:black'>NDIS S.L.Item</th>
                                    <th nowrap style='text-align:center;color:black'>Frequency</th>
                                    <th nowrap style='text-align:right;color:black'>Rate</th>
                                    <th nowrap style='text-align:right;color:black'>Amount</th>
                                </tr></thead>
                                <tbody>";
                                    $ttx1=0;
                                    $r1 = "select * from ndis_invoices_addon where randomid='".$rs["id"]."' and received_from='".$rs["received_from"]."' and invoice_no2='".$rs["invoice_no2"]."' and ledger_id='".$rs["ledger_id"]."' order by id desc";
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
                                                $ratez= $r1y["rate"];
                                                echo"$ratez
                                            </td><td nowrap align=right style='font-size:10pt;color:black'><b>";
                                                setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                                $amountz=0;
                                                $amountz= $r1y["cr_amt"];
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
                                            $invoice_total= $ttx1;
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
                                <b>ACCOUNT NAME:</b> $companynamex<br>
                                <b>BSB:</b> $bsb_number<br>
                                <b>ACCOUNT:</b> $ac_number<hr>
                                A full list of codes and description of these line items can be found in the Price Guide of the NDIS, available at
                                <b>https://www.ndis.gov.au/providers/pricing-and-payment.html</b>
                            </span>
                        </td></tr>
                    </table><hr>
                    <center><table>
                        
                        <tr>
                            <td align=center style='width:33%'>
                                <form method='post' action='./modules/invoices_print.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='invoiceid' value='".$rs["invoice_no"]."'>
                                    <input type='hidden' name='ledgerid' value='".$rs["ledger_id"]."'>
                                    <input type='hidden' name='nid' value='".$rs["id"]."'>
                                    
                                    <input type='submit' class='btn btn-warning' style='margin-top:0px;color:$topbar_color' value='Print Invoice'>
                                </form>
                            </td><td align=center style='width:33%'>
                                <form method='POST' action='invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoicegenerator'>
                                    <input type='hidden' name='invoice_no2' value='".$rs["invoice_no2"]."'>
                                    <input type='hidden' name='invoice_no' value='".$rs["invoice_no"]."'>
                                    <input type='hidden' name='ledger_id' value='".$rs["ledger_id"]."'>
                                    <input type='hidden' name='nid' value='".$rs["id"]."'>
                                    <input type='hidden' name='ndate' value='".$rs["receipt_date"]."'>
                                    <input type='submit' class='btn btn-info' style='margin-top:0px;color:$topbar_color' value='Generate & Send to Unpaid Invoice'>
                                </form>
                            </td><td align=center style='width:33%'>
                                <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('invoice_table.php?cid=1001&sheba=ndis_invoices&utype=CREATE INVOICE', 'datatableX')\">Close</button></center>
                            </td>";
                            /*
                            <td align=center style='width:33%'>
                                <form method='POST' action='invoices_email.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='invoice_no2' value='".$rs["invoice_no2"]."'>
                                    <input type='hidden' name='ledger_id' value='".$rs["ledger_id"]."'>
                                    <input type='hidden' name='nid' value='".$rs["id"]."'>
                                    <input type='hidden' name='randomid' value='$randomid'>
                                    <input type='hidden' name='pid' value='<b>$companyname</b><br>ABN : $abn_number<br>Address: $addressxyz, $cityx, $statex-$postalcodex, $countryx.<br>Phone: $phonexyz<br>Email: $emailxyz'>
                                    <input type='hidden' name='sname' value='' class='form-control' required>
                                    <input type='hidden' name='semail' value='".$rs["invoice_receiver"]."' class='form-control' required>
                                    <input type='submit' class='btn btn-success' style='margin-top:0px;color:white'  value='Send Email to ".$rs["invoice_receiver"]." (OFF)'>
                                </form>
                            </td>";
                            */
                            /*<td align=center style='width:25%'>
                                <a href='#' onclick=''>
                                    <input type='button' class='btn btn-danger' style='margin-top:0px;color:white' value='Payment Received'>
                                </a>
                            </td>*/
                        echo"</tr>
                        
                    </table></center><hr>
                </div>";
            }else{
                echo"<div class='row' style='margin-left:0px;width:100%;padding:5px;'>";
                    $tdate=time();
                    $invdate=date("Y-m-d", $tdate);
                    $invdate1=date("Y-m-d", $tdate);
                    $invdate2=date("Y-m-d", $tdate);
                    $invno=0;
                    $rates=0;
                    $rr = "select * from ndis_invoices where id='$pid' and paid='1' order by id desc limit 1";
                    $rr1 = $conn->query($rr);
                    if ($rr1->num_rows > 0) { while($rr11 = $rr1 -> fetch_assoc()) {
                        $invno=$rr11["invoice_no"];
                        $invno2=$rr11["invoice_no2"];
                        $invdate=date("Y-m-d", $rr11["receipt_date"]);
                        $invdate1=date("Y-m-d", $rr11["date_from"]);
                        $invdate2=date("Y-m-d", $rr11["date_to"]);
                        $ndis_item=$rr11["ndis_item"];
                        $rates=$rr11["rate"];
                        $notes=$rr11["narration"];
                        $participantid=$rr11["received_from"];
                        $identifier=$rr11["identifier"];
                        $randomidz=$rr11["randomid"];
                        $lid=$rr11["ledger_id"];
                        $rx = "select * from accounts_ledger where ledger_id='$lid' order by ledger_id desc limit 1";
                        $rx1 = $conn->query($rx);
                        if ($rx1->num_rows > 0) { while($rx11 = $rx1 -> fetch_assoc()) { $lidname=$rx11["ledger_name"]; } }
                    } }
                        
                    echo"<div class='col-lg-12'><center><h2>Editing Invoice # $invno<br></h5></center><hr></div>
                    <form class='m-t' id='InvoiceEditForm' name='xcarbon1' role='form2' method='post' action='accountsprocessor.php' id='schedule-form' target='invoicedatax' enctype='multipart/form-data'>    
                        <div class='row' style='margin-left:0px;width:100%;padding:0px;'>
                            <div class='col-lg-2'>Invoice Number<br><input type='text' class='form-control' name='invoice_no' value='$invno' readonly></div>
                            <div class='col-lg-3'>$lidname Invoice Number<br><input type='text' class='form-control' name='invoice_no2' value='$invno2' onchange='document.xcarbon1.submit()'></div>
                            <div class='col-lg-3'>Invoice Date<br><input type='date' class=form-control name='idate' value='$invdate' required onchange='document.xcarbon1.submit()'></div>
                            <div class='col-lg-4'>Participant Name<br>
                                <select class='form-control m-b required' name='participant' style='height:38px' required onchange='document.xcarbon1.submit()'>";
                                    $r2 = "select * from uerp_user where id='$participantid' and mtype='CLIENT' order by username asc limit 1";
                                    $r22 = $conn->query($r2);
                                    if ($r22->num_rows > 0) { while($r222 = $r22 -> fetch_assoc()) { echo"<option value='".$r222["id"]."'>".$r222["username"]." ".$r222["username2"]."</option>"; } }
                                echo"</select>
                                <input type='hidden' name='processor' value='editinvoice1'>
                                <input type='hidden' name='pointer' value='1'>
                                <input type='hidden' name='employeeid' value='".$_COOKIE["userid"]."'>
                                <input type='hidden' name='selection' value='$identifier'>
                                <input type='hidden' name='randomidz' value='$randomidz'>
                                <input type='hidden' name='ledger_id' value='$lid'>
                            </div>
                        </div>
                    </form>
                    
                    <form class='m-t' id='InvoiceEditForm' name='xcarbon' role='form2' method='post' action='accountsprocessor.php' id='schedule-form' target='invoicedatax' enctype='multipart/form-data'>
                        <div class='row' style='margin-left:0px;width:100%;padding:5px;'>
                            <div class='col-lg-3'>Date From<br><input type='date' class='form-control' name='date_from' value='$invdate1'></div>
                            <div class='col-lg-3'>Date To<br><input type='date' class='form-control' name='date_to' value='$invdate2' onclicking=\"getDataX('".$_GET["lid"]."', 'datatargetX')\"></div>
                            <div class='col-lg-3'>NDIS Support Line Item<br><input type='text' class='form-control' name='ndis_item' value='$ndis_item'></div>
                            <div class='col-lg-3'>Rate Per Frequency<br><input type='text' class='form-control' name='rates' value='$rates' onchange='document.xcarbon.cr_amt.value=(document.xcarbon.rates.value*document.xcarbon.hours.value)'></div>
                            <div class='col-md-10'><div class='form-group'><br><label>Description</label><input type='text' class='form-control' name='note' value='$notes'></div></div>
                            <div class='col-lg-2'>&nbsp;&nbsp;<br><br>
                                <input type='submit' class='btn btn-primary' value='Add' onmouseover='document.xcarbon.cr_amt.value=(document.xcarbon.rates.value*document.xcarbon.hours.value)' style='width:100%;height:40px;margin-left:-10px;margin-top:5px;'>
                                <input type='hidden' name='processor' value='editinvoice'>
                                <input type='hidden' name='pointer' value='1'>
                                <input type='hidden' name='employeeid' value='".$_COOKIE["userid"]."'>
                                <input type='hidden' name='selection' value='$identifier'>
                                <input type='hidden' name='randomidz' value='$randomidz'>
                                <input type='hidden' name='ledger_id' value='$lid'>
                                <input type='hidden' class='form-control' name='invoice_no' value='$invno'>
                                <input type='hidden' class='form-control' name='participant' value='$participantid'>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div style='width:100%;padding:0px'>
                    <iframe name='invoicedatax' src='ledger_forms_addon_edit.php?lid=$lid&sid=$invno' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='250'>BROWSER NOT SUPPORTED</iframe>
                    <center><br>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>
                </div>";
            }
        } }
    }
?>
</div>

<script src="../js/vendor/jquery-3.5.1.min.js"></script>
    <script src="../js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../js/vendor/OverlayScrollbars.min.js"></script>
    <script src="../js/vendor/autoComplete.min.js"></script>
    <script src="../js/vendor/clamp.min.js"></script>
    <script src="../icon/acorn-icons.js"></script>
    <script src="../icon/acorn-icons-interface.js"></script>
    <script src="../js/vendor/Chart.bundle.min.js"></script>
    <script src="../js/base/helpers.js"></script>
    <script src="../js/base/globals.js"></script>
    <script src="../js/base/nav.js"></script>
    <script src="../js/base/search.js"></script>
    <script src="../js/base/settings.js"></script>
    <script src="../js/cs/charts.extend.js"></script>
    <script src="../js/pages/profile.standard.js"></script>
    <script src="../js/common.js"></script>
    <script src="../js/scripts.js"></script>