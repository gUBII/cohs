<?php
    include("authenticator.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once __DIR__ . 'assets/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . 'assets/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . 'assets/vendor/phpmailer/src/SMTP.php';

    if(isset($_POST["remail"])){
        if(isset($_POST["rsubject"])){
            // passing true in constructor enables exceptions in PHPMailer
            $mail = new PHPMailer(true);
            
            try {
                // Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
                $mail->isSMTP();
                $mail->Host = 'mail.purchasehaat.xyz';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
            
                $mail->Username = '$cemail'; // YOUR gmail email
                $mail->Password = 'AmaderBangladesh@321'; // YOUR gmail password
                
                $remail=$_POST["remail"];
                $rname=$_POST["rname"];
                $rubject=$_POST["rsubject"];
                $rdetail=$_POST["rdetail"];
                
                // Sender and recipient settings
                $mail->setFrom('$cemail', '$ccompanyname Support Desk');
                $mail->addAddress("$remail", "$rname");
                // $mail->addAddress("maeynuor@gmail.com", "$employeename");
                $mail->addReplyTo('$cemail', '$ccompanyname Support Desk'); // to set the reply to
            
                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "$rsubject";
                $mail->Body = "<br><br><center><img src='https://$sh/media/$clogo' style='width:120px'></center><hr>
                    <p>Dear Sir/Medam ($rname),<br><br> $rdetail";
                $mail->AltBody = 'Dear Sir/Medam ($rname), $rdetail';
            
                $mail->send();
                echo "Email Sent.";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>
