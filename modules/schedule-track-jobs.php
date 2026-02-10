<?php
    error_reporting(0);
    include('../authenticator.php');
    
    $employeeid=$_GET["empid"];
    $days=$_GET["days"];
    $months=$_GET["months"];
    $years=$_GET["years"];
    $getdata=$_COOKIE["getdatay"];
    $datatarget=$_GET["rdt"];
    // echo"$employeeid, $days, $months, $years<br>";
    if (isset($_GET["empid"])) {
        
        $lts=0;
        $lt1 = "select * from leave_asign where cid='".$_GET["empid"]."' and day='".$_GET["days"]."' and month='".$_GET["months"]."' and year='".$_GET["years"]."' and status='1' order by id asc limit 1";
        $lt2 = $conn->query($lt1);
        if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
        if($lts==1){
            echo"<div style='width:100%;padding:2px;max-width:150px;background-color:#F7C6C5;font-size:7pt'><br>Not Available</div>";
        }else{
            $r5a = "select * from shifting_allocation where clientid='".$_GET["empid"]."' and days='".$_GET["days"]."' and months='".$_GET["months"]."' and years='".$_GET["years"]."' and status='1' order by id asc";
            $r5b = $conn->query($r5a);
            if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
                $employeename="";
                $r1x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
                $r1y = $conn->query($r1x);
                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $employeename="".$r1z["username"]." ".$r1z["username2"].""; } }
                $projectname="";
                $pstatus=0;
                $r2x = "select * from project where id='".$r5c['projectid']."' and status='1' order by id asc limit 1";
                $r2y = $conn->query($r2x);
                if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                    $pstatus=1;
                    $projectname=$r2z["name"];
                } }
                if($pstatus!=0){
                    $stime=substr($r5c['stime'],11,5);
                    $etime=substr($r5c['etime'],11,5);
                    $stime1=""; $stime2=""; $sstat="";
                    $etime1=""; $etime2=""; $estat="";
                    $stime1=substr($r5c['stime'],11,2);
                    $stime2=substr($r5c['stime'],14,2);
                    
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
                    $statuscolor="black";
                    if($r5c["accepted"]=="0") $statuscolor="grey";
                    if($r5c["accepted"]=="1") $statuscolor="lightgreen";
                    if($r5c["accepted"]=="2") $statuscolor="orange";
                    if($r5c["accepted"]=="3") $statuscolor="yellow";
                    
                    if($r5c["night"]==1) $nightcolor="black";
                    else $nightcolor="lightblue";
                    if($r5c["cancelled"]=='0') $rccolor=$r5c["color"];
                    else $rccolor="red";
                    echo"<div style='padding:5px;width:100%'>
                        <a href='#' data-bs-toggle='modal' data-bs-target='#schedulemover1' class='btn btn-outline-primary btn-icon btn-icon-start' draggable='true' ondragstart='drag(event)' 
                        onclick=\"shiftdataV2('schedule-mover-jobs.php?t=1&smid=".$r5c["id"]."&days=$days&months=$months&years=$years&rdt=$datatarget&empid=$employeeid', 'schedulemover2')\" 
                        style='background-color:$rccolor;padding-left:10px;padding-right:10px;height:50px;width:100%;text-align:left;border-radius:10px'>
                        
                        <div style='position:absolute;color:white;background-color:$statuscolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:-10px;margin-top:-15px' title='Grey=Waiting, LightGreen=Accepted/Clock-out, Orange=Clock-in'></div>
                        <div style='position:absolute;color:white;background-color:$nightcolor;width:12px;height:12px;border:1px solid #cccccc;border-radius:50%;margin-left:10px;margin-top:-15px' title='Blue=Night OFF, Black=Night On'></div>
                        <span style='font-size:8pt;color:white'>$stime1:$stime2 $sstat - $etime1:$etime2 $estat (".$r5c["repeating"].")</span><br><span style='font-size:8pt;color:white'>$employeename</span>
                    </a></div>";
                }
            } }
        }
    }
    include('../scripts.php');
?>