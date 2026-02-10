<?php
    
    error_reporting(0);
    $cdate=time();
    $cdate=date("d-m-Y", $cdate);
    
    date_default_timezone_set("Australia/Melbourne");
	
    if(isset($_GET["status"])) $status=$_GET["status"];
    else $status=1;
    
    if(isset($_GET["empid"])) $empid=$_GET["empid"];
    else $empid=0;
    
    if(isset($_GET["pointer"])) $pointer=$_GET["pointer"];
    else $pointer=0;
    
    echo"<div class='container'>
        <div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-8'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Documents Manager</h1><p>Global Documents Management System (GDMS)</p>
                    </div>
                    <div class='col-4' style='text-align:right'>
                        <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ViewModeForm'>
                            <input type='hidden' name='viewmode' value='LIST'>
                            <a onmouseover=\"document.ViewModeForm.viewmode.value='LIST'\" onclick=\"document.ViewModeForm.viewmode.value='LIST'; document.ViewModeForm.submit()\" onblur=\"shiftdataV2('document_data.php?status=$status', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='list'></i></a>
                            <a onmouseover=\"document.ViewModeForm.viewmode.value='CARD'\" onclick=\"document.ViewModeForm.viewmode.value='CARD'; document.ViewModeForm.submit()\" onblur=\"shiftdataV2('document_data.php?&status=$status', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='grid-3'></i></a>
                        </form>
                    </div>
                    <div class='col-12 col-sm-12 d-flex align-items-start'>";
                        if($designationy==13) {
                            echo"<button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('document_category.php?ctitle=Category Manager', 'offcanvasRight')\" style='margin-right:10px'>
                                <i data-acorn-icon='plus'></i>&nbsp;<span>Category</span></button>
                            </button>";
                        }
                        
                        if(isset($_GET["categoryid"])) $categoryid=$_GET["categoryid"];
                        else $categoryid=0;
                        
                        echo"<button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('document_process.php?ctitle=Document Manager&categoryid=$categoryid&url=".$_GET["url"]."&id=".$_GET["id"]."', 'offcanvasRight')\" style='margin-right:10px'>
                            <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Document</span>
                        </button>";
                        
                        echo"<button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('document_data.php?status=1', 'datatableX')\" style='margin-right:10px'>
                            <span>Active</span>
                        </button>";
                        
                        
                        
                    echo"</div>
                </div>
            </div>
            <div class='data-table-rows slim' id='sample'>";
                
                if(isset($_GET["categoryid"])){
                    $cid1 = "select * from modules where id='".$_GET["categoryid"]."' order by id asc limit 1";
                    $cid2 = $conn->query($cid1);
                    if ($cid2->num_rows > 0) { while($cid3 = $cid2->fetch_assoc()) { $categoryname=$cid3["name"]; }}
                    
                    echo"<h2>Documents under Category<br><b>$categoryname</b></h2><br>";
                    
                    if($empid!=0){
                        echo"<a class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' href='index.php?url=my_profile.php&empid=$empid' style='padding-right:10px'>
                            < &nbsp;&nbsp;<span>Back to Profile</span>
                        </a>";
                    }else{
                        echo"<a class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' href='index.php?url=document_manager.php&id=786'>
                            < &nbsp;&nbsp;<span>View Document Categories</span>
                        </a>";
                    }
                    
                    echo"<body onload=\"shiftdataV2('document_data2.php?status=$status2&categoryid=".$_GET["categoryid"]."&empid=$empid&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                    <div class='data-table-responsive-wrapper'id='datatableX'></div>";
                    
                }else{
                    echo"<body onload=\"shiftdataV2('document_data.php?status=$status', 'datatableX')\">
                    <h2>Document Categories</h2>
                    <div class='data-table-responsive-wrapper'id='datatableX'></div>";
                }
            echo"</div> 
        </div>
    </main>";
?>
    
    