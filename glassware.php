<! DocTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style1.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<title> Glassware - Chapel Bar </title>

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
           <a href="wine_rose.php" target="_blank">WINE & ROSE</a>
             <a href="champagne.php" target="_blank">CHAMPAGNE</a>
           <a href="glassware.php" target="_blank">GLASSWARE</a>
         </div>
       </li>
        <li class="dropdown">
           <a href="login_home.php" class="dropbtn">EMPLOYEE LOG IN</a>        
        </li>
     
       <li>
          <a href="shopping_cart.php"><img src='https://www.pikpng.com/pngl/m/456-4560411_shopping-cart-and-buy-button-icon-comments-shopping.png'  height=50 /></a>

        </li>

      </ul>

   </nav>

<!--Top nav var insert finish -->

		<?php //not touch here
		require("mysqli_connect_glasser.php");
			
		if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
		// put this shopping cart <div> tag to the header
		  $query = 'SELECT * FROM orders ORDER BY product_id ASC';
		  $run = mysqli_query($dbc, $query);
		  $count = mysqli_num_rows($run);
		  $total_quantity = 0;
		
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
				$total_quantity += $row['quantity'];
			}
		?>
				  <div>
					 <span><?php  $total_quantity; ?></span>  
					
				</div>
	
		<main> 
        	

			<div class="jumbotron text-center" style="margin:50px auto 30px;">
  				<h1>Special Offer for You </h1>
  				<h5>Select glassware to experience new!</h5> 
			</div>

        </main>
	
		<?php   //no touch from here 
			$product_query= "SELECT category_description FROM category WHERE category_id=5";
			$product_run = mysqli_query($dbc, $product_query);
			$product_count = mysqli_num_rows($product_run);
			
			if($product_count>0){
				$row = mysqli_fetch_array($product_run, MYSQLI_ASSOC);
				echo "<div>".$row['category_description']. "</div> <br/>";
			}
			

	
			$glassware_query= "SELECT * FROM product WHERE category_id=5 AND unit_in_stock > 0 ORDER BY product_id ASC";
			$glassware_run = mysqli_query($dbc, $glassware_query);
			$glassware_count = mysqli_num_rows($glassware_run);   // to here 
	
			if($glassware_count>0){
				/*echo "<div> Currently, there are $glassware_count glasswares. </div> <br/> <hr>"; */
                 echo"<hr>";
				
				echo "<div class='container'>
						<div class='row' id='record'>";
				
						while($row = mysqli_fetch_array($glassware_run, MYSQLI_ASSOC)){  // no touch from here
							
							echo"
								<div class='col-6'>
								<body>

									<div><img src=".$row['product_picture']." height=400 width=300></div><br>

									<div style= font-size:150%  >".$row['product_name']."</div><br> 

									<div style= font-size: large >".$row['product_description']."</div><br>
								</div>";
								
						}
						
				echo "</div>
					</div>";	
			}
			
			else{
				echo "<p> Sorry, there is no glass currently. </p>";
			}
			
			mysqli_close($dbc); //not here
	?>
  <hr>

           <Style>
	            .hero{ 
                height: 100vh;
                background:#fff ;
                background-position: center;
                background-size: cover;
                overflow-x:hidden;
                position:relative;
                }
          </Style>


</body>
  <p>
	We hope you enjoy your time at Chapel. Thank you for your visit.
  </p>


</html>