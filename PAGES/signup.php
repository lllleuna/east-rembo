<?php 
    require 'config.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';
    
    function sendemail_verify($name, $email, $nat_id, $verify_token) {
        
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
            <h2>You have registered with East Rembo Community Care</h2>
            <hr/>
            <h3>Name: $name</h3>
            <h3>National ID No.: $nat_id</h3>
            <h3>Click the link below to get verified!</h3>
            <br/><br/>
            <a href='http://localhost/east_brgy_portal/PAGES/verify-email.php?token=$verify_token'>Click me</a>
        ";

        $mail->Body    = $email_body_template;
        $mail->send();
    }

    if(isset($_POST['submit']) && $_POST['g-recaptcha-response'] != "") {
        $nat_id = mysqli_real_escape_string($conn,$_POST["nat_id"]);
        // $id_type = mysqli_real_escape_string($conn,$_POST["id_type"]);
        $lname = mysqli_real_escape_string($conn,$_POST["lastname"]);
        $fname = mysqli_real_escape_string($conn,$_POST["firstname"]);
        $mname = mysqli_real_escape_string($conn,$_POST["midname"]);
        // $disability = mysqli_real_escape_string($conn,$_POST["disability"]);
        // $pwdid = mysqli_real_escape_string($conn,$_POST["pwdid"]);
        // $seniorid = mysqli_real_escape_string($conn,$_POST["seniorid"]);
        $houseno = mysqli_real_escape_string($conn,$_POST["houseno"]);
        $street = mysqli_real_escape_string($conn,$_POST["street"]);
        $brgy = mysqli_real_escape_string($conn,$_POST["brgy"]);
        $bday = mysqli_real_escape_string($conn,$_POST["bday"]);
        $value_radio = mysqli_real_escape_string($conn,$_POST["value-radio"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $confirmpass = mysqli_real_escape_string($conn,$_POST["confirmpass"]);
        $verify_token = md5(rand());

        $secret = '6Ld-wSQpAAAAAJtWL7AFe64DkYB2NR9ormfmota9';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        
        $responseData = json_decode($verifyResponse);

        if($responseData->success) {
            
            $duplicate = mysqli_query($conn, "SELECT * FROM Citizen_Account WHERE Email_Add = '$email' OR ID_no = '$nat_id' LIMIT 1");
            $admin_duplicate = mysqli_query($conn, "SELECT * FROM Admin_Account WHERE UserN = '$email' LIMIT 1");
          

            if (mysqli_num_rows($duplicate) > 0 || mysqli_num_rows($admin_duplicate) > 0) {

                // $_SESSION['message'] = "Email or National ID no. has already taken.";
                echo
                "<script> alert('Email or ID no. has already taken.'); </script>";
            }
            else {
                if ($password == $confirmpass) {

                    $encrypted_pass = password_hash($password, PASSWORD_DEFAULT);
                    if ($password == "EastRembo_1954") {

                    } else {
                        $name = $fname." ".$lname;
                        $query = "INSERT INTO Citizen_Account(Email_Add, Name, Password, ID_no, ID_Type, verify_token) VALUES('$email', '$name', '$encrypted_pass', '$nat_id', 'none', '$verify_token')";
                        $query_run = mysqli_query($conn,$query);

                    
                        if ($query_run) {

                            $query1 = "INSERT INTO pwd_senior(VALID_ID_NO, ID_Type, SURNAME, FIRSTNAME, MIDDLENAME, HOUSE_NO, STREET, BARANGAY, BIRTHDAY, SEX) VALUES('$nat_id', 'none', '$lname', '$fname', '$mname', '$houseno', '$street', '$brgy', '$bday', '$value_radio')";
                            $query_run1 = mysqli_query($conn,$query1);


                            $sql_result = mysqli_query($conn, "SELECT * FROM citizen_account WHERE Email_Add='$email'");

                            if (mysqli_num_rows($sql_result) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_result)) {
                                    $user_id = $row['idCitizen_Account'];
                                    mysqli_query($conn, "INSERT INTO profile(userid, status) VALUES('$user_id', 1)");
                                }
                            }

                            sendemail_verify("$name", "$email", "$nat_id", "$verify_token");

                            echo
                                "<script> alert('Registration Successful! Verification link is sent to your email.'); 
                                window.location.href = 'login.php';
                                </script>";

                                // document.getElementById('signup-form').reset();
                            
                        } else {
                            // $_SESSION['message'] = "Registration Failed.";
                            echo
                            "<script> alert('Registration Failed.'); 
                            window.location.href = 'signup.php';
                            </script>";
                            
                        }
                    }
                }
                else {
                    // $_SESSION['message'] = "Password does not match.";
                    echo
                    "<script> alert('Password does not match.'); 
                    window.location.href = 'signup.php';
                    </script>";
                }
            }
        } else {
            // $_SESSION['message'] = "ERROR! National ID no. is incorrect.";
            echo
                "<script> alert('reCAPTCHA Error!'); 
                window.location.href = 'signup.php';
                </script>";
        }
        
    } 
    
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="script.js" defer></script>
    <title>East Rembo Portal</title>
    <link rel="icon" href="../Assets/east logo.png" type="image/icon type">
