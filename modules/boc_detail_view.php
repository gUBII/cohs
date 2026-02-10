<?php

    include("../authenticator.php");
    
    if($designation=="6"){
        $ra1 = "select * from boc where id='".$_GET["postid"]."' and status='1' order by id desc";
    }else{
        if($mtype=="ADMIN") $ra1 = "select * from boc where id='".$_GET["postid"]."' and status='1' order by id desc";
        else $ra1 = "select * from boc where id='".$_GET["postid"]."' and employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
    }
    $rb1 = $conn->query($ra1);
    if ($rb1->num_rows > 0) { while($rabx = $rb1->fetch_assoc()) {
        $boc_date=date("d-m-y H:m", $rabx["date"]);
            
        $clientname="";
        $ra2 = "select * from uerp_user where id='".$rabx["clientid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $clientname1= $rab2["username"];
            $clientname2= $rab2["username2"];
            $clientphone= $rab2["phone"];
            $clientemail= $rab2["email"];
        } }
        
        $ra2 = "select * from uerp_user where id='".$rabx["employeeid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $employeename1= $rab2["username"];
            $employeename2= $rab2["username2"];
            $employeephone= $rab2["phone"];
            $employeeemail= $rab2["email"];
        } }
        
        echo"<div class='offcanvas-header'>
            <h5 id='offcanvasTopLabel'>Behaviour of Concern (BoC) Report: ID-".$_GET["postid"]."</h5>
            <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
        </div>
        <div class='offcanvas-body'>
            <div style='padding:20px' id='printArea'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Date:</label>&nbsp;&nbsp;<b>$boc_date</b></div>
                    </div>
                    <div class='col-lg-6'>
                        <div class='form-group'><label>Client Name:</label>&nbsp;&nbsp;<b>$clientname1 $clientname2</b></div>
                        <div class='form-group'><label>Phone Number:</label>&nbsp;&nbsp;<b>$clientphone</b></div>
                        <div class='form-group'><label>Email Address:</label>&nbsp;&nbsp;<b>$clientemail</b></div>
                    </div>
                    <div class='col-lg-6'>
                        <div class='form-group'><label>Support Worker Name:</label>&nbsp;&nbsp;<b>$employeename1 $employeename2</b></div>
                        <div class='form-group'><label>Phone Number:</label>&nbsp;&nbsp;<b>$employeephone</b></div>
                        <div class='form-group'><label>Email Address:</label>&nbsp;&nbsp;<b>$employeeemail</b></div>
                    </div>
                    
                    <div class='col-lg-4'><hr>
                        <div class='form-group'><label><b>BoC TYPE:</b></label>&nbsp;&nbsp;".$rabx["typeid"]."</div>
                        <div class='form-group'><label><b>Other:</b></label>&nbsp;&nbsp;".$rabx["type_other"]."</div>
                    </div>
                    <div class='col-lg-4'><hr>
                        <div class='form-group'><label><b>BoC Frequency:</b></label>&nbsp;&nbsp;".$rabx["frequencyid"]."</div>
                        <div class='form-group'><label><b>Other:</b></label>&nbsp;&nbsp;".$rabx["frequency_other"]."</div>
                    </div>
                    <div class='col-lg-4'><hr>
                        <div class='form-group'><label><b>BoC Duration:</b></label>&nbsp;&nbsp;".$rabx["durationid"]."</div>
                        <div class='form-group'><label><b>Other:</b></label>&nbsp;&nbsp;".$rabx["duration_other"]."</div>
                    </div>
                    <div class='col-lg-12'><hr>
                        <div class='form-group'><label><b>Early Warning Signs</b></label>&nbsp;&nbsp;".$rabx["signs"]."</div>
                        <div class='form-group'><label><b>Sign Detail</b></label>&nbsp;&nbsp;".$rabx["signs_note"]."</div>
                    
                        <div class='form-group'><label><b>Participant's Activity Before BoC:</b></label>&nbsp;&nbsp;".$rabx["situation_note"]."</div>
                        <div class='form-group'><label><b>Description of Pre-BoC Situation:</b></label>&nbsp;&nbsp;".$rabx["situation_description"]."</div>
                        <div class='form-group'><label><b>Possible Reinforcements for BoC:</b></label>&nbsp;&nbsp;".$rabx["factor_note"]."</div>
                    
                        <div class='form-group'><label><b>Is the participant on their menstrual cycle?</b></label>&nbsp;&nbsp;".$rabx["information"]."</div> 
                        <div class='form-group'><label><b>Any Other Information:</b></label>&nbsp;&nbsp;".$rabx["information_note"]."</div>
                    </div>
                    
                </div>
            </div>
            <center>
                <button type='button' class='btn btn-primary' onclick=\"printDiv('printArea')\">Print Report</button><br><br><br><br><br><br>
            </center>
        </div>";
    } }
    
