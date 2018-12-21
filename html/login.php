<?php
session_start();
$id = $_POST['id'];
$pw = $_POST['pw'];
$conn=mysqli_connect('localhost', 'inter', '771029', 'interpreter', '3306');
$db=mysqli_select_db($conn , "interpreter");
$query = "select *from login where id = '$id'";
$result = mysqli_query($conn, $query);

$array = mysqli_fetch_array($result);
if($array['pwd']==$pw){
  $_SESSION['id']= $id;
  if(isset($_SESSION['id'])){
    echo "<script>
    location.href = 'how.php';
    </script>";
  }
  else if(!isset($_SESSION['id'])){
    echo "<script>history.back();
      self.window.alert('fail');
    </script>";
  }
  else{
    echo "<script>history.back();
      self.window.alert('check password');
    </script>";
  }
}
else{
  echo "<script>history.back();
    self.window.alert('check id');
  </script>";
}
 ?>
