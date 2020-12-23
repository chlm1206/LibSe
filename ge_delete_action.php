<?php
    header('Content-Type: text/html; charset=UTF-8');
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

        // 일반열람실 예약 여부확인
        $sql = "select user_id, gere_date, gere_stime, gere_id from gereservation where user_id = $userid order by gere_date desc";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        if(isset($row["user_id"])) {
            $guid = $row["user_id"];
            $gereid = $row["gere_id"];
            $geredate = $row["gere_date"];
            $gerestime = $row["gere_stime"];
        } else {
            $gereid = '';
            $guid = '';
            $geredate = '';
            $gerestime = '';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Room General Delete</title>
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <?php
            //mysql 커넥션 객체 생성
            $conn = mysqli_connect($host, $uname, $upw, $dbname);
            $genum = $_POST["genum"];
            $geredate = $_POST["geredate"];
            $gerestime = $_POST["gerestime"];

            // 예약한 일반열람실 삭제
            $sql = "DELETE FROM gereservation WHERE user_id=".$userid." AND gere_date='".$geredate."' AND gere_stime='".$gerestime."' and ge_num = '".$genum."' order by gere_date desc";
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
