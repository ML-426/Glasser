<! DocTYPE html>
<html>
	<head>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styleCK.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Payment</title>
	</head>
	
<body>

<!--Top nav var insert start -->
  <div class="hero">  
  <div class="nav-bar">
    <div class="nav-logo">
       
    </div>
    <div class="nav-links" id="nav-links">
      <i class="fa fa-close" onclick ="closeMenu()"></i>
   
   <!-- sub menu  start -->  
<nav id="navbar" style="margin:-38px -120px" >
    <img src="chapel_logo.png" align="left" width="100" height="100" style="margin:0px 2px" background-color="#fff"/>
     <ul style="margin:0px 0px">
       <li class="dropdown">
         <a href="index.php" class="dropbtn">HOME</a>
         <div class ="dropdown-content">
         </div>
       </li>

       <li class="dropdown">
         <a href="#" class="dropbtn">MENU</a>
         <div class="dropdown-content">
           <a href="beer.php" target="_blank">BEER</a>
           <a href="cocktail.php" target="_blank">COCKTAIL</a>
           <a href="wine&rose.php" target="_blank">WINE & ROSE</a>
             <a href="champagne.php" target="_blank">CHAMPAGNE</a>
           <a href="glassware.php" target="_blank">GLASSWARE</a>
         </div>
       </li>
        <li class="dropdown">
           <a href="login_home.php" class="dropbtn">EMPLOYEE LOG IN</a>        
        </li>

      </ul>

   </nav>
</div>
</div>
</div>
<!--Top nav var insert finish -->

			
 <div class="banner-title">

<br>
<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		require('mysqli_connect_glasser.php');
		
		$total = $_POST['payment_total'];
		
		$payment_method = mysqli_real_escape_string($dbc, $_POST['payment_method']);

		$query = "INSERT INTO payment (payment_method, total, payment_datetime)VALUES('$payment_method','$total', NOW())";
		
		$run = mysqli_query($dbc, $query);
		
			
		if($_POST['payment_method'] == "Cash"){
			echo "
			<div> <h3> Please click 'Confirm' button below to get your order ID. </h3></div> 
			<div> <h3> Please pay your cash payment to the Bartender with your order ID. </h3> </div>
			<br>
			<br>
			<div><a href='workflow_creation.php'><h3>Confirm</h3></a></div>";
		}
		else if ($_POST['payment_method'] == "Credit Card"){
			echo "
			<div>
				<div class='card_info' style='text-align:center'>
					<form action='workflow_creation.php' method='post'>
						<div class='form-group'>
							<label><h3>First Name: </h3></label>
							<input type='text' name='FirstName'>
						</div>
						<div class='form-group'>
							<label><h3>Last Name: </h3></label>
							<input type='text' name='LastName'>
						</div>
						<div class='form-group'>
							<label><h3>Card Number: </h3></label>
							<input type='text' name='card_number'>
						</div>
						<div class='form-group'>
							<label><h3>CVV code: </h3></label>
							<input type='text' name='cvv_code'>
						</div>
						<div class='form-group'>
							<label><h3>Expiration MM/YY: </h3></label>
							<input type='text' name='expiration_month' size='2' maxlenght='2'>
							<input type='text' name='expiration_year' size='2' maxlenght='2'>
						</div>
						<div class='form-group'>
							<label><h3>Zipcode: </h3></label>
							<input type='text' name='zip_code' size='5' maxlenght='5'>
						</div>
						<div>
						<h3><span><b>  Total: $ </b></span>
						<span><b> ".$total." </b></span></h3>
						</div>
						<div class='form-group'>
						<input class='card_payment_submit' type='submit' value='Place Order'/>
						</div>
					</form>
				</div>
			</div>";
		}
		else{
			echo "Payment Error!";
		}
	}
		mysqli_close($dbc);
?>
 </div>

	            


</body>
</html>
