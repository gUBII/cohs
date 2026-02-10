<?php
    include("../authenticator.php");
    
    if(!isset($project_signed)) $project_signed=0;
    if(!isset($transport_cost)) $transport_cost=0.00;
    if(!isset($start_date)) $start_date="";
    if(!isset($end_date)) $end_date="";

    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";
    
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit Project Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    $advocatex=0;
    $advocatey = "select * from solutions where id='10012' and dashboard='1' order by id asc limit 1";
    $advocatez = $conn->query($advocatey);
    if ($advocatez->num_rows > 0) { while($advocatexyz = $advocatez->fetch_assoc()) {  $advocatex=1; } }
    
    
    $titlexyz="Project";
    $tl="Team Leader";
    $sc="Support Co-ordinator";
    $ast="Allocated Support Team";
    $heading="Project Profile";
    
    echo"<hr><div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
        <div class='tabs-container'>
            <div class='panel-body'>
                <div class='row'>";
                    $currenttime=time();
                    $currentdate=date("Y-m-d",$currenttime);
                    $ra1 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id asc limit 1";
                    $rb1 = $conn->query($ra1);
                    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                        $sdate=date("d.m.Y",$rab1["start_date"]);
                        $edate=date("d.m.Y",$rab1["end_date"]);
                        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                        $rb2 = $conn->query($ra2);
                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                            $clientid=$rab2["id"];
                            $clientname1=$rab2["username"];
                            $clientname2=$rab2["username2"];
                            if (!file_exists($rab2["images"]) || empty($rab2["images"])) $clientimage = "$mainurl/saas/assets/noimage.png";
                            else $clientimage = $rab2["images"];
                        } }
                        
                        $ra3 = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $leadername1=$rab3["username"];
                            $leadername2=$rab3["username2"];
                            if (!file_exists($rab3["images"]) || empty($rab3["images"])) $leaderimage = "$mainurl/saas/assets/noimage.png";
                            else $leaderimage = $rab3["images"];
                            $ra4 = "select * from departments where id='".$rab3["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $leaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab3["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $leaderdesignation=$rab5["designation"]; } }
                            
                        } }
                        
                        $ra4 = "select * from uerp_user where id='".$rab1["caseid"]."' order by id asc limit 1";
                        $rb4 = $conn->query($ra4);
                        if ($rb3->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) {
                            $casename1=$rab4["username"];
                            $casename2=$rab4["username2"];
                            if (!file_exists($rab4["images"]) || empty($rab4["images"])) $caseimage = "$mainurl/saas/assets/noimage.png";
                            else $caseimage = $rab4["images"];
                            $ra4 = "select * from departments where id='".$rab4["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $casedepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab4["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $casedesignation=$rab5["designation"]; } }
                            
                        } }
                        
                        if($rab1["managed_by"]=="NDIA Managed") $sc="Support Co-Ordinator";
                        if($rab1["managed_by"]=="PLAN Managed") $sc="Plan Manager";
                        if($rab1["managed_by"]=="CARE Managed") $sc="Care Manager";
                        if($rab1["managed_by"]=="SELF Managed") $sc="Self Managed";
                        
                        $ra6 = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                        $rb6 = $conn->query($ra6);
                        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                            $teamleadername1=$rab6["username"];
                            $teamleadername2=$rab6["username2"];
                            if (!file_exists($rab6["images"]) || empty($rab6["images"])) $teamleaderimage = "$mainurl/saas/assets/noimage.png";
                            else $teamleaderimage = $rab6["images"];
                            $ra4 = "select * from departments where id='".$rab6["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $teamleaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab6["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $teamleaderdesignation=$rab5["designation"]; } }
                            
                        } }
                        
                        echo"<div class='col-12 col-md-12'>
                            <div class='row'>";
                                if($mtype=="ADMIN" OR $rab1["teamleaderid"]==$userid){
                                    
                                    $lv=0;
                                    $budgetvaluex=0;
                                    $budgetvalue=0;
                                    $allocateddays=0;
                                    $allocatedhours=0;
                                    $allocatedminutes=0;
                                    
                                    $wsp11 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id desc limit 1";
                                    $wsp22 = $conn->query($wsp11);
                                    if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                        
                                        $budgetunset=0;
                                        if($wsp33["budget_date"]!=0) $budgetunset=1;
                                        
                                        $totalscheduled=0;
                                        $totalscheduled=($wsp33["capital"]+$wsp33["core"]+$wsp33["capacity"]);
                                        $totalscheduledz = number_format($totalscheduled, 2, '.', ',');
                                        
                                        if($budgetunset==1){
                                            
                                            if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
                                            if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
                                                        
                                            $startdate = date("d-M-Y", $wsp33["budget_date"]);
                                            $enddate = date("d-M-Y", $wsp33["budget_close_date"]); 
                                                        
                                            $totalamountx=0;
                                            $goforit=0;
                                            $ln1 = "select * from project_budget_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
                                            $ln2 = $conn->query($ln1);
                                            if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
                                                
                                                $goforit=1;
                                                $supportlinenumber=0;
                                                
                                                if($ln3["item_number"]>=1){
                                                    $lv=($lv+$wsp33["cat1x"]); // value;
                                                    $sc1 = "select * from ndis_line_numbers where id='".$ln3["item_number"]."' order by id desc limit 1";
                                                    $sc2 = $conn_main->query($sc1);
                                                    if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                                                        $supportname=$sc3["item_name"];
                                                        $supportlinenumber=$sc3["item_number"];
                                                        $supportprice=$sc3["national"];
                                                    } }
                                                }
                                                
                                                if($supportlinenumber!=0){    
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
                                                                
                                                    $totalamountx=($totalamountx+$totalamount);
                                                    $totalamounty = number_format($totalamountx, 2, '.', ',');
                                                            
                                                    $allocateddays=($allocateddays+$wd);
                                                    $allocatedhours=($allocatedhours+$ln3["qty1"]);
                                                    $allocatedminutes=($allocatedminutes+$ln3["qty2"]);
                                                }
                                                                                                    
                                            } }
                                            if($goforit==1){
                                                if($allocatedminutes>=61){
                                                    $amx = floor($allocatedminutes / 60);
                                                    $allocatedhours=round($allocatedhours+$amx);
                                                    $allocatedminutes = $allocatedminutes % 60;
                                                }
                                                            
                                                $bbalance=($wsp33["budget_value"]-$totalamountx);
                                                $budgetvalue=$wsp33["budget_value"];
                                                        
                                                if($bbalance<=0) $tcol=null;
                                                else $tcol=null;
                                                    
                                                $tval=$budgetvalue;
                                                $tuse=0;
                                                $tbal=($tval-$tuse);
                                            }
                                        }
                                                
                                    } }
                                    
                                    echo"<div class='col-12 col-md-12'>
                                        <section class='scroll-section' id='lineChartTitlex'>
                                            <div class='card mb-5' ><div class='card-body'>
                                                <div class='row'>
                                                    <div class='col-5'><h2 class='small-title'>Allocated Budget Forcast & Breakdown</h2></div>
                                                    <div class='col-7' style='text-align:right'>";
                                                            echo"<a href='#' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#budgeteditor' style='padding-right:20px'>Edit</a>&nbsp;&nbsp;";
                                                            echo"<button type=button onclick='printPDF()' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='padding-right:20px'>Download</button>&nbsp;&nbsp;";
                                                            echo"<div class='modal fade' id='budgeteditor' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                                                <div class='modal-dialog modal-semi-full modal-dialog-centered'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title'>Budget Reallocation</h5>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'onclick=\"shiftdataV2('projects_client_ndis_budget.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\"></button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <iframe src='workspace_budget_editor.php?pid=".$_COOKIE["projectidx"]."' name='budgetmanagerx' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='550'>BROWSER NOT SUPPORTED</iframe>
                                                                            <a style='margin-left:-70px;margin-top:0px;position:absolute;color:purple;align:right' href='workspace_budget_editor.php?pid=".$_COOKIE["projectidx"]."' class='btn' target='budgetmanagerx' title='Reload Data'><i class='fa fa-refresh' style='color:purple'></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                            echo"<div class='modal fade' id='budgetshift' tabindex='-1' role='dialog' aria-hidden='true'>
                                                                <div class='modal-dialog modal-semi-full modal-dialog-centered'>
                                                                    <div class='modal-content'>
                                                                        <div class='modal-header'>
                                                                            <h5 class='modal-title'>Budgetwise Shifts</h5>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                        </div>
                                                                        <div class='modal-body'>
                                                                            <iframe src='workspace_budget_shifts.php?pid=".$_COOKIE["projectidx"]."' name='budgetmanagery' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='550'>BROWSER NOT SUPPORTED</iframe>
                                                                            <a style='margin-left:-70px;margin-top:0px;position:absolute;color:purple;align:right' href='workspace_budget_shifts.php?pid=".$_COOKIE["projectidx"]."' class='btn' target='budgetmanagery' title='Reload Data'><i class='fa fa-refresh' style='color:purple'></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                        
                                                        
                                                    echo"</div>
                                                </div>
                                                
                                                <div style='width:100%'>";
                                                
                                                    if($budgetunset==1){
                                                        if($goforit==1){    
                                                            echo"<hr><h2 class='small-title'>Core Supports</h2>";
                                                            echo"<table style='width:100%' class='table table-hover'>
                                                                <thead><tr>
                                                                    <th style='text-align:left' scope='col' nowrap>No.</th>
                                                                    <th style='text-align:left' scope='col' nowrap>Support Category</th>
                                                                    <th style='text-align:left' scope='col' nowrap>Date</th>
                                                                    <th style='text-align:left' scope='col' nowrap>Time</th>
                                                                    <th style='text-align:right' scope='col' nowrap>Days</th>
                                                                    <th style='text-align:right' scope='col' nowrap>Frequency</th>
                                                                    <th style='text-align:right' scope='col' nowrap>Rate</th>
                                                                    <th style='text-align:right' scope='col' nowrap>Total</th>
                                                                </tr></thead>
                                                                <tbody>";
                                                                    $tts=0;
                                                                    $budgetvaluex=0;
                                                                    $budgetvalue=0;
                                                                    $allocateddays=0;
                                                                    $allocatedhours=0;
                                                                    $wsp11 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id desc limit 1";
                                                                    $wsp22 = $conn->query($wsp11);
                                                                    if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
                                                                        
                                                                        $totalamountx=0;
                                                                        $ln1x = "select * from project_budget_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
                                                                        $ln2x = $conn->query($ln1x);
                                                                        if ($ln2x->num_rows > 0) { while($ln3 = $ln2x -> fetch_assoc()) {
                                                                            
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
                                                                            
                                                                            $wd=round($wd);
                                                                            
                                                                            // echo "[ $mondays | $tuesdays | $wednesdays | $thursdays | $fridays | $saturdays | $sundays ]";
                                                                            
                                                                            
                                                                            
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
                                                                                    
                                                                            echo"<tr style='padding:10px'>
                                                                                <td scope='row' style='font-size:8pt;width:5%'><span style='font-size:8pt'>$tts.</span></td>
                                                                                <td scope='row' style='font-size:8pt;width:35%'>
                                                                                    <span style='font-size:8pt'>$supportname ($supportlinenumber)<br>";
                                                                                    $sb1 = "select * from uerp_user where id='".$ln3["employeeid"]."' order by id asc limit 1";
                                                                                    $rb1 = $conn->query($sb1);
                                                                                    if ($rb1->num_rows > 0) { while($rsb1 = $rb1->fetch_assoc()) {
                                                                                        echo"<span style='font-size:8pt'><b>Support Worker: ".$rsb1["username"]." ".$rsb1["username2"]."</a>";
                                                                                    } }
                                                                                    echo"<br>
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
                                                                                                
                                                                                        echo"<td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Mon<br><i class='fa $d1'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Tue<br><i class='fa $d2'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Wed<br><i class='fa $d3'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Thu<br><i class='fa $d4'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Fri<br><i class='fa $d5'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Sat<br><i class='fa $d6'></i></td>
                                                                                        <td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Sun<br><i class='fa $d7'></i></td>";
                                                                                        // echo"<td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Ev.<br><i class='fa $d8'></i></td>";
                                                                                        echo"<td style='padding:5px;text-align:center;font-size:8pt;width:12.5%'>Night<br><i class='fa $d9'></i></td>
                                                                                    </tr></table>
                                                                                </td>
                                                                                <td style='width:30%;text-align:left' nowrap><span style='font-size:8pt'>Start: $datefrom<br>End: $dateto</span></td>
                                                                                <td style='width:30%;text-align:left' nowrap><span style='font-size:8pt'>From: $tm1<br>To: $tm2</span></td>
                                                                                <td style='width:30%;text-align:left' nowrap><span style='font-size:8pt'>$wd Days</spant><br><span style='font-size:8pt'>".$ln3["repeating"]."</b></span></td>
                                                                                <td style='width:30%;text-align:left' nowrap><span style='font-size:8pt'>".$ln3["qty1"].":".$ln3["qty2"]." Hours</spant></td>
                                                                                <td style='width:30%;text-align:right' nowrap><span style='font-size:8pt'>$ ".$ln3["rate1"]."</spant></td>
                                                                                <td style='width:30%;text-align:right' nowrap><span style='font-size:8pt'>$totalamountz</spant></td>
                                                                            </tr>";
                                                                            
                                                                            $totalamountx=($totalamountx+$totalamount);
                                                                            
                                                                            $allocateddays=($allocateddays+$wd);
                                                                            $allocatedhours=($allocatedhours+$ln3["qty1"]);
                                                                            $allocatedminutes=($allocatedminutes+$ln3["qty2"]);
                                                                                                                                            
                                                                        } }
                                                                        
                                                                    } }   
                                                                    
                                                                    $totalamounty = number_format($totalamountx, 2, '.', ',');
                                                                    echo"<tr class='btn-primary'>
                                                                        <td nowrap align=right colspan=7 style='font-size:10pt'><b>Total:</b></td>
                                                                        <td nowrap align=right style='font-size:10pt'><b>$ $totalamounty</b></td>
                                                                    </tr>";
                                                                    
                                                                echo"</tbody>
                                                            </table>";
                                                        }
                                                    }
                                                echo"</div>
                                            </div>
                                        </section>
                                    </div>";
                                }
                                
                            echo"</div>
                        </div>";
                    } }
                    
                echo"</div>
            </div>
        </div>
    </div>";  