<html>
<head>
	<title>Glasser - Chapel Bar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<link rel="stylesheet"  href="style.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="hero">  
	<div class="nav-bar">
		<div class="nav-logo">
		<!--	<img src="chapel_logo.png" style="margin:0px 90px">  -->
		</div>
		<div class="nav-links" id="nav-links">
			<i class="fa fa-close" onclick ="closeMenu()"></i>
   
   <!-- sub menu  start -->  
<nav id="navbar" style="margin:-38px -120px" >
    <img src="chapel_logo.png" align="left" width="90" height="90" style="margin:0px 105px" background-color="#fff"/>
     <ul style="margin:0px 0px">
       <li class="dropdown">
         <a href="index.php" class="dropbtn" >HOME</a>
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
      </ul>
   </nav>
    <!-- sub menu  finish-->

	    </div>
	    <i class="fa fa-bars" onclick ="showMenu()"></i>
	   </li>
	   </div>
		<div class="banner-title">
         <h2 style=" ">== Est. 2004 ==</h2 >
			<h1> WELCOME TO CHAPLEL </h1>
          <h2>Get a piece of the action</h2>

    </div>
		<div class="vertical-bar">
			    <div class="search-icon">	
				    <i class="fa fa-th-list"></i>
                    <i class="fa fa-search"></i>
                </div>
			   
			    <div class="social-icons">
				   <i class="fa fa-facebook"></i>
            	   <i class="fa fa-instagram" ></i>
            	   <i class="fa fa-twitter" ></i>
                </div>
	        </div>
        </div>
   <script>
   	   var show = document.getElementById("nav-links");
   		   function showMenu(){
   			   show.style.right = "0";
   		     }
            function closeMenu(){
   			   show.style.right = "-200";
   		     }
   </script>

</body>
</html>




