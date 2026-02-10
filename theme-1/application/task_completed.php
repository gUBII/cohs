<?php
    echo"<div style='padding:5px' onmouseover=\"shiftdataV1('task_completed', 'taskset')\">";
        include("auth.php");
        if($uactype=="ADMIN") $s1 = "select * from tasks where status='COMPLETED' order by id desc";
        else $s1 = "select * from tasks where eid='".$_COOKIE["uid"]."' and status='COMPLETED' order by id desc";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            $dfrom=date("d-m-Y h:i a", $rs1["dfrom"]);
            $dto=date("d-m-Y h:i a", $rs1["dto"]);
            echo"<tr>
                <td style='max-width:40%'>".$rs1["detail"]."</td><td>$dfrom</td><td>$dto</td><td>".$rs1["priority"]."</td>
                <td class='text-end'>
                    <div class='dropdown'>
                        <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                        <div class='dropdown-menu' onmouseup=\"shiftdataV1('task_completed', 'taskset')\">
                            <a class='dropdown-item' href='dataprocessor.php?processor=updatetask&statusupdate=PENDING&id=".$rs1["id"]."' target='dataprocessor' onmouseup=\"shiftdataV1('task_completed', 'taskset')\">Pending</a>
                            <a class='dropdown-item' href='dataprocessor.php?processor=updatetask&statusupdate=PROCESSING&id=".$rs1["id"]."' target='dataprocessor' onmouseup=\"shiftdataV1('task_completed', 'taskset')\">Processing</a>
                            <a class='dropdown-item' href='dataprocessor.php?processor=updatetask&statusupdate=ONHOLD&id=".$rs1["id"]."' target='dataprocessor' onmouseup=\"shiftdataV1('task_completed', 'taskset')\">On Hold</a>";
                            if($uactype=="ADMIN") {
                                echo"<hr><a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('task_edit.php?tid=".$rs1["id"]."&sheba=task_completed', 'datashiftZ')\">Edit</a>
                                <hr><a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=tasks' target='dataprocessor' onmouseup=\"shiftdataV1('task_completed', 'taskset')\">Delete</a>";
                            }
                        echo"</div>
                    </div>
                </td>
            </tr>";
        } }
    echo"</div>";
?>