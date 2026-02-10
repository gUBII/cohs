<?php 

    // error_reporting(0); 
    date_default_timezone_set("Australia/Melbourne");
    
    include("../include.php");
    
    if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
    if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
    if(isset($userid)){
        
        $r2x = "select * from companysetting where id='1' order by id asc limit 1";
        $r2y = $conn->query($r2x);
        if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
            $companyname=$r2z["companyname"];
            $phonexyz=$r2z["phone"];
            $emailxyz=$r2z["email"];
            $websitexyz=$r2z["website"];
            $addressxyz=$r2z["address"];
            $cityx=$r2z["city"];
            $statex=$r2z["state"];
            $postalcodex=$r2z["postalcode"];
            $countryx=$r2z["country"];
            $currencycode=$r2z["currencycode"];
            $currencysymbol=$r2z["currencysymbol"];
            $language=$r2z["language"];
            $cashbook=$r2z["cashbook"];
            $bankbook=$r2z["bankbook"];
            $companydetail=$r2z["companydetail"];
            $imagexyz=$r2z["image"];
            $themexyz=$r2z["theme"];
            $status=$r2z["status"];
            $ndis_number=$r2z["ndis_number"];
            $abn_number=$r2z["abn_number"];
            $bsb_number=$r2z["bsb_number"];
            $ac_number=$r2z["ac_number"];
        } }
        
        if(isset($_POST["ledgerid"])) $ledgerid=$_POST["ledgerid"];
        if(isset($_POST["invoiceid"])) $invoiceid=$_POST["invoiceid"];
        
        if(isset($_GET["ledgerid"])) $ledgerid=$_GET["ledgerid"];
        if(isset($_GET["invoiceid"])) $invoiceid=$_GET["invoiceid"];
        
        $a1 = "select * from receipt_voucher where ledger_id='$ledgerid' and invoice_no2='$invoiceid' order by id asc limit 1";
        $a2 = $conn->query($a1);
        if ($a2->num_rows > 0) {
            while($rs = $a2->fetch_assoc()) {
                
                $rid=$rs["id"];
                
                $clientname="";
                $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
                $r1y = $conn->query($r1x);
                if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                    $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                    $clientphone=$r1z["phone"];
                    $clientemail=$r1z["email"];
                    $cp_name=$r1z["pm_name"];
                    $cp_phone=$r1z["pm_mobile"];
                    $cp_email=$r1z["pm_email"];
                    
                    if($r1z["ndis_number"]!='') $client_ndis_number=$r1z["ndis_number"];
                    else $client_ndis_number=$r1z["ndis"];
                    
                    // $client_ndis_number=$r1z["uid"];
                    if($client_ndis_number==0) $client_ndis_number="";
                } }
            
                $query = $conn->query("select * from receipt_voucher where invoice_no2='".$rs["invoice_no2"]."' and ledger_id='".$rs["ledger_id"]."' and paid='1' order by ledger_id desc"); 
                if($query->num_rows > 0){ 
                    $delimiter = ",";
                    $filename = "invoice_$rid.csv"; 
                    $f = fopen('php://memory', 'w');
                    
                    // $fields = array_keys(current($users));
                    $fields = array('RegistrationNumber', 'NDISNumber', 'SupportsDeliveredFrom', 'SupportsDeliveredTo', 'SupportNumber', 'ClaimReference', 'Quantity', 'Hours', 'UnitPrice', 'GSTCode', 'AuthorisedBy', 'ParticipantApproved', 'InKindFundingProgram', 'ClaimType', 'CancellationReason', 'ABN of Support Provider');
                    
                    fputcsv($f, $fields, $delimiter); 
                 
                    while($row = $query->fetch_assoc()){
                        // $dfrom=date("d-m-Y",$row["date_from"]);
                        // $dto=date("d-m-Y",$row["date_to"]);
                        
                        $dfrom=$row["date_from"];
                        $dto=$row["date_to"];
                        
                        $ratez=0;
                        $amountz=0;
                        setlocale(LC_MONETARY, 'en_AU.UTF-8');
                        $ratez= $row["rate"];
                        $amountz= $row["cr_amt"];
                        $gstcode="P2";
                        $aby="$cp_name ($cp_phone, $cp_email)";
                        $pa="YES";
                        $ikfp=" ";
                        $cr= $row["claim_type"];
                        
                        /*
                        if($ct=="DS") $cr="Direct Service";
                        if($ct=="NSDH") $cr="NCancelled – No show (Health reason)";
                        if($ct=="NSDF") $cr="Cancelled – No show (Family issues)";
                        if($ct=="NSDT") $cr="Cancelled – No show (Transport issue)";
                        if($ct=="NSDO") $cr="Cancelled – No show (Other)";
                        if($ct=="NRR") $cr="NDIS Required Report";
                        if($ct=="PT") $cr="Provider Travel";
                        if($ct=="NF2F") $cr="Non-Face-to-Face Services";
                        if($ct=="TH") $cr="Telehealth Supports";
                        if($ct=="ISIL") $cr="Irregular SIL Supports";
                        */
                        if($cr=="DS") $crd="Direct Service";
                        if($cr=="NSDH") $crd="NCancelled – No show (Health reason)";
                        if($cr=="NSDF") $crd="Cancelled – No show (Family issues)";
                        if($cr=="NSDT") $crd="Cancelled – No show (Transport issue)";
                        if($cr=="NSDO") $crd="Cancelled – No show (Other)";
                        if($cr=="NRR") $crd="NDIS Required Report";
                        if($cr=="PT") $crd="Provider Travel";
                        if($cr=="NF2F") $crd="Non-Face-to-Face Services";
                        if($cr=="TH") $crd="Telehealth Supports";
                        if($cr=="ISIL") $crd="Irregular SIL Supports";
                        
                        
                        if($cr=="DS") $crd="Direct Service";
                        if($cr=="NSDH") $crd="NCancelled – No show (Health reason)";
                        if($cr=="NSDF") $crd="Cancelled – No show (Family issues)";
                        if($cr=="NSDT") $crd="Cancelled – No show (Transport issue)";
                        if($cr=="NSDO") $crd="Cancelled – No show (Other)";
                        if($cr=="NRR") $crd="NDIS Required Report";
                        if($cr=="PT") $crd="Provider Travel";
                        if($cr=="NF2F") $crd="Non-Face-to-Face Services";
                        if($cr=="TH") $crd="Telehealth Supports";
                        if($cr=="ISIL") $crd="Irregular SIL Supports";
                        
                        if($cr=="DS") $ct="SERV";
                        if($cr=="NSDH") $ct="CANC";
                        if($cr=="NSDF") $ct="CANC";
                        if($cr=="NSDT") $ct="CANC";
                        if($cr=="NSDO") $ct="CANC";
                        if($cr=="NRR") $ct="REPORT";
                        if($cr=="PT") $ct="TRANS";
                        if($cr=="NF2F") $ct="NF2F";
                        if($cr=="TH") $ct="TELE";
                        if($cr=="ISIL") $ct="IRRSIL";
                        
                        /*
                        SERV	Standard service claim (for delivered supports)
                        CANC	Cancellation claim (for participant no-shows, where allowed)
                        REPORT	Report-writing claim (e.g., NDIS required reports)
                        TRANS	Provider travel claim (travel time or transport)
                        NF2F	Non Face-to-Face claim (e.g., care coordination or documentation)
                        TELE	Telehealth claim
                        IRRSIL	Irregular Supported Independent Living claim
                        */
                        
                        // 'RegistrationNumber', 'NDISNumber', 'SupportsDeliveredFrom', 'SupportsDeliveredTo', 'SupportNumber', 'ClaimReference', 'Quantity', 'Hours', 'UnitPrice', 'GSTCode', 'AuthorisedBy', 'ParticipantApproved', 'InKindFundingProgram', 'ClaimType', 'CancellationReason', 'ABN of Support Provider'
                        
                        $lineData = array($rid, $client_ndis_number, $dfrom, $dto, $row['ndis_item'], $row['invoice_no2'], $row['hours'], $ratez, $amountz, $gstcode, $aby, $pa, $ikfp, $ct, $cr, $abn_number);
                        
                        fputcsv($f, $lineData, $delimiter);
                    }
                    
                    fseek($f, 0);
                    header('Content-Type: text/csv');
                    header('Content-Disposition: attachment; filename="' . $filename . '";');
                    fpassthru($f); 
                }
                fclose($f);
                exit;
            }
        }
    }