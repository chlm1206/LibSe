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
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>Admin Page</title>
        <style>
            #admin_info {
              font-family: "경기천년제목", sans-serif;
            }
            #ad_text {
              font-family: "경기천년제목", sans-serif;
            }
        </style>
    </head>

    <body>
        <div>
            <header>
                <div>
                    <div id="admin_info">
                        <b>관리자</b>
                        <?php
                            echo "$adminname", "님";
                        ?>
                    </div>
                    <div id="admin_title_line"></div>
                </div>
            </header>

            <main>
                <section>
                    <div id="size">

                        <table id="admin_home">
                            <tr onClick="location.href='admin_users.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div>
                                            <img id="ad_icon" src="icon/ad_0.png">
                                        </div>
                                    </td>

                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">학생 관리</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='admin_status.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div>
                                            <img id="ad_icon" src="icon/ad_1.png">
                                        </div>
                                    </td>

                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">예약 현황</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='admin_status_all.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div>
                                            <img id="ad_icon" src="icon/ad_2.png">
                                        </div>
                                    </td>

                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">예약 내역</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='admin_bb/admin_board_list.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div>
                                            <img id="ad_icon" src="icon/ad_3.png">
                                        </div>
                                    </td>

                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">게시판 관리</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='admin_logout.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div>
                                            <img id="ad_icon" src="icon/ad_4.png">
                                        </div>
                                    </td>

                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">로그아웃</div>
                                    </td>
                                </div>
                            </tr>

                        </table>

                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
