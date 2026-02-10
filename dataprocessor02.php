<?php
    date_default_timezone_set("Australia/Melbourne");
    
    // error_reporting(0);
    include('include.php');
    $dbnamex=$_COOKIE['dbname'];
    
    // schedule by user
    if($_POST["processor"]=="shiftallocation"){
        
        if(!empty($_POST["employeeid"])){
            
            $employeeid=$_COOKIE["reid"];
            $projectid=$_POST["projectid"];
            $clientid=$_POST["clientid"];
            $days=$_COOKIE["rday"];
            $months=$_COOKIE["rmonth"];
            $years=$_COOKIE["ryear"];
            
            $stime="$years-$months-$days ".$_POST["stime"]."";
            $stime1 = substr($stime,0,10);
            $stime2 = substr($stime,11,5);
            $stime3 = str_replace("-", "", $stime1);
            $stime4 = str_replace(":", "", $stime2);
            $stimex = "".$stime3."T".$stime4."00Z";
            
            $etime="$years-$months-$days ".$_POST["etime"]."";
            $etime1 = substr($etime,0,10);
            $etime2 = substr($etime,11,5);
            $etime3 = str_replace("-", "", $etime1);
            $etime4 = str_replace(":", "", $etime2);
            $etimex = "".$etime3."T".$etime4."00Z";
            
            echo"<script>alert('Shift Allocated...')</script>";
            
            // echo"<script>alert('$employeeid, $projectid, $clientid, $stime, $etime')</script>";
            
            $sx1 = "select * from uerp_user where id='".$_COOKIE["reid"]."' order by id asc limit 1";
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
                
            $sx2 = "select * from uerp_user where id='".$_POST["clientid"]."' order by id asc limit 1";
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
            
            $sdate=strtotime($stime);
            $edate=strtotime($etime);
            
            if($_COOKIE["dbname"]=="saas_info_banglahosting_net"){
                $diffInSeconds = $edate - $sdate;
                $diffInHours = $diffInSeconds / 3600;
                
                $weekname = date('l', $sdate);
                if($weekname=="Monday"){
                    $monday1=$sdate;
                    $monday2 = $sdate + (7 * 24 * 60 * 60);
                    $sunday1 = $sdate + (6 * 24 * 60 * 60);
                }
                if($weekname=="Tuesday"){
                    $monday1 = $sdate - (1 * 24 * 60 * 60);
                    $monday2 = $sdate + (6 * 24 * 60 * 60);
                    $sunday1 = $sdate + (5 * 24 * 60 * 60);
                }
                if($weekname=="Wednesday"){
                    $monday1 = $sdate - (2 * 24 * 60 * 60);
                    $monday2 = $sdate + (5 * 24 * 60 * 60);
                    $sunday1 = $sdate + (4 * 24 * 60 * 60);
                }
                if($weekname=="Thursday"){
                    $monday1 = $sdate - (3 * 24 * 60 * 60);
                    $monday2 = $sdate + (4 * 24 * 60 * 60);
                    $sunday1 = $sdate + (3 * 24 * 60 * 60);
                }
                if($weekname=="Friday"){
                    $monday1 = $sdate - (4 * 24 * 60 * 60);
                    $monday2 = $sdate + (3 * 24 * 60 * 60);
                    $sunday1 = $sdate + (2 * 24 * 60 * 60);
                }
                if($weekname=="Saturday"){
                    $monday1 = $sdate - (5 * 24 * 60 * 60);
                    $monday2 = $sdate + (2 * 24 * 60 * 60);
                    $sunday1 = $sdate + (1 * 24 * 60 * 60);
                }
                if($weekname=="Sunday"){
                    $monday1 = $sdate - (6 * 24 * 60 * 60);
                    $monday2 = $sdate + (1 * 24 * 60 * 60);
                    $sunday1 = $sdate;
                }
    
                $invoice_date=0;
                $inv1 = "select * from ndis_invoices where received_from='".$_POST["clientid"]."' and projectid='".$_POST["projectid"]."' and paid='0' order by id desc limit 1";
                $inv11 = $conn->query($inv1);
                if ($inv11->num_rows > 0) { while($inv111 = $inv11->fetch_assoc()) {
                    $invoice_date=$inv111["receipt_date"];
                    $invoice_id=$inv111["id"];
                    $receipt_no=$inv111["receipt_no"];
                    $receipt_date=$inv111["receipt_date"];
                    $proj_id=$inv111["proj_id"];
                    $narration=$inv111["narration"];
                    $ledger_id=$inv111["ledger_id"];
                    $dr_amt=$inv111["dr_amt"];
                    $cr_amt=$inv111["cr_amt"];
                    $type=$inv111["type"];
                    $ledger_type=$inv111["ledger_type"];
                    $received_from=$inv111["received_from"];
                    $projectid=$inv111["projectid"];
                    $manual_receipt_no=$inv111["manual_receipt_no"];
                    $cc_code=$inv111["cc_code"];
                    $status=$inv111["status"];
                    $employeeid=$inv111["employeeid"];
                    $invoice_no=$inv111["invoice_no"];
                    $invoice_no2=$inv111["invoice_no2"];
                    $date_from=$inv111["date_from"];
                    $date_to=$inv111["date_to"];
                    $ndis_item=$inv111["ndis_item"];
                    $hours=$inv111["hours"];
                    $rate=$inv111["rate"];
                    $identifier=$inv111["identifier"];
                    $paid=$inv111["paid"];
                    $randomid=$inv111["randomid"];
                    $invoice_receiver=$inv111["invoice_receiver"];
                } }
                
                $n1 = "select * from ndis_line_numbers where id='".$_POST["linenumber"]."' order by id asc limit 1";
                $nn1 = $conn_main->query($n1);
                if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
                    $n_description=$nnn1["item_name"];
                    $n_itemnumber=$nnn1["item_number"];
                    $n_rate=$nnn1["national"];
                } }
                    
                $frequency=$diffInHours;
                $total_amount=($frequency*$n_rate);
                $identifier=0;
                    
                if($invoice_date==$monday2){
                    
                    // insert ndis invoice addon.
                    $nidx=0;
                    $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
                    employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid) 
                    VALUES ('$invoice_no','$sdate','$n_description on $weekname at $stime~$etime','800000032','2','2','".$_POST["clientid"]."','$ip','-','1',
                    '".$_COOKIE["reid"]."','$invoice_no','$monday1','$sunday1','$n_itemnumber','$frequency','$n_rate','0','$total_amount',
                    '$identifier','$invoice_no2','0','$invoice_id')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                    // Updating invoice addon
                    /*
                    $naid=0;
                    $na1 = "select * from ndis_invoices_addon where received_from='$received_from' and invoice_no='$invoice_no' and ndis_item='$n_itemnumber' and invoice_no2='$invoice_no2' order by id asc limit 1";
                    $na11 = $conn->query($na1);
                    if ($na11->num_rows > 0) { while($na111 = $na11->fetch_assoc()) {
                        $naid=$na111["id"];
                        $previous_hours=$na111["hours"];
                        $invoice_number1=$na111["invoice_no"];
                        $invoice_number2=$na111["invoice_no2"];
                        $nid=$na111["id"];
                    } }
                    
                    if($naid==0){
                        // insert ndis invoice addon.
                        $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
                        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid) 
                        VALUES ('$invoice_number','$invoice_number','$n_description','800000032','2','2','".$_POST["clientid"]."','$ip','-','1',
                        '".$_COOKIE["reid"]."','$invoice_number','$monday1','$sunday1','$n_itemnumber','$frequency','$n_rate','0','$total_amount',
                        '$identifier','$invoice_number2','0','$nid')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }else{
                        // update ndis invoice addon.
                        $finalhours=($frequency+$previous_hours);
                        $finalamount=($finalhours*$n_rate);
                        $sql="update ndis_invoices_addon set hours='$finalhours',cr_amt='$finalamount' where id='$naid'";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
                    */
                }else{
                    
                    // creating new invoice.
                    $invoice_no2x=0;
                    $invoice_nox=0;
                    $invoice_date=rand(13579,99999);
                    $invoice_number2="INV-".$_POST["clientid"]."-".$_POST["projectid"]."-$invoice_date";
                    $invoice_number=time();
                    $sql = "insert into ndis_invoices (ledger_id,received_from,employeeid,invoice_no2,receipt_date,date_from,date_to,invoice_no,projectid,paid) 
                    VALUES ('800000032','".$_POST["clientid"]."','".$_COOKIE["reid"]."','$invoice_number2','$monday2','$monday2','$monday2','$invoice_number','".$_POST["projectid"]."','0')";
                    if ($conn->query($sql) === TRUE){
                        $sysdate=time();
                        $ip=$_SERVER['REMOTE_ADDR'];
                        $nid=0;
                        $sx1 = "select * from ndis_invoices order by id desc limit 1";
                        $rx1 = $conn->query($sx1);
                        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $nid=$ry1["id"]; } }
                        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                        VALUES ('".$_COOKIE["userid"]."','0','0','NEW INVOICE TEMPLATE','0','$sysdate','$ip','1','New Invoice Tempate create.','0','$nid','ndis_invoices')";
                        if ($conn->query($sql1) === TRUE) $tomtom=0;
                        // echo"<script>alert('Invoice Template Created')</script>";
                        
                        // creating ndis invoice addon
                        $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
                        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid) 
                        VALUES ('$invoice_number','$invoice_number','$n_description on $weekname at $stime~$etime','800000032','2','2','".$_POST["clientid"]."','$ip','-','1',
                        '".$_COOKIE["reid"]."','$invoice_number','$monday1','$sunday1','$n_itemnumber','$frequency','$n_rate','1','$total_amount',
                        '$identifier','$invoice_number2','1','$nid')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
                }
            }
            
            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES 
            ('".$_COOKIE["reid"]."','".$_POST["projectid"]."','".$_POST["clientid"]."','".$_COOKIE["rday"]."','".$_COOKIE["rmonth"]."','".$_COOKIE["ryear"]."','$stime','".$_COOKIE["rday"]."','".$_COOKIE["rmonth"]."','".$_COOKIE["ryear"]."','$etime','0','1','".$_POST["pcolor"]."','$sdate','$edate','".$_POST["night"]."','".$_POST["linenumber"]."','".$_POST["category"]."','".$_POST["repeating"]."','".$_POST["note"]."','".$_POST["address"]."')";
            if ($conn->query($sql) === TRUE){
                
                // echo"<script>alert('New Project Created Successfully... 1')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','New Shift Allocated to <b>$employeename</b> for <b>$clientname</b> on Date: $stime1 from Time: $stime2 - $etime2','0','".$_COOKIE["userid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                // echo"<script>alert('Email Sent to User...')</script>";
                echo"<form name='rosterform' method='post' action='email_roster.php' target='_self' enctype='multipart/form-data'>
                    <input type=hidden name='processor' value='shiftallocation'>
                    <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                    <input type=hidden name='stime1' value='$stime1'><input type=hidden name='stime2' value='$stime2'>
                    <input type=hidden name='etime2' value='$etime2'><input type=hidden name='semail' value='$semail'>
                </form>";
                ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php

            }
        }
    }
    
    // schedule by job
    if($_POST["processor"]=="shiftallocation1"){
        if(!empty($_POST["employeeid"])){
            
            $employeeid=$_COOKIE["reid"];
            $projectid=$_POST["projectid"];
            $clientid=$_POST["clientid"];
            $days=$_COOKIE["rday"];
            $months=$_COOKIE["rmonth"];
            $years=$_COOKIE["ryear"];
            
            $stime="$years-$months-$days ".$_POST["stime"]."";
            $stime1 = substr($stime,0,10);
            $stime2 = substr($stime,11,5);
            $stime3 = str_replace("-", "", $stime1);
            $stime4 = str_replace(":", "", $stime2);
            $stimex = "".$stime3."T".$stime4."00Z";
            
            $etime="$years-$months-$days ".$_POST["etime"]."";
            $etime1 = substr($etime,0,10);
            $etime2 = substr($etime,11,5);
            $etime3 = str_replace("-", "", $etime1);
            $etime4 = str_replace(":", "", $etime2);
            $etimex = "".$etime3."T".$etime4."00Z";
            
            echo"<script>alert('Shift Allocated...')</script>";
            
            $sx1 = "select * from uerp_user where id='".$_POST["employeeid"]."' order by id asc limit 1";
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
            
            $sx2 = "select * from uerp_user where id='".$_POST["clientid"]."' order by id asc limit 1";
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
                
            $sdate=strtotime($stime);
            $edate=strtotime($etime);
            
            if($_COOKIE["dbname"]=="saas_info_banglahosting_net"){
                $diffInSeconds = $edate - $sdate;
                $diffInHours = $diffInSeconds / 3600;
                
                $weekname = date('l', $sdate);
                if($weekname=="Monday"){
                    $monday1=$sdate;
                    $monday2 = $sdate + (7 * 24 * 60 * 60);
                    $sunday1 = $sdate + (6 * 24 * 60 * 60);
                }
                if($weekname=="Tuesday"){
                    $monday1 = $sdate - (1 * 24 * 60 * 60);
                    $monday2 = $sdate + (6 * 24 * 60 * 60);
                    $sunday1 = $sdate + (5 * 24 * 60 * 60);
                }
                if($weekname=="Wednesday"){
                    $monday1 = $sdate - (2 * 24 * 60 * 60);
                    $monday2 = $sdate + (5 * 24 * 60 * 60);
                    $sunday1 = $sdate + (4 * 24 * 60 * 60);
                }
                if($weekname=="Thursday"){
                    $monday1 = $sdate - (3 * 24 * 60 * 60);
                    $monday2 = $sdate + (4 * 24 * 60 * 60);
                    $sunday1 = $sdate + (3 * 24 * 60 * 60);
                }
                if($weekname=="Friday"){
                    $monday1 = $sdate - (4 * 24 * 60 * 60);
                    $monday2 = $sdate + (3 * 24 * 60 * 60);
                    $sunday1 = $sdate + (2 * 24 * 60 * 60);
                }
                if($weekname=="Saturday"){
                    $monday1 = $sdate - (5 * 24 * 60 * 60);
                    $monday2 = $sdate + (2 * 24 * 60 * 60);
                    $sunday1 = $sdate + (1 * 24 * 60 * 60);
                }
                if($weekname=="Sunday"){
                    $monday1 = $sdate - (6 * 24 * 60 * 60);
                    $monday2 = $sdate + (1 * 24 * 60 * 60);
                    $sunday1 = $sdate;
                }
                
                $invoice_date=0;
                $inv1 = "select * from ndis_invoices where received_from='".$_POST["clientid"]."' and projectid='".$_POST["projectid"]."' and paid='0' order by id desc limit 1";
                $inv11 = $conn->query($inv1);
                if ($inv11->num_rows > 0) { while($inv111 = $inv11->fetch_assoc()) {
                    $invoice_date=$inv111["receipt_date"];
                    $invoice_id=$inv111["id"];
                    $receipt_no=$inv111["receipt_no"];
                    $receipt_date=$inv111["receipt_date"];
                    $proj_id=$inv111["proj_id"];
                    $narration=$inv111["narration"];
                    $ledger_id=$inv111["ledger_id"];
                    $dr_amt=$inv111["dr_amt"];
                    $cr_amt=$inv111["cr_amt"];
                    $type=$inv111["type"];
                    $ledger_type=$inv111["ledger_type"];
                    $received_from=$inv111["received_from"];
                    $projectid=$inv111["projectid"];
                    $manual_receipt_no=$inv111["manual_receipt_no"];
                    $cc_code=$inv111["cc_code"];
                    $status=$inv111["status"];
                    $employeeid=$inv111["employeeid"];
                    $invoice_no=$inv111["invoice_no"];
                    $invoice_no2=$inv111["invoice_no2"];
                    $date_from=$inv111["date_from"];
                    $date_to=$inv111["date_to"];
                    $ndis_item=$inv111["ndis_item"];
                    $hours=$inv111["hours"];
                    $rate=$inv111["rate"];
                    $identifier=$inv111["identifier"];
                    $paid=$inv111["paid"];
                    $randomid=$inv111["randomid"];
                    $invoice_receiver=$inv111["invoice_receiver"];
                } }
                
                $n1 = "select * from ndis_support_catelogue where id='".$_POST["linenumber"]."' order by id asc limit 1";
                $nn1 = $conn->query($n1);
                if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
                    $n_description=$nnn1["support_item_name"];
                    $n_itemnumber=$nnn1["support_item_number"];
                    $n_rate=$nnn1["nsw"];
                } }
                    
                $frequency=$diffInHours;
                $total_amount=($frequency*$n_rate);
                $identifier=0;
                
                if($invoice_date==$monday2){
                    
                    // insert ndis invoice addon.
                    $nidx=0;
                    $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
                    employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid) 
                    VALUES ('$invoice_no','$sdate','$n_description on $weekname at $stime~$etime','800000032','2','2','".$_POST["clientid"]."','$ip','-','1',
                    '".$_POST["employeeid"]."','$invoice_no','$monday1','$sunday1','$n_itemnumber','$frequency','$n_rate','0','$total_amount',
                    '$identifier','$invoice_no2','0','$invoice_id')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                    
                    /*
                    // Updating invoice addon
                    $naid=0;
                    $na1 = "select * from ndis_invoices_addon where received_from='$received_from' and invoice_no='$invoice_no' and ndis_item='$n_itemnumber' and invoice_no2='$invoice_no2' order by id asc limit 1";
                    $na11 = $conn->query($na1);
                    if ($na11->num_rows > 0) { while($na111 = $na11->fetch_assoc()) {
                        $naid=$na111["id"];
                        $previous_hours=$na111["hours"];
                        $invoice_number1=$na111["invoice_no"];
                        $invoice_number2=$na111["invoice_no2"];
                        $nid=$na111["id"];
                    } }
                    
                    if($naid==0){
                        // insert ndis invoice addon.
                        $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
                        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid) 
                        VALUES ('$invoice_number','$invoice_number','$n_description','800000032','2','2','".$_POST["clientid"]."','$ip','-','1',
                        '".$_POST["employeeid"]."','$invoice_number','$monday1','$sunday1','$n_itemnumber','$frequency','$n_rate','0','$total_amount',
                        '$identifier','$invoice_number2','0','$nid')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }else{
                        // update ndis invoice addon.
                        $finalhours=($frequency+$previous_hours);
                        $finalamount=($finalhours*$n_rate);
                        $sql="update ndis_invoices_addon set hours='$finalhours',cr_amt='$finalamount' where id='$naid'";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
                    */
                    
                }else{
                    
                    // creating new invoice.
                    $invoice_no2x=0;
                    $invoice_nox=0;
                    $invoice_date=rand(13579,99999);
                    $invoice_number2="INV-".$_POST["clientid"]."-".$_POST["projectid"]."-$invoice_date";
                    $invoice_number=time();
                    $sql = "insert into ndis_invoices (ledger_id,received_from,employeeid,invoice_no2,receipt_date,date_from,date_to,invoice_no,projectid,paid) 
                    VALUES ('800000032','".$_POST["clientid"]."','".$_POST["employeeid"]."','$invoice_number2','$monday2','$monday2','$monday2','$invoice_number','".$_POST["projectid"]."','0')";
                    if ($conn->query($sql) === TRUE){
                        $sysdate=time();
                        $ip=$_SERVER['REMOTE_ADDR'];
                        $nid=0;
                        $sx1 = "select * from ndis_invoices order by id desc limit 1";
                        $rx1 = $conn->query($sx1);
                        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $nid=$ry1["id"]; } }
                        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                        VALUES ('".$_COOKIE["userid"]."','0','0','NEW INVOICE TEMPLATE','0','$sysdate','$ip','1','New Invoice Tempate create.','0','$nid','ndis_invoices')";
                        if ($conn->query($sql1) === TRUE) $tomtom=0;
                        // echo"<script>alert('Invoice Template Created')</script>";
                        
                        // creating ndis invoice addon
                        $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
                        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid) 
                        VALUES ('$invoice_number','$invoice_number','$n_description on $weekname at $stime~$etime','800000032','2','2','".$_POST["clientid"]."','$ip','-','1',
                        '".$_POST["employeeid"]."','$invoice_number','$monday1','$sunday1','$n_itemnumber','$frequency','$n_rate','1','$total_amount',
                        '$identifier','$invoice_number2','1','$nid')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
                }
            }
            
            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES 
            ('".$_POST["employeeid"]."','".$_POST["projectid"]."','".$_POST["clientid"]."','".$_COOKIE["rday"]."','".$_COOKIE["rmonth"]."','".$_COOKIE["ryear"]."','$stime','".$_COOKIE["rday"]."','".$_COOKIE["rmonth"]."','".$_COOKIE["ryear"]."','$etime','0','1','".$_POST["pcolor"]."','$sdate','$edate','".$_POST["night"]."','".$_POST["linenumber"]."','".$_POST["category"]."','".$_POST["repeating"]."','".$_POST["note"]."','".$_POST["address"]."')";
            if ($conn->query($sql) === TRUE){
                
                // echo"<script>alert('New Project Created Successfully... 2')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','ROSTER','0','$sysdate','$ip','1','New Shift Allocated to <b>$employeename</b> for <b>$clientname</b> on Date: $stime1 from Time: $stime2 - $etime2','0','".$_COOKIE["userid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                // echo"<script>alert('Email Sent to User...')</script>";
                echo"<form name='rosterform' method='post' action='email_roster.php' target='_self' enctype='multipart/form-data'>
                    <input type=hidden name='processor' value='shiftallocation'>
                    <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                    <input type=hidden name='stime1' value='$stime1'><input type=hidden name='stime2' value='$stime2'>
                    <input type=hidden name='etime2' value='$etime2'><input type=hidden name='semail' value='$semail'>
                </form>";
                ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
                
            }
            
        }
    }
    
    // echo"<script>alert('New Project Created Successfully...')</script>";
?>

