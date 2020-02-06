<?php
$id   = $_GET["id"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$email  = $_POST["email"];
$phone1 = $_POST["phone1"];
$phone2 = $_POST["phone2"];
$phone3 = $_POST["phone3"];

    $phone = $phone1."-".$phone2."-".$phone3;

    $con = mysqli_connect("localhost", "root", "123456789", "sample");
    $sql = "update members set pass='$pass', name='$name', email='$email', phone_number='$phone'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
</script>
	  ";
?>
