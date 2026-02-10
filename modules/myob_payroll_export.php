<?php
    include '../include.php';
    
    date_default_timezone_set("Australia/Melbourne");
    
    $todaydate=time();
    
    if(isset($_COOKIE["shiftingid2"])) $todaydate1=$_COOKIE["shiftingid2"];
    else $todaydate1=date("Y-m-d", $todaydate);
    if(isset($_COOKIE["shiftingid3"])) $todaydate2=$_COOKIE["shiftingid3"];  
    else $todaydate2=date("Y-m-d", $todaydate);
    
    // $todaydate2=date("Y-m-d", $todaydate);
    $todayx=strtotime($todaydate1);
    $todayy=strtotime($todaydate2);
    
    $d1= date("d", $todayx);
    $m1= date("m", $todayx);
    $y1= date("Y", $todayx);
    $d2= date("d", $todayy);
    $m2= date("m", $todayy);
    $y2= date("Y", $todayy);
    
    $todayz=time();
    $todayz=date("d-m-Y", $todayz);

    $todayx=strtotime($todaydate1);
    $todayy=strtotime($todaydate2);
    
    $d1p= date("d", $todayx);
    $m1p= date("m", $todayx);
    $y1p= date("Y", $todayx);
    $d2p= date("d", $todayy);
    $m2p= date("m", $todayy);
    $y2p= date("Y", $todayy);
    
    $netpayablep=0;
    $totalworked1p=0;
    $totalworked2p=0;
    $totalovertime1p=0;
    $totalovertime2p=0;
    
    $todayzz=date("d-m-Y 23:50", $todayy);
    $todayy2=strtotime($todayzz);
    $tp=0;
    
    $employeeid=$_GET["src_employeeid"];
    $randid=time();
    $filenamex="$employeeid-$randid";
    
    $toto1=date("Y-m-d", $todayx);
    $toto2=date("Y-m-d", $todayy2);
    
    // echo"<script>alert('$employeeid, $toto1, $toto2')</script>";
    
    if($employeeid=="ALL"){
        $r5ap = "select * from shifting_allocation where sdate>='$todayx' and sdate<='$todayy2' and status='1' and ignored='0' order by sdate asc";
    }else{
        $r5ap = "select * from shifting_allocation where employeeid='$employeeid' and sdate>='$todayx' and sdate<='$todayy2' and status='1' and ignored='0' order by sdate asc";
    }
    $r5bp = $conn->query($r5ap);
    if ($r5bp->num_rows > 0) {
        
        // DELETE PREVIOUS FILES AND OPENING NEW TEXT FILE FOR MYOB PAYROLL
        $directory = '../media/myob';
        
        // Check if the directory exists
        if (is_dir($directory)) {
            $now = time();
            $txtFiles = glob($directory . '/*.txt');
            foreach ($txtFiles as $file) {
                // Check if it's a file and older than 15 minutes or 900 seconds
                if (is_file($file) && ($now - filemtime($file)) > 900) {
                    if (unlink($file)) {
                        // echo "Deleted: $file<br>";
                    } else {
                        //echo "Failed to delete: $file<br>";
                    }
                }
            }
        } else {
            // echo "Directory does not exist.";
        }
        
        $file = fopen("../media/myob/PAYROLL-$filenamex.txt", "w");
        $headers = "Employee Co./Last Name,Employee First Name,Payroll Category,Job,Customer Co./Last Name,Customer First Name,Notes,Date,Units,Employee Card ID,Employee Record ID,Start/Stop Time,Customer Card ID,Customer Record ID\n";
        fwrite($file, $headers);
        
        while($r5cp = $r5bp -> fetch_assoc()) {
            
            $employeefirstname="";
            $employeelastname="";
            $r1x = "select * from uerp_user where id='".$r5cp['employeeid']."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                $employeefirstname=$r1z["username"];
                $employeelastname=$r1z["username2"];
                $employeename="$employeename1 $employeename2"; 
                $employeeaddress="".$r1z["address"].", ".$r1z["city"].",<br>".$r1z["area"].", ".$r1z["zip"].", ".$r1z["country"]."";
                $employeephone=$r1z["phone"];
                $wageamt=$r1z["reg_amt"];
                $employeeabn=$r1z["abn"];
                $schads_status=$r1z["schads_status"];
                $schads_level=$r1z["schads_level"];
                $schads_paypoint=$r1z["schads_paypoint"];
                
                if(strlen($r1z["application_id"])<=1) $employee_card_id="".$r1z["ndis"]."-$employeefirstname $employeelasttname";
                else $employee_card_id=$r1z["application_id"];
            } }
            
            $clientfirstname="";
            $clientlastname="";
            $r1x = "select * from uerp_user where id='".$r5cp['clientid']."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1zx = $r1y -> fetch_assoc()) {
                $clientfirstname=$r1zx["username"];
                $clientlastname=$r1zx["username2"];
                
                if(strlen($r1zx["application_id"])<=1) $client_card_id="".$r1zx["ndis"]."-$clientfirstname $clientlastname";
                else $client_card_id=$r1zx["application_id"];
                
                $clientid=$r1zx["id"];
            } }
            
            
            if(strlen($r5cp['stime'])>=5) $stimezp=$r5cp['stime'];
            else $stimezp=0;
                            
            if(strlen($r5cp['etime'])>=5) $etimezp=$r5cp['etime'];
            else $etimezp=0;
                            
            $stimeXp=substr($stimezp,11,5);
            $etimeXp=substr($etimezp,11,5);
            
            $stimeX1p=""; $stimeX2p=""; $sstatXp="";
            $etimeX1p=""; $etimeX2p=""; $estatXp="";
            $stimeX1p=substr($stimezp,11,2);
            $stimeX2p=substr($stimezp,14,2);
            
            if($stimeX1p>=13){
                $stimeX1p=($stimeX1p-12);
                if($stimeX1p<="9") $stimeX1p="0$stimeX1p";
                $sstatXp="PM";
            }else{
                $sstatXp="AM";
            }
        
            $etimeX1p=substr($etimezp,11,2);
            $etimeX2p=substr($etimezp,14,2);
            if($etimeX1p>=13){
                $etimeX1p=($etimeX1p-12);
                if($etimeX1p<="9") $etimeX1p="0$etimeX1p";
                $estatXp="PM";
            }else{
                $estatXp="AM";
            }
            
            $stimep=strtotime($stimezp);
            $sdayp=date("l", $stimep);
            $sdatep=date("d/m/Y", $stimep);
            $stimep=date("H:i", $stimep);
            
            $etimep=strtotime($etimezp);
            $etimep=date("H:i", $etimep);
            
            if(strlen($r5cp["clockin"])>=5) $clockinp=date("h:i a", $r5cp["clockin"]);
            else $clockinp="-"; 
            if(strlen($r5cp["clockout"])>=5) $clockoutp=date("h:i a", $r5cp['clockout']);
            else $clockoutp="-";
            
            $clockoutxp=0; 
            $totalkmp=0;
                                
            if(strlen($r5cp["clockin"])>=5 AND strlen($r5cp["clockout"])>=5){
                $enddatep=0;
                $cinoutp=0;
                $cin1p=date("H", $r5cp["clockin"]);
                $cout1p=date("H", $r5cp["clockout"]);
                $cinoutp=($cin1p-$cout1p);
                if($cinoutp>=1) $enddatep=strtotime("24 hours", $r5cp["clockout"]);
                else $enddatep=$r5cp["clockout"];
                
                $clockin2p=date("Y-m-d h:i:s a", $r5cp["clockin"]);
                $clockout2p=date("Y-m-d h:i:s a", $enddatep);
                
                $date1p=date_create("$clockout2p");
                $date2p=date_create("$clockin2p");
                $diff1p=date_diff($date1p,$date2p);
                                        
                $total_hour_workedp=0;
                // $total_hour_workedp= $diff1p->format("%H:%I");
                
                if($r5cp["night"]==1) $total_hour_workedp= "1:00";
                else $total_hour_workedp= $diff1p->format("%h.%i");
                
                if($total_hour_workedp<=0) $total_hour_workedp="00";
                
                $enddate2p=0;
                $cinout2p=0;
                $cin2p=substr($stimezp,11,2);
                $cout2p=substr($etimezp,11,2);
                $cinout2p=($cin2p-$cout2p);
                $etime2p=strtotime($etimezp);
                if($cinout2p>=0){
                    $enddate2p=strtotime("24 hours", $etime2);
                    $enddate2p=date("Y-m-d H:i", $enddate2);
                }else $enddate2=$etimezp;
                                
                $date3p=date_create($etimezp);
                $date4p=date_create($stimezp);
                $diff2p=date_diff($date3p,$date4p);
                $shift_totalp= $diff2p->format("%H:%I");
                // $total_overtime=($total_hour_worked-$shift_total);
                $total_overtimep=$r5cp["total_overtime"];
                                    
                if($total_overtimep<=0) $total_overtimep=00;
                
                $totalkmp=($totalkmp+$r5cp["milage"]);
                
            }else{
                $total_hour_workedp=0;
                $shift_totalp=0;
                $total_overtimep=0;
                
            }
            
            $z1 = "select * from award_rates where level='$schads_level' and pay_point='$schads_paypoint' and employment_type='$schads_status' order by id asc limit 1";
            $z2 = $conn->query($z1);
            if ($z2->num_rows > 0) { while($z3 = $z2 -> fetch_assoc()) {
                $id=$z3["id"];
                $stream=$z3["stream"];
                $level_group=$z3["level_group"];
                $level=$z3["level"];
                $pay_point=$z3["pay_point"];
                $employment_type=$z3["employment_type"];
                $effective_from=$z3["effective_from"];
                $weekday_rate=$z3["weekday_rate"];
                $saturday_rate=$z3["saturday_rate"];
                $sunday_rate=$z3["sunday_rate"];
                $public_holiday_rate=$z3["public_holiday_rate"];
                $afternoon_shift_rate=$z3["afternoon_shift_rate"];
                $night_shift_rate=$z3["night_shift_rate"];
                $night_shift_rate2=$z3["night_shift_rate_fixed"];
                $overtime_first_block_rate=$z3["overtime_first_block_rate"];
                $overtime_after_block_rate=$z3["overtime_after_block_rate"];
                $overtime_public_holiday_rate=$z3["overtime_public_holiday_rate"];
                $overtime_block_definition=$z3["overtime_block_definition"];
            } }
            
            $wageamount=0;
            $cin2x = (int)$cin2p;
            $cout2x = (int)$cout2p;
            if($cout2x==0) $cout2x=24;
            
            if($sdayp=="Monday" ||$sdayp=="Tuesday" ||$sdayp=="Wednesday" ||$sdayp=="Thursday" ||$sdayp=="Friday"){
                if ($cin2x >= 6) { $wageamount=$weekday_rate; }
                if ($cin2x >= 20) { $wageamount=$afternoon_shift_rate; }
                if ($cin2x >= 24) { $shift = $wageamount=$night_shift_rate; }
                $tempclokout="Day Shift";
            }
            if($sdayp=="Saturday"){
                if ($cin2x >= 6) { $wageamount=$saturday_rate; }
                if ($cin2x >= 20) { $wageamount=$afternoon_shift_rate; }
                if ($cin2x >= 24) { $shift = $wageamount=$night_shift_rate; }
                $tempclokout="Evening Shift";
            }
            if($sdayp=="Sunday"){
                if ($cin2x >= 6) { $wageamount=$sunday_rate; }
                if ($cin2x >= 20) { $wageamount=$afternoon_shift_rate; }
                if ($cin2x >= 24) { $shift = $wageamount=$night_shift_rate; }
                $tempclokout="Night Shift";
            }
                            
            if($r5c["night"]==1){
                $wageamount=$night_shift_rate2;
                $tempclokout="Sleepover";
            }
            
            if($r5cp["overtime_amt"]!=0) $overtimeamountp=$r5cp["overtime_amt"];
                            
            $totaworked=($total_hour_worked*$wageamount);
            $totaovertimep=($total_overtimep*$r5c["overtime_amt"]);
            
            $totaovertimep=($total_overtimep*$r5cp["overtime_amt"]);
            $valuepx=($totaworkedp+$totaovertimep);
                                        
            
            $totalworkedp=0;
            $totalovertimep=0;
            
            if($totaworkedp=="00" OR $totaworkedp=="" ) $totaworkedp=0;
            if($totaovertimep=="00" OR $totaovertimep=="" ) $totaovertimep=0;
                                
            $netpayablep=($netpayablep+$valuep);
            $totalkmxp=($totalkmxp+$totalkmp);
            
            $total_hour_worked_Hp=substr($total_hour_workedp,0,2);
            $total_hour_worked_Sp=substr($total_hour_workedp,3,2);
                            
            $totalworked1p=($totalworked1p+$total_hour_worked_Hp);
            if($totalworked1p<=9) $totalworked1p="0$totalworked1p";
            if($total_hour_worked_Sp=="00" OR $total_hour_worked_Sp=="" ) $total_hour_worked_Sp=0;
            
            
            $totalworked3p=($wageamount/60);
                            
            if($r5cp["night"]==1){
                $pb0p=$wageamount;
                $pb3p=($total_overtimep*$wageamount); 
                $pbp=($pb0p+$pb3p);
                $pb1p=0;
            }else{
                $pb0p=($total_hour_worked_Hp*$wageamount);
                $pb3p=($total_overtimep*$r5cp["overtime_amt"]); 
                $pbp=($pb0p+$pb3p);
                $pb1p=($totalworked3p*$total_hour_worked_Sp);
            }
            
            $pb2p=($pbp+$pb1p);
            
            $total_km_travelled=$r5cp["milage"];
            
            // echo"<script>alert('$wageamount, $cin2x, $cout2x')</script>";
            
            
            $job="";
            $r1xx = "select * from project where id='".$r5cp['projectid']."' order by id asc limit 1";
            $r1yy = $conn->query($r1xx);
            if ($r1yy->num_rows > 0) { while($r1zz = $r1yy -> fetch_assoc()) {
                $job=$r1zz["managed_by"];
                if($job=="PLAN Managed") $job="NDIS - PLAN Managed";
            } }
            
            
            if($pb2p>=1){
                $notes=" ";                                                                                                                                      
                $line = "$employeelastname,$employeefirstname,Base Hourly,$job,$clientlastname,$clientfirstname,$notes,$sdatep,$total_hour_workedp,$employee_card_id,$employeeid,$stimep,$client_card_id,$clientid\n";
                fwrite($file, $line);                                                                                                               
                $line2 = "$employeelastname,$employeefirstname,Travel Allowance,$job,$clientlastname,$clientfirstname,$notes,$sdatep,$total_km_travelled,$employee_card_id,$employeeid,$stimep,$client_card_id,$clientid\n";
                fwrite($file, $line2);
            }
        }
    }

    fclose($file);
    $filex = "../media/myob/PAYROLL-$filenamex.txt";
    if (file_exists($filex)) {
        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . basename($filex) . '"');
        header('Content-Length: ' . filesize($filex));
        readfile($filex);
        exit;
    }

    echo "Data File successfully created. Please click here to download: <a href='../media/myob/PAYROLL-$filenamex.txt'>Copy/Download Text File for MYOB</a>";

?>