<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<link rel="stylesheet" href="./css/header.css">
  </head>
  <body>
    <header>
      <?php include "header.php"?>
    </header>
    <section>
      <div id="board_box">
        <h3 class="title">
          게시판 > 내용보기
        </h3>
        <?php
        $num= $_GET["num"];
        $page= $_GET["page"];

    $con = mysqli_connect("localhost", "root", "123456789", "sample");
    $sql = "select * from board where num=$num";
    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

    $id      = $row["id"];
    $name      = $row["name"];
    $regist_day = $row["regist_day"];
    $subject    = $row["subject"];
    $content    = $row["content"];
    $file_name    = $row["file_name"];
    $file_type    = $row["file_type"];
    $file_copied  = $row["file_copied"];
    $hit          = $row["hit"];

//     str_replace(
//      1번째 인수 : 변경대상 문자
//      2번째 인수 : 변경하려는 문자
//      3번째 인수 : 변수, replace가 바꾸고자 하는 문자열(변수수)
// )

$content = str_replace(" ", "&nbsp;", $content);
$content = str_replace("\n", "<br>", $content);

$new_hit = $hit + 1;
$sql = "update board set hit=$new_hit where num=$num";
mysqli_query($con, $sql); //   mysqli_query([연결 객체], [쿼리]);
        ?>
        <ul id="view_content">
          <li>
            <span class = "col1"><b>제목 :</b><?=$subject?></span>
            <span class = "col2"><?=$name?> | <?=$regist_day?></span>
          </li>
          <li>
            <?php
if ($file_name) {
            $real_name = $file_copied;
            $file_path = "./data/".$real_name;
            $upfile_size = filesize($file_path);
            $exist = "exist";
            echo "▷ 첨부파일 : $file_name ($upfile_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
        } else {
            $exist = "not_exist";
            echo "▷ 첨부파일 : $file_name ($upfile_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
        }
            ?>
            <?=$content?>
          </li>
        </ul>
        <ul class="buttons">
          <li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
          <li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>&exist=<?=$exist?>'">수정</button></li>
          <li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
          <li><button onclick="location.href='board_form.php'">글쓰기</button></li>
        </ul>
      </div>
    </section>
    <footer>
      <?php include "footer.php";?>
    </footer>
  </body>
</html>
