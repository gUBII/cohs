<?php

    $sheba="task_manager";
    $cid=9001;
    $title="Appointment Manager";
    $utype="tasks";
    
    echo"<div class='row'>
        <div class='col-7 col-md-6' style='padding-bottom:10px'>
            <h1 class='mb-0 pb-0 display-4' id='title'>Appointment Manager (TASKS)</h1>
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
              <ul class='breadcrumb pt-0'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
              echo"</ul>
            </nav>
        </div>
        <div class='col-5 col-md-6' align='right'>
            <button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('appointment_manager_task_process.php?cid=$cid&sheba=$sheba&ctitle=$title&url=appointment_manager_task.php&id=58', 'offcanvasRight')\" style='margin-right:10px;margin-bottom:10px'>
                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Appointment</span>
            </button>";
            if($mtype=="ADMIN"){
                if(isset($_COOKIE["projectidx"])){
                    echo"<a href='index.php?url=projects.php&pstat=1''>
                        <button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px;margin-bottom:10px'>
                            <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Project</span>
                        </button>
                    </a>";
                }
                echo"<a href='index.php?url=schedule.php'>
                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px;margin-bottom:10px'>
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

        // <body onload=\"shiftdataV2('chart_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX'); shiftdataV2('appointment_manager_task_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">
        
        $projectid=0;
        echo"<div class='data-table-responsive-wrapper'id='datatableX'>";
            include 'appointment_manager_task_data.php';
        echo"</div>

    </div>";
?>
    