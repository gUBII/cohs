<?php
    include("../authenticator.php");

    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    $clientid=$_GET["clientid"];
    
        // echo"$sheba, $utype, $title, $cid";
        
        if($cid=="1001"){
            
            if(isset($_GET["invdate1"])) $cdate=$_GET["invdate1"];
            else $cdate=date("Y-m-d", time());
            
            if(isset($_GET["invdate2"])) $edate=$_GET["invdate2"];
            else $edate=date("Y-m-d", time());
            
            echo"<div class='card' style='padding:5px;margin-bottom:10px'>
                <div class='row'>";
                    /*
                        <div class='col-12 col-md-6' style='text-align:left'>
                            <form method='post' action='invoiceprocessor12312313123123.php' target='dataprocessor' enctype='multipart/form-data' >
                                <table><tr><td nowrap>Bulk Date & Inv. # Update:</td><td nowrap>
                                    <input type='date' name='invdate' value='$cdate' class='form-control btn-sm' style='width:130px'>
                                </td><td nowrap>
                                    <input type='text' value='+1' name='invno' readonly class='form-control btn-sm' style='width:50px'>
                                </td><td nowrap>
                                    <input type='hidden' value='bulkinvoiceupdate' name='processor'>
                                    <input type='submit' value='Go' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                </td></tr></table>
                            </form>
                        </div>
                    */
                    
                    echo"<div class='col-12 col-md-12' style='text-align:left'>
                        <form method='get' action='index.php' target='_top' enctype='multipart/form-data' >
                            <table align=right><tr>
                                <td nowrap style='font-size:8pt'>
                                    <input type='date' name='invdate1' value='$cdate' class='form-control btn-sm' style='width:130px' title='From Date' required>
                                </td>
                                <td nowrap style='font-size:8pt'>
                                    <input type='date' name='invdate2' value='$edate' class='form-control btn-sm' style='width:130px' title='To Date' required>
                                </td>
                                <td nowrap style='font-size:8pt'>
                                    <select class='form-control btn-sm' name='clientid' title='Select Client'>
                                        <option value='0'>All Client</option>";
                                        if(!isset($_GET["clientid"])) echo"<option value='0'>All Client</option>";
                                        
                                        $c1 = "select * from uerp_user where mtype='CLIENT' order by username asc";
                                        $c11 = $conn->query($c1);
                                        if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) {
                                            if(isset($_GET["clientid"]) && $c111["id"]==$_GET["clientid"]) echo"<option value='".$c111["id"]."' selected>".$c111["username"]." ".$c111["username2"]."</option>";
                                            else echo"<option value='".$c111["id"]."'>".$c111["username"]." ".$c111["username2"]."</option>";
                                        } }
                                    echo"</select>
                                </td>
                                <td nowrap style='font-size:8pt'>
                                    <input type=hidden name='url' value='create_invoice.php'><input type=hidden name='id' value='5161'>
                                    <input type='submit' value='Search' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                    <a href='index.php?url=create_invoice.php&id=5161' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm'>Reset</a>
                                </td>
                            </tr></table>
                        </form>
                    </div>
                </div>
            </div>";
            
            if(isset($_GET["invdate1"])) $invdate1=strtotime($_GET["invdate1"]);
            if(isset($_GET["invdate2"])) $invdate2=strtotime($_GET["invdate2"]);
            
            $tty=0;
            if($_GET["invdate1"]!=0 && $_GET["invdate2"]!=0){
                if($_GET["clientid"]==0){
                    // $s = "select * from ndis_invoices where receipt_date>='$invdate1' and receipt_date<='$invdate2' and paid='0' order by id desc";
                    $s = "select * from ndis_invoices where paid='0' order by id desc";
                }else{
                    // $s = "select * from ndis_invoices where receipt_date>='$invdate1' and receipt_date<='$invdate2' and received_from='".$_GET["clientid"]."' and paid='0' order by id desc";
                    $s = "select * from ndis_invoices where received_from='".$_GET["clientid"]."' and paid='0' order by id desc";
                }
            }else{
                if(strlen($_GET["clientid"])>=3) $s = "select * from ndis_invoices where received_from='".$_GET["client"]."' and paid='0' order by id desc";
                else  $s = "select * from ndis_invoices where paid='0' order by id desc";
            }
            $r = $conn->query($s);
            if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                $ttx=($ttx+1);
                $tty=($tty+10);
                $ttz=($ttz+100);
                $ttw=($ttw+1000);
                $ttv=($ttv+10000);
                $date=date("Y-m-d",$rs["receipt_date"]);
                
                $clientname="";
                $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
                $r1y = $conn->query($r1x);
                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                    $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                } }
                
                $myexperienceX="myexperienceX".$rs["id"]."";
                $myexperienceY="myexperienceY".$rs["id"]."";
                
                echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                    <div class='card-body mb-n2 border-last-none' style='width:100%;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px'>
                        <div class='row' style='width:100%'>
                            <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                <form name='form_$tty' method='post' action='invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate1'><input type='hidden' name='id' value='".$rs["id"]."'>
                                    <input type='hidden' name='pointer' value='2'>
                                    <label>Invoice #:</label><br>
                                    <input type='hidden' readonly name='invoice_number' value='".$rs["invoice_no2"]."' class='form-control' style='padding:5px;width:100%' onchange='document.form_$tty.submit()'>
                                    <span style='font-size:15pt'>".$rs["invoice_no2"]."</span>
                                </form>
                            </div>
                            
                            <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                <form name='form_$ttx' method='post' action='invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate1'><input type='hidden' name='id' value='".$rs["id"]."'>
                                    <input type='hidden' name='pointer' value='5'>
                                    <label>Card ID:</label><br>
                                    <select class='form-control m-b required ' name='invoice_no' style='padding:5px;width:100%' onchange='document.form_$ttx.submit()'>";
                                        $ra1 = "select * from ndis_card_number where status='1' order by id desc";
                                        $rb1 = $conn->query($ra1);
                                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                            if($rs["invoice_no"]==$rab1["id"]) echo"<option selected value='".$rab1["id"]."'>".$rab1["referrer"]." (".$rab1["card_number"].")</option>";
                                            else echo"<option value='".$rab1["id"]."'>".$rab1["referrer"]." (".$rab1["card_number"].")</option>";
                                        } }
                                    echo"</select>
                                </form>
                            </div>
                            <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                <form name='form_$ttv' method='post' action='invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate1'><input type='hidden' name='id' value='".$rs["id"]."'>
                                    <input type='hidden' name='pointer' value='1'>
                                    <label>Invoice Date: </label><br>
                                    <table style='width:100%'><tr><td><input type='date' name='invoice_date' value='$date' class='form-control' style='padding:5px;width:100%'></td>
                                    <td style='width:10px'><input class='btn btn-primary btn-sm' type=submit value='Go'></td></tr></table>
                                </form>
                            </div>
                            <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                <form name='form_$ttz' method='post' action='invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate1'><input type='hidden' name='id' value='".$rs["id"]."'>
                                    <input type='hidden' name='pointer' value='3'>
                                    <label>Client Name: </label><br>
                                    <select class='form-control' name='cname' required style='width:100%' onchange='document.form_$ttz.submit()'>
                                        <option value='".$rs["received_from"]."'>$clientname</option>
                                    </select>
                                </form>
                            </div>
                            <div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                <form name='form_$ttw' method='post' action='invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='invoiceupdate1'><input type='hidden' name='id' value='".$rs["id"]."'>
                                    <input type='hidden' name='pointer' value='4'>
                                    <label>Email Address: </label><br>
                                    <input type='email' required name='invoice_receiver' value='".$rs["invoice_receiver"]."' class='form-control' style='padding:5px;width:100%' onchange='document.form_$ttw.submit()'>
                                </form>    
                            </div>
                            <div class='col-12 col-md-1' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                                <label>Status: </label><br>";
                                if($rs["status"]==1) $stat="ON";
                                else $stat="OFF";
                                echo"$stat
                            </div>
                            <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:4px;margin-top:25px'>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                    <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                    <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype&invdate1=".$_GET["invdate1"]."&invdate2=".$_GET["invdate2"]."&clientid=".$_GET["clientid"]."&url=create_invoice.php&id=5161', 'datatableX')\" style='box-shadow: 0px 0px 5px 1px grey'>
                                        
                                        <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('invoice_manager.php?cid=$cid&sheba=$sheba&pid=".$rs["id"]."-1&ctitle=$title&utype=$utype&invdate1=".$_GET["invdate1"]."&invdate2=".$_GET["invdate2"]."&clientid=".$_GET["clientid"]."', 'offcanvasTop2')\" onmouseover=\"shiftdataV2('blank.php', 'offcanvasTop2')\">
                                            <input type='button' class='btn btn-outline-warning' style='margin-top:0px;width:100%' value='Add Payment'>
                                        </a>";
                                        /*
                                        <a class='dropdown-item'  style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onclick=\"shiftdataV2('invoice_manager.php?cid=$cid&sheba=$sheba&pid=".$rs["id"]."-1&ctitle=$title&utype=$utype&invdate1=".$_GET["invdate1"]."&invdate2=".$_GET["invdate2"]."&clientid=".$_GET["clientid"]."', 'offcanvasTop2')\" onmouseover=\"shiftdataV2('blank.php', 'offcanvasTop2')\">
                                            <input type='button' class='btn btn-outline-success' style='margin-top:0px;width:100%' value='View Invoice'>
                                        </a>
                                        */
                                        echo"<form method='POST' action='invoiceprocessor.php' target='dataprocessor' enctype='multipart/form-data' style='margin-top:8px;margin-bottom:5px'>
                                            <input type='hidden' name='processor' value='invoicegenerator'>
                                            <input type='hidden' name='invoice_no2' value='".$rs["invoice_no2"]."'>
                                            <input type='hidden' name='invoice_no' value='".$rs["invoice_no"]."'>
                                            <input type='hidden' name='ledger_id' value='".$rs["ledger_id"]."'>
                                            <input type='hidden' name='nid' value='".$rs["id"]."'>
                                            <input type='hidden' name='ndate' value='".$rs["receipt_date"]."'>
                                            <center><input type='submit' class='btn btn-outline-info' style='margin-top:0px;width:80%' value='Send to Unpaid' onmouseup=\"setTimeout(function() { shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype&invdate1=".$_GET["invdate1"]."&invdate2=".$_GET["invdate2"]."&clientid=".$_GET["clientid"]."&url=create_invoice.php&id=5161', 'datatableX'); }, 3000)\"></center>
                                        </form>";
                                        
                                        if($stat=="ON"){
                                            echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=".$rs["id"]."' target='dataprocessor' onblur=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype&invdate1=".$_GET["invdate1"]."&invdate2=".$_GET["invdate2"]."&clientid=".$_GET["clientid"]."&url=create_invoice.php&id=5161', 'datatableX')\">
                                                <input type='button' class='btn btn-outline-primary' style='margin-top:0px;width:100%' value='Suspend'>
                                            </a>";
                                        }else{
                                            echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=".$rs["id"]."' target='dataprocessor' onblur=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype&invdate1=".$_GET["invdate1"]."&invdate2=".$_GET["invdate2"]."&clientid=".$_GET["clientid"]."&url=create_invoice.php&id=5161', 'datatableX')\">
                                                <input type='button' class='btn btn-outline-primary' style='margin-top:0px;width:100%' value='Activate'>
                                            </a>";
                                        }
                                        
                                        echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=invoice_table&cid=$cid&delid=".$rs["id"]."&tbl=$sheba&utype=$utype&sourceid=id', 'offcanvasTop')\">
                                            <input type='button' class='btn btn-outline-danger' style='margin-top:0px;width:100%' value='Delete'>
                                        </a>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>";
                 
                echo"<div class='modal inmodal' id='$myexperienceX' tabindex='-1' role='dialog' aria-hidden='true'>
                    <div class='modal-dialog'><div class='modal-content animated bounceInUp' style='padding:20px'><b>Note:</b><br>".$rs["narration"]."</div></div>
                </div>";
            } }
        }

    echo"</div>";