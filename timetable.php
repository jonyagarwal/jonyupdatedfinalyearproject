<?php
session_start();
include('connect.php');
    if(!isset($_POST['c1'])&&!isset($_POST['c2'])&&!isset($_POST['c3'])&&!isset($_POST['c4']))
        {   
	include('adminmenu.php');

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
<table border='1' class="container-visitor bg-grey text-center" height='500px' width='80%'>
  <tr>
  <td>
        <h2 align='center'><u>TimeTable Generator</u></h2><br><br>
  <div id='second'>
  <table border='0' class="container-visitor bg-grey text-center" align='center' width='40%'>
   <tr align='left'>
  <td>
   <label class="control-label">Class Room for First Year:</label><br>
   <select type='text' class='form-control' name='cno1' required> 
   	<?php if (isset($_POST['cno1']))
 {
	  echo "<option>".$_POST['cno1']."</option>";
 }
 else
 {
    }
 ?>
    <option value=''>Select Classroom</option>
     <?php
     $sql5="select * from class";
     $res = $con->query($sql5);
   while($row = $res->fetch_assoc()) 
    {?>
  <option value="<?php echo $row['cno'] ?>"/><?php echo $row['cno'] ?></option>
     
  <?php }?>
  </select>
  <br>
  </td>
  
   </tr>
    <tr align='left'>
  <td>
   <label class="control-label">Class Room for Second Year:</label><br>
   <select type='text' class='form-control' name='cno2' required> 
   <?php if (isset($_POST['cno2']))
 {
    echo "<option>".$_POST['cno2']."</option>";
 }
 else
 {
    }
 ?>
     <option value=''>Select Classroom</option>
     <?php
     $sql5="select * from class";
     $res = $con->query($sql5);
   while($row = $res->fetch_assoc()) 
    {?>
  <option value="<?php echo $row['cno'] ?>"/><?php echo $row['cno'] ?></option>
 
  <?php }?>
  </select>
  <br>
  </td>
   </tr>
   
   <tr align='left'>
  <td>
   <label class="control-label">Class Room for Third Year:</label><br>
   <select type='text' class='form-control' name='cno3' required> 
   <?php if (isset($_POST['cno3']))
 {
    echo "<option>".$_POST['cno3']."</option>";
 }
 else
 {
    }
 ?>
     <option value=''>Select Classroom</option>
     <?php
     $sql5="select * from class";
     $res = $con->query($sql5);
   while($row = $res->fetch_assoc()) 
    {?>
  <option value="<?php echo $row['cno'] ?>"/><?php echo $row['cno'] ?></option>
 
  <?php }?>
  </select>
  <br>
  </td>
   </tr>
   <tr align='left'>
  <td>
   <label class="control-label">Class Room for Fourth Year:</label><br>
   <select type='text' class='form-control' name='cno4' required> 
   <?php if (isset($_POST['cno4']))
 {
    echo "<option>".$_POST['cno4']."</option>";
 }
 else
 {
    }
 ?>
     <option value=''>Select Classroom</option>
     <?php
     $sql5="select * from class";
     $res = $con->query($sql5);
   while($row = $res->fetch_assoc()) 
    {?>
  <option value="<?php echo $row['cno'] ?>"/><?php echo $row['cno'] ?></option>
 
  <?php }?>
  </select>
  <br>
  </td>
   </tr>

  
   
   
   <tr align='center'>
  <td>
<input type='submit' value='Create Timetable' name='tt' class="btn">
<input type='hidden' value='1' name='check'>
<br><br>
</td>
</tr>
</table>

<script>
set_time_limit(100);
</script>
<?php
include("connect.php");
function checkT($tname,$slot,$day)
{
	include("connect.php");
	$sql="Select * from day where Teach='".$tname."' And Slot='".$slot."' And day='".$day."'";
 // echo $sql;
	 $res=$con->query($sql);
	 if(mysqli_num_rows($res)==0)
	   {
		    return "OK";
	   }
	   else
	   {
		   return "has";
	   }
}





function checkSub($cname,$day,$sub)
    {
		include("connect.php");
        $sql1 = "Select * from day where Cou='".$cname."' And day='".$day."' And Subject='".$sub."'";
        $res=$con->query($sql1);

	    if(mysqli_num_rows($res)==0)
	   {
     // echo "ok";
		    return "OK";
	   }
	   else
	   {
		   return "has";
	   }
    }
	
	function getC1($p)
    {
		include("connect.php");
        $sql2 = "SELECT subject,teacher,type FROM cou1  order by rand() LIMIT 1";
        
        $res=$con->query($sql2);
       
        if(mysqli_num_rows($res)==0)
	   {
		    return "Fin";
	   }
	   else
	   {
		   while($data=mysqli_fetch_array($res))
		   {
          
              $sub=$data['subject'];
			        $teach=$data['teacher'];
              $type=$data['type'];
              //$batch=$data1['Batch'];
              // echo $batch;
            return $sub.",".$teach.",".$type ;
           }
	   }
       
    }
	function getCP1($p)
    {

		include("connect.php");
        $sql2 = "SELECT subject,teacher,practical FROM cou1 where practical='yes' order by rand() LIMIT 1";
       //  $sqlbatch="SELECT  `Batch` FROM `batch` order by rand() LIMIT 1";

        $res=$con->query($sql2);
      
        if(mysqli_num_rows($res)==0)
	   {
	   
		    return "Fin";
	   }
	   else
	   {
		   while($data=mysqli_fetch_array($res))
		   {
          
              $sub=$data['subject'];
			       $teach=$data['teacher'];
              $type=$data['practical'];
           //echo  "<script>alert(\"'".$sub."','".$teach."','".$type."'\")</script>";
            return $sub.",".$teach.",".$type ;
           //echo  "<script>console.log(\"'". $sub."'\")</script>";
           }
	   }
       
    }

    function getC2($p)
    {
    include("connect.php");
        $sql2 = "SELECT subject,teacher,type FROM cou2  order by rand() LIMIT 1";
        
        $res=$con->query($sql2);
       
        if(mysqli_num_rows($res)==0)
     {
        return "Fin";
     }
     else
     {
       while($data=mysqli_fetch_array($res))
       {
          
              $sub=$data['subject'];
              $teach=$data['teacher'];
              $type=$data['type'];
              //$batch=$data1['Batch'];
              // echo $batch;
            return $sub.",".$teach.",".$type ;
           }
     }
       
    }
  function getCP2($p)
    {

    include("connect.php");
        $sql2 = "SELECT subject,teacher,practical FROM cou2 where practical='yes' order by rand() LIMIT 1";
       //  $sqlbatch="SELECT  `Batch` FROM `batch` order by rand() LIMIT 1";

        $res=$con->query($sql2);
      
        if(mysqli_num_rows($res)==0)
     {
     
        return "Fin";
     }
     else
     {
       while($data=mysqli_fetch_array($res))
       {
          
              $sub=$data['subject'];
             $teach=$data['teacher'];
              $type=$data['practical'];
           //echo  "<script>alert(\"'".$sub."','".$teach."','".$type."'\")</script>";
            return $sub.",".$teach.",".$type ;
           //echo  "<script>console.log(\"'". $sub."'\")</script>";
           }
     }
       
    }

    function getC3($p)
    {
    include("connect.php");
        $sql2 = "SELECT subject,teacher,type FROM cou3  order by rand() LIMIT 1";
        
        $res=$con->query($sql2);
       
        if(mysqli_num_rows($res)==0)
     {
        return "Fin";
     }
     else
     {
       while($data=mysqli_fetch_array($res))
       {
          
              $sub=$data['subject'];
              $teach=$data['teacher'];
              $type=$data['type'];
              //$batch=$data1['Batch'];
              // echo $batch;
            return $sub.",".$teach.",".$type ;
           }
     }
       
    }
  function getCP3($p)
    {

    include("connect.php");
        $sql2 = "SELECT subject,teacher,practical FROM cou3 where practical='yes' order by rand() LIMIT 1";
       //  $sqlbatch="SELECT  `Batch` FROM `batch` order by rand() LIMIT 1";

        $res=$con->query($sql2);
      
        if(mysqli_num_rows($res)==0)
     {
     
        return "Fin";
     }
     else
     {
       while($data=mysqli_fetch_array($res))
       {
          
              $sub=$data['subject'];
             $teach=$data['teacher'];
              $type=$data['practical'];
           //echo  "<script>alert(\"'".$sub."','".$teach."','".$type."'\")</script>";
            return $sub.",".$teach.",".$type ;
           //echo  "<script>console.log(\"'". $sub."'\")</script>";
           }
     }
       
    }

       function getC4($p)
    {
    include("connect.php");
        $sql2 = "SELECT subject,teacher,type FROM cou4  order by rand() LIMIT 1";
        
        $res=$con->query($sql2);
       
        if(mysqli_num_rows($res)==0)
     {
        return "Fin";
     }
     else
     {
       while($data=mysqli_fetch_array($res))
       {
          
              $sub=$data['subject'];
              $teach=$data['teacher'];
              $type=$data['type'];
              //$batch=$data1['Batch'];
              // echo $batch;
            return $sub.",".$teach.",".$type ;
           }
     }
       
    }
  function getCP4($p)
    {

    include("connect.php");
        $sql2 = "SELECT subject,teacher,practical FROM cou4 where practical='yes' order by rand() LIMIT 1";
       //  $sqlbatch="SELECT  `Batch` FROM `batch` order by rand() LIMIT 1";

        $res=$con->query($sql2);
      
        if(mysqli_num_rows($res)==0)
     {
     
        return "Fin";
     }
     else
     {
       while($data=mysqli_fetch_array($res))
       {
          
              $sub=$data['subject'];
             $teach=$data['teacher'];
              $type=$data['practical'];
           //echo  "<script>alert(\"'".$sub."','".$teach."','".$type."'\")</script>";
            return $sub.",".$teach.",".$type ;
           //echo  "<script>console.log(\"'". $sub."'\")</script>";
           }
     }
       
    }




    function prac($Course){
    	  include("connect.php");
      $sql2 = "SELECT count(practical) FROM `$Course` where practical='yes' ";
       
         $res =$con->query($sql2);
         $row = $res->fetch_assoc();
      
       
         if($row['count(practical)']==1)
         {
         return 3;
         }
         if($row['count(practical)']==2)
         {
         return 2;
         }
          if($row['count(practical)']==3)
         {
         	return 1;
         }
          
  
    }

   
	
function randomday($min,$max,$count) {


if($max - $min < $count) {
  return false;
}

   $randomdayarray = array();
   for($i = 0; $i < $count; $i++) {
      $rand = rand($min,$max);


  while(in_array($rand,$randomdayarray)) {
  $rand = rand($min,$max);
  }


  $randomdayarray[$i] = $rand;
   }
   return $randomdayarray;
}



    

   
  
function randomday2($min,$max,$count) {


if($max - $min < $count) {
  return false;
}

   $randomdayarray = array();
   for($i = 0; $i < $count; $i++) {
      $rand = rand($min,$max);

  while(in_array($rand,$randomdayarray)) {
  $rand = rand($min,$max);
  }

  $randomdayarray[$i] = $rand;
   }
   return $randomdayarray;
}


    
   
  
function randomday3($min,$max,$count) {
 
if($max - $min < $count) {
  return false;
}

   $randomdayarray = array();
   for($i = 0; $i < $count; $i++) {
      $rand = rand($min,$max);


  while(in_array($rand,$randomdayarray)) {
  $rand = rand($min,$max);
  }


  $randomdayarray[$i] = $rand;
   }
   return $randomdayarray;
}

function randomday4($min,$max,$count) {


if($max - $min < $count) {
  return false;
}

   $randomdayarray = array();
   for($i = 0; $i < $count; $i++) {
      $rand = rand($min,$max);


  while(in_array($rand,$randomdayarray)) {
  $rand = rand($min,$max);
  }

  
  $randomdayarray[$i] = $rand;
   }
   return $randomdayarray;
}



    function repeatlecture($slot,$course,$day){
     
      include("connect.php");
        $sql2 = "SELECT `$day` FROM `$course` WHERE slot='".$slot."'";
        
       $res=$con->query($sql2);
        if(mysqli_num_rows($res)==0)
     {
        return "Fin";
     }
     else
     {
       while($data=mysqli_fetch_array($res))
       {
      
          
        $subtec=$data[$day];

     
            
            return $subtec ;

           }
     }
    }

   
//give it a test run

	
	if(isset($_POST['tt']))
	{
    
		include("connect.php");
		//delete previous record
       $col=array("C1","C2","C3","C4","Day");
        for ($i = 0; $i <= 4; $i++)
        {
            $com = "Delete from $col[$i]";
            if(mysqli_query($con,$com))
                 {
			      
                  }	
        }
         $Check=$_POST['check'];
            //num of slots per day
            for ($i = 1; $i < 5; $i++)
            {
                for ($j = 1; $j <=6; $j++)
                {
                    $cmd = "Insert into c$i (Slot) values ('$j')";
                    if(mysqli_query($con,$cmd))
                 {
			      
           		
                  }	
                }
            }
			
			$c1 = "";
			$c2 = ""; 
			$c3 = "";
			$c4 = "";
			
       $s1=array();
           
			 $s2=array();
         
			 $s3=array();
          
			 $s4=array();
          
       $days =array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");

      $p1 = 3;
			$p2 = 3; 
			$p3 = 3;
			$p4 = 3;

    //random day generation for course 1  
 $randomnumber=randomday(0,4,prac("cou1"));
$randomday=[];
for($i=0;$i<count($randomnumber);$i++){
 
  array_push($randomday, $days[$randomnumber[$i]]);
}

$randomdayc1=$randomday;

for($i=0;$i<6;$i++){
  array_push($randomdayc1, 'a');
}


//random day generation for course 2
 $randomnumber2=randomday2(0,4,prac("cou2"));
$randomday2=[];
for($i=0;$i<count($randomnumber2);$i++){
  
  array_push($randomday2, $days[$randomnumber2[$i]]);
}

$randomdayc2=$randomday2;

for($i=0;$i<6;$i++){
  array_push($randomdayc2, 'a');
}

 $randomnumber3=randomday3(0,4,prac("cou3"));
$randomday3=[];
for($i=0;$i<count($randomnumber3);$i++){
 
  array_push($randomday3, $days[$randomnumber3[$i]]);
}

$randomdayc3=$randomday3;

for($i=0;$i<6;$i++){
  array_push($randomdayc3, 'a');
}

$randomnumber4=randomday4(0,4,prac("cou3"));
$randomday4=[];
for($i=0;$i<count($randomnumber4);$i++){
  
  array_push($randomday4, $days[$randomnumber4[$i]]);
}

$randomdayc4=$randomday4;

for($i=0;$i<6;$i++){
  array_push($randomdayc4, 'a');
}

			//j for days of weeks
        for ($j = 0; $j < 5; $j++)
        {
            $p1 = 3;
			$p2 = 3; 
			$p3 = 3;
			$p4 = 3;
       

            // For Course 1
            
            //i for slot of the day from cou1
            for ($i = 1; $i <=4; $i++)
            {
             start1:
                $c1 = getC1($p1);
                if ($c1 == "Fin")
                {

                    $p1 = $p1 - 1;
                     goto start1;
                }
                else
                {
                    $s1 =explode(',',$c1);
					       
                        if (checkSub("c1",$days[$j],$s1[0]) != "OK")
                        {
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p1 = $p1 - 1;
                                $Check = "1";
                            }
                            goto start1;
                        }
                        else
                        {
							
							
							
                        $com = "update c1 set $days[$j]='".$s1[0]."-".$s1[1]."' where Slot='".$i."'";
                            if(mysqli_query($con,$com))
                           {
			      
                           }	

                        $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s1[0]."','".$i."','".$s1[1]."','".$days[$j]."','c1')";
                         if(mysqli_query($con,$com1))
                           {
			      
                           }	
                       
                        
                        }
                    
                  }

			}
      
     
			$batches =array("B1","B2");
  
      
			for ($i = 5; $i <=6; $i++)
            {
             $k=$i-5;
           
             start2:
                $c1 = getCP1($p1);
               

                if ($c1 == "Ok")
                {
              
                    $p1 = $p1 - 1;
                     goto start2;

                }
                else if($c1 == "Fin"){
                   $data=explode(',',getC1($p1));
                                  $com = "update c1 set $days[$j]='".$data[0]."-".$data[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                }

                else
                {
             
                    $s1 =explode(',',$c1);
                
					        
                       
                        if (checkSub("c1",$days[$j],$s1[0]) == "OK")
                        {
                        	
                         
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p1 = $p1 - 1;
                                $Check = "1";
                            }
                            goto start2;
                           
                        }
                        else
                     {
					
         
		         
      							if($s1[2]=='yes' )
      							{
                     
                           
                    
                                  if($days[$j]==$randomdayc1[0]){
                                     $subj=explode(',', getC1($p1));
                                  	$com = "update c1 set $days[$j]='".$subj[0]."-".$subj[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
			      
                                    }	
                                  }
                                   elseif($days[$j]==$randomdayc1[1]){
                                     $subj1=explode(',', getC1($p1));
                                    $com = "update c1 set $days[$j]='".$subj1[0]."-".$subj1[1]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                  else if($days[$j]==$randomdayc1[2]){
                                     $subj2=explode(',', getC1($p1));
                                    $com = "update c1 set $days[$j]='".$subj2[0]."-".$subj2[1]."' where Slot='".$i."'";
                                   // echo  $com;
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                   elseif($days[$j]==$randomdayc1[3]){
                                     $subj3=explode(',', getC1($p1));
                                    $com = "update c1 set $days[$j]='".$subj3[0]."-".$subj3[1]."' where Slot='".$i."'";
                  
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                     
                                 
                                  else{


								           $com = "update c1 set $days[$j]='".$s1[0]."-".$s1[1]."-Lab-".$batches[$k]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
			      
                                    }	
                                }

                                  $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s1[0]."','".$i."','".$s1[1]."','".$days[$j]."','c1')";
                                  if(mysqli_query($con,$com1))
                                  {
			                       
                                  }	
								 
								
							    }
							    
							        else
							          {
                                  
                                 
                                    $com = "update c1 set $days[$j]='' where Slot='".$i."'";
                                     if(mysqli_query($con,$com))
                                     {
			      
                                      }	

                               
                        
                        }
						
                    }
                  }

			}
    
    // i for slot of the day from cou2
            for ($i = 1; $i <=4; $i++)
            {
             start3:
                $c2 = getC2($p2);
                if ($c2 == "Fin")
                {

                    $p2 = $p2 - 1;
                     goto start3;
                }
                else
                {
                    $s2 =explode(',',$c2);
                  $tec=$s2[1];
                  
                        if (checkSub("c2",$days[$j],$s2[0]) != "OK")
                        {
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p2 = $p2 - 1;
                                $Check = "1";
                            }
                            goto start3;
                        }
                        else
                        {
              
              
              
                        $com = "update c2 set $days[$j]='".$s2[0]."-".$s2[1]."' where Slot='".$i."'";
                            if(mysqli_query($con,$com))
                           {
            
                           }  

                        $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s2[0]."','".$i."','".$s2[1]."','".$days[$j]."','c2')";
                         if(mysqli_query($con,$com1))
                           {
            
                           }  
                       
                        
                        }
                    
                  }

      }
      
    
    $batches =array("B1","B2");
  
      
      for ($i = 5; $i <=6; $i++)
            {
             $k=$i-5;
          
             start4:
                $c2 = getCP2($p2);
               

                if ($c2 == "Ok")
                {
                
                    $p2 = $p2 - 1;
                     goto start4;

                }
                else if($c2 == "Fin"){
                   $data=explode(',',getC2($p2));
                                  $com = "update c2 set $days[$j]='".$data[0]."-".$data[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                }

                else
                {
             
                    $s2 =explode(',',$c2);
                
                   $tec=$s2[1];
                
                      
                        if (checkSub("c2",$days[$j],$s2[0]) == "OK")
                        {
                          
                         
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p2 = $p2 - 1;
                                $Check = "1";
                            }
                            goto start4;
                           
                        }
                        else
                     {
          
        
             
                    if($s2[2]=='yes' )
                    {
                     
                           
                    
                                  if($days[$j]==$randomdayc2[0]){
                                     $subj=explode(',', getC2($p2));
                                    $com = "update c2 set $days[$j]='".$subj[0]."-".$subj[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                   elseif($days[$j]==$randomdayc2[1]){
                                     $subj1=explode(',', getC2($p2));
                                    $com = "update c2 set $days[$j]='".$subj1[0]."-".$subj1[1]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                  else if($days[$j]==$randomdayc2[2]){
                                     $subj2=explode(',', getC2($p2));
                                    $com = "update c2 set $days[$j]='".$subj2[0]."-".$subj2[1]."' where Slot='".$i."'";
                                   // echo  $com;
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                   elseif($days[$j]==$randomdayc2[3]){
                                     $subj3=explode(',', getC2($p2));
                                    $com = "update c2 set $days[$j]='".$subj3[0]."-".$subj3[1]."' where Slot='".$i."'";
                  
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                     
                                 
                                  else{


                           $com = "update c2 set $days[$j]='".$s2[0]."-".$s2[1]."-Lab-".$batches[$k]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                }

                                  $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s2[0]."','".$i."','".$s2[1]."','".$days[$j]."','c2')";
                                  if(mysqli_query($con,$com1))
                                  {
                             
                                  } 
                 
                
                  }
                  
                      else
                        {
                                  
                               
                                    $com = "update c2 set $days[$j]='' where Slot='".$i."'";
                                     if(mysqli_query($con,$com))
                                     {
            
                                      } 

                               
                        
                        }
            
                    }
                  }

      }

      //i for slot of the day from cou3
   
            for ($i = 1; $i <=4; $i++)
            {
             start5:
                $c3 = getC3($p3);
                if ($c3 == "Fin")
                {

                    $p3 = $p3 - 1;
                     goto start5;
                }
                else
                {
                    $s3 =explode(',',$c3);
                  $tec=$s3[1];
                    
                        if (checkSub("c3",$days[$j],$s3[0]) != "OK")
                        {
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p3 = $p3 - 1;
                                $Check = "1";
                            }
                            goto start5;
                        }
                        else
                        {
              
              
              
                        $com = "update c3 set $days[$j]='".$s3[0]."-".$s3[1]."' where Slot='".$i."'";
                            if(mysqli_query($con,$com))
                           {
            
                           }  

                        $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s3[0]."','".$i."','".$s3[1]."','".$days[$j]."','c3')";
                         if(mysqli_query($con,$com1))
                           {
            
                           }  
                       
                        
                        }
                    
                  }

      }
      
  
      $batches =array("B1","B2");
  
      
      for ($i = 5; $i <=6; $i++)
            {
             $k=$i-5;
          
             start6:
                $c3 = getCP3($p3);
               

                if ($c3 == "Ok")
                {
              
                    $p3 = $p3 - 1;
                     goto start6;

                }
                else if($c3 == "Fin"){
                   $data=explode(',',getC3($p3));
                                  $com = "update c3 set $days[$j]='".$data[0]."-".$data[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                }

                else
                {
             
                    $s3 =explode(',',$c3);
                
                   $tec=$s3[1];
                
                    
                       
                        if (checkSub("c3",$days[$j],$s3[0]) == "OK")
                        {
                        
                         
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p3 = $p3 - 1;
                                $Check = "1";
                            }
                            goto start6;
                           
                        }
                        else
                     {
          
          
             
                    if($s3[2]=='yes' )
                    {
                     
                           
                    
                                  if($days[$j]==$randomdayc3[0]){
                                     $subj=explode(',', getC3($p3));
                                    $com = "update c3 set $days[$j]='".$subj[0]."-".$subj[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                   elseif($days[$j]==$randomdayc3[1]){
                                     $subj1=explode(',', getC3($p3));
                                    $com = "update c3 set $days[$j]='".$subj1[0]."-".$subj1[1]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                  else if($days[$j]==$randomdayc3[2]){
                                     $subj2=explode(',', getC3($p3));
                                    $com = "update c3 set $days[$j]='".$subj2[0]."-".$subj2[1]."' where Slot='".$i."'";
                                   
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                   elseif($days[$j]==$randomdayc3[3]){
                                     $subj3=explode(',', getC3($p3));
                                    $com = "update c3 set $days[$j]='".$subj3[0]."-".$subj3[1]."' where Slot='".$i."'";
                  
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                     
                                 
                                  else{


                           $com = "update c3 set $days[$j]='".$s3[0]."-".$s3[1]."-Lab-".$batches[$k]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                }

                                  $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s3[0]."','".$i."','".$s3[1]."','".$days[$j]."','c3')";
                                  if(mysqli_query($con,$com1))
                                  {
                             
                                  } 
                 
                
                  }
                  
                      else
                        {
                                  
                            
                                    $com = "update c3 set $days[$j]='' where Slot='".$i."'";
                                     if(mysqli_query($con,$com))
                                     {
            
                                      } 

                               
                        
                        }
            
                    }
                  }

      }


			
	//i for slot of the day from cou4
	 for ($i = 1; $i <=4; $i++)
            {
             start7:
                $c4 = getC4($p4);
                if ($c4 == "Fin")
                {

                    $p4 = $p4 - 1;
                     goto start7;
                }
                else
                {
                    $s4 =explode(',',$c4);
                  $tec=$s4[1];
                  
                        if (checkSub("c4",$days[$j],$s4[0]) != "OK")
                        {
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p4 = $p4 - 1;
                                $Check = "1";
                            }
                            goto start7;
                        }
                        else
                        {
              
              
              
                        $com = "update c4 set $days[$j]='".$s4[0]."-".$s4[1]."' where Slot='".$i."'";
                            if(mysqli_query($con,$com))
                           {
            
                           }  

                        $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s4[0]."','".$i."','".$s4[1]."','".$days[$j]."','c4')";
                         if(mysqli_query($con,$com1))
                           {
            
                           }  
                       
                        
                        
                    }
                  }

      }
      
  
      $batches =array("B1","B2");
  
      
      for ($i = 5; $i <=6; $i++)
            {
             $k=$i-5;
          
             start8:
                $c4 = getCP4($p4);
               

                if ($c4 == "Ok")
                {
              
                    $p4 = $p4 - 1;
                     goto start8;

                }
                else if($c4 == "Fin"){
                   $data=explode(',',getC4($p4));
                                  $com = "update c4 set $days[$j]='".$data[0]."-".$data[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                }

                else
                {
             
                    $s4 =explode(',',$c4);
                
                   $tec=$s4[1];
                
                   
                       
                        if (checkSub("c4",$days[$j],$s4[0]) == "OK")
                        {
                        
                         
                            $Check = $Check + 1;
                            if ($Check >= 100)
                            {
                               $p4 = $p4 - 1;
                                $Check = "1";
                            }
                            goto start8;
                           
                        }
                        else
                     {
          
          
             
                    if($s4[2]=='yes' )
                    {
                     
                           
                    
                                  if($days[$j]==$randomdayc4[0]){
                                     $subj=explode(',', getC4($p4));
                                    $com = "update c4 set $days[$j]='".$subj[0]."-".$subj[1]."' where Slot='".$i."'";
                      
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                   elseif($days[$j]==$randomdayc4[1]){
                                     $subj1=explode(',', getC4($p3));
                                    $com = "update c4 set $days[$j]='".$subj1[0]."-".$subj1[1]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                  else if($days[$j]==$randomdayc4[2]){
                                     $subj2=explode(',', getC4($p4));
                                    $com = "update c4 set $days[$j]='".$subj2[0]."-".$subj2[1]."' where Slot='".$i."'";
                                   
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                                   elseif($days[$j]==$randomdayc4[3]){
                                     $subj3=explode(',', getC4($p4));
                                    $com = "update c4 set $days[$j]='".$subj3[0]."-".$subj3[1]."' where Slot='".$i."'";
                  
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                  }
                     
                                 
                                  else{


                           $com = "update c4 set $days[$j]='".$s4[0]."-".$s4[1]."-Lab-".$batches[$k]."' where Slot='".$i."'";
                        
                                 if(mysqli_query($con,$com))
                                 {
            
                                    } 
                                }

                                  $com1 = "insert into day(Subject,Slot,Teach,day,Cou) values ('".$s3[0]."','".$i."','".$s3[1]."','".$days[$j]."','c4')";
                                  if(mysqli_query($con,$com1))
                                  {
                             
                                  } 
                 
                
                  }
                  
                      else
                        {
                                  
                               
                                    $com = "update c4 set $days[$j]='' where Slot='".$i."'";
                                     if(mysqli_query($con,$com))
                                     {
            
                                      } 

                               
                        
                        }
            
                    }
                  }

      }

   	
			
			
			
	}
                include("connect.php");
                $course=array("c1","c2","c3","c4");
                $day= array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
                for($i=0;$i<count($course);$i++){
                        
                          for($j=0;$j<count($day);$j++){
                            $lecday =repeatlecture(4,$course[$i],$day[$j]);
                              $lecday2 =repeatlecture(1,$course[$i],$day[$j]);
                            $com2="SELECT COUNT(`$day[$j]`) FROM `$course[$i]`WHERE `$day[$j]`  LIKE '%Lab%' ";
                          

                            $query = mysqli_query($con, $com2);
                            $approve_count = mysqli_fetch_array($query);
                            $totalCount = array_shift($approve_count);
                            $totalCount;
                            if($totalCount==0){
                              $com3 = "update `$course[$i]` set `$day[$j]` ='".$lecday."' where  Slot=5 " ;
                              
                              if(mysqli_query($con,$com3))
                               {
                                                
                               } 
                                $com4 = "update `$course[$i]` set `$day[$j]` ='".$lecday2."' where  Slot=6 " ;
                                if(mysqli_query($con,$com4))
                               {
                                                
                               } 
                            }
                            else{

                            }

                              
                          
                              }
                                                      
                           }
	
	$sq1="select * from c1 ORDER BY Slot";
	$res=$con->query($sq1);
	if(mysqli_num_rows($res)==0)
	   {
		    
	   }
	   else
	   {
		   $s="select * from course where cno='1'";
	       $r=$con->query($s);
	       $d=$r->fetch_assoc();
		   $cn1=$d['cname'];
		   echo"
		 <center><h5 style='font-size:15px'><b>First Year-".$cn1."</b></h5></center>
		   <table border='1' cellspacing='0' cellpading='0' width='80%' style='height:70%' align='center'>
		       <center>
			   <tr align='center' style='font-weight:bold'>
			   <td align='center' bgcolor='#FFC04C'>Time Slot</td>
			   <td align='center' bgcolor='#FFC04C'>Monday</td>
			   <td align='center' bgcolor='#FFC04C'>Tuesday</td>
			   <td align='center' bgcolor='#FFC04C'>Wednesday</td>
			   <td align='center' bgcolor='#FFC04C'>Thursday</td>
			   <td align='center' bgcolor='#FFC04C'>Friday</td>
			   </tr>
			   </center>
		   ";
		   
		   $i=0;
		   $j=1;
		   while($row1=$res->fetch_assoc() )
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
				   $slot='01.30-02.30';
				   
			   }
			   if($row1['Slot']==5 )
			   {
				   $slot='02.30-03.30';
				   

			   }
           if($row1['Slot']==6 )
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
			   <tr align='center' height='30px' id='".$j."'' >
			   <td width='10%' >".$slot."</td>
			   <td width='16%' >".$row1['Monday']."</td>
			   <td width='16%'>".$row1['Tuesday']."</td>
			   <td width='16%'>".$row1['Wednesday']."</td>
			   <td width='16%'>".$row1['Thursday']."</td>
			   <td width='16%'>".$row1['Friday']."</td>
			  </tr>
			  ";
			  if($i==2)
			  {
				  echo"
				  <tr>
			   <td align='center' colspan='6'><b>Break</b></td>
			   </tr>";
			   
			  }
			 
			   $i++;
			   $j++;
	       }
	   }
	
	echo"</table><br><br>";
	
	
	$sq2="select * from c2 ORDER BY Slot";
	$res2=$con->query($sq2);
	if(mysqli_num_rows($res2)==0)
	   {
		    
	   }
	   else
	   {
		   $s="select * from course where cno='2'";
	       $r=$con->query($s);
	       $d=$r->fetch_assoc();
		   $cn2=$d['cname'];
		   echo"
		    <center><h5 style='font-size:15px'><b>Second Year-".$cn2."</b></h5></center>
		   <table border='1' cellspacing='0' cellpading='0' width='80%' style='height:70%' align='center'>
		       <center>
			   <tr align='center' style='font-weight:bold'>
			   <td align='center' bgcolor='#FFC04C'>Time Slot</td>
			   <td align='center' bgcolor='#FFC04C'>Monday</td>
			   <td align='center' bgcolor='#FFC04C'>Tuesday</td>
			   <td align='center' bgcolor='#FFC04C'>Wednesday</td>
			   <td align='center' bgcolor='#FFC04C'>Thursday</td>
			   <td align='center' bgcolor='#FFC04C'>Friday</td>
			   </tr>
			   </center>
		   ";
		   
		   $i=0;
		   while($row1=$res2->fetch_assoc())
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
				   $slot='01.30-02.30';
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
			   <tr align='center' height='30px'>
			    <td width='10%'>".$slot."</td>
			   <td width='14%'>".$row1['Monday']."</td>
			   <td width='14%'>".$row1['Tuesday']."</td>
			   <td width='14%'>".$row1['Wednesday']."</td>
			   <td width='14%'>".$row1['Thursday']."</td>
			   <td width='14%'>".$row1['Friday']."</td>
			  </tr>
			  ";
			  if($i==2)
			  {
				  echo"
				  <tr>
			   <td align='center' colspan='6'><b>Break</b></td>
			   </tr>";
			   
			  }
			   $i++;
	       }
	   }
	
	echo"</table><br><br>";
	
	
	$sq3="select * from c3 ORDER BY Slot";
	$res3=$con->query($sq3);
	if(mysqli_num_rows($res3)==0)
	   {
		    
	   }
	   else
	   {
		   $s="select * from course where cno='3'";
	       $r=$con->query($s);
	       $d=$r->fetch_assoc();
		   $cn3=$d['cname'];
		   echo"
		     <center><h5 style='font-size:15px'><b>Third Year-".$cn3."</b></h5></center>
		   <table border='1' cellspacing='0' cellpading='0' width='80%' style='height:70%' align='center'>
		       <center>
			   <tr align='center' style='font-weight:bold'>
			   <td align='center' bgcolor='#FFC04C'>Time Slot</td>
			   <td align='center' bgcolor='#FFC04C'>Monday</td>
			   <td align='center' bgcolor='#FFC04C'>Tuesday</td>
			   <td align='center' bgcolor='#FFC04C'>Wednesday</td>
			   <td align='center' bgcolor='#FFC04C'>Thursday</td>
			   <td align='center' bgcolor='#FFC04C'>Friday</td>
			   </tr>
			   </center>
			   
		   ";
		   
		   $i=0;
		   while($row1=$res3->fetch_assoc())
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
				   $slot='01.30-02.30';
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
			   <tr align='center' height='30px'>
			   <td width='10%'>".$slot."</td>
			   <td width='14%'>".$row1['Monday']."</td>
			   <td width='14%'>".$row1['Tuesday']."</td>
			   <td width='14%'>".$row1['Wednesday']."</td>
			   <td width='14%'>".$row1['Thursday']."</td>
			   <td width='14%'>".$row1['Friday']."</td>
			  </tr>
			  ";
			  if($i==2)
			  {
				  echo"
				  <tr>
			   <td align='center' colspan='6'><b>Break</b></td>
			   </tr>";
			   
			  }
			   $i++;
	       }
	   }
	
	echo"</table><br><br>";

  $sq4="select * from c4 ORDER BY Slot";
  $res4=$con->query($sq4);
  if(mysqli_num_rows($res4)==0)
     {
        
     }
     else
     {
       $s="select * from course where cno='4'";
         $r=$con->query($s);
         $d=$r->fetch_assoc();
       $cn4=$d['cname'];
       echo"
         <center><h5 style='font-size:15px'><b>Fourth Year-".$cn4."</b></h5></center>
       <table border='1' cellspacing='0' cellpading='0' width='80%' style='height:70%' align='center'>
           <center>
         <tr align='center' style='font-weight:bold'>
         <td align='center' bgcolor='#FFC04C'>Time Slot</td>
         <td align='center' bgcolor='#FFC04C'>Monday</td>
         <td align='center' bgcolor='#FFC04C'>Tuesday</td>
         <td align='center' bgcolor='#FFC04C'>Wednesday</td>
         <td align='center' bgcolor='#FFC04C'>Thursday</td>
         <td align='center' bgcolor='#FFC04C'>Friday</td>
         </tr>
         </center>
         
       ";
       
       $i=0;
       while($row1=$res4->fetch_assoc())
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
           $slot='01.30-02.30';
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
         <tr align='center' height='30px'>
         <td width='10%'>".$slot."</td>
         <td width='14%'>".$row1['Monday']."</td>
         <td width='14%'>".$row1['Tuesday']."</td>
         <td width='14%'>".$row1['Wednesday']."</td>
         <td width='14%'>".$row1['Thursday']."</td>
         <td width='14%'>".$row1['Friday']."</td>
        </tr>
        ";
        if($i==2)
        {
          echo"
          <tr>
         <td align='center' colspan='6'><b>Break</b></td>
         </tr>";
         
        }
         $i++;
         }
     }
  
  echo"</table><br><br>";
	
	
	
	}
?>
	<input type='submit' class='btn' value='Export to Excel First Year' name='c1'>&nbsp; 
	<input type='submit' class='btn' value='Export to Excel Second Year' name='c2'>&nbsp;  
	<input type='submit' class='btn' value='Export to Excel Third Year' name='c3'>&nbsp; 
  <input type='submit' class='btn' value='Export to Excel Fourth Year' name='c4'>

	<?php
		}
	   if(isset($_POST['c1']))
    {			
			 $comp="Course";
			 $s="select * from course where cno='1'";
	       $r=$con->query($s);
	       $d=$r->fetch_assoc();
		   $cn1=$d['cname'];
			$filename = $comp."_".$cn1.".xls"; // File Name
			// Download file
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			$sql1="select * from c1";
			$result = $con->query($sql1);
           // Write data to file
			$flag = false;
			while ($row1 = $result->fetch_assoc()) 
			{
			if (!$flag) 
			{
             // display field/column names as first row
              echo implode("\t", array_keys($row1)) . "\r\n";
                $flag = true;
			}
             echo implode("\t", array_values($row1)) . "\r\n";
            }
    }
	
	if(isset($_POST['c2']))
    {			
			 $comp="Course";
			 $s="select * from course where cno='2'";
	       $r=$con->query($s);
	       $d=$r->fetch_assoc();
		   $cn2=$d['cname'];
			$filename = $comp."_".$cn2.".xls"; // File Name
			// Download file
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			$sql1="select * from c2";
			$result = $con->query($sql1);
           // Write data to file
			$flag = false;
			while ($row1 = $result->fetch_assoc()) 
			{
			if (!$flag) 
			{
             // display field/column names as first row
              echo implode("\t", array_keys($row1)) . "\r\n";
                $flag = true;
			}
             echo implode("\t", array_values($row1)) . "\r\n";
            }
    }

	if(isset($_POST['c3']))
    {     
       $comp="Course";
       $s="select * from course where cno='3'";
         $r=$con->query($s);
         $d=$r->fetch_assoc();
       $cn3=$d['cname'];
      $filename = $comp."_".$cn3.".xls"; // File Name
      // Download file
      header("Content-Disposition: attachment; filename=\"$filename\"");
      header("Content-Type: application/vnd.ms-excel");
      $sql1="select * from c3";
      $result = $con->query($sql1);
           // Write data to file
      $flag = false;
      while ($row1 = $result->fetch_assoc()) 
      {
      if (!$flag) 
      {
             // display field/column names as first row
              echo implode("\t", array_keys($row1)) . "\r\n";
                $flag = true;
      }
             echo implode("\t", array_values($row1)) . "\r\n";
            }
    }
    if(isset($_POST['c4']))
    {     
       $comp="Course";
       $s="select * from course where cno='4'";
         $r=$con->query($s);
         $d=$r->fetch_assoc();
       $cn4=$d['cname'];
      $filename = $comp."_".$cn4.".xls"; // File Name
      // Download file
      header("Content-Disposition: attachment; filename=\"$filename\"");
      header("Content-Type: application/vnd.ms-excel");
      $sql1="select * from c4";
      $result = $con->query($sql1);
           // Write data to file
      $flag = false;
      while ($row1 = $result->fetch_assoc()) 
      {
      if (!$flag) 
      {
             // display field/column names as first row
              echo implode("\t", array_keys($row1)) . "\r\n";
                $flag = true;
      }
             echo implode("\t", array_values($row1)) . "\r\n";
            }
    }
if(!isset($_POST['c1'])&&!isset($_POST['c2'])&&!isset($_POST['c3'])&&!isset($_POST['c4']))
{
	echo"
</td>
</tr>
</table>
</form>
</body>
</html>
<br><br>";

include("footer.php");
}
?>

