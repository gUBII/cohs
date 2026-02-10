<?php
    error_reporting(0);
    include('include.php');
    
    $dbnamex=$_COOKIE['dbname'];
    
    date_default_timezone_set("Asia/Dhaka");
    
    if(isset($_POST["processor"])){
        if($_POST["processor"]=="budget_project_select"){
            
            setcookie("b_project", $_POST["b_project"], time()+9999999);
            
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type='hidden' name='url' value='".$_POST["url"]."'>
                <input type='hidden' name='id' value='".$_POST["id"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    if($_POST["processor"]=="quotation_update"){
        
        $name = str_replace("'", "`", $_POST["name"]);
        $ndis = str_replace("'", "`", $_POST["ndis"]);
        $email = str_replace("'", "`", $_POST["email"]);
        $phone = str_replace("'", "`", $_POST["phone"]);
        $address = str_replace("'", "`", $_POST["address"]);
        $city = str_replace("'", "`", $_POST["city"]);
        $state = str_replace("'", "`", $_POST["state"]);
        $zip = str_replace("'", "`", $_POST["zip"]);
        $country = str_replace("'", "`", $_POST["country"]);
        
        $sql="update quotes set name='$name',ndis='$ndis',email='$email',phone='$phone',address='$address',city='$city',state='$state',zip='$zip',country='$country' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        
    }
    
    if($_POST["processor"]=="quotation_status_update"){
        $sql="update quotes set status='1' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            echo"<form method='get' action='index.php' name='main' target='_top'><input type='hidden' name='url' value='quotation_manager.php'><input type='hidden' name='id' value='5332'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    
    
    
    if($_POST["processor"]=="categorized_budgeting"){
        
        $capital=($_POST["cat5"]+$_POST["cat6"]+$_POST["sda"]);
        $core=($_POST["cat1"]+$_POST["cat2"]+$_POST["cat3"]+$_POST["cat4"]);
        $capacity=($_POST["cat7"]+$_POST["cat8"]+$_POST["cat9"]+$_POST["cat10"]+$_POST["cat11"]+$_POST["cat12"]+$_POST["cat13"]+$_POST["cat14"]+$_POST["cat15"]);
        
        $sql="update project set capital='$capital',cat5='".$_POST["cat5"]."',cat6='".$_POST["cat6"]."',sda='".$_POST["sda"]."',core='$core',
        cat1='".$_POST["cat1"]."',cat2='".$_POST["cat2"]."',cat3='".$_POST["cat3"]."',cat4='".$_POST["cat4"]."',capacity='$capacity',
        cat7='".$_POST["cat7"]."',cat8='".$_POST["cat8"]."',cat9='".$_POST["cat9"]."',cat10='".$_POST["cat10"]."',cat11='".$_POST["cat11"]."',
        cat12='".$_POST["cat12"]."',cat13='".$_POST["cat13"]."',cat14='".$_POST["cat14"]."',cat15='".$_POST["cat15"]."' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            $s1 = "select * from project_budget where projectid='".$_POST["pid"]."' order by id desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) { $tomtom=1; } } 
            if($tomtom==0){
                $sql = "insert into project_budget (projectid,capital,core,capacity,cat1,cat2,cat3,cat4,cat5,cat6,cat7,cat8,cat9,cat10,cat11,cat12,cat13,cat14,cat15,cat16,cat17,cat18,cat19,cat20,date,status) 
                VALUES ('".$_POST["pid"]."','$capital','$core','$capacity','".$_POST["cat1"]."','".$_POST["cat2"]."','".$_POST["cat3"]."',
                '".$_POST["cat4"]."','".$_POST["cat5"]."','".$_POST["cat6"]."','".$_POST["cat7"]."','".$_POST["cat8"]."','".$_POST["cat9"]."',
                '".$_POST["cat10"]."','".$_POST["cat11"]."','".$_POST["cat12"]."','".$_POST["cat13"]."','".$_POST["cat14"]."','".$_POST["cat15"]."',
                '".$_POST["cat16"]."','".$_POST["cat17"]."','".$_POST["cat18"]."','".$_POST["cat19"]."','".$_POST["cat20"]."','1')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }else{
                $sql="update project_budget set projectid='".$_POST["pid"]."',capital='".$_POST["capital"]."',core='".$_POST["core"]."',
                capacity='".$_POST["capacity"]."',cat1='".$_POST["cat1"]."',cat2='".$_POST["cat2"]."',cat3='".$_POST["cat3"]."',
                cat4='".$_POST["cat4"]."',cat5='".$_POST["cat5"]."',cat6='".$_POST["cat6"]."',cat7='".$_POST["cat7"]."',cat8='".$_POST["cat8"]."',
                cat9='".$_POST["cat9"]."',cat10='".$_POST["cat10"]."',cat11='".$_POST["cat11"]."',cat12='".$_POST["cat12"]."',
                cat13='".$_POST["cat13"]."',cat14='".$_POST["cat14"]."',cat15='".$_POST["cat15"]."',cat16='".$_POST["cat16"]."',
                cat17='".$_POST["cat17"]."',cat18='".$_POST["cat18"]."',cat19='".$_POST["cat19"]."',cat20='".$_POST["cat20"]."',
                status='1' where id='".$_POST["pid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            // echo"<script>alert('New Budget Assigned.')</script>";
        }
    }
    
    if(isset($_GET["processor"])){
        if($_GET["processor"]=="StatusSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set status='".$_GET["status"]."' where id='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Status Record Updated.')</script>";
        }
    }
    
    if(isset($_GET["processor"])){
        if($_GET["processor"]=="GlobalSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set ".$_GET["sid1"]."='".$_GET["status"]."' where ".$_GET["sid"]."='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('".$_GET["sid1"]." Updated.')</script>";
        }
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT"){
        
        // name,clientid,start_date,end_date,stime,etime,rate,rate_type,priority,leaderid,note,color,status,teamleaderid
        // name,clientid,teamleaderid,leaderid,sdate,edate,stime,etime,pcolor,priority,note
        
        $pname = str_replace("'", "`", $_POST["name"]);
        $pnote = str_replace("'", "`", $_POST["note"]);
        if(strlen($_POST["sdate"])>=3) $sdate=strtotime($_POST["sdate"]);
        else $sdate=time();
        if(strlen($_POST["edate"])>=3) $edate=strtotime($_POST["edate"]);
        else $edate=time();
        
        // stime='".$_POST["stime"]."',etime='".$_POST["etime"]."',
        if($_POST["managed_by"]=="NDIA Managed") $teamleaderid=$_POST["teamleaderid1"];
        if($_POST["managed_by"]=="PLAN Managed") $teamleaderid=$_POST["teamleaderid2"];
        if($_POST["managed_by"]=="CARE Managed") $teamleaderid=$_POST["teamleaderid4"];
        if($_POST["managed_by"]=="SELF Managed") $teamleaderid=$_POST["teamleaderid3"];
        if($_POST["managed_by"]=="PACE-NDIA Managed") $teamleaderid=$_POST["teamleaderid5"];
        if($_POST["managed_by"]=="PACE-PLAN Managed") $teamleaderid=$_POST["teamleaderid6"];
        
        // echo"<script>alert('".$_POST["managed_by"]." - $teamleaderid')</script>";
        $sql="update project set name='$pname',start_date='$sdate',end_date='$edate',priority='".$_POST["priority"]."',note='$pnote',
        color='".$_POST["pcolor"]."',sc_name='".$_POST["sc_name"]."',sc_phone='".$_POST["sc_phone"]."',start_date1='$sdate',end_date1='$edate',
        managed_by='".$_POST["managed_by"]."',leaderid='".$_POST["leaderid"]."',teamleaderid='$teamleaderid' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            $s1 = "select * from project_schedules where pid='".$_POST["pid"]."' order by id desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) { $tomtom=1; } }
            if($tomtom==0){
                $s1x = "select * from project where id='".$_POST["pid"]."' order by id desc limit 1";
                $r1x = $conn->query($s1x);
                if ($r1x->num_rows > 0) { while($t1x = $r1x->fetch_assoc()) { $cid=$t1x["clientid"]; } }
                $sql = "insert into project_schedules (pid,cid,eid,package,start,end,status) 
                VALUES ('".$_POST["pid"]."','$cid','$teamleaderid','".$_POST["managed_by"]."','$sdate','$edate','1')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
        }
        // echo"<script>alert('UPDATED')</script>";
        
    }
    
    if($_POST["processor"]=="new_workspace_PROJECTX"){
        $sql="update project set managed_by='".$_POST["managed_by"]."' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        $sqlx="update uerp_user set pm_name='".$_POST["pm_name"]."',pm_mobile='".$_POST["pm_mobile"]."',
        pm_email='".$_POST["pm_email"]."',pm_address='".$_POST["pm_address"]."',cp_name='".$_POST["cp_name"]."',
        cp_phone1='".$_POST["cp_phone1"]."',cp_email='".$_POST["cp_email"]."',cp_address='".$_POST["cp_address"]."' where id='".$_POST["cid"]."'";
        if ($conn->query($sqlx) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT3"){
        $sql="update project set core='".$_POST["core"]."',cat1='".$_POST["cat1"]."',cat2='".$_POST["cat2"]."',cat3='".$_POST["cat3"]."',cat4='".$_POST["cat4"]."' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT4"){
        $sql="update project set capacity='".$_POST["capacity"]."',cat7='".$_POST["cat7"]."',cat8='".$_POST["cat8"]."',cat9='".$_POST["cat9"]."',
        cat10='".$_POST["cat10"]."',cat11='".$_POST["cat11"]."',cat12='".$_POST["cat12"]."',cat13='".$_POST["cat13"]."',cat14='".$_POST["cat14"]."',
        cat15='".$_POST["cat15"]."' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT_agreement"){
        // client_ndis,client_dob,representative_name,project_signed,project_start,project_end,nominee_name,participant_name,phone_day,
        // phone_night,mobile,email,address,cpname,cpphone1,cpphone2,cpmobile,cpemail,cpaddress,transport_cost,images1,images2,images3
        
        // images1,images2,images3
        
        $cdob=strtotime($_POST["client_dob"]);
        $project_signed=strtotime($_POST["project_signed"]);
        $project_start=strtotime($_POST["project_start"]);
        $project_end=strtotime($_POST["project_end"]);
        
        $sql="update uerp_user set ndis='".$_POST["client_ndis"]."',dob='$cdob',representative_name='".$_POST["representative_name"]."',
        cp_name='".$_POST["cpname"]."',cp_phone1='".$_POST["cpphone1"]."',cp_phone2='".$_POST["cpphone2"]."',
        cp_mobile='".$_POST["cpmobile"]."',cp_email='".$_POST["cpemail"]."',cp_address='".$_POST["cpaddress"]."',
        nominee_name='".$_POST["nominee_name"]."',phone='".$_POST["phone_day"]."',phone2='".$_POST["phone_night"]."',
        mobile='".$_POST["mobile"]."',email='".$_POST["email"]."',address='".$_POST["address"]."',city='".$_POST["city"]."',
        zip='".$_POST["zip"]."',area='".$_POST["state"]."',country='".$_POST["country"]."' where id='".$_POST["cid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        
        $sql="update project set project_signed='$project_signed',start_date='$project_start',end_date='$project_end',
        start_date1='$project_start',end_date1='$project_end',transport_cost='".$_POST["transport_cost"]."' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT_categories"){
        $extension1=0;
        foreach ($_FILES['images1']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension1 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension1;
            move_uploaded_file($_FILES['images1']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location1 = 'media/agreement/' . $newFilename;
        }
        if(strlen("$extension1")>=3){
            $sql="update project set image1='$location1' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Participant`s e-Signature Uploaded.')</script>";
        }
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT_signature1"){
        $extension1=0;
        foreach ($_FILES['images1']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension1 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension1;
            move_uploaded_file($_FILES['images1']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location1 = 'media/agreement/' . $newFilename;
        }
        if(strlen("$extension1")>=3){
            $sql="update project set image1='$location1' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Participant`s e-Signature Uploaded.')</script>";
        }
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT_signature2"){
        $extension2=0;
        foreach ($_FILES['images2']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension2 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension2;
            move_uploaded_file($_FILES['images2']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location2 = 'media/agreement/' . $newFilename;
        }
        if(strlen("$extension2")>=3){
            $sql="update project set image2='$location2' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Nominee`s e-Signature Uploaded.')</script>";
        }
    }
    
    if($_POST["processor"]=="new_workspace_PROJECT_signature3"){
        $extension3=0;
        foreach ($_FILES['images3']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension3 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension3;
            move_uploaded_file($_FILES['images3']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location3 = 'media/agreement/' . $newFilename;
        }
    	if(strlen("$extension3")>=3){
            $sql="update project set image3='$location3' where id='".$_POST["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Provider`s e-Signature Uploaded.')</script>";
        }
    }                                                
         
    if($_POST["processor"]=="new_workspace_PROJECT_fees"){
        
        $s1 = "select * from ndis_invoices where ledger_id='800000032' and invoice_no2='".$_COOKIE["ws_invoice"]."' order by id desc limit 1";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
            $idate=$t1["receipt_no"];
            $invoice_id2=$t1["invoice_no2"];
            $randid=$t1["id"];
        } }
        
        $n1 = "select * from ndis_line_numbers where item_number='".$_POST["ndis_item"]."' order by id asc limit 1";
        $nn1 = $conn_main->query($n1);
        if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
            $n_description=$nnn1["item_name"];
            $n_rate=$nnn1["national"];
        } }
        
        $ip=$_SERVER['REMOTE_ADDR'];
        $total_amount=($n_rate*$_POST["qty"]);
        $sql = "insert into ndis_invoices_addon (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,status,
        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid,proj_id) 
        VALUES ('$idate','$idate','$n_description','800000032','2','2','".$_POST["cid"]."','$ip','1',
        '".$_COOKIE["userid"]."','".$_COOKIE["ws_invoice"]."','".$_COOKIE["ws_invoice"]."','".$_COOKIE["ws_invoice"]."','".$_POST["ndis_item"]."','".$_POST["qty"]."','$n_rate',
        '0','$total_amount','".$_POST["selection"]."','$invoice_id2','1','$randid','".$_POST["pid"]."')";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        
        $sql = "insert into service_agreement_addon (description,ndis_item,unit,price,qty,comments,status,projectid,clientid) VALUES 
        ('".$_POST["description"]."','$n_description','".$_POST["unit"]."','$n_rate','".$_POST["qty"]."','".$_POST["comments"]."','1','".$_POST["pid"]."','".$_POST["cid"]."')";
        if ($conn->query($sql) === TRUE){
            // echo"<script>alert('Service Agreement Fee Updated')</script>";
            echo"<form method='get' action='modules/client-service-addons2.php' name='main'>
                <input type='hidden' name='cid' value='".$_POST["cid"]."'>
                <input type='hidden' name='pid' value='".$_POST["pid"]."'>
                <input type='hidden' name='sid' value='0'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
                          
    if($_POST["processor"]=="new_workspace_PROJECT_done"){
        
        // echo"<script>alert('".$_POST["pid"]."')</script>";
        
        $wsp11 = "select * from project where status='15' and id='".$_POST["pid"]."' order by id desc limit 1";
        $wsp22 = $conn->query($wsp11);
        if ($wsp22->num_rows > 0) { while($wsp33 = $wsp22 -> fetch_assoc()) {
            
            $tid=0;
            $ln1 = "select * from project_budget_allocation where projectid='".$wsp33["id"]."' order by id asc";
            $ln2 = $conn->query($ln1);
            if ($ln2->num_rows > 0) { while($ln3 = $ln2 -> fetch_assoc()) {
            
                $tid=($tid+1);
                $sc1 = "select * from ndis_line_numbers where id='".$ln3["item_number"]."' order by id desc limit 1";
                $sc2 = $conn_main->query($sc1);
                if ($sc2->num_rows > 0) { while($sc3 = $sc2 -> fetch_assoc()) {
                    $supportname=$sc3["item_name"];
                    $supportlinenumber=$sc3["item_number"];
                    $supportprice=$sc3["national"];
                } }
                
                $hd1=0;
                $holidaytext="Holidays on";
                $sc11 = "select * from leave_holidays where status='ON' order by id asc";
                $sc22 = $conn->query($sc11);
                if ($sc22->num_rows > 0) { while($sc33 = $sc22 -> fetch_assoc()) {
                    if($sc33["startdate"]>=$wsp33["budget_date"] && $sc33["startdate"]<=$wsp33["budget_close_date"]){
                        if($sc33["enddate"]>=$wsp33["budget_date"] && $sc33["enddate"]<=$wsp33["budget_close_date"]){
                            $diffInSecondsz = abs($sc33["startdate"] - $sc33["enddate"]);
                            $tdaysz = floor($diffInSecondsz / (60 * 60 * 24));
                            if($tdaysz<=0) $tdaysz=1;
                            $hd1=($hd1+$tdaysz);
                            $holidaytext="$holidaytext, ".$sc33["holidayname"]."";
                        }
                    }
                } }
                
                if($ln3["time1"]==0) $tm1="08:00";
                else $tm1=$ln3["time1"];
                
                $tm1x="08:00";
                $tm1x = strtotime($tm1);
                if($ln3["time2"]==0) $tm2 = date("H:i", $tm1x + 5 * 3600);
                else $tm2=$ln3["time2"];
                
                // Updating Budget Catagory and Amount...
                $wd=0;
                if($ln3["mon"]==1) $wd=($wd+4);
                if($ln3["tue"]==1) $wd=($wd+4);
                if($ln3["wed"]==1) $wd=($wd+4);
                if($ln3["thu"]==1) $wd=($wd+4);
                if($ln3["fri"]==1) $wd=($wd+4);
                if($ln3["sat"]==1) $wd=($wd+4);
                if($ln3["sun"]==1) $wd=($wd+4);
                if($ln3["evening"]==1) $wd=($wd+4);
                if($ln3["night"]==1) $wd=($wd+4);
                
                if($ln3["sat"]==1 || $ln3["sun"]==1 || $ln3["sat"]==1) $hd1=0;
                                                
                $wd=($wd*12);
                $wd=($wd-$hd1);
                if($wd<=0) $wd=0;
                                                
                $totalamount=0;
                $totalamount=($ln3["qty1"]*$wd);
                $totalamount=($totalamount*$ln3["rate1"]);

                /*
                // Updating Project Budget according to Line/Item Number.
                if($tid==1) $sql="update project set cat1='$supportlinenumber',cat1x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==2) $sql="update project set cat2='$supportlinenumber',cat2x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==3) $sql="update project set cat3='$supportlinenumber',cat3x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==4) $sql="update project set cat4='$supportlinenumber',cat4x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==5) $sql="update project set cat5='$supportlinenumber',cat5x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==6) $sql="update project set cat6='$supportlinenumber',cat6x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==7) $sql="update project set cat7='$supportlinenumber',cat7x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==8) $sql="update project set cat8='$supportlinenumber',cat8x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==9) $sql="update project set cat9='$supportlinenumber',cat9x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==10) $sql="update project set cat10='$supportlinenumber',cat10x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==11) $sql="update project set cat11='$supportlinenumber',cat11x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==12) $sql="update project set cat12='$supportlinenumber',cat12x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==13) $sql="update project set cat13='$supportlinenumber',cat13x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==14) $sql="update project set cat14='$supportlinenumber',cat14x='$totalamount' where id='".$wsp33["id"]."'";
                if($tid==15) $sql="update project set cat15='$supportlinenumber',cat15x='$totalamount' where id='".$wsp33["id"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                */

                // Adding Service Agreement Line Numbers with Rate.
                $weekdays="- ";
                if($ln3["mon"]==1) $weekdays="- Monday";
                if($ln3["tue"]==1) $weekdays="$weekdays - Tuesday";
                if($ln3["wed"]==1) $weekdays="$weekdays - Wednesday";
                if($ln3["thu"]==1) $weekdays="$weekdays - Thursday";
                if($ln3["fri"]==1) $weekdays="$weekdays - Friday";
                if($ln3["sat"]==1) $weekdays="$weekdays - Saturday";
                if($ln3["sun"]==1) $weekdays="$weekdays - Sunday";
                if($ln3["evening"]==1) $weekdays="$weekdays - Nightshift";
                
                $supportname="$supportname $weekdays";
                
                $sql = "insert into service_agreement_addon (description,ndis_item,unit,price,qty,comments,status,projectid,clientid) VALUES 
                ('$supportname','$supportlinenumber','1','$totalamount','1','".$wsp33["note"]."','1','".$wsp33["id"]."','".$wsp33["clientid"]."')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
        
                // Creating shift template 1 (Week Days)
                if($ln3["mon"]==1){ 
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','MONDAY','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                if($ln3["tue"]==1){ 
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','TUESDAY','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                if($ln3["wed"]==1){ 
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','WEDNESDAY','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                if($ln3["thu"]==1){ 
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','THURSDAY','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                if($ln3["fri"]==1){ 
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKDAY','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','FRIDAY','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                
                if($ln3["sun"]==1){ 
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKEND','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','SUNDAY','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                
                if($ln3["sat"]==1){ 
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','0','WEEKEND','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','SATURDAY','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                
                if($ln3["evening"]==1){
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','1','NIGHTSHIFT','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','NIGHTSHIFT','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                
                /*
                if($ln3["night"]==1){
                    $sql = "insert into shifting_schedule (projectid,stime,etime,status,night,remark,itemnumber,category,repeating,note,address,dayname,employeeid) 
                    VALUES ('".$wsp33["id"]."','$tm1','$tm2','1','1','NIGHTSHIFT','".$ln3["item_number"]."','".$ln3["category"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."','NIGHTSHIFT','".$ln3["employeeid"]."')";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                */
                
                $employeeid=$ln3["employeeid"];
                $projectid=$ln3["projectid"];
                $clientid=$wsp33["clientid"];
                $color=$wsp33["color"];
                
                $sx1 = "select * from uerp_user where id='$employeeid' order by id asc limit 1";
                $rx1 = $conn->query($sx1);
                if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
                    $empid="";
                    $empid=$ry1["id"];
                    $employeename="";
                    $employeename="".$ry1["username"]." ".$ry1["username2"]."";
                    $semail="";
                    $semail=$ry1["email"];
                    $sphone="";
                    $sphone=$ry1["phone"];
                } }
                
                $sx2 = "select * from uerp_user where id='$clientid' order by id asc limit 1";
                $rx2 = $conn->query($sx2);
                if ($rx2->num_rows > 0) { while($ry2 = $rx2->fetch_assoc()) {
                    $clientname="";
                    $clientname="".$ry2["username"]." ".$ry2["username2"]."";
                    $clientemail="";
                    $clientemail=$ry2["email"];
                    $clientphone="";
                    $clientphone=$ry2["phone"];
                    $clientaddress="";
                    $clientaddress=$ry2["address"];
                    $clientcity=$ry2["city"];
                    $clientstate=$ry2["area"];
                    $clientzip=$ry2["zip"];
                    $clientcountry=$ry2["country"];
                } }
                
                $budgetstartdate=date("Y-m-d", $wsp33["budget_date"]);
                $budgetclosedate=date("Y-m-d", $wsp33["budget_close_date"]);
                $startDate = new DateTime("$budgetstartdate");
                $endDate = new DateTime("$budgetclosedate");
                
                $employeeid=$ln3["employeeid"];
                $projectid=$ln3["projectid"];
                $clientid=$wsp33["clientid"];
                $color=$wsp33["color"];
                
                $category=$ln3["category"];
                $repeating=$ln3["repeating"];
                
                if($ln3["night"]==1) $nightshift="NightShift";
                else $nightshift="";
                
                /*
                
                if($ln3["mon"]==1){
                    $firstMonday = clone $startDate;
                    if ($firstMonday->format('N') != 1) {
                        $firstMonday->modify('next monday');
                    }
                    $mondays = []; // Loop through all Mondays between start and end date
                    while ($firstMonday <= $endDate) {
                        $mondays[] = $firstMonday->format('Y-m-d');
                        $firstMonday->modify('+1 week');
                    }
                    $tx=0;
                    foreach ($mondays as $date) {
                        $stime="$date $tm1";
                        $etime="$date $tm2";
                        $sdate=strtotime($stime);
                        $edate=strtotime($etime);
                        $year1 = date("Y",$sdate);
                        $month1 = date("m",$sdate);
                        $day1 = date("d",$sdate);
                        $tx=($tx+1);
                        if($repeating=="Week Repeat" && $tx==1){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = MONDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Month Repeat" && $tx <= 4){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = MONDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Fortnight Repeat" && $tx == 2){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = MONDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                    }
                }
                
                echo"<hr>";
                if($ln3["tue"]==1){
                    $firstTuesday = clone $startDate;
                    if ($firstTuesday->format('N') != 2) { // 2 = Tuesday
                        $firstTuesday->modify('next tuesday');
                    }
                    $tuesdays = [];
                    while ($firstTuesday <= $endDate) {
                        $tuesdays[] = $firstTuesday->format('Y-m-d');
                        $firstTuesday->modify('+1 week');
                    }
                    $tx=0;
                    foreach ($tuesdays as $date) {
                        $stime="$date $tm1";
                        $etime="$date $tm2";
                        $sdate=strtotime($stime);
                        $edate=strtotime($etime);
                        $year1 = date("Y",$sdate);
                        $month1 = date("m",$sdate);
                        $day1 = date("d",$sdate);
                        $tx=($tx+1);
                        if($repeating=="Week Repeat" && $tx==1){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = TUESDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Month Repeat" && $tx <= 4){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = TUESDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Fortnight Repeat" && $tx == 2){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = TUESDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                    }
                }
                
                echo"<hr>";
                if($ln3["wed"]==1){
                    $firstWednesday = clone $startDate;
                    if ($firstWednesday->format('N') != 3) { // 3 = Wednesday
                        $firstWednesday->modify('next wednesday');
                    }
                    $wednesdays = [];
                    while ($firstWednesday <= $endDate) {
                        $wednesdays[] = $firstWednesday->format('Y-m-d');
                        $firstWednesday->modify('+1 week');
                    }
                    $tx=0;
                    foreach ($wednesdays as $date) {
                        $stime="$date $tm1";
                        $etime="$date $tm2";
                        $sdate=strtotime($stime);
                        $edate=strtotime($etime);
                        $year1 = date("Y",$sdate);
                        $month1 = date("m",$sdate);
                        $day1 = date("d",$sdate);
                        $tx=($tx+1);
                        if($repeating=="Week Repeat" && $tx==1){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = WEDNESDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Month Repeat" && $tx <= 4){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = WEDNESDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Fortnight Repeat" && $tx == 2){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = WEDNESDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                    }
                }
                
                echo"<hr>";
                if($ln3["thu"]==1){
                    $firstThursday = clone $startDate;
                    if ($firstThursday->format('N') != 4) { // 4 = Thursday
                        $firstThursday->modify('next thursday');
                    }
                    $thursdays = [];
                    while ($firstThursday <= $endDate) {
                        $thursdays[] = $firstThursday->format('Y-m-d');
                        $firstThursday->modify('+1 week');
                    }
                    $tx=0;
                    foreach ($thursdays as $date) {
                        $stime="$date $tm1";
                        $etime="$date $tm2";
                        $sdate=strtotime($stime);
                        $edate=strtotime($etime);
                        $year1 = date("Y",$sdate);
                        $month1 = date("m",$sdate);
                        $day1 = date("d",$sdate);
                        $tx=($tx+1);
                        if($repeating=="Week Repeat" && $tx==1){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = THURSDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Month Repeat" && $tx <= 4){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = THURSDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Fortnight Repeat" && $tx == 2){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = THURSDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                    }
                }
                
                echo"<hr>";
                if($ln3["fri"]==1){
                    $firstFriday = clone $startDate;
                    if ($firstFriday->format('N') != 5) { // 5 = Friday
                        $firstFriday->modify('next friday');
                    }
                    $fridays = [];
                    while ($firstFriday <= $endDate) {
                        $fridays[] = $firstFriday->format('Y-m-d');
                        $firstFriday->modify('+1 week');
                    }
                    $tx=0;
                    foreach ($fridays as $date) {
                        $stime="$date $tm1";
                        $etime="$date $tm2";
                        $sdate=strtotime($stime);
                        $edate=strtotime($etime);
                        $year1 = date("Y",$sdate);
                        $month1 = date("m",$sdate);
                        $day1 = date("d",$sdate);
                        $tx=($tx+1);
                        if($repeating=="Week Repeat" && $tx==1){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES  ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE)  echo"<hr>$category, $repeating = FRIDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Month Repeat" && $tx <= 4){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES  ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = FRIDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Fortnight Repeat" && $tx == 2){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES  ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE)  echo"<hr>$category, $repeating = FRIDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                    }
                }
                
                echo"<hr>";
                if($ln3["sat"]==1){
                    $firstSaturday = clone $startDate;
                    if ($firstSaturday->format('N') != 6) { // 6 = Saturday
                        $firstSaturday->modify('next saturday');
                    }
                    $saturdays = [];
                    while ($firstSaturday <= $endDate) {
                        $saturdays[] = $firstSaturday->format('Y-m-d');
                        $firstSaturday->modify('+1 week');
                    }
                    $tx=0;
                    foreach ($saturdays as $date) {
                        $stime="$date $tm1";
                        $etime="$date $tm2";
                        $sdate=strtotime($stime);
                        $edate=strtotime($etime);
                        $year1 = date("Y",$sdate);
                        $month1 = date("m",$sdate);
                        $day1 = date("d",$sdate);
                        $tx=($tx+1);
                        if($repeating=="Week Repeat" && $tx==1 OR $repeating=="Week Manual" && $tx==1){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = SATURDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Month Repeat" && $tx <= 4 OR $repeating=="Month Manual" && $tx <= 4){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = SATURDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Fortnight Repeat" && $tx == 2 OR $repeating=="Fortnight Manual" && $tx == 2){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = SATURDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                    }
                }
                
                echo"<hr>";
                if($ln3["sun"]==1){
                    $firstSunday = clone $startDate;
                    if ($firstSunday->format('N') != 7) { // 7 = Sunday
                        $firstSunday->modify('next sunday');
                    }
                    $sundays = [];
                    while ($firstSunday <= $endDate) {
                        $sundays[] = $firstSunday->format('Y-m-d');
                        $firstSunday->modify('+1 week');
                    }
                    $tx=0;
                    foreach ($sundays as $date) {
                        $stime="$date $tm1";
                        $etime="$date $tm2";
                        $sdate=strtotime($stime);
                        $edate=strtotime($etime);
                        $year1 = date("Y",$sdate);
                        $month1 = date("m",$sdate);
                        $day1 = date("d",$sdate);
                        $tx=($tx+1);
                        if($repeating=="Week Repeat" && $tx==1){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = SUNDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        if($repeating=="Month Repeat" && $tx <= 4){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = SUNDAY: $date $tm1 - $date $tm2 ($nightshift) <br>";
                        }
                        if($repeating=="Fortnight Repeat" && $tx == 2){
                            $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,sdate,edate,night,category,itemnumber,repeating,admin_note,address) VALUES ('$employeeid','$projectid','$clientid','$day1','$month1','$year1','$stime','$day1','$month1','$year1','$etime','0','1','$color','$sdate','$edate','0','".$ln3["category"]."','".$ln3["item_number"]."','".$ln3["repeating"]."','".$ln3["note"]."','".$ln3["address"]."')";
                            if ($conn->query($sql) === TRUE) echo"<hr>$category, $repeating = SUNDAY: $date $tm1 - $date $tm2 ($nightshift) <br>"; 
                        }
                        
                    }
                }
                
                */
                
            } }

        } }
        
        $sql="update project set status='1' where id='".$_POST["pid"]."'";
        if ($conn->query($sql) === TRUE){
            unset($_COOKIE["ws_fname"]);
            setcookie("ws_fname", "", time() - 3600, "/");
            unset($_COOKIE["ws_lname"]);
            setcookie("ws_lname", "", time() - 3600, "/");
            unset($_COOKIE["ws_email"]);
            setcookie("ws_email", "", time() - 3600, "/");
            unset($_COOKIE["ws_cid"]);
            setcookie("ws_cid", "", time() - 3600, "/");
            unset($_COOKIE["ws_invoice"]);
            setcookie("ws_invoice", "", time() - 3600, "/");
            
            echo"<form method='GET' action='global-set.php' name='mainxyz' target='_top'>
                <input type=hidden name='pstat' value='1'>
                <input type=hidden name='url' value='projects.php'>
                <input type=hidden name='projectidx' value='".$_POST["pid"]."'>
                <input type=hidden name='id' value='62'>
            </form>";
            
            ?><script language=JavaScript> document.mainxyz.submit(); </script><?php
        }
    }
    
    if($_POST["processor"]=="new_workspace_CLIENT"){
        
        $edatex = date("Y-m-d", strtotime("+1 year", time()));
        $edatex =strtotime($edatex);
        
        if(isset($_POST["pdate"])) $pdate = strtotime($_POST["pdate"]); else $pdate = time();
        if(isset($_POST["jdate"])) $jdate = strtotime($_POST["jdate"]); else $jdate = time();
        if(isset($_POST["jdate"])) $jdate = strtotime($_POST["jdate"]); else $jdate = time();
        if(isset($_POST["dob"])) $dob = strtotime($_POST["dob"]); else $dob = time();
        if(isset($_POST["password"])) $currentpassword=md5($_POST["password"]); else $currentpassword="fcea920f7412b5da7be0cf42b8c93759";
        if(isset($_POST["fname"])) $fname = str_replace("'", "`", $_POST["fname"]); else $fname=null;
        if(isset($_POST["lname"])) $lname = str_replace("'", "`", $_POST["lname"]); else $lname=null;
        if(isset($_POST["address"])) $address = str_replace("'", "`", $_POST["address"]); else $address=null;
        if(isset($_POST["address"])) $address2 = str_replace("'", "`", $_POST["address2"]); else $address2=null;
        if(isset($_POST["cdetail"])) $cdetail = str_replace("'", "`", $_POST["cdetail"]); else $cdetail=null;
        if(isset($_POST["note_for_staff"])) $note_for_staff = str_replace("'", "`", $_POST["note_for_staff"]); else $note_for_staff=null;
        
        $recid=0;
        $sm1 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
        $rm1 = $conn->query($sm1);
        if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $recid=1; }}

        $sm2 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
        $rm2 = $conn_main->query($sm2);
        if ($rm2->num_rows > 0) { while($tm2 = $rm2->fetch_assoc()) { $recid=2; }}
        
        if($recid==0){
            // echo"<script>alert('Here...')</script>";
            // pdate,jdate,employueeid,userid,password,mtype,fname,lname,email,phone,address,city,state,zip,country,pm_name,pm_mobile,pm_email,pm_address,cp_name,cp_phone1,cp_email,cp_address
            // pdate,jdate,employeeid,userid,password,mtype,sourcefrom,    fname,lname,email,phone,address,city,state,zip,country,ndisnumber,abn,bsb,birth_country,clanguage,cenglish,cpackage,funding_type,previouse_provider,referral_number,rname1,rname2,rphone,remail,rtype,client_detail
            
            if(!isset($_POST["leadid"])) $leadid=0;
            else $leadid=$_POST["leadid"];
            
            $sql = "insert into uerp_user (date,jointime,username,username2,phone,uid,email,unbox,passbox,address,city,area,
            zip,country,ndis,ndis_number,abn,bsb,mtype,status,agentid,leadid,designation,department,ref_db,aboutme,note) 
            VALUES ('$pdate','$jdate','$fname','$lname','".$_POST["phone"]."','".$_POST["employeeid"]."','".$_POST["email"]."',
            '".$_POST["email"]."','$currentpassword','$address','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."',
            '".$_POST["country"]."','".$_POST["ndisnumber"]."','".$_POST["ndisnumber"]."','".$_POST["abn"]."','".$_POST["bsb"]."',
            '".$_POST["mtype"]."','1','0','$leadid','17','21','".$_COOKIE['dbname']."','$cdetail','$note_for_staff')";
            if ($conn->query($sql) === TRUE){
                
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                
                if($leadid!=0){
                    $sql="update leads set status='2',onboard='1' where id='$leadid'";
                    if ($conn->query($sql) === TRUE) $tomtom=0;
                }
                
                $sql_main = "insert into uerp_user (uid,date,unbox,passbox,username,username2,phone,email,mtype,ref_db) 
                VALUES ('".$_POST["employeeid"]."','$pdate','".$_POST["email"]."','$currentpassword','$fname','$lname','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["mtype"]."','".$_COOKIE['dbname']."')";
                if ($conn_main->query($sql_main) === TRUE) $tomtom=0;
                
                $recid=0;
                $sm1 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
                $rm1 = $conn->query($sm1);
                if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $clientid=$tm1["id"]; }}
                
                $colorx = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                
                $sql1p = "insert into project (name,clientid,status,start_date,end_date,leaderid,budget_date,budget_close_date,teamleaderid,color,caseid,lead,start_date1,end_date1) 
                VALUES ('Project $fname','$clientid','15','$sysdate','$edatex','".$_POST["employeeid"]."','$sysdate','$edatex','".$_POST["employeeid"]."','$colorx','".$_POST["case_manager"]."','$leadid','$sysdate','$edatex')";
                if ($conn->query($sql1p) === TRUE) $tomtom=0;
                
                $invoice_date=time();
                
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','WORKSPACE CLIENT','0','$sysdate','$ip','1','Added New WORKSPACE CLIENT','0','".$_POST["userid"]."','uerp_user')";
                if ($conn->query($sql1) === TRUE){
                    $tomtom=0;
                        
                    setcookie("ws_fname", $_POST["fname"], time()+9999999);
                    setcookie("ws_lname", $_POST["lname"], time()+9999999);
                    setcookie("ws_email", $_POST["email"], time()+9999999);
                    setcookie("ws_cid", $clientid, time()+9999999);
                    setcookie("ws_invoice", $invoice_date, time()+9999999);
                        
                    echo"<form method='GET' action='index.php' name='main' target='_top'>
                        <input type=hidden name='url' value='workspace.php'><input type=hidden name='id' value='786'>
                    </form>";
                    ?><script language=JavaScript> document.main.submit(); </script><?php
                }
            }
        } else echo"<script>alert('Sorry! This email address is already used.')</script>";
    }