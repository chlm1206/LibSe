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
        <meta name="viewport" content="width=800">
        <meta charset="utf-8">
        <title>Admin Users Page</title>
        <style>
            .btn_update {
                color: #ef7479;
            }
            .btn_delete {
                color: #56cc9d;
            }
        </style>
    </head>
    
    <body>
        <div>
            <header>
                <a href="admin_menu.php">
                    <div>
                        <div id="admin_title">&lt; 학생 정보</div>
                        <div id="admin_title_line"></div>
                    </div>
                </a>
            </header>
            
            <main>
                <section>
                    <div id="size">
                        <table id="admin_history">
                            <tr>
                                <div>
                                    <th id="his_detail">
                                        <div id="his_text">번호</div>
                                    </th>
                                    <th id="his_detail">
                                        <div id="his_text">학번</div>
                                    </th>
                                    <th id="his_detail">
                                        <div id="his_text">이름</div>
                                    </th>
                                    
                                    <th id="his_detail">
                                        <div id="his_text">학과</div>
                                    </th>
                                        
                                    <th id="his_detail">
                                        <div id="his_text">비밀번호</div>
                                    </th>
                                    
                                    <th id="his_detail">
                                        <div id="his_text">수정</div>
                                    </th>
                                        
                                    <th id="his_detail">
                                        <div id="his_text">삭제</div>
                                    </th>
                                </div>
                            </tr>

                            <?php
                            // DB에 저장된 모든 학생 정보 출력
                            $sqll = "select user_id, user_major, user_name, user_pw from users";
                            $res = mysqli_query($con, $sqll);
                            $num = 0;
                            ?>
                            <?php
                            while($urow = mysqli_fetch_array($res)) {
                                $num = $num + 1;
                                $userid = $urow["user_id"];
                                $usermajor = $urow["user_major"];
                                $username = $urow["user_name"];
                                $userpw = $urow["user_pw"];
                            ?>
                            <tr>
                                <td id="his_text_td">
                                    <?php
                                    echo "$num";
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $userid;
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $username;
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $usermajor;
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo $userpw;
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo "<a class='btn_update' href='admin_users_update.php?user_id=".$userid."'>수정</a>";
                                    ?>
                                </td>
                                <td id="his_text_td">
                                    <?php
                                    echo "<a class='btn_delete' href='admin_users_delete.php?user_id=".$userid."'>삭제</a>";
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                            
                        </table>
                        <a class='btn btn-warning' href='admin_users_add.php?user_id=".$userid."'>회원 추가</a>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>