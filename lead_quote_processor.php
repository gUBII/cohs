    <?php
        include 'include.php';
        
        $tday=time();
        
        if(isset($_POST["eid"])){
            
            if($_POST["statx"]==1){
                $sql="update project_team_allocation_lead set mon='".$_POST["mon"]."',tue='".$_POST["tue"]."',wed='".$_POST["wed"]."',
                thu='".$_POST["thu"]."',fri='".$_POST["fri"]."',sat='".$_POST["sat"]."',sun='".$_POST["sun"]."',
                evening='".$_POST["evening"]."' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==2){
                // Convert "H:i" to seconds since midnight
                list($h1, $m1) = explode(':', $_POST["time1"]);
                list($h2, $m2) = explode(':', $_POST["time2"]);
                
                $seconds1 = $h1 * 3600 + $m1 * 60;
                $seconds2 = $h2 * 3600 + $m2 * 60;
                
                // Calculate time difference in seconds
                $diff_seconds = abs($seconds2 - $seconds1);
                
                // Convert back to hours and minutes
                $hours = floor($diff_seconds / 3600);
                $minutes = floor(($diff_seconds % 3600) / 60);
                if($hours<=9) $hours="0$hours";
                if($minutes<=9) $minutes="0$minutes";
                
                $sql="update project_team_allocation_lead set time1='".$_POST["time1"]."',time2='".$_POST["time2"]."',qty1='$hours',qty2='$minutes' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==3){
                $sql="update project_team_allocation_lead set category='".$_POST["category"]."',repeating='".$_POST["repeating"]."' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==4){
                $serviceNote = htmlspecialchars(trim($_POST["note"]));
                $sql="update project_team_allocation_lead set note='$serviceNote' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==5){
                $serviceAddress = htmlspecialchars(trim($_POST["address"]));
                $sql="update project_team_allocation_lead set address='$serviceAddress' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==6){
                $mx1 = "select * from uerp_user where id='".$_POST["supportworker"]."' order by id desc limit 1";
                $mx2 = $conn->query($mx1);
                if ($mx2->num_rows > 0) { while($mx3 = $mx2 -> fetch_assoc()) {
                    $weekday_rate=$mx3["reg_amt"];
                    $saturday_rate=$mx3["sat_amt"];
                    $sunday_rate=$mx3["sun_amt"];
                    $night_rate=$mx3["night_amt"];
                } }
                $sql="update project_team_allocation_lead set employeeid='".$_POST["supportworker"]."',rate2='$weekday_rate' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            // echo"<script>alert('New Budget Assigned.')</script>";
        }
    ?>