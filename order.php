<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		require('mysqli_connect_glasser.php');
		
		$pid = $_POST['pid'];
		
		$name = mysqli_real_escape_string($dbc, $_POST['name']);

		$picture = mysqli_real_escape_string($dbc,$_POST['picture']);

		$price = $_POST['price'];
		
		$glassware = mysqli_real_escape_string($dbc, $_POST['glassware']);
		
		$quantity = $_POST['quantity'];

		$query = "INSERT INTO orders (product_id, product_name, product_price, product_picture, glassware, quantity, order_time)VALUES('$pid','$name','$price','$picture','$glassware','$quantity', NOW())";
			
		$run = mysqli_query($dbc, $query);
		
		mysqli_close($dbc);
	}
?>
