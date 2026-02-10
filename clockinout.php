<?php
    error_reporting(0);
    include('authenticator.php');
    // include('head.php');
    
    date_default_timezone_set("Australia/Melbourne");
    $timenow=time();
    $timenowx=date("h:i:s A", $timenow);
    
    // echo"".$_COOKIE["timeclockstat"]."";
    
    if(isset($_COOKIE["timeclockstat"])){
        echo"<div class='card text-white bg-primary' style='max-height:45px;'><center>";
        
            echo"<span style='font-size:13pt'>Current Time: $timenowx</span><br>";
            
            $tc1 = "select * from shifting_allocation where id='".$_COOKIE["timeclockstat"]."' order by id asc limit 1";
            $tc2 = $conn->query($tc1);
            if ($tc2->num_rows > 0) { while($tc3 = $tc2 -> fetch_assoc()) {
                    
                    if($tc3["clockin"]=="0") {   
                        
                        $wage_amount="";
                        $overtime_amount="";
                        
                        $r1w = "select * from uerp_user where id='".$tc3['employeeid']."' order by id asc limit 1";
                        $r2w = $conn->query($r1w);
                        if ($r2w->num_rows > 0) { while($r3w = $r2w -> fetch_assoc()) {
                            $wage_amount=$r3w["reg_amt"];
                            $overtime_amount=$r3w["overtime"];
                            $night=$r3w["night_amt"];
                            
                        } }
                        
                        $clientname="";
                        $r1x = "select * from uerp_user where id='".$tc3['clientid']."' order by id asc limit 1";
                        $r1y = $conn->query($r1x);
                        if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                            $clientname=$r1z["username"];
                            $clientphone=$r1z["phone"];
                        } }
                        
                        $projectname="";
                        $r2x = "select * from project where id='".$tc3['projectid']."' order by id asc limit 1";
                        $r2y = $conn->query($r2x);
                        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                        
                        $stime=substr($tc3['stime'],11,5);
                        $etime=substr($tc3['etime'],11,5);
                        $stime1=""; $stime2=""; $sstat="";
                        $etime1=""; $etime2=""; $estat="";
                        $stime1=substr($tc3['stime'],11,2);
                        $stime2=substr($tc3['stime'],14,2);
                        if($stime1>=13) $stime1=($stime1-12);    
                        if($stime1>=13){
                            $stime1=($stime1-12);
                            if($stime1<="9") $stime1="0$stime1";
                            $sstat="PM";
                        }else{
                            $sstat="AM";
                        }
                        if($stime1==00){
                            $stime1=12;
                            $sstat="AM";
                        }else if($stime1==12){
                            $sstat="PM";
                        }
                                                                                                    
                        $etime1=substr($tc3['etime'],11,2);
                        $etime2=substr($tc3['etime'],14,2);
                        if($etime1>=13){
                            $etime1=($etime1-12);
                            if($etime1<="9") $etime1="0$etime1";
                            $estat="PM";
                        }else{
                            $estat="AM";
                        }
                        if($etime1==00){
                            $etime1=12;
                            $estat="AM";
                        }else if($etime1==12){
                            $estat="PM";
                        }
                        
                        $statuscolor="black";
                        if($tc3["accepted"]=="0") $statuscolor="btn btn-info";
                        if($tc3["accepted"]=="1") $statuscolor="btn btn-success";
                        if($tc3["accepted"]=="2") $statuscolor="btn btn-warning";
                        if($tc3["accepted"]=="3") $statuscolor="btn btn-danger";
                        
                        echo"<br>";
                        
                        if($_COOKIE["dbname"]=="saas_info_goodwillcare_net") echo"<label><input type='checkbox' name='terms' checked > I Agree to the <a href='media/subcontractor_agreement.pdf' target='_blank' style='color:black'>Terms and Conditions</a></label><br>";
                        else echo"<label><input type='checkbox' name='terms' checked > I Agree to the <a href='media/subcontractor_general_agreement.pdf' target='_blank' style='color:black'>Terms and Conditions</a></label><br>";
                            
                        echo"<form method='POST' name='shift_today' action='scheduling-geo-in.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='timeclockin' value='$timenow'>
                            <input type='hidden' name='shiftname' value='$clientname @ $projectname'>
                            <input type='hidden' name='shiftclockin' value='".$tc3['stime']."'>
                            <input type='hidden' name='shiftclockout' value='".$tc3['etime']."'>
                            <input type='hidden' name='wage' value='$wage_amount'><input type='hidden' name='night' value='$night'>
                            <input type='hidden' name='overtime' value='$overtime_amount'>
                            <input type='submit' class='$statuscolor' value='Start Clock-In' name=submit>
                        </form><br>";
                        
                        echo"<div style='width:100%;padding:2px;' id='".$tc3["id"]."'>
                            <div class='btn btn-primary' style='width:100%;text-align:left;border-radius:5px'>
                                <table width='100%'><tr>
                                    <td align=left><span style='font-size:8pt'>Clock-In : <i class='fa fa-clock-o'></i> $stime1:$stime2 $sstat</span></td>
                                    <td align=right><span style='font-size:8pt'>Clock-Out: <i class='fa fa-clock-o'></i> $etime1:$etime2 $estat</span></td>
                                </tr><tr><td colspan=2>
                                    <span style='font-size:8pt'>Participant name: $clientname<br>Under Project: $projectname</span>
                                </td></tr></table>
                            </div>
                        </div>";
                        
                    }else{
                        
                        if($tc3["clockout"]=="0") {
                            
                            $wage_amount="";
                            $overtime_amount="";
                            
                            $r1w = "select * from uerp_user where id='".$tc3['employeeid']."' order by id asc limit 1";
                            $r2w = $conn->query($r1w);
                            if ($r2w->num_rows > 0) { while($r3w = $r2w -> fetch_assoc()) {
                                $wage_amount=$r3w["reg_amt"];
                                $overtime_amount=$r3w["overtime"];
                            } }
                            
                            $clientname="";
                            $r1x = "select * from uerp_user where id='".$tc3['clientid']."' order by id asc limit 1";
                            $r1y = $conn->query($r1x);
                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname=$r1z["username"]; } }
                            
                            $projectname="";
                            $r2x = "select * from project where id='".$tc3['projectid']."' order by id asc limit 1";
                            $r2y = $conn->query($r2x);
                            if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                            
                            $totalworkhour=0;
                            $totalworkclock="00:00:00";
                            
                            $currentdate=date("Y-m-d h:i:s a", $timenow);
                            $clockindate=date("Y-m-d h:i:s a", $tc3['clockin']);
                            $date1=date_create("$clockindate");
                            $date2=date_create("$currentdate");
                            $diff=date_diff($date1,$date2);
                            $totalworkclock= $diff->format("%H : %I : %S");
                            $totalworkhour= $diff->format("%H Hours");
                            
                            // echo"".$_COOKIE["timeclockstat"]." - $currentdate<br>$clockindate<br>$totalworkclock, $totalworkhour";
                            // echo"$currentdate<br>$clockindate";
                            $currentday=date("l", $timenow);
                            $cday=date("l", $tc3["clockin"]);
                            $oday=date("d", $tc3["clockin"]);
                            $tday=date("d", $timenow);
                            $otday=($tday-$oday);
                            
                            $stimeA1="";
                            $etimeA1="";
                            $stimeA=strtotime($tc3["stime"]);
                            $etimeA=strtotime($tc3["etime"]);
                            $stimeA1=date("h:i A", $stimeA);
                            $etimeA1=date("h:i A", $etimeA);
                            $etimeB=time();
                            $etimeAB=($etimeA-$etimeB);
                            // echo"$etimeA - $etimeB = $etimeAB";
                            echo"<table width=100% style=';background-color:$sidebar_color;padding:10px'>
                                <tr><td align=center>
                                    <div style='padding-top:8px;color:$sbtc'>Work time on : $clientname @ $projectname</div>
                                    <br>Today: $currentday
                                </td></tr>
                                <tr><td align=center>
                                    <div style='padding:0px;background-color:black;color:lightgreen;border-radius:5px'>
                                        <span style='font-size:30pt'><strong>$totalworkclock</strong></span>
                                    </div>
                                <hr></td></tr>
                                <tr><td align=left>&nbsp;&nbsp;<span style='font-size:8pt'>Location: 
                                    <a href='https://maps.google.com/maps?q=".$_COOKIE["latitudez"].",".$_COOKIE["longitudez"]."&hl=es;z=14'
                                    style='font-size:8pt' target='_blank'>".$_COOKIE["latitudez"].", ".$_COOKIE["longitudez"]." - See on Map</a></span></td></tr>
                                <tr><td align=left>&nbsp;&nbsp;<span style='font-size:8pt'>Total Work hour : $totalworkhour</span></td></tr>
                            </table><br>";
                            
                            if($_COOKIE["dbname"]=="saas_info_goodwillcare_net") echo"<label><input type='checkbox' name='terms' checked disabled> Agreed to the <a href='media/subcontractor_agreement.pdf' target='_blank' style='color:black'>Terms and Conditions</a></label><br>";
                            else echo"<label><input type='checkbox' name='terms' checked disabled> Agreed to the <a href='media/subcontractor_general_agreement.pdf' target='_blank' style='color:black'>Terms and Conditions</a></label><br>";
                            
                            echo"<form method='post' name='shift_today' action='scheduling-geo-out.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='timeclockout' value='$timenow'>
                                <input type='hidden' name='wage' value='$wage_amount'>
                                <input type='hidden' name='overtime' value='$overtime_amount'>
                                <input type='submit' class='btn btn btn-danger btn-xs' value='Clock-Out' name='submit'>
                            </form>";
                            
                            if($otday>=1) {
                                ?> <script language=JavaScript> document.shift_today.submit(); </script> <?php
                            }
                            if($etimeAB<=0) {
                                ?> <script language=JavaScript> document.shift_today.submit(); </script> <?php
                            }
                        }else{
                            echo"<br><a href='index.php?url=clock_in-out.php'>
                                <button type='button' class='btn btn-success'>Clocked Out<br>@<br>$etime1:$etime2 $estat</button>
                            </a><br><br>";
                        }
                    }
                } }
                
            echo"</center></div>
        </div>";
    }
    
    // include('scripts.php');
?>