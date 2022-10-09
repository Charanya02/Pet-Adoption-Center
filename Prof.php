<?php
  session_start();
  if($_SERVER["REQUEST_METHOD"]=="POST")
  { 
    if(isset($_POST['UpE']))
    {
	  $a=$_POST["ema"] ;
	  $connect = new mysqli("localhost","root","","project") or die(); 
      $SQL="UPDATE users SET Email='$a' WHERE Username='$_SESSION[Name]'";  	  
	  $r=$connect->query($SQL);
	  echo "<script>
		           alert('Email ID is Updated')
				   window.location.href='Info.php'
                 </script>";
	}
  
 if(isset($_POST['UpA']))
    {
	  $a=$_POST["ag"] ;
	  $connect = new mysqli("localhost","root","","project") or die(); 
      $SQL="UPDATE users SET Age='$a' WHERE Username='$_SESSION[Name]'";  	  
	  $r=$connect->query($SQL);
	  echo "<script>
		           alert('Age is Updated')
				   window.location.href='Info.php'
                 </script>";
	}  
	
 if(isset($_POST['UpP']))
    {
	  $a=$_POST["nom"] ;
	  $connect = new mysqli("localhost","root","","project") or die(); 
      $SQL="UPDATE users SET Phone='$a' WHERE Username='$_SESSION[Name]'";  	  
	  $r=$connect->query($SQL);
	  echo "<script>
		           alert('Phone Number is Updated')
				   window.location.href='Info.php'
                 </script>";
	} 

 if(isset($_POST['UpF']))
    {
	  echo "<script>
				   window.location.href='Foster.php'
                 </script>";
	} 
 if(isset($_POST['UpV']))
    {
	  echo "<script>
				   window.location.href='Volunteer.php'
                 </script>";
	}  	

	
  }
?>  