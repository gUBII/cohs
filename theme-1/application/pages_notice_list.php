<?php
    echo"<div style='padding:5px' onmouseover=\"shiftdataV1('pages_notice_list', 'taskset')\">";
        include("auth.php");
        $s1 = "select * from sms_notice order by sorder asc";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            echo"<tr>
                <td style='max-width:40%'><b>".$rs1["title"]."</b><br>".$rs1["solution"]."</td><td>".$rs1["sorder"]."</td><td>".$rs1["status"]."</td>
                <td class='text-end'>
                    <div class='dropdown'>
                        <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                        <div class='dropdown-menu' onmouseup=\"shiftdataV1('task_pending', 'taskset')\">
                            <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('pages_notice_edit.php?fid=".$rs1["id"]."&sheba=pages_notice_list', 'datashiftX')\">Edit</a>
                            <a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=notice' target='dataprocessor' onblur=\"shiftdataV1('pages_notice_list', 'taskset')\">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>";
        } }
    echo"</div>";
?>