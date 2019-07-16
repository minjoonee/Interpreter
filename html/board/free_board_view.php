<?php
# session 연결
  session_start();
  if(!isset($_SESSION['id'])){
    echo "<script>
    location.href='../index.php';
    </script>";
  }

  $db_id= $_SESSION['id'];
  $num = $_GET['board'];

  $conn=mysqli_connect('localhost', 'db_id', 'db_pw', 'db_name', '3306');
  if(!$conn){
    echo"connect fail....";
  }
  mysqli_set_charset($conn, 'utf8');
  $db=mysqli_select_db($conn , "interpreter");

  $query = "SELECT * FROM free_board WHERE num ='$num'";
  $result = mysqli_query($conn, $query);
  $array = mysqli_fetch_array($result);

?>

<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=David+Libre|Hind:400,700" rel="stylesheet">

  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
  <link rel="stylesheet" href="css/view.css">
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

      <div class="view_box">
        <?php
        $re_content = str_replace('\n','<br>',$array[content]);
        echo "
        <div class='view_title'>$array[title]</div>
        <div class='view_info'><strong>$array[name]</strong><span>$array[date]</span></div>
        <div class='view_content'>$re_content</div>
        ";
      ?>
      <script type="text/javascript">

        window.onload = function(){
          getComment();
        }

        function getComment(){
            $.ajax({
              url: "free_board_reply.php?board=<?php echo $num; ?>",
              type:"POST",
              cache: false,
              success: function(data){
                $('.view_reply').append(data);
              }
            });
        }

  			function getCommentList2(){
  				$.ajax({
  					url: "free_plus_reply.php?board=<?php echo $num; ?>",
  					type: "POST",
  					cache: false,
  					success: function(data){
  						$('.view_reply').prepend(data);
  					}
  				});
  			}
  			function comment(){
  					var dat = $("#form_set").serialize();
  			    $.ajax({
  		        type:'POST',
  		        url : "free_data_reply.php?board=<?php echo $num; ?>",
  		        data: dat,
  		        success : function(data){
  		            if(data=="success")
  		            {
  									alert('success');
  									$('.reply').val('');
  									getCommentList2();
  		            }
  		        },
  		        error:function(request,status,error){
  		    		}
  			    });
  			}
      </script>
        <div class="reply_box">
          <form name = "form_set" id="form_set">
            <textarea style="resize:none;" name="reply" class="reply" placeholer="댓글을 남겨주세요." autofocus required></textarea>
            <input type="button" value="작성하기" class="reply_btn" onClick="comment();">
          </form>
        </div>
        <div class="view_reply">
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
