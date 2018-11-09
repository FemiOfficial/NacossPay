<?php
	include_once("res/connect.php");
	include_once("res/session.php");
	include_once("res/functions.php");
	if ($_SESSION['matric_number'] == null ){
		header("location:login.php");
	}
  if(isset($_POST["submitbtn"])){
    savePayment();
  }

?>
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Payment Receipt::Nacoss Due</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		 <!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="css/bootstrap.css">

		<!-- Font Awesome -->
		<link rel="stylesheet" href="css/font-awesome.css">
    <script type="text/javascript" src = "js/jquery.js"></script>

		<script src="https://js.paystack.co/v1/inline.js"></script>
    <script type="text/javascript" src = "js/print.js"></script>



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
      <div class="form-group" id="print_btn" style="text-align:center;float:right;margin-top:10px; margin-bottom:-20px;">
        <button  style="padding:10px;" name = "submitbtn" onclick="printContent('print_receipt')" class="btn btn-default">Print Receipt</button>
      </div>
			<div class="col-lg-6 col-md-6 col-sm-16 col-xs-6 col-center" id = "print_receipt">
				<hr/>
        <img class="pull-right" src="img/download.jpeg" width="50px" height="50px" style="float:left;" />
        <h2>Nacoss Due Receipt</h2>
        <?php
        $matric_number =  $_SESSION['matric_number'];
        $sql = "SELECT * FROM users WHERE matric_number = '$matric_number' ";

        $result = mysqli_query($conn, $sql);
        $check_user = mysqli_num_rows($result);

        if($check_user > 0){
          $row = mysqli_fetch_array($result);
          $department = $row["department"];
          $level = $row["level"];
          $firstname = $row['firstname'];
          $lastname = $row['lastname'];
          $paymentID = $_SESSION['payment_id'];

          $sql2 = "SELECT * FROM payments WHERE user_matric = '$matric_number' AND  payment_id = '$paymentID' ";
          $result = mysqli_query($conn, $sql2);
          $row_date = mysqli_fetch_array($result);
          $date = $row_date['payment_date'];
          $session = $row_date['session'];

        }
        ?>

				<h3><?php echo $firstname." ".$lastname;?></h3>
				<h4 class="text-danger"><?php echo "Matric Number: ".$_SESSION['matric_number'];?></h4>
				<hr/>

				<table class='table'>
					<tbody>
            <tr>
              <th>Student Level:</th>
              <th><?php echo $level;?></th>
            </tr>
            <tr>
              <th>Payment Date: </th>
              <th><?php echo $date; ?></th>
            </tr>
            <tr>
              <th>Session:</th>
              <th><?php echo $session; ?></th>
            </tr>

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
