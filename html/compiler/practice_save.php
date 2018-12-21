<?php
    //file save.
    session_start();
			if(!isset($_SESSION['id'])){
				echo "<script>
				location.href='../index.php';
    		</script>";
			}

    $conn = mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
    if(!$conn){
      echo "connect fail....";
    }
    mysqli_set_charset($conn, 'utf8');
    $db=mysqli_select_db($conn, "interpreter");

    // 가져올 데이터 : 현재 사용중인 문제 정보
    $id = $_SESSION['id'];
    $num = $_GET['board'];

    // 현재 board 정보 ( num 값) 에 따른 디렉토리 생성.
    // 디렉토리 존재여부 확인하고 생성 필요.
    // 아니면 그냥 파일명에 board 값 넣어준다?
    // 이름 쓸지도 몰라서 일단 가져옴
    $tablename = "clear_practice";
    /*
    board_num - default
    num - $num
    id - $id
    title - $array[student].$i_array[name]
    name - $i_array[name]
    codepwd - $filename
    feedback - default
    date - default
    */
//    $m_sql = "SELECT score FROM member WHERE id='$id'";
//    $m_res = mysqli_query($conn, $t_sql);
//    $m_arr = mysqli_fetch_array($m_res);

    $t_sql = "SELECT id, board_num FROM $tablename WHERE id='$id' and board_num='$num'";
    $t_res = mysqli_query($conn, $t_sql);
    $t_arr = mysqli_fetch_array($t_res);
    if($t_arr[board_num] == $num && $t_arr[id] == $id){
    }
    else{
    //  $score = $m_arr[score]+10;
    //  $sql = "UPDATE member SET score='$score' WHERE id='$id'";
      $sql = "INSERT into $tablename values(default,'$id','$num', default)";
    }

    mysqli_query($conn, $sql);
    echo "<script>location.href='../board/practice_board.php';</script>";

?>
