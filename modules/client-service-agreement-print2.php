<?php
    
    $currenttime=time();
    $currentdate=date("Y-m-d",$currenttime);
    $pstatus=0;
    $project_signed=0;
	$project_signed1=0;
	$a0 = "select * from project where id='".$_GET["projectid"]."' and status='1' order by id asc limit 1";
    $b0 = $conn->query($a0);
    if ($b0->num_rows > 0) { while($c0 = $b0->fetch_assoc()) {
        $pstatus=1;
        $projectidz=$c0["id"];
        $projectname=$c0["name"];
        $leaderid=$c0["leaderid"];
        $clientid=$c0["clientid"];
        
        $image1=$c0["image1"];
        $image2=$c0["image2"];
        $image3=$c0["image3"];
        
        $start_date=date("d-m-Y",$c0["start_date"]);
        $end_date=date("d-m-Y",$c0["end_date"]);
        $project_signed=date("d-m-Y",$c0["project_signed"]);
        $project_signed1=date("d/m/Y",$c0["project_signed"]);
        $transport_cost=$c0["transport_cost"];
        
        $signature1=$c0["signature1"];
        $signature2=$c0["signature2"];
        $signature3=$c0["signature3"];

        $a1 = "select * from uerp_user where id='$clientid' order by id asc limit 1";
        $b1 = $conn->query($a1);
        if ($b1->num_rows > 0) { while($c1 = $b1->fetch_assoc()) {
            $cid=$c1["id"];
            $cstatus=$c1["status"];
            $cuid=$c1["unbox"];
            $cgender=$c1["gender"]; 
            $cname2=$c1["username"];
            $cname="".$c1["username"]." ".$c1["username2"]."";
            $clientname1=$c1["username"];
            $clientname2=$c1["username2"];
            $cphone=$c1["phone"];
            $cphone2=$c1["phone2"];
            $cmobile=$c1["mobile"];
            $cemail=$c1["email"];
            $caddress=$c1["address"];
            $ccity=$c1["city"];
            $cstate=$c1["area"];
            $czip=$c1["zip"];
            $ccountry=$c1["country"];
            $cdob=date("Y-m-d",$c1["dob"]);
            $cdob2=date("d-m-Y",$c1["dob"]);
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
            
            if($c1["images"]!=0) $clientimage=$c1["images"];
            else $clientimage="img/noimage.jpg";
            
            $cemergency_contact_1=$c1["emergency_contact_1"];
            $cemergency_relation_1=$c1["emergency_relation_1"];
            $cemergency_phone_1=$c1["emergency_phone_1"];
            $cemergency_email_1=$c1["emergency_email_1"];
            $cemergency_contact_2=$c1["emergency_contact_2"];
            $cemergency_relation_2=$c1["emergency_relation_2"];
            $cemergency_phone_2=$c1["emergency_phone_2"];
            $cemergency_email_2=$c1["emergency_email_2"];
            
    	} }
    } }
    
	if($pstatus!=0){
    	echo"<div>
            <div class='row'>
                <div class='col-12 col-md-5' style='padding-bottom:10px'>
                    <h1 class='mb-0 pb-0 display-4' id='title'>Print Agreement</h1>
                    <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                        <ul class='breadcrumb pt-0'>
                            <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                            <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>
                            <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=1'>Project & Communication Book</a></li>
                        </ul>
                    </nav>
                </div>
                <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>            
                    <a href='index.php?url=client-service-agreement.php&projectid=".$_GET["projectid"]."&clientid=$clientid' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'><i class='fa fa-arrow-left'></i> Service Agreement Form</a>
                    
                    <a href='index.php?url=projects.php&pstat=1' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-right:10px'><i class='fa fa-arrow-left'></i> Project Detail</a>
                    
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('projects_manager.php?cid=$cid&sheba=projects&ctitle=$title', 'offcanvasRight')\" style='margin-right:10px'>
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>New Project</span>
                    </button>                    
                </div>
            </div>    

        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                <div><br><br><br>
                    <div class='wrapper wrapper-content animated fadeInRight' id='element-to-print2' style='padding-left:5px;padding-right:5px;background-color:white;padding:20px;border-radius:10px;color:black'>
                        <div class='tabs-container'>
                            <div class='panel-body'>
                                <div class='row'>
                                    <div class='col-lg-12' style='text-align:left'>
                                        <img src='$logo_light' style='width:150px'>
                                        <center><h1 style='color:black'><b>Service Agreement</b></h1></center><hr>
                                        <span style='font-size:14pt;color:black;line-height:1.8'>
                                            This Service Agreement is for <b>$cname</b><br>
                                            NDIS Number: <b>$cndis</b><br>
                                            DOB: <b>$cdob2</b> and<br>is made between:<br><br>
                                            Participant/Participant’s Representative <b>$representative_name</b> and The Provider/<br><br>
                                            Registered Provider <b>$companynamex</b> ABN: <b>$abn_number</b><br>
                                            NDIS Provider No: $ndis_number<br><br>
                                            This Service Agreement will commence on <b>$project_signed</b>. For the period <b>$start_date</b> to <b>Ongoing</b>.<br>
                                        </span><br>
                                        <span style='font-size:12pt;color:black;line-height:1.8'>
                                            This Service Agreement is made for the purpose of providing supports under the Participant’s National 
                                            Disability Insurance Scheme (NDIS) plan. The Parties agree that this Service Agreement is made in the 
                                            context of the NDIS, which is a scheme that aims to:<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-circle' aria-hidden='true' style='font-size:6pt'></i>&nbsp;&nbsp; Support the independence and social and economic participation of people with disability, and<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-circle' aria-hidden='true' style='font-size:6pt'></i>&nbsp;&nbsp; Enable people with a disability to exercise choice and control in the pursuit of their goals and the planning and delivery of their supports.<br><br>
                                            <table style='width:100%'><tr><td align=right><img src='assets/ndis-logo.png' style='width:50px'></td></tr></table>
                                            <div class='html2pdf__page-break'></div>
                                            <img src='$logo_light' style='width:150px'><hr>
                                            <h3 style='color:black'>Service and support fee</h3>
                                            Service fees are based on the price limit set out in the NDIS Price guide. The Provider agrees to provide the following support items:<br><br>
                                            <table class='table stripe table-hover' style='width:100%;padding:10px'>
                                                <thead style='background-color:lightblue;color:black'><tr style=''>
                                                    <th style='color:black'>Description</th>
                                                    <th style='color:black'>NDIS item #</th>
                                                    <th style='color:black'>Unit</th>
                                                    <th style='color:black'>Price</th>
                                                    <th style='color:black'>Qty & Frequency</th>
                                                    <th style='color:black'>Comments</th>
                                                </tr></thead>
                                                <tbody>";
                                                    $ttx==0;
                                                    $r1 = "select * from service_agreement_addon where projectid='$projectidz' and clientid='$cid' and status='1' order by id desc";
                                                    $r1x = $conn->query($r1);
                                                    if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                                        echo"<tr class='gradeX'>
                                                            <td style='max-width:400px;color:black'>".$r1y["description"]."</td>
                                                            <td nowrap style='color:black'>".$r1y["ndis_item"]."</td>
                                                            <td nowrap style='color:black'>".$r1y["unit"]."</td>
                                                            <td nowrap style='color:black'>".$r1y["price"]."</td>
                                                            <td style='color:black'>".$r1y["qty"]."</td>
                                                            <td style='color:black'>".$r1y["comments"]."</td>
                                                        </tr>";
                                                    } }
                                                echo"</tbody>
                                            </table><hr>
                                            Hourly rates are applicable to the progress reports for the relevant support item in the NDIS Plan. in some circumstances, we may be able to charge a fee for services and support provided to the participant including transport or travel costs.<br>
                                            I agree the travel costs could be claimed. &nbsp;&nbsp;&nbsp;";
                                            if($transport_cost=="1") echo"<i class='fa fa-check-square-o' aria-hidden='true' style='font-size:10pt'></i> &nbsp;&nbsp; Yes. &nbsp;&nbsp;&nbsp;<i class='fa fa-check' aria-hidden='true' style='font-size:10pt'></i> &nbsp;&nbsp; No.";
                                            else echo"<i class='fa fa-square-o' aria-hidden='true' style='font-size:10pt'></i> &nbsp;&nbsp; Yes. &nbsp;&nbsp;&nbsp;<i class='fa fa-check' aria-hidden='true' style='font-size:10pt'></i> &nbsp;&nbsp; No.";
                                            
                                            echo"<br><br>Additional expenses (i.e. things that are not included as part of a Participant’s NDIS supports) are the responsibility of the Participant / Participant’s representative and are not included in the cost of the supports. Examples include entrance fees, event tickets, meals, etc.<br><br><br>
                                            
                                            <table style='width:100%'><tr><td align=right><img src='assets/ndis-logo.png' style='width:50px'></td></tr></table>
                                            <div class='html2pdf__page-break'></div>
                                            <img src='$logo_light' style='width:150px'><hr>
                                            
                                            <h3 style='color:black'>SIL Prover’s Responsibilities</h3>The SIL Provider will ensure that:<br>
                                            <table width=100%>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> The provided services meet the needs and expectations of the participants;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Participant will be treated respectfully and communicated openly and honestly in a timely manner;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Provide consultation in order to support decisions related to how the services are provided, if required;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Participants’ feedback and complaints are taken seriously and implemented in the improvement process;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Keep records of services provided to the participant;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Assist the participants to make clear decisions and treat the Participant with courtesy and respect;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Avoid any conflict of interest between participants and staff;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Regularly improve the services provided to the participants and listen to the Participant’s feedback and resolve problems quickly;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Retain information in a confidential way and protect the Participant’s privacy and confidential information;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Ensure that everyone is living in a safe environment and any risk to the participants will be mitigated as soon as possible;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Provide supports in a manner consistent with all relevant laws, including the National Disability Insurance Scheme Act and Rules, and the Australian Consumer Law; keep accurate records on the supports provided to the Participant;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Review the provision of supports regularly with the Participant;</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> Issue regular invoices and statements of the supports delivered to the Participant.</td></tr>
                                            </table>
                                            <br><br><br>
                                            
                                            <table style='width:100%'><tr><td align=right><img src='assets/ndis-logo.png' style='width:50px'></td></tr></table>
                                            <div class='html2pdf__page-break'></div>
                                            <img src='$logo_light' style='width:150px'><hr>
                                            
                                            <h3  style='color:black'>Participant’s Rights/Responsibilities:</h3>The Participant will ensure that:<br>
                                            <table width=100%>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> <b>Confirming service schedules: $companynamex</b> endeavor to confirm service schedules either by email or SMS. However, it is your responsibility to be aware of the scheduled services.</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> <b>Cancellation Policy:</b> Please be advised that, we ask you to give us at least 24 hours’ notice via email, telephone or SMS for service cancellation. If a service is cancelled after trading hours in the day prior to the service delivery day, or if the participant is not present on the service day, a fee will be claimed from your NDIS plan. The participant will be charged up to 90% in case of cancellation of a scheduled service in less than 24 hours and this can happen up to 12 times per annum.</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> <b>Complaints:</b> Participant or their carer can make complaints to any of <b>$companynamex</b> staff via or email or even in person. Upon request <b>$companynamex</b> can provide a copy of the Complaint Management policy and procedure or it may be accessible on website. initially the participant can contact <b>$companynamex</b> or the NDIS commission if they want to complain. Also, If under any circumstances, participant is not satisfied with the services and outcome of the complaint, it is their right to lodge a complaint with NDIS complaint commissioner 1800 035 544.</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> <b>Advocate:</b> It is participant’s right to ask for advocate if they require. <b>$companynamex</b> might appoint an advocate if believes that participant need it or if the Participant is not able to appoint any advocates.</td></tr>
                                                <tr><td width='50px' align='center' valign=top><i class='fa fa-circle' aria-hidden='true' style='font-size:8pt'></i></td><td valign=top> <b>Service Fee:</b> Fees are payable at the time of appointment if it is self-managed or nominee managed fund. For all other funds, invoices are to be paid in 7 days. Different methods of payment are accepted by the <b>$companynamex</b> including cash, BPAY, direct debit from the credit card or account provided by the participant. If the incurred cost is not covered by NDIS Plan either due to lack of fund or lack of support, the participant is liable for the charges.</td></tr>
                                            </table><br><br>
                                            
                                            <table style='width:100%'><tr><td align=right><img src='assets/ndis-logo.png' style='width:50px'></td></tr></table>
                                            <div class='html2pdf__page-break'></div>
                                            <img src='$logo_light' style='width:150px'><hr>
                                            
                                            The Participant has nominated <b>$nomineename</b> to manage the funding for supports provided under this Service Agreement. After providing those supports, the Provider will claim payment for those supports from the <b>$nomineename</b>.
                                            <br><br>
                                            
                                            <h3  style='color:black'>Changes to this Agreement</h3>
                                            
                                            If the participant or <b>$companynamex</b> wants to change this agreement, they shall make any changes they have talked about and agreed to in writing. The written changes should be dated and signed by the participant and <b>$companynamex</b>.<br><br>
                                            
                                            <b>Information Security and Access Personal Information:</b> Information obtained during your service provision period will be treated as confidential and secure information except in several circumstances as follows:<br>
                                            &nbsp;&nbsp;&nbsp;1. It is required by Law/ Court<br>
                                            &nbsp;&nbsp;&nbsp;2. You have provided consent to:<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a. provide a written report to another agency<br>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b. discuss the details of materials with another person<br><br>
                                            
                                            Workers shall provide progress reports to the participant and NDIA outlining plan objectives and goals and if those are met.<br><br>
                                            <b>Information Security and Access:</b> Personal information as well as medical information may be collected for service and support provision. During service provision period, all note taking, and communications will become as a part of participant records. All information will be stored and kept electronically on patients file. It is your general right to have access to the participant file upon a written request. If any record or personal information is incorrect, it is your right to amend the correct information. Personal information of patients will be retained for 7 years.
                                            <br><br>
                                            
                                            <table style='width:100%'><tr><td align=right><img src='assets/ndis-logo.png' style='width:50px'></td></tr></table>
                                            <div class='html2pdf__page-break'></div>
                                            <img src='$logo_light' style='width:150px'><hr>
                                            
                                            <h3  style='color:black'>Ending this Agreement</h3>
                                            If either the Participant or the Service Provider wants to end this agreement, each of them agrees to give 4 weeks’ notice to the other party. If the Participant or the Service Provider seriously breaches this agreement, that notice period will not be required.<br><br>
                                            
                                            <h3  style='color:black'>Participant information</h3>
                                            <table width=100%>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Contact Name</b></td><td>:</td><td valign=top align=left> $cname</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Address</b></td><td>:</td><td valign=top align=left> $caddress</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>NDIS Number</b></td><td>:</td><td valign=top align=left> $cndis</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Date of Birth</b></td><td>:</td><td valign=top align=left> $cdob2</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Phone Number – </b></td><td>:</td><td valign=top align=left> $cphone (Day), $cphone2 (Night)</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Mobile Phone Number</b></td><td>:</td><td valign=top align=left> $cmobile</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Email</b></td><td>:</td><td valign=top align=left> $cemail</td></tr>
                                            </table><br>
                                            
                                            <h3  style='color:black'>The Service Provider can be contacted on:</h3>
                                            <table width=100%>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Contact Name</b></td><td>:</td><td valign=top align=left> $cpname</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Address</b></td><td>:</td><td valign=top align=left> $cpaddress</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Phone Number – Day time</b></td><td>:</td><td valign=top align=left> $cpphone1 (Day), $cpphone2 (Night)</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Mobile Phone Number</b></td><td>:</td><td valign=top align=left> $cpmobile</td></tr>
                                                <tr><td width='150px' nowrap align='left' valign=top><b>Email</b></td><td>:</td><td valign=top align=left> $cpemail</td></tr>
                                            </table><br>
                                            
                                            <table style='width:100%'><tr><td align=right><img src='assets/ndis-logo.png' style='width:50px'></td></tr></table>
                                            <div class='html2pdf__page-break'></div>
                                            <img src='$logo_light' style='width:150px'><hr>
                                            
                                            <h3  style='color:black'>Agreement Signatures:</h3>
                                            The Participant and the Service Provider agree to the terms set out above.<br><br><br><br>";
                                            
                                            /*
                                            $signature11=strlen("$signature1");
                                            if($signature11>=5){
                                                echo"<img src='$signature1' style='height:100px;margin-top:-85px;margin-left:180px;max-width:400px;position:absolute'>";
                                            }else{
                                                $image11=strlen("$image1");
                                                if($image11>=5) echo"<img src='$image1' style='height:100px;margin-top:-85px;margin-left:180px;max-width:400px;position:absolute'>";
                                            }
                                            */
                                            $image11=strlen("$image1");
                                            if($image11>=5){
                                                echo"<img src='$image1' style='height:100px;margin-top:-85px;margin-left:220px;max-width:400px;position:absolute'>";
                                                
                                            }else{
                                                $signature11=strlen("$signature1");
                                                if($signature11>=5) echo"<img src='$signature1' style='height:100px;margin-top:-85px;margin-left:220px;max-width:400px;position:absolute'>";
                                            }
                                            
                                            echo"Signature of <b>Participant</b>:________________________________________________________	Date: <b>$project_signed1</b><br><br><br>
                                            
                                            <b>[If signed by a Nominee:]</b><br>
                                            I confirm that this agreement has been explained to the person receiving the services (Participant) and that they agree to this:<br><br><br><br>";
                                            /*
                                            $signature22=strlen("$signature2");
                                            if($signature22>=5){
                                                echo"<img src='$signature2' style='height:100px;margin-top:-85px;margin-left:180px;max-width:400px;position:absolute'>";
                                            }else{
                                                $image22=strlen("$image2");
                                                if($image22>=5) echo"<img src='$image2' style='height:100px;margin-top:-85px;margin-left:180px;max-width:400px;position:absolute'>";
                                            }
                                            */
                                            
                                            $image22=strlen("$image2");
                                            if($image22>=5){
                                                echo"<img src='$image2' style='height:100px;margin-top:-85px;margin-left:220px;max-width:400px;position:absolute'>";
                                                
                                            }else{
                                                $signature22=strlen("$signature2");
                                                if($signature22>=5) echo"<img src='$signature2' style='height:100px;margin-top:-85px;margin-left:220px;max-width:400px;position:absolute'>";
                                            }
                                            
                                            echo"Signature of <b>Nominee</b>:________________________________________________________	Date: <b>$project_signed1</b><br><br><br><br><br><br><br>";
                                            
                                            /*
                                            $signature33=strlen("$signature3");
                                            if($signature33>=5){
                                                echo"<img src='$signature3' style='height:100px;margin-top:-85px;margin-left:290px;max-width:400px;position:absolute'>";
                                            }else{
                                                $image33=strlen("$image3");
                                                if($image33>=5) echo"<img src='$image3' style='height:100px;margin-top:-85px;margin-left:290px;max-width:400px;position:absolute'>";
                                            }
                                            */
                                            
                                            $image33=strlen("$image3");
                                            if($image33>=5){
                                                echo"<img src='$image3' style='height:100px;margin-top:-85px;margin-left:360px;max-width:400px;position:absolute'>";
                                                
                                            }else{
                                                $signature33=strlen("$signature3");
                                                if($signature33>=5) echo"<img src='$signature3' style='height:100px;margin-top:-85px;margin-left:360px;max-width:400px;position:absolute'>";
                                            }
                                            
                                            echo"Signature on behalf of <b>$companynamex</b>:________________________________________________________	Date: <b>$project_signed1</b><br>
                                            
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
	} ?>
    
    <script>
        function printDiv(divID) {
             var divElem = document.getElementById(divID).innerHTML;
             var printWindow = window.open('', '', 'height=210,width=350'); 
             printWindow.document.write('<html><head><title></title></head>');
             printWindow.document.write('<body>');
             printWindow.document.write(divElem);
             printWindow.document.write('</body>');
             printWindow.document.write ('</html>');
             printWindow.document.close();
             printWindow.print();
        }
    </script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    
    <script>
        // Force text to black before PDF generation
        var element = document.getElementById('element-to-print2');
        element.querySelectorAll('*').forEach(function(el) {
            el.style.color = '#000000';
        });
    
        html2pdf(element, {
            margin: 10,
            filename: '<?php echo"$cname"; ?>_service_agreement.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    </script>