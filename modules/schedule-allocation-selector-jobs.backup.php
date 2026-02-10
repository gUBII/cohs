<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    error_reporting(0);
    include("../authenticator.php");
/*
    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='../css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
	<link rel='stylesheet' href='../css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='../css/vendor/plyr.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />        
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='../js/base/loader.js'></script>";
    */
    $dx=$_GET["days"];
    $mx=$_GET["months"];
    $yx=$_GET["years"];
    $ex=$_GET["empid"];
    $rdt=$_GET["rdt"];
    
    $empidx=$_GET["empid"];

    $strpos =strrpos("$empidx","-");
    $strpos=($strpos+1);
    $year= substr("$empidx",$strpos);
                    
    $strpos1=($strpos-1);
    $empidx=substr("$empidx",0, $strpos1);
    $strpos =strrpos("$empidx","-");
    $strpos=($strpos+1);
    $month= substr("$empidx",$strpos);
                    
    $strpos1=($strpos-1);
    $empidx=substr("$empidx",0, $strpos1);
    $strpos =strrpos("$empidx","-");
    $strpos=($strpos+1);
    $day= substr("$empidx",$strpos);
                    
    $strpos1=($strpos-1);
    $empidx=substr("$empidx",0, $strpos1);
    $strpos =strrpos("$empidx","-");
    $empid= substr("$empidx",$strpos);

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    $getdata=$_COOKIE["getdatay"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>Shift Allocation $dx-$mx-$yx</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close' 
            onmouseover=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"></button>
    </div>
    <div class='offcanvas-body' onmouseout=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
        <div class='tabs-container'>";
            $r1x = "select * from uerp_user where id='".$_GET["empid"]."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $empname="".$r1z["username"]." ".$r1z["username2"].""; } }
                            
            echo"<div 'padding:10px;'>Client Name : $empname</center></div>";
            
            echo"<div role='tabpanel' id='tab-11' class='tab-pane active'>
                <div class='panel-body'>";
                    
                    $t=0;
                    $r1 = "select * from shifting_schedule where status='1' order by id asc";
                    $r1x = $conn->query($r1);
                    if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                        $projectname="";
                        $projectcolor="";
                        $pstatus=0;
                        $r99 = "select * from project where id='".$r1y['projectid']."' and clientid='".$_GET["empid"]."' and status='1' order by id asc limit 1";
                        $r9 = $conn->query($r99);
                        if ($r9->num_rows > 0) { while($r9x = $r9 -> fetch_assoc()) {
                            $pstatus=1;
                            $projectname=$r9x["name"];
                            $projectcolor=$r9x["color"];
                            $clientname="";
                            $clientid="";
                            $r88 = "select * from uerp_user where id='".$r9x['clientid']."' order by id asc limit 1";
                            $r8 = $conn->query($r88);
                            if ($r8->num_rows > 0) { while($r8x = $r8 -> fetch_assoc()) {
                                $clientid=$r8x["id"];
                                $clientname1=$r8x["username"]; 
                                $clientname2=$r8x["username2"]; 
                                $clientname="$clientname1 $clientname2";
                            } }
                        } }
                        if($projectcolor=="#FFFFFF") $fontcolor="#000000";
                        else $fontcolor="#FFFFFF";
                        
                        if($pstatus!==0){
                            $t=($t+1);
                            if($r1y['night']==1) $nightmode="ON";
                            else $nightmode="OFF";
                            echo"<form name='myform$t' method='post' action='dataprocessor02.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type=hidden name='processor' value='shiftallocation1'>
                                <input type=hidden name='projectid' value='".$r1y['projectid']."'>
                                <input type=hidden name='clientid' value='$clientid'>
                                <input type=hidden name='days' value='$dx'>
                                <input type=hidden name='months' value='$mx'>
                                <input type=hidden name='years' value='$yx'>
                                <input type=hidden name='stime' value='".$r1y['stime']."'>
                                <input type=hidden name='etime' value='".$r1y['etime']."'>
                                <input type=hidden name='pcolor' value='$projectcolor'>
                                <input type=hidden name='night' value='".$r1y['night']."'>
                                
                                <input type=hidden name='linenumber' value='".$r1y['itemnumber']."'>
                                <input type=hidden name='category' value='".$r1y['category']."'>
                                <input type=hidden name='repeating' value='".$r1y['repeating']."'>
                                <input type=hidden name='note' value='".$r1y['note']."'>
                                <input type=hidden name='address' value='".$r1y['address']."'>
                                        
                                <div onmouseout=\"shiftdataV2('schedule-track-jobs.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
                                    <table style='width:100%'>
                                        <tr><td colspan=2>
                                            <br><a href='#'><span style='font-size:10px'>$t. Project/Lead Name: $projectname</span></a><br>
                                            <span style='font-size:12pt'><b>From: ".$r1y['stime']." To ".$r1y['etime']." Over Night: $nightmode</span>
                                        </td></tr>
                                        <tr><td>
                                            <select class='form-control' name='employeeid' required style='border-color:$projectcolor;height:20px;text-align:left;padding:2px;width:100%;'><option value=''>Select Employee</option>";
                                                $ra71 = "select * from uerp_user where mtype='ADMIN' and status='1' order by username asc";
                                                $rb71 = $conn->query($ra71);
                                                if ($rb71->num_rows > 0) { while($rab71 = $rb71->fetch_assoc()) {
                                                    echo"<option value='".$rab71["id"]."'>".$rab71["username"]." ".$rab71["username2"]."</option>";
                                                } }
                                                $ra7 = "select * from uerp_user where mtype='USER' and status='1' order by username asc";
                                                $rb7 = $conn->query($ra7);
                                                if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                    $lts=0;
                                                    $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$day' and month='$month' and year='$year' and status='1' order by id asc limit 1";
                                                    $lt2 = $conn->query($lt1);
                                                    if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                                    if($lts==1) echo"<option value='".$rab7["id"]."' disabled>".$rab7["username"]." ".$rab7["username2"]." - Not Available</option>"; 
                                                    else echo"<option value='".$rab7["id"]."'>".$rab7["username"]." ".$rab7["username2"]."</option>"; 
                                                } }
                                            echo"</select>
                                            </td><td>
                                                <input type='submit' class='btn btn-success btn-icon btn-icon-start' value='Assign Shift' onclick=\"myFunctionX(); getDataX('".$_GET["empid"]."', 'datatargetX');\">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>";
                        }
                    } }
                echo"</div>
            </div>            
        </div>
    </div>";
    ?>
    <script>
        function myFunctionX() {
            alert("Schedule Allocated.");
        }
    </script>