<!DOCTYPE html>
<html>
<head>
	<title>TEST DashBoard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>include/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url();?>include/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>include/js/bootstrap.min.js"></script>

	<style type="text/css">
		html{
		    min-height:100%;
		    position:relative;
		}
		body{
		    height:100%; 
		}
		#navs{
			margin-bottom: 0px;
			background: #dc9d62 !important;
			border: 2px solid #dc9d62;
			width: 100%;
		}
		#sidebar{
			background: #e6b98f;
			margin-top: 0px;
			border: 2px solid #dc9d62;
			width: 20%;
			position:fixed;
		    top:50px;
		    bottom:0;
		    left:0;
		    right:0;
		    overflow:hidden;
		}
		#content {
			margin-left: 20%;
			margin-top: 50px;
			width: 80%;
			position:fixed;
		    top:0;
		    bottom:0;
		    left:0;
		    right:0;
		    overflow:scroll;
		}
		#user_logo{
			font-size: 60px;
		}
		#sideNavs{
			background: transparent;
			border: transparent;
		}
		#sideLogo{
			font-size: 30px;
		}
		#sideNavs .active{
			background: #dc9d62;
		}
		.active{
			
			color: #fff !important;
		}
		.modal-content {
	    	margin-left: 25%;
	    	margin-right: 25%;
		  	max-width: 400px;		
	  	}
	  	#studNav {
	  		background-color: #f5f5f5;
	  		margin-top: -20px;
	  		width: 75%;
	  		position: fixed;
	  	}
	  	#studAdd {
	  		float: left;
	  	}
	  	#studSearch {
	  		float: right;
	  		margin-top: 5px;
	  		margin-right: 2px;
	  	}
	  	.clearer {
	  		float: none !important;
	  		clear: both !important;
	  	}
	  	#contentMain {
	  		margin-left: 2px;
	  		margin-left: 2px;
	  	}
	  	#student {
	  		margin-top: 135px;
	  	}
	  	#theader {
	  		margin-top: 20px;
	  		font-weight: bold;

	  	}
	  	#theader ul {
			height: 20px;
	  		margin-left: -30px;
	  		list-style-type: none;			
			overflow: hidden;
	  	}
	  	#theader li {
	  		width: 16.3%;
	  		float: left;
	  	}
	  	table td {
	  		width: 16%;
	  	}
	</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="197" id="navs">
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
				<?php 
					if($this->session->userdata('username')){

				?>
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="<?php echo base_url();?>lib/setting">Setting</a></li>
		            <li><a href="<?php echo base_url();?>lib">Logout</a></li>
		          </ul>
		        </li>
				<?php 	
					}else {

				?>
				<li><a href="#"  data-toggle="modal" data-target="#acctLog"><span class="glyphicon glyphicon-user">Sign-In</span></a></li>

				<?php 	
					}
				?>
				
			</ul>
		</div>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 well" id="sidebar">
			<div class="row">
				<center><span class="glyphicon glyphicon-user" id="user_logo"></span></center>
				<p class="text-center">Name: </p>
			</div>
			<div class="row">
				<nav class="navbar navbar-default" id="sideNavs">
					
						<ul class="nav navbar-pills nav-stacked">
							<li role="presentation" ><a href="<?php echo base_url();?>lib/main"><span class="fa fa-home" id="sideLogo"></span>STUDENTS</a></li>
							<li role="presentation" class="active"><a href="<?php echo base_url();?>lib/main"><span class="fa fa-home" id="sideLogo"></span>EDIT</a></li>
							<li role="presentation"><a href="<?php echo base_url();?>lib/books"><span class="fa fa-book" id="sideLogo"></span>BOOKS</a></li>
							<li role="presentation"><a href="<?php echo base_url();?>lib/pending"><span class="fa fa-pencil-square-o" id="sideLogo"></span>PENDING BOOKS</a></li>
							<li role="presentation"><a href="<?php echo base_url();?>lib/activity"><span class="fa fa-pencil-square" id="sideLogo"></span>ACTIVITY</a></li>
						</ul>
					
				</nav>
			</div>
		</div>

		<div class="col-md-9" id="content">
			<h2 class="text-center">Update Students Informations.</h2>

			<?php if($this->session->flashdata('ok')){
			?>
			<div class="alert alert-success">
			  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			  <strong>Success! </strong><?php echo $this->session->flashdata('ok'); ?>
			</div>
			<?php 		
			}


			?>


			<div class="col-md-4 col-md-offset-4 well">
			<?php 
				foreach($content as $row){
					$id = $row->std_id;
					$fname = $row->std_fname;
					$lname = $row->std_lname;
				}
			?>
				<form action="<?php echo base_url();?>lib/edit/<?php echo $id;?>/parse" method="POST" id="editStudent">
					<div class="form-group">
						<label >ID Number</label>
						<input type="text" name="idNum" id="idNum" class="form-control" value="<?php echo $id; ?>">
						<?php echo form_error('idNum');?>
					</div>

					<div class="form-group">
						<label >First Name</label>
						<input type="text" name="fname" id="fname" class="form-control" value="<?php echo $fname; ?>">
						<?php echo form_error('fname');?>
					</div>
					<div class="form-group">
						<label >Last Name</label>
						<input type="text" name="lname" id="lname" class="form-control" value="<?php echo $lname; ?>">
						<?php echo form_error('lname');?>
					</div>

					<div class="form-group">
						<label>Course</label>
						<select name="course" id="course">
							<option value="BSIT">BSIT</option>
							<option value="BSCS">BSCS</option>
							<option value="ACT">ACT</option>
							<option value="BSCRIM">BSCRIM</option>
						</select>

						<label>Year</label>
						<select name="year" id="year">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>
					<div class="form-group">
						<input type="submit" value="submit" class="btn btn-warning" id="submitBtn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



</body>

</html>

