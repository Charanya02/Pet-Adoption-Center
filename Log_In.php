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
         background-image: url("../Images/Forms/Form_4.jpg");
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
	<script>
     function validateForm() 
	 {
     let x = document.forms["form1"]["uname"].value;
	 let y = document.forms["form1"]["pword"].value;
     if (x == "") 
	 {
       alert("Username is empty!");
       return false;
     }
	 
	 if (y == "") 
	 {
       alert("Password is empty!");
       return false;
     }
}
</script>
  </head>
  
  <body>
  <?php
  if($_SESSION["Logged_In"]!=NULL)
  {	  
  if($_SESSION["Logged_In"]=='True')
   {
	   echo "<script> 
		           alert(' Already Logged In')
				   window.location.href='../Home.html'
                 </script>";
  }}
   ?>
  <div class="bg-image"></div>
  <div class="bg-text"> 
   <div class="close">
   <a href="../Home.html"><i class="fa fa-remove"></i></a>
   </div>
    <p class= "heading"> LOG IN</p>
	
	
	<form method = "POST" name='form1'  onsubmit="return validateForm()" action="user.php">
       <p class="jist"> Enter Username : </p>
       <input type="text" name="uname">
	   <p class="jist"> Enter Password : </p>
       <input type="password" name="pword">
	   
	   <br><br>
	   
	   <input type="checkbox" id="remember" name="remember">
	   <label for="remember">Remember Me</label>
	   
	   <p><input type='submit' name='submit' value='Log In' ></p>
	   <p> Don't have an account?<a href="Sign_Up.php"> Sign Up Here</a></p>
	 </form>
	 </div>
	 
    </body>
   </html>	
     	   