<?php
# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='../index.php';
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
		<ul class="list-row">
			<a href="board_list.php?item=1">
				<li class="col-item-left">
					<div class="card-block">
						<div class="card-title">
							장재우 교수님
								<span class="css-arrow"></span>
						</div>
						<div class="card-text">
							연구분야 : 데이터베이스<br>
							담당과목 : 데이터베이스, 파일구조 등<br>
							연구실 : 데이터베이스연구실(7401호)<br>
							이메일 : jwchang@jbnu.ac.kr<br>
						</div>
					</div>
				</li>
			</a>
			<a href="#">
					<li class="col-item-right">
					<div class="card-block">
						<div class="card-title">
							조희승 교수님
						</div>
						<div class="card-text">

						</div>
					</div>
				</li>
			</a>
			<a href="#">
				<li class="col-item-left">
					<div class="card-block">
						<div class="card-title">
							안계현 교수님
						</div>
					</div>
				</li>
			</a>
			<a href="#">
					<li class="col-item-right">
					<div class="card-block">
							<div class="card-title">
								곽영태 교수님
							</div>
					</div>
				</li>
			</a>
		</ul>
	</div>
</main> <!-- .cd-main-content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
