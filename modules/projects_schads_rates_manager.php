<?php
    
    // if(isset($_COOKIE["client_id"])){
        
        include '../authenticator.php';
        
        $clientid=0;
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
        } }
        
        if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
        else $sortset=10000000;

        $cid=0;
        if(isset($_GET["cid"])) $cid=$_GET["cid"];
        echo"<div><span style='font-size:8pt;'>Ref.: Social & Community Services Empoloyee (SCSE), Crisis Accomodation Employee (CAE), Family Day Care Employee (FDCE), Home Care Employee (HCE), </span></div>";
        echo"<div class='data-table-rows slim' id='sample'>";

            if(!isset($_GET["formid"])){
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <table class='table table-striped table-bordered table-hover dataTables-example' >
                        <thead><tr>
                            <th nowrap>Group</th>
                            <th nowrap>Level</th>
                            <th nowrap>Pay Point</th>
                            <th nowrap>Employment Type</th>
                            <th nowrap>Effective From</th>
                            <th nowrap>Status</th>
                        </tr></thead>
                        <tbody><tr class='gradeX'>
                            <td nowrap align=left>
                                <select name='level_group' class='form-control required' style='width:150px'>
                                    <option value='".$rab11["level_group"]."'>".$rab11["level_group"]."</option>
                                    <option value='SCSE'>SCSE</option>
                                    <option value='SCSE'>SCSE</option>
                                    <option value='CAE'>CAE</option>
                                    <option value='CAE'>CAE</option>
                                    <option value='FDCE'>FDCE</option>
                                    <option value='FDCE'>FDCE</option>
                                    <option value='HCE'>HCE</option>
                                    <option value='HCE'>HCE</option>
                                </select>
                            </td>
                            <td nowrap align=left><input name='level' type='text' value='".$rab11["level"]."' class='form-control required' style='width:150px'></td>
                            <td nowrap align=left><input name='pay_point' type='text' value='".$rab11["pay_point"]."' class='form-control required' style='width:150px'></td>
                            <td nowrap align=left>
                                <select name='employment_type' class='form-control required' style='width:150px'>
                                    <option value='".$rab11["employment_type"]."'>".$rab11["employment_type"]."</option>
                                    <option value='Full-time - Part-time'>Full-time - Part-time</option>
                                    <option value='Casual'>Casual</option>
                                </select>
                            </td>
                            <td nowrap align=left><input name='effective_from' type='text' value='".$rab11["effective_from"]."' class='form-control required'></td>
                            <td nowrap align=left><select name='status' class='form-control'><option value='".$rab11["status"]."'>".$rab11["status"]."</option><option value='1'>ON</option><option value='0'>OFF</option></select></td>
                        </tr></tbody>
                        <thead><tr>
                            <th nowrap>Weekday Rate</th>
                            <th nowrap>Saturday Rate</th>
                            <th nowrap>Sunday Rate</th>
                            <th nowrap>Public Holiday Rate</th>
                            <th nowrap>Afternoon Shift Rate</th>
                            <th nowrap>Night Shift Rate</th>
                        </tr></thead>
                        <tbody><tr class='gradeX'>
                            <td nowrap align=right><input name='weekday_rate' type='text' value='".$rab11["weekday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='saturday_rate' type='text' value='".$rab11["saturday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='sunday_rate' type='text' value='".$rab11["sunday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='public_holiday_rate' type='text' value='".$rab11["public_holiday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='afternoon_shift_rate' type='text' value='".$rab11["afternoon_shift_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='night_shift_rate' type='text' value='".$rab11["night_shift_rate"]."' class='form-control required'></td>
                            </tr>
                        </tbody>
                        <tbody><tr>
                            <th nowrap>Overtime First Block Rate</th>
                            <th nowrap>Overtime After Block Rate</th>
                            <th nowrap>Overtime Public Holiday Rate</th>
                            <th nowrap>Overtime Block Definition</th>
                            <th nowrap>Overnight Flat Rate</th>
                        </tr></thead>
                        <tbody><tr class='gradeX'>
                            <td nowrap align=right><input name='overtime_first_block_rate' type='text' value='".$rab11["overtime_first_block_rate"]."' class='form-control required'></td>
                            <td nowrap align=right><input name='overtime_after_block_rate' type='text' value='".$rab11["overtime_after_block_rate"]."' class='form-control required'></td>
                            <td nowrap align=right><input name='overtime_public_holiday_rate' type='text' value='".$rab11["overtime_public_holiday_rate"]."' class='form-control required'></td>
                            <td nowrap align=left><input name='overtime_block_definition' type='text' value='".$rab11["overtime_block_definition"]."' class='form-control required'></td>
                            <td nowrap align=left><input name='overnight_flat_rate' type='text' value='".$rab11["overnight_flat_rate"]."' class='form-control required'></td>
                        </tr></tbody>
                    </table>
                    <input type='hidden' name='processor' value='addschadsrate'>
                    <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Save' onclick=\"setTimeout(function(){ shiftdataV2('projects_schads_rates_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\">
                    
                    
                </form><Br><br>";
            }else{
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='processor' value='editschadsrate'>
                    <h1>EDIT - SCHADS Rate</h1>";
                    $ra11 = "select * from  award_rates where id='".$_GET["formid"]."' order by id asc limit 1";
                    $rb11 = $conn->query($ra11);
                    if ($rb11->num_rows > 0) { while($rab11 = $rb11->fetch_assoc()) {
                        echo"<input name='id' type='hidden' value='".$rab11["id"]."'>
                        <table class='table table-striped table-bordered table-hover dataTables-example' style='width:100%'>
                            <thead><tr>
                                <th nowrap>Group</th>
                                <th nowrap>Level</th>
                                <th nowrap>Pay Point</th>
                                <th nowrap>Employment Type</th>
                                <th nowrap>Effective From</th>
                                <th nowrap>status</th>
                            </thead>
                            <tbody><tr class='gradeX'>
                                <td nowrap align=left>
                                    <select name='level_group' class='form-control required' style='width:150px'>
                                        <option value='".$rab11["level_group"]."'>".$rab11["level_group"]."</option>
                                        <option value='SCSE'>SCSE</option>
                                        <option value='CAE'>CAE</option>
                                        <option value='FDCE'>FDCE</option>
                                        <option value='HCE'>HCE</option>
                                    </select>
                                </td>
                                <td nowrap align=left><input name='level' type='text' value='".$rab11["level"]."' class='form-control required' style='width:150px'></td>
                                <td nowrap align=left><input name='pay_point' type='text' value='".$rab11["pay_point"]."' class='form-control required' style='width:150px'></td>
                                <td nowrap align=left>
                                    <select name='employment_type' class='form-control required' style='width:150px'>
                                        <option value='".$rab11["employment_type"]."'>".$rab11["employment_type"]."</option>
                                        <option value='Full-time - Part-time'>Full-time - Part-time</option>
                                        <option value='Casual'>Casual</option>
                                    </select>
                                </td>
                                <td nowrap align=left><input name='effective_from' type='text' value='".$rab11["effective_from"]."' class='form-control required'></td>
                                <td nowrap align=left><select name='status' class='form-control'><option value='".$rab11["status"]."'>".$rab11["status"]."</option><option value='1'>ON</option><option value='0'>OFF</option></select></td>   
                            </tr></tbody>
                            <thead><tr>
                                <th nowrap>Weekday Rate</th>
                                <th nowrap>Saturday Rate</th>
                                <th nowrap>Sunday Rate</th>
                                <th nowrap>Public Holiday Rate</th>
                                <th nowrap>Afternoon Shift Rate</th>
                                <th nowrap>Night Shift Rate</th>
                            </tr></tbody>
                            <tbody><tr class='gradeX'>
                                <td nowrap align=right><input name='weekday_rate' type='text' value='".$rab11["weekday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='saturday_rate' type='text' value='".$rab11["saturday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='saturday_rate' type='text' value='".$rab11["sunday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='public_holiday_rate' type='text' value='".$rab11["public_holiday_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='afternoon_shift_rate' type='text' value='".$rab11["afternoon_shift_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='night_shift_rate' type='text' value='".$rab11["night_shift_rate"]."' class='form-control required'></td>
                            </tr></tbody>
                            <thead><tr>
                                <th nowrap>Overtime First Block Rate</th>
                                <th nowrap>Overtime After Block Rate</th>
                                <th nowrap>Overtime Public Holiday Rate</th>
                                <th nowrap>Overtime Block Definition</th>
                                <th nowrap>OverNight Flat Rate</th>
                            </thead>
                            <tbody><tr class='gradeX'>
                                <td nowrap align=right><input name='overtime_first_block_rate' type='text' value='".$rab11["overtime_first_block_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='overtime_after_block_rate' type='text' value='".$rab11["overtime_after_block_rate"]."' class='form-control required'></td>
                                <td nowrap align=right><input name='overtime_public_holiday_rate' type='text' value='".$rab11["overtime_public_holiday_rate"]."' class='form-control required'></td>
                                <td nowrap align=left><input name='overtime_block_definition' type='text' value='".$rab11["overtime_block_definition"]."' class='form-control required'></td>
                                <td nowrap align=left><input name='overnight_flat_rate' type='text' value='".$rab11["overnight_flat_rate"]."' class='form-control required'></td>
                            </tr></tbody>
                        </table>";
                    } }
                    
                    echo"<input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Update' onclick=\"setTimeout(function(){ shiftdataV2('projects_schads_rates_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\">
                    &nbsp;&nbsp;&nbsp;
                    <input type='button' class='btn btn-icon btn-icon-start btn-outline-secondary' data-style='expand-right' value='New'  onclick=\"setTimeout(function(){ shiftdataV2('projects_schads_rates_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 10);\">
                    <br><br>
                </form>";
            }
            
            echo"<div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover dataTables-example' >
                    <thead><tr>
                        <th nowrap>Group</th>
                        <th nowrap>Level</th>
                        <th nowrap>Pay Point</th>
                        <th nowrap>Employment Type</th>
                        <th nowrap>Effective From</th>
                        <th nowrap>Weekday Rate</th>
                        <th nowrap>Saturday Rate</th>
                        <th nowrap>Sunday Rate</th>
                        <th nowrap>Public Holiday Rate</th>
                        <th nowrap>Afternoon Shift Rate</th>
                        <th nowrap>Night Shift Rate</th>
                        <th nowrap>Overtime First Block Rate</th>
                        <th nowrap>Overtime After Block Rate</th>
                        <th nowrap>Overtime Public Holiday Rate</th>
                        <th nowrap>Overtime Block Definition</th>
                        <th nowrap>status</th>
                    </thead>
                    <tbody>";
                        
                        $ra1 = "select * from  award_rates order by level,pay_point asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            
                            $issue_date=date("d-m-y H:m", $rab1["issue_date"]);
                            $expire_date=date("d-m-y H:m", $rab1["expire_date"]);
                            echo"<tr class='gradeX'>
                                <td nowrap align=left>&nbsp;".$rab1["level_group"]."</td>
                                <td nowrap align=left>".$rab1["level"]."</td>
                                <td nowrap align=left>".$rab1["pay_point"]."</td>
                                <td nowrap align=left>".$rab1["employment_type"]."</td>
                                <td nowrap align=left>".$rab1["effective_from"]."</td>
                                <td nowrap align=right>".$rab1["weekday_rate"]."</td>
                                <td nowrap align=right>".$rab1["saturday_rate"]."</td>
                                <td nowrap align=right>".$rab1["sunday_rate"]."</td>
                                <td nowrap align=right>".$rab1["public_holiday_rate"]."</td>
                                <td nowrap align=right>".$rab1["afternoon_shift_rate"]."</td>
                                <td nowrap align=right>".$rab1["night_shift_rate"]."</td>
                                <td nowrap align=right>".$rab1["overtime_first_block_rate"]."</td>
                                <td nowrap align=right>".$rab1["overtime_after_block_rate"]."</td>
                                <td nowrap align=right>".$rab1["overtime_public_holiday_rate"]."</td>
                                <td nowrap align=left>".$rab1["overtime_block_definition"]."</td>
                                <td>"; 
                                    if($rab1["status"]==1) echo"NO";
                                    else echo"OFF";
                                echo"</td>
                                <td align=center><a href='#' onclick=\"shiftdataV2('projects_schads_rates_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&formid=".$rab1["id"]."', 'datatableX')\" style='color:lightgreen'><i class='fa fa-edit'></i></a></td>
                                <td align=center><a href='deleterecords.php?tbl=award_rates&delid=".$rab1["id"]."&sourceid=id' onclick=\"setTimeout(function(){ shiftdataV2('projects_schads_rates_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\" style='color:lightred' target='dataprocessor'><i class='fa fa-trash'></i></a></td>
                            </tr>";
                            
                        } }    
                    echo"</tbody>
                </table>
                <div style='height:100px'>&nbsp;</div>
            </div>";
    
    // }
?>