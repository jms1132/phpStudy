<?php
@session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    $userid = "";
}
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    $username = "";
}
if (isset($_SESSION["userlevel"])) {
    $userlevel = $_SESSION["userlevel"];
} else {
    $userlevel = "";
}
if (isset($_SESSION["userpoint"])) {
    $userpoint = $_SESSION["userpoint"];
} else {
    $userpoint="";
}

$conn = mysqli_connect("localhost", "root", "123456789", "sample"); //con에는 주소값이 저장이 된다. 포인터가 저장이 되는데, 어떤 포인터?

$dbconn = mysqli_select_db($conn,"sample") or die('Error: '.mysqli_error($conn));
//use ansisung 과 같다.

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<meta charset="utf-8">
<?php
//*****************************************************
$content= $q_content = $sql= $result = $username="";
$group_num = 0;
//*****************************************************
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

// 삽입하는경우
if (isset($_GET["mode"])&&$_GET["mode"]=="insert") {
    $content = trim($_POST["content"]);
    $subject = trim($_POST["subject"]);
    if (empty($content)||empty($subject)) {
        echo "<script>alert('내용이나제목입력요망!');history.go(-1);</script>";
        exit;
    }
    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $userid = test_input($userid);
    $hit = 0;
    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_userid = mysqli_real_escape_string($conn, $userid);
    $regist_day=date("Y-m-d (H:i)");

    //그룹번호, 들여쓰기 기본값
    $group_num = 0;
    $depth=0;
    $ord=0;

    // ==========================================================================================================
    // 세 필드가 있다. a,b,c. 답변글 없이 기본적으로 입력할때는 a은 해당된 넘버값, 나머지 두개는 0의 값을 갖는다.
    // 그 글을 누르고 답변을 달았을 때, a는 원글의 그룹넘버값을 가져오고 b는 1추가해서 자기자신에게 저장한다.
    // c는 c
    // ==========================================================================================================

    $sql="INSERT INTO `qna` VALUES (null,$group_num,$depth,$ord,'$q_userid','$username','$q_subject','$q_content','$regist_day',0);";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    //현재 최대큰번호를 가져와서 그룹번호로 저장하기
    $sql="SELECT max(num) from qna;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $max_num=$row['max(num)'];
    $sql="UPDATE `qna` SET `group_num`= $max_num WHERE `num`=$max_num;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    mysqli_close($conn);

    // echo "<script>location.href='./qna_view.php?num=$max_num&hit=$hit';</script>";
    echo "<script>location.href='./qna_list.php';</script>";
} elseif (isset($_GET["mode"])&&$_GET["mode"]=="delete") {
    $num = test_input($_GET["num"]);
    $q_num = mysqli_real_escape_string($conn, $num);

    $sql ="DELETE FROM `qna` WHERE num=$q_num";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    mysqli_close($conn);
    echo "<script>location.href='./qna_list.php?page=1';</script>";
} elseif (isset($_GET["mode"])&&$_GET["mode"]=="update") {
    $content = trim($_POST["content"]);
    $subject = trim($_POST["subject"]);
    if (empty($content)||empty($subject)) {
        echo "<script>alert('내용이나제목입력요망!');history.go(-1);</script>";
        exit;
    }
    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $userid = test_input($userid);
    $num = test_input($_POST["num"]);
    $hit = test_input($_POST["hit"]);
    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_userid = mysqli_real_escape_string($conn, $userid);
    $q_num = mysqli_real_escape_string($conn, $num);
    $regist_day=date("Y-m-d (H:i)");

    $sql="UPDATE `qna` SET `subject`='$q_subject',`content`='$q_content',`regist_day`='$regist_day' WHERE `num`=$q_num;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    echo "<script>location.href='./qna_view.php?num=$num&hit=$hit';</script>";




} elseif (isset($_GET["mode"])&&$_GET["mode"]=="response") {
    $content = trim($_POST["content"]);
    $subject = trim($_POST["subject"]);
    if (empty($content)||empty($subject)) {
        echo "<script>alert('내용이나제목입력요망!');history.go(-1);</script>";
        exit;
    }
    $subject = test_input($_POST["subject"]);
    $content = test_input($_POST["content"]);
    $userid = test_input($userid);
    $num = test_input($_POST["num"]);
    // $hit = test_input($_POST["hit"]);
    $hit =0;
    $q_subject = mysqli_real_escape_string($conn, $subject);
    $q_content = mysqli_real_escape_string($conn, $content);
    $q_userid = mysqli_real_escape_string($conn, $userid);
    $q_num = mysqli_real_escape_string($conn, $num);
    $regist_day=date("Y-m-d (H:i)");

    $sql="SELECT * from qna where num =$q_num;"; //부모넘버
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);

    //현재 그룹넘버값을 가져와서 저장한다.
    $group_num=(int)$row['group_num'];
    //현재 들여쓰기값을 가져와서 증가한후 저장한다.
    $depth=(int)$row['depth'] + 1;
    //현재 순서값을 가져와서 증가한후 저장한다.
    $ord=(int)$row['ord'] + 1;

    //현재 그룹넘버가 같은 모든 레코드를 찾아서 현재 $ord값보다 같거나 큰 레코드에 $ord 값을 1을 증가시켜 저장한다.
    //새로 저장한 그 글의 ord 값은 일단 부모글의 ord값에 1을 더해서 저장하는데, 그 저장한 값보다 같거나 큰 값에는 다 1을 더해서 저장을 한다.
    $sql="UPDATE `qna` SET `ord`=`ord`+1 WHERE `group_num` = $group_num and `ord` >= $ord";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    $sql="INSERT INTO `qna` VALUES (null,$group_num,$depth,$ord,
    '$q_userid','$username','$q_subject','$q_content','$regist_day',$hit);";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }

    $sql="SELECT max(num) from qna;";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $max_num=$row['max(num)'];

    echo "<script>location.href='./qna_view.php?num=$max_num&hit=$hit';</script>";
}//end of if insert
// Header("Location: p260_score_list.php");
?>
