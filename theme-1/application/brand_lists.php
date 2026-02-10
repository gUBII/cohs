<?php
    echo"<div style='padding:5px' onmouseover=\"shiftdataV1('brand_lists', 'taskset')\">";
        include("auth.php");
        $s1 = "select * from brand order by sorder asc";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            echo"<tr><td style='max-width:40%'><b>".$rs1["title"]."</b></td><td>".$rs1["introduction"]."</td><td>".$rs1["status"]."</td>
                <td class='text-end'>
                    <div class='dropdown'>
                        <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                        <div class='dropdown-menu'>
                            <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('brand_edit.php?bid=".$rs1["id"]."&sheba=brand_lists', 'datashiftX')\">Edit</a>
                            <a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=brand' target='dataprocessor' onblur=\"shiftdataV1('brand_lists', 'taskset')\">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>";
        } }
    echo"</div>";
?>