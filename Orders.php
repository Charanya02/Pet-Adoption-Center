<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> CHARANYA ( ROLL NO : 2020115022 )</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../CSS/Ext_CSS.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  .jist1
      {
        font-family : "Alegreya";
        font-size : 20px ;
        margin : 20px;		
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
      $a=$_SESSION['Name'] ;
	  $connect = new mysqli("localhost","root","","project") or die();
      $SQL="SELECT * FROM orders WHERE Username='$a'" ;
      $result= $connect->query($SQL) ;
	  if ($result->num_rows > 0) 
	  {
        while($row = $result->fetch_assoc()) 
		{     
	         
			 echo "<div class='jist1'>";
		     echo "<div class='imag'><img class='img5' alt='Orders' src='data:image/jpeg;base64,".base64_encode( $row["Image"] )."'/></div>";
			 echo  "
					Name of item: $row[Name] <br><br>
			        Number of items : $row[No] <br><br> 
                    Cost of the item : $row[Cost] <br><br> ";
                    if($row['Delivered']!='Yes')
					{
					  if($row['Progress']!=NULL)
                      {
						echo "Progress: $row[Progress]<br><br>" ;
					  }
                      else
                      {
						echo "Progress : Order has been placed<br><br>";
					  }
					}
                    else
                    {
						echo "Order has been delivered <br>";
					}
				  echo "</div>" ;
				  echo "<hr class='line'>";	
		          }			
	  }
	  else
	  {
		  echo "<div class='jist1'>No orders yet!</div>" ;
	  }
      ?>  	