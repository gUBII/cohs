<?php
    include("authenticator.php");
    include("head.php");
    
    $tday=time();
    if(isset($_POST["pid"])) $pid=$_POST["pid"];
    else if(isset($_GET["pid"])) $pid=$_GET["pid"];
    else $pid=0;
    
    if (!isset($_COOKIE["managed"]) OR $_COOKIE["managed"]==0) {
        echo"<form method='GET' action='aged_managed.php' name='main' target='_self'>
            <input type=hidden name='url' value='projects.php'>
            <input type=hidden name=pstat value='1'>
            <input type=hidden name=id value='786'>
            <input type=hidden name=managed2 value='3'>
            <input type=pid name=managed value='$pid'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
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
    <body class='fade-in card mb-5'><?php
        
        
        
        // echo"<meta http-equiv='refresh' content='5;url=workspace_budget_editor.php?pid=$pid'>";
        
        if(isset($_GET["delid"])){
            $sql = "delete from project_budget_allocation where id='".$_GET["delid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["eid"])){
            
            if($_POST["statx"]==1){
                $sql="update project_budget_allocation set mon='".$_POST["mon"]."',tue='".$_POST["tue"]."',
                wed='".$_POST["wed"]."',thu='".$_POST["thu"]."',fri='".$_POST["fri"]."',sat='".$_POST["sat"]."',
                sun='".$_POST["sun"]."',night='".$_POST["night"]."' where id='".$_POST["eid"]."'";
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
                
                $sql="update project_budget_allocation set time1='".$_POST["time1"]."',time2='".$_POST["time2"]."',qty1='$hours',qty2='$minutes' where id='".$_POST["eid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            
            
        }
        
        if(isset($_POST["linenumber"])){
            $tomtom=0;
            $m1 = "select * from project_budget_allocation where item_number='".$_POST["linenumber"]."' and projectid='$pid' order by id desc limit 1";
            $m2 = $conn->query($m1);
            if ($m2->num_rows > 0) { while($m3 = $m2 -> fetch_assoc()) {
                
                $sc1 = "select * from ndis_line_numbers where id='".$m3["item_number"]."' order by id desc limit 1";
                $sc2 = $conn_main->query($sc1);
                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) { $supportprice=$sc3["national"]; } }
                
                $sql = "insert into project_budget_allocation (projectid,item_number,position,date,date_from,date_to,status,category,repeating,day1,day2,rate1,rate2,qty1,qty2) 
                VALUES ('".$m3["projectid"]."','".$m3["item_number"]."','0','".$m3["date"]."','".$m3["date_from"]."','".$m3["date_to"]."','1','".$m3["category"]."','".$m3["repeating"]."','0','0','$supportprice','0','05','00')";
                if ($conn->query($sql) === TRUE) $tomtomx=0;
            } }
        }
        
        if(isset($_POST["line_number"])){
            $tomtom=0;
            $m1 = "select * from project_budget_allocation where item_number='".$_POST["line_number"]."' and projectid='$pid' order by id desc limit 1";
            $m2 = $conn->query($m1);
            if ($m2->num_rows > 0) { while($m3 = $m2 -> fetch_assoc()) { $tomtom=1; } }
            
            // if($tomtom==0){
                $mm1 = "select * from project where status='15' and id='".$_POST["pid"]."' order by id desc limit 1";
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
                
                $sc1 = "select * from ndis_line_numbers where id='".$_POST["line_number"]."' order by id desc limit 1";
                $sc2 = $conn_main->query($sc1);
                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                    $supportname=$sc3["item_name"];
                    $supportlinenumber=$sc3["item_number"];
                    $supportprice=$sc3["national"];
                } }
                
                // $holidaysx
                // $tdaysx
                $date_fromx = time();
                $date_tox = strtotime('+1 year');
                
                $sql = "insert into project_budget_allocation (projectid,item_number,position,date,date_from,date_to,status,category,repeating,day1,day2,rate1,rate2,qty1,qty2) 
                VALUES ('".$_POST["pid"]."','".$_POST["line_number"]."','0','$tday','$date_fromx','$date_tox','1','Plan Managed','Week Repeat','0','0','$supportprice','0','05','00')";
                if ($conn->query($sql) === TRUE) $tomtomx=0;
            // }
        }
        
        if(isset($_POST["processor"]) && $_POST["processor"]=="new_workspace_PROJECT2"){
            if($_POST["stat"]==1){
                if(strlen($_POST["bsdate"])>=3) $bsdate=strtotime($_POST["bsdate"]);
                else $bsdate=time();
                $sql="update project set budget_date='$bsdate' where id='".$_POST["pid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($_POST["stat"]==2){
                if(strlen($_POST["bedate"])>=3) $bedate=strtotime($_POST["bedate"]);
                else $bedate=time();
                $sql="update project set budget_close_date='$bedate' where id='".$_POST["pid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($_POST["stat"]==3){
                $sql="update project set budget_value='".$_POST["budget_value"]."' where id='".$_POST["pid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }           
        }
        
        $wsp11 = "select * from project where id='$pid' order by id desc limit 1";
        $wsp22 = $conn->query($wsp11);
        if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
            if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
            if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
            
            echo"<section class='scroll-section' id='stripedRows'>
                <div class='card mb-5'>
                    <div class='card-body' >
                        <div class='row'>
                            <div class='col-12 col-md-12' style=';margin-top:-5px;margin-bottom:25px'>
                                <link rel='stylesheet' href='../css/vendor/select2.min.css' />
                                <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
                                <form method='post' name='budgetstage' action='workspace_budget_editor.php' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                    <input type='hidden' name='pid' value='".$wsp33["id"]."'>
                                    
                                    <span>Select Item Number: <a href='#' data-bs-toggle='tooltip' data-bs-html='true' title=\"You can add/edit Item Numbers in <a href='index.php?url=ndis_line_item_number.php&id=5326' target='_top' style='color:black'><u>NDIS Item Number</u></a>\"><i data-acorn-icon='info-circle'></i></a></span>
                                    <select id='select2Basic' class='form-control' name='line_number' required style='width:100%' onchange='this.form.submit();'>
                                        <option value='0'>Select Item Number</option>";
                                        
                                        if(isset($_COOKIE["managed"])){
                                            if($_COOKIE["managed"]==2) $sb2x = "select * from ndis_line_numbers where type='CARE' and national>'0' order by item_number asc";
                                            else $sb2x = "select * from ndis_line_numbers where type='NDIS' and national>'0' order by item_number asc";
                                        }else{
                                            $sb2x = "select * from ndis_line_numbers where type='NDIS' and national>'0' order by item_number asc";
                                        } 
                                        $rb2x = $conn_main->query($sb2x);
                                        if ($rb2x->num_rows > 0) { while($rsb2x = $rb2x->fetch_assoc()) {
                                            echo"<option value='".$rsb2x["id"]."'>".$rsb2x["item_number"]." | ".$rsb2x["item_name"]." (National Price: $".$rsb2x["national"].")</option>";
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
                                <th scope='col' nowrap style='text-align:left;font-size:9pt'>Date Range & Frequency</th>
                                <th scope='col' style='text-align:left;font-size:9pt'>Time</th>
                                <th scope='col' style='text-align:center;font-size:9pt'>Cat & Repeating</th>
                                <th scope='col' style='text-align:left;font-size:9pt'>Days</th>
                                <th scope='col' style='text-align:right;font-size:9pt'>Hours</th>
                                <th scope='col' style='text-align:right;font-size:9pt'>Rate</th>
                                <th scope='col' style='text-align:right;font-size:9pt'>Total </th>
                                
                            </tr></thead>";
                            
                            $totalamountx=0;
                            
                            $lv=0;
                            $tt=0;
                            $allocateddays=0;
                            $allocatedhours=0;
                            $allocatedminutes=0;
                            $ln1 = "select * from project_budget_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
                            $ln2 = $conn->query($ln1);
                            if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                
                                $tt=($tt+1);
                                
                                $date_from=date("Y-m-d",$ln3["date_from"]);
                                $date_to=date("Y-m-d",$ln3["date_to"]);
                                
                                $lv=($lv+$wsp33["cat1x"]); // value;
                                $sc1 = "select * from ndis_line_numbers where id='".$ln3["item_number"]."' order by id desc limit 1";
                                $sc2 = $conn_main->query($sc1);
                                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                    $supportname=$sc3["item_name"];
                                    $supportlinenumber=$sc3["item_number"];
                                    $supportprice=$sc3["national"];
                                } }
                                
                                $hd1=0;
                                $holidaytext="Holidays on";
                                $hd1=0;
                                $holidaytext="Holidays on";
                                $sc11 = "select * from australian_holidays where status='1' order by id asc";
                                $sc22 = $conn_main->query($sc11);
                                if ($sc22->num_rows > 0) { while($sc33 = $sc22 -> fetch_assoc()) {
                                    if($sc33["date_ts"]>=$ln3["date_from"] && $sc33["date_ts"]<=$ln3["date_to"]){
                                        $hd1=($hd1+1);
                                    }
                                } }
                                
                                echo"<tr style='padding:10px'>
                                    <th scope='row' style='font-size:8pt;width:30%'>
                                        <table width='100%' height='35'><tr>
                                            <td align='left' style='font-size:8pt;'>
                                                <form method='post' name='form_".$ln3["id"]."$tt' id='myForm' onsubmit='handleSubmit(event)' action='workspace_budget_valuation.php' target='budgetmanagerz$tt' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                    <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'>
                                                    <input type='hidden' name='zid' value='".$ln3["id"]."'><input type=hidden name=statx value='7'>
                                                    <label class='mb-3 top-label'><span>Item Line Number *</span>
                                                        <select id='select2Basic' class='form-control' name='linenumberx' required style='width:100%' onchange='this.form.submit();'>";
                                                            if(strlen($supportlinenumber)>=3) echo"<option value='".$ln3["item_number"]."'>$supportlinenumber | $supportname | (National Price: $$supportprice)</option>";
                                                            else echo"<option value='0'>Select Item Number</option>";
                                                            
                                                            if(isset($_COOKIE["managed"])){
                                                                if($_COOKIE["managed"]==2) $sb2x = "select * from ndis_line_numbers where type='CARE' and national>'0' order by item_number asc";
                                                                else $sb2x = "select * from ndis_line_numbers where type='NDIS' and national>'0' order by item_number asc";
                                                            }else{
                                                                $sb2x = "select * from ndis_line_numbers where type='NDIS' and national>'0' order by item_number asc";
                                                            } 
                                                            $rb2x = $conn_main->query($sb2x);
                                                            if ($rb2x->num_rows > 0) { while($rsb2x = $rb2x->fetch_assoc()) {
                                                                echo"<option value='".$rsb2x["id"]."'>".$rsb2x["item_number"]." | ".$rsb2x["item_name"]." (National Price: $".$rsb2x["national"].")</option>";
                                                            } }
                                                        echo"</select>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr></table>
                                        
                                        <form method='post' name='form_11_".$ln3["id"]."' action='workspace_budget_processor.php' target='budgetmanagerz' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                            <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'><input type=hidden name=statx value=4>";
                                            $notes_instructions=$ln3["note"];
                                            if($notes_instructions=="NULL") $notes_instructions="";
                                            echo"<label class='mb-3 top-label'><span>Note/Instruciton</span>
                                                <input type='text' placeholder='Note/Instructions' class='form-control' name='note' value='".$ln3["note"]."' style=100%;font-size:8pt' title='Note/Instructions' onchange='this.form.submit()'>
                                            </label>
                                        </form>
                                        
                                    </td>
                                    <td style='width:20%;text-align:left'>
                                        
                                        <table style='width:100%'><tr><td>
                                            <form method='post' name='form_44_".$ln3["id"]."' id='myForm' onsubmit='handleSubmit(event)' action='workspace_budget_valuation.php' target='budgetmanagerz$tt' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'>
                                                <input type='hidden' name='zid' value='".$ln3["id"]."'><input type=hidden name=statx value=3>
                                                <label class='mb-3 top-label'>
                                                    <span>Start Date *</span>
                                                    <input name='date_from' type='date' value='$date_from' required style='font-size:10pt' class='form-control' onchange='this.form.submit();'>
                                                </label>
                                            </form>
                                        </td><td>
                                            <form method='post' name='form_55_".$ln3["id"]."' id='myForm' onsubmit='handleSubmit(event)' action='workspace_budget_valuation.php' target='budgetmanagerz$tt' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'>
                                                <input type='hidden' name='zid' value='".$ln3["id"]."'><input type=hidden name=statx value=4>
                                                <label class='mb-3 top-label'>
                                                    <span>Closing Date *</span>
                                                    <input name='date_to' type='date' value='$date_to' required style='font-size:10pt' class='form-control' onchange='this.form.submit();'>
                                                </label>
                                            </form>
                                        </td></tr></table>
                                        
                                        <form method='post' name='form_18_".$ln3["id"]."' id='myForm' onsubmit='handleSubmit(event)' action='workspace_budget_valuation.php' target='budgetmanagerz$tt' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                            <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'>
                                            <input type='hidden' name='zid' value='".$ln3["id"]."'><input type=hidden name=statx value=1>
                                            <table style='width:100%'><tr>";
                                                if($ln3["mon"]==1) $d1="checked"; else $d1=null;
                                                if($ln3["tue"]==1) $d2="checked"; else $d2=null;
                                                if($ln3["wed"]==1) $d3="checked"; else $d3=null;
                                                if($ln3["thu"]==1) $d4="checked"; else $d4=null;
                                                if($ln3["fri"]==1) $d5="checked"; else $d5=null;
                                                if($ln3["sat"]==1) $d6="checked"; else $d6=null;
                                                if($ln3["sun"]==1) $d7="checked"; else $d7=null;
                                                if($ln3["evening"]==1) $d8="checked"; else $d8=null;
                                                if($ln3["night"]==1) $d9="checked"; else $d9=null;
                                                
                                                $wd=0;
                                                if($ln3["mon"]==1) $wd=($wd+4);
                                                if($ln3["tue"]==1) $wd=($wd+4);
                                                if($ln3["wed"]==1) $wd=($wd+4);
                                                if($ln3["thu"]==1) $wd=($wd+4);
                                                if($ln3["fri"]==1) $wd=($wd+4);
                                                if($ln3["sat"]==1) $wd=($wd+4);
                                                if($ln3["sun"]==1) $wd=($wd+4);
                                                // if($ln3["evening"]==1) $wd=($wd+4);
                                                // if($ln3["night"]==1) $wd=($wd+4);
                                                
                                                if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                                                
                                                $startTimestamp = $wsp33["budget_date"];
                                                $endTimestamp = $wsp33["budget_close_date"];
                                                $diffInSeconds = $endTimestamp - $startTimestamp;
                                                $diffInDays = $diffInSeconds / (60 * 60 * 24);
                                                $months = $diffInDays / 30.44;
                                                $months = round($months, 2);
                                                
                                                $wd=($wd*$months);
                                                $wd=($wd-$hd1);
                                                $wd=round($wd);
                                                if($wd<=0) $wd=0;
                                                
                                                echo"<td style='padding:5px;color:black;background-color:lightgreen;text-align:center;font-size:10pt;width:12.5%'>Mon<br><input type='checkbox' name='mon' value='1' $d1 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:lightgreen;text-align:center;font-size:10pt;width:12.5%'>Tue<br><input type='checkbox' name='tue' value='1' $d2 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:lightgreen;text-align:center;font-size:10pt;width:12.5%'>Wed<br><input type='checkbox' name='wed' value='1' $d3 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:lightgreen;text-align:center;font-size:10pt;width:12.5%'>Thu<br><input type='checkbox' name='thu' value='1' $d4 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:lightgreen;text-align:center;font-size:10pt;width:12.5%'>Fri<br><input type='checkbox' name='fri' value='1' $d5 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:grey;text-align:center;font-size:10pt;width:12.5%'>Sat<br><input type='checkbox' name='sat' value='1' $d6 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:grey;text-align:center;font-size:10pt;width:12.5%'>Sun<br><input type='checkbox' name='sun' value='1' $d7 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:lightblue;text-align:center;font-size:8pt;width:12.5%'>Evening<br><input type='checkbox' name='evening' value='1' $d8 onclick='this.form.submit()'></td>
                                                <td style='padding:5px;color:black;background-color:lightblue;text-align:center;font-size:10pt;width:12.5%' nowrap>Night<br><input type='checkbox' name='night' value='1' $d9 onclick='this.form.submit()'></td>
                                            </tr></table>
                                        </form>
                                    </td>           
                                    <td style='width:10%;text-align:center'>";
                                        
                                        if($ln3["time1"]==0) $tm1="08:00";
                                        else $tm1=$ln3["time1"];
                                        
                                        $tm1x="08:00";
                                        $tm1x = strtotime($tm1);
                                        if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                                        else $tm2=$ln3["time2"];
                                        
                                        echo"<form method='post' name='form_22_".$ln3["id"]."' id='myForm' onsubmit='handleSubmit(event)' action='workspace_budget_valuation.php' target='budgetmanagerz$tt' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                            <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'>
                                            <input type='hidden' name='zid' value='".$ln3["id"]."'><input type=hidden name=statx value=2>
                                            <label class='mb-3 top-label'><span>Time From</span>
                                                <input type='time' class='form-control' name='time1' value='$tm1' style='margin-bottom:25px;width:120px;font-size:8pt' title='Clock-In Time' onblur='this.form.submit()'>
                                            </label>
                                            <label class='mb-3 top-label'><span>Time To</span>
                                                <input type='time' class='form-control' name='time2' value='$tm2' style='width:120px;font-size:8pt' title='Clock-Out Time' onblur='this.form.submit()'>
                                            </label>
                                        </form>
                                    </td>
                                    <td style='width:10%;text-align:center'>
                                        <form method='post' name='form_3_".$ln3["id"]."' action='workspace_budget_valuation.php' target='budgetmanagerz$tt' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                            <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'>
                                            <input type='hidden' name='zid' value='".$ln3["id"]."'><input type=hidden name=statx value=8>
                                            <label class='mb-3 top-label'><span>Designation</span>
                                                <select name='category' class='form-control' title='Category' style='margin-bottom:25px;width:120px;font-size:10pt' onchange='this.form.submit()'>";
                                                    $selectorstat=null;
                                                    if(strlen($ln3["category"])>=5) echo"<option value='".$ln3["category"]."'>".$ln3["category"]."</option>";
                                                    else $selectorstat="selected";
                                                    echo"<option value='NDIA Managed' $selectorstat>NDIA Managed</option>";
                                                    echo"<option value='PLAN Managed'>PLAN Managed</option>
                                                    <option value='SELF Managed'>SELF Managed</option>
                                                </select>
                                            </label>
                                            <label class='mb-3 top-label'><span>Repeating</span>
                                                <select name='repeating' class='form-control' title='Repeating' style='margin-bottom:2px;width:120px;font-size:10pt' onchange='this.form.submit()'>";
                                                    $selectorstat2=0;
                                                    if(strlen($ln3["repeating"])>=4) echo"<option value='".$ln3["repeating"]."'>".$ln3["repeating"]."</option>";
                                                    else $selectorstat2="selected";
                                                    echo"<option value='Week Repeat' $selectorstat2>Week Repeat</option>
                                                    <option value='Fortnight Repeat'>Fortnight Repeat</option>
                                                    <option value='Month Repeat'>Month Repeat</option>
                                                    <option value='Once'>Once</option>
                                                </select>
                                            </lable>
                                        </form>
                                    </td>
                                    
                                    <td style='text-align:left;font-size:8pt' nowrap colspan=4>";
                                        
                                        $totalamount=0;
                                        $totalamount=($ln3["qty1"]*$wd);
                                        $totalamount=($totalamount*$ln3["rate1"]);
                                        $totalamountz = number_format($totalamount, 2, '.', ',');
                                        
                                        // echo"$wd Days, Excluding $hd1 Holidays, ".$ln3["qty1"].":".$ln3["qty2"]." Hr. - Client: $".$ln3["rate1"]." | SW: $".$ln3["rate2"]." =  $ $totalamountz</b><br>";
                                        
                                        echo"<iframe src='workspace_budget_valuation.php?zid=".$ln3["id"]."' name='budgetmanagerz$tt' scrolling='no' style='border: 0px dashed #000000' border='0' frameborder='0' width='400px' height='75px'>BROWSER NOT SUPPORTED</iframe>";
                                        echo"<a style='margin-left:-70px;margin-top:45px;position:absolute;color:purple;align:right' href='workspace_budget_valuation.php?zid=".$ln3["id"]."' class='btn' target='budgetmanagerz$tt' title='Reload Data'><i class='fa fa-refresh' style='color:purple'></i></a>";
                                        echo"<a style='margin-left:-35px;margin-top:45px;position:absolute;color:red;align:right' href='workspace_budget_editor.php?delid=".$ln3["id"]."&pid=$pid' class='btn' target='_self' title='Delete This Item Number'><i class='fa fa-times' style='color:red'></i></a>";
                                        echo"<table style='width:100%'><tr>
                                            <td style='font-size:8pt'>
                                                <form method='post' name='form_10_".$ln3["id"]."' action='workspace_budget_processor.php' target='budgetmanagerz' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                    <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type='hidden' name='eid' value='".$ln3["id"]."'><input type=hidden name=statx value=5>
                                                    <label class='mb-3 top-label'><span>Service Address</span>
                                                        <input type='text' placeholder='Service Address' class='form-control' name='address' value='".$ln3["address"]."' style=100%;font-size:8pt' title='Service Address' onchange='this.form.submit()'>
                                                    </label>
                                                </form>
                                            </td>
                                            <td style='width:20px;text-align:center'><center>
                                                <form method='post' name='form_101_".$ln3["id"]."' action='workspace_budget_editor.php' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                                    <input type='hidden' name='pid' value='".$wsp33["id"]."'><input type=hidden name='linenumber' value='".$ln3["item_number"]."'>
                                                    <input type='submit' onclick='this.form.submit();' title='Add New Item Number' value='+' class='btn btn-outline-info btn-sm'>
                                                </form>
                                            </center></td>
                                            
                                        </tr></table>";
                                    echo"</td>
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
                        
                        echo"<div style='width:100%;align:right;text-align:right'>";
                            echo"<a style='position:absolute;color:purple' href='workspace_budget_allocated.php?pidz=$pid' class='btn' target='budgetmanager_xyz'><i class='fa fa-refresh' style='color:purple'></i></a>";
                            echo"<iframe src='workspace_budget_allocated.php?pidz=$pid' name='budgetmanager_xyz' scrolling='no' style='border: 0px dashed #000000' border='0' frameborder='0' width='400px' height='250px'>BROWSER NOT SUPPORTED</iframe>";
                        echo"</div>
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
