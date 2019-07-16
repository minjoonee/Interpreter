<?php
$id = $_POST['id'];
 $pwd= $_POST['password'];
 $name = $_POST['name'];
 $sNum = $_POST['sNum'];

 echo "$id $pwd $name $sNum";
?>

<?php

  $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
  $db=mysqli_select_db($conn , "interpreter");

  $chk = "select count(id) from member where id='$id'";
  $chkresult = mysqli_query($conn,$chk);
  $cnt = mysqli_fetch_array($chkresult);
  if($cnt[0]==0){
    $query = "INSERT INTO member values('$id','$pwd','$name','$sNum',default)";
    $query2 = "INSERT INTO login values('$id','$pwd')";

    $result = mysqli_query($conn, $query);
    $result2 = mysqli_query($conn, $query2);
    echo "<script>location.href='index.php';
    </script>";
  }
  else{
    echo "<script>history.back();
    self.window.alert('중복된 id가 존재합니다.');
    </script>";
  }
?>
