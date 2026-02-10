<?php
    error_reporting(0);
    include('include.php');
    
    $employeeid=$_GET["empid"];
    $days=$_GET["days"];
    $months=$_GET["months"];
    $years=$_GET["years"];
    $getdata=$_COOKIE["getdatay"];
    
    // echo"$employeeid, $days, $months, $years<br>";
    if (isset($_GET["empid"])) {
        echo"<div class='row'>";
            $tox=0;
            $tox1=0;
            
            $r5x1 = "select * from shifting_allocation where employeeid='".$_GET["empid"]."' and days='".$_GET["days"]."' and months='".$_GET["months"]."' and years='".$_GET["years"]."' and status='1' order by id asc";
            $r5x2 = $conn->query($r5x1);
            if ($r5x2->num_rows > 0) { while($r5x3 = $r5x2 -> fetch_assoc()) { $tox=($tox+1); } }
            if($tox==1) $tox1="12";
            else if($tox==2) $tox1="6";
            else $tox1="4";
            
            $r5a = "select * from shifting_allocation where employeeid='".$_GET["empid"]."' and days='".$_GET["days"]."' and months='".$_GET["months"]."' and years='".$_GET["years"]."' and status='1' order by id asc";
            $r5b = $conn->query($r5a);
            if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                $clientname="";
                $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
                $r1y = $conn->query($r1x);
                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname=$r1z["username"]; } }
                $projectname="";
                $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
                $r2y = $conn->query($r2x);
                if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
                                                                                
                $stime=substr($r5c['stime'],11,5);
                $etime=substr($r5c['etime'],11,5);
                $stime1=""; $stime2=""; $sstat="";
                $etime1=""; $etime2=""; $estat="";
                $stime1=substr($r5c['stime'],11,2);
                $stime2=substr($r5c['stime'],14,2);
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
                $etime1=substr($r5c['etime'],11,2);
                $etime2=substr($r5c['etime'],14,2);
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
                if($r5c["accepted"]=="0"){
                    $statuscolor="#CCCCCC";
                    $statuscolor2="#000000";
                }else{
                    $statuscolor=$r5c["color"];
                    $statuscolor2="#FFFFFF";
                }
                echo"<div class='col-lg-$tox1' style='min-height:200px'><br><br> ";
                    if($r5c["accepted"]==1 and $day=="$d1" AND $month=="$mm1" AND $y=="$y") echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' style='border-radius:20px'>";
                    else echo"<a href='#' data-toggle='modal' data-target='#schedulemover1' onclick=\"getDataMove1('".$r5c["id"]."', 'schedulemover2')\">";
                        echo"<div style='width:100%;padding:2px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                            <div class='btn' style='color:$statuscolor2;background-color:$statuscolor;width:200px;height:200px;text-align:center;border-radius:50%'>
                                <br><br><i class='fa fa-clock-o' style='font-size:30px'></i><br>
                                <span style='font-size:12pt'>$stime1:$stime2 $sstat - $etime1:$etime2 $estat</span><br>
                                <span style='font-size:8pt'>$clientname @ $projectname</span><br>";
                                if($r5c["night"]==1) echo"Over Night Shift";
                                else echo"Regular Shift";
                            echo"</div>
                        </div>
                    </a>
                    <table style='width:100%;height:60px;'><tr><td align=center valign=top>Location: <b><br>".$r5c["address"]."</b></span></td></tr></table>";
                    
                    if($r5c["accepted"]==1 and $day=="$d1" AND $month=="$mm1" AND $y=="$y"){
                                                                                        
                        if($r5c["clockin"]=="0"){
                            echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='btn btn-primary'>Clock IN</a><br>";
                        }else{
                            if($r5c["clockout"]=="0") echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='btn btn-warning'>Clocked IN Status</a><br>";
                            else echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='btn btn-danger'>Clocked Out</a><br>";
                        }
                    }
                    if($r5c["accepted"]==0){
                        if($r5c["request2"]==1){
                            $stimeX=substr($r5c['stime2'],11,5);
                            $etimeX=substr($r5c['etime2'],11,5);
                            $stimeX1=""; $stimeX2=""; $sstatX="";
                            $etimeX1=""; $etimeX2=""; $estatX="";
                            $stimeX1=substr($r5c['stime2'],11,2);
                            $stimeX2=substr($r5c['stime2'],14,2);
                            if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                            if($stimeX1>=13){
                                $stimeX1=($stimeX1-12);
                                if($stimeX1<="9") $stimeX1="0$stimeX1";
                                $sstatX="PM";
                            }else{
                                $sstatX="AM";
                            }
                            $etimeX1=substr($r5c['etime2'],11,2);
                            $etimeX2=substr($r5c['etime2'],14,2);
                            if($etimeX1>=13){
                                $etimeX1=($etimeX1-12);
                                if($etimeX1<="9") $etimeX1="0$etimeX1";
                                $estatX="PM";
                            }else{
                                $estatX="AM";
                            }
                            echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                        }
                        if($r5c["request2"]==3){
                            echo"<a href='#' class='dropdown-item btn btn-info'>Re-Schedule Rejected/Not Approved.</a>";
                        }
                        if($r5c["request2"]==2){
                            echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='dropdown-item btn btn-success'>Re-Schedule Accepted.</a>";
                        }
                        echo"<a href='#' class='btn btn-success' data-toggle='modal' data-target='#schedulemover1' onclick=\"getDataMove1('".$r5c["id"]."', 'schedulemover2')\">Accept Schedule</a><br>";
                    }
                echo"</div>";
            } }
        echo"</div>";
        
        /*
        $r5a = "select * from shifting_allocation where employeeid='".$_GET["empid"]."' and days='".$_GET["days"]."' and months='".$_GET["months"]."' and years='".$_GET["years"]."' and status='1' order by id asc";
        $r5b = $conn->query($r5a);
        if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
            $clientname="";
            $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname=$r1z["username"]; } }
            $projectname="";
            $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
            $r2y = $conn->query($r2x);
            if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
            $stime=substr($r5c['stime'],11,5);
            $etime=substr($r5c['etime'],11,5);
            $stime1=""; $stime2=""; $sstat="";
            $etime1=""; $etime2=""; $estat="";
            $stime1=substr($r5c['stime'],11,2);
            $stime2=substr($r5c['stime'],14,2);
            if($stime1>=13) $stime1=($stime1-12);    
            if($stime1>=13){
                $stime1=($stime1-12);
                if($stime1<="9") $stime1="0$stime1";
                $sstat="PM";
            }else{
                $sstat="AM";
            }
            $etime1=substr($r5c['etime'],11,2);
            $etime2=substr($r5c['etime'],14,2);
            if($etime1>=13){
                $etime1=($etime1-12);
                if($etime1<="9") $etime1="0$etime1";
                $estat="PM";
            }else{
                $estat="AM";
            }
            $statuscolor="black";
            if($r5c["accepted"]=="0") $statuscolor="grey";
            if($r5c["accepted"]=="1") $statuscolor="lightgreen";
            if($r5c["accepted"]=="2") $statuscolor="orange";
            if($r5c["accepted"]=="3") $statuscolor="yellow";
            
            if($r5c["accepted"]=="0")  $statuscolor="#CCCCCC";
            else $statuscolor=$r5c["color"];
            
            if($r5c["request2"]==0){
                if($r5c["accepted"]==0) echo"<a href='#' class='dropdown-item' data-toggle='modal' data-target='#schedulemover1' onclick=\"getDataMove1('".$r5c["id"]."', 'schedulemover2')\">";
                else echo"<a href='#' class='dropdown-item' data-toggle='modal'>";
            }else echo"<a href='#' class='dropdown-item' data-toggle='modal'>";
                echo"<div style='width:100%;padding:2px;max-width:150px;color:white' id='".$r5c["id"]."' draggable='true' ondragstart='drag(event)'>
                    <div class='btn' style='color:white;background-color:$statuscolor;width:100%;text-align:left;max-width:150px;border-radius:10px'>
                        <i class='fa fa-clock-o'></i> <span style='font-size:8pt'>$stime1:$stime2 $sstat - $etime1:$etime2 $estat</span><br><span style='font-size:8pt'>$clientname @ $projectname</span>
                    </div>
                </div>";
            echo"</a>";
            
            if($r5c["accepted"]==1 and $day=="$d1" AND $month=="$mm1" AND $y=="$y"){
                echo"<a href='scheduling-set.php?timeclock=".$r5c["id"]."' class='dropdown-item btn btn-primary'>Time Clock</a>";
            }
            if($r5c["accepted"]==0){
                if($r5c["request2"]==1){
                    $stimeX=substr($r5c['stime2'],11,5);
                    $etimeX=substr($r5c['etime2'],11,5);
                    $stimeX1=""; $stimeX2=""; $sstatX="";
                    $etimeX1=""; $etimeX2=""; $estatX="";
                    $stimeX1=substr($r5c['stime2'],11,2);
                    $stimeX2=substr($r5c['stime2'],14,2);
                    if($stimeX1>=13) $stimeX1=($stimeX1-12);    
                    if($stimeX1>=13){
                        $stimeX1=($stimeX1-12);
                        if($stimeX1<="9") $stimeX1="0$stimeX1";
                        $sstatX="PM";
                    }else{
                        $sstatX="AM";
                    }
                    
                    $etimeX1=substr($r5c['etime2'],11,2);
                    $etimeX2=substr($r5c['etime2'],14,2);
                    if($etimeX1>=13){
                        $etimeX1=($etimeX1-12);
                        if($etimeX1<="9") $etimeX1="0$etimeX1";
                        $estatX="PM";
                    }else{
                        $estatX="AM";
                    }
                    echo"<a href='#' class='dropdown-item btn btn-info'>Waiting for Approval @ $stimeX1:$stimeX2 $sstatX - $etimeX1:$etimeX2 $estatX</a>";
                }
                if($r5c["request2"]==3){
                    echo"<a href='#' class='dropdown-item btn btn-danger'>Re-Schedule Rejected/Not Approved.</a>";
                }
                if($r5c["request2"]==2){
                    echo"<a href='#' class='dropdown-item btn btn-success'>Re-Schedule Accepted.</a>";
                }
            }
        } }
        */
    }
?>