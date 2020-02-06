<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>정민지의 PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/member_form.css">
    <link rel="stylesheet" href="./css/main_slide.css">

    <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script src="./js/vendor/modernizr.custom.min.js"></script>
    <script src="./js/vendor/jquery-1.10.2.min.js"></script>
    <script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/signup.js"></script>
<script src="./js/member_form.js" charset="utf-8"></script>

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
        <div id="main_content">
          <div id="join_box">
            <h2 id="h2">회원가입</h2>
            <div id="info_write">
              <div id="privacy">
                <p>고객님의 정보는 개인정보보호정책에 의해 철저하게 보호됩니다.</p>
              </div>
              <div id="table_div">

            <form name="member_form" action="member_insert.php" method="post">
              <table id="table">
                <tr>
                  <td style="font-size:18px;">사용자ID</td>
                  <td class = "input" ><input type="text" name="id" id="inputId" style="height:25px; font-size:18px;">&nbsp
                    <button type="button" onclick="check_id()" style="height:29px; padding:3px;">CHECK</button><p name = "idSubMsg" id="idSubMsg">안내</p></td>

                </tr>
                <tr>
                  <td style="font-size:18px;">비밀번호</td>
                  <td class = "input" ><input type="password" name="pass" placeholder="4~12자리의 영문,숫자,특수문자(!,@,$,%,^,&,*)를 각각 포함해야 합니다." style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td style="font-size:18px;">비밀번호 확인</td>
                  <td class = "input" ><input type="password"name="pass_confirm"style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td style="font-size:18px;">성명</td>
                  <td class = "input" ><input type="text" name="name" style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td style="font-size:18px;">E-mail</td>
                  <td class = "input" ><input type="text" name="email" style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td>휴대폰번호</td>
                  <td class = "input" ><input type="number" name="phone1" style="height:25px; font-size:18px; width: 57px;"> -
                    <input type="number" name="phone2" style="height:25px; font-size:18px; width: 59px;"> -
                    <input type="number" name="phone3" style="height:25px; font-size:18px; width: 59px;"></td>
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
