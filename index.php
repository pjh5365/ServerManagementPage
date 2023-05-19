<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>서버관리 홈페이지</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<?php
session_start();
?>
<body>
    <div class="wrap">
        <div class="header">
            <h1>서버관리 홈페이지</h1>
            <ul class="menu">
                <?php
                if(!isset($_SESSION['userID'])) {   //로그인이 필요할때
                ?>
                <li class="menu_item">
                    <a href="join.html" class="menuLink">회원가입</a>
                </li>
                <li class="menu_item">
                    <a href="login.html" class="menuLink">로그인</a>
                </li>
                <?php
                }
                else {  //로그인이 되어있을때
                ?>
                <li class="menu_item">
                    <a href="logout.php" class="menuLink">로그아웃</a>
                </li>
                <li class="menu_item">
                    <a href="boardList.php" class="menuLink">글 목록</a>
                </li>
                <?}?>
            </ul>
        </div>
        <div class="container">
            <div class="content"></div>
        </div>
        <div class="footer">
            Email: pjh5365@naver.com &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="https://github.com/pjh5365/ServerManagementPage" target="_blank">Github</a>
        </div>
    </div>
</body>
</html>

<?php   //메인페이지 접속과 함께 서버의 데이터베이스에 테이블생성요청
$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정

if($conn) {
    $isCreated = mysqli_query($conn, "DESC member;");
    if(!$isCreated) {   //테이블이 없을때만 실행
        $table = mysqli_query($conn, "CREATE TABLE member (
                                        userID varchar(20) NOT NULL,
                                        userName varchar(20) NOT NULL,
                                        userPW varchar(30) NOT NULL,
                                        primary key(userID))");
    }
}
else{
    echo "<h3>DB연동에 실패하였습니다.</h3>";
}
?>