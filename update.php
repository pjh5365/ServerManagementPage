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
</head>
<body>
    <h1 style="text-align: center">글 수정하기</h1>
    <form name="write" method="post" action="updateAction.php?listNum=<?=$listNum?>">
        <table align="center" border="10" width="1200">
            <tr>
                <td height="20" style="text-align: center">제목</td>
                <td>
                    <input type="text" name="title" value="<?=$arr['title'];?>">
                </td>
            </tr>
            <tr>
                <td height="200" style="text-align: center">내용</td>
                <td>
                    <textarea cols="80" rows="10" name="content"><?=$arr['content']?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="글 수정하기">
                </td>
            </tr>
        </table>
    </form>
</body>