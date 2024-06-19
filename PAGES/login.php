<?php
include('config.php');
include('../SuperAdmin/config.php');
    if (isset($_POST["submit"])) {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);


        $result = mysqli_query($conn, "SELECT * FROM citizen_account WHERE Email_Add = '$email'LIMIT 1");
        $row = mysqli_fetch_assoc($result);

        $seeker_result = mysqli_query($conn, "SELECT * FROM seeker_account WHERE Email_Add = '$email'LIMIT 1");
        $seeker_row = mysqli_fetch_assoc($seeker_result);

        $super_result = mysqli_query($connS, "SELECT * FROM sa_account WHERE usern = '$email' AND passw='$password' LIMIT 1");
        $superr_row = mysqli_fetch_assoc($super_result);

        if (mysqli_num_rows($super_result) > 0) {
            $db_pass = $superr_row['passw'];
            if ($password == $db_pass) {
                $_SESSION["super-login"] = true;
                $_SESSION["login"] = true;

                
                $_SESSION["logged_super"] = [
                    'id' => $superr_row['ID'],
                    'usern' => $superr_row['usern'],
                    'passw' => $superr_row['passw']
                ];

                header("Location: ../SuperAdmin/sa_portal.php");

                echo
                    "<script> alert('Please verify your email address to login.'); 
                    window.location.href = 'login.php';</script>";
                // exit(0);
            }
            
        }

        if (mysqli_num_rows($seeker_result) > 0) {
            $db_pass = $seeker_row['Password'];
            $correct_pass = password_verify($password, $db_pass);

            if ($correct_pass == 1) {


                if ($seeker_row['verify_status'] == '1') {
                    $_SESSION["seeker-login"] = true;
                    $_SESSION["login"] = true;

                    
                    $_SESSION["logged_seeker"] = [
                        'id' => $seeker_row['idSeeker'],
                        'email' => $seeker_row['Email_add'],
                        'name' => $seeker_row['Name']
                    ];

                    header("Location: ../js_portal.php");

                } else {
                    echo
                        "<script> alert('Please verify your email address to login.'); 
                        window.location.href = 'login.php';</script>";
                    // exit(0);
                }
            } else {
                echo
                "<script> alert('Invalid Email or Password.'); 
                window.location.href = 'login.php';</script>";
                exit(0);
            }

        }

        
        // CITIZEN ACCOUNT
        if (mysqli_num_rows($result) > 0) {

            $db_pass = $row['Password'];
            $correct_pass = password_verify($password, $db_pass);

            if ($correct_pass == 1) {
                $nat_id = $row['ID_no'];   // get the national id number from citizen_account table
                // use it to find the citizens info in the citizen table

                $citizen_info = mysqli_query($conn, "SELECT * FROM pwd_senior WHERE VALID_ID_NO = '$nat_id' LIMIT 1");
                $row_citizen = mysqli_fetch_assoc($citizen_info);



                if ($row['verify_status'] == '1') {
                    $_SESSION["citizen-login"] = true;
                    $_SESSION["login"] = true;

                    
                    $_SESSION["logged_citizen"] = [
                        'id_user' => $row['idCitizen_Account'],
                        'national_id' => $row_citizen['VALID_ID_NO'],
                        'surname' => $row_citizen['SURNAME'],
                        'fname' => $row_citizen['FIRSTNAME'],
                        'mname' => $row_citizen['MIDDLENAME'],
                        'bday' => $row_citizen['BIRTHDAY']
                    ];

                    header("Location: ../citizen_portal.php");

                } else {
                    echo
                        "<script> alert('Please verify your email address to login.'); 
                        window.location.href = 'login.php';</script>";
                    // exit(0);
                }
            } else {
                echo
                "<script> alert('Invalid Email or Password.'); 
                window.location.href = 'login.php';</script>";
                exit(0);
            }

             // ADMIN ACCOUNT
        }else {
            $admin_result = mysqli_query($conn, "SELECT * FROM admin_account WHERE UserN = '$email' LIMIT 1");
            $admin_row = mysqli_fetch_assoc($admin_result);


            if (mysqli_num_rows($admin_result) > 0) {
                
                $admin_db_pass = $admin_row['Password'];
                $admin_correct_pass = password_verify($password, $admin_db_pass);

                // $admin_nat_id = $admin_row['National_ID_no']; 

                if ($admin_correct_pass == 1) {

                    $adminID = $admin_row['idAdmin_Account'];
                    $status_check = mysqli_query($conn, "SELECT * FROM adminacc_status WHERE adminID = '$adminID' LIMIT 1");
                    $admin_stat = mysqli_fetch_assoc($status_check);
                    $status = $admin_stat['status'];

                    if ($status == "1") {
                        $_SESSION["admin-login"] = true;
                        $_SESSION["login"] = true;

                        
                        $_SESSION["logged_admin"] = [
                            'id_user' => $admin_row['idAdmin_Account'],
                            'national_id' => $admin_row['National_ID_no'],
                            'fname' => $admin_row['Name']
                        ];
        
                        header("Location: ../admin_portal.php");
                    } else {
                        echo
                        "<script> alert('Your Acount is Currently Disabled. Contact the Wesite Administrator.'); 
                        window.location.href = 'login.php';</script>";
                        exit(0);
                    }
                }else {
                    echo
                    "<script> alert('Invalid Email or Password.'); 
                    window.location.href = 'login.php';</script>";
                    exit(0);
                }

            } else {
                echo
                "<script> alert('Invalid Email or Password.'); 
                window.location.href = 'login.php';</script>";
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
    <script src="script.js" defer></script>
    <title>East Rembo Portal</title>
    <link rel="icon" href="../Assets/east logo.png" type="image/icon type">
</head>
<body onload="document.login-form.reset();">
    <form class="form" action="" method="post" name="login-form" >
        <p class="title"><a href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="none"><path d="M152,208V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.5a8.3,8.3,0,0,1,2.6-5.9l80-72.7a8,8,0,0,1,10.8,0l80,72.7a8.3,8.3,0,0,1,2.6,5.9V208a8,8,0,0,1-8,8H160A8,8,0,0,1,152,208Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12"/></svg></a>
            SIGN IN</p>
       
        <div class="flex-column">
        <label>Email </label></div>
        <div class="inputForm">
            <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
            <input type="text" name="email" id="email" class="input" placeholder="Enter your Email" required>
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
        
        <div class="flex-row login-link">
            <a href="reset-password.php"><span class="span">Forgot password?</span></a>
        </div>

        <button class="button-submit" name="submit" id="submit">Sign In</button>

        <div class="login-link">
            <p class="p">Don't have an account? <a href="signup.php"><span class="span">Sign Up</span></a>
        </div>
        <div class="login-link">
            <p class="p">Applying a job? <a href="../job/seeker_signup.php"><span class="span">Register Here</span></a>
        </div>
        <div class="login-link">
            <p class="p"><a href="resend-veri.php"><span class="span">Get Verified </span></a>
        </div>

    </form>
    
    <script>
        window.addEventListener('beforeunload', function(event) {
                localStorage.clear();
            });
    </script>
</body>
</html>