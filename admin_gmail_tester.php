<?php
//    $mail->Host       = 'host71.registrar-servers.com';
//    $mail->Username   = 'noreply@nexis365.com'; // Your Gmail address
//    $mail->Password   = 'Bangladesh$$786';   // yijr ytfp rabn ysyr Gmail App Password (not your login password)
?>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'nexis365.com@gmail.com';          // ✅ Your Gmail
    $mail->Password   = 'yijr ytfp rabn ysyr';            // ✅ Your Gmail App Password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Sender/Receiver
    $mail->setFrom('nexis365.com@gmail.com', 'NEXIS Solutions');
    $mail->addAddress('maeynuor@gmail.com'); // Replace with dynamic receiver
    $mail->addReplyTo('nexis365.com@gmail.com');

    // Variables
    $randid = rand(123456, 987654);
    $receivername = "Maeynuor"; // Replace with dynamic name if needed

    // Email Content
    $mail->isHTML(true);
    $mail->Subject = "Account Recovery Verification Code from NEXIS Solutions";
    $mail->Body = "
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
            <div class='logo'>
                <img src='https://via.placeholder.com/180x60?text=NEXIS+Solutions' alt='NEXIS Solutions Logo'>
            </div>
            <p>Dear <strong>$receivername</strong>,</p>
            <p>We received a request to reset the password associated with your NEXIS Solutions account.</p>
            <p>Please use the following verification code to continue with the process:</p>
            <div class='code-box'>[ <strong>$randid</strong> ]</div>
            <p>If you did not request this code, we recommend you secure your account immediately by updating your password and reviewing your recent activity.</p>
            <p>For any assistance, please contact our support team.</p>
            <br>
            <p>Kind regards,<br>The NEXIS Solutions Team</p>
            <div class='footer'>
                © 2025 NEXIS Solutions. All rights reserved.<br>
                <a href='https://nexis365.com' style='color:#888;'>nexis365.com</a> | saas@nexis365.com
            </div>
        </div>
    </body>
    </html>";

    $mail->send();
    echo "<script>alert('Email sent successfully.')</script>";
} catch (Exception $e) {
    echo "<script>alert('Email Error: {$mail->ErrorInfo}')</script>";
}
?>
