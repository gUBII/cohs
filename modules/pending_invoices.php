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
    if(isset($_GET["lid_date_to"])) $lid_date_from=$_GET["lid_date_from"];
    else $lid_date_from=0;
    if(isset($_GET["lid_date_to"])) $lid_date_to=$_GET["lid_date_to"];
    else $lid_date_to=0;
    if(isset($_GET["lid"])) $lid=$_GET["lid"];
    else $lid=0;
    if(isset($_GET["cname"])) $cname=$_GET["cname"];
    else $cname=0;

    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>Pending Invoices</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>

            <div class='btn-group ms-1 check-all-container'>
                <div class='d-inline-block'>
                    
                    <table><tr><td nowrap>
                        <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ChartModeForm'>
                            <input type='hidden' name='chartmode' value='1'>
                            <a onmouseover=\"document.ChartModeForm.submit()\" onmouseup=\"shiftdataV2('chart_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='chart-4'></i></a>
                        </form>
                    </td><td nowrap>
                        <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ViewModeForm'>
                            <input type='hidden' name='viewmode' value='LIST'>
                            <a onmouseover=\"document.ViewModeForm.viewmode.value='LIST'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('ledger_pending_invoices.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=$statusupdate&poinz=$poinz&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname&lim=1', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='list'></i></a>
                            <a onmouseover=\"document.ViewModeForm.viewmode.value='CARD'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('ledger_pending_invoices.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=$statusupdate&poinz=$poinz&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname&lim=1', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='grid-3'></i></a>                        
                            <a href='print_data.php?pointer=PRINT&printid=$sheba' target='dataprocessor' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='print'></i></a>
                        </form>
                    </td><td nowrap>
                        <div class='d-inline-block datatable-export' data-datatable='#datatableStripe' style='margin-top:-15px;margin-left:4px'>
                            <button class='btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                                <i data-acorn-icon='download'></i>
                            </button>
                            <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                <form method='get' action='print_data.php' target='dataprocessor' enctype='multipart/form-data' name='PrintForm'>
                                    <input type='hidden' name='pointer' value='PDF'><input type='hidden' name='printid' value='$sheba'>
                                    <a class='dropdown-item' href='#' onmouseover=\"document.PrintForm.pointer.value='PDF'\" onclick=\"document.PrintForm.submit()\">Pdf</a>                                
                                </form>
                                <a id='notifyButtonBottomLeft' href='#' onclick=\"CopyToClipboard('sample');return false;\">Copy</a>
                                <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='ExcelForm'>
                                    <input type='hidden' name='pointer' value='EXCEL'><input type='hidden' name='printid' value='$sheba'>
                                    <a class='dropdown-item' href='#' onmouseover=\"document.ExcelForm.pointer.value='EXCEL'\" onclick=\"document.ExcelForm.submit()\">Excel</a>
                                </form>
                                <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='CsvForm'>
                                    <input type='hidden' name='pointer' value='CSV'><input type='hidden' name='printid' value='$sheba'>
                                    <a class='dropdown-item' href='#' onmouseover=\"document.CsvForm.pointer.value='CSV'\" onclick=\"document.CsvForm.submit()\">Csv</a>
                                </form>
                                
                            </div>
                        </div>
                    </td></tr></table>
                </div>
            </div>
        </div>                  
    </div>    
    <div class='data-table-rows slim' id='sample'>

        <body onload=\"shiftdataV2('chart_table.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=$statusupdate&poinz=$poinz&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname', 'chartmodeX'); shiftdataV2('ledger_pending_invoices.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=$statusupdate&poinz=$poinz&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname&lim=1', 'datatableX')\">";
        
        // <div class='data-table-responsive-wrapper' id='chartmodeX'></div>
        
        echo"<div class='data-table-responsive-wrapper'id='datatableX'></div>

    </div>";

/*

if($invoice_status==3){
        echo"<div class='row wrapper border-bottom white-bg page-heading'>
            <div class='col-lg-12'>
                <h2>Paid Invoices</h2>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                    <li class='breadcrumb-item active'><strong>Reporting Form</strong></li>";
                    if(isset($kroyee)) echo"<li class='breadcrumb-item active'><strong>$kroyee</strong></li>";
                echo"</ol>
            </div>
        </div>
        <br>
        <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px;background-color:white;text-align:center'>
            <div class='panel-body' style='padding-left:5px;padding-right:5px'>";
                include("ledger_closed_invoices.php");
            echo"</div>
        </div><br><br>";
    }
*/  
?>