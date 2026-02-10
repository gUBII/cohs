<?php
    
    // error_reporting(0);

    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    if(isset($_GET["pid"])) $pid=$_GET["pid"];
    else $pid=0;
    if(isset($_GET["status"])) $status=$_GET["status"]; 
    else $status=1;
    if(isset($_GET["sheba"])) $sheba=$_GET["sheba"];
    else $sheba=0;
    if(isset($_GET["title"])) $title=$_GET["title"];
    else $title="Support Workers Allocation";
    
    if(isset($_GET["refurl"])) $refurl=$_GET["refurl"];
    
    
    include("../authenticator.php");

    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='../css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='../css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='../css/vendor/plyr.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='../js/base/loader.js'></script>";

    $cid=0;
    if(isset($_GET["pid"])) $pid=$_GET["pid"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div style='text-align:center;margin-right:10px;padding:10px'>
        <form method=get action='addrecord.php' target='dataprocessor'>
            <input type=hidden name=projectscid value='".$_GET["pid"]."'>
            <input type=submit value='Add New Support Worker' onblur=\"shiftdataV2('support_co-ordinators_team.php?pid=".$_GET["pid"]."&sheba=$sheba&ctitle=$title&status=$status', 'offcanvasRightLarge')\" style='margin-top:0px' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm'>
        </form>
    </div>
    <div class='offcanvas-body'>
        <table class='table stripe table-hover' style='width:100%;padding:10px'>
            <thead><tr><th nowrap>Support Workers</th><th nowrap>Allocated</th><th nowrap>Position</th><th nowrap>Status</th><th nowrap style='text-align:right'></th></tr></thead>
            <tbody>";
                $tts=0;
                $ttt=0;
                $ttx=0;
                $tty=0;
                $ra6 = "select * from project_sc_team_allocation where projectid='".$_GET["pid"]."' order by id desc";
                $rb6 = $conn->query($ra6);
                if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                    $employeename="";
                    $ra7 = "select * from uerp_user where id='".$rab6["employeeid"]."' order by id asc limit 1";
                    $rb7 = $conn->query($ra7);
                    if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                        $employeename="".$rab7["username"]." ".$rab7["username2"]."";
                    } }    
                    $tts=($tts+1);
                    $ttt=($ttt+1);
                    $ttx=($ttx+1);
                    $tty=($tty+1);
                    $allocateddate=date("d-m-Y", $rab6["date"]);
                    
                    echo"<tr class='gradeX'>
                        <td nowrap>
                            <form name='form_$tts' method='post' action='projectprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='teamleadersetup11'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                <select name='employeeid' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('$refurl?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                                    <option value='".$rab6["employeeid"]."'>$employeename</option>";
                                    $r6x = "select * from uerp_user where mtype='ADMIN' and status='1' order by username asc";
                                    $r6x = $conn->query($r6x);
                                    if ($r6x->num_rows > 0) { while($r6z = $r6x->fetch_assoc()) {
                                        echo"<option value='".$r6z["id"]."'>".$r6z["username"]." ".$r6z["username2"]."</option>";
                                    } }
                                    $r6x = "select * from uerp_user where mtype='USER' and status='1' or mtype='EMPLOYEE' and status='1' order by username asc";
                                    $r6x = $conn->query($r6x);
                                    if ($r6x->num_rows > 0) { while($r6z = $r6x->fetch_assoc()) {
                                        echo"<option value='".$r6z["id"]."'>".$r6z["username"]." ".$r6z["username2"]."</option>";
                                    } }
                                echo"</select>
                            </form>
                        </td>
                        <td nowrap>$allocateddate</td>
                        <td nowrap>
                            <form name='form_$ttx' method='post' action='projectprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='teamleadersetup33'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                <select name='position' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('$refurl?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                                    <option value='".$rab6["position"]."'>";
                                        // if($rab6["position"]=="1") echo"Support Worker";
                                        // else echo"Team Leader";
                                        echo"Support Worker";
                                    echo"</option>";
                                    // <option value='2'>Team Leader</option>
                                    echo"<option value='1'>Support Worker</option>
                                </select>
                            </form>
                        </td>
                        <td nowrap>
                            <form name='form_$tty' method='post' action='projectprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='teamleadersetup44'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                <select name='status' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('$refurl?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                                    <option value='".$rab6["status"]."'>";
                                        if($rab6["status"]=="1") echo"Active"; else echo"Suspend";
                                    echo"</option>
                                    <option value='1'>Active</option><option value='0'>Suspend</option>
                                </select>
                            </form>
                        </td>
                        <td style='width:20px'><div class='btn-group' onmouseout=\"shiftdataV2('$refurl?cid=$cid&sheba=$sheba&utype=PROJECTS/LEADS', 'datatableX')\">
                            <a href='deleterecords.php?sourceid=id&delid=".$rab6["id"]."&tbl=project_sc_team_allocation' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('support_co-ordinators_team.php?pid=$pid&sheba=$sheba&ctitle=$title&status=$status', 'offcanvasRightLarge')\"class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm'>
                                <i class='fa fa-trash''></i>
                            </a>
                        </div></td>
                    </tr>";
                } }
            echo"</tbody>
        </table>
    </div>";