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
        <link rel="stylesheet" href="bb/bootstrap.css">
        <title>Admin Users Add</title>
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
                    //admin_users_add.php 페이지에서 넘어온 글 번호값 저장 및 출력
                    $user_id = $_POST["userId"];
                    $user_name = $_POST["userName"];
                    $user_major = $_POST["userMajor"];
                    $user_pw = $_POST["userPw"];
                    
                    //mysql 커넥션 객체 생성
                    $conn = mysqli_connect($host, $uname, $upw, $dbname);
                    
                    //입력된 값을 1행에 넣는 쿼리
                    $sql = "INSERT INTO users (user_id, user_name, user_major, user_pw) values ('".$user_id."','".$user_name."','".$user_major."','".$user_pw."')";
                    
                    $result = mysqli_query($conn,$sql);
                    // 쿼리 실행 여부 확인
                    if($result) {
                        echo "<script>alert(\"학생 등록이 완료되었습니다.\");</script>";//과제 작성시 에러메시지 출력하게 만들기
                    } else {
                        echo "입력 실패: ".mysqli_error($conn);
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
