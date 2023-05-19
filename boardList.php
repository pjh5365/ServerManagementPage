<?php
$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정

if($conn) {
    $isCreated = mysqli_query($conn, "DESC boardlist;");    //boardlist를 찾을 수 없을때만 실행
    if(!$isCreated) {   //테이블이 없을때만 실행
        $table = mysqli_query($conn, "CREATE TABLE boardlist (
                                        listNum int AUTO_INCREMENT,
                                        userID varchar(20) NOT NULL,
                                        userName varchar(20) NOT NULL,
                                        title varchar(50) NOT NULL,
                                        content varchar(500) NOT NULL,
                                        time TIMESTAMP DEFAULT NOW(),
                                        updateTime TIMESTAMP DEFAULT NOW() ON UPDATE NOW(),
                                        primary key(listNum))");
    }
}
else{
    echo "<h3>DB연동에 실패하였습니다.</h3>";
}
?>

<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>자유게시판</title>
    <link rel="stylesheet" href="css/boardList.css">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <h1>자유게시판</h1>
            <ul class="menu">
                <li class="menu_item">
                    <a href="write.html" class="menuLink">글 쓰기</a>
                </li>
                <li class="menu_item">
                    <a href="index.php" class="menuLink">메인 화면</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="content">
                <table>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일자</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM boardlist ORDER BY listNum DESC"; //내림차순으로 검색
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);   //검색된 값들의 row값을 받아옴
                    if($result) {   //쿼리에 대한 결과값이 있을때만
                        while ($arr = mysqli_fetch_array($result)) {
                            $listNum = $arr['listNum'];
                    ?>
                    <tr>
                        <th><?=$rowCount--?></th>   <!--db안에 있는 listNum이 아닌 단순히 글의 갯수로 번호를 매기기 위해 사용-->
                        <th><a href="read.php?data=<?=$listNum?>"><?=$arr['title']?></a></th>
                        <th><?=$arr['userID']?></th>
                        <th><?=$arr['time']?></th>
                    </tr>
                    <?php
                        }
                    }?>
                </table>
            </div>
        </div>
        <div class="footer">
            Email: pjh5365@naver.com &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="https://github.com/pjh5365/ServerManagementPage" target="_blank">Github</a>
        </div>
    </div>
</body>