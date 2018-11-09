<?php
	include_once("res/connect.php");
	include_once("res/session.php");
	include_once("res/functions.php");
	if ($_SESSION == null){
		header("location:login.php");
	}

?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Welcome <?php echo $name;?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		 <!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="css/bootstrap.css">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.css">
		<script src="https://js.paystack.co/v1/inline.js"></script>


		<!---Color---->
		<link rel="stylesheet" href="css/color.css">

		<!---Custom---->
		<link rel="stylesheet" href="css/custom.css">

	</head>

	<style>
		.login_input {height: 50px; font-size: 16px; padding: 15px 2px; margin-top: 20px; border-radius: 0px; border-right: none; border-left: none; border-top: none; border-bottom: 1px solid #787E78; box-shadow:none;}
		.login_input:focus {box-shadow:none;}
	</style>

	<body class="container">
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
						<a class="navbar-brand" style="padding: 10px 3px;" href=""><img class="pull-right" src="img/logo.png" width="180px" /></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-navbar-collapse-1" style="border: 0px;">
						<ul class="nav navbar-nav">

						</ul>

						<ul class="nav navbar-nav navbar-right">
							<li><a class = "nav-active" href="">Home</a></li>
							<li><a href="paymentform.php">Payment Form</a></li>
							<?php
							if ($_SESSION != null){
								?>
									<li><a href="logout.php">Logout</a></li>
							<?php
									}
							?>

						</ul>
					</div>
				</div>
			</div>
		</nav>
		<div class="white-bg col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 600px;  margin-bottom: 40px;">
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 col-center">
				<hr/>
				<h3>Welcome, <?php echo $_SESSION['firstname'];?></h3>
				<hr/>

				<h4>Past Payment</h4>
				<table class='table'>
					<thead>
						<tr>
							<th>Payment Id</th>
							<th>Matric Number</th>
							<th>Date/Time of Payment</th>
							<th>Session</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql =  "SELECT * FROM payments";
							$fetch = mysqli_query($conn, $sql);
							$check_db = mysqli_num_rows($fetch);
							while ($row = mysqli_fetch_array($fetch)) {
								?>
						<tr>

									<td><?php echo $row["payment_id"];?></td>
									<td><?php echo $row["user_matric"];?></td>
									<td><?php echo $row["payment_date"];?></td>
									<td><?php echo $row["session"];?></td>
									<td>Paid</td>



						</tr>
						<?php
					}
				?>

						<!-- <tr>

					</tr> -->
					</tbody>
				</table>

			</div>
		</div>
			<!-- jQuery 2.2.3 -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="js/bootstrap.js"></script>

	</body>
</html>
