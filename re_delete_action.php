<?php

    $host = 'localhost';
    $uname = 'jeanne8426';
    $upw = 'libse218!';
    $dbname = 'jeanne8426';

    $con = mysqli_connect($host, $uname, $upw, $dbname);
    $sql = "select * from users where user_id";
    $result = mysqli_query($con, $sql);

    session_start();

    // 로그인을 해야만 볼 수 있게 하는 코드
    if(!isset($_SESSION['userid']) || !isset($_SESSION['username']) || !isset($_SESSION['usermajor'])) {
      echo "<meta http-equiv='refresh' content='0;url=index.php'>";
      exit;
    } else {
        $userid = $_SESSION["userid"];
        $username = $_SESSION["username"];
        $usermajor = $_SESSION["usermajor"];

        // 그룹 스터디룸 예약 여부 확인
        $sql = "select user_id, grre_date, grre_stime, grre_id from grreservation where user_id = $userid order by grre_date desc";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        if(isset($row["user_id"])) {
            $guid = $row["user_id"];
            $grreid = $row["grre_id"];
            $grredate = $row["grre_date"];
            $grrestime = $row["grre_stime"];
        } else {
            $grreid = '';
            $guid = '';
            $grredate = '';
            $grrestime = '';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Room Group Delete</title>
    </head>
    <body>
        <?php
            //mysql 커넥션 객체 생성
            $conn = mysqli_connect($host, $uname, $upw, $dbname);
            $grname = $_POST["grname"];
            $grredate = $_POST["grredate"];
            $grrestime = $_POST["grrestime"];

            // 조건에 해당하는 예약 삭제
            $sql = "DELETE FROM grreservation WHERE user_id=".$userid." AND grre_date='".$grredate."' AND grre_stime='".$grrestime."' and gr_name = '".$grname."' order by grre_date desc";
            $result = mysqli_query($conn, $sql);
            
            //쿼리 실행 여부 확인
            if($result) {
                $result;
            } else {
                echo mysqli_error($conn);
            }

            mysqli_close($conn);
            //헤더함수를 이용하여 나의 좌석 페이지로 리다이렉션
            header("Location: http://libse.co.kr/my_seat.php");
        ?>
    </body>
</html>
