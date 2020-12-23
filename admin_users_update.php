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
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <link rel="stylesheet" href="list.css">
        <title>Update</title>
        <link rel="stylesheet" href="bb/bootstrap.css">
        <!-- 테이블 크기 조절용 css -->
        <style>
            table {
                table-layout: fixed;
                word-wrap: break-word;
            }
        </style>
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
                    //커넥션 객체 생성 (데이터 베이스 연결)
                    $conn = mysqli_connect($host, $uname, $upw, $dbname);
                    
                    $user_id = $_GET["user_id"];
                    
                    $sql = "SELECT * FROM users WHERE user_id = '".$user_id."'";
                    $result = mysqli_query($conn,$sql);
                    if($row = mysqli_fetch_array($result)){
                    ?>
                    <br>
                    <!-- admin_users_update_action.php 페이지로 post방식을 이용하여 값 전송 -->
                    <form action="admin_users_update_action.php" method="post">
                        <table class="table table-bordered" style="width:100%">
                            <tr>
                                <td>학번</td>
                                <td><input type="text" name="user_id" value="<?php echo $row["user_id"]?>" readonly></td>
                            </tr>
                            <tr>
                                <td>학과</td>
                                <td><input type="text" name="user_major" value="<?php echo $row["user_major"]?>"></td>
                            </tr>
                            <tr>
                                <td>이름</td>
                                <td><input type="text" name="user_name" value="<?php echo $row["user_name"]?>"></td>
                            </tr>
                            <tr>
                                <td>비밀번호</td>
                                <td><input type="text" name="user_pw" value="<?php echo $row["user_pw"]?>"></td>
                            </tr>
                        </table>
                        <br>
                        <?php
                    }
                    //커넥션 객체 종료
                    mysqli_close($conn);
                        ?>
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary" type="submit">학생 정보 수정</button>
                        &nbsp;&nbsp;
                        <a class="btn btn-primary" href="admin_users.php"> 목록으로 돌아가기</a>
                    </form>
                </div>
            </main>
        </div>
        
    </body>
</html>
