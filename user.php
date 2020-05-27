
<?php

include('functions.php'); 
$pageTitle = "Users";
include('dashboard_header.php');

require('mysqli_connect_glasser.php');

if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$query= "SELECT * FROM user";
	$run = mysqli_query($dbc, $query);
	$count = mysqli_num_rows($run);
	
	echo "
	<div>
	<h1> User List </h1>
	</div>
	<div>
	<a href='new_user.php'>Add New User</a>
	</div>
	<div>
	<a href='loggedin.php'>Go Back </a>
	</div>
	<hr>
	";
	
	echo "<div class='container'>
			<div class='row' id='user_head' style='font-weight:bold'>
				<div class='col'>User ID</div>
				<div class='col'>Employee ID</div>
				<div class='col'>First Name</div>
				<div class='col'>Last Name</div>
				<div class='col'>Title</div>
				<div class='col'>Add Time</div>
			</div>";
			
	if($count>0){
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
			echo "
					<div class='row' id='user' style='border:1px solid black; padding:15px'>
						<div class='col'>".$row['user_id']."</div>
						<div class='col'>".$row['employee_id']."</div>
						<div class='col'>".$row['first_name']."</div>
						<div class='col'>".$row['last_name']."</div>
						<div class='col'>".$row['title']."</div>
						<div class='col'>".$row['reg_date']."</div>
					</div>
				";
		}
	}
	else{
		echo "<br><br><p>Currently, there is no active user in the system.</p>
		
		<br><br><p> Please add new user. <p> 
		
		<br><br><a href='new_user.php'>Add New User</a>";
	}
	mysqli_close($dbc);
?>
