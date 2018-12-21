<?php

# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
    </script>";
    }
else{

  $db_id= $_SESSION['id'];                      // 작성자
  $subject = $_POST['subject'];                 // 주제
  $db_title = $_POST['title'];                  // 제목
  $db_content = addslashes($_POST['content']);  // 내용

  $conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
    if(!$conn){
        echo"connect fail....";
    }
    mysqli_set_charset($conn, 'utf8');
    $db=mysqli_select_db($conn , "interpreter");
    $tablename = "free_board";
    $name_sql = "SELECT name FROM member WHERE id='$db_id'";
    $res = mysqli_query($conn, $name_sql);
    $arr = mysqli_fetch_array($res);

    $sql = "INSERT into $tablename values(default,'$subject','$db_id','$arr[name]', '$db_title', '$db_content', default)";
    mysqli_query($conn, $sql);
    echo "<script>location.href='free_board.php';</script>";
}

?>
