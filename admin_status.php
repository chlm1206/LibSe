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
        <meta name="viewport" content="width=800">
        <meta charset="utf-8">
        <title>Admin Reservation Status Page</title>
    </head>

    <body>
        <div>
            <header>
                <a href="admin_menu.php">
                    <div>
                        <div id="admin_title">&lt; 예약현황</div>
                        <div id="admin_title_line"></div>
                    </div>
                </a>
            </header>
            
            <main>
                <section>
                    <div id="size">
                        <table id="admin_home">
                            <tr onClick="location.href='admin_room_general.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div class="ad_icon">
                                            <img id="ad_icon" src="icon/ad_ge.png">
                                        </div>
                                    </td>

                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">일반열람실</div>
                                    </td>
                                        
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_syl">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='admin_room_group.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div class="ad_icon">
                                            <img id="ad_icon" src="icon/ad_gr.png">
                                        </div>
                                    </td>

                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">그룹스터디룸</div>
                                    </td>
                                        
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_syl">&gt;</div>
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
