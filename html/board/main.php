<?php
# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
    </script>";
    }

    $db_id= $_SESSION['id'];

    $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
      if(!$conn){
          echo"connect fail....";
      }
      mysqli_set_charset($conn, 'utf8');
      $db=mysqli_select_db($conn , "interpreter");
      // 여기까지 디비 접속

      $tablename = "board";
      $query = "SELECT *FROM $tablename order by num DESC";
      $result = mysqli_query($conn,$query);

      $i_query = "SELECT instructor FROM info where id='$db_id'";
      $i_result = mysqli_query($conn, $i_query);
      $i_array = mysqli_fetch_array($i_result);
      $i_num=$i_array['instructor'];
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=David+Libre|Hind:400,700" rel="stylesheet">

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="css/item.css">
	<link rel="stylesheet" href="../tableDesign/style.css">
	<title>Interpreter</title>
</head>
<body>
<header class="cd-auto-hide-header">
	<div class="logo">
		<div id="wrap">
			<a href="../how.php">
			<div id="app">
				<script type="text/javascript" src="../js/logo_main_effect.js"></script>
		 </div>
	 </div>
	</div>

	<nav class="cd-primary-nav">
		<a href="#cd-navigation" class="nav-trigger">
			<span>
				<em aria-hidden="true"></em>
				Menu
			</span>
		</a> <!-- .nav-trigger -->

		<ul id="cd-navigation">
      <li><a href="../logout.php">로그아웃</a></li>
      <li><a href="../info.php">회원정보</a></li>
		</ul>
	</nav> <!-- .cd-primary-nav -->

	<nav class="cd-secondary-nav">
		<ul>
			<li><a class="active" href="main.php">홈</a></li>
			<li><a href="../how.php">소개</a></li>
			<li><a href="board.php">과제</a></li>
			<li><a href="practice_board.php">연습</a></li>
		</ul>
	</nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->
<main class="cd-main-content sub-nav">
  <style>
    .fast_table{
      width:40%;
      min-width: 400px;
      margin: 20px auto;
      padding: 30px;
      float: left;
    }
  </style>
    <div class="fast_table">
      <h2>최근 생긴 과제 목록</h2>

      <table id="newspaper-a">
        <thead>
          <tr>
            <th scope="col" width="25%">교수님</th>
            <th scope="col" width="60%">과제</th>
            <th scope="col">비고</th>
          </tr>
        </thead>
        <tbody>
          <?php

          $tablename = "board";
          $data = mysqli_query($conn, "SELECT *FROM $tablename order by num DESC");
          $num = mysqli_num_rows($data);
          $list = 6; // 목록 개수
          $max_block = 5; // 표시되는 block 수
          $pageNum = ceil($num/$list); // 총 페이지
          $page = ($_GET['page']) ? $_GET['page'] : 1; // 최초 페이지에서는 1값
          $start = ($page-1)*$list; // 시작 넘버
          $count = ceil($page/$max_block);
          $Ncount = $page%$max_block;
          $next;
          $go_page;
          $query = "SELECT *FROM $tablename where id='$class' order by num DESC limit $start, $list";
          if($item==0){
            $query = "SELECT *FROM $tablename order by num DESC limit $start, $list";
          }
          $result = mysqli_query($conn,$query);


          if($i_num==0){
            while($array = mysqli_fetch_array($result)){
              $nquery = "select name from member where id='$array[id]'";
              $nresult = mysqli_query($conn, $nquery);
              $narray = mysqli_fetch_array($nresult);
              if($array[file]==0){
                echo "<tr><td>$narray[name]</td>
                <td><a href='../compiler/make.php?board=$array[num]'>$array[title]</a></td>
                ";?>
                <td></td></tr>
                <?php
              }
              else{
                echo "<tr><td>$narray[name]";?></td>
                  <td><a href='#' onclick="window.open('fileupload.php?board=<?php echo"$array[num]";?>','_blank','width=500 height=300')"><?php echo "$array[title]</a></td>
                  ";?>
                  <td><input type="button" value="목록" onClick="location.href='fileboard_list.php?board=<?php echo $array[num];?>'"/></td></tr>
                  <?php
                }
              }
            }
            else if($i_num==1){
              while($array = mysqli_fetch_array($result)){
                $nquery = "select name from member where id='$array[id]'";
                $nresult = mysqli_query($conn, $nquery);
                $narray = mysqli_fetch_array($nresult);
                if($array[file]==0){
                  echo "<tr><td>$narray[name]</td>
                  <td><a href='submission.php?board=$array[num]'>$array[title]</a></td>
                  ";?>
                  <td></td></tr>
                  <?php
                }
                else{
                  echo "<tr><td>$narray[name]</td>
                  <td><a href='fileboard_list.php?board=$array[num]'>$array[title]</a></td>
                  ";?>
                  <td></td></tr>
                  <?php
                }
              }
            }
            ?>
          </tbody>
        </table>
    </div>
    <div class="fast_table">
      <h2>최근 연습 문제 풀이</h2>

    </div>
</main> <!-- .cd-main-content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
