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

        // 오늘 날짜 변수에 저장
        date_default_timezone_set('Asia/Seoul');
        $date = date("Y-m-d");

        // 아래에 출력할 예약한 그룹스터디룸 확인
        $rsql = "select gr_name, grre_date, grre_stime, grre_etime, user_id from grreservation where user_id = $userid order by grre_date desc";
        $rresult = mysqli_query($con, $rsql);
        $rrow = mysqli_fetch_array($rresult);

        if (isset($rrow["user_id"])) {
            if ($rrow["grre_date"] >= $date) {
                $gruid = $rrow["user_id"];
                $grname = $rrow["gr_name"];
                $grredate = $rrow["grre_date"];
                $grrestime = $rrow["grre_stime"];
                $grreetime = $rrow["grre_etime"];
            } else {
                $guid = '';
                $grname = '';
                $grredate = '';
                $grrestime = '';
                $grreetime = '';
            }
        } else {
            $guid = '';
            $grname = '';
            $grredate = '';
            $grrestime = '';
            $grreetime = '';
        }

        // 아래에 출력할 예약한 일반열람실 확인
        $esql = "select ge_name, ge_num, gere_date, gere_stime, gere_etime, user_id from gereservation where user_id = $userid order by gere_date desc";
        $eresult = mysqli_query($con, $esql);
        $erow = mysqli_fetch_array($eresult);

        if (isset($erow["user_id"])) {
            if ($erow["gere_date"] == $date) {
                $geuid = $erow["user_id"];
                $gename = $erow["ge_name"];
                $genum = $erow["ge_num"];
                $geredate = $erow["gere_date"];
                $gerestime = $erow["gere_stime"];
                $gereetime = $erow["gere_etime"];
            } else {
                $geuid = '';
                $gename = '';
                $genum = '';
                $geredate = '';
                $gerestime = '';
                $gereetime = '';
            }
        } else {
            $geuid = '';
            $gename = '';
            $genum = '';
            $geredate = '';
            $gerestime = '';
            $gereetime = '';
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="list.css">
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>My Seat</title>
        <style>

        </style>
    </head>
    <body>
        <div>
            <header>
                <div id="my_seat">
                    <a href="menu.php">
                        <div id="my_seat_text">&lt; 나의 좌석</div>
                    </a>

                    <form method="post" action="ge_delete_action.php">
                    <div id="re_info">
                            <div id="re_info_text">일반열람실 예약 정보</div>

                            <table class="table">
                                <tr>
                                    <td>열람실</td>
                                    <td>좌석정보</td>
                                </tr>
                                <tr>
                                    <td id="info_da">
                                        <?php
                                        echo "$gename"; //일반열람실 이름 출력
                                        ?>
                                    </td>
                                    <td id="info_da">
                                        <?php
                                        echo "$genum"; //일반열람실 좌석 번호 출력
                                        ?>
                                    </td>
                                </tr>

                            </table>
                            <div id="room_line"></div>

                            <table class="table">
                                <tr>
                                    <div>
                                        <td>예약날짜</td>
                                        <td>예약시간</td>
                                    </div>
                                </tr>
                                <tr>
                                    <div>
                                        <td id="info_da">
                                            <?php
                                            echo "$geredate"; //일반열람실 예약한 날짜
                                            ?>
                                        </td>
                                        <td id="info_da">
                                            <?php
                                            echo $gerestime." ~ ".$gereetime; //일반열람실 예약시간
                                            ?>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div>
                                        <td id="info_bl"></td>
                                        <td id="info_bl"></td>
                                    </div>
                                </tr>
                            </table>
                        </div>

                        <!-- 일반열람실 예약 취소 -->
                        <div id="btn_can">
                            <input name="genum" type="hidden" value="<?php echo "$genum" ?>">
                            <input name="geredate" type="hidden" value="<?php echo "$geredate" ?>">
                            <input name="gerestime" type="hidden" value="<?php echo "$gerestime" ?>">
                            <input id="btn_cancel" type="submit" value="예약취소">
                        </div>
                    </form>

                    <form method="post" action="re_delete_action.php">
                    <div id="re_info">
                            <div id="re_info_text">그룹스터디룸 예약 정보</div>
                            <div id="room">열람실</div>
                            <div id="room_detail">
                                <?php
                                echo "$grname"; //그룹스터디룸 이름
                                ?>
                            </div>
                            <div id="room_line"></div>

                            <table class="table">
                                <tr>
                                    <div>
                                        <td>예약날짜</td>
                                        <td>예약시간</td>
                                    </div>
                                </tr>
                                <tr>
                                    <div>
                                        <td id="info_da">
                                            <?php
                                            echo "$grredate"; //예약한 날짜
                                            ?>
                                        </td>
                                        <td id="info_da">
                                            <?php
                                            echo $grrestime." ~ ".$grreetime; //예약 시간
                                            ?>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <div>
                                        <td id="info_bl"></td>
                                        <td id="info_bl"></td>
                                    </div>
                                </tr>
                            </table>
                        </div>

                        <!-- 그룹스터디룸 예약 취소 -->
                        <div id="btn_can">
                            <input name="grname" type="hidden" value="<?php echo "$grname" ?>">
                            <input name="grredate" type="hidden" value="<?php echo "$grredate" ?>">
                            <input name="grrestime" type="hidden" value="<?php echo "$grrestime" ?>">
                            <input id="btn_cancel" type="submit" value="예약취소">
                        </div>
                        </form>
                    </div>
            </header>

            <main>
                <section>
                    <div id="re_list">좌석예약내역</div>
                </section>

                <section>
                    <div id="re_list_title">일반열람실</div>
                    <div id="re_line"></div>
                    <div id="room">
                        <!-- 현재까지 일반열람실 예약한 내역 출력 -->
                        <?php
                        $sqll = "select ge_name, ge_num, gere_date, gere_stime, gere_etime from gereservation where user_id = '".$userid."' order by gere_date desc, gere_stime desc";
                        $eres = mysqli_query($con, $sqll);
                        $enum = 0;
                        ?>
                        <table class="table table-bordered">
                            <?php
                            while($rowe = mysqli_fetch_array($eres)) {
                                $enum = $enum + 1;
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    echo "$enum";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $rowe["ge_name"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $rowe["ge_num"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $rowe["gere_date"];
                                    ?>
                                </td>
                                <td></td>
                                <td>
                                    <?php
                                    echo $rowe["gere_stime"];
                                    echo " ~ ";
                                    echo $rowe["gere_etime"];
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </section>

                <section>
                    <div id="re_list_title">&nbsp;</div>
                    <div id="re_line"></div>
                </section>

                <section>
                    <div id="re_list_title">그룹스터디룸</div>
                    <div id="re_line"></div>
                    <div id="room">
                        <!-- 현재까지 예약한 그룹스터디룸 내역 출력 -->
                        <?php
                        $sqll = "select gr_name, grre_date, grre_stime, grre_etime from grreservation where user_id = '".$userid."' order by grre_date desc, grre_stime desc";
                        $rres = mysqli_query($con, $sqll);
                        $rnum = 0;
                        ?>

                        <table class="table table-bordered">
                            <?php
                            while($rowr = mysqli_fetch_array($rres)) {
                                $rnum = $rnum + 1;
                            ?>
                            <tr>
                                <td>
                                    <?php
                                    echo "$rnum";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $rowr["gr_name"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $rowr["grre_date"];
                                    ?>
                                </td>
                                <td></td>
                                <td>
                                    <?php
                                    echo $rowr["grre_stime"];
                                    echo " ~ ";
                                    echo $rowr["grre_etime"];
                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            mysqli_close($con);
                            ?>
                        </table>

                        <div id="re_list_title">&nbsp;</div>
                    </div>
                </section>
            </main>

        </div>
    </body>
</html>
