<?php
	session_start();
	$title = htmlspecialchars($_REQUEST['title']);
	$desc = htmlspecialchars($_REQUEST['desc']);
	$amount = htmlspecialchars($_REQUEST['amount']);
	$date_time = htmlspecialchars($_REQUEST['date_time']);
	
	//Database Connection
	$link = mysqli_connect("localhost", "rootman", "inferno1987", "nacoss");
	$query = mysqli_prepare($link, "INSERT INTO expenses(title, description, amount, date_time) VALUES ('".$title."', '".$desc."', '".$amount."', '".$date_time."')");
	
	mysqli_stmt_execute($query);
	
	header("location: expense.php");
	
?>
