<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/login_form_css.css">
    <link rel="stylesheet" href="css/login_effect_css.css">
    <link rel="stylesheet" href="css/signup.css">

    <title>데이터베이스 프로젝트</title>
  </head>
  <body class="align">
    <div class="top">
      <div id="wrap">
        <div id="app"></div>
      </div>
      <script type="text/javascript" src="js/logo_effect.js"></script>
    </div>


    <div class="align">
      <div id="stylized" class="myform">
        <form action="signupChk.php" id="form" name="form" method="post">
          <h1>회원가입</h1>
          <p>양식에 맞춰서 작성해주세요.</p>


          <label>ID
            <span class="small">아이디</span>
          </label>
          <input type="text" name="id" id="id" />

          <label>Password
            <span class="small">패스워드 6자 이상</span>
          </label>
          <input type="password" name="password" id="password" />

          <label>Name
            <span class="small">이름</span>
          </label>
          <input type="text" name="name" id="name" />

          <label>Student Number
            <span class="small">학번</span>
          </label>
          <input type="text" name="sNum" id="sNum" />

          <button type="submit">가입</button>
          <div class="spacer"></div>

        </form>
      </div>
    </div>


  </body>
</html>
