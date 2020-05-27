
	  
<?php

include('functions.php'); 
$pageTitle = "Dashboard";
include('dashboard_header.php');


require('mysqli_connect_glasser.php');
	
	if (mysqli_connect_errno()){
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$query= "SELECT * FROM workflow";
	$run = mysqli_query($dbc, $query);
	$count = mysqli_num_rows($run);
	
	echo "
	<div>
	<h1> Workflow Dashboard </h1>
	</div>
	<div>
	<a href='loggedin.php'>Go Back </a>
	</div>
	<hr>
	";
	
	echo "<div class='container'>
			<div class='row' id='workflow_head' style='font-weight:bold'>
				<div class='col'>Workflow ID</div>
				<div class='col'>Order ID</div>
				<div class='col'>Item#</div>
				<div class='col'>Item Name</div>
				<div class='col'>Glassware</div>
				<div class='col'>Quantity</div>
				<div class='col'>Payment Method</div>
				<div class='col'>Workflow Status</div>
				<div class='col'>Update Status</div>
				<div class='col'>Workflow Start Time</div>
			</div>";
				
	if($count>0){
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
			if($row['workflow_status'] != "Completed"){
				echo "
					<div class='row' id='workflow' style='border:1px solid black; padding:15px'>
						<div class='col'>".$row['workflow_id']."</div>
						<div class='col'>".$row['payment_id']."</div>
						<div class='col'>".$row['order_id']."</div>
						<div class='col'>".$row['product_name']."</div>
						<div class='col'>".$row['glassware']."</div>
						<div class='col'>".$row['quantity']."</div>
						<div class='col'>".$row['payment_method']."</div>
						<div class='col'>".$row['workflow_status']."</div>
						<div class='col'>
							<form onsubmit='setTimeout(function () { window.location.reload(); }, 10)' action='status_update.php' method='post'>
							<input name='workflow_id' value=".$row['workflow_id']." type='hidden'/>
							<select name='status'>
								<option value='New'>New</option>
								<option value='In Progress'>In Progress</option>
								<option value='Ready'>Ready</option>
								<option value='Completed'>Completed</option>
								<option value='Paid Cash'>Paid Cash</option>
							</select>
							<input class='updatebttn' type='submit' name='action' value='Update Status'>
							</form>
						</div>
						<div class='col'>".$row['workflow_datetime']."</div>
					</div>
			";
			}
		}
	}
	
	else{
		echo "<br><br><p>Currently, there is no active workflow.</p>";
	}
	echo "</div>";
	mysqli_close($dbc);
?>