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
<form method="post" action="teacherfetch.php">

<br><br><br><br>
<center>
<table border='1' class="container-visitor bg-grey text-center" height='800px' width='80%'>
  <tr>
  <td>
  <h2 align='top'><u>Report data</u></h2><br><br>
  <div id='second'>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='60%'>
   <tr align='left'>
 
   </tr>
   
   
  <label for="All Teacher Details"> Teacher Details</label>-></br>
  <input type="submit" class="btn" value='Show1' name='Show1'> </br> </br>
    </form>
	
	<form method="post" action="yearfetch.php">
  <label for="Years">Years </label>-></br>
   <input type="submit" class="btn" value='Show2' name='Show2'></br> </br>
    </form>
  
  <form method="post" action="classroomfetch.php">
  <label for="Class rooms">Class rooms</label>-></br>
   <input type="submit" class="btn" value='Show3' name='Show3'></br> </br>
    </form>
   
   <form method="post" action="firstyearfetch.php">
  <label for="First Year Details">First Year Details</label>-></br>
   <input type="submit" class="btn" value='Show4' name='Show4'></br> </br>
    </form>
  
  <form method="post" action="secondyearfetch.php">
  <label for="Second Year Details">Second Year Details</label>-></br>
   <input type="submit" class="btn" value='Show5' name='Show5'></br> </br>
    </form>
  
  <form method="post" action="thirdyearfetch.php">
  <label for="Third Year Details">Third Year Details</label>-></br>
   <input type="submit" class="btn" value='Show6' name='Show6'></br> </br>
    </form>
  
  <form method="post" action="forthyearfetch.php">
  <label for="Forth Year Details">Fourth Year Details</label>-></br>
   <input type="submit" class="btn" value='Show7' name='Show7'></br> </br>
    </form>
  
  

  </tr>
  </table>
  
  </td>
  </tr>
  </table>
  </center>
  </div>
<br>

  </body>
  </html>
    <?php
include('footer.php');
?>
