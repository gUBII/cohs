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
                $mail->Host = 'mail.goodwillcare.net';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
            
                $mail->Username = 'admin@goodwillcare.net'; // YOUR gmail email
                $mail->Password = 'Nexiscare.com@gmail.com'; // YOUR gmail password
                
                $semail=$_POST["semail"];
                $employeename=$_POST["employeename"];
                
                // Sender and recipient settings
                $mail->setFrom('admin@goodwillcare.net', 'Goodwill Care Rostering Team');
                $mail->addAddress("$semail", "$employeename");
                // $mail->addAddress("maeynuor@gmail.com", "$employeename");
                $mail->addReplyTo('admin@goodwillcare.net', 'Goodwill Care Rostering Team'); // to set the reply to
            
                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "A shift was assigned to you in Goodwill Care Roster.";
                $mail->Body = "<br><br><center><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:120px'><img src='https://app.goodwillcare.net/ndis-provier-logo.jpg' style='width:150px'></center><hr><p>Hi $employeename,<br><br>A shift was assigned to you in Goodwill Care Roster for client <b>".$_POST["clientname"]."</b>. Please login to your account and accept the allocation.";
                $mail->AltBody = 'Dear $employeename, A shift was assigned to you in Goodwill Care Roster: Please login to your account and accept the allocation.';
            
                $mail->send();
                echo "Email Sent.";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>
