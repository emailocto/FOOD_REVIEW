<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $template_title; ?></title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.2/css/bootstrap.css"/>	
	<?php echo $template_css; ?>
	<style type="text/css">
		.my_div_body{
			min-height: 600px;
			height: auto;
		}
	</style>
</head>
<body>
<div class="container">
	<div id="divtop" class="row">
		<div id="topLeft" class="col-md-6">
		Date and Time
		</div>
		<div id="topLeft" class="col-md-6">
			<span>
				<?php 
					$hasUserData = false;
					if($this->session->userdata('haslogged_user'))
						$hasUserData = true;
				
					if($hasUserData){
						$userdata = $this->session->userdata('haslogged_user');
				?>
					Welcome <?php echo $userdata['username']; ?>
					</span>
					<span><a href="login/doLogout"> Logout </a></span>
				<?php } else { ?>
					<button id="btnLog" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#login_form">Login</button>
					</span>
					<?php //if($hasUserData){ check if page is in register page?>
						<span> Register</span>
					<?php //} ?>
				<?php } ?>			
		</div>
		<div id="divtopheader" class="row">
			Header image and logo
		</div>
	</div>
