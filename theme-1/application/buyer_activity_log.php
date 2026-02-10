<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Buyers Activity Log</h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='table-responsive'>
                    <table class='table table-hover'>
                        <thead><tr><th style='width:150px' nowrap>Date</th><th>Source</th><th>Activity Log</th></tr></thead>
                        <tbody>";
                            include("auth.php");
                            $s1 = "select * from activity_log where status='1' and actype='BUYER' order by id desc";
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                $activity_date=date("d-m-Y h:i a", $rs1["date"]);
                                echo"<tr><td>$activity_date</td><td>".$rs1["activity"]."</b></td><td>".$rs1["detail"]."</td></tr>";
                            } }
                        echo"</tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>