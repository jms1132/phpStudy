<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>정민지의 PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/signup_and_modify.css">

<link rel="stylesheet" href="./css/header.css">
    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="./js/login.js"></script>
    <script src="./js/main.js"></script>

    <style media="screen">
      #div_login {
        margin-top: 5%;
        margin-left: 40%;
        margin-right: 50%;
        margin-bottom: 5%;

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
        background: #443e58;
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
        <?php include "./header.php";?>
      </header>
      <section id="member_form_section">
        <div id="main_content">
        <div id="welcome"><h2 id="str_welcome">로그인</h2><p id="str_long_welcome">PHP에 오신것을 환영합니다.</p>

                      <div id="typing_info">
              <form name="login_form" action="login.php" method="post">
                <input class="typing" type="text" id="id_input" name="id"> <br>
                <input type="password" class="typing" id="pw_input" name="pass">
            </div>
            <input type="button" height="50px" value="로그인" id="button" onclick="check_input()">
            </form>


        </div>


      </div>
      </section>
      <footer>
          <?php include "./footer.php";?>
        </footer>
  </body>
</html>
