<?php
session_start();    //세션을 사용해 로그인정보로 글 작성

$listNum = $_GET['listNum'];

$title = $_POST['title'];
$content = $_POST['content'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "UPDATE boardlist SET title = '$title', content = '$content' WHERE listNum = $listNum";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "<script> alert('글 수정 성공'); location.replace('boardList.php');</script>";
}
?>