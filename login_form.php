<?php
require_once('functions.php');
$pageTitle = "Login";

include('dashboard_header.php');

if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}
?>
<h1>Login</h1>
<br />&nbsp;
<form action="login.php" method="post" class="form" style="width:25%">
	
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" name="username" class="form-control" id="username">
	</div>
	
	<div class="form-group">
		<label for="password">Password:</label> <input type="password" name="password" id="password" class="form-control">
	</div>
	<p><input type="submit" value="Submit"></p>

</form>
