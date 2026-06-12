<?php
session_start();
$con=new mysqli("localhost","root","","phpdairy");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
function send_password_reset($get_name,$get_email,$password){
    $mail = new PHPMailer(true);                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'arpithahebbark@gmail.com';                     //SMTP username
    $mail->Password   = '*appi&12#';                               //SMTP password
    $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('arpithahebbark@gmail.com', $get_name);
    $mail->addAddress($get_email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'reset password notification';
    $email_template="
    <h2>Hello</h2>
    <h3>You are receiving this email because we received a password reset request for your account.</h3>
    <br/><br/>
    <a href='http://localhost/phpdairy/password-reset.php?pwd=$password&email=$get_email'>Click Me</a>";
    $mail->Body=$email_template;
    $mail->send();
} 
if(isset($_POST['password_reset_link'])){
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $check_mail="SELECT * FROM tblproducer WHERE p_mail='$email' LIMIT 1 ";
    $check_mail_run=mysqli_query($con,$check_mail);
    if(mysqli_num_rows($check_mail_run)>0){
        $row=mysqli_fetch_array($check_mail_run);
        $get_name=$row['p_name'];
        $get_email=$row['p_mail'];
        $password=$row['p_pwd'];
        send_password_reset($get_name,$get_email,$password);
        $_SESSION['status']="We emailed you a password reset link";
        header("Location:password-reset.php");
        exit(0);
    }else{
        $_SESSION['status']="No email Found";
        header("Location:password-reset.php");
        exit(0);
    }
}