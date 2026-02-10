<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    

    error_reporting(0);
    
    include '../authenticator.php';
    date_default_timezone_set("Australia/Melbourne");

    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
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
    <script src='js/base/loader.js'></script>";

    echo"<div class='offcanvas-body'>
        <table class='table stripe table-hover'>
            <tbody>
                <tr><th>Date</th><th nowrap>Description</th><th nowrap>Item Number</th><th nowrap align=right>Frequency</th><th nowrap>Rate</th><th nowrap>Amount</th><th nowrap></th></tr>";
                $ttx=0;
                $r1 = "select * from receipt_voucher where invoice_no2='".$_GET["sid"]."' and ledger_id='".$_GET["lid"]."' and paid='1' and received_from='".$_GET["rid"]."' order by id desc";
                $r1x = $conn->query($r1);
                if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                    $ttx=($ttx+1);
                    $dfromx=0;
                    $dfromx=$r1y["date_from"];
                    $dtox=0;
                    $dtox=$r1y["date_to"];
                    echo"<tr class='gradeX'>";
                            $listdate=date("Y-m-d",$r1y["receipt_date"]);
                            $dfrom=$r1y["date_from"];
                            $dto=$r1y["date_to"];
                            echo"<td nowrap align=left style='font-size:8pt'>";
                                $t1x=rand(100000,999999);
                                $rdate=date("Y-m-d", $r1y["receipt_date"]);
                                echo"
                                <form name='form_$t1x' method='post' action='../accountsprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate'>
                                    <input type='hidden' name='id' value='".$r1y["id"]."'>
                                    <input type='hidden' name='pointer' value='1'>
                                    <input type='date' name='receipt_date' value='$rdate' class='form-control' style='padding:5px;width:120px' onchange='document.form_$t1x.submit()'><br>
                                </form>
                            </td>
                            
                            <td align=left style='font-size:8pt'>";
                                $t2x=rand(10000,99999);
                                echo"<form name='form_$t2x' method='post' action='../accountsprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate'>
                                    <input type='hidden' name='id' value='".$r1y["id"]."'>
                                    <input type='hidden' name='pointer' value='2'>
                                    <textarea class='form-control' style='width:100%;min-height:80px' name='note' onchange='document.form_$t2x.submit()'>".$r1y["narration"]."</textarea>
                                </form>
                            </td>
                            
                            <td align=left style='font-size:8pt'>";
                                $t3x=rand(1000,9999);
                                $t3xy=rand(1000000,9000000);
                                echo"<form name='form_$t3x' method='post' action='../accountsprocessor.php' target='_self' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate'>
                                    <input type='hidden' name='id' value='".$r1y["id"]."'>
                                    <input type='hidden' name='pointer' value='3'>
                                    <select class='form-select' name='ndis_item' style='padding:5px;max-width:300px;width:100%' onchange='document.form_$t3x.submit()'>
                                        <option value='".$r1y["ndis_item"]."'>".$r1y["ndis_item"]."</option>";
                                        $ln = "select * from ndis_line_numbers order by id asc";
                                        $ln1 = $conn_main->query($ln);
                                        if ($ln1->num_rows > 0) { while($ln2 = $ln1 -> fetch_assoc()) {
                                            echo"<option value='".$ln2["id"]."'>".$ln2["item_number"]." - ".$ln2["item_name"]." - National: $".$ln2["national"]."</option>";
                                        } }
                                    echo"</select>
                                    <input type='hidden' name='thour' value='".$r1y["hours"]."'>
                                    <input type='hidden' name='rid' value='".$_GET["rid"]."'><input type='hidden' name='lid' value='".$_GET["lid"]."'>
                                    <input type='hidden' name='sid' value='".$_GET["sid"]."'><input type='hidden' name='pid' value='".$_GET["pid"]."'>
                                </form>
                                
                                <form name='form_$t3xy' method='post' action='../accountsprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate'>
                                    <input type='hidden' name='id' value='".$r1y["id"]."'>
                                    <input type='hidden' name='pointer' value='5'>
                                    <select class='form-select' name='claim_type' style='padding:5px;max-width:300px;width:100%' onchange='document.form_$t3xy.submit()'>";
                                        
                                        if($r1y["claim_type"]=="DS") $longform="DS – Direct Service";
                                        if($r1y["claim_type"]=="NSDH") $longform="NSDH – Cancelled – No show (Health reason)";
                                        if($r1y["claim_type"]=="NSDF") $longform="NSDF – Cancelled – No show (Family issues)";
                                        if($r1y["claim_type"]=="NSDT") $longform="NSDT – Cancelled – No show (Transport issue)";
                                        if($r1y["claim_type"]=="NSDO") $longform="NSDO – Cancelled – No show (Other)";
                                        if($r1y["claim_type"]=="NRR") $longform="NRR – NDIS Required Report";
                                        if($r1y["claim_type"]=="PT") $longform="PT – Provider Travel";
                                        if($r1y["claim_type"]=="NF2F") $longform="NF2F – Non-Face-to-Face Services";
                                        if($r1y["claim_type"]=="TH") $longform="TH – Telehealth Supports";
                                        if($r1y["claim_type"]=="ISIL") $longform="ISIL – Irregular SIL Supports";
                                        
                                        if($r1y["claim_type"]=="DS") $longformvalue="DS";
                                        if($r1y["claim_type"]=="NSDH") $longformvalue="NSDH";
                                        if($r1y["claim_type"]=="NSDF") $longformvalue="NSDF";
                                        if($r1y["claim_type"]=="NSDT") $longformvalue="NSDT";
                                        if($r1y["claim_type"]=="NSDO") $longformvalue="NSDO";
                                        if($r1y["claim_type"]=="NRR") $longformvalue="NRR";
                                        if($r1y["claim_type"]=="PT") $longformvalue="PT";
                                        if($r1y["claim_type"]=="NF2F") $longformvalue="NF2F";
                                        if($r1y["claim_type"]=="TH") $longformvalue="TH";
                                        if($r1y["claim_type"]=="ISIL") $longformvalue="ISIL";
                                        
                                        echo"<option value='$longformvalue'>$longform</option>";
                                        
                                        echo"<option value='DS'>DS – Direct Service</option>
                                        <option value='NSDH'>NSDH – Cancelled – No show (Health reason)</option>
                                        <option value='NSDF'>NSDF – Cancelled – No show (Family issues)</option>
                                        <option value='NSDT'>NSDT – Cancelled – No show (Transport issue)</option>
                                        <option value='NSDO'>NSDO – Cancelled – No show (Other)</option>
                                        <option value='NRR'>NRR – NDIS Required Report</option>
                                        <option value='PT'>PT – Provider Travel</option>
                                        <option value='NF2F'>NF2F – Non-Face-to-Face Services</option>
                                        <option value='TH'>TH – Telehealth Supports</option>
                                        <option value='ISIL'>ISIL – Irregular SIL Supports</option>
                                    </select>
                                </form>
                            </td>
                            
                            <td align=right colspan=3 style='font-size:8pt'>";
                                $t4=rand(100,999);
                                echo"<form name='form_$t4' method='post' action='../accountsprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate'>
                                    <input type='hidden' name='id' value='".$r1y["id"]."'>
                                    <input type='hidden' name='pointer' value='4'>
                                    <table style='width:100%'><tr>
                                        <td nowrap align=right style='font-size:8pt'><input type='text' name='thour' value='".$r1y["hours"]."' class='form-control' style='padding:5px;width:100px' onchange='document.form_$t4.ttotal.value=(document.form_$t4.trate.value*document.form_$t4.thour.value); document.form_$t3x.thour.value=document.form_$t4.thour.value;document.form_$t4.submit()'>
                                        <td nowrap align=right style='font-size:8pt'><input type='text' name='trate' value='".$r1y["rate"]."' class='form-control' style='padding:5px;width:100px' onchange='document.form_$t4.ttotal.value=(document.form_$t4.trate.value*document.form_$t4.thour.value);document.form_$t4.submit()'></td>
                                        <td nowrap align=right style='font-size:8pt'><input type='text' name='ttotal' value='".$r1y["cr_amt"]."' class='form-control' readonly style='padding:5px;width:150px'></td>
                                    </tr></table>
                                </form>
                            </td>
                            
                            <td style='font-size:8pt'><a href='../deleterecords.php?tbl=receipt_voucher&delid=".$r1y["id"]."&pid=".$_GET["pid"]."&rid=".$_GET["rid"]."&sid=".$_GET["sid"]."&lid=".$_GET["lid"]."' target='_self' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' >Del</a></td>
                        </tr>
                    </form>";
                } }
            echo"</tbody>
        </table>
    </div>"; ?>

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
    
    