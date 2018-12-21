<?php
# session 연결
 session_start();
    if(isset($_SESSION['id'])){
      echo "<script>
      location.href='how.php';
    </script>";
    }

?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login_form_css.css">
    <link rel="stylesheet" href="css/login_effect_css.css">

    <title>데이터베이스 프로젝트</title>
  </head>
  <body class="align">
    <div class="top">
      <div id="wrap">
        <div id="app"></div>
      </div>
      <script type="text/javascript" src="js/logo_effect.js"></script>
    </div>


    <div class="site__container">
      <div class="grid__container">
        <form action="login.php" method="post" class="form form--login">
          <div class="form__field">
            <label class="fontawesome-user" for="login__username"><span class="hidden">Username</span></label>
            <input id="login__username" type="text" class="form__input" name="id" placeholder="Username" required>
          </div>
          <div class="form__field">
            <label class="fontawesome-lock" for="login__password"><span class="hidden">Password</span></label>
            <input id="login__password" type="password" class="form__input" name="pw" placeholder="Password" required>
          </div>
          <div class="form__field">
            <input type="submit" value="Log In">
          </div>
        </form>
        <p class="text--center">회원이 아니신가요? <span class="fontawesome-arrow-right"></span><a href="signup.php"> 회원가입</a> </p>
      </div>
    </div>

  </body>
</html>
