<?php

    include("../authenticator.php");
    
    if(isset($_GET["status"])) $leadstatus=$_GET["status"];
    else $leadstatus=1;
                
    if(isset($_GET["stage"])) $leadstage=$_GET["stage"];
    else $leadstage=1;
    
    if($leadstage==1) $leadstagex="Referral Stage";
    if($leadstage==2) $leadstagex="Assesment Stage";
    if($leadstage==3) $leadstagex="Approval Stage";
    if($leadstage==4) $leadstagex="Signed Agreement Stage";
                
    if($leadstatus==1) $leadstatusx="Active Leads";
    if($leadstatus==2) $leadstatusx="Completed/Closed Leads";
    if($leadstatus==0) $leadstatusx="Suspended Leads";
    
    echo"<div class='row'>
    
        <div class='col-12 col-md-4' style='text-align:left;padding-left:0px'>
        
            <form method='post' name='leadsrc' action='logs_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                <div class='mb-1 btn-group'>
                    <input type=hidden name='processor' value='leadmanager'>
                    <input type='text' name='leadsearch' class='form-control btn-sm' onchange='this.form.submit()' placeholder='Search by Lead/Client Name, Phone, Email....'>
                    <button class='btn btn-outline-primary btn-sm' type='button'
                        onclick=\"this.form.submit(); setTimeout(function() { shiftdataV2('lead_data.php?stage=$leadstage&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX'); }, 2000)\" 
                        style='height:35px;padding:5px'><i class='fa fa-search'></i>
                    </button>
                </div>
            </form>
            
        </div>
        
        <div class='col-12 col-md-8' style='text-align:right;padding-right:0px'>";
        
            // if($_GET["url"]=="all_in_one_pack.php"){ 
                
                if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                    echo"<div class='mb-1 btn-group'>
                    
                        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter' aria-controls='offcanvasLeftFilter' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Campaign&ctitle=Create Campaign', 'offcanvasLeftFilter')\"><span>Campaign</span></button>
                        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto  btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
                        <div class='dropdown-menu'>
                            <button class='dropdown-item' type='button' onclick=\"shiftdataV2('campaigns_data2.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=campaigns&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">View Campaigns</button>
                        </div>
                    </div>";
                }
            
                echo"<div class='mb-1 btn-group'>
                    <button class='btn btn-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('lead_data.php?stage=$leadstage&status=1&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\"><span>$leadstatusx Status</span></button>
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?stage=$leadstage&status=1&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">
                            <i data-acorn-icon='cursor-pointer'></i>&nbsp;&nbsp;<span>Ongoing</span>
                        </button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?stage=$leadstage&status=2&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">
                            <i data-acorn-icon='like'></i>&nbsp;&nbsp;<span>Completed</span>
                        </button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?stage=$leadstage&status=0&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">
                            <i data-acorn-icon='unlike'></i>&nbsp;&nbsp;<span>Suspended</span>
                        </button>
                    </div>
                </div>";
            
                echo"<div class='mb-1 btn-group'>
                    <button class='btn btn-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' onclick=\"shiftdataV2('lead_data.php?stage=$leadstage&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\"><i data-acorn-icon='view'></i>&nbsp;<span>$leadstagex</span></button>
                    <button class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm dropdown-toggle' type='button' data-bs-toggle='dropdown' data-submenu='' aria-expanded='false' style='margin-right:10px'></button>
                    <div class='dropdown-menu'>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?stage=1&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">
                            <i data-acorn-icon='form'></i>&nbsp;&nbsp;<span>Referral Stage</span>
                        </button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?stage=2&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">
                            <i data-acorn-icon='form'></i>&nbsp;&nbsp;<span>Assessment Stage</span>
                        </button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?stage=3&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">
                            <i data-acorn-icon='form'></i>&nbsp;&nbsp;<span>Approval Stage</span>
                        </button>
                        <button class='dropdown-item' type='button' onclick=\"shiftdataV2('lead_data.php?stage=4&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">
                            <i data-acorn-icon='form'></i>&nbsp;&nbsp;<span>Signed Agreement Stage</span>
                        </button>
                    </div>
                </div>";
            // }
        echo"</div>
    </div><br>";
    
    $dbname="project_sc";
    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    $sourceid=0;
    if(isset($_GET["sourceid"])) $sourceid=$_GET["sourceid"];
    
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;
    
    if(isset($_GET["cout"])){    
        unset($_COOKIE["lead_id"]);
        setcookie("lead_id", "", time() -9999999);
    }
                    
    echo"<div class='card-body' style='width:100%;padding:0px'>
        <div class='row' style='padding-left:5px;padding-right:5px'>";
            $t=0;
            if($mtype=="ADMIN") $ca1 = "select * from campaigns where status='ON' order by id desc";
            else $ca1 = "select * from campaigns where employeeid='$userid' and status='ON' order by id desc";
            $cb1 = $conn->query($ca1);
            if ($cb1->num_rows > 0) { while($cab1 = $cb1->fetch_assoc()) {
                
                echo"<h2>Campaign: ".$cab1["campaign_name"]." <span style='font-size:9pt'>Showing: $leadstatusx @ $leadstagex.</span></h2><hr>";
                
                if(isset($_COOKIE["lead_id"])){
                    $search = $conn->real_escape_string($_COOKIE["lead_id"]);
                    $ra1 = "SELECT * FROM leads 
                    WHERE (lead_name LIKE '%$search%' OR phone LIKE '%$search%' OR referral_number LIKE '%$search%' OR name LIKE '%$search%' OR surname LIKE '%$search%')
                    AND campaignid = '".$cab1["id"]."' AND status = '$leadstatus' AND stage = '$leadstage' AND onboard = '0' 
                    ORDER BY lead_name ASC";
                }else{
                    $ra1 = "select * from leads where campaignid='".$cab1["id"]."' and status='$leadstatus' and stage='$leadstage' and onboard='0' order by lead_name asc";
                }
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                    
                    if(strlen($rab1["target_date"])==10) $target_date=date("d-m-Y", $rab1["target_date"]);
                    else $target_date=null;
                    if(strlen($rab1["followup_date"])==10) $followup_date=date("d-m-Y", $rab1["followup_date"]);
                    else $followup_date=null;
                    if(strlen($rab1["followup_date"])==10) $followup_datex=date("Y-m-d", $rab1["followup_date"]);
                    else $followup_datex=null;
                    if(strlen($rab1["appointment_date"])==10) $appointment_date=date("d-m-Y" ,$rab1["appointment_date"]);
                    else $appointment_date=null;
                    if(strlen($rab1["appointment_date"])==10) $appointment_datex=date("Y-m-d" ,$rab1["appointment_date"]);
                    else $appointment_datex=null;
                    if(strlen($rab1["dob"])==10) $dob=date("d-m-Y", $rab1["dob"]);
                    else $dob=null;
                    
                    $employeename="";
                    $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id asc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename="".$rab2["username"]." ".$rab2["username2"].""; } }
                    
                    $campaignname="";
                    $ra3 = "select * from campaigns where id='".$rab1["campaignid"]."' order by id asc limit 1";
                    $rb3 = $conn->query($ra3);
                    if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { $campaignname=$rab3["campaign_name"]; } }
                    
                    $case_manager="";
                    $ra4 = "select * from uerp_user where id='".$rab1["case_manager"]."' order by id asc limit 1";
                    $rb4 = $conn->query($ra4);
                    if ($rb4->num_rows > 0) { while($rab4 = $rb4->fetch_assoc()) { $case_manager="".$rab4["username"]." ".$rab4["username2"].""; } }
                    
                    $t=($t+1);
                    echo"<div class='col-12 col-md-12' style='text-align:left;padding:10px'>
                        <div class='card mb-10' style='padding:10px'>
                            <table style='width:100%'><tr>
                                <td valign=top align=left style='font-size:10pt;'>
                                    <a data-bs-toggle='collapse' href='#category-".$rab1["id"]."' aria-expanded='false' aria-controls='collapseExample'>
                                        <span style='font-size:12pt'>$t. Lead Name:</span><br>
                                        <span style='font-size:20pt'><b>".$rab1["lead_name"]."</b></span>
                                    </a>
                                </td>
                                <td valign='top' align='center' style='width:50px'>
                                    <a data-bs-toggle='collapse' href='#category-".$rab1["id"]."' aria-expanded='false' aria-controls='collapseExample'>
                                        <i class='fa fa-angle-down'></i>
                                    </a>
                                </td>
                                <td valign='top' align='left' style='width:130px;padding-right:10px'>Priority: <input type='text' readonly class='form-control m-b' value='".$rab1["priority"]."' style='width:100%'></td>
                                <td valign='top' align='left' style='width:130px;padding-right:10px'>Ref. #: <input type='text' readonly class='form-control m-b' value='".$rab1["referral_number"]." ' style='width:100%'></td>
                                <td valign='top' align='left' style='width:130px;padding-right:10px'>
                                    <form method='post' name='leadsrc' action='logs_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                        <input type=hidden name='processor' value='appointmentmanager'>
                                        <input type=hidden name='stageid' value='".$rab1["id"]."'>
                                        Next Follow Up Date: <input type='date' class='form-control m-b required' name='datemanager' onchange='this.form.submit()' value='$followup_datex' style='width:100%;background-color:white;color:black'>
                                    </form>
                                </td>
                            </tr></table>
                            <div class='collapse' id='category-".$rab1["id"]."'><hr>
                                <div class='row'>
                                    <div class='col-12 col-md-4'>Campaign:<br>$campaignname<hr></div>
                                    <div class='col-12 col-md-4'>Manager:<br>$employeename<hr></div>
                                    
                                    
                                    <div class='col-12 col-md-4'>Appointment Date:<br>$appointment_date<hr></div>
                                    <div class='col-12 col-md-4'>Followup Date:<br>$followup_date<hr></div>
                                    <div class='col-12 col-md-4'>Target Date:<br>$target_date<hr></div>
                                    
                                    
                                    <div class='col-12 col-md-4'>Client Name:<br>".$rab1["title"]." ".$rab1["name"]." ".$rab1["surname"]." (".$rab1["gender"].")<hr></div>
                                    <div class='col-12 col-md-4'>Address:<br>".$rab1["address"]."<hr></div>
                                    <div class='col-12 col-md-4'>City:<br>".$rab1["ccity"].", ".$rab1["cstate"]."-".$rab1["czip"].", ".$rab1["ccountry"]."<hr></div>
                                    <div class='col-12 col-md-4'>Email:<br>".$rab1["email"]."<hr></div>
                                    <div class='col-12 col-md-4'>Phone #:<br>".$rab1["phone"]."<hr></div>
                                    
                                    
                                    <div class='col-12 col-md-4'>Date of Birth:<br>$dob<hr></div>
                                    <div class='col-12 col-md-4'>Birth Country:<br>".$rab1["birth_country"]."<hr></div>
                                    <div class='col-12 col-md-4'>Language:<br>".$rab1["language"]."<hr></div>
                                    <div class='col-12 col-md-4'>Can Spoke English?:<br>".$rab1["english"]."<hr></div>
                                    
                                    
                                    <div class='col-12 col-md-4'>Package Level:<br>".$rab1["cpackage"]." / 10<hr></div>
                                    <div class='col-12 col-md-4'>Funding type:<br>".$rab1["funding_type"]."<hr></div>
                                    <div class='col-12 col-md-4'>Prev. Provider:<br>".$rab1["previous_provider"]."<hr></div>
                                    <div class='col-12 col-md-4'>Referral Number:<br>".$rab1["referral_number"]."<hr></div>
                                    
                                    
                                    <div class='col-12 col-md-4'>Lead/Case Manager:<br>$case_manager<hr></div>
                                    <div class='col-12 col-md-4'>R. Phone:<br>".$rab1["rphone"]."<hr></div>
                                    <div class='col-12 col-md-4'>R. Email:<br>".$rab1["remail"]."<hr></div>
                                    <div class='col-12 col-md-4'>Source Type:<br>".$rab1["rtype"]."<hr></div>";
                                    
                                    if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                                        
                                        echo"
                                        <div class='col-12 col-md-4'>Note For Staff:<br>".$rab1["note_for_staff"]."<hr></div>
                                        <div class='col-12 col-md-4'>Referrer:<br>".$rab1["referrer"]."<hr></div>
                                        <div class='col-12 col-md-4'>Accounting System Reference:<br>".$rab1["accounting_system_reference"]."<hr></div>
                                        <div class='col-12 col-md-4'>Accounting System Secondary Reference:<br>".$rab1["accounting_system_secondary_reference"]."<hr></div>
                                        <div class='col-12 col-md-4'>Billing Group:<br>".$rab1["billing_group"]."<hr></div>
                                        <div class='col-12 col-md-4'>Default KM Charge:<br>".$rab1["default_km_charge"]."<hr></div>
                                        <div class='col-12 col-md-4'>Default Travel Time:<br>".$rab1["default_travel_time"]."<hr></div>
                                        <div class='col-12 col-md-4'>KM From Office:<br>".$rab1["km_from_office"]."<hr></div>
                                        <div class='col-12 col-md-4'>Language Other:<br>".$rab1["language_other"]."<hr></div>
                                        
                                        
                                        <div class='col-12 col-md-4'>Medicare Import Ref:<br>".$rab1["medicare_import_ref"]."<hr></div>
                                        <div class='col-12 col-md-4'>NAP Service Id:<br>".$rab1["nap_service_id"]."<hr></div>
                                        <div class='col-12 col-md-4'>Scheduler:<br>".$rab1["scheduler"]."<hr></div>
                                        <div class='col-12 col-md-4'>Planning Region:<br>".$rab1["planning_region"]."<hr></div>
                                        <div class='col-12 col-md-4'>Allied Health:<br>".$rab1["allied_health"]."<hr></div>
                                        <div class='col-12 col-md-4'>Property Name:<br>".$rab1["property_name"]."<hr></div>
                                        <div class='col-12 col-md-4'>Geographic Region:<br>".$rab1["geographic_region"]."<hr></div>
                                        <div class='col-12 col-md-4'>Default Package:<br>".$rab1["default_package"]."<hr></div>
                                        
                                        
                                        <div class='col-12 col-md-12'>priority:<br>".$rab1["priority"]."<hr></div>";
                                        
                                        if($_COOKIE["dbname"]!="saas_admin_circleofhope_com_au") echo"<div class='col-12 col-md-4'>NDIS #:<br>".$rab1["ndis_no"]."<hr></div>";
                                        
                                        echo"<div class='col-12'>Client Story/Enquiry (Note):<br>".$rab1["cdetail"]."<hr></div>
                                        <div class='col-12'>Ref. Note:<br>".$rab1["ref_note"]."</div>";
                                        
                                    }
                                    
                                echo"</div> 
                            </div><hr>
                            <div class='row'>
                                
                                    <div class='col-4 col-md-2'><a data-bs-toggle='collapse' href='#category-".$rab1["id"]."' aria-expanded='false' aria-controls='collapseExample' class='btn btn-outline-warning btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%'>View</a></div>
                                    <div class='col-4 col-md-2'><a class='btn btn-outline-primary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onclick=\"shiftdataV2('log_data.php?log_type=CALL&logid=".$rab1["id"]."', 'scrollingModalBody')\">Call</a></div>
                                    <div class='col-4 col-md-2'><a class='btn btn-outline-secondary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onclick=\"shiftdataV2('log_data.php?log_type=EMAIL&logid=".$rab1["id"]."', 'scrollingModalBody')\">Email</a></div>
                                    <div class='col-4 col-md-2'><a class='btn btn-outline-tertiary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onclick=\"shiftdataV2('log_data.php?log_type=MINUTES&logid=".$rab1["id"]."', 'scrollingModalBody')\">Notes & Cases</a></div>";
                                
                                    // echo"<div class='col-4 col-md-2'><a class='btn btn-outline-info btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onclick=\"shiftdataV2('log_data.php?log_type=CASES&logid=".$rab1["id"]."', 'scrollingModalBody')\">Cases</a></div>";
                                     
                                    echo"<div class='col-4 col-md-2'><a class='btn btn-outline-info btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onclick=\"shiftdataV2('log_data.php?log_type=QUOTE&logid=".$rab1["id"]."', 'scrollingModalBody')\">Quote</a></div>
                                    <div class='col-4 col-md-2'><a class='btn btn-outline-warning btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onclick=\"shiftdataV2('log_data.php?log_type=DEAL&logid=".$rab1["id"]."', 'scrollingModalBody')\">Agreement</a></div>
                                    <div class='col-4 col-md-2'><a class='btn btn-outline-success btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onclick=\"shiftdataV2('log_data.php?log_type=CONTRACT&logid=".$rab1["id"]."', 'scrollingModalBody')\">Contract</a></div>
                                    <div class='col-4 col-md-2'><a class='btn btn-warning btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasRight' onclick=\"shiftdataV2('global_manager.php?cid=$cid&sheba=$sheba&url=".$_GET["url"]."&id=".$_GET["id"]."&sourceid=Lead&logid=".$rab1["id"]."&ctitle=Edit Lead', 'offcanvasTop2')\">Edit</a></div>
                                    <div class='col-4 col-md-2'>";
                                        if($rab1["status"]=="1") echo"<a class='btn btn-outline-danger btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' href='dataprocessor_1.php?processor=StatusSuspend&status=0&tid=leads&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('lead_data.php?stage=$leadstage&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">Suspend</a>";
                                        else echo"<a class='btn btn-outline-danger btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' href='./dataprocessor_1.php?processor=StatusSuspend&status=1&tid=leads&pid=".$rab1["id"]."' target='dataprocessor' onclick=\"shiftdataV2('lead_data.php?stage=$leadstage&status=$leadstatus&cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&cout=0', 'datatableX')\">Activate</a>";
                                    echo"</div>";
                                    if($_COOKIE["dbname"]=="saas_admin_circleofhope_com_au"){
                                        echo"<div class='col-4 col-md-2'>
                                            <form method='post' name='leadsrc' action='logs_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                                <input type=hidden name='processor' value='stagemanager'>
                                                <input type=hidden name='stageid' value='".$rab1["id"]."'>
                                                <select class='form-control m-b required' name='stageupdater' onchange='this.form.submit()'>
                                                    <option value='".$rab1["stage"]."'>$leadstagex</option>
                                                    <option value='1'>Referral Stage</option>
                                                    <option value='2'>Assessment Stage</option>
                                                    <option value='3'>Approval Stage</option>
                                                    <option value='4'>Signed Agreement Stage</option>
                                                </select>
                                            </form>
                                        </div>";
                                    }
                                    echo"<div class='col-4 col-md-2'><a class='btn btn-outline-tertiary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' href='index.php?url=workspace.php&id=786&leadid=".$rab1["id"]."'>Onboard Client</a></div>
                                
                            </div>
                        </div>
                    </div>"; 
                } }
                echo"<div stle='width:100%'><br><br><br></div>";
            } }
        echo"</div>
    </div>"; 



    echo"<div class='modal fade' id='scrollingModalBody' tabindex='-1' role='dialog' aria-labelledby='scrollingModalBodyLabel' aria-hidden='true'>
        <div class='modal-dialog modal-xl modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='scrollingModalBodyLabel'>Loading...</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'></div>
            </div>
        </div>
    </div>";