<?php
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
        $date = date("Y-m-d", strtotime("+1 days"));
        
        // 남은 잔여 좌석 파악 코드
        $sql1 = "SELECT gr_id FROM grreservation where gr_id = 41 and grre_date = '".$date."'";
        $res1 = mysqli_query($con, $sql1);
        $con1 = mysqli_num_rows($res1);
        $dd1 = 7 - $con1;
        
        $sql2 = "SELECT gr_id FROM grreservation where gr_id = 42 and grre_date = '".$date."'";
        $res2 = mysqli_query($con, $sql2);
        $con2 = mysqli_num_rows($res2);
        $dd2 = 7 - $con2;
        
        $sql3 = "SELECT gr_id FROM grreservation where gr_id = 43 and grre_date = '".$date."'";
        $res3 = mysqli_query($con, $sql3);
        $con3 = mysqli_num_rows($res3);
        $dd3 = 7 - $con3;
        
        $sql4 = "SELECT gr_id FROM grreservation where gr_id = 61 and grre_date = '".$date."'";
        $res4 = mysqli_query($con, $sql4);
        $con4 = mysqli_num_rows($res4);
        $dd4 = 7 - $con4;
        
        $sql5 = "SELECT gr_id FROM grreservation where gr_id = 62 and grre_date = '".$date."'";
        $res5 = mysqli_query($con, $sql5);
        $con5 = mysqli_num_rows($res5);
        $dd5 = 7 - $con5;
        
        $sql6 = "SELECT gr_id FROM grreservation where gr_id = 63 and grre_date = '".$date."'";
        $res6 = mysqli_query($con, $sql6);
        $con6 = mysqli_num_rows($res6);
        $dd6 = 7 - $con6;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="list.css">
        <meta name="viewport" content="width=device-width">
        <meta charset="UTF-8">
        <title>Group Room</title>
    </head>

    <body>
        <div>
            <header>
                <a href="menu.php">
                    <div id="top">&lt; 그룹스터디룸</div>
                </a>
            </header>
            
            <main>
                <section>
                    <div id="size">
                        <table id="gr_room">
                            <tr onClick="location.href='reservation/gr41_time_choice.php'">
                                <div>
                                    <!-- 남은 잔여 좌석 출력 -->
                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_posi_seat"><?php echo "$dd1"; ?></div>
                                        <div id="gr_imposi_seat"><?php echo " / 7"; ?></div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_room_text">4-1</div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='reservation/gr42_time_choice.php'">
                                <div>
                                    <!-- 남은 잔여 좌석 출력 -->
                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_posi_seat"><?php echo "$dd2"; ?></div>
                                        <div id="gr_imposi_seat"><?php echo " / 7"; ?></div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_room_text">4-2</div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='reservation/gr43_time_choice.php'">
                                <div>
                                    <!-- 남은 잔여 좌석 출력 -->
                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_posi_seat"><?php echo "$dd3"; ?></div>
                                        <div id="gr_imposi_seat"><?php echo " / 7"; ?></div>
                                    </td>

                                    <td id="ge_room_detail" class="gr_room_line">
                                        <div id="gr_room_text">4-3</div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='reservation/gr61_time_choice.php'">
                                <div>
                                    <!-- 남은 잔여 좌석 출력 -->
                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_posi_seat"><?php echo "$dd4"; ?></div>
                                        <div id="gr_imposi_seat"><?php echo " / 7"; ?></div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_room_text">6-1</div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='reservation/gr62_time_choice.php'">
                                <div>
                                    <!-- 남은 잔여 좌석 출력 -->
                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_posi_seat"><?php echo "$dd5"; ?></div>
                                        <div id="gr_imposi_seat"><?php echo " / 7"; ?></div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_room_text">6-2</div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>
                            
                            <tr onClick="location.href='reservation/gr63_time_choice.php'">
                                <div>
                                    <!-- 남은 잔여 좌석 출력 -->
                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_posi_seat"><?php echo "$dd6"; ?></div>
                                        <div id="gr_imposi_seat"><?php echo " / 7"; ?></div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_room_text">6-3</div>
                                    </td>

                                    <td id="gr_room_detail" class="gr_room_line">
                                        <div id="gr_icon">&gt;</div>
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
