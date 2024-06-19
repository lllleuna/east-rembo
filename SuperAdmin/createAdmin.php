<?php
$connection = mysqli_connect("eastdatabase.mysql.database.azure.com", "leuna", "Pa$$word1", "helpdesk_system");
require '../PAGES/config.php';

if (isset($_POST["submit"])) {
    $usern = mysqli_real_escape_string($conn, $_POST['usern']);
    $dept = mysqli_real_escape_string($conn, $_POST['dept']);
    $fn = mysqli_real_escape_string($conn, $_POST['fn']);
    $mi = mysqli_real_escape_string($conn, $_POST['mi']);
    $ln = mysqli_real_escape_string($conn, $_POST['ln']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

    $admin_duplicate = mysqli_query($conn, "SELECT * FROM Admin_Account WHERE UserN = '$usern' LIMIT 1");
    if (mysqli_num_rows($admin_duplicate) > 0) {
        echo
        "<script> alert('Email or ID no. has already taken.'); </script>";
    }else {

        $encrypted_pass = password_hash($pass2, PASSWORD_DEFAULT);
        $name = $fn." ".$ln;

        $admin_query = mysqli_query($conn, "INSERT INTO admin_account(UserN, Department, Name, Password) VALUES('$usern', '$dept', '$name', '$encrypted_pass')");
        
        $admin_id = mysqli_query($conn, "SELECT * FROM Admin_Account WHERE UserN = '$usern' LIMIT 1");
        $admin_db_id = mysqli_fetch_assoc($admin_id);
        $adminID = $admin_db_id['idAdmin_Account'];
        $desc = "created";
        $status = "1";

        $admin_query2 = mysqli_query($conn, "INSERT INTO adminAcc_status(adminID, status, description) VALUES('$adminID', '$status', '$desc')");

        $md5pass = md5($pass2);

        $admin_helpdesk = mysqli_query($connection, "INSERT INTO hd_users(email, password, name, user_type, status) VALUES('$usern', '$md5pass', '$name', 'user', '1')");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sa.css">
    <link rel="stylesheet" href="create.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East Rembo</title>
</head>
<body>
    <?php
        include 'nav.php';
    ?>

    <!-- CREATE BARANGAY ADMIN FORM -->
    <form class="form" name="create-form" method="post">
       <p class="form-title">Create Barangay Admin Account</p>
        <div class="input-container">
          <input placeholder="Username" id="username" name="usern" readonly>
        </div>
        <div class="input-container">
        <select name="dept" id="cars" class="dept">
            <option value="Council">Council</option>
            <option value="Treasury">Treasury</option>
            <option value="Staff">Staff</option>
        </select>
        </div>
        <div class="input-container">
          <input placeholder="First Name" id="first_name" name="fn" onkeyup="generateUsername()" required>
        </div>
        <div class="input-container">
          <input placeholder="Middle Name" id="middle_name" name="mi" onkeyup="generateUsername()">
        </div>
        <div class="input-container">
          <input placeholder="Last Name" id="surname" name="ln" onkeyup="generateUsername()" required>
        </div>
        <div class="input-container" >
          <input id="pass" placeholder="Password" type="password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#.?!@$%^&*-]).{12,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
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


    <script>
        function generateUsername() {
            const firstName = document.getElementById('first_name').value.trim();
            const middleName = document.getElementById('middle_name').value.trim();
            const surname = document.getElementById('surname').value.trim();

            if (firstName && surname) {
                let username = firstName[0].toLowerCase();
                if (middleName) {
                    username += middleName[0].toLowerCase();
                }
                username += surname.toLowerCase();
                document.getElementById('username').value = username;
                checkUsernameAvailability(username);
            }
        }

        function checkUsernameAvailability(username) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'check_username.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.available) {
                        document.getElementById('username').value = response.username;
                    } else {
                        document.getElementById('username').value = response.suggested;
                    }
                }
            };
            xhr.send('username=' + encodeURIComponent(username));
        }
    </script>
    <script src="formscript.js"></script>

</body>
</html>