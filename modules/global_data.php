<?php

    include("../authenticator.php");

    $dbname="project_sc";
    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    echo"<div class='card-body' style='width:100%;padding:0px'><br>
        <div class='row' style='padding-left:5px;padding-right:5px'>
            <div class='col-12'>
                <ul class='nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs' role='tablist'>
                    <li class='nav-item' role='presentation'><a class='nav-link active' data-bs-toggle='tab' href='#ActiveTab' role='tab' aria-selected='true'>Active</a></li>
                    <li class='nav-item' role='presentation'><a class='nav-link' data-bs-toggle='tab' href='#SuspendedTab' role='tab' aria-selected='false'>Suspended</a></li>
                    <li class='nav-item' role='presentation'><a class='nav-link' data-bs-toggle='tab' href='#CompletedTab' role='tab' aria-selected='false'>Completed</a></li>
                    <li class='nav-item dropdown ms-auto d-none responsive-tab-dropdown'>
                        <a class='btn btn-icon btn-icon-only btn-background pt-0' href='#' role='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-diplay='static'>
                            <i data-acorn-icon='more-horizontal'></i>
                        </a>
                        <ul class='dropdown-menu mt-2 dropdown-menu-end'></ul>
                    </li>
                </ul>
              
                <div class='tab-content'>";
                
                    // 1st tab
                    echo"<div class='tab-pane fade active show' id='ActiveTab' role='tabpanel'><br><h3>Active Records</h1><hr><div class='row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2 mb-5'>";
                        echo"";
                        $ra1 = "select * from $dbname where status='1' order by name asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            $sdate=date("d.m.Y",$rab1["start_date"]);
                            $edate=date("d.m.Y",$rab1["end_date"]);
                            
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
                            
                            echo"<div class='col-lg-6'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <div class='row g-0 sh-6'>
                                            <div class='col-auto'><img src='$clientimage' class='card-img rounded-xl sh-6 sw-6' alt='thumb' /></div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div><b><i class='fa fa-id-card'></i> ".$rab1["name"]."</b></div>
                                                        <div><i class='fa fa-user'></i> $clientname1 $clientname2</div>
                                                        <div class='text-small text-muted' style='width:100%'>From: $sdate, To: $edate</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <div class='btn-group'>
                                                            <a href='global-set.php?pstat=1&projectidx=".$rab1["id"]."&url=".$_GET["url"].".php&id=".$_GET["id"]."&pstat=1' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px'><i class='fa fa-eye'></i></a>
                                                            <a href='index.php?url=".$_GET["url"]."&pstat=1&pid=".$rab1["id"]."' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='_top' style='margin-top:0px'><i class='fa fa-edit'></i></a>
                                                            <a href='suspendrecord.php?suspendid=".$rab1["id"]."&tbl=$dbname' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;color:red'><i class='fa fa-pause'></i></a>
                                                            <a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=$dbname' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;color:red'><i class='fa fa-close'></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        } }
                        
                    echo"</div></div>";
                    
                    // 2nd tab
                    echo"<div class='tab-pane fade' id='SuspendedTab' role='tabpanel'><br><h3>Suspended Records</h1><hr><div class='row row-cols-1 row-cols-sm-2 row-cols-xxl-3 g-2'>";
                        $ra1 = "select * from $dbname where status='10' order by name asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            $sdate=date("d.m.Y",$rab1["start_date"]);
                            $edate=date("d.m.Y",$rab1["end_date"]);
                            
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
                            
                            echo"<div class='col'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <div class='row g-0 sh-6'>
                                            <div class='col-auto'><img src='$clientimage' class='card-img rounded-xl sh-6 sw-6' alt='thumb' /></div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div><b><i class='fa fa-id-card'></i> ".$rab1["name"]."</b></div>
                                                        <div><i class='fa fa-user'></i> $clientname1 $clientname2</div>
                                                        <div class='text-small text-muted' style='width:100%'>From: $sdate, To: $edate</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <div class='btn-group'>
                                                            <a href='global-set.php?pstat=1&projectidx=".$rab1["id"]."&url=".$_GET["url"].".php&id=".$_GET["id"]."&pstat=1' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px'><i class='fa fa-eye'></i></a>
                                                            <a href='index.php?url=".$_GET["url"]."&pstat=1&pid=".$rab1["id"]."' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='_top' style='margin-top:0px'><i class='fa fa-edit'></i></a>
                                                            <a href='suspendrecord.php?suspendid2=".$rab1["id"]."&tbl=$dbname' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;color:red'><i class='fa fa-play'></i></a>
                                                            <a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=$dbname' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;color:red'><i class='fa fa-close'></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        } }
                    echo"</div></div>";
                    
                    // 3rd tab
                    echo"<div class='tab-pane fade' id='CompletedTab' role='tabpanel'><br><h3>Completed Records</h1><hr><div class='row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-2'>";
                        $ra1 = "select * from $dbname where status='5' order by name asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            $sdate=date("d.m.Y",$rab1["start_date"]);
                            $edate=date("d.m.Y",$rab1["end_date"]);
                            
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
                            
                            echo"<div class='col'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <div class='row g-0 sh-6'>
                                            <div class='col-auto'><img src='$clientimage' class='card-img rounded-xl sh-6 sw-6' alt='thumb' /></div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div><b><i class='fa fa-id-card'></i> ".$rab1["name"]."</b></div>
                                                        <div><i class='fa fa-user'></i> $clientname1 $clientname2</div>
                                                        <div class='text-small text-muted' style='width:100%'>From: $sdate, To: $edate</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <div class='btn-group'>
                                                            <a href='global-set.php?pstat=1&projectidsc=".$rab1["id"]."&url=".$_GET["url"]."&id=".$_GET["id"]."&pstat=1' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px'><i class='fa fa-eye'></i></a>
                                                            <a href='index.php?url=".$_GET["url"]."&pstat=1&pid=".$rab1["id"]."' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='_top' style='margin-top:0px'><i class='fa fa-edit'></i></a>
                                                            <a href='suspendrecord.php?suspendid2=".$rab1["id"]."&tbl=$dbname' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;color:red'><i class='fa fa-play'></i></a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        } }
                    echo"</div></div>
                
                </div>
            </div>
        </div>
    </div>"; 
