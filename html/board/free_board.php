<?php
# session 연결
session_start();
if(!isset($_SESSION['id'])){
  echo "<script>
  location.href='../index.php';
  </script>";
}

$db_id= $_SESSION['id'];
$subject = $_GET['subject'];

$conn=mysqli_connect('127.0.0.1', 'inter', '771029', 'interpreter', '3306');
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
  <link rel="stylesheet" href="../tableDesign/style.css">

  <link rel="stylesheet" href="css/board_list.css">
  <script type="text/javascript"  src="js/jquery-3.1.1.min.js"></script>
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
      <form name="change" action="free_board.php">
        <select id="subject" name="subject" onChange="this.form.submit()">
          <option>--------</option>
          <option>all</option>
          <?php
            while($array = mysqli_fetch_array($result)){
              echo "<option value='$array[subject]'>$array[subject]</option>";
            }
          ?>
        </select>
      </form>
      <div class="state">
        <table id="newspaper-a">
          <thead>
            <tr>
              <th scope="col" width= "20%";>주제</th>
              <th scope="col" width= "50%">제목</th>
              <th scope="col">작성자</th>
              <th scope="col">날짜</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $tablename = "free_board";

            $sql = "SELECT *FROM $tablename order by num DESC";
            $data = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($data);

            $list = 15; // 목록 개수
            $max_block = 5; // 표시되는 block 수
            $pageNum = ceil($num/$list); // 총 페이지
            $page = ($_GET['page']) ? $_GET['page'] : 1; // 최초 페이지에서는 1값
            $start = ($page-1)*$list; // 시작 넘버
            $count = ceil($page/$max_block);
            $Ncount = $page%$max_block;
            $next;
            $go_page;
            $query = "SELECT *FROM $tablename where subject='$subject' order by num DESC limit $start, $list";
            if(is_null($subject) || $subject == 'all'){
              $query = "SELECT *FROM $tablename order by num DESC limit $start, $list";
            }
            $result = mysqli_query($conn,$query);
            while($array = mysqli_fetch_array($result)){
                  echo
                  "<tr>
                  <td>$array[subject]</td>
                  <td><a href='free_board_view.php?board=$array[num]'>$array[title]</a></td>
                  <td>$array[name]</td>
                  <td>$array[date]</td>
                  </tr>";
            }
          ?>
            </tbody>
          </table>
          <div style="text-align: center;">
             <?php
                if($num!=0&&$page>$max_block && $pageNum<=$count*$max_block){
                    if($Ncount==1){
                        $next = $page-1;
                        echo"<a href='free_board.php?page=$next'>[이전]</a>";
                    }
                    for($next=(($count-1)*$max_block)+1; $next<=$pageNum; $next++){
                        if($page==$next){
                            echo"[$page]";
                        }
                        else{
                            $go_page = $next;
                            echo"<a href='free_board.php?page=$go_page'>[$go_page]</a>";
                        }
                    }
                }
                else if($num!=0&&$page>$max_block){
                    if($Ncount==1){
                        $next = $page-1;
                        echo"<a href='free_board.php?page=$next'>[이전]</a>";
                    }
                    for($next=1; $next<=$max_block; $next++){
                        if($page%$max_block==$next){
                            echo"[$page]";
                        }
                        else{
                            if($page<=$pageNum){
                                $go_page = $next+$max_block;
                                echo"<a href='free_board.php?page=$go_page'>[$go_page]</a>";
                            }
                        }
                    }
                    if($Ncount==0){
                        $go_page = $page+1;
                        echo "<a href='free_board.php?page=$go_page'>[다음]</a>";
                    }
                }

                else if($num!=0&&$page<=$max_block){
                    for($next=1; $next<=$max_block; $next++){
                        if($next==$page){
                            echo"[$next]";
                        }
                        else{
                            echo "<a href='free_board.php?page=$next'>[$next]</a>";
                        }
                    }
                    if($Ncount==0&& $page+1<=$pageNum){
                        $go_page=$page+1;
                        echo "<a href='free_board.php?page=$go_page'>[다음]</a>";
                    }
                }
            ?>
            </div>
            <form class="writeButton" action="free_board_write.php" method="post">
              <input type="submit" name="write" value="글쓰기">
            </form>
          </div>
      </main> <!-- .cd-main-content -->


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
      <script>
      if( !window.jQuery ) document.write('<script src="js/jquery-3.0.0.min.js"><\/script>');
      </script>
      <script src="js/main.js"></script> <!-- Resource jQuery -->
    </body>
    </html>
