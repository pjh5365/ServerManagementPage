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
    <title>글 수정하기</title>
    <link rel="stylesheet" href="css/update.css">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <h1>글 수정하기</h1>
        </div>
        <div class="container">
            <div class="content">
                <form name="write" method="post" action="updateAction.php?listNum=<?=$listNum?>">
                    <input type="text" name="title" value="<?=$arr['title'];?>">
                    <textarea cols="80" rows="10" name="content"><?=$arr['content']?></textarea>
                    <input id="btn" type="submit" value="글 수정하기">
                </form>
            </div>
        </div>
        <div class="footer">
            Email: pjh5365@naver.com &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="https://github.com/pjh5365/ServerManagementPage" target="_blank">Github</a>
        </div>
    </div>
</body>