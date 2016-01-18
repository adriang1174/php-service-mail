<?php
/**
 * Simple service to send an email.
 */

require 'vendor/autoload.php';
require 'config.php';

function createMessageFromPost($fline)
{
    $txt = $fline . '<p>';
    foreach($_POST as $key => $value)
    {
    	$txt .= $key . ': '.$value .' <BR>';
    }  
    return $txt;
}

//Create a new PHPMailer instance
$ret = array('data'=>$_POST);
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.mandrillapp.com";
$mail->Port = 587;
$mail->Username = "adriang_1174@hotmail.com";
$mail->Password = "G4Q1_8N7pAJKuwFXkC8YVw";
$mail->setFrom($from , $from_name);
$mail->addAddress($to, $to_name);
$mail->Subject = $subject;
$mail->msgHTML ( createMessageFromPost($first_line));
if (!$mail->send()) {
    $ret = array('Response'=>'ERR','Description'=>'Mailer Error: ' . $mail->ErrorInfo) + $ret;
} else {
    $ret = array('Response'=>'OK','Description'=>'Service executed successfully') + $ret;
}

echo json_encode($ret);
?>
