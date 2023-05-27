<?php
$userName = $_POST['userName'];
$userID = $_POST['userID'];
$userPW = $_POST['userPW'];

$conn = mysqli_connect("localhost", "pibber", "wjsansrk", "test");
mysqli_set_charset($conn, 'utf8');  //인코딩 utf8로 설정
$sql = "INSERT INTO member (userID, userName, userPW) ";
$sql .= "VALUES('$userID', '$userName', '$userPW');";

if(mysqli_query($conn, $sql)) {
    echo 1;
}
else {
    echo 0;
}
?>