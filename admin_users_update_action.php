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
        <link rel="stylesheet" href="list.css">
        <link rel="stylesheet" href="bb/bootstrap.css">
        <meta charset="utf-8">      
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
        <title>Update Action</title>
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
                    //admin_users_update.php에서 POST 방식으로 넘어온 값 저장 및 출력
                    $user_id = $_POST["user_id"];
                    $user_major = $_POST["user_major"];
                    $user_name = $_POST["user_name"];
                    $user_pw = $_POST["user_pw"];
                    
                    //커넥션 객체 생성 및 연결 여부 확인하기
                    $conn = mysqli_connect($host, $uname, $upw, $dbname);
                    
                    $sql = "UPDATE users SET user_name='".$user_name."',user_name='".$user_name."',user_pw='".$user_pw."' WHERE user_id=".$user_id."";
                    $result = mysqli_query($conn,$sql);
                    //수정 작업의 성공 여부 확인하기
                    if($result) {
                        echo "수정 성공: ".$result;
                    } else {
                        echo "수정 실패: ".mysqli_error($conn);
                    }

                    mysqli_close($conn);
                    //헤더를 이용한 리다이렉션 구현
                    header("Location: admin_users.php");
                    ?>
                    
                    
                </div>
            </main>
        </div>
    </body>
</html>
