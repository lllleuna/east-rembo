<?php 
include 'init.php';
if($users->isLoggedIn()) {
	header('Location: ticket.php');
}
$errorMessage = $users->login();
?>
<head>
	<link rel="stylesheet" href="css/login.css">
</head>
<title>Helpdesk System with PHP & MySQL</title>
<div class="container contact">	
	<div class="col-md-6">                    
		<div class="panel panel-info">
			<div class="panel-heading">
		 

			</div> 
			<div style="padding-top:30px" class="panel-body" >
				<?php if ($errorMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
				<?php } ?>
				<form id="loginform" class="form-horizontal" role="form" method="POST" action="">
					
				<?php if(isset($_SESSION["admin-login"])) : ?>
				<a class="title" href="../admin_portal.php">Dashboard</a>
				<?php endif ?>
				<?php if(isset($_SESSION["super-login"])) : ?>
				<a class="title" href="../SuperAdmin/sa_portal.php">Dashboard</a>
				<?php endif ?> 
					<p class="form-title">Credentials</p>                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="email" placeholder="Username" style="background:white;" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="password"placeholder="password" required>
					</div>
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="login" value="Login" class="btn btn-success">						  
						</div>						
					</div>	
				</form>   
			</div>                     
		</div>  
	</div>
</div>	