<?php
function Send_Mail($to,$subject,$message)
{
require 'class.phpmailer.php';
$from       = "manishsingh@chainwebber.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://md-32.webhostbox.net"; //  server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "manishsingh@chainwebber.com";  // SMTP  username
$mail->Password   = "manishsingh";  // SMTP password
$mail->SetFrom($from, 'www.eminenceultra.com');
$mail->AddReplyTo($from,'www.eminenceultra.com');
$mail->Subject    = $subject;
$mail->MsgHTML($message);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
