
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="list.css">
        <link rel="stylesheet" href="bootstrap.css">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="./js/login.js"></script>
        <meta charset="utf-8">
        <title>Login Page</title>

        <style>
            html,body {
                width: 800px;
                margin: auto;
                padding: 0px 0px 0px 0px;
                min-height: 100vh;
            }

            .container{
                width: 60%;
                font-size: 50px;
            }

            .choice input[type="radio"]{
                display:none;
            }

            .choice input[type="radio"]:checked + span{
                background: #3bb0a9;
                color:#fff;
            }


            span{
                color: #4e4e4e;
                display:inline-block;
                background:none;
                border:1px solid #dfdfdf;
                border-radius: 20px;
                padding:20px 30px;
                text-align:center;
                height:50px;
                weight:80px;
                line-height:10px;
                font-size: 30px;
                cursor:pointer;
                font-family: "경기천년제목_Light", sans-serif;
            }

            #inputInvalid , #exampleInputPassword1{
                height: 80px;
                font-size: 50px;
                margin-bottom: 10%;
            }
            .form-control{
                font-family: "경기천년제목_Light", sans-serif;
            }

        </style>
    </head>

    <body>
        <div id="login">

            <div id="logo">
                <img id="logo_img" src="icon/logo.png">
            </div>

            <!-- 로그인 실행을 위한 폼 -->
            <form name="login" method="post" action="login_ok.php">
                <div class="container">
                    <input class="form-control" id="inputInvalid" type="text" placeholder="Id" name="id">
                    <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="pw">
                </div>


                <div class="checkcontainer">
                    <label class="choice">
                        <input id="student" class="radio" type="radio" checked="checked" name="radio" value="0" autocomplete="off">
                        <span>학생</span>
                    </label>

                    <label class="choice">
                        <input id="admin" class="radio" type="radio" name="radio" value="1"  autocomplete="off">
                        <span>관리자</span>
                    </label>
                </div>

                <div class="login_btn">
                    <a href="#">
                        <img src="icon/logbtn.PNG" id="login_btn" onclick="check_input()">
                    </a>
                </div>
            </form>

        </div>
    </body>
</html>
