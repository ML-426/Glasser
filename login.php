<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	
	require_once ('functions.php');
	
	require ('mysqli_connect_glasser.php');
		
	list ($check, $data) = check_login($dbc, $_POST['username'], $_POST['password']);
	
	if ($check) { 
		
		session_start();
		$_SESSION['user_id'] = $data['user_id'];
		
		redirect_user('loggedin.php');
			
	} 
	else { 

		$errors = $data;

	}
		
	mysqli_close($dbc); 

}

include ('login_form.php');
?>