<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
    require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
    require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

            /*
            error_reporting(0);
            include('include.php');
            $randidz=0;
            $rr = "select * from receipt_voucher where invoice_no='".$_POST["iid"]."' and ledger_id='".$_POST["lid"]."' order by id desc limit 1";
            $rr1 = $conn->query($rr);
            if ($rr1->num_rows > 0) { while($rr11 = $rr1 -> fetch_assoc()) { $randidz=$rr11["randomid"]; } }
            
            if($randidz==0){
                $sql="update receipt_voucher set randomid='$rid' where invoice_no='".$_POST["iid"]."' and ledger_id='".$_POST["lid"]."'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }else{
                $rid=$randidz;
            }
            
            */
            
            // passing true in constructor enables exceptions in PHPMailer
            
            $mail = new PHPMailer(true);
            
            try {
                // Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
            
                $mail->Username = 'nexis365.com@gmail.com'; // YOUR gmail email
                $mail->Password = 'sjacwlbuzxwmzvpp'; // YOUR gmail password
                
                $semail="sheba247.com@gmail.com";
                $sname="Maeynuor Chowdhury";
                $companydetail="sMs Software";
                // Sender and recipient settings
                $mail->setFrom('nexis365.com@gmail.com', 'Nexis 365');
                
                $mail->addAddress("$semail", "$sname");
                
                $mail->addReplyTo('nexis365.com@gmail.com', 'Nexis 365'); // to set the reply to
                
                // $mail->addCC("maeynuor@nexis365.com"); 
                
                // $mail->addBCC("maeynuor@smsbd.com, maeynuor@kroyee.com");
                
                // Setting the email content
                $mail->IsHTML(true);
                $mail->Subject = "Nexis - Digital Invoice for Maeynuor is sent to you.";
                $mail->Body = "<br><br><center><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:120px'><img src='https://app.goodwillcare.net/ndis-provier-logo.jpg' style='width:150px'></center><hr><p>Dear Maeynuor,<br><br>Digital Invoice (PDF Version) generator link is attached for your reference. <a href='https://app.goodwillcare.net/ledger_invoice_pdf.php?iid=$iid&lid=$lid&token=$rid'>Click here to View and Download Digital Invoice as PDF file.</a>.<br><br>Yours Truly,<br>Thank you.";
                $mail->AltBody = "Dear Maeynuor, Digital Invoice (PDF Version) generator link is attached for your reference. <a href='https://app.goodwillcare.net/ledger_invoice_pdf.php?iid=$iid&lid=$lid&token=$rid'>Click here to View and Download Digital Invoice as PDF file.</a>. Yours Truly, Thank you";
            
                $mail->send();
                echo "Email Sent.";
                echo"<script>alert('Email sent to $semail Successfully...')</script>";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
    
?>
