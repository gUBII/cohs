<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    include('authenticator.php');
    $dbnamex=$_COOKIE['dbname'];
    
    // echo"<script>alert('Account Successfully Registered. Please login using your email and password.')</script> ";    
    // ,pid,cid,tcost,,participant_name,,,mobile,email,address
    
    if($_POST["processor"]=="agreementdata1"){
        
        $cdob=strtotime($_POST["client_dob"]);
        $project_signed=strtotime($_POST["project_signed"]);
        $project_start=strtotime($_POST["project_start"]);
        $project_end=strtotime($_POST["project_end"]);
        
        $sql="update project set project_signed='$project_signed',start_date='$project_start',end_date='$project_end',transport_cost='".$_POST["transport_cost"]."' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        $sql="update uerp_user set ndis='".$_POST["client_nids"]."',dob='$cdob',representative_name='".$_POST["representative_name"]."' where id='".$_POST["cid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="agreementdata2"){
        
        $sql="update uerp_user set nominee_name='".$_POST["nominee_name"]."',phone='".$_POST["phone_day"]."',phone2='".$_POST["phone_night"]."',mobile='".$_POST["mobile"]."',email='".$_POST["email"]."',address='".$_POST["address"]."' where id='".$_POST["cid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        
    }
    
    if($_POST["processor"]=="agreementdata3"){
        // cpname,cpphone1,cpphone2,cpmobile,cpemail,cpaddress
        $sql="update uerp_user set cp_name='".$_POST["cpname"]."',cp_phone1='".$_POST["cpphone1"]."',cp_phone2='".$_POST["cpphone2"]."',cp_mobile='".$_POST["cpmobile"]."',cp_email='".$_POST["cpemail"]."',cp_address='".$_POST["cpaddress"]."' where id='".$_POST["cid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="agreementdata4"){
        
        $extension1=0;
        foreach ($_FILES['image1']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension1 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension1;
            move_uploaded_file($_FILES['image1']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location1 = 'media/agreement/' . $newFilename;
        }
        
        $extension2=0;
        foreach ($_FILES['image2']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension2 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "smsbd$rand." . $extension2;
            move_uploaded_file($_FILES['image2']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location2 = 'media/agreement/' . $newFilename;
        }
        
        $extension3=0;
        foreach ($_FILES['image3']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension3 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension3;
            move_uploaded_file($_FILES['image3']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location3 = 'media/agreement/' . $newFilename;
        }
        
        $filex=0;
        $filey=0;
        $filez=0;
        
        $sigx=0;
        $sigx=strlen($_POST['signature1']);
        if($sigx>=2400){
            $projectid=$_POST["pid"];
            $folderPath = "media/signature/";
            $image_parts = explode(";base64,", $_POST['signature1']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filex = $folderPath . $projectid . "_" . uniqid() . '.' . $image_type;
            file_put_contents($filex, $image_base64);
            // $filex=strlen($file);
        }
        
        $sigy=0;
        $sigy=strlen($_POST['signature2']);
        if($sigy>=2400){
            $projectid=$_POST["pid"];
            $folderPath = "media/signature/";
            $image_parts = explode(";base64,", $_POST['signature2']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filey = $folderPath . $projectid . "_" . uniqid() . '.' . $image_type;
            file_put_contents($filey, $image_base64);
            // $filex=strlen($file);
        }
        
        $sigz=0;
        $sigz=strlen($_POST['signature3']);
        if($sigz>=2400){
            $projectid=$_POST["pid"];
            $folderPath = "media/signature/";
            $image_parts = explode(";base64,", $_POST['signature3']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filez = $folderPath . $projectid . "_" . uniqid() . '.' . $image_type;
            file_put_contents($filez, $image_base64);
            // $filex=strlen($file);
        }
        
        
        
        if($sigx>=2400){
            $sql="update uerp_user set signature1='$filex' where id='".$_POST["cid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 1 Updated')</script>";
        }
        if($sigy>=2400){
            $sql="update uerp_user set signature2='$filey' where id='".$_POST["cid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 2 Updated')</script>";
        }
        if($sigz>=2400){
            $sql="update uerp_user set signature3='$filez' where id='".$_POST["cid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 3 Updated')</script>";
        }
        
        $extension1=strlen("$extension1");
    	if($extension1>=3){
            $sql="update project set image1='$location1' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Image 1 Updated')</script>";
        }
        $extension2=strlen("$extension2");
    	if($extension2>=3){
            $sql="update project set image2='$location2' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Image 2 Updated')</script>";
        }
        $extension3=strlen("$extension3");
    	if($extension3>=3){
            $sql="update project set image3='$location3' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Image 3 Updated')</script>";
        }
        
        if($sigx>=5){
            $sql="update project set signature1='$filex',image2='0' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 1/3 Updated')</script>";
        }
        if($sigy>=5){
            $sql="update project set signature2='$filey',image2='0' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 2/3 Updated')</script>";
        }
        if($sigz>=5){
            $sql="update project set signature3='$filez',image3='0' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 3/3 Updated')</script>";
        }
        
        echo"<script>alert('Signature Updated.')</script>";
        
    }
    
    if($_POST["processor"]=="agreementdata"){
        
        $extension1=0;
        foreach ($_FILES['image1']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension1 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension1;
            move_uploaded_file($_FILES['image1']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location1 = 'media/agreement/' . $newFilename;
        }
        
        $extension2=0;
        foreach ($_FILES['image2']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension2 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension2;
            move_uploaded_file($_FILES['image2']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location2 = 'media/agreement/' . $newFilename;
        }
        
        $extension3=0;
        foreach ($_FILES['image3']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension3 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension3;
            move_uploaded_file($_FILES['image3']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location3 = 'media/agreement/' . $newFilename;
        }
        
        $filex=0;
        $filey=0;
        $filez=0;
        
        $sigx=0;
        $sigx=strlen($_POST['signature1']);
        if($sigx>=5){
            $projectid=$_POST["pid"];
            $folderPath = "media/signature/";
            $image_parts = explode(";base64,", $_POST['signature1']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filex = $folderPath . $projectid . "_" . uniqid() . '.' . $image_type;
            file_put_contents($filex, $image_base64);
            // $filex=strlen($file);
        }
        
        $sigy=0;
        $sigy=strlen($_POST['signature2']);
        if($sigy>=5){
            $projectid=$_POST["pid"];
            $folderPath = "media/signature/";
            $image_parts = explode(";base64,", $_POST['signature2']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filey = $folderPath . $projectid . "_" . uniqid() . '.' . $image_type;
            file_put_contents($filey, $image_base64);
            // $filex=strlen($file);
        }
        
        $sigz=0;
        $sigz=strlen($_POST['signature3']);
        if($sigz>=5){
            $projectid=$_POST["pid"];
            $folderPath = "media/signature/";
            $image_parts = explode(";base64,", $_POST['signature3']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filez = $folderPath . $projectid . "_" . uniqid() . '.' . $image_type;
            file_put_contents($filez, $image_base64);
            // $filex=strlen($file);
        }
        
        $cdob=strtotime($_POST["client_dob"]);
        $project_signed=strtotime($_POST["project_signed"]);
        $project_start=strtotime($_POST["project_start"]);
        $project_end=strtotime($_POST["project_end"]);
        
        $sql="update uerp_user set ndis='".$_POST["client_nids"]."',dob='$cdob',representative_name='".$_POST["representative_name"]."',nominee_name='".$_POST["nominee_name"]."',phone='".$_POST["phone_day"]."',phone2='".$_POST["phone_night"]."',mobile='".$_POST["mobile"]."',
        email='".$_POST["email"]."',address='".$_POST["address"]."',cp_name='".$_POST["cpname"]."',cp_phone1='".$_POST["cpphone1"]."',cp_phone2='".$_POST["cpphone2"]."',cp_mobile='".$_POST["cpmobile"]."',cp_email='".$_POST["cpemail"]."',cp_address='".$_POST["cpaddress"]."' 
        where id='".$_POST["cid"]."'";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Client Record Updated.')</script> ";
            if($sigx>=5){
                $sql="update uerp_user set signature1='$filex' where id='".$_POST["cid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                // echo"<script>alert('Signatre 1 Updated')</script>";
            }
            if($sigy>=5){
                $sql="update uerp_user set signature2='$filey' where id='".$_POST["cid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                // echo"<script>alert('Signatre 2 Updated')</script>";
            }
            if($sigz>=5){
                $sql="update uerp_user set signature3='$filez' where id='".$_POST["cid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                // echo"<script>alert('Signatre 3 Updated')</script>";
            }
        }
        
        $sql="update project set project_signed='$project_signed',start_date='$project_start',end_date='$project_end',transport_cost='".$_POST["transport_cost"]."' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        //  echo"<script>alert('Project Updated')</script>";
        
        $extension1=strlen("$extension1");
    	if($extension1>=3){
            $sql="update project set image1='$location1' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Image 1 Updated')</script>";
        }
        $extension2=strlen("$extension2");
    	if($extension2>=3){
            $sql="update project set image2='$location2' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Image 2 Updated')</script>";
        }
        $extension3=strlen("$extension3");
    	if($extension3>=3){
            $sql="update project set image3='$location3' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Image 3 Updated')</script>";
        }
        
        if($sigx>=5){
            $sql="update project set signature1='$filex' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 1/3 Updated')</script>";
        }
        if($sigy>=5){
            $sql="update project set signature2='$filey' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 2/3 Updated')</script>";
        }
        if($sigz>=5){
            $sql="update project set signature3='$filez' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            // echo"<script>alert('Signatre 3/3 Updated')</script>";
        }
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','SERVICE AGREEMENT','0','$sysdate','$ip','1','Service Agreement Updated','".$_POST["cid"]."','".$_POST["pid"]."','project')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        echo"<form method='get' action='index.php' name='main' target='_top'>
            <input type=hidden name='$dbnamex' value='client-service-agreement'>
            <input type=hidden name='projectid' value='".$_POST["pid"]."'>
            <input type=hidden name='clientid' value='".$_POST["cid"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
        
    }
    
    if($_POST["processor"]=="categorydata"){
        $cdate=strtotime($_POST["cdate"]);
        $cname = str_replace("'", "`", $_POST["cname"]);
        $contact = str_replace("'", "`", $_POST["contact"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $randid=time();
        	
        $sql = "INSERT INTO project_forms (uid,projectid,categoryid,cname,contact,date,type,note,randid,status) 
        VALUES ('".$_COOKIE["userid"]."','".$_COOKIE["projectidx"]."','".$_POST["id"]."','$cname','$contact','$cdate','".$_POST["processor1"]."','$note','$randid','1')";
        if ($conn->query($sql) === TRUE){
            $recid=0;
            $sql = "SELECT * FROM project_forms where randid='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/clientprofile/' . $newFilename);
            		$location = 'media/clientprofile/' . $newFilename;
            		$extension1=strlen("$extension");
                    if($extension1>=3){
                		$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','COMMUNICATION BOOK')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
            	}
            }
            echo"<script>alert('Data Stored Successfully.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','CB CATEGORY DATA','".$_POST["id"]."','$sysdate','$ip','1','Added Category Multi Data','".$_COOKIE["userid"]."','".$_COOKIE["projectidx"]."','project_forms')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
        }
    }
    
    if($_POST["processor"]=="categorydatasc"){
        $cdate=strtotime($_POST["cdate"]);
        $cname = str_replace("'", "`", $_POST["cname"]);
        $contact = str_replace("'", "`", $_POST["contact"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $randid=time();
        	
        $sql = "INSERT INTO project_sc_forms (uid,projectid,categoryid,cname,contact,date,type,note,randid,status) 
        VALUES ('".$_COOKIE["userid"]."','".$_COOKIE["projectidsc"]."','".$_POST["id"]."','$cname','$contact','$cdate','".$_POST["processor1"]."','$note','$randid','1')";
        if ($conn->query($sql) === TRUE){
            $recid=0;
            $sql = "SELECT * FROM project_sc_forms where randid='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/clientprofile/' . $newFilename);
            		$location = 'media/clientprofile/' . $newFilename;
            		$extension1=strlen("$extension");
                    if($extension1>=3){
                        $sql = "INSERT INTO project_sc_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','COMMUNICATION BOOK OF SC')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
            	}
            }
            echo"<script>alert('Data Stored Successfully.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','SUPPORT CO-ORDINATOR CATEGORY DATA','".$_POST["id"]."','$sysdate','$ip','1','Added Category Multi Data by support co-ordinator','".$_COOKIE["userid"]."','".$_COOKIE["projectidx"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
    }
    
    if($_POST["processor"]=="category"){
        $tx=0;
        $sql2 = "SELECT * FROM project_category where category='".$_POST["category"]."' order by id desc limit 1";
        $rz = $conn->query($sql2);
        if ($rz->num_rows > 0) { while($rowx = $rz->fetch_assoc()) { $tx=$rowx["id"]; } }
        if($tx==0){
            $datez=strtotime($_POST["date"]);
            $sql = "insert into project_category (category,sorder,status,date) VALUES ('".$_POST["category"]."','".$_POST["sorder"]."','1','$datez')";
            if ($conn->query($sql) === TRUE){
                $tomtom=0;
                echo"<script>alert('New Category Created')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $catid=0;
                $sql2 = "SELECT * FROM project_category order by id desc limit 1";
                $rz = $conn->query($sql2);
                if ($rz->num_rows > 0) { while($rowx = $rz->fetch_assoc()) { $catid=$rowx["id"]; } }
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT CATEGORY','0','$sysdate','$ip','1','Added Project Category - ".$_POST["category"]."','0','$catid','project_category')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
            }
        }else{
            echo"<script>alert('Same record was already Saved.')</script>";
        }
    }
    
    if($_POST["processor"]=="categorysc"){
        $sql = "insert into project_sc_category (category,sorder,status) VALUES ('".$_POST["category"]."','".$_POST["sorder"]."','1')";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('New Category Created')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','SUPPORT CO-ORDINATOR CATEGORY','0','$sysdate','$ip','1','Added Support Co-ordinator Category - ".$_POST["category"]."','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
        }
    }
    
    if($_POST["processor"]=="HoursNote"){
        $datex=strtotime($_POST["datex"]);
        $timex=$_POST["timex"];
        $timey=$_POST["timey"];
        $sql = "insert into project_sc_hour_note (projectid,hours,datex,timex,timey,task,other) 
        VALUES ('".$_POST["projectid"]."','".$_POST["hourx"]."','$datex','$timex','$timey','".$_POST["task"]."','".$_POST["other"]."')";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('New Hour Spent Note Added')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','SUPPORT CO-ORDINATOR HOUR NOTE','0','$sysdate','$ip','1','Added Support Co-ordinator Hour Hote - ".$_POST["category"]."','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='projectsc'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    if($_POST["processor"]=="CaseNote"){
        $post_date=time();
        $post_date1=strtotime($_POST["date1"]);
        $post_date2=strtotime($_POST["date2"]);
        $noted = str_replace("'", "`", $_POST["note"]);
        	
        $sql = "INSERT INTO casenotesc (pdate,date1,date2,employeeid,clientid,note,sessionid,status,type) 
        VALUES ('$post_date','$post_date1','$post_date2','".$_POST["reporter"]."','".$_POST["projectid"]."','$noted','".$_POST["sessionid1"]."','1','".$_POST["casetype"]."')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('CASE data Update Successfully...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','CASE NOTE SUPPORT CO-ORDINATOR','0','$sysdate','$ip','1','Added New CASE Note by Support Co-Ordinator','".$_POST["clientid"]."','".$_POST["employeeid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                $recid=0;
                $sql2 = "SELECT * FROM casenotesc where sessionid='".$_POST["sessionid1"]."' order by id desc limit 1";
                $rz = $conn->query($sql2);
                if ($rz->num_rows > 0) { while($rowx = $rz->fetch_assoc()) { $recid=$rowx["id"]; } }
                
                if($recid!="0"){
                    foreach ($_FILES['images']['name'] as $key => $name){
                        $rand= rand(10000,99999);
                        $path_parts = pathinfo($name);
                        $extension = $path_parts['extension'];
                        $newFilename = time() . "$dbnamex." . $extension;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
                        $location = 'media/documents/' . $newFilename;
                        $extension1=strlen("$extension");
                    	if($extension1>=3){
                        	$sql = "INSERT INTO multi_image (uid,postid,location,sessionid,post_date,incident_date,status,source) 
                            VALUES ('".$_COOKIE["userid"]."','$recid','$location','".$_POST["sessionid1"]."','$post_date','0','1','CASE')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                            echo"<script>alert('Image Updated Successfully...')</script>";
                    	}
                    }
                }
                echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='projectsc'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        
        
    
    if($_POST["processor"]=="teamleadersetup1"){
        $sql="update project_team_allocation set employeeid='".$_POST["employeeid"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT UPDATE','0','$sysdate','$ip','1','Assigned Support Worker in PROJECT','0','".$_POST["id"]."','project_team_allocation')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="teamleadersetup11"){
        $sql="update project_sc_team_allocation set employeeid='".$_POST["employeeid"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT SC UPDATE','0','$sysdate','$ip','1','Assigned Support Worker in PROJECT SC','0','".$_POST["id"]."','project_sc_team_allocation')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="teamleadersetup3"){
        $sql="update project_team_allocation set position='".$_POST["position"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT UPDATE','0','$sysdate','$ip','1','Assigned Support Worker Position in PROJECT','0','".$_POST["id"]."','project_team_allocation')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="teamleadersetup33"){
        $sql="update project_sc_team_allocation set position='".$_POST["position"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT SC UPDATE','0','$sysdate','$ip','1','Assigned Support Worker Position in PROJECT SC','0','".$_POST["id"]."','project_team_allocation')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="teamleadersetup4"){
        $sql="update project_team_allocation set status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script> ";
    }
    
    if($_POST["processor"]=="teamleadersetup44"){
        $sql="update project_sc_team_allocation set status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script> ";
    }
    
    
    if($_POST["processor"]=="adminuserclient"){
        $dnow=time();
        $sql = "insert into project_team_allocation (projectid,employeeid,position,date,status) VALUES ('".$_POST["src_client"]."','".$_POST["src_user"]."','1','$dnow','1')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('User Assigned.')</script>";    
    }
    
    if($_POST["processor"]=="agreementlist"){
        $sql = "insert into service_agreement_addon (description,ndis_item,unit,price,qty,comments,status,projectid,clientid) VALUES 
        ('".$_POST["description"]."','".$_POST["ndis_item"]."','".$_POST["unit"]."','".$_POST["price"]."','".$_POST["qty"]."','".$_POST["comments"]."','1','".$_POST["pid"]."','".$_POST["cid"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Updated')</script>";    
    }
    
    if($_POST["processor"]=="editagreementlist"){
        $sql="update service_agreement_addon set 
        description='".$_POST["description"]."',ndis_item='".$_POST["ndis_item"]."',unit='".$_POST["unit"]."',
        price='".$_POST["price"]."',qty='".$_POST["qty"]."',comments='".$_POST["comments"]."',status='1',
        projectid='".$_POST["pid"]."',clientid='".$_POST["cid"]."' where id='".$_POST["sid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Service Agreement Addon Updated')</script>";    
    }
    
    if($_POST["processor"]=="tasklist"){
        $datex=strtotime($_POST["date"]);
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $randid=time();
        $sql = "insert into tasks (employeeid,clientid,date,title,detail,priority,image,tdate) VALUES ('".$_POST["employeeid"]."','".$_POST["clientid"]."','$datex','$title','$detail','".$_POST["priority"]."','$randid','$randid')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Task Assigned')</script>";
            $recid=0;
            $sql = "SELECT * FROM tasks where image='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                $extension=0;
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
                    
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/tasks/' . $newFilename);
            		$location = 'media/tasks/' . $newFilename;
            		$extension1=strlen("$extension");
            		if($extension1>=3){
                		$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','TASK MANAGER')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
            		}
            	}
            }
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','TASK','".$_POST["priority"]."','$sysdate','$ip','1','New Task Assigned on $title','".$_POST["employeeid"]."','".$_POST["clientid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            
            // echo"<script>alert('Notification Sent to User')</script>";
            $sx1 = "select * from uerp_user where id='".$_POST["employeeid"]."' order by id asc limit 1";
            $rx1 = $conn->query($sx1);
            if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
                $employeename="";
                $employeename="".$ry1["username"]." ".$ry1["username2"]."";
                $semail="";
                $semail=$ry1["email"];
            } }
            
            $sx2 = "select * from uerp_user where id='".$_POST["clientid"]."' order by id asc limit 1";
            $rx2 = $conn->query($sx2);
            if ($rx2->num_rows > 0) { while($ry2 = $rx2->fetch_assoc()) {
                $clientname="";
                $clientname="".$ry2["username"]." ".$ry2["username2"]."";
            } }
            echo"<form name='rosterform' method='post' action='email_task.php' target='_self' enctype='multipart/form-data'>
                <input type=hidden name='processor' value='tasks_manager'><input type=hidden name='sdate' value='$datex'>
                <input type=hidden name='employeename' value='$employeename'><input type=hidden name='clientname' value='$clientname'>
                <input type=hidden name='semail' value='$semail'>
            </form>";
            ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
        }
    }
    
    if($_POST["processor"]=="personaltask"){
        $datex=strtotime($_POST["date"]);
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $randid=time();
        $sql = "insert into tasks2 (employeeid,clientid,date,title,detail,priority,image,tdate) VALUES ('".$_POST["employeeid"]."','".$_POST["clientid"]."','$datex','$title','$detail','".$_POST["priority"]."','$randid','$randid')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Self Task Assigned')</script>";
            $recid=0;
            $sql = "SELECT * FROM tasks2 where image='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                $extension=0;
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
                    
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/tasks/' . $newFilename);
            		$location = 'media/tasks/' . $newFilename;
            		$extension1=strlen("$extension");
            		if($extension1>=3){
                    	$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','SELF TASK MANAGER')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
            		}
            	}
            }
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','TASK','".$_POST["priority"]."','$sysdate','$ip','1','New Self Task Assigned on $title','".$_POST["employeeid"]."','".$_POST["clientid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='my-tasks'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    if($_POST["processor"]=="personaltasksc"){
        $datex=strtotime($_POST["date"]);
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $randid=time();
        $sql = "insert into tasks2sc (employeeid,clientid,date,title,detail,priority,image,tdate) 
        VALUES ('".$_POST["employeeid"]."','".$_POST["projectid"]."','$datex','$title','$detail','".$_POST["priority"]."','$randid','$randid')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Self Task Assigned')</script>";
            $recid=0;
            $sql = "SELECT * FROM tasks2sc where image='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                $extension=0;
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
                    
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/tasks/' . $newFilename);
            		$location = 'media/tasks/' . $newFilename;
            		$extension1=strlen("$extension");
            		if($extension1>=3){
                    	$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$date','1','SUPPORT CO-ORDINATOR TASK MANAGER')";
                        if ($conn->query($sql) === TRUE) $tomtom=0; 
            		}
            	}
            }
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','TASK SUPPORT CO-ORDINATOR','".$_POST["priority"]."','$sysdate','$ip','1','New Self Task Assigned on $title by Support Co-ordinator','".$_POST["employeeid"]."','".$_POST["clientid"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='projectsc'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    
    if($_POST["processor"]=="GenerateInvoice"){
        $date=strtotime($_POST["date"]);
        $date1=strtotime($_POST["date1"]);
        $date2=strtotime($_POST["date2"]);
        $frequency = str_replace("'", "`", $_POST["frequency"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $randid=time();
        $sql = "insert into casenotesc_invoice (cid,pid,nid,date,date_from,date_to,line_item_number,frequency,rate,note,status) 
        VALUES ('".$_POST["reporter"]."','".$_POST["projectid"]."','".$_POST["nid"]."','$date','$date1','$date2','".$_POST["line_item_number"]."','$frequency','".$_POST["rate"]."','$note','1')";
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Invoice Generated')</script>";
            echo"<form method='get' action='support_coordinator_invoice.php' name='main' target='_self'>
            <input type=hidden name='projectid' value='".$_COOKIE["projectidsc"]."'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
?> 

