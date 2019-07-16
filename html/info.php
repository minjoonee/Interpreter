<?php

 session_start();
    if(!isset($_SESSION['id'])){
      echo "<script>
      location.href='index.php';
    </script>";
    }
$conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
$db=mysqli_select_db($conn , "interpreter");
$user_id = $_SESSION['id'];

$query = "select *from info where id = '$user_id'";
$result = mysqli_query($conn, $query);
$array = mysqli_fetch_array($result);
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://fonts.googleapis.com/css?family=David+Libre|Hind:400,700" rel="stylesheet">

	<link rel="stylesheet" href="board/css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="board/css/style.css"> <!-- Resource style -->
	<link rel="stylesheet" href="board/css/item.css">
	<link rel="stylesheet" href="tableDesign/style.css">
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
      <li><a href="logout.php">로그아웃</a></li>
      <li><a href="info.php">회원정보</a></li>
		</ul>
	</nav> <!-- .cd-primary-nav -->

	<nav class="cd-secondary-nav">
		<ul>
			<li><a href="main.php">홈</a></li>
			<li><a href="how.php">소개</a></li>
			<li><a href="board/board.php">과제</a></li>
			<li><a href="#0">연습</a></li>
		</ul>
	</nav> <!-- .cd-secondary-nav -->
</header> <!-- .cd-auto-hide-header -->
<main class="cd-main-content sub-nav">
	<div class="state">
		<table id="newspaper-a" summary="2007 Major IT Companies' Profit">
				<tbody>
          <tr>
            <td>ID</td>
            <td><?php echo $array['id']; ?></td>
          </tr>
          <tr>
            <tr>
              <td>Name</td>
              <td><?php echo $array['name']; ?></td>
            </tr>
            <tr>
              <td>학번</td>
              <td><?php echo $array['student']; ?></td>
            </tr>
            <tr>
              <td>신분</td>
              <td><?php if($array['instructor']==0){echo "학생";} else{echo "교수";}?></td>
            </tr>
          </tbody>
        </table>
	</div>
</main> <!-- .cd-main-content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
	if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
</script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>
