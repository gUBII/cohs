<!DOCTYPE html>
<html class='no-js' lang='en'>
<?php
    echo"<iframe name='addtocartx' src='blank.php' height='10' width='10' scrolling='no' border='0' frameborder='0' style='position:absolute;z-index:-999'>&nbsp;</iframe>";
    if(!isset($_COOKIE["guestid"])){
        $guestidx=rand(1000000000000000000,9000000000000000000);
        echo"<form method='post' action='addtocookie.php' name='guestid' target='addtocartx' enctype='multipart/form-data' name='rowcounter'>
            <input type='hidden' name='gusetidx' value='$guestidx'>
        </form>";
        // setcookie("guestid", $guestidx, time()+9999999);
        ?> <script language=JavaScript> document.guestid.submit(); </script> <?php
    }
    if(!isset($_COOKIE["rowset"])){
        echo"<form method='post' action='addtocookie.php' name='sortid' target='addtocartx' enctype='multipart/form-data' name='rowcounter'>
            <input type='hidden' name='rowsetx' value='8'><input type='hidden' name='sortset1' value='id'><input type='hidden' name='sortset2' value='Z'>
        </form>";
        ?> <script language=JavaScript> document.sortid.submit(); </script> <?php
    }
    
    // error_reporting(0);
    include('include.php');
    
    date_default_timezone_set("Asia/Dhaka");
    
    if(isset($_SERVER["SERVER_NAME"])) $sh=$_SERVER["SERVER_NAME"]; else $sh=null;
    if(isset($_SERVER['REMOTE_ADDR'])) $ip=$_SERVER['REMOTE_ADDR']; else $ip=null;

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
    
        if($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }
        // return 'IP: '.$ip.' # Country: '.$country;
        return $country;
    }

    $mycountry=ip_visitor_country();
    $ccounter=strlen("$mycountry");
        
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

    // $ccounter=usa;    
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
	if(isset($_COOKIE["track"])){
	    $s8 = "select * from sms_user2 where id='".$_COOKIE["track"]."' order by id asc limit 1";
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
        
        
        
        $cartqty=0;
        $s99 = "select * from sms_cart where cid='".$_COOKIE["guestid"]."' order by id asc limit 2";
	    $r99 = $conn->query($s99);
        if ($r99->num_rows > 0) { while($rs99 = $r99->fetch_assoc()) { $cartqty=($cartqty+1); } }
        // echo" ".$_COOKIE["guestid"]." ";
        if($cartqty>=1){
            $sql = "update sms_cart set cid='".$_COOKIE["track"]."' where cid='".$_COOKIE["guestid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
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
    
    echo"<meta name='facebook-domain-verification' content='mnsqrsxc2s1a8igldwfqtmczovnrh6' />
    	<meta charset='utf-8'>
    	<meta http-equiv='x-ua-compatible' content='ie=edge'>
    	<META name='description' content='$description'>
    	<META name='keywords' content='$title'>
    	<META NAME='Author' CONTENT='$title'>
    	<META NAME='Publisher' CONTENT='$title'>
    	<META NAME='Copyright' CONTENT='$title'>
    	<META NAME='Robots' CONTENT='ALL'>
    	<META NAME='Robots' CONTENT='INDEX,FOLLOW'>
    	<META NAME='Revisit-After' CONTENT='5 Days'>
    	<META NAME='Distribution' CONTENT='Global'>
    	<META NAME='Rating' CONTENT='General'>
    	<META NAME='Subject' CONTENT='$description'>
    	<META NAME='Classification' CONTENT='internet'>
    	<META NAME='Abstract' CONTENT='$title'>
    	<meta property='og:title' content='$title'>
        <meta property='og:site_name' content='$title'>
        <meta property='og:url' content='$urlz'>
        <meta property='og:description' content='$description'>
        <meta property='og:type' content='article'>
        <meta property='og:locale' content='en_US'>
        <meta property='og:locale:alternate' content='bn_BN'>
        <meta property='article:author' content='$facebooklink'>
        <meta property='article:publisher' content='$facebooklink'>
        <meta property='og:image' content='media/$cfavicon'>
        <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
        <meta name='author' content='$description'>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1'>
        <meta property='fb:admins' content='$ccompanyname'/>
        <meta name='twitter:card' content='summary'>
        <meta name='twitter:url' content='$urlz'>
        <meta name='twitter:title' content='$title'>
        <meta name='twitter:description' content='$description'>
        <meta name='twitter:image' content='media/$cfavicon'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		
        <link rel='shortcut icon' type='image/x-icon' href='media/$cfavicon'>
        <link rel='stylesheet' href='assets/css/main.css?v=3.4'>
        <link rel='stylesheet' href='assets/font-awesome/css/font-awesome.min.css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>";
    ?>  
        <style type="text/css">
            .loader-div {
                display: none;
                position: fixed;
                margin: 0px;
                padding: 0px;
                right: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                background-color: #fff;
                z-index: 30001;
                opacity: 0.8;
            }
            .loader-img {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }
        </style>

        <script type="text/javascript">
            function ChangeUrl(url) {
                history.pushState(null, null, url);
        }
        </script>
        
        <script type=text/javascript>
			$(document).ready(function(){
				setInterval(function(){
					$("#cartdiv").load("cartstatus.php");
                    $("#favouritediv").load("favouritestatus.php");
                    $("#comparediv").load("comparestatus.php");
                    $("#cartcontainer1").load("cartcontainer1.php");
                    $("#cartcontainer2").load("cartcontainer2.php");
                    $("#cartcontainer").load("cartcontainer.php");
					refresh();
				},2000);
			});
		
			function goBack() {
			  window.history.back();
			}
            
			function seller_visible(){				
                var x = document.getElementById("storedetail");
                x.style.display = "block";                
			}

            function seller_hidden(){
                document.formusersregistration.sname.value="";
                document.formusersregistration.saddress.value="";
                document.formusersregistration.sphone.value="";
                var x = document.getElementById("storedetail");
                x.style.display = "none";
			}

            function clr_set2(){
				document.formusersloginx.sname.style.visibility="visible";
			}
			function clr_set1(){
				document.formusersloginx.sname.style.visibility="hidden";
			}

            function clr_menu0(){
                document.catmenux.style.visibility="hidden";
            }
            function clr_menu1(){
                document.catmenux.style.visibility="visible";
            }
		</script>

		<script src="jquery.cookie.js"></script>
		
        <script type=text/javascript>
            function setScreenHWCookie() {
                $.cookie('sw',screen.width);
                $.cookie('sh',screen.height);
                return true;
            }
            setScreenHWCookie();
        </script>
		        
		<style>

            @media screen and (max-width: 600px) {
                div.hide-area {
                    display: none;
                }
                div.show-area {
                    display: inline;
                }
                div.resize-area {
                    width: 100%;
                }
            }

            @media screen and (min-width: 650px) {
                div.hide-area1 {
                    display: none;
                }
                div.show-area1 {
                    display: inline;
                }
                div.resize-area1 {
                    width: 93%;
                }
            }
       
            #myBtn {
              display: none;
              position: fixed;
              bottom: 75px;
              right: 10px;
              z-index: 99;
              font-size: 18px;
              border: none;
              outline: none;
              color: white;
              cursor: pointer;
              padding: 7px;
              border-radius: 4px;
            }

            .zoomx {
              transition: transform .2s;
              font-size: 12px;
              margin: 0 auto;
            }
            
            .zoomx:hover {
              -ms-transform: scale(1.05); /* IE 9 */
              -webkit-transform: scale(1.05); /* Safari 3-8 */
              transform: scale(1.05); 
            }
            
            .zoomz {
              transition: transform .2s;
              font-size: 12px;
              margin: 0 auto;
            }
            
            .zoomz:hover {
              background-color:orange;
              color:white;
              border-radius:5px;
              padding-left:10px;
              padding-right:10px;
              -ms-transform: scale(1.1); /* IE 9 */
              -webkit-transform: scale(1.1); /* Safari 3-8 */
              transform: scale(1.1); 
            }

            .glow {
                font-size: 80px;
                color: #fff;
                text-align: center;
                animation: glow 1s ease-in-out infinite alternate;
            }
            
            /* @-webkit-keyframes glow { */
            @keyframes glow {
                from {
                    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
                }
              
                to {
                    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
                }
            }
            
            .blink {
                animation: blinker 0.8s linear infinite;
                color: #FFFFFF;
            }

            @keyframes blinker {
                50% {
                  opacity: 0;
                }
            }

            .blink-one {
                animation: blinker-one 1s linear infinite;
            }

            @keyframes blinker-one {
                0% {
                    opacity: 0;
                }
            }

            .blink-two {
                animation: blinker-two 1.4s linear infinite;
            }

            @keyframes blinker-two {
                100% {
                    opacity: 0;
                }
            }

            a:link { color: #000000; }
            a:visited { color: #000000; }
            a:hover { color: #44bc9d; }
            a:active { color: #44bc9d; }

            #myDIV {
                width: 100%;
                text-align: center;
            }
            
            .tooltip {
              position: relative;
              display: inline-block;
            }

            .tooltip .tooltiptext {
              visibility: hidden;
              width: 140px;
              background-color: #555;
              color: #fff;
              text-align: center;
              border-radius: 6px;
              padding: 5px;
              position: absolute;
              z-index: 1;
              bottom: 150%;
              left: 50%;
              margin-left: -75px;
              opacity: 0;
              transition: opacity 0.3s;
            }

            .tooltip .tooltiptext::after {
              content: "";
              position: absolute;
              top: 100%;
              left: 50%;
              margin-left: -5px;
              border-width: 5px;
              border-style: solid;
              border-color: #555 transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
              visibility: visible;
              opacity: 1;
            }
        </style>

        <style>
            * {
                box-sizing: border-box;
            }

            img {
                vertical-align: middle;
            }

            /* Position the image container (needed to position the left and right arrows) */
            .container {
                position: relative;
            }

            /* Hide the images by default */
            .mySlides {
                display: none;
            }

            /* Add a pointer when hovering over the thumbnail images */
            .cursor {
                cursor: pointer;
            }

            /* Next & previous buttons */
            .prev,
            .next {
                cursor: pointer;
                position: absolute;
                top: 40%;
                width: auto;
                padding: 16px;
                margin-top: -50px;
                color: white;
                font-weight: bold;
                font-size: 20px;
                border-radius: 0 3px 3px 0;
                user-select: none;
                -webkit-user-select: none;
            }

            /* Position the "next button" to the right */
            .next {
            right: 0;
            border-radius: 3px 0 0 3px;
            }

            /* On hover, add a black background color with a little bit see-through */
            .prev:hover,
            .next:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }

            /* Number text (1/3 etc) */
            .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
            }

            /* Container for image text */
            .caption-container {
                text-align: center;
                background-color: #222;
                padding: 2px 16px;
                color: white;
            }

            .row:after {
                content: "";
                display: table;
                clear: both;
            }

            /* Six columns side by side */
            .column {
                float: left;
                width: 16.66%;
            }

            /* Add a transparency effect for thumnbail images */
            .demo {
                opacity: 0.6;
            }

            .active,
            .demo:hover {
                opacity: 1;
            }
            
            /*Notification Snackbar and toastbar*/
            #cartbar {
                visibility: hidden;
                min-width: 250px;
                margin-left: -125px;
                background-color: #333;
                color: #fff;
                text-align: center;
                border-radius: 2px;
                padding: 16px;
                position: fixed;
                z-index: 1;
                left: 50%;
                bottom: 30px;
                font-size: 17px;
            }
            #favouritebar {
                visibility: hidden;
                min-width: 250px;
                margin-left: -125px;
                background-color: #333;
                color: #fff;
                text-align: center;
                border-radius: 2px;
                padding: 16px;
                position: fixed;
                z-index: 1;
                left: 50%;
                bottom: 30px;
                font-size: 17px;
            }
            #comparebar {
                visibility: hidden;
                min-width: 250px;
                margin-left: -125px;
                background-color: #333;
                color: #fff;
                text-align: center;
                border-radius: 2px;
                padding: 16px;
                position: fixed;
                z-index: 1;
                left: 50%;
                bottom: 30px;
                font-size: 17px;
            }

            #cartbar.show {
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
            }

            #favouritebar.show {
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
            }

            #comparebar.show {
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
            }

            @-webkit-keyframes fadein {
                from {bottom: 0; opacity: 0;} 
                to {bottom: 30px; opacity: 1;}
            }

            @keyframes fadein {
                from {bottom: 0; opacity: 0;}
                to {bottom: 30px; opacity: 1;}
            }

            @-webkit-keyframes fadeout {
                from {bottom: 30px; opacity: 1;} 
                to {bottom: 0; opacity: 0;}
            }

            @keyframes fadeout {
                from {bottom: 30px; opacity: 1;}
                to {bottom: 0; opacity: 0;}
            }
        </style>
        <script>
            function cartToast() {
                var x = document.getElementById("cartbar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
            }
            function favouriteToast() {
                var x = document.getElementById("favouritebar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
            }function compareToast() {
                var x = document.getElementById("comparebar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
            }
        </script>

        <div id='favouritebar' style='z-index:9999999'>Item Added to Cart ( <a href='#top' style='cursor: pointer' onclick="ChangeUrl('index.php?cPath=80000&lid=2'); shiftdatax('product_favourite.php&cm=1', 'datashiftX')" target='_self' title='Favourite Product'><span style='color:yellow'>View My Favourite List</span></a> ).</div>
        <div id='comparebar' style='z-index:9999999'>Item Added to Cart ( <a href='#top' style='cursor: pointer' onclick="ChangeUrl('index.php?cPath=80000&lid=1'); shiftdatax('product_compare.php&cm=1', 'datashiftX')" target='_self' title='Compare Product'><span style='color:yellow'>View My Compare List</span></a> ).</div>
        <div id='cartbar' style='z-index:9999999'>Item Added to Cart ( <a href='#top' style='cursor: pointer' onclick="ChangeUrl('index.php?cPath=80000&lid=3'); shiftdatax('product_cart.php&cm=1', 'datashiftX')" target='_self' title='Shopping Cart'><span style='color:yellow'>View My Cart & Place Order</span></a> ).</div>
        
        <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=66a3e1f03ca64b0019342dc8&product=inline-share-buttons' async='async'></script>
            
    <?php echo"</head>
     
	<body onload='getLocation()' style='background-color:$bodybc;color:$bodytc'>
        
	    <a id='myBtn' href='https://api.whatsapp.com/send?phone=+8801969493909&text=Hi' target='_blank'><img src='assets/whatsapp.png' style='width:50px'></a>";
    	
		// TOP-AD
        include("banner-1.php");
		
        // Modal Window
        // include("banner-popup.php");
      
        include("product-quickview.php");

        echo"<div class='wrapper-area'>";
		
		    include("header.php");
			
			echo"<div id='main-content' style='background-color:$bodybc;color:$bodytc'>";
			
?>
