<?php

    $sheba="task_manager";
    $cid=9001;
    $title="Task Manager";
    $utype="tasks";
    
    echo"<div class='row'>
        <div class='col-7 col-md-6' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Task Manager</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
              <ul class='breadcrumb pt-0'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
              echo"</ul>
            </nav>
        </div>
        <div class='col-5 col-md-6' align='right'>
            <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('task_manager_process.php?cid=$cid&sheba=$sheba&ctitle=$title&url=task_manager.php&id=58', 'offcanvasRight')\" style='margin-right:10px;margin-bottom:10px'>
                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>$title</span>
            </button>";
            if($designationy==13){
                echo"<a href='index.php?url=schedule.php'>
                    <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px;margin-bottom:10px'>
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Schedule</span>
                    </button>
                </a>";
            }
            echo"<a href='index.php?url=daily_schedules.php&id=5206'>
                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px;margin-bottom:10px'>
                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Daily Shifts</span>
                </button>
            </a>
        </div>
    </div>    
    
    <div class='data-table-rows slim' id='sample'>";

        // <body onload=\"shiftdataV2('chart_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX'); shiftdataV2('task_manager_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">
        
        $projectid=0;
        echo"<div class='data-table-responsive-wrapper'id='datatableX'>";
            include 'task_manager_data.php';
        echo"</div>

    </div>";
?>
    