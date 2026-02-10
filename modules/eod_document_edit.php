<?php
    if($mtype=="ADMIN") {
        if(isset($_GET["editid"])){
            $rax = "select * from eod_document where id='".$_GET["editid"]."' and status='1' order by id desc limit 1";
            $rbx = $conn->query($rax);
            if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) {
                $eod_date=date("Y-m-d", $rabx["eod_date"]);
                // $incident_date=date("d-m-y", $rabx["incidentdate"]);
                echo"<form id='form' method='post' class='wizard-big' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='smsbd' value='$smsbd'><input type='hidden' name='url' value='eod_document_update'>
                    <input type='hidden' name='eodid' value='".$_GET["editid"]."'>
                    <h1>Edit EOD Id: ".$rabx["eod_date"]."".$_GET["editid"].".</h1>
                    <fieldset>
                        <div class='row'>
                            <div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Date *</label><input name='eod_date' type='date' value='$eod_date' class='form-control required'>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Employee Name *</label><select class='form-control m-b required' name='eod_employee_name' required>";
                                        $s7 = "select * from uerp_user where id='".$rabx["employeeid"]."' order by id asc limit 1";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                        if($mtype=="ADMIN"){
                                            echo"<option value=''>Select Employee</option>";
                                            $s7 = "select * from uerp_user where mtype='USER' and status='1' OR mtype='EMPLOYEE' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                            } }
                                        }
                                    echo"</select>
                                </div>
                            </div><div class='col-lg-4'>
                                <div class='form-group'>
                                    <label>Client Name * </label><select class='form-control m-b required' name='eod_client_name' required>";
                                        $s72 = "select * from uerp_user where id='".$rabx["clientid"]."' and status='1' order by id asc limit 1";
                                        $r72 = $conn->query($s72);
                                        if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                            echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                        } }
                                        if($rabx["employeeid"]!=0){
                                            echo"<option value=''>Select Client</option>";
                                            $s7 = "select * from project_team_allocation where employeeid='".$rabx["employeeid"]."' order by id asc";
                                            $r7 = $conn->query($s7);
                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                $s71 = "select * from project where id='".$rs7["projectid"]."' order by id asc limit 1";
                                                $r71 = $conn->query($s71);
                                                if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                                    $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                                    $r72 = $conn->query($s72);
                                                    if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                        echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                                    } }
                                                } }
                                            } }
                                        }
                                    echo"</select>
                                </div>
                            </div><div class='col-lg-12'><br>
                                <div class='form-group'>
                                    <label>What is your Feedback for Today?:</label>
                                    <textarea name='eod_summary' class='form-control required' style='min-height:260px; max-height:600px; overflow:auto; resize:none;' oninput=\"this.style.height = ''; this.style.height = Math.min(this.scrollHeight, 300) + 'px'\">".$rabx["eod_summary"]."</textarea>
                                </div>
                            </div><div class='col-lg-12'><br><br>
                                <div class='form-group'>
                                    <a href='#' onclick='history.back()'>Back to EOD Report</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' data-style='expand-right'>Update</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>";
            } }
        }
    }
?>