<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
  <script src="/cobrain/page/member_form.js" charset="utf-8"></script>
  <link rel="stylesheet" href="/cobrain/css/member_form.css">
  <link rel="stylesheet" href="/cobrain/css/index.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="/cobrain/image/favicon.ico"/>
  <body>
    <header>
      <?php include "../header/header.php"; ?>
    </header>
    <main>
      <center>
        <h2>코브레인에 오신 걸 환영합니다</h2>
        <div id="main">
          <form id="form_member" action="./member_insert.php" method="post">
            <div class="formBox">
              <label for="inputId">아이디&nbsp;&nbsp;&nbsp;</label>
              <!-- <input type="button" id="btnIdCk" value="중복확인" onclick="checkId()"> -->
              <input type="text" class="formInput" id="inputId" name="inputId" placeholder="아이디를 입력해주세요" required>
              <p class="subMsg" id="idSubMsg"></p>
            </div>
            <div class="formBox">
              <label for="inputPw1">비밀번호</label>
              <input type="text" class="formInput" id="inputPw1" name="inputPw1" placeholder="비밀번호를 입력해주세요" required>
            </div>
            <div class="formBox">
              <label for="inputPw2">비밀번호 확인</label>
              <input type="text" class="formInput" id="inputPw2" name="inputPw2" placeholder="비밀번호를 확인해주세요" required>
              <p class="subMsg" id="pwSubMsg"></p>
            </div>
            <div class="formBox">
              <label for="inputName">이름</label>
              <input type="text" class="formInput" id="inputName" name="inputName" placeholder="이름을 입력해주세요" required>
              <p class="subMsg" id="nameSubMsg"></p>
            </div>
            <div class="formBox">
              <label for="inputEmail">이메일</label>
              <input type="text" class="formInput" id="inputEmail" name="inputEmail" placeholder="이메일을 입력해주세요" required>
              <p class="subMsg" id="emailSubMsg"></p>
            </div>

            <div id="form_member_bottom">
              <h5>코브레인의 <a href="#">이용약관</a>및 <a href="#">개인정보 취급방침</a>에 동의합니다.</h5>
            </div>
            <input type="button" id="btnFormSubmit" value="회원가입" onclick="document.getElementById('form_member').submit()" disabled>
          </form>
        </div>
      </center>
    </main>
  </body>
</html>
