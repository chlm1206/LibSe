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
        <title>Admin Group Room Page</title>
    </head>

    <body>
        <div>
            <header>
                <a href="admin_status.php">
                    <div>
                        <div id="admin_title">&lt; 그룹열람실</div>
                        <div id="admin_title_line"></div>
                    </div>
                </a>
            </header>
            
            <main>
                <section>
                    <div id="size">
                        <table id="admin_home">
                            <tr onClick="location.href='admin_history_gr41.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">4-1</div>
                                    </td>
                                        
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_syl">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='admin_history_gr42.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">4-2</div>
                                    </td>
                                        
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_syl">&gt;</div>
                                    </td>
                                </div>
                            </tr>

                            <tr onClick="location.href='admin_history_gr43.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">4-3</div>
                                    </td>
                                        
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_syl">&gt;</div>
                                    </td>
                                </div>
                            </tr>
                            
                            <tr onClick="location.href='admin_history_gr61.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">6-1</div>
                                    </td>
                                        
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_syl">&gt;</div>
                                    </td>
                                </div>
                            </tr>
                            
                            <tr onClick="location.href='admin_history_gr62.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">6-2</div>
                                    </td>
                                        
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_syl">&gt;</div>
                                    </td>
                                </div>
                            </tr>
                            
                            <tr onClick="location.href='admin_history_gr63.php'">
                                <div>
                                    <td id="ad_detail" class="ad_line">
                                        <div id="ad_text">6-3</div>
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
