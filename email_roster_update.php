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
            
                $clientname=$_POST["$clientname"];
                $stime=$_POST["$stime"];
                $etime=$_POST["$etime"];
                $address=$_POST["$address1"];
                $admin_note=$_POST["$note1"];
                    
                // Sender and recipient settings
                $mail->setFrom('admin@goodwillcare.net', 'Goodwill Care Rostering Team');
                $mail->addAddress("$semail", "$employeename");
                $mail->addReplyTo('admin@goodwillcare.net', 'Goodwill Care Rostering Team'); // to set the reply to
            
                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "Shift Data Updated. Please Check updates.";
                $mail->Body = "<br><br><center><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:120px'><img src='https://app.goodwillcare.net/ndis-provier-logo.jpg' style='width:150px'></center><hr><p>Dear $employeename,<br>Shift data is updated.<br><br>ClockIN: $stime, Clock-OUT: $etime,<br><br>Client: $clientname - $address<br><br>Admin Note: $admin_note.<br><br>Please login to your account and check new updates.";
                $mail->AltBody = "Dear $employeename, Shift data is updated. ClockIN: $stime, Clock-OUT: $etime. Client: $clientname - $address. Admin Note: $admin_note. Please login to your account and check new updates.";
            
                $mail->send();
                echo "Email Sent.";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>
