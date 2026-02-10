<?php

    include("../authenticator.php");
    
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
    echo"<div class='card-body' style='width:100%;padding:0px'><br><br>
        <div class='row' style='padding-left:5px;padding-right:5px'>";
            $t=0;
            if($designationy=="13") $ca1 = "select * from campaigns order by id desc";
            else $ca1 = "select * from campaigns where employeeid='$userid' order by id desc";
            $cb1 = $conn->query($ca1);
            if ($cb1->num_rows > 0) { while($cab1 = $cb1->fetch_assoc()) {
                echo"<h2>Leads Under Campaign: ".$cab1["campaign_name"]."</h2><hr>";
                $ra1 = "select * from leads where campaignid='".$cab1["id"]."' order by id asc";
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                
                    $target_date=date("d-m-Y", $rab1["target_date"]);
                    $followup_date=date("d-m-Y", $rab1["followup_date"]);
                    $appointment_date=date("d-m-Y" ,$rab1["appointment_date"]);
                    $dob=date("d-m-Y", $rab1["dob"]);
                    
                    $employeename="";
                    $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id asc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename="".$rab2["username"]." ".$rab2["username2"].""; } }
                    
                    $campaignname="";
                    $ra3 = "select * from campaigns where id='".$rab1["campaignid"]."' order by id asc limit 1";
                    $rb3 = $conn->query($ra3);
                    if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { $campaignname=$rab3["campaign_name"]; } }
                    
                    $t=($t+1);
                    echo"<div class='col-12 col-md-6' style='text-align:left;padding:10px'>
                        <div class='card mb-10' style='padding:10px'>
                            <span style='font-size:12pt'>$t. Lead Name:</span>
                            <h1>".$rab1["lead_name"]."</h1><hr>
                            <table style='width:100%'>
                                <tr><td>Campaign</td></td><td align=center> : </td><td align=left>$campaignname</td></tr>
                                <tr><td>Manager</td><td align=center> : </td><td align=left>$employeename</td></tr>
                                
                                <tr><td colspan=20><hr></td></tr>
                                <tr><td>Appointment Date</td><td align=center> : </td><td align=left>$appointment_date</td></tr>
                                <tr><td>Followup Date</td><td align=center> : </td><td align=left>$followup_date</td></tr>
                                <tr><td>Target Date</td><td align=center> : </td><td align=left>$target_date</td></tr>
                                
                                <tr><td colspan=20><hr></td></tr>
                                <tr><td>Client Name</td><td align=center> : </td><td align=left>".$rab1["title"]." ".$rab1["name"]." ".$rab1["surname"]." (".$rab1["gender"].")</td></tr>
                                <tr><td>Address</td><td align=center> : </td><td align=left>".$rab1["address"]."</td></tr>
                                <tr><td>Address</td><td align=center> : </td><td align=left>".$rab1["ccity"].", ".$rab1["cstate"]."-".$rab1["czip"].", ".$rab1["ccountry"]."</td></tr>
                                <tr><td>Email</td><td align=center> : </td><td align=left><tr><td>".$rab1["email"]."</td></tr>
                                <tr><td>Contact Number</td><td align=center> : </td><td align=left>".$rab1["phone"]."</td></tr>
                                
                                <tr><td colspan=20><hr></td></tr>
                                <tr><td>Date of Birth</td><td align=center> : </td><td align=left>$dob</td></tr>
                                <tr><td>Birth Country</td><td align=center> : </td><td align=left>".$rab1["birth_country"]."</td></tr>
                                <tr><td>Language</td><td align=center> : </td><td align=left>".$rab1["language"]."</td></tr>
                                <tr><td>Can Spoke English?</td><td align=center> : </td><td align=left>".$rab1["english"]."</td></tr>
                                
                                <tr><td colspan=20><hr></td></tr>
                                <tr><td>Package Level</td><td align=center> : </td><td align=left>".$rab1["cpackage"]." / 10</td></tr>
                                <tr><td>Funding type</td><td align=center> : </td><td align=left>".$rab1["funding_type"]."</td></tr>
                                <tr><td>Prev. Provider</td><td align=center> : </td><td align=left>".$rab1["previous_provider"]."</td></tr>
                                <tr><td>Referral Number</td><td align=center> : </td><td align=left>".$rab1["referral_number"]."
                                
                                <tr><td colspan=20><hr></td></tr>
                                <tr><td>Representative Name</td><td align=center> : </td><td align=left>".$rab1["rname"]." ".$rab1["rname2"]."</td></tr>
                                <tr><td>R. Phone</td><td align=center> : </td><td align=left>".$rab1["rphone"]."</td></tr>
                                <tr><td>R. Email</td><td align=center> : </td><td align=left>".$rab1["remail"]."</td></tr>
                                <tr><td>Source Type</td><td align=center> : </td><td align=left>".$rab1["rtype"]."</td></tr>
                                <tr><td colspan=20><hr></td></tr>
                                <tr><td colspan=20>
                                    <table style='width:100%'><tr>
                                        <td align=center style='padding:5px'><a class='btn btn-outline-primary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onmouseover=\"shiftdataV2('log_data.php?log_type=CALL&logid=".$rab1["id"]."', 'scrollingModalBody')\">Call</a></td>
                                        <td align=center style='padding:5px'><a class='btn btn-outline-secondary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onmouseover=\"shiftdataV2('log_data.php?log_type=EMAIL&logid=".$rab1["id"]."', 'scrollingModalBody')\">Email</a></td>
                                        <td align=center style='padding:5px'><a class='btn btn-outline-tertiary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onmouseover=\"shiftdataV2('log_data.php?log_type=MINUTES&logid=".$rab1["id"]."', 'scrollingModalBody')\">Minutes</a></td>
                                        <td align=center style='padding:5px'><a class='btn btn-outline-info btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onmouseover=\"shiftdataV2('log_data.php?log_type=CASES&logid=".$rab1["id"]."', 'scrollingModalBody')\">Cases</a></td>
                                    </tr><tr>
                                        <td align=center style='padding:5px'><a class='btn btn-outline-info btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' data-bs-toggle='modal' data-bs-target='#scrollingModalBody' onmouseover=\"shiftdataV2('log_data.php?log_type=QUOTE&logid=".$rab1["id"]."', 'scrollingModalBody')\">Quote</a></td>
                                        <td align=center style='padding:5px' colspan=3><a class='btn btn-outline-tertiary btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' href='index.php?url=workspace.php&id=786&leadid=".$rab1["id"]."'>Onboard This Client</a></td>
                                    </tr><tr>
                                        <td align=center style='padding:5px'><a class='btn btn-outline-warning btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%'>Edit Lead</a></td>
                                        <td align=center style='padding:5px'>";
                                            if($rab1["status"]=="1") echo"<a class='btn btn-outline-danger btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' href='./dataprocessor_1.php?processor=StatusSuspend&status=0&tid=leads&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('lead_data.php', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='btn btn-outline-danger btn-sm' style='cursor: pointer;margin-bottom:10px;width:100%' href='./dataprocessor_1.php?processor=StatusSuspend&status=1&tid=leads&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('lead_data.php', 'datatableX')\">Activate</a>";
                                        echo"</td>
                                    </tr></table>
                                </td></tr>
                            </table>
                        </div>
                    </div>"; 
                } }
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