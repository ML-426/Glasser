

<?php
include('functions.php'); 
$pageTitle = "Register";
include('dashboard_header.php');
?>

<h1>Add New User</h1>
<a href="user.php">Go Back</a>
<hr>
<form action="register.php" method="POST" class="form" style="width:50%">
	<div class="form-group">
		<label for="username">Username:</label> 
		<input type="text" name="username" class="form-control" id="username">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" name="password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<label for="employee_id">Employee ID:</label>
		<input type="text" name="employee_id" class="form-control" id="employee_id">
	</div>
	<div class="form-group">
		<label for="first_name">First Name:</label> <input type="text" name="first_name" class="form-control" id="first_name">
	</div>
	<div class="form-group">
		<label for="last_name">Last Name:</label> 
		<input type="text" name="last_name" class="form-control" id="last_name">
	</div>
	<div class="form-group">
		<label for="title">Title:</label> 
		<select name="title" class="form-control" id="title">
			<option value='Bartender'>Bartender</option>
			<option value='Manager'>Manager</option>
		</select>
	</div>
	<p><input type="submit" value="Submit"></p>
</form>