<?php
	include_once("res/connect.php");
	include_once("res/session.php");
	include_once("res/functions.php");


	if (isset($_POST['submitbtn'])){
		if($_POST["matric_number"] == "Admin" and $_POST["password"] == "123456"){
			$_SESSION["firstname"] = "Admin";
		header("location: paymentRecords.php");
	}else{
		signIn();
	}
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
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-center">

				<form method="post">
					<div class="row">
						<div class="col-sm-12" style="position: absolute; top: -60px; z-index: 1;">
							<div class="col-sm-10 col-center red-bg" style="padding: 20px;">
								<h3 class="text-center">LOGIN</h3>
							</div>
						</div>
						<div class="col-lg-12 white-bg" style="padding-top: 40px;">

							<div class="alert alert-danger alert-dismissable" id = "alert" style="display: none;">
							</div>

							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="text" placeholder="Matric Number" id="matric_number" name="matric_number" required />
							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" type="password" id="password" name="password"  placeholder="Password" required />
							</div>

							<div style="padding: 20px; margin-top: 130px;">
								<button type="submit" name = "submitbtn" class="btn red-bg left">Sign in</button>
							</div>
							<div class = "login-reg-link">
								Create New Account <a href = "register.php"> here</a>
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
