<?php
	session_start();
	
	if ($_POST['log-name'] && $_POST['passkey'] )
	{
		$username = htmlspecialchars(trim($_POST['log-name']));
		$pass = sha1(trim($_POST['passkey']));
		
		//Database Connection
		$link = mysqli_connect("localhost", "rootman", "inferno1987", "nacoss");
		$query = mysqli_prepare($link, "SELECT id FROM user WHERE username = '".$username."' AND password = '".$pass."' LIMIT 1");
		
		if ( mysqli_stmt_execute($query))
		{
			/* bind result variables */
			mysqli_stmt_bind_result($query, $id);

			/* fetch value */
			mysqli_stmt_fetch($query);
			
			if (!empty($id))
			{
				$_SESSION['admin-user'] = $id;
				header("location:index.php");
			}
			else
			{
				$response = "<h4>Your login details do not exist in the database!</h4>";
			}
			

		}
		else
		{
			
			$response = "<h4>Your login details do not exist in the database!</h4>";
		}
		
		mysqli_close($link);
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
		
	</head>
	
	<style>
		.login_input {height: 50px; font-size: 16px; padding: 15px 2px; margin-top: 20px; border-radius: 0px; border-right: none; border-left: none; border-top: none; border-bottom: 1px solid #787E78; box-shadow:none;}
		.login_input:focus {box-shadow:none;}
	</style>
	
	<body class="container grey-bg">
		
		<div style="margin-top: 250px;">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-center">
				 
				<form method="post">
					<input type="hidden" name="phrase" value="login">
					<div class="row">
						<div class="col-sm-12" style="position: absolute; top: -60px; z-index: 1;">
							<div class="col-sm-10 col-center red-bg" style="padding: 20px;">
								<h3 class="text-center">LOGIN</h3>
							</div>
						</div>
						<div class="col-lg-12 white-bg" style="padding-top: 40px;">
							
							<p class="text-center warm-red gap-10"><?php echo $response;?></p>
							
							<div class="form-group padding-10">
<!--
								<label class="c-r-blue control-label col-sm-12">Username</label>
-->
								<input class="form-control col-sm-12 login_input" type="text" placeholder="Username" id="log-name" name="log-name" required />
							</div>
							<div class="form-group padding-10">
<!--
								<label class="c-r-blue control-label col-sm-12">Password</label>
-->
								<input class="form-control col-sm-12 login_input" type="password" id="passkey" name="passkey"  placeholder="Password" required />
							</div>
							
							<div style="padding: 20px; margin-top: 130px;">
								<button type="submit" class="btn red-bg left">Sign in</button>
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
