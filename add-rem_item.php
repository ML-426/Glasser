<?php 
	require('mysqli_connect_glasser.php');
		if ($_POST['action'] == 'Update Quantity') {
			$update_quantity = $_POST['shopping_cart_quantity'];
			$order_id = $_POST['shopping_cart_order_id'];
		    $query = 
			"UPDATE orders 
			SET quantity = '$update_quantity' 
			WHERE order_id = '$order_id'";
		    mysqli_query($dbc,$query);
		}
		else if ($_POST['action'] == 'Remove') {
			$order_id = $_POST['shopping_cart_order_id'];
		    $query = "DELETE FROM orders WHERE order_id = '$order_id'";
		    mysqli_query($dbc,$query);
		} 
		else {
		  	echo "Error";
		}
	mysqli_close($dbc);
?>