<?php
    //file save.
    session_start();
			if(!isset($_SESSION['id'])){
				echo "<script>
				location.href='../index.php';
    		</script>";
			}

    $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
    if(!$conn){
      echo "connect fail....";
    }
    mysqli_set_charset($conn, 'utf8');
    $db=mysqli_select_db($conn, "interpreter");

    // 가져올 데이터 : 현재 사용중인 문제 정보
    $id = $_SESSION['id'];
    $num = $_GET['board'];
    $item = $_GET['item'];

    // 현재 board 정보 ( num 값) 에 따른 디렉토리 생성.
    // 디렉토리 존재여부 확인하고 생성 필요.
    // 아니면 그냥 파일명에 board 값 넣어준다?
    // 이름 쓸지도 몰라서 일단 가져옴
    $i_query = "SELECT name, student FROM info WHERE id='$id'";
    $i_result = mysqli_query($conn, $i_query);
    $i_array = mysqli_fetch_array($i_result);
    $filename = "files/".$i_array[student]."_board_".$num.".c";

    $tablename = "c_submission";
    $title = $i_array[student]."+".$i_array[name];
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
    $t_sql = "SELECT num, id FROM $tablename WHERE id='$id'";
    $t_res = mysqli_query($conn, $t_sql);
    $t_arr = mysqli_fetch_array($t_res);
    if($t_arr[num] == $num && $t_arr[id] == $id){
      $sql = "UPDATE $tablename SET codepwd='$filename' WHERE id='$id'";
    }
    else{
      $sql = "INSERT into $tablename values(default,'$num','$id','$title', '$i_array[name]', '$filename',default, default)";
    }

    mysqli_query($conn, $sql);
    echo "<script>location.href='../board/board_list.php?item=$item';</script>";

?>
