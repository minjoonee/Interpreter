<?php

$myid = $_GET['id'];
$name = $_GET['name'];

$con=mysqli_connect("localhost","inter","771029","avoid");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$res = mysqli_query($con,"SELECT * FROM rank order by score desc");
$result=array();

$rank=0;
$myrank;
while($row = mysqli_fetch_array($res)){
  $rank= $rank+1;
	array_push($result, array('rank'=>$rank, 'name'=>$row[1], 'score'=>$row[2]));
  if($myid == $row[0]){
    $myrank = $rank;
  }
}
$query = "SELECT *FROM rank where id='$myid' and name='$name'";
$myscore = mysqli_query($con, $query);
$arr=mysqli_fetch_array($myscore);
array_push($result, array('rank'=>$myrank, 'name'=>$arr[1], 'score'=>$arr[2]));


$json= json_encode($result, JSON_UNESCAPED_UNICODE);
echo $json;
mysqli_close($con);

?>
