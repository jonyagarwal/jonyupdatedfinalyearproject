<?php
session_start();
include('adminmenu.php');
  require_once'connect.php';
  $conn=new mysqli($hn,$un,$pw,$db);
 

$query="SELECT * FROM class";
$result=$conn->query($query);

$rows=$result->num_rows;


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
<body>
<br><br><br><br>
<center>
<table border='1' class="container-visitor bg-grey text-center" height='700px' width='60%'>


	<table align="center" border="1px" style="width:600px; line_height:40px">
		<tr>
			<th colspan="1"><h2>ClassRoom List </h2></th>
		</tr>
		<tr>
            <th>Class no :</th>
			
		</tr>	

		
		<?php
		if ($result->num_rows > 0)
		{
		while($rows1=$result->fetch_assoc())
		{
	?>
	<tr> 
	 <td><?php echo $rows1["cno"] ?></td>
	 <tr>
	  
	 <?php
	   } 
		}
	?>
	
	
	</table>
<body>
</html>
