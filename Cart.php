<?php 
  session_start();
?>  

<!DOCTYPE html>
<html lang="en">
  <head>
    <title> CHARANYA ( ROLL NO : 2020115022 )</title>
    <meta charset="UTF-8" >
    <meta name="author" content="Charanya.M">
    <meta http-equiv="refresh" content="45">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;"/>
    <meta name="lang" content="en">
	<link rel="stylesheet" type="text/css" href="../CSS/Ext_CSS.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baskervville">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<style>
	  .jist
      {
        font-family : "Alegreya";
        font-size : 18px ;  
      }
	  
	  .jist1
      {
        font-family : "Alegreya";
        font-size : 22px ;
        margin : 20px;		
      }
	  
	  .jist2
      {
        font-family : "Alegreya";
        font-size : 25px ;
        margin : 10px;
		font-weight : bold;
      }
	  
	  .heading
      {
        font-family : "Times New Roman" ;
        font-size : 31px ; 
      }
	</style>
  </head>
  
  <body class="mainpage">
     <?php
  
  if($_SESSION['Logged_In']!='True')
   {
	   echo "<script> 
		           alert('Please Log In First')
				   window.location.href='Log_In.php'
                 </script>";
   }
   ?>
	
	
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">	Paws Rescue </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../Home.html">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Services
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Dogs.html">Adopt a dog</a></li>
          <li><a href="Cats.html">Adopt a cat</a></li>
          <li><a href="Pet_Party.php">Pet Party</a></li>
        </ul>
      </li>
      <li><a href="Shop.php">Shop</a></li>
      	  <li class="dropdown">
	  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Help
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="FAQ.html">FAQ</a></li>
			<li><a href="SMap.html">Site Map</a></li>
	      </ul>
      </li>  
	  <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Get Involved
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Foster.php">Foster</a></li>
          <li><a href="Volunteer.php">Volunteer</a></li>
        </ul>
      </li>
    </ul>
	 <ul class="nav navbar-nav navbar-right">
	  <li><a href="Profile.php"><span class="fa fa-user-circle-o"></span> Profile</a></li>
      <li><a href="Log_In.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="Sign_Up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	  <li><a href="Log_Out.php"><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
      <li><a href="Cart.php"><span class="fa fa-shopping-cart"></span>Cart</a></li>
    </ul>
  </div>
</nav>
	<?php
	  
      $total=0 ;
      if(!isset($_SESSION['cart']) or count($_SESSION['cart'])==0)
	  {	
        echo "<div class='jist1'>Cart is empty now <br> ";
        echo "<form action='manage_cart.php' method='GET'>
                <br><input type='submit' value='Go Back' name='submiit'>
              </form></div>";      
	  }
      else
      {
        $total=0;
        if (isset($_SESSION['cart']))
        {
		  $connect = new mysqli("localhost","root","","project") or die(); 
          foreach($_SESSION['cart'] as $k => $value)
          {
			$a=(int)$value['ID'];
 		    $SQL="SELECT * FROM products WHERE ID=$a" ;
            $result= $connect->query($SQL) ;
        	if ($result->num_rows > 0) 
	        {
              while($row = $result->fetch_assoc()) 
		      {
				$cost=(int)$row['Price']*(int)$value['Quantity'];
				$total=$total+$cost;
                $sr=$k+1;
                echo "<div>
					    <div class='img3'><img alt='products' class='icart' src='data:image/jpeg;base64,".base64_encode( $row["Image"] )."'/></div>
                        <p class='heading'>$row[Name]</p>
				        <div class='jist'> 
						  Price : Rs.$row[Price]<br>
                          Total Cost: Rs.$cost 
						  <form action = 'manage_cart.php' method = 'post'>
						     Quantity  : <input type = 'number' min='1' max='150' name='Quantity' placeholder= '$value[Quantity]'> 
                           	 <input type='hidden' name='ID' value='$row[ID]'>		
                             <button name='Update'>Update</button>			
						  </form>	 
                            <BR>
                          <form action='manage_cart.php' method='post'>
                             <button name='Remove' >Remove</button>
                             <input type='hidden' name='ID' value='$row[ID]'>
                          </form>
						</div> 
					  </div>
					  <br>
					  <hr class='line'>";
			  }
			  

		
		  }
		    }
		  
		}
	 
       echo "<div class='jist2'>"	 ;
		echo "Total Cost: $total ";
    	echo "<form action='manage_cart.php' method='post'>
                             <button name='PlaceOrder' >Buy</button>
                             
                          </form></div> ";
		
      }
    ?>
  </body>
</html>