<?php 
	require('mysqli_connect_glasser.php');
		if ($_POST['action'] == 'Update Inventory') {
			$update_product = $_POST['product_id'];
			$update_inventory = $_POST['inventory_update'];
		    $query = 
			"UPDATE product 
			SET unit_in_stock = '$update_inventory' 
			WHERE product_id = '$update_product'";
		    mysqli_query($dbc,$query);
		}
		else {
		  	echo "Error";
		}
	mysqli_close($dbc);
?>