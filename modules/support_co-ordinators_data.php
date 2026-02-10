<?php 

    include("../authenticator.php");

    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="CARD";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    if(isset($_GET["status"])) $status=$_GET["status"]; 
    else $status=1;
    
    echo"<div class='card-body' style='width:100%;padding:0px'><br><br>
        <div class='row' style='padding-left:5px;padding-right:5px'>";
            $ra1 = "select * from project_sc where status='$status' order by name asc";
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
                    
                    echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:3px;padding-top:4px'>
                        <div class='card mb-3'>
                            <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' name='loginForm$frmid'>";
                                if(strlen($rab1["image"]>=5)) echo"<img src='".$rab1["image"]."' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                else echo"<img src='img/no_image.png' class='card-img-top sh-30' style='height:170px' alt='".$rab1["name"]."' />";
                                echo"<input type='hidden' name='processor' value='edit_project_sc_image'><input type='hidden' name='id' value='".$rab1["id"]."'>
                                <input type='file' name='images1[]' multiple class='form__field__img form-control' onchange=\"this.form.submit(); shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" style='width:100px;margin-left:3px;margin-top:-36px'>
                            </form>
                            <div class='card-body mb-n5' style='padding:10px;min-height:400px'>
                                <div class='d-flex align-items-left flex-column mb-5' style='padding:0px'>
                                    <table width='100%'>
                                        <tr><td style='height:70px' valign='top'><h3 class='m-b-xs'>".$rab1["name"]."</h3></td></tr>
                                        <tr><td><span style='font-size:8pt'>NDIS # ".$rab1["ndis_no"]."</span></td></tr>
                                        <tr><td><span style='font-size:8pt'>From: $sdate, To: $edate</span></td></tr>
                                    </table>
                                    <hr>
                                    <span style='font-size:10pt;padding-bottom:10px'>Assigned Team</span>
                                    <table><tr>";
                                        $title="Support Workers Allocation For ".$rab1["name"].".";
                                        $tt=0;
                                        $ttt=0;
                                        
                                        $ra6 = "select * from project_sc_team_allocation where projectid='".$rab1["id"]."' order by id asc";
                                        $rb6 = $conn->query($ra6);
                                        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                                            $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                                            $rb7 = $conn->query($ra7);
                                            if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) { $tt=($tt+1); } }
                                        } }
                                        
                                        $ra66 = "select * from project_sc_team_allocation where projectid='".$rab1["id"]."' order by id asc limit 3";
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
                                            <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightLarge' aria-controls='offcanvasRightLarge' onmouseover=\"shiftdataV2('support_co-ordinators_team.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title&refurl=support_co-ordinators_data.php', 'offcanvasRightLarge')\" title='View All Support Workers'>$tt+</button>
                                        </td>
                                    </tr></table>
                                    <br><br>
                                    <div style='width:100%;text-align:center'>
                                        <table style='width:100%'><tr>
                                            <td valign=top align=center>
                                                <a href='global-set.php?pstat=1&projectidx=".$rab1["id"]."&url=support_co-ordinators.php&id=62&pstat=1' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' title='View SC Project Profile'><i class='fa-solid fa-eye'></i></a><br><span style='font-size:8pt'>View</span></td>
                                            <td valign=top align=center><a href='#' class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('support_co-ordinators_manager.php?pid=".$rab1["id"]."&sheba=$sheba&ctitle=$title&status=$status', 'offcanvasTop2')\" style='margin-top:0px;' title='Edit SC Project Data'><i class='fa-solid fa-edit'></i></a><br><span style='font-size:8pt'>Edit</span></td>
                                            <td valign=top align=center>";
                                                if($status==10) echo"<a href='suspendrecord.php?suspendid2=".$rab1["id"]."&tbl=project_sc' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Activate Project'><i class='fa-solid fa-unlock-alt'></i></a><br><span style='font-size:8pt'>Activate</span>";
                                                else echo"<a href='suspendrecord.php?suspendid=".$rab1["id"]."&tbl=project_sc' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px;margin-right:5px' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Suspend This Project'><i class='fa-solid fa-lock'></i></a><br><span style='font-size:8pt'>Suspend</span>";
                                            echo"</td>
                                            <td valign=top align=center><a href='suspendrecord.php?suspendid3=".$rab1["id"]."&tbl=project_sc' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\" title='Set SC Project status to Completed'><i class='fa-solid fa-close'></i></a><br><span style='font-size:8pt'>Close</span></td>
                                        </tr></table>
                                    </div>
                                </center></div>
                            </div>
                        </div>
                    </div>";
                } }
                
        echo"</div>
    </div>";
