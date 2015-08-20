<?php
session_start();
require_once 'business/gebruikerSERVICE.php';
require 'PHPMailerAutoload.php';

unset($_SESSION["message"]);


if(isset($_SESSION["ingelogd"])){
$gebruikerServ=new GebruikerService();
$emailContact = $gebruikerServ->getEmailGebruiker($_SESSION["id"]);
}
if(isset($_GET["contact"])&& $_GET["contact"]="zend"){
    //kontrole allebei de velden ingevuld?
    if(isset($_POST["email"],$_POST["textarea"])&&!empty($_POST["email"]) && !empty($_POST["textarea"])){
       
        if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){

            $mail = new PHPMailer;

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'postmaster@sandbox6d7f1694b84c4f5abd6378327b060984.mailgun.org';   // SMTP username
            $mail->Password = 'df1c211fa1ed551be7d6fdf3d0be7450';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

            $mail->From = 'bakkerij@examen.com';
            $mail->FromName = 'Nick';
            $mail->addAddress('nick.thieuw@yahoo.com');                 // Add a recipient

            $mail->WordWrap = 120;                                 // Set word wrap to 50 characters

            $mail->Subject = 'Contact Bakkerij';
            $mail->Body    = 'Email Gebruiker: '.$_POST["email"]. ' Message: '.$_POST["textarea"];

            if(!$mail->send()) {
                $_SESSION['message']='Uw email kon niet verzonden worden, '
                        .'Mailer Error: ' . $mail->ErrorInfo;
                header('location: index.php?wat=melding');
               
                
            } else {
                $_SESSION['message']='Uw email is verzonden';
                header('location: index.php?wat=melding');
            }
        }else{
            $_SESSION["message"]='Het opgegeven email is niet geldig';
            include 'presentation/contactForm.php';
        }
            
    }else{
    $_SESSION["message"]='Geen email of geen vraag opgegeven';
    include 'presentation/contactForm.php';
    }
    
    }else{
    include 'presentation/contactForm.php';
}
