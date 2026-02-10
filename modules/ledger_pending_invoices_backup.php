<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    
    include('../authenticator.php');
    $selection=$_GET["selection"];
    $statusupdate=$_GET["statusupdate"];
    $pointz=$_GET["poinz"];
    $poinz=$_GET["poinz"];
    $lid_date_from=$_GET["lid_date_from"];
    $lid_date_to=$_GET["lid_date_to"];
    $lid=$_GET["lid"];
    $cname=$_GET["cname"];   
    $cid=$_GET["cid"];
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];

    $todayx=time();
    if(isset($_GET["lid_date_from"]) && $_GET["lid_date_from"]!=0) $lid_date_from=$_GET["lid_date_from"];
    else $lid_date_from=date("Y-m-01", $todayx);
    $lid_date1=0;
    $lid_date1=strtotime($lid_date_from);
    
    if(isset($_GET["lid_date_to"]) && $_GET["lid_date_to"]!=0) $lid_date_to=$_GET["lid_date_to"];
    else $lid_date_to=date("Y-m-d", $todayx);
    $lid_date2=strtotime($lid_date_to);
    
    echo"<div class='row'>
            <div class='col-lg-12' style='padding:20px'>";
            
                if($mtype!="CLIENT") echo"<a href='modules/myob_invoice_export.php?xid=ALL' target='dataprocessor' id='downloadBtn' class='btn btn-outline-primary' >Download MYOB File</a>";
                
                echo"<div class='data-table-rows slim' id='sample'>
                    <div class='data-table-responsive-wrapper'>
                    
                        <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <tr>
                            <th><input type='checkbox' onclick='toggleAll(this)'></th>
                            <th onclick='sortTable(0)'>Invoice ID <i data-acorn-icon='sort' style='height:12px'></i></td>
                            <th onclick='sortTable(6)'>Card ID <i data-acorn-icon='sort' style='height:12px'></i></td>
                            <th onclick='sortTable(1)'>Post Date <i data-acorn-icon='sort' style='height:12px'></i></th>
                            <th onclick='sortTable(2)'>Template ID. <i data-acorn-icon='sort' style='height:12px'></i></th>
                            <th onclick='sortTable(3)'>Invoice No. <i data-acorn-icon='sort' style='height:12px'></i></th>
                            <th onclick='sortTable(4)'>Client Name <i data-acorn-icon='sort' style='height:12px'></i></th>
                            <th onclick='sortTable(5)' style='text-align:right'>Amount <i data-acorn-icon='sort' style='height:12px'></i></th>
                            <th>&nbsp;</th>
                        </tr>
                        <tbody><div class='card-body' style='width:98%'>";
                    
                            if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
                            if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
                        
                            if(isset($userid)){

                                $tty=0;
                                $grosspaid=0;
                                if(isset($_GET["cname"])){
                                    if(strlen($_GET["cname"])>=3) $cname=$_GET["cname"];
                                    else $cname="ALL";
                                }else $cname="ALL";

                                if(isset($_GET["lid"])) $lid=$_GET["lid"];
                                else $lid=0;
                                
                                // echo"".$_GET["selection"].",".$_GET["statusupdate"].",".$_GET["poinz"].",".$_GET["lid_date_from"].",".$_GET["lid_date_to"].",".$_GET["lid"].",".$_GET["cname"]."";
                                if($lid>=0){
                                    $ts=0;
                                    if($cname=="ALL") $s = "select * from receipt_voucher where ledger_id='$lid' and receipt_date>='$lid_date1' and receipt_date<='$lid_date2' and invoice_no<>'0' and paid='1' group by invoice_no";                            
                                    else $s = "select * from receipt_voucher where received_from='$cname' and ledger_id='$lid' and receipt_date>='$lid_date1' and receipt_date<='$lid_date2' and invoice_no<>'0' and paid='1' group by invoice_no";
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
                                        // $s1 = "select * from receipt_voucher where invoice_no='".$rs["invoice_no"]."' and id='".$rs["id"]."' and paid='1' order by id desc";
                                        $s1 = "select * from receipt_voucher where invoice_no='".$rs["invoice_no"]."' and ledger_id='".$rs["ledger_id"]."' and paid='1' order by ledger_id desc";
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
                                            $cp_phone=$r1z["cp_phone2"];
                                            $cp_email=$r1z["cp_email"];
                                            $client_ndis_number=$r1z["ndis_number"];
                                            if($client_ndis_number==0) $client_ndis_number="";
                                        } }
                                        
                                        $invoiceprint="printinv".$rs["id"]."";
                                        
                                        $randomid=rand(100000000000,999999999999);
                                        
                                        $ts=($ts+1);
                                        $ttx="collapse$ts";
                                        $printdiv="collapse$ts";
                                        
                                        if($_GET["selection"]=="INCOME"){
                                            
                                            echo"<tr class='' style='width:100%'>
                                                <td><input type='checkbox' class='row-checkbox' onclick='return false;'></td>
                                                <td class='text-alternate' align='left' style='width:150px;'>".$rs["invoice_no"]."</td>
                                                <td class='text-alternate' align='left' style='width:150px;'>".$rs["cc_code"]."</td>
                                                <td class='text-alternate' align='left' style='width:150px;'>$date</td>
                                                <td class='text-alternate' align='left' style='width:150px;'>".$rs["randomid"]."</td>
                                                <td class='text-alternate' align='left' style='width:150px;'>".$rs["invoice_no2"]."</td>
                                                <td class='text-alternate' align='left' style='width:300px;'>$clientname</td>
                                                <td class='text-alternate' align='right' style='width:100px;'><b>";
                                                    setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                                    $payable= $totpaid;
                                                    $grosspaid=($grosspaid+$totpaid);
                                                    echo"$csymbol $payable</b>
                                                </td>
                                                <td class='text-alternate' align='center' style='width:100px;'>";
                                                    if($mtype!="CLIENT"){
                                                        echo"<button class='btn btn-outline-primary' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3' style='font-size:10pt;'><i class='fa-solid fa-bars'></i></button>
                                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('ledger_pending_invoices.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=1&poinz=2&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname', 'datatableX')\">
                                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('ledger_invoice_view.php?pid=".$rs["id"]."-1', 'offcanvasTop2')\">View/Edit Invoice</a>";
                                                            if($status=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('suppliers_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                                            else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('suppliers_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                                            
                                                            echo"<a class='dropdown-item' style='cursor: pointer' href='invoiceprocessor.php?processor=invoicepaymentgenerator&lid=".$_GET["lid"]."&sid=".$rs["invoice_no"]."&cname=".$rs["received_from"]."&dfrom=".$_GET["lid_date_from"]."&dto=".$_GET["lid_date_to"]."&id=5162&url=unpaid_invoices.php&utype=".$_GET["utype"]."&selection=".$_GET["selection"]."&statusupdate=".$_GET["statusupdate"]."&poinz=".$_GET["poinz"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&refby=".$_GET["sheba"]."' target='dataprocessor'>Mark as Paid</a>
                                                            
                                                            <a class='dropdown-item' style='cursor: pointer' href='modules/myob_invoice_export.php?pid=".$rs["id"]."-1' target='dataprocessor'>Generate MYOB Text File</a>
                                                            
                                                            ";                                
                                                        echo"</div>";
                                                    }
                                                echo"</td>
                                            </tr>";
                                        }
                                        
                                    } }
                                
                                    echo"<div class='panel panel-default'><div class='panel-heading'>
                                        <table style='width:100%'><tr>
                                            <td align='left' style='width:150px;'> </td>
                                            <td align='left' style='width:150px;'> </td>
                                            <td align='left' style='width:150px;'> </td>
                                            <td align='left' style='width:150px;'> </td>
                                            <td align='left' style='width:300px;'> </td>
                                            <td align='right' nowrap style='padding-right:20px;font-size:16pt'><b>";
                                                setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                                $grosspaid1= $grosspaid;
                                                echo"Total: $grosspaid1</b>
                                            </td>
                                            <td align='center' style='width:100px;'> </td>
                                        </tr></table>
                                    </div></div>";
                                }
                            }
                        echo"</div></tbody>
                    </table>";
                    
                    // ALL INVOICE EDIT
                    echo"<div class='modal inmodal cardt' id='pendingforms' tabindex='-1' role='dialog' aria-hidden='true'>
                        <div class='modal-dialog modal-lg'>
                            <div class='modal-content animated bounceInUp' style='text-align:left'>
                                <div id='datatargetZ' style='padding:0px'></div>"; ?>
                                <script type="text/javascript">
                                    function getDataXYZ(employeeid,datatargetZ){
                                        $.ajax({
                                            url: 'ledger_invoice_view.php?<?php echo"selection=".$_GET["selection"]."&" ?>cid='+employeeid, 
                                            success: function(html) {
                                                var ajaxDisplay = document.getElementById(datatargetZ);
                                                ajaxDisplay.innerHTML = html;
                                            }
                                        });
                                    }
                                </script> <?php
                            echo"</div>
                        </div>
                    </div>";
                    
                echo"</div>
            </div>
    </div><br><br><br><br><br><br>";
?>
