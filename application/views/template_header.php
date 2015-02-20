<!DOCTYPE html>
<?php session_start(); ?>
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
					if($this->session->userdata('haslogged_user')){
						$userdata = $this->session->userdata('haslogged_user');
				?>
					Welcome <?php echo $userdata['username']; ?>
				<?php } else { ?>
					<button id="btnLog" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#login_form">Login</button>
				<?php } ?>
			</span>
			<span> Register</span>
		</div>
	</div>
