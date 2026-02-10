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
                                        
                                        if($budgetunset==1){
                                            
                                            if($wsp33["budget_date"]!=0) $bsdate=date("Y-m-d",$wsp33["budget_date"]); else $bsdate=date("Y-m-d",time());
                                            if($wsp33["budget_close_date"]!=0) $bedate=date("Y-m-d",$wsp33["budget_close_date"]); else $bedate=date("Y-m-d",time());
                                                        
                                            $startdate = date("d-M-Y", $wsp33["budget_date"]);
                                            $enddate = date("d-M-Y", $wsp33["budget_close_date"]); 
                                                        
                                            $totalamountx=0;
                                            $goforit=0;
                                            $ln1 = "select * from project_team_allocation where projectid='".$wsp33["id"]."' and status='1' order by id asc";
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
                                    
                                    echo"<div class='col-12 col-sm-6'>
                                        <span>Appointment & Invoice</span><hr>
                                        <table style='width:100%'><tr>";
                                            if($mtype=="ADMIN"){
                                                echo"<td align=center>
                                                    <a href='index.php?url=create_invoice.php&id=5161&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                        <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Create</span>
                                                    </a>
                                                </td>";
                                            }
                                            
                                            echo"<td align=center>
                                                <a href='index.php?url=appointment_manager.php&id=5310' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Appointments</span>
                                                </a>
                                            </td>";
                                            
                                            echo"<td align=center>
                                                <a href='index.php?url=create_invoice.php&id=5161' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>INV Templates</span>
                                                </a>
                                            </td><td align=center>
                                                <a href='index.php?url=unpaid_invoices.php&id=5162&selection=INCOME&statusupdate=2&poinz=2&cid=1002&sheba=ndis_invoices&utype=UNPAID+INVOICES&lid_date_from=2020-01-01&lid_date_to=$currentdate&lid=800000032&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Unpaid</span>
                                                </a>
                                            </td>
                                            <td align=center>
                                                <a href='index.php?url=paid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=2020-02-01&lid_date_to=$currentdate&lid=800000032&cname=".$rab1["clientid"]."&refby=project' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                                    <i data-acorn-icon='book'></i>&nbsp;&nbsp;<span>Paid</span>
                                                </a>
                                            </td>
                                        </tr></table><br><br>
                                    </div>";
                                
                                    echo"<div class='col-12 col-md-6'>
                                        <span>Category & Documents</span><hr>";
                                            if($advocatex!=1){
                                                echo"<table style='width:100%'><tr>
                                                    <td align=center>
                                                        <button type='button' data-bs-toggle='modal' data-bs-target='#PopupWindow' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                                            <i data-acorn-icon='box'></i>&nbsp;&nbsp;<span>Category</span>
                                                        </button>
                                                    </td>
                                                    <td align=center>";
                                                        echo"<a href='index.php?url=eod_document.php&id=5241' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>EOD</span></a>";
                                                        // echo"<a href='index.php?url=eod.php&id=5200&src_cid=".$rab1["clientid"]."' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>EOD</span></a>";
                                                    echo"</td>
                                                    <td align=center>
                                                        <a href='index.php?url=boc.php&id=5201&src_cid=".$rab1["clientid"]."' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>BOC</span></a>
                                                    </td>
                                                    <td align=center>
                                                        <a href='index.php?url=incident.php&id=5202&src_cid=".$rab1["clientid"]."' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'><i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Incident</span></a>
                                                    </td>
                                                </tr></table><br><br>";
                                            }else{
                                                echo"<table style='width:100%'><tr>
                                                    <td align=center>
                                                        <button type='button' data-bs-toggle='modal' data-bs-target='#PopupWindow' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:5px'>
                                                            <i data-acorn-icon='box'></i>&nbsp;&nbsp;<span>Category</span>
                                                        </button>
                                                    </td>
                                                    <td align=center>
                                                        <a href='https://nexis365.com/saas/index.php?url=case_category_manager.php&id=5394' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><span>Documents</span></a>
                                                    </td>
                                                    <td align=center>
                                                        <a href='index.php?url=articles.php&id=5201&src_cid=".$rab1["clientid"]."' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><span>Articles</span></a>
                                                    </td>
                                                    <td align=center>
                                                        <a href='index.php?url=references.php&id=5201&src_cid=".$rab1["clientid"]."' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'><span>References</span></a>
                                                    </td>
                                                </tr></table><br><br>";
                                            }
                                        
                                    echo"</div>";
                                }
                                
                                echo"<div class='col-12 col-md-12'>
                                    <section class='scroll-section' id='accordionCards'>
                                        <div class='card d-flex mb-2' style='padding:10px'>";
                                             
                                                echo"<div class='mb-n2' id=''>";
                                                    $cat1 = "select * from project_category where status='1' order by sorder asc";
                                                    $cat2 = $conn->query($cat1);
                                                    if ($cat2->num_rows > 0) { while($cat3 = $cat2->fetch_assoc()) {
                                                        $datatargetX="category".$cat3["id"]."X";
                                                        $datatargetXX="category".$cat3["id"]."XX";
                                                        $datatargetY="category".$cat3["id"]."Y";
                                                        $datatargetZ="category".$cat3["id"]."Z";
                                                        $categoryX="cat".$cat3["id"]."Z";
                                                        $categoryY="cat".$cat3["id"]."Y";
                                                        $t=$cat3["id"];
                                                        if($cat3["status"]==1){ 
                                                            $tabvar="collapse".$cat3["id"]."Cards";
                                                            
                                                            echo"<div class='card mb-5' data-itemid=".$cat3['id']."' style='padding:5px'>
                                                                <div class='ibox-title'>
                                                                    <div class='card-body' style='padding:5px'>
                                                                        <table style='width:100%'><tr>
                                                                            <td style='font-size:10pt;width:90%' align=left>
                                                                                <div class='btn btn-link list-item-heading p-0'><i class='fa fa-book'></i>&nbsp;&nbsp;
                                                                                    <a data-bs-toggle='collapse' href='#category-".$cat3["id"]."' onmouseover=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\" aria-expanded='false' aria-controls='collapseExample'>".$cat3["category"]."</a>
                                                                                </div>
                                                                            </td><td style='text-align:right' align=right>
                                                                                <div class='btn-group' style='margin-right:10px'>";
                                                                                    if($mtype!="USER"){
                                                                                        echo"<button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                                                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                                                                            <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#$datatargetX' aria-controls='offcanvasRightLarge' ><i class='fa fa-plus'></i> &nbsp;Add Note/Document</a>
                                                                                            <a class='dropdown-item' href='#' data-bs-toggle='modal' data-bs-target='#$datatargetXX' aria-controls='offcanvasRightLarge' ><i class='fa fa-edit'></i> &nbsp;Edit Category Name</a>
                                                                                            <a class='dropdown-item' href='updaterecord.php?susid=".$cat3["id"]."&tbl=project_category&status=0' target='dataprocessor' data-bs-toggle='modal' data-bs-target='#$datatargetXX' aria-controls='offcanvasRightLarge' ><i class='fa fa-times'></i> &nbsp;Suspend Record</a>
                                                                                        </div>
                                                                                        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' onclick=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\"><i class='fa fa-refresh'></i></button>";
                                                                                    }
                                                                                    echo"<a data-bs-toggle='collapse' href='#category-".$cat3["id"]."' onmouseover=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\" aria-expanded='false' aria-controls='collapseExample' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm'>
                                                                                        <i class='fa fa-angle-down'></i>
                                                                                    </a>
                                                                                </div>
                                                                            </td>
                                                                        </tr></table>
                                    
                                                                        <div class='collapse' id='category-".$cat3["id"]."'>
                                                                            <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                                                <div id='$datatargetY' style='padding:0px'>
                                                                                    <table class='table table-striped table-bordered table-hover dataTables-example1' >
                                                                                        <thead><tr><th>Date</th><th>Concern</th><th>Contact</th><th>Documents</th><th>Note</th></tr></thead>
                                                                                        <tbody>";
                                                                                            $ra1 = "select * from project_forms where projectid='".$_COOKIE["projectidx"]."' and categoryid='".$cat3["id"]."' and status='1' order by id desc";
                                                                                            $rb1 = $conn->query($ra1);
                                                                                            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                                                                                                $cdate=date("d-m-Y", $rab1["date"]);
                                                                                                $datatargetZZ="category".$rab1["categoryid"]."Z";
                                                                                                $datatargetYY="category".$rab1["categoryid"]."Y";
                                                                                                
                                                                                                echo"<tr class='gradeX'>
                                                                                                    <td nowrap><i class='fa fa-clock'></i>&nbsp; $cdate</td>
                                                                                                    <td nowrap>".$rab1["cname"]."</td>
                                                                                                    <td>".$rab1["contact"]."</td>
                                                                                                    <td>";
                                                                                                        $t=0;
                                                                                                        $ra1x = "select * from project_multi_image where postid='".$rab1["id"]."' and randid='".$rab1["randid"]."' and status='1' order by id desc";
                                                                                                        $rb1x = $conn->query($ra1x);
                                                                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                                                                            $loclength=0;
                                                                                                            $loclength=strlen($rab1x["location"]);
                                                                                                            if($loclength>=32){
                                                                                                                $t=($t+1);
                                                                                                                $locname="";
                                                                                                                $locname=substr($rab1x["location"],35);
                                                                                                                echo"<a href='".$rab1x["location"]."' target='cm'>$t. $locname</a><br>";
                                                                                                            }
                                                                                                        } }
                                                                                                    echo"</td>
                                                                                                    <td >
                                                                                                        <button data-bs-toggle='modal' data-bs-target='#formdata".$rab1["id"]."' class='btn btn-outline-primary'>View Note</button>
                                                                                                        <div class='modal fade modal-close-out' id='formdata".$rab1["id"]."' tabindex='-1' role='dialog' aria-labelledby='formdata".$rab1["id"]."CloseOut' aria-hidden='true' >
                                                                                                            <div class='modal-dialog'><div class='modal-content'>
                                                                                                                <div class='modal-header'>
                                                                                                                    <h5 class='modal-title' id='formdata".$rab1["id"]."CloseOut'>View Note</h5>
                                                                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                                                                </div>
                                                                                                                <div class='modal-body'><span style=''>".$rab1["note"]."</span></div>
                                                                                                            </div></div>
                                                                                                        </div>
                                                                                                    </td>
                                                                                                    <td style='width:20px'><div class='btn-group' onmouseout=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">";
                                                                                                        if($mtype!="USER"){
                                                                                                            echo"<a href='deleterecords.php?delid=".$rab1["id"]."&tbl=project_forms&sourceid=id' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                                                                                                <i class='fa fa-trash'></i>
                                                                                                            </a>";
                                                                                                        }
                                                                                                    echo"</div></td>
                                                                                                </tr>";
                                                                                            } }
                                                                                        echo"</tbody>
                                                                                    </table>
                                                                                </div>"; ?>
                                                                                <script type="text/javascript">
                                                                                    function <?php echo"$datatargetZ"; ?>(<?php echo"$categoryX"; ?>,<?php echo"$categoryY"; ?>){
                                                                                        $.ajax({
                                                                                            url: 'project-category-list.php?cid='+<?php echo"$categoryX"; ?>,
                                                                                            success: function(html) {
                                                                                                var ajaxDisplay = document.getElementById(<?php echo"$categoryY"; ?>);
                                                                                                ajaxDisplay.innerHTML = html;
                                                                                            }
                                                                                        });
                                                                                    }
                                                                                </script> <?php
                                                                            echo"</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                            
                                                        }
                                                        
                                                        echo"<div class='modal fade modal-close-out' id='$datatargetXX' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>".$cat3["category"]."</h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <form method='post' action='updaterecord.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                                                            <input type='hidden' name='processor' value='category'><input type='hidden' name='id' value='".$cat3["id"]."'>
                                                                            <div class='form-group'><label>Category Name</label><input name='category' type='text' required value='".$cat3["category"]."' class='form-control'></div><br>
                                                                            <div class='form-group'><label>Sort Order</label><input name='sorder' type='number' value='".$cat3["sorder"]."' class='form-control'></div><br>
        
                                                                            <div class='modal-footer'>
                                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                                                <button type='submit' class='btn btn-primary' onclick=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\">Update Category</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";
        
                                                        echo"<div class='modal fade modal-close-out' id='$datatargetX' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title' id='exampleModalLabelCloseOut'>".$cat3["category"]."</h5>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <form method='post' action='projectprocessor.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                                                                            <input type='hidden' name='processor' value='categorydata'><input type='hidden' name='processor1' value='".$cat3["type"]."'>
                                                                            <input type='hidden' name='id' value='".$cat3["id"]."'><input type='hidden' name='projectid' value='".$_COOKIE["projectidx"]."'>
                                                                            <div class='form-group'><label>Date *</label><input name='cdate' type='date' class='form-control' value='$currentdate'></div><br>
                                                                            <div class='form-group'><label>Concern/Title Name *</label><input name='cname' type='text' value='' class='form-control' required></div><br>
                                                                            <div class='form-group'><label>Contact/Introduction</label><input name='contact' type='text' value='' class='form-control'></div><br>
                                                                            <div class='form-group'><label>Select Single/Multiple Document to Upload<br>File Extention: *.doc, *.docx, *.pdf, *.jpg, *.png, *.gif, *.jpeg).</label>
                                                                                <input type='file' name='images[]' multiple class='form__field__img form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                                                                                <input type='hidden' name='sessionid' value='".$cat3["id"]."'>
                                                                            </div><br>
                                                                            <div class='form-group'><label>Detail Note (if any)</label><textarea id='summernote' name='note' class='form-control'></textarea></div>
        
                                                                            <div class='modal-footer'>
                                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                                                                <button type='submit' class='btn btn-primary' onclick=\"$datatargetZ('".$cat3["id"]."', '$datatargetY')\">Upload & Save Data</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>";
                                                    } }
                                                    
                                                    
                                                echo"</div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>";
                    } }
                    
                echo"</div>
            </div>
        </div>
    </div>";  