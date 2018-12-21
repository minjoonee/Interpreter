<?php
  session_start();
     if(!isset($_SESSION['id'])){
       echo "<script>
       location.href='../index.php';
     </script>";
     }
   $db_id= $_SESSION['id'];
     $num = $_GET['board'];


   $conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
     if(!$conn){
         echo"connect fail....";
     }
     mysqli_set_charset($conn, 'utf8');
     $db=mysqli_select_db($conn , "interpreter");
     $tablename = "board";
     $query = "SELECT *FROM $tablename where num='$num'";
     $result = mysqli_query($conn,$query);
     $array = mysqli_fetch_array($result);
 ?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php echo "제목 : $array[title]"; ?>
    <br><br><?php echo $array[content];?><p>
    <form enctype="multipart/form-data" action="fileuploadDB.php?board=<?php echo $num; ?>" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
    <input type="file" name="userfile" >
	<br>
    <br>
    <input type="submit" value="Submit">
    </form>
  </body>
</html>
