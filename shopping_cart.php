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
        <link rel="stylesheet" type="text/css" href="cart.css">
        <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@700&display=swap" rel="stylesheet">

    <title>Shopping Cart</title>
	</head>
	
<body>
<?php
		require("mysqli_connect_glasser.php");
			
		if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
		
		  $query = 'SELECT * FROM orders ORDER BY product_id ASC';
		  $run = mysqli_query($dbc, $query);
		  $count = mysqli_num_rows($run);
		  $total_quantity = 0;
		
		while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
				$total_quantity += $row['quantity'];
			}
			
			
?>

<!--Top nav bar insert start -->
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
           <a href="beer.php">BEER</a>
           <a href="cocktail.php">COCKTAIL</a>
           <a href="wine_rose.php">WINE & ROSE</a>
             <a href="champagne.php">CHAMPAGNE</a>
           <a href="glassware.php">GLASSWARE</a>
         </div>
       </li>
        <li class="dropdown">
           <a href="login_home.php" class="dropbtn">EMPLOYEE LOG IN</a>        
        </li>
      
	  <li>
          <a href="shopping_cart.php"><img src='https://www.pikpng.com/pngl/m/456-4560411_shopping-cart-and-buy-button-icon-comments-shopping.png'  height=45 />
			<span><?php echo $total_quantity; ?></span></a>
        </li>
		</ul>
   </nav>
</div>
</div>
</div>
<!--Top nav bar insert finish -->

<div>
<h1 style="text-align:left">Shopping Cart Summary</h1>
</div>
<hr>
<br>

    <?php 
		
		$query = 'SELECT * FROM orders ORDER BY product_id ASC';
		$run = mysqli_query($dbc, $query);
		$count = mysqli_num_rows($run);
	
		if($count>0){
			$total = 0;
			$tax = 0.0875;
			
			while($row = mysqli_fetch_array($run, MYSQLI_ASSOC)){
			$total += ($row['product_price'] * $row['quantity']);
    ?>
	<hr>
			<div  id="items" class="container-fluid d-flex align-items-center justify-content-between"  style="margin-top:20px; margin-bottom:20px;"> 
			
			
			  <div class="col-lg-2"></div>
			
			  <div class="col-lg-4"> <img src="<?php echo $row['product_picture']; ?>" width="300"
                 style="border-style: solid; border-color: #ffe4e1"></div>
				  <div class="col-lg-4">
				 
					  <div  style="font-weight: bold; color:#8cbdbb">
  
						<?php echo $row['product_name']; ?>
					  </div>
					
						<div>
						<?php echo "in "; echo $row['glassware'];?>
					  </div>
					  
					  <div>
						<?php echo "Unit Price: $ "; echo $row['product_price'];?>
					  </div>
					  
					  <div>
						<?php echo "Quantity: "; echo $row['quantity'];?>
					  </div>
				  
					  <form onsubmit="setTimeout(function () { window.location.reload(); }, 10)" action="add-rem_item.php" method="POST">

						<input type="hidden" name="shopping_cart_order_id" value="<?php echo $row['order_id']; ?>">

						<div> Update Quantity: <input type="text" name="shopping_cart_quantity"  size="3" maxlenght="3" /></div><br>

						<input style="background-color:#9a4ef1; color:#fff;margin: 1px 1px; padding: 5px 10px;  display: inline-block; font-size:17.5px" class="updatebttn" type="submit" name="action" value="Update Quantity">

				    	<br>
						<input style="background-color:#f14ebd; color:#fff; margin: 1px 1px; padding: 5px 10px;  display: inline-block; font-size:17.5px" class="deletebttn"  type="submit" name="action" value="Remove" >
					  </form>
				</div>
			  <div class="col-lg-2"></div>
		 </div>    
	<?php } ?>
	
	<hr>
      <div class="container-fluid d-flex align-items-center justify-content-between" id="items" > 
     
     	
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
          	

              <div class="d-flex justify-content-between border-bottom" >
                <span style="color:#2a446a ">Subtotal</span><span style="color:#2a446a"><?php echo '$ '; echo number_format($total, 2,'.', ',');?></span>
                
              </div>
              <div class="d-flex justify-content-between border-bottom">
                <span style="color:#2a446a">Tax (8.875%)</span><span style="color:#2a446a"><?php echo '$ '; echo number_format($total*$tax, 2,'.', ','); ?></span>
              </div >
              
              <div class="d-flex justify-content-between border-bottom">
                <span style="color:red"><b>Total</b></span><span style="color:red"><b><?php echo '$ '; echo number_format($total + $total*$tax, 2,'.', ','); ?></b></span>
              </div>
			  <br>
			  <form action="checkout.php" method="POST">
				<input type="hidden" name="payment_total" value="<?php echo number_format($total + $total*$tax, 2,'.', ','); ?>">
				<center><div >
					<select name='payment_method'>
						
						<option value='Cash'>CASH</option > 
						<option value='Credit Card'>CREDIT CARD</option>
					</select>
				</div></center><br><br>
				<center><input style="background-color:#f5ad0f;color:#fff; margin: 1px 1px; padding: 5px 10px;  display: inline-block; font-size:17.5px  border-style: solid;
              border-color: hsla(89, 43%, 51%, 0.3)"  type="submit" value="Continue to Checkout <?php echo '  $ '; echo number_format($total + $total*$tax, 2,'.', ','); ?>" ></center>
              <br><br><br>
			</form>
          </div>
          <div class="col-lg-2"></div>
        </div>    
	  
    <?php 
    }
	else{
    ?>
    <div class="text md-tetx-left-lg-mt7" id="empty_shopping_cart">
          <br><br>

          	<!-- <img src='https://www.pikpng.com/pngl/m/456-4560411_shopping-cart-and-buy-button-icon-comments-shopping.png'  background-color: red height=30 /> -->
    <div style=" text-align: center; color:#000; font-size: 30px "
    ><p id="start_order">Start your next order</p></div><br><br>
    <div style=" text-align: center; color:#000; font-size: 25px "
    ><p id="empty_text">As you add menu items, they'll appear here. You'll have a chance to review before placing your order.</p></div>
	<!-- <div class="d-flex align-items mb7"> -->
		<div style="align-items-center">
    <button id="add_items"   style="background-color:#f5ad0f;color:#fff;margin: 1px 1px; padding: 5px 10px;  display: inline-block; font-size:17.5px  border-style: solid; float: right;
              border-color: hsla(89, 43%, 51%, 0.3)"><a href="index.php" class="sb-button">Add items</a></button>
      <div><br><br>
      <?php } mysqli_close($dbc)?>
   </div>
 </div>
</div>
</div>

</body>
</html>