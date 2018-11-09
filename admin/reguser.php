<?php
	session_start();
	$student_first_name = htmlspecialchars($_REQUEST['student_first_name']);
	$student_last_name = htmlspecialchars($_REQUEST['student_last_name']);
	$student_matric_no = htmlspecialchars($_REQUEST['student_matric_no']);
	$Level = sha1(htmlspecialchars($_REQUEST['level']));
	$student_email = htmlspecialchars($_REQUEST['student_email']);
	$password = sha1(htmlspecialchars($_REQUEST['password']));
	
	//Database Connection
	$link = mysqli_connect("localhost", "rootman", "inferno1987", "nacoss");
	$query = mysqli_prepare($link, "INSERT INTO user(student_first_name, student_last_name, student_matric_no, level, password, email) VALUES ('".$student_first_name."','".$student_last_name."','".$student_matric_no."','".$level."','".$student_email."','".$password."')");
	
	mysqli_stmt_execute($query);
	
	header("location: users.php?ru=true");
	
?>
