<?php
require 'config.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

function resend_verification($name, $email, $nat_id, $verify_token) {

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
    $mail->addAddress($email);     

    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = 'Re: Email Verification';

    $email_body_template = "
        <h2>Email Verification from East Rembo Community Care</h2>
        <hr/>
        <h3>Name: $name</h3>
        <h3>National ID No.: $nat_id</h3>
        <h3>Click the link below to get verified!</h3>
        <br/><br/>
        <a href='https://eastremboportal.azurewebsites.net/PAGES/verify-email.php?token=$verify_token'>Click me</a>
    ";

    $mail->Body    = $email_body_template;
    $mail->send();

}

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $checkemail_query = mysqli_query($conn, "SELECT * FROM citizen_account WHERE email_add = '$email' LIMIT 1");

    if (mysqli_num_rows($checkemail_query) > 0) {

        $row = mysqli_fetch_array($checkemail_query);
        if ($row['verify_status'] == "0") {

            $name = $row['Name'];
            $nat_id = $row['National_ID_no'];
            $verify_token = $row['verify_token'];

            resend_verification("$name", "$email", "$nat_id", "$verify_token");

            echo
            "<script> alert('Verification Email already sent to ". $email . "'); 
            window.location.href = 'login.php';
            </script>";

        } else {
            echo
            "<script> alert('Email already verified, please login.'); 
            window.location.href = 'login.php';
            </script>";
        }

    } else {
        $admin_checkemail_query = mysqli_query($conn, "SELECT * FROM admin_account WHERE email_add = '$email' LIMIT 1");

        if (mysqli_num_rows($admin_checkemail_query) > 0) {

            $admin_row = mysqli_fetch_array($admin_checkemail_query);
            if ($admin_row['verify_status'] == "0") {

                $name = $admin_row['Name'];
                $nat_id = $admin_row['National_ID_no'];
                $verify_token = $admin_row['verify_token'];

                resend_verification("$name", "$email", "$nat_id", "$verify_token");

                echo
                "<script> alert('Verification Email already sent to ". $email . "'); 
                window.location.href = 'login.php';
                </script>";

            } else {
                echo
                "<script> alert('Email already verified, please login.'); 
                window.location.href = 'login.php';
                </script>";
            }
        } else {
            echo
            "<script> alert('Email is not yet registered. Register now!'); 
            window.location.href = 'signup.php';
            </script>";
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
            EMAIL VERIFICATION</p>
       
        <div class="flex-column">
        <label>Email </label></div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
            <input type="text" name="email" id="email" class="input" placeholder="Enter your Email" required>
        </div>
        
        
        <button class="button-submit" name="submit" id="submit">Send</button>


    </form>
</body>
</html>