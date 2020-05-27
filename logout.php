<?php
session_start();

if (!isset($_SESSION['user_id'])) {

	require ('functions.php');
	redirect_user('login_home.php');	
	
} else { 
	$_SESSION = array(); 
	session_destroy(); 
	setcookie ('PHPSESSID','',time()-3600,'/php/','',0,0); 
}


include('functions.php');
$pageTitle = "Goodbye!";
include ('dashboard_header.php');

echo "<h1>Goodbye!</h1>
<p>You are now logged out!</p>";
?>