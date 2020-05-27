<! DocTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
	$(document).ready(function () {
		$(".workflow").submit();
	});
	</script>
    <title>Workflow Creation</title>
	</head>
	
	<body>
		<?php 
        require('mysqli_connect_glasser.php');
		
		$query1 = 'SELECT * FROM payment ORDER BY payment_datetime DESC LIMIT 1';
        $run1 = mysqli_query($dbc, $query1);
        $count1 = mysqli_num_rows($run1);
	    $row1 = mysqli_fetch_array($run1, MYSQLI_ASSOC);
       
		$query2 = 'SELECT * FROM orders';
		$run2 = mysqli_query($dbc, $query2);
		$count2 = mysqli_num_rows($run2); 
		
		$query3 = 'SELECT * FROM product';
		$run3 = mysqli_query($dbc, $query3);
        $count3 = mysqli_num_rows($run3);
	    $row3 = mysqli_fetch_array($run3, MYSQLI_ASSOC);
		
		while($row2 = mysqli_fetch_array($run2, MYSQLI_ASSOC)){ 
		
			$new_inventory = $row3['unit_in_stock'] - $row2['quantity'];
		?>
			
			
		<form class="workflow" action="confirmation.php" method="POST">
			<input type="hidden" name="payment_id" value="<?php echo $row1['payment_id']; ?>">
			<input type="hidden" name="payment_method" value="<?php echo $row1['payment_method']; ?>">
			<input type="hidden" name="total" value="<?php echo $row1['total']; ?>">
			<input type="hidden" name="order_id" value="<?php echo $row2['order_id']; ?>">
			<input type="hidden" name="product_id" value="<?php echo $row2['product_id']; ?>">
			<input type="hidden" name="product_name" value="<?php echo $row2['product_name']; ?>">
			<input type="hidden" name="product_price" value="<?php echo $row2['product_price']; ?>">
			<input type="hidden" name="glassware" value="<?php echo $row2['glassware']; ?>">
			<input type="hidden" name="quantity" value="<?php echo $row2['quantity']; ?>">
			<input type="hidden" name="new_inventory" value="<?php echo $new_inventory; ?>">
		</form>
		
		<?php 
		}
		mysqli_close($dbc);
		?>
	</body>
</html>