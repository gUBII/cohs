<?php
    error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    $sheba="project_sc";
    $cid=90009;
    $title="Add New Participant";
    $utype="Support Co-Ordinator";
    
    if(!isset($project_signed)) $project_signed=0;
    if(!isset($transport_cost)) $transport_cost=0.00;
    if(!isset($start_date)) $start_date="";
    if(!isset($end_date)) $end_date="";
    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;
    
    if(isset($_GET["status"])) $status=$_GET["status"];
    else $status=1;
    
    
    if($pstat==1){
        
        echo"<div class='row'>
            <div class='col-10 col-md-10' style='padding-bottom:10px'>
                <table><tr>";
                    if(isset($_COOKIE["projectidsc"])){
                        echo"<td nowrap valign='top'><a href='global-unset.php?pstat=1&id=62&url=support_co-ordinators.php' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='arrow-double-left'></i></a>&nbsp;&nbsp;&nbsp;</td>";
                    }
                    echo"<td nowrap>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Support Co-ordinator</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=".$_GET["pstat"]."'>Project</a></li>
                            </ul>
                        </nav>
                    </td>
                </tr></table>
            </div>
            <div class='col-2 col-md-2 d-flex align-items-start justify-content-end'>            
                <table><tr><td nowrap>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('support_co-ordinators_manager.php?cid=$cid&sheba=$sheba&ctitle=$title&status=$status', 'offcanvasTop2')\" style='margin-right:10px'>
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Participant</span>
                    </button>
                </td></tr></table>
            </div>
            <div class='col-12 col-md-7 d-flex align-items-start'>";
                 if(!isset($_COOKIE["projectidsc"])){
                    echo"<button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=1', 'datatableX')\">
                        <i data-acorn-icon='accordion'></i>&nbsp;&nbsp;<span>Active</span></button>&nbsp;&nbsp;
                    <button class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=10', 'datatableX')\">
                        <i data-acorn-icon='accordion'></i>&nbsp;&nbsp;<span>Suspended</span></button>&nbsp;&nbsp;
                    <button class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=5', 'datatableX')\">
                        <i data-acorn-icon='accordion'></i>&nbsp;&nbsp;<span>Completed</span></button>";
                 }
            echo"</div>
        </div>    
        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                <div>";
                    if(isset($_COOKIE["projectidsc"])){

                        echo"<div class='data-table-rows slim' id='sample'>
                            <body onload=\"shiftdataV2('support_co-ordinators_profile.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                            <div class='data-table-responsive-wrapper'id='datatableX'></div>
                        </div>
                        
                        <div class='modal fade modal-close-out' id='PopupWindow' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Communication Book Category</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body' id='PopupWindowX'>
                                        <form method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                            <input type='hidden' name='processor' value='categorysc'>
                                            <div class='form-group'><label>Category Name</label><input name='category' type='text' required value='' class='form-control'></div><br>
                                            <div class='form-group'><label>Category Type</label><select name='type' class='form-control'><option value='DOCUMENT MANAGEMENT'>DOCUMENT MANAGEMENT</option></select></div><br>
                                            <div class='form-group'><label>Sort Order</label><input name='sorder' type='number' value='1' class='form-control'></div><br>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button> 
                                                <button type='submit' class='btn btn-primary' onblur=\"shiftdataV2('support_co-ordinators_profile.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>";
                        
                    }else{
                        
                        echo"<div class='data-table-rows slim' id='sample'>
                            <body onload=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                            <div class='data-table-responsive-wrapper'id='datatableX'></div>
                        </div>";
                        
                    }
                    
                echo"</div>
            </div><br><br>
        </div>
        
        <div class='modal fade modal-close-out' id='PopupModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>Support Workers Available For Shifting</h5>
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
            <input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>            
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
