<?php
  header('Content-Type: text/html; charset=UTF-8');
  $id = $_POST['id']; // 입력한 id값
  $pw = $_POST['pw']; // 입력한 pw값
  $check = $_POST['radio']; // 학생인지 관리자인지 선택하는 버튼

  // 학생으로 로그인 시
  if ($check == 0)
  {
      $con = mysqli_connect("localhost", "jeanne8426", "libse218!", "jeanne8426");
      $sql = "select * from users where user_id = '$id'";
      $result = mysqli_query($con, $sql);
      $num_match = mysqli_num_rows($result);
      
      if (!$num_match)
      {
        echo("
            <script>
                window.alert('등록되지 않은 아이디입니다.')
                history.go(-1)
            </script>
        ");
      }
      else {
          $row = mysqli_fetch_array($result);
          $db_pw = $row["user_pw"];

          mysqli_close($con);

          if ($pw != $db_pw)
          {
              echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
              ");
              exit;
          }
          else {
              session_start();
              $_SESSION["userid"] = $row["user_id"];
              $_SESSION["username"] = $row["user_name"];
              $_SESSION["usermajor"] = $row["user_major"];
          
              echo("
              <script>
                location.href = 'menu.php';
              </script>
              ");
          }
      }
  }
  // 관리자로 로그인 시
  else
  {
      $con = mysqli_connect("localhost", "jeanne8426", "libse218!", "jeanne8426");
      $sql = "select * from admin where admin_id = '$id'";
      $result = mysqli_query($con, $sql);
      $num_match = mysqli_num_rows($result);
      
      if (!$num_match)
      {
        echo("
            <script>
                window.alert('등록되지 않은 아이디입니다.')
                history.go(-1)
            </script>
        ");
      }
      else {
          $row = mysqli_fetch_array($result);
          $db_pw = $row["admin_pw"];

          mysqli_close($con);

          if ($pw != $db_pw)
          {
              echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
              ");
              exit;
          }
          else {
              session_start();
              $_SESSION["adminid"] = $row["admin_id"];
              $_SESSION["adminname"] = $row["admin_name"];
          
              echo("
              <script>
                location.href = 'admin_menu.php';
              </script>
              ");
          }
      }
  }
 

 ?>



