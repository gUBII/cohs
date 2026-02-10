<?php

    error_reporting(0);    
    include("include_main.php");
    
    $sysdate=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    
    // account login cookie set.
    if(isset($_POST["uid"])){
        if(isset($_POST["utype"])){
            
            $uidv=$_POST["uid"];
            $utype=$_POST["utype"];
            $samv=$_POST["samv"];
            $db_name=$_POST["dbname"];
            
            unset($_POST["userid"]);
            setcookie("userid", "", time() -9999999);
            unset($_POST["track"]);
            setcookie("track", "", time() -9999999);
            unset($_POST["dbname"]);
            setcookie("dbname", "", time() -9999999);

            setcookie("userid", $uidv, time()+9999999);
            setcookie("track", $utype, time()+9999999);
            setcookie("dbname", $db_name, time()+9999999);
            
            $sql = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('$uidv','0','0','LOGIN','0','$sysdate','$ip','1','$samv ($uidv) Signed in to this Account using IP address: $ip','$uidv','$db_name','uerp_user')";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $conn->close();
            
            echo"<form method='POST' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='modules/ndis_dashboard.php'><input type=hidden name='id' value='5138'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    // account login using mobile app webview cookie set.
    if(isset($_POST["uidm"])){ 
        if(isset($_POST["utypem"])){
            
            $uidv=$_POST["uidm"];
            $utype=$_POST["utypem"];
            $samv=$_POST["samvm"];
            $db_name=$_POST["dbnamem"];
            
            unset($_COOKIE["userid"]);
            setcookie("userid", "", time() -9999999);
            unset($_COOKIE["track"]);
            setcookie("track", "", time() -9999999);
            unset($_COOKIE["dbname"]);
            setcookie("dbname", "", time() -9999999);

            setcookie("userid", $uidv, time()+9999999);
            setcookie("track", $utype, time()+9999999);
            setcookie("dbname", $db_name, time()+9999999);

            $sql = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name,user_agent) 
            VALUES ('$uidv','0','0','LOGIN','0','$sysdate','$ip','1','$samv ($uidv) Signed in to this Account using IP address: $ip','$uidv','$db_name','uerp_user'.'APP')";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $conn->close();         
            
            echo"<span style='font-size:20pt;color:red'>[ $uidv, $utype, $samv, $db_name ]</span>";
        }
    }
    
    // new account registration
    if(isset($_POST["uemail"])){
        if(isset($_POST["logtime"])){
            if(isset($_POST["logip"])){
                
                $uemail=$_POST["uemail"];
                $uemailx=$_POST["uemail"];
                $sourcefrom=$_POST["sourcefrom"];
        
                $ufname = str_replace("'", "`", $_POST["ufname"]);
                $ulname = str_replace("'", "`", $_POST["ulname"]);
                
                // $newdata=str_replace("@","_","$uemail");
                // $newdata=str_replace(".","_","$newdata");
                //$uemail=str_replace("-","_","$newdata");

                $uemail2 = preg_replace('/[^a-zA-Z0-9_ -]/s','_',$uemail);
                $uemail = str_replace( array( '\'', '"', ',' , ';', '<', '>', '@', '.', '-' ), '_', $uemail2);
                
                $randid=rand(10000000,99999999);
                $uemail="saas_$uemail";
                
                // echo" $uemail and $uemailx";
                
                // ADDING DATA TO MAIN DATABASE.
                $sql = "insert into uerp_user (date,unbox,email,passbox,ip,ref_db,status,mtype,username,username2,sourcefrom) 
                VALUES ('$sysdate',\"$uemailx\",\"$uemailx\",'$uemail','$ip','$uemail','0','ADMIN','$ufname','$ulname','$sourcefrom')";
                if ($conn->query($sql) === TRUE){
                    $tomtom=0;
                    $s1 = "select * from uerp_user where unbox=\"$uemailx\" order by id desc limit 1";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $newid=$rs1["id"]; } }
                }
                
                
                // cPanel API credentials
                $cpanelHost = 'https://sg2plmcpnl487069.prod.sin2.secureserver.net:2083'; // cPanel URL, replace with your domain
                $cpanelUser = 'o6gtjuthn6ia'; // Replace with your cPanel username
                $apiToken = 'HR4QGC62J43LYMYAJXLQMSVM1ZLCXKKI'; // Replace with your cPanel API token
                
                // Database details
                $databaseName = "$uemail"; // Desired database name (will be prefixed with your cPanel username)
                $dbUsername = 'saas'; // Desired database username (will be prefixed with your cPanel username)
                $dbPassword = 'Bangladesh$$786'; // Desired database password
                
                // cPanel API URL
                $databaseApiUrl = $cpanelHost . "/execute/Mysql/create_database?name={$databaseName}";
                $dbUserApiUrl = $cpanelHost . "/execute/Mysql/create_user?name={$dbUsername}&password={$dbPassword}";
                $grantPrivilegesUrl = $cpanelHost . "/execute/Mysql/set_privileges_on_database?user={$dbUsername}&database={$databaseName}&privileges=ALL";
                
                // Function to send API requests
                function callCpanelApi($url, $cpanelUser, $apiToken) {
                    $headers = [
                        "Authorization: cpanel $cpanelUser:$apiToken",
                    ];
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    $response = curl_exec($ch);
                    curl_close($ch);
                
                    return json_decode($response, true);
                }
                
                // Create the database
                $responseDatabase = callCpanelApi($databaseApiUrl, $cpanelUser, $apiToken);
                if ($responseDatabase['status'] === 1) {
                    
                    $responseGrant = callCpanelApi($grantPrivilegesUrl, $cpanelUser, $apiToken);
                    if ($responseGrant['status'] === 1)  $tomtom=0;
                    
                    $sourceDbName = 'saas_clone';
                    $destinationDbName = "$uemail";
                    $connection = new PDO('mysql:host=localhost;dbname=' . $sourceDbName, 'saas', 'Bangladesh$$786');

                    $tables = $connection->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
                    $connection->exec("USE {$destinationDbName}");

                    foreach ($tables as $tableName) {
                        $createCommand = $connection->query("SHOW CREATE TABLE `{$sourceDbName}`.`{$tableName}`")->fetchColumn(1);
                        $carefulCreateCommand = str_replace("CREATE TABLE", "CREATE TABLE IF NOT EXISTS", $createCommand);
                        
                        $connection->exec($carefulCreateCommand);
                        // echo "Table `{$tableName}` created" . PHP_EOL;  
                    
                        $connection->exec("INSERT INTO `{$destinationDbName}`.`{$tableName}` SELECT * FROM `{$sourceDbName}`.`{$tableName}`");
                        // echo "Data for table `{$tableName}` copied" . PHP_EOL;
                    }
                        
                    if(isset($_COOKIE["useridx"])){
                        unset($_COOKIE["useridx"]);
                        setcookie("useridx", "", time() -9999999);
                    }
                    setcookie("useridx", "$uemailx", time()+9999999);
                    setcookie("randid", "$randid", time()+9999999);
                    setcookie("firstName", $ufname, time()+9999999);
                    setcookie("lastName", $ulname, time()+9999999);
                    setcookie("sourcefrom", $sourcefrom, time()+9999999);

                    if(isset($_COOKIE["logtime"])){
                        unset($_COOKIE["logtime"]);
                        setcookie("logtime", "", time() -9999999);
                    }
                    setcookie("logtime", $sysdate, time()+9999999);

                    if(isset($_COOKIE["logip"])){
                        unset($_COOKIE["logip"]);
                        setcookie("logip", "", time() -9999999);
                    }
                    setcookie("logip", $ip, time()+9999999);

                    if(isset($_COOKIE["dbnamex"])){
                        unset($_COOKIE["dbnamex"]);
                        setcookie("dbnamex", "", time() -9999999);
                    }
                    setcookie("dbnamex", $uemail, time()+9999999);
                    

                    if(isset($_COOKIE["newid"])){
                        unset($_COOKIE["newid"]);
                        setcookie("newid", "", time() -9999999);
                    }
                    setcookie("newid", $newid, time()+9999999);

                    $connx = new mysqli('localhost', 'saas', 'Bangladesh$$786', "$uemail");
                    if ($connx->connect_error) die("Connection failed: " . $conn->connect_error);
                        
                    $sql = "insert into uerp_user (id,date,unbox,email,passbox,ip,ref_db,status,mtype,username,username2,designation) 
                    VALUES ('1','$sysdate',\"$uemailx\",\"$uemailx\",'$uemail','$ip','$uemail','0','ADMIN','$ufname','$ulname','13')";
                    if ($connx->query($sql) === TRUE) $tomtom=0;

                    $sql2="update companysetting set email=\"$uemailx\" where id='1'";
                    if ($connx->query($sql2) === TRUE) $tomtom=0;

                    echo"<form method='POST' action='register.php' name='main' target='_top'>
                        <input type=hidden name='url' value='register.php'><input type=hidden name='id' value='5138'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                } else {
                    echo "Error creating database: " . $responseDatabase['errors'][0] . "<br>";
                    exit;
                }
            }
        }
    }
    
    // Registraton Gateway
    if(isset($_COOKIE["useridx"])){
        
        $connx = new mysqli('localhost', 'saas', 'Bangladesh$$786', $_COOKIE['dbnamex']);
        if ($connx->connect_error) die("Connection failed: " . $conn->connect_error);

        if(isset($_POST["firstName"])){
            if(isset($_COOKIE["firstName"])){
                unset($_COOKIE["firstName"]);
                setcookie("firstName", "", time() -9999999);
            }
            setcookie("firstName", $_POST["firstName"], time()+9999999);

            $sqlx="update uerp_user set username='".$_POST["firstName"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sqlx) === TRUE) $tomtom=0;
            $sql="update uerp_user set username='".$_POST["firstName"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set firstname='".$_POST["firstName"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            
            $jdate=time();
            $sql = "insert into subscription (cid,plan,jdate,edate,status) VALUES ('".$_COOKIE["dbnamex"]."','0','$jdate','0','1')";
            if ($conn->query($sql) === TRUE) $tomtom=0;
                
        }
        
        if(isset($_POST["lastName"])){
            if(isset($_COOKIE["lastName"])){
                unset($_COOKIE["lastName"]);
                setcookie("lastName", "", time() -9999999);
            }
            setcookie("lastName", $_POST["lastName"], time()+9999999);

            $sql="update uerp_user set username2='".$_POST["lastName"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set username2='".$_POST["lastName"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set lastname='".$_POST["lastName"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["gender"])){
            if(isset($_COOKIE["gender"])){
                unset($_COOKIE["gender"]);
                setcookie("gender", "", time() -9999999);
            }
            setcookie("gender", $_POST["gender"], time()+9999999);

            $sql="update uerp_user set gender='".$_POST["gender"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set gender='".$_POST["gender"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set gender='".$_POST["gender"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["phone"])){
            if(isset($_COOKIE["phone"])){
                unset($_COOKIE["phone"]);
                setcookie("phone", "", time() -9999999);
            }
            setcookie("phone", $_POST["phone"], time()+9999999);

            $sql1="update uerp_user set phone='".$_POST["phone"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            $sql="update uerp_user set phone='".$_POST["phone"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set phone='".$_POST["phone"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["pbox"])){
            if(isset($_COOKIE["pbox"])){
                unset($_COOKIE["pbox"]);
                setcookie("pbox", "", time() -9999999);
            }
            setcookie("pbox", $_POST["pbox"], time()+9999999);
            
            $currentpassword=md5($_POST["pbox"]);
            
            // $currentpassword = password_hash($_POST["pbox"], PASSWORD_BCRYPT);
            
            $sql1="update uerp_user set passbox='$currentpassword',status='1' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            $sql="update uerp_user set passbox='$currentpassword',status='1' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["company_name"])){
            if(isset($_COOKIE["company_name"])){
                unset($_COOKIE["company_name"]);
                setcookie("company_name", "", time() -9999999);
            }
            setcookie("company_name", $_POST["company_name"], time()+9999999);
            $fsdate=time();
            $fedate=date("Y",time());
            $fedate=($fedate+1);
            $fedate="$fedate-07-01";
            $fedate=strtotime($fedate);
            $sql="update uerp_user set store_name='".$_POST["company_name"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set store_name='".$_POST["company_name"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set companyname='".$_POST["company_name"]."',brand_title='".$_POST["company_name"]."',copyright_title='".$_POST["company_name"]." - All Rights Reserved.',fstartdate='$fsdate',fenddate='$fedate',register_date='$fsdate' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["company_address"])){
            if(isset($_COOKIE["company_address"])){
                unset($_COOKIE["company_address"]);
                setcookie("company_address", "", time() -9999999);
            }
            setcookie("company_address", $_POST["company_address"], time()+9999999);

            $sql="update uerp_user set address='".$_POST["company_address"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set address='".$_POST["company_address"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set address='".$_POST["company_address"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["company_city"])){
            if(isset($_COOKIE["company_city"])){
                unset($_COOKIE["company_city"]);
                setcookie("company_city", "", time() -9999999);
            }
            setcookie("company_city", $_POST["company_city"], time()+9999999);

            $sql="update uerp_user set city='".$_POST["company_city"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set city='".$_POST["company_city"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set city='".$_POST["company_city"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["company_state"])){
            echo"im here";
            if(isset($_COOKIE["company_state"])){
                unset($_COOKIE["company_state"]);
                setcookie("company_state", "", time() -9999999);
            }
            setcookie("company_state", $_POST["company_state"], time()+9999999);

            $sql="update uerp_user set area='".$_POST["company_state"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set area='".$_POST["company_state"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set state='".$_POST["company_state"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["company_zip"])){
            if(isset($_COOKIE["company_zip"])){
                unset($_COOKIE["company_zip"]);
                setcookie("company_zip", "", time() -9999999);
            }
            setcookie("company_zip", $_POST["company_zip"], time()+9999999);

            $sql="update uerp_user set zip='".$_POST["company_zip"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set zip='".$_POST["company_zip"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set postalcode='".$_POST["company_zip"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["company_country"])){
            if(isset($_COOKIE["company_country"])){
                unset($_COOKIE["company_country"]);
                setcookie("company_country", "", time() -9999999);
            }
            setcookie("company_country", $_POST["company_country"], time()+9999999);

            $sql="update uerp_user set country='".$_POST["company_country"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update uerp_user set country='".$_POST["company_country"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set country='".$_POST["company_country"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        if(isset($_POST["job_title"])){
            if(isset($_COOKIE["job_title"])){
                unset($_COOKIE["job_title"]);
                setcookie("job_title", "", time() -9999999);
            }
            setcookie("job_title", $_POST["job_title"], time()+9999999);

            $sql="update uerp_user set job_title='".$_POST["job_title"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sql="update companysetting set job_title='".$_POST["job_title"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            
        }
        
        if(isset($_POST["total_employees"])){
            if(isset($_COOKIE["total_employees"])){
                unset($_COOKIE["total_employees"]);
                setcookie("total_employees", "", time() -9999999);
            }
            setcookie("total_employees", $_POST["total_employees"], time()+9999999);

            $sql1="update uerp_user set total_employee='".$_POST["total_employees"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            $sql="update companysetting set total_employee='".$_POST["total_employees"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["purpose"])){
            if(isset($_COOKIE["purpose_of_use"])){
                unset($_COOKIE["purpose_of_use"]);
                setcookie("purpose_of_use", "", time() -9999999);
            }
            setcookie("purpose_of_use", $_POST["purpose"], time()+9999999);

            $sql1="update uerp_user set purpose_of_use='".$_POST["purpose"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            $sql="update companysetting set purpose_of_use='".$_POST["purpose"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["referred_source"])){
            if(isset($_COOKIE["referred_source"])){
                unset($_COOKIE["referred_source"]);
                setcookie("referred_source", "", time() -9999999);
            }
            setcookie("referred_source", $_POST["referred_source"], time()+9999999);

            $sql1="update uerp_user set referred_source='".$_POST["referred_source"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            $sql="update companysetting set referred_source='".$_POST["referred_source"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["application_name"])){
            if(isset($_COOKIE["application_name"])){
                unset($_COOKIE["application_name"]);
                setcookie("application_name", "", time() -9999999);
            }
            setcookie("application_name", $_POST["application_name"], time()+9999999);

            $sql1="update uerp_user set application_id='".$_POST["application_name"]."' where id='".$_COOKIE["newid"]."'";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            $sql="update uerp_user set application_id='".$_POST["application_name"]."' where id='1'";
            if ($conn->query($sql) === TRUE) $tomtom=0;

            $sql="update companysetting set application_id='".$_POST["application_name"]."' where id='1'";
            if ($connx->query($sql) === TRUE) $tomtom=0;

            $sql="update solutions set dashboard='1',orders='1' where id='".$_POST["application_name"]."'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            
            $sql="update solutions set dashboard='0' where id<>'".$_POST["application_name"]."'";
            if ($connx->query($sql) === TRUE) $tomtom=0;
            
            $sql="update solutions set dashboard='1',orders='1',status='1' where id='10006'";
            if ($connx->query($sql) === TRUE){
                $tomx=0;
                $m1 = "select * from modules where parent='10006' order by id asc";
                $m2 = $connx->query($m1);
                if ($m2->num_rows > 0) { while($m3 = $m2->fetch_assoc()) {
                    $sql2="update modules set dashboard='1' where id='".$m3["id"]."'";
                    if ($connx->query($sql2) === TRUE){
                        $m11 = "select * from modules where parent='".$m3["id"]."' order by id asc";
                        $m22 = $connx->query($m11);
                        if ($m22->num_rows > 0) { while($m33 = $m22->fetch_assoc()) {
                            $sql3="update modules set dashboard='1' where id='".$m33["id"]."'";
                            if ($connx->query($sql3) === TRUE){
                                $m111 = "select * from modules where parent='".$m33["id"]."' order by id asc";
                                $m222 = $connx->query($m111);
                                if ($m222->num_rows > 0) { while($m333 = $m222->fetch_assoc()) {
                                    $sql4="update modules set dashboard='1' where id='".$m333["id"]."'";
                                    if ($connx->query($sql4) === TRUE) $tomtom=0;
                                } }
                            }   
                        } }
                    }
                } } 
            }
            
        }
        
        // multi selection format
        if(isset($_POST["module_selection"])){
            
            $module_selection = $_POST["module_selection"];
            
            // $i = implode(',', "$module_selection");
            // $insert = "insert into sub_category(category) values ('".mysqli_real_escape_string($con,$i)."')";
            // $run = mysqli_query($con,$insert);
            if(isset($_COOKIE["module_selection"])){
                unset($_COOKIE["module_selection"]);
                setcookie("module_selection", "", time() -9999999);
            }
            
            $sql = "DELETE FROM `selected_module`";
            if ($connx->query($sql) === TRUE) $tomx=0;

            $tomtom=0;
            foreach ($module_selection as $i) {
                $module_selection = $i;
                $tomtom="$tomtom, $i";
                $sql = "INSERT INTO `selected_module` (clientid,userid,moduleid,status) VALUES ('1','".$_COOKIE["useridx"]."','".mysqli_real_escape_string($connx,$i)."','1')";
                mysqli_query($connx,$sql);
                
                $sql="update modules set dashboard='1' where id='".mysqli_real_escape_string($connx,$i)."'";
                mysqli_query($connx,$sql);
            }
            
            setcookie("module_selection", $tomtom, time()+9999999);
        }

        if(isset($_POST["uid2"])){
            if(isset($_POST["utype2"])){
                
                $uidv=$_POST["uid2"];
                $utype=$_POST["utype2"];
                $samv=$_POST["samv2"];
                $db_name=$_COOKIE["dbnamex"];
                
                if(isset($_COOKIE["userid"])){
                    unset($_POST["userid"]);
                    setcookie("userid", "", time() -9999999);
                }
                setcookie("userid", $uidv, time()+9999999);

                if(isset($_COOKIE["track"])){
                    unset($_POST["track"]);
                    setcookie("track", "", time() -9999999);
                }
                setcookie("track", $utype, time()+9999999);

                if(isset($_COOKIE["dbname"])){
                    unset($_POST["dbname"]);
                    setcookie("dbname", "", time() -9999999);
                }
                setcookie("dbname", $db_name, time()+9999999);

                if(isset($_COOKIE["dbnamex"])){
                    unset($_COOKIE["dbnamex"]);
                    setcookie("dbnamex", "", time() -9999999);
                }                
                if(isset($_COOKIE["useridx"])){
                    unset($_COOKIE["useridx"]);
                    setcookie("useridx", "", time() -9999999);
                }
                if(isset($_COOKIE["logtime"])){
                    unset($_COOKIE["logtime"]);
                    setcookie("logtime", "", time() -9999999);
                }
                if(isset($_COOKIE["logip"])){
                    unset($_COOKIE["logip"]);
                    setcookie("logip", "", time() -9999999);
                }
                if(isset($_COOKIE["firstName"])){
                    unset($_COOKIE["firstName"]);
                    setcookie("firstName", "", time() -9999999);
                }
                if(isset($_COOKIE["lastName"])){
                    unset($_COOKIE["lastName"]);
                    setcookie("lastName", "", time() -9999999);
                }
                if(isset($_COOKIE["phone"])){
                    unset($_COOKIE["phone"]);
                    setcookie("phone", "", time() -9999999);
                }
                if(isset($_COOKIE["pbox"])){
                    unset($_COOKIE["pbox"]);
                    setcookie("pbox", "", time() -9999999);
                }
                if(isset($_COOKIE["rbox"])){
                    unset($_COOKIE["rbox"]);
                    setcookie("rbox", "", time() -9999999);
                }
                if(isset($_COOKIE["company_name"])){
                    unset($_COOKIE["company_name"]);
                    setcookie("company_name", "", time() -9999999);
                }
                if(isset($_COOKIE["company_address"])){
                    unset($_COOKIE["company_address"]);
                    setcookie("company_address", "", time() -9999999);
                }
                if(isset($_COOKIE["company_city"])){
                    unset($_COOKIE["company_city"]);
                    setcookie("company_city", "", time() -9999999);
                }
                if(isset($_COOKIE["company_state"])){
                    unset($_COOKIE["company_state"]);
                    setcookie("company_state", "", time() -9999999);
                }
                if(isset($_COOKIE["company_zip"])){
                    unset($_COOKIE["company_zip"]);
                    setcookie("company_zip", "", time() -9999999);
                }
                if(isset($_COOKIE["country"])){
                    unset($_COOKIE["country"]);
                    setcookie("country", "", time() -9999999);
                }
                if(isset($_COOKIE["job_title"])){
                    unset($_COOKIE["job_title"]);
                    setcookie("job_title", "", time() -9999999);
                }
                if(isset($_COOKIE["total_employees"])){
                    unset($_COOKIE["total_employees"]);
                    setcookie("total_employees", "", time() -9999999);
                }
                if(isset($_COOKIE["purpose"])){
                    unset($_COOKIE["purpose"]);
                    setcookie("purpose", "", time() -9999999);
                }
                if(isset($_COOKIE["application_name"])){
                    unset($_COOKIE["application_name"]);
                    setcookie("application_name", "", time() -9999999);
                }
                if(isset($_COOKIE["referred_source"])){
                    unset($_COOKIE["referred_source"]);
                    setcookie("referred_source", "", time() -9999999);
                }
                if(isset($_COOKIE["module_selection"])){
                    unset($_COOKIE["module_selection"]);
                    setcookie("module_selection", "", time() -9999999);
                }
                if(isset($_COOKIE["company_country"])){
                    unset($_COOKIE["company_country"]);
                    setcookie("company_country", "", time() -9999999);
                }
                if(isset($_COOKIE["gender"])){
                    unset($_COOKIE["gender"]);
                    setcookie("gender", "", time() -9999999);
                }
                if(isset($_COOKIE["purpose_of_use"])){
                    unset($_COOKIE["purpose_of_use"]);
                    setcookie("purpose_of_use", "", time() -9999999);
                }
                if(isset($_COOKIE["randid"])){
                    unset($_COOKIE["randid"]);
                    setcookie("randid", "", time() -9999999);
                }
                if(isset($_COOKIE["newid"])){
                    unset($_COOKIE["newid"]);
                    setcookie("newid", "", time() -9999999);
                }
                if(isset($_COOKIE["chartmode"])){
                    unset($_COOKIE["chartmode"]);
                    setcookie("chartmode", "", time() -9999999);
                }
                
                $viewpoint="DESKTOP";
                $useragent=$_SERVER['HTTP_USER_AGENT'];
                if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
                    $viewpoint="MOBILE";
                }else{
                    $viewpoint="DESKTOP";
                }
                
                $sql = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name,user_agent) 
                VALUES ('$uidv','0','0','LOGIN','0','$sysdate','$ip','1','$samv ($uidv) Signed in to [ $db_name ] system using IP address: $ip using $viewpoint .','0','$db_name','uerp_user','$viewpoint')";
                if ($connx->query($sql) === TRUE) $tomtom=0;
                $connx->close();
                
                if($_COOKIE["sourcefrom"]=="APP" OR $_GET["sourcefrom"]=="APP" OR $_POST["sourcefrom"]=="APP"){
                    ?><script>
                        const userData = {
                            type: 'signup_success',
                            userId: <?php echo json_encode($uidv); ?>,
                            userName: <?php echo json_encode($samv); ?>,
                            ref_db: <?php echo json_encode($db_name); ?>,
                        };
                        window.ReactNativeWebView.postMessage(JSON.stringify(userData));
                    </script><?php
                }else{
                    echo"<form method='POST' action='index.php' name='main' target='_top'>
                        <input type=hidden name='url' value='modules/ndis_dashboard.php'><input type=hidden name='id' value='5138'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }
        }
    }

    // SOLUTIONS SWITCHER
    if($_POST["processor"]=="solutionswitch"){
        $solutionstatus=0;
        $x1 = "select * from solutions where id='".$_POST["id"]."' order by id asc limit 1";
        $x2 = $connx->query($x1);
        if ($x2->num_rows > 0) { while($x12 = $x2->fetch_assoc()) { $solutionstatus=$x12["dashboard"]; } } 
        if($solutionstatus==1) $solutionstatus=0;
        else $solutionstatus=1;

        $sql="update solutions set dashboard='$solutionstatus' where id='".$_POST["id"]."'";
    	if ($connx->query($sql) === TRUE){
    	    
    	    $sql="update modules set dashboard='$solutionstatus' where parent='".$_POST["id"]."'";
            if ($connx->query($sql) === TRUE){
                $tomx=0;
                $m1 = "select * from modules where parent='".$_POST["id"]."' order by id asc";
                $m2 = $connx->query($m1);
                if ($m2->num_rows > 0) { while($m3 = $m2->fetch_assoc()) {
                    
                    $sql2="update modules set dashboard='$solutionstatus' where id='".$m3["id"]."'";
                    if ($connx->query($sql2) === TRUE){
                        $m11 = "select * from modules where parent='".$m3["id"]."' order by id asc";
                        $m22 = $connx->query($m11);
                        if ($m22->num_rows > 0) { while($m33 = $m22->fetch_assoc()) {
                            
                            $sql3="update modules set dashboard='$solutionstatus' where id='".$m33["id"]."'";
                            if ($connx->query($sql3) === TRUE){
                                $m111 = "select * from modules where parent='".$m33["id"]."' order by id asc";
                                $m222 = $connx->query($m111);
                                if ($m222->num_rows > 0) { while($m333 = $m222->fetch_assoc()) {
                                    
                                    $sql4="update modules set dashboard='$solutionstatus' where id='".$m333["id"]."'";
                                    if ($connx->query($sql4) === TRUE) $tomtom=0;
                                } }
                            }   
                        } }
                    }
                } } 
            }
    	} else  echo"<script>alert('Failed...')</script>";
    }
    
    include("scripts.php");
    
?>