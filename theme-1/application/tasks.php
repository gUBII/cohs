<?php
    include("auth.php");
    
    echo"<div class='content-header'><div><h4 class='content-title card-title'>My Tasks </h2></div><div> </div></div>";
    if($uactype=="ADMIN"){
        echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
            <div class='row'>
                <div class='col-md-4'>
                    <div class='mb-3'><label for='product_name' class='form-label'>Employee Name</label>
                        <select class='form-select' name='eid' required=''><option value=''>Select Employee</option>";
                            $s1 = "select * from sms_user2 where actype='USER' and status='1' order by name asc";
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { echo"<option value='".$rs1["id"]."'>".$rs1["name"]." ".$rs1["name2"]."</option>"; } }
                        echo"</select>
                    </div>
                </div><div class='col-md-4'>
                    <div class='mb-3'><label for='product_slug' class='form-label'>Start Time</label><input type='datetime-local' placeholder='Type here' class='form-control' id='product_slug' value='$cdate' name='dfrom' /></div>
                </div><div class='col-md-4'>
                    <div class='mb-3'><label for='product_slug' class='form-label'>Task Deadline</label><input type='datetime-local' placeholder='Type here' class='form-control' id='product_slug' value='$cdate' name='dto' /></div>
                </div><div class='col-md-9'>
                    <div class='mb-3'><label class='form-label'>Task Detail</label><textarea placeholder='Type here' class='form-control' name='task_detail'></textarea></div>
                </div><div class='col-md-3'>
                    <div class='mb-3'><label class='form-label'>Priority</label>
                        <select class='form-select' name='priority'>
                            <option value='Normal'>Normal</option>
                            <option value='Medium'>Medium</option>
                            <option value='Urgent'>Urgent</option>
                            <option value='Top Urgent'>Top Urgent</option>
                        </select>
                    </div>
                    <div class='d-grid'><button class='btn btn-primary' onmouseout=\"shiftdataV1('task_pending', 'taskset')\">Assign Task</button><input type=hidden name=processor value='addnewtask'></div>
                </div>
            </div>
        </form>";
    }
    
    echo"<hr><div class='row'>
        <div class='col-md-3'><div class='d-grid'>
            <a style='cursor: pointer' onclick=\"shiftdataV1('task_pending', 'taskset')\" target='_self'><button class='btn btn-primary'>Pending</button></a>
        </div></div><div class='col-md-3'><div class='d-grid'>
            <a style='cursor: pointer' onclick=\"shiftdataV1('task_processing', 'taskset')\" target='_self'><button class='btn btn-success'>Processing</button></a>
        </div></div><div class='col-md-3'><div class='d-grid'>
            <a style='cursor: pointer' onclick=\"shiftdataV1('task_onhold', 'taskset')\" target='_self'><button class='btn btn-warning'>On Hold</button></a>
        </div></div><div class='col-md-3'><div class='d-grid'>
            <a style='cursor: pointer' onclick=\"shiftdataV1('task_completed', 'taskset')\" target='_self'><button class='btn btn-info'>Completed</button></a>
        </div></div>
    </div><hr>
    
    <div class='table-responsive' style='min-height:500px'>
        <table class='table table-hover'>
            <thead><tr><th>Task Detail</th><th>Schedule Date</th><th>Deadline</th><th>Priority</th><th class='text-end'>Action</th></tr></thead>
            <tbody id='taskset'>";
                include("task_pending.php");
            echo"</tbody>
        </table>
    </div>";

?>