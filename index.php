<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>서버관리 홈페이지</title>
</head>
<body>
    <header>
        <br><br>
        <h1 style="text-align: center">서버관리 홈페이지</h1>
        <?php
        session_start();
        if(!isset($_SESSION['userID'])) {   //로그인이 필요할때
            echo '<a style="float: right; padding-left: 15px" href="join.html">회원가입</a>';
            echo '<a style="float: right; padding-left: 15px" href="login.html">로그인</a>';
        }
        else {  //로그인이 되어있을때
            echo '<a style="float: right; padding-left: 15px" href="logout.php">로그아웃</a>';
            echo '<a style="float: right; padding-left: 15px" href="boardList.php">글 목록</a>';
        }
        ?>
    </header>
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