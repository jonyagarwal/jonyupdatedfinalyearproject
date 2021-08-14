
<?php
include('connect.php');
$sq1="select * from c1 ORDER BY Slot";
	$res=$con->query($sq1);
	if(mysqli_num_rows($res)==0)
	   {
		    
	   }
	   else
	   {
		   echo"<table border='1' cellspacing='0' cellpading='0'>
		       <th>Time Slot</th>
			   <th>Monday</th>
			   <th>Tuesday</th>
			   <th>Wednesday</th>
			   <th>Thursday</th>
			   <th>Friday</th>
			   
		   ";
		   
		   $i=0;
		   while($row1=$res->fetch_assoc())
           {
			   if($row1['Slot']==1)
			   {
				   $slot='9.30-10.30';
			   }
			   if($row1['Slot']==2)
			   {
				   $slot='10.30-11.30';
			   }
			   if($row1['Slot']==3)
			   {
				   $slot='11.30-12.30';
			   }
			   if($row1['Slot']==4)
			   {
				   $slot='12.30-01.30';
			   }
			   if($row1['Slot']==5)
			   {
				   $slot='02.30-03.30';
			   }
			   if($row1['Slot']==6)
			   {
				   $slot='03.30-04.30';
			   }
			   if($row1['Slot']==7)
			   {
				   $slot='04.30-05.30';
			   }
			    if($row1['Slot']==8)
			   {
				   $slot='05.30-06.30';
			   }
			   echo"
			   <tr>
			   <td>".$slot."</td>
			   <td>".$row1['Monday']."</td>
			   <td>".$row1['Tuesday']."</td>
			   <td>".$row1['Wednesday']."</td>
			   <td>".$row1['Thursday']."</td>
			   <td>".$row1['Friday']."</td>
			  </tr>
			  ";
			  if($i==3)
			  {
				  echo"
				  <tr>
			   <td align='center' colspan='6'>Break</td>
			   </tr>";
			   
			  }
			   $i++;
	       }
	   }
	
	echo"</table>";
	?>