<?php
    include("auth.php");
    $cdate=date("Y-m-d");
    $ctime=date("h:i");
    $t="T";
    $cdate="$cdate$t$ctime";
    echo"<div class='row'>
            <div class='col-md-9'><h4 class='content-title card-title'>Edit To-Do List</h2></div>
            <div class='col-md-3'><button class='btn btn-primary' onclick=\"shiftdataV1('todo', 'datashiftZ')\">New To-Do</button></div>
        </div><hr>
    </div>";
    $s1x = "select * from todo where id='".$_GET["tid"]."' order by id asc limit 1";
    $r1x = $conn->query($s1x);
    if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
        $cdate=date("Y-m-d", $rs1x["dfrom"]);
        $ctime=date("h:i", $rs1x["dfrom"]);
        $t="T";
        $cdatex="$cdate$t$ctime";
        echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
            <div class='row'>
                <div class='col-md-9'>
                    <div class='mb-3'><label class='form-label'>To-Do Detail</label><textarea placeholder='Type here' class='form-control' name='todo_detail'>".$rs1x["detail"]."</textarea></div>
                </div><div class='col-md-3'>
                    <div class='mb-3'><label for='product_slug' class='form-label'>Start Time</label><input type='datetime-local' placeholder='Type here' class='form-control' id='product_slug' value='$cdatex' name='dfrom' /></div>
                    <div class='d-grid'>
                        <button class='btn btn-primary' onmouseout=\"shiftdataV1('".$_GET["sheba"]."', 'taskset')\">Update</button>
                        <input type=hidden name=id value='".$rs1x["id"]."'><input type=hidden name=processor value='updatetodo2'>
                    </div>
                </div>
            </div>
        </form>";
    } }
    
    echo"<div class='table-responsive' style='min-height:500px'>
        <table class='table table-hover'>
            <thead><tr><th>Date</th><th>To-Do</th><th class='text-end'>Action</th></tr></thead>
            <tbody id='taskset'>";
                include("todo_list.php"); 
            echo"</tbody>
        </table>
    </div>";
?>