<?php
    error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    
    if(isset($_COOKIE["userid"])){
        include("include.php");
        
        if(isset($_GET["request_approveid"])){
            $sql="update shifting_allocation set clockin='".$_GET["newclockintime"]."',clockout='".$_GET["newclockouttime"]."',clockout_request='1' where id='".$_GET["request_approveid"]."'";
            if ($conn->query($sql) === TRUE){ echo"<script>alert('Request Approved.')</script>"; }
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='time-sheet'>
            <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_GET["request_rejectid"])){
            $sql="update shifting_allocation set clockout_request='1' where id='".$_GET["request_rejectid"]."'";
            if ($conn->query($sql) === TRUE){ echo"<script>alert('Request Approved.')</script>"; }
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='time-sheet'>
            <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["request_edit"])){
            $requesttime1=0;
            $requesttime2=0;
            
            $requestin="".$_POST["pdate"]." ".$_POST["clockin_request"]."";
            $requestout="".$_POST["pdate"]." ".$_POST["clockout_request"]."";
            
            $requesttime1=strtotime($requestin);
            $requesttime2=strtotime($requestout);
            
            $activity_log = str_replace("'", "`", $_POST["activity_log"]);
            
            $sql="update shifting_allocation set clockin_request='$requesttime1',clockout_request='$requesttime2',activity_log='$activity_log' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE){ echo"<script>alert('Request Sent.')</script>"; }
            
            $r1w = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by id asc limit 1";
            $r2w = $conn->query($r1w);
            if ($r2w->num_rows > 0) { while($r3w = $r2w -> fetch_assoc()) { $employeename="".$r3w["username"]."".$r3w["username2"].""; }}
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','TIME SHEET REQUEST','0','$sysdate','$ip','1','$employeename Sent Clock-OUT Change Request to Update to <b>$requesttime</b>','".$_POST["id"]."','".$_COOKIE["userid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='time-sheet'>
            <input type=hidden name='src_employeeid' value='".$_POST["src_employeeid"]."'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_GET["shiftingidtodayview"])){
            
            unset($_COOKIE["projectid"]);
            setcookie("projectid", "", time() -9999999);
            setcookie("projectid", $_GET["projectid"], time() +9999999);
            
            unset($_COOKIE["shiftingidtodayview"]);
            setcookie("shiftingidtodayview", "", time() -9999999);
            setcookie("shiftingidtodayview", $_GET["shiftingidtodayview"], time() +9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
            
        }
        
        if(isset($_GET["projectid"])){
            unset($_COOKIE["projectid"]);
            setcookie("projectid", "", time() -9999999);
            setcookie("projectid", $_GET["projectid"], time() +9999999);
            
            $weekvar=time();
            $weekvar1=date("W", $weekvar);
            $weekvar2=date("Y", $weekvar);
            $weekvar="$weekvar2-W$weekvar1";
            
            $wf=$weekvar; $wy=substr($wf,0,4); $ww=substr($wf,6,2);
            $g1 = new DateTime(); 
            $g1->setISODate($wy,$ww,1);
            $shiftingid= $g1->format('Y-m-d');
            
            if(isset($_GET["shiftingidtoday"])){
                unset($_COOKIE["shiftingidtoday"]);
                setcookie("shiftingidtoday", "", time() -9999999);
                setcookie("shiftingidtoday", $shiftingid, time() +9999999);
            }else{
                unset($_COOKIE["shiftingid"]);
                setcookie("shiftingid", "", time() -9999999);
                setcookie("shiftingid", $shiftingid, time() +9999999);
            }
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_GET["url"]."'>
                <input type='hidden' name='projectid' value='".$_GET["projectid"]."'>
                <input type='hidden' name='viewstatus' value='".$_GET["viewstatus"]."'>
                <input type='hidden' name='prjsrc' value='".$_GET["prjsrc"]."'>
                <input type='hidden' name='accepted' value='".$_GET["accepted"]."'>
                <input type='hidden' name='maxlimit' value='".$_GET["maxlimit"]."'>
                <input type=hidden name='id' value='".$_GET["id"]."'>
                <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingid"])){
            unset($shiftingid);
            setcookie("shiftingid", "", time() -9999999);
            
            $wf=$_POST["shiftingid"]; $wy=substr($wf,0,4); $ww=substr($wf,6,2);
            $g1 = new DateTime(); $g1->setISODate($wy,$ww,1); $shiftingid= $g1->format('Y-m-d');
            
            setcookie("shiftingid", $shiftingid, time() +9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_POST["url"]."'>
                <input type='hidden' name='projectid' value='".$_POST["projectid"]."'>
                <input type='hidden' name='viewstatus' value='".$_POST["viewstatus"]."'>
                <input type='hidden' name='prjsrc' value='".$_POST["prjsrc"]."'>
                <input type='hidden' name='accepted' value='".$_POST["accepted"]."'>
                <input type='hidden' name='maxlimit' value='".$_POST["maxlimit"]."'>
                <input type=hidden name='id' value='".$_POST["id"]."'>
                <input type=hidden name='src_employeeid' value='".$_POST["src_employeeid"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingid1"])){
            unset($shiftingid);
            setcookie("shiftingid", "", time() -9999999);
            
            $wf=$_POST["shiftingid1"]; $wy=substr($wf,0,4); $ww=substr($wf,6,2);
            $g1 = new DateTime(); $g1->setISODate($wy,$ww,1); $shiftingid= $g1->format('Y-m-d');
            
            setcookie("shiftingid", $shiftingid, time() +9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='schedule.php'>
            <input type='hidden' name='src_employeeid' value='".$_POST["src_employeeid"]."'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["dailyclockinout"])){
            unset($shiftingid);
            setcookie("shiftingidtoday", "", time() -9999999);
            setcookie("shiftingidtoday", $_POST["dailyclockinout"], time() +9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='clock_in-out.php'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_GET["shiftingidtoday3"])){
            unset($shiftingid);
            setcookie("shiftingidtoday", "", time() -9999999);
            setcookie("shiftingidtoday", $_GET["shiftingidtoday3"], time() +9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='clockedin'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingidtoday1"])){
            unset($_COOKIE["shiftingid"]);
            setcookie("shiftingid", "", time() -9999999);
            setcookie("shiftingid", $_POST["shiftingidtoday1"], time() +9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_POST["url"]."'>
                <input type='hidden' name='projectid' value='".$_POST["projectid"]."'>
                <input type='hidden' name='viewstatus' value='".$_POST["viewstatus"]."'>
                <input type='hidden' name='prjsrc' value='".$_POST["prjsrc"]."'>
                <input type='hidden' name='accepted' value='".$_POST["accepted"]."'>
                <input type='hidden' name='maxlimit' value='".$_POST["maxlimit"]."'>
                <input type=hidden name='id' value='".$_POST["id"]."'>
                <input type=hidden name='src_employeeid' value='".$_POST["src_employeeid"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingidtoday11"])){
            unset($_COOKIE["shiftingidtoday"]);
            setcookie("shiftingidtoday", "", time() -9999999);
            setcookie("shiftingidtoday", $_POST["shiftingidtoday11"], time() +9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_POST["url"]."'><input type=hidden name='id' value='".$_POST["id"]."'>
                <input type=hidden name='src_employeeid' value='".$_POST["src_employeeid"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingid22"])){
            
            setcookie("shiftingid", "", time() -9999999);
            setcookie("shiftingid", $_POST["shiftingid22"], time() +9999999);
            
            unset($_COOKIE["shiftingidtoday"]);
            setcookie("shiftingidtoday", "", time() -9999999);
            
            $wf=$_POST["shiftingid22"]; $wy=substr($wf,0,4); $ww=substr($wf,6,2);
            $g1 = new DateTime(); $g1->setISODate($wy,$ww,1); $shiftingids= $g1->format('Y-m-d');
            
            setcookie("shiftingidtoday", $_POST["shiftingid22"], time() +9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_POST["url"]."'><input type=hidden name='id' value='".$_POST["id"]."'>
                <input type=hidden name='src_employeeid' value='".$_POST["src_employeeid"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingidtoday2"])){
            unset($shiftingid);
            setcookie("shiftingid", "", time() -9999999);
            setcookie("shiftingid", $_POST["shiftingidtoday2"], time() +9999999);
            
            echo"<form method='post' action='index.php' name='main' target='_top'>
            <input type=hidden name='smsbd' value='schedule-board-jobs'><input type='hidden' name='src_employeeid' value='".$_POST["src_employeeid"]."'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_GET["shiftingiduserx"])){
            
            unset($shiftingid);
            setcookie("shiftingid", "", time() -9999999);
            setcookie("shiftingid", $_GET["shiftingiduserx"], time() +9999999);
            
            unset($shiftingidx);
            setcookie("shiftingidx", "", time() -9999999);
            
            $weekvar=time();
            $weekvar1=date("W", $weekvar);
            $weekvar2=date("Y", $weekvar);
            $weekvar="$weekvar2-W$weekvar1";
            
            $wf=$weekvar; $wy=substr($wf,0,4); $ww=substr($wf,6,2);
            $g1 = new DateTime(); $g1->setISODate($wy,$ww,1); $shiftingidz= $g1->format('Y-m-d');
            
            setcookie("shiftingidx", $shiftingidz, time() +9999999);
            
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='time-clock'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingiduser"])){
            
            unset($shiftingid);
            setcookie("shiftingid", "", time() -9999999);
            setcookie("shiftingid", $_POST["shiftingiduser"], time() +9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='time-clock'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
        if(isset($_POST["shiftingiduser2"])){
            if(!isset($_POST["edit_shift"])){
                unset($shiftingid2);
                setcookie("shiftingid2", "", time() -9999999);
                setcookie("shiftingid2", $_POST["shiftingiduser2"], time() +9999999);
                unset($shiftingid3);
                setcookie("shiftingid3", "", time() -9999999);
                setcookie("shiftingid3", $_POST["shiftingiduser3"], time() +9999999);
                
                echo"<form method='get' action='index.php' name='main' target='_top'>
                    <input type=hidden name='url' value='time_sheet.php'>
                    <input type=hidden name='src_employeeid' value='".$_POST["src_employeeid"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_GET["timeclock"])){
            unset($_COOKIE["timeclockstat"]);
            setcookie("timeclockstat", "", time() -9999999);
            setcookie("timeclockstat", $_GET["timeclock"], time() +9999999);
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_GET["url"]."'>
                <input type=hidden name='id' value='".$_GET["id"]."'>
                <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                <input type=hidden name='gogo' value='".$_GET["gogo"]."'>
            </form>";
            ?><script language=JavaScript> document.main.submit(); </script><?php
        }
        
        // CLOCK IN DATA SAVING
        if(isset($_POST["timeclockin"])){
            
            if(isset($_REQUEST["latlog"])) $latlogx=$_REQUEST["latlog"];
            if(isset($_REQUEST["latitudea"])) $latitudex=$_REQUEST["latitudea"];
            if(isset($_REQUEST["longitudea"])) $longitudex=$_REQUEST["longitudea"];
            
            if(isset($latlogx)){
                unset($timeclockin);
                setcookie("timeclockin", "", time() -9999999);
                setcookie("timeclockin", $_POST["timeclockin"], time() +9999999);
                
                unset($shiftname);
                setcookie("shiftname", "", time() -9999999);
                setcookie("shiftname", $_POST["shiftname"], time() +9999999);
                
                unset($shiftclockin);
                setcookie("shiftclockin", "", time() -9999999);
                setcookie("shiftclockin", $_POST["shiftclockin"], time() +9999999);
                
                unset($shiftclockout);
                setcookie("shiftclockout", "", time() -9999999);
                setcookie("shiftclockout", $_POST["shiftclockout"], time() +9999999);
                
                unset($latitudez);
                setcookie("latitudez", "", time() -99999);
                setcookie("latitudez", $latitudex, time()+99999);
                
                unset($longitudez);
                setcookie("longitudez", "", time() -99999);    
                setcookie("longitudez", $longitudex, time()+99999);
            
                include('include.php');
                
                $timenow=time();
                $timenowx=date("h:i:s A", $timenow);
                $currentday=date("l", $timenow);
                $tc1 = "select * from shifting_allocation where id='".$_COOKIE["timeclockstat"]."' order by id asc limit 1";
                $tc2 = $conn->query($tc1);
                if ($tc2->num_rows > 0) { while($tc3 = $tc2 -> fetch_assoc()) {
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
                        
                        if($tc3["night"]==1) $wage_amount=$r3w["night_amt"];
                        
                        $overtime_amount=$r3w["overtime"];
                    } }
                    $stime=strtotime($tc3["stime"]);
                    $exitpoint=strtotime($tc3["etime"]);
                } }
                
                $ctimex=date("d-m-Y H:i:s", $_POST["timeclockin"]);
                
                $lesstime = $stime -10 * 60;
                $moretime = $stime +10 * 60;
                
                $less_time = date('Y-m-d H:i:s', $lesstime);
                $more_time = date('Y-m-d H:i:s', $moretime);
                
                $tomtom1=0;
                $tomtom2=0;
                $tomtom3=0;
                if($_POST["timeclockin"]>="$lesstime") $tomtom1=1;
                if($_POST["timeclockin"]<="$moretime") $tomtom2=1;
                
                $tomtom3=($tomtom1+$tomtom2);
                $clockinvalue=time();
                if($tomtom3==2) $clockinvalue=$stime;
                else $clockinvalue=$_POST["timeclockin"];
                
                $timenowz=time();
                $timeverify=($timenowz-$stime);
                if($timeverify<=0) $clockinvalue=$stime;
                
                $clockin_time=date("h:i:s a", $stime);
                
                if($_POST["timeclockin"] >= $lesstime){
                    if($_POST["timeclockin"] <= $exitpoint){
                        // echo"<script>alert('All Criteria Matched for Clockin')</script>";
                        // if($_POST["timeclockin"]>="$lesstime" AND $_POST["timeclockin"]<="$moretime") $clockinvalue=$stime;
                        // else $clockinvalue=$_POST["timeclockin"];
                        // echo"<script>alert('$clockinvalue, ".$_POST["timeclockin"].", $stime')</script>";
                        
                        $sql="update shifting_allocation set real_clockin='$timenow',clockin='$clockinvalue',clockout='0',wage_amt='$wage_amount',overtime_amt='".$_POST["overtime"]."',latitude_in='$latitudex',longitude_in='$longitudex' where id='".$_COOKIE["timeclockstat"]."'";
                        if ($conn->query($sql) === TRUE){ echo"<script>alert('Clocked-In Online')</script>"; }
                        
                        $clockedintime=date("d-m-Y H:i:s a", $_POST["timeclockin"]);
                        $r1w = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by id asc limit 1";
                        $r2w = $conn->query($r1w);
                        if ($r2w->num_rows > 0) { while($r3w = $r2w -> fetch_assoc()) { $employeename="".$r3w["username"]."".$r3w["username2"].""; }}
                        
                        $sysdate=time();
                        $ip=$_SERVER['REMOTE_ADDR'];
                        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                        VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','$employeename Clocked IN at <b>$clockedintime</b>','".$_COOKIE["timeclockstat"]."','".$_COOKIE["userid"]."')";
                        if ($conn->query($sql1) === TRUE) $tomtom=0;
                        
                    }else {
                        echo"<script>alert('Sorry! you are too late to login. your login time was $clockin_time')</script>";
                    }
                }else{
                    echo"<script>alert('Too Early to Clockin - Wait till $clockin_time')</script>";
                }
                
            }
        }
        
        if(isset($_POST["timeclockout"])){
            
            if(isset($_REQUEST["latlog"])) $latlogx=$_REQUEST["latlog"];
            if(isset($_REQUEST["latitudea"])) $latitudex=$_REQUEST["latitudea"];
            if(isset($_REQUEST["longitudea"])) $longitudex=$_REQUEST["longitudea"];
            
            if(isset($latlogx)){ 
                unset($_COOKIE["timeclockin"]);
                setcookie("timeclockin", "", time() -9999999);
                unset($_COOKIE["shiftname"]);
                setcookie("shiftname", "", time() -9999999);
                unset($_COOKIE["shiftclockin"]);
                setcookie("shiftclockin", "", time() -9999999);
                unset($_COOKIE["shiftclockout"]);
                setcookie("shiftclockout", "", time() -9999999);
                unset($_COOKIE["latitudez"]);
                setcookie("latitudez", "", time() -9999999);
                unset($_COOKIE["longitudez"]);
                setcookie("longitudez", "", time() -9999999);    
                
                
                include('include.php');
                
                $timenow=time();
                $timenowx=date("h:i:s A", $timenow);
                $currentday=date("l", $timenow);
                
                $tc1 = "select * from shifting_allocation where id='".$_COOKIE["timeclockstat"]."' order by id asc limit 1";
                $tc2 = $conn->query($tc1);
                if ($tc2->num_rows > 0) { while($tc3 = $tc2 -> fetch_assoc()) {
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
                        
                        if($tc3["night"]==1) $wage_amount=$r3w["night_amt"];
                        
                        $stime=$tc3["sdate"];
                        $overtime_amount=$r3w["overtime"];
                    } }
                    $exitpoint=strtotime($tc3["etime"]);
                } }
                
                $timenowz=time();
                $timeverify=($timenowz-$stime);
                
                $clockout=$timenow;
                if($exitpoint<=$timenow) $clockout=$exitpoint;
                if($timeverify<=0) $clockout=$stime;
                
                $sql="update shifting_allocation set clockout='$clockout',latitude_out='$latitudex',longitude_out='$longitudex' where id='".$_COOKIE["timeclockstat"]."'";
                if ($conn->query($sql) === TRUE){
                    echo"<script>alert('Clocked-Out Successfully')</script>";
                    
                    $clockedintime=date("d-m-Y H:i:s a", $_POST["timeclockout"]);
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','$employeename Clocked OUT at <b>$clockedintime</b>','".$_COOKIE["timeclockstat"]."','".$_COOKIE["userid"]."')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    
                    unset($_COOKIE["timeclockstat"]);
                    setcookie("timeclockstat", "", time() -9999999);
                    unset($_COOKIE["shiftingid2"]);
                    setcookie("shiftingid2", "", time() -9999999);
                    unset($_COOKIE["shiftingid3"]);
                    setcookie("shiftingid3", "", time() -9999999);
                    
                    echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='clock_in-out.php'></form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }
        }
        
        if(isset($_POST["log_note"])){
            include('include.php');
            $log_note = str_replace("'", "`", $_POST["log_note"]);
            $sql="update shifting_allocation set milage='".$_POST["milage"]."',activity_log='$log_note',vehicle_option='".$_POST["vehicle_option"]."' where id='".$_COOKIE["timeclockstat"]."'";
            if ($conn->query($sql) === TRUE){ echo"<script>alert('".$_POST["milage"]." Log Updated')</script>"; }
        }
        
        if(isset($_GET["empid"])){
            include('include.php');
            $sql = "insert into leave_asign (cid,leavetype,day,month,year,stime,etime,note,status) 
            VALUES ('".$_GET["empid"]."','DAY LEAVE','".$_GET["dd"]."','".$_GET["mm"]."','".$_GET["yy"]."','00:00','00:00','N/A','1')";
            if ($conn->query($sql) === TRUE){
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='time-clock'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_GET["empidx"])){
            include('include.php');
            $sql = "insert into leave_asign (cid,leavetype,day,month,year,stime,etime,note,status) 
            VALUES ('".$_GET["empidx"]."','DAY LEAVE','".$_GET["dd"]."','".$_GET["mm"]."','".$_GET["yy"]."','00:00','00:00','N/A','1')";
            if ($conn->query($sql) === TRUE){
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='availability_setup.php'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_GET["empid2"])){
            include('include.php');
            $sql = "insert into leave_asign (cid,leavetype,day,month,year,stime,etime,note,status) 
            VALUES ('".$_GET["empid2"]."','DAY LEAVE','".$_COOKIE["rday"]."','".$_COOKIE["rmonth"]."','".$_COOKIE["ryear"]."','00:00','00:00','N/A','1')";
            if ($conn->query($sql) === TRUE){  echo"<script>alert('Unavailability Set')</script>";  }
        }
        
        if(isset($_GET["empid3"])){
            include('include.php');
            $sql = "DELETE FROM leave_asign WHERE cid='".$_GET["empid3"]."' and day='".$_GET["dd"]."' and month='".$_GET["mm"]."' and year='".$_GET["yy"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Set as Available')</script>";
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='schedule-board'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_GET["empid33"])){
            include('include.php');
            $sql = "DELETE FROM leave_asign WHERE cid='".$_GET["empid33"]."' and day='".$_GET["dd"]."' and month='".$_GET["mm"]."' and year='".$_GET["yy"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Set as Available')</script>";
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='availability_setup.php'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_GET["empid4"])){
            include('include.php');
            $sql = "DELETE FROM leave_asign WHERE cid='".$_GET["empid4"]."' and day='".$_GET["dd"]."' and month='".$_GET["mm"]."' and year='".$_GET["yy"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('You are now available on ".$_GET["dd"]."-".$_GET["mm"]."-".$_GET["yy"]."')</script>";
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='time-clock'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_POST["edit_shift"])){
            if($_POST["edit_shift"]=="edit-shifting"){
                
                include('include.php');
                
                $activity_log = str_replace("'", "`", $_POST["activity_log"]);
                
                $cin = "".$_POST["pdate"]." ".$_POST["clockin1"]."";
                $cout = "".$_POST["pdate"]." ".$_POST["clockout1"]."";
                $clockin=strtotime($cin);
                $clockout=strtotime($cout);
                
                // echo"<script>alert('$cin, $cout')</script>";
                $sql="update shifting_allocation set activity_log='$activity_log',total_overtime='".$_POST["total_overtime"]."',milage='".$_POST["milage"]."',clockin='$clockin',clockout='$clockout',wage_amt='".$_POST["wage_amount"]."',overtime_amt='".$_POST["overtime_amount"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE){
                    echo"<script>alert('Record Updated')</script>";
                    echo"<form method='get' action='index.php' name='main' target='_top'>
                        <input type='hidden' name='url' value='time_sheet.php'>
                        <input type='hidden' name='id' value='5198'>
                        <input type='hidden' name='src_employeeid' value='".$_POST["src_employeeid"]."'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }
        }
        
    }
?>