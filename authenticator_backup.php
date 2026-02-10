<?php
    $viewpoint="DESKTOP";
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
        $viewpoint="MOBILE";
    }else{
        $viewpoint="DESKTOP";
    }
    
	if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
	if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];

	if(isset($_REQUEST["id"])) $id=$_REQUEST['id'];
	if(isset($_REQUEST["smsbd"])) $smsbd=$_REQUEST['smsbd'];
	if(isset($_REQUEST["bfacklink"])) $backlink=$_REQUEST['backlink'];
	if(isset($_REQUEST["kroyee"])) $kroyee=$_REQUEST['kroyee'];
	if(isset($_REQUEST["sheba"])) $sheba=$_REQUEST["sheba"];
	if(isset($_REQUEST["pointer"])) $pointer=$_REQUEST["pointer"];

    if(!isset($_REQUEST["smsbd"])) $smsbd="Dashboard";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

	if(isset($_SERVER["SERVER_NAME"])) $sh=$_SERVER["SERVER_NAME"];
    // echo"<p id='globaladdress'></p>";
    function ip_visitor_country(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        $country  = "Unknown";

        if(filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=".$remote);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);
    
        $ip_data = json_decode($ip_data_in,true);
        // $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/
        /*
        if($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }
        // return 'IP: '.$ip.' # Country: '.$country;
        return $country;
        */
    }
    
    date_default_timezone_set("Australia/Melbourne");
	
    $urlz="$sh";
	
    $timetable=time();
	$timexyz=date("d-m-Y h:i:s A", $timetable);
	$tweek = date("D");
	$tmonth = date("M");
	$tday = date("d");
	$tyear = date("Y");
	$month_day_year = date("M d, Y");
	$tm=date("h:m:s A");
    $wn=date("I");
	$current_date = date("Y-m-d");
	
    $timestamp = strtotime('today midnight');
    $todaystarttime=date("d-m-y h:i:s a", $timestamp);

    $mycountry=ip_visitor_country();
    $ccounter=strlen("$mycountry");
    $ip=$_SERVER['REMOTE_ADDR'];
    
    error_reporting(0);                                  // Turn off error reporting
    // error_reporting(E_ERROR | E_WARNING | E_PARSE);         // Report runtime errors
    // error_reporting(E_ALL);                                 // Report all errors
    // ini_set("error_reporting", E_ALL);                      // Same as error_reporting(E_ALL);
    // error_reporting(E_ALL & ~E_NOTICE);                     // Report all errors except E_NOTICE

    include('include.php');
    
    // echo" ".$_COOKIE["userid"]." - ".$_COOKIE["track"]." - ".$_COOKIE["dbname"]." ";

    if(isset($_COOKIE["userid"])){
        
        if($ccounter=="10") $currencycode="AUD";
    	else $currencycode="AUD";
    	if($ccounter=="10") $ccode="$";
    	else $ccode="$";
	    
        if($wn>="01") $welcomenote= "Good Day";
        else if($wn>="05") $welcomenote= "Good Morning";
        else if($wn>="12") $welcomenote= "Good Afternoon";
        else if($wn>="15") $welcomenote= "Good Evening";
        else if($wn>="20") $welcomenote= "Good Day";

        $a1 = "select * from companysetting where id='1' order by id asc limit 1";
        $a11 = $conn->query($a1);
        if ($a11->num_rows > 0) { while($a111 = $a11 -> fetch_assoc()) {
            $companynamex=$a111["companyname"];
            $phonex=$a111["phone"];
            $emailx=$a111["email"];
            $websitex=$a111["website"];
            $addressx=$a111["address"];
            $cityx=$a111["city"];
            $statex=$a111["state"];
            $postalcodex=$a111["postalcode"];
            $countryx=$a111["country"];
            $companydetail=$a111["companydetail"];
            $currencycode=$a111["currencycode"];
            $currencysymbol=$a111["currencysymbol"];
            $language=$a111["language"];
            $cashbook=$a111["cashbook"];
            $bankbook=$a111["bankbook"];
            
            $image=$a111["image"];
            $theme=$a111["theme"];
            $logo=$a111["logo_light"];
            $logo_light=$a111["logo_light"];
            $logo_dark=$a111["logo_dark"];
            $favicon=$a111["favicon"];
            
            $status=$a111["status"];
            
            $ndis_number=$a111["ndis_number"];
            $abn_number=$a111["abn_number"];
            $bsb_number=$a111["bsb_number"];
            $ac_number=$a111["ac_number"];
            
            $ccode=$a111["currencycode"];
            $csymbol=$a111["currencysymbol"];            

            $subscription_type=$a111["subscription_type"];
            $register_date=$a111["register_date"];
            $expire_date=$a111["expire_date"];
            $registrationnumber=$a111["registrationnumber"];
            $tinnumber=$a111["tinnumber"];
            $fstartdate=$a111["fstartdate"];
            $fenddate=$a111["fenddate"];
            $attendancemode=$a111["attendancemode"];
            $vouchermode=$a111["vouchermode"];
            $vatnumber=$a111["vatnumber"];
            $vatpercentage=$a111["vatpercentage"];
            $warehouse=$a111["warehouse"];
            $deviceip=$a111["deviceip"];
            $datafilelocation=$a111["datafilelocation"];
            $date_format=$a111["date_format"];
            $timezone=$a111["timezone"];
            $time_format=$a111["time_format"];
            $invoice_prefix=$a111["invoice_prefix"];
            $invoice_note=$a111["invoice_note"];
            
            $receive_v=$a111["receive_v"];
            $payment_v=$a111["payment_v"];
            $journal_v=$a111["journal_v"];
            $sales_v=$a111["sales_v"];
            $purchase_v=$a111["purchase_v"];
            
            $themeset=$a111["themeset"];
            $assistant=$a111["assistant"];
            $walkthrough1=$a111["walkthrough1"];
            $walkthrough2=$a111["walkthrough2"];
            $walkthrough3=$a111["walkthrough3"];
            $walkthrough4=$a111["walkthrough4"];
            $walkthrough5=$a111["walkthrough5"];
            $walkthrough6=$a111["walkthrough6"];
            $walkthrough7=$a111["walkthrough7"];
            $walkthrough8=$a111["walkthrough8"];
            $walkthrough9=$a111["walkthrough9"];
            $walkthrough10=$a111["walkthrough10"];
            
            $walkthrough=($walkthrough1+$walkthrough2+$walkthrough3+$walkthrough4+$walkthrough5+$walkthrough6+$walkthrough7+$walkthrough8+$walkthrough9+$walkthrough10);
            
        } }
        
        // echo"[ ".$_COOKIE["userid"]." ]";
        // echo"[ ".$_COOKIE["dbname"]." ]";
        
        
        $a3 = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by id asc limit 1";
        $a33 = $conn->query($a3);
        if ($a33->num_rows > 0) { while($a333 = $a33->fetch_assoc()) {
            
            $uid=$a333["uid"];
            $date=$a333["date"];
            $ipx=$a333["ip"];
            
            // $joindate=date("d-m-Y",$ipx);
            
            $status=$a333["status"];
            $agentid=$a333["agentid"];
            $unbox=$a333["unbox"];
            $passbox=$a333["passbox"];
            $gendery=$a333["gender"];
            $username=$a333["username"];
            $username2=$a333["username2"];
            $job_experiencey=$a333["job_experience"];
            $addressy=$a333["address"];
            $nationalidy=$a333["nationalid"];
            $phoney=$a333["phone"];
            $doby=$a333["dob"];
            $religiony=$a333["religion"];
            $address2y=$a333["address2"];
            $passporty=$a333["passport"];
            $passport_expire_datey=$a333["passport_expire_date"];
            $nationalityy=$a333["nationality"];
            $marital_statusy=$a333["marital_status"];
            $spouse_occupationy=$a333["spouse_occupation"];
            $childy=$a333["child"];
            $emergency_contact_1y=$a333["emergency_contact_1"];
            $emergency_relation_1y=$a333["emergency_relation_1"];
            $emergency_phone_1=$a333["emergency_phone_1"];
            $emergency_email_1=$a333["emergency_email_1"];
            $emergency_contact_2=$a333["emergency_contact_2"];
            $emergency_relation_2=$a333["emergency_relation_2"];
            $emergency_phone_2=$a333["emergency_phone_2"];
            $emergency_email_2=$a333["emergency_email_2"];
            $bank_name=$a333["bank_name"];
            $account_name=$a333["account_name"];
            $account_number=$a333["account_number"];
            $bsb=$a333["bsb"];
            $fathername=$a333["fathername"];
            $fatherprofession=$a333["fatherprofession"];
            $fatherphone=$a333["fatherphone"];
            $mothername=$a333["mothername"];
            $note=$a333["note"];
            $country=$a333["country"];
            $city=$a333["city"];
            $area=$a333["area"];
            $email=$a333["email"];
            $swfcode=$a333["swfcode"];
            $tpass=$a333["tpass"];
            $cwallet=$a333["cwallet"];
            $pwallet=$a333["pwallet"];
            $ewallet=$a333["ewallet"];
            $plan=$a333["plan"];
            $countz=$a333["countz"];
            $countm=$a333["countm"];
            
            if($a333["images"]!="0") $images=$a333["images"];
            else $images="assets/noimage.png";
            
            $mtype=$a333["mtype"];
            $admin=$a333["admin"];
            $zip=$a333["zip"];
            $projects=$a333["projects"];
            // $day=$a333[""];
            $motherprofession=$a333["motherprofession"];
            $motherphone=$a333["motherphone"];
            $ledger_sid=$a333["ledger_sid"];
            $permission=$a333["permission"];
            $aboutme=$a333["aboutme"];
            $latitude=$a333["latitude"];
            $longitude=$a333["longitude"];
            $onlinestatus=$a333["onlinestatus"];
            $abn=$a333["abn"];
            $salary_basic=$a333["salary_basic"];
            $reg_amt=$a333["reg_amt"];
            $sat_amt=$a333["sat_amt"];
            $sun_amt=$a333["sun_amt"];
            $hol_amt=$a333["hol_amt"];
            $night_amt=$a333["night_amt"];
            $payment_type=$a333["payment_type"];
            $pf=$a333["pf"];
            $pf_no=$a333["pf_no"];
            $pf_rate=$a333["pf_rate"];
            $esi=$a333["esi"];
            $esi_no=$a333["esi_no"];
            $esi_rate=$a333["esi_rate"];
            $driving_licence_no=$a333["driving_licence_no"];
            $colorx=$a333["color"];
            $overtime=$a333["overtime"];
            $ndis=$a333["ndis"];
            $representative_name=$a333["representative_name"];
            $nominee_name=$a333["nominee_name"];
            $phone2=$a333["phone2"];
            $mobile=$a333["mobile"];
            $cp_name=$a333["cp_name"];
            $cp_phone1=$a333["cp_phone1"];
            $cp_phone2=$a333["cp_phone2"];
            $cp_mobile=$a333["cp_mobile"];
            $cp_email=$a333["cp_email"];
            $cp_address=$a333["cp_address"];
            $ndis_number=$a333["ndis_number"];
            $signature1=$a333["signature1"];
            $signature2=$a333["signature2"];
            $signature3=$a333["signature3"];
            $source=$a333["source"];
            $pm_name=$a333["pm_name"];
            $pm_mobile=$a333["pm_mobile"];
            $pm_email=$a333["pm_email"];
            $pm_address=$a333["pm_address"];
            $loginstatus=$a333["loginstatus"];            
            
            $departmenty=$a333["department"];
            $s8x = "select * from departments where id='$departmenty' order by id asc limit 1";
            $r8x = $conn->query($s8x);
            if ($r8x->num_rows > 0) { while($rs8x = $r8x->fetch_assoc()) { $departmentname=$rs8x["department_name"]; } }
            
            $designationy=$a333["designation"];
            $s8y = "select * from designation where id='$designationy' order by id asc limit 1";
            $r8y = $conn->query($s8y);
            if ($r8y->num_rows > 0) { while($rs8y = $r8y->fetch_assoc()) { $designationname=$rs8y["designation"]; } }
            
            $reportstoid=$a333["team_leader"];
            $team_leadery=$a333["team_leader"];
            $s8z = "select * from uerp_user where id='$team_leadery' order by id asc limit 1";
            $r8z = $conn->query($s8z);
            if ($r8z->num_rows > 0) { while($rs8z = $r8z->fetch_assoc()) {
                if($rs8z["images"]!=0) $reporterimage=$rs8z["images"];
                else $reporterimage="img/noimage.jpg";
                $reportstoname=$rs8z["username"];
            } }
            
            
            if($status==0){
                echo"<form method='post' action='logout.php' name='logoutx'></form>";
                ?><script language=JavaScript> document.logoutx.submit(); </script><?php
			}

		} }
		
		if($themeset=="1") $a2 = "select * from theme_customizer where uid='$userid' order by id asc limit 1";
		else $a2 = "select * from theme_customizer where id='1' order by id asc limit 1";
        $a22 = $conn->query($a2);
        if ($a22->num_rows > 0) { while($a222 = $a22->fetch_assoc()) {
            $template=$a222["template"];
            $topbar_bg=$a222["topbar_bg"];
            $topbar_fg=$a222["topbar_fg"];
            $topbar_imz=$a222["topbar_imz"];
            $topbar_status=$a222["topbar_status"];
            $sidebar_bg=$a222["sidebar_bg"];
            $sidebar_fg=$a222["sidebar_fg"];
            $sidebar_imz=$a222["sidebar_imz"];
            $sidebar_status=$a222["sidebar_status"];
            $toolsbar_bg=$a222["toolsbar_bg"];
            $toolsbar_fg=$a222["toolsbar_fg"];
            $toolsbar_imz=$a222["toolsbar_imz"];
            $toolsbar_status=$a222["toolsbar_status"];
            $bottombar_bg=$a222["bottombar_bg"];
            $bottombar_fg=$a222["bottombar_fg"];
            $bottombar_imz=$a222["bottombar_imz"];
            $bottombar_status=$a222["bottombar_status"];
            $body_bg=$a222["body_bg"];
            $body_fg=$a222["body_fg"];
            $body_imz=$a222["body_imz"];
            $body_status=$a222["body_status"];
            $div_bg=$a222["div_bg"];
            $div_fg=$a222["div_fg"];
            $div_imz=$a222["div_imz"];
            $div_status=$a222["div_status"];
            $button_bg=$a222["button_bg"];
            $button_fg=$a222["button_fg"];
            $button_imz=$a222["button_imz"];
            $button_status=$a222["button_status"];
            $status=$a222["status"];
            
        } }
	}
    
	// if(!isset($title)) $title= "Smart Workforce & Clients Management System";
    if(!isset($title)) $title= "Nexis 365 - Infinity posibilities, unlimited opportunities.";
    if(!isset($description)) $description= "Nexis 365 ia an ideal Business digitalization company serving worldwide.";
	
?>

        
        