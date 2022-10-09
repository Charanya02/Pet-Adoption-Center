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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	  .jist
      {
        font-family : "Times New Roman";
        font-size : 18px ;  
      }
	  
	  .heading
      {
        font-family : "Baskervville" ;
        font-size : 31px ; 
        color : white ;
        text-decoration-line : underline ; 
      }
	 
	 .bg-image 
	  {
         background-image: url("../Images/Forms/Form_1.jpg");
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
		           alert(' Already Logged Out')
				   window.location.href='../Home.html'
                 </script>";
   }
   ?>
  <div class="bg-image"></div>
  <div class="bg-text"> 
   <div class="close">
   <a href="../Home.html"><i class="fa fa-remove"></i></a>
   </div>
    <p class= "heading"> LOG OUT:</p>
	
	
	<form method = "POST" action = "user.php">
       <p class="jist"> Enter Username : </p>
       <input type="text" name="name">
	   <p class="jist"> Enter Password : </p>
       <input type="password" name="word">
	   
	   <p><button name='Submitt' >Log Out</button></p>
	   <p> Don't want to log out?<a href="../Home.html">Go Back</a></p>
	 </form>
	 </div>
	 
    </body>
   </html>	
     	   