</head>
<body onload="document.login-form.reset();">
    <form class="form" action="" method="post" name="signup-form" >
        <p class="title"><a href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="none"><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.5a8.3,8.3,0,0,1,2.6-5.9l80-72.7a8,8,0,0,1,10.8,0l80,72.7a8.3,8.3,0,0,1,2.6,5.9V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/></svg></a>
            CREATE ACCOUNT</p>
        <div class="flex-column">
        <label>Valid ID No. </label></div>
        <div class="inputForm">
          <input type="text" name="nat_id" id="nat_id" class="input" placeholder="000000000-0000" required>
        </div>
        
        <div class="flex-column">
        <label>Type of ID. </label></div>
        <div class="inputForm">
            <div class="custom-select" style="width:200px;">
                <select required>
                    <option name="id_type" value="">Select ID:</option>
                    <option name="id_type" value="Postal ID">Postal ID</option>
                    <option name="id_type" value="UMID">UMID</option>
                    <option name="id_type" value="Passport">Passport</option>
                    <option name="id_type" value="National ID">National ID</option>
                </select>
            </div>
        </div>

        <div class="flex-column">
        <label>Last Name </label></div>
        <div class="inputForm">
           <input type="text" name="lastname" id="lastname" class="input" placeholder="" required>
        </div>
        <div class="flex-column">
        <label>First Name </label></div>
        <div class="inputForm">
           <input type="text" name="firstname" id="firstname" class="input" placeholder="" required>
        </div>
        <div class="flex-column">
        <label>Middle Name </label></div>
        <div class="inputForm">
           <input type="text" name="midname" id="midname" class="input" placeholder="" >
        </div>
        <!-- <div class="flex-column">
        <label>Disability Type </label></div>
        <div class="inputForm">
           <input type="text" name="disability" id="disability" class="input" placeholder="" >
        </div> -->
        <!-- <div class="flex-column">
        <label>PWD ID No. </label></div>
        <div class="inputForm">
            <input type="text" name="pwdid" id="pwdid" class="input" placeholder="" >
        </div>
        <div class="flex-column">
        <label>Senior ID No. </label></div>
        <div class="inputForm">
           <input type="text" name="seniorid" id="seniorid" class="input" placeholder="" >
        </div> -->

        <div class="flex-column">
        <label>House No. </label></div>
        <div class="inputForm">
           <input type="text" name="houseno" id="houseno" class="input" placeholder="" required>
        </div>

        <div class="flex-column">
        <label>Street </label></div>
        <div class="inputForm">
            <input type="text" name="street" id="street" class="input" placeholder="" required>
        </div>
        <div class="flex-column">
        <label>Barangay </label></div>
        <div class="inputForm">
           <input type="text" name="brgy" id="brgy" class="input" placeholder="" required>
        </div>

        <div class="flex-column">
        <label>Birthday </label></div>
        <div class="inputForm">
           <input type="text" name="bday" id="bday" class="input" placeholder="dd/mm/yyyy"
                    onfocus="(this.type='date')" onblur="(this.type='text')" required>
        </div>

        <div class="flex-column">
        <label>Sex </label></div>
        
        <div class="radio-input">
            <label>
            <input type="radio" id="female" name="value-radio" value="F" required>
            <span>Female</span>
            </label>
            <label>
                <input type="radio" id="male" name="value-radio" value="M" >
            <span>Male</span>
            </label>
            <span class="selection"></span>

        </div >

        <div class="flex-column">
        <label>Remarks </label></div>
        <div class="remark">
        <label class="checkbox-container"> 
            <input class="custom-checkbox"  type="checkbox">
            <span class="checkmark"></span>Senior Citizen
        </label>
        <label class="checkbox-container"> 
            <input class="custom-checkbox"  type="checkbox">
            <span class="checkmark"></span>Persons with Disability (PWD)
        </label>
        </div>

        <div class="flex-column">
        <label>Email </label></div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
            <input type="text" name="email" id="email" class="input" placeholder="example@gmail.com" required>
        </div>
        
        <div class="flex-column">
        <label>Password </label></div>
        <div class="inputForm">
            <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
            <input type="password" name="password" id="password" class="input" placeholder="Enter your Password" required>
            
            <label class="container pass">
                <input type="checkbox" id="pass_cb" checked="checked" onclick="togglePasswordVisibility()">
                <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
                <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path></svg>
            </label>
        </div>
        <div class="flex-column">
        <label>Confirm Password </label></div>
        <div class="inputForm">
            <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
            <input type="password" name="confirmpass" id="confirmpass" class="input" placeholder="Enter your Password" required>
            
            <label class="container conpass">
                <input type="checkbox" id="conpass_cb" checked="checked" onclick="togglePasswordVisibility()">
                <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
                <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path></svg>
            </label>
        </div>

        <!-- data privacy act -->
        <div class="flex-column">
        <div class="remark">
        <label class="checkbox-container data"> 
            <input class="custom-checkbox"  type="checkbox" required>
            <span class="checkmark"></span>I agree to the
            <a href="dpa.php">User Policy</a>.
        </label>
        </div>
        
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <div class="g-recaptcha" data-sitekey="6Ld-wSQpAAAAAKyAkjf8HteX1_zXV5w8CyQiEzHa">

        </div>
        

        <button class="button-submit" name="submit" id="submit" onclick="saveForm()">Sign Up</button>

        <script>
            // Function to save the form input to localStorage
            function saveForm() {
                var nat_id = document.getElementById('nat_id').value;
                localStorage.setItem('nat_idsave', nat_id);

                var lastname = document.getElementById('lastname').value;
                localStorage.setItem('lastnamesave', lastname);
                var firstname = document.getElementById('firstname').value;
                localStorage.setItem('fsave', firstname);
                var midname = document.getElementById('midname').value;
                localStorage.setItem('msave', midname);
                var disability = document.getElementById('disability').value;
                localStorage.setItem('disabilitysave', disability);
                var pwdid = document.getElementById('pwdid').value;
                localStorage.setItem('pwdidsave', pwdid);
                var seniorid = document.getElementById('seniorid').value;
                localStorage.setItem('senioridsave', seniorid);
                var houseno = document.getElementById('houseno').value;
                localStorage.setItem('housenosave', houseno);
                var street = document.getElementById('street').value;
                localStorage.setItem('streetsave', street);
                var brgy = document.getElementById('brgy').value;
                localStorage.setItem('brgysave', brgy);
                var bday = document.getElementById('bday').value;
                localStorage.setItem('bdaysave', bday);

                var email = document.getElementById('email').value;
                localStorage.setItem('emailsave', email);
            }

            // Function to load the saved input when the page loads
            window.onload = function() {
                var nat_idsave = localStorage.getItem('nat_idsave');
                var lastnamesave = localStorage.getItem('lastnamesave');
                var fsave = localStorage.getItem('fsave');
                var msave = localStorage.getItem('msave');
                var disabilitysave = localStorage.getItem('disabilitysave');
                var pwdidsave = localStorage.getItem('pwdidsave');
                var senioridsave = localStorage.getItem('senioridsave');
                var housenosave = localStorage.getItem('housenosave');
                var streetsave = localStorage.getItem('streetsave');
                var brgysave = localStorage.getItem('brgysave');
                var bdaysave = localStorage.getItem('bdaysave');
                var emailsave = localStorage.getItem('emailsave');

                if (emailsave !== null && lastnamesave !== null) {
                    document.getElementById('nat_id').value = nat_idsave;
                    document.getElementById('lastname').value = lastnamesave;
                    document.getElementById('firstname').value = fsave;
                    document.getElementById('midname').value = msave;
                    document.getElementById('disability').value = disabilitysave;
                    document.getElementById('pwdid').value = pwdidsave;
                    document.getElementById('seniorid').value = senioridsave;
                    document.getElementById('houseno').value = housenosave;
                    document.getElementById('street').value = streetsave;
                    document.getElementById('brgy').value = brgysave;
                    document.getElementById('bday').value = bdaysave;

                    document.getElementById('email').value = emailsave;
                }
            };


        </script>
        

        <p class="p">Already have an account? <a href="login.php"><span class="span">Sign In</span></a>

        
            
        </div>
    </form>


    <div class="alert" style="color: red; background-color: white;">
        <?php
            if (isset($_SESSION['message'])) {
                echo "<h3>".$_SESSION['message']."</h3>";
                unset($_SESSION['message']);
            }
        ?>
    </div>

</body>
</html>