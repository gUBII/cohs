<?php 
$sheba="eod";
$cid=7;
$title="Add New Client/Participant";
$utype="CALLS";
$designation=6;

echo"<div class='row'>
    <div class='col-12 col-md-5' style='padding-bottom:10px'>
        
        <h1 class='mb-0 pb-0 display-4' id='title'>Calls Record (Audio/Video/Files Manager)</h1>
    
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

if(!isset($_GET["formid"])){
    $sessionid = rand(1234567890,9876543210);
    echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
        <input type='hidden' name='url' value='general_forms.php'><input type='hidden' name='id' value='5205'>
        <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'><input type='hidden' name='processor' value='generalforms'>
        <Br><br>
        <fieldset>
            <div class='row'>
                <div class='col-lg-2'>
                    <div class='form-group'><label>Document Upload Date *</label><input name='date1' type='date' value='$current_date' class='form-control required'></div>
                </div>
                <div class='col-lg-2'>
                    <div class='form-group'>
                        <label>Client Name *</label><select class='form-control m-b required' name='clientid'>
                            <option value='0'>General Document</option>";
                            $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                            $r7 = $conn->query($s7);
                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                            } }
                        echo"</select>
                    </div>
                </div>
                <div class='col-lg-4'>
                    <div class='form-group'><label>Document Title *</label><input name='title' type='text' value='' class='form-control required'></div>
                </div>
                
                <div class='col-lg-2'>
                    <div class='form-group'><label>Document Title *</label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,' required></div>
                </div>
                
                <div class='col-lg-2'><div class='form-group'><label>&nbsp; </label><Br>
                    <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Upload Document'>
                </div></div>
            </div>
        </fieldset>
        
    </form>";
}else{
    $sessionid = rand(1234567890,9876543210);
    echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
        <input type='hidden' name='smsbd' value='$smsbd'><input type='hidden' name='kroyee' value='$kroyee'><input type='hidden' name='formid' value='".$_GET["formid"]."'>
        <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'><input type='hidden' name='processor' value='generalformsedit'>
        <h1>EDIT - General Form</h1>";
            $ra1X = "select * from general_forms where status='1' and id='".$_GET["formid"]."' order by id desc";
            $rb1X = $conn->query($ra1X);
            if ($rb1X->num_rows > 0) { while($rab1X = $rb1X->fetch_assoc()) {
                $current_date=date("Y-m-d", $rab1X["date"]);
                echo"<fieldset>
                    <div class='row'>
                        <div class='col-lg-2'>
                            <div class='form-group'><label>Document Upload Date *</label>
                                <input name='date1' type='date' value='$current_date' class='form-control required'>
                            </div>
                        </div>
                        <div class='col-lg-2'>
                            <div class='form-group'>
                                <label>Client Name *</label><select class='form-control m-b required' name='clientid'>";
                                    if($rab1X["clientid"]=="0"){
                                        echo"<option value='0'>General Document</option>";
                                    }else{
                                        $s7x = "select * from uerp_user where id='".$rab1X["clientid"]."' and mtype='CLIENT' and status='1' order by id asc";
                                        $r7x = $conn->query($s7x);
                                        if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                            echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>";
                                        } }
                                    }
                                    $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                    } }
                                echo"</select>
                            </div>
                        </div>
                        <div class='col-lg-4'>
                            <div class='form-group'><label>Document Title *</label><input name='title' type='text' value='".$rab1X["title"]."' class='form-control required'></div>
                        </div>
                        
                        <div class='col-lg-2'>
                            <div class='form-group'><label>Document Title * <a href='".$rab1X["filename"]."'>View Document</a>
                            </label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,'></div>
                        </div>
                        
                        <div class='col-lg-1'><div class='form-group'><label>&nbsp; </label><Br>
                            <input type='submit' class='ladda-button btn btn-primary' data-style='expand-right' value='Update'>
                        </div></div>
                        <div class='col-lg-1'><div class='form-group'><label>&nbsp; </label><Br>
                            <a href='index.php?smsbd=general-forms'><input type='button' class='ladda-button btn btn-primary' data-style='expand-right' value='New'></a>
                        </div></div>
                    </div>
                </fieldset>";
            } }
        
    echo"</form>";
}
?>

