<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<section>
	<div id="main_img_bar">
        <img src="./img/main_img.png">
    </div>
   	<div id="board_box">
	    <h3>
	    	게시판 > 목록보기
		</h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">글쓴이</span>
					<span class="col4">첨부</span>
					<span class="col5">등록일</span>
					<span class="col6">조회</span>
				</li>
<?php
	if (isset($_GET["page"]))//존재하는 키값에 페이지가 존재하느냐
		$page = $_GET["page"];
	else
		$page = 1;

	$con = mysqli_connect("localhost", "root", "123456789", "sample"); //con에는 주소값이 저장이 된다. 포인터가 저장이 되는데, 어떤 포인터?
  //샘플이라는 디비를 가리키는 포인터가 con에 담기게 된다. 저장장소를 가리키게 된다.
	$sql = "select * from board order by num desc";
	$result = mysqli_query($con, $sql); //위의 쿼리문을 실행한 결과값을 result에 레코드셋으로 저장을 하게된다.
	$total_record = mysqli_num_rows($result); // 전체 글 수 //mysqli_num_rows 함수는 리절트 셋(result set)의 총 레코드 수를 반환합니다.

	$scale = 10; //목록 수 = scale

// 1. 페이지를 정하려면 전체 갯수를 알아야한다. 138
// 2. 목록 수를 결정한다. 10
// 3. 페이지 수가 나온다. 14 (페이지수는 나눠떨어지지 않을 수 있다. => 그때는 1을 더해야 한다. ex. 138/10 + 1)
// 4. 시작할 페이지를 정한다. 1
// 5. 페이지 세팅 넘버 page set number = (시작페이지-1)*목록 수
// 6. 페이지 별로 시작하는 번호 (138-x =138) 138 --- 129개가 나온다

	// 전체 페이지 수($total_page) 계산
	if ($total_record % $scale == 0)
		$total_page = floor($total_record/$scale); //소수점 내림 함수
	else
		$total_page = floor($total_record/$scale) + 1;

	// 표시할 페이지($page)에 따라 $start 계산
	$start = ($page - 1) * $scale;
//page = 14
	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i); //리절트=레코드셋에서 원하는 데이터를 선택
    // mysqli_data_seek 함수는 리절트 셋(result set)에서 원하는 순번의 데이터를 선택하는데 쓰입니다.
    // 보통의 경우 mysqli_data_seek 함수로 원하는 순번을 선택하고 mysqli_fetch_row 로 선택한 데이터를 가져옵니다.
    // 오프셋은 = 필드 오프셋. 0과 총 행 수 사이에 있어야합니다(-1)​

    // [참고사항] mysqli_data_seek 순번
    // mysqli_data_seek 함수의 순번은 0부터 시작하기 때문에 예제 1처럼 3번째 데이터를 원하는 경우 2를 입력하여야 합니다.

      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      //fetch_array는 인덱스와 키값으로 찾을 수 있다.
      //fetch_row는 인덱스로 찾을 수 있다.
      // 하나의 레코드 가져오기
	  $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];
      $hit         = $row["hit"];
      if ($row["file_name"])
      	$file_image = "<img src='./img/file.gif'>";
      else
      	$file_image = " ";
?>
				<li>
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
					<span class="col3"><?=$name?></span>
					<span class="col4"><?=$file_image?></span>
					<span class="col5"><?=$regist_day?></span>
					<span class="col6"><?=$hit?></span>
				</li>
<?php
   	   $number--;
       //number 128
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num">
<?php
	if ($total_page>=2 && $page >= 2) //현재 페이지가 2보다 크고 토탈페이지 2보다 크면 '이전'을 보여준다.
	{
		$new_page = $page-1;
		echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++) //1부터 토탈페이지까지 찍어준다.
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page) //현재 페이지가 마지막 페이지만 아니면 보여준다.
   	{
		$new_page = $page+1;
		echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->
			<ul class="buttons">
				<li><button onclick="location.href='board_list.php'">목록</button></li>
				<li>
<?php
    if($userid) {
?>
					<button onclick="location.href='board_form.php'">글쓰기</button>
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
	}
?>
				</li>
			</ul>
	</div> <!-- board_box -->
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
