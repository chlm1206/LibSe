<?php
    header('Content-Type: text/html; charset=UTF-8');
    $host = 'localhost';
    $uname = 'jeanne8426';
    $upw = 'libse218!';
    $dbname = 'jeanne8426';

    $con = mysqli_connect($host, $name, $pw, $dbname);
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

    // qr이라는 폴더에 이미지 저장
    $target_dir = "qr/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // 파일 존재여부 확인
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // 파일 크기 확인
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // 파일 형식 확인
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // $uploadOk 값 확인
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
        // if everything is ok, try to upload file
    } else {
        if (is_uploaded_file($_FILES['fileToUpload']['tmp_name']) && getimagesize($_FILES['fileToUpload']['tmp_name']) != false) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                /*database에 업로드 정보를 기록하자.
                - 파일이름(혹은 url)
                - 파일사이즈
                - 파일형식
                */
                $userid = $_SESSION["userid"];
                $imgname = $_FILES["fileToUpload"]["name"];
                $imgurl = "http://libse.co.kr/qr/". $_FILES["fileToUpload"]["name"];
                $imgsize = $_FILES["fileToUpload"]["size"];
                
                $conn = mysqli_connect($host, $uname, $upw, $dbname);
                //images 테이블에 이미지정보를 저장하자.
                $sql = "insert into image(img_name, img_url, img_size, user_id) values('$imgname','$imgurl','$imgsize','$userid')";
                mysqli_query($conn,$sql);
                mysqli_close($conn);
                
                echo("
                <script>
                window.alert('업로드되었습니다.')
                location.href = 'menu.php'
                </script>
                ");
                
            } else {
                echo "<p>Sorry, there was an error uploading your file.</p>";
                echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
            }
        } else {
            echo "<p>Sorry, file already exists.</p>";
            echo "<br><button type='button' onclick='history.back()'>돌아가기</button>";
        }
    }
?>


