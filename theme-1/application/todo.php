<?php
    include("auth.php");
    
    echo"<div class='content-header'>
        <div><h4 class='content-title card-title'>My To-Do List </h2></div>
        <div> </div>
    </div>
    
    <form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
        <div class='row'>
            <div class='col-md-9'>
                <div class='mb-3'><label class='form-label'>To-Do Detail</label><textarea placeholder='Type here' class='form-control' name='todo_detail'></textarea></div>
            </div><div class='col-md-3'>
                <div class='mb-3'><label for='product_slug' class='form-label'>Start Time</label><input type='datetime-local' placeholder='Type here' class='form-control' id='product_slug' value='$cdate' name='dfrom' /></div>
                <div class='d-grid'>
                    <button class='btn btn-primary' onmouseout=\"shiftdataV1('todo_list', 'taskset')\">Save</button>
                    <input type=hidden name=processor value='addnew'><input type=hidden name=processor value='addnewtodo'>
                </div>
            </div>
        </div>
    </form>
    
    <div class='table-responsive' style='min-height:500px'>
        <table class='table table-hover'>
            <thead><tr><th>Date</th><th>To-Do</th><th class='text-end'>Action</th></tr></thead>
            <tbody id='taskset'>";
                include("todo_list.php"); 
            echo"</tbody>
        </table>
    </div>";
?>