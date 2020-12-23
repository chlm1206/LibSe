<?php
    header('Content-Type: text/html; charset=UTF-8');
    $host = 'localhost';
    $uname = 'jeanne8426';
    $upw = 'libse218!';
    $dbname = 'jeanne8426';

    $con = mysqli_connect($host, $uname, $upw, $dbname);
    $sql = "select * from admin where admin_id";
    $result = mysqli_query($con, $sql);

    session_start();

    // 로그인을 해야만 볼 수 있게 하는 코드
    if(!isset($_SESSION['adminid']) || !isset($_SESSION['adminname'])) {
	   echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	   exit;
    } else {
        $adminid = $_SESSION["adminid"];
        $adminname = $_SESSION["adminname"];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="list.css">
        <meta name="viewport" content="width=device-width">
        <title>Delete Action</title>
    </head>
    <body>
        <div>
            <header>
                <a href="admin_users.php">
                    <div>
                        <div id="admin_title">&lt; 학생 목록</div>
                        <div id="admin_title_line"></div>
                    </div>
                </a>
            </header>
            <main>
                <div id="size" class="board_size">
                    <?php
                    
                    $userid = $_POST["userid"];
                    
                    //mysql 커넥션 객체 생성
                    $conn = mysqli_connect($host, $uname, $upw, $dbname);
                    
                    //admin_users_delete.php 페이지에서 입력된 글 번호와, 글 비밀번호가 일치하는 행 삭제 쿼리
                    $sql = "DELETE FROM users WHERE user_id='".$userid."'";
                    
                    $result = mysqli_query($conn, $sql);
                    //쿼리 실행 여부 확인
                    if($result) {
                        echo "삭제 성공: ".$result; //과제 작성시 에러메시지 출력하게 만들기
                    } else {
                        echo "삭제 실패: ".mysqli_error($conn);
                    }
                    
                    mysqli_close($conn);
                    //헤더함수를 이용하여 리다이렉션
                    header("Location: admin_users.php");
                    
                    ?>
                    
                </div>
            </main>
        </div>
        
    </body>
</html>
