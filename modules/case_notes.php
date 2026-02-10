<?php 
$sheba="eod";
$cid=7;
$title="Add New Client/Participant";
$utype="CASE";
$designation=6;

echo"<div class='row'>
    <div class='col-8 col-md-5' style='padding-bottom:10px'>
        
        <h1 class='mb-0 pb-0 display-4' id='title'>CASE Reporting</h1>
    
        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
            <ul class='breadcrumb pt-0'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
            echo"</ul>
        </nav>
    </div>
    <div class='col-4 col-md-7 d-flex align-items-start justify-content-end'>
    
        <a href='index.php?url=case-reports.php'>
        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
            <i data-acorn-icon='note'></i>&nbsp;&nbsp;<span>View Reports</span>
        </button></a>
    </div>                  
</div>    
<div class='data-table-rows slim' id='sample'>";
$sessionid = rand(1234567890,9876543210);
if($mtype!="CLIENT"){
    echo"<form id='form' method='post' name='incidentform' class='wizard-big' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
        <input type='hidden' name='url' value='case_notes.php'><input type='hidden' name='id' value='5203'>
    
        <fieldset>
            <div class='row' style='padding:20px'>
                <div class='col-lg-4'>
                    <div class='form-group' style='margin-bottom:25px'>
                        <label>Case Type *</label><select class='form-control m-b required' name='casetype' required>
                            <option value=''>Select Case Type</option>
                            <option value='Phone Call'>Phone Call</option>
                            <option value='Physical Interaction'>Physical Interaction</option>
                            <option value='Escalations'>Escalations</option>
                        </select>
                    </div>
                </div>
                
                <div class='col-6 col-lg-4'>
                    <div class='form-group' style='margin-bottom:25px'><label>Date From *</label><input name='date1' type='date' value='$current_date' class='form-control required'></div>
                </div>
                <div class='col-6 col-lg-4'>
                    <div class='form-group' style='margin-bottom:25px'><label>Date To *</label><input name='date2' type='date' value='$current_date' class='form-control required'></div>
                </div>
                <div class='col-lg-4'>
                    <div class='form-group' style='margin-bottom:25px'>
                        <label>Client Name *</label><select class='form-control m-b required' name='clientid' required>
                            <option value=''>Select Client Name</option>";
                            
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
                            
                        echo"</select>
                    </div>
                </div>
                <div class='col-lg-4'>";
                    echo"<div class='form-group' style='margin-bottom:25px'><label>Reporter Name *</label><select class='form-control m-b required' name='employeeid' required>
                        <option value='".$_COOKIE["userid"]."'>$username</option>";
                        $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                        $r7 = $conn->query($s7);
                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                        } }
                    echo"</select></div>
                </div>
                <div class='col-lg-4'>
                    <div class='form-group' style='margin-bottom:25px'><label>Multi Document Upload</label>
                        <input type='file' name='images[]' multiple class='form__field__img form-control'><input type='hidden' name='sessionid1' value='$sessionid'>
                    </div>
                </div>
                <div class='col-lg-12'>
                    <div class='form-group' style='margin-bottom:25px'><label>Detail Note *</label>
                        <textarea id='summernote' name='note' class='form-control'></textarea>
                    </div>
                </div>
                
                <div class='col-lg-12' style='text-align:right'><div class='form-group' style='margin-bottom:25px'>
                    <button class='ladda-button btn btn-primary' data-style='expand-right'>Submit</button>
                </div></div>
            </div>
        </fieldset>
        
    </form>";
}?>