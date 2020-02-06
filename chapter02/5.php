
<style>
table {border-collapse:collapse; border: solid 1px gray;}
th { border: solid 1px gray; text-align: center; padding:5px; }
td { border: solid 1px gray; text-align: center; padding:5px; }
</style>

<?php
$name = "정민지";
$phone = "010-3914-6562";
$address = "서울시 송파구 송파대로567 주공아파트 510동 505호";
$mail = "jms1132@naver.com";

echo"<table>";

echo "<tr align = center>";
echo "<th>이름</th>";
echo "<th>휴대폰 번호</th>";
echo "<th>주소</th>";
echo "<th>이메일</th>";
echo "</tr>";

echo "<tr align = center>";
echo "<td>$name</th>";
echo "<td>$phone</th>";
echo "<td>$address</th>";
echo "<td>$mail</th>";
echo "</tr>";
 ?>
