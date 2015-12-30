<?php
/**
 * Simple service to send an email.
 */

require 'vendor/autoload.php';


$from = 'info@labolatorioraffo.com';
$froma_name = 'Laboratorio Raffo';
$to = 'adriang_1174@hotmail.com';
$to_name = 'Adrian';
$message = 'This is a test';

//Create a new PHPMailer instance
$mail = new PHPMailer;
// Set PHPMailer to use the sendmail transport
$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom('info@labolatorioraffo.com', 'Laboratorio Raffo');
//Set an alternative reply-to address
$mail->addReplyTo('info@labolatorioraffo.com', 'Laboratorio Raffo');
//Set who the message is to be sent to
$mail->addAddress('adriang_1174@hotmail.com', 'Adrian');
//Set the subject line
$mail->Subject = 'PHPMailer sendmail test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body = $message;
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
