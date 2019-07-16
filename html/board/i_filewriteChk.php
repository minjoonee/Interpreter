<?php
$item = $_GET['item'];
$db_title = $_POST['title'];
$db_content = addslashes($_POST['content']);

# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
    </script>";
    }
else{
	$db_id= $_SESSION['id'];

  $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
    if(!$conn){
        echo"connect fail....";
    }
    mysqli_set_charset($conn, 'utf8');
    $db=mysqli_select_db($conn , "interpreter");
    $tablename = "board";


    $sql = "INSERT into $tablename values(default,'$db_id','$db_title','$db_content', '$db_input1', '$db_result1','$db_input2','$db_result2',default,1)";
    mysqli_query($conn, $sql);
    echo "<script>location.href='board_list.php?item=$item';</script>";
}

?>
