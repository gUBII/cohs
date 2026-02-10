<?php
    echo"<div class='content-header'><div><h4 class='content-title card-title'>My Tasks </h2></div><div> </div></div>
    <div class='table-responsive'>
        <table class='table table-hover'>
            <thead><tr><th style='width:150px' nowrap>Date</th><th>Source</th><th>Activity Log</th></tr></thead>
            <tbody>";
                include("auth.php");
                if($uactype=="ADMIN") $s1 = "select * from activity_log where status='1' order by id desc";
                else $s1 = "select * from tasks where uid='".$_COOKIE["uid"]."' and status='1' order by id desc";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $activity_date=date("d-m-Y h:i a", $rs1["date"]);
                    echo"<tr><td>$activity_date</td><td>".$rs1["activity"]."</b></td><td>".$rs1["detail"]."</td></tr>";
                } }
            echo"</tbody>
        </table>
    </div>";
?>