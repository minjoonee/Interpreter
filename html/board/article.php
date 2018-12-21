<?php
# session 연결
session_start();
if(!isset($_SESSION['id'])){
  echo "<script>
  location.href='../index.php';
  </script>";
}

$conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
if(!$conn){
  echo"connect fail....";
}
mysqli_set_charset($conn, 'utf8');
$db=mysqli_select_db($conn , "interpreter");

$db_id= $_SESSION['id'];
$num= $_GET['board_num'];
$board=$_GET['board'];

$tablename = "c_submission";
$query = "SELECT * FROM $tablename where board_num='$num'";
$result = mysqli_query($conn,$query);
$fileArr = mysqli_fetch_array($result);

$nquery = "select name, student from member where id='$fileArr[id]'";
$nresult = mysqli_query($conn, $nquery);
$narray = mysqli_fetch_array($nresult);
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
  <link rel="stylesheet" href="css/article.css">
  <link rel="stylesheet" href="../tableDesign/style.css">
  <link rel="stylesheet" href="../compiler/lib/codemirror.css"/>
  <link rel="stylesheet" href="../compiler/theme/darcula.css"/>

  <script src="../compiler/lib/codemirror.js"></script>
  <script src="../compiler/addon/edit/matchbrackets.js"></script>
  <script src="../compiler/mode/clike/clike.js"></script>
  <style>
  .CodeMirror {
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    line-height: 1.3;
    height: 100%;
    width: 100%;
  }
  .CodeMirror-linenumbers { padding: 0 8px; }
  </style>

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
        <div class="name">
          <?php
          echo "이름 : $narray[name]<br>학번 : $narray[student]<br>제출 날짜 : $fileArr[date]";
          ?>
        </div>
        <article>
          <div><textarea id="code">
            <?php
            $catfile = "cat ../compiler/"."$fileArr[codepwd]"; // 여기에 디비에서 가져온 값이 들어감.
            exec($catfile, $content);
            for($i=0; $i<sizeof($content); $i++){
              echo "$content[$i]\n";
            }
            ?>
          </textarea></div>
          <script>
          var cEditor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            matchBrackets: true,
            readOnly:'nocursor',
            mode: "text/x-csrc",
            theme: "darcula"

          });

          var mac = CodeMirror.keyMap.default == CodeMirror.keyMap.macDefault;
          CodeMirror.keyMap.default[(mac ? "Cmd" : "Ctrl") + "-Space"] = "autocomplete";
          </script>
        </article>
        <div class="feedback">
          교수님 피드백을 남겨주세요. <br><br>
          <form action="article_feedback.php?board=<?php echo $board;?>&board_num=<?php echo $num;?>" method="post">
            <input type="text" class="feedbackBox" name="name" placeholder="<?php echo $fileArr[feedback]; ?>" >
            <input type="submit" name="" value="제출" >
          </form>
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
