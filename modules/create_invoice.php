<!--- this script is for invoice number generation -->
<script>
    function updateInvoice() {
        let selectBox = document.getElementById("clientProject");
        let selectedValue = selectBox.value;
        let selectedText = selectBox.options[selectBox.selectedIndex].text;
        
        // generate random number (you can set range as needed)
        let randomNum = Math.floor(1000 + Math.random() * 9000);
        
        // build invoice numberf
        // let invoiceNo = "INV-" + selectedValue + "-" + selectedText + "-" + randomNum;
        let invoiceNo = "INV-" + selectedValue + "-" + randomNum;
        
        // update text box
        document.getElementById("invoice_no2").value = invoiceNo;
    }
</script>

<?php
    $sheba="ndis_invoices";
    $cid=1001;
    $title="Invoice Template";
    $utype="CREATE INVOICE";
    
    if(isset($_GET["invdate1"])) $invdate1=$_GET["invdate1"];
    else $invdate1 = 0;

    
    if(isset($_GET["invdate2"])) $invdate2=$_GET["invdate2"];
    else $invdate1 = 0;
    
    if(isset($_GET["clientid"])) $clientid=$_GET["clientid"];
    else $clientid=0;
    
    if(isset($_GET["refby"])) $refby=$_GET["refby"];
    else $refby=0;
    
    if(isset($_GET["cname"])) $cname=$_GET["cname"];
    else $cname=0;
    
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>Invoice (Create & Approval)</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>";
            
            if(isset($_COOKIE["projectidx"])){
                echo"<a href='index.php?url=projects.php&pstat=1' style='margin-right:10px'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Project Profile</span></button></a>";
            }
            
            echo"<button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' style='margin-right:10px' onclick=\"shiftdataV2('invoice_manager.php?cid=$cid&sheba=$sheba&ctitle=$title&utype=$utype&cname=$cname&clientid=$clientid&invdate1=$invdate1&invdate2=$invdate2', 'offcanvasRight')\">
                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>$title</span>
            </button>";
            
            $yr=date("Y");
            if(isset($_GET["invdate1"]) && isset($_GET["invdate2"]) && isset($_GET["clientid"])){                                                           
                echo"<a href='index.php?url=unpaid_invoices.php&id=5162&selection=INCOME&statusupdate=2&poinz=2&cid=1002&sheba=ndis_invoices&utype=UNPAID+INVOICES&lid_date_from=$invdate1&lid_date_to=$invdate2&lid=800000032&cname=$cname&refby=$refby&clientid=$clientid' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Unpaid</span>
                </a>";
                echo"<a href='index.php?url=paid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=$invdate1&lid_date_to=$invdate2&lid=800000032&cname=$cname&refby=$refby&clientid=$clientid' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Paid</span>
                </a>";
            }else{
                echo"<a href='index.php?url=unpaid_invoices.php&id=5162&selection=INCOME&statusupdate=2&poinz=2&cid=1002&sheba=ndis_invoices&utype=UNPAID+INVOICES&lid_date_from=$yr-01-01&lid_date_to=$currentdate&lid=800000032&cname=$cname&refby=$refby' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Unpaid</span>
                </a>";
                echo"<a href='index.php?url=paid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=$yr-02-01&lid_date_to=$currentdate&lid=800000032&cname=$cname&refby=$refby' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Paid</span>
                </a>";
            } 
        echo"</div>
    </div>    
    <div class='data-table-rows slim' id='sample'>
        <body onload=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype&cname=$cname&invdate1=$invdate1&invdate2=$invdate2&clientid=$clientid', 'datatableX')\">
        <div class='data-table-responsive-wrapper'id='datatableX'></div>
    </div>";
    
?>