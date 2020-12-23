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
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="list.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=800">
        <title>General Room</title>
    <style>
        body {
            width: 800px;
            margin: auto;
            padding: 0px 0px 0px 0px;
            min-height: 100%
         }
    </style>
    </head>

    <body>
        <div>
            <header>
                <a href="menu.php">
                    <div id="top">&lt; 일반열람실</div>
                </a>
            </header>

            <main>
                <section id="f2">
                    <div id="size">
                        <table id="ge_room">
                            <tr onClick="location.href='/reservation/ge2_time_choice.php'">
                                <div>
                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_room_text">창의열람실</div>
                                    </td>

                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='/reservation/ge3_time_choice.php'">
                                <div>
                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_room_text">i-창작실</div>
                                    </td>

                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='/reservation/ge4_time_choice.php'">
                                <div>
                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_room_text">4층</div>
                                    </td>

                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='/reservation/ge5_time_choice.php'">
                                <div>
                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_room_text">5층</div>
                                    </td>

                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_icon">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='/reservation/ge6_time_choice.php'">
                                <div>
                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_room_text">6층</div>
                                    </td>

                                    <td id="ge_room_detail" class="ge_room_line">
                                        <div id="ge_icon">&gt;</div>
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