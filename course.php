<?php
session_start();
include('adminmenu.php');
include('connect.php');
       
	 $subj = ! empty($_SESSION['flag']) ? $_SESSION['flag'] : ' ';
      
		 $_SESSION['flag']= $subj; 
	   if($subj==' ')
	   {

		   $var="select cno from course where cname=' ' and sno='0'";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);
       $cno = $row['cno'];
       
	   $_SESSION['cno']=$cno;

	   $_SESSION['flag']='1';
	   }
	   else
	   {
		
	   }
	   
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
  <h2 align='center'><u>Add Year :-</u></h2><br><br>
  <div id='second'>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='60%'>
 
  <tr align='left'>
  <td>
   <label class="control-label">Year Name:</label><br>
   <input type='text' class="form-control" name="name"  value="<?php if (isset($_POST['name'])) { echo $_POST['name']; }  ?>"><br>
   </td>
   </tr>
   
   
   <tr align='left'>
   <td>
   <label class="control-label">No.of subject:</label><br>
  <select  class="form-control" name='num' >
  	<?php if (isset($_POST['num']))
 {
	  echo "<option>".$_POST['num']."</option>";
 }
 else
 {
    }
 ?>
  <option value=''>--Select No.of subjects--</option>
   <option>4</option>
  <option>5</option>
   <option>6</option>
  </select> <br> 
   </td>
   </tr>
   
   
   
     <tr align='center'>
  <td>
  <input type="submit" class="btn" value='Submit' name='submit'><br><br>
  
  </td>
  </tr>
  </table>
  
  <?Php
  
    if(isset($_POST['submit']))
	{
		$cname=$_POST['name'];
		$snum= $_POST['num'];
		// $pnum= $_POST['pnum'];
		$tot=$snum;
		$cno1=$_SESSION['cno'];
  //  echo $cno1;
		if($cno1=='')
		{
			echo "<script>alert(\"You can't add more then 3 course!!!\")</script>";	
		}
        else
        {			
		$sel="update course set cname='$cname',sno='$tot' where cno='$cno1'";
		
		if(mysqli_query($con,$sel))
	  {
	  }
	    for($i=1;$i<=$snum;$i++)
		{
			echo" 
			<table border='0' class='container-visitor bg-grey text-center' align='center' width='60%'>
 
  <tr align='left'>
  
  
  <td width='28%'>
   <label class='control-label'>$i Subject Name:</label><br>
   <input type='text' class='form-control' name='sname[]' required >
   </td>
   <td width='4%'>
   <label class='control-label'>&nbsp;&nbsp;&nbsp;-</label>
  </td>
   
  <td width='28%'>
   <label class='control-label'>Teacher Name:</label><br>
    <select type='text' class='form-control' name='tname[]' required > 
     <option value=''>Select Teacher</option>
     ";
     $sql5="select name from teacher";
     $res = $con->query($sql5);
   while($row = $res->fetch_assoc()) 
    {?>
	<option value="<?php echo $row['name'] ?>"/><?php echo $row['name'] ?></option>
 
	<?php }
	
	
echo"
</select>
   </td>


     <td width='6%'>
   <label class='control-label'>&nbsp;&nbsp;&nbsp;</label>
  </td>
  
 

   <td width='28%' >
   <label class='control-label'>Practical:</label><br>
   <div margin-left='20px;'>
  
   <input type='checkbox'  name='check[]' value='1'>
 
   </div>
</td>

   </tr>
   <tr><td colspan='3'><br></td></tr>
   ";
 
		}
		 
	echo"
	<tr align='center'>
  <td colspan='3'>
  <input type='submit' class='btn' value='Submit' name='submit1'><br><br>
  
  </td>
  </tr>
  </table>";
	}
	}
	if(isset($_POST['submit1']))
	{
		
	   
		$sname= $_POST['sname'];
		$tname= $_POST['tname'];

   $practical=$_POST['check'];
    //   echo  "<script>console.log(\"'".$practical."'\")</script>";
    
		$N = count($sname);
		$M = count($tname);
  //   $C = count($practical);
	
		 $cno1=$_SESSION['cno'];
   //echo 
           for($i = 0; $i<$N; $i++) {
        
      
   
          if ($practical[$i]=='1'){
             
				 $sql1="insert into cou$cno1 values('','$sname[$i]','$tname[$i]','Lecture','yes')";
     
				 if(mysqli_query($con,$sql1))
                {
			       
           		
                }		
               
              }
              else {
                  
                 $sql2="insert into cou$cno1 values('','$sname[$i]','$tname[$i]','Lecture','no')";
        
         if(mysqli_query($con,$sql2))
                {
                
              
                }  
               
             }
              
              
				
				 
         
         
         
         	}
	
	echo "<script>alert(\"Details Inserted!!!\")</script>";	
		    unset($_SESSION['cno']); 
            $_SESSION['flag']=' ';		
    echo "<script>location.replace('course.php');</script>"	;		
	}
	
  ?>
   
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
  include("footer.php");
  ?>