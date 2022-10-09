<!DOCTYPE html>
<html lang="en">
  <head>
    <title> CHARANYA ( ROLL NO : 2020115022 )</title>
    <meta charset="UTF-8" >
    <meta name="author" content="Charanya.M">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;"/>
    <meta name="lang" content="en">
    <link rel="stylesheet" type="text/css" href="../CSS/Ext_CSS.css">
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
	
	<style>
	  .jist
      {
        font-family : "Alegreya";
        font-size : 23px ;
        text-align : center ;  
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
      <li class="active"><a href="Home.html">Home</a></li>
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
      <li><a href="FAQ.html">FAQ</a></li>
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
  session_start();
  if($_SERVER["REQUEST_METHOD"]=="POST")
  { 
    if(isset($_POST['ppart']))
    {	  
      if($_SESSION['Name']!=$_POST['unae'])
	  {
		  echo "<script>
		           alert('Enter the correct username!')
				   window.location.href='Pet_Party.php'
                 </script>";
	  }
	  echo "<div class='jist'><form method='GET' action='confirm.php'>" ;	
      echo "<h1> Pet Party Confirmation Details: </h1>";
	  echo "Username : $_POST[unae]<br>
            Contact number : $_POST[cno]<br>
            Date of the party : $_POST[dat]<br>
            No. of Pets : $_POST[pet]<br>
            Duration Of the Party : $_POST[dur]<br>
            Party Location : $_POST[addr]<br>";
			$a=$_POST["pet"]*$_POST["dur"]*15;
	  $_SESSION['Ph']= $_POST['cno'];
      $_SESSION['No_Pets']= $_POST['pet'];
      $_SESSION['Hrs']= $_POST['dur'];
      $_SESSION['Loc']= $_POST['addr'];
	  $_SESSION['Dat']=$_POST['dat'];
      $_SESSION['T_cos']=$a ;	  
	  echo "Total Cost : Rs.$a<br> 		
            <input type='Submit' value='Confirm' name='Confirm'>
			<input type='Submit' value='Cancel' name='Cancell'>
            </form></div>
			";
  }}
?>  
</body>
</html>
  			
			