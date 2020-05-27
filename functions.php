<?php
function title($str){
	if(empty($str)){
		$str = "Glasser";
	}
	echo $str;
}

function redirect_user ($page = 'index.php') {

	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	$url = rtrim($url, '/\\');	
	
	$url .= '/' . $page;
	
	header("Location: $url");
	exit(); 

} 


function check_login($dbc, $username = '', $pass = '') {

	$errors = array(); 

	if (empty($username)) {
		$errors[] = 'You forgot to enter your username.';
	} 
	else {
		$u = mysqli_real_escape_string($dbc, trim($username));
	}

	
	if (empty($pass)) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($dbc, trim($pass));
	}

	if (empty($errors)) { 

		
		$q = "SELECT user_id, first_name FROM user WHERE username='$u' AND password=SHA1('$p')";		
		$r = mysqli_query ($dbc, $q); 
		
		
		if (mysqli_num_rows($r) == 1) {

			
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
	
		
			return array(true, $row);
			
		} else { 
			$errors[] = 'The username and password entered do not match those on file.';
		}
		
	} 
	
	return array(false, $errors);

}

?>