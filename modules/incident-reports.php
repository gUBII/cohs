<style>
    #hidden_div {
        display: none;
    }
    #hidden_div2 {
        display: none;
    }
</style>
<?php 

    $sheba="incident";
    $cid=7;
    $title="Add New Client/Participant";
    $utype="INCIDENT";
    $designation=6;
    $yr=date("Y");
    $cdate=date("Y-m-d");
    
    
    echo"<div class='row'>
    
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>Incident Reports</h1>
        
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
                                                echo"<option value=''>Support Worker</option><option value='ALL'>All Support Worker</option>";
                                                $s7 = "select * from uerp_user where mtype='USER' and status<>'4' OR mtype='EMPLOYEE' and status<>'4' OR mtype='ADMIN' and status<>'4' order by username asc";
                                                $r7 = $conn->query($s7);
                                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                    echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                } }
                                            }
                                        echo"</select>
                                    </td><td>
                                        Participant: <select class='form-control m-b required' name='clientdata' required style='width:100%;margin-bottom:5px'>";
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
                                        <td>Date To: <input class='form-control' type='date' name='srctdate' placeholder='To Date' value='$cdate' style='width:100%;margin-bottom:5px'></td>
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
                        echo"<a href='index.php?url=incident.php'>
                            <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>INCIDENT</span>
                            </button>
                        </a>";
                    };
                echo"</td>";
                /*
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
                                            <td colspan=2><input type=date name='date_to' class='form-control' value='$cdate' style='width:100%;margin-bottom:5px'></td>
                                        </tr><tr>
                                            <td style='width:25%'>&nbsp;</td>
                                            <td style='width:25%'><input type=submit value='EXCEL' class='btn btn-icon btn-icon-only btn-outline-primary btn-sm' style='width:100%;margin-bottom:5px' onmouseover=\"document.outputform.pointer.value='EXCEL'\"></td>
                                            <td style='width:25%'><input type=submit value='PDF' class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' style='width:100%;margin-bottom:5px' onmouseover=\"document.outputform.pointer.value='PDF'\"></td>
                                            <td style='width:25%'><input type=submit value='PRINT' class='btn btn-icon btn-icon-only btn-outline-tertiary btn-sm' style='width:100%;margin-bottom:5px' onmouseover=\"document.outputform.pointer.value='PRINT'\"></td>
                                            
                                        </tr>
                                    </table>
                                    <input type=hidden name='smsbd' value='reporting-forms'><input type=hidden name='kroyee' value='incident-csv-reports'>
                                    <input type=hidden name='sheba' value='1708323155'><input type=hidden name='pointer' value=''>
                                </form>
                            </div>    
                        </div>
                    </td>";
                }
                */
            echo"</tr></table>
        </div>
    </div>";
    
    echo"<div class='data-table-rows slim' id='sample'>";
    
        if(!isset($_GET["editid"])){
            echo"<div class='table-responsive'>";
                
                echo"<table class='table table-striped table-bordered table-hover dataTables-example' >
                    <thead><tr><th nowrap>Date</th><th>Incident Dt.</th><th>Support W.</th><th>Participant</th><th>Involved</th><th>Location</th><th>Documents</th><th>&nbsp;</th></tr></thead>
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
                            $srcfdate=date('Y-m-d H:i:s', strtotime($cdate. ' -365 day'));
                            $srcfdate=strtotime($srcfdate);
                        }
                        
                        if(isset($_GET["srctdate"])){
                            $srctdate=date('Y-m-d H:i:s', strtotime($_GET["srctdate"] . ' +1 day'));
                            $srctdate=strtotime($srctdate);
                        }else{
                            $srctdate=date('Y-m-d H:i:s', strtotime($cdate . ' +1 day'));
                            $srctdate=strtotime($srctdate);
                        } 
                        
                        if($employeedata=="ALL" && $clientdata=="ALL"){
                            $ra1 = "select * from incident where incidentdate>='$srcfdate' and incidentdate<='$srctdate' and status='1' order by incidentdate asc";
                        }else if($employeedata=="ALL" && $clientdata!="ALL"){
                            $ra1 = "select * from incident where clientid='$clientdata' and incidentdate>='$srcfdate' and incidentdate<='$srctdate' and status='1' order by incidentdate asc";
                        }else if($employeedata!="ALL" && $clientdata=="ALL"){
                            $ra1 = "select * from incident where employeeid='$employeedata' and incidentdate>='$srcfdate' and incidentdate<='$srctdate' and status='1' order by incidentdate asc";
                        }else{
                            $ra1 = "select * from incident where employeeid='$employeedata' and clientid='$clientdata' and incidentdate>='$srcfdate' and incidentdate<='$srctdate' and status='1' order by incidentdate asc";
                        }
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                    
                            $t=($t+1);
                            $post_date=date("d-m-y H:m", $rab1["date"]);
                            $incident_date=date("d-m-y", $rab1["incidentdate"]);
                            $clientname="";
                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            $employeename="";
                            $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            
                            echo"<tr class='gradeX'>
                            
                                <td nowrap>ID: ".$rab1["date"]."-".$rab1["id"]."</td>
                                <td>Post Date:$post_date<br>Incident Date: $incident_date ".$rab1["hourminute"]." </td>
                                <td>$employeename</td>
                                <td>$clientname</td>
                                <td>".$rab1["involved"]."</td>
                                <td>".$rab1["location"]."</td>
                                <td>";
                                    $t=0;
                                    $ra3 = "select * from multi_image where uid='".$rab1["employeeid"]."' and postid='".$rab1["id"]."' and status='1' order by id desc";
                                    $rb3 = $conn->query($ra3);
                                    if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { 
                                        $t=($t+1);
                                        echo"<a href='".$rab3["location"]."' target='_blank'>$t</a>, ";
                                    } }
                                echo"</td>
                                <td align=center>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows'>
                                        <button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3' style='margin-right:10px'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' style='padding:10px'>";
                                            if(!isset($_GET["clientid"])) echo"<a class='dropdown-item'data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('incident-detail-view.php?postid=".$rab1["id"]."', 'offcanvasTop2')\" href='#' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Detail'>View Detail</a>";
                                            else echo"<a class='dropdown-item'data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('incident-detail-view.php?postid=".$rab1["id"]."&clientid=".$_GET["clientid"]."', 'offcanvasTop2')\" href='#' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Detail'>View Detail</a>";
                                            if($mtype=="ADMIN"){
                                                echo"<a class='dropdown-item'data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('incident-edit.php?incidentid=".$rab1["id"]."&employeedata=".$_GET["employeedata"]."&clientdata=".$_GET["clientdata"]."&srcfdate=".$_GET["srcfdate"]."&srctdate=".$_GET["srctdate"]."', 'offcanvasTop2')\" href='#' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View'>Edit</a>";
                                                
                                                echo"<a class='dropdown-item' href='#' data-bs-placement='bottom' title='Delete'>Delete</a>";
                                            }
                                            // echo"<a class='dropdown-item' href='excel/export_excel.php?employeedata=".$rab1["employeeid"]."&clientdata=".$rab1["clientid"]."&date_from=$dateft&date_to=$dateft&pointer=PDF' target='dataprocessor' data-bs-placement='bottom' title='Download'><i class='fa fa-download'></i> Download</a>
                                        echo"</div>
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