<?php

$name = $_POST["firstname"] . " " . $_POST["lastname"];
$email = $_POST["email"];
$subject = "Mensaje de contacto de: " . $_POST["firstname"]. " " . $_POST["lastname"];
$message = "Mensaje directo de página web" . "\r\n\r\n" . $_POST["message"] . "\r\n\r\n" . "Telefono: " . $_POST["phone"] . "\r\n\r\n" . "Correo electrónico: " . $_POST["email"];

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port= 587;

$mail->Username = "noreply.enkor@gmail.com";
$mail->Password = "uyrh azxl pads gbee";

$mail->setFrom($email, $name);
$mail->addAddress("cottage.christian@gmail.com", "ENKOR-TECH");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();
    
/*echo "email sent";*/
header("Location: Sent.html");

?>