<?php
    // error_reporting(0);    
    include('include.php');   
    
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
?>
