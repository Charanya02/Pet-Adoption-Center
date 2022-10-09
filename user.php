<?php
   session_start();
   
   if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    
    if(isset($_POST['submit']))
    { 	
	  $a = $_POST["uname"] ;
	  $b = $_POST["pword"] ;
      
	  $connect = new mysqli("localhost","root","","project") or die();
      $SQL="SELECT * FROM Users WHERE Username='$a'" ;
      $result= $connect->query($SQL) ;
	  if ($result->num_rows > 0)	   
      {
	    while($row = $result->fetch_assoc()) 
	    {
          if($row['Password']!=$b)
          {
			  echo "<script>
		           alert('Password is incorrect. Please enter again')
				   window.location.href='Log_In.php'
                 </script>";
		  }	
         
          else 		 
          {
			  if(isset($_POST['remember']))
	            {
		             setcookie('uname',$a,time()+60*60*7) ;
	            } 	
			  
			  unset($_SESSION['cart']);
			  $_SESSION['Logged_In']='True';
			  $_SESSION['Name']=$a;
			  $_SESSION['Pword']=$b;
			  echo "<script>
		           alert('Logged In')
				   window.location.href='../Home.html'
                 </script>";
		  }		  
	    }	
	  }
	  else
	  { 
          echo "<script>
		           alert('Username is incorrect. Please enter again')
				   window.location.href='Log_In.php'
                 </script>";
	  } 
	}
	
    if(isset($_POST['ssubmit']))
    {
		$a=$_POST['usname'];
		$b=$_POST['pword1'];
		$c=$_POST['pword2'];
		if($a=="")
		{
		    echo "<script>
		           alert('Please enter username')
				   window.location.href='Sign_Up.php'
                 </script>";	
		}	
		if($b=="")
		{
			echo "<script>
		           alert('Please enter password')
				   window.location.href='Sign_Up.php'
                 </script>";
		}	
		if($b != $c)
		{
			echo "<script>
		           alert('Passwords do not match!')
				   window.location.href='Sign_Up.php'
                 </script>";
		}
        $connect = new mysqli("localhost","root","","project") or die();
        $SQL="SELECT * FROM Users WHERE Username='$a'" ;
        $result= $connect->query($SQL) ;
	    if ($result->num_rows > 0)
		{
			echo "<script>
		           alert('Username already exists!.Please register using another username or sign in to your existing account')
				   window.location.href='Sign_Up.php'
                 </script>";
		}    		
		else
		{
			$sql="INSERT INTO users (Username,Password) VALUES ('$a','$b')" ;
			$r=$connect->query($sql) ;
			echo "<script>
		           alert('Account Created! Log in to get started!')
				   window.location.href='Log_In.php'
                 </script>";
			
		}
	}		
  
    
    if(isset($_POST['Submitt']))
    {
      echo "Hi";		
	  $a = $_POST["name"] ;
	  $b = $_POST["word"] ;
      if($a!=$_SESSION['Name'] or $b!=$_SESSION['Pword'])
	  {
		  echo "<script>
		           alert('Incorrect Username!')
				   window.location.href='Log_Out.php'
                 </script>";
	  }
	  else 
	  { 
	  unset($_SESSION['Pword']);
      unset($_SESSION['Cart']);
	  $_SESSION['Logged_In']='False';
	  unset($_SESSION['Name']);
      unset($_SESSION['Ph']);
      unset($_SESSION['No_Pets']);
      unset($_SESSION['Hrs']);
      unset($_SESSION['Loc']);
      unset($_SESSION['Dat']);
      unset($_SESSION['T_cos']);
			  echo "<script>
		           alert('Logged Out')
				   window.location.href='../Home.html'
                 </script>";
    } }
  
    if(isset($_POST['volunteer']))
	{
		$a = $_POST["uname"] ;
	    $b = $_POST["email"] ;
		$c = $_POST["age"] ;
		$d = $_POST["no"] ;
		if($a != $_SESSION['Name'])
		{
			echo "<script>
		           alert('Enter the correct username!')
				   window.location.href='Volunteer.php'
                 </script>";
		}
		$connect = new mysqli("localhost","root","","project") or die();
        $SQL="SELECT * FROM Users WHERE Username='$a'" ;
        $result= $connect->query($SQL) ;
	    if ($result->num_rows > 0)	   
      {
	    while($row = $result->fetch_assoc()) 
	    {
          $SQL="UPDATE users SET Email='$b',Age=$c,Volunteer='Yes',Phone=$d WHERE Username='$a'";
		  $r = $connect->query($SQL) ;
          echo "<script>
		           alert('Thank you for registering to be a volunteer. Our team will contact you soon!')
				   window.location.href='../Home.html'
                 </script>";		 
		  }  
	}
	}
    
	if(isset($_POST['foster']))
	{
		$a = $_POST["uname"] ;
	    $b = $_POST["email"] ;
		$c = $_POST["age"] ;
		$d = $_POST["no"] ;
		$connect = new mysqli("localhost","root","","project") or die();
        $SQL="SELECT * FROM Users WHERE Username='$a'" ;
        $result= $connect->query($SQL) ;
	    if ($result->num_rows > 0)	   
      {
	    while($row = $result->fetch_assoc()) 
	    {
          $SQL="UPDATE users SET Email='$b',Age=$c,Foster='Yes',Phone=$d WHERE Username='$a'";
		  $r = $connect->query($SQL) ;
          echo "<script>
		           alert('Thank you for registering to foster. Our team will contact you soon!')
				   window.location.href='../Home.html'
                 </script>";		 
		  }  
	}
	}
	
  
  }
  
  
  
   
?>