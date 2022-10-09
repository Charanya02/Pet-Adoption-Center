<!DOCTYPE HTML>
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
  if($_SERVER["REQUEST_METHOD"]=="POST")
  { 
    if(isset($_POST['Add']))
    {
	  	
      if(isset($_SESSION['cart']))
      {
         
		$mybooks=array_column($_SESSION['cart'],'ID');//if item is added already
		
           
		if(in_array($_POST['ID'],$mybooks))
        {
		  $i=0 ;
		  $count=count($_SESSION['cart']);
		  for($i=0;$i<$count;$i++)
		  {
			if($mybooks[$i]==$_POST['ID'])
			{
	          break;
			}
		  }
		  $_SESSION['cart'][$i]['Quantity']=$_SESSION['cart'][$i]['Quantity']+1 ;
		 
		  echo "<script>
		          
                  window.location.href='shop.php';
                </script>";
        }
        else
        {
		  $count=count($_SESSION['cart']);
          $_SESSION['cart'][$count]=array('ID'=>$_POST['ID'],'Quantity'=>1);
          echo "<script>
		          
                  window.location.href='shop.php';
                </script>";
        }
      }
      else
      {
        $_SESSION['cart'][0]=array('ID'=>$_POST['ID'],'Quantity'=>1);
        echo "<script>
		        
                window.location.href='shop.php';
              </script>";		  
      }
    }
	
	//removing items from cart
    if(isset($_POST['Remove']))
    {
      foreach($_SESSION['cart'] as $k => $value)
      {
        if ($value['ID']==$_POST['ID'])
        {
          unset($_SESSION['cart'][$k]);
          $_SESSION['cart']=array_values($_SESSION['cart']);
          echo "<script>
                  window.location.href='Cart.php';
                </script>";
        }
      }
    }
    
	if(isset($_POST['Update']))
    {
      $mybooks=array_column($_SESSION['cart'],'ID');//if item is added already
	  if(in_array($_POST['ID'],$mybooks))
      {
		$i=0 ;
		$count=count($_SESSION['cart']);
		for($i=0;$i<$count;$i++)
		{
		  if($mybooks[$i]==$_POST['ID'])
		  {
            break;
		  }
	    }
        
		$_SESSION['cart'][$i]['Quantity']=$_POST['Quantity'] ;
        echo "<script>
                 window.location.href='Cart.php';
              </script>";
      }
	}
	
	//calculating total cost
    	if (isset($_POST['PlaceOrder']))
        {
          if (count($_SESSION['cart'])==0)
		  {
            echo "<script>
            alert('Cart Empty');
			window.location.href='Shop.php';
            </script>";
          }
		$connect = new mysqli("localhost","root","","project") or die(); 
        foreach($_SESSION['cart'] as $k => $value)
        {
		  $a=(int)$value['ID'];
 		  $SQL="SELECT * FROM Products WHERE ID=$a" ;
          $result= $connect->query($SQL) ;
          if ($result->num_rows > 0) 
	      {
            while($row = $result->fetch_assoc()) 
		    {
			  $cost=(int)$row['Price']*(int)$value['Quantity'];
              $sr=$k+1;
			  if($row['ID']==1)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_1.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==2)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_2.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==3)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_3.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==4)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_4.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==5)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_5.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==6)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_6.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==7)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_7.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==8)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_8.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==9)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_9.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==10)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_10.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==11)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_11.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==12)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_12.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==13)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_13.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==14)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_14.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  if($row['ID']==15)
			  {
				  $SQL = "INSERT INTO orders(`Username`, `ID`, `Name`, `No`, `Cost`,`Image`) VALUES ('$_SESSION[Name]',$row[ID],'$row[Name]',$value[Quantity],$cost,LOAD_FILE('C:/xampp/htdocs/Project/Images/Shop/Shop_15.jpg'))";
				  $re=$connect->query($SQL) ;
			  }
			  $_SESSION['cart']=array();
			}
		  }
		}
    
      //form to fill while ordering

        echo " 
		<div class='jist1'>
		<form action='confirm.php' method='post'> 
        <label>Name : </label>
        <input type='text' name='name1' required >
        <br><br>
        <label>Email : </label>
        <input type='email'  required>
        <br><br>
        <label>Phone No : </label>
        <input type='tel' name='phno' required ><br><br>
        <label>Address : </label><br>
        <textarea name='address' rows='3' cols='30' required>
        </textarea>
        <br><br>
        <p>Pay on Delivery only.</p>
        <input type='submit' name='confirmorder' value='Confirm Order and pay'>
		</form>
        </div>";
        
    }
  }
	if(isset($_GET['submiit']))
	{
		echo "<script>
			window.location.href='Shop.php';
            </script>";
	}
		  
  
?>
</body>
</html>