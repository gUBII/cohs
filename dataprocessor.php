<?php
    // error_reporting(0);
    include('include.php');
    $dbnamex=$_COOKIE['dbname'];
    
    date_default_timezone_set("Australia/Melbourne");
    
    // DEPARTMENT UPDATE and ADD
    if(isset($_GET["processor"])){
        if($_GET["processor"]=="adddepartment"){
            $sql = "insert into departments (department_detail)VALUES ('New')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('New Department Opened.')</script>";
        }
        
        // MODULE SWITCHER
        if($_GET["processor"]=="shiftclocked"){
            
            $tc1 = "select * from shifting_allocation where id='".$_GET["shiftid"]."' order by id asc limit 1";
            $tc2 = $conn->query($tc1);
            if ($tc2->num_rows > 0) { while($tc3 = $tc2 -> fetch_assoc()) {
                $stime=strtotime($tc3["stime"]);
                $etime=strtotime($tc3["etime"]);
                $currentday=date("l", $tc3["sdate"]);
                $wage_amount="";
                $overtime_amount="";
                $r1w = "select * from uerp_user where id='".$tc3['employeeid']."' order by id asc limit 1";
                $r2w = $conn->query($r1w);
                if ($r2w->num_rows > 0) { while($r3w = $r2w -> fetch_assoc()) {
                    $employeename="".$r3w["username"]."".$r3w["username2"]."";
                    
                    if($currentday=="Saturday") $wage_amount=$r3w["sat_amt"];
                    else if($currentday=="Sunday") $wage_amount=$r3w["sun_amt"];
                    else if($currentday=="Offday") $wage_amount=$r3w["hol_amt"];
                    else $wage_amount=$r3w["reg_amt"];
                    $overtime_amount=$r3w["overtime"];
    
                    if($tc3["night"]==1) $wage_amount=$r3w["night_amt"];
                    
                    $overtime_amount=$r3w["overtime"];
                } }
                
                $exitpoint=strtotime($tc3["etime"]);
                
            } }
            
            // echo"<script>alert('$employeename, $currentday, $wage_amount')</script>";
            
            if(isset($currentday)){
                $sql="update shifting_allocation set clockin='$stime',clockout='$etime',wage_amt='$wage_amount',overtime_amt='$overtime_amount' where id='".$_GET["shiftid"]."'";
                if ($conn->query($sql) === TRUE){ echo"<script>alert('Forced clocked IN/OUT Set.')</script>"; }
            }
        }
    
        if($_GET["processor"]=="shiftapprove"){
            if($_GET["status"]==1) $sql="update shifting_allocation set accepted='1' where id='".$_GET["shiftid"]."'";
            if($_GET["status"]==100) $sql="update shifting_allocation set accepted='1' where id='".$_GET["shiftid"]."'";
            if($_GET["status"]==4) $sql="update shifting_allocation set status='0' where id='".$_GET["shiftid"]."'";
            if ($conn->query($sql) === TRUE){
                
                if($_GET["status"]==1){
                    echo"<script>alert('Shift Approved')</script>";
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','Assigned Shift is <b>APPROVED</b> by User.','".$_GET["shiftid"]."','".$_COOKIE["userid"]."')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    if($_GET["gogo"]==1){
                        echo"<form method='get' action='index.php' name='main' target='_top'>
                            <input type=hidden name='url' value='".$_GET["url"]."'>
                            <input type=hidden name='id' value='".$_GET["id"]."'>
                            <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                        </form>";
                        ?> <script language=JavaScript> document.main.submit(); </script> <?php
                    }
                }
    
                if($_GET["status"]==100){
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','Assigned Shift is <b>APPROVED</b> by User.','".$_GET["shiftid"]."','".$_COOKIE["userid"]."')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    if($_GET["gogo"]==1){
                        echo"<form method='get' action='scheduling-set.php' name='main' target='_top'>
                            <input type=hidden name='timeclock' value='".$_GET["shiftid"]."'>
                            <input type=hidden name='url' value='clock_in-out.php'>
                            <input type=hidden name='id' value='".$_GET["shiftid"]."'>
                            <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                            <input type=hidden name='gogo' value='".$_GET["gogo"]."'>
                        </form>";
                        ?> <script language=JavaScript> document.main.submit(); </script> <?php
                    }
                }
                
                if($_GET["status"]==4){
                    
                    $sx11 = "select * from shifting_allocation where id='".$_GET["shiftid"]."' order by id asc limit 1";
                    $rx11 = $conn->query($sx11);
                    if ($rx1->num_rows > 0) { while($ry11 = $rx11->fetch_assoc()) {
                        
                        $sx1 = "select * from uerp_user where id='".$ry11["employeeid"]."' order by id asc limit 1";
                        $rx1 = $conn->query($sx1);
                        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
                            $empid="";
                            $empid=$ry1["id"];
                            $employeename="";
                            $employeename="".$ry1["username"]." ".$ry1["username2"]."";
                            $semail="";
                            $semail=$ry1["email"];
                            $sphone="";
                            $sphone=$ry1["phone"];
                        } }
                        
                        $sx2 = "select * from uerp_user where id='".$ry11["clientid"]."' order by id asc limit 1";
                        $rx2 = $conn->query($sx2);
                        if ($rx2->num_rows > 0) { while($ry2 = $rx2->fetch_assoc()) {
                            $clientname="";
                            $clientname="".$ry2["username"]." ".$ry2["username2"]."";
                            $clientemail="";
                            $clientemail=$ry2["email"];
                            $clientphone="";
                            $clientphone=$ry2["phone"];
                            $clientaddress="";
                            $clientaddress=$ry2["address"];
                            $clientcity=$ry2["city"];
                            $clientstate=$ry2["area"];
                            $clientzip=$ry2["zip"];
                            $clientcountry=$ry2["country"];
                        } }
                    } }
                    
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','Assigned Shift is <b>SUSPENDED</b> by Admin.','".$_GET["shiftid"]."','".$_COOKIE["userid"]."')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    
                    echo"<form name='rosterform' method='post' action='email_roster_suspend.php' target='_self' enctype='multipart/form-data'>
                        <input type=hidden name='processor' value='shiftallocation'>
                        <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                        <input type=hidden name='semail' value='$semail'><input type=hidden name='cemail' value='$clientemail'>
                    </form>";
                    
                    ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
                    
                    echo"<script>alert('Shift Suspended')</script>";
                }
            }
        }
        
        // delete data records.
        if($_GET["processor"]=="deletetask"){
            $tablename = $_GET["tbl"];
            $delid = $_GET["delid"];
            if(isset($_GET["delid"])){
                if($_GET["delid"]>=1){ ?>
                    <body onload='ConfirmDelete()'>
                        <script>
                            var baseUrl='<?php echo"deleterecords.php?tbl=$tablename&delid=$delid"; ?>';
                            function ConfirmDelete(){
                                if (confirm("Delete Record?")){
                                    <?php
                                        $sql = "DELETE FROM  $tablename WHERE id='".$_GET["delid"]."'"; 
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    ?>
                                    alert('Record Deleted.');
                                }
                            }
                        </script>
                    </body><?php
                }
            }
        }
    }

    if(isset($_POST["processor"])){
        
        // shifting allocation cancel
        if($_POST["processor"]=="schedulecancel"){
            $sdate = strtotime($_POST["stime"]); 
            $edate = strtotime($_POST["etime"]); 
            $edate2 = (int)round($_POST["th1"] * 3600);
            $edate3 = (int)round($_POST["th2"] * 3600);
            $edate4 = $sdate + $edate2;
            $edate5 = $sdate + $edate3;
            
            $sql="update shifting_allocation set cancelled='1', total_hour='".$_POST["th1"]."', total_hour2='".$_POST["th2"]."', milage='1', 
            clockin='$sdate', clockout='$edate3', clockout2='$edate5', cancel_reason='".$_POST["cancelreason"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Appointment Cancelled')</script>";
        }
        
        // shifting allocation ignore list
        if($_POST["processor"]=="timesheetswitch1"){
            $sql="update shifting_allocation set ignored='".$_POST["switchx1"]."' where id='".$_POST["shiftid"]."'";
            if ($conn->query($sql) === TRUE){ 
                $tomtom=0;
                // echo"<script>alert('Ignored')</script>";
            }
        }
        if($_POST["processor"]=="timesheetswitch2"){
            $sql="update shifting_allocation set status='".$_POST["switchx2"]."' where id='".$_POST["shiftid"]."'";
            if ($conn->query($sql) === TRUE){
                $tomtom=0;
                // echo"<script>alert('Suspended')</script>";
            }
        }
        
        
        if($_POST["processor"]=="updatedepartment"){
            $sql="update departments set department_name='".$_POST["department_name"]."',department_detail='".$_POST["department_detail"]."' where id='".$_POST["id"]."'";
        	if ($conn->query($sql) === TRUE) $tomtom=0;        
        }
    
        // DESIGNATION UPDATE and ADD
        if(isset($_GET["processor"])){
            if($_GET["processor"]=="adddesignation"){
                $sql = "insert into designation (designation_detail)VALUES ('New')";
                if ($conn->query($sql) === TRUE) echo"<script>alert('New Designation/Roll Opened.')</script>";
            }
        }
    
        if($_POST["processor"]=="updatedesignation"){
            $sql="update designation set designation='".$_POST["designation"]."',designation_detail='".$_POST["designation_detail"]."' where id='".$_POST["id"]."'";
        	if ($conn->query($sql) === TRUE) $tomtom=0;
        }
    
        // SOLUTIONS SWITCHER
        if($_POST["processor"]=="solutionswitch"){
            $solutionstatus=0;
            $x1 = "select * from solutions where id='".$_POST["id"]."' order by id asc limit 1";
            $x2 = $conn->query($x1);
            if ($x2->num_rows > 0) { while($x12 = $x2->fetch_assoc()) { $solutionstatus=$x12["dashboard"]; } } 
            if($solutionstatus==1) $solutionstatus=0;
            else $solutionstatus=1;
    
            $sql="update solutions set dashboard='$solutionstatus' where id='".$_POST["id"]."'";
        	if ($conn->query($sql) === TRUE){
        	    
        	    $sql="update modules set dashboard='$solutionstatus' where parent='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE){
                    $tomx=0;
                    $m1 = "select * from modules where parent='".$_POST["id"]."' order by id asc";
                    $m2 = $conn->query($m1);
                    if ($m2->num_rows > 0) { while($m3 = $m2->fetch_assoc()) {
                        
                        $sql2="update modules set dashboard='$solutionstatus' where id='".$m3["id"]."'";
                        if ($conn->query($sql2) === TRUE){
                            $m11 = "select * from modules where parent='".$m3["id"]."' order by id asc";
                            $m22 = $conn->query($m11);
                            if ($m22->num_rows > 0) { while($m33 = $m22->fetch_assoc()) {
                                
                                $sql3="update modules set dashboard='$solutionstatus' where id='".$m33["id"]."'";
                                if ($conn->query($sql3) === TRUE){
                                    $m111 = "select * from modules where parent='".$m33["id"]."' order by id asc";
                                    $m222 = $conn->query($m111);
                                    if ($m222->num_rows > 0) { while($m333 = $m222->fetch_assoc()) {
                                        
                                        $sql4="update modules set dashboard='$solutionstatus' where id='".$m333["id"]."'";
                                        if ($conn->query($sql4) === TRUE) $tomtom=0;
                                    } }
                                }   
                            } }
                        }
                    } } 
                }
        	} else  echo"<script>alert('Failed...')</script>";
        }
    
        // USER WISE ROLE SET
        if($_POST["processor"]=="uroleswitch"){
            if(isset($_POST["module_id"])){
                if(isset($_POST["user_id"])){
                    if($_POST["switch"]==1){
                        $sf=0;
                        $x1 = "select * from userwise_roleset where user_id='".$_POST["user_id"]."' and module_id='".$_POST["module_id"]."' order by id asc limit 1";
                        $x2 = $conn->query($x1);
                        if ($x2->num_rows > 0) { while($x12 = $x2->fetch_assoc()) { $sf=$x12["id"]; } } 
                        if($sf==0){
                            $sql = "insert into userwise_roleset (user_id,module_id,parent_id,status) VALUES ('".$_POST["user_id"]."','".$_POST["module_id"]."','0','ON')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                    }else{
                        $sf=0;
                        $x1 = "select * from userwise_roleset where user_id='".$_POST["user_id"]."' and module_id='".$_POST["module_id"]."' order by id asc limit 1";
                        $x2 = $conn->query($x1);
                        if ($x2->num_rows > 0) { while($x12 = $x2->fetch_assoc()) { $sf=$x12["id"]; } } 
                        if($sf!=0){
                            $sql = "DELETE FROM userwise_roleset WHERE id='$sf'"; 
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                    }
                }
            }
        }
        
        // DESIGNATION WISE ROLE SET
        if($_POST["processor"]=="droleswitch"){
            if(isset($_POST["module_id"])){
                if(isset($_POST["designation_id"])){
                    if($_POST["switch"]==1){
                        $sf=0;
                        $x1 = "select * from designationwise_roleset where designation_id='".$_POST["user_id"]."' and module_id='".$_POST["module_id"]."' order by id asc limit 1";
                        $x2 = $conn->query($x1);
                        if ($x2->num_rows > 0) { while($x12 = $x2->fetch_assoc()) { $sf=$x12["id"]; } } 
                        if($sf==0){
                            $sql = "insert into designationwise_roleset (designation_id,module_id,parent_id,status) VALUES ('".$_POST["designation_id"]."','".$_POST["module_id"]."','0','ON')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                    }else{
                        $sf=0;
                        $x1 = "select * from designationwise_roleset where designation_id='".$_POST["designation_id"]."' and module_id='".$_POST["module_id"]."' order by id asc limit 1";
                        $x2 = $conn->query($x1);
                        if ($x2->num_rows > 0) { while($x12 = $x2->fetch_assoc()) { $sf=$x12["id"]; } } 
                        if($sf!=0){
                            $sql = "DELETE FROM designationwise_roleset WHERE id='$sf'"; 
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                    }
                }
            }
        }
        
        if($_POST["processor"]=="moduleswitch"){
            $modulestatus=0;
            $x1 = "select * from modules where id='".$_POST["id"]."' order by id asc limit 1";
            $x2 = $conn->query($x1);
            if ($x2->num_rows > 0) { while($x12 = $x2->fetch_assoc()) { $modulestatus=$x12["dashboard"]; } } 
            if($modulestatus==1) $modulestatus=0;
            else $modulestatus=1;
    
            $sql="update modules set dashboard='$modulestatus' where id='".$_POST["id"]."'";
        	if ($conn->query($sql) === TRUE) $tomtom=0;
            else  echo"<script>alert('Failed...')</script>";
        }
    
        if($_POST["processor"]=="schedulelist"){
            if(empty($_POST["id"])){
                if(!isset($_POST["over_night"])) $overnight=0;
                else $overnight =$_POST["over_night"];
                $sql = "insert into shifting_schedule (projectid,stime,etime,status,night) VALUES ('".$_POST["projectid"]."','".$_POST["stime"]."','".$_POST["etime"]."','1','$overnight')";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Shift Template Created.')</script>";
            }
        }
        
        if($_POST["processor"]=="scheduleadd"){
            $address1 = str_replace("'", "`", $_POST["address"]);
            $note1 = str_replace("'", "`", $_POST["admin_note"]);
            
            $stime = str_replace('T', ' ', $_POST["stime"]);
            $sdate = strtotime($stime); 
            $etime = str_replace('T', ' ', $_POST["etime"]); 
            $edate = strtotime($etime);
            
            $sdt=substr($_POST["etime"],8,2); 
            $smonth=substr($_POST["etime"],5,2);
            $syear=substr($_POST["etime"],0,4);
                
            $edt=substr($_POST["etime"],8,2);
            $emonth=substr($_POST["etime"],5,2);
            $eyear=substr($_POST["etime"],0,4);
                
            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edays,emonths,eyears,etime,
                accepted,status,color,clockin,clockout,clockout_request,total_hour,total_overtime,milage,latitude_in,longitude_in,latitude_out,
                longitude_out,stime2,etime2,request2,wage_amt,overtime_amt,night,address,admin_note,payroll,category,itemnumber,repeating) VALUES 
                ('".$_POST["employeeid"]."','".$_POST["projectid"]."','".$_POST["clientid"]."','$sdt','$smonth','$syear','$stime','$sdate',
                '$edt','$emonth','$eyear','$etime','0','1','".$_POST["color"]."','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
                '".$_POST["night"]."','$adress1','$note1','0','".$_POST["category"]."','".$_POST["itemnumber"]."','".$_POST["repeating"]."')";
            if ($conn->query($sql) === TRUE){
                
                echo"<script>alert('New Appointment Assigned)</script>";
                    
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','New Appointment Assigned at <b>$stime - $etime</b>','0','".$_COOKIE["userid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
            }
        }
        
        if($_POST["processor"]=="scheduleedit"){
            if(isset($_POST["id"])){
                $address1 = str_replace("'", "`", $_POST["address"]);
                $note1 = str_replace("'", "`", $_POST["admin_note"]);
                
                $stime = str_replace('T', ' ', $_POST["stime"]);
                $sdate = strtotime($stime); 
                $etime = str_replace('T', ' ', $_POST["etime"]); 
                $edate = strtotime($etime);
                
                $sdt=substr($_POST["etime"],8,2); 
                $smonth=substr($_POST["etime"],5,2);
                $syear=substr($_POST["etime"],0,4);
                
                $edt=substr($_POST["etime"],8,2);
                $emonth=substr($_POST["etime"],5,2);
                $eyear=substr($_POST["etime"],0,4);
                
                $sql="update shifting_allocation set employeeid='".$_POST["employeeid"]."', clientid='".$_POST["clientid"]."',
                stime='$stime', days='$sdt', months='$smonth', years='$syear', etime='$etime', edays='$edt', emonths='$emonth', 
                eyears='$eyear', sdate='$sdate', edate='$edate', color='".$_POST["color"]."', address='$address1',
                night='".$_POST["night"]."', itemnumber='".$_POST["itemnumber"]."', repeating='".$_POST["repeating"]."', 
                admin_note='$note1' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE){
                    echo"<script>alert('Shift Updated')</script>";
                    
                    $sx11 = "select * from shifting_allocation where id='".$_POST["id"]."' order by id asc limit 1";
                    $rx11 = $conn->query($sx11);
                    if ($rx1->num_rows > 0) { while($ry11 = $rx11->fetch_assoc()) {
                        
                        $sx1 = "select * from uerp_user where id='".$ry11["employeeid"]."' order by id asc limit 1";
                        $rx1 = $conn->query($sx1);
                        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
                            $empid="";
                            $empid=$ry1["id"];
                            $employeename="";
                            $employeename="".$ry1["username"]." ".$ry1["username2"]."";
                            $semail="";
                            $semail=$ry1["email"];
                            $sphone="";
                            $sphone=$ry1["phone"];
                        } }
                        
                        $sx2 = "select * from uerp_user where id='".$ry11["clientid"]."' order by id asc limit 1";
                        $rx2 = $conn->query($sx2);
                        if ($rx2->num_rows > 0) { while($ry2 = $rx2->fetch_assoc()) {
                            $clientname="";
                            $clientname="".$ry2["username"]." ".$ry2["username2"]."";
                            $clientemail="";
                            $clientemail=$ry2["email"];
                            $clientphone="";
                            $clientphone=$ry2["phone"];
                            $clientaddress="";
                            $clientaddress=$ry2["address"];
                            $clientcity=$ry2["city"];
                            $clientstate=$ry2["area"];
                            $clientzip=$ry2["zip"];
                            $clientcountry=$ry2["country"];
                        } }
                    } }
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','Shift time is updated to <b>$stime - $etime</b>','".$_POST["id"]."','".$_COOKIE["userid"]."')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    
                    /* echo"<form name='rosterform' method='post' action='email_roster_update.php' target='_self' enctype='multipart/form-data'>
                        <input type=hidden name='processor' value='shiftallocation'>
                        <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                        <input type=hidden name='stime' value='$stime'><input type=hidden name='etime' value='$etime'>
                        <input type=hidden name='address' value='$address1'><input type=hidden name='admin_note' value='$note1'>
                        <input type=hidden name='semail' value='$semail'>
                    </form>"; */
                    
                    ?> <!--- <script language=JavaScript> document.rosterform.submit(); </script> ---> <?php
                    
                }
            }
        }
    
        if($_POST["processor"]=="schedulemover"){
            $employeeid=$_POST["employeeid"];
            $clientid=$_POST["clientid"];
            $projectid=$_POST["projectid"];
            $color=$_POST["color"];
            
            $days=substr($_POST["dateto"],8,2);
            $months=substr($_POST["dateto"],5,2);
            $years=substr($_POST["dateto"],0,4);
            $stime=substr($_POST["stime"],11,5);
            $stime="$years-$months-$days $stime";
            
            $sdate=strtotime($stime);
            
            $edays=substr($_POST["etime"],8,2);
            $emonths=substr($_POST["etime"],5,2);
            $eyears=substr($_POST["etime"],0,4);
            $etime=substr($_POST["etime"],11,5);
            
            $sdiff1=($edays-$days);
            $sdiff1=($days+$sdiff1);
            
            $sdiff2=($emonths-$months);
            $sdiff2=($months+$sdiff2);
                    
            $sdiff3=($eyears-$years);
            $sdiff3=($years+$sdiff3);
                    
            if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
            else $lastdate=30;
            if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
            if($sdiff1>$lastdate) {
                $sdiff1="01";
                $sdiff2=($sdiff2+1);
            }
            if($sdiff2>=13){
                $sdiff2="01";
                $sdiff3=($sdiff3+1);
            }
            $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
            
            $sql="update shifting_allocation set employeeid='$employeeid',projectid='$projectid',clientid='$clientid',status='1',accepted='0',color='$color',sdate='$sdate',
            days='$days',months='$months',years='$years',stime='$stime',edays='$sdiff1',emonths='$sdiff2',eyears='$sdiff3',etime='$etime' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Shift Updated')</script>";
                
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','Shift moved to another user and new date is set as <b>$stime - $etime</b>','".$_POST["id"]."','".$_COOKIE["userid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='schedule.php'><input type=hidden name='id' value='57'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
    
        if($_POST["processor"]=="cloneday"){
            if(!empty($_POST["employeeid"])){
                // employeeid,datefrom,dateto
                
                $fd=substr($_POST["datefrom"],8,2);
                $fm=substr($_POST["datefrom"],5,2);
                $fy=substr($_POST["datefrom"],0,4);
                $td=substr($_POST["dateto"],8,2);
                $tm=substr($_POST["dateto"],5,2);
                $ty=substr($_POST["dateto"],0,4);
                $stime="$ty-$tm-$td 08:00:00";
    
                // echo"$fd, $fm, $fy | $td, $tm, $ty | $stime<br>";
                
                $tomtom=0;
                $totalfound=0;
                if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$fd' and months='$fm' and years='$fy' and status='1' order by id asc";
                else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$fd' and months='$fm' and years='$fy' and status='1' order by id asc";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    
                    $stime=substr($rs1["stime"],11,5);
                    $stime="$ty-$tm-$td $stime";
                    $sdate=strtotime($stime);
                    
                    $sd1=substr($rs1["stime"],8,2);
                    $sd2=substr($rs1["etime"],8,2);
                    $sdiff1=($sd2-$sd1);
                    $sdiff1=($td+$sdiff1);
                    
                    $sm1=substr($rs1["stime"],5,2);
                    $sm2=substr($rs1["etime"],5,2);
                    $sdiff2=($sm2-$sm1);
                    $sdiff2=($tm+$sdiff2);
                    
                    $sy1=substr($rs1["stime"],0,4);
                    $sy2=substr($rs1["etime"],0,4);
                    $sdiff3=($sy2-$sy1);
                    $sdiff3=($ty+$sdiff3);
                    
                    if($sdiff2<=9) $sdiff2="0$sdiff2";
                    if($sdiff1<=9) $sdiff1="0$sdiff1";
                    
                    $etime=substr($rs1["etime"],11,5);
                    $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                    
                    echo"$stime - $etime<br>";
                    
                    if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                    else $lastdate=30;
                    if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                    if($sdiff1>$lastdate) {
                        $sdiff1="01";
                        $sdiff2=($sdiff2+1);
                    }
                    if($sdiff2>=13){
                        $sdiff2="01";
                        $sdiff3=($sdiff3+1);
                    }
                    
                    $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edays,emonths,eyears,etime,accepted,status,color,clockin,clockout,clockout_request,total_hour,total_overtime,milage,latitude_in,longitude_in,latitude_out,longitude_out,activity_log,stime2,etime2,request2,wage_amt,overtime_amt,night,address,admin_note,payroll) VALUES 
                    ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td','$tm','$ty','$stime','$sdate','$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','0','0','0','0','0','0','0','0','0','0','".$rs1["activity_log"]."','0','0','0','0','0','".$rs1["night"]."','".$rs1["address"]."','".$rs1["admin_note"]."','0')";
                    if ($conn->query($sql) === TRUE) $tomtom="10000";
                    
                    
                } }
                
                if($tomtom=="10000"){
                    echo"<script>alert('Day Cloning Updated...')</script>";
                    echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='schedule.php'><input type=hidden name='id' value='57'></form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
                
            }
        }
        
        if($_POST["processor"]=="repeating_process"){
            $weekfrom=$_POST["weekfrom"];
            $weekto=$_POST["weekto"];
            $repeating=$_POST["repeating"];
            
            // echo"<script>alert('$weekfrom, $weekto, $repeating')</script>";
            
            if($repeating=="WEEK"){
                
                $selectedweek = $_POST["weekto"];
                $mon_date   = date('Y-m-d', strtotime($selectedweek . '-1'));
                $tue_date  = date('Y-m-d', strtotime($selectedweek . '-2'));
                $wed_date   = date('Y-m-d', strtotime($selectedweek . '-3'));
                $thu_date = date('Y-m-d', strtotime($selectedweek . '-4'));
                $fri_date   = date('Y-m-d', strtotime($selectedweek . '-5'));
                $sat_date   = date('Y-m-d', strtotime($selectedweek . '-6'));
                $sun_date   = date('Y-m-d', strtotime($selectedweek . '-7'));
                
                // $prevweek = date('o-\WW', strtotime($selectedweek . ' -1 week'));
                $prevweek = $weekfrom;
                $pre_mon_date = date('Y-m-d 01:00:00', strtotime($prevweek . '-1'));
                $pre_sun_date = date('Y-m-d 23:59:00', strtotime($prevweek . '-7'));
                
                $prestime = strtotime($pre_mon_date);
                $preetime = strtotime($pre_sun_date);
                echo"<script>alert('$prevweek $pre_mon_date, $pre_sun_date, $prestime, $preetime')</script>";
                
                $wsp11 = "select * from project where status='1' order by id desc";
                $wsp22 = $conn->query($wsp11);
                if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                    $tid=0;
                    $ln1 = "select * from shifting_allocation where sdate>='$prestime' AND sdate<='$preetime' AND projectid='".$wsp33["id"]."' AND itemnumber!='0' AND employeeid!='0' AND status='1' AND repeating='Week Repeat' order by id asc";
                    $ln2 = $conn->query($ln1);
                    if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                        
                        $s1x = "select * from project where id='".$ln3["projectid"]."' and status='1' order by id asc limit 1";
                        $r1x = $conn->query($s1x);
                        if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                            
                            $s1xx = "select * from uerp_user where id='".$ln3["employeeid"]."' and status='1' order by id asc limit 1";
                            $r1xx = $conn->query($s1xx);
                            if ($r1xx->num_rows > 0) { while($rs1xx = $r1xx->fetch_assoc()) {
                                
                                $tid=($tid+1);
                                $sday = date("l", strtotime($ln3["stime"]));
                                $eday = date("l", strtotime($ln3["etime"]));
                                
                                $stime = date("H:i:s", strtotime($ln3["stime"]));
                                $etime = date("H:i:s", strtotime($ln3["etime"]));
                                
                                if($sday=="Monday") $sday="$mon_date $stime";
                                if($sday=="Tuesday") $sday="$tue_date $stime";
                                if($sday=="Wednesday") $sday="$wed_date $stime";
                                if($sday=="Thursday") $sday="$thu_date $stime";
                                if($sday=="Friday") $sday="$fri_date $stime";
                                if($sday=="Saturday") $sday="$sat_date $stime";
                                if($sday=="Sunday") $sday="$sun_date $stime";
                                
                                if($eday=="Monday") $eday="$mon_date $etime";
                                if($eday=="Tuesday") $eday="$tue_date $etime";
                                if($eday=="Wednesday") $eday="$wed_date $etime";
                                if($eday=="Thursday") $eday="$thu_date $etime";
                                if($eday=="Friday") $eday="$fri_date $etime";
                                if($eday=="Saturday") $eday="$sat_date $etime";
                                if($eday=="Sunday") $eday="$sun_date $etime";
                                                
                                $sd = date("d", strtotime($sday));
                                $sm = date("m", strtotime($sday));
                                $sy = date("Y", strtotime($sday));
                                                
                                $ed = date("d", strtotime($eday));
                                $em = date("m", strtotime($eday));
                                $ey = date("Y", strtotime($eday));
                                                
                                $sdate=strtotime($sday);
                                $edate=strtotime($eday);
                                                
                                $sql = "insert into shifting_allocation2 (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,edays,
                                emonths,eyears,etime,accepted,status,color,clockin,clockout,clockin_request,clockout_request,total_hour,
                                total_overtime,milage,latitude_in,longitude_in,latitude_out,longitude_out,activity_log,stime2,etime2,request2,
                                wage_amt,overtime_amt,night,address,admin_note,payroll,invoice_id,invoice_date,next_date,real_clockin,image_in,
                                image_out,category,itemnumber,repeating,shifting_allocation,vehicle_option) 
                                VALUES ('".$ln3["employeeid"]."','".$ln3["projectid"]."','".$ln3["clientid"]."','$sd','$sm','$sy','$sday','$sdate','$edate',
                                '$ed','$em','$ey','$eday','0','1','".$ln3["color"]."','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
                                '0','0','0','".$ln3["night"]."','".$ln3["address"]."','".$ln3["admin_note"]."','0','0','0','0','0','0','0',
                                '".$ln3["category"]."','".$ln3["itemnumber"]."','".$ln3["repeating"]."','0','0')";
                                if ($conn->query($sql) === TRUE) $tomtom=0;
                                
                            }}
                            
                        }}
                        
                    }}
                    
                }}
                
                echo"<script>alert('Week Clone/Repeat Updated...')</script>";
                echo"<script>alert('Week Repeating Updated...')</script>";
                echo"<form method='GET' action='index.php' name='main' target='_top'>
                    <input type=hidden name='url' value='".$_POST["url"]."'>
                    <input type=hidden name='viewstatus' value='".$_POST["viewstatus"]."'>
                    <input type=hidden name='prjsrc' value='".$_POST["prjsrc"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
                
                
            }
            
            if($repeating=="MONTH"){
                 // Accept monthfrom/monthto (YYYY-MM) or fallback to monthselect as target
                $monthfrom_raw = isset($_POST["monthfrom"]) ? trim($_POST["monthfrom"]) : "";
                $monthto_raw   = isset($_POST["monthto"])   ? trim($_POST["monthto"])   : (isset($_POST["monthselect"])? trim($_POST["monthselect"]) : "");
        
                // Normalize to YYYY-MM
                $norm = function($s) {
                    if ($s==="") return "";
                    // allow YYYY-MM-01 or YYYY-MM
                    if (preg_match('/^\d{4}-\d{2}$/',$s)) return $s;
                    if (preg_match('/^(\d{4}-\d{2})-\d{2}$/',$s,$m)) return $m[1];
                    return date('Y-m', strtotime($s));
                };
                $monthfrom = $norm($monthfrom_raw);
                $monthto   = $norm($monthto_raw);
        
                if ($monthfrom!=="" && $monthto!=="") {
                    // Source month window [00:00:00 of 1st, 23:59:59 of last]
                    $srcFirstDayStr = $monthfrom.'-01 00:00:00';
                    $srcFirstTs     = strtotime($srcFirstDayStr);
                    $srcLastDayStr  = date('Y-m-t 23:59:59', strtotime($srcFirstDayStr));
                    $srcLastTs      = strtotime($srcLastDayStr);
        
                    // Target year & month ints
                    $tYear  = (int)substr($monthto,0,4);
                    $tMonth = (int)substr($monthto,5,2);
        
                    $wsp11 = "select * from project where status='1' order by id desc";
                    $wsp22 = $conn->query($wsp11);
                    if ($wsp22 && $wsp22->num_rows > 0) {
                        while($wsp33 = $wsp22->fetch_assoc()) {
        
                            $ln1 = "select * from shifting_allocation where sdate>='$srcFirstTs' AND sdate<='$srcLastTs' AND projectid='".$wsp33["id"]."' AND itemnumber!='0' AND employeeid!='0' AND status='1' AND repeating='Month Repeat' order by id asc";
                            $ln2 = $conn->query($ln1);
                            if ($ln2 && $ln2->num_rows > 0) {
                                while($ln3 = $ln2->fetch_assoc()) {
                                    
                                    $s1x = "select * from project where id='".$ln3["projectid"]."' and status='1' order by id asc limit 1";
                                    $r1x = $conn->query($s1x);
                                    if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                                        
                                        $s1xx = "select * from uerp_user where id='".$ln3["employeeid"]."' and status='1' order by id asc limit 1";
                                        $r1xx = $conn->query($s1xx);
                                        if ($r1xx->num_rows > 0) { while($rs1xx = $r1xx->fetch_assoc()) {
        
                                            // Preserve exact duration between sdate and edate (handles overnight)
                                            $origStartTs = (int)$ln3["sdate"];
                                            $origEndTs   = (int)$ln3["edate"];
                                            if ($origEndTs < $origStartTs) $origEndTs = $origStartTs; // guard
                                            $durationSec = $origEndTs - $origStartTs;
                
                                            // Original day-of-month
                                            $origDom = (int)date('j', $origStartTs);
                
                                            // Skip if day doesn't exist in target month (e.g., 31 in Feb)
                                            if (!checkdate($tMonth, $origDom, $tYear)) {
                                                continue;
                                            }
                
                                            // New start datetime string with same time-of-day as original stime
                                            $startTimeStr = date('H:i:s', strtotime($ln3["stime"]));
                                            $newStartStr  = sprintf('%04d-%02d-%02d %s', $tYear, $tMonth, $origDom, $startTimeStr);
                                            $newStartTs   = strtotime($newStartStr);
                
                                            // New end via preserved duration
                                            $newEndTs     = $newStartTs + $durationSec;
                                            $newEndStr    = date('Y-m-d H:i:s', $newEndTs);
                
                                            // Calendar breakdowns
                                            $sd = date('d', $newStartTs);
                                            $sm = date('m', $newStartTs);
                                            $sy = date('Y', $newStartTs);
                
                                            $ed = date('d', $newEndTs);
                                            $em = date('m', $newEndTs);
                                            $ey = date('Y', $newEndTs);
                
                                            // Insert cloned shift into target month
                                            $sql = "insert into shifting_allocation2
                                            (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,edays,emonths,eyears,etime,accepted,
                                            status,color,clockin,clockout,clockin_request,clockout_request,total_hour,total_overtime,milage,
                                            latitude_in,longitude_in,latitude_out,longitude_out,activity_log,stime2,etime2,request2,wage_amt,
                                            overtime_amt,night,address,admin_note,payroll,invoice_id,invoice_date,next_date,real_clockin,
                                            image_in,image_out,category,itemnumber,repeating,shifting_allocation,vehicle_option)
                                            VALUES
                                            ('".$ln3["employeeid"]."','".$ln3["projectid"]."','".$ln3["clientid"]."',
                                             '$sd','$sm','$sy','$newStartStr','$newStartTs','$newEndTs',
                                             '$ed','$em','$ey','$newEndStr','0','1','".$ln3["color"]."',
                                             '0','0','0','0','0','0','0','0','0','0','0','0','0','0',
                                             '0','0','0','".$ln3["night"]."','".$ln3["address"]."','".$ln3["admin_note"]."',
                                             '0','0','0','0','0','0','0',
                                             '".$ln3["category"]."','".$ln3["itemnumber"]."','Month Repeat','0','0')";
                                            $conn->query($sql);
                                        } }
                                    } }
                                }
                            }
                        }
                    }
                }
            }
            
            if($repeating=="FORTHNIGHT"){
                $fnfrom_raw = isset($_POST["fortnightfrom"]) ? trim($_POST["fortnightfrom"]) :
                              (isset($_POST["fnfrom"]) ? trim($_POST["fnfrom"]) :
                              (isset($_POST["weekfrom"]) ? trim($_POST["weekfrom"]) : ""));
                $fnto_raw   = isset($_POST["fortnightto"]) ? trim($_POST["fortnightto"]) :
                              (isset($_POST["fnto"]) ? trim($_POST["fnto"]) :
                              (isset($_POST["weekto"]) ? trim($_POST["weekto"]) : ""));
            
                $monday_of = function($val) {
                    if ($val==="") return "";
                    if (preg_match('/^(\d{4})-W(\d{2})(?:-\d)?$/', $val, $m)) {
                        $d = new DateTime();
                        $d->setISODate((int)$m[1], (int)$m[2], 1);
                        return $d->format('Y-m-d');
                    }
                    $ts = strtotime($val);
                    if ($ts===false) return "";
                    $d = new DateTime(date('Y-m-d', $ts));
                    $d->modify('monday this week');
                    return $d->format('Y-m-d');
                };
            
                $srcMon = $monday_of($fnfrom_raw);
                $tgtMon = $monday_of($fnto_raw);
            
                if ($srcMon!=="" && $tgtMon!=="") {
                    $srcStartTs = strtotime($srcMon.' 00:00:00');
                    $srcEndTs   = $srcStartTs + (13*86400) + (23*3600 + 59*60 + 59);
                    $tgtStartTs = strtotime($tgtMon.' 00:00:00');
            
                    $wsp11 = "select * from project where status='1' order by id desc";
                    $wsp22 = $conn->query($wsp11);
                    if ($wsp22 && $wsp22->num_rows > 0) {
                        while ($wsp33 = $wsp22->fetch_assoc()) {
                            $ln1 = "select * from shifting_allocation
                                    where sdate>='$srcStartTs' AND sdate<='$srcEndTs'
                                      AND projectid='".$wsp33["id"]."'
                                      AND itemnumber!='0' AND employeeid!='0'
                                      AND status='1'
                                      AND (repeating='Fortnight Repeat' OR repeating='Forthnight Repeat')
                                    order by id asc";
                            $ln2 = $conn->query($ln1);
                            if ($ln2 && $ln2->num_rows > 0) {
                                while ($ln3 = $ln2->fetch_assoc()) {
                                    $origStartTs = (int)$ln3["sdate"];
                                    $origEndTs   = (int)$ln3["edate"];
                                    if ($origEndTs < $origStartTs) $origEndTs = $origStartTs;
                                    $durationSec = $origEndTs - $origStartTs;
            
                                    $srcStartMid = strtotime(date('Y-m-d 00:00:00', $srcStartTs));
                                    $origStartMid= strtotime(date('Y-m-d 00:00:00', $origStartTs));
                                    $offsetDays  = (int)(($origStartMid - $srcStartMid)/86400);
            
                                    $startTimeStr   = date('H:i:s', strtotime($ln3["stime"]));
                                    $newStartDateYmd= date('Y-m-d', strtotime(date('Y-m-d', $tgtStartTs)." +$offsetDays days"));
                                    $newStartStr    = $newStartDateYmd.' '.$startTimeStr;
                                    $newStartTs     = strtotime($newStartStr);
                                    $newEndTs       = $newStartTs + $durationSec;
                                    $newEndStr      = date('Y-m-d H:i:s', $newEndTs);
            
                                    $sd = date('d', $newStartTs);
                                    $sm = date('m', $newStartTs);
                                    $sy = date('Y', $newStartTs);
                                    $ed = date('d', $newEndTs);
                                    $em = date('m', $newEndTs);
                                    $ey = date('Y', $newEndTs);
            
                                    $sql = "insert into shifting_allocation
                                    (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                                     edays,emonths,eyears,etime,accepted,status,color,clockin,clockout,clockin_request,clockout_request,total_hour,total_overtime,milage,
                                     latitude_in,longitude_in,latitude_out,longitude_out,activity_log,stime2,etime2,request2,wage_amt,overtime_amt,night,address,admin_note,
                                     payroll,invoice_id,invoice_date,next_date,real_clockin,image_in,image_out,category,itemnumber,repeating,shifting_allocation,vehicle_option)
                                    VALUES
                                    ('".$ln3["employeeid"]."','".$ln3["projectid"]."','".$ln3["clientid"]."',
                                     '$sd','$sm','$sy','$newStartStr','$newStartTs','$newEndTs',
                                     '$ed','$em','$ey','$newEndStr','0','1','".$ln3["color"]."',
                                     '0','0','0','0','0','0','0','0','0','0','0','0','0','0',
                                     '0','0','0','".$ln3["night"]."','".$ln3["address"]."','".$ln3["admin_note"]."',
                                     '0','0','0','0','0','0','0',
                                     '".$ln3["category"]."','".$ln3["itemnumber"]."','".$ln3["repeating"]."','0','0')";
                                    $conn->query($sql);
                                }
                            }
                        }
                    }
                }
            }
        }
        
        if($_POST["processor"]=="cloneweek"){
            $weekfrom=$_POST["weekfrom"]; $sy=substr($weekfrom,0,4); $sw=substr($weekfrom,6,2);
            $weekto=$_POST["weekto"]; $ty=substr($weekto,0,4); $tw=substr($weekto,6,2);
            
            $g1 = new DateTime(); $g1->setISODate($sy,$sw,1); $sd1= $g1->format('d'); $sm1= $g1->format('m'); $sy1= $g1->format('Y');
            $g2 = new DateTime(); $g2->setISODate($sy,$sw,2); $sd2= $g2->format('d'); $sm2= $g2->format('m'); $sy2= $g2->format('Y');
            $g3 = new DateTime(); $g3->setISODate($sy,$sw,3); $sd3= $g3->format('d'); $sm3= $g3->format('m'); $sy3= $g3->format('Y');
            $g4 = new DateTime(); $g4->setISODate($sy,$sw,4); $sd4= $g4->format('d'); $sm4= $g4->format('m'); $sy4= $g4->format('Y');
            $g5 = new DateTime(); $g5->setISODate($sy,$sw,5); $sd5= $g5->format('d'); $sm5= $g5->format('m'); $sy5= $g5->format('Y');
            $g6 = new DateTime(); $g6->setISODate($sy,$sw,6); $sd6= $g6->format('d'); $sm6= $g6->format('m'); $sy6= $g6->format('Y');
            $g7 = new DateTime(); $g7->setISODate($sy,$sw,7); $sd7= $g7->format('d'); $sm7= $g7->format('m'); $sy7= $g7->format('Y');
            
            $h1 = new DateTime(); $h1->setISODate($ty,$tw,1); $td1= $h1->format('d'); $tm1= $h1->format('m'); $ty1= $h1->format('Y');
            $h2 = new DateTime(); $h2->setISODate($ty,$tw,2); $td2= $h2->format('d'); $tm2= $h2->format('m'); $ty2= $h2->format('Y');
            $h3 = new DateTime(); $h3->setISODate($ty,$tw,3); $td3= $h3->format('d'); $tm3= $h3->format('m'); $ty3= $h3->format('Y');
            $h4 = new DateTime(); $h4->setISODate($ty,$tw,4); $td4= $h4->format('d'); $tm4= $h4->format('m'); $ty4= $h4->format('Y');
            $h5 = new DateTime(); $h5->setISODate($ty,$tw,5); $td5= $h5->format('d'); $tm5= $h5->format('m'); $ty5= $h5->format('Y');
            $h6 = new DateTime(); $h6->setISODate($ty,$tw,6); $td6= $h6->format('d'); $tm6= $h6->format('m'); $ty6= $h6->format('Y');
            $h7 = new DateTime(); $h7->setISODate($ty,$tw,7); $td7= $h7->format('d'); $tm7= $h7->format('m'); $ty7= $h7->format('Y');
            
            echo"$sd1-$sm1-$sy1, $sd2-$sm2-$sy2, $sd3-$sm3-$sy3, $sd4-$sm4-$sy4, $sd5-$sm5-$sy5, $sd6-$sm6-$sy6, $sd7-$sm7-$sy7 <br>";
            echo"$td1-$tm1-$ty1, $td2-$tm2-$ty2, $td3-$tm3-$ty3, $td4-$tm4-$ty4, $td5-$tm5-$ty5, $td6-$tm6-$ty6, $td7-$tm7-$ty7 <hr>";
            
            // week day 1
            $tomtom=0;
            $totalfound=0;
            $stime=0;
            $etime=0;
            $sdiff1=0;
            $sdiff2=0;
            $sdiff3=0;
            $lastdate=0;
            if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$sd1' and months='$sm1' and years='$sy1' and status='1' and repeating='Week Repeat' order by id asc";
            else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$sd1' and months='$sm1' and years='$sy1' and status='1' and repeating='Week Repeat' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $stime=substr($rs1["stime"],11,5);
                $stime="$ty1-$tm1-$td1 $stime";
                $sdate=strtotime($stime);
                
                $sdd1=0; $sdd2=0;
                $sdd1=substr($rs1["stime"],8,2); $sdd2=substr($rs1["etime"],8,2);
                $sdiff1=($sdd2-$sdd1); $sdiff1=($td1+$sdiff1);
                $smm1=0; $smm2=0;    
                $smm1=substr($rs1["stime"],5,2); $smm2=substr($rs1["etime"],5,2);
                $sdiff2=($smm2-$smm1); $sdiff2=($tm1+$sdiff2);
                $syy1=0; $syy2=0;
                $syy1=substr($rs1["stime"],0,4); $syy2=substr($rs1["etime"],0,4);
                $sdiff3=($syy2-$syy1); $sdiff3=($ty1+$sdiff3);
                
                if($sdiff2<=9) $sdiff2="0$sdiff2";
                if($sdiff1<=9) $sdiff1="0$sdiff1";
                    
                $etime=substr($rs1["etime"],11,5);
                $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                $stime="$ty1-$tm1-$td1 $stime";
                $edate=strtotime($etime);
                
                if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                else $lastdate=30;
                if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                if($sdiff1>$lastdate) {
                    $sdiff1="01";
                    $sdiff2=($sdiff2+1);
                }
                if($sdiff2>=13){
                    $sdiff2="01";
                    $sdiff3=($sdiff3+1);
                }
                
                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                edays,emonths,eyears,etime,accepted,status,color,night,address,admin_note,category,itemnumber,repeating) VALUES 
                ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td1','$tm1','$ty1','$stime','$sdate','$edate',
                '$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','".$rs1["night"]."',
                '".$rs1["address"]."','".$rs1["admin_note"]."','".$rs1["category"]."','".$rs1["itemnumber"]."','".$rs1["repeating"]."')";
                if ($conn->query($sql) === TRUE) $tomtom="10000";
            } }
            
            // week day 2
            $tomtom=0;
            $totalfound=0;
            $stime=0;
            $etime=0;
            $sdiff1=0;
            $sdiff2=0;
            $sdiff3=0;
            $lastdate=0;
            if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$sd2' and months='$sm2' and years='$sy2' and status='1' and repeating='Week Repeat' order by id asc";
            else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$sd2' and months='$sm2' and years='$sy2' and status='1' and repeating='Week Repeat' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $stime=substr($rs1["stime"],11,5);
                $stime="$ty2-$tm2-$td2 $stime";
                $sdate=strtotime($stime);
                
                $sdd1=0; $sdd2=0;
                $sdd1=substr($rs1["stime"],8,2); $sdd2=substr($rs1["etime"],8,2);
                $sdiff1=($sdd2-$sdd1); $sdiff1=($td2+$sdiff1);
                $smm1=0; $smm2=0;    
                $smm1=substr($rs1["stime"],5,2); $smm2=substr($rs1["etime"],5,2);
                $sdiff2=($smm2-$smm1); $sdiff2=($tm2+$sdiff2);
                $syy1=0; $syy2=0;
                $syy1=substr($rs1["stime"],0,4); $syy2=substr($rs1["etime"],0,4);
                $sdiff3=($syy2-$syy1); $sdiff3=($ty2+$sdiff3);
                
                if($sdiff2<=9) $sdiff2="0$sdiff2";
                if($sdiff1<=9) $sdiff1="0$sdiff1";
                        
                $etime=substr($rs1["etime"],11,5);
                $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                $edate=strtotime($etime);
                
                if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                else $lastdate=30;
                if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                if($sdiff1>$lastdate) {
                    $sdiff1="01";
                    $sdiff2=($sdiff2+1);
                }
                if($sdiff2>=13){
                    $sdiff2="01";
                    $sdiff3=($sdiff3+1);
                }
                
                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                edays,emonths,eyears,etime,accepted,status,color,night,address,admin_note,category,itemnumber,repeating) VALUES 
                ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td2','$tm2','$ty2','$stime','$sdate','$edate',
                '$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','".$rs1["night"]."',
                '".$rs1["address"]."','".$rs1["admin_note"]."','".$rs1["category"]."','".$rs1["itemnumber"]."','".$rs1["repeating"]."')";
                if ($conn->query($sql) === TRUE) $tomtom="20000";
                
            } }
            
            // week day 3
            $tomtom=0;
            $totalfound=0;
            $stime=0;
            $etime=0;
            $sdiff1=0;
            $sdiff2=0;
            $sdiff3=0;
            $lastdate=0;
            if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$sd3' and months='$sm3' and years='$sy3' and status='1' and repeating='Week Repeat' order by id asc";
            else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$sd3' and months='$sm3' and years='$sy3' and status='1' and repeating='Week Repeat' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $stime=substr($rs1["stime"],11,5);
                $stime="$ty3-$tm3-$td3 $stime";
                $sdate=strtotime($stime);
                
                $sdd1=0; $sdd2=0;
                $sdd1=substr($rs1["stime"],8,2); $sdd2=substr($rs1["etime"],8,2);
                $sdiff1=($sdd2-$sdd1); $sdiff1=($td3+$sdiff1);
                $smm1=0; $smm2=0;    
                $smm1=substr($rs1["stime"],5,2); $smm2=substr($rs1["etime"],5,2);
                $sdiff2=($smm2-$smm1); $sdiff2=($tm3+$sdiff2);
                $syy1=0; $syy2=0;
                $syy1=substr($rs1["stime"],0,4); $syy2=substr($rs1["etime"],0,4);
                $sdiff3=($syy2-$syy1); $sdiff3=($ty3+$sdiff3);
                
                if($sdiff2<=9) $sdiff2="0$sdiff2";
                if($sdiff1<=9) $sdiff1="0$sdiff1";
                    
                $etime=substr($rs1["etime"],11,5);
                $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                $edate=strtotime($etime);
                
                if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                else $lastdate=30;
                if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                if($sdiff1>$lastdate) {
                    $sdiff1="01";
                    $sdiff2=($sdiff2+1);
                }
                if($sdiff2>=13){
                    $sdiff2="01";
                    $sdiff3=($sdiff3+1);
                }
                
                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                edays,emonths,eyears,etime,accepted,status,color,night,address,admin_note,category,itemnumber,repeating) VALUES 
                ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td3','$tm3','$ty3','$stime','$sdate','$edate',
                '$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','".$rs1["night"]."',
                '".$rs1["address"]."','".$rs1["admin_note"]."','".$rs1["category"]."','".$rs1["itemnumber"]."','".$rs1["repeating"]."')";
                if ($conn->query($sql) === TRUE) $tomtom="30000"; 
            } }
            
            // week day 4
            $tomtom=0;
            $totalfound=0;
            $stime=0;
            $etime=0;
            $sdiff1=0;
            $sdiff2=0;
            $sdiff3=0;
            $lastdate=0;
            if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$sd4' and months='$sm4' and years='$sy4' and status='1' and repeating='Week Repeat' order by id asc";
            else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$sd4' and months='$sm4' and years='$sy4' and status='1' and repeating='Week Repeat' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $stime=substr($rs1["stime"],11,5);
                $stime="$ty4-$tm4-$td4 $stime";
                $sdate=strtotime($stime);
                
                $sdd1=0; $sdd2=0;
                $sdd1=substr($rs1["stime"],8,2); $sdd2=substr($rs1["etime"],8,2);
                $sdiff1=($sdd2-$sdd1); $sdiff1=($td4+$sdiff1);
                $smm1=0; $smm2=0;    
                $smm1=substr($rs1["stime"],5,2); $smm2=substr($rs1["etime"],5,2);
                $sdiff2=($smm2-$smm1); $sdiff2=($tm4+$sdiff2);
                $syy1=0; $syy2=0;
                $syy1=substr($rs1["stime"],0,4); $syy2=substr($rs1["etime"],0,4);
                $sdiff3=($syy2-$syy1); $sdiff3=($ty4+$sdiff3);
                
                if($sdiff2<=9) $sdiff2="0$sdiff2";
                if($sdiff1<=9) $sdiff1="0$sdiff1";
                
                $etime=substr($rs1["etime"],11,5);
                $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                $edate=strtotime($etime);
                
                if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                else $lastdate=30;
                if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                if($sdiff1>$lastdate) {
                    $sdiff1="01";
                    $sdiff2=($sdiff2+1);
                }
                if($sdiff2>=13){
                    $sdiff2="01";
                    $sdiff3=($sdiff3+1);
                }
                
                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                edays,emonths,eyears,etime,accepted,status,color,night,address,admin_note,category,itemnumber,repeating) VALUES 
                ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td4','$tm4','$ty4','$stime','$sdate','$edate',
                '$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','".$rs1["night"]."',
                '".$rs1["address"]."','".$rs1["admin_note"]."','".$rs1["category"]."','".$rs1["itemnumber"]."','".$rs1["repeating"]."')";
                if ($conn->query($sql) === TRUE) $tomtom="40000"; 
            } }
            
            // week day 5
            $tomtom=0;
            $totalfound=0;
            $stime=0;
            $etime=0;
            $sdiff1=0;
            $sdiff2=0;
            $sdiff3=0;
            $lastdate=0;
            if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$sd5' and months='$sm5' and years='$sy5' and status='1' and repeating='Week Repeat' order by id asc";
            else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$sd5' and months='$sm5' and years='$sy5' and status='1' and repeating='Week Repeat' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $stime=substr($rs1["stime"],11,5);
                $stime="$ty5-$tm5-$td5 $stime";
                $sdate=strtotime($stime);
                
                $sdd1=0; $sdd2=0;
                $sdd1=substr($rs1["stime"],8,2); $sdd2=substr($rs1["etime"],8,2);
                $sdiff1=($sdd2-$sdd1); $sdiff1=($td5+$sdiff1);
                $smm1=0; $smm2=0;    
                $smm1=substr($rs1["stime"],5,2); $smm2=substr($rs1["etime"],5,2);
                $sdiff2=($smm2-$smm1); $sdiff2=($tm5+$sdiff2);
                $syy1=0; $syy2=0;
                $syy1=substr($rs1["stime"],0,4); $syy2=substr($rs1["etime"],0,4);
                $sdiff3=($syy2-$syy1); $sdiff3=($ty5+$sdiff3);
                
                if($sdiff2<=9) $sdiff2="0$sdiff2";
                if($sdiff1<=9) $sdiff1="0$sdiff1";
                    
                $etime=substr($rs1["etime"],11,5);
                $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                $edate=strtotime($etime);
                
                if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                else $lastdate=30;
                if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                if($sdiff1>$lastdate) {
                    $sdiff1="01";
                    $sdiff2=($sdiff2+1);
                }
                if($sdiff2>=13){
                    $sdiff2="01";
                    $sdiff3=($sdiff3+1);
                }
                
                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                edays,emonths,eyears,etime,accepted,status,color,night,address,admin_note,category,itemnumber,repeating) VALUES 
                ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td5','$tm5','$ty5','$stime','$sdate','$edate',
                '$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','".$rs1["night"]."',
                '".$rs1["address"]."','".$rs1["admin_note"]."','".$rs1["category"]."','".$rs1["itemnumber"]."','".$rs1["repeating"]."')";
                if ($conn->query($sql) === TRUE) $tomtom="50000";
                
            } }
            
            // week day 6
            $tomtom=0;
            $totalfound=0;
            $stime=0;
            $etime=0;
            $sdiff1=0;
            $sdiff2=0;
            $sdiff3=0;
            $lastdate=0;
            if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$sd6' and months='$sm6' and years='$sy6' and status='1' and repeating='Week Repeat' order by id asc";
            else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$sd6' and months='$sm6' and years='$sy6' and status='1' and repeating='Week Repeat' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $stime=substr($rs1["stime"],11,5);
                $stime="$ty6-$tm6-$td6 $stime";
                $sdate=strtotime($stime);
                
                $sdd1=0; $sdd2=0;
                $sdd1=substr($rs1["stime"],8,2); $sdd2=substr($rs1["etime"],8,2);
                $sdiff1=($sdd2-$sdd1); $sdiff1=($td6+$sdiff1);
                $smm1=0; $smm2=0;    
                $smm1=substr($rs1["stime"],5,2); $smm2=substr($rs1["etime"],5,2);
                $sdiff2=($smm2-$smm1); $sdiff2=($tm6+$sdiff2);
                $syy1=0; $syy2=0;
                $syy1=substr($rs1["stime"],0,4); $syy2=substr($rs1["etime"],0,4);
                $sdiff3=($syy2-$syy1); $sdiff3=($ty6+$sdiff3);
                
                if($sdiff2<=9) $sdiff2="0$sdiff2";
                if($sdiff1<=9) $sdiff1="0$sdiff1";
                    
                $etime=substr($rs1["etime"],11,5);
                $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                $edate=strtotime($etime);
                
                if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                else $lastdate=30;
                if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                if($sdiff1>$lastdate) {
                    $sdiff1="01";
                    $sdiff2=($sdiff2+1);
                }
                if($sdiff2>=13){
                    $sdiff2="01";
                    $sdiff3=($sdiff3+1);
                }
                
                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                edays,emonths,eyears,etime,accepted,status,color,night,address,admin_note,category,itemnumber,repeating) VALUES 
                ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td6','$tm6','$ty6','$stime','$sdate','$edate',
                '$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','".$rs1["night"]."',
                '".$rs1["address"]."','".$rs1["admin_note"]."','".$rs1["category"]."','".$rs1["itemnumber"]."','".$rs1["repeating"]."')";
                if ($conn->query($sql) === TRUE) $tomtom="60000";
                
            } }
            
            // week day 7
            $tomtom=0;
            $totalfound=0;
            $stime=0;
            $etime=0;
            $sdiff1=0;
            $sdiff2=0;
            $sdiff3=0;
            $lastdate=0;
            if($_POST["employeeid"]=="ALL") $s1 = "select * from shifting_allocation where days='$sd7' and months='$sm7' and years='$sy7' and status='1' and repeating='Week Repeat' order by id asc";
            else $s1 = "select * from shifting_allocation where employeeid='".$_POST["employeeid"]."' and days='$sd7' and months='$sm7' and years='$sy7' and status='1' and repeating='Week Repeat' order by id asc";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $stime=substr($rs1["stime"],11,5);
                $stime="$ty7-$tm7-$td7 $stime";
                $sdate=strtotime($stime);
                
                $sdd1=0; $sdd2=0;
                $sdd1=substr($rs1["stime"],8,2); $sdd2=substr($rs1["etime"],8,2);
                $sdiff1=($sdd2-$sdd1); $sdiff1=($td7+$sdiff1);
                $smm1=0; $smm2=0;    
                $smm1=substr($rs1["stime"],5,2); $smm2=substr($rs1["etime"],5,2);
                $sdiff2=($smm2-$smm1); $sdiff2=($tm7+$sdiff2);
                $syy1=0; $syy2=0;
                $syy1=substr($rs1["stime"],0,4); $syy2=substr($rs1["etime"],0,4);
                $sdiff3=($syy2-$syy1); $sdiff3=($ty7+$sdiff3);
                
                if($sdiff2<=9) $sdiff2="0$sdiff2";
                if($sdiff1<=9) $sdiff1="0$sdiff1";
                    
                $etime=substr($rs1["etime"],11,5);
                $etime="$sdiff3-$sdiff2-$sdiff1 $etime";
                $edate=strtotime($etime);
                
                if($sdiff2=="01" || $sdiff2=="03" || $sdiff2=="05" || $sdiff2=="06" || $sdiff2=="08" || $sdiff2=="10" || $sdiff2=="12" || $sdiff2=="13") $lastdate=31;
                else $lastdate=30;
                if($sdiff2=="Feb") $lastdate=date("t", $todayx); 
                    
                if($sdiff1>$lastdate) {
                    $sdiff1="01";
                    $sdiff2=($sdiff2+1);
                }
                if($sdiff2>=13){
                    $sdiff2="01";
                    $sdiff3=($sdiff3+1);
                }
                
                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                edays,emonths,eyears,etime,accepted,status,color,night,address,admin_note,category,itemnumber,repeating) VALUES 
                ('".$rs1["employeeid"]."','".$rs1["projectid"]."','".$rs1["clientid"]."','$td7','$tm7','$ty7','$stime','$sdate','$edate',
                '$sdiff1','$sdiff2','$sdiff3','$etime','".$rs1["accepted"]."','".$rs1["status"]."','".$rs1["color"]."','".$rs1["night"]."',
                '".$rs1["address"]."','".$rs1["admin_note"]."','".$rs1["category"]."','".$rs1["itemnumber"]."','".$rs1["repeating"]."')";
                if ($conn->query($sql) === TRUE) $tomtom="70000";
            } }
            
            if(isset($tomtom)){
                echo"<script>alert('Week Repeating Updated...')</script>";
                echo"<form method='GET' action='index.php' name='main' target='_top'>
                    <input type=hidden name='url' value='".$_POST["url"]."'>
                    <input type=hidden name='viewstatus' value='".$_POST["viewstatus"]."'>
                    <input type=hidden name='prjsrc' value='".$_POST["prjsrc"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
    
        }
        
        if($_POST["processor"]=="wipeweek"){
            $weekto=$_POST["weekto"]; $ty=substr($weekto,0,4); $tw=substr($weekto,6,2);
            
            $h1 = new DateTime(); $h1->setISODate($ty,$tw,1); $td1= $h1->format('d'); $tm1= $h1->format('m'); $ty1= $h1->format('Y');
            $h2 = new DateTime(); $h2->setISODate($ty,$tw,2); $td2= $h2->format('d'); $tm2= $h2->format('m'); $ty2= $h2->format('Y');
            $h3 = new DateTime(); $h3->setISODate($ty,$tw,3); $td3= $h3->format('d'); $tm3= $h3->format('m'); $ty3= $h3->format('Y');
            $h4 = new DateTime(); $h4->setISODate($ty,$tw,4); $td4= $h4->format('d'); $tm4= $h4->format('m'); $ty4= $h4->format('Y');
            $h5 = new DateTime(); $h5->setISODate($ty,$tw,5); $td5= $h5->format('d'); $tm5= $h5->format('m'); $ty5= $h5->format('Y');
            $h6 = new DateTime(); $h6->setISODate($ty,$tw,6); $td6= $h6->format('d'); $tm6= $h6->format('m'); $ty6= $h6->format('Y');
            $h7 = new DateTime(); $h7->setISODate($ty,$tw,7); $td7= $h7->format('d'); $tm7= $h7->format('m'); $ty7= $h7->format('Y');
            
            echo"$td1-$tm1-$ty1, $td2-$tm2-$ty2, $td3-$tm3-$ty3, $td4-$tm4-$ty4, $td5-$tm5-$ty5, $td6-$tm6-$ty6, $td7-$tm7-$ty7 <hr>";
            
            // week day 1
            if($_POST["employeeid"]=="ALL") $sql = "DELETE FROM shifting_allocation WHERE days='$td1' and months='$tm1' and years='$ty1'";
            else $sql = "DELETE FROM shifting_allocation WHERE employeeid='".$_POST["employeeid"]."' and days='$td1' and months='$tm1' and years='$ty1'";
            if ($conn->query($sql) === TRUE) echo "Record deleted successfully";
            
            // week day 2
            if($_POST["employeeid"]=="ALL") $sql = "DELETE FROM shifting_allocation WHERE days='$td2' and months='$tm2' and years='$ty2'";
            else $sql = "DELETE FROM shifting_allocation WHERE employeeid='".$_POST["employeeid"]."' and days='$td2' and months='$tm2' and years='$ty2'";
            if ($conn->query($sql) === TRUE) echo "Record deleted successfully";
            
            // week day 2
            if($_POST["employeeid"]=="ALL") $sql = "DELETE FROM shifting_allocation WHERE days='$td3' and months='$tm3' and years='$ty3'";
            else $sql = "DELETE FROM shifting_allocation WHERE employeeid='".$_POST["employeeid"]."' and days='$td3' and months='$tm3' and years='$ty3'";
            if ($conn->query($sql) === TRUE) echo "Record deleted successfully";
            
            // week day 2
            if($_POST["employeeid"]=="ALL") $sql = "DELETE FROM shifting_allocation WHERE days='$td4' and months='$tm4' and years='$ty4'";
            else $sql = "DELETE FROM shifting_allocation WHERE employeeid='".$_POST["employeeid"]."' and days='$td4' and months='$tm4' and years='$ty4'";
            if ($conn->query($sql) === TRUE) echo "Record deleted successfully";
            
            // week day 2
            if($_POST["employeeid"]=="ALL") $sql = "DELETE FROM shifting_allocation WHERE days='$td5' and months='$tm5' and years='$ty5'";
            else $sql = "DELETE FROM shifting_allocation WHERE employeeid='".$_POST["employeeid"]."' and days='$td5' and months='$tm5' and years='$ty5'";
            if ($conn->query($sql) === TRUE) echo "Record deleted successfully";
            
            // week day 2
            if($_POST["employeeid"]=="ALL") $sql = "DELETE FROM shifting_allocation WHERE days='$td6' and months='$tm6' and years='$ty6'";
            else $sql = "DELETE FROM shifting_allocation WHERE employeeid='".$_POST["employeeid"]."' and days='$td6' and months='$tm6' and years='$ty6'";
            if ($conn->query($sql) === TRUE) echo "Record deleted successfully";
            
            // week day 2
            if($_POST["employeeid"]=="ALL") $sql = "DELETE FROM shifting_allocation WHERE days='$td7' and months='$tm7' and years='$ty7'";
            else $sql = "DELETE FROM shifting_allocation WHERE employeeid='".$_POST["employeeid"]."' and days='$td7' and months='$tm7' and years='$ty7'";
            if ($conn->query($sql) === TRUE) echo "Record deleted successfully";
            
            echo"<script>alert('Week Wiped Out...')</script>";
            echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='schedule.php'><input type=hidden name='id' value='57'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
            
        }
        
        if($_POST["processor"]=="shiftinglist"){
            if(!empty($_POST["id"])){
                $sql="update shifting_schedule set stime='".$_POST["stime"]."', etime='".$_POST["etime"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                // echo"<script>alert('Shift Time Updated.')</script>";
            }
        }
        
        if($_POST["processor"]=="shiftinglist1"){
            if(!empty($_POST["id"])){
                $sql="update shifting_schedule set night='".$_POST["over_night"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                // echo"<script>alert('Over Night Shift Updated.')</script>";
            }
        }
        
        if($_POST["processor"]=="shiftinglist2"){
            if(!empty($_POST["projectid"])){
                $sql="update project set color='".$_POST["pcolor"]."' where id='".$_POST["projectid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                // echo"<script>alert('Color Updated.')</script>";
            }
        }
    }
    
?>
