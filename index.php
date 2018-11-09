<?php
	include_once("res/connect.php");
	include_once("res/session.php");
	include_once("res/functions.php");
	if (isset($_POST['submitbtn'])){
		signIn();
	}
?>

<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Login</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		 <!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.css">
		<!---Color---->
		<link rel="stylesheet" href="css/color.css">
		<!---Custom---->
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
		<nav class="navbar navbar-inverse green-white-bg et-menu" style="padding: 5px; border: none;">
			<div class="col-lg-11 col-center">
				<div class="col-lg-12">
					<div class="navbar-header">
						 <button type="button" class="navbar-toggle collapsed dark-purple-bg" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						<a class="navbar-brand" style="padding: 10px 3px;margin-top:-40px;" href=""><img class="pull-right" src="img/nacoss_LOGO.png" width="750px" height="150px" /></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-navbar-collapse-1" style="border: 0px;">
						<ul class="nav navbar-nav">

						</ul>

						<ul class="nav navbar-nav navbar-right">



							<?php
							if ($_SESSION != null){
								?>
								<li><a href="index.php">Home</a></li>
								<li><a href=""><?php echo "Hi, ".$_SESSION['firstname'];?></a></li>

								<li class = "nav-active" style="background: #787;"><a  href="paymentform.php">Payment Form</a></li>

									<li><a href="logout.php">Logout</a></li>
							<?php
						}else{
							?>
							<li><a href="index.php">Home</a></li>
							<li><a href="login.php">Sign In</a></li>
							<?php
						}
							?>

						</ul>
					</div>
				</div>
			</div>
		</nav>


		      <div class="modal fade" id="modal-logout" role="dialog">
		      			<div class="modal-dialog">
		      	  			<div class="modal-content">
		      	   				 <div class="modal-header">
		      	     				<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	      				<div class="modal-body">
		      	      					<!-- <span class="text-danger error-message" style="font-weight:bold;" >Incorrect Email or Password</span>
		       -->	      				<form method="post" role = "form" class="register-form">
		      	      						<h3 class="text-danger">Are you sure you want to Sign Out</h3>
		      	      						<button type="submit" name = "sign-out-btn" id = "sign-out-btn" class="btn btn-primary btn-register">Sign Out</button>
		      	      					</form>

		      	      					<br>
		      	      					<br>

		      	      				</div>
		      	    			</div>
		      	    		</div>
		      	    	</div>

		      	      </div>
	<div class="banner" >
			<div class="container">
				<p class="banner-text">
					<div class="row">
						<div class="col-md-6 upper-text">
							<h1 style="text-transform: unset;">National Association Of Computer Science Students</h1>
						</div>
					</div>
					<div class="row lower-text">
						<h3>Online Payment Portal for Nacoss Due</h3>
						<a class= "btn-learn-more">Learn More</a>
					</div>
				</p>
			</div>
		</div>
		<div class="container main-content">
			<div class="row">
				<div class="col-md-4 register-container">
					<h3>Sign Up to NACOSS</h3>
					<div class="login-form">
						<form class="" role = "form" method="post">
							<div class="form-group">
								<input type="text" placeholder="Matric Number" id="matric-number" name="matric-number" required />
							</div>
							<div class="form-group">
								<input type="text" id="firstname" name="firstname"  placeholder="Firstname" required>
							</div>
							<div class="form-group">
								<inputtype="text" id="lastname" name="lastname"  placeholder="Lastname" required>
							</div>
							<div class="form-group">
								<input type="password"  type="password" id="password" name="password"  placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="email" id="Email" name="email"  placeholder="example@email.com" required>
							</div>
							<div class="form-group">
								<input type="text" id="department" name="department"  placeholder="Department" required>
							</div>
							<div class="form-group">
								<input type="text" id="level" name="level"  placeholder="Current Academic Level" required>
							</div>

							<button type="submit" class="btn btn-danger">Sign Up</button>
	            <br>

						</form>
					</div>
				</div>
	      <div class="col-md-5 login-container" id = "login-form">
					<h3>Sign In</h3>
					<div class="login-form">
						<form class="" role = "form" method="post">
							<div class="form-group">
								<input type="email" name="email" placeholder="example@gmail.com"/>
							</div>
							<div class="form-group">
								<input type="password" name="password" placeholder="password">
							</div>
							<div class="checkbox">
							        <a>Forgot your password?</a>
							 </div>
							<button class="btn btn-danger">Log In</button>
	            <br>

						</form>
					</div>
	      </div>


					</div>


	      </div>

				</div>
			</div>



		</div>
	<div class="footer">
			<div class="container">
				<div class="col-md-4">
					<h3>Location</h3>
					<p>
					Federal University Lokoja<br>
						Kogi State,<br>
						Nigeria.<br>
					</p>

				</div>
				<div class="col-md-4 support-footer">
					<h3>SUPPORT</h3>
					<p>
						<a>Terms & Conditions</a><br>
						<a>How it Works</a><br>
						<a>Site Map</a><br>
					</p>
				</div>
				<div class="col-md-4 contact-footer">
					<h3>SEND A MESSAGE</h3>
					<form role = "form">
						<div class="form-group">
							<input type="email" name="email-support" placeholder="EMAIL">
						</div>
						<div class="form-group message">
							<textarea name="message" cols = "41" rows="5" placeholder="MESSAGE"></textarea>
						</div>
						<button class="btn btn-danger">SEND MESSAGE</button>
					</form>

				</div>
			</div>
		</div>



	</body>
	</html>
