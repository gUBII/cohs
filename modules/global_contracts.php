<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    
    $sheba="contracts";
    $cid=90009;
    $title="Add New Contract";
    $utype="Contracts";
    
    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;
    
    if($pstat==1){
        echo"<div class='row'>
            <div class='col-12 col-md-5' style='padding-bottom:10px'>
                <h1 class='mb-0 pb-0 display-4' id='title'>$utype</h1>
                <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                    <ul class='breadcrumb pt-0'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='index.php'>Dashboard</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=".$_GET["pstat"]."'>$utype</a></li>
                    </ul>
                </nav>
            </div>
            <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>";
                
                include 'crm_bar.php';
            
            echo"</div>
        </div>    
        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                <div class='data-table-rows slim' id='sample' style='text-align:left'>
                    <body onload=\"shiftdataV2('contract_data.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=contracts&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                    <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:90%'>
                        <thead><tr><th colspan=20><h3>Contract List</h1></th></tr></thead><tbody id='datatableX'></tbody>
                    </table>
                </div>
            </div><br><br>
        </div>";
    }else{
        echo"<form method='get' action='global-unset.php' name='main' target='_top'>
            <input type=hidden name='pstat' value='1'><input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
