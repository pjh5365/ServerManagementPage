<?php
session_start();    //세션을 사용해 글 수정기능 구현

$listNum = $_GET['data'];  //리스트에서 get방식으로 글의 번호 전달

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "SELECT * FROM boardlist WHERE listNum = $listNum;";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_array($result);
?>

<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>자유게시판</title>
</head>
<body>
    <br><br>
    <h1 style="text-align: center"><?=$arr['title']?></h1>
    <button style="float: right" type="button" onClick="location.href='boardList.php'">글 목록으로 돌아가기</button>
    <?
    if($arr['userID'] == $_SESSION['userID'])   //세션의 유저명과 작성자가 같다면
        echo "<button style='float: right' type='button' onClick='location.href=\"update.php?data={$listNum}\"'>수정하기</button>";
    ?>
    <hr>
    <h4>작성자 : <?=$arr['userID']?></h4>
    <h4>작성시간 : <?=$arr['time']?></h4>
    <h4>최종수정시간 : <?=$arr['updateTime']?></h4>
    <hr>
    <h2>내용</h2>
    <hr>
    <h4><?=$arr['content']?></h4>
</body>
