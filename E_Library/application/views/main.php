<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to E-Library System</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>include/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>include/js/bootstrap.min.js"></script>

	<style type="text/css">
		.affix {
		      top: 0;
		      width: 100%;
		      z-index: 1;
		      opacity: 0.8;
		  }
		#header{
			background: url('<?php echo base_url(); ?>images/bg1.jpg');
		     width: 100%;
		     height: auto;
		     -webkit-background-size: cover;
		     -moz-background-size: cover;
		     -o-background-size: cover;
		     background-size: cover; 
		     background-size: 100% 100%;
		     background-repeat: no-repeat;
		     background-position: center center; 
	     	 height: 400px;
		}
		#content{
			height: 400px;
			padding: 50px 50px;


		}
		#navs{
			background: #dc9d62 !important;
			margin-bottom: 0px;
			border: 1px solid transparent;
		}
		#welcome{
			background: #dc9d62;
			border: 2px solid #cd7320;
			
			height: 300px;
			margin-right: 10
		}
		#about{
			background: #e6b98f;
			border: 2px solid #cd7320;
			height: 300px;

		}
		#row_content{
			padding-top: 50px;
			background: #f0d5bc;
		}
		#gallery{
			position: relative;
			top: 120px;
			margin-top: -100px;
			width: 30%;
			background: #f5e3d2;
			float: left;
			margin-left: 1.6%;
			margin-right: 1.6%;
			padding: 30px;
		}
		#footer{
			height: 400px;
			background: #3d2209;
		}
		#site_footer{
			padding-top: 20px;
			margin-top: 50px;
			color: #fff;
		}
		#footer_nav{
			background: transparent;
			height: 100px;
			border: 1px solid transparent;
		}
		a{
			color: #fff !important;
		}
		#gallery_logo{
			font-size: 78px;
		}
		#footer{
			padding-top: 80px;
			background: url('<?php echo base_url(); ?>images/foo1.png');
		     width: 100%;
		     height: 400px;
		     -webkit-background-size: cover;
		     -moz-background-size: cover;
		     -o-background-size: cover;
		     background-size: cover; 
		     background-size: 100% 100%;
		     background-repeat: no-repeat;
		     background-position: center center;
		}
		#modalContent{
			background: #f5e3d2;
		}
		#modalHead{
			background: #dc9d62;
		}
		#logType{
			background: transparent;
			
		}
		.clearer {
			clear: both;
		}
	</style>
</head>
<body>
<div class="container-fluid" id="header">
	
</div>

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
				<li><a href="#"  data-toggle="modal" data-target="#acctLog"><span class="glyphicon glyphicon-user">Sign-In</span></a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid" id="content_data">
	<div class="row">
		<div class="col-md-7" id="welcome">
			<h1>Welcome</h1>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
		<div class="col-md-5" id="about">
			<center><h1>Goals</h1></center>
			<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem</p>
		</div>
	</div>

</div>

<div class="container-fluid" id="row_content">
	<div class="row">
		<center><h1>E-LIBRARY SYSTEM</h1></center>
		<div id="gallery">
			<center><span class="glyphicon glyphicon-book" id="gallery_logo"></span></center>
			<h3 class="text-center">What is E-Library?</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
		<div id="gallery">
			<center><span class="glyphicon glyphicon-user" id="gallery_logo"></span></center>
			<h3 class="text-center">Student Access Anywhere!</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
		<div id="gallery">
			<center><span class="glyphicon glyphicon-user" id="gallery_logo"></span></center>
			<h3 class="text-center">Book is your mentor.</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
		<div class="clearer"></div>
	</div>
</div>

<div class="container-fluid" id="footer">
	<div class="row" id="site_footer">
		<center><p>(C) All Right Reserved Chekafu Company</p></center>
	</div>	
</div>

<div class="modal fade" id="acctLog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" id="modalHead">
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="modalContent">
				<center><h3>Sign-In as :</h3></center>
				<div class="row">
					<div class="col-md-6 well" id="logType">
						<p class="text-center">LIBRARIAN</p>
						<center><a href="<?php echo base_url();?>lib/login"><img src="<?php echo base_url();?>images/modal1.png" height="120px" width="120px" data-anijs="if:mouseover, do: pulse animated"></a></center>
					</div>
					<div class="col-md-6 well" id="logType">
						<p class="text-center">STUDENT</p>
						<center><a href="<?php echo base_url();?>student/login"><img src="<?php echo base_url();?>images/modal2.png" height="120px" width="120px" data-anijs="if:mouseover, do: pulse animated"></a></center>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script src="http://anijs.github.io/lib/anijs/anijs-min.js"></script>
</html>