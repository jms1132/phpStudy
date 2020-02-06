<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" href="./css/main_slide.css">
<link rel="stylesheet" type="text/css" href="./css/member_form.css">
<link rel="stylesheet" href="./css/header.css">



<script type="text/javascript" src="./js/member_modify.js"></script>
<script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
<script src="./js/vendor/modernizr.custom.min.js"></script>
<script src="./js/vendor/jquery-1.10.2.min.js"></script>
<script src="./js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
<script src="./js/main.js"></script>

</head>
<body>
	<header>
    	<?php include "header.php";?>
    </header>
		<?php
            if (!$userid) {
                echo("<script>
						alert('로그인 후 이용해주세요!');
						history.go(-1);
						</script>
					");
                exit;
            }
        ?>
<?php
    $con = mysqli_connect("localhost", "root", "123456789", "sample");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
    $email = $row["email"];

    $phone = explode("-", $row["phone_number"]);
    $phone1 = $phone[0];
    $phone2 = $phone[1];
    $phone3 = $phone[2];

    mysqli_close($con);
?>
	<section id="member_form_section">

        <div id="main_content">
					<div id="welcome"><h2 id="str_welcome_chage">정보 수정</h2></div>
<div id="join_box">
            <div id="info_write">

          	<form name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
              <table id="table">
                <tr>
                  <td style="font-size:18px;">사용자ID</td>
                  <td class = "input"><?=$userid?></td>
                </tr>
                <tr>
                  <td style="font-size:18px;">비밀번호</td>
                  <td class = "input" ><input type="password" name="pass" value="<?=$pass?>" placeholder="4~12자리의 영문,숫자,특수문자(!,@,$,%,^,&,*)를 각각 포함해야 합니다." style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td style="font-size:18px;">비밀번호 확인</td>
                  <td class = "input" ><input type="password" name="pass_confirm" value="<?=$pass?>" style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td style="font-size:18px;">성명</td>
                  <td class = "input" ><input type="text" name="name" value="<?=$name?>" style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td style="font-size:18px;">E-mail</td>
                  <td class = "input" ><input type="text" name="email" value="<?=$email?>" style="height:25px; font-size:18px;"></td>
                </tr>
                <tr>
                  <td>휴대폰번호</td>
                  <td class = "input" ><input type="number" name="phone1" value="<?=$phone1?>" style="height:25px; font-size:18px; width: 57px;"> -
                    <input type="number" name="phone2" value="<?=$phone2?>"  style="height:25px; font-size:18px; width: 59px;"> -
                    <input type="number" name="phone3" value="<?=$phone3?>"  style="height:25px; font-size:18px; width: 59px;"></td>
                </tr>
              </table>
              <div class="buttons" id="done_div">
			    	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="done()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
          </div>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section>
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
