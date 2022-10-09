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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" > 
   
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
session_start();
if (isset($_POST['confirmorder']))
{ 
   echo "<div class='jist1'>Order sucessful!<br><a href='../Home.html'>Home</a></div>";
}

if (isset($_GET['Confirm']))
{ 

   echo "<div class='jist1'>Pet party booked!<br><a href='../Home.html'>Home</a></div>";
   $a=$_SESSION['Name'];
   $b=$_SESSION['Ph'];
   $c=$_SESSION['No_Pets'];
   $d=$_SESSION['Hrs'];
   $e=$_SESSION['Loc'];
   $f=$_SESSION['Dat'];
   $g=$_SESSION['T_cos'];
   $connect = new mysqli("localhost","root","","project") or die();
   $SQL="INSERT INTO `pet_party`(`Username`, `Phone`, `Address`, `No_Pets`, `Dur`, `Date`, `Tot_Cost`) VALUES ('$a','$b','$e',$c,$d,'$f','$g')" ;
   $result= $connect->query($SQL) ;
   $dat=date('Y-m-d') ;

}

if (isset($_GET['Cancell']))
{ 
   echo "<script>
		           alert('Booking Cancelled')
				   window.location.href='../Home.html'
                 </script>";
}
?>

</body>
</html>