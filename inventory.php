
<?php
include('functions.php'); 
$pageTitle = "Inventory";
include('dashboard_header.php');

require('mysqli_connect_glasser.php');

if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$query= "SELECT * FROM product WHERE category_id !=5";
	$run = mysqli_query($dbc, $query);
	$count = mysqli_num_rows($run);
	
	echo "
	<div>
	<h1> Inventory </h1>
	</div>
	<div>
	<a href='loggedin.php'>Go Back </a>
	</div>
	<hr>
	";
	
	echo "<div class='container'>
			<div class='row' id='inventory_head' style='font-weight:bold'>
				<div class='col'>Product Name</div>
				<div class='col'>Current Inventory</div>
				<div class='col'>Update Inventory</div>
			</div>";
			
	if($count>0){
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
			echo "
					<div class='row' id='inventory' style='border:1px solid black; padding:15px'>
						<div class='col'>".$row['product_name']."</div>
						<div class='col'>".$row['unit_in_stock']."</div>
						<div class='col'>
						<form onsubmit='setTimeout(function () { window.location.reload(); }, 10)' action='inventory_update.php' method='post'>
							<input name='product_id' value=".$row['product_id']." type='hidden'/>
							<input type='text' name='inventory_update'  size='11' maxlenght='11'>
							<input class='updatebttn' type='submit' name='action' value='Update Inventory'>
							</form>
						</div>
					</div>
				";
		}
	}
	mysqli_close($dbc);
?>
