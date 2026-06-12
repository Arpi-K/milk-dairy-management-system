<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail= new PHPMailer(true);

$alert='';
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];
    try{
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'arpithahebbark@gmail.com';                     
        $mail->Password   = '*appi&12#';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = '465';   
        
        $mail->setFrom('arpithahebbark@gmail.com');
        $mail->addAddress('arpithahebbark@gmail.com');    
        
        $mail->isHTML(true);                                  
        $mail->Subject = 'Message Received (Contact Form)';
        $mail->Body    = '<h3>Name: $name <br>Email: $email<br>Message: $msg</h3>';

        $mail->send();
        $alert= "
            <div class='alert alert-success'>
            <strong>Message Sent! Thank you for Contacting Us.</strong>
            </div>
            ";
} catch(Exception $e) {
    echo $e->getMessage();
}
    }
?>