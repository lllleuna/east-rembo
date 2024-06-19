<?php session_start(); 
?>

<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="css/styles_nav.css">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <script src="script/script.js" defer></script>
      <title></title>
    </head>
    <body>
      <nav class="navbar">
        <div class="brand-title">
            <img class="logo-img" src="Assets/east logo.png" alt="">
            East Rembo<br/>Community Care
        </div>
        <a href="#" class="toggle-button">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </a>
        <div class="navbar-links">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about_us_thea.php">About Us</a></li>
            <li><a href="services.php">Give Care</a></li>
            <!-- <li><a href="programs.php">Programs</a></li> -->
            <li><a href="benefits.php">Benefits</a></li>
            <?php if(isset($_SESSION["citizen-login"])) : ?>
            <li><a href="citizen_portal.php">Dashboard</a></li>
            <?php endif ?>
            <?php if(isset($_SESSION["admin-login"])) : ?>
            <li><a href="admin_portal.php">Dashboard</a></li>
            <?php endif ?>
            <?php if(isset($_SESSION["seeker-login"])) : ?>
            <li><a href="js_portal.php">Dashboard</a></li>
            <?php endif ?>
            <?php if(!isset($_SESSION["login"]) ) : ?>
            <li><button onclick="window.location.href='PAGES/login.php';" class="custom-btn btn-1" >Log in</button></li>
            <?php endif ?>
            <?php if(isset($_SESSION["login"]) ) : ?>
            <li><button onclick="window.location.href='PAGES/logout.php';" class="custom-btn btn-1" >Log out</button></li>
            <?php endif ?>

          </ul>
        </div>
      </nav>
    </body>
</html>

