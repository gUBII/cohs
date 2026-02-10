<?php
    error_reporting(0);
    
    include('../authenticator.php');
    
    if(isset($_COOKIE["userid"])){
        
        $idtotal=strlen($_GET["pid"]);
        $idstatus=0;
        $idtotal1=($idtotal-1);
        $idstatus=substr($_GET["pid"],$idtotal1,1);
        
        $pid=0;
        $idtotal2=($idtotal-2);
        $pid=substr($_GET["pid"],0,$idtotal2);
        $xid=$_GET["xid"];
        
        if(isset($_GET["xid"])){
            $clientid="CLIENTS";
            $randid=time();
            $filenamex="$clientid-$randid";
            $file = fopen("../media/myob/MYOB-INV-$filenamex.txt", "w");
            $headers = "{}\nCard ID,Customer PO,Job,Date,Invoice No.,Quantity,Price,Total,Description,Item Number,Tax Code\n";
            
            fwrite($file, $headers);
            
                $s = "select * from receipt_voucher where identifier='INCOME' and ledger_id='800000032' and paid='1' order by id asc";
                $r = $conn->query($s);
                if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                    
                    $datatargetX="category".$rs["id"]."X";
                    $datatargetXX="category".$rs["id"]."XX";
                    $datatargetY="category".$rs["id"]."Y";
                    $datatargetZ="category".$rs["id"]."Z";
                    $categoryX="cat".$rs["id"]."Z";
                    $categoryY="cat".$rs["id"]."Y";
                    $t=$rs["id"];
                    
                    $totpaid=0;
                    $s1 = "select * from receipt_voucher where invoice_no2='".$rs["invoice_no2"]."' order by invoice_no2";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["cr_amt"]+$totpaid); } }
                    
                    $date=date("d/M/Y",$rs["receipt_date"]);
                    
                    $clientname="";
                    $cp_phone=0;
                    $client_ndis_number=0;
                    $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
                    $r1y = $conn->query($r1x);
                    if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                        $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                        $clientphone=$r1z["phone"];
                        $clientemail=$r1z["email"];
                        $cp_name=$r1z["pm_name"];
                        $cp_phone=$r1z["pm_mobile"];
                        $cp_email=$r1z["pm_email"];
                        $ndis_no=$r1z["ndis"];
                        // $client_ndis_number=$r1z["ndis_number"];
                        $client_ndis_number=$r1z["uid"];
                        if($client_ndis_number==0) $client_ndis_number="";
                        
                        if(strlen($r1z["application_id"])<=1) $application_id="".$r1z["ndis"]."-$clientname";
                        else $application_id=$r1z["application_id"];
                        
                    } }
                    
                    $invoiceprint="printinv".$rs["id"]."";
                    
                    $randomid=rand(100000000000,999999999999);
                
                    $ttx1=0;
                    $r1 = "select * from receipt_voucher where invoice_no2='".$rs["invoice_no2"]."' and ledger_id='".$rs["ledger_id"]."' and paid='1' order by ledger_id desc";
                    $r1x = $conn->query($r1);
                    if ($r1x->num_rows > 0) { while($r1yy = $r1x -> fetch_assoc()) {
                        // $dfrom=date("d-m-Y",$r1yy["date_from"]);
                        // $dto=date("d-m-Y",$r1yy["date_to"]);
                        
                        $dfrom=$r1yy["date_from"];
                        $dto=$r1yy["date_to"];
                        
                        $ratez=0;
                        setlocale(LC_MONETARY, 'en_AU.UTF-8');
                        $ratez= $r1yy["rate"];
                        
                        setlocale(LC_MONETARY, 'en_AU.UTF-8');
                        $amountz=0;
                        $amountz= $r1yy["cr_amt"];
                        
                        $card_id=$rs["invoice_no"];
                        /*
                        if($rs["invoice_no"]<=0){
                            $card_id=$rs["received_from"];
                        }else{
                            $ra1 = "select * from ndis_card_number where card_number='".$rs["cc_code"]."' order by id desc limit 1";
                            $rb1 = $conn->query($ra1);
                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) { $card_id=$rab1["card_number"]; } }
                        }
                        */
                        $job="";
                        
                        $hours = $r1yy["hours"];
                        $minutes = $hours * 60;
                        $hh = floor($minutes / 60);
                        $mm = $minutes % 60;
                        $total_hours=sprintf("%02d:%02d", $hh, $mm);
                        
                        $ndis_item_number= preg_replace('/\s+/', '', $r1yy["ndis_item"]);
                        
                        $line = "$card_id, $application_id, $job, $date, ".$rs["invoice_no2"].", $total_hours, \"$$ratez\", \"$$amountz\", ".$r1yy["narration"].", $ndis_item_number, FRE\n";
                        fwrite($file, $line);

                        $ttx1=($r1yy["cr_amt"]+$ttx1);
                    } }
                    
                } }
            
            fclose($file);
            
            // DELETE PREVIOUS FILES AND OPENING NEW TEXT FILE FOR MYOB PAYROLL
            $directory = '../media/myob';
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
            
            $filex = "../media/myob/MYOB-INV-$filenamex.txt";
            if (file_exists($filex)) {
                header('Content-Description: File Transfer');
                header('Content-Type: text/plain');
                header('Content-Disposition: attachment; filename="' . basename($filex) . '"');
                header('Content-Length: ' . filesize($filex));
                readfile($filex);
                exit;
            }
            
            echo "Data File successfully created. Please click here to download: <a href='../media/myob/MYOB-INV-$filenamex.txt'>Copy/Download Text File for MYOB</a>";
        
        }else{
            $s = "select * from receipt_voucher where id='$pid' order by id limit 1";
            $r = $conn->query($s);
            if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                
                $datatargetX="category".$rs["id"]."X";
                $datatargetXX="category".$rs["id"]."XX";
                $datatargetY="category".$rs["id"]."Y";
                $datatargetZ="category".$rs["id"]."Z";
                $categoryX="cat".$rs["id"]."Z";
                $categoryY="cat".$rs["id"]."Y";
                $t=$rs["id"];
                
                $totpaid=0;
                $s1 = "select * from receipt_voucher where invoice_no2='".$rs["invoice_no2"]."' order by invoice_no2";
                $r1 = $conn->query($s1);
                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["cr_amt"]+$totpaid); } }
                
                $date=date("d/M/Y",$rs["receipt_date"]);
                
                $clientname="";
                $cp_phone=0;
                $client_ndis_number=0;
                $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
                $r1y = $conn->query($r1x);
                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                    $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                    $clientphone=$r1z["phone"];
                    $clientemail=$r1z["email"];
                    $cp_name=$r1z["pm_name"];
                    $cp_phone=$r1z["pm_mobile"];
                    $cp_email=$r1z["pm_email"];
                    // $client_ndis_number=$r1z["ndis_number"];
                    $client_ndis_number=$r1z["uid"];
                    if($client_ndis_number==0) $client_ndis_number="";
                    
                    if(strlen($r1z["application_id"])<=1) $application_id="".$r1z["ndis"]."-$clientname";
                    else $application_id=$r1z["application_id"];
                    
                } }
                
                $invoiceprint="printinv".$rs["id"]."";
                
                $randomid=rand(100000000000,999999999999);
            
                if($idstatus==1){
                    
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
                    
                    $clientid=$rs["received_from"];
                    $randid=time();
                    $filenamex="$clientid-$randid";
                    $file = fopen("../media/myob/MYOB-INV-$filenamex.txt", "w");
                    $headers = "{}\nCard ID,Customer PO,Job,Date,Invoice No.,Quantity,Price,Total,Description,Item Number,Tax Code\n";
                    fwrite($file, $headers);
                    
                        $ttx1=0;
                        $r1 = "select * from receipt_voucher where invoice_no2='".$rs["invoice_no2"]."' and ledger_id='".$rs["ledger_id"]."' and paid='1' order by ledger_id desc";
                        $r1x = $conn->query($r1);
                        if ($r1x->num_rows > 0) { while($r1y1 = $r1x -> fetch_assoc()) {
                            // $dfrom=date("d-m-Y",$r1y1["date_from"]);
                            // $dto=date("d-m-Y",$r1y1["date_to"]);
                            
                            $dfrom=$r1y1["date_from"];
                            $dto=$r1y1["date_to"];
                            
                            $ratez=0;
                            setlocale(LC_MONETARY, 'en_AU.UTF-8');
                            $ratez= $r1y1["rate"];
                            
                            setlocale(LC_MONETARY, 'en_AU.UTF-8');
                            $amountz=0;
                            $amountz= $r1y1["cr_amt"];
                            
                            $card_id=$rs["invoice_no"];
                            /*
                            if($rs["cc_code"]<=0) $card_id=$rs["received_from"];
                            else{
                                $card_id=0;
                                $ra1 = "select * from ndis_card_number where id='".$rs["cc_code"]."' order by id desc limit 1";
                                $rb1 = $conn->query($ra1);
                                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) { $card_id=$rab1["card_number"]; } }
                            }
                            */
                            
                            $job="";
                            
                            $hours = $r1y1["hours"];
                            $minutes = $hours * 60;
                            $hh = floor($minutes / 60);
                            $mm = $minutes % 60;
                            $total_hours=sprintf("%02d:%02d", $hh, $mm);
                            $tqty = $r1y1["milage"];
                            $tvalue = "1";
                            $ttotal =($tqty*$tvalue);
                            
                            $ndis_item_number= preg_replace('/\s+/', '', $r1y1["ndis_item"]);
                            $line = "$card_id,$application_id,$job,$date,".$rs["invoice_no2"].",$total_hours,\"$$ratez\",\"$$amountz\",".$r1y1["narration"].",$ndis_item_number,FRE\n";
                            fwrite($file, $line);
                            
                            /*
                            $narration="ABT - Activity Based Transport - Participation In Community Social And Civic Activities - Assistance with social and community participation 0 KM on $date";
                            $line = "$card_id,$application_id,$job,$date,".$rs["invoice_no2"].",$tqty,$$tvalue,$$ttotal,$narration,$ndis_item_number,FRE\n";
                            fwrite($file, $line);
                            */
                            
                            
                            // $clientname $dfrom, $dto";
                            $ttx1=($r1y1["cr_amt"]+$ttx1);
                        } }
                        
                        fclose($file);
                        
                        $filex = "../media/myob/MYOB-INV-$filenamex.txt";
                        if (file_exists($filex)) {
                            header('Content-Description: File Transfer');
                            header('Content-Type: text/plain');
                            header('Content-Disposition: attachment; filename="' . basename($filex) . '"');
                            header('Content-Length: ' . filesize($filex));
                            readfile($filex);
                            exit;
                        }
                        echo "Data File successfully created. Please click here to download: <a href='../media/myob/MYOB-INV-$filenamex.txt'>Copy/Download Text File for MYOB</a>";
        
                        $invoice_total=0;
                        setlocale(LC_MONETARY, 'en_AU.UTF-8');
                        $invoice_total= $ttx1;
                        // echo"<hr><b>Invoice Total: $invoice_total</b>, ACCOUNT NAME:</b> $companynamex, BSB:</b> $bsb_number, ACCOUNT:</b> $ac_number";
                    
                }
            } }
        }
    }
    
    
    
?>