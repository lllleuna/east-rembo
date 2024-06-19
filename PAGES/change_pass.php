<?php
require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function send_password_reset($get_name, $get_natID, $get_email, $token) {

    $mail = new PHPMailer(true);                    
    $mail->isSMTP();                                 
    $mail->SMTPAuth   = true;                              
    $mail->Host       = 'smtp.gmail.com';                                     
    $mail->Username   = 'eastrembo1954@gmail.com';                     
    $mail->Password   = 'kaqijbtpsahwmzbg';                               
    $mail->SMTPSecure = "tls";            
    $mail->Port       = 587; 

     //Recipients
    $mail->setFrom('eastrembo1954@gmail.com', 'EAST REMBO');
    $mail->addAddress($get_email);     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Change Password';

    $email_body_template = "
        <h2>CHANGE YOUR EAST REMBO ACCOUNT PASSWORD</h2>
        <hr/>
        <h3>Name: $get_name</h3>
        <h3>National ID No.: $get_natID</h3>
        <br/>
        <a href='https://eastremboportal.azurewebsites.net/PAGES/pass-change.php?token=$token&email=$get_email'>Click here to reset your password</a>
        <br/>
        <h3>If you didn't request a change of password, don't worry. You can safely ignore this email.</h3>
        
    ";

    $mail->Body    = $email_body_template;
    $mail->send();

}


if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = mysqli_query($conn, "SELECT * FROM citizen_account WHERE Email_Add = '$email' LIMIT 1");

    if (mysqli_num_rows($check_email) > 0) {
        
        $row = mysqli_fetch_array($check_email);
        $get_name = $row['Name'];
        $get_email = $row['Email_Add'];
        $get_natID = $row['National_ID_no'];

        $update_token = mysqli_query($conn, "UPDATE citizen_account SET verify_token='$token' WHERE Email_Add='$get_email' LIMIT 1");

        if ($update_token) {
            
            send_password_reset($get_name, $get_natID, $get_email, $token);
            echo
            "<script> alert('We sent a password change link to " .$get_email. "'); 
            window.location.href = '../citizen_portal.php';
            </script>";
            exit(0);

        } else {
            echo
            "<script> alert('Something went wrong. #1'); 
            window.location.href = '../citizen_portal.php';
            </script>";
            exit(0);
        }

    } else {
        $admin_check_email = mysqli_query($conn, "SELECT * FROM admin_account WHERE Email_Add = '$email' LIMIT 1");

        if (mysqli_num_rows($admin_check_email) > 0) {
        
            $row = mysqli_fetch_array($admin_check_email);
            $get_name = $row['Name'];
            $get_email = $row['Email_Add'];
            $get_natID = $row['National_ID_no'];
    
            $admin_update_token = mysqli_query($conn, "UPDATE admin_account SET verify_token='$token' WHERE Email_Add='$get_email' LIMIT 1");
    
            if ($admin_update_token) {
                
                send_password_reset($get_name, $get_natID, $get_email, $token);
                echo
                "<script> alert('We sent a password change link to " .$get_email. "'); 
                window.location.href = '../admin_profile.php';
                </script>";
                exit(0);
    
            } else {
                echo
                "<script> alert('Something went wrong. #1'); 
                window.location.href = 'change_pass.php';
                </script>";
                exit(0);
            }
    
        } else {
            echo
            "<script> alert('No Email Found.'); 
            window.location.href = 'change_pass.php';
            </script>";
            exit(0);
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East Rembo Portal</title>
    <link rel="icon" href="../Assets/east logo.png" type="image/icon type">
</head>
<body>
    <form class="form" action="" method="post" name="login-form" >
        <p class="title"><a href="javascript:history.back()"><svg xmlns="http://www.w3.org/2000/svg" color="black" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/> </svg></a>
            CHANGE PASSWORD</p>
       
        <div class="flex-column">
        <label>Email </label></div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
            <input type="text" name="email" id="email" class="input" placeholder="Enter your Email" required>
        </div>

        
        <button class="button-submit" name="submit" id="submit">Send Link</button>


    </form>
</body>
</html>