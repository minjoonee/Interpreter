<?php
# session 연결
  session_start();
  if(!isset($_SESSION['id'])){
    echo "<script>
    location.href='../index.php';
    </script>";
  }

  $id= $_SESSION['id'];

  $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
  if(!$conn){
    echo"connect fail....";
  }
  mysqli_set_charset($conn, 'utf8');
  $db=mysqli_select_db($conn , "interpreter");

  $query = "SELECT DISTINCT subject FROM practice";
  $result = mysqli_query($conn, $query);
  while($array = mysqli_fetch_array($result)){
    echo
    "<a href='subject_list.php?subject=$array[subject]'>
      <li class='col-item-left'>
        <div class='card-block'>
          <div class='card-title'>
            $array[subject]
              <span class='css-arrow'></span>

          </div>
          <div class='card-text'>- 이 주제 선택하기
          </div>
        </div>
      </li>
    </a>";
  }
  mysqli_close($conn);
?>
