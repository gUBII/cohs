<?php

    include("../authenticator.php");
    
    if($designation=="6"){
        $ra1 = "select * from incident where id='".$_GET["postid"]."' and status='1' order by id desc";
    }else{
        if($mtype=="ADMIN") $ra1 = "select * from incident where id='".$_GET["postid"]."' and status='1' order by id desc";
        else $ra1 = "select * from incident where id='".$_GET["postid"]."' and employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
    }
    $rb1 = $conn->query($ra1);
    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {

        // ,hourminute1,upload,sessionid

        $post_date=date("d-m-y H:m", $rab1["date"]);
        $incident_date=date("d-m-y", $rab1["incidentdate"]);
                
        
        $clientname="";
        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $clientname1= $rab2["username"];
            $clientname2= $rab2["username2"];
            $clientphone= $rab2["phone"];
            $clientemail= $rab2["email"];
        } }
        $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $employeename1= $rab2["username"];
            $employeename2= $rab2["username2"];
            $employeephone= $rab2["phone"];
            $employeeemail= $rab2["email"];
        } }
        
        echo"<div class='offcanvas-header'>
            <h5 id='offcanvasTopLabel'>Incident Report (IR): ID-".$_GET["postid"]."</h5>
            <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
        </div>
        <div class='offcanvas-body'>
            <div style='padding:20px' id='printArea'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='form-group'><label>Date:</label>&nbsp;&nbsp;<b>$incident_date ".$rab1["hourminute"]."</b><br><br></div>
                    </div>
                    <div class='col-lg-6'>
                        <div class='form-group'><label><b>Client Name:</b></label>&nbsp;&nbsp;$clientname1 $clientname2<br></div>
                        <div class='form-group'><label><b>Status of Invoiled Person: </b></label>&nbsp;&nbsp;".$rab1["involved"]."<br></div>
                        <div class='form-group'><label><b>Incident Location:</b></label>&nbsp;&nbsp;".$rab1["location"]."</div>
                        <br><br>
                    </div>
                    <div class='col-lg-6'>
                        <div class='form-group'><label><b>Support Worker Name:</b></label>&nbsp;&nbsp;$employeename1 $employeename2<br></div>
                        <div class='form-group'><label><b>Phone Number:</b></label>&nbsp;&nbsp;$employeephone<br></div>
                        <div class='form-group'><label><b>Email Address:</b></label>&nbsp;&nbsp;$employeeemail<br></div>
                        <br><br>
                    </div>
                    
                    <div class='col-lg-6'>
                        <div class='form-group'><label><b>Witness 1 detail:</b></label>&nbsp;&nbsp;<br>
                        <b>Name:</b> ".$rab1["witness1"].", <b>DOB:</b> ".$rab1["dob1"].", <b>Address:</b> ".$rab1["address1"].", <b>Phone:</b> ".$rab1["phone1"]."</div>
                    </div>
                    <div class='col-lg-6'><br><br>
                        <div class='form-group'><label><b>Witness 2 detail:</b></label>&nbsp;&nbsp;<br>
                        <b>Name:</b> ".$rab1["witness2"].", <b>DOB:</b> ".$rab1["dob2"].", <b>Address:</b> ".$rab1["address2"].", <b>Phone:</b> ".$rab1["phone2"]."</div>
                    </div>
                    <div class='col-lg-12'><br><br>
                        <div class='form-group'><label><b>What Happened?</b></label>&nbsp;&nbsp;".$rab1["what_happened"]."<br><br></div>
                        <div class='form-group'><label><b>Tasks performed at the time of the incident?</b></label><br>".$rab1["what_performed"]."<br><br></div>
                    </div>
                    
                    <div class='col-lg-12'>
                        <div class='form-group'><label><b>Nature of Incident/cause of injury:</b></label>&nbsp;&nbsp;".$rab1["injury"]."</div>
                        <div class='form-group'><label><b>Other (If Any):</b></label>&nbsp;&nbsp;".$rab1["other_injury"]."</div>
                    </div>
                    <div class='col-lg-6'><br><br>
                        <div class='form-group'><label><b>Area of Injury</b></label>&nbsp;&nbsp;".$rab1["area"]."</div> 
                        <div class='form-group'><label><b>Other (If Any)</b></label>&nbsp;&nbsp;".$rab1["other_area"]."</div>
                    </div>
                    
                    <div class='col-lg-6'><br><br>
                        <div class='form-group'><label><b>Treatment and Referral</b></label>&nbsp;&nbsp;".$rab1["treatment"]."</div> 
                        <div class='form-group'><label><b>Other (If Any)</b></label>&nbsp;&nbsp;".$rab1["treatment_other"]."</div>
                    </div>
                    
                    <div class='col-lg-6'><br><br>
                        <div class='form-group'><label><b>Referral Required:</b></label>&nbsp;&nbsp;".$rab1["referred"]."</div> ";
                        // <div class='form-group'><label><b>Referred to:</b></label>&nbsp;&nbsp;".$rab1["information_note"]."</div>
                    echo"</div>
                    <div class='col-lg-6'><br><br>
                        <div class='form-group'><label><b>First Aid Attendant:</b></label>&nbsp;&nbsp;".$rab1["firstaid"]."</div> 
                    </div>
                    
                    <div class='col-lg-12'><br><br>
                        <div class='form-group'><label><b>Uploaded Documents:</b></label>&nbsp;&nbsp;";
                            $t=0;
                            $ra3 = "select * from multi_image where uid='".$rab1["employeeid"]."' and postid='".$rab1["id"]."' and status='1' order by id desc";
                            $rb3 = $conn->query($ra3);
                            if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { 
                                $t=($t+1);
                                echo"<a href='".$rab3["location"]."' target='_blank'>$t</a>, ";
                            } }
                        echo"</div>
                    </div>
                    
                </div>
            </div>
            <center>
                <button type='button' class='btn btn-primary' onclick=\"printDiv('printArea')\">Print Report</button><br><br><br><br><br><br>
            </center>
        </div>";
    } }
    
