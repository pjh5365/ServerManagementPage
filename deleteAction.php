<?php
session_start();    //세션을 사용해 로그인정보로 글 작성

$listNum = $_GET['listNum'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "DELETE FROM boardlist WHERE listNum = '$listNum'";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "<script> alert('글을 삭제하였습니다.'); location.replace('boardList.php');</script>";
}
?>