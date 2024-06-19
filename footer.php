<!DOCTYPE html>
<html lang="en">
<head>
  <title>Footer Design</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/footer_style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>

  <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>NAVIGATION</h4>
  	 			<ul>
  	 				<li><a href="index.php">Home</a></li>
  	 				<li><a href="about_us_thea.php">About Us</a></li>
  	 				<li><a href="services.php">Job for Hire</a></li>
  	 				<li><a href="programs.php">Programs</a></li>
					<li><a href="benefits.php">Benefits</a></li>
					<?php if(isset($_SESSION["citizen-login"])) : ?>
					<li><a href="citizen_portal.php">Dashboard</a></li>
					<?php endif ?>
					<?php if(isset($_SESSION["admin-login"])) : ?>
					<li><a href="admin_portal.php">Dashboard</a></li>
					<?php endif ?>
					<?php if(!isset($_SESSION["login"])) : ?>
					<li><a href="PAGES/login.php">Log in</a></li>
					<?php endif ?>
					<?php if(isset($_SESSION["login"])) : ?>
					<li><a href="PAGES/logout.php">Log out</a></li>
					<?php endif ?>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>GET HELP</h4>
  	 			<ul>
  	 				<li><a href="#">FAQ</a></li>
  	 				<li><a href="#">Policies</a></li>
  	 				<li><a href="#">Link</a></li>
  	 				<li><a href="#">Link link</a></li>
  	 				<li><a href="#">Link link link</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>FOLLOW US</h4>
  	 			<div class="social-links">
  	 				<a href="https://www.facebook.com/profile.php?id=100069126223281"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fa-brands fa-whatsapp"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

</body>
</html>
