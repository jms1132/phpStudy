<?php
function create_table($conn, $table_name)
{
    $flag="NO";
    $sql = "show tables from sample";
    $result=mysqli_query($conn, $sql) or die('Error: '.mysqli_error($conn));

    while ($row=mysqli_fetch_row($result)) {
        if ($row[0] === "$table_name") {
            $flag="OK";
            break;
        }
    }//end of while

    if ($flag==="NO") {
        switch ($table_name) {
              case 'qna':
            $sql = "CREATE TABLE `qna` (
            `num` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `group_num` int UNSIGNED NOT NULL,
            `depth` int UNSIGNED NOT NULL,
            `ord` int UNSIGNED NOT NULL,
            `id` char(15) NOT NULL,
            `name` char(10) NOT NULL,
            `subject` varchar(100) NOT NULL,
            `content` text NOT NULL,
            `regist_day` char(20) DEFAULT NULL,
            `hit` TINYINT UNSIGNED  DEFAULT 0,
            PRIMARY KEY (`num`)
            )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;

      default:
      echo "<script>alert('해당 테이블이름이 없습니다. ');</script>";
      break;
    }//end of switch

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('$table_name 테이블이 생성되었습니다.');</script>";
        } else {
            echo "실패원인".mysqli_error($conn);
        }

        if (!empty($sql_insert)) {
            if (mysqli_query($conn, $sql_insert)) {
                echo "<script>alert('survey 초기값 설정이 되었습니다.');</script>";
            } else {
                echo "실패원인".mysqli_error($conn);
            }
        }
    }//end of if flag
}//end of function
