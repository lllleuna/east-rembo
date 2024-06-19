<?php
require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

    if (isset($_POST['submit'])) {
        $first = mysqli_real_escape_string($conn, $_POST['fname']);
        $last = mysqli_real_escape_string($conn, $_POST['lname']);
        $email_from = mysqli_real_escape_string($conn, $_POST['email']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $message = $_POST['message'];

        $email_to = "eastrembo1954@gmail.com";
        $headers = "From: ".$email_from;
        $subject = "Inquiry from portal";
        $name = $first." ".$last;
        $txt = "You have received an e-mail from";

        // sending of email
        $mail = new PHPMailer(true);                    
        $mail->isSMTP();                                 
        $mail->SMTPAuth   = true;                              
        $mail->Host       = 'smtp.gmail.com';                                     
        $mail->Username   = 'eastrembo1954@gmail.com';                     
        $mail->Password   = 'kaqijbtpsahwmzbg';                               
        $mail->SMTPSecure = "tls";            
        $mail->Port       = 587; 

        //Recipients
        $mail->setFrom($email_from, $name);
        $mail->addAddress($email_to);     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;

        $email_body_template = "
            <h2>WEBSITE CONTACT US</h2>
            <hr/>
            <h3>$txt</h3>
            <h3>Name: $name</h3>
            <h3>Contact No.: $tel</h3>
            <h3>$email_from</h3>
            <h3>$message</h3>
            <br/><br/>
        ";

        $mail->Body    = $email_body_template;
        $mail->send();

        header("Location: contact.php?mailsent");

        // email from the user not from east rembooo
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/contact.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="../Assets/east logo.png" type="image/icon type">
</head>
<body> 


    <form class="contact-form" method="post">
    
        <h1><a href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" color="black" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/> </svg></a>CONTACT US</h1>
        <div class="contact-flex">
            <label>
                <input name="fname" required="" placeholder="" type="text" class="contact-input">
                <span>first name</span>
            </label>

            <label>
                <input name="lname" required="" placeholder="" type="text" class="contact-input">
                <span>last name</span>
            </label>
        </div>  
                
        <label>
            <input name="email" required="" placeholder="" type="email" class="contact-input">
            <span>email</span>
        </label> 
            
        <label>
            <input name="tel" required="" type="tel" placeholder="" class="contact-input">
            <span>contact number</span>
        </label>
        <label>
            <textarea name="message" required="" rows="3" placeholder="" class="contact-input01"></textarea>
            <span>message</span>
        </label>
        
        <button type="submit" name="submit" class="contact-fancy" href="#">
        <span class="contact-top-key"></span>
        <span class="contact-text">submit</span>
        <span class="contact-bottom-key-1"></span>
        <span class="contact-bottom-key-2"></span>
        </button>
    </form>

</body>
</html>