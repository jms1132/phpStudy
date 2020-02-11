<?php
    session_start(); //세션값을 조회한다.
    //세션값으로 유저레벨이 세팅이 되어 있으면, 그 값을 받아온다.
    if (isset($_SESSION["userlevel"])) {
        $userlevel = $_SESSION["userlevel"];
    } else {
        $userlevel = "";
    }

    if ($userlevel != 1) {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $num   = $_GET["num"];
    $level = $_POST["level"];
    $point = $_POST["point"];

    $con = mysqli_connect("localhost", "root", "123456789", "sample");
    $sql = "update sourcemembers set level=$level, point=$point where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    header('Location: admin.php');

    // echo "
    //      <script>
    //          location.href = 'admin.php';
    //      </script>
    //    ";
