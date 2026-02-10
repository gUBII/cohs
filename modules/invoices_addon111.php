<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    
    // error_reporting(0);
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

    echo"<div class='offcanvas-body'>";
    
        // echo"randomid = ".$_GET["pid"]." and received_from = ".$_GET["rid"]."  and invoice_no2 = ".$_GET["sid"]."  and ledger_id = ".$_GET["lid"]." ";    
        
        echo"<table style='width:100%;padding:10px;background-color:grey'>";
            $ttx=0;
            $a1 = "select * from ndis_invoices_addon where randomid='".$_GET["pid"]."' and received_from='".$_GET["rid"]."' and invoice_no2='".$_GET["sid"]."' and ledger_id='".$_GET["lid"]."' order by id desc limit 1";
            $a1x = $conn->query($a1);
            if ($a1x->num_rows > 0) { while($a1y = $a1x -> fetch_assoc()) {
                echo"<form name='fromdateto' method='post' action='../invoiceprocessor.php' target='_self' enctype='multipart/form-data'>
                    <input type='hidden' name='processor' value='invoicedateupdate'><input type='hidden' name='id' value='".$a1y["id"]."'>
                    <input type='hidden' name='randomid' value='".$_GET["pid"]."'><input type='hidden' name='received_from' value='".$_GET["rid"]."'>
                    <input type='hidden' name='invoice_no2' value='".$_GET["sid"]."'><input type='hidden' name='ledger_id' value='".$_GET["lid"]."'>
                    <tr class='gradeX'><td colspan=10>&nbsp;</td></tr>
                    <tr class='gradeX' style='padding-top:20px;'>";
                        $dfrom=date("Y-m-d",$a1y["date_from"]);
                        $dto=date("Y-m-d",$a1y["date_to"]);
                        echo"<td nowrap align=center><b>Date From:</b></td>
                        <td nowrap align=left ><input type='date' name='date_from' value='$dfrom' class='form-control' style='padding:5px;width:100%'></td>
                        <td nowrap align=center><b>Date To:</b></td>
                        <td nowrap align=left><input type='date' name='date_to' value='$dto' style='padding:5px;width:100%' class='form-control'></td>
                        <td nowrap align=center >&nbsp;</td>
                        <td nowrap align=left>
                            <input type='submit' name='Update' value='Update' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' >
                        </td>
                        <td nowrap align=left>&nbsp;</td>
                    </tr>
                    <tr class='gradeX'><td colspan=10>&nbsp;</td></tr>
                </form>";
                //  onchange='document.fromdateto.submit()'
            } }
        echo"</table>
    
        <table class='table stripe table-hover'>
            <tbody>
                <tr><th>Date</th><th nowrap>Description</th><th nowrap>NDIS S.L.Item</th><th nowrap>Frequency</th><th nowrap>Rate</th><th nowrap>Amount</th><th nowrap></th></tr>";
                $ttx==0;
                $r1 = "select * from ndis_invoices_addon where randomid='".$_GET["pid"]."' and received_from='".$_GET["rid"]."' and invoice_no2='".$_GET["sid"]."' and ledger_id='".$_GET["lid"]."' order by id desc";
                $r1x = $conn->query($r1);
                if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                    $ttx=($ttx+1);
                    $dfromx=0;
                    $dfromx=date("Y-m-d",$r1y["date_from"]);
                    $dtox=0;
                    $dtox=date("Y-m-d",$r1y["date_to"]);
                    echo"<form name='form_$ttx' method='post' action='../invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='invoiceupdate'><input type='hidden' name='id' value='".$r1y["id"]."'>
                        <tr class='gradeX'>";
                            $listdate=date("Y-m-d",$r1y["receipt_date"]);
                            $dfrom=date("Y-m-d",$r1y["date_from"]);
                            $dto=date("Y-m-d",$r1y["date_to"]);
                            echo"<td nowrap align=left>";
                            if($_COOKIE["dbname"]=="saas_info_goodwillcare_net"){
                                echo"<input type='date' name='date_from' value='$dfrom' class='form-control' style='padding:5px;width:120px' onchange='document.form_$ttx.submit()'><br>
                                <input type='date' name='date_to' value='$dto' style='padding:5px;width:120px' class='form-control' onchange='document.form_$ttx.submit()'>";
                            }else{
                                echo"<input type='text' name='date_from' value='".$r1y["receipt_date"]."' class='form-control' style='padding:5px;width:120px' onchange='document.form_$ttx.submit()'><br>";
                            }
                            echo"</td>
                            
                            <td align=left><textarea class='form-control' style='width:100%;min-height:80px' name='note' onchange='document.form_$ttx.submit()'>".$r1y["narration"]."</textarea></td>
                            
                            <td nowrap align=left><input type='text' name='ndis_item' value='".$r1y["ndis_item"]."' class='form-control' style='padding:5px;width:100%' onchange='document.form_$ttx.submit()'></td>
                            
                            <td nowrap align=center><input type='text' name='thour' value='".$r1y["hours"]."' class='form-control' style='padding:5px;width:60px' onchange='document.form_$ttx.ttotal.value=(document.form_$ttx.trate.value*document.form_$ttx.thour.value);document.form_$ttx.submit()'></td>
                            
                            <td nowrap align=right><input type='text' name='trate' value='".$r1y["rate"]."' class='form-control' style='padding:5px;width:60px' onchange='document.form_$ttx.ttotal.value=(document.form_$ttx.trate.value*document.form_$ttx.thour.value);document.form_$ttx.submit()'></td>
                            
                            <td nowrap align=right><input type='text' name='ttotal' value='".$r1y["cr_amt"]."' class='form-control' readonly style='padding:5px;width:80px'></td>
                            
                            <td><a href='../deleterecords.php?tbl=ndis_invoices_addon&delid=".$r1y["id"]."&pid=".$_GET["pid"]."&rid=".$_GET["rid"]."&sid=".$_GET["sid"]."&lid=".$_GET["lid"]."' target='_self' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' >Del</a></td>
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