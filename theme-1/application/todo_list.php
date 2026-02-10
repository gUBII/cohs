<?php
    echo"<div style='padding:5px' onmouseover=\"shiftdataV1('todo_list', 'taskset')\">";
        include("auth.php");
        $s1 = "select * from todo where eid='".$_COOKIE["uid"]."' order by id desc";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            $dfrom=date("d-m-Y h:i a", $rs1["dfrom"]);
            echo"<tr><td>";
                if($rs1["status"]=="ACTIVE") echo"$dfrom"; else echo"<s>$dfrom</s>";
                echo"</td><td style='max-width:40%'>";
                if($rs1["status"]=="ACTIVE") echo"".$rs1["detail"].""; else echo"<s>".$rs1["detail"]."</s>";
                echo"</td><td class='text-end'>
                    <div class='dropdown'>
                        <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                        <div class='dropdown-menu' onmouseup=\"shiftdataV1('todo_list', 'taskset')\">";
                            if($rs1["status"]=="ACTIVE") echo"<a class='dropdown-item' href='dataprocessor.php?processor=updatetodo&statusupdate=CLOSED&id=".$rs1["id"]."' target='dataprocessor' onmouseup=\"shiftdataV1('todo_list', 'taskset')\">Completed</a>";
                            else echo"<a class='dropdown-item' href='dataprocessor.php?processor=updatetodo&statusupdate=ACTIVE&id=".$rs1["id"]."' target='dataprocessor' onmouseup=\"shiftdataV1('todo_list', 'taskset')\">Activate</a>";
                            echo"<a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('todo_edit.php?tid=".$rs1["id"]."&sheba=todo_list', 'datashiftZ')\">Edit</a>
                            <hr><a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=todo' target='dataprocessor' onmouseup=\"shiftdataV1('todo_list', 'taskset')\">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>";
        } }
    echo"</div>";
?>