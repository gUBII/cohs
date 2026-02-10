<?php
    $sheba="ndis_invoices";
    $cid=1002;
    $title="Create Template";
    $utype="UNPAID INVOICES";
        
    if(isset($_GET["selection"])) $selection=$_GET["selection"];
    else $selection="INCOME";
    if(isset($_GET["statusupdate"])) $statusupdate=$_GET["statusupdate"];
    else $statusupdate=2;
    if(isset($_GET["poinz"])) $poinz=$_GET["poinz"];
    else $poinz=2;
    if(isset($_GET["lid"])) $lid=$_GET["lid"];
    else $lid=0;
    if(isset($_GET["cname"])) $cname=$_GET["cname"];
    else $cname=0;
    
    $todayx=time();
    if(isset($_GET["lid_date_from"]) && $_GET["lid_date_from"]!=0) $lid_date_from=$_GET["lid_date_from"];
    else $lid_date_from=date("Y-m-01", $todayx);
    $lid_date1=0;
    $lid_date1=strtotime($lid_date_from);
    if(isset($_GET["lid_date_to"]) && $_GET["lid_date_to"]!=0) $lid_date_to=$_GET["lid_date_to"];
    else $lid_date_to=date("Y-m-d", $todayx);
    $lid_date2=strtotime($lid_date_to);

    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>Paid Invoice</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>";
            if(isset($_GET["refby"])) $refby=$_GET["refby"];
            else $refby="";
            if(isset($_GET["cname"])) $cname=$_GET["cname"];
            else $cname="";
            if(isset($_COOKIE["projectidx"])){
                echo"<a href='index.php?url=projects.php&pstat=1' style='margin-right:10px'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Project Profile</span></button></a>";
            }
            
            
            if($mtype!="CLIENT"){
                if($_GET["clientid"]!=0){
                    echo"<a href='index.php?url=create_invoice.php&id=5161&invdate1=$lid_date_from&invdate2=$lid_date_to&clientid=".$_GET["clientid"]."' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Create Invoice</span>
                    </a>";
                }else{
                    echo"<a href='index.php?url=create_invoice.php&id=5161' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Create Invoice</span>
                    </a>";
                }
            }
            if($_GET["clientid"]!=0){
                echo"<a href='index.php?url=unpaid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=800000032&cname=$cname&refby=$refby&clientid=".$_GET["clientid"]."' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Unpaid</span>
                </a>";
            }else{
                echo"<a href='index.php?url=unpaid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=$yr-02-01&lid_date_to=$currentdate&lid=800000032&cname=$cname&refby=$refby' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Unpaid</span>
                </a>";
            }
            
        echo"</div>                
    </div>    
    <div class='col-lg-12'>
                <form method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                    
                    <input type='hidden' name='url' value='paid_invoices.php'>
                    <input type='hidden' name='id' value='5163'>
                    <input type='hidden' name='selection' value='INCOME'>
                    <input type='hidden' name='statusupdate' value='2'>
                    <input type='hidden' name='poinz' value='2'>
                    <input type='hidden' name='clientid' value='".$_GET["clientid"]."'>
                    <table style='width:100%'><tr>
                        <td align=left style='padding:10px'><label>From Date</label><br>
                            <input type='date' name='lid_date_from' value='$lid_date_from' class='form-control'>
                        </td>
                        <td align=left style='padding:10px'><label>To Date</label><br>
                            <input type='date' name='lid_date_to' value='$lid_date_to' class='form-control'>
                        </td>
                        <td align-left style='padding:10px'><label>Select Ledger A/c</label><br>
                            <select class='form-control' name='lid'>";
                                if(isset($_GET["lid"])){
                                    $r11 = "select * from accounts_ledger where id='".$_GET["lid"]."' order by ledger_name asc limit 1";
                                    $r11x = $conn->query($r11);
                                    if ($r11x->num_rows > 0) { while($r11y = $r11x -> fetch_assoc()) { echo"<option value='".$r11y["id"]."'>".$r11y["ledger_name"]."</option>"; } }
                                }
                                $r1 = "select * from accounts_ledger where balance_type='INCOME' order by ledger_name asc";
                                $r1xx = $conn->query($r1);
                                if ($r1xx->num_rows > 0) { while($r1yy = $r1xx -> fetch_assoc()) { echo"<option value='".$r1yy["id"]."'>".$r1yy["ledger_name"]."</option>"; } }
                            echo"</select>
                        </td>
                        <td align=left style='padding:10px'>
                            <label>Select Client/Participant</label><br>
                            <select class='form-control' name='cname' required style='width:100%'>";
                             
                             if($_GET["clientid"]!=0){
                                $r1x = "select * from uerp_user where id='".$_GET["clientid"]."' and mtype='CLIENT' and status='1' order by username asc limit 1";
                                $r1y = $conn->query($r1x);
                                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                    echo"<option value='".$r1z["id"]."'>".$r1z["username"]." ".$r1z["username2"]."</option>";
                                } }
                            }else{
                                echo"<option value='ALL'>All Clients</option>";
                                if($lim>=2) echo"<option value='ALL'>All Clients</option>";
                                $r1x = "select * from uerp_user where mtype='CLIENT' and status='1' order by username asc limit $lim";
                                $r1y = $conn->query($r1x);
                                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                    echo"<option value='".$r1z["id"]."'>".$r1z["username"]." ".$r1z["username2"]."</option>";
                                } }
                            }
                            echo"</select>
                        </td>
                        <td align=left style='padding:10px'>&nbsp;<br><input type='submit' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' value='Search'></td>
                    </tr></table>
                </form>
            </div>
    <div class='data-table-rows slim' id='sample'>

        <body onload=\"shiftdataV2('ledger_paid_invoices.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=$statusupdate&poinz=$poinz&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname', 'datatableX')\">";
        
        // <div class='data-table-responsive-wrapper' id='chartmodeX'></div>
        
        echo"<div class='data-table-responsive-wrapper'id='datatableX'></div>

    </div>";

?>