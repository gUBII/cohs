<?php
    $sheba="service_offered";
    $cid=350;
    $title="Add New Service";
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Services Pricing</h1>
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
            
            <div class='btn-group ms-1 check-all-container'>
                <div class='d-inline-block'>
                    <div class='d-inline-block datatable-export' data-datatable='#datatableStripe'>
                        <button class='btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                            <i data-acorn-icon='sort'></i>
                        </button>
                        <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                            <button class='dropdown-item' onclick='sortTable0()'type='button'>ID</button>
                            <button class='dropdown-item' onclick='sortTable1()'type='button'>Name</button>
                            <button class='dropdown-item' onclick='sortTable2()'type='button'>Parent</button>
                            <button class='dropdown-item' onclick='sortTable4()'type='button'>Status</button>
                        </div>
                    </div>

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
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=10000000; document.SortForm.submit()\" onmouseup=\"shiftdataV2('chart_of_accounts_table.php?cid=$cid&sheba=$sheba', 'datatableX')\">All Data</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=5; document.SortForm.submit()\" onmouseup=\"shiftdataV2('chart_of_accounts_table.php?cid=$cid&sheba=$sheba', 'datatableX')\">5 Items</a>
                                <a class='dropdown-item active' href='#' onmouseover=\"document.SortForm.sortvalue.value=10; document.SortForm.submit()\" onmouseup=\"shiftdataV2('chart_of_accounts_table.php?cid=$cid&sheba=$sheba', 'datatableX')\">10 Items</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=25; document.SortForm.submit()\" onmouseup=\"shiftdataV2('chart_of_accounts_table.php?cid=$cid&sheba=$sheba', 'datatableX')\">25 Items</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=50; document.SortForm.submit()\" onmouseup=\"shiftdataV2('chart_of_accounts_table.php?cid=$cid&sheba=$sheba', 'datatableX')\">50 Items</a>
                                <a class='dropdown-item' href='#' onmouseover=\"document.SortForm.sortvalue.value=100; document.SortForm.submit()\" onmouseup=\"shiftdataV2('chart_of_accounts_table.php?cid=$cid&sheba=$sheba', 'datatableX')\">100 Items</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>                  
    </div>    
    <div class='data-table-rows slim' id='sample'>
        
        <div class='data-table-responsive-wrapper'>
            <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                <thead><tr>
                    <th class='text-muted text-small text-uppercase'>Service Name</th>
                    <th class='text-muted text-small text-uppercase'>Effective Date</th>
                    <th class='text-muted text-small text-uppercase'>Price Units</th>
                    <th class='text-muted text-small text-uppercase'>Note</th>
                    <th class='text-muted text-small text-uppercase'>Mon-Fri (Normal Trading)</th>
                    <th class='text-muted text-small text-uppercase'>Mon-Fri (Afterhours)</th>
                    <th class='text-muted text-small text-uppercase'>Saturday</th>
                    <th class='text-muted text-small text-uppercase'>Sunday</th>
                    <th class='text-muted text-small text-uppercase'>Public Holiday</th>
                    <th class='text-muted text-small text-uppercase'>Cancellation Fee</th>
                </tr></thead>
                <tbody class='list-unstyled' id='page_list'>";
                    $ms1 = "select * from service_offered where parent='0' order by name asc";
                    $ms11 = $conn->query($ms1);
                    if ($ms11->num_rows > 0) { while($ms111 = $ms11 -> fetch_assoc()) {
                        $rand=rand(100000,999999);
                        $lastid=$ms111["id"];
                        $cdate=date("d-m-Y", time());
                        echo"<tr class='zoom' id='".$ms111["id"]."' style='width:100%'>
                            <td class='text-alternate'>".$ms111["name"]."</th>
                            <td class='text-alternate'><input class='form-control' type=text value='$cdate'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["price_type"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["note"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["mon_fri_normal"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["mon_fri_afterhour"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["sat"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["sun"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["public_holiday"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms111["cancellation_fee"]."'></th>
                            
                        </tr>";
                        $ms2 = "select * from service_offered where parent='$lastid' order by name asc limit 3";
                        $ms22 = $conn->query($ms2);
                        if ($ms22->num_rows > 0) { while($ms222 = $ms22 -> fetch_assoc()) {
                            $rand=rand(100000,999999);
                            $lastid=$ms222["id"];
                            echo"<tr class='zoom' id='".$ms222["id"]."' style='width:100%'>
                            <td class='text-alternate'>".$ms222["name"]."</th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["effective_date"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["price_type"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["note"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["mon_fri_normal"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["mon_fri_afterhour"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["sat"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["sun"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["public_holiday"]."'></th>
                            <td class='text-alternate'><input class='form-control' type=text value='".$ms222["cancellation_fee"]."'></th>
                        </tr>";
                        }}
                    } }
                
               echo"</tbody>
            </table>
        </div>
    </div>";    
?>