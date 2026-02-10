<?php
    
    error_reporting(0);
    include("../authenticator.php");

    $sheba="eod";
    $cid=7;
    $title="Add New Client/Participant";
    $utype="CALLS";
    $designation=6;

    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='font/CS-Interface/style.css' />
    <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='css/vendor/select2.min.css' />
    <link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='css/vendor/plyr.css' />
    <link rel='stylesheet' href='css/styles.css' />
    <link rel='stylesheet' href='css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='js/base/loader.js'></script>";

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];

    echo"<div class='modal-dialog modal-xl modal-dialog-scrollable'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='scrollingModalBodyLabel'>Call Logs </h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div style='text-align:right;margin-right:10px;padding:10px'>
                <form method=get action='addrecord.php' target='dataprocessor'>
                    <input type=hidden name=logs value='CALL'><input type=hidden name=logid value='".$_GET["logid"]."'>
                    <input type=submit value='Add New Log' onblur=\"shiftdataV2('calls_data.php?lid=".$_GET["leadid"]."', 'scrollingModalBody')\" style='margin-top:0px' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm'>
                </form>
            </div>
            <div class='modal-body'>
            
                <table class='table stripe table-hover' style='width:100%;padding:10px'>
                    <thead><tr><th nowrap>Log ID</th><th nowrap>Date, Title & Description</th><th nowrap>Document</th><th nowrap>Status</th><th nowrap style='text-align:right'></th></tr></thead>
                    <tbody>";
                        $tts=0;
                        $ttt=0;
                        $ttx=0;
                        $tty=0;
                        $ra6 = "select * from project_team_allocation where projectid='".$_GET["pid"]."' order by id desc";
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
                                        <input type='hidden' name='processor' value='teamleadersetup1'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                        <select name='employeeid' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('calls_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
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
                                        <input type='hidden' name='processor' value='teamleadersetup3'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                        <select name='position' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('calls_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
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
                                        <input type='hidden' name='processor' value='teamleadersetup4'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                        <select name='status' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('calls_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                                            <option value='".$rab6["status"]."'>";
                                                if($rab6["status"]=="1") echo"Active"; else echo"Suspend";
                                            echo"</option>
                                            <option value='1'>Active</option><option value='0'>Suspend</option>
                                        </select>
                                    </form>
                                </td>
                                <td style='width:20px'><div class='btn-group' onmouseout=\"shiftdataV2('calls_data.php?cid=$cid&sheba=$sheba&utype=PROJECTS/LEADS', 'datatableX')\">
                                    <a href='deleterecords.php?sourceid=id&delid=".$rab6["id"]."&tbl=project_team_allocation' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('projects-team.php?pid=$pid&sheba=$sheba&ctitle=$title&status=$status', 'offcanvasRightLarge')\"class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm'>
                                        <i class='fa fa-trash''></i>
                                    </a>
                                </div></td>
                            </tr>";
                        } }
                    echo"</tbody>
                </table>
            </div>
        </div>
    </div>";
?>