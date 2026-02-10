<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    error_reporting(0);
    include("../authenticator.php");

    $dx=$_GET["days"];
    $mx=$_GET["months"];
    $yx=$_GET["years"];
    $ex=$_GET["empid"];
    $rdt=$_GET["rdt"];

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    $getdata=$_COOKIE["getdatay"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>Shift Allocation</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close' 
            onmouseover=\"shiftdataV2('schedule-track.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\"></button>
    </div>
    <div class='offcanvas-body' onmouseout=\"shiftdataV2('schedule-track.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
        <div class='tabs-container'>";
            $r1x = "select * from uerp_user where id='".$_GET["empid"]."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $empname="".$r1z["username"]." ".$r1z["username2"].""; } }
                            
            echo"<div 'padding:10px;'>Employee Name : $empname</center></div>
                <div>
                <table style='width:100%'><tr>
                    <td><input type='text' id='myInputX' onkeyup='myFunctionX()' placeholder='Search' class='form-control'></td>
                    <td><a href='scheduling-set.php?empid2=".$_GET["empid"]."' class='btn btn-warning btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='height:35px'>Set Unavailable</a></td>
                    
                </tr></table><hr>
                <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTableX' style='width:100%'>
                
                    <tbody>";
                        $t=0;
                        $r1 = "select * from shifting_schedule where status='1' order by id asc";
                        $r1x = $conn->query($r1);
                        if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                            $projectname="";
                            $projectcolor="";
                            $pstatus=0;
                            $r99 = "select * from project where id='".$r1y['projectid']."' and status='1' order by id asc limit 1";
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
                            
                            $line_number=null;
                            $line_name=null;
                            $nsw=null;
                            $r99z = "select * from ndis_support_catelogue where id='".$r1y['itemnumber']."' order by id asc limit 1";
                            $r9z = $conn->query($r99z);
                            if ($r9z->num_rows > 0) { while($r9xz = $r9z -> fetch_assoc()) {
                                $line_number=$r9xz["support_item_number"];
                                $line_name=$r9xz["support_item_name"];
                                $nsw=$r9xz["nsw"];
                            } }
                            
                            $employeename=null;
                            $phone=null;
                            $email=null;
                            $r99y = "select * from uerp_user where id='".$r1y['employeeid']."' order by id asc limit 1";
                            $r9y = $conn->query($r99y);
                            if ($r9y->num_rows > 0) { while($r9xy = $r9y -> fetch_assoc()) {
                                $employeename=" ".$r9xy["username"]." ".$r9xy["username2"]."";
                                $phone=$r9xy["phone"];
                                $email=$r9xy["email"];
                            } }
                            
                            if($projectcolor=="#FFFFFF") $fontcolor="#000000";
                            else $fontcolor="#FFFFFF";
                            $t=($t+1);
                            if($pstatus!==0){
                                echo"<tr><td><div onmouseout=\"shiftdataV2('schedule-track.php?days=$dx&months=$mx&years=$yx&rdt=$rdt&empid=$ex', '$rdt')\">
                                    <form name='myform$t' method='post' action='dataprocessor02.php' target='dataprocessor' enctype='multipart/form-data'>
                                        <input type=hidden name='processor' value='shiftallocation'>
                                        <input type=hidden name='employeeid' value='".$_COOKIE["reid"]."'>
                                        <input type=hidden name='projectid' value='".$r1y['projectid']."'>
                                        <input type=hidden name='clientid' value='$clientid'>
                                        <input type=hidden name='days' value='".$_COOKIE["rday"]."'>
                                        <input type=hidden name='months' value='".$_COOKIE["rmonth"]."'>
                                        <input type=hidden name='years' value='".$_COOKIE["ryear"]."'>
                                        <input type=hidden name='linenumber' value='".$r1y['itemnumber']."'>
                                        <input type=hidden name='category' value='".$r1y['category']."'>
                                        <input type=hidden name='repeating' value='".$r1y['repeating']."'>
                                        <input type=hidden name='note' value='".$r1y['note']."'>
                                        <input type=hidden name='address' value='".$r1y['address']."'>";
            
                                        // <input type=hidden name='stime' value='".$_COOKIE["ryear"]."-".$_COOKIE["rmonth"]."-".$_COOKIE["rday"]." ".$r1y['stime'].":00'>
                                        // <input type=hidden name='etime' value='".$_COOKIE["ryear"]."-".$_COOKIE["rmonth"]."-".$_COOKIE["rday"]." ".$r1y['etime'].":00'>
                                                    
                                        // echo"<input type=hidden name='stime' value='".$_COOKIE["ryear"]."-".$_COOKIE["rmonth"]."-".$_COOKIE["rday"]." ".$r1y['stime']."'>
                                        // <input type=hidden name='etime' value='".$_COOKIE["ryear"]."-".$_COOKIE["rmonth"]."-".$_COOKIE["rday"]." ".$r1y['etime']."'>
                                        
                                        $stimeA1x="";
                                        $etimeA1x="";
                                        $stimeAx=strtotime($r1y["stime"]);
                                        $etimeAx=strtotime($r1y["etime"]);
                                        
                                        $stimeA1x=date("d-m h:i A", $stimeAx);
                                        $etimeA1x=date("d-m h:i A", $etimeAx);
                                        
                                        echo"<input type=hidden name='stime' value='".$r1y['stime']."'><input type=hidden name='etime' value='".$r1y['etime']."'>                                                    
                                        <input type=hidden name='pcolor' value='$projectcolor'><input type=hidden name='night' value='".$r1y['night']."'>";
                                        // echo"<button type='submit' class='btn shiftadded' style='background-color:$projectcolor;text-align:left;padding:3px;width:100%;color:$fontcolor' onclick=\"myFunctionX(); $getdata('".$_COOKIE["reid"]."', '$rdt');\">";
                                        if($r1y['night']==1) $nightmode="ON";
                                        else $nightmode="OFF";
                                        
                                        echo"<button type='submit' class='btn btn-outline-primary btn-icon btn-icon-start' style='background-color:$projectcolor;text-align:left;padding:5px;padding-left:10px;width:100%;color:$fontcolor;height:80px' onclick=\"myFunctionX(); getDataX('".$_GET["empid"]."', 'datatargetX');\">
                                            <span style='font-size:8pt;color:white'>$clientname @ </span><span style='font-size:8pt;color:white'>Project: $projectname</span></span><br>
                                            <span style='font-size:10pt;color:white'>".$r1y['stime']." - ".$r1y['etime']."</span> <span style='font-size:8pt;color:white'>( Over Night: $nightmode )</span><br>
                                            <span style='font-size:8pt;color:white'>Item Number: $line_number On ".$r1y['dayname']."</span><br>
                                            <span style='font-size:8pt;color:white'>Shift Allocated For $employeename ( <i class='fa fa-phone'></i> $phone )</span><br>
                                        </button>
                                    </form>
                                </div></td></tr>";
                            }
                        } }
                    echo"</tbody>
                </table>
            </div>
        </div>
    </div>";
    ?>
    <script>
        function myFunctionX() {
            alert("Schedule Allocated.");
        } 
        
    </script>
    <?php
    /*
    <div role='tabpanel' id='tab-12' class='tab-pane'>
        <div class='panel-body'>
            Task Allocation</strong>
            <form name='myformx' method='post' action='dataprocessor02.php' target='dataprocessor' enctype='multipart/form-data'>
                <input type=hidden name='processor' value='taskallocation'><input type=hidden name='employeeid' value='".$_COOKIE["reid"]."'>
                <input type=hidden name='projectid' value='".$r1y['projectid']."'><input type=hidden name='clientid' value='$clientid'>
                <input type=hidden name='etime' value='00:00'>
                <BR><BR><BR><B>THIS SECTION IS UNDER DEVELOPMENT</B><BR><BR><BR>
                <table><tr>
                    <td>Task Detail:<br><input type='text' name='task' value='' class='form-control'></td>
                    <td>Task Schedule:<br><input type='time' class='form-control form-control-sm rounded-0' name='stime' value='08:00' required></td>
                    <td>&nbsp;<br><button type='submit' class='btn shiftadded' style='background-color:green;text-align:left;padding:3px;color:white'>Set Task</button></td>
                </tr></table>   
            </form>
        </div>
    </div>
    */