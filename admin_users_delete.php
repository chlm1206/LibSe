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
        <link rel="stylesheet" href="bb/bootstrap.css">
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
            <main id="size">
                <?php
                //admin_users.php 페이지에서 넘어온 글 번호값 저장 및 출력
                $user_id = $_GET["user_id"];
                ?>
                <!-- admin_users_delete_action.php 페이지로 post방식을 이용하여 값 전송 -->
                <form action="admin_users_delete_action.php" method="post">
                    <table class="table table-bordered" style="width:100%">
                        <tr>
                            <td>
                                <?php echo $user_id ?>
                                <input type="hidden" name="userid" value="<?php echo $user_id ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>삭제하시겠습니까?</td>
                        </tr>
                        <tr>
                            <td><button class="btn btn-primary" type="submit">삭제</button></td>
                        </tr>
                    </table>
                </form>

                

            </main>
        </div>
    </body>
</html>
