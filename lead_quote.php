<?php
    include("authenticator.php");
    include("head.php");
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
    <body class='fade-in'>
    <?php
        
        if(isset($_GET["lid"])){
            $tomtom=0;
            $l1 = "select * from project_lead where leadid='".$_GET["lid"]."' order by id desc limit 1";
            $l2 = $conn->query($l1);
            if ($l2->num_rows > 0) { while($l3 = $l2 -> fetch_assoc()) { $tomtom=1; } }
        
            if($tomtom==0){
                $sql = "insert into project_lead (leadid,status) VALUES (".$_GET["lid"].",'15')";
                if ($conn->query($sql) === TRUE) $tomtomx=0;
            }
        }
        
        $tday=time();
        if(isset($_POST["lid"])) $pid=$_POST["lid"];
        else if(isset($_GET["lid"])) $pid=$_GET["lid"];
        else $pid=0;
        
        if(isset($_GET["delid"])){
            $sql = "delete from project_team_allocation_lead where id='".$_GET["delid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["eid"])){
            
            if($_POST["statx"]==1){
                $sql="update project_team_allocation_lead set mon='".$_POST["mon"]."',tue='".$_POST["tue"]."',
                wed='".$_POST["wed"]."',thu='".$_POST["thu"]."',fri='".$_POST["fri"]."',sat='".$_POST["sat"]."',
                sun='".$_POST["sun"]."',evening='".$_POST["evening"]."' where id='".$_POST["eid"]."'";
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
                
                $sql="update project_team_allocation_lead set time1='".$_POST["time1"]."',time2='".$_POST["time2"]."',qty1='$hours',qty2='$minutes' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
        }
        
        if(isset($_POST["linenumber"])){
            $mm1 = "select * from project_lead where status='15' and id='".$_POST["id"]."' order by id desc limit 1";
            $nn1 = $conn->query($mm1);
            if ($nn1->num_rows > 0) { while($mn1 = $nn1 -> fetch_assoc()) {
                $tdaysx=0;
                $date1x=0;
                $date2x=0;
                $date1x=$mn1["budget_date"];
                $date2x=$mn1["budget_close_date"];
                $diffInSecondsx = abs($date2x - $date1x);
                $tdaysx = floor($diffInSecondsx / (60 * 60 * 24));
            } }
                
            $sc1 = "select * from ndis_support_catelogue where id='".$_POST["linenumber"]."' order by id desc limit 1";
            $sc2 = $conn->query($sc1);
            if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                $supportname=$sc3["support_item_name"];
                $supportlinenumber=$sc3["support_item_number"];
                $supportprice=$sc3["nsw"];
            } }
            
            $sql = "insert into project_team_allocation_lead (projectid,item_number,position,date,status,category,repeating,day1,day2,rate1,rate2,qty1,qty2) 
            VALUES ('".$_POST["lid"]."','".$_POST["linenumber"]."','0','$tday','1','Plan Managed','Weekly','0','0','$supportprice','0','05','00')";
            if ($conn->query($sql) === TRUE) $tomtomx=0;
        }
        
        if($_POST["processor"]=="new_workspace_PROJECT2"){
            if($_POST["stat"]==1){
                if(strlen($_POST["bsdate"])>=3) $bsdate=strtotime($_POST["bsdate"]);
                else $bsdate=time();
                $sql="update project_lead set budget_date='$bsdate' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($_POST["stat"]==2){
                if(strlen($_POST["bedate"])>=3) $bedate=strtotime($_POST["bedate"]);
                else $bedate=time();
                $sql="update project_lead set budget_close_date='$bedate' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($_POST["stat"]==3){
                $sql="update project_lead set budget_value='".$_POST["budget_value"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }           
        }
    
        $wsp11 = "select * from project_lead where status='15' and leadid='$pid' order by id desc limit 1";
        $wsp22 = $conn->query($wsp11);
        if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
            if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
            if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
                                                
            echo"<section class='scroll-section' id='stripedRows'>
                <div class='card mb-5'>
                    <div class='card-body' >
                        <div class='row'>
                            <div class='col-4 col-md-2' style='margin-bottom:25px'>
                                <form method='post' name='stage2a' action='lead_quote.php' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                    <input type='hidden' name='processor' value='new_workspace_PROJECT2'><input type='hidden' name='id' value='".$wsp33["id"]."'>
                                    <input type='hidden' name='lid' value='".$wsp33["leadid"]."'><input type='hidden' name='stat' value='1'>
                                    <label class='mb-3 top-label'>
                                        <span>Budget Start Date *</span>
                                        <input name='bsdate' type='date' value='$bsdate' required class='form-control' onchange='this.form.submit();'>
                                    </label>
                                </form>
                            </div>
                            <div class='col-4 col-md-2' style='margin-bottom:25px'>
                                <form method='post' name='stage2b' action='lead_quote.php' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                    <input type='hidden' name='processor' value='new_workspace_PROJECT2'><input type='hidden' name='id' value='".$wsp33["id"]."'>
                                    <input type='hidden' name='lid' value='".$wsp33["leadid"]."'><input type='hidden' name='stat' value='2'>
                                    <label class='mb-3 top-label'>
                                        <span>Budget Closing Date *</span>
                                        <input name='bedate' type='date' value='$bedate' required class='form-control' onchange='this.form.submit();'>
                                    </label>
                                </form>
                            </div>
                            <div class='col-4 col-md-2' style='margin-bottom:25px'>
                                <form method='post' name='stage2c' action='lead_quote.php' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                    <input type='hidden' name='processor' value='new_workspace_PROJECT2'><input type='hidden' name='id' value='".$wsp33["id"]."'>
                                    <input type='hidden' name='lid' value='".$wsp33["leadid"]."'><input type='hidden' name='stat' value='3'>
                                    <label class='mb-3 top-label'>
                                        <span>Allocated Budget Value *</span>
                                        <input name='budget_value' type='number' value='".$wsp33["budget_value"]."' required min='100' max='1000000000' class='form-control' onchange='this.form.submit();'>
                                    </label>
                                </form>
                            </div>
                            <div class='col-12 col-md-6' style=';margin-top:-5px;margin-bottom:25px'>
                                <link rel='stylesheet' href='../css/vendor/select2.min.css' />
                                <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
                                <form method='post' name='budgetstage' action='lead_quote.php' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                    <input type='hidden' name='id' value='".$wsp33["id"]."'><input type='hidden' name='lid' value='".$wsp33["leadid"]."'>
                                    <span>Select Item Number</span>
                                    <select id='select2Basic' class='form-control' name='linenumber' required style='width:100%' onchange='this.form.submit();'>
                                        <option value='0'>Select Item Number</option>";
                                        $sb2x = "select * from ndis_support_catelogue where nsw>'0' order by support_item_number asc";
                                        $rb2x = $conn->query($sb2x);
                                        if ($rb2x->num_rows > 0) { while($rsb2x = $rb2x->fetch_assoc()) {
                                            echo"<option value='".$rsb2x["id"]."'>".$rsb2x["support_item_number"]." | ".$rsb2x["support_item_name"]." (NSW Price: $".$rsb2x["nsw"].")</option>";
                                        } }
                                    echo"</select>
                                </form>
                                <script src='../js/vendor/select2.full.min.js'></script>
                                <script src='../js/forms/controls.select2.js'></script>
                            </div>
                        </div>
                        
                        <table class='table'>
                            <thead><tr>
                                <th scope='col' style='text-align:left;font-size:9pt'>Item Name & Number</th>
                                <th scope='col' nowrap style='text-align:left;font-size:9pt'>Note & Frequency</th>
                                <th scope='col' style='text-align:left;font-size:9pt'>Time</th>
                                <th scope='col' style='text-align:left;font-size:9pt'>Days</th>
                                <th scope='col' style='text-align:right;font-size:9pt'>Qty</th>
                                <th scope='col' style='text-align:right;font-size:9pt'>Rate</th>
                                <th scope='col' style='text-align:right;font-size:9pt'>Total </th>
                                <th scope='col' style='text-align:center;font-size:9pt'>Category & Repeating</th>
                                <th scope='col'>Action</th>
                            </tr></thead>";
                            
                            $totalamountx=0;
                            
                            $ln1 = "select * from project_team_allocation_lead where projectid='".$wsp33["leadid"]."' order by id asc";
                            $ln2 = $conn->query($ln1);
                            if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                
                                $lv=($lv+$wsp33["cat1x"]); // value;
                                
                                $sc1 = "select * from ndis_support_catelogue where id='".$ln3["item_number"]."' order by id desc limit 1";
                                $sc2 = $conn->query($sc1);
                                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                    $supportname=$sc3["support_item_name"];
                                    $supportlinenumber=$sc3["support_item_number"];
                                    $supportprice=$sc3["nsw"];
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
                                
                                echo"<tr style='padding:10px'>
                                    <th scope='row' style='font-size:8pt;width:30%'>
                                        <span style='font-size:10pt'><b>$supportlinenumber</b></span><br>$supportname
                                    </td>
                                    <td style='width:20%;text-align:left'>";
                                        /*
                                        echo"<form method='post' name='form_19_".$ln3["id"]."' action='lead_quote_processor.php' target='budgetmanagerz' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                            <input type='hidden' name='lid' value='".$wsp33["leadid"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'><input type=hidden name=statx value=6>
                                            <select name='supportworker' class='form-control' title='Support Worker' style='margin-bottom:25px;font-size:8pt;width:100%' required onchange='this.form.submit();'>
                                                <option style='font-size:8pt'>Select Support Worker</option>";
                                                $sb1 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                                                $rb1 = $conn->query($sb1);
                                                if ($rb1->num_rows > 0) { while($rsb1 = $rb1->fetch_assoc()) {
                                                    if($ln3["employeeid"]==$rsb1["id"]) echo"<option value='".$rsb1["id"]."' selected style='font-size:8pt'>".$rsb1["username"]." ".$rsb1["username2"]." (Job Experience: ".$rsb1["job_experience"]." Years) </option>";
                                                    else echo"<option value='".$rsb1["id"]."' style='font-size:8pt'>".$rsb1["username"]." ".$rsb1["username2"]." (Job Experience: ".$rsb1["job_experience"]." Years) </option>";
                                                } }
                                            echo"</select>
                                        </form>";
                                        */
                                        echo"<form method='post' name='form_18_".$ln3["id"]."' id='myForm' onsubmit='handleSubmit(event)' action='lead_quote.php' target='_self' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                            <input type='hidden' name='id' value='".$wsp33["id"]."'><input type='hidden' name='lid' value='".$wsp33["leadid"]."'>
                                            <input type='hidden' name='eid' value='".$ln3["id"]."'><input type=hidden name=statx value=1>
                                            <table style='width:100%'><tr>";
                                                if($ln3["mon"]==1) $d1="checked"; else $d1=null;
                                                if($ln3["tue"]==1) $d2="checked"; else $d2=null;
                                                if($ln3["wed"]==1) $d3="checked"; else $d3=null;
                                                if($ln3["thu"]==1) $d4="checked"; else $d4=null;
                                                if($ln3["fri"]==1) $d5="checked"; else $d5=null;
                                                if($ln3["sat"]==1) $d6="checked"; else $d6=null;
                                                if($ln3["sun"]==1) $d7="checked"; else $d7=null;
                                                if($ln3["evening"]==1) $d8="checked"; else $d8=null;
                                                
                                                $wd=0;
                                                if($ln3["mon"]==1) $wd=($wd+4);
                                                if($ln3["tue"]==1) $wd=($wd+4);
                                                if($ln3["wed"]==1) $wd=($wd+4);
                                                if($ln3["thu"]==1) $wd=($wd+4);
                                                if($ln3["fri"]==1) $wd=($wd+4);
                                                if($ln3["sat"]==1) $wd=($wd+4);
                                                if($ln3["sun"]==1) $wd=($wd+4);
                                                if($ln3["evening"]==1) $wd=($wd+4);
                                                
                                                if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                                                
                                                $wd=($wd*12);
                                                $wd=($wd-$hd1);
                                                if($wd<=0) $wd=0;
                                                
                                                echo"<td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Mon<br><input type='checkbox' name='mon' value='1' $d1 onclick='this.form.sat.value=null;this.form.sun.value=null;this.form.evening.value=null;this.form.submit()'></td>
                                                <td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Tue<br><input type='checkbox' name='tue' value='1' $d2 onclick='this.form.sat.value=null;this.form.sun.value=null;this.form.evening.value=null;this.form.submit()'></td>
                                                <td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Wed<br><input type='checkbox' name='wed' value='1' $d3 onclick='this.form.sat.value=null;this.form.sun.value=null;this.form.evening.value=null;this.form.submit()'></td>
                                                <td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Thu<br><input type='checkbox' name='thu' value='1' $d4 onclick='this.form.sat.value=null;this.form.sun.value=null;this.form.evening.value=null;this.form.submit()'></td>
                                                <td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Fri<br><input type='checkbox' name='fri' value='1' $d5 onclick='this.form.sat.value=null;this.form.sun.value=null;this.form.evening.value=null;this.form.submit()'></td>
                                                <td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Sat<br><input type='checkbox' name='sat' value='1' $d6 onclick='this.form.mon.value=null;this.form.tue.value=null;this.form.wed.value=null;this.form.thu.value=null;this.form.fri.value=null;this.form.evening.value=null;this.form.submit()'></td>
                                                <td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Sun<br><input type='checkbox' name='sun' value='1' $d7 onclick='this.form.mon.value=null;this.form.tue.value=null;this.form.wed.value=null;this.form.thu.value=null;this.form.fri.value=null;this.form.evening.value=null;this.form.submit()'></td>
                                                <td style='padding:5px;color:;background-color:;text-align:center;font-size:8pt;width:12.5%'>Evening<br><input type='checkbox' name='evening' value='1' $d8 onclick='this.form.mon.value=null;this.form.tue.value=null;this.form.wed.value=null;this.form.thu.value=null;this.form.fri.value=null;this.form.sat.value=null;this.form.sun.value=null;this.form.submit()'></td>";
                                                
                                            echo"</tr></table>
                                        </form>
                                    </td>           
                                    <td style='width:10%;text-align:center'>";
                                        
                                        if($ln3["time1"]==0) $tm1="08:00";
                                        else $tm1=$ln3["time1"];
                                        
                                        $tm1x="08:00";
                                        $tm1x = strtotime($tm1);
                                        if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                        else $tm2=$ln3["time2"];
                                        
                                        echo"<form method='post' name='form_2_".$ln3["id"]."' action='lead_quote.php' target='_self' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                            <input type='hidden' name='lid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'><input type=hidden name=statx value=2>
                                            <input type='time' name='time1' value='$tm1' style='margin-bottom:5px;width:100%;font-size:8pt' title='Clock-In Time' onblur='this.form.submit()'>
                                            <input type='time' name='time2' value='$tm2' style='width:100%;font-size:8pt' title='Clock-Out Time' onblur='this.form.submit()'>
                                        </form>
                                    </td>
                                    <td style='width:10%;text-align:left;font-size:8pt' nowrap>
                                        $wd Days<br>Excluding<br>$hd1 Holidays
                                    </td>
                                    <td style='width:10%;text-align:right;font-size:8pt'>
                                        ".$ln3["qty1"].":".$ln3["qty2"]." Hr.
                                    </td>
                                    <td style='width:10%;text-align:right;font-size:8pt' nowrap>
                                        Client: $".$ln3["rate1"]."<br>SW: $".$ln3["rate2"]."
                                    </td>
                                    <td style='width:10%;text-align:right;font-size:8pt' nowrap><b>";
                                        $totalamount=0;
                                        $totalamount=($ln3["qty1"]*$wd);
                                        $totalamount=($totalamount*$ln3["rate1"]);
                                        $totalamountz = number_format($totalamount, 2, '.', ',');
                                        
                                    echo"$ $totalamountz</b></td>
                                    <td style='width:10%;text-align:center'>
                                        <form method='post' name='form_3_".$ln3["id"]."' action='lead_quote_processor.php' target='budgetmanagerz' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                            <input type='hidden' name='lid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'><input type=hidden name=statx value=3>
                                            <select name='category' title='Category' style='margin-bottom:5px;width:100px;font-size:8pt' onchange='this.form.submit()'>";
                                                $selectorstat=null;
                                                if(strlen($ln3["category"])>=5) echo"<option value='".$ln3["category"]."'>".$ln3["category"]."</option>";
                                                else $selectorstat="selected";
                                                echo"<option value='Support Worker'>Support Worker</option>
                                                <option value='Subcontractor'>Subcontractor</option>
                                                <option value='Support Coordination'>Support Coordination</option>
                                                <option value='Plan Management' $selectorstat>Plan Management</option>
                                                <option value='Allied Health'>Allied Health</option>
                                                <option value='Admin'>Admin</option>
                                            </select>
                                            <select name='repeating' title='Repeating' style='margin-bottom:2px;width:100px;font-size:8pt' onchange='this.form.submit()'>";
                                                $selectorstat2=0;
                                                if(strlen($ln3["repeating"])>=5) echo"<option value='".$ln3["repeating"]."'>".$ln3["repeating"]."</option>";
                                                else $selectorstat2="selected";
                                                echo"<option value='Weekly' $selectorstat2>Weekly</option>
                                                <option value='Fortnightly'>Fortnightly</option>
                                                <option value='Monthly'>Monthly</option>
                                            </select>
                                        </form>
                                    </td>
                                    
                                    <td style='width:10%;text-align:center;color:red;'>
                                        <a href='lead_quote.php?delid=".$ln3["id"]."&lid=$pid' target='_self'><i class='fa fa-times'></i></a>
                                    </td>
                                </tr>";
                                
                                $totalamountx=($totalamountx+$totalamount);
                                $totalamounty = number_format($totalamountx, 2, '.', ',');
                                
                                $allocateddays=($allocateddays+$wd);
                                $allocatedhours=($allocatedhours+$ln3["qty1"]);
                                $allocatedminutes=($allocatedminutes+$ln3["qty2"]);
                                
                            } }
                            if($allocatedminutes>=61){
                                $amx = floor($allocatedminutes / 60);
                                $allocatedhours=round($allocatedhours+$amx);
                                $allocatedminutes = $allocatedminutes % 60;
                            }
                        echo"</table>";
                        
                        $bbalance=($wsp33["budget_value"]-$totalamountx);
                        $bbalancex = number_format($bbalance, 2, '.', ',');
                        
                        $budgetvalue=$wsp33["budget_value"];
                        $budgetvalue = number_format($budgetvalue, 2, '.', ',');
                        
                        if($bbalance<=0) $tcol="red";
                        else $tcol=null;
                        echo"<div style='width:100%;align:right;text-align:right'>
                        <table style='width:100%'>
                            <tr>
                                <td>
                                    <table align=left> 
                                        <tr><td style='font-size:10pt'>Allocated Days</td><td style='font-size:9pt'>:</td><td align=left style='color:$tcol;font-size:10pt'><b>$allocateddays Days</b></td></tr>
                                        <tr><td style='font-size:10pt'>Allocated Schedule Hours</td><td style='font-size:9pt'>:</td><td align=left style='color:$tcol;font-size:10pt'><b>$allocatedhours : $allocatedminutes Hours</b></td></tr>
                                    </table>
                                </td>
                                <td>
                                    <table align=left>
                                        <tr><td style='font-size:10pt'>Budget Amount</td><td style='font-size:9pt'>:</td><td align=right style='color:$tcol;font-size:10pt'><b>$ $budgetvalue</b></td></tr>
                                        <tr><td style='font-size:10pt'>Allocated Amount</td><td style='font-size:9pt'>:</td><td align=right style='color:$tcol;font-size:10pt'><b>$ $totalamounty</b></td></tr>
                                    </table>
                                </td>
                                <td>
                                    <table align=right>
                                        <tr><td style='font-size:10pt'><b>Budget Amount Valuation</b></td><td style='font-size:9pt'>:</td><td align=right style='color:$tcol;font-size:9pt'><b>$ $bbalancex</b></td></tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
            </section>";
            
            echo"<iframe src='blank.php' name='budgetmanagerz' scrolling='no' style='border: 0px dashed #000000' border='0' frameborder='0' width='5' height='5'>BROWSER NOT SUPPORTED</iframe>";
                        
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
