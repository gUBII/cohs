<style>
    #hidden_div {
        display: none;
    }
    #hidden_div2 {
        display: none;
    }
</style>
<?php 

    $sheba="eod";
    $cid=7;
    $title="Add New Client/Participant";
    $utype="EOD";
    $designation=6;
    // $mtype="ADMIN";
    $yr=date("Y");
    $eodcdate=date("Y-m-d", time());
    
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>EOD Reports</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
            <table style='padding-bottom:10px;'><tr>
                <td>
                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows'>
                        <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3' style='margin-right:10px'><i class='fa-solid fa-search'></i> Search</button>
                        <div class='dropdown-menu shadow dropdown-menu-end' style='padding:10px'>
                            <form method='get' action='index.php' target='_self' name='output' enctype='multipart/form-data'>
                                <table>
                                    <tr><td>
                                        Employee: <select class='form-control m-b required' name='employeedata' required style='width:100%;margin-bottom:5px'>";
                                            if($mtype=="USER"){
                                                $s7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' and mtype='USER' and status='1' order by username asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                            }else{
                                                echo"<option value='ALL'>All Support Worker</option>";
                                                $s7 = "select * from uerp_user where mtype='USER' and status<>'4' OR mtype='EMPLOYEE' and status<>'4' OR mtype='ADMIN' and status<>'4' order by username asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                            }
                                        echo"</select>
                                    </td><td>
                                        Client: <select class='form-control m-b required' name='clientdata' required style='width:100%;margin-bottom:5px'>";
                                            if($mtype=="USER") {
                                                $s7 = "select * from project_team_allocation where employeeid='".$_COOKIE["userid"]."' order by id asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                                    $r71 = $conn->query($s71);
                                                    if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                        $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                        $r72 = $conn->query($s72);
                                                        if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                            echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                        } }
                                                    } }
                                                } }
                                            } else if($mtype=="CLIENT") {
                                                $s71 = "select * from uerp_user where id='".$_COOKIE["userid"]."' and mtype='CLIENT' and status<>'4' order by username asc";
                                                $r71 = $conn->query($s71);
                                                if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                    echo"<option value='".$rs71["id"]."'>".$rs71["username"]." ".$rs71["username2"]."</option>";
                                                } }
                                            } else {
                                                echo"<option value=''>Client</option><option value='ALL'>All Clients</option>";
                                                $s71 = "select * from uerp_user where mtype='CLIENT' and status<>'4' order by username asc";
                                                $r71 = $conn->query($s71);
                                                if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                    echo"<option value='".$rs71["id"]."'>".$rs71["username"]." ".$rs71["username2"]."</option>";
                                                } }
                                            }
                                        echo"<select>
                                    </td></tr>
                                    <tr>
                                        <td>Date From: <input class='form-control' type='date' name='srcfdate' placeholder='From Date' value='$yr-01-01' style='width:100%;margin-bottom:5px'></td>
                                        <td>Date To: <input class='form-control' type='date' name='srctdate' placeholder='To Date' value='$eodcdate' style='width:100%;margin-bottom:5px'></td>
                                    </tr>
                                    <tr><td align=right colspan=2>
                                        <input type='hidden' name='url' value='".$_GET["url"]."'>
                                        <input type=submit class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' value='Search' style='margin-bottom:5px'>
                                    </td></tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </td>
                <td style='min-width:80px'>";
                    if($mtype!="CLIENT"){
                        echo"<a href='index.php?url=eod_document.php'>
                            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Quick EOD</span>
                            </button>
                        </a>";
                        echo"<a href='index.php?url=eod.php'>
                            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Detailed EOD</span>
                            </button>
                        </a>";
                    }
                echo"</td>";
                
                if($mtype=="ADMIN") {
                    echo"<td style='min-widht:80px'>
                        <div class='d-inline-block datatable-export' data-datatable='#datatableRows'>
                            <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-download'></i> Download</button>
                            <div class='dropdown-menu shadow dropdown-menu-end' style='padding:10px'>
                                <form id='form' method='get' class='wizard-big' action='excel/export_excel.php' target='dataprocessor' name='outputform' enctype='multipart/form-data'> 
                                    <table style='width:100%'>
                                        <tr>
                                            <td colspan=2>
                                                <select class='form-control m-b required' name='employeedata' required style='width:100%;margin-bottom:5px'>
                                                    <option value=''>Support Worker</option><option value='ALL'>All Support Worker</option>";
                                                    $s7 = "select * from uerp_user where mtype='USER' and status<>'4' OR mtype='EMPLOYEE' and status<>'4' OR mtype='ADMIN' and status<>'4' order by username asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                echo"</select>
                                            </td>
                                            <td colspan=2>
                                                <select class='form-control m-b required' name='clientdata' required style='width:100%;margin-bottom:5px'>
                                                    <option value=''>Client</option><option value='ALL'>All Clients</option>";
                                                    $s71 = "select * from uerp_user where mtype='CLIENT' and status<>'4' order by username asc";
                                                    $r71 = $conn->query($s71);
                                                    if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                        echo"<option value='".$rs71["id"]."'>".$rs71["username"]." ".$rs71["username2"]."</option>";
                                                    } }
                                                echo"</select>
                                            </td>
                                        </tr><tr>
                                            <td colspan=2><input type=date name='date_from' class='form-control' value='$yr-01-01' style='width:100%;margin-bottom:5px'></td>
                                            <td colspan=2><input type=date name='date_to' class='form-control' value='$eodcdate' style='width:100%;margin-bottom:5px'></td>
                                        </tr><tr>
                                            <td style='width:25%'>&nbsp;</td>
                                            <td style='width:25%'><input type=submit value='EXCEL' class='btn btn-icon btn-icon-only btn-outline-primary btn-sm' style='width:100%;margin-bottom:5px' onmouseover=\"document.outputform.pointer.value='EXCEL'\"></td>
                                            <td style='width:25%'><input type=submit value='PDF' class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' style='width:100%;margin-bottom:5px' onmouseover=\"document.outputform.pointer.value='PDF'\"></td>
                                            <td style='width:25%'><input type=submit value='PRINT' class='btn btn-icon btn-icon-only btn-outline-tertiary btn-sm' style='width:100%;margin-bottom:5px' onmouseover=\"document.outputform.pointer.value='PRINT'\"></td>
                                            
                                        </tr>
                                    </table>
                                    <input type=hidden name='smsbd' value='reporting-forms'><input type=hidden name='kroyee' value='eod-docsument-csv-reports'>
                                    <input type=hidden name='sheba' value='1708323155'><input type=hidden name='pointer' value=''>
                                </form>
                            </div>    
                        </div>
                    </td>";
                }
                
            echo"</tr></table>
        </div>
    </div>";
    
    echo"<div class='data-table-rows slim' id='sample'>";
    
        if(isset($_GET["editid"])){
            echo"<table style='width:100%'><tr><td><hr>";   
                include("eod_document_edit.php");
            echo"</td></tr></table>";
        }
    
        if(!isset($_GET["editid"])){
            echo"<div class='table-responsive'>";
                
                echo"<table class='table table-striped table-bordered table-hover dataTables-example' >
                    <thead><tr><th nowrap>Date</th><th nowrap>Support W.</th><th nowrap>Participant</th><th>&nbsp;</th></tr></thead>
                    <tbody>";
                        $t=0;
                        if(isset($_GET["employeedata"]) && $_GET["employeedata"]!="ALL") $employeedata=$_GET["employeedata"];
                        else{
                            if($mtype=="USER") $employeedata=$_COOKIE["userid"];
                            else $employeedata="ALL";
                        }
                        
                        if(isset($_GET["clientdata"]) && $_GET["clientdata"]!="ALL") $clientdata=$_GET["clientdata"];
                        else{
                            if($mtype=='CLIENT') $clientdata=$_COOKIE["userid"];
                            else $clientdata="ALL";
                        }
                        
                        if(isset($_GET["srcfdate"])){
                            $srcfdate=date('Y-m-d H:i:s', strtotime($_GET["srcfdate"] . ' -1 day'));
                            $srcfdate=strtotime($srcfdate);
                        }else{
                            $srcfdate=date('Y-m-d H:i:s', strtotime($eodcdate. ' -10 day'));
                            $srcfdate=strtotime($srcfdate);
                        }
                        
                        if(isset($_GET["srctdate"])){
                            $srctdate=date('Y-m-d H:i:s', strtotime($_GET["srctdate"] . ' +1 day'));
                            $srctdate=strtotime($srctdate);
                        }else{
                            $srctdate=date('Y-m-d H:i:s', strtotime($eodcdate . ' +1 day'));
                            $srctdate=strtotime($srctdate);
                        } 
                        
                        if($employeedata=="ALL" && $clientdata=="ALL"){
                            $ra1 = "select * from eod_document where eod_date>='$srcfdate' and eod_date<='$srctdate' and status='1' order by eod_date asc";
                        }else if($employeedata=="ALL" && $clientdata!="ALL"){
                            $ra1 = "select * from eod_document where clientid='$clientdata' and eod_date>='$srcfdate' and eod_date<='$srctdate' and status='1' order by eod_date asc";
                        }else if($employeedata!="ALL" && $clientdata=="ALL"){
                            $ra1 = "select * from eod_document where employeeid='$employeedata' and eod_date>='$srcfdate' and eod_date<='$srctdate' and status='1' order by eod_date asc";
                        }else{
                            $ra1 = "select * from eod_document where employeeid='$employeedata' and clientid='$clientdata' and eod_date>='$srcfdate' and eod_date<='$srctdate' and status='1' order by eod_date asc";
                        }
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            $t=($t+1);
                            $eod_date=date("d-m-y H:m", $rab1["eod_date"]);
                            $dateft=date("Y-m-d", $rab1["eod_date"]);
                            // $incident_date=date("d-m-y", $rab1["incidentdate"]);
                            $incident_date="";
                            $clientname="";
                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            $employeename="";
                            $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            
                            echo"<tr class='gradeX'>
                                <td nowrap>ID: ".$rab1["eod_date"]."-".$rab1["id"]."<br>$eod_date</td>
                                <td>$employeename</td>
                                <td>$clientname</td>
                                <td align=center>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows'>
                                        <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3' style='margin-right:10px'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' style='padding:10px'>";
                                            echo"<a class='dropdown-item'data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('eod_document_detail_view.php?postid=".$rab1["id"]."', 'offcanvasTop2')\" href='#' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View'><i class='fa fa-eye'></i> View</a>";
                                            if($mtype=="ADMIN"){
                                                echo"<hr><a style='padding:27px' href='index.php?url=eod-document-reports.php&id=0&sheba=$sheba&editid=".$rab1["id"]."'><i class='fa fa-edit'></i> Edit</a>";
                                                // echo"<hr><a style='padding:27px' href='lic_html/saas/deleterecords.php' data-bs-placement='bottom' title='Delete'><i class='fa fa-trash'></i> Delete</a>";
                                            }
                                            echo"<hr><a style='padding:27px' href='excel/export_excel.php?employeedata=".$rab1["employeeid"]."&clientdata=".$rab1["clientid"]."&date_from=$dateft&date_to=$dateft&kroyee=eod-docsument-csv-reports&pointer=PDF' target='dataprocessor' data-bs-placement='bottom' title='Download'><i class='fa fa-download'></i> Download</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>"; 
                        } } 
                    echo"</tbody>
                </table>
            </div>";
        }
    echo"</div>";
?>
    