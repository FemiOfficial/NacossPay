<?php
	include_once("res/connect.php");
	include_once("res/session.php");
	include_once("res/functions.php");
	if (isset($_POST['submitbtn'])){
		signUp();
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


	<body class="container grey-bg">

		<div style="margin-top: 100px;">
			<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 col-center">

				<form method="post">
					<input type="hidden" name="phrase" value="login">
					<div class="row">
						<div class="col-sm-12" style="position: absolute; top: -60px; z-index: 1;">
							<div class="col-sm-10 col-center red-bg" style="padding: 20px;">
								<h3 class="text-center">REGISTER</h3>
							</div>
						</div>
						<div class="col-lg-12 white-bg" style="padding-top: 40px;">

							<!-- <p class="text-center warm-red gap-10">Invalid login details</p> -->

							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="text" placeholder="Matric Number" id="matric-number" name="matric-number" required />
							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="text" id="firstname" name="firstname"  placeholder="Firstname" required />
							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="text" id="lastname" name="lastname"  placeholder="Lastname" required />

							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="password" id="password" name="password"  placeholder="Password" required />

							</div>

							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="email" id="Email" name="email"  placeholder="example@email.com" required />

							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="text" id="department" name="department"  placeholder="Department" required />

							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="text" id="level" name="level"  placeholder="Current Academic Level" required />

							</div>

						<div class="form-group padding-10">
							<button type="submit" name = "submitbtn" class="btn red-bg right">Sign Up</button>

						</div>


						</div>
					</div>
				</form>

			</div>

		</div>


			<!-- jQuery 2.2.3 -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="js/bootstrap.js"></script>

	</body>
</html>
