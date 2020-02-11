        <div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
            <div id="latest">
                <h4>최근 게시글(15장)</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "root", "123456789", "sample");
    $sql = "select * from board order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result) //레코드셋의 타입은 객체
    //전체 레코드셋에 대한 정보가 들어가있다.  라인수 필드수 위치값.
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )//첫번째 위치에 있는 그 값을 배열로 바꿔주는 것이다.
        //필드명으로도, 인덱스로도 접근할 수 있다. 함수를 한번만 부르면 그 다음 포인터 위치는 그 다음 레코드 위치로 가있다.
        {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </div>
            <div id="point_rank">
                <h4>포인트 랭킹(15장)</h4>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $rank = 1;
    $sql = "select * from members order by point desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {//찍을때 반드시 지켜야할 원칙
          //1. 사용자가 입력한 값을 믿지 말아라(db와 충돌 날 수 있기 때문에, 인젝션을 방어해야한다. mysqli_realEscapeString을 이용해서 방어한다.)
          //excaping = db로부터 사용자에게 보여줘야 할때.사용자가 입력한 값을 출력할때, 방어해야한다.
          //filtering=인젝션 하는 기능들을 filtering 해야한다.사용자가 입력한 값을 검토해야 할때.
          //2. 주소를 방어해야 한다. 상대주소, 절대주소! 달러 서버로 해서 다큐먼트루트로 해서 경로명을 설정한다.
          //3. session_start 문제해결을 위해 맨 처음에 적어라. 그 앞에 아무 문장도 적지 말아라.


          // @session_start();
          // // session_start()에서 오류가 나올때 꼭 알아두어야 할내용
          // // - session_start(); 전에 출력문이 있으면 안된다.
          // // - @session_start(); 이문장은 경고가 나오면 경고문을 보이지말라는 의미지 해결은 아님
          // // - 그래도 안된다면 세션변수가 저장되는 폴더 권한을 777로 주었는지 확인해보자.
          // // - 그래도 안된다면 php.ini 에서 default-charset utf-8 로 설정해보라.


        //$_POST[]는 배열이다.
            $name  = $row["name"];
            $id    = $row["id"];
            $point = $row["point"];
            $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1);
?>
                <li>
                    <span><?=$rank?></span>
                    <span><?=$name?></span>
                    <span><?=$id?></span>
                    <span><?=$point?></span>
                </li>
<?php
            $rank++;
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
        </div>
