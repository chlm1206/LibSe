<?php

    $con = mysqli_connect('localhost', 'root', '111111', 'libse');
    $sql = "select * from users where user_id";
    $result = mysqli_query($con, $sql);

    session_start();

    // 로그인을 해야만 볼 수 있게 하는 코드
    if(!isset($_SESSION['userid']) || !isset($_SESSION['username']) || !isset($_SESSION['usermajor'])) {
	   echo "<meta http-equiv='refresh' content='0;url=login.php'>";
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
        <meta name="viewport" content="width=device-width">
        
        <meta charset="utf-8">
        <title>QR Upload</title>

        <style>
            #qr{
                height:40px;
                weight:60px;
                background: #3bb0a9;
                color:#fff;
                border:1px solid #3bb0a9;
                border-radius: 20px;
                padding:10px 30px;
                text-align:center;
                line-height:20px;
            }
        </style>
    </head>

    <body>
        <div>
            <header>
                <a href="menu.php">
                    <div id="top">&lt; QR</div>
                </a>
            </header>

            <main>
                <section>
                    <div id="size">
                        <!-- qr 업로드 폼 -->
                        <form action="imgupload.php" method="post" enctype="multipart/form-data">
                          <br>
                            <div>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <br>
                            <input type="submit"  id="qr" value="업로드" name="submit">
                        </form>

                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
