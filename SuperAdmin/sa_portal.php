<?php
session_start();
if (!isset($_SESSION["super-login"])) {
    echo
        "<script> alert('ACCESS DENIED!'); 
        window.location.href = '../index.php';
        
        </script>";  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sa.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <title>Nav</title> -->
</head>
<body>
    <?php
        include 'nav.php';
    ?>

    <div class="Body">
        <h2>Preferences</h2>
        <p>
            <ul>
                <li><a href="createAdmin.php">Create Barangay Admin Account</a></li>
                <li><a href="see_admins.php">See Admin User Account</a></li>
                <li><a href="change-spass.php">Change Super Admin Password</a></li>
                <li><a href="../REPORT/ticket.php">Reported Issues</a></li>
            </ul>
        </p>
    </div>
</body>
</html>