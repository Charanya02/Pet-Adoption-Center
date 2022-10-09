<?php 
  session_start();
?>  

<!DOCTYPE html>
<html lang="en">
  <head>
    <title> CHARANYA ( ROLL NO : 2020115022 )</title>
    <meta charset="UTF-8" >
    <meta name="author" content="Charanya.M">
    <meta name="viewport" content="width=device-width; initial-scale=1.0;"/>
     <meta name="lang" content="en">
	<link rel="stylesheet" type="text/css" href="../CSS/Ext_CSS.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baskervville">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	  .jist
      {
        font-family : "Times New Roman";
        font-size : 18px ;  
      }
	  
	  .heading
      {
        font-family : "Alegreya" ;
        font-size : 31px ; 
        text-decoration-line : underline ; 
      }
	 
	 .bg-image 
	  {
         background-image: url("../Images/Dogs/Dog_1.png");
         filter: blur(8px);
         height: 100%;
		 background-position: center;
         background-repeat: no-repeat;
         background-size: cover;  
      }
	  
	  body, html 
	 {
       height: 100%;
       margin: 5px;
     }

    
	</style>
  </head>
  
  <body>
  <?php
  
  if($_SESSION['Logged_In']!='True')
   {
	   echo "<script> 
		           alert(' Please Log In First')
				   window.location.href='Log_In.php'
                 </script>";
   }
   
   
   ?>
  <div class="bg-image"></div>
  <div class="bg-text1"> 
   <div class="close">
   
   <a href="../Home.html"><i class="fa fa-remove"></i></a>
   </div>
    <p class= "heading">PET PARTY:</p>
	
	
	<form method = "POST" action = "p_party.php">
       <p class="jist"> Enter Username : </p>
       <input type="text" name="unae">
	   <p class="jist"> Enter your contact number : </p>
       <input type="text" name="cno">
	   <p class="jist"> When is the party?</p>
       <input type='date' name="dat">
	   <p class="jist"> How many pets do you want in the party? </p>
       <input type="text" name="pet">
	   <p class="jist"> How long is the party(in hours)? </p>
       <input type="number" name="dur" min="1" max="120">
	   <p class="jist"> Where is the party?</p>
       <textarea name="addr" rows="4" cols="20"></textarea>
	   <p><button name='ppart'>Confirm</button></p>
	 </form>
	 </div>
	 
    </body>
   </html>