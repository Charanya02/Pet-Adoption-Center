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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	<style>
	  .jist
      {
        font-family : "Baskervville";
        font-size : 18px ;
        text-align : center ;  
      }
	  
	  .heading
      {
        font-family : "Cinzel" ;
        font-size : 31px ; 
        text-align : center ;
      }
	  
	  .jist1
      {
        font-family : "Alegreya";
        font-size : 18px ;
        color : white ;		
      }
	  
	  .heading1
      {
        font-family : "Times New Roman" ;
        font-size : 31px ; 
        color : white;
      } 
	  
	</style>
  </head>
  
  <body class="mainpage">
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
      $connect = new mysqli("localhost","root","","project") or die();
      $SQL="SELECT * FROM products" ;
      $result= $connect->query($SQL) ;
      $a = 0 ;
      if ($result->num_rows > 0)	   
      {
	    echo "<div class= 'gridout'>" ;  
		//print each book
          while($row = $result->fetch_assoc()) 
	      {  
            echo '<form method = "POST" action = "manage_cart.php">';	       
		      $a = $row["ID"] ;
		      echo "<div class= 'gridin'>   
		              <div class='card'>
			            <br><p class='heading'>$row[Name]</p> 
						<br>
                        <img class='img2' alt='img' src='data:image/jpeg;base64,".base64_encode( $row["Image"] )."'/> 
                        <br><br>
						<p class='price'>PRICE : Rs $row[Price]</p>  
						<br>
                        <p><button name='Add' >Add to Cart</button></p>
			            <input type='hidden' name='ID' value='$a'>
						 <input type='hidden' name='Price' value='$row[Price]'>
                      </div>
				    </div>
			      </form> " ;
		  }
      } 
	  echo "</div>";
      $connect->close();
	      
    ?>  
 </body>


</html>