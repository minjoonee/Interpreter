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

$db_id= $_SESSION['id'];
$num= $_GET['board'];

$i_query = "SELECT instructor FROM info where id='$db_id'";
$i_result = mysqli_query($conn, $i_query);
$i_array = mysqli_fetch_array($i_result);
$i_num=$i_array['instructor'];

if($i_num==0){
  echo "<script>
  location.href='board_list.php';
  </script>";
}
if(!isset($_GET['board'])){
    echo "<script>
    location.href='board_list.php';
    </script>";
}

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
			<li><a href="main.php">홈</a></li>
			<li><a href="../how.php">소개</a></li>
			<li><a class="active" href="board.php">과제</a></li>
			<li><a href="practice_board.php">연습</a></li>
		</ul>
	</nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->
<main class="cd-main-content sub-nav">
	<div class="state">
		<table id="newspaper-a" summary="2007 Major IT Companies' Profit">
				<thead>
					<tr>
							<th scope="col">아이디</th>
								<th scope="col">제목</th>
								<th scope="col">이름</th>
								<th scope="col">날짜</th>
						</tr>
				</thead>
				<tbody>
          <?php
          $tablename = "c_submission";
          $data = mysqli_query($conn, "SELECT *FROM $tablename order by board_num DESC");
          $numR = mysqli_num_rows($data);
          $list = 15; // 목록 개수
          $max_block = 5; // 표시되는 block 수
          $pageNum = ceil($numR/$list); // 총 페이지
          $page = ($_GET['page']) ? $_GET['page'] : 1; // 최초 페이지에서는 1값
          $start = ($page-1)*$list; // 시작 넘버
          $count = ceil($page/$max_block);
          $Ncount = $page%$max_block;
          $next;
          $go_page;

          $query = "SELECT *FROM $tablename where num='$num' order by board_num DESC limit $start, $list";
          $result = mysqli_query($conn,$query);


          while($array = mysqli_fetch_array($result)){
            echo "<tr><td>$array[id]</td>
              <td><a href='article.php?board=$num&board_num=$array[board_num]'>$array[title]</a></td>
              <td>$array[name]</td><td>$array[date]</td>";?></tr>
              <?php
            }
            ?>
				</tbody>
		</table>
    <div style="text-align: center;">
       <?php
          if($numR!=0&&$page>$max_block && $pageNum<=$count*$max_block){
              if($Ncount==1){
                  $next = $page-1;
                  echo"<a href='submission.php?board=$num&page=$next'>[이전]</a>";
              }
              for($next=(($count-1)*$max_block)+1; $next<=$pageNum; $next++){
                  if($page==$next){
                      echo"[$page]";
                  }
                  else{
                      $go_page = $next;
                      echo"<a href='submission.php?board=$num&page=$go_page'>[$go_page]</a>";
                  }
              }
          }
          else if($numR!=0&&$page>$max_block){
              if($Ncount==1){
                  $next = $page-1;
                  echo"<a href='submission.php?board=$num&page=$next'>[이전]</a>";
              }
              for($next=1; $next<=$max_block; $next++){
                  if($page%$max_block==$next){
                      echo"[$page]";
                  }
                  else{
                      if($page<=$pageNum){
                          $go_page = $next+$max_block;
                          echo"<a href='submission.php?board=$num&page=$go_page'>[$go_page]</a>";
                      }
                  }
              }
              if($Ncount==0){
                  $go_page = $page+1;
                  echo "<a href='submission.php?board=$num&page=$go_page'>[다음]</a>";
              }
          }

          else if($numR!=0&&$page<=$max_block){
              for($next=1; $next<=$max_block; $next++){
                  if($next==$page){
                      echo"[$next]";
                  }
                  else{
                      echo "<a href='submission.php?board=$num&page=$next'>[$next]</a>";
                  }
              }
              if($Ncount==0&& $page+1<=$pageNum){
                  $go_page=$page+1;
                  echo "<a href='submission.php?board=$num&page=$go_page'>[다음]</a>";
              }
          }
      ?>
      </div>
	</div>
</main> <!-- .cd-main-content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
