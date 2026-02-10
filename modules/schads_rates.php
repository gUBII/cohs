<?php
    $sheba="award_rates";
    $cid=1;
    $title="Add SCHADS Rates";
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>SCHADS Rates Manager</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>SCHADS Rates</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$sheba</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
        
            
        </div>                  
    </div>    
    <div class='data-table-rows slim' id='sample'>
        <body onload=\"shiftdataV2('projects_schads_rates_manager.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\">
        <div class='data-table-responsive-wrapper' id='datatableX'></div>
    </div>";    
?>