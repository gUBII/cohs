<?php
        $sheba="eod";
        $cid=7;
        $title="Add New Client/Participant";
        $utype="BOD";
    
        echo"<div class='row'>
            <div class='col-8 col-md-5' style='padding-bottom:10px'>
                
                <h1 class='mb-0 pb-0 display-4' id='title'>BOC Reporting</h1>
            
                <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                    <ul class='breadcrumb pt-0'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                        if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                        if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                    echo"</ul>
                </nav>
            </div>
            <div class='col-4 col-md-7 d-flex align-items-start justify-content-end'>
                <a href='index.php?url=boc-reports.php' style='margin-right:10px'><button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>View Reports</span></button></a>";
                if($mtype=="ADMIN"){
                    if(isset($_COOKIE["projectidx"])){
                        echo"<a href='index.php?url=projects.php&pstat=1'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Project Profile</span></button></a>";
                    }
                }
            echo"</div>                  
        </div>    
        <div>";
        if($mtype!="CLIENT"){
            echo"<form id='form' method='post' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                <input type='hidden' name='url' value='boc.php'><input type='hidden' name='id' value='5201'>
                <fieldset>
                    <h2>Generate Behavour of Concern (BoC)</h2>
                    <div class='row'>
                        <div class='col-lg-3'>
                            <div class='form-group' style='margin-bottom:25px'>
                                <label>Date *</label><input name='eod_date' type='date' value='$current_date' class='form-control'>
                            </div>
                        </div><div class='col-lg-3'>
                            <div class='form-group' style='margin-bottom:25px'>
                                <label>Email Address *</label><input name='eod_employee_email' type='text' value='$email' class='form-control ' readonly>
                            </div>
                        </div>
                        <div class='col-lg-3'>";
                            if($mtype=="ADMIN"){
                                echo"<div class='form-group' style='margin-bottom:25px'>
                                    <label>Employee Name *</label><select class='form-control m-b ' name='eod_employee_name'>
                                        <option value=''>Select Allocated Employee</option>";
                                        $s7 = "select * from uerp_user where mtype='USER' order by id asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                        } }
                                    echo"</select>
                                </div>";
                            }else{
                                echo"<div class='form-group' style='margin-bottom:25px'>
                                    <label>Employee Name *</label><select class='form-control m-b ' name='eod_employee_name'>
                                    <option value='".$_COOKIE["userid"]."'>$username</option></select>
                                </div>";
                            }
                        echo"</div><div class='col-lg-3'>";
                            echo"<div class='form-group' style='margin-bottom:25px'>
                                <label>Phone # *</label><input name='eod_employee_phone' type='text' value='$phonex' class='form-control ' readonly>
                            </div>
                        </div>
                        <div class='col-lg-12'>
                            <div class='form-group' style='margin-bottom:25px'>
                                <label>Client Name *</label><select class='form-control m-b ' name='clientid'>
                                    <option value=''>Select Allocated Client/Perticipant </option>";
                                    
                                    if($designationy==13) $s7 = "select * from project_team_allocation order by id asc";
                                    else $s7 = "select * from project_team_allocation where employeeid='$userid' order by id asc";
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
                                                
                                    
                                    /*
                                    $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                    } }
                                    */
                                echo"</select>
                            </div>
                        </div>
                    </div>
                
                    <div class='row'>
                        <div class='col-lg-4'>
                            <h2>BoC Type</h2>
                            <div class='form-group' style='margin-bottom:25px'><label>Tick TYPE that applies:</label>";
                            $s7 = "select * from boc_conditions where note='Type' order by id asc limit 1000";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<div class='i-checks'><label> <input type='checkbox' name='typeid[]' value='".$rs7["name"]."' style='' > <i></i>&nbsp;&nbsp;&nbsp;".$rs7["name"]."</label></div>";
                                } }
                                echo"<div style='height:18px'></div>If Other, Please Specify:<br><input name='type_other' type='text' value='' class='form-control'>
                            </div>
                        </div>
                        <div class='col-lg-4'>
                            <h2>BoC Frequency</h2>
                            <div class='form-group' style='margin-bottom:25px'><label>Select FREQUENCY:</label>";
                            $s7 = "select * from boc_conditions where note='Frequency' order by id asc limit 1000";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<div><label><table><tr><td> 
                                        <input type='radio' value='".$rs7["name"]."' id='optionsRadios2' name='frequency[]' ></td><td>&nbsp;&nbsp;".$rs7["name"]."</td>
                                    </tr></table></label></div>";
                                } }
                                echo"<div style='height:58px'></div>If Other, Please Specify:<br><input name='frequency_other' type='text' value='' class='form-control'>
                            </div>
                        </div>
                        <div class='col-lg-4'>
                            <h2>BoC Duration</h2>
                            <div class='form-group' style='margin-bottom:25px'><label>Select DURATION:</label>";
                            $s7 = "select * from boc_conditions where note='Duration' order by id asc limit 1000";
                                $r7 = $conn->query($s7);
                                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                    echo"<div><label><table><tr><td> 
                                        <input type='radio' value='".$rs7["name"]."' id='optionsRadios2' name='duration[]' ></td><td>&nbsp;&nbsp;".$rs7["name"]."</td>
                                    </tr></table></label></div>";
                                } }
                                echo"If Other, Please Specify:<br><input name='duration_other' type='text' value='' class='form-control'>
                            </div>
                        </div>
                        <div class='col-lg-12'><h2>Early Warning Signs</h2></div>
                        <div class='col-lg-3'>
                            <div class='form-group' style='margin-bottom:25px'><label>Did you see any early warining signs?</label>
                                <select class='form-control m-b ' name='signs'>
                                    <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-lg-9'>
                            <div class='form-group' style='margin-bottom:25px'>
                                <label>Please leave blank if the answer is NO, if YES, please explain the early warning signs</label>
                                <textarea name='signs_note' class='form-control'></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-lg-12'><h2>Pre-BoC Situation</h2></div>
                        <div class='col-lg-6'>
                            <div class='form-group' style='margin-bottom:25px'><label>Participant's Activity Before BoC:</label>
                                <textarea name='situation_note' class='form-control' ></textarea>
                            </div>
                        </div>
                        <div class='col-lg-6'>
                            <div class='form-group' style='margin-bottom:25px'><label>Description of Pre-BoC Situation:</label>
                                <textarea name='situation_description' class='form-control' ></textarea>
                            </div>
                        </div>
                        <div class='col-lg-12'><h2>Reinforcement Factors</h2>
                        <div class='col-lg-12'>
                            <div class='form-group' style='margin-bottom:25px'><label>Possible Reinforcements for BoC:</label>
                                <textarea name='factor_note' class='form-control' ></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='col-lg-12'><h2>Additional Information</h2></div>
                        <div class='col-lg-3'>
                            <div class='form-group' style='margin-bottom:25px'><label>Is the participant on their menstrual cycle?</label>
                                <select class='form-control m-b ' name='information'>
                                    <option value=''>Select Option</option><option value='YES'>YES</option><option value='NO'>NO</option>
                                </select>
                            </div>
                        </div>
                        <div class='col-lg-5'>
                            <div class='form-group' style='margin-bottom:25px'><label>Any Other Information:</label>
                                <textarea name='information_note' class='form-control'></textarea>
                            </div>
                        </div>
                        <div class='col-lg-4'>
                            <div class='form-group' style='margin-bottom:25px'><label>Suggestions for improvement:</label>
                                <textarea name='suggest' class='form-control'></textarea>
                            </div>
                        </div>
                        <div class='col-lg-12' style='text-align:center'><br>
                            <input type='submit' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' value='Submit'>
                        </div>
                    </div>
                </fieldset>
                
            </form>";
        }
        echo"</div>";
    ?>