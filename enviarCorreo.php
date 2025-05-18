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

if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

    $secretKey = '6LfPZjcrAAAAAKyCRi-cVrgxhws7d5Qel4l7fG-w';
    
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
    
    $response = json_decode($verifyResponse);
    if($response->success){
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
        header("Location: Enviado.html");
    } else{
        $_SESSION['status'] = "Something went wrong";
        header("Location: {$_SERVER["HTTP_REFERER"]}");
    }

} else{
    $_SESSION['status'] = "Error in recaptcha verification";
    header("Location: {$_SERVER["HTTP_REFERER"]}");
}

?>