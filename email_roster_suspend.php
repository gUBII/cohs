<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

    if(isset($_POST["processor"])){
        if($_POST["processor"]=="shiftallocation"){
            // passing true in constructor enables exceptions in PHPMailer
            $mail = new PHPMailer(true);
            
            try {
                // Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
                $mail->isSMTP();
                $mail->Host = 'mail.nexis365.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
            
                $mail->Username = 'admin@nexis365.com'; // YOUR gmail email
                $mail->Password = 'Nexis365@098765'; // YOUR gmail password
                
                $semail=$_POST["semail"];
                $employeename=$_POST["employeename"];
                $clientname=$_POST["$clientname"];
                    
                // Sender and recipient settings
                $mail->setFrom('admin@goodwillcare.net', 'Goodwill Care Rostering Team');
                $mail->addAddress("$semail", "$employeename");
                $mail->addReplyTo('admin@goodwillcare.net', 'Goodwill Care Rostering Team'); // to set the reply to
            
                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "Shift Suspended. Please Check Status.";
                $mail->Body = "<br><br><center><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:120px'><img src='https://app.goodwillcare.net/ndis-provier-logo.jpg' style='width:150px'></center><hr><p>Dear $employeename,<br>Shift is suspended for Client: $clientname. Please login to your account and check status.";
                $mail->AltBody = "Dear $employeename, Shift is suspended for Client: $clientname. Please login to your account and check status.";
            
                $mail->send();
                echo "Email Sent.";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>
