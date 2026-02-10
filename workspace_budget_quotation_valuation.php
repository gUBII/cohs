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
    <body class='fade-in'><?php
        
        include("authenticator.php");
        include("head.php");
        
        $tday=time();
        if(isset($_POST["pid"])) $pid=$_POST["pid"];
        else if(isset($_GET["pid"])) $pid=$_GET["pid"];
        else $pid=0;
        
        if(isset($_POST["eid"])){
            
            if($_POST["statx"]==1){
                $sql="update quotation_budget_allocation set mon='".$_POST["mon"]."',tue='".$_POST["tue"]."',
                wed='".$_POST["wed"]."',thu='".$_POST["thu"]."',fri='".$_POST["fri"]."',sat='".$_POST["sat"]."',
                sun='".$_POST["sun"]."',night='".$_POST["night"]."' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==2){
                list($h1, $m1) = explode(':', $_POST["time1"]);
                list($h2, $m2) = explode(':', $_POST["time2"]);
                
                $seconds1 = $h1 * 3600 + $m1 * 60;
                $seconds2 = $h2 * 3600 + $m2 * 60;
                
                // Handle crossing midnight
                if($seconds2 < $seconds1){
                    $seconds2 += 24 * 3600; // add 24 hours
                }
            
                $diff_seconds = $seconds2 - $seconds1;
                
                $hours = floor($diff_seconds / 3600);
                $minutes = floor(($diff_seconds % 3600) / 60);
            
                if($hours <= 9) $hours = "0$hours";
                if($minutes <= 9) $minutes = "0$minutes";
            
                $sql="UPDATE quotation_budget_allocation 
                      SET time1='".$_POST["time1"]."',
                          time2='".$_POST["time2"]."',
                          qty1='$hours',
                          qty2='$minutes' 
                      WHERE id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==3){
                $date_from=strtotime($_POST["date_from"]);
                $sql="UPDATE quotation_budget_allocation SET date_from='$date_from' WHERE id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==4){
                $date_to=strtotime($_POST["date_to"]);
                $sql="UPDATE quotation_budget_allocation SET date_to='$date_to' WHERE id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }

            if($_POST["statx"]==7){
                
                $sc1 = "select * from ndis_line_numbers where id='".$_POST["linenumberx"]."' order by id desc limit 1";
                $sc2 = $conn_main->query($sc1);
                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                    $supportname=$sc3["item_name"];
                    $supportlinenumber=$sc3["item_number"];
                    $supportprice=$sc3["national"];
                } }
                
                $sql="update quotation_budget_allocation set item_number='".$_POST["linenumberx"]."',rate1='$supportprice' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==8){
                $sql="update quotation_budget_allocation set category='".$_POST["category"]."',repeating='".$_POST["repeating"]."' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            if($_POST["statx"]==18){
                $rate3=($_POST["qty3"]*156.3);
                $sql="update quotation_budget_allocation set qty3='".$_POST["qty3"]."',rate3='$rate3' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
        }
        
        $totalamountx=0;
        $tt=0;
        $zid=0;
        if(isset($_GET["zid"])) $zid=$_GET["zid"];
        if(isset($_POST["zid"])) $zid=$_POST["zid"];
        
        if($zid!=0){
            $ln1 = "select * from quotation_budget_allocation where id='$zid' order by id asc limit 1";
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
                
                
                echo"<div class='card mb-5'>
                    <table style='width:100%' class='table'><tr>
                        <td style='width:10%;text-align:left;font-size:10pt' nowrap>$wd Days <br>Excluding<br>$hd1 Holidays</td>
                        <td style='width:10%;text-align:right;font-size:10pt' nowrap>".$ln3["qty1"].":".$ln3["qty2"]." Hours<br>";
                        
                            if($ln3["night"]==1) echo"[ Overnight ]";
                            if($hd1>=1){
                                if($ln3["qty3"]==0){
                                    $qty3=$hd1;
                                    $rate3=($qty3*156.3);
                                    $sql="update quotation_budget_allocation set qty3='$qty3',rate3='$rate3' where id='".$ln3["id"]."'";
                                    if ($conn->query($sql) === TRUE) $tomtom=0;
                                }else{
                                    $qty3=$ln3["qty3"];
                                }
                                $rate3=($qty3*156.03);
                                
                                echo"<form method='post' name='form_3000' action='workspace_budget_quotation_valuation.php' target='_self' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                    <input type='hidden' name='pid' value='".$ln3["projectid"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'>
                                    <input type='hidden' name='zid' value='".$ln3["id"]."'><input type=hidden name=statx value=18>
                                    <input type=text name=qty3 value='$qty3' class='form-control' style='width:50px' onchange='this.form.submit();'>
                                </form>";
                            }
                            
                        echo"</td>
                        <td style='width:10%;text-align:right;font-size:10pt' nowrap>$".$ln3["rate1"]." (wd)<br>";
                            if($hd1>=1){ echo"$156.03 (ph)"; }
                        echo"</td>
                        <td style='width:10%;text-align:right;font-size:10pt' nowrap><b>";
                            $totalamount=0;
                            $totalamount=($ln3["qty1"]*$wd);
                            $totalamount=($totalamount*$ln3["rate1"]);
                            $totalamountz = number_format($totalamount, 2, '.', ',');
                            echo"$ $totalamountz</b><br>
                            $ $rate3
                        </td>
                    </tr></table>
                </div>";
                
            } }
        }
        
        include("scripts.php"); ?>
        
        <script>
            // Wait until DOM is fully loaded
            window.addEventListener('DOMContentLoaded', () => {
                document.body.classList.add('fade-in-loaded');
            });
        </script>
    </body>
</html>