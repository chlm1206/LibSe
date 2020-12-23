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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Add</title>
         <meta name="viewport" content="width=device-width">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="http://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="bb/bootstrap.css">
        <link rel="stylesheet" href="list.css">
    </head>
    <body>
        <div>
            <header>
                <a href="admin_users.php">
                    <div>
                        <div id="admin_title">&lt; 학생 목록</div>
                        <div id="admin_title_line"></div>
                    </div>
                </a>
            </header>

            <main>
                <div id="size" class="board_size">
                    <!-- admin_users_users_add_action.php로 넘기는 폼 -->
                    <form class="form-horizontal" action="admin_users_add_action.php" method="post">

                        <div class="form-group">
                            <label for="exampleInputId1" class="col-sm-2 control-label">학번 : </label>
                            <div class="col-sm-10">
                                <!-- 글 제목 입력 상자 -->
                                <input class="form-control" name="userId" id="Title" type="uid" placeholder="uid"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputName1" class="col-sm-2 control-label">이름 : </label>
                            <div class="col-sm-10">
                                <!-- 글 내용 입력 텍스트영역 -->
                                <textarea class="form-control" name="userName" id="uname" rows="5" cols="50" placeholder="uname"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputMajor1" class="col-sm-2 control-label">학과 : </label>
                            <div class="col-sm-10">
                                <!-- 글 내용 입력 텍스트영역 -->
                                <textarea class="form-control" name="userMajor" id="content" rows="5" cols="50" placeholder="Content"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1" class="col-sm-2 control-label">비밀번호(기본값 0000) : </label>
                            <div class="col-sm-10">
                                <!-- 글 비밀번호 입력 상자 -->
                                <input class="form-control" name="userPw" id="password" type="password" placeholder="Password" value="0000"/>
                            </div>
                        </div>

                        <div>
                            <!-- 글 입력 버튼 -->
                            <button class="btn btn-warning" type="submit" value="글 입력">학생 정보 입력</button>
                            <!-- 입력 내용 초기화 버튼 -->
                            <button class="btn btn-danger" type="reset" value="초기화">초기화</button>
                            <!-- 리스트로 돌아가는 버튼 -->
                            <a class="btn btn-primary" href="board_list.php">학생 목록으로 돌아가기</a>
                        </div>
                    </form>
                    <script type="text/javascript">
                        //id가 XX인 객체에 변화가 생기면 checkXX 함수를 변화된 객체의 값을 매개로 호출
                        $("#uid").change(function(){
                            checkId($('#uid').val());
                        });
                        $("#content").change(function(){
                            checkContent($('#content').val());
                        });
                        $("#password").change(function(){
                            checkPassword($('#password').val());
                        });
                        
                        //입력된 변수의 길이를 참조하여 조건문을 통해 최소 입력 길이 유효성 검사를 하는 함수
                        function checkId(uid) {
                            if(uid.length > 10) {
                                swal("ERROR","학번을 확인하세요!","error")
                                $('#uid').val('').focus();
                                return false;
                            } else {
                                return true;
                            }
                        }

                        function checkContent(content) {
                            if(content.length < 3) {
                                swal("WARNING","학과는 3자리 이상 입력해야 합니다.","warning")
                                $('#content').val('').focus();
                                return false;
                            } else {
                                return true;
                            }
                        }

                        function checkPassword(password) {
                            if(password.length < 4) {
                                swal("WARNING","비밀번호는 최소 4개 이상입니다.","warning")
                                $('#password').val('').focus();
                                return false;
                            } else {
                                return true;
                            }
                        }


                    </script>
                    
                </div>
            </main>
        </div>

    </body>
</html>
