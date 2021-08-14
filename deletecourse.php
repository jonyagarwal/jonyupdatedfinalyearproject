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
  <h2 align='center'><u>Delete Year</u></h2><br><br>
  <div id='second'>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='60%'>
   <tr align='left'>
  <td>
   <label class="control-label">Year Name:</label><br>
   <select type='text' class='form-control' name='cno' required> 
     <option value=''>Select Year</option>
     <?php
     $sql5="select * from course";
     $res = $con->query($sql5);
   while($row = $res->fetch_assoc()) 
    {?>
	<option value="<?php echo $row['cno'] ?>"/><?php echo $row['cname'] ?></option>
 
	<?php }?>
	</select></td>
   </tr>
   
   <tr align='center'>
  <td>
  <br>
  <input type="submit" class="btn" value='Delete' name='del'>
 
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
if(isset($_POST['del']))
{
  $cno=$_POST['cno'];
  $sql="update course set cname='',sno='0' where cno='$cno'";
									  
	
	   if(mysqli_query($con,$sql))
	  {
		 $sql1="delete from cou$cno";
		 if(mysqli_query($con,$sql1))
	  {
		  echo"<script>alert('Deleted Successfully')</script>";
	  }
 
	  }
	  else
	  {
		  echo"<script>alert('Please Try again')</script>";
	  }			  
}