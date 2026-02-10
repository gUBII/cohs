<?php
    $receiveremail=$_GET["reml"];
    $receivername=$_GET["rnm"];
    $dbn=$_GET["dbn"];
    $rid=$_GET["rid"];
    
    $randid=rand(1111119,9999999);
    $rx=md5($randid);
    if(isset($_COOKIE["vcode"])){
        unset($_COOKIE["vcode"]);
        setcookie("vcode", "", time() -9999999);
    }
    setcookie("vcode", $rx, time()+9999999);
    
    if(isset($_COOKIE["emailid"])){
        unset($_COOKIE["emailid"]);
        setcookie("emailid", "", time() -9999999);
    }
    setcookie("emailid", $receiveremail, time()+9999999);
    
    if(isset($_COOKIE["rid"])){
        unset($_COOKIE["rid"]);
        setcookie("rid", "", time() -9999999);
    }
    setcookie("rid", $rid, time()+9999999);
    
    if(isset($_COOKIE["dbn"])){
        unset($_COOKIE["dbn"]);
        setcookie("dbn", "", time() -9999999);
    }
    setcookie("dbn", $dbn, time()+9999999);
    
    $to = "$receiveremail";
    $subject = "Account Recovery Verification Code from NEXIS Solutions";
    $headers = "From: saas@nexis365.com\r\n";
    $headers .= "Reply-To: saas@nexis365.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $message = "Dear $receivername, 
Your password change request is approved and we have sent you this verification code to verify your email and reset your password. Verification Code: [ $randid ]. Security Note: If this this email is not sent by your initiative, please immediately check your account and seccure your account by changing password.";

    if (mail($to, $subject, $message, $headers)){
        echo"<script>alert('Email sent, Please check and use CODE to reset your password.')</script>";
        echo"<form method='post' action='resetpassword.php' name='main' target='_top'>
            <input type=hidden name='message' value='Account Recovery OTP<br>sent to your $receiveremail. Please check and confirm.'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }else{
        echo "Email sending failed.";
    }
?>