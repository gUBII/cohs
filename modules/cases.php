<?php 
$sheba="eod";
$cid=7;
$title="Add New Client/Participant";
$utype="EOD";
$designation=6;

echo"<div class='row'>
    <div class='col-12 col-md-5' style='padding-bottom:10px'>
        
        <h1 class='mb-0 pb-0 display-4' id='title'>CASE Reporting</h1>
    
        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
            <ul class='breadcrumb pt-0'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
            echo"</ul>
        </nav>
    </div>
    <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
    
        <div class='d-inline-block float-md-start me-1 mb-1 search-input-container border border-separator bg-foreground search-sm'>
            <input class='form-control form-control-sm datatable-search' onkeyup='myFunction()' placeholder='Search' data-datatable='#datatableStripe' id='myInput' style='width:100%'/>
            <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span><span class='search-delete-icon d-none'><i data-acorn-icon='close'></i></span>                
        </div>
        <a href='index.php?url=case-reports.php'>
        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
            <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>View CASE Reports</span>
        </button></a>

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
                        <a onmouseover=\"document.ViewModeForm.viewmode.value='LIST'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='list'></i></a>
                        <a onmouseover=\"document.ViewModeForm.viewmode.value='CARD'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='grid-3'></i></a>                        
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
$sessionid = rand(1234567890,9876543210);
echo"<form id='form' method='post' name='incidentform' class='wizard-big' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
    <input type='hidden' name='url' value='case_notes.php'><input type='hidden' name='id' value='5203'>

    <fieldset>
        <div class='row' style='padding:20px'>
            <div class='col-lg-4'>
                <div class='form-group' style='margin-bottom:25px'>
                    <label>Case Type *</label><select class='form-control m-b required' name='casetype' required>
                        <option value=''>Select Case Type</option>
                        <option value='Phone Call'>Phone Call</option>
                        <option value='Physical Interaction'>Physical Interaction</option>
                        <option value='Escalations'>Escalations</option>
                    </select>
                </div>
            </div>
            
            <div class='col-lg-4'>
                <div class='form-group' style='margin-bottom:25px'><label>Date From *</label><input name='date1' type='date' value='$current_date' class='form-control required'></div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group' style='margin-bottom:25px'><label>Date To *</label><input name='date2' type='date' value='$current_date' class='form-control required'></div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group' style='margin-bottom:25px'>
                    <label>Client Name *</label><select class='form-control m-b required' name='clientid' required>
                        <option value=''>Select Client Name</option>";
                        $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                        $r7 = $conn->query($s7);
                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                        } }
                    echo"</select>
                </div>
            </div>
            <div class='col-lg-4'>";
                echo"<div class='form-group' style='margin-bottom:25px'><label>Reporter Name *</label><select class='form-control m-b required' name='employeeid' required>
                    <option value='".$_COOKIE["userid"]."'>$username</option>";
                    $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                    $r7 = $conn->query($s7);
                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                    } }
                echo"</select></div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group' style='margin-bottom:25px'><label>Multi Document Upload</label>
                    <input type='file' name='images[]' multiple class='form__field__img form-control'><input type='hidden' name='sessionid1' value='$sessionid'>
                </div>
            </div>
            <div class='col-lg-12'>
                <div class='form-group' style='margin-bottom:25px'><label>Detail Note *</label>
                    <textarea id='summernote' name='note' class='form-control'></textarea>
                </div>
            </div>
            
            <div class='col-lg-12' style='text-align:right'><div class='form-group' style='margin-bottom:25px'>
                <button class='ladda-button btn btn-primary' data-style='expand-right'>Submit</button>
            </div></div>
        </div>
    </fieldset>
    
</form>"; ?>