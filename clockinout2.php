<?php
    error_reporting(0);
    include('authenticator.php');
    date_default_timezone_set("Australia/Melbourne");
    $timenow=time();
    $timenowx=date("h:i:s A", $timenow);
    $s7 = "select * from theme where id='1' order by id asc limit 1";
    $r7 = $conn->query($s7);
    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
        $topbar_color=$rs7["topbar_color"];
        $tbtc=$rs7["topbar_text_color"];
        $sidebar_color=$rs7["sidebar_color"];
        $sbtc=$rs7["sidebar_text_color"];
    } }
    
    
    if(isset($_COOKIE["timeclockin"])){
        echo"<div class=row style='padding:5px;max-height:45px;background-color:white'>
            <div class='col-lg-12'><center><span style='color:black;font-size:10pt'>Current Time: $timenowx</span><br>";
                // ".$_COOKIE["shiftclockin"].", ".$_COOKIE["shiftclockout"]."
                $totalworkhour=0;
                $totalworkclock="00:00:00";
                    
                $currentdate=date("Y-m-d h:i:s a", $timenow);
                $clockindate=date("Y-m-d h:i:s a", $_COOKIE["timeclockin"]);
                $date1=date_create("$clockindate");
                $date2=date_create("$currentdate");
                $diff=date_diff($date1,$date2);
                $totalworkclock= $diff->format("%H : %I : %S");
                $totalworkhour= $diff->format("%H Hours");
                
                $currentday=date("l", $timenow);
                $cday=date("l", $_COOKIE["timeclockin"]);
                $oday=date("d", $_COOKIE["timeclockin"]);
                $tday=date("d", $timenow);
                $otday=($tday-$oday);
                
                echo"<table width=100% style=';background-color:$sidebar_color;color:$sbtc;padding:8px;border-radius:10px;box-shadow: 0px 0px 25px 2px $sidebar_color;'>
                    <tr><td align=center>
                        <div style='padding-top:8px;color:$sbtc'>Work time on : ".$_COOKIE["shiftname"]."</div>
                        <br>Clocked-in: $currentday 
                    </td></tr>
                    <tr><td align=center><span style='color:$sbtc;font-size:25pt'><strong>$totalworkclock</strong></span><hr></td></tr>
                    <tr><td align=center>&nbsp;&nbsp;<span style='color:$sbtc;font-size:8pt'>Total Work hour : $totalworkhour</span></td></tr>
                </table><br>
                <form method='post' name='shift_today' action='scheduling-geo-out.php' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='timeclockout' value='$timenow'>
                    <input type='hidden' name='wage' value='$wage_amount'>
                    <input type='hidden' name='overtime' value='$overtime_amount'>
                    <button type='submit' class='btn-active btn btn-danger btn-xs' style='width:100%;height:30px;border-radius:20'>
                        <i class='fa fa-clock-o' style='color:#EEEEEE;font-size:15pt'></i>&nbsp;&nbsp;<span style='font-size:10pt'>Clock-Out</span>
                    </button>
                </form>";
                if($otday>=1) {
                    ?> <script language=JavaScript> document.shift_today.submit(); </script> <?php
                }
            echo"</center></div>
        </div>";
    }
?>