<?php
# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
    </script>";
    }

  $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
  if(!$conn){
      echo"connect fail....";
  }
  mysqli_set_charset($conn, 'utf8');
  $db=mysqli_select_db($conn , "interpreter");

   $id = $_SESSION['id'];
   $parent_num = $_GET['board'];
   $table="free_reply";

   $query="SELECT * FROM $table where parent_num='$parent_num' order by num desc limit 1;";
   $result = mysqli_query($conn, $query);
   while($array=mysqli_fetch_array($result)){
     echo(
			 "<div id='item'>
		 			<div id='id'>$array[name]</div>
					<div id='date'>$array[date]</div>
					<div id='content'>$array[content]</div>
				</div>
					");
   }
  mysqli_close($conn);
?>
