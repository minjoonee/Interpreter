<?php
# session 연결
 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='index.php';
    </script>";
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js">
<head>
	<meta charset='utf-8'>

	<link href="https://fonts.googleapis.com/css?family=David+Libre|Hind:400,700" rel="stylesheet">

	<link rel="stylesheet" href="board/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="board/css/style.css"> <!-- Resource style -->

	<title>Interpreter</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="author" content="Alvaro Trigo Lopez" />
  <meta name="description" content="fullPage looping demo." />
  <meta name="keywords"  content="fullpage,jquery,looping,loop,loopTop,loopBottom,demo" />
  <meta name="Resource-type" content="Document" />
	<meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" type="text/css" href="use_full/dist/fullpage.css" />
  <link rel="stylesheet" type="text/css" href="use_full/examples.css" />

  <!--[if IE]>
    <script type="text/javascript">
       var console = { log: function() {} };
    </script>
  <![endif]-->

</head>
<body class="align">
		<header class="cd-auto-hide-header">
			<div class="logo">
				<div id="wrap">
					<a href="how.php">
					<div id="app">
						<script type="text/javascript" src="js/logo_main_effect.js"></script>
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
					<li><a href="logout.php">로그아웃</a></li>
					<li><a href="info.php">회원정보</a></li>
				</ul>
			</nav> <!-- .cd-primary-nav -->

			<nav class="cd-secondary-nav">
				<ul>
					<li><a href="board/main.php">홈</a></li>
					<li><a class="active" href="how.php">소개</a></li>
					<li><a href="board/board.php">과제</a></li>
					<li><a href="board/practice_board.php">연습</a></li>
				</ul>
			</nav> <!-- .cd-secondary-nav -->

		</header> <!-- .cd-auto-hide-header -->

		<div class="fullscreen">
		  <div id="fullpage">
		  	<div class="section" id="section0">
		  		<h1>어서오세요!</h1>
		  		<p><img src="img/how1.png" alt="소개 1페이지 사진"/></p><br><br>
          <p>Interpreter에 오신 것을 환영합니다!</p><br><br>
          <p>Interpreter는 코딩 과제를 학습하고 실습할 수 있는 공간입니다.</p>
		  	</div>
		  	<div class="section" id="section1">
		  		<div class="intro">
            <br><br><br><br><br><br><br>
		  			<h1>코딩 과제 학습 가능!</h1>
            <p><img src="img/how2.png" alt="소개 2페이지 사진"/></p>
            <br><br>
		  			<p>코딩 과제를 풀고 교수님 피드백을 받아 보아요.</p><br><br>
            <p>프로젝트 파일도 올릴 수 있어요!</p>
		  		</div>
		  	</div>
		  	<div class="section" id="section2">
		  		<div class="intro">
		  			<h1>연습 까지?! <img class="imot"src="img/how3_1.png" alt="소개 3페이지"/></h1>
		  		</div>
		  	</div>
		  </div>
		</div>

  <script type="text/javascript" src="use_full/dist/fullpage.js"></script>
  <script type="text/javascript" src="use_full/examples.js"></script>
  <script type="text/javascript">
      var myFullpage = new fullpage('#fullpage', {
          sectionsColor: ['#142029', '#142029', '#142029'],
          anchors: ['firstPage', 'secondPage', 'thirdPage'],
          menu: '#menu',
          loopTop: true,
          loopBottom: true
      });
  </script>

</body>
</html>
