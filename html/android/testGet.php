<?php
$myid = $_GET['id'];
$name = $_GET['name'];
$score = $_GET['score'];

$conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'avoid', '3306');
if(!$conn){
  echo"connect fail....";
}
mysqli_set_charset($conn, 'utf8');
$db=mysqli_select_db($conn , "avoid");
$table = "rank";
$search="SELECT score FROM $table where id='$myid'";
$result=mysqli_query($conn,$search);
$sameNum = mysqli_num_rows($result);
if($sameNum>0){
  echo $sameNum;
  $array = mysqli_fetch_array($result);
  if($score>$array[score]){
    $update= "UPDATE $table SET score=$score where id='$myid'";
    mysqli_query($conn, $update);
  }
}
else{
  $sql = "INSERT into $table values('$myid','$name','$score')";
  mysqli_query($conn, $sql);
}

?>
