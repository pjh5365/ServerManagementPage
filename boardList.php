<?php
$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정

if($conn) {
    $isCreated = mysqli_query($conn, "DESC boardlist;");    //boardlist를 찾을 수 없을때만 실행
    if(!$isCreated) {   //테이블이 없을때만 실행
        $table = mysqli_query($conn, "CREATE TABLE boardlist (
                                        listNum int AUTO_INCREMENT,
                                        userID varchar(20) NOT NULL,
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
</head>
<body>
    <br><br>
    <h1 style="text-align: center">자유게시판</h1>
    <table align="center" border="10" width="1200" height="20">
        <tr>
            <th width="50">번호</th>
            <th width="1000">제목</th>
            <th width="200">작성자</th>
            <th width="200">작성일자</th>
        </tr>
        <?php
        $sql = "SELECT * FROM boardlist ORDER BY listNum DESC"; //내림차순으로 검색
        $result = mysqli_query($conn, $sql);
        if($result) {   //쿼리에 대한 결과값이 있을때만
            while ($arr = mysqli_fetch_array($result)) {
                $listNum = $arr['listNum'];
                echo "<tr>";
                echo "<th witdth='50'>{$listNum}</th>";
                echo "<th witdth='800'>";
                    echo "<a href='read.php?data={$listNum}' style='text-decoration: none; color: inherit'>{$arr['title']}</a>";    //get방식으로 글번호를 넘기고 글제목을 링크로
                echo "</th>";
                echo "<th witdth='175'>{$arr['userID']}</th>";
                echo "<th witdth='175'>{$arr['time']}</th>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <button type="button" onClick="location.href='write.php'" style="float: right">글 쓰기
    <button type="button" onClick="location.href='main.php'" style="float: right">메인 화면으로 이동
</body>
