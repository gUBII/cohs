<?php
    
    echo"<a href='#' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#budgetshift'><i class='fa fa-plus'></i> Weekly Shift</span></a>";
    
    echo"<div class='modal fade' id='budgetshift' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-dialog modal-semi-full modal-dialog-centered'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title'>Budgetwise Shifts</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <iframe src='workspace_budget_shifts.php?pid=".$_COOKIE["projectidx"]."' name='budgetmanagery' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='550'>BROWSER NOT SUPPORTED</iframe>
                    <a style='margin-left:-70px;margin-top:0px;position:absolute;color:purple;align:right' href='workspace_budget_shifts.php?pid=".$_COOKIE["projectidx"]."' class='btn' target='budgetmanagery' title='Reload Data'><i class='fa fa-refresh' style='color:purple'></i></a>
                </div>
            </div>
        </div>
    </div>";
    
    echo"<iframe name='projects_appointments' src='index.php?url=appointments.php' scrolling='yes' border='0' frameborder='0' width='100%' height='1470'>BROWSER NOT SUPPORTED</iframe>";
    
?>