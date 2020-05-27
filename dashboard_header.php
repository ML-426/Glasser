<!DOCTYPE html>

<html>
<head>
	<title>
	<?php title($pageTitle); ?>
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Glasser Dashboard</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="loggedin.php">Home</a>
      </li>
      
		
	  <?php
		if (!isset($_SESSION['user_id'])) {
				echo "<li class='nav-item'>
						<a class='nav-link' href='login_form.php'>Log In</a>
					  </li>";
		}
		else{
				$query = "SELECT * FROM user WHERE user_id = ".$_SESSION['user_id'];
				$run = mysqli_query($dbc, $query);
				$count = mysqli_num_rows($run);

				if ($count == 1){
				$row = mysqli_fetch_array($run, MYSQLI_ASSOC);
				 
					echo "
					  <li class='nav-item'>
						<a class='nav-link' href='logout.php'>Log Out</a>
					  </li>
					  <li class='nav-item' style='position:absolute; right:0'>
						<a class='nav-link' href='loggedin.php'>".$_SESSION['first_name']."</a>
					  </li>";
				}
			}
			?>
		<li class="nav-item">
			<a class="nav-link" href="index.php">Order System</a>
		</li>
	</ul>
  </div>
</nav>
<br />&nbsp;