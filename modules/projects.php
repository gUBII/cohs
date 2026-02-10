<?php
    
    date_default_timezone_set("Australia/Melbourne");
    $sheba="projects";
    $cid=90009;
    $title="Add New Project";
    $utype="PROJECTS/LEADS";
    if(!isset($project_signed)) $project_signed=0;
    if(!isset($transport_cost)) $transport_cost=0.00;
    if(!isset($start_date)) $start_date="";
    if(!isset($end_date)) $end_date="";
    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;
    
    if(isset($_GET["status"])) $status=$_GET["status"];
    else $status=1;
    
    if(isset($_GET["prjsrc"])) $prjsrc=$_GET["prjsrc"];
    else $prjsrc=0;
    
    $advocatex=0;
    // $advocatey = "select * from solutions where id='10012' and dashboard='1' order by id asc limit 1";
    // $advocatez = $conn->query($advocatey);
    // if ($advocatez->num_rows > 0) { while($advocatexyz = $advocatez->fetch_assoc()) {  $advocatex=1; } }
    
    $titlexyz="Client's";
    
    if($pstat==1){
        echo"<div class='row'>";
            
            
            echo"<div class='col-10 col-md-10' style='padding-bottom:10px'>
                <table><tr>";
                    if(isset($_COOKIE["projectidx"])){
                        echo"<td nowrap valign='top'><a href='client-cb-unset.php?pstat=1&id=62&url=projects.php' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='arrow-double-left'></i></a>&nbsp;&nbsp;&nbsp;</td>";
                    }
                    echo"<td nowrap>
                        <h1 class='mb-0 pb-0 display-4' id='title'>$titlexyz Dashboard </h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=".$_GET["pstat"]."'>$titlexyz</a></li>
                            </ul>
                        </nav>
                    </td>
                </tr></table>
            </div>
            <div class='col-2 col-md-2 d-flex align-items-start justify-content-end'>            
                <table><tr><td nowrap>";
                    if($mtype=="ADMIN" OR $teamleaderid=$userid) {
                        echo"<a href='index.php?url=workspace.php&id=786'><button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                            <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Onboard New Client</span>
                        </button></a>";
                        
                        echo"<a href='index.php?url=quotation_manager.php&id=5332'><button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>
                            <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Quote Manager</span>
                        </button></a>";
                        
                    }
                echo"</td><td nowrap>";
                    /*
                    echo"<form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ViewModeForm'>
                        <input type='hidden' name='viewmode' value='LIST'>
                        <a onmouseover=\"document.ViewModeForm.viewmode.value='LIST'\" onclick=\"document.ViewModeForm.viewmode.value='LIST'; document.ViewModeForm.submit()\" onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&prjsrc=$prjsrc', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='list'></i></a>
                        <a onmouseover=\"document.ViewModeForm.viewmode.value='CARD'\" onclick=\"document.ViewModeForm.viewmode.value='CARD'; document.ViewModeForm.submit()\" onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&prjsrc=$prjsrc', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='grid-3'></i></a>
                    </form>"; */
                echo"</td></tr></table>
            </div>
        </div>    
        <div class='row'>
            <div class='col-12 col-md-8'>";
                 if(!isset($_COOKIE["projectidx"])){
                    echo"<button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=1&prjsrc=$prjsrc', 'datatableX')\">
                        <i data-acorn-icon='accordion'></i>&nbsp;&nbsp;<span>Active</span>
                    </button>&nbsp;&nbsp;
                    <button class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=10&prjsrc=$prjsrc', 'datatableX')\">
                        <i data-acorn-icon='accordion'></i>&nbsp;&nbsp;<span>Suspended</span>
                    </button>&nbsp;&nbsp;
                    <button class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=5&prjsrc=$prjsrc', 'datatableX')\">
                        <i data-acorn-icon='accordion'></i>&nbsp;&nbsp;<span>Completed</span>
                    </button>";
                 }
            echo"</div>";
            
            if(!isset($_COOKIE["projectidx"])){
                echo"<div class='col-12 col-md-4' style='text-align:right'>
                    <form method='get' action='index.php'>
                        <input type=hidden name=url value='projects.php'><input type=hidden name=pstat value='1'>
                        <table><tr>
                            <td>"; ?>
                                <script src='https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'></script>
                                <style>
                                    .select2-container--default .select2-selection--single {
                                        background-color: white;
                                        color: black;
                                        border: 1px solid #555;
                                        height: 42px;
                                        padding: 4px 12px;
                                    }
                                    .select2-container--default .select2-selection--single .select2-selection__rendered {
                                        color: black;
                                        line-height: 30px;
                                    }
                                    .select2-container--default .select2-results > .select2-results__options {
                                        background-color: white;
                                        color: black;
                                    }
                                    .select2-container--default .select2-results__option--highlighted[aria-selected] {
                                        background-color: #444;
                                        color: black;
                                    }
                                </style><?php
                                
                                echo"<select name='prjsrc' id='projectSelect' class='form-control' placeholder='Search Project' style='height:42px;width:300px'>
                                    <option value='0'>All Projects</option>";
                                    if($mtype == "ADMIN") {
                                        $ra1x = "SELECT * FROM project WHERE status='$status' ORDER BY name ASC";
                                    } elseif($mtype == "CLIENT") {
                                        $ra1x = "SELECT * FROM project WHERE clientid='$userid' AND status='$status' ORDER BY name ASC";
                                    } else {
                                        $ra1x = "SELECT * FROM project WHERE leaderid='$userid' AND status='$status' ORDER BY name ASC";
                                    }
                            
                                    $rb1x = $conn->query($ra1x);
                                    if ($rb1x->num_rows > 0) {
                                        while($rab1x = $rb1x->fetch_assoc()) {
                                            $clientname = "";
                                            $ra1y = "SELECT * FROM uerp_user WHERE id='".$rab1x["clientid"]."' LIMIT 1";
                                            $rb1y = $conn->query($ra1y);
                                            if ($rb1y->num_rows > 0) {
                                                while($rab1y = $rb1y->fetch_assoc()) {
                                                    $clientname = $rab1y["username"] . " " . $rab1y["username2"];
                                                }
                                            }
                                            echo "<option value='".$rab1x["id"]."' style='color:black'>".$rab1x["name"]." (Client: $clientname)</option>";
                                        }
                                    }
                                echo"</select>";
                                ?><script>
                                    $(document).ready(function() {
                                        $('#projectSelect').select2({
                                            placeholder: 'Search Project',
                                            allowClear: true
                                        });
                                    });
                                </script><?php
                            echo"</td>
                            <td>
                                <button class='btn btn-outline-info' type='button' onclick='this.form.submit();'><i data-acorn-icon='search'></i></button>
                            </td>
                        </tr></table>
                     </form>
                </div>";
            }
            
        echo"</div>
        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>";
                // if($mtype=="ADMIN"){
                    
                    if(isset($_COOKIE["projectidx"])){
                            
                        echo"<div class='data-table-rows slim' id='sample'>
                            <body onload=\"shiftdataV2('projects_profile.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">";
        
                            include 'project_bar.php';
                            
                            echo"<div class='data-table-responsive-wrapper'id='datatableX'></div><Br><br><br>";
                            
                            // calendar data
                            $refurl="projects";
                            // include ("appointments.php");
                            
                        echo"</div>";
                        
                        $cdate=date("Y-m-d", time());
                        echo"<div class='modal fade modal-close-out' id='PopupWindow' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Communication Book Category</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body' id='PopupWindowX'>
                                        <form method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                            <input type='hidden' name='processor' value='category'>
                                            <div class='form-group'><label>Category Name</label><input name='category' type='text' required value='' class='form-control'></div><br>
                                            <div class='form-group'><label>Category Type</label><select name='type' class='form-control'><option value='DOCUMENT MANAGEMENT'>DOCUMENT MANAGEMENT</option></select></div><br>
                                            <div class='form-group'><label>Date</label><input name='date' type='date' value='$cdate' class='form-control'></div><br>
                                            <div class='form-group'><label>Sort Order</label><input name='sorder' type='number' value='1' class='form-control'></div><br>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary' onblur=\"shiftdataV2('projects_profile.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                        
                    }else{
                        if($mtype="CLIENT"){
                            $ra1 = "select * from project where clientid='$userid' and status='$status' order by name asc limit 1";
                            $rb1 = $conn->query($ra1);
                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                echo"<form method='get' action='global-set.php' name='main' target='_top'>
                                    <input type=hidden name='pstat' value='1'>
                                    <input type=hidden name='projectidx' value='".$rab1["id"]."'>
                                    <input type=hidden name='url' value='projects.php'>
                                    <input type=hidden name='id' value='62'>
                                </form>";
                                ?> <script language=JavaScript> document.main.submit(); </script> <?php
                            } }
                        }
                        
                        echo"<div class='data-table-rows slim' id='sample'>
                            <body onload=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status&prjsrc=$prjsrc', 'datatableX')\">
                            <div class='data-table-responsive-wrapper'id='datatableX'></div>
                        </div>";
                    }
                // }
            echo"</div><br><br>
        </div>";



        echo"<div class='modal fade modal-close-out' id='PopupModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Support Team Available For Shifting</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' id='PopupModalX'>";
                            
                    echo"</div>
                </div>
            </div>
        </div>";
        
    }else{
        echo"<form method='get' action='global-unset.php' name='main' target='_top'>
            <input type=hidden name='pstat' value='1'><input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='url' value='".$_GET["url"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }