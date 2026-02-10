<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=file.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
	require_once 'conn.php';
	$output = "";
	$output .="
	<table>
		<thead>
			<tr>
				<th>DATE</th>	
				<th>WORKER</th>	
				<th>CLIENT</th>	
				<th>SHIFT</th>	
				<th>ACTIVITY</th>	
				<th>OTHER ACTIVITY</th>	
				<th>BEHAVIOR</th>	
				<th>EAT</th>	
				<th>WALK</th>	
				<th>CARE</th>	
				<th>LISTEN</th>	
				<th>POSITIVE BEHAVIOR</th>	
				<th>BEHAVIOR NOTE</th>	
				<th>BEHAVIOR SCALE</th>	
				<th>COMMUNICATION</th>	
				<th>COMMUNICATION NOTE</th>	
				<th>COMM. TEAM</th>	
				<th>COMM. TEAM NOTE</th>	
				<th>COMM. SCALE</th>	
				<th>MOBILITY</th>	
				<th>MOBILITY NOTE</th>	
				<th>MOBILITY SCALE</th>	
				<th>SOCIAL NOTE</th>	
				<th>SOCIALIZE SCALE</th>	
				<th>LEARN</th>	
				<th>LEARN NOTE</th>	
				<th>LEARN SCALE</th>	
				<th>NOTIFICATION</th>	
				<th>NOTIFICATION NOTE</th>	
				<th>NOTIFICATION SCALE</th>	
				<th>ENGAGEMENT NOTE</th>	
				<th>ENGAGEMENT SCALE</th>	
				<th>MANAGE</th>	
				<th>MANAGE NOTE</th>	
				<th>MANAGER SCALE</th>	
				<th>RISK</th>	
				<th>RISK NOTE</th>	
				<th>RISK SCALE</th>	
				<th>DOCUMENT</th>	
				<th>DOCUMENT NOTE</th>	
				<th>SUGGEST NOTEe</th>	
				<th>SUMMARY</th>	
				<th>OVERALL NOTE</th>
			</tr>
		<tbody>";
		
		$dfrom=strtotime($_GET["date_from"]);
		$dto=strtotime($_GET["date_to"]);
		
	    if($_GET["employeedata"]=="ALL"){
	        $query = $conn->query("SELECT * FROM `eod` where clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1'") or die(mysqli_errno());
    	}else{
    	    $query = $conn->query("SELECT * FROM `eod` where employeeid='".$_GET["employeedata"]."' and clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1'") or die(mysqli_errno());
	    }
	    while($fetch = $query->fetch_array()){
	        $eod_date=date("d-m-Y", $fetch['eod_date']);
	        $output .= "<tr>
				<td>$eod_date</td>	
				<td>".$fetch['employeeid']."</td>	
				<td>".$fetch['clientid']."</td>	
				<td>".$fetch['shiftid']."</td>	
				<td>".$fetch['activityid']."</td>	
				<td>".$fetch['activity_other']."</td>	
				<td>".$fetch['eod_behavior']."</td>	
				<td>".$fetch['eod_eat']."</td>	
				<td>".$fetch['eod_walk']."</td>	
				<td>".$fetch['eod_care']."</td>	
				<td>".$fetch['eod_listen']."</td>	
				<td>".$fetch['eod_behavior_positive']."</td>	
				<td>".$fetch['eod_behavior_note']."</td>	
				<td>".$fetch['eod_behavior_scale']."</td>	
				<td>".$fetch['eod_communication']."</td>	
				<td>".$fetch['eod_communication_note']."</td>	
				<td>".$fetch['eod_communication_team']."</td>	
				<td>".$fetch['eod_communication_team_note']."</td>	
				<td>".$fetch['eod_communication_scale']."</td>	
				<td>".$fetch['eod_mobility']."</td>	
				<td>".$fetch['eod_mobility_note']."</td>	
				<td>".$fetch['eod_mobility_scale']."</td>	
				<td>".$fetch['eod_social_note']."</td>	
				<td>".$fetch['eod_socialize_scale']."</td>	
				<td>".$fetch['eod_learn']."</td>	
				<td>".$fetch['eod_learn_note']."</td>	
				<td>".$fetch['eod_learn_scale']."</td>	
				<td>".$fetch['eod_notification']."</td>	
				<td>".$fetch['eod_notification_note']."</td>	
				<td>".$fetch['eod_notification_scale']."</td>	
				<td>".$fetch['eod_engagement_note']."</td>	
				<td>".$fetch['eod_engagement_scale']."</td>	
				<td>".$fetch['eod_manage']."</td>	
				<td>".$fetch['eod_manage_note']."</td>	
				<td>".$fetch['eod_manage_scale']."</td>	
				<td>".$fetch['eod_risk']."</td>	
				<td>".$fetch['eod_risk_note']."</td>	
				<td>".$fetch['eod_risk_scale']."</td>	
				<td>".$fetch['eod_document']."</td>	
				<td>".$fetch['eod_document_note']."</td>	
				<td>".$fetch['eod_suggest_note']."</td>	
				<td>".$fetch['eod_summary']."</td>	
				<td>".$fetch['eod_suggest_overall_note']."</td>
				<td>".$fetch['status']."</td>
			</tr>";
	    }
    $output .="</tbody></table>";
	echo $output;
?>
