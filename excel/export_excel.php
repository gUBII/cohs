<?php
    if($_GET["pointer"]=="EXCEL"){
    	header("Content-Type: application/xls");    
    	header("Content-Disposition: attachment; filename=eod_file.xls");  
    	header("Pragma: no-cache"); 
    	header("Expires: 0");
    	require_once '../include.php';
    	$output = "";
    	
    	if($_GET["kroyee"]=="eod-docsument-csv-reports"){
        	$output .="
        	<table>
        		<thead><tr><th>EOD Post Date</th><th>Employee Name</th><th>Client name</th><th>EOD Summary</th></tr><tbody>";
        		
        		$dfrom=strtotime($_GET["date_from"]);
        		$dto=strtotime($_GET["date_to"]);
        		
        	    if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]=="ALL"){
        	        $query = $conn->query("SELECT * FROM `eod_document` where eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }else if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]!="ALL"){
        	        $query = $conn->query("SELECT * FROM `eod_document` where clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }else if($_GET["employeedata"]!="ALL" && $_GET["clientdata"]=="ALL"){
        	        $query = $conn->query("SELECT * FROM `eod_document` where employeeid='".$_GET["employeedata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }else{
        	        $query = $conn->query("SELECT * FROM `eod_document` where employeeid='".$_GET["employeedata"]."' and clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }
        	    
        	    while($fetch = $query->fetch_array()){
        	        
    				$eod_date=date("d-m-Y", $fetch['eod_date']);
        	        
        	        $e1 = "select * from uerp_user where id='".$fetch['employeeid']."' order by id desc limit 1";
                    $e11 = $conn->query($e1);
                    if ($e11->num_rows > 0) { while($e111 = $e11->fetch_assoc()) { $ename="".$e111['username']." ".$e111['username2'].""; } }
                    
                    $c1 = "select * from uerp_user where id='".$fetch['clientid']."' order by id desc limit 1";
                    $c11 = $conn->query($c1);
                    if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $cname="".$c111['username']." ".$c111['username2'].""; } }
        	        
        	        $output .= "<tr><td>$eod_date</td><td>$ename</td><td>$cname</td><td>".$fetch['eod_summary']."</td></tr>";
        	        
        	    }
            $output .="</tbody></table>";
    	}
    	
    	if($_GET["kroyee"]=="eod-csv-reports"){
        	$output .="
        	<table>
        		<thead>
        			<tr>
        			    <th>EOD Post Date</th>	
        				<th>Employee Name</th>	
        				<th>Client name</th>	
        				<th>Shift Status</th>	
        				<th>Activity Log</th>	
        				<th>Other Activity (If any)</th>
        				
        				<th>Challenges in behavior today</th>
        				<th>what challenges did you encounter during your shift today?</th>	
        				<th>How challenging was their activity? (On a rating of 1 to 10).</th>	
        				
        				<th>Did the client communicate effectively with other people and yourself today?</th>	
        				<th>Please specify any communication challenges you faced: (if any)</th>	
        				<th>How effective was their communication? (On a rating of 1 to 10).</th>	
        				
        				<th>Do you have any concerns about the mobility of the participant?</th>	
        				<th>Mobility: If yes, please provide details and any actions taken</th>	
        				<th>how effective was their movement? (On a rating of 1 to 10).</th>
        				
        				<th>Social Note</th>
        				<th>How did the participant socialize today? (On a rating of 1 to 10).</th>
        				
        				<th>Were there any particular successes or positive moments? What did they enjoy participating in today?</th>
        				<th>Learn Note</th>
        				<th>how much do they enjoy learning new activities? (On a rating of 1 to 10).</th>
        				
        				<th>Did they notify you before going to the Toilet, Backyard, Kitchen etc.?</th>
        				<th>Notification: If yes, please provide details: (if required)</th>
        				<th>how was the notification activities? (On a rating of 1 to 10).</th>
        				
        				<th>What are the key activities you engaged in with the clients today? Describe in key points</th>
        				<th>how did they engage? (On a rating of 1 to 10).</th>
        				
        				<th>Was the participant capable of taking self care/management?</th>
        				<th>Self Manage: If NO, please describe in key notes why?</th>
        				<th>how did they self manage? (On a rating of 1 to 10).</th>
        				
        				<th>Were there any reportable incidents today?</th>
        				<th>RISK NOTE : If YES, please briefly explain:</th>
        				<th>how severe was the incident? (On a rating of 1 to 10).</th>
        				
        				<th>Were you able to complete all required documentation for the day?</th>	
        				<th>DOCUMENT NOTE : If NO, please specify any challenges you faced in documentation:</th>	
        				<th>Suggestions for improvement: Do you have any suggestions for improving the support provided or any process within the team?</th>	
        				<th>SUMMARY: How do you feel about your performance today?</th>	
        				<th>OVERALL NOTE: Suggestions for improvement:</th>
        			</tr>
        		<tbody>";
        		
        		$dfrom=strtotime($_GET["date_from"]);
        		$dto=strtotime($_GET["date_to"]);
        		
        	    if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]=="ALL"){
        	        $query = $conn->query("SELECT * FROM `eod` where eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }else if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]!="ALL"){
        	        $query = $conn->query("SELECT * FROM `eod` where clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }else if($_GET["employeedata"]!="ALL" && $_GET["clientdata"]=="ALL"){
        	        $query = $conn->query("SELECT * FROM `eod` where employeeid='".$_GET["employeedata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }else{
        	        $query = $conn->query("SELECT * FROM `eod` where employeeid='".$_GET["employeedata"]."' and clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    }
        	   
        	    // $query = $conn->query("SELECT * FROM `eod` where employeeid='".$_GET["employeedata"]."' and clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc") or die(mysqli_errno());
        	    
        	    while($fetch = $query->fetch_array()){
        	        
    				$eod_date=date("d-m-Y", $fetch['eod_date']);
        	        
        	        $e1 = "select * from uerp_user where id='".$fetch['employeeid']."' order by id desc limit 1";
                    $e11 = $conn->query($e1);
                    if ($e11->num_rows > 0) { while($e111 = $e11->fetch_assoc()) { $ename="".$e111['username']." ".$e111['username2'].""; } }
                    
                    $c1 = "select * from uerp_user where id='".$fetch['clientid']."' order by id desc limit 1";
                    $c11 = $conn->query($c1);
                    if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $cname="".$c111['username']." ".$c111['username2'].""; } }
        	        
        	        $output .= "<tr>
        				<td>$eod_date</td>	
        				<td>$ename</td>
        				<td>$cname</td>	
        				<td>".$fetch['shiftid']."</td>	
        				<td>".$fetch['activityid']."</td>	
        				<td>".$fetch['activity_other']."</td>	
        				<td>".$fetch['eod_behavior']."</td>	
        				<td>".$fetch['eod_eat']."</td>		
        				<td>".$fetch['eod_behavior_scale']." of 10</td>	
        				<td>".$fetch['eod_communication']."</td>	
        				<td>".$fetch['eod_communication_note']."</td>	
        				<td>".$fetch['eod_communication_scale']." of 10</td>	
        				<td>".$fetch['eod_mobility']."</td>	
        				<td>".$fetch['eod_mobility_note']."</td>	
        				<td>".$fetch['eod_mobility_scale']." of 10</td>	
        				<td>".$fetch['eod_social_note']."</td>	
        				<td>".$fetch['eod_socialize_scale']." of 10</td>	
        				<td>".$fetch['eod_learn']."</td>	
        				<td>".$fetch['eod_learn_note']."</td>	
        				<td>".$fetch['eod_learn_scale']." of 10</td>	
        				<td>".$fetch['eod_notification']."</td>	
        				<td>".$fetch['eod_notification_note']."</td>	
        				<td>".$fetch['eod_notification_scale']." of 10</td>	
        				<td>".$fetch['eod_engagement_note']."</td>	
        				<td>".$fetch['eod_engagement_scale']." of 10</td>	
        				<td>".$fetch['eod_manage']."</td>	
        				<td>".$fetch['eod_manage_note']."</td>	
        				<td>".$fetch['eod_manage_scale']." of 10</td>	
        				<td>".$fetch['eod_risk']."</td>	
        				<td>".$fetch['eod_risk_note']."</td>	
        				<td>".$fetch['eod_risk_scale']." of 10</td>	
        				<td>".$fetch['eod_document']."</td>	
        				<td>".$fetch['eod_document_note']."</td>	
        				<td>".$fetch['eod_suggest_note']."</td>	
        				<td>".$fetch['eod_summary']."</td>	
        				<td>".$fetch['eod_suggest_overall_note']."</td>
        				<td>".$fetch['status']."</td>
        			</tr>";
        	    }
            $output .="</tbody></table>";
    	}
    	
    	if($_GET["kroyee"]=="incident-csv-reports"){
    	    
    	}
    	echo $output;
    }else{
        require_once '../include.php';
        echo"<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
        <body onload='printDiv()'>";
            if($_GET["pointer"]=="PRINT") echo"<div class='data-table-rows slim' id='printthisarea'>";
            else echo"<div class='data-table-rows slim' id='element-to-print'>";
            
                if($_GET["kroyee"]=="eod-docsument-csv-reports"){
                    echo"<div class='data-table-responsive-wrapper'>
                        <table style='width:100%'>
                            <tbody>";
                                    $bc=0;
                                    $bcolor="#000000";
                                    $dfrom=strtotime($_GET["date_from"]);
                            		$dto=strtotime($_GET["date_to"]);
                            		
                            		$tomtom="#FFFFFF";
                            	    if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]=="ALL"){
                            	        $s1 = "SELECT * FROM `eod_document` where eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }else if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]!="ALL"){
                            	        $s1 = "SELECT * FROM `eod_document` where clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }else if($_GET["employeedata"]!="ALL" && $_GET["clientdata"]=="ALL"){
                            	        $s1 = "SELECT * FROM `eod_document` where employeeid='".$_GET["employeedata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }else{
                            	        $s1 = "SELECT * FROM `eod_document` where employeeid='".$_GET["employeedata"]."' and clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }
                            	    
                                    $r1 = $conn->query($s1);
                                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                        $lastid=$rs1["id"];
                                        $rand=rand(100,999);
                                        $eod_date=date("d-m-Y", $rs1['eod_date']);
        	        
                            	        $e1 = "select * from uerp_user where id='".$rs1['employeeid']."' order by id desc limit 1";
                                        $e11 = $conn->query($e1);
                                        if ($e11->num_rows > 0) { while($e111 = $e11->fetch_assoc()) { $ename="".$e111['username']." ".$e111['username2'].""; } }
                                        
                                        $c1 = "select * from uerp_user where id='".$rs1['clientid']."' order by id desc limit 1";
                                        $c11 = $conn->query($c1);
                                        if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $cname="".$c111['username']." ".$c111['username2'].""; } }
                                        if($tomtom=="#FFFFFF") $tomtom="#EEEEEE";
                                        else $tomtom="#FFFFFF";
                                        ?><style>
                                            th, td {
                                              border-style:solid;
                                              border-color: #96D4D4;
                                              border-collapse: collapse;
                                            }
                                            </style>
                                        </style><?php
                                        
                                        echo"<tr><td><br>
                                            <table style='width:100%;border-collapse: collapse'>
                                                <tr><td colspan=20 rowspan=7>Primary Informaton</td></tr>
                                                <tr><td>EOD Post Date:</td><td> $eod_date</td></tr>
                                                <tr><td>Employee Name:</td><td> $ename</td></tr>
                                                <tr><td>Client Name:</td><td> $cname</td></tr>
                                                <tr><td>What is your Feedback for Today?:</td><td>".$rs1['eod_summary']."</td></tr>
                                    		</table>
                                    	</td></tr>
                                    	<tr><td><hr></td></tr>";
                                    } }
                                echo"
                            </tbody>
                        </table>
                    </div>";
                }
                
                if($_GET["kroyee"]=="eod-csv-reports"){
                    echo"<div class='data-table-responsive-wrapper'>
                        <table style='width:100%'>
                            <tbody>";
                                    $bc=0;
                                    $bcolor="#000000";
                                    $dfrom=strtotime($_GET["date_from"]);
                            		$dto=strtotime($_GET["date_to"]);
                            		
                            		$tomtom="#FFFFFF";
                            	    if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]=="ALL"){
                            	        $s1 = "SELECT * FROM `eod` where eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }else if($_GET["employeedata"]=="ALL" && $_GET["clientdata"]!="ALL"){
                            	        $s1 = "SELECT * FROM `eod` where clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }else if($_GET["employeedata"]!="ALL" && $_GET["clientdata"]=="ALL"){
                            	        $s1 = "SELECT * FROM `eod` where employeeid='".$_GET["employeedata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }else{
                            	        $s1 = "SELECT * FROM `eod` where employeeid='".$_GET["employeedata"]."' and clientid='".$_GET["clientdata"]."' and eod_date>='$dfrom' and eod_date<='$dto' and status='1' order by eod_date asc";
                            	    }
                            	    
                                    $r1 = $conn->query($s1);
                                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                        $lastid=$rs1["id"];
                                        $rand=rand(100,999);
                                        $eod_date=date("d-m-Y", $rs1['eod_date']);
        	        
                            	        $e1 = "select * from uerp_user where id='".$rs1['employeeid']."' order by id desc limit 1";
                                        $e11 = $conn->query($e1);
                                        if ($e11->num_rows > 0) { while($e111 = $e11->fetch_assoc()) { $ename="".$e111['username']." ".$e111['username2'].""; } }
                                        
                                        $c1 = "select * from uerp_user where id='".$rs1['clientid']."' order by id desc limit 1";
                                        $c11 = $conn->query($c1);
                                        if ($c11->num_rows > 0) { while($c111 = $c11->fetch_assoc()) { $cname="".$c111['username']." ".$c111['username2'].""; } }
                                        if($tomtom=="#FFFFFF") $tomtom="#EEEEEE";
                                        else $tomtom="#FFFFFF";
                                        ?><style>
                                            th, td {
                                              border-style:solid;
                                              border-color: #96D4D4;
                                              border-collapse: collapse;
                                            }
                                            </style>
                                        </style><?php
                                        
                                        echo"<tr><td><br>
                                            <table style='width:100%;border-collapse: collapse'>
                                                <tr><td colspan=20 rowspan=7>Primary Informaton</td></tr>
                                                <tr><td>EOD Post Date:</td><td> $eod_date</td></tr>
                                                <tr><td>Employee Name:</td><td> $ename</td></tr>
                                                <tr><td>Client Name:</td><td> $cname</td></tr>
                                                <tr><td>Shift Type:</td><td> ".$rs1['shiftid']."</td></tr>
                                                <tr><td>Activity:</td><td>".$rs1['activityid']."</td></tr>
                                                <tr><td>Activity Other (if any):</td><td>".$rs1['activity_other']."</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=4>Behavior</td></tr>
                                                <tr><td>Challenges in behavior today:</td><td>".$rs1['eod_behavior']."</td></tr>
                                                <tr><td>what challenges did you encounter during your shift today?:</td><td>".$rs1['eod_eat']." ".$rs1['eod_walk']."</td></tr>
                                                <tr><td>How challenging was their activity? (On a rating of 1 to 10).:</td><td>".$rs1['eod_behavior_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=4>Communication</td></tr>
                                                <tr><td>Did the client communicate effectively with other people and yourself today?:</td><td>".$rs1['eod_communication']."</td></tr>
                                                <tr><td>Please specify any communication challenges you faced: (if any):</td><td>".$rs1['eod_communication_note']."</td></tr>
                                                <tr><td>How effective was their communication? (On a rating of 1 to 10).:</td><td>".$rs1['eod_communication_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=4>Mobility</td></tr>
                                                <tr><td>Do you have any concerns about the mobility of the participant?:</td><td>".$rs1['eod_mobility']."</td></tr>
                                                <tr><td>Mobility: If yes, please provide details and any actions taken:</td><td>".$rs1['eod_mobility_note']."</td></tr>
                                                <tr><td>how effective was their movement? (On a rating of 1 to 10).:</td><td>".$rs1['eod_mobility_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=3>Social</td></tr>
                                                <tr><td>Social Note:</td><td>".$rs1['eod_social_note']."</td></tr>
                                                <tr><td>How did the participant socialize today? (On a rating of 1 to 10).:</td><td>".$rs1['eod_socialize_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=4>Learn</td></tr>
                                                <tr><td>Were there any particular successes or positive moments? What did they enjoy participating in today?:</td><td>".$rs1['eod_learn']."</td></tr>
                                                <tr><td>Learn Note:</td><td>".$rs1['eod_learn_note']."</td></tr>
                                                <tr><td>how much do they enjoy learning new activities? (On a rating of 1 to 10).:</td><td>".$rs1['eod_learn_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=4>Communication</td></tr>
                                                <tr><td>Did they notify you before going to the Toilet, Backyard, Kitchen etc.?:</td><td>".$rs1['eod_notification']."</td></tr>
                                                <tr><td>Notification: If yes, please provide details: (if required):</td><td>".$rs1['eod_notification_note']."</td></tr>
                                                <tr><td>how was the notification activities? (On a rating of 1 to 10).:</td><td>".$rs1['eod_notification_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=3>Engage</td></tr>
                                                <tr><td>What are the key activities you engaged in with the clients today? Describe in key points:</td><td>".$rs1['eod_engagement_note']."</td></tr>
                                                <tr><td>how did they engage? (On a rating of 1 to 10).:</td><td>".$rs1['eod_engagement_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=4>Self Manage</td></tr>
                                                <tr><td>Was the participant capable of taking self care/management?:</td><td>".$rs1['eod_manage']."</td></tr>
                                                <tr><td>Self Manage: If NO, please describe in key notes why?:</td><td>".$rs1['eod_manage_note']."</td></tr>
                                                <tr><td>how did they self manage? (On a rating of 1 to 10).:</td><td>".$rs1['eod_manage_scale']." of 10</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=3>Risk</td></tr>
                                                <tr><td>Were there any reportable incidents today?:</td><td>".$rs1['eod_risk']."</td></tr>
                                                <tr><td>RISK NOTE : If YES, please briefly explain::</td><td>".$rs1['eod_risk_note']."</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=3>Incident</td></tr>
                                                <tr><td>how severe was the incident? (On a rating of 1 to 10).:</td><td>".$rs1['eod_risk_scale']." of 10</td></tr>
                                                <tr><td>Were you able to complete all required documentation for the day?:</td><td>".$rs1['eod_document']."</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=3>Documentation</td></tr>
                                                <tr><td>DOCUMENT NOTE : If NO, please specify any challenges you faced in documentation:</td><td>".$rs1['eod_document_note']."</td></tr>
                                                <tr><td>Suggestions for improvement: Do you have any suggestions for improving the support provided or any process within the team?:</td><td>".$rs1['eod_suggest_note']."</td></tr>
                                                
                                                <tr><td colspan=20 rowspan=3>Summary</td></tr>
                                                <tr><td>SUMMARY: How do you feel about your performance today?:</td><td>".$rs1['eod_summary']."</td></tr>
                                                <tr><td>OVERALL SUGGESTED:</td><td>".$rs1['eod_suggest_overall_note']."</td></tr>
                                                
                                    		</table>
                                    	</td></tr>
                                    	<tr><td><hr></td></tr>";
                                    } }
                                echo"
                            </tbody>
                        </table>
                    </div>";
                }
                
                if($_GET["kroyee"]=="incident-csv-reports"){
                    
                }
                
            echo"</div>";
        
        ?>
        <script> 
            function printDiv() { 
                var divContents = document.getElementById("printthisarea").innerHTML; 
                var a = window.open('', '', 'height=500, width=100%'); 
                a.document.write('<html>'); 
                a.document.write('<body >'); 
                a.document.write(divContents); 
                a.document.write('</body></html>'); 
                a.document.close(); 
                a.print(); 
            } 
        </script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
        
        <script>
            var element = document.getElementById('element-to-print');
            html2pdf(element, {
                margin: 10,
                filename: '<?php echo"eod-file.pdf"; ?>',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            });
        </script>
        
        <?php
    }
    
?>
