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
    <script src="./js/signup.js"></script>
    <script src="./js/member_form.js" charset="utf-8"></script>

  </head>
  <body>
    <header>
        <?php include "./header.php";?>
      </header>
      <section id="member_form_section">

        <div id="main_content">
          <div id="welcome"><h2 id="str_welcome">회원가입</h2><p id="str_long_welcome">PHP에 오신것을 환영합니다.</p></div>
          <div id="join_box">

            <div id="info_write">

              <div id="table_div">
            <form name="member_form" action="./member_insert.php" method="post">
              <table id="table">
                <tr>
                  <td style="font-size:15px;" class="table_item">사용자ID<p>&nbsp;</p></td>
                  <td class = "input" ><input type="text" name="id" id="inputId" style="height:25px; font-size:15px;">&nbsp
                    <button type="button" onclick="check_id()" id="idcheck_btn"> V </button>
                    <p name = "idSubMsg" id="idSubMsg" class="idSubMsg">&nbsp;</p></td>
                </tr>
                <tr>
                  <td style="font-size:15px;" class="table_item">비밀번호<p>&nbsp;<br>&nbsp;</p></td>
                  <td class = "input" ><input type="password" name="pass" id="pass" style="height:25px; font-size:15px;">
                  <p class="idSubMsg">4자 이상 12자 이하로 입력해주세요.<br>영문,숫자,특수문자를 1자 이상 포함해야 합니다.</p></td>
                </tr>
                <tr>
                  <td style="font-size:15px;" class="table_item">비밀번호 확인<p>&nbsp;</p></td>
                  <td class = "input" ><input type="password" id="pass_confirm" name="pass_confirm"style="height:25px; font-size:15px;">
                    <p class="idSubMsg" id="pass_msg">&nbsp;</p></td>
                </tr>
                <tr>
                  <td style="font-size:15px;" class="table_item">성명<p>&nbsp;</p></td>
                  <td class = "input" ><input type="text" name="name" style="height:25px; font-size:15px;"><p class="idSubMsg" id="pass_msg">&nbsp;</p></td>
                </tr>
                <tr>
                  <td style="font-size:15px;" class="table_item">E-mail<p>&nbsp;</p></td>
                  <td class = "input" ><input type="text" name="email" style="height:25px; font-size:15px;"><p class="idSubMsg" id="pass_msg">&nbsp;</p></td>
                </tr>
                <tr>
                  <td style="font-size:15px;" class="table_item">휴대폰번호<p>&nbsp;</p></td>
                  <td class = "input" ><input type="number" name="phone1" style="height:25px; font-size:15px; width: 57px;"> -
                    <input type="number" name="phone2" style="height:25px; font-size:15px; width: 59px;"> -
                    <input type="number" name="phone3" style="height:25px; font-size:15px; width: 59px;"><p class="idSubMsg" id="pass_msg">&nbsp;</p></td>
                </tr>
              </table>
              <div class="buttons" id="done_div">
                <img style="cursor:pointer" src="./img/button_save.gif" onclick="done()">&nbsp;
                  <img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                    onclick="reset_form()">
              </div>
            </form>

          </div>
        </div>
        </div>
      </div>
      </section>
      <footer>
          <?php include "footer.php";?>
        </footer>
  </body>
</html>
