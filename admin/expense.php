<?php
	session_start();
	if (empty($_SESSION['admin-user']))
	{
		header("location: login.php");
	}
	else
	{
		//Database Connection
		$link = mysqli_connect("localhost", "rootman", "inferno1987", "nacoss");
		$query = mysqli_prepare($link, "SELECT name, email FROM user WHERE id = '".$_SESSION['admin-user']."' ");
		
		mysqli_stmt_execute($query);
		/* bind result variables */
		mysqli_stmt_bind_result($query, $name, $email);
		/* fetch value */
		mysqli_stmt_fetch($query);
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
							<li><a href="index.php">Home</a></li>
							<li><a href="users.php">Users</a></li>
							<li><a href="expense.php">Expenses</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<div class="white-bg col-lg-12 col-md-12 col-sm-12 col-xs-12" style="min-height: 600px;  margin-bottom: 40px;">
			<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 col-center">
				<hr/>
				<h3>Welcome, <?php echo $name;?></h3>
				<hr/>
				<p>Expenses Form</p>
				<form method="post" action="process.php">
					<label>Title:
						<input type="text" id="title" name="title" />
					</label>
					<br/>
					<label> Description: <br/>
						<textarea id='desc'name='desc' rows='5' cols='40'></textarea>
					</label>
					<br/>
					<label> Amount: 
						<input type="text"  id="amount" name="amount" value="" />
					</label>
					<br/>
					<label> Date / Time: 
						<input type="text"  name="date_time" value="" placeholder="e.g. DD/MM/YYYY" />
					</label>
					<br/>
					<button type="submit">Save</button>

				</form>
				
				<hr/>
				
				<table class='table'>
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Description</th>
							<th>Amount</th>
							<th>Date/Time</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$link = mysqli_connect("localhost", "rootman", "inferno1987", "nacoss");
					$ex_list = mysqli_prepare($link, "SELECT id, title, description, amount, date_time FROM expenses");
					
					mysqli_stmt_execute($ex_list);
					/* bind result variables */
					mysqli_stmt_bind_result($ex_list, $id, $title, $description, $amount, $date_time);
					/* fetch value */
					$sn = 1;
					while(mysqli_stmt_fetch($ex_list))
					{
						echo "<tr>";
						echo "<td>".$sn."</td>";
						echo "<td> ".$title."</td>";
						echo "<td> ".$description."</td>";
						echo "<td> ₦".$amount."</td>";
						echo "<td>".$date_time."</td>";
						echo "<tr>";
						$sn++;
					}
				?>
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
