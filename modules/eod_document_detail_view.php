<?php
    
    include("../authenticator.php");
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasTopLabel'>End Of Day (EOD) Report: ID-".$_GET["postid"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>";
        
        $rax = "select * from eod_document where id='".$_GET["postid"]."' and status='1' order by id desc limit 1";
        $rbx = $conn->query($rax);
        if ($rbx->num_rows > 0) { while($rabx = $rbx->fetch_assoc()) {
    
            $eod_date=date("d-m-y H:m", $rabx["eod_date"]);
            
            $ra2 = "select * from uerp_user where id='".$rabx["clientid"]."' order by id desc limit 1";
            $rb2 = $conn->query($ra2);
            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                $clientname1= $rab2["username"];
                $clientname2= $rab2["username2"];
            } }
            
            $ra2 = "select * from uerp_user where id='".$rabx["employeeid"]."' order by id desc limit 1";
            $rb2 = $conn->query($ra2);
            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                $employeename1= $rab2["username"];
                $employeename2= $rab2["username2"];
                $employeephone= $rab2["phone"];
                $employeeemail= $rab2["email"];
            } }
            
            echo"<div style='padding:20px' id='printArea'>
                <div class='row'>
                    <div class='col-lg-6'>
                        <div class='form-group'><label>Date:</label>&nbsp;&nbsp;<b>$eod_date</b></div>
                        <div class='form-group'><label>Client Name:</label>&nbsp;&nbsp;<b>$clientname1 $clientname2</b></div>
                    </div>
                    <div class='col-lg-6'>
                        <div class='form-group'><label>Support Worker Name:</label>&nbsp;&nbsp;<b>$employeename1 $employeename2</b></div>
                        <div class='form-group'><label>Phone Number:</label>&nbsp;&nbsp;<b>$employeephone</b></div>
                        <div class='form-group'><label>Email Address:</label>&nbsp;&nbsp;<b>$employeeemail</b></div>
                    </div>
                    
                    <div class='col-lg-12'><hr>
                        <div class='form-group'><label>What is your Feedback for Today?:</label><br>".$rabx["eod_summary"]."</div>
                    </div>
                </div>
            </div>";
        } }
        
        echo"<center><button type='button' class='btn btn-primary' onclick=\"printDiv('printArea')\">Print Report</button><br><br><br><br><br><br></center>
    </div>";
?>
