<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

    if(isset($_POST["processor"])){
        if($_POST["processor"]=="sendemail"){
            
            // receiverid,subject,message
            include("include.php");
            $rz111 = "select * from uerp_user where id='".$_POST["receiverid"]."' and status='1' order by username asc limit 1";
            $rz11 = $conn->query($rz111);
            if ($rz11->num_rows > 0) { while($rz1 = $rz11->fetch_assoc()) {
                $receivername="".$rz1["username"]." ".$rz1["username2"]."";
                $receiveremail=$rz1["email"];
            } }
            $subject=str_replace("'", "`", $_POST["subject"]);
            $message=str_replace("'", "`", $_POST["message"]);
            
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
                $mail->setFrom('admin@goodwillcare.net', 'Goodwill Care');
                $mail->addAddress("$receiveremail", "$receivername");
                // $mail->addAddress("maeynuor@gmail.com", "$receivername");
                $mail->addReplyTo('admin@goodwillcare.net', 'Goodwill Care'); // to set the reply to
            
                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "$subject";
                $mail->Body = "<br><br><center><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:120px'><img src='https://app.goodwillcare.net/ndis-provier-logo.jpg' style='width:150px'></center><hr><p>Hi $receivername,<br><br>$message";
                $mail->AltBody = 'Dear $employeename, A shift was assigned to you in Goodwill Care Roster: Please login to your account and accept the allocation.';
            
                $mail->send();
                echo "Email Sent.";
                echo"<script>alert('Email sent to $receiveremail Successfully...')</script>";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
?>