<?php if(isset($_GET["postid"])){ ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        body {
            font-family: 'Roboto', serif;
            font-size: 10px;
        }
    </style> <?php
    
    $ra1 = "select * from casenote where id='".$_GET["postid"]."' and status='1' order by id desc";
    $rb1 = $conn->query($ra1);
    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
    
        $post_date=date("d/m/Y", $rab1["pdate"]);
        $post_date1=date("d/m/Y", $rab1["date1"]);
        $post_date2=date("d/m/Y", $rab1["date2"]);
        
        $clientname="";
        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $clientname1= $rab2["username"];
            $clientname2= $rab2["username2"];
            $clientphone= $rab2["phone"];
            $clientemail= $rab2["email"];
        } }
        
        $employeeid="";
        $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $employeename1= $rab2["username"];
            $employeename2= $rab2["username2"];
            $employeephone= $rab2["phone"];
            $employeeemail= $rab2["email"];
            $ra22 = "select * from designation where id='".$rab2["designation"]."' order by id desc limit 1";
            $rb22 = $conn->query($ra22);
            if ($rb22->num_rows > 0) { while($rab22 = $rb22->fetch_assoc()) { $designation1=$rab22["designation"]; } }
            
            $ra33 = "select * from departments where id='".$rab2["department"]."' order by id desc limit 1";
            $rb33 = $conn->query($ra33);
            if ($rb33->num_rows > 0) { while($rab33 = $rb33->fetch_assoc()) { $department1=$rab33["department_name"]; } }
            
        } }
        
        
        echo"<div class='p-xl' id='element-to-print'> 
            <div class='row'>
                <div class='col-lg-10'><h4>Good Will Care Weekly Report</h4><br></div>
                <div class='col-lg-2' style='text-align:right'><img src='img/logo.png' style='width:100px'></div>
                <div class='col-lg-12'>
                    <span style='font-size:14pt'><b>Report Information</b></span><hr>
                    <span style='font-size:12pt'>
                        <table>
                            <tr><td>Client Name<b></td><td>:</td><td>$clientname1 $clientname2</td></tr>
                            <tr><td>Week<b></td><td>:</td><td><b>$post_date1 – $post_date2</b></td></tr>
                            <tr><td>Reporter<b></td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                            <tr><td colspan=10><hr></td></tr>
                            <tr><td>Detailed Account<b></td><td>:</td><td></td></tr>
                            <tr><td colspan=10>".$rab1["note"]."</td></tr>
                            <tr><td colspan=10><hr></td></tr>
                            <tr><td>Report Prepared By</td><td>:</td><td></td></tr>
                            <tr><td>Name</td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                            <tr><td>Position</td><td>:</td><td><b>$designation1 & $department1, Good Will Care Pty Ltd</b></td></tr>
                            <tr><td>Post Date</td><td>:</td><td><b>$post_date</b></td></tr>
                        </table>
                    </span>
                </div>
                
            </div>
        </div>";
        
    } } ?>
    
    
    <script>
        function printDiv(divID) {
             var divElem = document.getElementById(divID).innerHTML;
             var printWindow = window.open('', '', 'height=210,width=350'); 
             printWindow.document.write('<html><head><title></title></head>');
             printWindow.document.write('<body>');
             printWindow.document.write(divElem);
             printWindow.document.write('</body>');
             printWindow.document.write ('</html>');
             printWindow.document.close();
             printWindow.print();
        }
    </script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    
    <script>
        var element = document.getElementById('element-to-print');
        html2pdf(element, {
            margin: 10,
            filename: 'casefile.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    </script>
    
    <?php
}

echo"<div class='table-responsive'>
    <table class='table table-striped table-bordered table-hover dataTables-example' >
        <thead><tr><th nowrap>Form ID</th><th nowrap>Date</th><th> Title</th><th>Document</th><th colspan=3'></th></tr></thead>
        <tbody>";
            $ra1 = "select * from general_forms where status='1' order by id desc";
            $rb1 = $conn->query($ra1);
            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                
                $post_date=date("d-m-y H:m", $rab1["date"]);
                
                $clientname="";
                $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                $rb2 = $conn->query($ra2);
                if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                
                $employeename="";
                $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                $rb2 = $conn->query($ra2);
                if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                
                echo"<tr class='gradeX'>
                    <td nowrap><i class='fa fa-eye'></i>&nbsp;".$rab1["date"]."".$rab1["id"]."</td>
                    <td>$post_date</td><td>".$rab1["title"]."</td>
                    <td><a href='".$rab1["filename"]."'>Download</a></td>
                    <td><a href='index.php?smsbd=general-forms&formid=".$rab1["id"]."' style='color:green'><i class='fa fa-pencil-square-o '></i></a></td>
                    <td><a href='deleterecord.php?formid=".$rab1["id"]."&tbl=general_forms' style='color:orange' target='dataprocessor'><i class='fa fa-trash'></i></a></td>
                </tr>";
                
            } }    
        echo"</tbody>
    </table>
    <div style='height:100px'>&nbsp;</div>
</div>"; ?>