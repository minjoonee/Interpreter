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
	<link rel="stylesheet" href="css/instructor_write.css">

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
			<li><a href="board.php">과제</a></li>
			<li><a class="active" href="practice_board.php">연습</a></li>
		</ul>
	</nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->
<main class="cd-main-content sub-nav">
	<div class="state">
    <form class="" action="free_board_writeChk.php" method="post">
      <select id="subject" name="subject">
        <?php
          while($array = mysqli_fetch_array($result)){
            echo "<option value='$array[subject]'>$array[subject]</option>";
          }
        ?>
      </select>
      <div id="state-title">
        과제 제목을 입력해주세요.
      </div>
      <input id="state-input-title" type="text" name="title"/>
      <div id="state-content">
        내용을 입력해주세요.
      </div>
      <textarea id="state-input-content" onkeydown="resize(this)" onkeyup="resize(this)" name="content"></textarea>
        <input type="submit" class="btn-outline-primary" name="problem" value="작성하기">
    </form>
  </div>
</main> <!-- .cd-main-content -->

<script>
function resize(obj) {
  obj.style.height = "1px";
  obj.style.height = (12+obj.scrollHeight)+"px";
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
