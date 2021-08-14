<?php
session_start();
include('adminmenu.php');
include('connect.php');
       $var="select max(tid) as max from teacher";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);
       $tid = $row['max'] + 1;
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
<table border='1' class="container-visitor bg-grey text-center" height='700px' width='60%'>
  <tr>
  <td>
  <h2 align='center'><u>Add Teacher</u></h2><br><br>
  <div id='second'>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='60%'>
   <tr align='left'>
  <td>
   <label class="control-label">Teacher ID:</label><br>
   <input type='text' class="form-control" name="tid" value="<?php echo $tid ?>" required><br>
   </td>
   </tr>
  <tr align='left'>
  <td>
   <label class="control-label">Name:</label><br>
   <input type='text' class="form-control" name="name" pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required><br>
   </td>
   </tr>
   
   <tr align='left'>
   <td>
   <label class="control-label">Email ID:</label><br>
   <input type='text' class="form-control" name="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Please Enter valid email Address" required><br>
   </td>
   </tr>
   
   <tr align='left'>
   <td>
   <label class="control-label">Mobile No:</label><br>
   <input type='text' class="form-control" name="mob" pattern="[0-9]{10}" title="Plz Enter Valid Mobile No" required><br>
   </td>
   </tr>
   
   <tr align='left'>
   <td>
   <label class="control-label">Address:</label><br>
   <textarea class="form-control" rows='6' cols='4' name="address" required></textarea><br>
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

	$name=$_POST['name'];
	$email=$_POST['email'];
	$mob=$_POST['mob'];
	$address=$_POST['address'];
	
  $sql="Insert into teacher values ('$tid','$name','$email','$mob','$address')";
									  
	
					if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Teacher Added succesfully');</script>";
		   echo "<script>location.replace('addteacher.php')</script>" ;
 
	  }
	  else
	  {
		  echo"<script>alert('Please Try again')</script>";
	  }			  
}