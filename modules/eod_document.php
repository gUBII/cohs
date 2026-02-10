<style>
    #hidden_div {
         display: none;
    }
    #hidden_div2 {
         display: none;
    }
</style>
<?php 
    $sheba="eod_document";
    $cid=7;
    $title="Add New Client/Participant";
    $utype="EOD";
    $designation=6;

    echo"<div class='row'>
        <div class='col-8 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>EOD Reporting</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-4 col-md-7 d-flex align-items-start justify-content-end'>
            <a href='index.php?url=eod_document.php' style='margin-right:10px'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Quick EOD</span></button></a>
            <a href='index.php?url=eod.php' style='margin-right:10px'><button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Detailed EOD</span></button></a>
            <a href='index.php?url=eod-document-reports.php' style='margin-right:10px'><button class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>View Reports</span></button></a>";
            if($mtype=="ADMIN"){
                if(isset($_COOKIE["projectidx"])){
                    echo"<a href='index.php?url=projects.php&pstat=1'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Project Profile</span></button></a>";
                }
            }
        echo"</div>                  
    </div>    
    <div>";
    if($mtype!="CLIENT"){

        echo"<section class='scroll-section' id='basic'>
            <h2 class='small-title'>New EOD Form</h2>";
            
            echo"<div>
                <form id='form' method='post' action='report_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='url' value='eod_document.php'><input type='hidden' name='id' value='5200'>
                    <div class='card-body'>
                        <div >
                            <div >
                                <h5 class='card-title'>Primary Informaton</h5>
                                <p class='card-text text-alternate mb-4'>Please fill the eod form with participant`s detail.</p>
                                <div class='row'>
                                    <div class='col-12 col-md-4' style='margin-bottom:25px'>
                                        <label class='mb-3 top-label'><input name='eod_date' type='date' value='$current_date' class='form-control required'><span>Date *</span></label>
                                    </div>
                                    <div class='col-12 col-md-4' style='margin-bottom:25px'>";
                                        
                                        if($mtype=="ADMIN"){
                                            echo"<label class='mb-3 top-label'>
                                                <select class='form-control m-b required' required name='eod_employee_name'>
                                                    <option value=''>Select Allocated Employee</option>";
                                                    $s7 = "select * from uerp_user where mtype='USER' and status='1' order by id asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                echo"</select>
                                                <span>Employee Name *</span>
                                            </label>";
                                        }else{
                                            echo"<label class='mb-3 top-label'>
                                                <select class='form-control m-b required' required name='eod_employee_name'>
                                                    <option value='".$_COOKIE["userid"]."'>$username</option>
                                                </select><span>Employee Name *</span>
                                            </label>";
                                        }
                                    echo"</div>
                                    <div class='col-12 col-md-4' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                        <select class='form-control m-b required' required name='eod_client_name'>
                                            <option value=''>Select Allocated Client</option>";
                                            $s7 = "select * from project_team_allocation where employeeid='$userid' order by id asc";
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
                                        <span>Client/Participant *</span></label>
                                    </div>
                                    <div class='col-12 col-md-12' style='margin-bottom:25px'>
                                        <label class='mb-3 top-label'>
                                            <textarea name='eod_summary' class='form-control required' style='min-height:60px; max-height:300px; overflow:auto; resize:none;' oninput=\"this.style.height = ''; this.style.height = Math.min(this.scrollHeight, 300) + 'px'\"></textarea>
                                            <span>What is your Feedback for Today? *</span>
                                        </label>
                                    </div>
                                    <div class='col-12' style='margin-bottom:25px'>
                                        <label class='mb-3 top-label'>
                                            <input type=submit name='Submit EOD' class='btn btn-primary'>
                                        </label>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </section>";
    }
    echo"</div>"; ?>
    
    
    <script>
        function myFunction() {
            var checkBox = document.getElementById("activity_checked");
            var text = document.getElementById("activity_others");
            if (checkBox.checked == true) text.style.display = "block";
            else text.style.display = "none";
        }
        
        function showDiv(divId, element) {
            document.getElementById(divId).style.display = element.value == 'YES' ? 'block' : 'none';
        }
        
        function showDiv2(divId, element) {
            document.getElementById(divId).style.display = element.value == 'YES' ? 'block' : 'none';
        }
        
    </script>
    
    