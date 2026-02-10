<?php 
$sheba="budgetting";
$cid=7;
$title="Add New Budget Application";
$utype="BUDGETING";
$designation=6;

echo"<div class='row'>
    <div class='col-12 col-md-5' style='padding-bottom:10px'>
        
        <h1 class='mb-0 pb-0 display-4' id='title'>Budget Application & Allocation</h1>
    
        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
            <ul class='breadcrumb pt-0'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
            echo"</ul>
        </nav>
    </div>
    <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
    
        <a href='index.php?url=budget_reports.php'>
        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
            <i data-acorn-icon='note'></i>&nbsp;&nbsp;<span>View Budget Applications</span>
        </button></a>
    </div>                  
</div>    
<div class='data-table-rows slim' id='sample'>";
$sessionid = rand(1234567890,9876543210);
echo"<form id='form' method='post' name='incidentform' class='wizard-big' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
    <input type='hidden' name='url' value='budgeting.php'><input type='hidden' name='id' value='5203'>

    <fieldset>
        <div class='row' style='padding:20px'>
            <div class='col-lg-3'>
                <div class='form-group' style='margin-bottom:25px'>
                    <label>Budget Level *</label><select class='form-control m-b required' name='budgetlevel' required>
                        <option value=''>Select Priority Level</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                    </select>
                </div>
            </div>
            
            <div class='col-lg-3'>
                <div class='form-group' style='margin-bottom:25px'><label>Date From *</label><input name='date1' type='date' value='$current_date' class='form-control required'></div>
            </div>
            <div class='col-lg-3'>
                <div class='form-group' style='margin-bottom:25px'><label>Date To *</label><input name='date2' type='date' value='$current_date' class='form-control required'></div>
            </div>
            <div class='col-lg-3'>
                <div class='form-group' style='margin-bottom:25px'>
                    <label>Project Name *</label><select class='form-control m-b required' name='projectid' required>
                        <option value=''>Select Client Name</option>";
                        $s7 = "select * from project where status='1' order by id asc";
                        $r7 = $conn->query($s7);
                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["name"]."</option>"; } }
                    echo"</select>
                </div>
            </div>
            <div class='col-lg-4'>
                <div class='form-group' style='margin-bottom:25px'>
                    <label>Applicant Name *</label><select class='form-control m-b required' name='clientid' required>
                        <option value=''>Select Client Name</option>";
                        $s7 = "select * from uerp_user where mtype='CLIENT' and status='1' or mtype='USER' and status='1' order by id asc";
                        $r7 = $conn->query($s7);
                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]." (".$rs7["mtype"].")</option>";
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
                <div class='form-group' style='margin-bottom:25px'><label>Invoice Hardcopy Upload</label>
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
    
</form>"; ?>