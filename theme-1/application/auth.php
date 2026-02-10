<?php
	error_reporting(0);
	include('../include.php');
    date_default_timezone_set("Asia/Dhaka");
	$dmy=date("M d, Y");
	$tm=date("h:m:s A");
	
	$cdate=date("Y-m-d");
    $ctime=date("h:i");
    $t="T";
    $cdate="$cdate$t$ctime";
    
	// echo"".$_COOKIE["uid"]."";
    if(isset($_COOKIE["uid"])){
        $cs2 = "select * from sms_company_bon where id='1' and status='1' order by id asc limit 1";
        $cr2 = $conn->query($cs2);
        if ($cr2->num_rows > 0) { while($crs2 = $cr2->fetch_assoc()) {
            
            $cname=$crs2["cname"];
            $caddress=$crs2["address"];
            $ccity=$crs2["city"];
            $cstate=$crs2["state"];
            $czip=$crs2["zip"];
            $ccountry=$crs2["country"];
            $cphone=$crs2["phone"];
            $cemail=$crs2["email"];
            $ctin=$crs2["tin"];
            $cvat=$crs2["vat"];
            $clicense=$crs2["license"];
            $cstatus=$crs2["status"];
            $clogo=$crs2["logo"];
            $cfavicon=$crs2["favicon"];
            $top_bc=$crs2["top_bc"];
            $top_tc=$crs2["top_tc"];
            $side_bc=$crs2["side_bc"];
            $side_tc=$crs2["side_tc"];
            $body_bc=$crs2["body_bc"];
            $body_tc=$crs2["body_tc"];
            $button_bc=$crs2["button_bc"];
            $button_tc=$crs2["button_tc"];
            $ccode=$crs2["ccode"];
            $csymbol=$crs2["csymbol"];
            $symbol_position=$crs2["symbol_position"];
            $user_login=$crs2["user_login"];
            $client_login=$crs2["client_login"];
            $seller_login=$crs2["seller_login"];
            $system_status=$crs2["system_status"];
            $noticeboard=$crs2["noticeboard"];
            $noticeboardstatus=$crs2["noticeboardstatus"];
            $send_email=$crs2["send_email"];
            $smtp_server=$crs2["smtp_server"];
            $smtp_port=$crs2["smtp_port"];
            $project_path=$crs2["project_path"];
            $api_domain_url=$crs2["api_domain_url"];
            $store_id=$crs2["store_id"];
            $store_password=$crs2["store_password"];
            
		} }
		
        $us1 = "select * from sms_user2 where id='".$_COOKIE["uid"]."' and status='1' order by id asc limit 1";
        $ur1 = $conn->query($us1);
        if ($ur1->num_rows > 0) { while($urs1 = $ur1->fetch_assoc()) {
            
            $uname=$urs1["name"];
            $uemail=$urs1["email"];
            $userid=$urs1["user_id"];
            $ustatus=$urs1["status"];
            $uphone=$urs1["phone"];
            $mtype=$urs1["mtype"];
            $uactype=$urs1["actype"];
            $uacrole=$urs1["acrole"];
            $udate=$urs1["udate"];
            $dob=$urs1["dob"];
            $ustatus=$urs1["ustatus"];
            $uname2=$urs1["uname2"];
            $image=$urs1["image"];

		} }
	}
?>