<?php require 'PAGES/config.php'; 
if (!isset($_SESSION["seeker-login"])) {
    echo
        "<script> alert('ACCESS DENIED!'); 
        window.location.href = 'index.php';
        </script>";  
} else{

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/js_portal.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
    
<?php
 include 'user_nav.php';
?>

<!-- BODY START -->
<div class="body-cont">
    <div class="cont profile-cont">
        <div class="pr-content">
            <img src="ADMIN_UPLOADS/default-profile.webp" alt="">
            <p class="name"><?=$_SESSION["logged_seeker"]["name"];?></p>
            <p class="seeker-info">
                <ul>
                    <li>Status: Active</li>
                    <li>Age: 24</li>
                    <li>Sex: Female</li>
                </ul>
            </p>
        </div>
    </div>

    <div class="cont tabContainer">
            <div class="buttonContainer">
                <button onclick="showPanel(0,'#F8F6E3')">Ongoing</button>
                <button onclick="showPanel(1,'#F8F6E3')">Pending</button>
                <button onclick="showPanel(2,'#F8F6E3')">Completed</button>
                <button onclick="showPanel(3,'#F8F6E3')">Canceled / Rejected</button>
            </div>

            <div class="tabPanel">
                <p>Ongoing Job</p>
                <?php 
                include 'js_tab/ongoing.php';
                ?>
            </div>

            <div class="tabPanel">
                <p>Pending Application Request</p>
                <?php 
                include 'js_tab/pending.php';
                ?>
            </div>

            <div class="tabPanel">
                <p>Completed Job</p>
                <?php 
                include 'js_tab/completed.php';
                ?>
            </div>

            <div class="tabPanel">
                <p>Canceled Job and Rejected Application</p>
                <?php 
                include 'js_tab/canceled.php';
                ?>
            </div>
    </div>
</div>

<script src="script/myScript.js"></script>
<!-- BODY END -->

</body>
</html>