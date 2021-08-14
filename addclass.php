<?php
session_start();
include('adminmenu.php');
include('connect.php');
       
?>

<html lang="en">
<head>
  
  <title>Automated College TimeTable Generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style1.css"> 

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<form method='post'>

<br><br><br><br>
<center>
<table border='1' class="container-visitor bg-grey text-center" height='500px' width='50%'>
  <tr>
  <td>
  <h2 align='center'><u>Add Class Room</u></h2><br><br>
  <div id='second'>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='60%'>
   <tr align='left'>
  <td>
   <label class="control-label">Class Number:</label><br>
   <input type='text' class="form-control" name="cno" pattern="[0-9]*$" title="Please Enter Numbers" required><br>
   </td>
   </tr>
   
   <tr align='center'>
  <td>
  <input type="submit" class="btn" value='Add' name='add'>
  <input type="submit" class="btn" value='Reset' name='reset'>
  </td>
  </tr>
  </table>
  
  </td>
  </tr>
  </table>
  </center>
  </div>
<br>
  </form>
  </body>
  </html>
    <?php
include('footer.php');
?>
  <?php
if(isset($_POST['add']))
{
  $cno=$_POST['cno'];
  $sql="Insert into class values ('$cno')";
									  
	
					if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('ClassRoom Added succesfully');</script>";
		   echo "<script>location.replace('addclass.php')</script>" ;
 
	  }
	  else
	  {
		  echo"<script>alert('Please Try again')</script>";
	  }			  
}
