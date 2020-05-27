<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include('functions.php'); 
	$pageTitle = "Register"; 
	include ('dashboard_header.php');
	require('mysqli_connect_glasser.php');
	
	$errors = array(); 
	
	
	if(empty($_POST['username'])){
		$errors[] = "You forgot to enter your username.";
	}
	else{
		$u = mysqli_real_escape_string($dbc, $_POST['username']);
	}
	
	if(empty($_POST['password'])){
		$errors[] = "You forgot to enter your password.";
	}
	else{
		$p = mysqli_real_escape_string($dbc, $_POST['password']);
	}
	
	if(empty($_POST['employee_id'])){
		$errors[] = "You forgot to enter your Employee ID.";
	}
	else{
		$eid = mysqli_real_escape_string($dbc, $_POST['employee_id']);
	}
	
	if(empty($_POST['first_name'])){
		$errors[] = "You forgot to enter your First Name.";
	}
	else{
		$fn = mysqli_real_escape_string($dbc, $_POST['first_name']);
	}
	
	if(empty($_POST['last_name'])){
		$errors[] = "You forgot to enter your Last Name.";
	}
	else{
		$ln = mysqli_real_escape_string($dbc, $_POST['last_name']);
	}
	
	if(empty($_POST['title'])){
		$errors[] = "You forgot to enter your Title.";
	}
	else{
		$t = mysqli_real_escape_string($dbc, $_POST['title']);
	}
	
	if(empty($errors)){ 
		$query = "INSERT INTO user (username, password, reg_date, employee_id, first_name, last_name, title)VALUES('$u',SHA1('$p'), NOW(), '$eid', '$fn', '$ln', '$t')";
		
		$run = mysqli_query($dbc, $query); 
		
		if($run){
			echo "<h1>Thank you!</h1> <p>New user has been added to the system.</p>
			<br><a href='user.php'>Go Back </a>";
		}
		else{ 
			echo "<h1>Error!<h1> <p>You could not be registered. Please try again.</p>
			<br><a href='user.php'>Go Back </a>";
			
			
			echo "<p>".mysqli_error($dbc)."</p>";
		
		mysqli_close($dbc); 
		exit(); 
		}
	}
	else{ 
		echo "<h2>Error!</h2>";
		echo "<p>The following error(s) have occured:<br />";
		foreach ($errors as $error){
			echo " - $error <br />";
		}
		echo "Please try again.</p>";
	}
	mysqli_close($dbc);
}
?>