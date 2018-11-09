<?php
	include_once("res/connect.php");
	include_once("res/session.php");
	include_once("res/functions.php");
	if ($_SESSION == null){
		header("location:login.php");
	}
	// if(isset($_POST["submitbtn"])){
	// 	payOnline();
	// }

?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Payment Form::Nacoss Due</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		 <!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<script src="js/jquery.js"></script>
		<!-- Bootstrap 3.3.6 -->
		<script src="js/bootstrap.js"></script>
		<script src="https://js.paystack.co/v1/inline.js"></script>
		<script>
		function payWithPaystack(){
				var handler = PaystackPop.setup({
					key: 'pk_test_c7dd5e846247461fa0423b50313b412107657ece',
					email: '<?php echo $_SESSION['email']; ?>',
					amount: 50000,
					metadata: {
						 custom_fields: [
								{
										display_name: "Mobile Number",
										variable_name: "mobile_number",
										value: "+2348012345678"
								}
						 ]
					},
					callback: function(response){
							alert('success. transaction ref is ' + response.reference);
			 				document.getElementById('make_payment').innerHTML = 'Payment Successful';
							document.getElementById('print_btn').style.display = 'block';
							document.getElementById('pay_online').style.display = 'none';

					},
					onClose: function(){
							location.reload();

					}
				});
				handler.openIframe();
			}
		</script>


		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.css">

		<!---Color---->
		<link rel="stylesheet" href="css/color.css">

		<!---Custom---->
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/style.css">
	</head>



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
		<div class="white-bg col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 600px;  margin-bottom: 40px;">
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 col-center">
				<hr/>
				<h3>Welcome, <?php echo $_SESSION['firstname'];?></h3>
				<small class="text-danger"><?php echo $_SESSION['matric_number'];?></small>
					<br>
				<hr/>
						<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 col-center">

					<div class="row">
						<div class="col-sm-12" style="position: absolute; top: -60px; z-index: 1;">
							<div class="col-sm-10 col-center red-bg" style="padding: 20px;">

								<h3 class="text-center" id ="make_payment">MAKE PAYMENT </h3>
							</div>
						</div>
						<form method="post" action="process.php">
						<div class="col-lg-12 white-bg" style="padding-top: 40px;">
							<div class="form-group" id="print_btn" style="display: none;text-align:center;float:right;margin-top:10px; margin-bottom:-20px;">
								<button  style="padding:10px;" type="submit" name = "submitbtn" id="submitbtn" class="btn btn-default">Print Receipt</button>
							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input"  style="text-align: center;"  type="text" value="<?php echo $_SESSION['matric_number'];?>" placeholder="Matric Number" id="matric_number" name="matric_number" required/>
							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input"  style="text-align: center;"  type="text" value="<?php echo $_SESSION['email'];?>" id="email" name="email" required disabled />

							</div>
							<?php
							$matric_number =  $_SESSION['matric_number'];
							$sql = "SELECT * FROM users WHERE matric_number = '$matric_number' ";

							$result = mysqli_query($conn, $sql);
							$check_user = mysqli_num_rows($result);

							if($check_user > 0){
								$row = mysqli_fetch_array($result);
								$department = $row["department"];
								$level = $row["level"];
							}
							?>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" style="text-align: center;" value ="<?php echo $row['department']; ?>" type="text" id="department" name="department"  placeholder="Department" required />

							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input"  style="text-align: center;"  type="text" id="level" name="level" value="<?php echo $row['level']; ?>"  placeholder="Current Academic Level" required />
							</div>
							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input"  style="text-align: center;"  type="text" value="2017/2018" id="session" name="session"  placeholder="Session" required />
							</div>

							<div class="form-group padding-10">
								<input class="form-control col-sm-12 login_input" style="text-align: center;"  type="text" value="&#8358; 500: 00" id="amount" name="amount" disabled required />
							</div>
						</div>
					</form>
					</div>
				<div class="form-group padding-10" style="text-align:center;margin-top:40px;">
					<but***ton  style="padding:10px;" id="pay_online" onclick="payWithPaystack()" name = "submitbtn" id="submitbtn" class="btn red-bg right">Pay Online</button>
				</div>
				<!-- <script type="text/javascript">
					jQuery(document).ready(function($){
						$("#submitbtn").on('click', function(){
							var matric_number = $('#matric_number').val();
							var session = $('#session').val();
							$.ajax({
																		url: 'res/payonline.php',
																		type: 'post',
																		data: {'matric_number': matric_number, 'session': session},
																		success: function(res){
																			window.open('process.php', '_self');
																		}
																});
						});
					});
				</script> -->

			</div>


			</div>
		</div>


	</body>

</html>
