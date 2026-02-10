<?php

    include 'include.php';
	// $dbnamex=$_COOKIE['dbname'];
	
    if(isset($_COOKIE["userid"])){
        
        if($_POST["url"]=="incident_update"){
            
            // smsbd,kroyee,incidentid,date,employeeid,clientid,involved,location,latitudek,longitudek,witness1,dob1,address1,phobe,witness2,dob2,address2,phone2,incidentdate,hourminute,what_happend,what_performed,injury,area,
            // treatment,treatment_other,referral,referred,firstaid,sessionid,suggestion,images,
             
            $postdate=strtotime($_POST["postdate"]);
            $incidentdate=strtotime($_POST["incidentdate"]);
            $dob1=strtotime($_POST["dob1"]);
            $dob2=strtotime($_POST["dob2"]);
            
            $employeeid = str_replace("'", "`", $_POST["employeeid"]);
            $clientid = str_replace("'", "`", $_POST["clientid"]);
            $involved = str_replace("'", "`", $_POST["involved"]);
            $location = str_replace("'", "`", $_POST["location"]);
            $witness1 = str_replace("'", "`", $_POST["witness1"]);
            $address1 = str_replace("'", "`", $_POST["address1"]);
            $phone1 = str_replace("'", "`", $_POST["phone1"]);
            $witness2 = str_replace("'", "`", $_POST["witness2"]);
            $address2 = str_replace("'", "`", $_POST["address2"]);
            $phone2 = str_replace("'", "`", $_POST["phone2"]);
            $hourminute = str_replace("'", "`", $_POST["hourminute"]);
            $what_happened = str_replace("'", "`", $_POST["what_happened"]);
            $what_performed = str_replace("'", "`", $_POST["what_performed"]);
            $injury = str_replace("'", "`", $_POST["injury"]);
            $area = str_replace("'", "`", $_POST["area"]);
            $treatment = str_replace("'", "`", $_POST["treatment"]);
            $treatment_other = str_replace("'", "`", $_POST["treatment_other"]);
            $referral = str_replace("'", "`", $_POST["referral"]);
            $referred = str_replace("'", "`", $_POST["referred"]);
            $firstaid = str_replace("'", "`", $_POST["firstaid"]);
            $sessionid = str_replace("'", "`", $_POST["sessionid"]);
            $suggestion = str_replace("'", "`", $_POST["suggestion"]);
            $status = str_replace("'", "`", $_POST["status"]);
            $images = str_replace("'", "`", $_POST["images"]);

            $sql = "UPDATE incident SET date='$postdate',employeeid='$employeeid',clientid='$clientid',involved='$involved',
            location='$location',witness1='$witness1',dob1='$dob1',address1='$address1',phone1='$phone1',witness2='$witness2',
            dob2='$dob2',address2='$address2',phone2='$phone2',incidentdate='$incidentdate',hourminute='$hourminute',
            what_happened='$what_happened',what_performed='$what_performed',injury='$injury',area='$area',treatment='$treatment',
            treatment_other='$treatment_other',referred='$referred',firstaid='$firstaid',upload='$upload',sessionid='$sessionid',
            suggestion='$suggestion',status='$status' WHERE id='".$_POST["incidentid"]."'";
            if ($conn->query($sql) === TRUE){
                $tomtom=0;
                echo"<script>alert('INCIDENT Data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','INCIDENT UPDATED','0','$sysdate','$ip','1','Updated INCIDENT Note','0','".$_POST["incidentid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                echo"<form method='GET' action='index.php' name='main' target='_top'>
                    <input type=hidden name='employeedata' value='".$_POST["employeedata"]."'>
                    <input type=hidden name='clientdata' value='".$_POST["clientdata"]."'>
                    <input type=hidden name='srcfdate' value='".$_POST["srcfdate"]."'>
                    <input type=hidden name='srctdate' value='".$_POST["srctdate"]."'>
                    <input type=hidden name='url' value='incident-reports.php'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php

            }
        }
        
        if($_POST["url"]=="eod_update"){
            
            $eod_date=strtotime($_POST["eod_date"]);
            $eod_employee_name = str_replace("'", "`", $_POST["eod_employee_name"]);
            $activity_other = str_replace("'", "`", $_POST["activity_other"]);
            $eod_eat = str_replace("'", "`", $_POST["eod_eat"]);
            $eod_walk = str_replace("'", "`", $_POST["eod_walk"]);
            $eod_care = str_replace("'", "`", $_POST["eod_care"]);
            $eod_listen = str_replace("'", "`", $_POST["eod_listen"]);
            $eod_behavior_scale = str_replace("'", "`", $_POST["eod_behavior_scale"]);
            $eod_communication = str_replace("'", "`", $_POST["eod_communication"]);
            $eod_communication_note = str_replace("'", "`", $_POST["eod_communication_note"]);
            // $eod_communication_team_note = str_replace("'", "`", $_POST["eod_communication_team_note"]);
            $eod_communication_scale = str_replace("'", "`", $_POST["eod_communication_scale"]);
            $eod_mobility = str_replace("'", "`", $_POST["eod_mobility"]);
            $eod_mobility_note = str_replace("'", "`", $_POST["eod_mobility_note"]);
            $eod_mobility_scale = str_replace("'", "`", $_POST["eod_mobility_scale"]);
            $eod_social_note = str_replace("'", "`", $_POST["eod_social_note"]);
            $eod_socialize_scale = str_replace("'", "`", $_POST["eod_socialize_scale"]);
            $eod_learn = str_replace("'", "`", $_POST["eod_learn"]);
            $eod_learn_note = str_replace("'", "`", $_POST["eod_learn_note"]);
            $eod_learn_scale = str_replace("'", "`", $_POST["eod_learn_scale"]);
            $eod_notification = str_replace("'", "`", $_POST["eod_notification"]);
            $eod_notification_note = str_replace("'", "`", $_POST["eod_notification_note"]);
            $eod_notification_scale = str_replace("'", "`", $_POST["eod_notification_scale"]);
            $eod_engagement_note = str_replace("'", "`", $_POST["eod_engagement_note"]);
            $eod_engagement_scale = str_replace("'", "`", $_POST["eod_engagement_scale"]);
            $eod_manage = str_replace("'", "`", $_POST["eod_manage"]);
            $eod_manage_note = str_replace("'", "`", $_POST["eod_manage_note"]);
            $eod_manage_scale = str_replace("'", "`", $_POST["eod_manage_scale"]);
            $eod_risk = str_replace("'", "`", $_POST["eod_risk"]);
            $eod_risk_note= str_replace("'", "`", $_POST["eod_risk_note"]);
            $eod_risk_scale = str_replace("'", "`", $_POST["eod_risk_scale"]);
            $eod_document = str_replace("'", "`", $_POST["eod_document"]);
            $eod_document_note = str_replace("'", "`", $_POST["eod_document_note"]);
            $eod_suggest_note = str_replace("'", "`", $_POST["eod_suggest_note"]);
            $eod_summary = str_replace("'", "`", $_POST["eod_summary"]);
            $eod_suggest_overall_note = str_replace("'", "`", $_POST["eod_suggest_overall_note"]);
            
            $sql = "UPDATE eod SET eod_date='$eod_date',employeeid='".$_POST["eod_employee_name"]."',clientid='".$_POST["clientid"]."',shiftid='".$_POST["shiftid"]."',
            activityid='".$_POST["activityid"]."',activity_other='".$_POST["activity_other"]."',eod_behavior='".$_POST["eod_behavior"]."',eod_eat='".$_POST["eod_eat"]."',
            eod_walk='".$_POST["eod_walk"]."',eod_care='".$_POST["eod_care"]."',eod_listen='".$_POST["eod_listen"]."',eod_behavior_scale='".$_POST["eod_behavior_scale"]."',
            eod_communication='$eod_communication',eod_communication_note='$eod_communication_note',eod_communication_scale='".$_POST["eod_communication_scale"]."',
            eod_mobility='".$_POST["eod_mobility"]."',eod_mobility_note='".$_POST["eod_mobility_note"]."',eod_mobility_scale='".$_POST["eod_mobility_scale"]."',eod_social_note='".$_POST["eod_social_note"]."',
            eod_socialize_scale='".$_POST["eod_socialize_scale"]."',eod_learn='".$_POST["eod_learn"]."',eod_learn_note='".$_POST["eod_learn_note"]."',eod_learn_scale='".$_POST["eod_learn_scale"]."',
            eod_notification='".$_POST["eod_notification"]."',eod_notification_note='".$_POST["eod_notification_note"]."',eod_notification_scale='".$_POST["eod_notification_scale"]."',
            eod_engagement_note='".$_POST["eod_engagement_note"]."',eod_engagement_scale='".$_POST["eod_engagement_scale"]."',eod_manage='".$_POST["eod_manage"]."',eod_manage_note='".$_POST["eod_manage_note"]."',
            eod_manage_scale='".$_POST["eod_manage_note"]."',eod_risk='".$_POST["eod_risk"]."',eod_risk_note='".$_POST["eod_risk_note"]."',eod_risk_scale='".$_POST["eod_risk_scale"]."',
            eod_document='".$_POST["eod_document"]."',eod_document_note='".$_POST["eod_document_note"]."',eod_suggest_note='".$_POST["eod_suggest_note"]."',eod_summary='".$_POST["eod_summary"]."',
            eod_suggest_overall_note='".$_POST["eod_suggest_overall_note"]."',status='1' WHERE id='".$_POST["eodid"]."'";
            if ($conn->query($sql) === TRUE){
                $tomtom=0;
                echo"<script>alert('EOD data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','EOD UPDATED','0','$sysdate','$ip','1','Updated EOD Note','0','".$_POST["eodid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                echo"<form method='GET' action='index.php' name='main' target='_top'>
                    <input type=hidden name='url' value='eod-reports.php'><input type='hidden' name='sheba' value='".$_POST["sheba"]."'>
                    <input type='hidden' name='employeedata' value='".$_POST["employeedata"]."'><input type='hidden' name='clientdata' value='".$_POST["clientdata"]."'>
                    <input type='hidden' name='srcfdate' value='".$_POST["srcfdate"]."'><input type='hidden' name='srctdate' value='".$_POST["srctdate"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="eod_document_update"){
            
            $eod_date=strtotime($_POST["eod_date"]);
            $eod_employee_name = str_replace("'", "`", $_POST["eod_employee_name"]);
            $eod_client_name = str_replace("'", "`", $_POST["eod_client_name"]);
            $eod_summary = str_replace("'", "`", $_POST["eod_summary"]);
            
            $sql = "UPDATE eod_document SET eod_date='$eod_date',employeeid='$eod_employee_name',clientid='$eod_client_name',eod_summary='$eod_summary' WHERE id='".$_POST["eodid"]."'";
            if ($conn->query($sql) === TRUE){
                $tomtom=0;
                echo"<script>alert('EOD data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','EOD DOCUMENT UPDATED','0','$sysdate','$ip','1','Updated EOD DOCUMENT Note','0','".$_POST["eodid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='eod-document-reports.php'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        if($_POST["url"]=="eod.php"){
            // $activityid=implode(", ",$_POST["activityid"]);
            $activityid=$_POST["activityid"];
            $eod_date=strtotime($_POST["eod_date"]);
            
            // eod_behavior_positive,eod_behavior_note,eod_communication_team,eod_communication_team_note,
            // '".$_POST["eod_behavior_positive"]."','".$_POST["eod_behavior_note"]."','".$_POST["eod_communication_team"]."',
            
            $eod_employee_name = str_replace("'", "`", $_POST["eod_employee_name"]);
            $activity_other = str_replace("'", "`", $_POST["activity_other"]);
            $eod_eat = str_replace("'", "`", $_POST["eod_eat"]);
            $eod_walk = str_replace("'", "`", $_POST["eod_walk"]);
            $eod_care = str_replace("'", "`", $_POST["eod_care"]);
            $eod_listen = str_replace("'", "`", $_POST["eod_listen"]);
            $eod_behavior_scale = str_replace("'", "`", $_POST["eod_behavior_scale"]);
            $eod_communication = str_replace("'", "`", $_POST["eod_communication"]);
            $eod_communication_note = str_replace("'", "`", $_POST["eod_communication_note"]);
            $eod_communication_team_note = str_replace("'", "`", $_POST["eod_communication_team_note"]);
            $eod_communication_scale = str_replace("'", "`", $_POST["eod_communication_scale"]);
            $eod_mobility = str_replace("'", "`", $_POST["eod_mobility"]);
            $eod_mobility_note = str_replace("'", "`", $_POST["eod_mobility_note"]);
            $eod_mobility_scale = str_replace("'", "`", $_POST["eod_mobility_scale"]);
            $eod_social_note = str_replace("'", "`", $_POST["eod_social_note"]);
            $eod_socialize_scale = str_replace("'", "`", $_POST["eod_socialize_scale"]);
            $eod_learn = str_replace("'", "`", $_POST["eod_learn"]);
            $eod_learn_note = str_replace("'", "`", $_POST["eod_learn_note"]);
            $eod_learn_scale = str_replace("'", "`", $_POST["eod_learn_scale"]);
            $eod_notification = str_replace("'", "`", $_POST["eod_notification"]);
            $eod_notification_note = str_replace("'", "`", $_POST["eod_notification_note"]);
            $eod_notification_scale = str_replace("'", "`", $_POST["eod_notification_scale"]);
            $eod_engagement_note = str_replace("'", "`", $_POST["eod_engagement_note"]);
            $eod_engagement_scale = str_replace("'", "`", $_POST["eod_engagement_scale"]);
            $eod_manage = str_replace("'", "`", $_POST["eod_manage"]);
            $eod_manage_note = str_replace("'", "`", $_POST["eod_manage_note"]);
            $eod_manage_scale = str_replace("'", "`", $_POST["eod_manage_scale"]);
            $eod_risk = str_replace("'", "`", $_POST["eod_risk"]);
            $eod_risk_note= str_replace("'", "`", $_POST["eod_risk_note"]);
            $eod_risk_scale = str_replace("'", "`", $_POST["eod_risk_scale"]);
            $eod_document = str_replace("'", "`", $_POST["eod_document"]);
            $eod_document_note = str_replace("'", "`", $_POST["eod_document_note"]);
            $eod_suggest_note = str_replace("'", "`", $_POST["eod_suggest_note"]);
            $eod_summary = str_replace("'", "`", $_POST["eod_summary"]);
            $eod_suggest_overall_note = str_replace("'", "`", $_POST["eod_suggest_overall_note"]);
            
            
            // $activity_other,$eod_eat,$eod_walk,$eod_care,$eod_listen,$eod_behavior_scale,$eod_communication
            // $eod_communication_team_note,$eod_communication_scale,$eod_mobility,$eod_mobility_note,$eod_mobility_scale
            // $eod_social_note,$eod_socialize_scale,$eod_learn,$eod_learn_note,$eod_learn_scale,$eod_notification,$eod_notification_note
            // $eod_notification_scale,$eod_engagement_note,$eod_engagement_scale,$eod_manage,$eod_manage_note,$eod_manage_scale
            // $eod_risk,$eod_risk_note,$eod_risk_note,$eod_document,$eod_document_note,$eod_suggest_note,$eod_summary,$eod_suggest_overall_note
            
            $sql = "INSERT INTO eod (eod_date,employeeid,clientid,shiftid,activityid,activity_other,eod_behavior,eod_eat,eod_walk,eod_care,eod_listen,
            eod_behavior_scale,eod_communication,eod_communication_note,eod_communication_scale,eod_mobility,eod_mobility_note,eod_mobility_scale,
            eod_social_note,eod_socialize_scale,eod_learn,eod_learn_note,eod_learn_scale,eod_notification,eod_notification_note,eod_notification_scale,
            eod_engagement_note,eod_engagement_scale,eod_manage,eod_manage_note,eod_manage_scale,eod_risk,eod_risk_note,eod_risk_scale,eod_document,
            eod_document_note,eod_suggest_note,eod_summary,eod_suggest_overall_note,status) 
            VALUES ('$eod_date','$eod_employee_name','".$_POST["clientid"]."','".$_POST["shiftid"]."','$activityid','$activity_other','".$_POST["eod_behavior"]."',
            '$eod_eat','$eod_walk','$eod_care','$eod_listen','$eod_behavior_scale','$eod_communication','$eod_communication_note','$eod_communication_scale',
            '$eod_mobility','$eod_mobility_note','$eod_mobility_scale','$eod_social_note','$eod_socialize_scale','$eod_learn','$eod_learn_note','$eod_learn_scale',
            '$eod_notification','$eod_notification_note','$eod_notification_scale','$eod_engagement_note','$eod_engagement_scale','$eod_manage','$eod_manage_note',
            '$eod_manage_scale','$eod_risk','$eod_risk_note','$eod_risk_scale','$eod_document','$eod_document_note','$eod_suggest_note','$eod_summary','$eod_suggest_overall_note','1')";
            if ($conn->query($sql) === TRUE){
                //echo"<script>alert('EOD data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','EOD NOTE','0','$sysdate','$ip','1','Added New EOD Note','0','0')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='eod-reports.php'><input type=hidden name='id' value='0'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="eod_document.php"){
            
            if(isset($_POST["eod_summary"])){
                
                $eod_date=strtotime($_POST["eod_date"]);
                $eodsummary = str_replace("'", "`", $_POST["eod_summary"]);
                
                if (stripos($eodsummary, 'Hospital') !== false) {
                    echo "<script>alert('The word \"Hospital\" was found in the answer and send notification to admin.');</script>";
                }
                if (stripos($eodsummary, 'fall') !== false) {
                    echo "<script>alert('The word \"Fall\" was found in the answer and send notification to admin.');</script>";
                }
                
                $sql = "insert into eod_document (eod_date,employeeid,clientid,eod_summary,status) 
                VALUES ('$eod_date','".$_POST["eod_employee_name"]."','".$_POST["eod_client_name"]."','$eodsummary','1')";
                if ($conn->query($sql) === TRUE) echo"<script>alert('EOD data Update Successfully...')</script>";
                
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','EOD REPORT','0','$sysdate','$ip','1','Added New EOD Report','0','0')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='eod-document-reports.php'><input type=hidden name='id' value='0'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="boc.php"){
            $typeid=implode(", ",$_POST["typeid"]);
            $frequency=implode(", ",$_POST["frequency"]);
            $duration=implode(", ",$_POST["duration"]);
            $eod_date=strtotime($_POST["eod_date"]);
            $eod_employee_name = str_replace("'", "`", $_POST["eod_employee_name"]);
            $type_other = str_replace("'", "`", $_POST["type_other"]);
            $frequency_other = str_replace("'", "`", $_POST["frequency_other"]);
            $duration_other = str_replace("'", "`", $_POST["duration_other"]);
            $signs = str_replace("'", "`", $_POST["signs"]);
            $signs_note = str_replace("'", "`", $_POST["signs_note"]);
            $situation_note = str_replace("'", "`", $_POST["situation_note"]);
            $situation_description = str_replace("'", "`", $_POST["situation_description"]);
            $factor_note = str_replace("'", "`", $_POST["factor_note"]);
            $information = str_replace("'", "`", $_POST["information"]);
            $information_note = str_replace("'", "`", $_POST["information_note"]);
            $suggest = str_replace("'", "`", $_POST["suggest"]);

            // $type_other,$frequency_other,$duration_other,$signs,$signs_note,$situation_note,$situation_description,$factor_note,$information,$information_note,$suggest
            
            $sql = "INSERT INTO boc (date,employeeid,clientid,typeid,type_other,frequencyid,frequency_other,durationid,duration_other,signs,signs_note,
            situation_note,situation_description,factor_note,information,information_note,suggest,status) 
            VALUES ('$eod_date','$eod_employee_name','".$_POST["clientid"]."','$typeid','$type_other','$frequency','$frequency_other','$duration',
            '$duration_other','$signs','$signs_note','$situation_note','$situation_description','$factor_note','$information','$information_note','$suggest','1')";
            if ($conn->query($sql) === TRUE){
                //echo"<script>alert('EOD data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','BOC NOTE','0','$sysdate','$ip','1','Added New BOC Note','0','0')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='boc-reports.php'><input type=hidden name='id' value='786'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="incident.php"){
            $injury=implode(", ",$_POST["injury"]);
            $injury_area=implode(", ",$_POST["injury_area"]);
            $post_date=strtotime($_POST["date"]);
            $incidentdate=strtotime($_POST["incidentdate"]);
            
            /*
            $targetDir = "media/documents/";
            $allowTypes = array('jpg','png','jpeg','gif','doc','docx','pdf','xls');
            
            $images_arr = array();
            foreach($_FILES['images']['name'] as $key=>$val){
        		$image_name = $_FILES['images']['name'][$key];
        		$tmp_name 	= $_FILES['images']['tmp_name'][$key];
        		$size 		= $_FILES['images']['size'][$key];
        		$type 		= $_FILES['images']['type'][$key];
        		$error 		= $_FILES['images']['error'][$key];
        		
        		// File upload path
        		$fileName = basename($_FILES['images']['name'][$key]);
        		$targetFilePath = $targetDir . $fileName;
        		
        		// Check whether file type is valid
        		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        		if(in_array($fileType, $allowTypes)){
        			// Store images on the server
        			if(move_uploaded_file($_FILES['images']['tmp_name'][$key],$targetFilePath)){
        				$images_arr[] = $targetFilePath;
        				$sql = "INSERT INTO multi_image (uid,postid,location,sessionid,post_date,incident_date,status) 
                        VALUES ('".$_COOKIE["userid"]."','0',".$targetFilePath."','".$_POST["sessionid"]."','$post_date','$incidentdate','1')";
                        if ($conn->query($sql) === TRUE){
                            //echo"<script>alert('EOD data Update Successfully...')</script>";
        					$count = $key + 1;
        					$statusMsg = "$count imagefile has been uploaded successfully.";
        				}else $statusMsg = "Failed to upload image";
        			} else $statusMsg = "Sorry, there was an error uploading your file.";
        		} else $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, DOC, DOCX, XLS, PDF files are allowed to upload.';
        	}
        	*/
            
            $employeeid = str_replace("'", "`", $_POST["employeeid"]);
        	$location = str_replace("'", "`", $_POST["location"]);
        	$witness1 = str_replace("'", "`", $_POST["witness1"]);
        	$address1 = str_replace("'", "`", $_POST["address1"]);
        	$witness2 = str_replace("'", "`", $_POST["witness2"]);
        	$address2 = str_replace("'", "`", $_POST["address2"]);
        	$what_happened = str_replace("'", "`", $_POST["what_happened"]);
        	$what_preformed = str_replace("'", "`", $_POST["what_performed"]);
        	$injury_other = str_replace("'", "`", $_POST["injury_other"]);
        	$injury_area_other = str_replace("'", "`", $_POST["injury_area_other"]);
        	$treatment = str_replace("'", "`", $_POST["treatment"]);
        	$treatment_other = str_replace("'", "`", $_POST["treatment_other"]);
        	$referral = str_replace("'", "`", $_POST["referral"]);
        	$referred = str_replace("'", "`", $_POST["referred"]);
        	$firstaid = str_replace("'", "`", $_POST["firstaid"]);
        	$sessionid = str_replace("'", "`", $_POST["sessionid"]);
        	$suggestion = str_replace("'", "`", $_POST["suggestion"]);
        	
        	// $location,$witness1,$address1,$witness2,$address2,$what_happened,$what_preformed,$injury_other,$injury_area_other,$treatment,$treatment_other,$referral,$referred,$firstaid,$sessionid,$suggestion
        	
        	
            $sql = "INSERT INTO incident (date,employeeid,clientid,involved,location,latitudek,longitudek,witness1,dob1,address1,phone1,witness2,dob2,address2,
            phone2,incidentdate,hourminute,what_happened,what_performed,injury,other_injury,area,other_area,treatment,treatment_other,referred,
            firstaid,sessionid,suggestion,status) 
            VALUES ('$post_date','$employeeid','".$_POST["clientid"]."','".$_POST["involved"]."','$location',
            '".$_POST["latitudek"]."','".$_POST["longitudek"]."','$witness1','".$_POST["dob1"]."','$address1','".$_POST["phone1"]."',
            '$witness2','".$_POST["dob2"]."','$address2','".$_POST["phone2"]."','$incidentdate','".$_POST["hourminute"]."',
            '$what_happened','$what_preformed','$injury','$injury_other','$injury_area','$injury_area_other','$treatment','$treatment_other',
            '$referred','$firstaid','$sessionid','$suggestion','1')";
            if ($conn->query($sql) === TRUE){
                //echo"<script>alert('EOD data Update Successfully...')</script>";
                
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','INCIDENT NOTE','0','$sysdate','$ip','1','Added New INCIDENT Note','0','0')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                $recid=0;
                $sql = "SELECT * FROM incident where sessionid='".$_POST["sessionid"]."' order by id desc limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
                if($recid!="0"){
                    foreach ($_FILES['images']['name'] as $key => $name){
                        $rand= rand(10000,99999);
                        $path_parts = pathinfo($name);
                        $extension = $path_parts['extension'];
                        $newFilename = time() . "incident$rand." . $extension;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
                        $location = 'media/documents/' . $newFilename;
                		$sql = "INSERT INTO multi_image (uid,postid,location,sessionid,post_date,incident_date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','".$_POST["sessionid"]."','$post_date','$incidentdate','1','INCIDENT')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        // echo"<script>alert('Update Successfully...')</script>";
                	}
                	
                    // $sql = "UPDATE multi_image SET postid='' WHERE postid='0' and sessionid='".$_POST["sessionid"]."'";
                    // if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='incident-reports.php'><input type=hidden name='id' value='0'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="case_notes.php"){
            $post_date=time();
            $post_date1=strtotime($_POST["date1"]);
            $post_date2=strtotime($_POST["date2"]);
            $noted = str_replace("'", "`", $_POST["note"]);
            
            // $location,$witness1,$address1,$witness2,$address2,$what_happened,$what_preformed,$injury_other,$injury_area_other,$treatment,$treatment_other,$referral,$referred,$firstaid,$sessionid,$suggestion
        	
            $sql = "INSERT INTO casenote (pdate,date1,date2,employeeid,clientid,note,sessionid,status,type) 
            VALUES ('$post_date','$post_date1','$post_date2','".$_POST["employeeid"]."','".$_POST["clientid"]."','$noted','".$_POST["sessionid1"]."','1','".$_POST["casetype"]."')";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('CASE data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','CASE NOTE','0','$sysdate','$ip','1','Added New CASE Note','".$_POST["clientid"]."','".$_POST["employeeid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                $recid=0;
                $sql2 = "SELECT * FROM casenote where sessionid='".$_POST["sessionid1"]."' order by id desc limit 1";
                $rz = $conn->query($sql2);
                if ($rz->num_rows > 0) { while($rowx = $rz->fetch_assoc()) { $recid=$rowx["id"]; } }
                
                if($recid!="0"){
                    foreach ($_FILES['images']['name'] as $key => $name){
                        $rand= rand(10000,99999);
                        $path_parts = pathinfo($name);
                        $extension = $path_parts['extension'];
                        $newFilename = time() . "case$rand." . $extension;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
                        $location = 'media/documents/' . $newFilename;
                        $extension1=strlen("$extension");
                    	if($extension1>=3){
                        	$sql = "INSERT INTO multi_image (uid,postid,location,sessionid,post_date,incident_date,status,source) 
                            VALUES ('".$_COOKIE["userid"]."','$recid','$location','".$_POST["sessionid1"]."','$post_date','0','1','CASE')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                            echo"<script>alert('Update Successfully...')</script>";
                    	}
                    }
                }
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='case-reports.php'><input type=hidden name='id' value='0'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="budgeting.php"){
            $post_date=time();
            $post_date1=strtotime($_POST["date1"]);
            $post_date2=strtotime($_POST["date2"]);
            $noted = str_replace("'", "`", $_POST["note"]);
            
            // $location,$witness1,$address1,$witness2,$address2,$what_happened,$what_preformed,$injury_other,$injury_area_other,$treatment,$treatment_other,$referral,$referred,$firstaid,$sessionid,$suggestion
        	
            $sql = "INSERT INTO budgeting (pdate,date1,date2,projectid,employeeid,clientid,note,sessionid,status,type) 
            VALUES ('$post_date','$post_date1','$post_date2','".$_POST["projectid"]."','".$_POST["employeeid"]."','".$_POST["clientid"]."','$noted','".$_POST["sessionid1"]."','1','".$_POST["budgetlevel"]."')";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Budget data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','BUDGET NOTE','0','$sysdate','$ip','1','Added New BUDGET Note','".$_POST["clientid"]."','".$_POST["employeeid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                $recid=0;
                $sql2 = "SELECT * FROM budgeting where sessionid='".$_POST["sessionid1"]."' order by id desc limit 1";
                $rz = $conn->query($sql2);
                if ($rz->num_rows > 0) { while($rowx = $rz->fetch_assoc()) { $recid=$rowx["id"]; } }
                
                if($recid!="0"){
                    foreach ($_FILES['images']['name'] as $key => $name){
                        $rand= rand(10000,99999);
                        $path_parts = pathinfo($name);
                        $extension = $path_parts['extension'];
                        $newFilename = time() . "case$rand." . $extension;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
                        $location = 'media/documents/' . $newFilename;
                        $extension1=strlen("$extension");
                    	if($extension1>=3){
                        	$sql = "INSERT INTO multi_image (uid,postid,location,sessionid,post_date,incident_date,status,source) 
                            VALUES ('".$_COOKIE["userid"]."','$recid','$location','".$_POST["sessionid1"]."','$post_date','0','1','CASE')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                            echo"<script>alert('Update Successfully...')</script>";
                    	}
                    }
                }
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='budgeting.php'><input type=hidden name='id' value='0'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="complaints.php"){
            $post_date=time();
            $post_date1=strtotime($_POST["date1"]);
            $post_date2=strtotime($_POST["date2"]);
            $noted = str_replace("'", "`", $_POST["note"]);
            
            // $location,$witness1,$address1,$witness2,$address2,$what_happened,$what_preformed,$injury_other,$injury_area_other,$treatment,$treatment_other,$referral,$referred,$firstaid,$sessionid,$suggestion
        	
            $sql = "INSERT INTO complaintnote (pdate,date1,date2,employeeid,clientid,note,sessionid,status,type) 
            VALUES ('$post_date','$post_date1','$post_date2','".$_POST["employeeid"]."','".$_POST["clientid"]."','$noted','".$_POST["sessionid1"]."','1','".$_POST["complainttype"]."')";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('COMPLAINT data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','COMPLAINT NOTE','0','$sysdate','$ip','1','Added New COMPLAINT Note','".$_POST["clientid"]."','".$_POST["employeeid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                $recid=0;
                $sql2 = "SELECT * FROM complaintnote where sessionid='".$_POST["sessionid1"]."' order by id desc limit 1";
                $rz = $conn->query($sql2);
                if ($rz->num_rows > 0) { while($rowx = $rz->fetch_assoc()) { $recid=$rowx["id"]; } }
                
                if($recid!="0"){
                    foreach ($_FILES['images']['name'] as $key => $name){
                        $rand= rand(10000,99999);
                        $path_parts = pathinfo($name);
                        $extension = $path_parts['extension'];
                        $newFilename = time() . "complaint$rand." . $extension;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
                        $location = 'media/documents/' . $newFilename;
                        $extension1=strlen("$extension");
                    	if($extension1>=3){
                        	$sql = "INSERT INTO multi_image (uid,postid,location,sessionid,post_date,incident_date,status,source) 
                            VALUES ('".$_COOKIE["userid"]."','$recid','$location','".$_POST["sessionid1"]."','$post_date','0','1','CASE')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                            echo"<script>alert('Attachment File Uploaded Successfully...')</script>";
                    	}
                    }
                }
                echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='url' value='complaint-reports.php'><input type=hidden name='id' value='0'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["url"]=="complaint-reports.php"){
            $post_date=time();
            $sql = "UPDATE complaintnote SET type='".$_POST["complainttype"]."' WHERE id='".$_POST["cid"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('COMPLAINT data Update Successfully...')</script>";
            
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','COMPLAINT NOTE UPDATE','0','$sysdate','$ip','1','UPDATED COMPLAINT Note to ".$_POST["complainttype"]."','".$_POST["clientid"]."','".$_POST["employeeid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
            }
        }
        
        if($_POST["url"]=="feedback"){
            $post_date=strtotime($_POST["date1"]);
            $sql = "INSERT INTO feedbacknote (pdate,clientid,overall_satisfaction,responsiveness,accommodation_of_needs,professionalism,recommendation_likelihood,status,feedback,comment) 
            VALUES ('$post_date','".$_POST["clientid"]."','".$_POST["overall_satisfaction"]."','".$_POST["responsiveness"]."','".$_POST["accommodation_of_needs"]."','".$_POST["professionalism"]."','".$_POST["recommendation_likelihood"]."','1','".$_POST["feedback"]."','".$_POST["comments"]."')";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Feedback data Updated Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','FEEDBACK NOTE','0','$sysdate','$ip','1','Added New FEEDBACK Note','".$_POST["clientid"]."','1')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                echo"<form method='POST' action='index.php' name='main' target='_top'>
                    <input type=hidden name='smsbd' value='reporting-forms'><input type=hidden name='url' value='feedback-reports'><input type=hidden name='sheba' value='1702357762'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
    }
    
	/*
    	foreach ($_FILES['upload']['name'] as $key => $name){
    		$newFilename = time() . "_" . $name;
    		move_uploaded_file($_FILES['upload']['tmp_name'][$key], 'upload/' . $newFilename);
    		$location = 'upload/' . $newFilename;
    		mysqli_query($conn,"insert into photo (location) values ('$location')");
    	}
    	header('location:index.php');
	*/
?>