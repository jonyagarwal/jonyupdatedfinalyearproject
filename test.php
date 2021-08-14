<?php
     // include("connect.php");
     //    $sql2 = "SELECT count(practical) FROM cou1 where practical='yes' ";
     //   //  $sqlbatch="SELECT  `Batch` FROM `batch` order by rand() LIMIT 1";
     //    // echo $sql2;
     //     $res =$con->query($sql2);
     //     $row = $res->fetch_assoc();
     //    // $row = mysql_fetch_array($res);
     //     echo $row['count(practical)'];

   //     for($i=1;$i<=4;$i++){
   //     	$value='';
   //     	while(){
   //     		$value=rand(1,5);
   //     	//echo rand(1,5);
   //     }
   // }


   $array = [];

$A = rand(1,5);
$array[0] = $A;

$B = rand(1,5);
$array[1] = $B;

if(in_array($B,$array)){
    $B = rand(1,5);
    $array[1] = $B;
}

$C = rand(1,5);
$array[2] = $C;

if(in_array($C,$array)){
    $C = rand(1,5);
    $array[2] = $C;
}

$length = count($array);

//display the array values;

for($i = 0; $i < $length; $i++){
    echo ($array[$i]."<br>");
}
// }
 ?>