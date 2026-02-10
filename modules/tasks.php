<?php

    $sheba="task_manager";
    $cid=9001;
    $title="Add New Task";
    $utype="tasks";
    
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Task Manager</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
              <ul class='breadcrumb pt-0'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
              echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
          <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=$cid&sheba=$sheba&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
            <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>$title</span>
          </button>
          <a href='index.php?url=schedule.php'>
            <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
              <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Shifting Schedule</span>
            </button>
          </a>
          <a href='index.php?url=daily_schedules.php&id=5206'>
            <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
              <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Daily Shift Status</span>
            </button>
          </a>
          

            <div class='btn-group ms-1 check-all-container'>
                <div class='d-inline-block'>
                    
                    <table><tr><td nowrap>
                        <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ChartModeForm'>
                            <input type='hidden' name='chartmode' value='1'>
                            <a onmouseover=\"document.ChartModeForm.submit()\" onmouseup=\"shiftdataV2('chart_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='chart-4'></i></a>
                        </form>
                    </td><td nowrap>
                        <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ViewModeForm'>
                            <input type='hidden' name='viewmode' value='LIST'>
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
    <div class='data-table-rows slim' id='sample'>";

        // <body onload=\"shiftdataV2('chart_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX'); shiftdataV2('task_manager_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">
        
        echo"<div class='data-table-responsive-wrapper' id='chartmodeX'></div>
        <div class='data-table-responsive-wrapper'id='datatableX'>";
          include 'task_manager_data.php';
          // <iframe name='taskprocessor' src='modules/task_manager_data.php' height='500' width='100%' scrolling='yes' border='0' frameborder='0'>&nbsp;</iframe>
        echo"</div>

    </div>";
?>
    