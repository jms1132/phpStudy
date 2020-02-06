<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email  = $_POST["email"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];

    $phone = $phone1."-".$phone2."-".$phone3;

    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    $con = mysqli_connect("localhost", "root", "123456789", "sample");

    $sql = "insert into members(id, pass, name, email, phone_number, regist_day, level, point) ";
    $sql .= "values('$id', '$pass', '$name', '$email', '$phone','$regist_day', 9, 0)";

    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
