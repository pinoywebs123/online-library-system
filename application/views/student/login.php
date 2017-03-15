<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Student Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>include/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>include/js/bootstrap.min.js"></script>

	<style type="text/css">
		body{
			background: #f0d5bc;
		}
		#loginContent{
			margin-top: 100px;
		}
		#lib_login_logo{
			margin-top: -80px;			
			
		}
		#loginForm{
			background: #dc9d62;
			border-radius: 30px;
		}
		#navs{
			background: #dc9d62 !important;
			margin-bottom: 0px;
			border: 1px solid transparent;
		}
		#asdasd{
			width: 80% !important;
			margin-left: 10%;
		}
		#btnAsdAsd{
			margin-left: 10%;
		}
		#submitBtn{
			background: #f0d5bc;
			border-radius: 10px;
			border: 2px solid #dc9d62;

		}
		#sideLine{
			width: 80% !important;
			margin-left: 10%;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-default" data-spy="affix" data-offset-top="197" id="navs">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo base_url();?>" class="navbar-brand">E-Library</a>
		</div>
		<div class="collapse navbar-collapse" id="navBar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Help!"></span></a></li>
				
			</ul>
		</div>
	</div>
</nav>

<div class="col-md-6 col-md-offset-3" id="loginContent">
	
	<div class="well" id="loginForm">
		<center><img src="<?php echo base_url();?>images/modal2.png" height="120px" width="120px" id="lib_login_logo"></center>
		<form action="<?php echo base_url();?>student/login_parse" method="POST">
			<h2 class="text-center">Student Login</h2>

			<?php if($this->session->flashdata('pass')){
			?>
			<div class="alert alert-danger" id="sideLine">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error! </strong><?php echo $this->session->flashdata('pass'); ?>
			</div>
			<?php 		
			}


			?>


			<?php if($this->session->flashdata('error')){
			?>
			<div class="alert alert-danger" id="sideLine">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Error! </strong><?php echo $this->session->flashdata('error'); ?>
			</div>
			<?php 		
			}


			?>
			<div id="asdasd" class="form-group">
				<label for="lib_user">Username</label>
				<input type="text" name="student_user" id="student_user" class="form-control input-lg" id="input_form">
			</div>
			<div id="asdasd" class="form-group">
				<label for="lib_pass">Password</label>
				<input type="password" name="student_pass" id="student_pass" class="form-control input-lg" id="input_form">
			</div>
			<div id="btnAsdAsd" class="form-group">
				<input type="submit" value="Login" class="btn btn-default btn-lg" id="submitBtn">
			</div>
		</form>
	</div>
</div>
</body>
</html>