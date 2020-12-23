<?php
    header('Content-Type: text/html; charset=UTF-8');
    $host = 'localhost';
    $uname = 'jeanne8426';
    $upw = 'libse218!';
    $dbname = 'jeanne8426';

    $con = mysqli_connect($host, $uname, $upw, $dbname);
    $sql = "select * from users where user_id";
    $result = mysqli_query($con, $sql);

    $q_sql = "select qr_name, qr from qrimg where user_id = $userid";
    $q_result = mysqli_query($con, $q_sql);

    session_start();

    // 로그인을 해야만 볼 수 있게 하는 코드
    if(!isset($_SESSION['userid']) || !isset($_SESSION['username']) || !isset($_SESSION['usermajor'])) {
	   echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	   exit;
    } else {
        $userid = $_SESSION["userid"];
        $username = $_SESSION["username"];
        $usermajor = $_SESSION["usermajor"];

        // 아래에서 qr 이미지 불러오기 위한 코드
        $query = "SELECT * FROM image";
          $result = mysqli_query($con, $query);
          $data = mysqli_fetch_array($result);

          $qsql = "select * from image where user_id = $userid";
          $qresult = mysqli_query($con, $qsql);
          $qrow = mysqli_fetch_array($qresult);

          if(isset($qrow['user_id'])) {
              $quserid = $qrow['user_id'];

              $imgname = $qrow["img_name"];
              $imgurl = $qrow["img_url"];
          } else {
              $quserid = '';
              $imgname = '';
              $imgurl = '';
          }

    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="list.css">
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <script></script>
        <title>Main Page</title>

        <style>
            #qr{
                height:60px;
                weight:80px;
                background: #3bb0a9;
                color:#fff;
                border:1px solid #3bb0a9;
                border-radius: 20px;
                padding:10px 30px;
                text-align:center;
            }
        </style>
    </head>
    <body>
      <div>
          <div id="my_info">
              <table>
                  <tr>
                      <div id ="f1">
                          <td class="my_info_detail">
                              <div id="my_info_text">
                                  <?php
                                    echo "$userid";
                                  ?>
                              </div>
                              <div id="my_info_text">
                                  <?php
                                    echo "$usermajor";
                                  ?>
                              </div>
                              <div id="my_info_text">
                                  <?php
                                    echo "$username";
                                  ?>
                              </div>
                          </td>

                          <td class="my_info_detail">

                              <div id="img_preview">
                                  <?php
                                  // 업로드한 qr이 있을 때
                                  if($quserid == $userid) {
                                      echo '<img id="my_info_qr" src='.$imgurl.'>';
                                  } else { // 업로드한 qr이 없을 때
                                      echo '<p>QR 이미지를 업로드하세요.</p>';
                                      echo '<a href="qr_upload.php"><button id="qr">QR 업로드</button></a>';
                                  }
                                  ?>
                              </div>

                          </td>
                      </div>
                  </tr>
              </table>
          </div>

          <div id="size">
              <table id="menu">
                  <tr>
                      <div>
                          <td id="menu_detail" class="menu_line_ribo">
                              <a href="my_seat.php">
                                    <img id="icon" src="icon/1.png" style="width:50%; margin:30px;"><br>
                                    <div>나의 좌석</div>
                              </a>
                          </td>

                          <td id="menu_detail" class="menu_line_bo">
                              <a href="room_general.php">
                                  <img id="icon" src="icon/2.png" style="width:50%; margin:30px;"><br>
                                  <div>일반열람실</div>
                              </a>
                          </td>
                      </div>
                  </tr>

                  <tr>
                      <div>
                          <td id="menu_detail" class="menu_line_ribo">
                              <a href="room_group.php">
                                  <img id="icon" src="icon/3.png" style="width:50%; margin:30px;"><br>
                                  <div>그룹스터디룸 </div>
                              </a>
                          </td>

                          <td id="menu_detail" class="menu_line_bo">
                              <a href="bb/board_list.php">
                                  <img id="icon" src="icon/4.png" style="width:50%; margin:30px;"><br>
                                  <div> 자유게시판 </div>
                              </a>
                          </td>
                      </div>
                  </tr>

                  <tr>
                      <div>
                          <td id="menu_detail" class="menu_line_ri">
                              <a href="hp.php">
                                  <img id="icon" src="icon/5.png" style="width:50%; margin:30px;"><br>
                                  <div> 도서관 홈페이지 </div>
                              </a>
                          </td>

                          <td id="menu_detail">
                              <a href="logout.php">
                                  <img id="icon" src="icon/6.png" style="width:50%; margin:30px;"><br>
                                  <div> 로그아웃 </div>
                              </a>
                          </td>
                      </div>
                  </tr>
              </table>
          </div>
        </div>
    </body>

<!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5eb569148ee2956d739f4887/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
<!--End of Tawk.to Script-->
</html>
