<?php
    $sheba="ledger_class";
    $cid=1;
    $title="Add New Ledger Class";
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Ledger Classes</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Accounts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$sheba</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
        
            <div class='d-inline-block float-md-start me-1 mb-1 search-input-container border border-separator bg-foreground search-sm'>
                <input class='form-control form-control-sm datatable-search' onkeyup='myFunction()' placeholder='Search' data-datatable='#datatableStripe' id='myInput' style='width:100%'/>
                <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span>
                <span class='search-delete-icon d-none'><i data-acorn-icon='close'></i></span>                
            </div>
            
            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onclick=\"shiftdataV2('ledger_class_process.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\">
                <i data-acorn-icon='plus'></i><span>Add New</span>
            </button>

            <div class='btn-group ms-1 check-all-container'>
                <div class='d-inline-block'>
                    <a href='print_data.php?pointer=PRINT&printid=$sheba' target='dataprocessor' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'>
                        <i data-acorn-icon='print'></i>
                    </a>
                    
                    <div class='d-inline-block datatable-export' data-datatable='#datatableStripe'>                        
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
                                <a class='dropdown-item' href='#' onmouseover=\"document.CsvForm.pointer.value='CSV'\" onclick=\"document.CsvForm.submit()\">CSV</a>
                            </form>
                            
                        </div>
                    </div>
                    <div class='dropdown-as-select d-inline-block datatable-length' data-datatable='#datatableStripe'>
                        <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='SortForm'>
                            <input type='hidden' name='sortvalue' value='10000000'>
                            <button class='btn btn-outline-muted btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-bs-offset='0,3'>$sortset Items</button>
                            <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=10000000; document.SortForm.submit()\" onmouseup=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">All Data</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=5; document.SortForm.submit()\" onmouseup=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">5 Items</a>
                                <a class='dropdown-item active' href='#' onmouseover=\"document.SortForm.sortvalue.value=10; document.SortForm.submit()\" onmouseup=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">10 Items</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=25; document.SortForm.submit()\" onmouseup=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">25 Items</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=50; document.SortForm.submit()\" onmouseup=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">50 Items</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=100; document.SortForm.submit()\" onmouseup=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">100 Items</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                  
    </div>    
    <div class='data-table-rows slim' id='sample'>
        <body onload=\"shiftdataV2('ledger_class_data.php?cid=$cid&sheba=$sheba', 'datatableX')\">
        <div class='data-table-responsive-wrapper'>
            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                <tr>
                    <th onclick='sortTable(0)'>Id <i data-acorn-icon='sort' style='height:12px'></i></td>
                    <th onclick='sortTable(1)'>Class Name <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th onclick='sortTable(2)' >Debit <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th onclick='sortTable(3)' >Credit <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th onclick='sortTable(4)' >Status <i data-acorn-icon='sort' style='height:12px'></i></th>
                    <th >Action</th>                     
                </tr>
                <tbody id='datatableX'></tbody>
            </table>
        </div>
    </div>";    
?>