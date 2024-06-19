<?php

require '../PAGES/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token) {
    
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
    $mail->Subject = 'Email Verification';

    $email_body_template = "
        <h2>You have created a Job Account with East Rembo Community Care</h2>
        <hr/>
        <h3>Name: $name</h3>
        <h3>Click the link below to get verified!</h3>
        <br/><br/>
        <a href='http://localhost/EAST_REMBO/PAGES/verify-email.php?token=$verify_token'>Click me</a>
    ";

    $mail->Body    = $email_body_template;
    $mail->send();
}

    if (isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $verify_token = md5(rand());

        $secret = '6Ld-wSQpAAAAAJtWL7AFe64DkYB2NR9ormfmota9';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        
        $responseData = json_decode($verifyResponse);

        if($responseData->success) {

            $duplicate = mysqli_query($conn, "SELECT * FROM Citizen_Account WHERE Email_Add = '$email'  LIMIT 1");
            $admin_duplicate = mysqli_query($conn, "SELECT * FROM Admin_Account WHERE Email_Add = '$email' LIMIT 1");
            $seeker_duplicate = mysqli_query($conn, "SELECT * FROM seeker_account WHERE Email_Add = '$email' LIMIT 1");

            if (mysqli_num_rows($duplicate) > 0 || mysqli_num_rows($admin_duplicate) > 0 || mysqli_num_rows($seeker_duplicate) > 0) {

                echo
                "<script> alert('Email or National ID no. has already taken.'); </script>";
            } else {
                if ($pass == $cpass) {
                    $encrypted_pass = password_hash($pass, PASSWORD_DEFAULT);

                    $seeker_query = mysqli_query($conn, "INSERT INTO seeker_account(Email_Add, Name, Password, verify_token) VALUES('$email', '$name', '$encrypted_pass', '$verify_token')");

                    $sql_result = mysqli_query($conn, "SELECT * FROM seeker_account WHERE Email_Add='$email'");

                    if (mysqli_num_rows($sql_result) > 0) {
                        while ($row = mysqli_fetch_assoc($sql_result)) {
                            $user_id = $row['idSeeker'];
                            mysqli_query($conn, "INSERT INTO profile(userid, status) VALUES('$user_id', 1)");
                        }
                    }

                    sendemail_verify("$name", "$email", "$verify_token");

                            echo
                                "<script> alert('Registration Successful! Verification link is sent to your email.'); 
                                window.location.href = '../login.php';
                                </script>";

                } else {
                    echo
                "<script> alert('Password do not match.'); </script>";
                }
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
    <title>Sign Up</title>
</head>
<body>
    <form class="form" action="" method="post">
        <p class="title"><a href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="none"><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.5a8.3,8.3,0,0,1,2.6-5.9l80-72.7a8,8,0,0,1,10.8,0l80,72.7a8.3,8.3,0,0,1,2.6,5.9V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/></svg></a>
                CREATE ACCOUNT</p>
        <div class="flex-column">
        <label>Name</label></div>
        <div class="inputForm">
          <input type="text" name="name" id="name" class="input" placeholder="" required>
        </div>
        <div class="flex-column">
        <label>Email</label></div>
        <div class="inputForm">
          <input type="text" name="email" id="email" class="input" placeholder="" required>
        </div>
        <div class="flex-column">
        <label>Password</label></div>
        <div class="inputForm">
          <input type="password" name="pass" id="pass" class="input" placeholder="" required>
        </div>
        <div class="flex-column">
        <label>Confirm Password</label></div>
        <div class="inputForm">
          <input type="password" name="cpass" id="cpass" class="input" placeholder="" required>
        </div>
        <!-- data privacy act -->
        <div class="flex-column">
        <div class="remark">
        <label class="checkbox-container data"> 
            <input class="custom-checkbox"  type="checkbox" required>
            <span class="checkmark"></span>By checking this box, you agree to the data privacy agreement. <br>
            <a href="../PAGES/dpa.php">View Data Privacy Agreement</a>
        </label>
        </div>

        
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <div class="g-recaptcha" data-sitekey="6Ld-wSQpAAAAAKyAkjf8HteX1_zXV5w8CyQiEzHa">

        </div>
        

        <button class="button-submit" name="submit" id="submit" >Sign Up</button>
    </form>
</body>
</html>