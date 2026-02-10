<style>
  table tbody tr:hover {
    background-color: grey; /* light gray */
    cursor: pointer; /* optional: pointer on hover */
  }
</style>
<?php
    
    include("authenticator.php");
    include("head.php");
    $tday=time();
    
    if(isset($_POST["pid"])) $pid=$_POST["pid"];
    else if(isset($_GET["pid"])) $pid=$_GET["pid"];
    else $pid=0;
    
    if(isset($_POST["ptype"])) $ptype=$_POST["ptype"];
    else if(isset($_GET["ptype"])) $ptype=$_GET["ptype"];
    else $ptype=1;
    
    echo"<!DOCTYPE html>
    <html lang='en' data-footer='true'>
        <head>
            <style>
                body {
                    opacity: 0;
                    transition: opacity 1s ease-in;
                }
                
                body.fade-in-loaded {
                    opacity: 1;
                }
            </style>
        </head>
        <body class='fade-in card mb-5'>";
        
            $nextweek = date('o-\WW', strtotime("+1 week"));
            $nextmonday = date("Y-m-d", strtotime("next monday"));
            $nextmonth = date('Y-m', strtotime('+1 month'));
            
            echo"<div class='row'>
                <div class='col-12 col-md-3'>
                    <h2>Weekly Repeat</h2>
                    <form class='m-t' role='form' method='POST' name='wcopy' action='blank.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                	    <input type='hidden' name='processor' value='cloneweek'><input type='hidden' name='id' value=''>
                		<input type='hidden' name='redirect' value='schedule-board'>
                		<input type='hidden' name='employeeid' value='ALL'>
                		<input type='hidden' id='weekfrom' name='weekfrom'>
                		<input type='hidden' id='weekto' name='weekto'>
                		<input type='submit' class='btn btn-primary recordupdated' value='Repeat Week'>
                    </form>";
                    /*
                    <form method='GET'><table style='width:100%'><tr style='font-size:12pt'>
                        <td>
                            <input type='week' class='form-control' name='weekselect' value='$nextweek'>
                            <input type=hidden value='0' name='ptype'>
                            <input type=hidden value='Week Repeat' name='repeating'>
                        </td>
                        <td style='width:5%'>
                            <input type='hidden' name='processthis' value='1'><input type='submit' value='Show Week' class='btn btn-success'>
                        </td>
                    </tr></table></form>
                    */
                echo"</div>
                
                <div class='col-12 col-md-5'>
                    <h2>Forthnight Repeat</h2>
                    <form method='GET'>
                        <input type='hidden' class='form-control' id='fortnight_start' name='fortnight_start' value='$nextmonday' style='width:150px'>
                        <input type='hidden' class='form-control' id='fortnight_end' name='fortnight_end' readonly style='width:150px'>
                        <input type=hidden value='0' name='ptype'>
                        <input type=hidden value='Fortnight Repeat' name='repeating'>
                        <input type='hidden' name='processthis' value='1'>
                        <input type='submit' value='Show Forthnight' class='btn btn-warning'>
                    </form>";
                    ?><script>
                        function setFortnightEnd() {
                            let startInput = document.getElementById('fortnight_start');
                            let endInput = document.getElementById('fortnight_end');
                            let startDate = new Date(startInput.value);
                            if (!isNaN(startDate)) {
                                let endDate = new Date(startDate);
                                endDate.setDate(startDate.getDate() + 6); // 6 days total
                                endInput.value = endDate.toISOString().split('T')[0];
                            }
                        }
                    
                        // Run on load
                        window.onload = setFortnightEnd;
                    
                        // Run again when start date changes
                        document.getElementById('fortnight_start').addEventListener('change', setFortnightEnd);
                    </script><?php
                echo"</div>
                
                <div class='col-12 col-md-3'>
                    <h2>Monthly Repeat</h2>
                    <form method='GET'>
                        <input type='hidden' class='form-control' name='monthselect' value='$nextmonth' >
                        <input type=hidden value='0' name='ptype'>
                        <input type=hidden value='Month Repeat' name='repeating'>
                        <input type='hidden' name='processthis' value='1'><input type='submit' value='Show Month' class='btn btn-danger'>
                    </form>
                </div>
            </row>";
            
            if(isset($_GET["repeating"]) AND $_GET["repeating"]=="Week Repeat"){
                
                $selectedweek = $_GET["weekselect"];
                $mon_date   = date('Y-m-d', strtotime($selectedweek . '-1'));
                $tue_date  = date('Y-m-d', strtotime($selectedweek . '-2'));
                $wed_date   = date('Y-m-d', strtotime($selectedweek . '-3'));
                $thu_date = date('Y-m-d', strtotime($selectedweek . '-4'));
                $fri_date   = date('Y-m-d', strtotime($selectedweek . '-5'));
                $sat_date   = date('Y-m-d', strtotime($selectedweek . '-6'));
                $sun_date   = date('Y-m-d', strtotime($selectedweek . '-7'));
                
                $prevweek = date('o-\WW', strtotime($selectedweek . ' -1 week'));
                $pre_mon_date = date('Y-m-d 01:i:s', strtotime($prevweek . '-1'));
                $pre_sun_date = date('Y-m-d 00:i:s', strtotime($prevweek . '-7'));
                
                $prestime = strtotime($pre_mon_date);
                $preetime = strtotime($pre_sun_date);
                
                echo"<div class='container'><center>
                    <div class='row' style='width:95%'>
                        <hr><h2>".$_GET["repeating"]." - $selectedweek<br>Monday-$mon_date to Sunday-$sun_date</h2><hr>
                        <table style='width:100%'>
                            <thead><tr style='font-size:8pt'><th>employeeid</th><th>projectid</th><th>clientid</th><th>stime</th><th>etime</th><th>itemnumber</th><th>repeating</th></tr></thead>
                            <tbody>";
                                $wsp11 = "select * from project where status='1' order by id desc";
                                $wsp22 = $conn->query($wsp11);
                                if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                    
                                    $tid=0;
                                    // $ln1 = "select * from shifting_allocation where sdate>='$prestime' and sdate<='$preedate' and projectid='".$wsp33["id"]."' and itemnumber!='0' and employeeid!='0' and status='1' and repeating='Week Repeat' order by id asc";
                                    $ln1 = "select * from shifting_allocation where projectid='".$wsp33["id"]."' and itemnumber!='0' and employeeid!='0' and status='1' and repeating='Week Repeat' order by id asc";
                                    $ln2 = $conn->query($ln1);
                                    if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                    
                                        $tid=($tid+1);
                                        $sc1 = "select * from ndis_line_numbers where id='".$ln3["itemnumber"]."' order by id desc limit 1";
                                        $sc2 = $conn_main->query($sc1);
                                        if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                            $supportname=$sc3["item_name"];
                                            $supportlinenumber=$sc3["item_number"];
                                            $supportprice=$sc3["national"];
                                        } }
                                        
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
                                        
                                        echo"<tr style='font-size:8pt'>
                                            <td>".$ln3["employeeid"]."</td>
                                            <td>".$ln3["projectid"]."</td>
                                            <td>".$ln3["clientid"]."</td>
                                            <td style='color:red'><b>".$ln3["stime"]." TO $sday ($sd, $sm, $sy)</b></td>
                                            <td style='color:red'><b>".$ln3["etime"]." TO $eday ($ed, $em, $ey)</b></td>
                                            <td>$supportlinenumber</td>
                                            <td>".$ln3["repeating"]."</td>
                                        </tr>";
                                        
                                        if($_GET["processthis"]==11){
                                            if($ln3["stime"]!=$sday){
                                                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                                                edays,emonths,eyears,etime,accepted,status,color,clockin,clockout,clockin_request,clockout_request,total_hour,total_overtime,milage,
                                                latitude_in,longitude_in,latitude_out,longitude_out,activity_log,stime2,etime2,request2,wage_amt,overtime_amt,night,address,admin_note,
                                                payroll,invoice_id,invoice_date,next_date,real_clockin,image_in,image_out,category,itemnumber,repeating,shifting_allocation,vehicle_option) 
                                                VALUES ('".$ln3["employeeid"]."','".$ln3["projectid"]."','".$ln3["clientid"]."','$sd','$sm','$sy','$sday','$sdate','$edate',
                                                '$ed','$em','$ey','$eday','0','1','".$ln3["color"]."','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
                                                '0','0','0','".$ln3["night"]."','".$ln3["address"]."','".$ln3["admin_note"]."','0','0','0','0','0','0','0',
                                                '".$ln3["category"]."','".$ln3["itemnumber"]."','".$ln3["repeating"]."','0','0')";
                                                if ($conn->query($sql) === TRUE) $tomtom=0;
                                            }
                                        }
                                    } }
                            
                                } }
                            echo"</tbody>
                        </table>";
                        
                        echo"<br><hr><br><form method='GET'>
                            <input type='hidden' value='".$_GET["repeating"]."' name='repeating'>
                            <input type='hidden' name='weekselect' value='".$_GET["weekselect"]."'>
                            <input type='hidden' name='ptype' value='".$_GET["ptype"]."'>
                            <input type='hidden' name='processthis' value='11'>
                            <input type='submit' value='Process Week Repeat Roster' class='btn btn-primary'></td>
                        </form>
                    </div>
                </div>";
            }
            
            if(isset($_GET["repeating"]) AND $_GET["repeating"]=="Fortnight Repeat"){
                
                echo"<div class='container'><center>
                    <div class='row' style='width:95%'>
                        <hr><h2>".$_GET["repeating"]."<br>Monday-$mon_date to Sunday-$sun_date</h2><hr>
                        <table style='width:100%'>
                            <thead><tr style='font-size:8pt'><th>employeeid</th><th>projectid</th><th>clientid</th><th>stime</th><th>etime</th><th>itemnumber</th><th>repeating</th></tr></thead>
                            <tbody>";
                                $wsp11 = "select * from project where status='1' order by id desc";
                                $wsp22 = $conn->query($wsp11);
                                if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                    
                                    $tid=0;
                                    // $ln1 = "select * from shifting_allocation where sdate>='$prestime' and sdate<='$preedate' and projectid='".$wsp33["id"]."' and itemnumber!='0' and employeeid!='0' and status='1' and repeating='Week Repeat' order by id asc";
                                    $ln1 = "select * from shifting_allocation where projectid='".$wsp33["id"]."' and itemnumber!='0' and employeeid!='0' and status='1' and repeating='Week Repeat' order by id asc";
                                    $ln2 = $conn->query($ln1);
                                    if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                    
                                        $tid=($tid+1);
                                        $sc1 = "select * from ndis_line_numbers where id='".$ln3["itemnumber"]."' order by id desc limit 1";
                                        $sc2 = $conn_main->query($sc1);
                                        if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                            $supportname=$sc3["item_name"];
                                            $supportlinenumber=$sc3["item_number"];
                                            $supportprice=$sc3["national"];
                                        } }
                                        
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
                                        
                                        echo"<tr style='font-size:8pt'>
                                            <td>".$ln3["employeeid"]."</td>
                                            <td>".$ln3["projectid"]."</td>
                                            <td>".$ln3["clientid"]."</td>
                                            <td style='color:red'><b>".$ln3["stime"]." TO $sday ($sd, $sm, $sy)</b></td>
                                            <td style='color:red'><b>".$ln3["etime"]." TO $eday ($ed, $em, $ey)</b></td>
                                            <td>$supportlinenumber</td>
                                            <td>".$ln3["repeating"]."</td>
                                        </tr>";
                                        /*
                                        if($_GET["processthis"]==11){
                                            if($ln3["stime"]!=$sday){
                                                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                                                edays,emonths,eyears,etime,accepted,status,color,clockin,clockout,clockin_request,clockout_request,total_hour,total_overtime,milage,
                                                latitude_in,longitude_in,latitude_out,longitude_out,activity_log,stime2,etime2,request2,wage_amt,overtime_amt,night,address,admin_note,
                                                payroll,invoice_id,invoice_date,next_date,real_clockin,image_in,image_out,category,itemnumber,repeating,shifting_allocation,vehicle_option) 
                                                VALUES ('".$ln3["employeeid"]."','".$ln3["projectid"]."','".$ln3["clientid"]."','$sd','$sm','$sy','$sday','$sdate','$edate',
                                                '$ed','$em','$ey','$eday','0','1','".$ln3["color"]."','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
                                                '0','0','0','".$ln3["night"]."','".$ln3["address"]."','".$ln3["admin_note"]."','0','0','0','0','0','0','0',
                                                '".$ln3["category"]."','".$ln3["itemnumber"]."','".$ln3["repeating"]."','0','0')";
                                                if ($conn->query($sql) === TRUE) $tomtom=0;
                                            }
                                        }
                                        */
                                    } }
                            
                                } }
                            echo"</tbody>
                        </table>";
                        
                        echo"<br><hr><br><form method='GET'>
                            <input type='hidden' value='".$_GET["repeating"]."' name='repeating'>
                            <input type='hidden' name='weekselect' value='".$_GET["weekselect"]."'>
                            <input type='hidden' name='ptype' value='".$_GET["ptype"]."'>
                            <input type='hidden' name='processthis' value='11'>
                            <input type='submit' value='Process Forthnight Repeat Roster' class='btn btn-primary'></td>
                        </form>
                    </div>
                </div>";
            }
            
            if(isset($_GET["repeating"]) AND $_GET["repeating"]=="Month Repeat"){
                
                $start_month = $_GET["monthselect"];
                // $end_month = date("Y-m", strtotime($start_month . "-01 +1 month"));
                
                echo"<div class='container'><center>
                    <div class='row' style='width:95%'>
                        <hr><h2>".$_GET["repeating"]."<br>$start_month to $end_month</h2><hr>
                        <table style='width:100%'>
                            <thead><tr style='font-size:8pt'><th>employeeid</th><th>projectid</th><th>clientid</th><th>stime</th><th>etime</th><th>itemnumber</th><th>repeating</th></tr></thead>
                            <tbody>";
                            
                                $wsp11 = "select * from project where status='1' order by id desc";
                                $wsp22 = $conn->query($wsp11);
                                if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                    
                                    $tid=0;
                                    // $ln1 = "select * from shifting_allocation where sdate>='$prestime' and sdate<='$preedate' and projectid='".$wsp33["id"]."' and itemnumber!='0' and employeeid!='0' and status='1' and repeating='Month Repeat' order by id asc";
                                    $ln1 = "select * from shifting_allocation where projectid='".$wsp33["id"]."' and itemnumber!='0' and employeeid!='0' and status='1' and repeating='Month Repeat' order by id asc";
                                    $ln2 = $conn->query($ln1);
                                    if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                    
                                        $tid=($tid+1);
                                        $sc1 = "select * from ndis_line_numbers where id='".$ln3["itemnumber"]."' order by id desc limit 1";
                                        $sc2 = $conn_main->query($sc1);
                                        if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                            $supportname=$sc3["item_name"];
                                            $supportlinenumber=$sc3["item_number"];
                                            $supportprice=$sc3["national"];
                                        } }
                                        
                                        $sday = date("l", strtotime($ln3["stime"]));
                                        $eday = date("l", strtotime($ln3["etime"]));
                                        
                                        $stime = date("-d H:i:s", strtotime($ln3["stime"]));
                                        $etime = date("-d H:i:s", strtotime($ln3["etime"]));
                                        
                                        $sday="$start_month$stime";
                                        $eday="$start_month$etime";
                                        
                                        $sd = date("d", strtotime($sday));
                                        $sm = date("m", strtotime($sday));
                                        $sy = date("Y", strtotime($sday));
                                        
                                        $ed = date("d", strtotime($eday));
                                        $em = date("m", strtotime($eday));
                                        $ey = date("Y", strtotime($eday));
                                        
                                        $sdate=strtotime($sday);
                                        $edate=strtotime($eday);
                                        
                                        echo"<tr style='font-size:8pt'>
                                            <td>".$ln3["employeeid"]."</td>
                                            <td>".$ln3["projectid"]."</td>
                                            <td>".$ln3["clientid"]."</td>
                                            <td style='color:red'><b>".$ln3["stime"]." TO $sday ($sd, $sm, $sy)</b></td>
                                            <td style='color:red'><b>".$ln3["etime"]." TO $eday ($ed, $em, $ey)</b></td>
                                            <td>$supportlinenumber</td>
                                            <td>".$ln3["repeating"]."</td>
                                        </tr>";
                                        
                                        if($_GET["processthis"]==11){
                                            if($ln3["stime"]!=$sday){
                                                $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,sdate,edate,
                                                edays,emonths,eyears,etime,accepted,status,color,clockin,clockout,clockin_request,clockout_request,total_hour,total_overtime,milage,
                                                latitude_in,longitude_in,latitude_out,longitude_out,activity_log,stime2,etime2,request2,wage_amt,overtime_amt,night,address,admin_note,
                                                payroll,invoice_id,invoice_date,next_date,real_clockin,image_in,image_out,category,itemnumber,repeating,shifting_allocation,vehicle_option) 
                                                VALUES ('".$ln3["employeeid"]."','".$ln3["projectid"]."','".$ln3["clientid"]."','$sd','$sm','$sy','$sday','$sdate','$edate',
                                                '$ed','$em','$ey','$eday','0','1','".$ln3["color"]."','0','0','0','0','0','0','0','0','0','0','0','0','0','0',
                                                '0','0','0','".$ln3["night"]."','".$ln3["address"]."','".$ln3["admin_note"]."','0','0','0','0','0','0','0',
                                                '".$ln3["category"]."','".$ln3["itemnumber"]."','".$ln3["repeating"]."','0','0')";
                                                if ($conn->query($sql) === TRUE) $tomtom=0;
                                            }
                                        }
                                        
                                    } }
                            
                                } }
                            
                            echo"</tbody>
                        </table>";
                        
                        echo"<br><hr><br><form method='GET'>
                            <input type='hidden' value='".$_GET["repeating"]."' name='repeating'>
                            <input type='hidden' name='monthselect' value='".$_GET["weekselect"]."'>
                            <input type='hidden' name='ptype' value='".$_GET["ptype"]."'>
                            <input type='hidden' name='processthis' value='11'>
                            <input type='submit' value='Process Month Repeat Roster' class='btn btn-primary'></td>
                        </form>
                    </div>
                </div>";
            }
            
            include('scripts.php');
            
            ?><script>
                // Wait until DOM is fully loaded
                window.addEventListener('DOMContentLoaded', () => {
                    document.body.classList.add('fade-in-loaded');
                });
            </script>
            <script>
                // Function to calculate week number
                function getWeekNumber(date) {
                    const startDate = new Date(date.getFullYear(), 0, 1);
                    const dayOfYear = Math.floor((date - startDate) / (24 * 60 * 60 * 1000)) + 1;
                    return Math.ceil(dayOfYear / 7);
                }
        
                // Get the current week based on Australian timezone
                function getCurrentWeekInAustralia() {
                    const australianDate = new Date(new Date().toLocaleString('en-US', { timeZone: 'Australia/Sydney' }));
                    const weekNumber = getWeekNumber(australianDate);
                    const year = australianDate.getFullYear();
                    return `${year}-W${weekNumber.toString().padStart(2, '0')}`;
                }
        
                // Get the next week based on Australian timezone
                function getNextWeekInAustralia() {
                    const australianDate = new Date(new Date().toLocaleString('en-US', { timeZone: 'Australia/Sydney' }));
                    // Move forward 7 days
                    australianDate.setDate(australianDate.getDate() + 7);
                    const weekNumber = getWeekNumber(australianDate);
                    const year = australianDate.getFullYear();
                    return `${year}-W${weekNumber.toString().padStart(2, '0')}`;
                }
        
                // Set the current and next week values for Australian time zone
                document.getElementById('weekfrom').value = getCurrentWeekInAustralia();
                document.getElementById('weekto').value = getNextWeekInAustralia();
            </script>
            
            <?php
            
        echo"</body>
    </html>";
?>