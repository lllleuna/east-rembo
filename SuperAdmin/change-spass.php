<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sa.css">
    <link rel="stylesheet" href="create.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        include 'nav.php';
        include 'config.php';

        $query = mysqli_query($connS, "SELECT * FROM sa_account WHERE usern='Administrator'");
        $get = mysqli_fetch_assoc($query);
        $usern = $get['usern'];
        $password = $get['passw'];

        if (isset($_POST["submit"])) {
            $usernf = mysqli_real_escape_string($connS, $_POST['usern']);
            $currentpass = mysqli_real_escape_string($connS, $_POST['currentpass']);
            $pass1 = mysqli_real_escape_string($connS, $_POST['pass1']);
            $pass2 = mysqli_real_escape_string($connS, $_POST['pass2']);
        
            if ($currentpass == $password AND $usernf == $usern) {

                $update = mysqli_query($connS, "UPDATE sa_account SET passw='$pass2' WHERE usern='$usernf'");
                echo
                "<script> alert('Password Changed, Please Login Again.'); </script>";
            }else {
                echo
                "<script> alert('Error!'); </script>";
            }
            
            // header("Location: ../PAGES/logout.php");
        }
    ?>

    <!-- CHANGE SUPER ADMIN PASSWORD FORM -->
    <form class="form" name="create-form" method="post">
       <p class="form-title">Change Password</p>
        <div class="input-container">
          <input placeholder="Username" name="usern" required>
        </div>
        <div class="input-container">
            <input id="currentpass" placeholder="Current Password" type="password" name="currentpass" required>
        </div>
        <div class="input-container" >
          <input id="pass" placeholder="New Password" type="password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#.?!@$%^&*-]).{12,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        </div>
        <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="symbol" class="invalid">A <b>symbol</b></p>
            <p id="length" class="invalid">Minimum <b>12 characters</b></p>
        </div>
        <div class="input-container" >
          <input id="confirm_pass" onkeyup="validate_password()" placeholder="Confirm password" type="password" name="pass2" required>
        </div>

        <span id="wrong_pass_alert"></span>

        <button name="submit" class="submit" type="submit" id="create" onclick="wrong_pass_alert()">
        Create
        </button>

    </form>


    <script src="formscript.js"></script>   
</body>
</html>