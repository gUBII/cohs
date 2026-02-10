<?php
    error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    
    include('../authenticator.php');
    
    $todayx=time();
    if(isset($_GET["lid_date_from"])) $lid_date_from=$_GET["lid_date_from"];
    else $lid_date_from=date("Y-m-d", $todayx);
    $lid_date1=0;
    $lid_date1=strtotime($lid_date_from);
    
    if(isset($_GET["lid_date_to"])) $lid_date_to=$_GET["lid_date_to"];
    else $lid_date_to=date("Y-m-d", $todayx);
    $lid_date2=strtotime($lid_date_to);
    
    echo"<div class='row'>
            
            
            <div class='col-lg-12' style='padding:0px'>
                <div class='panel-group' id='accordion'>
                    <table style='width:100%;margin-bottom:15px'>
                        <tr>
                            <td align='left' style='width:150px;'>Invoice ID</td>
                            <td align='left' style='width:150px;'>Post Date</td>
                            <td align='left' style='width:150px;'>Template ID</td> 
                            <td align='left' style='width:150px;'>Invoice No.</td>
                            <td align='left' style='width:300px;'>Client Name</td>
                            <td align='left' style='width:300px;'>Total Received</td>
                            <td align='center' style='width:50px;'>&nbsp;</td>
                            <td align='center' style='width:50px;'>&nbsp;</td>
                            <td align='center' >&nbsp;</td>
                        </tr>
                    </table>";
                    
                    if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
                	if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
                
                    if(isset($userid)){

                        $tty=0;
                        $grosspaid=0;
                        if(isset($_GET["cname"])) $cname=$_GET["cname"];
                        else $cname="ALL";

                        if(isset($_GET["lid"])) $lid=$_GET["lid"];
                        else $lid=0;
                        
                        // echo"".$_GET["selection"].",".$_GET["statusupdate"].",".$_GET["poinz"].",".$_GET["lid_date_from"].",".$_GET["lid_date_to"].",".$_GET["lid"].",".$_GET["cname"]."";
                        
                        if($lid>=0){
                            $ts=0;
                            if($cname=="ALL") $s = "select * from receipt_voucher where ledger_id='$lid' and receipt_date>='$lid_date1' and receipt_date<='$lid_date2' and invoice_no<>'0' and paid='10' group by invoice_no";                            
                            else $s = "select * from receipt_voucher where received_from='$cname' and ledger_id='$lid' and receipt_date>='$lid_date1' and receipt_date<='$lid_date2' and invoice_no<>'0' and paid='10' group by invoice_no";
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
                                $s1 = "select * from receipt_voucher where invoice_no='".$rs["invoice_no"]."' and ledger_id='".$rs["ledger_id"]."' and paid='10' order by ledger_id desc";
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
                                    
                                    echo"<table style='width:100%;margin-bottom:10px'>
                                        <tr>
                                            <td align='left' style='width:150px;'>".$rs["invoice_no"]."</td>
                                            <td align='left' style='width:150px;'>$date</td>
                                            <td align='left' style='width:150px;'>".$rs["randomid"]."</td>
                                            <td align='left' style='width:150px;'>".$rs["invoice_no2"]."</td>
                                            <td align='left' style='width:300px;'>$clientname</td>
                                            <td align='right' style='width:100px;'><b>";
                                                setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                                $payable= $totpaid;
                                                $grosspaid=($grosspaid+$totpaid);
                                                echo"$ $payable</b>
                                            </td>
                                            <td align='center' style='width:100px;'>
                                                <a data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('ledger_invoice_view.php?viewer=10&pid=".$rs["id"]."-1', 'offcanvasTop2')\" class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm'>View</a>
                                            </td>
                                            <td align='center' style='width:100px;'>
                                                <a href='deleterecord.php?delinvoiceidx=".$rs["invoice_no"]."&id=".$rs["invoice_no2"]."&tbl=receipt_voucher&lid_date_from=".$_GET["lid_date_from"]."&lid_date_to=".$_GET["lid_date_to"]."&lid=".$_GET["lid"]."&cname=".$_GET["cname"]."&statusupdate=2' target='dataprocessor' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm'>Delete</a>
                                            </td>
                                            <td align='center' style='width:100px;'>
                                                <a href='invoiceprocessor.php?processor=invoicepaymentreversegenerator&url=paid_invoices.php&sid=".$rs["invoice_no"]."&id=5163&selection=INCOME&statusupdate=".$_GET["statusupdate"]."&poinz=2&dfrom=".$_GET["lid_date_from"]."&dto=".$_GET["lid_date_to"]."&lid=".$_GET["lid"]."&cname=".$_GET["cname"]."' target='dataprocessor' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm'>UnPaid</a>
                                            </td>
                                        </tr>
                                    </table>";                                    
                                }
                                
                            } }
                        
                            echo"<div class='panel panel-default'><div class='panel-heading'>
                                <table style='width:100%'><tr>
                                    <td align='left' style='width:150px;'> </td>
                                    <td align='left' style='width:150px;'> </td>
                                    <td align='left' style='width:150px;'> </td>
                                    <td align='left' style='width:150px;'> </td>
                                    <td align='left' style='width:300px;'> </td>
                                    <td align='right' nowrap style='font-size:16pt'><b>";
                                        setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                        $grosspaid1= $grosspaid;
                                        echo"Total: $grosspaid1</b>
                                    </td>
                                    <td align='center' style='width:100px;'> </td>
                                    <td align='center' style='width:100px;'> </td>
                                    <td align='center' style='width:100px;'> </td>
                                </tr></table>
                            </div></div>";
                        }
                        
                    }
                    
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