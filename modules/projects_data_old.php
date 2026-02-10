<?php

    include("../authenticator.php");
    
    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="CARD";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $prjsrc=0;
    if(isset($_GET["prjsrc"])) $prjsrc=$_GET["prjsrc"];
    
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    if(isset($_GET["status"])) $status=$_GET["status"]; 
    else $status=1;
    
    $stat=strlen($_GET["status"]);
    
    $advocatex=0;
    // $advocatey = "select * from solutions where id='10012' order by id asc limit 1";
    // $advocatez = $conn->query($advocatey);
    // if ($advocatez->num_rows > 0) { while($advocatexyz = $advocatez->fetch_assoc()) {  $advocatex=1; } }
    
    if($advocatex==1){
        $titlexyz="Case";
        $tl="Senior Advocate/Incharge";
        $sc="Junior Advocate/Helper";
        $ast="Allocated Assistants";
    }else{
        $titlexyz="Project";
        $tl="Team Leader";
        $sc="Support Co-ordinator";
        $ast="Allocated Support Team";
    }
    
    echo"<div class='card-body' style='width:100%;padding:0px'><br><br>";
        
        if($viewmode=="LIST"){
                if($prjsrc!=0){
                    if($mtype=="ADMIN") $ra1 = "select * from project where id='$prjsrc' and status='$status' order by name asc";
                    else if($mtype=="CLIENT") $ra1 = "select * from project where id='$prjsrc' and clientid='$userid' and status='$status' order by name asc";
                    // else $ra1 = "select * from project where leaderid='$userid' and id='$prjsrc' and and status='$status' order by name asc";
                    else $ra1 = "select * from project where id='$prjsrc' and and status='$status' order by name asc";
                }else{
                    if($mtype=="ADMIN") $ra1 = "select * from project where status='$status' order by name asc";
                    else if($mtype="CLIENT") $ra1 = "select * from project where clientid='$userid' and status='$status' order by name asc";
                    // else $ra1 = "select * from project where leaderid='$userid' and status='$status' order by name asc";
                    else $ra1 = "select * from project where status='$status' order by name asc";
                }
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                    
                    // $sdate=date("d.m.Y",$rab1["start_date"]);
                    // $edate=date("d.m.Y",$rab1["end_date"]);
                    
                    $sdate=date("d.m.Y",time());
                    $edate=date("d.m.Y",time());
                    
                    $clientname1="";
                    $clientname2="";
                    $clientimage="";
                    $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                        $clientname1=$rab2["username"];
                        $clientname2=$rab2["username2"];
                        $clientimage=$rab2["images"];
                    } }
                    
                    if($advocatex==1){
                        $leadername1="";
                        $leadername2="";
                        $leaderimage="";
                        $ra3 = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $leadername1=$rab3["username"];
                            $leadername2=$rab3["username2"];
                            $leaderimage=$rab3["images"];
                            $ra4 = "select * from departments where id='".$rab3["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $leaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab3["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $leaderdesignation=$rab5["designation"]; } }
                            
                        } }
                    }
                    
                    $teamleadername1="";
                    $teamleadername2="";
                    $teamleaderimage="";
                    $ra10 = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                    $ra11 = $conn->query($ra10);
                    if ($ra11->num_rows > 0) { while($ra12 = $ra11->fetch_assoc()) {
                        $teamleadername1=$ra12["username"];
                        $teamleadername2=$ra12["username2"];
                        $teamleaderimage=$ra12["images"];
                        $ra4 = "select * from departments where id='".$ra12["department"]."' order by id asc limit 1";
                        $rb4 = $conn->query($ra4);
                        if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $teamleaderdepartment=$rab4["department_name"]; } }
                        
                        $ra5 = "select * from designation where id='".$ra12["designation"]."' order by id asc limit 1";
                        $rb5 = $conn->query($ra5);
                        if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $teamleaderdesignation=$rab5["designation"]; } }
                        
                    } }
                    
                    $frmid=$rab1["id"];
                    echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                        <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                            <div class='row' style='width:100%'>
                                <div class='col-12 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' name='loginForm$frmid'>";
                                        if(strlen($rab1["image"]>=5)) echo"<img src='".$rab1["image"]."' style='width:100%' alt='".$rab1["name"]."' />";
                                        else echo"<img src='img/no_image.png' style='width:100%' alt='".$rab1["name"]."' />";
                                        echo"<input type='hidden' name='processor' value='edit_project_image'><input type='hidden' name='id' value='".$rab1["id"]."'>
                                        <input type='file' name='images1[]' multiple onchange=\"this.form.submit(); shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" style='position:absolute;z-index:999;width:10px;margin-top:0px;margin-top:3px;margin-left:-15px;height:10px'>
                                    </form>
                                </div>";
                                if($advocatex==1){
                                    $title="$ast Allocation For ".$rab1["name"].".";
                                    
                                    $adv1 = "select * from project_type where id='".$rab1["court"]."' order by id asc limit 1";
                                    $adv2 = $conn->query($adv1);
                                    if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $court=$adv3["name"]; } }
                                    
                                    $adv1 = "select * from project_type where id='".$rab1["court"]."' order by id asc limit 1";
                                    $adv2 = $conn->query($adv1);
                                    if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $court=$adv3["name"]; } }
                                    
                                    $adv1 = "select * from project_type where id='".$rab1["category"]."' order by id asc limit 1";
                                    $adv2 = $conn->query($adv1);
                                    if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $category=$adv3["name"]; } }
                                    
                                    $adv1 = "select * from project_type where id='".$rab1["stage"]."' order by id asc limit 1";
                                    $adv2 = $conn->query($adv1);
                                    if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $stage=$adv3["name"]; } }
                                    
                                    $adv1 = "select * from project_type where id='".$rab1["act"]."' order by id asc limit 1";
                                    $adv2 = $conn->query($adv1);
                                    if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $act=$adv3["name"]; } }
                        
                                    echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                        <span style='font-size:8pt'>Case #: ".$rab1["caseid"]."</span><br>
                                        <span style='font-size:10pt'>".$rab1["name"]."</span><br>
                                        <span style='font-size:8pt'>Client: $clientname1 $clientname2</span>
                                    </div><div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                        <span style='font-size:8pt'>Filling Date: $sdate</span><br>
                                        <span style='font-size:8pt'>Next Hearing Date: $edate</span><br>
                                        <span style='font-size:8pt'>Opponent Lawyer : ".$rab1["managed_by"]."</span>
                                    </div><div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                        <span style='font-size:8pt'>Court : $court</span><br>
                                        <span style='font-size:8pt'>Category : $category</span><br>
                                        <span style='font-size:8pt'>Stage : $stage</span><br>
                                        <span style='font-size:8pt'>ACT : $act</span>
                                    </div><div class='col-4 col-md-2' style='padding-bottom:5px;padding-top:10px'>
                                        <span style='font-size:8pt'>$tl:<br>$teamleadername1 $teamleadername2</span><br>
                                        <span style='font-size:8pt'>$sc:<br>$leadername1 $leadername2</span>
                                    </div>";
                                    
                                }else{
                                    echo"<div class='col-12 col-md-2' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                        <div>".$rab1["name"]."</div>";
                                        // <div class='text-small text-muted'>From: $sdate, To: $edate</div>
                                    echo"</div>
                                    <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>";
                                        if(strlen($clientimage)>=5) echo"<img src='$clientimage' style='border:1px solid #ccc;border-radius:5px;width:45px;height:45px' title=''>";
                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:5px;width:45px;height:45px' title=''>";
                                        echo"<br><span style='font-size:8pt'>Participant<br>$clientname1 $clientname2</span>
                                    </div>
                                    <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>";
                                        if(strlen($teamleaderimage)>=5) echo"<img src='$teamleaderimage' style='border:1px solid #ccc;border-radius:5px;width:45px;height:45px' title=''>";
                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:5px;width:45px;height:45px' title=''>";
                                        echo"<br><span style='font-size:8pt'>$tl<br>$teamleadername1 $teamleadername2</span>
                                    </div>
                                    <div class='col-4 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>";
                                        if(strlen($leaderimage)>=100) echo"<img src='$leaderimage' style='border:1px solid #ccc;border-radius:5px;width:45px;height:45px' title=''>";
                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:5px;width:45px;height:45px' title=''>";
                                        echo"<br><span style='font-size:8pt'>Co-ordinator<br>".$rab1["leaderid"]."</span>
                                    </div>
                                    <div class='col-11 col-md-5' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                        <div class='row'>";
                                            $title="$ast Allocation For ".$rab1["name"].".";
                                            $tt=0;
                                            $ttt=0;
                                            $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc";
                                            $rb6 = $conn->query($ra6);
                                            if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                $rb7 = $conn->query($ra7);
                                                if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                    $tt=($tt+1);
                                                    $ttt=($ttt+1);
                                                    echo"<div class='col-4 col-md-2' style='text-align:center;padding-left:2px;padding-right:2px'>";
                                                        if(strlen($rab7["images"])>=100) echo"<img src='".$rab7["images"]."' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab7["username"]."' />";
                                                        else echo"<img src='./assets/noimage.png' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:5px' title='".$rab7["username"]."' />";
                                                    echo"<br><span style='font-size:8pt'>$ast<br>".$rab7["username"]."</span></div>";
                                                    
                                                } }
                                            } }
                                        echo"</div>
                                    </div>";
                                }
                                
                                
                                echo"<div class='col-1 col-md-1' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                            <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                                                <a class='dropdown-item' href='#' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects-team.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title&status=$status', 'offcanvasRightLarge')\" >Add $ast</button>
                                                <a class='dropdown-item' href='global-set.php?pstat=1&projectidx=".$rab1["id"]."&url=projects.php&id=62&pstat=1' target='dataprocessor' >Project Profile</a>
                                                <a class='dropdown-item' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title&status=$status&pstat=1&sf=1', 'offcanvasRightLarge')\">Edit</a>";
                                                if($rab1["status"]==1) echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">Suspend</a>";
                                                else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">Activate</a>";
                                                echo"<a class='dropdown-item' href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=project' target='dataprocessor' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">Completed</a>";
                                                // echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processorx=clients_data&cidx=$cid&delidx=$uid&tblx=$sheba&sourceidx=id', 'offcanvasTop')\" onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">Delete</a>";
                                            echo"</div>";
                                        
                                    echo"</div>
                                </div>                  
                            </div>
                        </div>
                    </div>";
                } }
                
        }else{
            
            echo"<div class='row' style='padding-left:5px;padding-right:5px'>";
                if($prjsrc!=0){
                    if($mtype=="ADMIN") $ra1 = "select * from project where id='$prjsrc' and status='$status' order by name asc";
                    else if($mtype=="CLIENT") $ra1 = "select * from project where id='$prjsrc' and clientid='$userid' and status='$status' order by name asc";
                    // else  $ra1 = "select * from project where id='$prjsrc' and leaderid='$userid' and status='$status' order by name asc";
                    else $ra1 = "select * from project where id='$prjsrc' and status='$status' order by name asc";
                }else{
                    if($mtype=="ADMIN") $ra1 = "select * from project where status='$status' order by name asc";
                    else if($mtype=="CLIENT") $ra1 = "select * from project where clientid='$userid' and status='$status' order by name asc";
                    // else  $ra1 = "select * from project where leaderid='$userid' and status='$status' order by name asc";
                    else $ra1 = "select * from project where status='$status' order by name asc";
                }
                
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                    
                    // $sdate=date("d.m.Y",$rab1["start_date"]);
                    // $edate=date("d.m.Y",$rab1["end_date"]);
                    
                    $sdate=date("d.m.Y",time());
                    $edate=date("d.m.Y",time());
                    
                    $clientname1="";
                    $clientname2="";
                    $clientimage="";
                    $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                        $clientname1=$rab2["username"];
                        $clientname2=$rab2["username2"];
                        $clientimage=$rab2["images"];
                    } }
                    
                    if($advocatex==1){
                        $leadername1="";
                        $leadername2="";
                        $leaderimage="";
                        $ra3 = "select * from uerp_user where id='".$rab1["leaderid"]."' order by id asc limit 1";
                        $rb3 = $conn->query($ra3);
                        if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) {
                            $leadername1=$rab3["username"];
                            $leadername2=$rab3["username2"];
                            $leaderimage=$rab3["images"];
                            $ra4 = "select * from departments where id='".$rab3["department"]."' order by id asc limit 1";
                            $rb4 = $conn->query($ra4);
                            if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $leaderdepartment=$rab4["department_name"]; } }
                            
                            $ra5 = "select * from designation where id='".$rab3["designation"]."' order by id asc limit 1";
                            $rb5 = $conn->query($ra5);
                            if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $leaderdesignation=$rab5["designation"]; } }
                            
                        } }
                    }
                    $teamleadername1="";
                    $teamleadername2="";
                    $teamleaderimage="";
                    $ra10 = "select * from uerp_user where id='".$rab1["teamleaderid"]."' order by id asc limit 1";
                    $ra11 = $conn->query($ra10);
                    if ($ra11->num_rows > 0) { while($ra12 = $ra11->fetch_assoc()) {
                        $teamleadername1=$ra12["username"];
                        $teamleadername2=$ra12["username2"];
                        $teamleaderimage=$ra12["images"];
                        $ra4 = "select * from departments where id='".$ra12["department"]."' order by id asc limit 1";
                        $rb4 = $conn->query($ra4);
                        if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $teamleaderdepartment=$rab4["department_name"]; } }
                        
                        $ra5 = "select * from designation where id='".$ra12["designation"]."' order by id asc limit 1";
                        $rb5 = $conn->query($ra5);
                        if ($rb5->num_rows > 0) { while($rab5 = $rb5->fetch_assoc()) { $teamleaderdesignation=$rab5["designation"]; } }
                        
                    } }
                    
                    $frmid=$rab1["id"];
                    
                    if($mtype=="ADMIN" OR $mtype=="CLIENT"){
                        echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:3px;padding-top:4px'>
                            <div class='card mb-3'>
                                <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' name='loginForm$frmid'>";
                                    if(strlen($rab1["image"]>=5)) echo"<img src='".$rab1["image"]."' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                    else echo"<img src='img/no_image.png' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                    echo"<input type='hidden' name='processor' value='edit_project_image'><input type='hidden' name='id' value='".$rab1["id"]."'>";
                                    // <button onclick='this.form.images1[].click()' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='border-radius:10px;position:absolute;z-index:999999999;margin-top:10px;margin-left:-45px'>+</button>
                                    echo"<input type='file' name='images1[]' multiple class='form__field__img form-control' onchange=\"this.form.submit(); shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" style='width:100px;margin-left:3px;margin-top:-36px'>
                                </form>
                                
                                <div class='card-body mb-n5' style='padding:10px;min-height:600px'>
                                    <div class='d-flex align-items-left flex-column mb-5' style='padding:0px'>";
                                        
                                        if($advocatex==1){
                                        
                                            $adv1 = "select * from project_type where id='".$rab1["court"]."' order by id asc limit 1";
                                            $adv2 = $conn->query($adv1);
                                            if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $court=$adv3["name"]; } }
                                            
                                            $adv1 = "select * from project_type where id='".$rab1["category"]."' order by id asc limit 1";
                                            $adv2 = $conn->query($adv1);
                                            if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $category=$adv3["name"]; } }
                                            
                                            $adv1 = "select * from project_type where id='".$rab1["stage"]."' order by id asc limit 1";
                                            $adv2 = $conn->query($adv1);
                                            if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $stage=$adv3["name"]; } }
                                            
                                            $adv1 = "select * from project_type where id='".$rab1["act"]."' order by id asc limit 1";
                                            $adv2 = $conn->query($adv1);
                                            if ($adv2->num_rows > 0) { while($adv3 = $adv2->fetch_assoc()) { $act=$adv3["name"]; } }
                                
                                            echo"<table width='100%'>
                                                <tr><td style='height:70px' valign='top'><h3 class='m-b-xs'>".$rab1["name"]."</h3></td></tr>
                                                <tr><td>
                                                    <table style='width:100%'>
                                                        <tr><td>Case Number</td><td>:</td><td>".$rab1["caseid"]."</td></tr>
                                                        <tr><td>Filling Date</td><td>:</td><td>$sdate</td></tr>
                                                        <tr><td>Next Hearing Date</td><td>:</td><td>$edate</td></tr>
                                                        <tr><td>Court</td><td>:</td><td>$court</td></tr>
                                                        <tr><td>Category</td><td>:</td><td>$category</td></tr>
                                                        <tr><td>Stage</td><td>:</td><td>$stage</td></tr>
                                                        <tr><td>ACT</td><td>:</td><td>$act</td></tr>
                                                        <tr><td>Opponent Lawyer</td><td>:</td><td>".$rab1["managed_by"]."</td></tr>
                                                    </table>
                                                </td></tr>
                                            </table>
                                            <hr>
                                            <table width='100%'><tr>
                                                <td style='padding:3px;width:30%' align=center valign=top>
                                                    <img src='$clientimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>
                                                </td>
                                                <td style='padding:3px;width:70%' align=left valign=top>
                                                    <span style='font-size:8pt'>Client/Participant</span><br>
                                                    <span style='font-size:10pt'>$clientname1 $clientname2</span>
                                                </td>
                                            </tr></table><hr>
            
                                            <table width='100%'>
                                                <tr>
                                                    <td style='padding:3px;width:30%' align=center valign=top>";
                                                        if(strlen($teamleaderimage)>=100) echo"<img src='$teamleaderimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                    echo"</td>
                                                    <td style='padding:3px;width:70%' align=left valign=top>
                                                        <span style='font-size:8pt'>$tl</span><br>
                                                        <span style='font-size:10pt'>$teamleadername1 $teamleadername2</span>
                                                    </td>
                                                </tr>
                                                <tr><td colspan=2><hr></td></tr>
                                                <tr>
                                                    <td style='padding:3px;width:30%' align=center valign=top>";
                                                        if(strlen($leaderimage)>=100) echo"<img src='$leaderimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                    echo"</td>
                                                    <td style='padding:3px;width:70%' align=left valign=top>
                                                        <span style='font-size:8pt'>$sc</span><br>
                                                        <span style='font-size:10pt'>$leadername1 $leadername2</span>
                                                    </td>
                                                </tr>
                                                <tr><td colspan=2><hr></td></tr>
                                            </table>
                                            <span style='font-size:10pt;padding-bottom:10px'>$ast</span>
                                            <table><tr>";
                                                $title="$ast Allocation For ".$rab1["name"].".";
                                                $tt=0;
                                                $ttt=0;
                                                
                                                $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc";
                                                $rb6 = $conn->query($ra6);
                                                if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                    $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                    $rb7 = $conn->query($ra7);
                                                    if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) { $tt=($tt+1); } }
                                                } }
                                                
                                                $ra66 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc limit 3";
                                                $rb66 = $conn->query($ra66);
                                                if ($rb66->num_rows > 0) { while($rab66 = $rb66->fetch_assoc()) {
                                                    $ra77 = "select * from uerp_user where id='".$rab66["employeeid"]."' order by id asc limit 1";
                                                    $rb77 = $conn->query($ra77);
                                                    if ($rb77->num_rows > 0) { while($rab77 = $rb77->fetch_assoc()) {
                                                        $ttt=($ttt+1);
                                                        echo"<td style='width:25%;padding:5px;line-height:1.2;' align=center valign=top nowrap>";
                                                            if(strlen($rab77["images"])>=100) echo"<img src='".$rab77["images"]."' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                            else echo"<img src='./assets/noimage.png' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                        echo"<br><span style='font-size:8pt'>".$rab77["username"]."</span></td>";
                                                        if($ttt>=4){
                                                            $ttt=0;
                                                            echo"</tr><tr>";
                                                        }
                                                    } }
                                                } }
                                                echo"<td style='width:25%;padding:5px;line-height:1.2;' align=center valign=middle nowrap>
                                                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects-team.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title', 'offcanvasRightLarge')\" title='View All $ast'>$tt+</button>
                                                </td>
                                            </tr></table>";
                                            
                                        }else{
                                            
                                            echo"<table width='100%'>
                                                <tr><td style='height:50px' valign='top'><h4 class='m-b-xs'>".$rab1["name"]."</h3></td></tr>";
                                                // <tr><td><span style='font-size:8pt'>From: $sdate, To: $edate</span></td></tr>
                                            echo"</table>
                                            <hr>
                                            <table width='100%'><tr>
                                                <td style='padding:3px;width:30%' align=center valign=top>
                                                    <img src='$clientimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>
                                                </td>
                                                <td style='padding:3px;width:70%' align=left valign=top>
                                                    <span style='font-size:8pt'>Client/Participant</span><br>
                                                    <span style='font-size:10pt'>$clientname1 $clientname2</span>
                                                </td>
                                            </tr></table><hr>
            
                                            <table width='100%'>
                                                <tr>
                                                    <td style='padding:3px;width:30%' align=center valign=top>";
                                                        if(strlen($teamleaderimage)>=100) echo"<img src='$teamleaderimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                    echo"</td>
                                                    <td style='padding:3px;width:70%' align=left valign=top>
                                                        <span style='font-size:8pt'>$tl</span><br>
                                                        <span style='font-size:10pt'>$teamleadername1 $teamleadername2</span>
                                                    </td>
                                                </tr>
                                                <tr><td colspan=2><hr></td></tr>
                                                <tr>
                                                    <td style='padding:3px;width:30%' align=center valign=top>";
                                                        if(strlen($leaderimage)>=100) echo"<img src='$leaderimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                    echo"</td>
                                                    <td style='padding:3px;width:70%' align=left valign=top>
                                                        <span style='font-size:8pt'>$sc</span><br>
                                                        <span style='font-size:10pt'>".$rab1["leaderid"]."</span>
                                                    </td>
                                                </tr>
                                                <tr><td colspan=2><hr></td></tr>
                                            </table>
                                            <span style='font-size:10pt;padding-bottom:10px'>Allocated $ast</span>
                                            <table><tr>";
                                                $title="$ast Allocation For ".$rab1["name"].".";
                                                $tt=0;
                                                $ttt=0;
                                                
                                                $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc";
                                                $rb6 = $conn->query($ra6);
                                                if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                    $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                    $rb7 = $conn->query($ra7);
                                                    if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) { $tt=($tt+1); } }
                                                } }
                                                
                                                $ra66 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc limit 3";
                                                $rb66 = $conn->query($ra66);
                                                if ($rb66->num_rows > 0) { while($rab66 = $rb66->fetch_assoc()) {
                                                    $ra77 = "select * from uerp_user where id='".$rab66["employeeid"]."' order by id asc limit 1";
                                                    $rb77 = $conn->query($ra77);
                                                    if ($rb77->num_rows > 0) { while($rab77 = $rb77->fetch_assoc()) {
                                                        $ttt=($ttt+1);
                                                        echo"<td style='width:25%;padding:5px;line-height:1.2;' align=center valign=top nowrap>";
                                                            if(strlen($rab77["images"])>=100) echo"<img src='".$rab77["images"]."' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                            else echo"<img src='./assets/noimage.png' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                        echo"<br><span style='font-size:8pt'>".$rab77["username"]."</span></td>";
                                                        if($ttt>=4){
                                                            $ttt=0;
                                                            echo"</tr><tr>";
                                                        }
                                                    } }
                                                } }
                                                echo"<td style='width:25%;padding:5px;line-height:1.2;' align=center valign=middle nowrap>
                                                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects-team.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title', 'offcanvasRightLarge')\" title='View All $ast'>$tt+</button>
                                                </td>
                                            </tr></table>";
                                        }
                                    
                                        echo"<br><br>
                                        <div style='width:100%;text-align:center'>
                                            <table style='width:100%'><tr>
                                                <td valign=top align=center>
                                                    <a href='global-set.php?pstat=1&projectidx=".$rab1["id"]."&url=projects.php&id=62' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Project Profile'><i class='fa-solid fa-eye'></i></a>
                                                    <br><span style='font-size:8pt'>View</span>
                                                </td>
                                                <td valign=top align=center>
                                                    <a href='#' data-bs-toggle='offcanvas' data-bs-placement='bottom' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('projects_manager.php?pid=".$rab1["id"]."&sheba=project&ctitle=$title&status=$status&pstat=1&sf=1', 'offcanvasRightLarge')\" style='margin-top:0px;' title='Edit Project Data'><i class='fa-solid fa-edit'></i></a>
                                                    <br><span style='font-size:8pt'>Edit</span>
                                                <td>
                                                <td valign=top align=center>";
                                                    if($status==10) echo"<a href='suspendrecord.php?suspendid2=".$rab1["id"]."&tbl=project' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Activate Project'><i class='fa-solid fa-unlock-alt'></i></a><br><span style='font-size:8pt'>Activate</span>";
                                                    else echo"<a href='suspendrecord.php?suspendid=".$rab1["id"]."&tbl=project' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Suspend This Project'><i class='fa-solid fa-lock'></i></a><br><span style='font-size:8pt'>Suspend</span>";
                                                echo"</td>
                                                <td valign=top align=center>
                                                    <a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=project' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('projects_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Set Project status to Completed'><i class='fa-solid fa-close'></i></a>
                                                    <br><span style='font-size:8pt'>Close</span>
                                                </td>
                                            </tr></table>
                                        </div>
                                    </center></div>
                                </div>
                            </div>
                        </div>";
                    }
                    if($mtype=="USER"){
                        $tx=0;
                        $tx1 = "select * from project_team_allocation where employeeid='$userid' and projectid='".$rab1["id"]."' and status='1' order by id asc limit 1";
                        $tx2 = $conn->query($tx1);
                        if ($tx2->num_rows > 0) { while($tx3 = $tx2->fetch_assoc()) { $tx=($tx+1); } }
                        if($tx>=1){
                            echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:3px;padding-top:4px'>
                                <div class='card mb-3'>";
                                    if(strlen($rab1["image"]>=5)) echo"<img src='".$rab1["image"]."' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                    else echo"<img src='img/no_image.png' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                    echo"<div class='card-body mb-n5' style='padding:10px;min-height:600px'>
                                        <div class='d-flex align-items-left flex-column mb-5' style='padding:0px'>
                                            <table width='100%'>
                                                <tr><td style='height:50px' valign='top'><h4 class='m-b-xs'>".$rab1["name"]."</h3></td></tr>";
                                                // <tr><td><span style='font-size:8pt'>From: $sdate, To: $edate</span></td></tr>
                                            echo"</table><hr>
                                            <table width='100%'><tr>
                                                <td style='padding:3px;width:30%' align=center valign=top>
                                                    <img src='$clientimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>
                                                </td>
                                                <td style='padding:3px;width:70%' align=left valign=top>
                                                    <span style='font-size:8pt'>Client/Participant</span><br>
                                                    <span style='font-size:10pt'>$clientname1 $clientname2</span>
                                                </td>
                                            </tr></table><hr>
                                            <table width='100%'>
                                                <tr>
                                                    <td style='padding:3px;width:30%' align=center valign=top>";
                                                        if(strlen($teamleaderimage)>=100) echo"<img src='$teamleaderimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                    echo"</td>
                                                    <td style='padding:3px;width:70%' align=left valign=top>
                                                        <span style='font-size:8pt'>$tl</span><br>
                                                        <span style='font-size:10pt'>$teamleadername1 $teamleadername2</span>
                                                    </td>
                                                </tr>
                                                <tr><td colspan=2><hr></td></tr>
                                                <tr>
                                                    <td style='padding:3px;width:30%' align=center valign=top>";
                                                        if(strlen($leaderimage)>=100) echo"<img src='$leaderimage' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                        else echo"<img src='./assets/noimage.png' style='border:1px solid #ccc;border-radius:50%;width:45px;height:45px' title=''>";
                                                    echo"</td>
                                                    <td style='padding:3px;width:70%' align=left valign=top>
                                                        <span style='font-size:8pt'>$sc</span><br>
                                                        <span style='font-size:10pt'>".$rab1["leaderid"]."</span>
                                                    </td>
                                                </tr>
                                                <tr><td colspan=2><hr></td></tr>
                                            </table>
                                            <span style='font-size:10pt;padding-bottom:10px'>Allocated $ast</span>
                                            <table><tr>";
                                                $title="$ast Allocation For ".$rab1["name"].".";
                                                $tt=0;
                                                $ttt=0;
                                                
                                                $ra6 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc";
                                                $rb6 = $conn->query($ra6);
                                                if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                                    $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                                    $rb7 = $conn->query($ra7);
                                                    if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) { $tt=($tt+1); } }
                                                } }
                                                
                                                $ra66 = "select * from project_team_allocation where projectid='".$rab1["id"]."' and status='1' order by id asc";
                                                $rb66 = $conn->query($ra66);
                                                if ($rb66->num_rows > 0) { while($rab66 = $rb66->fetch_assoc()) {
                                                    $ra77 = "select * from uerp_user where id='".$rab66["employeeid"]."' order by id asc limit 1";
                                                    $rb77 = $conn->query($ra77);
                                                    if ($rb77->num_rows > 0) { while($rab77 = $rb77->fetch_assoc()) {
                                                        $ttt=($ttt+1);
                                                        echo"<td style='width:25%;padding:5px;line-height:1.2;' align=center valign=top nowrap>";
                                                            if(strlen($rab77["images"])>=100) echo"<img src='".$rab77["images"]."' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                            else echo"<img src='./assets/noimage.png' class='border-foreground' alt='thumb' style='width:40px;height:40px;border-radius:50%' title='".$rab77["username"]."' />";
                                                        echo"<br><span style='font-size:8pt'>".$rab77["username"]."</span></td>";
                                                        if($ttt>=4){
                                                            $ttt=0;
                                                            echo"</tr><tr>";
                                                        }
                                                    } }
                                                } }
                                            echo"</tr></table><br><br>
                                            <div style='width:100%;text-align:center'>
                                                <table style='width:100%'><tr>
                                                    <td valign=top align=center>
                                                        <a href='global-set.php?pstat=1&projectidx=".$rab1["id"]."&url=projects.php&id=62' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Project Profile'><i class='fa-solid fa-eye'></i></a>
                                                        <br><span style='font-size:8pt'>View</span>
                                                    </td>
                                                </tr></table>
                                            </div>
                                        </div>    
                                    </center></div>
                                </div>
                            </div>";
                        }
                    }
                } }
    
                /*
                echo"<div class='modal fade modal-close-out' id='closeButtonOutExamplex' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>$ast Available For Shifting</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' id='TeamManager'>123";
                                /*
                                $s1 = "select * from uerp_user where mtype='USER' OR mtype='EMPLOYEE' order by username asc";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    $lastid=$rs1["id"];
                                    $rand=rand(100,999);
                                    $uid=$rs1["id"];
                                    $status=$rs1["status"];
                                    if($status==1) $status="ON";
                                    else $status="OFF";
                    
                                    echo"<div class='card' style='padding:0px;margin-bottom:10px'>
                                        <div class='card-body mb-n2 border-last-none h-100' style='width:100%;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px'>
                                            <div class='row' style='width:100%'>
                                                <div class='col-12 col-md-2' style='text-align:center;padding-bottom:5px;padding-top:4px'>
                                                    <img src='./assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col-4 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                                    <div>".$rs1["username"]." ".$rs1["username2"]."</div><div class='text-small text-muted'>".$rs1["unbox"]."</div>                                
                                                </div>
                                                <div class='col-4 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:10px'>
                                                    <div>".$rs1["email"]."</div><div class='text-small text-muted'>Mobile: ".$rs1["phone"]."</div>
                                                </div>
                                                <div class='col-4 col-md-2' style='text-align:center;padding-bottom:5px;padding-top:10px'>
                                                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' ><i class='fa-solid fa-user'></i>&nbsp;&nbsp;<span>Send Shift Request</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                } }
                                */ /*
                                echo"</div>";
                                ?> <script type="text/javascript">
                                    function getTeamData(projectid1,projectid2){
                                        $.ajax({
                                            url: './modules/projects-team.php?pid='+projectid1, 
                                            success: function(html) {
                                                var ajaxDisplay = document.getElementById(projectid2);
                                                ajaxDisplay.innerHTML = html;
                                            }
                                        });
                                    }
                                </script> <?php
                            /* echo"<div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='button' class='btn btn-primary'>Save changes</button>
                            </div>"; *//*
                        echo"</div>
                    </div>
                </div>";
                    */
            echo"</div>";
        }
    echo"</div>";
