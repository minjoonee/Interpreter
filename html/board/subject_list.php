<?php
# session 연결
  session_start();
  if(!isset($_SESSION['id'])){
    echo "<script>
    location.href='../index.php';
    </script>";
  }

  $id= $_SESSION['id'];
  $subject = $_GET['subject'];

  $conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
  if(!$conn){
    echo"connect fail....";
  }
  mysqli_set_charset($conn, 'utf8');
  $db=mysqli_select_db($conn , "interpreter");

  $query = "SELECT * FROM practice WHERE subject='$subject'";
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
	<link rel="stylesheet" href="css/item0.css?ver">
  <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
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
  <div class="page_intro">
    <div class="page_name">
      <h1 style="font-size:25px;"><?php echo $subject; ?></h1></br>
      <?php echo $subject; ?>와 관련된 문제가 출제됩니다!
    </div>
    <a href='free_board.php?subject=<?php echo $subject;?>'>
      <div class='col-item'>
        <div class='card-block'>
          <div class='card-title'>
            게시판으로
              <span class='css-arrow'></span>
          </div>
        </div>
      </div>
    </a>
  </div>
	<div class="state">
		<ul class="list-row">
      <?php
        if(is_null($array = mysqli_fetch_array($result))){
          echo
          "<a href='practice_board.php'>
            <li class='col-item-right'>
              <div class='card-block'>
                <div class='card-title'>
                  ERROR - 요청한 페이지가 없습니다.
                    <span class='css-arrow'></span>
                </div>
              </div>
            </li>
          </a>";
        }
        else{
          echo
          "<a href='../compiler/practice_make.php?board=$array[board_num]'>
            <li class='col-item-right'>
              <div class='card-block'>
                <div class='card-title'>
                  $array[title]
                    <span class='css-arrow'></span>
                </div>
                <div class='card-text'>- 난이도 : $array[difficulty]
                </div>
              </div>
            </li>
          </a>";
        }
        while($array = mysqli_fetch_array($result)){
          echo
          "<a href='../compiler/practice_make.php?board=$array[board_num]'>
            <li class='col-item-right'>
              <div class='card-block'>
                <div class='card-title'>
                  $array[title]
                    <span class='css-arrow'></span>
                </div>
                <div class='card-text'>- 난이도 : $array[difficulty]
                </div>
              </div>
            </li>
          </a>";
        }

        mysqli_close($conn);
      ?>
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
