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
    <link rel="stylesheet" href="css/read.css">
</head>
<body>
    <div class="wrap">
        <div class="header">
            <h1>자유게시판</h1>
            <ul class="menu">
                <li class="menu_item">
                    <a href="boardList.php" class="menuLink">글 목록</a>
                </li>
                <?php
                if($arr['userID'] == $_SESSION['userID']) {   //세션의 유저명과 작성자가 같다면
                ?>
                <li class="menu_item">
                    <a href="update.php?data=<?=$listNum?>" class="menuLink">수정하기</a>
                </li>
                    <li class="menu_item">
                        <a onclick="deleteConfirm()" class="menuLink">삭제하기</a>
                    </li>
                <?}?>
            </ul>
        </div>
        <div class="container">
            <form id="info">
                <span>작성자 : <?=$arr['userID']?></span>
                <span>작성시간 : <?=$arr['time']?></span>
                <span>최종수정시간 : <?=$arr['updateTime']?></span>
            </form>
            <div class="content">
                <form id="mainText">
                    <h2><?=$arr['title']?></h2><hr>
                    <span><?=$arr['content']?></span>
                </form>
            </div>
        </div>
        <div class="footer">
            Email: pjh5365@naver.com &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="https://github.com/pjh5365/ServerManagementPage" target="_blank">Github</a>
        </div>
    </div>
    <script>
        function deleteConfirm() {
            if(confirm("글을 삭제하시겠습니까?")){
                location.href="deleteAction.php?listNum=<?=$listNum?>";
            }else{
                alert("취소하였습니다.");
            }
        }
    </script>
</body>
