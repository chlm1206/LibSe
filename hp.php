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

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="list.css">
        <meta charset="utf-8">
        <title>library homepage</title>
    <meta name="viewport" content="width=device-width">
</head>
<body>
    <header>
        <a href="menu.php">
            <div id="top">&lt; 도서관 홈페이지</div>
        </a>
    </header>

    <iframe src="https://library.hywoman.ac.kr/" width="800" height="1000"  frameborder="0" marginwidth="0" marginheight="0"
        scrolling="yes"></iframe>
</body>
</html>