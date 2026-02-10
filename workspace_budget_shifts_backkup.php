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
            $nextmonth = date('F', strtotime('+1 month'));
            
            echo"
            <div class='row'>
                <div class='col-12 col-md-3'>
                    <h2>Weekly Repeat</h2>
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
                </div>
                
                <div class='col-12 col-md-5'>
                    <h2>Forthnight Repeat</h2>
                    <form method='GET'><table style='width:100%;padding:10px'><tr style='font-size:12pt'>
                        <td>
                            <input type='date' class='form-control' id='fortnight_start' name='fortnight_start' value='$nextmonday' style='width:150px'>
                        </td><td>    
                            <input type='date' class='form-control' id='fortnight_end' name='fortnight_end' readonly style='width:150px'>
                        </td>
                            
                        </td>
                        <td style='width:5%'>
                            <input type=hidden value='0' name='ptype'>
                            <input type=hidden value='Week Repeat' name='repeating'>
                            <input type='hidden' name='processthis' value='1'>
                            <input type='submit' value='Show Forthnight' class='btn btn-warning'>
                        </td>
                    </tr></table></form>";
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
                    <form method='GET'><table style='width:100%'><tr style='font-size:12pt'>
                        <td>
                            <input type='month' class='form-control' name='weekselect' value='$nextmonth' >
                            <input type=hidden value='0' name='ptype'>
                            <input type=hidden value='Month Repeat' name='repeating'>
                        </td>
                        <td style='width:5%'>
                            <input type='hidden' name='processthis' value='1'><input type='submit' value='Show Month' class='btn btn-danger'>
                        </td>
                    </tr></table></form>
                </div>
            </row>";
            
            if(isset($_GET["repeating"]) && $_GET["repeating"]=="Week Repeat"){
                
                $selectedweek = $_GET["weekselect"];
                $mon_date = date('Y-m-d', strtotime($selectedweek . '-1'));
                $sun_date = date('Y-m-d', strtotime($selectedweek . '-7'));
                    
                $CustomStartDate = new DateTime("$mon_date");
                $CustomEndDate = new DateTime("$sun_date");
                    
                if(isset($_GET["processthis"]) && isset($_GET["pid"])){
                    
                    echo"Next Rostering Week is Monday-$mon_date to Friday-$sun_date .<hr>";
                    
                    echo"<table style='width:100%'>
                        <thead>
                            <tr style='font-size:8pt'><th>Date</th><th>P.Name</th><th>Item Number</th><th>S.Worker</th><th>Category</th><th>Repeating</th><th>Clock-IN</th><th>Clock-OUT</th><th>Night</th></tr>
                        </thead>
                        <tbody>";
                            $wsp11 = "select * from project where status='1' order by id desc";
                            $wsp22 = $conn->query($wsp11);
                            if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                
                                $tid=0;
                                $ln1 = "select * from project_team_allocation where projectid='".$wsp33["id"]."' and item_number!='0' and employeeid!='0' and status='1' and repeating='Week Repeat' order by id asc";
                                $ln2 = $conn->query($ln1);
                                if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                
                                    $tid=($tid+1);
                                    $sc1 = "select * from ndis_line_numbers where id='".$ln3["item_number"]."' order by id desc limit 1";
                                    $sc2 = $conn_main->query($sc1);
                                    if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                        $supportname=$sc3["item_name"];
                                        $supportlinenumber=$sc3["item_number"];
                                        $supportprice=$sc3["national"];
                                    } }
                                    
                                    $hd1=0;
                                    $holidaytext="Holidays on";
                                    $sc11 = "select * from leave_holidays where status='ON' order by id asc";
                                    $sc22 = $conn->query($sc11);
                                    if ($sc22->num_rows > 0) { while($sc33 = $sc22 -> fetch_assoc()) {
                                        if($sc33["startdate"]>=$wsp33["budget_date"] && $sc33["startdate"]<=$wsp33["budget_close_date"]){
                                            if($sc33["enddate"]>=$wsp33["budget_date"] && $sc33["enddate"]<=$wsp33["budget_close_date"]){
                                                $diffInSecondsz = abs($sc33["startdate"] - $sc33["enddate"]);
                                                $tdaysz = floor($diffInSecondsz / (60 * 60 * 24));
                                                if($tdaysz<=0) $tdaysz=1;
                                                $hd1=($hd1+$tdaysz);
                                                $holidaytext="$holidaytext, ".$sc33["holidayname"]."";
                                            }
                                        }
                                    } }
                                    
                                    if($ln3["time1"]==0) $tm1="08:00";
                                    else $tm1=$ln3["time1"];
                                    
                                    $tm1x="08:00";
                                    $tm1x = strtotime($tm1);
                                    if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                    else $tm2=$ln3["time2"];
                                    
                                    // Updating Budget Catagory and Amount...
                                    $wd=0;
                                    if($ln3["mon"]==1) $wd=($wd+4);
                                    if($ln3["tue"]==1) $wd=($wd+4);
                                    if($ln3["wed"]==1) $wd=($wd+4);
                                    if($ln3["thu"]==1) $wd=($wd+4);
                                    if($ln3["fri"]==1) $wd=($wd+4);
                                    if($ln3["sat"]==1) $wd=($wd+4);
                                    if($ln3["sun"]==1) $wd=($wd+4);
                                    if($ln3["evening"]==1) $wd=($wd+4);
                                    if($ln3["night"]==1) $wd=($wd+4);
                                    
                                    if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                                                                    
                                    $wd=($wd*12);
                                    $wd=($wd-$hd1);
                                    if($wd<=0) $wd=0;
                                                                    
                                    $totalamount=0;
                                    $totalamount=($ln3["qty1"]*$wd);
                                    $totalamount=($totalamount*$ln3["rate1"]);
                    
                                    // Adding Service Agreement Line Numbers with Rate.
                                    $weekdays="- ";
                                    if($ln3["mon"]==1) $weekdays="- Monday";
                                    if($ln3["tue"]==1) $weekdays="$weekdays - Tuesday";
                                    if($ln3["wed"]==1) $weekdays="$weekdays - Wednesday";
                                    if($ln3["thu"]==1) $weekdays="$weekdays - Thursday";
                                    if($ln3["fri"]==1) $weekdays="$weekdays - Friday";
                                    if($ln3["sat"]==1) $weekdays="$weekdays - Saturday";
                                    if($ln3["sun"]==1) $weekdays="$weekdays - Sunday";
                                    if($ln3["evening"]==1) $weekdays="$weekdays - Nightshift";
                                    
                                    $supportname="$supportname $weekdays";
                                    
                                    
                                    // Creating shift if not exist
                                    /*
                                    if($ln3["mon"]==1){ 
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','MONDAY','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    if($ln3["tue"]==1){ 
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','TUESDAY','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    if($ln3["wed"]==1){ 
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','WEDNESDAY','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    if($ln3["thu"]==1){ 
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','THURSDAY','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    if($ln3["fri"]==1){ 
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','FRIDAY','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    
                                    if($ln3["sun"]==1){ 
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKEND','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','SUNDAY','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    
                                    if($ln3["sat"]==1){ 
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKEND','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','SATURDAY','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    
                                    if($ln3["evening"]==1){
                                        $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                        VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','1','NIGHTSHIFT','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','NIGHTSHIFT','".$ln3["employeeid"]."')";
                                        if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    
                                    if($ln3["night"]==1){
                                    //    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                                    //    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','1','NIGHTSHIFT','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','NIGHTSHIFT','".$ln3["employeeid"]."')";
                                    /    if ($conn->query($sql) === TRUE) $tomtom=0;
                                    }
                                    */
                                    
                                    $employeeid=$ln3["employeeid"];
                                    $projectid=$ln3["projectid"];
                                    $projectname=$wsp33["name"];
                                    $clientid=$wsp33["clientid"];
                                    $color=$wsp33["color"];
                                    
                                    $sx1 = "select * from uerp_user where id='$employeeid' order by id asc limit 1";
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
                                    
                                    $sx2 = "select * from uerp_user where id='$clientid' order by id asc limit 1";
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
                                    
                                    $budgetstartdate=date("Y-m-d", $wsp33["budget_date"]);
                                    $budgetclosedate=date("Y-m-d", $wsp33["budget_close_date"]);
                                    $startDate1 = new DateTime("$budgetstartdate");
                                    $endDate1 = new DateTime("$budgetclosedate");
                                    
                                    $employeeid=$ln3["employeeid"];
                                    $projectid=$ln3["projectid"];
                                    $clientid=$wsp33["clientid"];
                                    $color=$wsp33["color"];
                                    
                                    $category=$ln3["category"];
                                    $repeating=$ln3["repeating"];
                                    
                                    if($ln3["night"]==1) $nightshift="NightShift";
                                    else $nightshift="";
                                    
                                    // echo"<hr>$repeating<hr>";
                                    
                                    if($ln3["mon"]==1){
                                        $firstMonday = clone $CustomStartDate;
                                        if ($firstMonday->format('N') != 1) {
                                            $firstMonday->modify('next monday');
                                        }
                                        $mondays = []; // Loop through all Mondays between start and end date
                                        while ($firstMonday <= $CustomEndDate) {
                                            $mondays[] = $firstMonday->format('Y-m-d');
                                            $firstMonday->modify('+1 week');
                                        }
                                        $tx=0;
                                        foreach ($mondays as $date) {
                                            $stime="$date $tm1";
                                            $etime="$date $tm2";
                                            $sdate=strtotime($stime);
                                            $edate=strtotime($etime);
                                            $year1 = date("Y",$sdate);
                                            $month1 = date("m",$sdate);
                                            $day1 = date("d",$sdate);
                                            $tx=($tx+1);
                                            if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (MONDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                                
                                            }
                                            if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (MONDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (MONDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                        }
                                    }
                                    
                                    echo"";
                                    if($ln3["tue"]==1){
                                        $firstTuesday = clone $CustomStartDate;
                                        if ($firstTuesday->format('N') != 2) { // 2 = Tuesday
                                            $firstTuesday->modify('next tuesday');
                                        }
                                        $tuesdays = [];
                                        while ($firstTuesday <= $CustomEndDate) {
                                            $tuesdays[] = $firstTuesday->format('Y-m-d');
                                            $firstTuesday->modify('+1 week');
                                        }
                                        $tx=0;
                                        foreach ($tuesdays as $date) {
                                            $stime="$date $tm1";
                                            $etime="$date $tm2";
                                            $sdate=strtotime($stime);
                                            $edate=strtotime($etime);
                                            $year1 = date("Y",$sdate);
                                            $month1 = date("m",$sdate);
                                            $day1 = date("d",$sdate);
                                            $tx=($tx+1);
                                            if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (TUESDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (TUESDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (TUESDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                        }
                                    }
                                    
                                    echo"";
                                    if($ln3["wed"]==1){
                                        $firstWednesday = clone $CustomStartDate;
                                        if ($firstWednesday->format('N') != 3) { // 3 = Wednesday
                                            $firstWednesday->modify('next wednesday');
                                        }
                                        $wednesdays = [];
                                        while ($firstWednesday <= $CustomEndDate) {
                                            $wednesdays[] = $firstWednesday->format('Y-m-d');
                                            $firstWednesday->modify('+1 week');
                                        }
                                        $tx=0;
                                        foreach ($wednesdays as $date) {
                                            $stime="$date $tm1";
                                            $etime="$date $tm2";
                                            $sdate=strtotime($stime);
                                            $edate=strtotime($etime);
                                            $year1 = date("Y",$sdate);
                                            $month1 = date("m",$sdate);
                                            $day1 = date("d",$sdate);
                                            $tx=($tx+1);
                                            if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (WEDNESDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (WEDNESDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (WEDNESDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                        }
                                    }
                                    
                                    echo"";
                                    if($ln3["thu"]==1){
                                        $firstThursday = clone $CustomStartDate;
                                        if ($firstThursday->format('N') != 4) { // 4 = Thursday
                                            $firstThursday->modify('next thursday');
                                        }
                                        $thursdays = [];
                                        while ($firstThursday <= $CustomEndDate) {
                                            $thursdays[] = $firstThursday->format('Y-m-d');
                                            $firstThursday->modify('+1 week');
                                        }
                                        $tx=0;
                                        foreach ($thursdays as $date) {
                                            $stime="$date $tm1";
                                            $etime="$date $tm2";
                                            $sdate=strtotime($stime);
                                            $edate=strtotime($etime);
                                            $year1 = date("Y",$sdate);
                                            $month1 = date("m",$sdate);
                                            $day1 = date("d",$sdate);
                                            $tx=($tx+1);
                                            if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (THURSDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (THURSDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (THURSDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                        }
                                    }
                                    
                                    echo"";
                                    if($ln3["fri"]==1){
                                        $firstFriday = clone $CustomStartDate;
                                        if ($firstFriday->format('N') != 5) { // 5 = Friday
                                            $firstFriday->modify('next friday');
                                        }
                                        $fridays = [];
                                        while ($firstFriday <= $CustomEndDate) {
                                            $fridays[] = $firstFriday->format('Y-m-d');
                                            $firstFriday->modify('+1 week');
                                        }
                                        $tx=0;
                                        foreach ($fridays as $date) {
                                            $stime="$date $tm1";
                                            $etime="$date $tm2";
                                            $sdate=strtotime($stime);
                                            $edate=strtotime($etime);
                                            $year1 = date("Y",$sdate);
                                            $month1 = date("m",$sdate);
                                            $day1 = date("d",$sdate);
                                            $tx=($tx+1);
                                            if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES  ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (FRIDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES  ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (FRIDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES  ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (FRIDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                        }
                                    }
                                    
                                    echo"";
                                    if($ln3["sat"]==1){
                                        $firstSaturday = clone $CustomStartDate;
                                        if ($firstSaturday->format('N') != 6) { // 6 = Saturday
                                            $firstSaturday->modify('next saturday');
                                        }
                                        $saturdays = [];
                                        while ($firstSaturday <= $CustomEndDate) {
                                            $saturdays[] = $firstSaturday->format('Y-m-d');
                                            $firstSaturday->modify('+1 week');
                                        }
                                        $tx=0;
                                        foreach ($saturdays as $date) {
                                            $stime="$date $tm1";
                                            $etime="$date $tm2";
                                            $sdate=strtotime($stime);
                                            $edate=strtotime($etime);
                                            $year1 = date("Y",$sdate);
                                            $month1 = date("m",$sdate);
                                            $day1 = date("d",$sdate);
                                            $tx=($tx+1);
                                            if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (SATURDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (SATURDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            
                                            if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (SATURDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                        }
                                    }
                                    
                                    echo"";
                                    if($ln3["sun"]==1){
                                        $firstSunday = clone $CustomStartDate;
                                        if ($firstSunday->format('N') != 7) { // 7 = Sunday
                                            $firstSunday->modify('next sunday');
                                        }
                                        $sundays = [];
                                        while ($firstSunday <= $CustomEndDate) {
                                            $sundays[] = $firstSunday->format('Y-m-d');
                                            $firstSunday->modify('+1 week');
                                        }
                                        $tx=0;
                                        foreach ($sundays as $date) {
                                            $stime="$date $tm1";
                                            $etime="$date $tm2";
                                            $sdate=strtotime($stime);
                                            $edate=strtotime($etime);
                                            $year1 = date("Y",$sdate);
                                            $month1 = date("m",$sdate);
                                            $day1 = date("d",$sdate);
                                            $tx=($tx+1);
                                            if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (SUNDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (SUNDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                                                // $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                                                // if ($conn->query($sql) === TRUE) $tomtom=0;
                                                echo"<tr style='font-size:8pt'><td>$date</td><td>$projectname</td><td>$supportlinenumber<br>$supportname</td><td>$employeename</td><td>$category</td><td>$repeating (SUNDAY)</td><td>$tm1</td><td>$tm2</td><td>$nightshift</td></tr>";
                                            }
                                            
                                        }
                                    }
                                    
                                } }
                    
                            } }
                        echo"</tbody>
                    </table>";
                    
                    
                    echo"<br><hr><br><form method='GET'>
                        <input type='text' value='".$_GET["repeating"]."' name='repeating'>
                        <input type='text' name='weekselect' value='".$_GET["weekselect"]."'>
                        <input type='text' name='ptype' value='".$_GET["ptype"]."'>
                        <input type='text' name='processthis' value='1'>
                        <input type='submit' value='Process Repeating Roster' class='btn btn-primary'></td>
                    </form>";
                }
            }
            
            if(isset($_GET["repeating"]) && $_GET["repeating"]=="Forthnight Repeat"){
                
            }
            
            if(isset($_GET["repeating"]) && $_GET["repeating"]=="Month Repeat"){
                
            }
            
            
            include('scripts.php');
            
            ?><script>
                // Wait until DOM is fully loaded
                window.addEventListener('DOMContentLoaded', () => {
                    document.body.classList.add('fade-in-loaded');
                });
            </script><?php
            
        echo"</body>
    </html>";
?>