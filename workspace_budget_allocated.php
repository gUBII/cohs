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
    <body class='fade-in card mb-5'>
        <div><?php
        
            include("authenticator.php");
            include("head.php");
    
            $tday=time();
            $pidz=$_GET["pidz"];
            $rate3=0;
            echo"<meta http-equiv='refresh' content='5;url=workspace_budget_allocated.php?pidz=$pidz'>";
            
            $wsp11 = "select * from project where id='$pidz' order by id desc limit 1";
            $wsp22 = $conn->query($wsp11);
            if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {

                $totalamountx=0;
                $ln1 = "select * from project_budget_allocation where projectid='".$wsp33["id"]."' order by id asc";
                $ln2 = $conn->query($ln1);
                if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                    
                    if($ln3["date_from"]!=0) $bsdate=date("Y-m-d",$ln3["date_from"]); else $bsdate=date("Y-m-d",time());
                    if($ln3["date_to"]!=0) $bedate=date("Y-m-d",$ln3["date_to"]); else $bedate=date("Y-m-d",time());
                    $budget_date_from=$ln3["date_from"];
                    $budget_date_to=$ln3["date_to"];
                
                    $sc1 = "select * from ndis_line_numbers where id='".$ln3["item_number"]."' order by id desc limit 1";
                    $sc2 = $conn_main->query($sc1);
                    if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                        $supportname=$sc3["item_name"];
                        $supportlinenumber=$sc3["item_number"];
                        $supportprice=$sc3["national"];
                    } }
                    
                    $hd1=0;
                    $holidaytext="Holidays on";
                    $sc11 = "select * from australian_holidays where status='1' order by id asc";
                    $sc22 = $conn_main->query($sc11);
                    if ($sc22->num_rows > 0) { while($sc33 = $sc22 -> fetch_assoc()) {
                        if($sc33["date_ts"]>=$ln3["date_from"] && $sc33["date_ts"]<=$ln3["date_to"]){
                            $hd1=($hd1+1);
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
                    
                    $wd=round($wd);
                    
                    // echo "[ $mondays | $tuesdays | $wednesdays | $thursdays | $fridays | $saturdays | $sundays ]";
                    
                    if($wd<=0) $wd=0;
                    
                    if($ln3["time1"]==0) $tm1="08:00";
                    else $tm1=$ln3["time1"];
                    
                    $tm1x="08:00";
                    $tm1x = strtotime($tm1);
                    if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                    else $tm2=$ln3["time2"];
                        
                    $totalamount=0;
                    $totalamount=($ln3["qty1"]*$wd);
                    $totalamount=($totalamount*$ln3["rate1"]);
                    
                    $totalamountx=($totalamountx+$totalamount);
                    
                    $positiveBalance = abs($totalamountx);
                    $positiveBalance = round($positiveBalance);
                    
                    $allocateddays=($allocateddays+$wd);
                    $allocatedhours=($allocatedhours+$ln3["qty1"]);
                    $allocatedminutes=($allocatedminutes+$ln3["qty2"]);
                    $rate3=($rate3+$ln3["rate3"]);
                } }
                    
                $positiveBalance=($positiveBalance+$rate3);
                
                if($allocatedminutes>=61){
                    $amx = floor($allocatedminutes / 60);
                    $allocatedhours=round($allocatedhours+$amx);
                    $allocatedminutes = $allocatedminutes % 60;
                }
                
                $bbalance=($wsp33["budget_value"]-$totalamountx);
                $bbalancex = number_format($bbalance, 2, '.', ',');
                
                $budgetvalue=$wsp33["budget_value"];
                $budgetvalue=round($budgetvalue);
                $budgetvalue = number_format($budgetvalue, 2, '.', ',');
                
                if($positiveBalance!=$wsp33["budget_value"]){
                    $sql="update project set budget_value='$positiveBalance' where id='".$wsp33["id"]."'";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                
                $finalvalue = number_format($positiveBalance, 2, '.', ',');
                
                echo"<div style='width:100%;align:right;text-align:right'>
                    <form method='post' name='stage2c' action='workspace_budget.php' enctype='multipart/form-data' class='tooltip-end-bottom'>
                        <input type='hidden' name='processor' value='new_workspace_PROJECT2'><input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='stat' value='3'>
                        <table align=right>";
                            echo"<tr><td style='font-size:10pt'>Allocated Days</td><td style='font-size:12pt'>:</td><td align=right style='font-size:12pt'><b>$allocateddays Days</b></td></tr>";
                            echo"<tr><td style='font-size:10pt'>Allocated Schedule Hours</td><td style='font-size:12pt'>:</td><td align=right style='font-size:12pt'><b>$allocatedhours : $allocatedminutes Hours</b></td></tr>";
                            // echo"<tr><td style='font-size:10pt'><hr>Budget Amount</td><td style='font-size:10pt'><hr>:</td><td align=right style='font-size:10pt'><hr><b>$ $budgetvalue</b></td></tr>";
                            // echo"<tr><td style='font-size:10pt'>Allocated Amount</td><td style='font-size:10pt'>:</td><td align=right style='font-size:10pt'><b>$ $totalamounty</b></td></tr>";
                            echo"<tr><td style='font-size:10pt'><hr><b>Budget Amount Valuation</b></td><td style='font-size:12pt'><hr>:</td><td align=right style='font-size:12pt'><hr><b>$ $finalvalue</b></td></tr>";
                        echo"</table>
                    </form>
                </div>
                <Br><Br><Br><Br><Br>
            </div>";
                
        } }
    
        include("scripts.php"); ?>
        <script>
            // Wait until DOM is fully loaded
            window.addEventListener('DOMContentLoaded', () => {
                document.body.classList.add('fade-in-loaded');
            });
        </script>
    </body>
</html>
