<?php
$userID = $_POST['userID'];
$title = $_POST['title'];
$content = $_POST['content'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "INSERT INTO boardlist(userID, userName, title, content) ";
$sql .= "VALUES('$userID', '모바일환경', '$title', '$content')";
$result = mysqli_query($conn, $sql);

if($result) {
    echo 1;
}
else {
    echo 0;
}
?>