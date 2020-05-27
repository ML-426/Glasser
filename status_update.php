<?php 
	require('mysqli_connect_glasser.php');
		if ($_POST['action'] == 'Update Status') {
			$update_workflow = $_POST['workflow_id'];
			$update_status = mysqli_real_escape_string($dbc, $_POST['status']);
		    $query = 
			"UPDATE workflow 
			SET workflow_status = '$update_status' 
			WHERE workflow_id = '$update_workflow'";
		    mysqli_query($dbc,$query);
		}
		else {
		  	echo "Error";
		}
	mysqli_close($dbc);
?>