<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<link rel="stylesheet" href="./css/main_slide.css">

<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
<script src="./js/vendor/modernizr.custom.min.js"></script>
<script src="./js/vendor/jquery-1.10.2.min.js"></script>
<script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
<script src="./js/main.js"></script>
<script>
  function check_input() {
      if (!document.message_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.message_form.subject.focus();
          return;
      }
      if (!document.message_form.content.value)
      {
          alert("내용을 입력하세요!");
          document.message_form.content.focus();
          return;
      }
      document.message_form.submit();
   }
</script>
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
   	<div id="message_box">
	    <h3 id="write_title">
	    		답변 쪽지 보내기
		</h3>
<?php
	$num  = $_GET["num"];

	$con = mysqli_connect("localhost", "root", "123456789", "sample");
	$sql = "select * from message where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$send_id      = $row["send_id"];
	$rv_id      = $row["rv_id"];
	$subject    = $row["subject"];
	$content    = $row["content"];

	$subject = "RE: ".$subject;

	$content = "> ".$content;
	$content = str_replace("\n", "\n>", $content);
	$content = "\n\n\n-----------------------------------------------\n".$content;

	$result2 = mysqli_query($con, "select name from members where id='$send_id'");
	$record = mysqli_fetch_array($result2);
	$send_name    = $record["name"];
?>
	    <form  name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>">
	    	<input type="hidden" name="rv_id" value="<?=$send_id?>">
	    	<div id="write_msg">
	    	    <ul>
				<li>
					<span class="col1">보내는 사람 : </span>
					<span class="col2"><?=$userid?></span>
				</li>
				<li>
					<span class="col1">수신 아이디 : </span>
					<span class="col2"><?=$send_name?>(<?=$send_id?>)</span>
				</li>
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>
	    		<li id="text_area">
	    			<span class="col1">글 내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?=$content?></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	    <button type="button" onclick="check_input()">보내기</button>
	    	</div>
	    </form>
	</div> <!-- message_box -->
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
