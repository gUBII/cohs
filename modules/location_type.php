<?php
    
    error_reporting(0);

    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    if(isset($_GET["pid"])) $pid=$_GET["pid"];
    else $pid=0;
    if(isset($_GET["status"])) $status=$_GET["status"]; 
    else $status=1;
    if(isset($_GET["sheba"])) $sheba=$_GET["sheba"];
    else $sheba=0;
    if(isset($_GET["title"])) $title=$_GET["title"];
    else $title="Add Store Location/Warehouse Type";
    
    include("../authenticator.php");

    $cid=0;
    if(isset($_GET["pid"])) $pid=$_GET["pid"];

    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div style='text-align:right;margin-right:10px;padding:10px'>
        <form method=get action='addrecord.php' target='dataprocessor'>
            <input type=hidden name=locationid value='1'>
            <input type=submit value='Add New Location' onblur=\"shiftdataV2('location_type.php?cid=$cid&sheba=warehouse_type&ctitle=Add Store Location/Warehouse Type', 'offcanvasRightLarge')\" style='margin-top:0px' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm'>
        </form>
    </div>
    <div class='offcanvas-body'>
        <table class='table stripe table-hover' style='width:100%;padding:10px'>
            <thead><tr><th nowrap>ID</th><th nowrap>Location Type</th><th nowrap>Status</th></tr></thead>
            <tbody>";
                $tts=0;
                $ttt=0;
                $ttx=0;
                $tty=0;
                $ra6 = "select * from warehouse_type order by wtype_name asc";
                $rb6 = $conn->query($ra6);
                if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                    $tts=($tts+1);
                    $ttt=($ttt+10);
                    $ttx=($ttx+100);
                    $tty=($tty+1000);
                    $ttz=($ttz+10000);
                    
                    echo"<tr class='gradeX'>
                        <td nowrap>".$rab6["id"]."</td>
                        <td nowrap>
                            <form name='form_$tts' method='post' action='addrecord.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='warehouseid' value='".$rab6["id"]."'><input type='hidden' name='pointer' value='1'>
                                <input type='text' name='wtype_name' value='".$rab6["wtype_name"]."' class='form-control' style='width:100%' onchange='this.form.submit()'>
                            </form>
                        </td>
                        
                        <td nowrap>
                            <form name='form_$ttzz' method='post' action='addrecord.php' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='warehouseid' value='".$rab6["id"]."'><input type='hidden' name='pointer' value='6'>
                                <select name='status' class='form-control' onchange='this.form.submit()' style='width:70px'>
                                    <option value='".$rab6["status"]."'>".$rab6["status"]."</option>
                                    <option value='ON'>ON</option><option value='OFF'>OFF</option>
                                </select>
                            </form>
                        </td>
                    </tr>";
                } }
            echo"</tbody>
        </table>
    </div>";