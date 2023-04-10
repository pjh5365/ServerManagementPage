<?php
session_start();    //세션을 사용해 로그인정보로 글 작성
$title = $_POST['title'];
$content = $_POST['content'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "INSERT INTO boardlist(userID, title, content) ";
$sql .= "VALUES('{$_SESSION['userID']}', '$title', '$content')";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "<script> alert('글 작성 성공'); location.replace('boardList.php');</script>";
}
?>