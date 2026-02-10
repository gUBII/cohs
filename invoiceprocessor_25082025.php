<?php
    // error_reporting(0);
    include 'authenticator.php';
    $dbnamex=$_COOKIE['dbname'];
    
    if($_POST["processor"]=="bulkinvoiceupdate"){
        
        $invoice_date=strtotime($_POST["invdate"]);
        
        $sx1 = "select * from ndis_invoices order by id asc";
        $rx1 = $conn->query($sx1);
        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
            $f="".$ry1["invoice_no2"]."-100";
            $g=0;
            $g=strpos("$f","-");
            
            $h=($g+1);
            $i=substr("$f",$h,10);
            
            if($g==0){
                $g="$f-1";
            }else{
                $i=($i+1);
                $j=substr("$f",0,$g);
                $g="$j-$i";
                
                $tomtom=0;
                $sql = "SELECT * FROM ndis_invoices where invoice_no2='$g' order by id desc limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $tomtom=1; } }
                if($tomtom!=0){
                    $i=($i+1);
                    $j=substr("$f",0,$g);
                    $g="$j_-$i";
                }
            }
            
            // echo"$g<br>";
            // $sql="update ndis_invoices set receipt_date='$invoice_date'";
            // if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('All NDIS Invoice Template Date Updated.')</script>";
        } }
        
        
        
        /*
            $sql="update ndis_invoices set receipt_date='$invoice_date' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Date Updated.')</script>";
            
            $invoice_number2 = preg_replace('/[^a-zA-Z0-9_ -]/s','_',$_POST["invoice_number"]);
            $invoice_number = str_replace( array( '\'', '"', ',' , ';', '<', '>', '@', '.', '-' ), '_', $invoice_number2);
            $invoice_number = str_replace( array( ' ' ), '', $invoice_number);
            
            $tomtom=0;
            $sql = "SELECT * FROM ndis_invoices where invoice_no2='$invoice_number' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $tomtom=1; } }
            
            if($tomtom==0){
                $sql="update ndis_invoices set invoice_no2='$invoice_number' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE){
                    // echo"<script>alert('Invoice # Updated')</script>";
                    $sql="update ndis_invoices_addon set invoice_no='$invoice_number',invoice_no2='$invoice_number',randomid='".$_POST["id"]."' where randomid='".$_POST["id"]."'";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
            } else {
                echo"<script>alert('Invoice # Already Used.')</script>";
            }
        */
    }
    
    if($_POST["processor"]=="createtemplate"){
        $invoice_no2x=0;
        $sx1 = "select * from ndis_invoices where invoice_no2='".$_POST["invoice_no2"]."' order by id desc limit 1";
        $rx1 = $conn->query($sx1);
        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $invoice_no2x=1;}}
        
        if($invoice_no2x==0){
            
            $invoice_date=strtotime($_POST["invoice_date_from"]);
            $invoice_date_from=strtotime($_POST["invoice_date_from"]);
            $invoice_date_to=strtotime($_POST["invoice_date_to"]);
            
            $clientid=0;
            $sx1x = "select * from project where id='".$_POST["cname"]."' order by id desc limit 1";
            $rx1x = $conn->query($sx1x);
            if ($rx1x->num_rows > 0) { while($ry1x = $rx1x->fetch_assoc()) { $clientid=$ry1x["clientid"]; } }
            
            $tomtom=0;
            $sx1 = "select * from shifting_allocation where projectid='".$_POST["cname"]."' and clientid='$clientid' and sdate>='$invoice_date_from' and sdate<='$invoice_date_to' order by id desc limit 1";
            $rx1 = $conn->query($sx1);
            if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $tomtom=($tomtom+1); } }
            
            // echo"<script>alert('$tomtom, ".$_POST["cname"].", $clientid')</script>";
            
            if($tomtom>=1){
                
                $sql = "insert into ndis_invoices (ledger_id,received_from,employeeid,invoice_no2,receipt_date,date_from,date_to,invoice_no,proj_id) 
                VALUES ('".$_POST["ledger_id"]."','$clientid','".$_POST["employeeid"]."','".$_POST["invoice_no2"]."','$invoice_date','$invoice_date_from','$invoice_date_to','".$_POST["invoice_no"]."',".$_POST["cname"].")";
                if ($conn->query($sql) === TRUE){
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $nid=0;
                    $sx1 = "select * from ndis_invoices order by id desc limit 1";
                    $rx1 = $conn->query($sx1);
                    if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $nid=$ry1["id"]; } }
                    
                    $sx1 = "select * from shifting_allocation where projectid='".$_POST["cname"]."' and clientid='$clientid' and sdate>='$invoice_date_from' and sdate<='$invoice_date_to' order by id desc";
                    $rx1 = $conn->query($sx1);
                    if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
                        
                        $n_description=null;
                        $n_itemnumber=0;
                        $n_rate=0;
                        $n1 = "select * from ndis_line_numbers where id='".$ry1["itemnumber"]."' order by id asc limit 1";
                        $nn1 = $conn_main->query($n1);
                        if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
                            $n_description=$nnn1["item_name"];
                            $n_itemnumber=$nnn1["item_number"];
                            $n_rate=$nnn1["national"];
                        } }
                        
                        // insert ndis invoice addon.
                        $nidx=0;
                        
                        $stime=$ry1["stime"];
                        $etime=$ry1["etime"];
                        
                        $rdate = substr($ry1["stime"],0,10);
                        
                        $sdate=$ry1["sdate"];
                        $edate=$ry1["edate"];
                        
                        $weekname = date('l', $ry1["sdate"]);
                        
                        $diffInSeconds = $edate - $sdate;
                        $diffInHours = $diffInSeconds / 3600;
                        
                        $frequency=$diffInHours;
                        $total_amount=($frequency*$n_rate);
                        $identifier=0;
                        
                        $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
                        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid,proj_id) 
                        VALUES ('".$_POST["invoice_no"]."','".$ry1["sdate"]."','$n_description on $weekname at $stime~$etime','800000032','2','2','$clientid','$ip','-','1',
                        '".$ry1["employeeid"]."','".$_POST["invoice_no"]."','$invoice_date_from','$invoice_date_to','$n_itemnumber','$frequency','$n_rate','0','$total_amount',
                        '$identifier','".$_POST["invoice_no2"]."','0','$nid','".$_POST["cname"]."')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                    } }
                    
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','NEW INVOICE TEMPLATE','0','$sysdate','$ip','1','New Invoice Tempate create.','0','$nid','ndis_invoices')";
                    if ($conn->query($sql1) === TRUE) echo"<script>alert('Invoice Template Created')</script>";
                }
                
            } else echo"<script>alert('No Invoice Found within this date range.')</script>";
        } else  echo"<script>alert('This Invoice Number is Already Used.')</script>";
    }
    
    if($_POST["processor"]=="invoicegenerator"){
        
        $invoiceverify=0;
        $s2 = "select * from receipt_voucher where randomid='".$_POST["invoice_no2"]."' order by randomid desc limit 1";
        $r2 = $conn->query($s2);
        if ($r2->num_rows > 0) { while($r3 = $r2->fetch_assoc()) {
            $invoiceverify=1;
        } }
        $lastinvoiceno=null;
        if($invoiceverify==0){
            $lastinvoiceno=($lastinvoiceno+1);
            $randomid=rand(100000000000,999999999999);
            $t1=0;
            $lastinvoiceno=0;
            $sx2 = "select * from receipt_voucher order by invoice_no desc limit 1";
            $rx2 = $conn->query($sx2);
            if ($rx2->num_rows > 0) { while($ry2 = $rx2->fetch_assoc()) { $lastinvoiceno=$ry2["invoice_no"]; } }
            $lastinvoiceno=($lastinvoiceno+1);
            
            $setndis=0;
            $sx1 = "select * from ndis_invoices_addon where randomid='".$_POST["nid"]."' order by id asc";
            $rx1 = $conn->query($sx1);
            if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
                $sql = "insert into receipt_voucher (receipt_no,receipt_date,proj_id,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,
                received_from,manual_receipt_no,ip,country,status,employeeid,invoice_no,invoice_no2,date_from,date_to,ndis_item,hours,rate,
                identifier,paid,randomid,cc_code) 
                VALUES ('".$_POST["ndate"]."','".$_POST["ndate"]."','0','".$ry1["narration"]."','".$ry1["ledger_id"]."','0','".$ry1["cr_amt"]."',
                '2','2','".$ry1["received_from"]."','0','$ip','$mycountry','1','".$ry1["employeeid"]."','$lastinvoiceno',
                '".$ry1["invoice_no2"]."','".$ry1["date_from"]."','".$ry1["date_to"]."','".$ry1["ndis_item"]."','".$ry1["hours"]."',
                '".$ry1["rate"]."','INCOME','1','".$_POST["invoice_no2"]."','".$_POST["invoice_no"]."')";
                if ($conn->query($sql) === TRUE) $setndis=1;
            } }
            if($setndis==1){
                $sql="update ndis_invoices set paid='1' where id='".$_POST["nid"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Invoice Successfully Generated.')</script>";
            }
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE GENERATED','0','$sysdate','$ip','1','New Invoice # $lastinvoiceno is Generated successfully.','0','".$_POST["nid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
        } else echo"<script>alert('Sorry! Same Invoice Number is Already Generated Earlier.')</script>";
        
    }
    
    // Edit Invoice
    
    echo $_POST["processor"];
    
    if($_POST["processor"]=="editinvoice"){
        
        $date_from=strtotime($_POST["date_from"]);
        $date_to=strtotime($_POST["date_to"]);
        $receipt_date=strtotime($_POST["receipt_date"]);
        
        /*
        $thour=0;
        $total_hour_worked=0;
        $total_hour_workedH=0;
        $total_hour_workedS=0;
        $sx1 = "select * from shifting_allocation where clientid='".$_POST["participant"]."' and sdate>='$date_from' and sdate<='$date_to' order by id asc";
        $rx1 = $conn->query($sx1);
        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
            if($ry1["clockout"]!=0){
                $enddate=0;
                $cinout=0;
                $cin1=date("H", $ry1["clockin"]);
                $cout1=date("H", $ry1["clockout"]);
                $cinout=($cin1-$cout1);
                if($cinout>=1) $enddate=strtotime("24 hours", $ry1["clockout"]);
                else $enddate=$ry1["clockout"];
                
                $clockin2=0;
                $clockout2=0;
                $date1=0;
                $date2=0;
                $diff1=0;
                
                $clockin2=date("Y-m-d h:i:s a", $ry1["clockin"]);
                $clockout2=date("Y-m-d h:i:s a", $enddate);
                $date1=date_create("$clockout2");
                $date2=date_create("$clockin2");
                $diff1=date_diff($date1,$date2);
                
                $total_hour_worked= $diff1->format("%H");
                $total_hour_worked2= $diff1->format("%I");
                
                $total_overtime=$ry1["total_overtime"];
                
                $total_hour_workedH=($total_hour_workedH+$total_hour_worked);
                $total_hour_workedH=($total_hour_workedH+$total_overtime);
                
                $total_hour_workedS=($total_hour_workedS+$total_hour_worked2);
                
            }
        } }
        
        $tpm=($_POST["rates"]/60);
        $total_amount2=round($total_hour_workedS*$tpm);
        
        $tsw=round($total_hour_workedS/60);
        $thw=($total_hour_workedH+$tsw);
        
        // $total_amount=($thw*$_POST["rates"]);
        
        // $total_amount=($total_amount+$total_amount2);
        
        $s1 = "select * from ndis_invoices where ledger_id='".$_POST["ledger_id"]."' and invoice_no2='".$_POST["invoice_no2"]."' order by id desc limit 1";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
            $idate=$t1["receipt_no"];
            $invoice_id2=$t1["invoice_no2"];
        } }
        */
        
        $n1 = "select * from ndis_line_numbers where id='".$_POST["ndis_item"]."' order by id asc limit 1";
        $nn1 = $conn_main->query($n1);
        if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
            $n_itemnumber=$nnn1["item_name"];
            $n_description=$nnn1["item_name"];
            $n_rate=$nnn1["national"];
        } }
        
        $total_amount=($n_rate*$_POST["frequency"]);
        
        // $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid) 
        // VALUES ('$idate','$idate','".$_POST["note"]."','".$_POST["ledger_id"]."','2','2','".$_POST["participant"]."','$ip','$mycountry','1','".$_POST["employeeid"]."','".$_POST["invoice_no2"]."','$date_from','$date_to','".$_POST["ndis_item"]."','$thw','".$_POST["rates"]."','0','$total_amount','".$_POST["selection"]."','$invoice_id2','1','".$_POST["invoiceid"]."')";
        
        $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid,proj_id) 
        VALUES ('".$_POST["invoice_no"]."','$receipt_date','$n_description on $weekname at $receipt_date','800000032','2','2','".$_POST["participant"]."','$ip','-','1',
        '".$_POST["employeeid"]."','".$_POST["invoice_no"]."','$date_from','$date_to','$n_itemnumber','".$_POST["frequency"]."','$n_rate','0','$total_amount',
        '".$_POST["selection"]."','".$_POST["invoice_no2"]."','0','".$_POST["invoiceid"]."','".$_POST["proj_id"]."')";
        if ($conn->query($sql) === TRUE) $tomtom=0;

        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $nid=0;
        $sx1 = "select * from ndis_invoices_addon order by id desc limit 1";
        $rx1 = $conn->query($sx1);
        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $nid=$ry1["id"]; } }
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE PAYMENT NOTE ADDON','0','$sysdate','$ip','1','Invoice Payment Note Added','0','$nid','ndis_invoices_addon')";
        if ($conn->query($sql1) === TRUE) echo"<script>alert('Invoice Payment Note Added')</script>";

        echo"<form method='get' action='modules/invoices_addon.php' name='main' target='_self'>
            <input type=hidden name='pid' value='".$_POST["invoiceid"]."'><input type=hidden name='rid' value='".$_POST["participant"]."'>
            <input type=hidden name='lid' value='".$_POST["ledger_id"]."'><input type=hidden name='sid' value='".$_POST["invoice_no2"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
        
    }
    
    // invoiceupdate1
    if($_POST["processor"]=="invoiceupdate1"){
        
        if($_POST["pointer"]==1){
            $invoice_date=strtotime($_POST["invoice_date"]);
            $sql="update ndis_invoices set receipt_date='$invoice_date' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Date Updated.')</script>";
        }
        
        if($_POST["pointer"]==2){
            $invoice_number2 = preg_replace('/[^a-zA-Z0-9_ -]/s','_',$_POST["invoice_number"]);
            $invoice_number = str_replace( array( '\'', '"', ',' , ';', '<', '>', '@', '.', '-' ), '_', $invoice_number2);
            $invoice_number = str_replace( array( ' ' ), '', $invoice_number);
            
            $tomtom=0;
            $sql = "SELECT * FROM ndis_invoices where invoice_no2='$invoice_number' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $tomtom=1; } }
            
            if($tomtom==0){
                $sql="update ndis_invoices set invoice_no2='$invoice_number' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE){
                    // echo"<script>alert('Invoice # Updated')</script>";
                    $sql="update ndis_invoices_addon set invoice_no='$invoice_number',invoice_no2='$invoice_number',randomid='".$_POST["id"]."' where randomid='".$_POST["id"]."'";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
            } else {
                echo"<script>alert('Invoice # Already Used.')</script>";
            }
        }
        
        if($_POST["pointer"]==3){
            $sql="update ndis_invoices set received_from='".$_POST["cname"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Client Data Updated.')</script>";
        }
        
        if($_POST["pointer"]==4){
            $sql="update ndis_invoices set invoice_receiver='".$_POST["invoice_receiver"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Email Address Updated.')</script>";
        }
        
        if($_POST["pointer"]==5){
            $sql="update ndis_invoices set invoice_no='".$_POST["invoice_no"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Card ID Updated.')</script>";
        }
        
        /*
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','NEW INVOICE','0','$sysdate','$ip','1','New Invoice Form is created.','".$_POST["ledgerid"]."','$idate')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        echo"<form method='get' action='ledger_forms_addon.php' name='main' target='_self'>
    	    <input type=hidden name='lid' value='".$_POST["ledger_id"]."'><input type=hidden name='sid' value='".$_POST["invoice_no"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
        */
        
    }
    
    // invoiceupdate
    if($_POST["processor"]=="invoicedateupdate"){
        $date_from=strtotime($_POST["date_from"]);
        $date_to=strtotime($_POST["date_to"]);
        $sql="update ndis_invoices_addon set date_from='$date_from',date_to='$date_to' where randomid='".$_POST["randomid"]."' and received_from='".$_POST["received_from"]."' and invoice_no2='".$_POST["invoice_no2"]."' and ledger_id='".$_POST["ledger_id"]."'";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('Date Updated')</script>";
            echo"<form method='get' action='modules/invoices_addon.php' name='main' target='_self'>
                <input type='hidden' name='pid' value='".$_POST["randomid"]."'><input type='hidden' name='rid' value='".$_POST["received_from"]."'>
                <input type='hidden' name='sid' value='".$_POST["invoice_no2"]."'><input type='hidden' name='lid' value='".$_POST["ledger_id"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    if($_POST["processor"]=="invoiceupdate"){
        
        if($_POST["pointer"]==1){
            $date_from=strtotime($_POST["date_from"]);
            $date_to=strtotime($_POST["date_to"]);
            $receipt_date=strtotime($_POST["receipt_date"]);
            $sql="update ndis_invoices_addon set receipt_date='$receipt_date' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        if($_POST["pointer"]==2){
            $narration = str_replace("'", "`", $_POST["note"]);
            $sql="update ndis_invoices_addon set narration='$narration' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;    
        }
        if($_POST["pointer"]==3){
            $n_description=null;
            $n_itemnumber=0;
            $n_rate=0;
            $n1 = "select * from ndis_line_numbers where id='".$_POST["ndis_item"]."' order by id asc limit 1";
            $nn1 = $conn_main->query($n1);
            if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
                $n_description=$nnn1["item_name"];
                $n_itemnumber=$nnn1["item_number"];
                $n_rate=$nnn1["national"];
            } }
            $cr_amt=($_POST["thour"]*$n_rate);
            $cr_amt=round($cr_amt);
            $sql="update ndis_invoices_addon set ndis_item='$n_description',hours='".$_POST["thour"]."',rate='$n_rate',cr_amt='$cr_amt' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<form method='get' action='modules/invoices_addon.php' name='main' target='_self'>
                    <input type=hidden name='pid' value='".$_POST["pid"]."'><input type=hidden name='rid' value='".$_POST["rid"]."'>
                    <input type=hidden name='lid' value='".$_POST["lid"]."'><input type=hidden name='sid' value='".$_POST["sid"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        if($_POST["pointer"]==4){
            $cr_amt=round($_POST["ttotal"]);
            $sql="update ndis_invoices_addon set hours='".$_POST["thour"]."',rate='$n_rate',cr_amt='$cr_amt' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Record Updated')</script>";
        }
    }
    
    if($_POST["processor"]=="personaltask123213123"){
        $datex=strtotime($_POST["date"]);
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $randid=time();
        
        $sql="update ndis_invoices set position='".$_POST["position"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        
        
        $sql = "insert into tasks2 (employeeid,clientid,date,title,detail,priority,image,tdate) VALUES ('".$_POST["employeeid"]."','".$_POST["clientid"]."','$datex','$title','$detail','".$_POST["priority"]."','$randid','$randid')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Self Task Assigned')</script>";
            $recid=0;
            $sql = "SELECT * FROM tasks where image='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                $extension=0;
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name); 
                    $extension = $path_parts['extension'];
                    
            		$newFilename = time() . "$dbnamex_$rand." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/tasks/' . $newFilename);
            		$location = 'media/tasks/' . $newFilename;
            		$extension1=strlen("$extension");
            		if($extension1>=3){
                    	$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','SELF TASK MANAGER')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
            		}
            	}
            }
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','TASK','".$_POST["priority"]."','$sysdate','$ip','1','New Self Task Assigned on $title','".$_POST["employeeid"]."','".$_POST["clientid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='my-tasks'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    if ($_POST["processor"] == "batchInvoicePaymentGenerator") {
            // echo"<script>alert('Invoice Closed')</script>";
            $invoiceList = $_POST["invoice_list"]; // this is an array
            $lid = $_POST["lid"];
            $cname = $_POST["cname"];
            $lid_date_from = $_POST["lid_date_from"];
            $lid_date_to = $_POST["lid_date_to"];
            $cid = $_POST["cid"];
            $utype = $_POST["utype"];
            $selection = $_POST["selection"];
            $statusupdate = $_POST["statusupdate"];
            $poinz = $_POST["poinz"];
            $sheba = $_POST["sheba"];
            $userid = $_COOKIE["userid"];
            $ip = $_SERVER['REMOTE_ADDR'];
            $sysdate = time();
            
            // Process all invoices
            foreach ($invoiceList as $sid) {
                // Mark invoice as paid
                $conn->query("UPDATE receipt_voucher SET paid='10' WHERE invoice_no='$sid' AND ledger_id='$lid'");
                echo "Batch update successful";
            }
            
            /*
            $p1 = "SELECT * FROM project WHERE clientid='$cname' ORDER BY id DESC LIMIT 1";
            $p2 = $conn->query($p1);
            if ($p2->num_rows > 0) {
                $p3 = $p2->fetch_assoc();
                $projectid = $p3["id"];
                $categories = [];
        
                // Initialize all category values
                for ($i = 1; $i <= 15; $i++) {
                    $categories[$i] = (float) $p3["cat{$i}x"];
                }
        
                // Process all invoices
                foreach ($invoiceList as $sid) {
                    $s1 = "SELECT * FROM receipt_voucher WHERE invoice_no='$sid' AND ledger_id='$lid' AND paid='1'";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) {
                        while ($rs1 = $r1->fetch_assoc()) {
                            $ndis_category = (int) substr($rs1["ndis_item"], 0, 2);
                            $amt = (float) $rs1["cr_amt"];
                            if (isset($categories[$ndis_category])) {
                                $categories[$ndis_category] += $amt;
                            }
                        }
                    }
        
                    // Mark invoice as paid
                    $conn->query("UPDATE receipt_voucher SET paid='10' WHERE invoice_no='$sid' AND ledger_id='$lid'");
        
                    // Audit log
                    $conn->query("INSERT INTO audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token)
                                  VALUES ('$userid', '0', '0', 'INVOICE CLOSED', '0', '$sysdate', '$ip', '1', 'Invoice Form is Closed.', '$lid', '$sid')");
                }
        
                // Update project category totals
                $setParts = [];
                foreach ($categories as $i => $value) {
                    $key = "cat{$i}x";
                    $val = $conn->real_escape_string($value);
                    $setParts[] = "$key='$val'";
                }
                $setClause = implode(",", $setParts);
                $conn->query("UPDATE project SET $setClause WHERE id='$projectid'");
        
                echo "Batch update successful";
            } else {
                echo "Project not found";
            }
            */
    }
    
    
    if(isset($_GET["processor"])){
        
        
        if($_GET["processor"]=="invoicepaymentgenerator"){
            /*
            echo"
            lid=".$_GET["lid"]."
            sid=".$rs["invoice_no"]."
            cname=".$_GET["cname"]."
            dfrom=".$_GET["lid_date_from"]."
            dto=".$_GET["lid_date_to"]."
            id=5162
            url=unpaid_invoices.php
            utype=".$_GET["utype"]."
            selection=".$_GET["selection"]."
            statusupdate=".$_GET["statusupdate"]."
            poinz=".$_GET["poinz"]."
            cid=".$_GET["cid"]."
            sheba=".$_GET["sheba"]."
            <hr>";
            */
            
            $projectid=0;
            $p1 = "select * from project where clientid='".$_GET["cname"]."' order by id desc limit 1";
            $p2 = $conn->query($p1);
            if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                
                $projectid=$p3["id"];
                echo"$projectid <br>";
                
                $cat1x=$p3["cat1x"];
                $cat2x=$p3["cat2x"];
                $cat3x=$p3["cat3x"];
                $cat4x=$p3["cat4x"];
                $cat5x=$p3["cat5x"];
                $cat6x=$p3["cat6x"];
                $cat7x=$p3["cat7x"];
                $cat8x=$p3["cat8x"];
                $cat9x=$p3["cat9x"];
                $cat10x=$p3["cat10x"];
                $cat11x=$p3["cat11x"];
                $cat12x=$p3["cat12x"];
                $cat13x=$p3["cat13x"];
                $cat14x=$p3["cat14x"];
                $cat15x=$p3["cat15x"];
                
                $s1 = "select * from receipt_voucher where invoice_no='".$_GET["sid"]."' and ledger_id='".$_GET["lid"]."' and paid='1' order by ledger_id desc";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    $ndis_category=substr($rs1["ndis_item"],0,2);
                    $ndis_paid=$rs1["cr_amt"];
                    
                    echo"".$rs1["ndis_item"]." - ".$rs1["hours"]." - ".$rs1["rate"]." - ".$rs1["cr_amt"]." ($ndis_category).<br>";
                
                    if($ndis_category=="01") $cat1x=($cat1x+$rs1["cr_amt"]);
                    if($ndis_category=="02") $cat2x=($cat2x+$rs1["cr_amt"]);
                    if($ndis_category=="03") $cat3x=($cat3x+$rs1["cr_amt"]);
                    if($ndis_category=="04") $cat4x=($cat4x+$rs1["cr_amt"]);
                    if($ndis_category=="05") $cat5x=($cat5x+$rs1["cr_amt"]);
                    if($ndis_category=="06") $cat6x=($cat6x+$rs1["cr_amt"]);
                    if($ndis_category=="07") $cat7x=($cat7x+$rs1["cr_amt"]);
                    if($ndis_category=="08") $cat8x=($cat8x+$rs1["cr_amt"]);
                    if($ndis_category=="09") $cat9x=($cat9x+$rs1["cr_amt"]);
                    if($ndis_category=="10") $cat10x=($cat10x+$rs1["cr_amt"]);
                    if($ndis_category=="11") $cat11x=($cat11x+$rs1["cr_amt"]);
                    if($ndis_category=="12") $cat12x=($cat12x+$rs1["cr_amt"]);
                    if($ndis_category=="13") $cat13x=($cat13x+$rs1["cr_amt"]);
                    if($ndis_category=="14") $cat14x=($cat14x+$rs1["cr_amt"]);
                    if($ndis_category=="15") $cat15x=($cat15x+$rs1["cr_amt"]);
                
                } }
                
                $sql="update project set cat1x='$catx',cat2x='$cat2x',cat3x='$cat3x',cat4x='$cat4x',cat5x='$cat5x',cat6x='$cat6x',
                cat7x='$cat7x',cat8x='$cat8x',cat9x='$cat9x',cat10x='$cat10x',cat11x='$cat11x',cat12x='$cat12x',cat13x='$cat13x',
                cat14x='$catx14',cat15x='$cat15x' where id='$projectid'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Project Category Budget Updated.')</script>";
                
                $sql="update receipt_voucher set paid='10' where ledger_id='".$_GET["lid"]."' and invoice_no='".$_GET["sid"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Invoice Closed')</script>";
                
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE CLOSED','0','$sysdate','$ip','1','Invoice Form is Closed.','".$_GET["lid"]."','".$_GET["sid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                // invoice-generator
                echo"<form method='get' action='index.php' name='main' target='_top'>
                    <input type=hidden name='invoice_no' value='".$_GET["invoice_no"]."'><input type=hidden name='url' value='".$_GET["url"]."'>
                    <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='utype' value='".$_GET["utype"]."'>
                    <input type=hidden name='selection' value='".$_GET["selection"]."'><input type=hidden name='statusupdate' value='".$_GET["statusupdate"]."'>
            	    <input type=hidden name='cid' value='".$_GET["cid"]."'><input type=hidden name='sheba' value='".$_GET["sheba"]."'>
            	    <input type=hidden name='processor' value='".$_GET["processor"]."'><input type=hidden name='poinz' value='".$_GET["poinz"]."'>
            	    <input type=hidden name='lid' value='".$_GET["lid"]."'>
            	    <input type=hidden name='refby' value='".$_GET["refby"]."'>
            	    <input type=hidden name='cname' value='".$_GET["cname"]."'>
            	    <input type=hidden name='lid_date_from' value='".$_GET["dfrom"]."'><input type=hidden name='lid_date_to' value='".$_GET["dto"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            } }
        }
    
        if($_GET["processor"]=="invoicepaymentreversegenerator"){
            
            $sql="update receipt_voucher set paid='1' where ledger_id='".$_GET["lid"]."' and invoice_no='".$_GET["sid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Invoice Closed')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE RE-OPENED','0','$sysdate','$ip','1','Invoice Form is Re-Opened.','".$_GET["lid"]."','".$_GET["sid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            // invoice-generator
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='invoice_no' value='".$_GET["invoice_no"]."'><input type=hidden name='url' value='paid_invoices.php'>
                <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='utype' value='".$_GET["utype"]."'>
                <input type=hidden name='selection' value='".$_GET["selection"]."'><input type=hidden name='statusupdate' value='".$_GET["statusupdate"]."'>
        	    <input type=hidden name='cid' value='".$_GET["cid"]."'><input type=hidden name='sheba' value='".$_GET["sheba"]."'>
        	    <input type=hidden name='processor' value='".$_GET["processor"]."'><input type=hidden name='poinz' value='".$_GET["poinz"]."'>
        	    <input type=hidden name='lid' value='".$_GET["lid"]."'><input type=hidden name='cname' value='".$_GET["cname"]."'>
        	    <input type=hidden name='lid_date_from' value='".$_GET["dfrom"]."'><input type=hidden name='lid_date_to' value='".$_GET["dto"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    
        
    }
    
?>

