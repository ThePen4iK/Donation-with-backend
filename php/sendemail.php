<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../libs/PHPMailer/src/Exception.php';
require '../libs/PHPMailer/src/PHPMailer.php';
require '../libs/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'PHPMailer/language/');

$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

$mail->SMTPAuth = true;

$mail->Username = 'mailsendmysites@gmail.com';
$mail->Password = '112321364';

$mail->setFrom('from@example.com', 'First Last');
$mail->addReplyTo('replyto@example.com', 'First Last');
$mail->addAddress('infoTeamVM@gmail.com', 'John Doe');

$mail->Subject = htmlspecialchars($_POST['form_title'] ?? 'not found');
$mail->Body    = '<br>Name: ' . htmlspecialchars($_POST['name']) ;
$mail->Body    .= '<br> Surname: ' . htmlspecialchars($_POST['sname']) ;
$mail->Body    .= '<br> Telephone: ' . htmlspecialchars($_POST['phone']) ;
$mail->Body    .= '<br> Email: '  . htmlspecialchars($_POST['email']) ;
$mail->Body    .= '<br> Text: '  . htmlspecialchars($_POST['email']) ;
$mail->Body    .= '<br> Agree: ' . htmlspecialchars($_POST['checkbox']);
$mail->AltBody = 'This is a plain-text message body';

var_dump($mail->Subject);

if (!$mail->send()) {
    $message = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $message = 'Message sent!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

//$mail->CharSet = 'UTF-8';
//$mail->setLanguage('ru', 'PHPMailer/language/');
//$mail->IsHTML(true);
//// infoTeamVM@gmail.com evgeniy152001@gmail.com
//$mail->addAddress('infoTeamVM@gmail.com');



//if(!$mail->send()){
//    $message = 'ошибка';
//}else{
//    $message = 'отправленно';
//}
//
//$response = ['message' => $message];
//

