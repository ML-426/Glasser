<?php
// The user is redirected here from login.php.

session_start();

if (!isset($_SESSION['user_id'])) {

	require ('functions.php');
	redirect_user('login_home.php');	

}

include('functions.php');
$pageTitle = "Welcome";
include('mysqli_connect_glasser.php');
include ('dashboard_header.php');

$query = "SELECT * FROM user WHERE user_id = ".$_SESSION['user_id'];
$run = mysqli_query($dbc, $query);
$count = mysqli_num_rows($run);

if ($count == 1){
	$row = mysqli_fetch_array($run, MYSQLI_ASSOC);
	
	echo 
	"<h1>Welcome, ".$row['first_name']."!</h1>
	<br />&nbsp;
	<p>You are now logged in</p>
	";
	
	if($row['title'] == 'Admin' || $row['title'] == 'Manager'){
		echo "
			<div>
				<a href='dashboard.php'>Workflow Dashboard</a>
			</div>
			<div>
				<a href='inventory.php'>View / Update Inventory</a>
			</div>
			<div>
				<a href='user.php'>View Users / Add New Users</a>
			</div>
		";
	}
	else{
		echo "
			<div>
				<a href='dashboard.php'>Workflow Dashboard</a>
			</div>
			<div>
				<a href='inventory.php'>View / Update Inventory</a>
			</div>
		";
	}
}
else{
	echo "Error!";
}
mysqli_close($dbc);
?>