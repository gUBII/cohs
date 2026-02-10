<?php
    $pstatus=0;
    $project_signed=0;
    $a0 = "select * from project where status='15' and clientid='".$_COOKIE["ws_cid"]."' order by id desc limit 1";
    $b0 = $conn->query($a0);
    if ($b0->num_rows > 0) { while($c0 = $b0->fetch_assoc()) {
        $pstatus=1;
        $pid=$c0["id"];
        $projectidz=$c0["id"];
        $projectname=$c0["name"];
        $leaderid=$c0["leaderid"];
        $clientid=$c0["clientid"];
        
        $start_date=date("Y-m-d",$c0["start_date"]);
        $end_date=date("Y-m-d",$c0["end_date"]);
        
        if($c0["project_signed"]<=1000) $project_signed=date("Y-m-d", time());
        else $project_signed=date("Y-m-d",$c0["project_signed"]);
        
        $transport_cost=$c0["transport_cost"];
        $image1=$c0["image1"];
        $image2=$c0["image2"];
        $image3=$c0["image3"];
        $signature1=$c0["signature1"];
        $signature11=strlen($signature1);
        $signature2=$c0["signature2"];
        $signature22=strlen($signature2);
        $signature3=$c0["signature3"];
        $signature33=strlen($signature3);
    } }
    
    if($pstatus!=0){
        echo"<div>";
            $a1 = "select * from uerp_user where id='$clientid' order by id asc limit 1";
            $b1 = $conn->query($a1);
            if ($b1->num_rows > 0) { while($c1 = $b1->fetch_assoc()) {
                $cid=$c1["id"];
                $cstatus=$c1["status"];
                $cuid=$c1["unbox"];
                $cgender=$c1["gender"]; 
                $cname2=$c1["username"];
                $cname="".$c1["username"]." ".$c1["username2"]."";
                $cphone=$c1["phone"];
                $cphone2=$c1["phone2"];
                $cmobile=$c1["mobile"];
                $cemail=$c1["email"];
                $caddress=$c1["address"];
                $ccity=$c1["city"];
                $cstate=$c1["area"];
                $czip=$c1["zip"];
                $ccountry=$c1["country"];
                
                if($c1["dob"]<=1000) $cdob==date("Y-m-d", time());
                else $cdob=date("Y-m-d",$c1["dob"]);
                
                $cnote=$c1["note"];
                $clatitudex=$c1["latitude"];
                $clongitudex=$c1["longitude"];
                $aboutclient=$c1["aboutme"];
                $mtype=$c1["mtype"];
                $nomineename=$c1["nominee_name"];
                $cndis=$c1["ndis"];
                $representative_name=$c1["representative_name"];
                
                $cpname=$c1["cp_name"];
                $cpphone1=$c1["cp_phone1"];
                $cpphone2=$c1["cp_phone2"];
                $cpmobile=$c1["cp_mobile"];
                $cpemail=$c1["cp_email"];
                $cpaddress=$c1["cp_address"];
                
                if($c1["images"]!=0) $cimage=$c1["images"];
                else $cimage="img/noimage.jpg";
                
                $cemergency_contact_1=$c1["emergency_contact_1"];
                $cemergency_relation_1=$c1["emergency_relation_1"];
                $cemergency_phone_1=$c1["emergency_phone_1"];
                $cemergency_email_1=$c1["emergency_email_1"];
                $cemergency_contact_2=$c1["emergency_contact_2"];
                $cemergency_relation_2=$c1["emergency_relation_2"];
                $cemergency_phone_2=$c1["emergency_phone_2"];
                $cemergency_email_2=$c1["emergency_email_2"];
            } }
            
            $currenttime=time();
            $currentdate=date("Y-m-d",$currenttime);
            
            echo"<form method='post' name='stage3' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                <input type='hidden' name='processor' value='new_workspace_PROJECT_agreement'>
                <input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                <div class='row'>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>NDIS Number</span>
                        <input type='text' class=form-control name='client_ndis' value='$cndis' required onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Date of Birth</span>
                        <input type='date' class=form-control name='client_dob' value='$cdob' required onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Participant / Representative</span>
                        <input type='text' class=form-control name='representative_name' value='$representative_name' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Agreement Signed Date</span>
                        <input type='date' class=form-control name='project_signed' value='$project_signed' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Period From</span>
                        <input type='date' class=form-control name='project_start' value='$start_date' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Period To</span>
                        <input type='date' class=form-control name='project_end' value='$end_date' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Nominee Name</span>
                        <input type='text' class=form-control name='nominee_name' value='$nomineename' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Participant Name</span>
                        <input type='text' class=form-control name='participant_name' value='$cname' readonly>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Phone # Day Time</span>
                        <input type='text' class=form-control name='phone_day' value='$cphone' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Phone # Night Time</span>
                        <input type='text' class=form-control name='phone_night' value='$cphone2' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Mobile #</span>
                        <input type='text' class=form-control name='mobile' value='$cmobile' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Email Address</span>
                        <input type='text' class=form-control name='email' value='$cemail' readonly onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Present Address</span>
                        <input type='text' class=form-control name='address' value='$caddress' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Present City</span>
                        <input type='text' class=form-control name='city' value='$ccity' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Present State</span>
                        <input type='text' class=form-control name='state' value='$cstate' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Present Post Code</span>
                        <input type='text' class=form-control name='zip' value='$czip' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Present Country</span>
                        <input type='text' class=form-control name='country' value='$ccountry' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Contact Name</span>
                        <input type='text' class=form-control name='cpname' value='$cpname' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Contact Day Phone</span>
                        <input type='text' class=form-control name='cpphone1' value='$cpphone1' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Contact Night Phone</span>
                        <input type='text' class=form-control name='cpphone2' value='$cpphone2' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Contact Mobile</span>
                        <input type='text' class=form-control name='cpmobile' value='$cpmobile' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Contact Email</span>
                        <input type='text' class=form-control name='cpemail' value='$cpemail' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>Contact Address</span>
                        <input type='text' class=form-control name='cpaddress' value='$cpaddress' onchange='this.form.submit()'>
                    </label></div>
                    <div class='col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                        <span>I Agree to travel costs claimed</span>
                        <select name='transport_cost' class='form-control' required onchange='this.form.submit()'>";
                            if(strlen($transport_cost)>=2) echo"<option value='$transport_cost'>$transport_cost</option>";
                            else echo"<option value=''>Select Option</option>";
                            echo"<option value='YES'>YES</option><option value='NO'>NO</option>
                        </select>
                    </label></div>
                </div>
            </form><hr>
            <div class='row'>
                <div class='col-md-4' style='margin-bottom:25px'>
                    <form method='post' name='stage3x2' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                        <input type='hidden' name='processor' value='new_workspace_PROJECT_signature1'>
                        <input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                        <div class='form-group'>
                            <label>Participant`s e-Signature:</label><br>
                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop1'>Add Digital Signature</button>
                            <div class='modal fade' id='staticBackdrop1' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-xl'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='staticBackdropLabel'>Participant's Digital Signature</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <iframe src='signatureimage.php?pid=$pid&signatureimage=1' name='esignature1' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='440'>BROWSER NOT SUPPORTED</iframe>
                                        </div>
                                        <div class='modal-footer'>
                                            <a href='esignature.php?pid=$pid&clientid=".$_COOKIE["ws_cid"]."&signature=1' target='esignature1'><button type='button' class='btn btn-primary'>Load Signature Pad</button></a>
                                            <a href='signatureimage.php?pid=$pid&signatureimage=1' target='esignature1'><button type='button' class='btn btn-success'>View Signature</button></a>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            
                            // echo"<input type='file' name='images1[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg, .pdf' onchange='this.form.submit()'>";
                            
                        echo"</div>
                    </form>
                </div>
                <div class='col-md-4' style='margin-bottom:25px'>
                    <form method='post' name='stage3x3' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                        <input type='hidden' name='processor' value='new_workspace_PROJECT_signature2'>
                        <input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                        <div class='form-group'>
                            <label>Nominee's e-Signature:</label><br>
                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop2'>Add Digital Signature</button>
                            <div class='modal fade' id='staticBackdrop2' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-xl'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='staticBackdropLabel'>Nominee's Digital Signature</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <iframe src='signatureimage.php?pid=$pid&signatureimage=2' name='esignature2' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='440'>BROWSER NOT SUPPORTED</iframe>
                                        </div>
                                        <div class='modal-footer'>
                                            <a href='esignature.php?pid=$pid&clientid=".$_COOKIE["ws_cid"]."&signature=2' target='esignature2'><button type='button' class='btn btn-primary'>Load Signature Pad</button></a>
                                            <a href='signatureimage.php?pid=$pid&signatureimage=2' target='esignature2'><button type='button' class='btn btn-success'>View Signature</button></a>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            
                            // echo"<input type='file' name='images2[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg, .pdf' onchange='this.form.submit()'>";
                            
                        echo"</div>
                    </form>
                </div>
                <div class='col-md-4' style='margin-bottom:25px'>
                    <form method='post' name='stage3x3' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                        <input type='hidden' name='processor' value='new_workspace_PROJECT_signature3'>
                        <input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
                        <div class='form-group'>
                            <label>Provider's e-Signature :</label><br>
                            <button type='button' class='btn btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop3'>Add Digital Signature</button>
                            <div class='modal fade' id='staticBackdrop3' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                                <div class='modal-dialog modal-xl'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <h5 class='modal-title' id='staticBackdropLabel'>Provider's Digital Signature</h5>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <iframe src='signatureimage.php?pid=$pid&signatureimage=2' name='esignature3' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='440'>BROWSER NOT SUPPORTED</iframe>
                                        </div>
                                        <div class='modal-footer'>
                                            <a href='esignature.php?pid=$pid&clientid=".$_COOKIE["ws_cid"]."&signature=3' target='esignature3'><button type='button' class='btn btn-primary'>Load Signature Pad</button></a>
                                            <a href='signatureimage.php?pid=$pid&signatureimage=3' target='esignature3'><button type='button' class='btn btn-success'>View Signature</button></a>
                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            
                            // echo"<input type='file' name='images3[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg, .pdf' onchange='this.form.submit()'>";
                            
                        echo"</div>
                    </form>
                </div>
            </div>
        </div>";
    }