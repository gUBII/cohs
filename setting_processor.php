<?php
    echo"<body style='background-color:black'>";
    
        // error_reporting(0);
        date_default_timezone_set("Australia/Melbourne");
        include('include.php');
        $dbname=$_COOKIE['dbname'];
        
        if(isset($_GET["removeimageid"]) && $_GET["removeimageid"]!=0){
            $sql="update uerp_user set images='assets/noimage.png' where id='".$_GET["removeimageid"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                    <input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                </form>";
                ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
            }
        }
        
        
        if($_GET["processor"]=="colorset"){
            $walkthrough=0;
            $sql="update companysetting set walkthrough1='10' where id='1'";
            if ($conn->query($sql) === TRUE){
                echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                    <input type=hidden name='id' value='".$_GET["id"]."'>
                </form>";
                
            }
        }
        
        if($_GET["processor"]=="layoutset"){
            $walkthrough=0;
            $sql="update companysetting set walkthrough2='10' where id='1'";
            if ($conn->query($sql) === TRUE){
                echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                    <input type=hidden name='id' value='".$_GET["id"]."'>
                </form>";
                
            }
        }
        
        if($_POST["processor"]=="newaccount"){
            
            $recid=0;
            $sm1 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
            $rm1 = $conn->query($sm1);
            if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $recid=1; }}
    
            $sm2 = "select * from uerp_user where unbox='".$_POST["email"]."' and ref_db='".$_COOKIE['dbname']."' order by id asc limit 1";
            $rm2 = $conn_main->query($sm2);
            if ($rm2->num_rows > 0) { while($tm2 = $rm2->fetch_assoc()) { $recid=2; }}
            
            if($recid==0){
                $jdate=time();
                $currentpassword="fcea920f7412b5da7be0cf42b8c93759";
                $fname = str_replace("'", "`", $_POST["username"]);
                $lname = str_replace("'", "`", $_POST["username2"]);
                $designation="11";
                if($_POST["designation"]=="USER") $designation=11;
                if($_POST["designation"]=="CLIENT") $designation=17;
                if($_POST["designation"]=="VENDOR") $designation=22;
                if($_POST["designation"]=="ADMIN") $designation=11;
                
                $sql1 = "insert into uerp_user (date,jointime,status,agentid,unbox,passbox,username,username2,designation,phone,email,mtype,ref_db)
                VALUES ('$jdate','$jdate','1','0','".$_POST["email"]."','$currentpassword','$fname','$lname','$designation','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["designation"]."','".$_COOKIE['dbname']."')";
                if ($conn->query($sql1) === TRUE){
                    
                    $lastid=0;
                    $sm1 = "select * from uerp_user order by id desc limit 1";
                    $rm1 = $conn->query($sm1);
                    if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $lastid=$tm1["id"]; }}
                    $sql_main = "insert into uerp_user (uid,date,unbox,passbox,username,username2,phone,email,mtype,ref_db) 
                    VALUES ('$lastid','$jdate','".$_POST["email"]."','$currentpassword','$fname','$lname','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["designation"]."','".$_COOKIE['dbname']."')";
                    if ($conn_main->query($sql_main) === TRUE) echo"<script>alert('Record Saved.')</script>";
                    
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','".$_POST["designation"]." INTAKE','0','$sysdate','$ip','1','Added New ".$_POST["designation"]."','0','$lastid','uerp_user')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    
                    if($_POST["designation"]=="USER") $sql="update companysetting set walkthrough3='10' where id='1'";
                    if($_POST["designation"]=="ADMIN") $sql="update companysetting set walkthrough3='10' where id='1'";
                    if($_POST["designation"]=="CLIENT") $sql="update companysetting set walkthrough4='10' where id='1'";
                    if($_POST["designation"]=="VENDOR") $sql="update companysetting set walkthrough5='10' where id='1'";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
            } else echo"<script>alert('Sorry! This email address is already used.')</script>";
        }
        
        if($_POST["processor"]=="editaccount"){
            
            if(isset($_POST["username"])){
                $sql="update uerp_user set username='".$_POST["username"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                $sql1="update uerp_user set username='".$_POST["username"]."' where id='".$_POST["id"]."' and ref_db='".$_COOKIE['dbname']."'";
                if ($conn_main->query($sql1) === TRUE) $tomtom=0;
            }
            
            if(isset($_POST["username2"])){
                $sql="update uerp_user set username2='".$_POST["username2"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                $sql1="update uerp_user set username2='".$_POST["username2"]."' where id='".$_POST["id"]."' and ref_db='".$_COOKIE['dbname']."'";
                if ($conn_main->query($sql1) === TRUE) $tomtom=0;
            }
            
            if(isset($_POST["phone"])){
                $sql="update uerp_user set phone='".$_POST["phone"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                $sql1="update uerp_user set phone='".$_POST["phone"]."' where id='".$_POST["id"]."' and ref_db='".$_COOKIE['dbname']."'";
                if ($conn_main->query($sql1) === TRUE) $tomtom=0;
            }
            
            if(isset($_POST["designation"])){
                $sql="update uerp_user set mtype='".$_POST["designation"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                $sql1="update uerp_user set mtype='".$_POST["designation"]."' where id='".$_POST["id"]."' and ref_db='".$_COOKIE['dbname']."'";
                if ($conn_main->query($sql1) === TRUE) $tomtom=0;
            }
            
            if(isset($_POST["email"])){
                $recid=0;
                $sm1 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
                $rm1 = $conn->query($sm1);
                if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $recid=1; }}
        
                $sm2 = "select * from uerp_user where unbox='".$_POST["email"]."' and ref_db='".$_COOKIE['dbname']."' order by id asc limit 1";
                $rm2 = $conn_main->query($sm2);
                if ($rm2->num_rows > 0) { while($tm2 = $rm2->fetch_assoc()) { $recid=2; }}
                
                if($recid==0){
                    $sql="update uerp_user set unbox='".$_POST["email"]."', email='".$_POST["email"]."' where id='".$_POST["id"]."'";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                    $sql1="update uerp_user set unbox='".$_POST["email"]."', email='".$_POST["email"]."' where id='".$_POST["id"]."' and ref_db='".$_COOKIE['dbname']."'";
                    if ($conn_main->query($sql1) === TRUE) $tomtom=0;
                } else echo"<script>alert('Sorry! This email address is already used.')</script>";
            }
        }
        
        
        if($_POST["processor"]=="edit_user_image"){
            $extension1=0;
            foreach ($_FILES['images1']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension1 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension1;
                move_uploaded_file($_FILES['images1']['tmp_name'][$key], 'media/company/' . $newFilename);
                $location1 = 'media/company/' . $newFilename;
            }
            
            $extension1=strlen("$extension1");
        	if($extension1>=3){
        	    $sql="update uerp_user set images='$location1' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Profile Image Updated...')</script>";
        	}
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROFILE SETTINGS','0','$sysdate','$ip','1','Changed Profile Image','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                <input type=hidden name='url' value='my_profile.php'><input type=hidden name='id' value='".$_POST["id"]."'>
            </form>";
            ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
        }
        
        
        
        if($_POST["processor"]=="edit_project_sc_image"){
            $extension1=0;
            foreach ($_FILES['images1']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension1 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension1;
                move_uploaded_file($_FILES['images1']['tmp_name'][$key], 'media/project/' . $newFilename);
                $location1 = 'media/project/' . $newFilename;
            }
            
            $extension1=strlen("$extension1");
        	if($extension1>=3){
        	    $sql="update project_sc set image='$location1' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Profile Image Updated...')</script>";
        	}
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','SC CLIENT MAGE','0','$sysdate','$ip','1','Changed SC Client Image','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
        
        
        if($_POST["processor"]=="edit_project_image"){
            $extension1=0;
            foreach ($_FILES['images1']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension1 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension1;
                move_uploaded_file($_FILES['images1']['tmp_name'][$key], 'media/project/' . $newFilename);
                $location1 = 'media/project/' . $newFilename;
            }
            
            $extension1=strlen("$extension1");
        	if($extension1>=3){
        	    $sql="update project set image='$location1' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Profile Image Updated...')</script>";
        	}
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT PROFILE IMAGE','0','$sysdate','$ip','1','Changed Project Profile Image','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
        
        
        if($_POST["processor"]=="edit_s1x"){
            $extension1=0;
            foreach ($_FILES['images1']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension1 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension1;
                move_uploaded_file($_FILES['images1']['tmp_name'][$key], 'media/company/' . $newFilename);
                $location1 = 'media/company/' . $newFilename;
            }
        	$extension1=strlen("$extension1");
        	if($extension1>=3){
        	    $sql="update companysetting set logo_dark='$location1',walkthrough6='10' where id='1'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Image Uploaded & Saved.')</script>";
        	}
        }
        
        if($_POST["processor"]=="edit_s2x"){
            $extension2=0;
            foreach ($_FILES['images2']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension2 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension2;
                move_uploaded_file($_FILES['images2']['tmp_name'][$key], 'media/company/' . $newFilename);
                $location2 = 'media/company/' . $newFilename;
            }
            $extension2=strlen("$extension2");
        	if($extension2>=3){
        	    $sql="update companysetting set logo_light='$location2',walkthrough6='10' where id='1'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Image Uploaded & Saved.')</script>";
        	}
        }
        if($_POST["processor"]=="edit_s3x"){
            $extension3=0;
            foreach ($_FILES['images3']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension3 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension3;
                move_uploaded_file($_FILES['images3']['tmp_name'][$key], 'media/company/' . $newFilename);
                $location3 = 'media/company/' . $newFilename;
            }
            $extension3=strlen("$extension3");
        	if($extension3>=3){
        	    $sql="update companysetting set favicon='$location3',walkthrough6='10' where id='1'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Image Uploaded & Saved.')</script>";
        	}
        }
        if($_POST["processor"]=="edit_s4x"){
            $sql="update companysetting set brand_title='".$_POST["brand_title"]."',walkthrough6='10' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
        }
        if($_POST["processor"]=="edit_s5x"){
            $sql="update companysetting set copyright_title='".$_POST["copyright_title"]."',walkthrough6='10' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
        }
        
        if($_POST["processor"]=="createlead"){
            
            $leadname = str_replace("'", "`", $_POST["lead_name"]);
            $cname = str_replace("'", "`", $_POST["campaignid"]);
            $note = str_replace("'", "`", $_POST["note"]);
            $name = str_replace("'", "`", $_POST["cname"]);
            $address = str_replace("'", "`", $_POST["caddress"]);
            $fdate = strtotime($_POST["fdate"]);
            $tdate = strtotime($_POST["tdate"]);
            $adate = strtotime($_POST["adate"]);
            $date = time();
            
            $data_table=0;
            $campaignidx=0;
            $dt11 = "select * from campaigns where campaign_name='$cname' order by id desc limit 1";
            $dt22 = $conn->query($dt11);
            if ($dt22->num_rows > 0) { while($dt33 = $dt22->fetch_assoc()) { $campaignidx=$dt33["id"]; } }
            if($campaignidx==0){
                $sql = "insert into campaigns (campaign_name,teamleaderid,employeeid,start_date,plan,color,priority,status) 
                VALUES ('$cname','".$_COOKIE["userid"]."','".$_POST["employeeid"]."','$date','$note','#FFFFFF','".$_POST["priority"]."','1')";
                if ($conn->query($sql) === TRUE){            
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $data_table=0;
                    $dt1 = "select * from campaigns order by id desc limit 1";
                    $dt2 = $conn->query($dt1);
                    if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','NEW CAMPAIGN CREATED','0','$sysdate','$ip','1','Added New CAMPAIGN as $cname by ".$_POST["employeeid"]."','".$_POST["employeeid"]."','$data_table','campaigns')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                }
            }else $data_table=$campaignidx;
            
            if($data_table!=0){
                $leadidx=0;
                $dt11x = "select * from leads where lead_name='$leadname' order by id desc limit 1";
                $dt22x = $conn->query($dt11x);
                if ($dt22x->num_rows > 0) { while($dt33x = $dt22x->fetch_assoc()) { $leadidx=$dt33x["id"]; } }
                
                if($leadidx==0){
                    $sql = "insert into leads (lead_name,campaignid,employeeid,date,note,status,name,address,email,phone,followup_date,priority,appointment_date,target_date) 
                    VALUES ('$leadname','$data_table','".$_POST["employeeid"]."','$date','$note','".$_POST["status"]."','$name','$address','".$_POST["cemail"]."','".$_POST["cphone"]."','$fdate','".$_POST["priority"]."','$adate','$tdate')";
                    if ($conn->query($sql) === TRUE){            
                        $sysdate=time();
                        $ip=$_SERVER['REMOTE_ADDR'];
                        $data_table=0;
                        $dt1 = "select * from leads order by id desc limit 1";
                        $dt2 = $conn->query($dt1);
                        if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
                        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                        VALUES ('".$_COOKIE["userid"]."','0','0','NEW LEAD CREATED','0','$sysdate','$ip','1','Added New LEAD as $name by ".$_POST["employeeid"]."','".$_POST["employeeid"]."','$data_table','leads')";
                        if ($conn->query($sql1) === TRUE){
                            echo"<script>alert('New Campaign & Lead Added and Activated.')</script>";
                            $sql="update companysetting set walkthrough7='10' where id='1'";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                    }
                } else echo"<script>alert('Lead with same name was already available.')</script>";
            }
        }
        
        if($_POST["processor"]=="createproject"){
            $sdate=time();
            $edate=time();
            $pname = str_replace("'", "`", $_POST["name"]);
            $pnote = str_replace("'", "`", $_POST["note"]);
            $leaderid = str_replace("'", "`", $_POST["leaderid"]);
            
            $projectidx=0;
            $dt1x = "select * from project where name='$pname' order by id desc limit 1";
            $dt2x = $conn->query($dt1x);
            if ($dt2x->num_rows > 0) { while($dt3x = $dt2x->fetch_assoc()) { $projectidx=$dt3x["id"]; } }
            
            if($projectidx==0){
                $sql = "insert into project (name,clientid,stime,etime,color,rate,rate_type,priority,leaderid,note,status,start_date,end_date,teamleaderid) 
                VALUES ('$pname','".$_POST["clientid"]."','".$_POST["stime"]."','".$_POST["etime"]."','".$_POST["pcolor"]."','".$_POST["rate"]."','".$_POST["type"]."','".$_POST["priority"]."','$leaderid','$pnote','1','$sdate','$edate','".$_POST["teamleaderid"]."')";
                if ($conn->query($sql) === TRUE){
                    
                    $s1 = "select * from project where clientid='".$_POST["clientid"]."' and name='".$_POST["name"]."' and status='1' order by id desc limit 1";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $projid=$rs1["id"]; } }
                    if(isset($projid)){
                        $sql = "insert into shifting_schedule (projectid,stime,etime,status) VALUES ('$projid','".$_POST["stime"]."','".$_POST["etime"]."','1')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
                    
                    $sqlx="update companysetting set walkthrough8='10', walkthrough9='10', walkthrough10='10' where id='1'";
                    if ($conn->query($sqlx) === TRUE) $tomtom=0;
                    
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $data_table=0;
                    $dt1 = "select * from project order by id desc limit 1";
                    $dt2 = $conn->query($dt1);
                    if ($dt2->num_rows > 0) { while($dt3 = $dt2->fetch_assoc()) { $data_table=$dt3["id"]; } }
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','PROJECT INTAKE','0','$sysdate','$ip','1','Added New PROJECT $pname','0','$data_table','project')";
                    if ($conn->query($sql1) === TRUE){
                        $tomtom=0;
                    }
                }
                echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                    <input type=hidden name='id' value='1'>
                </form>";
                ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php    
            } else echo"<script>alert('Project with same name was already available.')</script>";
        }
    
        if($_POST["processor"]=="edit_s1a"){
            $extension1=0;
            foreach ($_FILES['images']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension1 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension1;
                move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/company/' . $newFilename);
                $location = 'media/company/' . $newFilename;
            }
            $extension1=strlen("$extension1");
        	if($extension1>=3){
        	    $sql="update companysetting set logo_dark='$location' where id='1'";
                if ($conn->query($sql) === TRUE){
                    $tomtom=0;
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed Dark Logo','0','0')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                        <input type=hidden name='url' value='settings.php'><input type=hidden name='id' value='5173'>
                    </form>";
                    ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
                }
        	}
        }
        
        if($_POST["processor"]=="edit_s1b"){
            $extension2=0;
            foreach ($_FILES['images']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension2 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension2;
                move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/company/' . $newFilename);
                $location = 'media/company/' . $newFilename;
            }
            $extension2=strlen("$extension2");
        	if($extension2>=3){
        	    $sql="update companysetting set logo_light='$location' where id='1'";
                if ($conn->query($sql) === TRUE){
                    $tomtom=0;
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                        <input type=hidden name='url' value='settings.php'><input type=hidden name='id' value='5173'>
                    </form>";
                    ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
                }
        	}
        	
        	
        }
        
        if($_POST["processor"]=="edit_s1c"){
            $extension3=0;
            foreach ($_FILES['images']['name'] as $key => $name){
                $rand= rand(10000,99999);
                $path_parts = pathinfo($name);
                $extension3 = $path_parts['extension'];
                $newFilename = time() . "$dbname." . $extension3;
                move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/company/' . $newFilename);
                $location = 'media/company/' . $newFilename;
            }
            
        	$extension3=strlen("$extension3");
        	if($extension3>=3){
        	    $sql="update companysetting set favicon='$location' where id='1'";
                if ($conn->query($sql) === TRUE){
                    $tomtom=0;
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    echo"<form name='rosterform' method='get' action='index.php' target='_top' enctype='multipart/form-data'>
                        <input type=hidden name='url' value='settings.php'><input type=hidden name='id' value='5173'>
                    </form>";
                    ?> <script language=JavaScript> document.rosterform.submit(); </script> <?php
                }
        	}
        	
        	
        }
        
        if($_POST["processor"]=="edit_s1"){
            
            $sql="update companysetting set brand_title='".$_POST["brand_title"]."',copyright_title='".$_POST["copyright_title"]."' where id='1'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Record Updated...')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
            }
        }
        
        if($_POST["processor"]=="edit_s2"){
            $register_date=strtotime($_POST["register_date"]);
            $fstartdate=strtotime($_POST["fstartdate"]);
            $fenddate=strtotime($_POST["fenddate"]);
            $expire_date=strtotime($_POST["expire_date"]);
            $sql="update companysetting set ndis_number='".$_POST["ndis_number"]."',abn_number='".$_POST["abn_number"]."',bsb_number='".$_POST["bsb_number"]."',
            ac_number='".$_POST["ac_number"]."',register_date='$register_date',subscription_type='".$_POST["subscription_type"]."',expire_date='$expire_date',
            fstartdate='$fstartdate',fenddate='$fenddate',currencycode='".$_POST["currencycode"]."',currencysymbol='".$_POST["currencysymbol"]."',
            language='".$_POST["language"]."',date_format='".$_POST["date_format"]."',timezone='".$_POST["timezone"]."',time_format='".$_POST["time_format"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        
        if($_POST["processor"]=="edit_s3"){
            $sql="update companysetting set companyname='".$_POST["companyname"]."',firstname='".$_POST["firstname"]."',lastname='".$_POST["lastname"]."',
            gender='".$_POST["gender"]."',registrationnumber='".$_POST["registrationnumber"]."',tinnumber='".$_POST["tinnumber"]."',phone='".$_POST["phone"]."',
            email='".$_POST["email"]."',website='".$_POST["website"]."',address='".$_POST["address"]."',city='".$_POST["city"]."',state='".$_POST["state"]."',
            postalcode='".$_POST["postalcode"]."',country='".$_POST["country"]."',companydetail='".$_POST["companydetail"]."',status='".$_POST["status"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        
        if($_POST["processor"]=="edit_s4"){
            $sql="update companysetting set vouchermode='".$_POST["vouchermode"]."',vatnumber='".$_POST["vatnumber"]."',vatpercentage='".$_POST["vatpercentage"]."',
            cashbook='".$_POST["cashbook"]."',bankbook='".$_POST["bankbook"]."',receive_v='".$_POST["receive_v"]."',payment_v='".$_POST["payment_v"]."',
            journal_v='".$_POST["journal_v"]."',sales_v='".$_POST["sales_v"]."',purchase_v='".$_POST["purchase_v"]."',invoice_prefix='".$_POST["invoice_prefix"]."',
            invoice_note='".$_POST["invoice_note"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        
        if($_POST["processor"]=="edit_s17"){
            $sql="update companysetting set xero_client_id='".$_POST["xero_client_id"]."',xero_client_secret='".$_POST["xero_client_secret"]."',xero_redirect_url='".$_POST["xero_redirect_url"]."',xero_auth_url='".$_POST["xero_auth_url"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        
        
        
        if($_POST["processor"]=="edit_s19"){
            $sql="update companysetting set email_host='".$_POST["email_host"]."',email_smtpauth='".$_POST["email_smtpauth"]."',
            email_smtpport='".$_POST["email_smtpport"]."',email_username='".$_POST["email_username"]."',email_password='".$_POST["email_password"]."',
            email_cc='".$_POST["email_cc"]."',email_bcc='".$_POST["email_bcc"]."',email_subject='".$_POST["email_subject"]."',
            email_body='".$_POST["email_body"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        
        if($_POST["processor"]=="edit_s23"){
            $sql="update companysetting set sms_api_key='".$_POST["sms_api_key"]."',sms_senderid='".$_POST["sms_senderid"]."',sms_type='".$_POST["sms_type"]."',sms_label='".$_POST["sms_label"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        if($_POST["processor"]=="edit_s21"){
            $sql="update companysetting set social_facebook='".$_POST["social_facebook"]."',social_x='".$_POST["social_x"]."',social_linkedin='".$_POST["social_linkedin"]."',social_youtube='".$_POST["social_youtube"]."',social_instagram='".$_POST["social_instagram"]."',social_pinterest='".$_POST["social_pinterest"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        if($_POST["processor"]=="edit_s34"){
            $sql="update companysetting set google_store='".$_POST["google_store"]."',ios_store='".$_POST["ios_store"]."' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        if($_POST["processor"]=="edit_s35"){
            $tomtom="";
            $login_suspended = $_POST["login_suspended"];
            foreach ($login_suspended as $i) {
                $login_suspended = $i;
                $a1='"';
                $a2='"';
                if(strlen($tomtom)>=3) $tomtom="$tomtom,$a1$i$a2";
                else $tomtom="$a1$i$a2";
            }
            $sql="update companysetting set location_access='".$_POST["location_access"]."',camera_access='".$_POST["camera_access"]."',login_suspended='$tomtom' where id='1'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated...')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','COMPANY SETTINGS','0','$sysdate','$ip','1','Changed company setting','0','0')";
        }
        
    echo"</div>";
?>

