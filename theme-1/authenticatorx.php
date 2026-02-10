<!DOCTYPE html>
<html class='no-js' lang='en'>
<?php
    
    date_default_timezone_set("Asia/Dhaka");
    
    if(isset($_SERVER["SERVER_NAME"])) $sh=$_SERVER["SERVER_NAME"]; else $sh=null;
    if(isset($_SERVER['REMOTE_ADDR'])) $ip=$_SERVER['REMOTE_ADDR']; else $ip=null;
    
    // error_reporting(0);    
    include('include.php');   
    
    date_default_timezone_set("Asia/Dhaka");

    if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
	if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
    if(isset($_COOKIE["rid"])) $rid=$_COOKIE['rid'];

    if(isset($_REQUEST["id"])) $id=$_REQUEST['id'];    
    if(isset($_REQUEST["cPath"])) $cPath=$_REQUEST['cPath'];
    if(isset($_REQUEST["bid"])) $bid=$_REQUEST['bid'];
    if(isset($_REQUEST["bcid"])) $bcid=$_REQUEST['bcid'];
    if(isset($_REQUEST["pcid"])) $pcid=$_REQUEST['pcid'];
    if(isset($_REQUEST["catid"])) $catid=$_REQUEST['catid'];
    if(isset($_REQUEST["prodid"])) $prodid=$_REQUEST['prodid'];
    if(isset($_REQUEST["src"])) $src=$_REQUEST['src'];
    if(isset($_REQUEST["pageid"])) $pageid=$_REQUEST['pageid'];
    
    if(!isset($cPath)) $cPath="134";

    $tweek = date("D");
    $tmonth = date("M");
    $tday = date("d");
    $tyear = date("Y");
    $month_day_year = date("M d, Y");
    $tm=date("h:m:s A");
	
    $cs2 = "select * from sms_company_bon where id='1' and status='1' order by id asc limit 1";
    $cr2 = $conn->query($cs2);
    if ($cr2->num_rows > 0) { while($crs2 = $cr2->fetch_assoc()) {
        
        $clogo=$crs2["logo"];
        $cfavicon=$crs2["favicon"];
        
        $mycountry="Bangladesh";
                
        $ccompanyname=$crs2["cname"];
        $caddress=$crs2["address"];
        $ccity=$crs2["city"];
        $cstate=$crs2["state"];
        $czip=$crs2["zip"];
        $ccountry=$crs2["country"];
        $cphone=$crs2["phone"];
        $cemail=$crs2["email"];
        $cservicehours=$crs2["servicehours"];
        
        $ccode=$crs2["ccode"];
        $csymbol=$crs2["csymbol"];
        $symbol_position=$crs2["symbol_position"];
        
        $ctin=$crs2["tin"];
        $cvat=$crs2["vat"];
        $clicense=$crs2["license"];
        $cstatus=$crs2["status"];
        
        $topbc=$crs2["top_bc"];
        $toptc=$crs2["top_tc"];
        $sidebc=$crs2["side_bc"];
        $sidetc=$crs2["side_tc"];
        $bodybc=$crs2["body_bc"];
        $bodytc=$crs2["body_tc"];
        $buttonbc=$crs2["button_bc"];
        $buttontc=$crs2["button_tc"];
        $footerbc=$crs2["footer_bc"];
        $footertc=$crs2["footer_tc"];
        
        /*
            if(strlen($cfavicon<=5) $cfavicon="assets/favicon.png";
            if(strlen($clogo)<=5) $clogo="assets/logo.png";
            if(strlen($mycountry)<=3) $mycountry="Bangladesh";
            if(strlen($cphone)<=3) $cphone="0000 000 0000";
        */
                
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
        
        $facebooklink=$crs2["facebook"];
        $twitterlink=$crs2["twitter"];
        $linkedinlink=$crs2["linkedin"];
        $youtubelink=$crs2["youtube"];
        $instagramlink=$crs2["instagram"];
        $pinterestlink=$crs2["pinterest"];

        $androidlink=$crs2["android"];
        $ioslink=$crs2["ios"];

    } }
    
    function bdmformat($number){
		$spl=str_split($number);
		$lpcount=count($spl);
		$rem=$lpcount-3;
		if($lpcount%2==0){
			for($i=0;$i<=$lpcount-1;$i++){
				if($i%2!=0 && $i!=0 && $i!=$lpcount-1) echo ",";
				echo $spl[$i];
			}
		}
		if($lpcount%2!=0){
			for($i=0;$i<=$lpcount-1;$i++){
				if($i%2==0 && $i!=0 && $i!=$lpcount-1) echo ",";
				echo $spl[$i];
			}
		}
	}
    
    $title="";
    $description="";
    $keywords="";
    $heading="";
    $details="";
    $urlz="";

    if(isset($bid)){
        $s2 = "select * from brand where id='$bid' and status='ON' order by id asc limit 1";
        $r2 = $conn->query($s2);
        if ($r2->num_rows > 0) { while($rs2 = $r2->fetch_assoc()) {
            $bname=$rs2["title"];
            $bintro=$rs2["introduction"];
            $bdetail=$rs2["detail"];
            $gimz=$rs2["image"];
            $title="$bname";
            $description="$bintro";
            $keywords="$bname, $bintro";
        } }
    }
			
	if(isset($prodid)){
	    $s3 = "select * from sms_product_bon where id='$prodid' order by id asc limit 1";
	    $r3 = $conn->query($s3);
        if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
		    $pname=$rs3["pname"];
		    $psku=$rs3["sku"];
            $pdescription=$rs3["introduction"];
            
		    $preactor=$rs3["reactor"];
            $s4 = "select * from multi_image where reactor='$preactor' order by sorder asc limit 1";
    	    $r4 = $conn->query($s4);
            if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) { $pimage=$rs4["image"]; } }
		    
            $pcat1=$rs3["cid"];
            $s5 = "select * from sms_link where id='$pcat1' order by id asc limit 1";
            $r5 = $conn->query($s5);
            if ($r5->num_rows > 0) { while($rs5 = $r5->fetch_assoc()) { $catname1=$rs5["pam"]; } }

            $pcat2=$rs3["cid2"];
            $s6 = "select * from sms_link where id='$pcat2' order by id asc limit 1";
            $r6 = $conn->query($s6);
            if ($r6->num_rows > 0) { while($rs6 = $r6->fetch_assoc()) { $catname2=$rs6["pam"]; } }
            $title="$pname";
            $description="$pdescription";
            $keywords="$pname, $psku,";
		} }
	}

	if(isset($catid)){
	    $s7 = "select * from sms_link where id='$catid' order by id asc limit 1";
        $r7 = $conn->query($s7);
        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
            $catname=$rs7["pam"];
            $title="$catname";
            $description="$catname";
            $keywords="$catname";
        } }
	}

    if(isset($bcid)){
	    $s77 = "select * from blog where id='$bcid' order by id asc limit 1";
        $r77 = $conn->query($s77);
        if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
            $title=$rs77["title"];
            $description=$rs77["introduction"];
            $keywords=$rs77["title"];
        } }
	}

    if(isset($pcid)){
	    $s77 = "select * from promo where id='$pcid' order by id asc limit 1";
        $r77 = $conn->query($s77);
        if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
            $title=$rs77["title"];
            $description=$rs77["detail"];
            $keywords=$rs77["title"];
        } }
	}

    if(isset($src)){	    
        $title="Search Result of $src";
        $description="Search Result of $src";
        $keywords=$src;
    }
    
    if(isset($pageid)){
	    $s77 = "select * from sms_webhost where identity='$pageid' order by id desc limit 1";
        $r77 = $conn->query($s77);
        if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
            $title=$rs77["title"];
            $description=$rs77["description"];
            $keywords=$rs77["keywords"];
        } }
	}

    $status=0;
    $mtype="GUEST";
	if(isset($userid)){
	    $s8 = "select * from sms_user2 where user_id='$userid' order by id asc limit 1";
        $r8 = $conn->query($s8);
        if ($r8->num_rows > 0) { while($rs8 = $r8->fetch_assoc()) {
            
            $useridx=$rs8["id"];
            $username=$rs8["name"];
            $username2=$rs8["name2"];
            $useremail=$rs8["email"];
            $userphone=$rs8["phone"];
            $userdate=$rs8["date"];
            $useraddress=$rs8["address"];
            $usercountry=$rs8["country"];
            $usercity=$rs8["city"];
            $userzip=$rs8["zip"];
            $status=$rs8["status"];
            $mytype=$rs8["mtype"];
            $userdob=$rs8["dob"];
            $userimage=$rs8["image"];
            
            $shoplogo=$rs8["slogo"];
            $sname=$rs8["sname"];
            $semail=$rs8["semail"];
            $sphone=$rs8["sphone"];
            $saddress=$rs8["saddress"];
            $sstate=$rs8["sstate"];
            $scountry=$rs8["scountry"];
            $shopprofile=$rs8["sprofile"];
            
            $deliverynote=$rs8["dnote"];
            $paymentterm=$rs8["paymentterm"];
            
            $shopkyc=$rs8["kyc"];
            $kyc1=$rs8["kyc1"];
            $kyc2=$rs8["kyc2"];
            $kyc3=$rs8["kyc3"];
            $kyc4=$rs8["kyc4"];
            $kyc5=$rs8["kyc5"];
            
            $points=0;
                        
            $affiliateid=$rs8["aid"];
            $accounttype=$rs8["actype"];
            $aniversary=$rs8["aniversary"];
            
            $followers=$rs8["followers"];
            // echo"$accounttype, $mtype";

            if($status==4){
                echo"<form method='POST' action='logout.php' name='logoutx'></form>";
                ?><script language=JavaScript> document.logoutx.submit(); </script><?php
            }
		} }
	}
	
    $linkname=0;
	$s9 = "select * from sms_link where id='$cPath' order by id asc limit 1";
	$r9 = $conn->query($s9);
    if ($r9->num_rows > 0) { while($rs9 = $r9->fetch_assoc()) { $linkname=$rs9["pam"]; } }
    
	$titlex=strlen("$title");
	$descriptionx=strlen("$description");
	$keywordsx=strlen("$keywords");
	
    if(isset($title)) echo"<TITLE>$title</TITLE>";
	else echo"<title>$ccompanyname - Call: $cphone Or $caddress</title>";

?>
