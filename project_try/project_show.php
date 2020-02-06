<?php
$id = $_POST["id"];
$password = $_POST["password1"];
$name = $_POST["name"];
$email = $_POST["email"];


echo "<script type=\"text/javascript\">
  alert(\"아이디는 {$id} 이고 비밀번호는 {$password} 이름은 {$name}, 메일은 {$email}\")
</script>";

 ?>
