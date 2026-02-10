<?php
    include("authenticator.php");
    include("head.php");
    $cdate=date("d-m-Y", time());
?>

<!DOCTYPE html>
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
    <body class='fade-in card mb-5' style='background-color:white;color:black' onload='printPDF2()' id='lineChartTitlex2'>
    <?php
        
        $tday=time();
        if(isset($_POST["pid"])) $pid=$_POST["pid"];
        else if(isset($_GET["pid"])) $pid=$_GET["pid"];
        else $pid=0;
        
        // echo"<meta http-equiv='refresh' content='5;url=workspace_budget_quotation.php?pid=$pid'>";
        
        if(isset($_GET["delid"])){
            $sql = "delete from quotation_budget_allocation where id='".$_GET["delid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["eid"])){
            
            if($_POST["statx"]==1){
                $sql="update quotation_budget_allocation set mon='".$_POST["mon"]."',tue='".$_POST["tue"]."',
                wed='".$_POST["wed"]."',thu='".$_POST["thu"]."',fri='".$_POST["fri"]."',sat='".$_POST["sat"]."',
                sun='".$_POST["sun"]."',evening='".$_POST["evening"]."',night='".$_POST["night"]."' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==2){
                // Convert "H:i" to seconds since midnight
                list($h1, $m1) = explode(':', $_POST["time1"]);
                list($h2, $m2) = explode(':', $_POST["time2"]);
                
                $seconds1 = $h1 * 3600 + $m1 * 60;
                $seconds2 = $h2 * 3600 + $m2 * 60;
                
                // Calculate time difference in seconds
                $diff_seconds = abs($seconds2 - $seconds1);
                
                // Convert back to hours and minutes
                $hours = floor($diff_seconds / 3600);
                $minutes = floor(($diff_seconds % 3600) / 60);
                if($hours<=9) $hours="0$hours";
                if($minutes<=9) $minutes="0$minutes";
                
                $sql="update quotation_budget_allocation set time1='".$_POST["time1"]."',time2='".$_POST["time2"]."',qty1='$hours',qty2='$minutes' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
        }
        
        if(isset($_POST["linenumber"])){
            $tomtom=0;
            $m1 = "select * from quotation_budget_allocation where item_number='".$_POST["linenumber"]."' and projectid='$pid' order by id desc limit 1";
            $m2 = $conn->query($m1);
            if ($m2->num_rows > 0) { while($m3 = $m2 -> fetch_assoc()) { $tomtom=1; } }
            
            // if($tomtom==0){
                
                $sc1 = "select * from ndis_line_numbers where id='".$_POST["linenumber"]."' order by id desc limit 1";
                $sc2 = $conn_main->query($sc1);
                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                    $supportname=$sc3["item_name"];
                    $supportlinenumber=$sc3["item_number"];
                    $supportprice=$sc3["national"];
                } }
                
                $date_fromx = time();
                $date_tox = strtotime('+1 year');
                
                $sql = "insert into quotation_budget_allocation (projectid,item_number,position,date,date_from,date_to,status,category,repeating,day1,day2,rate1,rate2,qty1,qty2) 
                VALUES ('".$_POST["pid"]."','".$_POST["linenumber"]."','0','$tday','$date_fromx','$date_tox','1','Plan Managed','Week Repeat','0','0','$supportprice','0','05','00')";
                if ($conn->query($sql) === TRUE) $tomtomx=0;
            // }
        }
        
        $wsp11 = "select * from quotes where id='$pid' order by id desc limit 1";
        $wsp22 = $conn->query($wsp11);
        if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
            echo"<section class='scroll-section' id='stripedRows' style='background-color:white;color:black'>
                <div class='card mb-5' style='background-color:white;color:black'>
                    <div class='card-body' style='background-color:white;color:black' >
                        <div class='row'>
                            <div class='col-12 col-md-6' style='text-align:left;color:black'>
                                <span style='font-size:20pt;color:black'><strong>Quotation</strong></span><br><br>
                                To,
                                ".$wsp33["name"].",<br>
                                NDIS No: ".$wsp33["ndis"].",<br><br>
                                Address: ".$wsp33["address"].",<br>
                                ".$wsp33["city"].", ".$wsp33["state"]."-".$wsp33["zip"].", ".$wsp33["country"]."<br>
                                Email: ".$wsp33["email"]."<br>
                                Contact No: ".$wsp33["phone"]."<br>
                            </div>
                            <div class='col-12 col-md-6' style='text-align:right;color:black'>
                                <img src='$logo' style='height:60px'><br><br>
                                Quotation No: ".$wsp33["id"]."<br>
                                Date: $cdate<br><br>
                                
                                $companynamex<br>
                                $abn_number<br>
                                Address: $addressx<br>
                                $cityx, $statex-$postalcodex, $countryx<br>
                                Phone: $phonex<br>
                                Email: $emailx<br>
                            </div>
                        </div>
                        <hr>
                        <table style='width:100%' class='table table-hover'>
                            <thead><tr>
                                <th style='text-align:left;color:black' scope='col' nowrap>No.</th>
                                <th style='text-align:left;color:black' scope='col' nowrap>Support Category</th>
                                <th style='text-align:left;color:black' scope='col' nowrap>Date</th>
                                <th style='text-align:left;color:black' scope='col' nowrap>Time</th>
                                <th style='text-align:right;color:black' scope='col' nowrap>Days</th>
                                <th style='text-align:right;color:black' scope='col' nowrap>Frequency</th>
                                <th style='text-align:right;color:black' scope='col' nowrap>Rate</th>
                                <th style='text-align:right;color:black' scope='col' nowrap>Total</th>
                            </tr></thead>
                            <tbody>";
                                $tts=0;
                                $budgetvaluex=0;
                                $budgetvalue=0;
                                $allocateddays=0;
                                $allocatedhours=0;
                                $totalamountx=0;
                                $ln1x = "select * from quotation_budget_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
                                $ln2x = $conn->query($ln1x);
                                if ($ln2x->num_rows > 0) { while($ln3 = $ln2x -> fetch_assoc()) {
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
                                        if($sc33["startdate"]>=$budget_date_from && $sc33["startdate"]<=$budget_date_to){
                                            if($sc33["enddate"]>=$budget_date_from && $sc33["enddate"]<=$budget_date_to){
                                                $diffInSecondsz = abs($sc33["startdate"] - $sc33["enddate"]);
                                                $tdaysz = floor($diffInSecondsz / (60 * 60 * 24));
                                                if($tdaysz<=0) $tdaysz=1;
                                                $hd1=($hd1+$tdaysz);
                                                $holidaytext="$holidaytext, ".$sc33["holidayname"]."";
                                            }
                                        }
                                    } }
                                    
                                    if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                                    
                                    $diffInSeconds = $budget_date_to - $budget_date_from;
                                    $diffInDays = $diffInSeconds / (60 * 60 * 24);
                                    $months = $diffInDays / 30.44;
                                    $months = round($months);
                                    
                                    // repeating wise day calculation
                                    $datefrom=date("d/m/Y", $budget_date_from);
                                    $dateto=date("d/m/Y", $budget_date_to);
                                    $start = DateTime::createFromFormat("d/m/Y", $datefrom);
                                    $end   = DateTime::createFromFormat("d/m/Y", $dateto);
                                    $end->setTime(23,59,59); // include end date
                                    
                                    $mondays = 0;
                                    $tuesdays = 0;
                                    $wednesdays = 0;
                                    $thursdays = 0;
                                    $fridays = 0;
                                    $saturdays = 0;
                                    $sundays = 0;
                                    
                                    while ($start <= $end) {
                                        if ($start->format('N') == 1) { $mondays++; }
                                        if ($start->format('N') == 2) { $tuesdays++; }
                                        if ($start->format('N') == 3) { $wednesdays++; }
                                        if ($start->format('N') == 4) { $thursdays++; }
                                        if ($start->format('N') == 5) { $fridays++; }
                                        if ($start->format('N') == 6) { $saturdays++; }
                                        if ($start->format('N') == 7) { $sundays++; }
                                        $start->modify('+1 day');
                                    }
                                    
                                    $wd=0;
                                    $repstatus=$ln3["repeating"];
                                    
                                    if($ln3["mon"]==1) $wd=($wd+$mondays);
                                    if($ln3["tue"]==1) $wd=($wd+$tuesdays);
                                    if($ln3["wed"]==1) $wd=($wd+$wednesdays);
                                    if($ln3["thu"]==1) $wd=($wd+$thursdays);
                                    if($ln3["fri"]==1) $wd=($wd+$fridays);
                                    if($ln3["sat"]==1) $wd=($wd+$saturdays);
                                    if($ln3["sun"]==1) $wd=($wd+$sundays);
                                    
                                    $wd=($wd-$hd1);
                                    
                                    if($ln3["repeating"]=="Fortnight Repeat"){
                                        $wd=($wd/2);
                                    }else if($ln3["repeating"]=="Month Repeat"){
                                        $wd=($wd/$months);
                                    }else if($ln3["repeating"]=="Once"){
                                        $wd=0;
                                        if($ln3["mon"]==1) $wd=($wd+1);
                                        if($ln3["tue"]==1) $wd=($wd+1);
                                        if($ln3["wed"]==1) $wd=($wd+1);
                                        if($ln3["thu"]==1) $wd=($wd+1);
                                        if($ln3["fri"]==1) $wd=($wd+1);
                                        if($ln3["sat"]==1) $wd=($wd+1);
                                        if($ln3["sun"]==1) $wd=($wd+1);
                                    }else{
                                        $wd=$wd;
                                    }
                                    
                                    if($wd<=0) $wd=0;
                                    
                                    if($ln3["time1"]==0) $tm1="08:00";
                                    else $tm1=$ln3["time1"];
                                    
                                    $tm1x="08:00";
                                    $tm1x = strtotime($tm1);
                                    if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                    else $tm2=$ln3["time2"];
                                    $tts=($tts+1);
                                                                            
                                    if($ln3["time1"]==0) $tm1="08:00";
                                    else $tm1=$ln3["time1"];
                                    
                                    $tm1x="08:00";
                                    $tm1x = strtotime($tm1);
                                    if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                    else $tm2=$ln3["time2"];
                                    
                                    $totalamount=0;
                                    $totalamount=($ln3["qty1"]*$wd);
                                    $totalamount=($totalamount*$ln3["rate1"]);
                                    $totalamountz = number_format($totalamount, 2, '.', ',');
                                    
                                    $totalspendy=0;
                                    $rv1x = "select * from receipt_voucher where proj_id='".$_COOKIE["projectidx"]."' and ndis_item='$supportlinenumber' and paid='10' order by id desc";
                                    $rv2x = $conn->query($rv1x);
                                    if ($rv2x->num_rows > 0) { while($rvx = $rv2x->fetch_assoc()) { $totalspendy=($totalspendy+$rvx["cr_amt"]); } }
                                    $totalsepndz = number_format($totalspendy, 2, '.', ',');
                                    
                                    $totalbalance=($totalamount-$totalspendy);
                                    $totalbalancez = number_format($totalbalance, 2, '.', ',');
                                    
                                    if($totalamount==0) $totalpercent=0;
                                    else $totalpercent=round(($totalspendy/$totalamount) * 100);
                                    
                                    echo"<tr style='padding:10px;color:black'>
                                        <td scope='row' style='font-size:10pt;width:5%;color:black'><span style='font-size:10pt'>$tts.</span></td>
                                        <td scope='row' style='font-size:10pt;width:35%;color:black'>
                                            <span style='font-size:10pt;color:black'>$supportlinenumber</span><br>
                                            <span style='font-size:10pt;color:black'>$supportname</span><br>
                                            <table style='width:100%'><tr>";
                                                if($ln3["mon"]==1) $d1="fa-check-square"; else $d1="fa-square-o";
                                                if($ln3["tue"]==1) $d2="fa-check-square"; else $d2="fa-square-o";
                                                if($ln3["wed"]==1) $d3="fa-check-square"; else $d3="fa-square-o";
                                                if($ln3["thu"]==1) $d4="fa-check-square"; else $d4="fa-square-o";
                                                if($ln3["fri"]==1) $d5="fa-check-square"; else $d5="fa-square-o";
                                                if($ln3["sat"]==1) $d6="fa-check-square"; else $d6="fa-square-o";
                                                if($ln3["sun"]==1) $d7="fa-check-square"; else $d7="fa-square-o";
                                                // if($ln3["evening"]==1) $d8="fa-check-square"; else $d8="fa-square-o";
                                                if($ln3["night"]==1) $d9="fa-check-square"; else $d9="fa-square-o";
                                                
                                                echo"<td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Mon<br><i class='fa $d1'></i></td>
                                                <td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Tue<br><i class='fa $d2'></i></td>
                                                <td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Wed<br><i class='fa $d3'></i></td>
                                                <td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Thu<br><i class='fa $d4'></i></td>
                                                <td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Fri<br><i class='fa $d5'></i></td>
                                                <td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Sat<br><i class='fa $d6'></i></td>
                                                <td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Sun<br><i class='fa $d7'></i></td>";
                                                // echo"<td style='padding:5px;text-align:center;font-size:10pt;width:12.5%'>Ev.<br><i class='fa $d8'></i></td>";
                                                echo"<td style='padding:5px;text-align:center;font-size:10pt;width:12.5%;color:black'>Night<br><i class='fa $d9'></i></td>
                                            </tr></table>
                                        </td>
                                        <td style='width:30%;text-align:left;color:black' nowrap><span style='font-size:10pt'>Start: $datefrom<br>End: $dateto</span></td>
                                        <td style='width:30%;text-align:left;color:black' nowrap><span style='font-size:10pt'>From: $tm1<br>To: $tm2</span></td>
                                        <td style='width:30%;text-align:left;color:black' nowrap><span style='font-size:10pt'>$wd Days</spant><br><span style='font-size:10pt'>".$ln3["repeating"]."</b></span></td>
                                        <td style='width:30%;text-align:left;color:black' nowrap><span style='font-size:10pt'>".$ln3["qty1"].":".$ln3["qty2"]." Hours</spant></td>
                                        <td style='width:30%;text-align:right;color:black' nowrap><span style='font-size:10pt'>$ ".$ln3["rate1"]."</spant></td>
                                        <td style='width:30%;text-align:right;color:black' nowrap><span style='font-size:10pt'>$totalamountz</spant></td>
                                    </tr>";
                                    
                                    $totalamountx=($totalamountx+$totalamount);
                                    $allocateddays=($allocateddays+$wd);
                                    $allocatedhours=($allocatedhours+$ln3["qty1"]);
                                    $allocatedminutes=($allocatedminutes+$ln3["qty2"]);
                                } }
                                                                    
                                $totalamounty = number_format($totalamountx, 2, '.', ',');
                                echo"<tr class=''>
                                    <td nowrap align=right colspan=7 style='font-size:10pt'><b>Total:</b></td>
                                    <td nowrap align=right style='font-size:10pt'><b>$ $totalamounty</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>";
        } }
    
        include("scripts.php");
        
        ?>
        <script>
            // Wait until DOM is fully loaded
            window.addEventListener('DOMContentLoaded', () => {
                document.body.classList.add('fade-in-loaded');
            });
        </script>
    </body>
</html>
