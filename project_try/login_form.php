<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>정민지의 PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" href="./css/main_slide.css">

    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>
    <script src="./js/main.js"></script>

    <style media="screen">
      #div_login {
        margin-top: 20%;
        margin-left: 40%;
        margin-right: 50%;
        margin-bottom: 20%;
        width: 50%;

      }

      #typing_info {
        float: left;
      }

      #button {
        margin-top: 3px;
        height: 68px;
        width: 100px;
        border: none;
        border-radius: 5px;
        background: red;
        color: white;
        font-weight: bold;
        font-size: 15px;
        margin-left: 5px;

      }

      .typing {
        height: 25px;
        margin: 3px;
        width: 287px;
      }

      span {
        color: red;
      }

      #notice {
        border: 1px solid silver;
        padding: 4px;
        width: 283px;
        font-size: 12.5px;
      }

      #checkbox {
        width: 287px;
        margin-top: 10px;
        margin-left: 3px;
      }

      button {
        font-size: 15px;

      }

      #button_find {
        margin: 3px;
      }

      #signup {
        background: gray;
        border: 2px solid gray;
        color: white;
        margin-left: 0px;
      }
    </style>
  </head>
  <body>
    <header>
        <?php include "header.php";?>
      </header>
      <section>
        <div class="slideshow">
            <div class="slideshow_slides">
              <a href="#"> <img src="./img/mainbnr_01.png" alt="slide1" id="bn_img"> </a>
              <a href="#"> <img src="./img/mainbnr_02.png" alt="slide2" id="bn_img"> </a>
              <a href="#"> <img src="./img/mainbnr_03.png" alt="slide3"> </a>

            </div>
            <div class="slideshow_nav">
              <a href="#" class="prev">prev</a>
              <a href="#" class="next">next</a>
            </div>
            <div class="indicator">
              <!-- <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a> -->
            </div>
          </div>
        <div id="div_login">
                    <div id="typing_info">
            <form name="login_form" action="login.php" method="post">
              <input class="typing" type="text" id="id_input" name="id"> <br>
              <input type="text" class="typing" id="pw_input" name="pass">
          </div>
          <input type="button" height="50px" value="로그인" id="button" onclick="check_input()">
          </form>
          <div id="checkbox">
            <input type="checkbox" value="stay"> 로그인 상태유지 &nbsp <input type="checkbox" value="save"> 아이디 저장
            <p id="notice">개인정보보호를 위해 <span>개인 PC에서 사용해주세요.</span></p>
          </div>
          <div id="button_find">
            <button type="button">아이디 찾기</button>&nbsp<button type="button">비밀번호 찾기</button>
            <a href="./personal_project.html"><button type="button" id="signup">회원가입</button></a>
          </div>
        </div>
      </section>
      <footer>
          <?php include "footer.php";?>
        </footer>
  </body>
</html>
