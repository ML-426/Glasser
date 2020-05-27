<! DocTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styleCP.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Shopping Cart</title>
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
<?php 
      require('mysqli_connect_glasser.php');
      if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $payment_id = $_POST['payment_id'];
        $order_id = $_POST['order_id'];
        $product_id = $_POST['product_id'];
        $total = $_POST['total'];
        $payment_method = mysqli_real_escape_string($dbc, $_POST['payment_method']);
        $product_name = mysqli_real_escape_string($dbc, $_POST['product_name']);
        $product_price = $_POST['product_price'];
        $glassware = mysqli_real_escape_string($dbc, $_POST['glassware']);
        $quantity = $_POST['quantity'];
        $new_inventory = $_POST['new_inventory'];

        $workflow_query = "INSERT INTO workflow (payment_id, order_id, product_id, product_name, product_price, glassware, quantity, payment_method, total, workflow_status, workflow_datetime)VALUES('$payment_id', '$order_id', '$product_id', '$product_name', '$product_price', '$glassware', '$quantity', '$payment_method', '$total','New',NOW())";
        
        $workflow_run = mysqli_query($dbc, $workflow_query);
        
        $inventory_query = "UPDATE product 
        SET unit_in_stock = '$new_inventory' 
        WHERE product_id = '$product_id'";    
        
        $inventory_run = mysqli_query($dbc, $inventory_query);
        }
    
            $query1 = 'SELECT payment_id FROM payment ORDER BY payment_datetime DESC LIMIT 1';
            $run1 = mysqli_query($dbc, $query1);
            $count1 = mysqli_num_rows($run1);
      $row1 = mysqli_fetch_array($run1, MYSQLI_ASSOC);
        ?>


        <div class="banner-title">
         
          <h1> Thank you for your order!</h1>
          <h3>
     Your Order Number is <?php echo $row1['payment_id']; ?>
          </h3>
         


         </div>
    
    <div>
      <h1>
       <button id="go"><a href="index.php" class="sb-button">Start a New Order</a></button>
        </h1>
      <div>
        <?php
    $end_query = "TRUNCATE TABLE orders;";
    $end_run = mysqli_query($dbc,$end_query);
    
    mysqli_close($dbc);
    ?>
    

    


</body>
</html>