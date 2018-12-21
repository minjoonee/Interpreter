<?php
# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
    </script>";
    }

  $conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
  if(!$conn){
      echo"connect fail....";
  }
  mysqli_set_charset($conn, 'utf8');
  $db=mysqli_select_db($conn , "interpreter");

   $id = $_SESSION['id'];
   $parent_num = $_GET['board'];
   $table="free_reply";
   $db_content = $_POST['reply'];

   $query="INSERT into $table values(default, '$parent_num', '$id', '$db_content', default)";

   $result = mysqli_query($conn, $query);
   if($result){
     echo "success";
   }
?>
