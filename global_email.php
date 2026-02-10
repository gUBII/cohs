<?php 
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ////////////////////////////////////////////////////////////////////
    $receiveremail = $_GET["r_email"];
    $receivername = $_GET["r_name"];
    $receiversubject= $_GET["r_subject"];
    $receiverbody= $_GET["r_body"];
    $randid = rand(123456, 987654);
    ////////////////////////////////////////////////////////////////////
    
    $to = "$receiveremail"; // Replace with $receiveremail for dynamic sending
    $subject = "$receiversubject";
    
    $headers = "From: noreply@nexis365.com\r\n";
    $headers .= "Reply-To: saas@nexis365.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "Cc: noreply@nexis365.com\r\n";
    // $headers .= "Bcc: nexis365.com@gmail.com\r\n";
    
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
            .container { max-width: 600px; background: #ffffff; margin: auto; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
            .logo { text-align: center; margin-bottom: 20px; }
            .code-box { font-size: 24px; background: #eef6ff; padding: 10px 20px; display: inline-block; border-radius: 6px; margin: 20px 0; }
            .footer { font-size: 12px; color: #888888; text-align: center; margin-top: 30px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='logo'><img src='https://nexis365.com/saas/assets/logo-nexis.png' style='height:40px' alt='NEXIS Solutions Logo'></div>
            <p>Dear <strong>$receivername</strong>,</p>
            <p>$receiverbody</p>
            <br><br><p>Note: For any assistance, please contact our support team.</p><br>
            <p>Kind regards,<br>NEXIS 365 Solutions Team</p>
            <div class='footer'>
                © 2025 NEXIS Solutions. All rights reserved.<br>
                <a href='https://nexis365.com' style='color:#888;'>nexis365.com</a> | saas@nexis365.com
            </div>
        </div>
    </body>
    </html>";

    if (mail($to, $subject, $message, $headers)){
        echo "<script>alert('Email Notification Sent.')</script>";
    } else {
        echo "<script>alert('Email sending failed.')</script>";
    }
?>
