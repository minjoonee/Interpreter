<?php
$num = $_GET[board_num];
$board = $_GET[board];
$fb = $_POST[name];

# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
    </script>";
    }
else{
	$db_id= $_SESSION['id'];

  $conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
    if(!$conn){
        echo"connect fail....";
    }
    mysqli_set_charset($conn, 'utf8');
    $db=mysqli_select_db($conn , "interpreter");
    $tablename = "c_submission";


    $sql = "UPDATE $tablename set feedback='$fb' where num=$board and board_num=$num";
    mysqli_query($conn, $sql);
    echo $sql;
    echo "<script>location.href='article.php?board=$board&board_num=$num';</script>";
}

?>
