<?php
    
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    $cid=$_GET["cid"];
    $sheba=$_GET["sheba"];
    
    error_reporting(0);

    include("../authenticator.php");

    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='../css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='../css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='../css/vendor/plyr.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='../js/base/loader.js'></script>";

    $cid=0;
    $pid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    if(isset($_GET["pid"])) $pid=$_GET["pid"];
    if(isset($_GET["status"])) $status=$_GET["status"];
    if(isset($_GET["status"])) $status=$_GET["status"];
    if(isset($_GET["utype"])) $utype=$_GET["utype"];
    if(isset($_GET["sheba"])) $sheba=$_GET["sheba"];
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>
        <form class='m-t' role='form' method='POST' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>";
            
            if(isset($_GET["pid"]) && $_GET["pid"]!=0){
                
                $ra1 = "select * from project_sc where id='$pid' order by id asc limit 1";
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                    $dob=date("Y-m-d", $_rab1["dob"]);
                    $start_date=date("Y-m-d", $_rab1["ndis_sd"]);
                    $end_date=date("Y-m-d", $_rab1["ndis_ed"]);
                    echo"<input type='hidden' name='processor' value='editproject_sc'><input type='hidden' name='id' value='".$rab1["id"]."'>
                    <div class='modal-body'>
                        <div class='row'>
                            <div class='col-md-3'><div class='form-group'><label>Participant Name *</label>
                                <input style='margin-bottom:10px' name='name' type='text' value='".$rab1["name"]."' class='form-control' required>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>NDIS Number</label>
                                <input style='margin-bottom:10px' name='ndis_no' type='text' value='".$rab1["ndis_no"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-2'><div class='form-group'><label>NDIS Plan Start Date</label>
                                <input style='margin-bottom:10px' name='ndis_sd' type='date' value='$start_date' class='form-control'>
                            </div></div>
                            <div class='col-md-2'><div class='form-group'><label>NDIS Plan End Date</label>
                                <input style='margin-bottom:10px' name='ndis_ed' type='date' value='$end_date' class='form-control'>
                            </div></div>
                            <div class='col-md-2'><div class='form-group'><label>Client Date of Birth</label>
                                <input style='margin-bottom:10px' name='dob' type='date' value='$dob' class='form-control'>
                            </div></div>
                            
                            <div class='col-md-3'><div class='form-group'><label>Plan Manager</label>
                                <input style='margin-bottom:10px' name='p_name' type='text' value='".$rab1["p_name"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Manager Address</label>
                                <input style='margin-bottom:10px' name='p_address' type='text' value='".$rab1["p_address"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Manager Phone</label>
                                <input style='margin-bottom:10px' name='p_phone' type='text' value='".$rab1["p_phone"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Manager Email</label>
                                <input style='margin-bottom:10px' name='p_email' type='text' value='".$rab1["p_email"]."' class='form-control'>
                            </div></div>
                            
                            <div class='col-md-3'><div class='form-group'><label>Nominee Name</label>
                                <input style='margin-bottom:10px' name='n_name' type='text' value='".$rab1["n_name"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Address</label>
                                <input style='margin-bottom:10px' name='n_address' type='text' value='".$rab1["n_address"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-2'><div class='form-group'><label>Phone</label>
                                <input style='margin-bottom:10px' name='n_number' type='text' value='".$rab1["n_number"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-2'><div class='form-group'><label>Email</label>
                                <input style='margin-bottom:10px' name='n_email' type='text' value='".$rab1["n_email"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-2'><div class='form-group'><label>Relation</label>
                                <input style='margin-bottom:10px' name='n_relation' type='text' value='".$rab1["n_relation"]."' class='form-control'>
                            </div></div>
                            
                            <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Plan Details</label><hr></div></div>
                            <div class='col-md-3'><div class='form-group'><label>Core Supports ($)</label>
                                <input style='margin-bottom:10px' name='core_supports' type='number' value='".$rab1["core_supports"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Capacity Building Supports ($)</label>
                                <input style='margin-bottom:10px' name='capacity_building_supports' type='number' value='".$rab1["capacity_building_supports"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Support Coordination Fund ($)</label>
                                <input style='margin-bottom:10px' name='support_coordination_fund' type='number' value='".$rab1["support_coordination_fund"]."' class='form-control'>
                            </div></div>
                            
                            <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Occupational Therapist</label><hr></div></div>
                            <div class='col-md-3'><div class='form-group'><label>Name</label>
                                <input style='margin-bottom:10px' name='occupational_name' type='text' value='".$rab1["occupational_name"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                                <input style='margin-bottom:10px' name='occupational_no' type='text' value='".$rab1["occupational_no"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Email</label>
                                <input style='margin-bottom:10px' name='occupational_email' type='text' value='".$rab1["occupational_email"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Organization</label>
                                <input style='margin-bottom:10px' name='occupational_org' type='text' value='".$rab1["occupational_org"]."' class='form-control'>
                            </div></div>
                            
                            <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Speech Therapist</label><hr></div></div>
                            <div class='col-md-3'><div class='form-group'><label>Name *</label>
                                <input style='margin-bottom:10px' name='speech_name' type='text' value='".$rab1["speech_name"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                                <input style='margin-bottom:10px' name='speech_no' type='text' value='".$rab1["speech_no"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Email</label>
                                <input style='margin-bottom:10px' name='speech_email' type='text' value='".$rab1["speech_email"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Organization</label>
                                <input style='margin-bottom:10px' name='speech_org' type='text' value='".$rab1["speech_org"]."' class='form-control'>
                            </div></div>
                            
                            <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Behavior Practitioner</label><hr></div></div>
                            <div class='col-md-3'><div class='form-group'><label>Name *</label>
                                <input style='margin-bottom:10px' name='behavior_name' type='text' value='".$rab1["behavior_name"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                                <input style='margin-bottom:10px' name='behavior_no' type='text' value='".$rab1["behavior_no"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Email</label>
                                <input style='margin-bottom:10px' name='behavior_email' type='text' value='".$rab1["behavior_email"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Organization</label>
                                <input style='margin-bottom:10px' name='behavior_org' type='text' value='".$rab1["behavior_org"]."' class='form-control'>
                            </div></div>
        
                            <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Provider</label><hr></div></div>
                            <div class='col-md-3'><div class='form-group'><label>Name</label>
                                <input style='margin-bottom:10px' name='provider_name' type='text' value='".$rab1["provider_name"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                                <input style='margin-bottom:10px' name='provider_no' type='text' value='".$rab1["provider_no"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Email</label>
                                <input style='margin-bottom:10px' name='provider_email' type='text' value='".$rab1["provider_email"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-3'><div class='form-group'><label>Organization</label>
                                <input style='margin-bottom:10px' name='provider_org' type='text' value='".$rab1["provider_org"]."' class='form-control'>
                            </div></div>
                            <div class='col-md-12'><br><br><div class='form-group'><label>Description/Note</label>
                                <textarea name='note' class='form-control'>".$rab1["note"]."</textarea>
                            </div></div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <input style='margin-bottom:10px' type='hidden' name='leaderid' value='$userid'>
                        <button type='button' class='btn btn-white' style='margin-bottom:10px' data-bs-dismiss='offcanvas' onclick=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=1', 'datatableX')\">Close</button>
                        <input type='submit' class='btn btn-primary' style='margin-bottom:10px' value='Update' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=1', 'datatableX')\">
                    </div>";
                } }
                
            }else{
                
			    echo"<input style='margin-bottom:10px' type='hidden' name='processor' value='createproject_sc'>
    			<div class='modal-body'>
                    <div class='row'>
                        <div class='col-md-3'><div class='form-group'><label>Participant Name *</label>
                            <input style='margin-bottom:10px' name='name' type='text' value='' class='form-control' required>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>NDIS Number</label>
                            <input style='margin-bottom:10px' name='ndis_no' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-2'><div class='form-group'><label>NDIS Plan Start Date</label>
                            <input style='margin-bottom:10px' name='ndis_sd' type='date' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-2'><div class='form-group'><label>NDIS Plan End Date</label>
                            <input style='margin-bottom:10px' name='ndis_ed' type='date' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-2'><div class='form-group'><label>Client Date of Birth</label>
                            <input style='margin-bottom:10px' name='dob' type='date' value='' class='form-control'>
                        </div></div>
                        
                        <div class='col-md-3'><div class='form-group'><label>Plan Manager</label>
                            <input style='margin-bottom:10px' name='p_name' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Manager Address</label>
                            <input style='margin-bottom:10px' name='p_address' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Manager Phone</label>
                            <input style='margin-bottom:10px' name='p_number' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Manager Email</label>
                            <input style='margin-bottom:10px' name='p_email' type='text' value='' class='form-control'>
                        </div></div>
                        
                        <div class='col-md-3'><div class='form-group'><label>Nominee Name</label>
                            <input style='margin-bottom:10px' name='n_name' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Address</label>
                            <input style='margin-bottom:10px' name='n_address' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-2'><div class='form-group'><label>Phone</label>
                            <input style='margin-bottom:10px' name='n_number' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-2'><div class='form-group'><label>Email</label>
                            <input style='margin-bottom:10px' name='n_email' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-2'><div class='form-group'><label>Relation</label>
                            <input style='margin-bottom:10px' name='n_relation' type='text' value='' class='form-control'>
                        </div></div>
                        
                        <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Plan Details</label><hr></div></div>
                        <div class='col-md-3'><div class='form-group'><label>Core Supports ($)</label>
                            <input style='margin-bottom:10px' name='core_supports' type='number' value='0' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Capacity Building Supports ($)</label>
                            <input style='margin-bottom:10px' name='capacity_building_supports' type='number' value='0' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Support Coordination Fund ($)</label>
                            <input style='margin-bottom:10px' name='support_coordination_fund' type='number' value='0' class='form-control'>
                        </div></div>
                        
                        <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Occupational Therapist</label><hr></div></div>
                        <div class='col-md-3'><div class='form-group'><label>Name</label>
                            <input style='margin-bottom:10px' name='occupational_name' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                            <input style='margin-bottom:10px' name='occupational_no' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Email</label>
                            <input style='margin-bottom:10px' name='occupational_email' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Organization</label>
                            <input style='margin-bottom:10px' name='occupational_org' type='text' value='' class='form-control'>
                        </div></div>
                        
                        <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Speech Therapist</label><hr></div></div>
                        <div class='col-md-3'><div class='form-group'><label>Name *</label>
                            <input style='margin-bottom:10px' name='speech_name' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                            <input style='margin-bottom:10px' name='speech_no' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Email</label>
                            <input style='margin-bottom:10px' name='speech_email' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Organization</label>
                            <input style='margin-bottom:10px' name='speech_org' type='text' value='' class='form-control'>
                        </div></div>
                        
                        <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Behavior Practitioner</label><hr></div></div>
                        <div class='col-md-3'><div class='form-group'><label>Name *</label>
                            <input style='margin-bottom:10px' name='behavior_name' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                            <input style='margin-bottom:10px' name='behavior_no' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Email</label>
                            <input style='margin-bottom:10px' name='behavior_email' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Organization</label>
                            <input style='margin-bottom:10px' name='behavior_org' type='text' value='' class='form-control'>
                        </div></div>
    
                        <div class='col-md-12'><br><br><div class='form-group' style='font-size:14pt'><label>Provider</label><hr></div></div>
                        <div class='col-md-3'><div class='form-group'><label>Name</label>
                            <input style='margin-bottom:10px' name='provider_name' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Contact No.</label>
                            <input style='margin-bottom:10px' name='provider_no' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Email</label>
                            <input style='margin-bottom:10px' name='provider_email' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-3'><div class='form-group'><label>Organization</label>
                            <input style='margin-bottom:10px' name='provider_org' type='text' value='' class='form-control'>
                        </div></div>
                        <div class='col-md-12'><br><br><div class='form-group'><label>Description/Note</label>
                            <textarea name='note' class='form-control'></textarea>
                        </div></div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <input style='margin-bottom:10px' type='hidden' name='leaderid' value='$userid'>
                    <button type='button' class='btn btn-white' style='margin-bottom:10px' data-bs-dismiss='offcanvas' onclick=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">Close</button>
                    <input type='submit' class='btn btn-primary' style='margin-bottom:10px' value='Save' onblur=\"shiftdataV2('support_co-ordinators_data.php?cid=$cid&sheba=$sheba&utype=$utype&status=$status', 'datatableX')\">
                </div>";
            }
        echo"</form>
    </div>";
?>